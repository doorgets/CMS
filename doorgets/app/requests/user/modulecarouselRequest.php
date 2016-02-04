<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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


class ModuleCarouselRequest extends doorGetsUserModuleRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $this->doorGets->Table = '_dg_carousel';
        $User = $this->doorGets->user;
        
        // Init langue 
        $lgActuel       = $this->doorGets->getLangueTradution();
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);

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
        $champsNonObligatoire = array('description','items_count','auto_play','stop_on_hover','navigation','image_','url_','page_','title_');
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
                if ($valTitle === 'image') {
                    $countPages++;
                }
            }

            $article=array();
            $imagesToSave = '';
            for ($i=0;$i<$countPages+1;$i++) {
                $z = $i+1;
                if (array_key_exists('image_'.$z, $this->doorGets->Form->i)) {
                    $imagesToSave .= $this->doorGets->Form->i['image_'.$z].';';
                    $pos = $this->doorGets->Form->i['position_'.$z];
                    $article[$pos]['position'] = $this->doorGets->Form->i['position_'.$z];
                    $article[$pos]['page'] = $this->doorGets->Form->i['page_'.$z.'_tinymce'];
                    $article[$pos]['image'] = $this->doorGets->Form->i['image_'.$z];
                    $article[$pos]['url'] = $this->doorGets->Form->i['url_'.$z];
                    $article[$pos]['type'] = $this->doorGets->Form->i['type_'.$z];
                    $article[$pos]['title'] = $this->doorGets->Form->i['title_'.$z];
                    $article[$pos]['module'] = $this->doorGets->Uri;
                }
            } 
            ksort($article);
            if (empty($this->doorGets->Form->e)) {

                $data['items_count']   = $this->doorGets->Form->i['items_count'];
                $data['auto_play']   = $this->doorGets->Form->i['auto_play'];
                $data['stop_on_hover']   = $this->doorGets->Form->i['items_count'];
                $data['navigation']   = $this->doorGets->Form->i['navigation'];
                
                $this->doorGets->dbQU(
                    $isContent['id_carousel'],
                    $data,
                    $this->doorGets->Table
                );
                
                $dataTraduction = array(
                    'article_tinymce'   => base64_encode(serialize($article)),
                    'date_modification'     => time()
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
                    ->setTitle($this->doorGets->Uri)
                    ->setIdGroupe($User['groupe'])
                    ->setLangue($lgActuel)
                    ->setUriModule($this->doorGets->Uri)
                    ->setIdContent($isContent['id_carousel'])
                    ->setAction('edit')
                    ->setDate(time())
                    ->save();

                $this->doorGets->copyFileToRealPath($this->doorGets->Uri,$imagesToSave);

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