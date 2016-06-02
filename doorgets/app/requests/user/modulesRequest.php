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


class ModulesRequest extends doorGetsUserRequest{
    
    public $installDB;
    
    public function __construct(&$doorGets) {
        
        $this->installDB = new DoDatabaseInstaller($doorGets);

        parent::__construct($doorGets);
    }
    
    public function doAction() {
        
        $out = '';
        $lgActuel = $this->doorGets->getLangueTradution();
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_modules');
            if (empty($isContent)) {
                header('Location:./?controller=modules'); exit();
            }
            if (!empty($isContent)) {
                
                $lgGroupe = @unserialize($isContent['groupe_traduction']);
                $idLgGroupe = $lgGroupe[$lgActuel];
                
                $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_modules_traduction');
                if (!empty($isContentTraduction)) {
                    
                    unset($isContentTraduction['id']);
                    $isContent = array_merge($isContent,$isContentTraduction);
                    
                }else{
                    
                    $isContentTraductionTemp = $this->doorGets->dbQS($this->doorGets->configWeb['langue_front'],'_modules_traduction','langue');
                    
                    unset($isContentTraductionTemp['id']);
                    $isContentTraductionTemp['langue'] = $lgActuel;
                    
                    $idNewContent = $this->doorGets->dbQI($isContentTraductionTemp,'_modules_traduction');
                    
                    $lgGroupe[$lgActuel] = $idNewContent;
                    
                    $sLgGroupe['groupe_traduction'] = serialize($lgGroupe);
                    $this->doorGets->dbQU($id,$sLgGroupe,$this->doorGets->table);
                    
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_modules_traduction');
                    $isContent = array_merge($isContent,$isContentTraduction);
                }
                
            }
            
        }
        
        $cResultsInt = $this->doorGets->getCountTable('_rubrique');
        $nonObligatoire = array(
            'description','top_tinymce','bottom_tinymce',
            'image','meta_titre','meta_description','meta_keys',
            'meta_facebook_titre','meta_facebook_description','meta_facebook_image',
            'meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player',
            'uri_notification_moderator', 'uri_notification_user_success', 'uri_notification_user_error',
            'password'
        );
        
        switch($this->Action) {
            
            case 'addgenform':
                
                $Form = $this->doorGets->Form->i;
                $Obligatoire = array('titre','uri','send_mail_to');
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    $dataForm = $this->getArraysForm();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && in_array($k,$Obligatoire)) {
                            $this->doorGets->Form->e['modules_addgenform_'.$k] = 'ok';
                        }
                    }
                    
                    
                    // gestion de l'url
                    if (!empty($this->doorGets->Form->i['redirection'])) {
                        $var = $this->doorGets->Form->i['redirection'];
                        $isUrl = filter_var($var, FILTER_VALIDATE_URL);
                        if (empty($isUrl)) {
                            $this->doorGets->Form->e['modules_addgenform_redirection'] = 'ok';
                        }                        
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addgenform_uri'] = 'ok';
                    }
                    
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addgenform_uri'] = 'ok';
                    }
                    if (empty($dataForm)) {
                        $this->doorGets->Form->e['modules_addgenform_dataform'] = 'ok';
                    }
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('send_mail',$Form)) {
                            $Form['send_mail'] = 0;
                        }
                        if (!array_key_exists('recaptcha',$Form)) {
                            $Form['recaptcha'] = 0;
                        }
                        
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'genform';
                        $data['active']             = $Form['active'];
                        $data['notification_mail']  = $Form['send_mail'];
                        $data['extras']             = base64_encode(serialize($dataForm));
                        $data['redirection']        = $Form['redirection'];
                        $data['recaptcha']          = $Form['recaptcha'];
                        $data['date_creation']      = time();
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');

                        $dataNext = array(
                            'titre' => $this->doorGets->Form->i['titre'],
                        );

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module']          = $idModule;
                            $dataNext['langue']             = $k;
                            $dataNext['extras']             = base64_encode(serialize($dataForm));
                            $dataNext['date_modification']  = time();
                            $idTraduction[$k]               = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createGenformInstance($data['uri'],$dataForm));
                        
                        $this->addModuleToGroupeList($idModule,'widget');

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulegenform&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;
            
            case 'addcarousel':
               
               $Form = $this->doorGets->Form->i;
               
               if (!empty($Form)) {
                   
                   $this->doorGets->checkMode();
                   
                   foreach($Form as $k=>$v) {
                       if (empty($v) && !in_array($k,$nonObligatoire)) {
                           $this->doorGets->Form->e['modules_addcarousel_'.$k] = 'ok';
                       }
                   }
                 
                   // gestion de l'uri
                   $Form['uri'] = $uri = strtolower($Form['uri']);
 -
                   $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                   if (!$isValidUri) {
                       $this->doorGets->Form->e['modules_addcarousel_uri'] = 'ok';
                   }
                   
                   if (strtolower($Form['uri']) === 'doorgets') {
                       $this->doorGets->Form->e['modules_addcarousel_uri'] = 'ok';
                   }
                   
                   if (empty($this->doorGets->Form->e)) {
                       
                       if (!array_key_exists('active',$Form)) {
                           $Form['active'] = 0;
                       }
                       
                       $data['uri']            = $Form['uri'];
                       $data['type']           = 'carousel';
                       $data['active']         = $Form['active'];
                       $data['date_creation']  = time();
                       
                       $idModule = $this->doorGets->dbQI($data,'_modules');
                       
                       $dataNext = array(
                           'titre' => $Form['titre'],
                       );
                       
                       foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                           
                           $dataNext['id_module']          = $idModule;
                           $dataNext['langue']             = $k;
                           $dataNext['date_modification']  = time();
                           $idTraduction[$k]               = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                           
                       }
                       
                       $dataModification['groupe_traduction'] = serialize($idTraduction);
                       $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                       
                       $this->installDB->createCarouselInstance($data['uri'],$Form['titre']);
                       
                       $this->addModuleToGroupeList($idModule,'widget');
 -
                       FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                       header('Location:./?controller=modulecarousel&uri='.$Form['uri']);
                       exit();
                       
                   }
                   
                   FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                   
                }
                break;
            
            case 'addsurvey':

                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addsurvey_'.$k] = 'ok';
                        }
                    }

                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addsurvey_uri'] = 'ok';
                    }

                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addsurvey_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        
                        $data['uri']            = $Form['uri'];
                        $data['type']           = 'survey';
                        $data['active']         = $Form['active'];
                        $data['date_creation']  = time();
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        $dataNext = array(
                            'titre' => $Form['titre'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module']          = $idModule;
                            $dataNext['langue']             = $k;
                            $dataNext['date_modification']  = time();
                            $idTraduction[$k]               = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->installDB->createSurveyInstance($data['uri'],$Form['titre']);
                        
                        $this->addModuleToGroupeList($idModule,'widget');

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulesurvey&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;

            case 'addblock':
                
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addblock_'.$k] = 'ok';
                        }
                    }

                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addblock_uri'] = 'ok';
                    }

                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addblock_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        
                        $data['uri']            = $Form['uri'];
                        $data['type']           = 'block';
                        $data['active']         = $Form['active'];
                        $data['date_creation']  = time();
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        $dataNext = array(
                            'titre' => $Form['titre'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module']          = $idModule;
                            $dataNext['langue']             = $k;
                            $dataNext['date_modification']  = time();
                            $idTraduction[$k]               = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->installDB->createBlockInstance($data['uri'],$Form['titre']);
                        
                        $this->addModuleToGroupeList($idModule,'widget');

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=moduleblock&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;
            
            case 'addpage':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/page/page_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addpage_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);
                    
                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addpage_uri'] = 'ok';
                    }

                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addpage_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'page';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['date_creation']      = time();
                        
                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->installDB->createPageInstance($data['uri'],$Form);
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulepage&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
            break;

            case 'addonepage':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/onepage/onepage_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addonepage_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);
                    
                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addonepage_uri'] = 'ok';
                    }

                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addonepage_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'onepage';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['date_creation']      = time();
                        
                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->installDB->createOnepageInstance($data['uri'],$Form);
                        
                        if ($newTopic) {

                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();

                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=moduleonepage&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
            break;

            case 'addmultipage':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/multipage/multipage_listing.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addmultipage_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addmultipage_uri'] = 'ok';
                    }
                    
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addmultipage_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'multipage';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['date_creation']      = time();
                        
                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlMultipage($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulemultipage&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

            break;

            case 'addsharedlinks':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/sharedlinks/sharedlinks_listing.tpl.php';
                $defaultTemplateContent = 'modules/sharedlinks/sharedlinks_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addsharedlinks_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addsharedlinks_uri'] = 'ok';
                    }
                    
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addsharedlinks_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        if ($Form['template_content'] !== $defaultTemplateContent) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_content'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['author_badge']       = $Form['author_badge'];
                        $data['type']               = 'sharedlinks';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['bynum']              = $Form['bynum'];
                        $data['avoiraussi']         = $Form['avoiraussi'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['date_creation']      = time();
                        
                        $data['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $data['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $data['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlSharedlinks($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulesharedlinks&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

                break;

            case 'addnews':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/news/news_listing.tpl.php';
                $defaultTemplateContent = 'modules/news/news_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addnews_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addnews_uri'] = 'ok';
                    }
                    
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addnews_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        if ($Form['template_content'] !== $defaultTemplateContent) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_content'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['author_badge']       = $Form['author_badge'];
                        $data['type']               = 'news';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['bynum']              = $Form['bynum'];
                        $data['avoiraussi']         = $Form['avoiraussi'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['date_creation']      = time();
                        
                        $data['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $data['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $data['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlNews($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulenews&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

                break;

            case 'addblog':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/blog/blog_listing.tpl.php';
                $defaultTemplateContent = 'modules/blog/blog_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addblog_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addblog_uri'] = 'ok';
                    }
                                      
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addblog_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        if ($Form['template_content'] !== $defaultTemplateContent) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_content'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                    = $Form['uri'];
                        $data['author_badge']           = $Form['author_badge'];
                        $data['type']                   = 'blog';
                        $data['active']                 = $Form['active'];
                        $data['is_first']               = $Form['is_first'];
                        $data['template_index']         = $Form['template_index'];
                        $data['template_content']       = $Form['template_content'];
                        $data['bynum']                  = $Form['bynum'];
                        $data['avoiraussi']             = $Form['avoiraussi'];
                        $data['notification_mail']      = $Form['notification_mail'];
                        $data['date_creation']          = time();
                        
                        $data['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $data['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $data['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');

                        $this->doorGets->dbQL($this->installDB->createSqlBlog($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=moduleblog&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

                break;

            case 'addshop':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/shop/shop_listing.tpl.php';
                $defaultTemplateContent = 'modules/shop/shop_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addshop_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addshop_uri'] = 'ok';
                    }
                                      
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addshop_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        if ($Form['template_content'] !== $defaultTemplateContent) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_content'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                    = $Form['uri'];
                        $data['author_badge']           = $Form['author_badge'];
                        $data['type']                   = 'shop';
                        $data['active']                 = $Form['active'];
                        $data['is_first']               = $Form['is_first'];
                        $data['template_index']         = $Form['template_index'];
                        $data['template_content']       = $Form['template_content'];
                        $data['bynum']                  = $Form['bynum'];
                        $data['avoiraussi']             = $Form['avoiraussi'];
                        $data['notification_mail']      = $Form['notification_mail'];
                        $data['date_creation']          = time();
                        
                        $data['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $data['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $data['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');

                        $this->doorGets->dbQL($this->installDB->createSqlShop($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=moduleshop&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

                break;

            case 'addvideo':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/video/video_listing.tpl.php';
                $defaultTemplateContent = 'modules/video/video_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addvideo_'.$k] = 'ok';
                        }
                    }
                  
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addvideo_uri'] = 'ok';
                    }
                                      
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addvideo_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        if ($Form['template_content'] !== $defaultTemplateContent) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_content'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                    = $Form['uri'];
                        $data['author_badge']           = $Form['author_badge'];
                        $data['type']                   = 'video';
                        $data['active']                 = $Form['active'];
                        $data['is_first']               = $Form['is_first'];
                        $data['template_index']         = $Form['template_index'];
                        $data['template_content']       = $Form['template_content'];
                        $data['bynum']                  = $Form['bynum'];
                        $data['avoiraussi']             = $Form['avoiraussi'];
                        $data['notification_mail']      = $Form['notification_mail'];
                        $data['date_creation']          = time();
                        
                        $data['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $data['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $data['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlVideo($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulevideo&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

            break;

            case 'addimage':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/image/image_listing.tpl.php';
                $defaultTemplateContent = 'modules/image/image_content.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addimage_'.$k] = 'ok';
                        }
                    }
                  
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addimage_uri'] = 'ok';
                    }  
                  
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addimage_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        if ($Form['template_content'] !== $defaultTemplateContent) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_content'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                    = $Form['uri'];
                        $data['author_badge']           = $Form['author_badge'];
                        $data['type']                   = 'image';
                        $data['active']                 = $Form['active'];
                        $data['is_first']               = $Form['is_first'];
                        $data['template_index']         = $Form['template_index'];
                        $data['template_content']       = $Form['template_content'];
                        $data['bynum']                  = $Form['bynum'];
                        $data['avoiraussi']             = $Form['avoiraussi'];
                        $data['notification_mail']      = $Form['notification_mail'];
                        $data['date_creation']          = time();
                        
                        $data['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $data['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $data['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlImage($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=moduleimage&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

            break;

            case 'addinbox':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/inbox/inbox_form.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addinbox_'.$k] = 'ok';
                        }
                    }
                  
                    // @todo
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addinbox_uri'] = 'ok';
                    }
                  
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addinbox_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'inbox';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['date_creation']      = time();
                        
                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modules');
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
            
            break;

            case 'addfaq':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/faq/faq_listing.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addfaq_'.$k] = 'ok';
                        }
                    }
                  
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addfaq_uri'] = 'ok';
                    }
                                      
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addfaq_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'faq';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['date_creation']      = time();
                        
                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlFaq($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulefaq&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
            
            break;

            case 'addpartner':
                
                $Form = $this->doorGets->Form->i;
                
                $defaultTemplateIndex = 'modules/partner/partner_listing.tpl.php';
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addpartner_'.$k] = 'ok';
                        }
                    }
                    
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addpartner_uri'] = 'ok';
                    }
                  
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addpartner_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if ($Form['type'] == 'block') {
                            $Form['is_first'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        if ($Form['template_index'] !== $defaultTemplateIndex) {
                            
                            $fFrom = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$defaultTemplateIndex;
                            $fTo = THEME.$this->doorGets->configWeb['theme'].'/website/template/'.$Form['template_index'];
                            if (!is_file($fTo)) {
                                copy($fFrom,$fTo);
                            }
                            
                        }
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $data['with_password']      = $Form['with_password'];
                        $data['public_module']      = $Form['public_module'];
                        $data['public_comment']     = $Form['public_comment'];
                        $data['public_add']         = $Form['public_add'];
                        $data['password']           = $Form['password'];
                        $data['uri']                = $Form['uri'];
                        $data['type']               = 'partner';
                        $data['active']             = $Form['active'];
                        $data['is_first']           = $Form['is_first'];
                        $data['template_index']     = $Form['template_index'];
                        $data['template_content']   = $Form['template_content'];
                        $data['notification_mail']  = $Form['notification_mail'];
                        $data['date_creation']      = time();
                        
                        if ($data['is_first'] == 1) {
                            
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                        }
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        if ($data['is_first'] == 1) {
                            
                            $dataModuleWebsite['module_homepage'] = $data['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->doorGets->dbQL($this->installDB->createSqlPartner($data['uri']));
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulepartner&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }

            break;

            case 'addlink':
                
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && !in_array($k,$nonObligatoire)) {
                            $this->doorGets->Form->e['modules_addlink_'.$k] = 'ok';
                        }
                    }
                  
                    // gestion de l'uri
                    $Form['uri'] = $uri = strtolower($Form['uri']);

                    $isValidUri = $this->doorGets->isValidUri($uri,'_modules');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e['modules_addlink_uri'] = 'ok';
                    }
                                      
                    if (strtolower($Form['uri']) === 'doorgets') {
                        $this->doorGets->Form->e['modules_addlink_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        
                        $newTopic  = false;
                        if (array_key_exists('new_topic',$Form)) {
                            $newTopic = true;
                            unset($Form['new_topic']);
                        }
                        
                        $data['uri'] = $Form['uri'];
                        $data['type'] = 'link';
                        $data['active'] = $Form['active'];
                        $data['is_first'] = 0;
                        $data['notification_mail'] = 0;
                        $data['date_creation'] = time();
                        
                        $idModule = $this->doorGets->dbQI($data,'_modules');
                        
                        $dataNext = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                        );
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext['id_module'] = $idModule;
                            $dataNext['langue'] = $k;
                            $dataNext['date_modification'] = time();
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_modules_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idModule,$dataModification,'_modules');
                        
                        $this->installDB->createLinkInstance($data['uri']);
                        
                        if ($newTopic) {
                            $dataRub['name'] = $Form['uri'];
                            $dataRub['ordre'] = $cResultsInt + 1;
                            $dataRub['idModule'] = $idModule;
                            $dataRub['showinmenu'] = 1;
                            $dataRub['date_creation'] = time();
                            $this->doorGets->dbQI($dataRub,'_rubrique');
                        }
                        
                        $this->addModuleToGroupeList($idModule);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulelink&uri='.$Form['uri']);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
            break;
            
            case 'editonepage':
            case 'editpage': 
          
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v)  && !in_array($k,$nonObligatoire) )
                        {
                            $this->doorGets->Form->e['modules_'.$this->doorGets->Action.'_'.$k] = 'ok';
                        }
                    }
                    
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }

                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $dataContenu['with_password']       = $Form['with_password'];
                        $dataContenu['public_module']       = $Form['public_module'];
                        $dataContenu['public_comment']      = $Form['public_comment'];
                        $dataContenu['public_add']          = $Form['public_add'];
                        $dataContenu['password']            = $Form['password'];
                        $dataContenu['active']              = $Form['active'];
                        $dataContenu['template_index']      = $Form['template_index'];
                        $dataContenu['template_content']    = $Form['template_content'];
                        $dataContenu['notification_mail']   = $Form['notification_mail'];
                        
                        $dataContenu['is_first'] = $Form['is_first'];
                        
                        
                        if ($dataContenu['is_first'] == 1) {
                       
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                            
                            $dataModuleWebsite['module_homepage'] = $isContent['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $data = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        $this->doorGets->dbQU($isContent['id'],$dataContenu,'_modules','id');
                        $this->doorGets->dbQU($isContent['id'],$data,'_modules_traduction','id_module'," AND langue = '$lgActuel' LIMIT 1 ");
                        
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
            break;
            

            case 'editblog':
            case 'editshop':
            case 'editnews':
            case 'editvideo':
            case 'editimage':

                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v)  && !in_array($k,$nonObligatoire) )
                        {
                            $this->doorGets->Form->e['modules_'.$this->doorGets->Action.'_'.$k] = 'ok';
                        }
                    }
                    
                    
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('author_badge',$Form)) {
                            $Form['author_badge'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                         
                        $dataContenu['with_password']       = $Form['with_password'];
                        $dataContenu['public_module']       = $Form['public_module'];
                        $dataContenu['public_comment']      = $Form['public_comment'];
                        $dataContenu['public_add']          = $Form['public_add'];
                        $dataContenu['password']            = $Form['password'];
                        $dataContenu['active']              = $Form['active'];
                        $dataContenu['author_badge']        = $Form['author_badge'];
                        $dataContenu['bynum']               = $Form['bynum'];
                        $dataContenu['avoiraussi']          = $Form['avoiraussi'];
                        $dataContenu['template_index']      = $Form['template_index'];
                        $dataContenu['template_content']    = $Form['template_content'];
                        $dataContenu['notification_mail']   = $Form['notification_mail'];
                        

                        $dataContenu['uri_notification_moderator']      = $Form['uri_notification_moderator'];
                        $dataContenu['uri_notification_user_success']   = $Form['uri_notification_user_success'];
                        $dataContenu['uri_notification_user_error']     = $Form['uri_notification_user_error'];

                        $dataContenu['is_first'] = $Form['is_first'];
                        
                        
                        if ($dataContenu['is_first'] == 1) {
                       
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                            
                            $dataModuleWebsite['module_homepage'] = $isContent['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $data = array(
                            'nom'                       => $Form['nom'],
                            'titre'                     => $Form['titre'],
                            'description'               => $Form['description'],
                            'top_tinymce'               => $Form['top_tinymce'],
                            'bottom_tinymce'            => $Form['bottom_tinymce'],
                            'meta_titre'                => $Form['meta_titre'],
                            'meta_description'          => $Form['meta_description'],
                            'meta_keys'                 => $Form['meta_keys'],
                            'meta_facebook_type'        => $Form['meta_facebook_type'],
                            'meta_facebook_titre'       => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image'       => $Form['meta_facebook_image'],
                            'meta_twitter_type'         => $Form['meta_twitter_type'],
                            'meta_twitter_titre'        => $Form['meta_twitter_titre'],
                            'meta_twitter_description'  => $Form['meta_twitter_description'],
                            'meta_twitter_image'        => $Form['meta_twitter_image'],
                            'meta_twitter_player'       => $Form['meta_twitter_player'],
                        );

                        
                        $this->doorGets->dbQU($isContent['id'],$dataContenu,'_modules','id');
                        $this->doorGets->dbQU($isContent['id'],$data,'_modules_traduction','id_module'," AND langue = '$lgActuel' LIMIT 1 ");
                        
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;

            case 'editcarousel':
            case 'editsurvey':
            case 'editblock':
                
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v)  && !in_array($k,$nonObligatoire) )
                        {
                            $this->doorGets->Form->e['modules_'.$this->doorGets->Action.'_'.$k] = 'ok';
                        }
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        $dataContenu['active']              = $Form['active'];
                        $dataContenu['notification_mail']   = $Form['notification_mail'];
                        
                        $dataContenu['is_first'] = $Form['is_first'];
                        
                        if ($dataContenu['is_first'] == 1) {
                       
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                            
                            $dataModuleWebsite['module_homepage'] = $isContent['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }
                        
                        $data = array(
                            'titre' => $Form['titre'],
                        );

                        $this->doorGets->dbQU($isContent['id'],$dataContenu,'_modules','id');
                        $this->doorGets->dbQU($isContent['id'],$data,'_modules_traduction','id_module'," AND langue = '$lgActuel' LIMIT 1 ");
                        
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;

            case 'editlink':
                
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v)  && !in_array($k,$nonObligatoire) )
                        {
                            $this->doorGets->Form->e['modules_'.$this->doorGets->Action.'_'.$k] = 'ok';
                        }
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        $dataContenu['with_password']       = $Form['with_password'];
                        $dataContenu['public_module']       = $Form['public_module'];
                        $dataContenu['public_comment']      = $Form['public_comment'];
                        $dataContenu['public_add']          = $Form['public_add'];
                        $dataContenu['active']              = $Form['active'];
                        
                        $dataContenu['is_first'] = $Form['is_first'];
                        
                        
                        if ($dataContenu['is_first'] == 1) {
                       
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                            
                            $dataModuleWebsite['module_homepage'] = $isContent['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $data = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                        );

                        $this->doorGets->dbQU($isContent['id'],$dataContenu,'_modules','id');
                        $this->doorGets->dbQU($isContent['id'],$data,'_modules_traduction','id_module'," AND langue = '$lgActuel' LIMIT 1 ");
                        
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;

            case 'editmultipage':
            case 'editinbox':
            case 'editfaq':
            case 'editpartner':
                
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v)  && !in_array($k,$nonObligatoire) )
                        {
                            $this->doorGets->Form->e['modules_'.$this->doorGets->Action.'_'.$k] = 'ok';
                        }
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('with_password',$Form)) {
                            $Form['with_password'] = 0;
                        }
                        if (!array_key_exists('public_module',$Form)) {
                            $Form['public_module'] = 0;
                        }
                        if (!array_key_exists('public_comment',$Form)) {
                            $Form['public_comment'] = 0;
                        }
                        if (!array_key_exists('public_add',$Form)) {
                            $Form['public_add'] = 0;
                        }
                        if (!array_key_exists('notification_mail',$Form)) {
                            $Form['notification_mail'] = 0;
                        }
                        if (!array_key_exists('is_first',$Form)) {
                            $Form['is_first'] = 0;
                        }
                        
                        
                        $Form['template_index'] = str_replace('.tpl.php','',$Form['template_index']);
                        $Form['template_content'] = str_replace('.tpl.php','',$Form['template_content']);
                        
                        $dataContenu['with_password']       = $Form['with_password'];
                        $dataContenu['public_module']       = $Form['public_module'];
                        $dataContenu['public_comment']      = $Form['public_comment'];
                        $dataContenu['public_add']          = $Form['public_add'];
                        $dataContenu['password']            = $Form['password'];
                        $dataContenu['active']              = $Form['active'];
                        
                        $dataContenu['template_index']      = $Form['template_index'];
                        $dataContenu['template_content']    = $Form['template_content'];
                        $dataContenu['notification_mail']   = $Form['notification_mail'];
                        
                        $dataContenu['is_first'] = $Form['is_first'];
                        
                        
                        if ($dataContenu['is_first'] == 1) {
                       
                            $this->doorGets->dbQL("UPDATE _modules SET is_first = 0 WHERE id >= 1");
                            
                            $dataModuleWebsite['module_homepage'] = $isContent['uri'];
                            $this->doorGets->dbQU(1,$dataModuleWebsite,'_website');
                            
                        }

                        $data = array(
                            'nom' => $Form['nom'],
                            'titre' => $Form['titre'],
                            'description' => $Form['description'],
                            'top_tinymce' => $Form['top_tinymce'],
                            'bottom_tinymce' => $Form['bottom_tinymce'],
                            'meta_titre' => $Form['meta_titre'],
                            'meta_description' => $Form['meta_description'],
                            'meta_keys' => $Form['meta_keys'],
                            'meta_facebook_type' => $Form['meta_facebook_type'],
                            'meta_facebook_titre' => $Form['meta_facebook_titre'],
                            'meta_facebook_description' => $Form['meta_facebook_description'],
                            'meta_facebook_image' => $Form['meta_facebook_image'],
                            'meta_twitter_type' => $Form['meta_twitter_type'],
                            'meta_twitter_titre' => $Form['meta_twitter_titre'],
                            'meta_twitter_description' => $Form['meta_twitter_description'],
                            'meta_twitter_image' => $Form['meta_twitter_image'],
                            'meta_twitter_player' => $Form['meta_twitter_player'],
                        );

                        $this->doorGets->dbQU($isContent['id'],$dataContenu,'_modules','id');
                        $this->doorGets->dbQU($isContent['id'],$data,'_modules_traduction','id_module'," AND langue = '$lgActuel' LIMIT 1 ");
                        
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                break;
            
            case 'editgenform':
            
                $Form = $this->doorGets->Form->i;
                $Obligatoire = array('titre','uri','send_mail_to');
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    $dataForm = $this->getArraysForm();
                    
                    foreach($Form as $k=>$v) {
                        if (empty($v) && in_array($k,$Obligatoire)) {
                            $this->doorGets->Form->e['modules_editgenform_'.$k] = 'ok';
                        }
                    }
                    // gestion de l'url
                    if (!empty($this->doorGets->Form->i['redirection'])) {
                        $var = $this->doorGets->Form->i['redirection'];
                        $isUrl = filter_var($var, FILTER_VALIDATE_URL);
                        if (empty($isUrl)) {
                            $this->doorGets->Form->e['modules_editgenform_redirection'] = 'ok';
                        }                        
                    }
                    
                    
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$Form)) {
                            $Form['active'] = 0;
                        }
                        if (!array_key_exists('send_mail',$Form)) {
                            $Form['send_mail'] = 0;
                        }
                        if (!array_key_exists('recaptcha',$Form)) {
                            $Form['recaptcha'] = 0;
                        }
                        
                        $data['active']             = $Form['active'];
                        $data['notification_mail']  = $Form['send_mail'];
                        $data['recaptcha']          = $Form['recaptcha'];
                        $data['redirection']        = $Form['redirection'];
                        
                        $data['date_creation']      = time();

                        $dataNext['titre']              = $Form['titre'];
                        $dataNext['extras']             = base64_encode(serialize($dataForm));
                        $dataNext['date_modification']  = time();
                        
                        $this->doorGets->dbQU($isContent['id'],$data,'_modules','id');
                        $this->doorGets->dbQU($isContent['id'],$dataNext,'_modules_traduction','id_module'," AND langue = '$lgActuel' LIMIT 1 ");
                        
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'delete':
                
                $Form = $this->doorGets->Form->i;
                
                if (!empty($Form)) {
                    
                    $this->doorGets->checkMode();
                    
                    $lgGroupe = unserialize($isContent['groupe_traduction']);
                    foreach($lgGroupe as $v) {
                        @$this->doorGets->dbQD($v,'_modules_traduction');
                    }

                    $isContent['uri'] = $isContent['uri'];
                    $ruri = $this->doorGets->getRealUri($isContent['uri']);

                    $this->doorGets->dbQD($isContent['id'],'_modules');
                    $this->doorGets->dbQL("DELETE FROM _modules_traduction WHERE id_module = '".$isContent['id']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_comments WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _categories WHERE uri_module = '".$isContent['uri']."' ; ");
                    $this->doorGets->dbQL("DELETE FROM _categories_traduction WHERE id_cat Not In (SELECT id_cat FROM _categories) ; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_links WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_inbox WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_page WHERE uri = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_page_traduction WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_page_version WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_onepage WHERE uri = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_onepage_traduction WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_onepage_version WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_block WHERE uri = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_block_traduction WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_survey WHERE uri = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_survey_traduction WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_survey_response WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_carousel WHERE uri = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _dg_carousel_traduction WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _users_track WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DELETE FROM _moderation WHERE uri_module = '".$isContent['uri']."'; ");
                    $this->doorGets->dbQL("DROP TABLE IF EXISTS _m_".$ruri."  ");
                    $this->doorGets->dbQL("DROP TABLE IF EXISTS _m_".$ruri."  ");
                    $this->doorGets->dbQL("DROP TABLE IF EXISTS _m_".$ruri."_traduction  ");
                    $this->doorGets->dbQL("DROP TABLE IF EXISTS _m_".$ruri."_version  ");
                    
                    $_rubrique = $this->doorGets->dbQS($isContent['id'],'_rubrique','idModule');
                    if (!empty($_rubrique)) {
                        $this->doorGets->dbQD($_rubrique['id'],'_rubrique','id');
                        $this->doorGets->dbQL("UPDATE _rubrique SET ordre = ordre - 1 WHERE ordre > ".$_rubrique['ordre']." ");
                    }

                    $this->removeModuleFromGroupes($isContent['id']);
                    
                    //$this->doorGets->clearDBCache();
                    $moduleRedirection = 'modules';
                    if (in_array($isContent['type'],Constant::$widgets)) {
                        $moduleRedirection = 'widgets';
                    }
                    FlashInfo::set($this->doorGets->__("Le widget est maintenant supprimer"));
                    header('Location:./?controller='.$moduleRedirection.'&lg='.$lgActuel);
                    exit();
                    
                }
            
            break;
            
        }
        
        return $out;
        
    }
    
    public function getArraysForm() {
        
        $out = array();
        $Form = $this->doorGets->Form;
        
        if (!empty($Form->i)) {
            
            $label = 'input-label';
            $cLabel = strlen($label);
            $iLabel = 0;
            foreach($Form->i as $k=>$v) {
                
                $restLabel = substr($k,0,$cLabel);
                if ($restLabel === $label) {
                    $iLabel++;
                    if (empty($Form->i[$k])) {
                        $this->doorGets->Form->e[$k] = 'ok';
                    }
                }
            }
            
            if (!empty($iLabel)) {
                
                for($i=1;$i<$iLabel+1;$i++) {
                    
                    $out[$i]['type']        = 'text';
                    $out[$i]['label']       = $Form->i['input-label-'.$i];
                    $out[$i]['css']         = $Form->i['input-css-'.$i];
                    
                
                    switch ($Form->i['input-type-'.$i]) {
                        
                        case 'tag-title':
                            
                            $out[$i]['type']        = 'tag-title';
                            $out[$i]['filtre']      = $Form->i['input-filter-'.$i];
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            
                            $out[$i]['info']        = '';
                            $out[$i]['obligatoire'] = 'no';
                            
                            break;
                        
                        case 'tag-quotte':
                            
                            $out[$i]['type']        = 'tag-quotte';
                            $out[$i]['filtre']      = $Form->i['input-filter-'.$i];
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            
                            $out[$i]['info']        = '';
                            $out[$i]['obligatoire'] = 'no';
                            
                            break;
                        
                        case 'tag-separateur':
                            
                            $out[$i]['type']        = 'tag-separateur';
                            $out[$i]['filtre']      = $Form->i['input-filter-'.$i];
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            
                            $out[$i]['info']        = '';
                            $out[$i]['obligatoire'] = 'no';
                            
                            break;
                        
                        case 'text':
                            
                            $out[$i]['type']        = 'text';
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            $out[$i]['obligatoire'] = $Form->i['input-obligatoire-'.$i];
                            $out[$i]['info']        = $Form->i['input-info-'.$i];
                            $out[$i]['filtre']      = $Form->i['input-filter-'.$i];
                            $out[$i]['value']       = $Form->i['input-value-'.$i];
                            break;
                        
                        case 'textarea':
                            
                            $out[$i]['type']        = 'textarea';
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            $out[$i]['obligatoire'] = $Form->i['input-obligatoire-'.$i];
                            $out[$i]['info']        = $Form->i['input-info-'.$i];
                            $out[$i]['filtre']      = '';
                            $out[$i]['value']       = $Form->i['input-value-'.$i];
                            break;
                        
                        case 'select':
                            
                            $out[$i]['type']        = 'select';
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            $out[$i]['obligatoire'] = $Form->i['input-obligatoire-'.$i];
                            $out[$i]['info']        = $Form->i['input-info-'.$i];
                            $out[$i]['liste']       = $Form->i['input-liste-'.$i];
                            $out[$i]['value']       = $Form->i['input-value-'.$i];
                            break;
                        
                        case 'checkbox':
                            
                            $out[$i]['type']        = 'checkbox';
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            $out[$i]['obligatoire'] = $Form->i['input-obligatoire-'.$i];
                            $out[$i]['info']        = $Form->i['input-info-'.$i];
                            $out[$i]['liste']       = $Form->i['input-liste-'.$i];
                            $out[$i]['value']       = $Form->i['input-value-'.$i];
                            break;
                        
                        case 'radio':
                            
                            $out[$i]['type']        = 'radio';
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            $out[$i]['obligatoire'] = $Form->i['input-obligatoire-'.$i];
                            $out[$i]['info']        = $Form->i['input-info-'.$i];
                            $out[$i]['liste']       = $Form->i['input-liste-'.$i];
                            $out[$i]['value']       = $Form->i['input-value-'.$i];
                            break;
                        
                        case 'file':
                            
                            $out[$i]['type']        = 'file';
                            $out[$i]['active']      = $Form->i['input-active-'.$i];
                            $out[$i]['obligatoire'] = $Form->i['input-obligatoire-'.$i];
                            $out[$i]['info']        = $Form->i['input-info-'.$i];
                            $out[$i]['value']       = $Form->i['input-value-'.$i];
                            
                            $out[$i]['file-type']['zip'] = 0;
                            $out[$i]['file-type']['png'] = 0;
                            $out[$i]['file-type']['jpg'] = 0;
                            $out[$i]['file-type']['gif'] = 0;
                            $out[$i]['file-type']['pdf'] = 0;
                            $out[$i]['file-type']['swf'] = 0;
                            $out[$i]['file-type']['doc'] = 0;
                            
                            if (array_key_exists('input-zip-'.$i,$Form->i)) {$out[$i]['file-type']['zip'] = 1;}
                            if (array_key_exists('input-png-'.$i,$Form->i)) {$out[$i]['file-type']['png'] = 1;}
                            if (array_key_exists('input-jpg-'.$i,$Form->i)) {$out[$i]['file-type']['jpg'] = 1;}
                            if (array_key_exists('input-gif-'.$i,$Form->i)) {$out[$i]['file-type']['gif'] = 1;}
                            if (array_key_exists('input-pdf-'.$i,$Form->i)) {$out[$i]['file-type']['pdf'] = 1;}
                            if (array_key_exists('input-swf-'.$i,$Form->i)) {$out[$i]['file-type']['swf'] = 1;}
                            if (array_key_exists('input-doc-'.$i,$Form->i)) {$out[$i]['file-type']['doc'] = 1;}
                            
                            break;
                    }
                }
            }
            
        }
        
        return $out;
    }


    private function addModuleToGroupeList($idModule = '',$type="module") {

        $idGroupe = $this->doorGets->user['groupe'];

        if (empty($idGroupe) || empty($idModule)) { return ''; }
        
        $isGroupe = $this->doorGets->dbQS($idGroupe,'_users_groupes');
        if (!empty($isGroupe)) {

            $pref = "#";
            if ($type === 'widget') {
                $this->doorGets->dbQU($idGroupe,array('liste_widget'=>$pref.$isGroupe['liste_widget'].$idModule.','),'_users_groupes');
            }else{
                $this->doorGets->dbQU($idGroupe,
                    array(
                        'liste_module'          => $isGroupe['liste_module'].$pref.$idModule.',',
                        'liste_module_list'     => $isGroupe['liste_module_list'].$pref.$idModule.',',
                        'liste_module_add'      => $isGroupe['liste_module_add'].$pref.$idModule.',',
                        'liste_module_show'     => $isGroupe['liste_module_show'].$pref.$idModule.',',
                        'liste_module_edit'     => $isGroupe['liste_module_edit'].$pref.$idModule.',',
                        'liste_module_delete'   => $isGroupe['liste_module_delete'].$pref.$idModule.',',
                        'liste_module_modo'     => $isGroupe['liste_module_modo'].$pref.$idModule.',',
                        'liste_module_admin'    => $isGroupe['liste_module_admin'].$pref.$idModule.','
                    ),'_users_groupes');
            }
        }
    }

    private function removeModuleFromGroupes($idModule = '') {

        $groupes = $this->doorGets->loadGroupes();
        if (!empty($groupes) && is_numeric($idModule)) {

            foreach ($groupes as $id => $value) {

                $isGroupe = $this->doorGets->dbQS($id,'_users_groupes');
                if (!empty($isGroupe)) {
                    $pref = "#";
                    $this->doorGets->dbQU($id,
                        array(
                            'liste_widget'          => str_replace($pref.$idModule.',', '', $isGroupe['liste_widget']),
                            'liste_module'          => str_replace($pref.$idModule.',', '', $isGroupe['liste_module']),
                            'liste_module_list'     => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_list']),
                            'liste_module_add'      => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_add']),
                            'liste_module_show'     => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_show']),
                            'liste_module_edit'     => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_edit']),
                            'liste_module_delete'   => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_delete']),
                            'liste_module_modo'     => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_modo']),
                            'liste_module_admin'    => str_replace($pref.$idModule.',', '', $isGroupe['liste_module_admin'])
                        ) ,'_users_groupes'
                    );
                }
            }                    
        }
    }


}
