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


class AuthentificationRequest extends doorGetsUserRequest{
    
    public $fireWall = 1;
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function doAction() {
        
        $out = '';
        $idActiveGroupe = '';

        $groupes = $this->doorGets->loadGroupesSubscriber();

        $countGroupes = count($groupes);

        $Params = $this->doorGets->Params();
        if (array_key_exists('groupe',$Params['GET'])) {
            $idActiveGroupe = $Params['GET']['groupe'];
        }
        
        $backUrl = '/';
        if ($this->Action !== 'logout') {
            $backUrl = $_SERVER['REQUEST_URI'];
        }
        
        if (array_key_exists('back',$Params['GET'])) {
            $backUrl = urldecode($Params['GET']['back']);
            $_SESSION['backurl'] = $backUrl;
        }

        switch($this->Action) {
            
            case 'index':
                
                $UserGoogleEntity = null;
                $isUserGoogle = false;
                $isEmptyUserGoogle = true;
                $userId = 0;

                // Connect Auto with google
                if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['google'])) {

                    //$LogineExist = $this->doorGets->dbQS($_SESSION['oauth2']['google'])

                    $token = $_SESSION['oauth2']['google'];

                    $UserGoogleQuery = new UserGoogleQuery($this->doorGets);
                    $UserGoogleQuery->filterByAccessToken($token);
                    $UserGoogleQuery->find();

                    $UserGoogleEntity = $UserGoogleQuery->_getEntity();

                    if ($UserGoogleEntity) {
                        $isUserGoogle = true;
                        $userId = $UserGoogleEntity->getIdUser();
                    }

                }

                
                if ($isUserGoogle) {

                    $LogineExist = $this->doorGets->dbQS($userId,'_users');
                    if(!empty($LogineExist)) {

                        $isUserInfos = $this->doorGets->dbQS($LogineExist['id'],'_users_info','id_user');

                        if ( !empty($isUserInfos)  && ( $isUserInfos['active'] == '2' OR $isUserInfos['active'] == '5') ) {
                            
                            $this->doorGets->clearFireWallIp();

                            $_token = md5(uniqid(mt_rand(), true));

                            $_SESSION['doorgets_user']['id']        = $isUserInfos['id_user'];
                            $_SESSION['doorgets_user']['groupe']    = $isUserInfos['network'];
                            $_SESSION['doorgets_user']['login']     = $LogineExist['login'];
                            $_SESSION['doorgets_user']['password']  = '';
                            $_SESSION['doorgets_user']['langue']    = $isUserInfos['langue'];
                            $_SESSION['doorgets_user']['token']     = $_token;
                            
                            // Users tracking
                            $this->doorGets->_trackMe($LogineExist['id'],$isUserInfos['network']);
                            
                            $this->doorGets->dbQU($LogineExist['id'],array('token'=>$_token),'_users');
                            FlashInfo::set($this->doorGets->__("Connexion réussie"));
                            
                            if ($isUserInfos['active'] == '5') {
                                
                                $this->doorGets->dbQU($LogineExist['id'],array('active' => '2'),'_users_info');
                                FlashInfo::set($this->doorGets->__("Connexion réussie").', '.$this->doorGets->__("Votre compte est maintenant ouvert"));
                            
                            }

                            header('Location:'.$backUrl); exit();
                            
                        }   

                    }
                        
                }

                $UserFacebookEntity = null;
                $isUserFacebook = false;
                $isEmptyUserFacebook = true;

                // Connect Auto with facebook
                if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['facebook'])) {

                    //$LogineExist = $this->doorGets->dbQS($_SESSION['oauth2']['facebook'])

                    $token = $_SESSION['oauth2']['facebook'];

                    $UserFacebookQuery = new UserFacebookQuery($this->doorGets);
                    $UserFacebookQuery->filterByAccessToken($token);
                    $UserFacebookQuery->find();

                    $UserFacebookEntity = $UserFacebookQuery->_getEntity();

                    if ($UserFacebookEntity) {
                        $isUserFacebook = true;
                        $userId = $UserFacebookEntity->getIdUser();
                    }

                }

                
                if ($isUserFacebook) {

                    $LogineExist = $this->doorGets->dbQS($userId,'_users');
                    if(!empty($LogineExist)) {
                        
                        $isUserInfos = $this->doorGets->dbQS($LogineExist['id'],'_users_info','id_user');

                        if ( !empty($isUserInfos)  && ( $isUserInfos['active'] == '2' OR $isUserInfos['active'] == '5') ) {
                            
                            $this->doorGets->clearFireWallIp();

                            $_token = md5(uniqid(mt_rand(), true));

                            $_SESSION['doorgets_user']['id']        = $isUserInfos['id_user'];
                            $_SESSION['doorgets_user']['groupe']    = $isUserInfos['network'];
                            $_SESSION['doorgets_user']['login']     = $LogineExist['login'];
                            $_SESSION['doorgets_user']['password']  = '';
                            $_SESSION['doorgets_user']['langue']    = $isUserInfos['langue'];
                            $_SESSION['doorgets_user']['token']     = $_token;
                            
                            // Users tracking
                            $this->doorGets->_trackMe($LogineExist['id'],$isUserInfos['network']);
                            
                            $this->doorGets->dbQU($LogineExist['id'],array('token'=>$_token),'_users');
                            FlashInfo::set($this->doorGets->__("Connexion réussie"));
                            
                            if ($isUserInfos['active'] == '5') {
                            
                                $this->doorGets->dbQU($LogineExist['id'],array('active' => '2'),'_users_info');
                                FlashInfo::set($this->doorGets->__("Connexion réussie").', '.$this->doorGets->__("Votre compte est maintenant ouvert"));
                            
                            }

                            header('Location:'.$backUrl); exit();
                            
                        }   

                    }
                        
                }

                // Normal Auth
                if (!empty($this->doorGets->Form->i)) {
                    
                    // vérification champ vide
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v)) {
                            
                            $this->doorGets->Form->e['authentification_login'] = 'ok';
                            $this->doorGets->Form->e['authentification_password'] = 'ok';
                            
                        }
                    }
                    
                    // verification de la taille du password
                    if (strlen($this->doorGets->Form->i['password']) < 4) {
                        
                        $this->doorGets->Form->e['authentification_login'] = 'ok';
                        $this->doorGets->Form->e['authentification_password'] = 'ok';
                        
                    }
                    
                    if (!empty($this->doorGets->Form->e)) {

                        $this->doorGets->fireWallIp();

                    }else{
                        
                        $LogineExist = $this->doorGets->dbQS($this->doorGets->Form->i['login'],'_users','login');

                        if (
                            !empty($LogineExist)
                        ) {
                            
                            $hasPassword = $this->doorGets->_decryptMe(
                                $this->doorGets->Form->i['password'],
                                $LogineExist['salt'],
                                $LogineExist['password']
                            );
                        
                            if($hasPassword) {
                                
                                $isUserInfos = $this->doorGets->dbQS($LogineExist['id'],'_users_info','id_user');
                                if (
                                   !empty($isUserInfos) 
                                   && ( $isUserInfos['active'] == '2' OR $isUserInfos['active'] == '5') 
                                ) {
                                    
                                    $this->doorGets->clearFireWallIp();

                                    $_token = md5(uniqid(mt_rand(), true));

                                    $_SESSION['doorgets_user']['id']        = $isUserInfos['id_user'];
                                    $_SESSION['doorgets_user']['groupe']    = $isUserInfos['network'];
                                    $_SESSION['doorgets_user']['login']     = $LogineExist['login'];
                                    $_SESSION['doorgets_user']['password']  = $LogineExist['password'];
                                    $_SESSION['doorgets_user']['langue']    = $isUserInfos['langue'];
                                    $_SESSION['doorgets_user']['token']     = $_token;
                                    
                                    // Users tracking
                                    $this->doorGets->_trackMe($LogineExist['id'],$isUserInfos['network']);
                                    
                                    $this->doorGets->dbQU($LogineExist['id'],array('token'=>$_token),'_users');
                                    FlashInfo::set($this->doorGets->__("Connexion réussie"));
                                    
                                    if ($isUserInfos['active'] == '5') {
                                        
                                        $this->doorGets->dbQU($LogineExist['id'],array('active' => '2'),'_users_info');
                                        FlashInfo::set($this->doorGets->__("Connexion réussie").', '.$this->doorGets->__("Votre compte est maintenant ouvert"));
                                    
                                    }

                                    header('Location:'.$backUrl); exit();
                                    
                                }else{

                                    $this->doorGets->fireWallIp();

                                }
                            }
                            
                        }else{

                            $this->doorGets->fireWallIp();

                        }
                        

                        $this->doorGets->Form->e['authentification_login'] = 'ok';
                        $this->doorGets->Form->e['authentification_password'] = 'ok';
                     
                    }
                }
                
                
                break;
            
            case 'register':
                
                $idGroupe = null;
                $hasVerification = true;

                $errorMsg = '';

                if (empty($idActiveGroupe) && $countGroupes === 1) {
                    foreach ($groupes as $key => $value) {
                        
                        $idGroupe = $groupes[$key]['id'];
                        $hasVerfication = $groupes[$key]['verification'];
                    }
                
                }elseif (array_key_exists($idActiveGroupe, $groupes)) {
                    
                    $idGroupe = $groupes[$idActiveGroupe]['id'];
                    $hasVerfication = $groupes[$idActiveGroupe]['verification'];
                }

                // Oauth2 google
                if (!empty($this->doorGets->Form['google']->i) && $countGroupes > 0) {

                    // vérification champ vide
                    foreach($this->doorGets->Form['google']->i as $k=>$v) {
                        
                        if (empty($v)) {
                            
                            $this->doorGets->Form['google']->e['subscribe_google_'.$k] = 'Vide !';
                            
                        }
                    }

                    // verification du pseudo
                    if (empty($this->doorGets->Form['google']->e['subscribe_login'])) {
                        
                        if (strlen($this->doorGets->Form['google']->i['login']) < 3) {
                            
                            $this->doorGets->Form['google']->e['subscribe_google_login'] = 'Pseudo trop court';
                            
                        }
                        
                        if (empty($this->doorGets->Form['google']->e['subscribe_login'])) {
                            
                            $this->doorGets->Form['google']->i['login'] = trim(strtolower($this->doorGets->Form['google']->i['login']));

                            $login = $this->doorGets->Form['google']->i['login'];
                            $login = str_replace('-','',$login);
                            $login = str_replace('_','',$login);
                            $login = ctype_alnum($login);
                            
                            if (empty($login)) {
                                $this->doorGets->Form['google']->e['subscribe_google_login'] = 'Format invalid';
                            }
                            
                            $isPseudo = $this->doorGets->dbQS($this->doorGets->Form['google']->i['login'],'_users_info','pseudo');
                            if (!empty($isPseudo)) {
                                
                                $this->doorGets->Form['google']->e['subscribe_google_login'] = 'Pseudo deja ulisise';
                                
                            }   
                        }                        
                    }

                    if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['google']) && empty($this->doorGets->Form['google']->e)) {

                        $token = $_SESSION['oauth2']['google'];

                        $UserGoogleQuery = new UserGoogleQuery($this->doorGets);
                        $UserGoogleQuery->filterByAccessToken($token);
                        $UserGoogleQuery->find();

                        $UserGoogleEntity = $UserGoogleQuery->_getEntity();
                        $UserGoogle  = $UserGoogleEntity->getData();
                        
                        if ($UserGoogle) {
                            $userId = (int) $UserGoogle['id_user'];
                            if ($userId == 0) {

                                try{

                                    $avatar = $this->doorGets->copyGravatar($UserGoogle['email']);


                                    $dataLogin['login']         = $UserGoogle['email'];
                                    $dataLogin['password']      = $this->doorGets->_crypt((time() + mt_rand(100000,100000000)));
                                    $dataLogin['salt']          = $this->doorGets->_crypt((time() + mt_rand(100000,100000000)));
                                    
                                    $dataInfo['langue']         = $this->doorGets->myLanguage;
                                    $dataInfo['network']        = $idGroupe;
                                    $dataInfo['active']         = '2'; 
                                    
                                    $dataInfo['pseudo']         = $this->doorGets->Form['google']->i['login'];
                                    $dataInfo['horaire']        = $this->doorGets->Form['google']->i['horaire'];
                                    $dataInfo['email']          = $UserGoogle['email'];
                                    $dataInfo['last_name']      = $this->doorGets->Form['google']->i['subscribe_lastname'];
                                    $dataInfo['first_name']     = $this->doorGets->Form['google']->i['subscribe_firstname'];

                                    $dataInfo['editor_html']     = '';
                                    $dataInfo['notification_mail']     = 1;
                                    $dataInfo['notification_newsletter']     = (array_key_exists('registerNewsletter',$this->doorGets->Form['google']->i))?1:0;
                                
                                    $dataInfo['date_creation']  = time();
                                    
                                    $dataInfo['avatar']         = $avatar;
                                    
                                    $UsersLog = new UsersEntity();
                                    $UsersLog->setData($dataLogin);
                                    $UsersLog->save(false);

                                    $dataInfo['id_user']        = $UsersLog->getId();

                                    $UsersInfo = new UsersInfoEntity();
                                    $UsersInfo->setData($dataInfo);
                                    $UsersInfo->save(false);

                                    $UserGoogleEntity->setIdUser($dataInfo['id_user']);
                                    $UserGoogleEntity->save(false);

                                
                                } catch(PDOException $e){
                                    new PrintErrorException($e);exit();
                                }   catch(Exception $e) {
                                    echo $e->getMessage();
                                    exit();
                                }

                                $this->doorGets->createFolderUser($dataInfo['pseudo'],$dataInfo['id_user']);
                                
                                FlashInfo::set($this->doorGets->__("Connexion réussie").', '.$this->doorGets->__("Votre compte est maintenant ouvert"));
                                header('Location:./?controller=authentification'); exit();
                            }
                        }
                    }

                }

                // Oauth2 facebook
                if (!empty($this->doorGets->Form['facebook']->i) && $countGroupes > 0) {

                    // vérification champ vide
                    foreach($this->doorGets->Form['facebook']->i as $k=>$v) {
                        
                        if (empty($v)) {
                            
                            $this->doorGets->Form['facebook']->e['subscribe_facebook_'.$k] = 'Vide !';
                            
                        }
                    }

                    // verification du pseudo
                    if (empty($this->doorGets->Form['facebook']->e['subscribe_login'])) {
                        
                        if (strlen($this->doorGets->Form['facebook']->i['login']) < 3) {
                            
                            $this->doorGets->Form['facebook']->e['subscribe_facebook_login'] = 'Pseudo trop court';
                            
                        }
                        
                        if (empty($this->doorGets->Form['facebook']->e['subscribe_login'])) {
                            
                            $this->doorGets->Form['facebook']->i['login'] = trim(strtolower($this->doorGets->Form['facebook']->i['login']));

                            $login = $this->doorGets->Form['facebook']->i['login'];
                            $login = str_replace('-','',$login);
                            $login = str_replace('_','',$login);
                            $login = ctype_alnum($login);
                            
                            if (empty($login)) {
                                $this->doorGets->Form['facebook']->e['subscribe_facebook_login'] = 'Format invalid';
                            }
                            
                            $isPseudo = $this->doorGets->dbQS($this->doorGets->Form['facebook']->i['login'],'_users_info','pseudo');
                            if (!empty($isPseudo)) {
                                
                                $this->doorGets->Form['facebook']->e['subscribe_facebook_login'] = 'Pseudo deja ulisise';
                                
                            }   
                        }                        
                    }

                    if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['facebook']) && empty($this->doorGets->Form['facebook']->e)) {

                        $token = $_SESSION['oauth2']['facebook'];

                        $UserFacebookQuery = new UserFacebookQuery($this->doorGets);
                        $UserFacebookQuery->filterByAccessToken($token);
                        $UserFacebookQuery->find();

                        $UserFacebookEntity = $UserFacebookQuery->_getEntity();
                        $UserFacebook  = $UserFacebookEntity->getData();
                        
                        if ($UserFacebook) {
                            $userId = (int) $UserFacebook['id_user'];

                            if ($userId == 0) {

                                $avatar = $this->doorGets->copyGravatar($UserFacebook['email']);

                                $dataLogin['login']         = $UserFacebook['email'];
                                $dataLogin['salt']          = $this->doorGets->_crypt((time() + mt_rand(100000,100000000)));
                                $dataLogin['password']      = $this->doorGets->_crypt((time() + mt_rand(100000,100000000)));
                                
                                $dataInfo['langue']         = $this->doorGets->myLanguage;
                                $dataInfo['network']        = $idGroupe;
                                $dataInfo['active']         = '2'; 
                                
                                $dataInfo['horaire']        = $this->doorGets->Form['facebook']->i['horaire'];
                                $dataInfo['pseudo']         = $this->doorGets->Form['facebook']->i['login'];
                                $dataInfo['email']          = $UserFacebook['email'];
                                $dataInfo['last_name']      = $this->doorGets->Form['facebook']->i['subscribe_lastname'];
                                $dataInfo['first_name']     = $this->doorGets->Form['facebook']->i['subscribe_firstname'];

                                $dataInfo['editor_html']     = '';
                                $dataInfo['notification_mail']     = 1;
                                $dataInfo['notification_newsletter']     = (array_key_exists('registerNewsletter',$this->doorGets->Form['facebook']->i))?1:0;
                            
                                $dataInfo['date_creation']  = time();
                                
                                $dataInfo['avatar']         = $avatar;

                                $UsersLog = new UsersEntity();
                                $UsersLog->setData($dataLogin);
                                $UsersLog->save(false);

                                $dataInfo['id_user']        = $UsersLog->getId();

                                $UsersInfo = new UsersInfoEntity();
                                $UsersInfo->setData($dataInfo);
                                $UsersInfo->save(false);

                                $UserFacebookEntity->setIdUser($dataInfo['id_user']);
                                $UserFacebookEntity->save(false);
                                
                                $this->doorGets->createFolderUser($dataInfo['pseudo'],$dataInfo['id_user']);
                                
                                FlashInfo::set($this->doorGets->__("Connexion réussie").', '.$this->doorGets->__("Votre compte est maintenant ouvert"));
                                header('Location:./?controller=authentification'); exit();
                            }
                        }
                    }

                }

                // doorGets Auth
                if (!empty($this->doorGets->Form['doorgets']->i) && $countGroupes > 0) {
                    
                    // vérification champ vide
                    foreach($this->doorGets->Form['doorgets']->i as $k=>$v) {
                        
                        if (empty($v)) {
                            
                            $this->doorGets->Form['doorgets']->e['subscribe_'.$k] = 'Vide !';
                            
                        }
                    }
                    
                    // verification adresse email
                    if (empty($this->doorGets->Form['doorgets']->e['subscribe_email'])) {
                        
                        
                        // verification du format mail
                        $email = filter_var($this->doorGets->Form['doorgets']->i['email'], FILTER_VALIDATE_EMAIL);
                        if (empty($email)) {
                            $this->doorGets->Form['doorgets']->e['subscribe_email'] = 'Format email invalid';
                        }
                        
                        // verification de l'existance de l'adresse email
                        if (empty($this->doorGets->Form['doorgets']->e['subscribe_email'])) {
                        
                            $isEmail = $this->doorGets->dbQS($this->doorGets->Form['doorgets']->i['email'],'_users_info','email');
                            $isEmailLogin = $this->doorGets->dbQS($this->doorGets->Form['doorgets']->i['email'],'_users','login');
                            
                            if (!empty($isEmail) || !empty($isEmailLogin)) {
                                
                                $this->doorGets->Form['doorgets']->e['subscribe_email'] = 'Email deja ulisise';
                                
                            }
                            
                        }
                    }
                    
                    // verification du pseudo
                    if (empty($this->doorGets->Form['doorgets']->e['subscribe_login'])) {
                        
                        if (strlen($this->doorGets->Form['doorgets']->i['login']) < 3) {
                            
                            $this->doorGets->Form['doorgets']->e['subscribe_login'] = 'Pseudo trop court';
                            
                        }
                        
                        if (empty($this->doorGets->Form['doorgets']->e['subscribe_login'])) {
                            
                            $this->doorGets->Form['doorgets']->i['login'] = trim(strtolower($this->doorGets->Form['doorgets']->i['login']));

                            $login = $this->doorGets->Form['doorgets']->i['login'];
                            $login = str_replace('-','',$login);
                            $login = str_replace('_','',$login);
                            $login = ctype_alnum($login);
                            
                            if (empty($login)) {
                                $this->doorGets->Form['doorgets']->e['subscribe_login'] = 'Format invalid';
                            }
                            
                            $isPseudo = $this->doorGets->dbQS($this->doorGets->Form['doorgets']->i['login'],'_users_info','pseudo');
                            if (!empty($isPseudo)) {
                                
                                $this->doorGets->Form['doorgets']->e['subscribe_login'] = 'Pseudo deja ulisise';
                                
                            }   
                        }                        
                    }
                    
                    // verification du mot de passe
                    if (empty($this->doorGets->Form['doorgets']->e['subscribe_password'])) {
                        
                        if (strlen($this->doorGets->Form['doorgets']->i['password']) < 8) {
                            
                            $this->doorGets->Form['doorgets']->e['subscribe_password'] = 'Mot de passe trop court';
                            $this->doorGets->Form['doorgets']->e['subscribe_re-password'] = '-';
                            
                        }
                        
                        if (empty($this->doorGets->Form['doorgets']->e['subscribe_password'])) {
                            
                            if ($this->doorGets->Form['doorgets']->i['password'] !== $this->doorGets->Form['doorgets']->i['re-password']) {
                            
                                $this->doorGets->Form['doorgets']->e['subscribe_password'] = '-';
                                $this->doorGets->Form['doorgets']->e['subscribe_re-password'] = 'Different du mot de passe';
                                
                            }
                            
                        }
                    
                    }

                    
                    if (empty($this->doorGets->Form['doorgets']->e) && $countGroupes > 0) {
                        
                        if ($idGroupe) {

                            $avatar = $this->doorGets->copyGravatar($this->doorGets->Form['doorgets']->i['email']);
                            
                            $crypto = $this->doorGets->_cryptMe($this->doorGets->Form['doorgets']->i['password']);

                            $dataLogin['login']         = $this->doorGets->Form['doorgets']->i['email'];
                            $dataLogin['password']      = $crypto['password'];
                            $dataLogin['salt']          = $crypto['salt'];
                            
                            $dataInfo['langue']         = $this->doorGets->myLanguage;
                            $dataInfo['network']        = $idGroupe;
                            $dataInfo['active']         = ($hasVerfication) ? '3' : '2'; // moderation mode
                            
                            $dataInfo['horaire']        = $this->doorGets->Form['doorgets']->i['horaire'];
                            $dataInfo['pseudo']         = $this->doorGets->Form['doorgets']->i['login'];
                            $dataInfo['email']          = $this->doorGets->Form['doorgets']->i['email'];
                            $dataInfo['last_name']      = $this->doorGets->Form['doorgets']->i['lastname'];
                            $dataInfo['first_name']     = $this->doorGets->Form['doorgets']->i['firstname'];

                            $dataInfo['editor_html']     = '';
                            
                            $dataInfo['notification_mail']     = 1;
                            $dataInfo['notification_newsletter']     = (array_key_exists('registerNewsletter',$this->doorGets->Form['doorgets']->i))?1:0;
                            
                            $dataInfo['date_creation']  = time();
                            
                            $dataInfo['avatar']         = $avatar;
                            
                            $UsersLog = new UsersEntity();
                            $UsersLog->setData($dataLogin);
                            $UsersLog->save(false);

                            $dataInfo['id_user']        = $UsersLog->getId();

                            $UsersInfo = new UsersInfoEntity();
                            $UsersInfo->setData($dataInfo);
                            $UsersInfo->save(false);

                            // create activation code
                            if ($hasVerfication) {

                                $dataCode['type']           = 'subscribe';
                                $dataCode['id_user']        = $dataInfo['id_user'];
                                $dataCode['code']           = $this->doorGets->_genRandomKey(45);
                                $dataCode['date_creation']  = time();
                                
                                $UsersActivation = new UsersActivationEntity();
                                $UsersActivation->setData($dataCode);
                                $UsersActivation->save(false);
                                
                                $this->doorGets->createFolderUser($dataInfo['pseudo'],$dataInfo['id_user']);

                                $lgUser = ''; if (count($this->doorGets->allLanguagesWebsite) > 1) { $lgUser = $this->doorGets->myLanguage.'/'; }
                                $urlToSend = URL_USER.$lgUser.'?controller=authentification&action=activation&code='.$dataCode['code'];
                                
                                // send mail with code confirmation
                                new SendMailAuth($dataInfo['email'],'subscribe',$urlToSend,$this->doorGets);
                            
                            } else {
                            
                                // Connect user
                                $_token = md5(uniqid(mt_rand(), true));

                                $_SESSION['doorgets_user']['id']        = $dataInfo['id_user'];
                                $_SESSION['doorgets_user']['groupe']    = $dataInfo['network'];
                                $_SESSION['doorgets_user']['login']     = $dataLogin['login'];
                                $_SESSION['doorgets_user']['password']  = $dataLogin['password'];
                                $_SESSION['doorgets_user']['langue']    = $dataInfo['langue'];
                                $_SESSION['doorgets_user']['token']     = $_token;
                                
                                $this->doorGets->createFolderUser($dataInfo['pseudo'],$dataInfo['id_user']);
                                
                                $this->doorGets->dbQU($dataInfo['id_user'],array('token'=>$_token),'_users');
                                FlashInfo::set($this->doorGets->__("Connexion réussie"));
                                header('Location:'.$backUrl); exit();
                            }

                            $this->doorGets->Form['doorgets']->isSended = true;
                                
                        }   
                    }
                    
                    FlashInfo::set($errorMsg,"error");

                }
                
                break;
            
            case 'reset':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->Form = $this->doorGets->Form;
                    
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
                    
                    if ($isOkForActivation) {
                        
                        // vérification champ vide
                        foreach($this->doorGets->Form->i as $k=>$v) {
                            
                            if (empty($v)) {
                                
                                $this->doorGets->Form->e['reset_'.$k] = 'Vide !';
                                
                            }
                        }
                        
                        // verification adresse email
                        if (empty($this->doorGets->Form->e['reset_email'])) {
                            
                            
                            // verification du format mail
                            $email = filter_var($this->doorGets->Form->i['email'], FILTER_VALIDATE_EMAIL);
                            if (empty($email)) {
                                $this->doorGets->Form->e['reset_email'] = 'Format email invalid';
                            }
                            
                            // verification de l'existance de l'adresse email
                            if (empty($this->doorGets->Form->e['subscribe_email'])) {
                            
                                $isEmailLogin = $this->doorGets->dbQS($this->doorGets->Form->i['email'],'_users','login');
                                
                                if (
                                    empty($isEmailLogin)
                                    || ( !empty($isEmailLogin) && $isActivation['id_user'] !== $isEmailLogin['id'] )
                               ) {
                                    
                                    $this->doorGets->Form->e['reset_email'] = 'Email deja ulisise';
                                    
                                }
                                
                            }
                        }
                        
                        // verification du mot de passe
                        if (empty($this->doorGets->Form->e['reset_password'])) {
                            
                            if (strlen($this->doorGets->Form->i['password']) < 8) {
                                
                                $this->doorGets->Form->e['reset_password'] = 'Mot de passe trop court';
                                $this->doorGets->Form->e['reset_re-password'] = '-';
                                
                            }
                            
                            if (empty($this->doorGets->Form->e['reset_password'])) {
                                
                                if ($this->doorGets->Form->i['password'] !== $this->doorGets->Form->i['re-password']) {
                                
                                    $this->doorGets->Form->e['reset_password'] = '-';
                                    $this->doorGets->Form->e['reset_re-password'] = 'Different du mot de passe';
                                    
                                }
                                
                            }
                        
                        }
                        
                        if (empty($this->doorGets->Form->e)) {
                            
                            $crypto = $this->doorGets->_cryptMe($this->doorGets->Form->i['password']);

                            $dataReset['salt'] = $crypto['salt'];
                            $dataReset['password'] = $crypto['password'];

                            $this->doorGets->dbQU($isActivation['id_user'],$dataReset,'_users');
                            $this->doorGets->Form->isSended = true;
                            
                        }
                    }
                }

                break;
            
            case 'forget':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $idGroupe = '1';
                    $isValid = false;
                    $this->doorGets->Form = $this->doorGets->Form;
                    
                    $email = filter_var($this->doorGets->Form->i['email'], FILTER_VALIDATE_EMAIL);
                    if ($email) {
                        
                        $isEmail = $this->doorGets->dbQS($email,'_users','login');
                        if (!empty($isEmail)) {
                            
                            // Delete last code
                            $this->doorGets->dbQL("DELETE FROM _users_activation WHERE id_user = '".$isEmail['id']."' AND type = 'forget'");
                            
                            $dataCode['type']           = 'forget';
                            $dataCode['id_user']        = $isEmail['id'];
                            $dataCode['code']           = $this->doorGets->_genRandomKey(45);
                            $dataCode['date_creation']  = time();
                            
                            $this->doorGets->dbQI($dataCode,'_users_activation');
                            
                            $lgUser = ''; if (count($this->doorGets->allLanguagesWebsite) > 1) { $lgUser = $this->doorGets->myLanguage.'/'; }
                            $urlToSend = URL_USER.$lgUser.'?controller=authentification&action=reset&code='.$dataCode['code'];
                                
                            // send mail with code confirmation
                            new SendMailAuth($isEmail['login'],'forget',$urlToSend,$this->doorGets);
                            $this->doorGets->Form->isSended = true;
                            
                        }
                    }
                    
                    if (!$isValid) {
                        $this->doorGets->Form->e['forget_email'] = 'ok';
                    }
                }
                break;
            
            case 'logout':
                
                if (array_key_exists('cart',$_SESSION)) {
                    $cart = $_SESSION['cart'];
                    $_SESSION = array();
                    $_SESSION['cart'] = $cart; 
                } else {
                    $_SESSION = array(); 
                }

                header('Location:'.$backUrl); exit();
                break;
            
            
        }
        
        return $out;
    }
}
