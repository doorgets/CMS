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


class CommentView extends doorGetsAjaxView{
    
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
        $params = $this->doorGets->Params();
        $uri_content = $params['GET']['uri_content'];
        $uri_module = $params['GET']['uri_module'];

        $allModules = $this->doorGets->getAllActiveModules();
        $this->doorGets->myLanguage = $this->doorGets->getLangueTradution();
        $errors = $this->doorGets->filterPost($uri_module);
        $response['data'] = $errors;
        
        $hasUser = (!empty($this->doorGets->user))?true:false;
        $msg = ($hasUser) ? $this->doorGets->__("Votre commentaire est en ligne") : $this->doorGets->__("Votre commentaire est en cours de modération");
        $msg .= ', '.$this->doorGets->__("merci").'.';
        
        if (array_key_exists($this->Action,$arrayAction))
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'sendForm':

                    if (array_key_exists($uri_module,$allModules)) {
                
                        $errors = array_merge($errors,$this->initHtmlForm($uri_module,$allModules));
                        if (empty($errors)) {
                            $response = array(
                                'code' => 200,
                                'data' => $msg
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
        $uri_content = $params['GET']['uri_content'];
        $langue = $params['GET']['lg'];
        $form = $params['POST'];

        $fields = array('email','name','comment');
        $required = array('email','name','comment');
        
        $Module     = $allModules[$uri_module];
        $titre      = $Module['all']['titre'];
        $id_module  = $Module['id'];
        $type_module  = $Module['type'];

        $hasUser = (!empty($this->doorGets->user))?true:false;

        if ($hasUser) {
            $form['doorgets_comment_name'] = $this->doorGets->user['first_name'];
            $form['doorgets_comment_email'] = $this->doorGets->user['login'];
        }

        if (empty($form)) {
            $errors['form_empty'] = 'true';
        }
        $rate = 0;
        if (array_key_exists('doorgets_comment_stars',$form)) {
            $rate   = (int)$form['doorgets_comment_stars'];
        }
        if (empty($errors)) {
            foreach ($fields as $field) {
                $er = false;
                $_field = $field;
                $field = 'doorgets_comment_'.$field;
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
                
                $statut = ($hasUser)?2:3;
                // add comment to database
                $data = array(
                    
                    'uri_module'    => $uri_module,
                    'uri_content'   => $uri_content,
                    'stars'         => $rate,
                    'url'           => $_SERVER["REQUEST_URI"],
                    'date_creation' => time(),
                    'validation'    => $statut,
                    'adress_ip'     => $_SERVER["REMOTE_ADDR"],
                    'langue'        => $langue
                    
                );

                foreach ($fields as $field) {
                    $_field = $field;
                    $field = 'doorgets_comment_'.$field;
                    $data[$_field]          = $form[$field];
                }
                $data['nom'] = $data['name'];
                unset($data['name']);

                $isAlreadyVoted = $this->doorGets->dbQS($data['email'],'_dg_comments','email'," AND stars != 0 AND uri_module = '$uri_module' AND uri_content = '$uri_content' LIMIT 1");
                if ($isAlreadyVoted) {
                    $data['stars'] = 0;
                }

                $idComment = $this->doorGets->dbQI($data,'_dg_comments');

                if (in_array($type_module,Constant::$modulesCanComment)) {

                    $rTableName = '_m_'.$this->doorGets->getRealUri($uri_module);
                    $rTableTraductiontName = $rTableName.'_traduction';
                    $isContent = $this->doorGets->dbQS($uri_content,$rTableTraductiontName,'uri');
                    if (!empty($isContent)) {
                        $sql = "
                            SELECT 
                                SUM(stars) as s,
                                COUNT(*) as c
                            FROM 
                                `_dg_comments`
                            WHERE
                                uri_content = '$uri_content'
                                AND uri_module = '$uri_module'
                                AND langue = '$langue'
                                AND validation = '2'
                                AND stars != 0
                            ;
                        ";
                        $countComments = $this->doorGets->dbQ($sql);
                        $dataContent = array(
                            'stars' => $countComments[0]['s'],
                            'stars_count' => $countComments[0]['c'],
                        );
                        $this->doorGets->dbQU($isContent['id_content'],$dataContent,$rTableName);
                    }

                }

                // Mail Sender Notification
                if (!empty($Module) && !empty($Module['all']['notification_mail'])) {
                    
                    $_email     = $this->doorGets->configWeb['email'];
                    $_lg        = $this->doorGets->configWeb['langue'];
                    $_sujet = '['.$uri_module.'] '.$this->doorGets->l("Vous avez un nouveau commentaire").' - ['.$idComment.']';
                    $_message   = "<br /> \n\r <br /> \n\r <b>".$data['url']."</b><br /> \n\r <br /> \n\r ".$data['comment']."<br /> \n\r <br /> \n\r <b>".$data['email'].' - '.$data['nom'].'</b>';
                    
                    new SendMailAlert($_email,$_sujet,$_message,$this->doorGets);
                }   
            }   
        } 

        return $errors;
    }
}
