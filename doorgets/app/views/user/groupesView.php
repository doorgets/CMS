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


class GroupesView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Utilisateurs'),
            'add'           => $this->doorGets->__('Ajouter'),
            'edit'          => $this->doorGets->__('Modifier'),
            'delete'        => $this->doorGets->__('Supprimer')
            
        );
        
        $lgActuel       = $this->doorGets->getLangueTradution();
        
        
        $arrayFilter    = $isContent = array();
        $aYesNo         = $this->doorGets->getArrayForms();

        $groups         = $this->doorGets->loadGroupes();
        $groups         = array_merge(array(''),$groups);

        $tranches       = range(0,12,1);

        $Attributes         = $this->doorGets->loadAttributes();
        $groupesAttributes  = $this->doorGets->loadGroupesAttributes();
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_groupes');
            
            if (!empty($isContent)) {
                
                $arrayFilter[] = array('key'=>'network','type'=>'=','value'=>$isContent['id']);
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_users_groupes_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }

                    

                    $AttributesActifs   = array();
                    foreach ($groupesAttributes[$id] as $key => $value) {
                        if (array_key_exists($value, $Attributes)) {

                            $AttributesActifs[$value] = $Attributes[$value];
                            unset($Attributes[$value]);
                        }
                    }
                    
                }
                
            }
            
        }
        
        $groupes = $this->doorGets->loadGroupes();
        $modules = $this->doorGets->loadModules(true);
        $widgets = $this->doorGets->loadWidgets();

        $cBlocks    = count($widgets['blok']);
        $cCarousel  = count($widgets['carousel']);
        $cGenforms  = count($widgets['genform']);
        $cSurvey  = count($widgets['survey']);
        
        $cWidgets   = $cBlocks + $cCarousel + $cGenforms + $cSurvey;

        $noLimitType = array('inbox','page','link',);

        $saas_constant['SAAS_TRADUCTION'] = false;
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

        $activeSaasOptions = array(
            'saas_add' => false,
            'saas_delete' => false,
            'saas_limit' => 0,
            'saas_constant' => $saas_constant
        );

        $cUsers = $this->doorGets->getCountTable('_users_info',$arrayFilter);
        $cModules = count($modules);
        if (!empty($isContent)) {
            
            $activeWidgets              = $this->doorGets->_toArray($isContent['liste_widget']);

            $activeModules              = $this->doorGets->_toArray($isContent['liste_module']);
            $activeModulesLimit         = $this->doorGets->_toArrayKeys($isContent['liste_module_limit']);
            
            $activeModulesList          = $this->doorGets->_toArray($isContent['liste_module_list']);
            $activeModulesShow          = $this->doorGets->_toArray($isContent['liste_module_show']);
            $activeModulesAdd           = $this->doorGets->_toArray($isContent['liste_module_add']);
            $activeModulesEdit          = $this->doorGets->_toArray($isContent['liste_module_edit']);
            $activeModulesDelete        = $this->doorGets->_toArray($isContent['liste_module_delete']);
            $activeModulesModo          = $this->doorGets->_toArray($isContent['liste_module_modo']);
            $activeModulesAdmin         = $this->doorGets->_toArray($isContent['liste_module_admin']);
            
            $activeModulesInterne       = $this->doorGets->_toArray($isContent['liste_module_interne']);
            $activeModulesInterneModo   = $this->doorGets->_toArray($isContent['liste_module_interne_modo']);
            
            $activeGroupesEnfants       = $this->doorGets->_toArray($isContent['liste_enfant']);
            $activeGroupesEnfantsModo   = $this->doorGets->_toArray($isContent['liste_enfant_modo']);
            
            $activeGroupesParents       = $this->doorGets->_toArray($isContent['liste_parent']);
            
            $activeEditorCkeditor       = (bool) (int) $isContent['editor_ckeditor'];
            $activeEditorTinymce        = (bool) (int) $isContent['editor_tinymce'];

            $activeGroupePayment        = (bool) (int) $isContent['payment'];

            

            if(empty($isContent['saas_options'])) {
                $isContent['saas_options'] = $activeSaasOptions;
            } else {
                $isContent['saas_options'] = unserialize(base64_decode($isContent['saas_options']));
                // vdump($isContent['saas_options']);
                foreach ($saas_constant as $key => $value) {
                    if (!array_key_exists($key,$isContent['saas_options']['saas_constant'])) {
                        $isContent['saas_options']['saas_constant'][$key] = $value;
                    }
                }
            }

            $activeSaasOptions = $isContent['saas_options'];
            
            $iEnfant = count($activeGroupesEnfants);
            $iParent = count($activeGroupesParents);
            
        }
        
        include CONFIG.'modules.php';
        
        $modulesInterneModules['module']             = $this->doorGets->__("Gestion des modules");
        foreach ($liste as $key => $value) {
            $modulesInterneModules['module_'.$key]     = $this->doorGets->__("Modules").' '.$value;
        }

        $modulesInterneWidgets['widget']             = $this->doorGets->__("Gestion des widgets");
        foreach ($listeWidgets as $key => $value) {
            $modulesInterneWidgets['module_'.$key]     = $this->doorGets->__("Widgets").' '.$value;
        }


        $modulesInterneMedia['media']        = $this->doorGets->__("Gestion des fichiers");

        $modulesInterneProfile['showprofile']    = $this->doorGets->__("Afficher mon profil");
        $modulesInterneProfile['myinbox']        = $this->doorGets->__("Boîte de réception");
        //$modulesInterneProfile['address']        = $this->doorGets->__("Adresse");

        $modulesInterneApi['api']        = $this->doorGets->__("Api Access Token");
        $modulesInterneApi['saas']        = $this->doorGets->__("Cloud");
        $modulesInterneApi['support_client']        = $this->doorGets->__("Support");

        $modulesInterneShop['order']            = $this->doorGets->__("Commandes");
        $modulesInterneShop['promotion']        = $this->doorGets->__("Promotion");
        $modulesInterneShop['discountcode']     = $this->doorGets->__("Code de réduction");
        $modulesInterneShop['taxes']            = $this->doorGets->__("Gestion des taxes");

        $modulesInterneModeration['comment']        = $this->doorGets->__("Gestion des commentaires");
        $modulesInterneModeration['inbox']          = $this->doorGets->__("Gestion des messages");
        $modulesInterneModeration['moderation']     = $this->doorGets->__("Modérateur");
        $modulesInterneModeration['support']        = $this->doorGets->__("Support");
        
        $modulesInterneStats['stats_dash']         = $this->doorGets->__("Statistique du tableau de bord");
        $modulesInterneStats['stats_order']        = $this->doorGets->__("Statistique des commandes");
        $modulesInterneStats['stats_user']         = $this->doorGets->__("Statistique des utilisateurs");
        $modulesInterneStats['stats_cart']         = $this->doorGets->__("Statistique des paniers");
        $modulesInterneStats['stats_comment']      = $this->doorGets->__("Statistique des commentaires");
        $modulesInterneStats['stats_contrib']      = $this->doorGets->__("Statistique des contributions");
        $modulesInterneStats['stats_cloud']        = $this->doorGets->__("Statistique du cloud");
        $modulesInterneStats['stats_tickets']        = $this->doorGets->__("Statistique des tickets");


        $modulesInterneMenu['menu']         = $this->doorGets->__("Gestion du menu principal");

        $modulesInterneUsers['users']        = $this->doorGets->__("Gestion des utilisateurs");
        $modulesInterneUsers['groupes']      = $this->doorGets->__("Gestion des groupes");
        $modulesInterneUsers['attributes']   = $this->doorGets->__("Gestion des attributs");


        $modulesInterneTemplates['traduction']          = $this->doorGets->__("Traducteur");
        $modulesInterneTemplates['traduction_modo']     = $this->doorGets->__("Modérateur des traducteurs");
        $modulesInterneTemplates['themes']              = $this->doorGets->__("Gestion des thèmes");
        $modulesInterneTemplates['emailnotification']   = $this->doorGets->__("Gestion des notifications");

        $modulesInterneCampagnes['campagne_email']       = $this->doorGets->__("Gestion des inscriptions à la newsletter");
        
        $modulesInterneConfiguration['configuration'] = $this->doorGets->__('Configuration');
        $modulesInterneConfiguration['siteweb']       = $this->doorGets->__('Site Web');
        $modulesInterneConfiguration['langue']        = $this->doorGets->__('Langue').' / '.$this->doorGets->__('Heure');
        $modulesInterneConfiguration['logo']          = $this->doorGets->__('Logo').' & '.$this->doorGets->__('Icône');
        $modulesInterneConfiguration['modules']       = $this->doorGets->__('Modules internes');
        $modulesInterneConfiguration['adresse']       = $this->doorGets->__('Addresse').' & '.$this->doorGets->__('Contact');
        $modulesInterneConfiguration['network']       = $this->doorGets->__('Réseaux sociaux');
        $modulesInterneConfiguration['analytics']     = $this->doorGets->__('Google analytics');
        $modulesInterneConfiguration['sitemap']       = $this->doorGets->__('Plan du site');
        $modulesInterneConfiguration['backups']       = $this->doorGets->__('Sauvegardes');
        $modulesInterneConfiguration['updater']       = $this->doorGets->__('Mise à jour');
        $modulesInterneConfiguration['cache']         = $this->doorGets->__('Cache');
        $modulesInterneConfiguration['setup']         = $this->doorGets->__("Système d'installation");
        $modulesInterneConfiguration['oauth']         = 'OAuth2';
        $modulesInterneConfiguration['smtp']          = 'SMTP';
        $modulesInterneConfiguration['stripe']        = 'Stripe';
        $modulesInterneConfiguration['paypal']        = 'Paypal';
        $modulesInterneConfiguration['transfer']      = $this->doorGets->__('Virement bancaire');
        $modulesInterneConfiguration['saas_config']   = $this->doorGets->__('Cloud');
        $modulesInterneConfiguration['check']         = $this->doorGets->__('Chèque');
        $modulesInterneConfiguration['cash']          = $this->doorGets->__('Paiement en liquide');
        $modulesInterneConfiguration['params']        = $this->doorGets->__('Paramètres');
        
        $subModule = $this->doorGets->getArrayForms('sub_module');
        
        $fileman = array(
            'none' => $this->doorGets->__('Aucun'),
            'admin' => $this->doorGets->__('Administrateur'),
            'modo' => $this->doorGets->__('Modérateur'),
            'contrib' => $this->doorGets->__('Contributeur'),
        );

        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    $nbStringCount = '';
                    $per = 500;
                    $ini = 0;
                    
                    $filters  = array();
                    $sqlFilters = '';
                    $cList = count($this->doorGets->user['liste_enfant_modo']);
                    if ($cList>1) {
                        $sqlFilters .= ' AND (';
                        $ii=0;
                        foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {
                            $ii++;
                            $filters[] = array('key'=>'id','type'=>'!=!','value'=> $idGroup);
                            $sqlFilters .=  "  g.id = $idGroup OR ";
                            
                        }
                    
                        $sqlFilters = substr($sqlFilters,0,-3);
                        $sqlFilters .= ')';
                    }

                    $countGroupes = $this->doorGets->getCountTable('_users_groupes',$filters,'',' OR ');
                    
                    $sqlLimit = " WHERE g.id = t.id_groupe AND t.langue = '".$lgActuel."' $sqlFilters ORDER BY g.date_creation  LIMIT ".$ini.",".$per;
                    
                    $all = $this->doorGets->dbQA('_users_groupes g, _users_groupes_traduction t',$sqlLimit);
                    $cAll = count($all);
                    
                    if ($cAll > 1) { $nbStringCount = $countGroupes.' '.$this->doorGets->__('Groupes'); }
                    
                    $block = new BlockTable();
                    $block->setClassCss('doorgets-listing');
                    
                    if ($cAll != 0) {
                        
                        $block->addTitle($nbStringCount,'title','first-title td-title left');
                        $block->addTitle($this->doorGets->__('Utilisateurs'),'users','td-title');
                        $block->addTitle('','edit','td-title');
                        $block->addTitle('','delete','td-title');
                        
                        for($i=0;$i<$cAll;$i++) {
                            
                            $filter = array(
                                array('key'=>'network','type'=>'=','value'=> $all[$i]['id_groupe']),
                            );

                            $countUsers = $this->doorGets->getCountTable('_users_info',$filter);

                            $urlVoirTitle = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=groupes&action=edit&id='.$all[$i]['id_groupe'].'&lg='.$this->doorGets->getLangueTradution().'"><b class="glyphicon glyphicon-cloud"></b> '.$all[$i]['title'].'</a>';
                            $urlUsers = $countUsers;
                            $urlDelete = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=groupes&action=delete&id='.$all[$i]['id_groupe'].'&lg='.$this->doorGets->getLangueTradution().'"><b class="glyphicon glyphicon-remove red"></b> </a>';
                            $urlEdit = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=groupes&action=edit&id='.$all[$i]['id_groupe'].'&lg='.$this->doorGets->getLangueTradution().'"><b class="glyphicon glyphicon-pencil green-font"></b> </a>';
                            
                            $dateCreation = GetDate::in($all[$i]['date_creation'],1,$this->doorGets->myLanguage());
                            
                            $block->addContent('title',$urlVoirTitle );
                            $block->addContent('users',$urlUsers,'text-center tb-30' );
                            $block->addContent('edit',$urlEdit,'text-center tb-30');
                            $block->addContent('delete',$urlDelete,'text-center tb-30');
                        }
                    
                    }
                    
                    break;
            }
            
            $ActionFile = 'user/groupes/user_groupes_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        

        return $out;
        
    }

    
    
}
