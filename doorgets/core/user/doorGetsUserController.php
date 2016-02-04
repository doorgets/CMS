<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/


class doorGetsUserController {
    
    public $doorGets = null;
    public $Content  = '';

    public function __construct(&$doorGets) {
        
        if (!is_object($doorGets)) {   return null;   }
        
        $this->doorGets         = $doorGets;

        $this->Params           = $doorGets->Params;
        $this->Action           = $doorGets->Action();
        
        $this->zoneArea         = $doorGets->zoneArea();
        
        $lgActuel               = $doorGets->getLangueTradution();
        $redirectUrlModule      = './?controller=modules&lg='.$lgActuel;
        
        if (empty($doorGets->user) && $doorGets->controllerNameNow() !== 'authentification') {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        // Test if $uri module is valid
        $isUri = array();
        $params = $doorGets->Params();
        if (array_key_exists('uri',$params['GET']) )
        {
            
            $uri = $params['GET']['uri'];
            $isUri = $doorGets->dbQS($uri,'_modules','uri');

            if (!empty($isUri)) {

                $doorGets->Uri   = $uri;
                $doorGets->Table = '_m_'.$this->doorGets->getRealUri($uri);
            
            }else{

                FlashInfo::set($this->doorGets->__("L'URI n'existe pas"),"error");
                header('Location:'.$redirectUrlModule); exit();
            }
            
        }  else {

            $moduleWithUri  = Constant::$modules;
            
            if (in_array($doorGets->controllerNameNow(),$moduleWithUri)) {

                FlashInfo::set($this->doorGets->__("L'URI est vide"),"error");
                header('Location:'.$redirectUrlModule); exit();
            }
            
        }

        $this->getActionMethod();

        $doorGets->setController($this);
        
        $doorGets->Categories = $doorGets->loadCategories($doorGets->Uri);
        $this->doorGets = $doorGets;
        $doorGets->Content = $this->Content;

    }
    
    
    
    
    // return the model of te current controller
    public function getRequest()
    {
        
        $nameRequest = $this->doorGets->controllerNameNow().'Request';

        $fileNameRequest = REQUESTS.$this->doorGets->zoneArea().'/'.$nameRequest.'.php';
        
        if (!is_file($fileNameRequest)) { header('Location:./#'.$fileNameRequest); exit(); }
        require_once $fileNameRequest;
        
        if (!class_exists ($nameRequest)) { header('Location:./#'.$nameRequest); exit(); };
        return new $nameRequest($this->doorGets);
        
        
    }
    
    // return the view of the current controller
    public function getView()
    {
        
        $nameView = $this->doorGets->controllerNameNow().'View';
        $fileNameView = VIEWS.$this->zoneArea.'/'.$nameView.'.php';
        
        if (!is_file($fileNameView)) { header('Location:./#'.$fileNameView); exit(); };
        require_once $fileNameView;
        
        if (!class_exists ($nameView)) { header('Location:./#'.$nameView); exit(); };
        $view = new $nameView($this->doorGets);
        return $view->getContent();
    }
    
    // return the content
    public function getContent() {
        
        return $this->doorGets->Content;
    
    }
    
    // Call action mehtod name from the action global and
    // load the return method in Content propriety
    protected function getActionMethod() {

        $_actions = array('index','register','forget','reset','activation','logout');

        if (
            empty($this->doorGets->user) && 
            !in_array($this->doorGets->Action(), $_actions)
        ) { 
            
            $this->Content = $this->indexAction();  return null;
        }

        $nameAction = $this->doorGets->Action().'Action';
        if (method_exists($this,$nameAction)) {
            
            $this->Content = $this->$nameAction();
            
        }else{
            
            if (array_key_exists('GET',$this->doorGets->Params) && array_key_exists('action',$this->doorGets->Params['GET']) && ctype_alnum($this->doorGets->Params['GET']['action']) )
            {
                $this->doorGets->Action = $this->doorGets->Params['GET']['action'] = 'index';
                $this->Content = $this->doorGets->Content = $this->indexAction();
            }
        }
        
    }
    
    public function indexAction()
    {
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }
    
    
    
}
