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


class ModuleOnepageRequest extends doorGetsUserModuleRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $this->doorGets->Table = '_dg_onepage';
        $User = $this->doorGets->user;
        
        // Init langue 
        $lgActuel       = $this->doorGets->getLangueTradution();
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);

        // Check if is content modo
        $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;

        // Check if is module modo
        (
            in_array('module', $User['liste_module_interne'])  
            && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

        // check if user can edit content
        $user_can_edit = (in_array($moduleInfos['id'], $User['liste_module_edit']))?true:false;

        // check if user can delete content
        $user_can_delete = (in_array($moduleInfos['id'], $User['liste_module_delete']))?true:false;

        // Init url redirection 
        $redirectUrl = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('uri',$params['GET'])) {
            
            $uri = $params['GET']['uri'];
            $isContent = $this->doorGets->dbQS($uri,$this->doorGets->Table,'uri');
            
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                    }
                }
            }
        }
        
        $messageSuccess = $this->doorGets->__("Vos informations ont bien été mises à jour");
        $champsNonObligatoire = array('description','backimage_','backcolor_','height_');
        $removeInt = array('0','1','2','3','4','5','6','7','8','9','_tinymce');
            
        if (!empty($this->doorGets->Form->i)) {
            
            $this->doorGets->checkMode();
            
            $countPages = 0;
            // gestion des champs vide
            foreach($this->doorGets->Form->i as $k=>$v) {
                $rKey = str_replace($removeInt,'',$k);
                if ( !in_array($rKey,$champsNonObligatoire) &&  empty($v) ) {
                    $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                }
                
                $valTitle = substr($k,0,5);
                if ($valTitle === 'title') {
                    $countPages++;
                }
            }

            $article=array();
            for ($i=0;$i<$countPages+1;$i++) {
                $z = $i+1;
                if (array_key_exists('title_'.$z, $this->doorGets->Form->i)) {
                    $pos = $this->doorGets->Form->i['position_'.$z];
                    $article[$pos]['position'] = $this->doorGets->Form->i['position_'.$z];
                    $article[$pos]['title'] = $this->doorGets->Form->i['title_'.$z];
                    $article[$pos]['page'] = $this->doorGets->Form->i['page_'.$z.'_tinymce'];
                    $article[$pos]['marqueur'] = $this->doorGets->Form->i['marqueur_'.$z];
                    $article[$pos]['backcolor'] = $this->doorGets->Form->i['backcolor_'.$z];
                    $article[$pos]['backimage'] = $this->doorGets->Form->i['backimage_'.$z];
                    $article[$pos]['opacity'] = $this->doorGets->Form->i['opacity_'.$z];
                    $article[$pos]['height'] = $this->doorGets->Form->i['height_'.$z];
                    $article[$pos]['showinmenu'] = $this->doorGets->Form->i['showinmenu_'.$z];
                }
            } 
            ksort($article);
            if (empty($this->doorGets->Form->e)) {
                
                $dataTraduction = array(
                    'menu_position'   => 'top',
                    'backimage_fixe'   => $this->doorGets->Form->i['backimage_fixe'],
                    'article_tinymce'   => base64_encode(serialize($article)),
                    'date_modification'     => time()
                );

                $dataVersion = $dataTraduction;
                $this->saveLastContentVersion($isContent['id_content'],$dataVersion);

                
                $this->doorGets->dbQU(
                    $isContent['id'],
                    $dataTraduction,
                    $this->doorGets->Table.'_traduction'
                );

                $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                $usersTracking->setIdSession(session_id())
                    ->setIpUser($_SERVER['REMOTE_ADDR'])
                    ->setUrlPage($_SERVER['REQUEST_URI'])
                    ->setUrlReferer($_SERVER['HTTP_REFERER'])
                    ->setIdUser($User['id'])
                    ->setTitle($this->doorGets->Uri)
                    ->setIdGroupe($User['groupe'])
                    ->setLangue($lgActuel)
                    ->setUriModule($this->doorGets->Uri)
                    ->setIdContent($isContent['id_content'])
                    ->setAction('edit')
                    ->setDate(time())
                    ->save();

                if (!$is_modo) {
                    
                    $moderation = new ModerationEntity(null,$this->doorGets);
                    $moderation->setIdContent($isContent['id_content'])
                        ->setIdUser($User['id'])
                        ->setPseudo($User['pseudo'])
                        ->setIdGroupe($User['groupe'])
                        ->setUriModule($this->doorGets->Uri)
                        ->setTypeModule('page')
                        ->setAction('edit')
                        ->setLangue($lgActuel)
                        ->setDateCreation(time())
                        ->save();

                    $this->doorGets->sendEmailNotificationToGroupe(
                        $moduleInfos['uri_notification_moderator'],
                        $moduleInfos['id']
                    );

                    $messageSuccess = $this->doorGets->__("Votre contenu est en cours de modération");
                }

                $this->doorGets->successHeaderResponse(
                    $messageSuccess,
                    $redirectUrl
                );
                
            }
            
            $this->doorGets->errorHeaderResponse(
                $this->doorGets->__("Veuillez remplir correctement le formulaire"),
                $this->doorGets->Form->e
            );

        }
    }
}
