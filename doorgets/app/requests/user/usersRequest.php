<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
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


class UsersRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        $groupes = $this->doorGets->loadGroupes();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_info');
            if (empty($isContent)) {
                return null;
            }

            $LogineExistInfoGroupe = $this->doorGets->dbQS($isContent['network'],'_users_groupes');

            if (!empty($LogineExistInfoGroupe)) {
                $LogineExistInfoGroupe['attributes'] =  @unserialize($LogineExistInfoGroupe['attributes']);
            }

        }



        switch($this->Action) {
            
            case 'index':
                
                // to do
                
                break;
            
            case 'add':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                    
                    'last_name','first_name','description'

                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                    }

                    if (!in_array($this->doorGets->Form->i['network'],$this->doorGets->user['liste_enfant_modo'])) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_network'] = 'ok';
                    }

                    $var = $this->doorGets->Form->i['login'];
                    $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
                    $isEmailExist = $this->doorGets->dbQS($var,'_users','login');
                    if (empty($isEmail)) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_login'] = 'ok';
                    }
                    if (!empty($isEmailExist)) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_login'] = 'ok';
                    }

                    // verification du pseudo
                    if (empty($this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_pseudo'])) {
                        
                        if (strlen($this->doorGets->Form->i['pseudo']) < 3) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_pseudo'] = 'Pseudo trop court';
                            
                        }
                        
                        if (empty($this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_pseudo'])) {
                            
                            $pseudo = trim(strtolower($this->doorGets->Form->i['pseudo']));
                            $checkPseudo = ctype_alnum($pseudo);
                            
                            if (empty($checkPseudo)) {
                                $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_pseudo'] = 'Format invalid';
                            }
                            
                            $isPseudo = $this->doorGets->dbQS($this->doorGets->Form->i['login'],'_users_info','pseudo');
                            if (!empty($isPseudo)) {
                                
                                $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_pseudo'] = 'Pseudo deja ulisise';
                                
                            }   
                        }                        
                    }
                    
                    if (empty($this->doorGets->Form->e)) {

                        $avatar = $this->doorGets->copyGravatar($this->doorGets->Form->i['login']);

                        $crypto = $this->doorGets->_cryptMe($this->doorGets->Form->i['password']);

                        $dataLogin['login']     = $this->doorGets->Form->i['login'];
                        $dataLogin['salt']      = $crypto['salt'];
                        $dataLogin['password']  = $crypto['password'];

                        $email = $this->doorGets->Form->i['login'];
                        
                        $idUser= $this->doorGets->dbQI($dataLogin,'_users');
        
                        unset($this->doorGets->Form->i['login']);
                        unset($this->doorGets->Form->i['password']);
                        
                        $d['last_name']                  = $this->doorGets->Form->i['last_name'];
                        $d['first_name']                 = $this->doorGets->Form->i['first_name'];
                        $d['description']                = $this->doorGets->Form->i['description'];         
                        $d['network']                    = $this->doorGets->Form->i['network'];
                        $d['active']                     = $this->doorGets->Form->i['active'];
                        $d['langue']                     = $this->doorGets->Form->i['langue'];
                        $d['horaire']                    = $this->doorGets->Form->i['horaire'];
                        $d['pseudo']                     = $pseudo;
                        $d['avatar']                     = $avatar;
                        $d['id_user']                    = $idUser;
                        $d['email']                      = $email;
                        $d['date_creation']              = time();
                        
                        $idUserInfo= $this->doorGets->dbQI($d,'_users_info');

                        $this->doorGets->createFolderUser($d['pseudo'],$d['id_user']);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=users&action=edit&id='.$idUser); exit();

                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'edit':
                
                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                    
                    'last_name','first_name','description','gender',
                    'birthday_jour','birthday_mois','birthday_annee',
                    'website','id_facebook','id_twitter','id_youtube','id_google','id_pinterest','id_linkedin','id_myspace',
                    'password',
                    'country','city','zipcode','adresse','tel_fix','tel_mobil','tel_fax'

                );

                if (!empty($this->doorGets->Form->i) && in_array($isContent['network'],$this->doorGets->user['liste_enfant_modo'])) {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                            
                        }
                    }
                    
                    $var = $this->doorGets->Form->i['email'];
                    $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
                    if (empty($isEmail)) {
                        
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_email'] = 'ok';
                        
                    }
                    
                    $isEmailExist = $this->doorGets->dbQS($var,'_users_info','email'," AND id_user != '".$isContent['id_user']."' LIMIT 1 ");
                    if (!empty($isEmailExist)) {
                        
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_login'] = 'ok';
                        
                    }

                    if (empty($this->doorGets->Form->e)) {

                        $Attributes = $this->doorGets->loadUserAttributesWithValues($isContent['id'],$LogineExistInfoGroupe['attributes']);

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
                                        $nameFile = $uni.'-user.'.$extension;
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
                    
                    if (!in_array($this->doorGets->Form->i['network'],$this->doorGets->user['liste_enfant_modo'])) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_network'] = 'ok';
                    }

                    if (empty($this->doorGets->Form->e)) {
                            
                        $dataUser['login'] = $this->doorGets->Form->i['email'];
                        if (!empty($this->doorGets->Form->i['password'])) {
                            
                            $crypto = $this->doorGets->_cryptMe($this->doorGets->Form->i['password']);

                            $dataUser['salt']      = $crypto['salt'];
                            $dataUser['password']  = $crypto['password'];
                            $dataUser['token']     = '';
                        }

                        $d['last_name']                  = $this->doorGets->Form->i['last_name'];
                        $d['email']                      = $this->doorGets->Form->i['email'];
                        $d['first_name']                 = $this->doorGets->Form->i['first_name'];
                        $d['description']                = $this->doorGets->Form->i['description'];         
                        $d['network']                    = $this->doorGets->Form->i['network'];
                        $d['website']                    = $this->doorGets->Form->i['website'];
                        $d['id_facebook']                = $this->doorGets->Form->i['id_facebook'];
                        $d['id_twitter']                 = $this->doorGets->Form->i['id_twitter'];
                        $d['id_youtube']                 = $this->doorGets->Form->i['id_youtube'];
                        $d['id_google']                  = $this->doorGets->Form->i['id_google'];
                        $d['id_pinterest']               = $this->doorGets->Form->i['id_pinterest'];
                        $d['id_linkedin']                = $this->doorGets->Form->i['id_linkedin'];
                        $d['id_myspace']                 = $this->doorGets->Form->i['id_myspace'];
                        $d['country']                    = $this->doorGets->Form->i['country'];
                        $d['city']                       = $this->doorGets->Form->i['city'];
                        $d['zipcode']                    = $this->doorGets->Form->i['zipcode'];
                        $d['adresse']                    = $this->doorGets->Form->i['adresse'];
                        $d['tel_fix']                    = $this->doorGets->Form->i['tel_fix'];
                        $d['tel_mobil']                  = $this->doorGets->Form->i['tel_mobil'];
                        $d['tel_fax']                    = $this->doorGets->Form->i['tel_fax'];
                        $d['active']                     = $this->doorGets->Form->i['active'];
                        $d['langue']                     = $this->doorGets->Form->i['langue'];
                        $d['horaire']                    = $this->doorGets->Form->i['horaire'];
                        $d['profile_type']               = $this->doorGets->Form->i['profile_type'];
                        $d['notification_mail']          = $this->doorGets->Form->i['notification_mail'];
                        $d['notification_newsletter']    = $this->doorGets->Form->i['notification_newsletter'];

                        $this->doorGets->dbQU($isContent['id_user'],$dataUser,'_users');
                        $this->doorGets->dbQU($isContent['id_user'],$d,'_users_info','id_user');
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();
                        
                        $redirectUrl = './?controller=users&action=edit&id='.$isContent['id'];
                        header('Location:'.$redirectUrl); exit();
                        
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'delete':
                
                if (
                    !empty($this->doorGets->Form->i) 
                    && empty($this->doorGets->Form->e)  
                    && in_array($isContent['network'],$this->doorGets->user['liste_enfant_modo'])
                    && $this->doorGets->user['id'] !== $isContent['id']
                ) {
                    
                    $this->doorGets->checkMode();
                
                    $this->doorGets->dbQD($isContent['id_user'],'_users','id');
                    $this->doorGets->dbQD($isContent['id_user'],'_users_info','id_user');
                    //$this->doorGets->clearDBCache();

                    if (is_dir(BASE.'u/'.$isContent['pseudo'])) {
                        
                        $this->rrmdir(BASE.'u/'.$isContent['pseudo']);
                    }
                    
                    FlashInfo::set("Vos informations sont bien supprimées");
                    header('Location:./?controller=users');
                    exit();
                    
                }
                
                break;            
            
        }
        
        return $out;
        
    }
    
    private function rrmdir($dir) {
        
        if (is_dir($dir)) {
            
            $files = scandir($dir);
            foreach ($files as $file) {
                
                if ($file != "." && $file != "..") {
                    
                    $this->rrmdir("$dir/$file");
                }

                 @rmdir($dir);
            }

        } elseif (file_exists($dir)) {
            
            @unlink($dir);
        }
    }
}
