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


class ModuleGenformRequest extends doorGetsUserModuleRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        // Init langue
       
        $lgActuel       = $this->doorGets->getLangueTradution();
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        // Init url redirection 
        $redirectUrl = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;
        
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
                
            }
            
        }
        
        $champsNonObligatoire = array('description','image','meta_titre','meta_description','meta_keys','sendto','id_disqus','meta_facebook_titre','meta_facebook_description','meta_facebook_image',
            'meta_twitter_titre','meta_twitter_description','meta_twitter_image','meta_twitter_player',);
        
        switch($this->Action) {
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $cResultsInt = $this->doorGets->getCountTable($this->doorGets->Table);
                    
                    // gestion des champs vide
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        if (
                           !in_array($k,$champsNonObligatoire) &&  empty($v)
                       ) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                        
                        
                    }
                    
                    
                    
                    // validation si aucune erreur
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['active'] = 0;
                        }
                        //
                        
                        $data['pseudo']         = $User['pseudo'];
                        $data['id_user']        = $this->doorGets->user['id'];
                        $data['id_groupe']      = $this->doorGets->user['groupe'];
                        
                        $data['ordre']          = $cResultsInt + 1 ;
                        $data['active']         = $this->doorGets->Form->i['active'];
                        
                        $data['date_creation']  = time();
                        
                        $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                        
                        //
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext = array();
                            $dataNext = $this->doorGets->Form->i;
                            unset($dataNext['active']);
                            
                            $dataNext['date_modification']  = $data['date_creation'];
                            $dataNext['id_content']     = $idContent;
                            $dataNext['langue']         = $k;
                            $idTraduction[$k]           = $this->doorGets->dbQI($dataNext,$this->doorGets->Table.'_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        $this->doorGets->_redirect($redirectUrl);
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'edit':
               
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $listToCategories = '';
                    // gestion des champs vide
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        if (
                           !in_array($k,$champsNonObligatoire) &&  empty($v)
                       ) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                            
                        }
                        
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists('active',$this->doorGets->Form->i)) {
                            $this->doorGets->Form->i['active'] = 0;
                        }
                        
                        $dataContenu['active']          = $this->doorGets->Form->i['active'];
                        
                        $data = $this->doorGets->Form->i;
                        
                        unset($data['active']);
                        
                        // Update Data
                        $this->doorGets->dbQU(
                            $isContent['id_content'],
                            $dataContenu,
                            $this->doorGets->Table
                        );

                        $this->doorGets->dbQU(
                            $isContent['id'],
                            $data,
                            $this->doorGets->Table.'_traduction'
                        );
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));

                        $this->doorGets->_redirect();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id'],$this->doorGets->Table);
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Les données sont supprimées"));
                        $this->doorGets->_redirect($redirectUrl);
                    }
                    
                }
                
                break;
            
            case 'massdelete':
                
                if (
                    
                    !empty($this->doorGets->Form['massdelete_index']->i)
                    && isset($this->doorGets->Form['massdelete_index']->i['groupe_delete_index'])
                   
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form['massdelete_index']->e))
                    {
                        
                        $ListeForDeleted = $this->doorGets->_toArray($this->doorGets->Form['massdelete_index']->i['groupe_delete_index']);
                
                        foreach($ListeForDeleted as $id) {
                            
                            $this->doorGets->dbQD($id,$this->doorGets->Table);
                            
                        }
                        
                        FlashInfo::set($this->doorGets->__("Les données sont supprimées"));
                        $this->doorGets->_redirect($redirectUrl);
                    }
                    
                }
                
                break;
        }
        
    }
    
}
