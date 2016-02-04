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


class doorgetsWebsiteUserView{
    
    public $Website;
    
    public $loginUrl = '';

    public $registerUrl = '';

    public 
        $user_can_list,
        $user_can_show,
        $user_can_add,
        $user_can_edit,
        $user_can_delete,
        $user_can_modo = false
    ;
    
    public $userPrivilege = array (

        'list'      => false,
        'show'      => false,
        'add'       => false,
        'edit'      => false,
        'delete'    => false,
        'modo'      => false

    );

    public 
        $module_public_module,
        $module_public_comment,
        $module_public_add = false
    ;

    public $modulePrivilege = array (

        'public_module'    => false,
        'public_comment'   => false,
        'public_add'       => false,

    );

    public function __construct(&$doorGetsWebsiteUser) {
        
        $this->Website = $doorGetsWebsiteUser;
        
        $website     = $this->Website;
        $moduleName  = $website->getModule();
        $modules     = $website->getActiveModules();

        $user        = $website->_User;

        if (!empty($user) && array_key_exists($moduleName,$modules)) {
            
            $this->user_can_list    = (in_array($modules[$moduleName]['id'], $user['liste_module_list'])) ? true : false;
            $this->user_can_show    = (in_array($modules[$moduleName]['id'], $user['liste_module_show'])) ? true : false;
            $this->user_can_add     = (in_array($modules[$moduleName]['id'], $user['liste_module_add'])) ? true : false;
            $this->user_can_edit    = (in_array($modules[$moduleName]['id'], $user['liste_module_edit'])) ? true : false;
            $this->user_can_delete  = (in_array($modules[$moduleName]['id'], $user['liste_module_delete'])) ? true : false;
            $this->user_can_modo    = (in_array($modules[$moduleName]['id'], $user['liste_module_modo'])) ? true : false;

            $this->userPrivilege = array (

                'list'      => $this->user_can_list,
                'show'      => $this->user_can_show,
                'add'       => $this->user_can_add,
                'edit'      => $this->user_can_edit,
                'delete'    => $this->user_can_delete,
                'modo'      => $this->user_can_modo

            );
        }

        if (array_key_exists($moduleName,$modules)) {
            
            $this->module_public_module     = ((bool) (int) $modules[$moduleName]['all']['public_module']) ? false : true;
            $this->module_public_comment    = ((bool) (int)$modules[$moduleName]['all']['public_comment']) ? false : true;
            $this->module_public_add        = ((bool) (int)$modules[$moduleName]['all']['public_add']) ? false : true;
            
            $this->modulePrivilege = array (

                'public_module'    => $this->module_public_module,
                'public_comment'   => $this->module_public_comment,
                'public_add'       => $this->module_public_add,

            );

            $tplPassword = $this->checkModulePassword(
                $modules[$moduleName]['all']['with_password'],
                $modules[$moduleName]['all']['password'],
                $moduleName
            );
            
            if (!empty($tplPassword)) {
                return $tplPassword;
            }
        }

        $cLan = count($website->allLanguagesWebsite);
        $toLangue = ''; 
        if ($cLan > 1 && !empty($user)) {  
            $toLangue = $user['langue'].'/'; 
        } elseif($cLan > 1 ) {
            $toLangue = $website->myLanguage.'/';
        }

        $this->loginUrl = URL_USER.$toLangue.'?controller=authentification';
        $this->registerUrl = URL_USER.$toLangue.'?controller=authentification&action=register';
        
    }
    
    public function getContent() {
        
        if ($this->Website->getPosition() === 'root') {
            return $this->indexView();
        }
        if ($this->Website->getPosition() === 'category') {
            return $this->categoryView();
        }
        if ($this->Website->getPosition() === 'content') {
            return $this->contentView();
        }
        
    }
    
    public function indexView() {
        
        return 'Listing module home';
    }
    
    public function categoryView() {
        
        return 'Listing in category module';
    }
    
    public function contentView() {
        
        return 'Content in module';
    }

    public function checkModulePassword($withPassword,$password,$uriModule) {
        
        $out = '';
        $hasPassword = false;

        if (!array_key_exists('doorgets_secure',$_SESSION)) {
            $_SESSION['doorgets_secure'] = array();
        }

        if (
            array_key_exists('doorgets_secure',$_SESSION) 
            && array_key_exists($uriModule,$_SESSION['doorgets_secure'])
            && $_SESSION['doorgets_secure'][$uriModule] === $password
        ) {
            $hasPassword = true;
        }

        if (!empty($withPassword) && !empty($password) && !$hasPassword) {

            $formPassword = new Formulaire('password');

            if (!empty($formPassword->i)) {

                if (empty($formPassword->i['password']) || $formPassword->i['password'] !== $password) {
                    $formPassword->e['password_password'] = 'ok';
                }

                if (empty($formPassword->e)) {
                    
                    $_SESSION['doorgets_secure'][$uriModule] = $password;
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                }
            }

            $tplPassword = Template::getWebsiteView('user/user_password',$this->Website->getTheme());
            ob_start(); if (is_file($tplPassword)) { include $tplPassword; }  $out = ob_get_clean();   
        }
        
        return $out;
    }
}