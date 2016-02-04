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


class ModuleCategoryRequest extends doorGetsUserRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        $lgActuel = $this->doorGets->getLangueTradution();
        $Categories = $this->doorGets->getAllCategories($this->doorGets->Uri);
        $menuCategories = $this->doorGets->getMenuCategories(0,0,$Categories);
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_categories');
            
            if (!empty($isContent)) {
                
                $lgGroupe = @unserialize($isContent['groupe_traduction']);
                $idLgGroupe = $lgGroupe[$lgActuel];
                
                $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_categories_traduction');
                if (!empty($isContentTraduction)) {
                    
                    $isContent = array_merge($isContent,$isContentTraduction);
                }
                
            }
            
            
        }
        
        switch($this->Action) {
            
            case 'add':
                
                $idParent = 0;
                
                if (!empty($this->doorGets->Form->i)) {

                    
                    $this->doorGets->checkMode();
                    
                    if (is_numeric($this->doorGets->Form->i['id_parent'])) {
                        
                        $idParent = $this->doorGets->Form->i['id_parent'];
                        
                    }
                    
                    $cResultsInt = $this->doorGets->getCountTable('_categories',
                        array(
                            array('key'=>'uri_module','type'=>'=','value'=>$this->doorGets->Uri),
                            array('key'=>'id_parent','type'=>'=','value'=>$idParent)
                        )
                    );
                
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && $k !== 'description' && $k !== 'image' && $k !== 'meta_titre' && $k !== 'meta_description' && $k !== 'meta_keys' && $k !== 'id_parent' ) {
                            
                            $this->doorGets->Form->e['modulecategory_add_'.$k] = 'ok';
                            
                        }
                    }
                    
                    // gestion de l'ui
                    
                    $lenUri = strlen($this->doorGets->Form->i['uri']);
                    $var = str_replace('-','',$this->doorGets->Form->i['uri']);
                    
                    $isUriValide = ctype_alnum($var);
                    if (empty($isUriValide) || $lenUri > 250) {
                        
                        $this->doorGets->Form->e['modulecategory_add_uri'] = 'ok';
                        
                    }else{
                        
                        $isUriExist = $this->doorGets->dbQS($this->doorGets->Form->i['uri'],'_categories_traduction','uri');
                        if (!empty($isUriExist)) {
                            
                            $this->doorGets->Form->e['modulecategory_add_uri'] = 'ok';
                        }
                        
                    }
        
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $data['uri_module'] = $this->doorGets->Uri;
                        $data['ordre']      = $cResultsInt + 1;
                        $data['id_parent']  = $idParent;
                        
                        $data['date_creation'] = time();
                        
                        $idCat= $this->doorGets->dbQI($data,'_categories');
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataNext = array(
                                'langue' => $this->doorGets->Form->i['langue'],
                                'nom' => $this->doorGets->Form->i['nom'],
                                'titre' => $this->doorGets->Form->i['titre'],
                                'description' => $this->doorGets->Form->i['description'],
                                'uri' => $this->doorGets->Form->i['uri'],
                                'meta_titre' => $this->doorGets->Form->i['meta_titre'],
                                'meta_description' => $this->doorGets->Form->i['meta_description'],
                                'meta_keys' => $this->doorGets->Form->i['meta_keys'],
                            );

                            $dataNext['date_creation']  = time();
                            $dataNext['id_cat']         = $idCat;
                            $dataNext['langue']         = $k;
                            $dataNext['uri']            = $this->doorGets->Uri.'-'.$this->doorGets->Form->i['uri'].'-'.$k;
                            
                            $idTraduction[$k] = $this->doorGets->dbQI($dataNext,'_categories_traduction');
                            
                        }
                        
                        $dataModification['groupe_traduction'] = serialize($idTraduction);
                        $this->doorGets->dbQU($idCat,$dataModification,'_categories');
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=modulecategory&uri='.$this->doorGets->Uri);
                        exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'edit':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v)  && $k !== 'description' && $k !== 'image' && $k !== 'meta_titre' && $k !== 'meta_description' && $k !== 'meta_keys'  && $k !== 'id_parent') {
                            
                            $this->doorGets->Form->e['modulecategory_edit_'.$k] = 'ok';
                            
                        }
                    }
                    
                    // gestion de l'uri
                    $lenUri = strlen($this->doorGets->Form->i['uri']);
                    $var = str_replace('-','',$this->doorGets->Form->i['uri']);
                    
                    $isUriValide = ctype_alnum($var);
                    if (empty($isUriValide) || $lenUri > 250) {
                        
                        $this->doorGets->Form->e['modulecategory_edit_uri'] = 'ok';
                        
                    }else{
                        
                        $isUriExist = $this->doorGets->dbQS($this->doorGets->Form->i['uri'],'_categories_traduction','uri');
                        if (!empty($isUriExist) && $isUriExist['id'] != $isContent['id']) {
                            
                            $this->doorGets->Form->e['modulecategory_edit_uri'] = 'ok';
                        }
                        
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = array(
                            'langue'            => $this->doorGets->Form->i['langue'],
                            'nom'               => $this->doorGets->Form->i['nom'],
                            'titre'             => $this->doorGets->Form->i['titre'],
                            'description'       => $this->doorGets->Form->i['description'],
                            'uri'               => $this->doorGets->Form->i['uri'],
                            'meta_titre'        => $this->doorGets->Form->i['meta_titre'],
                            'meta_description'  => $this->doorGets->Form->i['meta_description'],
                            'meta_keys'         => $this->doorGets->Form->i['meta_keys'],
                        );
                        
                        $dataCat['id_parent'] = $this->doorGets->Form->i['id_parent'];

                        $this->doorGets->dbQU($isContent['id'],$data,'_categories_traduction');
                        if ($dataCat['id_parent'] !== $isContent['id_parent'] && $isContent['id_cat'] !== $dataCat['id_parent']) {
                            
                            $cResultsInt = $this->doorGets->getCountTable('_categories',
                                array(
                                    array('key'=>'uri_module','type'=>'=','value'=>$this->doorGets->Uri),
                                    array('key'=>'id_parent','type'=>'=','value'=>$dataCat['id_parent'])
                                )
                            );
                            
                            $dataCat['ordre'] = $cResultsInt + 1;
                            $this->doorGets->dbQL("UPDATE _categories SET ordre = ordre - 1 WHERE ordre > ".$isContent['ordre']." AND id_parent = ".$isContent['id_parent']." AND uri_module = '".$this->doorGets->Uri."'");
                            $this->doorGets->dbQU($isContent['id_cat'],$dataCat,'_categories');
                        }
                        
                        $this->doorGets->clearModuleDBCache('_categories');
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:'.$_SERVER['REQUEST_URI']);exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $lgGroupe = unserialize($isContent['groupe_traduction']);
                    foreach($lgGroupe as $v) {
                        @$this->doorGets->dbQD($v,'_categories_traduction');
                    }
                    
                    $this->doorGets->dbQD($isContent['id_cat'],'_categories');
                    $this->doorGets->dbQL("UPDATE _categories SET ordre = ordre - 1 WHERE ordre > ".$isContent['ordre']." AND id_parent = ".$isContent['id_parent']." AND uri_module = '".$this->doorGets->Uri."'");
                    
                    $this->doorGets->clearModuleDBCache('_categories');
                    
                    FlashInfo::set($this->doorGets->__("Suppression effectuée avec succès"));
                    header('Location:./?controller=modulecategory&uri='.$this->doorGets->Uri.'&lg='.$lgActuel); exit();
                }
            
            break;
            
        }
        
        return $out;
        
    }
    
}
