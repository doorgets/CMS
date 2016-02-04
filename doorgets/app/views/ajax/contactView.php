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


class ContactView extends doorGetsAjaxView{
    
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

        $arrayAction = array(
            
            'index'         => 'Home',
            'sendForm'      => 'Send form',
            
        );
        
        $out = '';
        
        $allModules = $this->doorGets->getAllActiveModules();
        $uri_module = $this->doorGets->Uri;
        $uri_module_real = $this->doorGets->getRealUri($uri_module);
        $this->doorGets->myLanguage = $this->doorGets->getLangueTradution();
        $errors = $this->doorGets->filterPost($uri_module);
        $response['data'] = $errors;
        

        $params = $this->doorGets->Params();

        if (array_key_exists($this->Action,$arrayAction))
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'sendForm':

                    if (array_key_exists($uri_module,$allModules)) {
                
                        $errors = array_merge($errors,$this->initHtmlForm($uri_module_real,$allModules));
                        if (empty($errors)) {
                            $response = array(
                                'code' => 200,
                                'data' => $this->doorGets->__("Votre message a été envoyé").', '.$this->doorGets->__("nous prendrons contact avec vous rapidement").', '.$this->doorGets->__("merci").'.'
                            );
                        } else {
                            $response = array(
                                'code' => 400,
                                'data' => $errors
                            );   
                        }
                    } 
	                break;

	        }
        }

        return json_encode($response, JSON_FORCE_OBJECT);
    }

    private function initHtmlForm($uri_module = '',$allModules) {

        $errors = array();
        $params = $this->doorGets->Params();
        $form = $params['POST'];
        
        $fields = array('email','nom','sujet','message','telephone');
        $required = array('email','nom','sujet','message');
        $_uri_module = str_replace('_', '-', $uri_module);
        $Module = $allModules[$_uri_module];
        $titre      = $Module['all']['titre'];

        if (empty($form)) {
            $errors['form_empty'] = 'true';
        }

        if (empty($errors)) {
            foreach ($fields as $field) {
                $er = false;
                $_field = $field;
                $field = 'contact_inbox_'.$field;
                if (!array_key_exists($field,$form)) {
                    $errors[$field] = 'not found';  
                    $er = true;
                } 
                if (in_array($_field,$required) && empty($form[$field]) && !$er) {
                    $errors[$field] = 'empty';  
                    $er = true;
                }
                if ($_field === 'email' && !$er) {
                    $isEmail = filter_var($form[$field], FILTER_VALIDATE_EMAIL);
                    if (empty($isEmail)) {
                        $errors[$field] = 'error';
                    }
                }
            }
        }

        if (!empty($form) && empty($errors)) {
            $this->doorGets->checkMode(false);
            
            if (empty($errors)) {
                
                $data['uri_module']     = str_replace('_','-',$uri_module);
                $data['lu']             = 2;
                foreach ($fields as $field) {
                    $_field = $field;
                    $field = 'contact_inbox_'.$field;
                    $data[$_field]          = $form[$field];
                }
                $data['date_creation']  = time();
                
                $idContactez = $this->doorGets->dbQI($data,'_dg_inbox');
                
                // Mail Sender Notification
                if (!empty($Module) && !empty($Module['all']['notification_mail'])) {
                    
                    $_email     = $this->doorGets->configWeb['email'];
                    $_lg        = $this->doorGets->configWeb['langue'];
                    $_sujet     = '['.$uri_module.'] '.$this->doorGets->l("Vous avez reçu un nouveau message").' - '.$idContactez;
                    $_message   = "<br /> \n\r <br /> \n\r <b>".$data['sujet']."</b><br /> \n\r <br /> \n\r ".$data['message']."<br /> \n\r <br /> \n\r <b>".$data['email'].' - '.$data['telephone'].'</b>';
                    
                    new SendMailAlert($_email,$_sujet,$_message,$this->doorGets);
                }   
            }   
        } 

        return $errors;
    }
}
