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


class AuthentificationView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        //vdump($_SESSION);
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        $isActiveGroupe = '';

        $fireWallIp = $this->doorGets->fireWallIp(false);
        $groupes = $this->doorGets->loadGroupesSubscriber();
        $countGroupes = count($groupes);
        
        $Params = $this->doorGets->Params();
        if (array_key_exists('groupe',$Params['GET'])) {
            $isActiveGroupe = $Params['GET']['groupe'];
        }

        switch($this->Action) {
            
            case 'index':
                
                $tpl = Template::getView('user/authentification/user_authentification');
                ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
                
                break;
                

            case 'register':

                $isOauthGoogle = false;
                if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['google'])) {

                    $token = $_SESSION['oauth2']['google'];

                    $UserGoogleQuery = new UserGoogleQuery($this->doorGets);
                    $UserGoogleQuery->filterByAccessToken($token);
                    $UserGoogleQuery->find();

                    $UserGoogleEntity = $UserGoogleQuery->_getEntity();

                    if ($UserGoogleEntity) {
                        $UserGoogleData = $UserGoogleEntity->getData();
                        $userId = (int) $UserGoogleData['id_user'];
                        
                        if ($userId == 0) {
                            $isOauthGoogle = true;
                        }
                    }
                }

                $isOauthFacebook = false;
                if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['facebook'])) {

                    $token = $_SESSION['oauth2']['facebook'];

                    $UserFacebookQuery = new UserFacebookQuery($this->doorGets);
                    $UserFacebookQuery->filterByAccessToken($token);
                    $UserFacebookQuery->find();
                    
                    $UserFacebookEntity = $UserFacebookQuery->_getEntity();

                    if ($UserFacebookEntity) {
                        $UserFacebookData = $UserFacebookEntity->getData();
                        $userId = (int) $UserFacebookData['id_user'];
                        if ($userId == 0) {
                            $isOauthFacebook = true;
                        }
                    }
                }
                
                if ($countGroupes > 0) {
                    $tpl = Template::getView('user/authentification/user_register');
                    ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
                }
                
                
                break;
            
            case 'forget':
                
                $isOkForActivation = $this->doorGets->Form->isSended;
                
                $tpl = Template::getView('user/authentification/user_forget');
                ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
                
                break;
            
            case 'reset':
                
                $timer = 60 * 60 * 2; // 2 Hours
                $isOkForActivation = false;
                $Params = $this->doorGets->Params();
                
                if (array_key_exists('code',$Params['GET']) && !empty($Params['GET']['code'])) {
                    
                    $isActivation = $this->doorGets->dbQS($Params['GET']['code'], '_users_activation','code'," AND type = 'forget' LIMIT 1 ");
                    if (!empty($isActivation)) {
                        $timeCreated = (int)$isActivation['date_creation'];
                        $timeLeft = time() - $timeCreated;
                        
                        if ($timer > $timeLeft) {
                            
                            $isOkForActivation = true;
                            
                        }
                    }
                    
                }
                
                
                $tpl = Template::getView('user/authentification/user_reset');
                ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
                
                break;
            
            case 'activation':
                
                $timer = 60 * 60 * 2; // 2 Hours
                $isOkForActivation = false;
                $Params = $this->doorGets->Params();
                
                if (array_key_exists('code',$Params['GET']) && !empty($Params['GET']['code'])) {
                    
                    $isActivation = $this->doorGets->dbQS($Params['GET']['code'], '_users_activation','code'," AND type = 'subscribe' LIMIT 1 ");
                    if (!empty($isActivation)) {
                        $timeCreated = (int)$isActivation['date_creation'];
                        $timeLeft = time() - $timeCreated;
                        
                        if ($timer > $timeLeft) {
                            
                            $dataActivation['active'] = '2';
                            $dataActivation['date_modification'] = time();
                            
                            $this->doorGets->dbQU($isActivation['id_user'],$dataActivation,'_users_info','id_user');
                            
                            $isOkForActivation = true;
                        
                        }
                    }
                    
                }
                
                $tpl = Template::getView('user/authentification/user_activation');
                ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();
                
                break;
            
        }
        
        return $out;
        
    }
    
}