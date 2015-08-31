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
        $cGenforms  = count($widgets['genform']);
        
        $cWidgets   = $cBlocks + $cGenforms;

        $noLimitType = array('inbox','page','link', );

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

            $iEnfant = count($activeGroupesEnfants);
            $iParent = count($activeGroupesParents);
            
        }
        
        $liste['page']              = $this->doorGets->__('Page Statique');
        $liste['multipage']         = $this->doorGets->__('Multi-Pages Statiques');
        $liste['blog']              = $this->doorGets->__("Blog");
        $liste['news']              = $this->doorGets->__("Fil d'actualités");
        $liste['video']             = $this->doorGets->__('Galerie vidéos');
        $liste['image']             = $this->doorGets->__("Galerie d'images");
        $liste['faq']               = $this->doorGets->__('FAQ');
        $liste['partner']           = $this->doorGets->__('Partenaires');
        $liste['inbox']             = $this->doorGets->__('Formulaire de contact');
        $liste['sharedlinks']       = $this->doorGets->__('Partage de liens');
        $liste['link']              = $this->doorGets->__('Lien de redirection');

        $listeWidgets['block']      = $this->doorGets->__('Bloc Statique');
        $listeWidgets['genform']    = $this->doorGets->__('Formulaire');
        

        $modulesInterneModules['module']             = $this->doorGets->__("Gestion des modules");
        foreach ($liste as $key => $value) {
            $modulesInterneModules['module_'.$key]     = $this->doorGets->__("Modules").' '.$value;
        }

        $modulesInterneWidgets['widget']             = $this->doorGets->__("Gestion des widgets");
        foreach ($listeWidgets as $key => $value) {
            $modulesInterneWidgets['module_'.$key]     = $this->doorGets->__("Widgets").' '.$value;
        }


        $modulesInterneMedia['media']        = $this->doorGets->__("Gestion des fichiers");

        $modulesInterneInbox['myinbox']        = $this->doorGets->__("Boîte de réception");

        $modulesInterneApi['api']        = $this->doorGets->__("Api Access Token");

        $modulesInterneModeration['comment']    = $this->doorGets->__("Gestion des commentaires");
        $modulesInterneModeration['inbox']        = $this->doorGets->__("Gestion des messages");
        $modulesInterneModeration['moderation']        = $this->doorGets->__("Modérateur");

        $modulesInterneMenu['menu']         = $this->doorGets->__("Gestion du menu principal");

        $modulesInterneUsers['users']        = $this->doorGets->__("Gestion des utilisateurs");
        $modulesInterneUsers['groupes']      = $this->doorGets->__("Gestion des groupes");
        $modulesInterneUsers['attributes']      = $this->doorGets->__("Gestion des attributs");


        $modulesInterneTemplates['traduction']    = $this->doorGets->__("Traducteur");
        $modulesInterneTemplates['traduction_modo']    = $this->doorGets->__("Modérateur des traducteurs");
        $modulesInterneTemplates['themes']        = $this->doorGets->__("Gestion des thèmes");
        $modulesInterneTemplates['emailnotification']        = $this->doorGets->__("Gestion des notifications");

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
        $modulesInterneConfiguration['setup']         = $this->doorGets->__('Installer');
        $modulesInterneConfiguration['oauth']         = 'OAuth2';
        $modulesInterneConfiguration['smtp']          = 'SMTP';
        $modulesInterneConfiguration['stripe']        = 'stripe';
        $modulesInterneConfiguration['params']        = $this->doorGets->__('Paramètres');
        
        $subModule = $this->doorGets->getArrayForms('sub_module');
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    $nbStringCount = '';
                    $per = 500;
                    $ini = 0;
                    
                    $filters  = array();
                    $sqlFilters = ' AND (';

                    foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {

                        $filters[] = array('key'=>'id','type'=>'!=!','value'=> $idGroup);
                        $sqlFilters .=  "  g.id = $idGroup OR ";
                        
                    }
                    $sqlFilters = substr($sqlFilters,0,-3);
                    $sqlFilters .= ')';
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
