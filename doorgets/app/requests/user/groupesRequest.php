<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
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


class GroupesRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        
        $out            = '';
        $lgActuel       = $this->doorGets->getLangueTradution();
        $arrayFilter    = array();
        $idLgGroupe     = '';
        $Attributes     = $this->doorGets->loadAttributes();
        $groupes        = $this->doorGets->loadGroupes();
        $modules        = $this->doorGets->loadModules();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_groupes');
            if (!empty($isContent)) {

                $arrayFilter[] = array('key'=>'network','type'=>'=','value'=>$isContent['id']);
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                        
                    $idLgGroupe = $lgGroupe[$this->doorGets->getLangueTradution()];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_users_groupes_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }
                }
            }
        }
        
        $cUsers = $this->doorGets->getCountTable('_users_info',$arrayFilter);
        $cModules = count($modules);
        
        if (!empty($isContent)) {
            
            $activeWidgets = $this->doorGets->_toArray($isContent['liste_widget']);
            
            $activeModules = $this->doorGets->_toArray($isContent['liste_module']);
            $activeModulesLimit = $this->doorGets->_toArrayKeys($isContent['liste_module_limit']);

            $activeModulesList          = $this->doorGets->_toArray($isContent['liste_module_list']);
            $activeModulesShow          = $this->doorGets->_toArray($isContent['liste_module_show']);
            $activeModulesAdd           = $this->doorGets->_toArray($isContent['liste_module_add']);
            $activeModulesEdit          = $this->doorGets->_toArray($isContent['liste_module_edit']);
            $activeModulesDelete        = $this->doorGets->_toArray($isContent['liste_module_delete']);
            $activeModulesModo          = $this->doorGets->_toArray($isContent['liste_module_modo']);
            
            $activeModulesInterne = $this->doorGets->_toArray($isContent['liste_module_interne']);
            $activeModulesInterneModo = $this->doorGets->_toArray($isContent['liste_module_interne_modo']);
            
            $activeGroupesEnfants = $this->doorGets->_toArray($isContent['liste_enfant']);
            $activeGroupesEnfantsModo = $this->doorGets->_toArray($isContent['liste_enfant_modo']);
            
            $activeGroupesParents = $this->doorGets->_toArray($isContent['liste_parent']);
            
            $iEnfant = count($activeGroupesEnfants);
            $iParent = count($activeGroupesParents);
            
        }
        
        $modulesInterne['file'] = $this->doorGets->__("Fichier");
        
        $subModule = $this->doorGets->getArrayForms('sub_module');
        
        $cUsers = $this->doorGets->getCountTable('_users_info',$arrayFilter);
        
        $listeModulesInterne        = $listeModules         = $listeGroupesEnfants      =   '';
        $listeModulesAdmin          = '';
        $listeModulesInterneModo    = $listeModulesModo     =  $listeModulesList        = $listeModulesShow     = '';
        $listeModulesAdd            = $listeModulesEdit     = $listeModulesDelete       = $listeGroupesEnfantsModo  =   '';
        $listeModulesLimit          = $subName              = $listeWidgets             =   '';
        $listeWidgetsLimit          = $listeWidgetsModo     = '';
        
        $_attributes = array();

        $nonObligatoire = array(
            'payment',
            'payment_amount_month',
            'payment_tranche',
            'payment_group_expired',
            'payment_group_upgrade'
        );

        switch($this->Action) {
            
            case 'index':
                
                // to do
                
                break;
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        $subNameHidden = substr($k,0,21);
                        $subNameHiddenWidget = substr($k,0,24);

                        if (
                            empty($v) 
                            && $k !== 'attributes'
                            && $k !=='can_subscribe' 
                            && $subNameHidden !== 'module_doorgets_limit'
                            && $subNameHidden !== 'widget_doorgets_limit'
                            && $subNameHiddenWidget !== 'widget_doorgets_can_modo'
                            && !in_array($k,$nonObligatoire)
                        ) {

                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                        
                        if (!array_key_exists($v,$subModule)  && $subNameHidden !== 'module_doorgets_limit') {
                            
                            $subName = substr($k,0,15);
                            
                            if ($subName === 'modules_interne')
                            {
                                
                                $listeModulesInterne .= $v.',';
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_modules_interne_can_modo_'.$v,$params['POST'])) {
                                    $listeModulesInterneModo    .= $v.',';
                                }
                                
                            }elseif ($subName === 'module_doorgets' )
                            {
                                
                                $isModuleChecked = (array_key_exists('module_doorgets_'.$v, $this->doorGets->Form->i)) ? true : false ;

                                if(!$isModuleChecked) { continue; } 

                                $listeModules .= $v.','; 
                                
                                $numberLimit = 0;
                                if (
                                    array_key_exists('module_doorgets_limit_'.$v, $this->doorGets->Form->i) 
                                    && is_numeric($this->doorGets->Form->i['module_doorgets_limit_'.$v])
                               ) {
                                    $numberLimit = (int)$this->doorGets->Form->i['module_doorgets_limit_'.$v];
                                }
                                $listeModulesLimit   .= $v.'|'.$numberLimit.',';
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_modo_'.$v,$params['POST'])) {
                                    $listeModulesModo    .= $v.',';
                                }
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_list_'.$v,$params['POST'])) {
                                    $listeModulesList    .= $v.',';
                                }
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_show_'.$v,$params['POST'])) {
                                    $listeModulesShow    .= $v.',';
                                }
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_add_'.$v,$params['POST'])) {
                                    $listeModulesAdd    .= $v.',';
                                }
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_edit_'.$v,$params['POST'])) {
                                    $listeModulesEdit    .= $v.',';
                                }
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_delete_'.$v,$params['POST'])) {
                                    $listeModulesDelete    .= $v.',';
                                }
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_admin_'.$v,$params['POST'])) {
                                    $listeModulesAdmin    .= $v.',';
                                }
                                
                            }elseif ($subName === 'widget_doorgets')
                            {
                                $listeWidgets .= $v.',';
                                $numberLimit = 0;
                                $valueLimit = 'widget_doorgets_limit_'.$v;
                                if (array_key_exists($valueLimit,$this->doorGets->Form->i) && is_numeric($this->doorGets->Form->i[$valueLimit])) {
                                    $numberLimit = (int)$this->doorGets->Form->i['widget_doorgets_limit_'.$v];
                                }
                                $listeWidgetsLimit   .= $v.'|'.$numberLimit.',';
                                if (array_key_exists($this->doorGets->controllerNameNow().'_edit_widget_doorgets_can_modo_'.$v,$params['POST'])) {
                                    $listeWidgetsModo    .= $v.',';
                                }
                                    
                            }elseif ($subName === 'groupes_enfants')
                            {
                                $listeGroupesEnfants .=  $v.',';
                                
                                if (array_key_exists($this->doorGets->controllerNameNow().'_add_groupes_enfants_can_modo_'.$v,$params['POST'])) {
                                    $listeGroupesEnfantsModo    .= $v.',';
                                }
                            }
                        }

                        
                    }

                    if (!array_key_exists('editor_ckeditor', $this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['editor_ckeditor'] = 0;
                    }else{
                        $this->doorGets->Form->i['editor_ckeditor'] = 1;
                    }

                    if (!array_key_exists('editor_tinymce', $this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['editor_tinymce'] = 0;
                    }else{
                        $this->doorGets->Form->i['editor_tinymce'] = 1;
                    }

                    if (!array_key_exists('payment', $this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['payment'] = 0;
                    }else{
                        $this->doorGets->Form->i['payment'] = 1;
                    }

                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_users_groupes');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_uri'] = 'ok';
                    }

                    $_attributes = explode(',', $this->doorGets->Form->i['attributes']);
                    foreach ($_attributes as $key => $value) {
                        if (empty($value)  || !array_key_exists($value, $Attributes)) {
                            unset($_attributes[$key]);
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = array(

                            'uri'                           => $this->doorGets->Form->i['uri'],
                            'can_subscribe'                 => $this->doorGets->Form->i['can_subscribe'],
                            
                            'liste_widget'                  => $listeWidgets,
                            'liste_module'                  => $listeModules,
                            'liste_module_limit'            => $listeModulesLimit,
                            'liste_module_admin'            => $listeModulesAdmin,
                            'liste_module_modo'             => $listeModulesModo,
                            'liste_module_list'             => $listeModulesList,
                            'liste_module_show'             => $listeModulesShow,
                            'liste_module_add'              => $listeModulesAdd,
                            'liste_module_edit'             => $listeModulesEdit,
                            'liste_module_delete'           => $listeModulesDelete,
                            
                            'liste_module_interne'          => $listeModulesInterne,
                            'liste_module_interne_modo'     => $listeModulesInterneModo,
                            
                            'liste_enfant'                  => $listeGroupesEnfants,
                            'liste_enfant_modo'             => $listeGroupesEnfantsModo,

                            'editor_ckeditor'               => $this->doorGets->Form->i['editor_ckeditor'],
                            'editor_tinymce'                => $this->doorGets->Form->i['editor_tinymce'],

                            'attributes'                    => serialize($_attributes),

                            'date_creation'                 => time()
                            
                        );

                        
                        
                        $idContent = $this->doorGets->dbQI($data,'_users_groupes');

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                            $dataTraduction['title']          = $this->doorGets->Form->i['title'];
                            $dataTraduction['description']    = $this->doorGets->Form->i['description'];
                            $dataTraduction['langue']         = $k;
                            $dataTraduction['id_groupe']      = $idContent;
                            
                            $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,'_users_groupes_traduction');

                        }

                        $dataModification['groupe_traduction'] = serialize($idsTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,'_users_groupes');

                        foreach($groupes as $k=>$v)
                        {
                            
                            if (array_key_exists('groupes_enfants_'.$k,$this->doorGets->Form->i)) {
                                
                                $this->doorGets->updateNewListToParent('_users_groupes',$k,$idContent,'add');
                                
                            }else{
                                
                                $this->doorGets->updateNewListToParent('_users_groupes',$k,$idContent,'delete');
                                
                            }
                            
                        }
                        
                        $this->addGroupeToChildrenList($idContent);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();
                        header('Location:./?controller=groupes'); exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'edit':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {

                        if (!empty($v)) {

                            $subNameHidden = substr($k,0,21);
                            
                            if ( 
                                empty($v) 
                                && $k !=='can_subscribe' 
                                && $subNameHidden !== 'module_doorgets_limit'
                                && !in_array($k,$nonObligatoire)
                            ) {
                                
                                $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                                
                            }
                            
                            if (!array_key_exists($v,$subModule) && $subNameHidden !== 'module_doorgets_limit') {
                                
                                $subName = substr($k,0,15);
                                
                                if ($subName === 'modules_interne')
                                {
                                    
                                    $listeModulesInterne .= $v.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_modules_interne_can_modo_'.$v,$params['POST'])) {
                                        $listeModulesInterneModo    .= $v.',';
                                    }
                                    
                                }elseif ($subName === 'module_doorgets' && is_numeric($v))
                                {
                                    $listeModules .= $v.',';
                                    $numberLimit = 0;
                                    if (
                                        array_key_exists('module_doorgets_limit_'.$v, $this->doorGets->Form->i) 
                                        && is_numeric($this->doorGets->Form->i['module_doorgets_limit_'.$v])
                                    ) {
                                        $numberLimit = (int)$this->doorGets->Form->i['module_doorgets_limit_'.$v];
                                    }
                                    $listeModulesLimit   .= $v.'|'.$numberLimit.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_modo_'.$v,$params['POST'])) {
                                        $listeModulesModo    .= $v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_list_'.$v,$params['POST'])) {
                                        $listeModulesList    .= $v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_show_'.$v,$params['POST'])) {
                                        $listeModulesShow    .= $v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_add_'.$v,$params['POST'])) {
                                        $listeModulesAdd    .= $v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_edit_'.$v,$params['POST'])) {
                                        $listeModulesEdit    .= $v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_delete_'.$v,$params['POST'])) {
                                        $listeModulesDelete    .= $v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_admin_'.$v,$params['POST'])) {
                                        $listeModulesAdmin    .= $v.',';
                                    }

                                }elseif ($subName === 'widget_doorgets')
                                {
                                    $listeWidgets .= $v.',';
                                    $numberLimit = 0;
                                    if (is_numeric($this->doorGets->Form->i['widget_doorgets_limit_'.$v])) {
                                        $numberLimit = (int)$this->doorGets->Form->i['widget_doorgets_limit_'.$v];
                                    }
                                    $listeWidgetsLimit   .= $v.'|'.$numberLimit.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_widget_doorgets_can_modo_'.$v,$params['POST'])) {
                                        $listeWidgetsModo    .= $v.',';
                                    }
                                    
                                }elseif ($subName === 'groupes_enfants')
                                {
                                    $listeGroupesEnfants .=  $v.',';
                                    
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_groupes_enfants_can_modo_'.$v,$params['POST'])) {
                                        $listeGroupesEnfantsModo    .= $v.',';
                                    }
                                }
                            }
                        }
                            
                    }
                    
                    if (!array_key_exists('editor_ckeditor', $this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['editor_ckeditor'] = 0;
                    }else{
                        $this->doorGets->Form->i['editor_ckeditor'] = 1;
                    }

                    if (!array_key_exists('editor_tinymce', $this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['editor_tinymce'] = 0;
                    }else{
                        $this->doorGets->Form->i['editor_tinymce'] = 1;
                    }

                    if (!array_key_exists('payment', $this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['payment'] = 0;
                    }else{
                        $this->doorGets->Form->i['payment'] = 1;
                    }

                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_users_groupes_attributes',$isContent);
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_uri'] = 'ok';
                    }

                    $_attributes = explode(',', $this->doorGets->Form->i['attributes']);
                    foreach ($_attributes as $key => $value) {
                        if (empty($value) || !array_key_exists($value, $Attributes)) {
                            unset($_attributes[$key]);
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = array(

                            'uri'                           => $this->doorGets->Form->i['uri'],
                            'can_subscribe'                 => $this->doorGets->Form->i['can_subscribe'],
                            
                            'liste_widget'                  => $listeWidgets,
                            'liste_module'                  => $listeModules,
                            'liste_module_limit'            => $listeModulesLimit,
                            'liste_module_admin'            => $listeModulesAdmin,
                            'liste_module_modo'             => $listeModulesModo,
                            'liste_module_list'             => $listeModulesList,
                            'liste_module_show'             => $listeModulesShow,
                            'liste_module_add'              => $listeModulesAdd,
                            'liste_module_edit'             => $listeModulesEdit,
                            'liste_module_delete'           => $listeModulesDelete,
                            
                            'liste_module_interne'          => $listeModulesInterne,
                            'liste_module_interne_modo'     => $listeModulesInterneModo,
                            
                            'liste_enfant'                  => $listeGroupesEnfants,
                            'liste_enfant_modo'             => $listeGroupesEnfantsModo,
                            
                            'editor_ckeditor'               => $this->doorGets->Form->i['editor_ckeditor'],
                            'editor_tinymce'                => $this->doorGets->Form->i['editor_tinymce'],

                            'attributes'                    => serialize($_attributes), 

                        );
                        
                        $dataTraduction = array(
                            
                            'title'                         => $this->doorGets->Form->i['title'],
                            'description'                   => $this->doorGets->Form->i['description'],
                            
                        );
                        
                        
                        foreach($groupes as $k=>$v)
                        {
                            
                            if (array_key_exists('groupes_enfants_'.$k,$this->doorGets->Form->i)) {
                                
                                $this->doorGets->updateNewListToParent('_users_groupes',$k,$isContent['id_groupe'],'add');
                                
                            }else{
                                
                                $this->doorGets->updateNewListToParent('_users_groupes',$k,$isContent['id_groupe'],'delete');
                                
                            }
                            
                        }
                        
                        
                        $this->doorGets->dbQU($isContent['id_groupe'],$data,'_users_groupes','id');
                        if (!empty($idLgGroupe)) {

                            $this->doorGets->dbQU($idLgGroupe,$dataTraduction,'_users_groupes_traduction');
                        }
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();

                        $redirectUrl = './?controller=groupes&action=edit&id='.$isContent['id_groupe'].'&lg='.$this->doorGets->getLangueTradution();
                        header('Location:'.$redirectUrl); exit();
                    }
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) && $cUsers == 0) {
                    
                    $this->doorGets->dbQD($isContent['id_groupe'],'_users_groupes');
                    $this->doorGets->dbQD($isContent['id_groupe'],'_users_groupes_traduction','id_groupe','=','');
                    FlashInfo::set("Vos informations sont bien supprimées");
                    header('Location:./?controller=groupes');
                    exit();
                    
                }
                
                break;
            
        }
        
        return $out;
        
    }

    private function addGroupeToChildrenList($idGroupeToAdd = '') {

        $idGroupe = $this->doorGets->user['groupe'];

        if (empty($idGroupe)) { return ''; }
        
        $isGroupe = $this->doorGets->dbQS($idGroupe,'_users_groupes');
        if (!empty($isGroupe)) {

            $this->doorGets->dbQU(
                $idGroupe,
                array(
                    'liste_enfant'          => $isGroupe['liste_enfant'].$idGroupeToAdd.',',
                    'liste_enfant_modo'     => $isGroupe['liste_enfant_modo'].$idGroupeToAdd.',',
                ),
                '_users_groupes'
            );
        }
    }
    
}
