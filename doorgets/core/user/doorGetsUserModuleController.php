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


class doorGetsUserModuleController extends doorGetsUserController{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

        $User                   = $doorGets->user;
        $params                 = $doorGets->Params();
        $lgActuel               = $doorGets->getLangueTradution();

        $redirectUrlModule      = './?controller=modules&lg='.$lgActuel;
        $moduleInfos            = $doorGets->moduleInfos($doorGets->Uri,$lgActuel);

        $redirectUrl            = './?controller=module'.$moduleInfos['type'].'&uri='.$doorGets->Uri.'&lg='.$lgActuel;
        
        if (empty($doorGets->user)) {

            header('Location:./?controller=authentification&error-login=true&back='.urlencode($_SERVER['REQUEST_URI'])); exit();
        }  

        // If isn't valid uri do rediction to modules controller
        if (
            !array_key_exists('uri',$params['GET'])
            || empty($params['GET']['uri']) || empty($doorGets->Uri)
            
        ) {

            FlashInfo::set($doorGets->l("L'URI n'existe pas"),"error");
            header('Location:'.$redirectUrlModule.'###');
            exit();
            
        }
        
        if ('module'.$moduleInfos['type'] !== $doorGets->controllerNameNow() )
        {
            
            FlashInfo::set($doorGets->l("Erreur"),"error");
            header('Location:'.$redirectUrl.'#'.$moduleInfos['type'].'-'.$doorGets->controllerNameNow());
            exit();
            
        }

        if (
            !in_array($moduleInfos['id'], $this->doorGets->user['liste_module'])
            && !in_array($moduleInfos['id'], $this->doorGets->user['liste_widget']) 

        ) {

            FlashInfo::set($doorGets->l("Vous n'avez pas les droits pour afficher ce module"),"error");
            header('Location:./'); exit();

        }

        // check for category id
        if (array_key_exists('categorie',$params['GET']))
        {
            
            $idCategorie = $params['GET']['categorie'];
            $doorGets->loadCategories($doorGets->Uri);
            $allCategories = $doorGets->categorieSimple;
            unset($allCategories[0]);
            if (!is_numeric($idCategorie)) { $idCategorie = '-!-'; }
            if (!is_numeric($idCategorie) || !array_key_exists($idCategorie,$allCategories))
            {
                
                FlashInfo::set($doorGets->l("La catégorie '$idCategorie' n'existe pas"),"error");
                header('Location:'.$redirectUrl); exit();
                
            }
            
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
        
        $this->doorGets->Form['_search']          = new Formulaire('doorGets_search');
        $this->doorGets->Form['_position_down']   = new Formulaire('_position_down');
        $this->doorGets->Form['_position_up']     = new Formulaire('_position_up');
        $this->doorGets->Form['_massdelete']      = new Formulaire($this->doorGets->controllerNameNow().'_massdelete');
        
        $this->doorGets->Form['_search_filter']   = new Formulaire('doorGets_search_filter');
        
        // Generate the model
        $this->getRequest();
        
        // return the view
        return $this->getView();
    
    }
    
    public function addAction() {
        
        $User                   = $this->doorGets->user;
        $params                 = $this->doorGets->Params();
        $lgActuel               = $this->doorGets->getLangueTradution();

        $redirectUrlModule      = './?controller=modules&lg='.$lgActuel;
        $moduleInfos            = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);

        if (!in_array($moduleInfos['id'], $User['liste_module_add'])) {
            FlashInfo::set($this->doorGets->l("Vous n'avez pas les droits pour ajouter"),"error");
            header('Location:./'); exit();
        }

        $this->doorGets->Form = new Formulaire($this->doorGets->controllerNameNow().'_add');
        
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
