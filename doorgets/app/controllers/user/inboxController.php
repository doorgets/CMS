<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


class InboxController extends doorGetsUserController{
    
    public function __construct(&$doorGets) {
        
        $doorGets->Table = '_dg_inbox';
        parent::__construct($doorGets);
        
        $User           = $doorGets->user;
        $params         = $doorGets->Params();
        $redirectUrl    = './?controller=myinbox';
        
        if (empty($User)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        if (!in_array('inbox',$User['liste_module_interne'])
            || ( in_array('inbox',  $doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_INBOX)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        // get Content for edit / delete
        if (array_key_exists('id',$params['GET']))
        {
            
            $id = $params['GET']['id'];
            $isContent = $doorGets->dbQS($id,$doorGets->Table);
            if (!is_numeric($id)) { $id = '-!-'; }
            if (empty($isContent)) {
                
                FlashInfo::set($doorGets->l("Le contenu n'existe pas"),"error");
                header('Location:'.$redirectUrl); exit();
                
            }

        }

    }
    
    public function indexAction() {
        
        $this->doorGets->Form['_search']  = new Formulaire('doorGets_search');
        $this->doorGets->Form['_massdelete']      = new Formulaire($this->doorGets->controllerNameNow().'_massdelete');
        $this->doorGets->Form['_search_filter']   = new Formulaire('doorGets_search_filter');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    
    public function selectAction() {
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function deleteAction() {
        
        $this->doorGets->Form = new Formulaire($this->doorGets->controllerNameNow().'_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function massdeleteAction() {
        
        $this->doorGets->Form['massdelete_index'] = new Formulaire($this->doorGets->controllerNameNow().'_massdelete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    
}
