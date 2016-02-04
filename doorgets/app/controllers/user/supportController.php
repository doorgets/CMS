<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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


class SupportController extends doorGetsUserController{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
        $User = $doorGets->user;

        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        if ((
                !in_array('support',$doorGets->user['liste_module_interne']) 
                && !in_array('support_client',$doorGets->user['liste_module_interne'])
            ) ||  ((
                in_array('support',$doorGets->user['liste_module_interne']) 
                || in_array('support_client',$doorGets->user['liste_module_interne'])
            ) && SAAS_ENV && !SAAS_SUPPORT)
        ){

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {

            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_support');
            
            if (empty($isContent)) {
                FlashInfo::set($this->doorGets->__("Le contenu n'existe pas"),"error");
                header('Location:./?controller=support'); exit();
                $this->isContent = $isContent;
            }
            
            if (!in_array('support',$doorGets->user['liste_module_interne']) && $User['id'] !== $isContent['id_user']) {
                FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce ticket"),"error");
                header('Location:./?controller=support'); exit();
            }
        }
    }

    public function indexAction() {
        
        $this->doorGets->Form['_search']            = new Formulaire('doorGets_search');
        $this->doorGets->Form['_massdelete']        = new Formulaire($this->doorGets->controllerNameNow().'_massdelete');
        $this->doorGets->Form['_search_filter']     = new Formulaire('doorGets_search_filter');
        
        $this->getRequest();

        return $this->getView();

    }

    public function addAction() {
        
        $this->doorGets->Form = new Formulaire($this->doorGets->controllerNameNow().'_add');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function ticketAction() {
        
        $this->doorGets->Form = new Formulaire($this->doorGets->controllerNameNow().'_ticket');

        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function closeAction() {
        
        $this->doorGets->Form = new Formulaire($this->doorGets->controllerNameNow().'_close');

        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editAction() {
        
        $this->doorGets->Form = new Formulaire($this->doorGets->controllerNameNow().'_edit');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

}
