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


class TaxesController extends doorGetsUserController {
    
    
    public function __construct(&$doorGets) {
        
        $this->doorGets = $doorGets;
        parent::__construct($doorGets);
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        if (!in_array('taxes',$doorGets->user['liste_module_interne']) 
            || ( in_array('taxes',  $doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_ADDRESS)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }
        
        $me             = $doorGets->user;
        $params         = $doorGets->Params();
        $redirectUrl    = './?controller=taxes';
        
        // get Content for edit / delete
        if (array_key_exists('id',$params['GET']))
        {
            $id = $params['GET']['id'];
            $isContent = $doorGets->dbQS($id,'_taxes');
            if (!is_numeric($id)) { $id = '-!-'; }
            if (empty($isContent)) {
            //var_dump($isContent);
            //exit();
                FlashInfo::set($doorGets->l("Le contenu n'existe pas"),"error");
                header('Location:'.$redirectUrl); exit();
                
            }

        }
    }
    
    public function indexAction()
    {
        
        $this->doorGets->Form = new Formulaire('taxes_index');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    } 

    public function addAction()
    {
        
        $this->doorGets->Form = new Formulaire('taxes_add');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    } 

    public function editAction()
    {
        
        $this->doorGets->Form = new Formulaire('taxes_edit');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    } 

    public function deleteAction()
    {
        
        $this->doorGets->Form = new Formulaire('taxes_delete');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
        
    }   
}