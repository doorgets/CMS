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


class ModulePageRequest extends doorGetsUserModuleRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $this->doorGets->Table = '_dg_page';
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
        $champsNonObligatoire = array('description','image','meta_titre','meta_description','meta_keys','sendto','id_disqus','meta_facebook_titre','meta_facebook_description','meta_facebook_image',
            'meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player',);
        
        if (!empty($this->doorGets->Form->i)) {
            
            $this->doorGets->checkMode();
            
            // gestion des champs vide
            foreach($this->doorGets->Form->i as $k=>$v) {
                
                if (
                   !in_array($k,$champsNonObligatoire) &&  empty($v)
                ) {
                    
                    $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                    
                }
                
            }
            
            
            if (empty($this->doorGets->Form->e)) {
                
                if (!array_key_exists('comments',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['comments'] = ($is_modo) ? 0 : $isContent['comments'];
                }
                if (!array_key_exists('partage',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['partage'] = ($is_modo) ? 0 : $isContent['partage'];
                }
                if (!array_key_exists('mailsender',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['mailsender'] = ($is_modo) ? 0 : $isContent['mailsender'];
                }
                if (!array_key_exists('facebook',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['facebook'] = ($is_modo) ? 0 : $isContent['facebook'];
                }
                if (!array_key_exists('disqus',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['disqus'] = ($is_modo) ? 0 : $isContent['disqus'];
                }
                if (!array_key_exists('in_rss',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['in_rss'] = ($is_modo) ? 0 : $isContent['in_rss'];
                }
                if (!array_key_exists('active',$this->doorGets->Form->i)) {
                    $this->doorGets->Form->i['active'] = $isContent['active'];
                }

                $dataContenu['active']          = (!$is_modo) ? 3 : $this->doorGets->Form->i['active'];
                $dataContenu['comments']        = $this->doorGets->Form->i['comments'];
                $dataContenu['partage']         = $this->doorGets->Form->i['partage'];
                $dataContenu['mailsender']      = $this->doorGets->Form->i['mailsender'];
                $dataContenu['facebook']        = $this->doorGets->Form->i['facebook'];
                $dataContenu['disqus']          = $this->doorGets->Form->i['disqus'];
                $dataContenu['in_rss']          = $this->doorGets->Form->i['in_rss'];
                
                $dataTraduction = array(
                    'titre'             => $this->doorGets->Form->i['titre'],
                    'article_tinymce'   => $this->doorGets->Form->i['article_tinymce'],
                    'meta_titre'        => $this->doorGets->Form->i['meta_titre'],
                    'meta_description'  => $this->doorGets->Form->i['meta_description'],
                    'meta_keys'         => $this->doorGets->Form->i['meta_keys'],
                    'meta_facebook_type'         => $this->doorGets->Form->i['meta_facebook_type'],
                    'meta_facebook_titre'         => $this->doorGets->Form->i['meta_facebook_titre'],
                    'meta_facebook_description'   => $this->doorGets->Form->i['meta_facebook_description'],
                    'meta_facebook_image'         => $this->doorGets->Form->i['meta_facebook_image'],
                    'meta_twitter_type'            => $this->doorGets->Form->i['meta_twitter_type'],
                    'meta_twitter_titre'         => $this->doorGets->Form->i['meta_twitter_titre'],
                    'meta_twitter_description'   => $this->doorGets->Form->i['meta_twitter_description'],
                    'meta_twitter_image'         => $this->doorGets->Form->i['meta_twitter_image'],
                    'meta_twitter_player'        => $this->doorGets->Form->i['meta_twitter_player'],
                    'date_modification'     => time()
                );

                $dataVersion = $dataTraduction;
                $dataVersion['active'] = $dataContenu['active'];
                $this->saveLastContentVersion($isContent['id_content'],$dataVersion);

                // Update Data
                $this->doorGets->dbQU(
                    $isContent['id_content'],
                    $dataContenu,
                    $this->doorGets->Table
                );
                
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
                    ->setTitle($dataTraduction['titre'])
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
