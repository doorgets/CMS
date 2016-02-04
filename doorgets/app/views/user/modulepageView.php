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


class ModulePageView extends doorGetsUserModuleOrderView {
    
    public function __construct(&$doorGets) {
        parent::__construct($doorGets);
    }
    
    public function getContent() {
        
        $out = '';
        
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        $listeCategories    = $this->doorGets->categorieSimple;
        $isVersionActive    = false;
        $version_id         = 0;

        unset($listeCategories[0]);
        
        $aActivation = $this->doorGets->getArrayForms('activation');
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index'),
            
        );

        (in_array($moduleInfos['id'], $this->doorGets->user['liste_module_modo'])) ? $is_modo = true : $is_modo = false;
        (
            in_array('module', $this->doorGets->user['liste_module_interne'])  
            && in_array('module_'.$moduleInfos['type'],  $this->doorGets->user['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;
        
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
                        
                        $article = $isContentTraduction['article'] = $this->doorGets->_cleanPHP($isContentTraduction['article_tinymce']);
                        $this->isContent = $isContent = array_merge($isContent,$isContentTraduction);
                    }
                }
                
            }
            
        }

        if (array_key_exists('version',$params['GET'])) {

            $version_id = $params['GET']['version'];
            $isContentVesion = $this->getVersionById($version_id,$isContent);
            if (!empty($isContentVesion)) {
                $article = $isContent['article'] = $this->doorGets->_cleanPHP($isContentVesion['article_tinymce']);
                $isContent = array_merge($isContent,$isContentVesion);
                $isVersionActive    = true;
            }
            
        }
            
        $user_can_edit = true;
        $htmlCanotEdit = '';

        $isActiveContent =  $isActiveComments =  $isActiveEmail = '';
        $isActivePartage =  $isActiveFacebook =   $isActiveDisqus =  $isActiveRss = '';
            
        if (!empty($isContent['active'])) { $isActiveContent = 'checked'; }
        if (!empty($isContent['comments'])) { $isActiveComments = 'checked'; }
        if (!empty($isContent['partage'])) { $isActivePartage = 'checked'; }
        if (!empty($isContent['mailsender'])) { $isActiveEmail = 'checked'; }
        if (!empty($isContent['facebook'])) { $isActiveFacebook = 'checked'; }
        if (!empty($isContent['in_rss'])) { $isActiveRss = 'checked'; }
        if (!empty($isContent['disqus'])) { $isActiveDisqus = 'checked'; }
        
        
        $formEditTop = $formEditBottom = '';
        $fileFormEditTop = 'modules/user_form_edit_top';
        $tplFormEditTop = Template::getView($fileFormEditTop);
        ob_start(); if (is_file($tplFormEditTop)) { include $tplFormEditTop; } $formEditTop = ob_get_clean();
        
        $fileFormEditBottom = 'modules/user_form_edit_bottom';
        $tplFormEditBottom = Template::getView($fileFormEditBottom);
        ob_start(); if (is_file($tplFormEditBottom)) { include $tplFormEditBottom;} $formEditBottom = ob_get_clean();
        
        $ActionFile = 'modules/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
         
        $urlLangueTraduction = '';
        $cLanguageWebsite = count($this->doorGets->allLanguagesWebsite);
        if ($cLanguageWebsite > 1) { $urlLangueTraduction = 't/'.$lgActuel.'/'; }

        $cVersion = $this->getCountVersion();
        $versions = $this->getAllVersion();

        $url = "?controller=module".$moduleInfos['type']."&uri=".$moduleInfos['uri']."&lg=".$lgActuel;


        $tpl = Template::getView($ActionFile);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
        
    }
    
}