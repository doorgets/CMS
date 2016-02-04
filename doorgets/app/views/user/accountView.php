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


class AccountView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $tplAccountRubrique = Template::getView('user/account/user_account_rubrique');
        ob_start(); if (is_file($tplAccountRubrique)) { include $tplAccountRubrique; } $htmlAccountRubrique = ob_get_clean();
        
        switch($this->Action) {
            
            case 'index':
                
                $isActiveNotificationNewsletter = $isActiveNotificationMail = '';
                
                if (!empty($this->user['notification_mail'])) { $isActiveNotificationMail = 'checked'; }
                if (!empty($this->user['notification_newsletter'])) { $isActiveNotificationNewsletter = 'checked'; }
                
                $img['facebook']    = '<img  src="'.BASE_IMG.'icone_facebook.png" > ';
                $img['twitter']     = '<img  src="'.BASE_IMG.'icone_twitter.png" > ';
                $img['youtube']     = '<img  src="'.BASE_IMG.'icone_youtube.png" > ';
                $img['google']      = '<img  src="'.BASE_IMG.'icone_google.png" > ';
                $img['pinterest']   = '<img  src="'.BASE_IMG.'icone_pinterest.png" > ';
                $img['linkedin']    = '<img  src="'.BASE_IMG.'icone_linkedin.png" > ';
                $img['myspace']     = '<img  src="'.BASE_IMG.'icone_myspace.png" > ';
                
                // echo '<pre>';
                // var_dump($this->user);
                
                $nFace      = $img['facebook'].'http://www.facebook.com/<span style="color:#000099;">'.$this->user['id_facebook'].'</span>';
                $nTwitter   = $img['twitter'].'http://www.twitter.com/<span style="color:#000099;">'.$this->user['id_twitter'].'</span>';
                $nYoutube   = $img['youtube'].'http://www.youtube.com/user/<span style="color:#000099;">'.$this->user['id_youtube'].'</span>';
                $nGoogle    = $img['google'].'https://plus.google.com/u/0/<span style="color:#000099;">'.$this->user['id_google'].'</span>';
                $nPinterest = $img['pinterest'].'https://www.pinterest.com/<span style="color:#000099;">'.$this->user['id_pinterest'].'</span>';
                $nLinkedin  = $img['linkedin'].'http://www.linkedin.com/in/<span style="color:#000099;">'.$this->user['id_linkedin'].'</span>';
                $nMyspace   = $img['myspace'].'http://www.myspace.com/<span style="color:#000099;">'.$this->user['id_myspace'].'</span>';
                
                $genderAr = $this->doorGets->getArrayForms('gender');
                
                $Controller = $this->doorGets;
                
                $Attributes = $this->doorGets->loadUserAttributesWithValues($this->user['id'],$this->user['attributes']);
                
                break;
            
            case 'email':
                
                $isCodeActive = $this->doorGets->dbQS($this->user['id'],'_users_activation','id_user',' AND type = "new_email" LIMIT 1');
                
                break;

            case 'api':
                
                
                $isUserApi = $this->doorGets->dbQS($this->user['id'],'_users_access_token','id_user');
                
                break;

            case 'oauth':
                
                $isUserGoogle   = false;
                $isUserFacebook = false;

                $UserGoogleQuery = new UserGoogleQuery($this->doorGets);
                $UserGoogleQuery->filterByIdUser($this->user['id'])->find();

                $UserGoogleEntity = $UserGoogleQuery->_getEntity();
                if ($UserGoogleEntity) {
                    $isUserGoogle = true;
                }

                $UserFacebookQuery = new UserFacebookQuery($this->doorGets);
                $UserFacebookQuery->filterByIdUser($this->user['id'])->find();

                $UserFacebookEntity = $UserFacebookQuery->_getEntity();
                if ($UserFacebookEntity) {
                    $isUserFacebook = true;
                }

                break;
            
        }
        
        $ActionFile = 'user/account/user_account_'.$this->Action;
        $tpl = Template::getView($ActionFile);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
        
    }
    
}