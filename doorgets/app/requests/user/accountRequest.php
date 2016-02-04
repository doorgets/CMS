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


class AccountRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }
    
    public function doAction() {
        
        $out = '';
        
        $cName = $this->doorGets->controllerNameNow();
        
        $exludeFields = array('website','notification_newsletter','notification_mail','gender','avatar','birthday','id_facebook','id_twitter','id_youtube','id_google','id_pinterest','id_linkedin','id_myspace',
                              'country','city','zipcode','adresse','tel_fix','tel_mobil','tel_fax','last_name','first_name','description','editor_html','region');
        
        switch($this->Action) {
            
            case 'index':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) )
                {
                    
                    $this->doorGets->checkMode();

                    if (!array_key_exists('notification_mail',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['notification_mail'] = 0;
                    }
                    
                    if (!array_key_exists('notification_newsletter',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['notification_newsletter'] = 0;
                    }
                    

                    // gestion des champs vide
                    foreach($this->doorGets->Form->i as $k=>$v)
                    {
                        
                        $strAttribute = 'attribute';
                        $isStrAttribute = substr($k, 0,strlen($strAttribute));

                        if (empty($v) && !in_array($k,$exludeFields) && $strAttribute !== $isStrAttribute)
                        {
                            $this->doorGets->Form->e['account_index_'.$k] = 'ok';
                        }
                        
                    }

                    // Gestion des attributs
                    $Attributes = $this->doorGets->loadUserAttributesWithValues($this->doorGets->user['id'],$this->doorGets->user['attributes']);
                        
                    foreach ($Attributes as $idAttribute => $value) {
                        
                        $strAttribute = 'attribute_'.$idAttribute;
                        if (array_key_exists($strAttribute, $this->doorGets->Form->i)) {

                            if (
                                $value['required'] === '1' 
                                && trim($this->doorGets->Form->i[$strAttribute]) === ''
                            ) {    
                                $this->doorGets->Form->e['account_index_'.$strAttribute] = 'ok';
                            }
                            $dataAttribute = array(
                                'value' => $this->doorGets->Form->i[$strAttribute],
                                'date_modification' => time()
                            );

                            $this->doorGets->dbQU($this->doorGets->user['id'],$dataAttribute,'_users_groupes_attributes_values','id_user'," AND id_attribute = '$idAttribute' LIMIT 1");
                        }
                    }
                    
                    // Gestion de l'avatar
                    
                    $extension = '.png';
                    
                    if (isset($_FILES[$cName.'_index_avatar']) &&
                            (
                                $_FILES[$cName.'_index_avatar']["type"] == "image/jpeg"
                                || $_FILES[$cName.'_index_avatar']["type"] == "image/png"
                                
                            ) && ($_FILES[$cName.'_index_avatar']["error"] === 0 )
                    ) {
                        
                        if ($_FILES[$cName.'_index_avatar']["type"] == "image/jpeg") {
                            $extension = '.jpg';
                        }
                        
                    }
                    
                    if (empty($this->doorGets->Form->e) && $_FILES['account_index_avatar']['size'] !== 0) {
                
                        $uni = time().'-'.uniqid('doorgets').'';
                        
                        $nameFileAvatar = $uni.'-user'.$extension;
                        
                        $this->doorGets->Form->i['avatar'] = $nameFileAvatar;
                        
                        move_uploaded_file(  $_FILES[$cName.'_index_avatar']['tmp_name'] ,  BASE_DATA.'users/'.$nameFileAvatar );
                        
                    }

                    if ($_FILES['account_index_avatar']['size'] === 0) {
                        unset($this->doorGets->Form->i['avatar']);
                    }
                    
                    if (empty($this->doorGets->Form->e)) {

                        foreach ($Attributes as $idAttribute => $value) {
                            
                            switch ($value['type']) {

                                case 'file':

                                    $sizeMax = 8192000;
        
                                    $typeFile["application/msword"] = "data/_form/";
                                    $typeFile["application/vnd.openxmlformats-officedocument.wordprocessingml.document"] = "data/_form/";
                                    
                                    $typeFile["image/png"] = "data/_form/";
                                    $typeFile["image/jpeg"] = "data/_form/";
                                    $typeFile["image/gif"] = "data/_form/";
                                    
                                    $typeFile["application/zip"] = "data/_form/";
                                    $typeFile["application/x-zip-compressed"] = "data/_form/";
                                    $typeFile["application/pdf"] = "data/_form/";
                                    $typeFile["application/x-shockwave-flash"] = "data/_form/";
                                    
                                    $typeExtension["application/msword"] = "doc";
                                    $typeExtension["application/vnd.openxmlformats-officedocument.wordprocessingml.document"] = "doc";
                                    
                                    $typeExtension["image/png"] = "png";
                                    $typeExtension["image/jpeg"] = "jpg";
                                    $typeExtension["image/gif"] = "gif";
                                    
                                    $typeExtension["application/zip"] = "zip";
                                    $typeExtension["application/x-zip-compressed"] = "zip";
                                    
                                    $typeExtension["application/pdf"] = "pdf";
                                    $typeExtension["application/x-shockwave-flash"] = "swf";

                                    $strAttribute = $this->doorGets->Form->name.'_attribute_'.$idAttribute;
                                    
                                    if ( isset($_FILES[$strAttribute]) &&  $_FILES[$strAttribute]['error'] != 0 && empty($value['value'])) {
                        
                                        $this->doorGets->Form->e[$strAttribute] = 'ok';
                                        
                                    }

                                    if ( 
                                        isset($_FILES[$strAttribute]) 
                                        && empty($this->doorGets->Form->e) 
                                        && $_FILES[$strAttribute]['error'] != 4
                                    ) {
                                        
                                        if (
                                            !array_key_exists($_FILES[$strAttribute]["type"],$typeFile) 
                                        ) {
                                            
                                            $this->doorGets->Form->e[$strAttribute] = 'okcc';
                                            
                                        }else{
                                            
                                            $extension = $typeExtension[$_FILES[$strAttribute]["type"]];

                                            if ($value['params']['filter_file_zip'] === 0 && $extension === 'zip') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok1'; 
                                            }

                                            if ($value['params']['filter_file_png'] === 0 && $extension === 'png') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok22'; 
                                            }

                                            if ($value['params']['filter_file_jpg'] === 0 && $extension === 'jpg') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok3'; 
                                            }

                                            if ($value['params']['filter_file_gif'] === 0 && $extension === 'gif') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok4'; 
                                            }

                                            if ($value['params']['filter_file_swf'] === 0 && $extension === 'swf') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok5'; 
                                            }

                                            if ($value['params']['filter_file_pdf'] === 0 && $extension === 'pdf') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok6'; 
                                            }

                                            if ($value['params']['filter_file_doc'] === 0 && $extension === 'doc') {  
                                                $this->doorGets->Form->e[$strAttribute] = 'ok7'; 
                                            }
                                            
                                        }
                                        
                                        if ($_FILES[$strAttribute]["size"] > $sizeMax) {
                                            
                                            $this->doorGets->Form->e[$strAttribute] = 'ok';
                                            
                                        }
                                    }

                                    if ( isset($_FILES[$strAttribute]) && empty($this->doorGets->Form->e) ) {

                                        $uni = time().'-'.uniqid('doorgets').'';
                                        $nameFile = $uni.'-user'.$extension;
                                        $this->doorGets->Form->i['attribute_'.$idAttribute] = $nameFile;
                                        if ( move_uploaded_file(  $_FILES[$strAttribute]['tmp_name'] ,  BASE_DATA.'users/'.$nameFile )) {
                                    
                                            $dataAttribute = array(
                                                'value' => $nameFile,
                                                'date_modification' => time()
                                            );

                                            $this->doorGets->dbQU($this->doorGets->user['id'],$dataAttribute,'_users_groupes_attributes_values','id_user'," AND id_attribute = '$idAttribute' LIMIT 1");
                                        }

                                    }

                                    break;


                                case 'checkbox':

                                    $checkboxValues = '';
                                    foreach ($value['params']['filter_select'] as $key => $value) {

                                        $strAttribute = 'attribute_'.$idAttribute.'_'.$key;
                                        if (array_key_exists($strAttribute, $this->doorGets->Form->i)) {
                                            $checkboxValues .= $key.',';
                                        }
                                    }

                                    $dataAttribute = array(
                                        'value' => $checkboxValues,
                                        'date_modification' => time()
                                    );

                                    $this->doorGets->dbQU($this->doorGets->user['id'],$dataAttribute,'_users_groupes_attributes_values','id_user'," AND id_attribute = '$idAttribute' LIMIT 1");
                                    
                                    break;
                                
                                default:

                                    $strAttribute = 'attribute_'.$idAttribute;
                                    if (array_key_exists($strAttribute, $this->doorGets->Form->i)) {

                                        $dataAttribute = array(
                                            'value' => $this->doorGets->Form->i[$strAttribute],
                                            'date_modification' => time()
                                        );

                                        $this->doorGets->dbQU($this->doorGets->user['id'],$dataAttribute,'_users_groupes_attributes_values','id_user'," AND id_attribute = '$idAttribute' LIMIT 1");
                                    }
                                    break;
                            }
                        }
                    }
                    

                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = array(  
                            'last_name'                 => $this->doorGets->Form->i['last_name'],
                            'first_name'                => $this->doorGets->Form->i['first_name'],
                            'description'               => $this->doorGets->Form->i['description'],
                            'website'                   => $this->doorGets->Form->i['website'],
                            'id_facebook'               => $this->doorGets->Form->i['id_facebook'],
                            'id_twitter'                => $this->doorGets->Form->i['id_twitter'],
                            'id_youtube'                => $this->doorGets->Form->i['id_youtube'],
                            'id_google'                 => $this->doorGets->Form->i['id_google'],
                            'id_pinterest'              => $this->doorGets->Form->i['id_pinterest'],
                            'id_linkedin'               => $this->doorGets->Form->i['id_linkedin'],
                            'id_myspace'                => $this->doorGets->Form->i['id_myspace'],
                            'country'                   => $this->doorGets->Form->i['country'],
                            'region'                    => $this->doorGets->Form->i['region'],
                            'city'                      => $this->doorGets->Form->i['city'],
                            'zipcode'                   => $this->doorGets->Form->i['zipcode'],
                            'adresse'                   => $this->doorGets->Form->i['adresse'],
                            'tel_fix'                   => $this->doorGets->Form->i['tel_fix'],
                            'tel_mobil'                 => $this->doorGets->Form->i['tel_mobil'],
                            'tel_fax'                   => $this->doorGets->Form->i['tel_fax'],
                            'langue'                    => $this->doorGets->Form->i['langue'],
                            'horaire'                   => $this->doorGets->Form->i['horaire'],
                            'notification_mail'         => $this->doorGets->Form->i['notification_mail'],
                            'notification_newsletter'   => $this->doorGets->Form->i['notification_newsletter'],
                            'editor_html'               => $this->doorGets->Form->i['editor_html'], 
                        );

                        if (array_key_exists('avatar', $this->doorGets->Form->i)) {
                            $data['avatar'] = $this->doorGets->Form->i['avatar'];
                        }   

                        $this->doorGets->dbQU($this->doorGets->user['id'],$data,'_users_info','id_user');
                        //$this->doorGets->clearDBCache();

                        
                        
                        if ($data['langue'] === $this->doorGets->user['langue']) {

                            FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                            header("Location:".$_SERVER['REQUEST_URI']); exit();

                        } else {

                            $_SESSION['doorgets_user']['langue'] = $data['langue'];
                            $url = URL_USER.$data['langue'].'/?controller=account';
                            $this->doorGets->myLanguage = $data['langue'];
                            FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                            header("Location:".$url); exit();

                        }
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'password':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) )
                {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v)
                    {
                        if (empty($v))
                        {
                            
                            $this->doorGets->Form->e['account_password_'.$k] = 'ok';
                            
                        }
                    }
                    
                    $isLoggedUser = false;
                    if ( empty($this->doorGets->Form->e)) {
                        
                        $isUser = $this->doorGets->dbQS($_SESSION['doorgets_user']['token'],'_users','token');
                        if (!empty($isUser)) {

                            $isLoggedUser = true;
                            $hasPassword = $this->doorGets->_decryptMe(
                                $this->doorGets->Form->i['passwd_now'],
                                $isUser['salt'],
                                $isUser['password']
                            );

                            if(!$hasPassword) {
                                $this->doorGets->Form->e['account_password_passwd_now'] = 'ok';
                            }
                        }

                        if (!$isLoggedUser) {
                            $this->doorGets->Form->e['account_password_passwd_now'] = 'ok';
                        }

                    }

                    if (
                        (strlen($this->doorGets->Form->i['passwd_new']) < 8) 
                        || $this->doorGets->Form->i['passwd_new'] !== $this->doorGets->Form->i['passwd_new_bis'] 
                    ) {
                    
                        $this->doorGets->Form->e['account_password_passwd_new'] = 'ok';
                        $this->doorGets->Form->e['account_password_passwd_new_bis'] = 'ok';
                        
                    }
                    
                    if (empty($this->doorGets->Form->e) )
                    {
                        
                        $crypto = $this->doorGets->_cryptMe($this->doorGets->Form->i['passwd_new']);

                        $data['password'] = $crypto['password'];
                        $data['salt'] = $crypto['salt'];

                        $this->doorGets->dbQU($this->doorGets->user['id'],$data,'_users');
                        FlashInfo::set($this->doorGets->__("Votre mot de passe a été modifié."));
                        
                        if ( isset($_SESSION['doorgets_user']) )
                        { 
                            $_SESSION['doorgets_user'] = array();
                        }
                        
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;

            case 'close':

                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) )
                {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v)
                    {
                        if (empty($v))
                        {
                            
                            $this->doorGets->Form->e['account_close_'.$k] = 'ok';
                            
                        }
                    }
                    
                    $isLoggedUser = false;
                    if ( empty($this->doorGets->Form->e)) {
                        
                        $isUser = $this->doorGets->dbQS($_SESSION['doorgets_user']['token'],'_users','token');
                        if (!empty($isUser)) {

                            $isLoggedUser = true;
                            $hasPassword = $this->doorGets->_decryptMe(
                                $this->doorGets->Form->i['passwd_now'],
                                $isUser['salt'],
                                $isUser['password']
                            );

                            if (!$hasPassword) { 
                                
                                $this->doorGets->Form->e['account_close_passwd_now'] = 'ok';
                            }
                        }

                        if (!$isLoggedUser) {
                            $this->doorGets->Form->e['account_close_passwd_now'] = 'ok';
                        }

                    }

                    if (empty($this->doorGets->Form->e) )
                    {
                        
                        // @todo : fermer le compte de l'utilisateur

                        $dataUser = array(
                            'active' => 5
                        );

                        $this->doorGets->dbQU($this->doorGets->user['id'],$dataUser,'_users_info','id_user');

                        $_SESSION = array();

                        FlashInfo::set($this->doorGets->__("Votre compte est maintenant fermé"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;

            case 'email';
                
                
                // Send email code
                
                $isEnd = false;
                if (!empty($this->doorGets->Form['email']->i) && empty($this->doorGets->Form['email']->e) )
                {
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form['email']->i as $k=>$v)
                    {
                        if (empty($v)) {
                            
                            $this->doorGets->Form['email']->e['account_email_'.$k] = 'ok';
                            
                        }
                    }
                    
                    $isLoggedUser = false;
                    if ( empty($this->doorGets->Form['email']->e)) {
                        
                        $isUser = $this->doorGets->dbQS($_SESSION['doorgets_user']['token'],'_users','token');
                        if (!empty($isUser)) {

                            $isLoggedUser = true;
                            $hasPassword = $this->doorGets->_decryptMe(
                                $this->doorGets->Form['email']->i['passwd_now'],
                                $isUser['salt'],
                                $isUser['password']
                            );

                            if (!$hasPassword) { 
                                
                                $this->doorGets->Form['email']->e['account_email_passwd_now'] = 'ok';
                            }
                        }

                        if (!$isLoggedUser) {
                            $this->doorGets->Form['email']->e['account_email_passwd_now'] = 'ok';
                        }

                    }
                    
                    // verification adresse email
                    if (empty($this->doorGets->Form['email']->e['email_new'])) {
                        
                        
                        // verification du format mail
                        $email = filter_var($this->doorGets->Form['email']->i['email_new'], FILTER_VALIDATE_EMAIL);
                        if (empty($email)) {
                            $this->doorGets->Form['email']->e['email_new'] = 'ok';
                        }
                        
                        // verification de l'existance de l'adresse email
                        if (empty($this->doorGets->Form['email']->e['email_new'])) {
                        
                            $isEmail = $this->doorGets->dbQS($this->doorGets->Form['email']->i['email_new'],'_users_info','email');
                            $isEmailLogin = $this->doorGets->dbQS($this->doorGets->Form['email']->i['email_new'],'_users','login');
                            
                            if (!empty($isEmail) || !empty($isEmailLogin)) {
                                
                                $this->doorGets->Form['email']->e['email_new'] = 'ok';
                                $this->doorGets->Form['email']->e['email_new_bis'] = 'ok';
                                
                                FlashInfo::set($this->doorGets->__("Cette adresse est déja utilisée"),"error");
                                $isEnd = true;
                                
                            }
                            
                        }
                        
                        
                        if ($this->doorGets->Form['email']->i['email_new'] !== $this->doorGets->Form['email']->i['email_new_bis']) {
                            
                            $this->doorGets->Form['email']->e['email_new'] = 'ok';
                            $this->doorGets->Form['email']->e['email_new_bis'] = 'ok';
                            
                        }
                        
                    }
                    
                    if (empty($this->doorGets->Form['email']->e) )
                    {
                        
                        
                        $dataCode['type']           = 'new_email';
                        $dataCode['id_user']        = $this->doorGets->user['id'];
                        $dataCode['code']           = $this->_genRandomKey(10);
                        $dataCode['email']          = $this->doorGets->Form['email']->i['email_new'];
                        $dataCode['date_creation']  = time();
                        
                        $this->doorGets->dbQI($dataCode,'_users_activation');
                        
                        // send mail with code 
                        new SendMailAuth($dataCode['email'],'new_email',$dataCode['code'],$this->doorGets);
                        
                        FlashInfo::set($this->doorGets->__("Nous venons de vous envoyer un code par mail"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                        
                    }
                    
                    if (!$isEnd) {
                        FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    }
                    
                }
                
                
                // Verify code
                
                $code = '';
                if (!empty($this->doorGets->Form['email_confirmation']->i) && empty($this->doorGets->Form['email_confirmation']->e) )
                {
                    
                    foreach($this->doorGets->Form['email_confirmation']->i as $k=>$v)
                    {
                        if (empty($v))
                        {
                            
                            $this->doorGets->Form['email_confirmation']->e['account_email_confirmation'.$k] = 'ok';
                            
                        }
                    }
                    
                    if (empty($this->doorGets->Form['email_confirmation']->e) )
                    {
                        $code = trim($this->doorGets->Form['email_confirmation']->i['code']);
                        $isCode = $this->doorGets->dbQS($code,'_users_activation','code',' AND id_user = "'.$this->doorGets->user['id'].'" LIMIT 1');
                        
                        if (empty($isCode)) {
                            $this->doorGets->Form['email_confirmation']->e['account_email_confirmation_code'] = 'ok';
                        }
                    }
                    
                    if (empty($this->doorGets->Form['email_confirmation']->e) )
                    {
                        
                        $this->doorGets->dbQD($this->doorGets->user['id'],'_users_activation','id_user','=','');
                        
                        $login = array('login' => $isCode['email']);
                        $infos = array('email' => $isCode['email']);
                        
                        $this->doorGets->dbQU($this->doorGets->user['id'],$login,'_users');
                        $this->doorGets->dbQU($this->doorGets->user['id'],$infos,'_users_info','id_user');
                        
                        FlashInfo::set($this->doorGets->__("Votre nouvelle adresse est maintenant validée"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Le code n'est pas bon"),"error");
                    
                }
                
                // delete code
                
                if (!empty($this->doorGets->Form['email_confirmation_delete']->i) && empty($this->doorGets->Form['email_confirmation_delete']->e) )
                {
                    
                    $this->doorGets->dbQD($this->doorGets->user['id'],'_users_activation','id_user','=','');
                    FlashInfo::set($this->doorGets->__("La demande a bien été suprimée"));
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                    
                }
                
                
                break;

            case 'api';
                
                $isEnd = false;
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) )
                {
                    
                    $this->doorGets->checkMode();

                    if (!in_array('api',$this->doorGets->user['liste_module_interne'])) {
                        FlashInfo::set($this->doorGets->__("Vous ne pouvez pas générer de clée"),"error");
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }

                    foreach($this->doorGets->Form->i as $k=>$v)
                    {
                        if (empty($v)) {
                            
                            $this->doorGets->Form->e['account_api_'.$k] = 'ok';
                            
                        }
                    }
                    
                    if (empty($this->doorGets->Form->e) )
                    {
                        
                        $this->doorGets->dbQD($this->doorGets->user['id'],'_users_access_token','id_user','=','');
                        
                        $dataAccessToken['id_user']        = $this->doorGets->user['id'];
                        $dataAccessToken['token']          = $this->doorGets->_genRandomKey(43);
                        $dataAccessToken['is_valid']       = 1;
                        $dataAccessToken['date_creation']  = time();
                        
                        $this->doorGets->dbQI($dataAccessToken,'_users_access_token');
                        
                        FlashInfo::set($this->doorGets->__("Une nouvelle clée a été généré"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                }
                
                break;

        }
        
        return $out;
        
    }
    
}
