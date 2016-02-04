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


class ModuleShopRequest extends doorGetsUserModuleRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }
    
    public function doAction() {
        
        try {
            
            $out = '';
            $cName = $this->doorGets->controllerNameNow();
            $User = $this->doorGets->user;

            // Init langue 
            $lgActuel       = $this->doorGets->getLangueTradution();
            $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);

            // Init url redirection 
            $redirectUrl = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;

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
                            
                            $isContent = array_merge($isContent,$isContentTraduction);
                            
                        }
                        
                    }
                    
                    // test if user can edit content
                    if (
                        $isContent['id_user'] !== $User['id']
                        && !in_array($isContent['id_groupe'], $User['liste_enfant_modo'])
                   ) {
                        FlashInfo::set($this->doorGets->__("Vous n'avez pas les droits pour afficher ce contenu"),"error");
                        $this->doorGets->_redirect($redirectUrl);
                    }
                }
                
            }

            $champsNonObligatoire = array('meta_titre','meta_description','meta_keys','sendto','id_disqus','image_gallery','meta_facebook_titre','meta_facebook_description','meta_facebook_image',
            'meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player','quantity_stock','code_ean','code_upc','quantity_action','quantity_action_value','id_taxe','tags','buying_price','price',
            'id_supplier','is_free','external_link','slice_unit','quantity_action','quantity_action_value');
            
            $messageSuccess = $this->doorGets->__("Vos informations ont bien été mises à jour");

            switch($this->Action) {
                
                case 'add':

                    if (!empty($this->doorGets->Form->i)) {
                        
                        $this->doorGets->checkMode();
                        
                        $cResultsInt = $this->doorGets->getCountTable($this->doorGets->Table);
                        
                        $listToCategories = '';
                        // gestion des champs vide
                        foreach($this->doorGets->Form->i as $k=>$v) {
                            
                            if (
                               !in_array($k,$champsNonObligatoire) &&  empty($v)
                           ) {
                                
                                $this->doorGets->Form->e[$cName.'_add_'.$k] = 'ok';
                                
                            }
                            
                            $iCat = explode('_',$k);
                            if (!empty($iCat) && $iCat[0] === 'categories' && is_numeric($iCat[1])) {
                                
                                $listToCategories .= '#'.$iCat[1].',';
                                unset($this->doorGets->Form->i[$k]);
                                
                            }
                            
                        }

                        // validation si aucune erreur
                        if (empty($this->doorGets->Form->e)) {
                            
                            if (!array_key_exists('active',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['active'] = 4;
                            }
                            if (!array_key_exists('author_badge',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['author_badge'] = ($is_modo) ? 0 : $moduleInfos['author_badge'] ;
                            }
                            if (!array_key_exists('comments',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['comments'] = 0;
                            }
                            if (!array_key_exists('partage',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['partage'] = 0;
                            }
                            if (!array_key_exists('facebook',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['facebook'] = 0;
                            }
                            if (!array_key_exists('disqus',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['disqus'] = 0;
                            }
                            if (!array_key_exists('in_rss',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['in_rss'] = 0;
                            }


                            //
                            
                            $data['pseudo']         = $User['pseudo'];
                            $data['id_user']        = $User['id'];
                            $data['id_groupe']      = $User['groupe'];
                            $data['categorie']      = $listToCategories;
                            $data['ordre']          = $cResultsInt + 1 ;
                            $data['product_type']   = $this->doorGets->Form->i['product_type'];
                            $data['active']         = $this->doorGets->Form->i['active'];
                            $data['comments']       = $this->doorGets->Form->i['comments'];
                            $data['partage']        = $this->doorGets->Form->i['partage'];
                            $data['facebook']       = $this->doorGets->Form->i['facebook'];
                            $data['disqus']         = $this->doorGets->Form->i['disqus'];
                            $data['in_rss']         = $this->doorGets->Form->i['in_rss'];
                            $data['date_creation']  = time();
                            
                            $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                            
                            //
                            
                            foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                                $dataNext = array(
                                    'titre' => $this->doorGets->Form->i['titre'],
                                );
                                

                                $dataNext['categorie']       = $listToCategories;
                                $dataNext['date_modification']  = $data['date_creation'];
                                $dataNext['id_content']     = $idContent;
                                $dataNext['langue']         = $k;
                                $dataNext['uri']            = $this->doorGets->Form->i['uri'].'-'.$idContent.'-'.$k;
                                
                                $idTraduction[$k]           = $this->doorGets->dbQI($dataNext,$this->doorGets->Table.'_traduction');

                            }
                            
                            $dataModification['groupe_traduction'] = serialize($idTraduction);
                            $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);

                            // Tracker
                            $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                            $usersTracking->setIdSession(session_id())
                                ->setIpUser($_SERVER['REMOTE_ADDR'])
                                ->setUrlPage($_SERVER['REQUEST_URI'])
                                ->setUrlReferer($_SERVER['HTTP_REFERER'])
                                ->setIdUser($User['id'])
                                ->setTitle($dataNext['titre'])
                                ->setIdGroupe($User['groupe'])
                                ->setLangue($lgActuel)
                                ->setUriModule($this->doorGets->Uri)
                                ->setIdContent($idContent)
                                ->setAction($this->Action)
                                ->setDate(time())
                                ->save();

                            $this->doorGets->successHeaderResponse(
                                $messageSuccess,
                                $redirectUrl.'&action=edit&id='.$idContent
                            );
                        }

                        $this->doorGets->errorHeaderResponse(
                            $this->doorGets->__("Veuillez remplir correctement le formulaire"),
                            $this->doorGets->Form->e
                        );

                    }
                    
                    break;
                
                case 'edit':
                    
                    if (!empty($this->doorGets->Form->i) && $user_can_edit) {
                        
                        $this->doorGets->checkMode();
                        
                        $listToCategories = '';
                        // gestion des champs vide
                        foreach($this->doorGets->Form->i as $k=>$v) {
                            
                            if (
                               !in_array($k,$champsNonObligatoire) && $k !='image' &&  empty($v)
                            ) {
                                
                                $this->doorGets->Form->e[$cName.'_edit_'.$k] = 'ok';
                                
                            }
                            
                            $iCat = explode('_',$k);
                            if (!empty($iCat) && $iCat[0] === 'categories' && is_numeric($iCat[1])) {
                                
                                $listToCategories .= '#'.$iCat[1].',';
                                unset($this->doorGets->Form->i[$k]);
                                
                            }
                            
                        }
                        
                        $image = $isContent['image'];
                        if (!empty($this->doorGets->Form->i['image'])) {
                            $image = $this->doorGets->Form->i['image'];

                            // Copy image to real path
                            $this->doorGets->copyFileToRealPath($this->doorGets->Uri,$this->doorGets->Form->i['image']);
                        }

                        
                        if (empty($this->doorGets->Form->e)) {

                            $image_gallery = $this->doorGets->Form->i['image_gallery'];

                            // Copy images gallery to real path
                            $this->doorGets->copyFileToRealPath($this->doorGets->Uri,$image_gallery);
                            
                        }

                        if (empty($this->doorGets->Form->e)) {
                            $isCode = $this->doorGets->dbQS($this->doorGets->Form->i['code'],$this->doorGets->Table,'code');
                            if (!empty($isCode) && $isCode['id'] !== $isContent['id_content']) {
                                $this->doorGets->Form->e[$cName.'_edit_code'] = 'ok';
                            } 
                        }

                        if (empty($this->doorGets->Form->e) && !empty($this->doorGets->Form->i['code_ean'])) {
                            $isCode = $this->doorGets->dbQS($this->doorGets->Form->i['code_ean'],$this->doorGets->Table,'code_ean');
                            if (!empty($isCode) && $isCode['id'] !== $isContent['id_content']) {
                                $this->doorGets->Form->e[$cName.'_edit_code_ean'] = 'ok';
                            } 
                        }

                        if (empty($this->doorGets->Form->e) && !empty($this->doorGets->Form->i['code_upc'])) {
                            $isCode = $this->doorGets->dbQS($this->doorGets->Form->i['code_upc'],$this->doorGets->Table,'code_upc');
                            if (!empty($isCode) && $isCode['id'] !== $isContent['id_content']) {
                                $this->doorGets->Form->e[$cName.'_edit_code_upc'] = 'ok';
                            } 
                        }
                        
                        if (empty($this->doorGets->Form->e)) {

                            $checkboxFields = array(
                                'author_badge',
                                'comments',
                                'partage',
                                'facebook',
                                'disqus',
                                'in_rss',
                                'quantity_limit',
                                'quantity_nostock',
                                'opt_sale',
                                'opt_show_price',
                                'opt_only_web',
                                'promotion_active',
                                'promotion_code_active',
                                'is_free',
                            );

                            if (!array_key_exists('active',$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i['active'] = $isContent['active'];
                            }

                            foreach ($checkboxFields as $key) {
                                if (!array_key_exists($key,$this->doorGets->Form->i) && array_key_exists($key,$isContent)) {
                                    $this->doorGets->Form->i[$key] = ($is_modo) ? 0 : $isContent[$key];
                                }
                            }
                            
                            $imageFacebook = $isContent['meta_facebook_image'];
                            if (!empty($this->doorGets->Form->i['meta_facebook_image'])) {
                                $imageFacebook = $this->doorGets->Form->i['meta_facebook_image'];

                                // Copy image to real path
                                $this->doorGets->copyFileToRealPath($this->doorGets->Uri,$this->doorGets->Form->i['meta_facebook_image']);
                            }

                            $imageTwitter = $isContent['meta_twitter_image'];
                            if (!empty($this->doorGets->Form->i['meta_twitter_image'])) {
                                $imageTwitter = $this->doorGets->Form->i['meta_twitter_image'];

                                // Copy image to real path
                                $this->doorGets->copyFileToRealPath($this->doorGets->Uri,$this->doorGets->Form->i['meta_twitter_image']);
                            }

                            $id_file = $isContent['id_file'];
                            if (!empty($this->doorGets->Form->i['file_archive']) && is_numeric($this->doorGets->Form->i['file_archive'])) { 
                                $id_file = $this->doorGets->Form->i['file_archive'];
                            }

                            $dataContenu['categorie']       = $listToCategories;
                            $dataContenu['author_badge']    = $this->doorGets->Form->i['author_badge'];
                            $dataContenu['active']          = $this->doorGets->Form->i['active'];
                            $dataContenu['id_taxe']          = $this->doorGets->Form->i['id_taxe'];

                            $dataContenu['code']            = $this->doorGets->Form->i['code'];
                            if (array_key_exists('code_ean',$this->doorGets->Form->i)) {
                                $dataContenu['code_ean']        = $this->doorGets->Form->i['code_ean'];
                            }
                            if (array_key_exists('code_upc',$this->doorGets->Form->i)) {
                                $dataContenu['code_upc']        = $this->doorGets->Form->i['code_upc'];
                            }

                            if (!$is_modo) {
                                $dataContenu['active']      = 3;
                            }

                            $dataContenu['comments']        = $this->doorGets->Form->i['comments'];
                            $dataContenu['partage']         = $this->doorGets->Form->i['partage'];
                            $dataContenu['facebook']        = $this->doorGets->Form->i['facebook'];
                            $dataContenu['disqus']          = $this->doorGets->Form->i['disqus'];
                            $dataContenu['in_rss']          = $this->doorGets->Form->i['in_rss'];
                            
                            $buyingPrice = 0;
                            if (array_key_exists('buying_price',$this->doorGets->Form->i)) {
                                $buyingPrice = (float) str_replace(',','.',$this->doorGets->Form->i['buying_price']);
                            }

                            $this->doorGets->Form->i['price'] = (float) str_replace(',','.',$this->doorGets->Form->i['price']);
                        
                            $dataTraduction = array(
                                'active'            => $dataContenu['active'],
                                'buying_price'      => $buyingPrice,
                                'price'             => $this->doorGets->Form->i['price'],
                                'titre'             => $this->doorGets->Form->i['titre'],
                                'uri'               => $this->doorGets->Form->i['uri'],
                                'id_file'               => $id_file,
                                'quantity_limit'            => $this->doorGets->Form->i['quantity_limit'],
                                'quantity_nostock'          => $this->doorGets->Form->i['quantity_nostock'],
                                'opt_sale'                  => $this->doorGets->Form->i['opt_sale'],
                                'opt_show_price'            => $this->doorGets->Form->i['opt_show_price'],
                                'opt_only_web'              => $this->doorGets->Form->i['opt_only_web'],
                                'promotion_active'          => $this->doorGets->Form->i['promotion_active'],
                                'promotion_code_active'     => $this->doorGets->Form->i['promotion_code_active'],
                                'short_description_tinymce'   => $this->doorGets->Form->i['short_description_tinymce'],
                                'article_tinymce'   => $this->doorGets->Form->i['article_tinymce'],
                                'image_gallery'     => $image_gallery,
                                'tags'              => $this->doorGets->Form->i['tags'],
                                'meta_titre'        => $this->doorGets->Form->i['meta_titre'],
                                'meta_description'  => $this->doorGets->Form->i['meta_description'],
                                'meta_keys'         => $this->doorGets->Form->i['meta_keys'],
                                'image'             => $image,
                                'meta_facebook_type'         => $this->doorGets->Form->i['meta_facebook_type'],
                                'meta_facebook_titre'         => $this->doorGets->Form->i['meta_facebook_titre'],
                                'meta_facebook_description'   => $this->doorGets->Form->i['meta_facebook_description'],
                                'meta_facebook_image'         => $imageFacebook,
                                'meta_twitter_type'         => $this->doorGets->Form->i['meta_twitter_type'],
                                'meta_twitter_titre'         => $this->doorGets->Form->i['meta_twitter_titre'],
                                'meta_twitter_description'   => $this->doorGets->Form->i['meta_twitter_description'],
                                'meta_twitter_image'         => $imageTwitter,
                                'meta_twitter_player'        => $this->doorGets->Form->i['meta_twitter_player'],
                                'date_modification'     => time()
                            );
                            if (array_key_exists('quantity_action',$this->doorGets->Form->i) && array_key_exists('quantity_action_value',$this->doorGets->Form->i) ) {
                                $newStockValue = (int) $this->doorGets->Form->i['quantity_action_value'];
                                if ($this->doorGets->Form->i['quantity_action'] === 'up') {
                                    $dataTraduction['quantity_stock']       = $isContent['quantity_stock'] + $newStockValue;
                                } elseif ($this->doorGets->Form->i['quantity_action'] === 'down') {
                                    $dataTraduction['quantity_stock']       = $isContent['quantity_stock'] - $newStockValue;
                                } else {
                                    $dataTraduction['quantity_stock']       = $isContent['quantity_stock'];
                                }                                
                            }

                            $dataTraduction['categorie']       = $listToCategories;

                            $dataVersion = $dataTraduction;

                            unset($dataTraduction['active']);

                            $this->saveLastContentVersion($isContent['id_content'],$dataVersion);
                            
                            // Tracker
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
                                ->setAction($this->Action)
                                ->setDate(time())
                                ->save();

                            if (!$is_modo) {
                                
                                $moderation = new ModerationEntity(null,$this->doorGets);
                                $moderation->setIdContent($isContent['id_content'])
                                    ->setIdUser($User['id'])
                                    ->setPseudo($User['pseudo'])
                                    ->setIdGroupe($User['groupe'])
                                    ->setUriModule($this->doorGets->Uri)
                                    ->setTypeModule('shop')
                                    ->setAction($this->Action)
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

                            $this->doorGets->successHeaderResponse(
                                $messageSuccess
                            );

                        }
                        
                        $this->doorGets->errorHeaderResponse(
                            $this->doorGets->__("Veuillez remplir correctement le formulaire"),
                            $this->doorGets->Form->e
                        );

                    }
                    
                    break;
                
                case 'delete':
                    
                    if (!empty($this->doorGets->Form->i) && $user_can_delete) {
                        
                        $this->doorGets->checkMode();
                        
                        if (empty($this->doorGets->Form->e)) {
                            
                            $lgGroupe = unserialize($isContent['groupe_traduction']);
                            foreach($lgGroupe as $v) {
                                @$this->doorGets->dbQD($v,$this->doorGets->Table.'_traduction');
                            }
                            
                            @unlink(BASE.'data/'.$this->doorGets->getRealUri($this->doorGets->Uri).'/'.$isContent['image']);
                            
                            $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table);
                            $this->doorGets->dbQL("DELETE FROM _dg_comments WHERE uri_module = '".$this->doorGets->Uri."' AND uri_content = '".$isContent['id_content']."' ");
                            $this->doorGets->dbQL("UPDATE ".$this->doorGets->Table." SET ordre = ordre - 1 WHERE ordre > ".$isContent['ordre']." ");
                            
                            // Tracker
                            $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                            $usersTracking->setIdSession(session_id())
                                ->setIpUser($_SERVER['REMOTE_ADDR'])
                                ->setUrlPage($_SERVER['REQUEST_URI'])
                                ->setUrlReferer($_SERVER['HTTP_REFERER'])
                                ->setIdUser($User['id'])
                                ->setTitle($isContent['titre'])
                                ->setIdGroupe($User['groupe'])
                                ->setLangue($lgActuel)
                                ->setUriModule($this->doorGets->Uri)
                                ->setIdContent($isContent['id_content'])
                                ->setAction($this->Action)
                                ->setDate(time())
                                ->save();


                            $this->doorGets->successHeaderResponse(
                                $this->doorGets->__("Les données sont supprimées"),
                                $redirectUrl
                            );
                        }
                        
                    }
                    
                    break;
                
                
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        } 
    }
}
