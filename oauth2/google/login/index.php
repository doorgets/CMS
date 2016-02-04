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

// Google API
include BASE.'doorgets/lib/google/src/Google/autoload.php';

$crud = new CRUD();

$urlTraduction = '';
$website = $crud->dbQS(Constant::$websiteId,'_website');
if (!empty($website)) {
	
	$langueGroupe = @unserialize($website['langue_groupe']);
	$cLangue = count($langueGroupe);
	if ($cLangue) {
		$urlTraduction = $website['langue_front'].'/';
	}

	if ($website['oauth_google_active'] === '1' && !empty($website['oauth_google_id']) && !empty($website['oauth_google_secret'])) {

		$client = new Google_Client();
		$client->setApplicationName("Mon appliation");
		$client->setAccessType('offline');
		$client->setClientId($website['oauth_google_id']);
		$client->setClientSecret($website['oauth_google_secret']);
		$client->setRedirectUri(BASE_URL.'oauth2/google/login');

		$client->addScope("https://www.googleapis.com/auth/plus.login");
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");
		$client->addScope("https://www.googleapis.com/auth/userinfo.profile");

		$urlApi = "https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=";

		if (isset($_GET['code']) ) {
			
			try {

				$client->authenticate($_GET['code']);
				$access_token = $client->getAccessToken();
				$tokens_decoded = json_decode($access_token);
				
				// Récupére les infos de l'utilisateur
				$userInfoData = file_get_contents($urlApi.$tokens_decoded->access_token);
				$userInfoDataJson = json_decode($userInfoData);

				$UserGoogleQuery = new UserGoogleQuery($crud);
				$UserGoogleQuery->filterByEmail($userInfoDataJson->email);
				$UserGoogleQuery->find();

				$UserGoogleEntity = $UserGoogleQuery->_getEntity();

				// L'utilisateur existe
				if ($UserGoogleEntity) {

					$UserGoogleEntity->setAccessToken($tokens_decoded->access_token);
					$UserGoogleEntity->setDateModification(time());
					$UserGoogleEntity->save();

					$_SESSION['oauth2']['google'] = $tokens_decoded->access_token;

				// L'utilisateur n'existe pas
				} else {

					
					$UserGoogleEntity = new UserGoogleEntity(null,$crud);

					$UserGoogleEntity->setAccessToken($tokens_decoded->access_token);

					if (property_exists($tokens_decoded,'refresh_token')) {

						$refreshToken = $tokens_decoded->refresh_token;
						$UserGoogleEntity->setRefreshToken($refreshToken);
					}
					
					$UserGoogleEntity->setEmail($userInfoDataJson->email);
					$UserGoogleEntity->setIdGoogle($userInfoDataJson->id);
					$UserGoogleEntity->setVerifiedEmail($userInfoDataJson->verified_email);
					$UserGoogleEntity->setName($userInfoDataJson->name);
					$UserGoogleEntity->setGivenName($userInfoDataJson->given_name);
					$UserGoogleEntity->setFamilyName($userInfoDataJson->family_name);
					$UserGoogleEntity->setLink($userInfoDataJson->link);
					$UserGoogleEntity->setPicture($userInfoDataJson->picture);
					//$UserGoogleEntity->setGender($userInfoDataJson->gender);
					$UserGoogleEntity->setLocale($userInfoDataJson->locale);

					$UserGoogleEntity->setDateCreation(time());
					$UserGoogleEntity->setDateModification(time());
					
					$UserGoogleEntity->setUserData($userInfoData);

					$UserGoogleEntity->save();

					$_SESSION['oauth2']['google'] = $tokens_decoded->access_token;

				}

				

			} catch (Exception $e) {
				echo $e->getMessage();
			}

			$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
			exit();

		} else {

			if (isset($_SESSION['oauth2']) && isset($_SESSION['oauth2']['google'])) {

				$token = $_SESSION['oauth2']['google'];

				$UserGoogleQuery = new UserGoogleQuery($crud);
				$UserGoogleQuery->filterByAccessToken($token);
				$UserGoogleQuery->find();

				$UserGoogleEntity = $UserGoogleQuery->_getEntity();

				$url = BASE_URL.'dg-user/'.$urlTraduction.'?controller=authentification';
				if ($UserGoogleEntity) {
					$userId = (int) $UserGoogleEntity->getIdUser();
					$email = $UserGoogleEntity->getEmail();
					if ($userId == 0) {

						$userExists = $crud->dbQS($email,'_users','login');
						if (!empty($userExists)) {
							$UserGoogleEntity->setIdUser($userExists['id']);
							$UserGoogleEntity->save();
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
		                        header('Location: ' . $url); exit();
							}
						} else {
							$url = BASE_URL.'dg-user/'.$urlTraduction.'?controller=authentification&action=register';
							header('Location: ' . $url); exit();
						}
					} 
				} else {
					$_SESSION = array();
					$url = BASE_URL.'dg-user/'.$urlTraduction.'?controller=authentification&action=register';
					header('Location: ' . $url); exit();
				}

				// try {

				// 	if ($client->isAccessTokenExpired()) {
				// 	    $client->refreshToken($token);
				// 	}

				// } catch ( Exception $e ) {

				// 	$_SESSION['oauth2'] = array();
				// 	$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
				// 	header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
				// 	exit();
				// }

				header('Location: ' . $url); exit();
			
			} else {
				$authUrl = $client->createAuthUrl();
				header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL)); exit();
			}
			

		}
	}
}
