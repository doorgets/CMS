<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
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


class doorgetsInstaller extends Langue{
    
    protected $stepsList;
    
    protected $Step;
    
    protected $Language;
    
    protected $TimeZone;
    
    protected $doorgets;

    public $Params = array();
    
    public $form = array();
    
    private $content;
    
    public $hasRtl = false;

    public function __construct() {
        
        parent::__construct();
        $this->getParams();

        $hasOneclickInstaller = $this->isOneclickInstaller();
        if ($hasOneclickInstaller) {
            $this->checkModulesAndExtensions();
            $this->initOneclickInstaller();
        } else {
            $this->init();
        }
        $this->hasRtl = ($this->Language === 'iw' || $this->Language === 'ar')?true:false; 
    }
    
    public function checkModulesAndExtensions() {
        $hasErrors = $this->getNeededApacheModulesAndPHPExtensions();
        if (!empty($hasErrors)) {
            $this->_errorJson('Apache Modules or PHP extensions problems',$hasErrors);
        }
    }

    public function initOneclickInstaller() {
        
        $formData = $this->getFormDataFromProvider();
        if (empty($formData['error'])) {
            
            if (!array_key_exists('database_password',$formData['success'])) {
                $formData['success']['database_password'] = '';
            }
            $this->installByOneclick($formData['success']);
            
            $this->_successJson($formData['success']);

            
        } else {
            $this->_errorJson('Request error',$formData['error']);
        }
        
        exit();
        //die('OneClick');
    }

    public function init() {
        
        $this->initStepsList();
        $this->initStepNow();
        $this->checkGoBackModel();
        $this->initLanguage();
        $this->initTimeZone();
        $this->initController();
        
    }
    
    public function getStep() {
        return $this->Step;
    }
    
    public function getTimeZone() {
        return $this->TimeZone;
    }
    
    public function getStepsList() {
        return $this->stepsList;
    }
    
    public function getLanguage() {
        return $this->Language;
    }
    
    public function initStepsList() {
        
        $stepList = array(
            
            1 => 'root',
            2 => 'licence',
            3 => 'chmod',
            4 => 'database',
            5 => 'website',
            6 => 'admin',
            7 => 'polymorphic'
            
        );
        
        return $this->stepsList = $stepList;
        
    }
    
    
    private function initStepNow() {
        
        if (!array_key_exists('doorgetsStep',$_SESSION)) { $_SESSION['doorgetsStep'] = $this->stepsList[1]; }
        $this->Step = $_SESSION['doorgetsStep'];
        if (empty($this->Step)) { $this->Step = $_SESSION['doorgetsStep'] = $this->stepsList[1]; }
        
    }
    
    private function initLanguage() {
        
        if (!array_key_exists('doorgetsLanguage',$_SESSION)) { $_SESSION['doorgetsLanguage'] = 'en'; }
        $this->Language = $_SESSION['doorgetsLanguage'];
        
    }
    
    private function initTimeZone() {
        
        if (!array_key_exists('doorgetsTimeZone',$_SESSION)) { $_SESSION['doorgetsTimeZone'] = 'Europe/Paris'; }
        $this->TimeZone = $_SESSION['doorgetsTimeZone'];
        
    }
    
    private function initController() {
        
        $nameStep = $this->getStep();
        
        $nameController = $nameStep.'Controller';
        $fileNameController = CONTROLLERS.'/'.$nameController.'.php';
        
        if (!is_file($fileNameController))
        { echo 'Controller not found : ' . $fileNameController; exit();  }
        require_once $fileNameController;
        
        if (!class_exists ($nameController))
        { echo 'Class  not found : ' . $nameController.' : '; exit(); }
        
        $this->doorgets = new $nameController($this);
        return $this->doorgets;
    }
    
    public function setContent($content) {
        
        $this->content = $content;
        
    }
    
    public function setStep($name) {
        
        $this->Step = $_SESSION['doorgetsStep'] = $name;
        
    }
    
    private function checkGoBackModel() {
        
        $form = $this->form['prev_step']      = new Formulaire('doorgets_goback');
        
        if (!empty($form->i)) {
            
            $StepsList = $this->getStepsList();
            $iPos = 1; $pos = array_keys($StepsList,$this->getStep());
            
            if (!empty($pos)) { $pos = (int)$pos[0]; }
            
            if ($pos >= 1) {
                
                $prevPos = $pos - 1;
                $this->setStep($StepsList[$prevPos]);
                header("Location:".$_SERVER['REQUEST_URI']); exit();
                
            }
        }
        
    }
    
    public function getHtmlContent() {
        
        $tpl = Template::getView('wrapper');
        ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
        return $out;
    
    }
    
    public function getHtmlHeader() {
        
        $myLanguage = $this->myLanguage;
        
        $tpl = Template::getView('header');
        ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
        return $out;
    }
    
    public function getHtmlGoBack() {
        
        $tpl = Template::getView('goback');
        ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
        return $out;
    }
    
    public function getHtmlFooter() {
        
        $myLanguage = $this->myLanguage;
        
        $tpl = Template::getView('footer');
        ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
        return $out;
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

    }

    
}