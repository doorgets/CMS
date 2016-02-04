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


class ModuleCategoryController extends doorGetsUserController{
    
    public function __construct(&$doorGets) {
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        // Test if $uri module is valid
        $isUri = array();
        $User                   = $doorGets->user;
        $params                 = $doorGets->Params();
        $lgActuel               = $doorGets->getLangueTradution();

        $moduleInfos            = $doorGets->moduleInfos($doorGets->Uri,$lgActuel);

        if (array_key_exists('uri',$params['GET']) )
        {
            
            $uri = $params['GET']['uri'];
            $isUri = $doorGets->dbQS($uri,'_modules','uri');
            
        }

        $moduleInfos = $doorGets->moduleInfos($doorGets->Uri,$lgActuel);

        parent::__construct($doorGets);
        
        $this->table = '_categories';
            
        $lgActuel = $doorGets->getLangueTradution();
        $redirectUrl = './?controller='.$doorGets->controllerNameNow().'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;
        $redirectUrlModule = './?controller=modules&lg='.$lgActuel;
        
        // If isn't valid uri do rediction to modules controller
        if (!array_key_exists('uri',$params['GET']) || empty($params['GET']['uri']) || empty($this->doorGets->Uri)) {
            
            FlashInfo::set($doorGets->__("Le module n'existe pas"),"error");
            header('Location:'.$redirectUrlModule);
            exit();
            
        }
        
        // get Content for edit / delete
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $doorGets->dbQS($id,$this->table);
            if (!is_numeric($id)) { $id = '-!-'; }
            if (empty($isContent)) {
                
                FlashInfo::set($doorGets->__("Le contenu n'existe pas"),"error");
                header('Location:'.$redirectUrl);
                exit();
                
            }
            
        }

        if (
            !in_array($moduleInfos['id'], $this->doorGets->user['liste_module_admin'])
        ) {
            
            FlashInfo::set($doorGets->l("Vous n'avez pas les droits pour gérer les catégories"),"error");
            header('Location:./'); exit();

        }
        
    }
    
    public function indexAction() {
        
        $this->doorGets->Form['_position_down'] = new Formulaire('_position_down');
        $this->doorGets->Form['_position_up'] = new Formulaire('_position_up');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    
    public function addAction() {
        
        $this->doorGets->Form = new Formulaire('modulecategory_add');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editAction() {
        
        $this->doorGets->Form = new Formulaire('modulecategory_edit');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function deleteAction() {
        
        $this->doorGets->Form = new Formulaire('modulecategory_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    
}
