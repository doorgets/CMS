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


class FormView extends doorGetsAjaxView{
    
    public $genform = array();
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $this->doorGets->checkAjaxMode();
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        // $arrayAction = array(
            
        //     'index'         => 'Home',
        //     'sendForm'      => 'Send form',
            
        // );
        
        // $out = '';
        
        // $allModules = $this->doorGets->getAllActiveModules();
        // $uri_module = $this->doorGets->Uri;
        // $uri_module_real = $this->doorGets->getRealUri($uri_module);
        // $this->doorGets->myLanguage = $this->doorGets->getLangueTradution();
        // $errors = $this->doorGets->filterPost($uri_module);

        // $params = $this->doorGets->Params();

        // if (array_key_exists($this->Action,$arrayAction))
        // {
        // 	switch($this->Action) {
            
	       //      case 'index':
	       //          break;

	       //      case 'sendForm':

        //             $sizeMax = 8192000;
        
        //             $typeFile["application/msword"] = "data/_form/";
        //             $typeFile["application/vnd.openxmlformats-officedocument.wordprocessingml.document"] = "data/_form/";
                    
        //             $typeFile["image/png"] = "data/_form/";
        //             $typeFile["image/jpeg"] = "data/_form/";
        //             $typeFile["image/gif"] = "data/_form/";
                    
        //             $typeFile["application/zip"] = "data/_form/";
        //             $typeFile["application/x-zip-compressed"] = "data/_form/";
        //             $typeFile["application/pdf"] = "data/_form/";
        //             $typeFile["application/x-shockwave-flash"] = "data/_form/";
                    
        //             $typeExtension["application/msword"] = "doc";
        //             $typeExtension["application/vnd.openxmlformats-officedocument.wordprocessingml.document"] = "doc";
                    
        //             $typeExtension["image/png"] = "png";
        //             $typeExtension["image/jpeg"] = "jpg";
        //             $typeExtension["image/gif"] = "gif";
                    
        //             $typeExtension["application/zip"] = "zip";
        //             $typeExtension["application/x-zip-compressed"] = "zip";
                    
        //             $typeExtension["application/pdf"] = "pdf";
        //             $typeExtension["application/x-shockwave-flash"] = "swf";
                    
        //             if (array_key_exists($uri_module,$allModules)) {
            
        //                 $Module = $allModules[$uri_module];
        //                 $titre      = $Module['all']['titre'];
        //                 $formulaire =  unserialize(base64_decode($Module['all']['extras']));
        //                 //$form = $this->doorGets->genform[$uri_module_real]  = new Formulaire($uri_module_real);
                        
        //                 $dataGenForm = $this->doorGets->_getGenFormFields($formulaire);
                        
        //             }

        //             $errors = array_merge($errors,$this->initHtmlForm($uri_module_real,$Module,$dataGenForm));

        //             if (empty($errors)) {
        //                 $response = array(
        //                     'code' => 200,
        //                     'data' => $this->doorGets->__("Votre message a été envoyé").', '.$this->doorGets->__("nous prendrons contact avec vous rapidement").', '.$this->doorGets->__("merci").'.'
        //                 );
        //             } else {
        //                 $response = array(
        //                     'code' => 400,
        //                     'data' => $errors
        //                 );   
        //             }
                    
	       //          break;

	       //  }
        // }

        return json_encode($response, JSON_FORCE_OBJECT);
    }

    private function initHtmlForm($uri_form = '',$Module= array(),$data = array()) {

        $errors = array();
        $params = $this->doorGets->Params();
        $form = $params['POST'];

        foreach($data as $k=>$v) {
                    
            $value = '';
            $nameKey = $uri_form.'_'.$k;
            // test des champs obligatoires
            
            if (
                $v['obligatoire'] === 'yes'
                && ( !array_key_exists($nameKey,$form) || empty($form[$nameKey]) )
                && $v['type'] !== 'file'
            ) {
                
                $errors[$nameKey] = 'empty';
            }
            
            // test des filtres
            if ($v['type'] === 'text') {
                
                $value = $form[$nameKey];
                
                switch($v['filtre']) {
                    
                    case 'email':
                        
                        $isEmail = filter_var($value,FILTER_VALIDATE_EMAIL);
                        if (empty($isEmail)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'url':
                        
                        $isURL = filter_var($value,FILTER_VALIDATE_URL);
                        if (empty($isURL)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'alpha':
                        
                        $isAlpha = ctype_alpha($value);
                        if (empty($isAlpha)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'num':
                        
                        $isNum = ctype_digit($value);
                        if (empty($isNum)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'alphanum':
                        
                        $isAlphaNum = ctype_alnum($value);
                        if (empty($isAlphaNum)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                }
                
            }
            
            if ($v['type'] === 'file' && $v['obligatoire'] === 'yes') {
                
                
                if ( isset($_FILES[$nameKey]) &&  $_FILES[$nameKey]['error'] != 0) {
                
                    $errors[$nameKey] = 'ok';
                    
                }
                
                if ( isset($_FILES[$nameKey]) && empty($this->Controller->form->e)) {
                    
                    if (!array_key_exists($_FILES[$nameKey]["type"],$typeFile) ) {
                        
                        $errors[$nameKey] = 'ok';
                        
                    }else{
                        
                        $extension = $typeExtension[$_FILES[$nameKey]["type"]];
                        
                        if ($v['file-type'][$extension] !== 1) {
                            
                            $errors[$nameKey] = 'ok';
                            
                        }
                        
                    }
                    
                    if ($_FILES[$nameKey]["size"] > $sizeMax) {
                        
                        $errors[$nameKey] = 'ok';
                        
                    }
                }
            }
        }
        
        if (empty($errors)) {
            
            foreach($data as $k=>$v) {
                
                if ($v['type'] === 'file' && $_FILES[$nameKey]['error'] != 4) {
                    
                    $ttff = $_FILES[$nameKey]["type"];
                    $sSize = $_FILES[$nameKey]['size'];
                    $ttf = $typeExtension[$ttff];
                    
                    $uni = time().'-'.uniqid($ttf);
                    
                    $nameFileImage = $uni.'-doorgets.'.$ttf;
                    
                    $uploaddir = $typeFile[$ttff];
                    $uploadfile = BASE.$uploaddir.$nameFileImage;
                    
                    if (move_uploaded_file($_FILES[$nameKey]['tmp_name'], $uploadfile)) {
                        $form[$k] = $nameFileImage;
                    }
                    
                }
                
            }
        }

        if (empty($errors) )
        {
            $dOut = array();

            foreach($form as $key=>$val) {
                $key = str_replace($uri_form.'_','',$key);
                if (array_key_exists($key,$data)) {
                    $key = str_replace('-','_',$key);
                    $dOut[$key] = $val;
                }
                
            }

            if (!empty($dOut)) {

                $dOut['date_creation']  = time();
                $dOut['adresse_ip']     = $_SERVER['REMOTE_ADDR'];
                $dOut['codechallenge']  = $form[$uri_form.'_codechallenge'];
                
                $isChallenge = $this->doorGets->dbQS($form[$uri_form.'_codechallenge'],'_m_'.$uri_form,'codechallenge');
                if (empty($isChallenge)) {
                    
                    $idNewForm = $this->doorGets->dbQI($dOut,'_m_'.$uri_form);
                    
                    // Mail Sender Notification
                    $moduleInfo = $this->doorGets->dbQS($uri_form,'_modules','uri');
                    if (!empty($moduleInfo) && !empty($moduleInfo['notification_mail'])) {

                        $_email = $this->doorGets->configWeb['email'];
                        $_lg    = $this->doorGets->configWeb['langue'];
                        $_sujet = '['.$uri_form.'] '.$this->doorGets->__("Vous avez un nouveau message").' - '.$idNewForm;
                        
                        new SendMailAlert($_email,$_sujet,'',$this->doorGets);
                        
                    }
                    
                }else{
                    $_POST = array();
                }
            }
            
        }

        return $errors;
    }
}
