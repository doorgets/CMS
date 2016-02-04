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

class doorGetsAjax extends Langue{
    
    private     $controllerNameNow = 'index';

    public      $user = array();
    
    public      $Params = array();
    
    public      $Action = 'index';
    
    public   	$Response;
    
    public   	$Uri;
    
    public   	$Table;

    private   	$Controller;

    private   	$View;
    
    private   	$Model;

    private     $isUserLogged = false;

    public function __construct($controllerName = "index" , $user = array()) {
	    
	    parent::__construct('en');
        
        $this->user                 = $user;
	    $this->controllerNameNow   	= $controllerName;

	    
	    if (!empty($user)) {
	    	$this->isUserLogged = true;
	    }

	    $this->getParams();
	    $this->getController();
	    
	    $this->reloadController();
	    
	    
	}
    
    public function ControllerNameNow() {
        
        return  $this->controllerNameNow;
    
    }
    
    
    public function Params() {
        
        return $this->Params;
    
    }
    
    public function Action() {
        
        return $this->Action;
    
    }

    public function setUser() {
        
        return $this->user;
    
    }

    public function setController($Controller) {
        
        return $this->Controller = $Controller;
    
    }

    public function setModel($Model) {
        
        return $this->Model = $Model;
    
    }

    public function setView($View) {
        
        return $this->View = $View;
    
    }

    public function getUri() {
        
        return $this->doorGets->Uri;
    
    }

    public function User() {
        
        return $this->User;
    
    }

    public function Controller() {
        
        return $this->Controller;
    
    }

    public function Model() {
        
        return $this->Model;
    
    }

    public function View() {
        
        return $this->View;
    
    }
    
    public function genController() {
        
        $nameController = $this->controllerNameNow.'Controller';
        $fileNameController = CONTROLLERS.'ajax/'.$nameController.'.php';
        
        if (!is_file($fileNameController))
        { header('Location:./#'.$fileNameController); exit();  }
        
        require_once $fileNameController;
        
        if (!class_exists ($nameController))
        { header('Location:./#'.$nameController); exit(); }
        
        $this->_ControllerObj = new $nameController($this);
        return $this->_ControllerObj;
    
    }
    
    public function getParams() {
        
        $GET = $POST = array();
        
        if (!empty($_GET)) {
            foreach($_GET as $k=>$v) {
                $GET[$k] = filter_input(INPUT_GET,$k,FILTER_SANITIZE_STRING);
            }
        }
        
        $this->Params['GET'] = $GET;
        
        if (!empty($_POST)) {
            foreach($_POST as $k=>$v) {
                $POST[$k] = filter_input(INPUT_POST,$k,FILTER_SANITIZE_STRING);
            }
        }
        
        $this->Params['POST'] = $POST;

        // Load Uri Module
        if (array_key_exists('uri',$this->Params['GET'])) {
            
            $uri = str_replace('_', '-', $this->Params['GET']['uri']);
            $isContent = $this->dbQS($uri,'_modules','uri');
            if (!empty($isContent)) {
                $this->Table    = '_m_'.$this->getRealUri($uri);
                $this->Uri      = $uri;
            }
            
        }
        
    }

    public function getParam($name) {
        
        $value = '';
        $Params = $this->Params;

        if (array_key_exists($name, $Params['GET'])) {
            $value = $Params['GET'][$name];
        }

        if (array_key_exists($name, $Params['POST'])) {
            $value = $Params['POST'][$name];
        }

        return $value;
    }
    
    public function getController() {
        
        if (array_key_exists('GET',$this->Params) && array_key_exists('controller',$this->Params['GET']) && ctype_alnum($this->Params['GET']['controller']) )
        {
            $this->controllerNameNow = $this->Params['GET']['controller']; 
        }
        
    }
    
    public function getAction() {

        
        if (array_key_exists('GET',$this->Params) && array_key_exists('action',$this->Params['GET']) && ctype_alnum($this->Params['GET']['action']) )
        {
            
            $this->Action = $this->Params['GET']['action']; 

        }
        
    }
    
    
    public function getIsUserLogged() {
        
        return $this->isUserLogged;
    
    }

    public function setControllerName($name) {
        
        $this->controllerNameNow = $name;
        $this->reloadController();
        
    }
    
    public function setAction($name) {
        
        $this->Action = $name;
        $this->reloadController();
        
    }
    
    public function reloadController() {
        
        $this->getAction();
        $this->genController();
        
    }
    
    public function loadUserInfos() {
        
        if (
            array_key_exists('doorgets',$_SESSION)
            && array_key_exists('id',$_SESSION['doorgets'])
            && array_key_exists('groupe',$_SESSION['doorgets'])
       ) {
            
            $this->user['id']       = $_SESSION['doorgets']['id'];
            $this->user['groupe']   = $_SESSION['doorgets']['groupe'];
            $this->user['timezone'] = $this->getWebsiteInfoByAttribute('horaire');
            $this->user['langue']   = $this->getWebsiteInfoByAttribute('langue');
            
        }
        
    }

    public function filterPost($name) {

        $e = array();

        if (!empty($_POST)) {
            
            // captcha verification
            if (
                array_key_exists('captcha_num1',$_POST)
                && array_key_exists('captcha_num2',$_POST)
                && array_key_exists('captcha_result',$_POST)
            ) {
                if ((int)$_POST['captcha_num1'] + (int)$_POST['captcha_num2'] !== (int)$_POST['captcha_result']) {
                    $e['result_captcha'] = 'error';
                }
                
            }
            
            // test token validation
            // if (!$this->isToken($name,$e)) { 
            //   $e[$name.'_token'] = 'error'; 
            // }else{
            //   unset($_POST[$name.'_token']);
            // }

            // $_POST checking
            foreach($_POST as $k=>$v) {
                
                $rest = substr($k, -8);
                $restHtml = substr($k, -5);
                if ($rest !== '_tinymce' && $restHtml !== '_html' && $restHtml !== '_nofi') {
                    $_POST[$k] = filter_input(INPUT_POST, $k, FILTER_SANITIZE_STRING) ;
                }
            }
            
            $HTMLPurifierService = new HTMLPurifierService();
            
            // onclic submit form
            if (isset($_POST[$name.'_submit'])) {
                
                unset($_POST[$name.'_submit']);
                
                foreach($_POST as $k=>$v) {
                    
                    $rest = substr($k, -8);
                    $restHtml = substr($k, -5);
                    $k = str_replace($name.'_','',$k);
                    
                    if ($restHtml !== '_nofi') {
                        
                        if ($rest === '_tinymce' || $restHtml === '_html') {
                            
                            //if (!empty($this->i) && empty($e)) {
                                
                                //$_POST[$k] = stripcslashes($_POST[$k]);
                                $v = str_replace('</textarea','',$v);
                                $v = str_replace('&lt;/textarea','',$v);
                                $v = str_replace('%3c/textarea','',$v);
                                $v = str_replace('&#60;/textarea','',$v);
                                
                                $v = str_replace('<body','',$v);
                                $v = str_replace('&lt;body','',$v);
                                $v = str_replace('%3c/body','',$v);
                                $v = str_replace('&#60;/body','',$v);
                                
                                $this->i[$k] = htmlentities($HTMLPurifierService->purify($v),ENT_QUOTES);
                            //}
                            
                        }else{
                            $this->i[$k] = Convertag::get($v);
                        }          

                    }else{
                        $this->i[$k] = Convertag::get($v);   
                    }
                }
            }
            
            // reset captcha
            if (
                array_key_exists('captcha_num1',$_POST)
                && array_key_exists('captcha_num2',$_POST)
                && array_key_exists('captcha_result',$_POST)
                && empty($e['result_captcha'])
            ) {
                
                unset($_POST['captcha_num1']);
                unset($_POST['captcha_num2']);
                unset($_POST['captcha_result']);
                
            }    
        }
        
        return $e;
    }
    
    public function isToken($name,$e) {

        if (
            array_key_exists('doorGetsForms', $_SESSION)
            && array_key_exists($name, $_SESSION['doorGetsForms']) 
            && array_key_exists($name.'_token', $_SESSION['doorGetsForms'][$name])
            && array_key_exists($name.'_token',$_POST)
        ){

            if ($_SESSION['doorGetsForms'][$name][$name.'_token'] == $_POST[$name.'_token']) {
              
                if (!empty($e)) {

                    unset($_SESSION['doorGetsForms'][$name]);
                    unset($_POST[$name.'_token']);

                }

                return true;
            }
        }

        return false;
    }

    public function __destruct() {
        
        parent::__destruct();
        
    }
}
