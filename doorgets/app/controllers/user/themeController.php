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


class ThemeController extends doorGetsUserController{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }

        if (!in_array('themes',$doorGets->user['liste_module_interne'])
            || ( in_array('themes',  $doorGets->user['liste_module_interne']) && SAAS_ENV && !SAAS_THEME)) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }
    } 
    
    public function indexAction() {
        
        $this->doorGets->Form  = new Formulaire('index_theme');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addAction() {
        

        if (SAAS_ENV && !SAAS_THEME_ADD) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form  = new Formulaire('add_theme');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }

    public function importAction() {
        

        if (SAAS_ENV && !SAAS_THEME_ADD) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form  = new Formulaire('import_theme');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function editAction() {
        
        if (SAAS_ENV && !SAAS_THEME_EDIT) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form['edit']  = new Formulaire('edit_theme');
        $this->doorGets->Form['download']  = new Formulaire('download_theme');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function deleteAction() {
        
        if (SAAS_ENV && !SAAS_THEME_DELETE) {

            FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form  = new Formulaire('delete_theme');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
}
