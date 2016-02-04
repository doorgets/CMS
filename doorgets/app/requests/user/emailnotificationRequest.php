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


class EmailnotificationRequest extends doorGetsUserRequest{
    
    private $sizeMax = 8192000;
    
    private $typeFile = array();
    private $typeExtension = array();
    private $typeImage = array();
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
                
        $out = '';
        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $allLanguages       = $this->doorGets->getAllLanguages();
        $isVersionActive    = false;
        $version_id         = 0;
        
        // Check if is content modo
        (in_array('emailnotification', $User['liste_module_interne'])) ? $is_modo = true : $is_modo = false;

        $is_modules_modo = true;

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }
                    
                }
                
            }
        }
        
        switch($this->Action) {
            
            case 'index':
                

                break;
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) && $is_modules_modo) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->i['subject'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir un titre"),"error");
                        $this->doorGets->Form->e['emailnotification_add_subject'] = 'ok';
                        
                    }

                    if (empty($this->doorGets->Form->i['message_tinymce'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir un message"),"error");
                        $this->doorGets->Form->e['emailnotification_add_message_tinymce'] = 'ok';
                        
                    }
                    
                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_dg_email_notification');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_uri'] = 'ok';
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        $data['uri']                = $this->doorGets->Form->i['uri'];
                        $data['id_user']            = $User['id'];
                        $data['id_groupe']          = $User['groupe'];
                        $data['date_creation']      = time();
                        
                        $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataTraduction['title']                = $this->doorGets->Form->i['title'];
                            $dataTraduction['subject']              = $this->doorGets->Form->i['subject'];
                            $dataTraduction['message_tinymce']      = $this->doorGets->Form->i['message_tinymce'];
                            $dataTraduction['langue']               = $k;
                            $dataTraduction['id_content']           = $idContent;
                            $dataTraduction['date_modification']    = time();
                            
                            $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,$this->doorGets->Table.'_traduction');

                        }

                        $dataModification['groupe_traduction'] = serialize($idsTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=emailnotification&action=edit&id='.$idContent.'&lg='.$lgActuel); exit();
                        
                    }
                    
                }
                
                break;
            
            case 'edit':
                
                $error = false;
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    if (empty($this->doorGets->Form->i['subject'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir un titre"),"error");
                        $this->doorGets->Form->e['emailnotification_edit_subject'] = 'ok';
                        
                    }

                    if (empty($this->doorGets->Form->i['message_tinymce'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir un message"),"error");
                        $this->doorGets->Form->e['emailnotification_edit_message_tinymce'] = 'ok';
                        
                    }

                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_dg_email_notification',$isContent);
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_uri'] = 'ok';
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        $data['uri'] = $uri;
                        $this->doorGets->dbQU($isContent['id_content'],$data,$this->doorGets->Table);

                        $dataTraduction['title']                = $this->doorGets->Form->i['title'];
                        $dataTraduction['subject']              = $this->doorGets->Form->i['subject'];
                        $dataTraduction['message_tinymce']      = $this->doorGets->Form->i['message_tinymce'];
                        $dataTraduction['date_modification']    = time();

                        $dataVersion = $dataTraduction;
                        $this->saveLastContentVersion($isContent['id_content'],$dataVersion);

                        $this->doorGets->dbQU($isContent['id'],$dataTraduction,$this->doorGets->Table.'_traduction');

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=emailnotification&action=edit&id='.$isContent['id_content'].'&lg='.$lgActuel); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'delete':
                
                
                if (!empty($this->doorGets->Form->i) && $is_modules_modo) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table);

                        FlashInfo::set($this->doorGets->__("La notifiction a été corréctement supprimer"));
                        header('Location:./?controller=emailnotification');
                        exit();
                        
                    }
                }
                
                break;
        }
    }

    public function saveLastContentVersion($id_content,$next_content = array(),$name_field="id_content") {

        $lgActuel       = $this->doorGets->getLangueTradution();
        $User           = $this->doorGets->user;

        // Save last Version
        $isLastVersionTemp = $isLastVersion = $this->doorGets->dbQS($id_content,$this->doorGets->Table.'_traduction',"id_content"," AND langue='$lgActuel' LIMIT 1 ");
        if (!empty($isLastVersion)) {

            unset($isLastVersion['id']);
            unset($isLastVersionTemp['id']);
            if (array_key_exists('date_modification', $isLastVersionTemp)) {
                unset($isLastVersionTemp['date_modification']);
            }
            if (array_key_exists('id_content', $next_content)) {
                $isLastVersionTemp['id_content'] =  $next_content['id_content'];
                unset($isLastVersionTemp['id_content']);
            }
            
            $next_content['pseudo']         = $isLastVersion['pseudo']          = $isLastVersionTemp['pseudo']          = $User['pseudo'];
            $next_content['id_user']        = $isLastVersion['id_user']         = $isLastVersionTemp['id_user']         = $User['id'];
            $next_content['id_groupe']      = $isLastVersion['id_groupe']       = $isLastVersionTemp['id_groupe']       = $User['groupe'];
            $next_content['date_creation']  = $isLastVersion['date_creation']   = $isLastVersionTemp['date_creation']   = time();

            if (count($next_content) > 4) {

                foreach ($isLastVersion as $key => $value) {
                    if (!array_key_exists($key, $next_content)) {
                        unset($isLastVersion[$key]);
                    }
                }

                ksort($isLastVersion);
                ksort($next_content);
                
                $checkIfDataEqualLastVersion = strcmp(serialize($isLastVersion), serialize($next_content));

                if ($checkIfDataEqualLastVersion !== 0) {

                    $this->doorGets->dbQI($isLastVersionTemp,$this->doorGets->Table.'_version');

                }

            }

        }

    }
}

