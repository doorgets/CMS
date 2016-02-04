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


class doorGetsAjaxController {
    
    public $doorGets = null;
    public $Response  = array();

    public function __construct(&$doorGets) {
        
        if (!is_object($doorGets)) {   return null;   }
 		
 		$this->doorGets 		= $doorGets;
        
        $this->Params           = $doorGets->Params;
        $this->Action           = $doorGets->Action();
        
        $this->getActionMethod();

        $doorGets->setController($this);
		$doorGets->Response = $this->Response;

        $this->doorGets = $doorGets;

    }
    
    // return the model of te current controller
    public function getRequest()
    {
        
        $nameRequest = $this->doorGets->controllerNameNow().'Request';

        $fileNameRequest = REQUESTS.'ajax/'.$nameRequest.'.php';
        
        if (!is_file($fileNameRequest)) { header('Location:./#'.$fileNameRequest); exit(); }
        require_once $fileNameRequest;
        
        if (!class_exists ($nameRequest)) { header('Location:./#'.$nameRequest); exit(); };
        return new $nameRequest($this->doorGets);
        
        
    }
    
    // return the view of the current controller
    public function getView()
    {
        
        $nameView = $this->doorGets->controllerNameNow().'View';
        $fileNameView = VIEWS.'ajax/'.$nameView.'.php';
        
        if (!is_file($fileNameView)) { header('Location:./#'.$fileNameView); exit(); };
        require_once $fileNameView;
        
        if (!class_exists ($nameView)) { header('Location:./#'.$nameView); exit(); };
        $view = new $nameView($this->doorGets);
        return $view->getResponse();
    }
    
    // return the content
    public function getResponse() {
        
        return $this->doorGets->Response;
    
    }
    
    // Call action mehtod name from the action global and
    // load the return method in Response propriety
    protected function getActionMethod() {

        $nameAction = $this->doorGets->Action().'Action';
        if (method_exists($this,$nameAction)) {
            
            $this->Response = $this->$nameAction();
        }else{
            
            $this->Response = $this->indexAction();
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
