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

class doorGetsUser extends Langue{
    
    private     $controllerNameNow = 'index';

    public      $langueZone = '';
    
    private     $zoneArea;

    public      $user = array();
    
    public      $Params = array();
    
    public      $Action = 'index';
    
    public   	$Content;
    
    public   	$Uri;

    public      $Categories;
    
    public   	$Table;

    private   	$Controller;

    private   	$View;
    
    private   	$Model;

    public   	$Form;

    private     $isUserLogged = false;
    private     $isAdminLogged = false;

    public      $isRtlLanguage = false;

    public      $timeExecution;

    public function __construct($id_Website, $controllerName = "index" , $langue = 'fr', $zoneArea = 'bigadmin' , $user = array()) {
        
        $this->timeExecution = microtime(true);

        $this->langueZone           = $langue;
        $this->zoneArea         	= $zoneArea;
        $this->controllerNameNow   	= $controllerName;
        $this->user             	= $user;
        
        if (empty($langue)) {
            
            $db = new CRUD();
            $isWebsite = $db->dbQS($id_Website,'_website');
            if (!empty($isWebsite)) {
                
                $langue = $isWebsite['langue_front'];

                $isWebsite['langue_groupe'] = unserialize($isWebsite['langue_groupe']);
                $isWebsite['langue_groupe'][$langue] = $langue;
                
                $urlToRedirect = URL_USER.$langue.'/';
                
                $cLangues = count($isWebsite['langue_groupe']);
                if ($cLangues === 1) {
                    $urlToRedirect = URL;
                }
                
                if ($cLangues > 1) {
                    header('HTTP/1.1 301 Moved Permanently', false, 301);
                    header('Location: '.$urlToRedirect); exit();    
                }
                
            }    
        }

        if (!empty($this->user) && $zoneArea === 'user' &&   $_SESSION['doorgets_user']['langue'] !== $langue  && $controllerName !== 'changelangue')  {
            header('Location: '.URL_USER.$_SESSION['doorgets_user']['langue'].'/'); exit(); 
        }

        parent::__construct($langue);
        
        if (!empty($this->user) && !empty($this->user['timezone'])) {
            
            date_default_timezone_set($this->user['timezone']);
            
        }
        
        
        $this->getParams();
        $this->getController();
        
        $this->reloadController();
        
        $this->isRtlLanguage = (in_array($this->myLanguage,Constant::$rtlLanguage)) ? true : false;
    }
    
    public function ControllerNameNow() {
        
        return  $this->controllerNameNow;
    
    }
    
    public function zoneArea() {
        
        return  $this->zoneArea;
    
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
        $fileNameController = CONTROLLERS.$this->zoneArea.'/'.$nameController.'.php';
        
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
            
            $uri = $this->Params['GET']['uri'];
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

        $_actions = array('index','register','forget','reset','activation','logout');

        if (array_key_exists('GET',$this->Params) && array_key_exists('action',$this->Params['GET']) && ctype_alnum($this->Params['GET']['action']) )
        {
            
            $this->Action = $this->Params['GET']['action']; 

            if (!in_array($this->Params['GET']['action'], $_actions) && empty($this->user))
            { 
                $this->Action = 'index';
            }
        }
        
    }
    
    public function getRubrique() {
        
        if (array_key_exists('GET',$this->Params) && array_key_exists('action',$this->Params['GET']) && ctype_alnum($this->Params['GET']['rubrique']) )
        {
            $this->Action = $this->Params['GET']['rubrique']; 
        }
        
    }
    
    public function getIsUserLogged() {
        
        return $this->isUserLogged;
    
    }

    public function getIsAdminLogged() {
        
        return $this->isAdminLogged;
    
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
    
    public function _ckeckVersion() {
        
        $out['isForDownload']   = true;
        $out['isOkForCurl']     = true;
        $out['myVersion']       = 0.0;
        $out['dgVersion']       = 0.0;
        
        $curl = 'on';
        
        if (!function_exists('curl_version')) {$out['isOkForCurl'] = false;$curl = 'off';}
        
        $myVersion = (float)$this->configWeb['version_doorgets'];
        
        $clientInfos = urlencode(serialize($_SERVER));
        $url  = 'http://www.doorgets.com/checkversion/?i='.KEY_DOORGETS.'&u='.URL.'&v='.$myVersion.'&c='.$curl.'&s='.$clientInfos;
        
        $content = json_decode(@file_get_contents($url));
        $dgVersion = (float)$content;
        
        $myVersion = number_format($myVersion,1);
        $dgVersion = number_format($dgVersion,1);
        
        $destination = BASE."update/doorgets_update_".$myVersion."-to-".$dgVersion.".zip";
        if (is_file($destination)) { $out['isForDownload'] = false; }
        
        $out['myVersion']      = $myVersion;
        $out['dgVersion']      = $dgVersion;
        
        return $out;
        
    }
    
    public function _newVersion() {
        
        $idWebsite      = (int)$this->configWeb['id'];
        $dateCreated    = (int)$this->configWeb['date_creation'];
        
        $out['isForDownload']   = true;
        $out['isOkForCurl']     = true;
        $out['myVersion']       = 0.0;
        $out['dgVersion']       = 0.0;
        
        if (empty($dateCreated)) {
            $dateCreated = time();
        }
        
        $timerForUp = time() - (3600 * 25);
        
        $statut = (int)$this->configWeb['statut_version'];
        if (!empty($statut)) { return true; }
        
        if ($dateCreated < $timerForUp) {
            
            $out = $this->_ckeckVersion();
            if (!empty($out['myVersion']) && $out['myVersion'] < $out['dgVersion']) {
                
                $this->dbQU($idWebsite,array('date_creation'=>time(),'statut_version'=>1),'_website');
                return true;
            
            }
            $this->dbQU($idWebsite,array('date_creation'=>time(),'statut_version'=>0),'_website');
            
        }
        
        
        return false;
    }
    
    public function __destruct() {
        
        parent::__destruct();
        $timeend=microtime(true);
        $this->timeExecution = number_format($timeend - $this->timeExecution, 3);
        // echo '<div class="container" style="z-index:99999;margin:30px auto;text-align:right;">';
        // echo $this->timeExecution;
        // echo '</div>';
    }
}
