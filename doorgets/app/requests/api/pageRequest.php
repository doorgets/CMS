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


class PageRequest extends doorGetsApiRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }

    public function doAction() {
        
        $out    = '';
        $id     = 0;        
        

        $cName = $this->doorGets->controllerNameNow();
        $User = $this->doorGets->user;
        $uri = $this->doorGets->Uri;

        // Init langue 
        $lgActuel       = $this->doorGets->getLangueTradution();
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);

        // Init url redirection 
        $redirectUrl = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;

        if (!empty($User)) {

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
            
            // Init count total contents
            $countContents = 0;
            $arrForCountSearchQuery[] = array('key'=>"id_user",'type'=>'=','value'=>$User['id']);
            
            $countContents = $this->doorGets->getCountTable($this->doorGets->Table,$arrForCountSearchQuery);

            // Check limit to add content
            $isLimited = 0;
            if (array_key_exists($moduleInfos['id'], $User['liste_module_limit']) &&  $User['liste_module_limit'] !== '0') {
                $isLimited = (int)$User['liste_module_limit'][$moduleInfos['id']];
            }
            
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
                            $this->isContent = $isContent = array_merge($isContent,$isContentTraduction);
                        }
                        
                    }

                    // test if user can edit content
                    if (
                        $isContent['id_user'] !== $User['id']
                        && !in_array($isContent['id_groupe'], $User['liste_enfant_modo'])
                    ) {
                        $this->doorGets->_errorJson($this->doorGets->__("Vous n'avez pas les droits pour afficher ce contenu"));
                    }
                }
                
            }
        }
        
        $messageSuccess = $this->doorGets->__("Vos informations ont bien été mises à jour");
        $messageError = $this->doorGets->__("Veuillez remplir correctement le formulaire");
                    
        switch($this->doorGets->requestMethod) {
            
            case 'POST':

                if (empty($this->isContent)) {
                    // to do
                    $formData = $this->getFormDataFromParams();
                    $listToCategories = '';
                    if (empty($formData['error'])) {

                        $formData['success']['active'] = 2;

                        $keyToCheck = array(
                            'meta_titre','meta_description','meta_keys',
                            'meta_facebook_type','meta_facebook_titre','meta_facebook_description','meta_facebook_image',
                            'meta_twitter_type','meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player'
                        );

                        foreach ($keyToCheck as $key) {
                            $formData['success'][$key] = (array_key_exists($key, $formData['success'])) ? $formData['success'][$key] : '';
                        }
                        
                        $cResultsInt = $this->doorGets->getCountTable($this->doorGets->Table);
                        
                        $data['pseudo']         = $User['pseudo'];
                        $data['id_user']        = $User['id'];
                        $data['id_groupe']      = $User['groupe'];
                        $data['ordre']          = $cResultsInt + 1 ;
                        $data['active']         = ($is_modo) ? $formData['success']['active'] : 3;
                        $data['categorie']      = $listToCategories;
                        $data['date_creation']  = time();
                        
                        $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                        //var_dump($formData);

                        $formData['success']['image'] = $this->doorGets->_moveUploadImage($_FILES,'image',$uri);

                        if ($formData['success']['image'] === false) {
                            $this->doorGets->_errorJson($messageError);
                        }
                        
                        $isExistUri = $this->doorGets->checkIfUriExist($formData['success']['uri'],'_m_'.$uri.'_traduction',$lgActuel);
                        if ($isExistUri) {
                            $this->doorGets->_errorJson("Uri field is not valid");
                        }

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                            $dataTraduction = array(
                                'titre'             => $formData['success']['title'],
                                'uri'               => $formData['success']['uri'],
                                'article_tinymce'   => $formData['success']['article_tinymce'],
                                'meta_titre'        => $formData['success']['meta_titre'],
                                'meta_description'  => $formData['success']['meta_description'],
                                'meta_keys'         => $formData['success']['meta_keys'],
                                'image'             => $formData['success']['image'],
                            );
                            
                            foreach ($keyToCheck as $key) {
                                $dataTraduction[$key] = $formData['success'][$key];
                            }

                            $dataTraduction['categorie']      = $listToCategories;
                            $dataTraduction['date_modification']  = $data['date_creation'];
                            $dataTraduction['id_content']     = $idContent;
                            $dataTraduction['langue']         = $k;
                            $dataTraduction['uri']            = $formData['success']['uri'].'-'.$k;
                            
                            $idTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,$this->doorGets->Table.'_traduction');

                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);
                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer('API')
                            ->setIdUser($User['id'])
                            ->setTitle($dataTraduction['titre'])
                            ->setIdGroupe($User['groupe'])
                            ->setLangue($lgActuel)
                            ->setUriModule($this->doorGets->Uri)
                            ->setIdContent($idContent)
                            ->setAction('add')
                            ->setDate(time())
                            ->save();

                        if (!$is_modo) {
                            
                            $moderation = new ModerationEntity(null,$this->doorGets);
                            $moderation->setIdContent($idContent)
                                ->setIdUser($User['id'])
                                ->setPseudo($User['pseudo'])
                                ->setIdGroupe($User['groupe'])
                                ->setUriModule($this->doorGets->Uri)
                                ->setTypeModule('blog')
                                ->setAction('add')
                                ->setLangue($lgActuel)
                                ->setDateCreation(time())
                                ->save();

                            $this->doorGets->sendEmailNotificationToGroupe(
                                $moduleInfos['uri_notification_moderator'],
                                $moduleInfos['id']
                            );

                            $messageSuccess = $this->doorGets->__("Votre contenu est en cours de modération");
                        }

                        $this->doorGets->_successJson($messageSuccess);

                    } else {
                        $this->doorGets->_errorJson($messageError,$formData['error']);
                    }
                }

                break;

            case 'PUT':
            case 'PATCH':
                
                if (!empty($this->isContent)) {

                    // to do
                    $formData = $this->getFormDataFromParams('PUT');
                    $listToCategories = '';

                    if (empty($formData['error'])) {

                        $formData['success']['active']  = (array_key_exists('active', $formData['success'])) ? $formData['success']['active'] : 2;

                        $keyToCheck = array(
                            'title', 'article_tinymce','categorie', 'uri', 'image',
                            'meta_titre','meta_description','meta_keys',
                            'meta_facebook_type','meta_facebook_titre','meta_facebook_description','meta_facebook_image',
                            'meta_twitter_type','meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player'
                        );

                        foreach ($keyToCheck as $key) {
                            if ($key === 'title') {
                                $formData['success']['titre'] = (array_key_exists($key, $formData['success'])) ? $formData['success'][$key] : $isContent['titre'];
                                unset($formData['success'][$key]);

                            } else {
                                $formData['success'][$key] = (array_key_exists($key, $formData['success'])) ? $formData['success'][$key] : $isContent[$key];
                            }
                        }

                        $cResultsInt = $this->doorGets->getCountTable($this->doorGets->Table);
                        
                        $dataContenu['active'] = ($is_modo) ? $formData['success']['active'] : 3;
                        
                        //var_dump($formData);

                        //$formData['success']['image'] = $this->doorGets->_moveUploadImage($_FILES,'image',$uri);

                        if ($formData['success']['image'] === false) {
                            $this->doorGets->_errorJson("File error: image");
                        }
                        
                        $dataContenu['active']          = $formData['success']['active'];
                        if (!$is_modo) {
                            $dataContenu['active']      = 3;
                        }
                        
                        $image = $isContent['image'];
                        if (!empty($formData['success']['image'])) {
                            $image = $formData['success']['image'];
                        }
                        
                        $dataTraduction = array(
                            'image'             => $image,
                            'categorie'         => $listToCategories,
                            'date_modification' => time()
                        );

                        foreach ($keyToCheck as $key) {
                            $key =  ($key === 'title') ? 'titre' : $key;
                            $dataTraduction[$key] = $formData['success'][$key];
                        }
                        
                        $dataVersion = $dataTraduction;

                        unset($dataTraduction['active']);

                        $this->saveLastContentVersion($isContent['id_content'],$dataVersion);
                        
                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer('API')
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
                                ->setTypeModule('blog')
                                ->setAction('edit')
                                ->setLangue($lgActuel)
                                ->setDateCreation(time())
                                ->save();

                            $this->doorGets->sendEmailNotificationToGroupe(
                                $moduleInfos['uri_notification_moderator'],
                                $moduleInfos['id']
                            );

                            $messageSuccess = $this->doorGets->__("Votre contenu est en cours de modération");
                            
                        } else {

                            $uri_module = $this->doorGets->Uri;
                            $id_content = $isContent['id_content'];

                            $this->doorGets->dbQL("
                                DELETE FROM _moderation 
                                WHERE id_content = '$id_content' 
                                AND uri_module = '$uri_module'
                                LIMIT 1000
                            ");

                            $uriNotification = ($dataContenu['active'] === '2') ? 
                                $moduleInfos['uri_notification_user_success'] : 
                                $moduleInfos['uri_notification_user_error']
                            ;
                            
                            $this->doorGets->sendEmailNotificationToUser(
                                $uriNotification,
                                $isContent['id_user']

                            );
                        }

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
                        //var_dump($dataTraduction);
                        $this->doorGets->_successJson($formData['success']);

                    } else {

                        $this->doorGets->_errorJson("Fields errors",$formData['error']);
                    }
                }

                break;

            case 'DELETE':
                
                if (!$is_modules_modo) {

                    $this->doorGets->_errorJson("Not authorized to delete");

                }

                if (!empty($this->isContent)) {

                    $this->doorGets->dbQD($isContent['id'],$this->doorGets->Table);
                    $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table.'_traduction','id_content','=','');
                    $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table.'_version','id_content','=','');
                    
                    $this->doorGets->_successJson("$id deleted");
                }

                break;
        }
        
        return $out;
        
    }

    public function getPostProvider() {
        return array(
            'uri'             => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
            'categorie'             => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'active'                => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'author_badge'          => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'comments'              => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'partage'               => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'mailsender'            => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'in_rss'                => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'langue'                => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'image'                 => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'title'                 => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
            'description'           => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
            'article_tinymce'       => array(
                'required'  => true,
                'type'      => 'text'          
            ),
            'image_gallery'         => array(
                'required'  => false,
                'type'      => 'text'          
            ),
            'meta_titre'            => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_description'      => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_keys'             => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_type'    => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_titre'   => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_description' => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_image'   => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_type'     => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_titre'    => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_description'  => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_image'    => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_player'   => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
        );
    }

    public function getPutProvider() {
        return array(
            'uri'             => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'categorie'             => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'active'                => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'author_badge'          => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'comments'              => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'partage'               => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'mailsender'            => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'in_rss'                => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'langue'                => array(
                'required'  => false,
                'type'      => 'int'          
            ),
            'image'                 => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'title'                 => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
            'description'           => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'article_tinymce'       => array(
                'required'  => false,
                'type'      => 'text'          
            ),
            'image_gallery'         => array(
                'required'  => false,
                'type'      => 'text'          
            ),
            'meta_titre'            => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_description'      => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_keys'             => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_type'    => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_titre'   => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_description' => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_facebook_image'   => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_type'     => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_titre'    => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_description'  => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_image'    => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
            'meta_twitter_player'   => array(
                'required'  => false,
                'type'      => 'varchar'          
            ),
        );
    }
}
