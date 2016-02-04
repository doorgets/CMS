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


class AttributesRequest extends doorGetsUserRequest
{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        $lgActuel   = $this->doorGets->getLangueTradution(); 
        $groupes    = $this->doorGets->loadGroupes();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_groupes_attributes');
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgAttribute = $lgGroupe[$lgActuel];
                    $isContentTraduction = $this->doorGets->dbQS($idLgAttribute,'_users_groupes_attributes_traduction');

                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }
                }
            }
        }
        
        switch($this->Action) {
            
            case 'index':
                
                // to do
                
                break;
            
            case 'add':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                    
                    'filter',
                    'filter_select',
                    'description'

                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $paramsAttibute = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                    }

                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_users_groupes_attributes');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_uri'] = 'ok';
                    }


                    $paramsAttibute['filter']           = 'simple';
                    $paramsAttibute['filter_file_zip'] = 0;
                    $paramsAttibute['filter_file_png'] = 0;
                    $paramsAttibute['filter_file_jpg'] = 0;
                    $paramsAttibute['filter_file_gif'] = 0;
                    $paramsAttibute['filter_file_swf'] = 0;
                    $paramsAttibute['filter_file_pdf'] = 0;
                    $paramsAttibute['filter_file_doc'] = 0;

                    $paramsAttibute['filter_select'] = '';

                    $filters = $this->doorGets->getArrayForms('input_filter');

                    if (
                        array_key_exists('filter', $this->doorGets->Form->i) 
                        && $this->doorGets->Form->i['type'] === 'text'
                        && array_key_exists($this->doorGets->Form->i['filter'], $filters)
                    ) {
                        $paramsAttibute['filter'] = $this->doorGets->Form->i['filter'];
                    }

                    
                    if (
                        $this->doorGets->Form->i['type'] === 'file'
                    ) {
                        if (array_key_exists('filter_file_zip', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_zip'] = 1;
                        }
                        if (array_key_exists('filter_file_png', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_png'] = 1;
                        }
                        if (array_key_exists('filter_file_jpg', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_jpg'] = 1;
                        }
                        if (array_key_exists('filter_file_gif', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_gif'] = 1;
                        }
                        if (array_key_exists('filter_file_swf', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_swf'] = 1;
                        }
                        if (array_key_exists('filter_file_pdf', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_pdf'] = 1;
                        }
                        if (array_key_exists('filter_file_doc', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_doc'] = 1;
                        }
                        
                    }

                    if (
                        $this->doorGets->Form->i['type'] !== 'file'
                        && $this->doorGets->Form->i['type'] !== 'text' 
                    ) {
                        $paramsAttibute['filter_select'] =  $this->doorGets->_toArray($this->doorGets->Form->i['filter_select']);
                    }

                    $isActived = '2';
                    if (in_array($this->doorGets->Form->i['active'],array('1','2'))) {
                        $isActived = $this->doorGets->Form->i['active'];
                    }

                    $isRequired = '2';
                    if (in_array($this->doorGets->Form->i['required'],array('1','2'))) {
                        $isRequired = $this->doorGets->Form->i['required'];
                    }

                    if (empty($this->doorGets->Form->e)) {

                        
                        $dataAttributes = array(
                            'active'        => $isActived,
                            'required'      => $isRequired,
                            'uri'           => $this->doorGets->Form->i['uri'],
                            'type'          => $this->doorGets->Form->i['type'],
                            'params'        => base64_encode(serialize($paramsAttibute)),
                            'date_creation' => time()
                        );
                        
                        
                        $idContent = $this->doorGets->dbQI($dataAttributes,'_users_groupes_attributes');

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                            $dataTraduction['title']          = $this->doorGets->Form->i['title'];
                            $dataTraduction['description']    = $this->doorGets->Form->i['description'];
                            $dataTraduction['langue']         = $k;
                            $dataTraduction['id_attribute']   = $idContent;
                            
                            $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,'_users_groupes_attributes_traduction');

                        }

                        $dataModification['groupe_traduction'] = serialize($idsTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,'_users_groupes_attributes');
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=attributes&action=edit&id='.$idContent); exit();

                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'edit':
                
                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                    
                    'filter',
                    'filter_select',
                    'description'
                );


                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $paramsAttibute = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                            
                        }
                    }
                    
                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_users_groupes_attributes',$isContent);
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_uri'] = 'ok';
                    }

                    $paramsAttibute['filter'] = 'text';

                    $paramsAttibute['filter_file_zip'] = 0;
                    $paramsAttibute['filter_file_png'] = 0;
                    $paramsAttibute['filter_file_jpg'] = 0;
                    $paramsAttibute['filter_file_gif'] = 0;
                    $paramsAttibute['filter_file_swf'] = 0;
                    $paramsAttibute['filter_file_pdf'] = 0;
                    $paramsAttibute['filter_file_doc'] = 0;
                    
                    $paramsAttibute['filter_select'] = '';
                    
                    $filters = $this->doorGets->getArrayForms('input_filter');

                    if (
                        array_key_exists('filter', $this->doorGets->Form->i) 
                        && $this->doorGets->Form->i['type'] === 'text'
                        && array_key_exists($this->doorGets->Form->i['filter'], $filters)
                    ) {
                        $paramsAttibute['filter'] = $this->doorGets->Form->i['filter'];
                    }
                    
                    if (
                        $this->doorGets->Form->i['type'] === 'file'
                    ) {
                        if (array_key_exists('filter_file_zip', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_zip'] = 1;
                        }
                        if (array_key_exists('filter_file_png', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_png'] = 1;
                        }
                        if (array_key_exists('filter_file_jpg', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_jpg'] = 1;
                        }
                        if (array_key_exists('filter_file_gif', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_gif'] = 1;
                        }
                        if (array_key_exists('filter_file_swf', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_swf'] = 1;
                        }
                        if (array_key_exists('filter_file_pdf', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_pdf'] = 1;
                        }
                        if (array_key_exists('filter_file_doc', $this->doorGets->Form->i)) {
                            $paramsAttibute['filter_file_doc'] = 1;
                        }
                        
                    }

                    if (
                        $this->doorGets->Form->i['type'] !== 'file'
                        && $this->doorGets->Form->i['type'] !== 'text' 
                    ) {
                        $paramsAttibute['filter_select'] =  $this->doorGets->_toArray($this->doorGets->Form->i['filter_select']);
                    }

                    $isActived = '2';
                    if (in_array($this->doorGets->Form->i['active'],array('1','2'))) {
                        $isActived = $this->doorGets->Form->i['active'];
                    }

                    $isRequired = '2';
                    if (in_array($this->doorGets->Form->i['required'],array('1','2'))) {
                        $isRequired = $this->doorGets->Form->i['required'];
                    }

                    if (empty($this->doorGets->Form->e)) {

                        
                        $dataAttributes = array(
                            'active'        => $isActived,
                            'required'      => $isRequired,
                            'uri'           => $this->doorGets->Form->i['uri'],
                            'type'          => $this->doorGets->Form->i['type'],
                            'params'        => base64_encode(serialize($paramsAttibute))
                        );

                        $dataTraduction = array(
                            
                            'title'         => $this->doorGets->Form->i['title'],
                            'description'   => $this->doorGets->Form->i['description'],
                            
                        );

                        $this->doorGets->dbQU($isContent['id_attribute'],$dataAttributes,'_users_groupes_attributes');
                        if (!empty($idLgAttribute)) {

                            $this->doorGets->dbQU($idLgAttribute,$dataTraduction,'_users_groupes_attributes_traduction');
                        }

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();

                        $redirectUrl = './?controller=attributes&action=edit&id='.$isContent['id_attribute'].'&lg='.$lgActuel;
                        header('Location:'.$redirectUrl); exit();
                        
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)) {
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->dbQD($isContent['id_attribute'],'_users_groupes_attributes','id','=','');
                    $this->doorGets->dbQD($isContent['id_attribute'],'_users_groupes_attributes_traduction','id_attribute','=','');
                    //$this->doorGets->clearDBCache();
                    FlashInfo::set($this->doorGets->__("Un attribut vient d'être supprimé avec succès"));
                    header('Location:./?controller=attributes');
                    exit();
                    
                }
                
                break;            
            
        }
        
        return $out;
        
    }
    
}
