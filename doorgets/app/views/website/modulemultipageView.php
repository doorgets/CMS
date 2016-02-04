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


class moduleMultipageView extends doorgetsWebsiteView{
    
    public function __construct(&$doorGetsWebsite) {
        
        parent::__construct($doorGetsWebsite);
    }
    
    public function getContent() {
        
        $out = '';
        $Website = $this->Website;
        $Module = $Website->getModule();
        $moduleInfo = $Website->activeModules;

        $tplPassword = $this->checkModulePassword(
            $moduleInfo[$Module]['all']['with_password'],
            $moduleInfo[$Module]['all']['password'],
            $Module
        );
        
        if (!empty($tplPassword)) {
            return $tplPassword;
        }
        
        $templateDefault = 'modules/multipage/multipage_listing';
        if (array_key_exists($Module,$moduleInfo)) {
            
            
            if (!empty($moduleInfo[$Module]['all']['template_index'])) {
                $templateDefault = $moduleInfo[$Module]['all']['template_index'];
                $templateDefault = str_replace('.tpl.php','',$templateDefault);
            }
            
        }
        $nameTable = '_m_'.$Website->getRealUri($Module);
        $uri = $Website->getUri();
        $isContent  = array();

        $urlAfterAction     = urlencode(BASE_URL.'?'.$Website->getModule().'='.$uri);
        
        if (empty($uri)) {
            
            $isContentFirst = $Website->dbQS(Constant::$websiteId,$nameTable,'ordre');
            if (!empty($isContentFirst)) {
                
                $groupeTraduction = @unserialize($isContentFirst['groupe_traduction']);
                $idGroupeTraduction = $groupeTraduction[$Website->myLanguage];
                
                $isContent = $Website->dbQS($idGroupeTraduction,$nameTable.'_traduction');
                
            }
            
        }else{
            
            $isContent = $Website->dbQS($uri,$nameTable.'_traduction','uri');
        }
        
        if (!empty($isContent)) {
            
            $isContentActive = $Website->dbQS($isContent['id_content'],$nameTable);
            
            $isContentActiveVersion    = $Website->dbQS($isContent['id_content'],$nameTable.'_version','id_content'," AND active = 2 AND langue = '".$Website->myLanguage."' LIMIT 1");
            
            if ($isContentActive['active'] != '2' && !empty($isContentActiveVersion)) {

                $isContent['article_tinymce']     = $isContentActiveVersion['article_tinymce'];
                $isContent['titre']       = $isContentActiveVersion['titre'];        

            }

            $isContent['article'] = html_entity_decode($isContent['article_tinymce']);
            $isContent['article'] = $Website->_convertMethod($isContent['article']);

            unset($isContent['article_tinymce']);
            unset($isContent['id']);
            unset($isContent['meta_titre']);
            unset($isContent['meta_description']);
            unset($isContent['meta_keys']);
            unset($isContent['langue']);
            
            $isContent['id_user']       = $isContentActive['id_user'];
            $isContent['id_groupe']     = $isContentActive['id_groupe'];
            $isContent['comments']      = $isContentActive['comments'];
            $isContent['sharethis']     = $isContentActive['partage'];
            $isContent['facebook']      = $isContentActive['facebook'];
            $isContent['disqus']        = $isContentActive['disqus'];
            $isContent['date_creation'] = GetDate::in($isContentActive['date_creation'],1,$Website->myLanguage);
            
        
            $labelModuleGroup = $Website->activeModules;
            $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];
            $this->userPrivilege['modo']  =  ( $Website->isUser && 
                (
                    in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                    && in_array($isContent['id_groupe'],$Website->_User['liste_enfant']) 
                    && in_array($isContent['id_groupe'],$Website->_User['liste_enfant_modo']) 
                ) 
            ) ? true : false ;

            $this->userPrivilege['edit']  =  ( $Website->isUser && 
                ( 
                    (   
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && $isContent['id_user'] === $Website->_User['id'] && $this->userPrivilege['edit']
                    ) || (
                        $this->userPrivilege['modo']
                    ) 
                ) 
            ) ? true : false ;

            $this->userPrivilege['delete']  =  ( $Website->isUser && 
                ( 
                    (   
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && $isContent['id_user'] === $Website->_User['id'] && $this->userPrivilege['delete']
                    ) || (
                        $this->userPrivilege['modo']
                    ) 
                ) 
            ) ? true : false ;
            

            $urlAdd             = URL_USER.$Website->_lgUrl.'?controller=modulemultipage&uri='.$Website->getModule().'&action=add&back='.urlencode(BASE_URL.'?'.$Website->getModule());
 
            
            $allModules  = $Website->activeModules;  
            
            $nexContent = $Website->getUrlNextContent();
            $prevContent = $Website->getUrlPreviousContent();

            
            $urlEdition         = URL_USER.$Website->_lgUrl.'?controller=modulemultipage&uri='.$Website->getModule().'&action=edit&id='.$isContent['id_content'].'&lg='.$Website->getLangueTradution().'&back='.$urlAfterAction;
            $urlDelete          = URL_USER.$Website->_lgUrl.'?controller=modulemultipage&uri='.$Website->getModule().'&action=delete&id='.$isContent['id_content'].'&lg='.$Website->getLangueTradution().'&back='.$urlAfterAction;
            $urlAdd             = URL_USER.$Website->_lgUrl.'?controller=modulemultipage&uri='.$Website->getModule().'&action=add';
            
            $labelModuleGroup = $Website->activeModules;
            $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];

        }

        $urlAdd             = URL_USER.$Website->_lgUrl.'?controller=modulemultipage&uri='.$Website->getModule().'&action=add';
            
        extract($isContent);
        
        $tplModuleMultipageListing = Template::getWebsiteView($templateDefault,$Website->getTheme());
        ob_start(); if (is_file($tplModuleMultipageListing)) { include $tplModuleMultipageListing; }   $out .= ob_get_clean();
        
        return $out;
        
    }
}