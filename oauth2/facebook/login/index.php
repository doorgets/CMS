<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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

umask(0022);
session_start();

define('BASE','../../../');
define('DOORGETS','http://www.doorgets.com/'); // Ne pas supprimer
require_once BASE.'config/config.php';

define('BASE_URL',URL);

// Facebook API
$phpVersion = phpversion();

if($phpVersion >= '5.4'){
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookResponse.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/GraphObject.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/GraphSessionInfo.php';

    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookSession.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookRequest.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookRedirectLoginHelper.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookSignedRequestFromInputHelper.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookCanvasLoginHelper.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/Entities/AccessToken.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/HttpClients/FacebookHttpable.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/HttpClients/FacebookCurl.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/HttpClients/FacebookCurlHttpClient.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookSDKException.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookRequestException.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/FacebookAuthorizationException.php';

    include BASE.'doorgets/lib/facebook/src/Facebook/GraphLocation.php';
    include BASE.'doorgets/lib/facebook/src/Facebook/GraphUser.php';
} else {
  exit();  
}

$crud = new CRUD();

$urlTraduction = '';
$website = $crud->dbQS(Constant::$websiteId,'_website');
if (!empty($website)) {
    
    $langueGroupe = @unserialize($website['langue_groupe']);
    $cLangue = count($langueGroupe);
    if ($cLangue) {
        $urlTraduction = $website['langue_front'].'/';
    }

    if ($website['oauth_facebook_active'] === '1' && !empty($website['oauth_facebook_id']) && !empty($website['oauth_facebook_secret'])) {

        $app_id = $website['oauth_facebook_id'];
        $app_secret = $website['oauth_facebook_secret'];
        $my_url = BASE_URL.'oauth2/facebook/login/';
        $permissions = array('email'); // optional

        \Facebook\FacebookSession::setDefaultApplication($app_id, $app_secret);

        $helper = new \Facebook\FacebookRedirectLoginHelper($my_url);
        $loginUrl = $helper->getLoginUrl($permissions);
        
        if (isset($_GET['code']) ) {

            $code = $_GET['code'];

            $token_url = "https://graph.facebook.com/oauth/access_token?";
            $my_url = urlencode($my_url);
            $query_url = "client_id=".$app_id.'&redirect_uri='.$my_url."&client_secret=".$app_secret."&code=".$code;
            // $token_url .= $query_url;
            // $data = array(
            //     'client_id' => $app_id,
            //     'redirect_uri' => $my_url,
            //     'client_secret' => $app_secret,
            //     'code' => $code,
            // );

            $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=" . $app_id . "&redirect_uri=" . $my_url
            . "&client_secret=" . $app_secret . "&code=" . $code;

            $response = file_get_contents($token_url);
            $params = null;
            parse_str($response, $params);

            $acces_token = $params['access_token'];
            // If you already have a valid access token:
            $session = new \Facebook\FacebookSession($acces_token);
            //var_dump($session);
            // To validate the session:
            try {

                $user_profile = new \Facebook\FacebookRequest(
                    $session, 'GET', '/me'
                );

                $res = $user_profile->execute();

                $graphUser = \Facebook\GraphUser::className();
                $user_profile = $res->getGraphObject($graphUser);

                $email = $user_profile->getEmail();

                if ($email) {

                    $UserFacebookQuery = new UserFacebookQuery($crud);
                    $UserFacebookQuery->filterByEmail($email);
                    $UserFacebookQuery->find();

                    $UserFacebookEntity = $UserFacebookQuery->_getEntity();

                    // L'utilisateur existe
                    if ($UserFacebookEntity) {

                        $UserFacebookEntity->setAccessToken($acces_token);
                        $UserFacebookEntity->setDateModification(time());
                        $UserFacebookEntity->save();

                        $_SESSION['oauth2']['facebook'] = $acces_token;

                    // L'utilisateur n'existe pas
                    } else {

                        $UserFacebookEntity = new UserFacebookEntity(null,$crud);

                        $UserFacebookEntity->setAccessToken($acces_token);
                        
                        $UserFacebookEntity->setIdFacebook($user_profile->getId()); 
                        $UserFacebookEntity->setName($user_profile->getName());
                        $UserFacebookEntity->setEmail($user_profile->getEmail()); 
                        $UserFacebookEntity->setFirstName($user_profile->getFirstName()); 
                        $UserFacebookEntity->setMiddleName($user_profile->getMiddleName()); 
                        $UserFacebookEntity->setLastName($user_profile->getLastName()); 
                        $UserFacebookEntity->setGender($user_profile->getGender()); 
                        $UserFacebookEntity->setLink($user_profile->getLink()); 
                        //$UserFacebookEntity->setBirthday($user_profile->getBirthday()); 
                        $UserFacebookEntity->setLocation($user_profile->getLocation()); 
                        $UserFacebookEntity->setTimezone($user_profile->getTimezone()); 

                        $UserFacebookEntity->setDateCreation(time());
                        $UserFacebookEntity->setDateModification(time());

                        $UserFacebookEntity->save();

                        $_SESSION['oauth2']['facebook'] = $acces_token;

                    }
                }
                
                
            } catch(\Facebook\FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();

            }  

            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL)); exit();

        } else {


            if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['facebook'])) {

                $token = $_SESSION['oauth2']['facebook'];

                $UserFacebookQuery = new UserFacebookQuery($crud);
                $UserFacebookQuery->filterByAccessToken($token);
                $UserFacebookQuery->find();

                $UserFacebookEntity = $UserFacebookQuery->_getEntity();
                $url = BASE_URL.'dg-user/'.$urlTraduction.'?controller=authentification';
                if ($UserFacebookEntity) {
                    $userId = (int) $UserFacebookEntity->getIdUser();
                    $email = $UserFacebookEntity->getEmail();
                    if ($userId == 0) {

                        $userExists = $crud->dbQS($email,'_users','login');
                        if (!empty($userExists)) {

                            $UserFacebookEntity->setIdUser($userExists['id']);
                            $UserFacebookEntity->save();
                            $userInfoExists = $crud->dbQS($userExists['id'],'_users_info','id_user');
                            if (!empty($userInfoExists)) {
                                // Connect user

                                $_token = md5(uniqid(mt_rand(), true));

                                $_SESSION['doorgets_user']['id']        = $userInfoExists['id_user'];
                                $_SESSION['doorgets_user']['groupe']    = $userInfoExists['network'];
                                $_SESSION['doorgets_user']['login']     = $userExists['login'];
                                $_SESSION['doorgets_user']['password']  = $userExists['password'];
                                $_SESSION['doorgets_user']['langue']    = $userInfoExists['langue'];
                                $_SESSION['doorgets_user']['token']     = $_token;
                            
                                $crud->dbQU($userExists['id'],array('token'=>$_token),'_users');
                                FlashInfo::set(':)');
                            }
                        } else {
                            header('Location: ' . BASE_URL.'dg-user/'.$urlTraduction.'?controller=authentification&action=register'); exit();
                        }
                    } 
                }   else {
                    $_SESSION = array();
                    header('Location: ' . BASE_URL.'dg-user/'.$urlTraduction.'?controller=authentification&action=register&ss'); exit();
                }

                header('Location: ' . $url); exit();
            
            } else {

                header('Location: ' . filter_var($loginUrl, FILTER_SANITIZE_URL)); exit();
            }
        }
    }
}
