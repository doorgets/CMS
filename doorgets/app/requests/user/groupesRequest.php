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
        
        $saas_constant['SAAS_TRADUCTION'] = false;
        $saas_constant['SAAS_ATTRIBUTS'] = true;
        $saas_constant['SAAS_GROUPES'] = true;
        $saas_constant['SAAS_NOTIFICATION'] = false;
        $saas_constant['SAAS_NEWSLETTER'] = false;
        $saas_constant['SAAS_MEDIA'] = true;
        $saas_constant['SAAS_CLOUD'] = true;
        $saas_constant['SAAS_USERS'] = true;
        $saas_constant['SAAS_MENU'] = true;

        $saas_constant['SAAS_STATS'] = true;
        
        $saas_constant['SAAS_MODERATION'] = true;
        $saas_constant['SAAS_INBOX'] = true;
        $saas_constant['SAAS_COMMENT'] = true;
        $saas_constant['SAAS_SUPPORT'] = true;

        $saas_constant['SAAS_ORDER'] = true;

        $saas_constant['SAAS_MYINBOX'] = true;

        $saas_constant['SAAS_THEME'] = true;
        $saas_constant['SAAS_THEME_ADD'] = true;
        $saas_constant['SAAS_THEME_EDIT'] = true;
        $saas_constant['SAAS_THEME_DELETE'] = true;
        $saas_constant['SAAS_THEME_JS'] = false;

        $saas_constant['SAAS_ADDRESS'] = true;

        $saas_constant['SAAS_SIZE_LIMIT'] = 200; // Mo

        $saas_constant['SAAS_MODULES'] = true;
        $saas_constant['SAAS_MODULES_PAGE'] = true;
        $saas_constant['SAAS_MODULES_MULTIPAGE'] = true;
        $saas_constant['SAAS_MODULES_ONEPAGE'] = true;
        $saas_constant['SAAS_MODULES_BLOG'] = true;
        $saas_constant['SAAS_MODULES_SHOP'] = true;
        $saas_constant['SAAS_MODULES_NEWS'] = true;
        $saas_constant['SAAS_MODULES_SHAREDLINKS'] = true;
        $saas_constant['SAAS_MODULES_VIDEO'] = true;
        $saas_constant['SAAS_MODULES_IMAGE'] = true;
        $saas_constant['SAAS_MODULES_FAQ'] = true;
        $saas_constant['SAAS_MODULES_PARTNER'] = true;
        $saas_constant['SAAS_MODULES_CONTACT'] = true;
        $saas_constant['SAAS_MODULES_LINK'] = true;

        $saas_constant['SAAS_WIDGET_CAROUSEL'] = true;
        $saas_constant['SAAS_WIDGET_BLOCK'] = true;
        $saas_constant['SAAS_WIDGET_FORM'] = true;
        $saas_constant['SAAS_WIDGET_SURVEY'] = true;

        $saas_constant['SAAS_CONFIGURATION'] = true;

        $saas_constant['SAAS_CONFIG_LANGUE'] = true;
        $saas_constant['SAAS_CONFIG_MODULES'] = false;
        $saas_constant['SAAS_CONFIG_PARAMS'] = false;
        $saas_constant['SAAS_CONFIG_BACKUPS'] = false;
        $saas_constant['SAAS_CONFIG_UPDATE'] = false;
        $saas_constant['SAAS_CONFIG_SMTP'] = true;
        $saas_constant['SAAS_CONFIG_CACHE'] = true;
        $saas_constant['SAAS_CONFIG_SETUP'] = true;
        $saas_constant['SAAS_CONFIG_OAUTH2'] = true;
        $saas_constant['SAAS_CONFIG_NETWORK'] = true;
        $saas_constant['SAAS_CONFIG_MEDIA'] = true;
        $saas_constant['SAAS_CONFIG_ANALYTICS'] = true;
        $saas_constant['SAAS_CONFIG_CLOUD'] = true;
        $saas_constant['SAAS_CONFIG_SOCIAL'] = true;

        $saas_constant['SAAS_CONFIG_STRIPE'] = true;
        $saas_constant['SAAS_CONFIG_PAYPAL'] = true;
        $saas_constant['SAAS_CONFIG_TRANSFER'] = true;
        $saas_constant['SAAS_CONFIG_CHECK'] = true;
        $saas_constant['SAAS_CONFIG_CASH'] = true;

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
        
        $prefix = "#";
        $_attributes = array();

        $nonObligatoire = array(
            'attributes',
            'can_subscribe',
            'register_verification',
            'module_doorgets_limit',
            'widget_doorgets_limit',
            'widget_doorgets_can_modo',
            'payment',
            'payment_amount_month',
            'payment_tranche',
            'payment_group_expired',
            'payment_group_upgrade',
            'saas_limit',
            'saas_date_end'
        );
        $removeInt = array('0','1','2','3','4','5','6','7','8','9');
        
        switch($this->Action) {
            
            case 'index':
                
                // to do
                
                break;
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $saasOptions = array(
                        'saas_add' => false,
                        'saas_delete' => false,
                        'saas_limit' => $this->doorGets->Form->i['saas_limit'],
                        'saas_date_end' => $this->doorGets->Form->i['saas_date_end'],
                        'saas_constant' => $saas_constant
                    );

                    $fieldModuleIds = array();
                    $fieldGroupeIds = array();
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        if (!is_array($v)) {

                            $subNameHidden = substr($k,0,21);
                            $subNameHiddenWidget = substr($k,0,24);

                            $rKey = substr(str_replace($removeInt,'',$k),0,-1);
                            if ( !in_array($k,$nonObligatoire) && !in_array($rKey,$nonObligatoire) &&  empty($v) ) {
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
                                    if (in_array($v,$fieldModuleIds)) { continue; }

                                    $isModuleChecked = (array_key_exists('module_doorgets_'.$v, $this->doorGets->Form->i)) ? true : false ;

                                    if(!$isModuleChecked) { continue; } 

                                    $listeModules .= $prefix.$v.','; 
                                    
                                    $numberLimit = 0;
                                    if (
                                        array_key_exists('module_doorgets_limit_'.$v, $this->doorGets->Form->i) 
                                        && is_numeric($this->doorGets->Form->i['module_doorgets_limit_'.$v])
                                    ) {
                                        $numberLimit = (int)$this->doorGets->Form->i['module_doorgets_limit_'.$v];
                                    }
                                    $listeModulesLimit   .= $prefix.$v.'|'.$numberLimit.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_modo_'.$v,$params['POST'])) {
                                        $listeModulesModo    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_list_'.$v,$params['POST'])) {
                                        $listeModulesList    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_show_'.$v,$params['POST'])) {
                                        $listeModulesShow    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_add_'.$v,$params['POST'])) {
                                        $listeModulesAdd    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_edit_'.$v,$params['POST'])) {
                                        $listeModulesEdit    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_delete_'.$v,$params['POST'])) {
                                        $listeModulesDelete    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_module_doorgets_can_admin_'.$v,$params['POST'])) {
                                        $listeModulesAdmin    .= $prefix.$v.',';
                                    }

                                    $fieldModuleIds[] = $v;
                                    
                                }elseif ($subName === 'widget_doorgets')
                                {   

                                    if (in_array($v,$fieldModuleIds)) { continue; }

                                    $listeWidgets .= $prefix.$v.',';
                                    $numberLimit = 0;
                                    $valueLimit = 'widget_doorgets_limit_'.$v;
                                    if (array_key_exists($valueLimit,$this->doorGets->Form->i) && is_numeric($this->doorGets->Form->i[$valueLimit])) {
                                        $numberLimit = (int)$this->doorGets->Form->i['widget_doorgets_limit_'.$v];
                                    }
                                    $listeWidgetsLimit   .= $prefix.$v.'|'.$numberLimit.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_widget_doorgets_can_modo_'.$v,$params['POST'])) {
                                        $listeWidgetsModo    .= $prefix.$v.',';
                                    }

                                    $fieldModuleIds[] = $v;
                                        
                                }elseif ($subName === 'groupes_enfants')
                                {
                                    $listeGroupesEnfants .=  $prefix.$v.',';
                                    
                                    if (in_array($v,$fieldGroupeIds)) { continue; }

                                    if (array_key_exists($this->doorGets->controllerNameNow().'_add_groupes_enfants_can_modo_'.$v,$params['POST'])) {
                                        $listeGroupesEnfantsModo    .= $prefix.$v.',';
                                    }

                                    $fieldGroupeIds[] = $v;
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

                    if (array_key_exists('saas_add', $this->doorGets->Form->i)) {
                        $saasOptions['saas_add'] = true;
                    }

                    if (array_key_exists('saas_delete', $this->doorGets->Form->i)) {
                        $saasOptions['saas_delete'] = true;
                    }

                    // if (!array_key_exists('payment', $this->doorGets->Form->i)) {
                    //     $this->doorGets->Form->i['payment'] = 0;
                    // }else{
                    //     $this->doorGets->Form->i['payment'] = 1;
                    // }

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

                    // Constant
                    foreach ($saas_constant as $key => $value) {
                        if (is_bool($value)) {
                            if (array_key_exists('saas_constant', $this->doorGets->Form->i) && array_key_exists($key, $this->doorGets->Form->i['saas_constant'])) {
                                $saasOptions['saas_constant'][$key] = true;
                            } elseif (is_bool($value)){
                                $saasOptions['saas_constant'][$key] = false;
                            }    
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        //$this->doorGets->Form->i['payment_amount_month'] = (float) str_replace(',','.',$this->doorGets->Form->i['payment_amount_month']);
                        
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

                            // 'payment'                       => $this->doorGets->Form->i['payment'],
                            // 'payment_currency'              => $this->doorGets->Form->i['payment_currency'],
                            // 'payment_amount_month'          => $this->doorGets->Form->i['payment_amount_month'],
                            // 'payment_tranche'               => $this->doorGets->Form->i['payment_tranche'],
                            // 'payment_group_expired'         => $this->doorGets->Form->i['payment_group_expired'],
                            // 'payment_group_upgrade'         => $this->doorGets->Form->i['payment_group_upgrade'],                            

                            'liste_enfant'                  => $listeGroupesEnfants,
                            'liste_enfant_modo'             => $listeGroupesEnfantsModo,

                            'editor_ckeditor'               => $this->doorGets->Form->i['editor_ckeditor'],
                            'editor_tinymce'                => $this->doorGets->Form->i['editor_tinymce'],
                            'fileman'                       => $this->doorGets->Form->i['fileman'],

                            'attributes'                    => base64_encode(serialize($_attributes)),
                            'saas_options'                  => base64_encode(serialize($saasOptions)),
                            'register_verification'         => $this->doorGets->Form->i['register_verification'],

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

                    $this->doorGets->checkMode();
                    
                    $saasOptions = array(
                        'saas_add' => false,
                        'saas_delete' => false,
                        'saas_limit' => $this->doorGets->Form->i['saas_limit'],
                        'saas_date_end' => $this->doorGets->Form->i['saas_date_end'],
                        'saas_constant' => $saas_constant
                    );

                    $fieldModuleIds = array();
                    $fieldGroupeIds = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {

                        if (!empty($v) && !is_array($v)) {

                            $subNameHidden = substr($k,0,21);
                            
                            $rKey = substr(str_replace($removeInt,'',$k),0,-1);
                            if ( !in_array($k,$nonObligatoire) && !in_array($rKey,$nonObligatoire) &&  empty($v) ) {
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
                                    if (in_array($v,$fieldModuleIds)) { continue; }

                                    $listeModules .= $prefix.$v.',';
                                    $numberLimit = 0;
                                    if (
                                        array_key_exists('module_doorgets_limit_'.$v, $this->doorGets->Form->i) 
                                        && is_numeric($this->doorGets->Form->i['module_doorgets_limit_'.$v])
                                    ) {
                                        $numberLimit = (int)$this->doorGets->Form->i['module_doorgets_limit_'.$v];
                                    }
                                    $listeModulesLimit   .= $prefix.$v.'|'.$numberLimit.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_modo_'.$v,$params['POST'])) {
                                        $listeModulesModo    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_list_'.$v,$params['POST'])) {
                                        $listeModulesList    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_show_'.$v,$params['POST'])) {
                                        $listeModulesShow    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_add_'.$v,$params['POST'])) {
                                        $listeModulesAdd    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_edit_'.$v,$params['POST'])) {
                                        $listeModulesEdit    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_delete_'.$v,$params['POST'])) {
                                        $listeModulesDelete    .= $prefix.$v.',';
                                    }
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_module_doorgets_can_admin_'.$v,$params['POST'])) {
                                        $listeModulesAdmin    .= $prefix.$v.',';
                                    }

                                    $fieldModuleIds[] = $v;

                                }elseif ($subName === 'widget_doorgets')
                                {
                                    
                                    if (in_array($v,$fieldModuleIds)) { continue; }

                                    $listeWidgets .= $prefix.$v.',';
                                    $numberLimit = 0;
                                    if (is_numeric($this->doorGets->Form->i['widget_doorgets_limit_'.$v])) {
                                        $numberLimit = (int)$this->doorGets->Form->i['widget_doorgets_limit_'.$v];
                                    }
                                    $listeWidgetsLimit   .= $prefix.$v.'|'.$numberLimit.',';
                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_widget_doorgets_can_modo_'.$v,$params['POST'])) {
                                        $listeWidgetsModo    .= $prefix.$v.',';
                                    }

                                    $fieldModuleIds[] = $v;
                                    
                                }elseif ($subName === 'groupes_enfants')
                                {
                                    $listeGroupesEnfants .=  $prefix.$v.',';
                                    
                                    if (in_array($v,$fieldGroupeIds)) { continue; }

                                    if (array_key_exists($this->doorGets->controllerNameNow().'_edit_groupes_enfants_can_modo_'.$v,$params['POST'])) {
                                        $listeGroupesEnfantsModo    .= $prefix.$v.',';
                                    }

                                    $fieldGroupeIds[] = $v;
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

                    if (array_key_exists('saas_add', $this->doorGets->Form->i)) {
                        $saasOptions['saas_add'] = true;
                    }

                    if (array_key_exists('saas_delete', $this->doorGets->Form->i)) {
                        $saasOptions['saas_delete'] = true;
                    }
                    
                    // if (!array_key_exists('payment', $this->doorGets->Form->i)) {
                    //     $this->doorGets->Form->i['payment'] = 0;
                    // }else{
                    //     $this->doorGets->Form->i['payment'] = 1;
                    // }

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

                    // Constant
                    foreach ($saas_constant as $key => $value) {
                        if (is_bool($value)) {
                            if (array_key_exists('saas_constant', $this->doorGets->Form->i) && array_key_exists($key, $this->doorGets->Form->i['saas_constant'])) {
                                $saasOptions['saas_constant'][$key] = true;
                            } elseif (is_bool($value)){
                                $saasOptions['saas_constant'][$key] = false;
                            }    
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        //$this->doorGets->Form->i['payment_amount_month'] = (float) str_replace(',','.',$this->doorGets->Form->i['payment_amount_month']);
                        
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

                            // 'payment'                       => $this->doorGets->Form->i['payment'],
                            // 'payment_currency'              => $this->doorGets->Form->i['payment_currency'],
                            // 'payment_amount_month'          => $this->doorGets->Form->i['payment_amount_month'],
                            // 'payment_tranche'               => $this->doorGets->Form->i['payment_tranche'],
                            // 'payment_group_expired'         => $this->doorGets->Form->i['payment_group_expired'],
                            // 'payment_group_upgrade'         => $this->doorGets->Form->i['payment_group_upgrade'],                            
                            
                            'liste_enfant'                  => $listeGroupesEnfants,
                            'liste_enfant_modo'             => $listeGroupesEnfantsModo,
                            
                            'editor_ckeditor'               => $this->doorGets->Form->i['editor_ckeditor'],
                            'editor_tinymce'                => $this->doorGets->Form->i['editor_tinymce'],
                            'fileman'                       => $this->doorGets->Form->i['fileman'],

                            'attributes'                    => base64_encode(serialize($_attributes)), 
                            'saas_options'                  => base64_encode(serialize($saasOptions)),

                            'register_verification'         => $this->doorGets->Form->i['register_verification']
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
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->dbQD($isContent['id_groupe'],'_users_groupes');
                    $this->doorGets->dbQD($isContent['id_groupe'],'_users_groupes_traduction','id_groupe','=','');
                    FlashInfo::set($this->doorGets->__("Vos informations sont bien supprimées"));
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
                    'liste_enfant'          => $isGroupe['liste_enfant']."#".$idGroupeToAdd.',',
                    'liste_enfant_modo'     => $isGroupe['liste_enfant_modo']."#".$idGroupeToAdd.',',
                ),
                '_users_groupes'
            );
        }
    }
    
}
