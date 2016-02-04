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


class moduleOnepageView extends doorgetsWebsiteView{
    
    public function __construct(&$doorGetsWebsite) {
        parent::__construct($doorGetsWebsite);
    }
    
    
    public function getContent() {
        
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

        $templateDefault = 'modules/onepage/onepage_content';
        if (array_key_exists($Module,$moduleInfo)) {
            
            if (!empty($moduleInfo[$Module]['all']['template_index'])) {
                $templateDefault = $moduleInfo[$Module]['all']['template_index'];
                $templateDefault = str_replace('.tpl.php','',$templateDefault);
            }
            
        }
        

        $nameTable = '_dg_onepage';
        
        $content = $Website->getContent();
        
        $isContentActiveVersion    = $Website->dbQS($content['id_content'],$nameTable.'_version','id_content'," AND active = 2 AND langue = '".$Website->myLanguage."' LIMIT 1");
        
        if ($content['active'] != '2' && !empty($isContentActiveVersion)) {

            $content['article']     = html_entity_decode($isContentActiveVersion['article_tinymce']);
            $content['article']     = $Website->_convertMethod($content['article']);  

            $content['title']       = $isContentActiveVersion['titre'];        

        }else {

            $content['article']     = html_entity_decode($content['article_tinymce']);
            $content['article']     = $Website->_convertMethod($content['article']);  

            $content['title']       = $content['titre'];
        }

        $content['sharethis']   = $content['partage'];
        $content['backimage_fixe'] = ($content['backimage_fixe'] == 'no') ? false : true;
        
        unset($content['partage']);
        unset($content['titre']);
        unset($content['article_tinymce']);
        unset($content['id']);
        unset($content['id_content']);
        unset($content['langue']);
        unset($content['uri']);
        unset($content['meta_titre']);
        unset($content['meta_description']);
        unset($content['meta_keys']);
        unset($content['groupe_traduction']);
        
        $content['date_creation'] = GetDate::in($content['date_creation'],1,$Website->myLanguage);
        
        $labelModuleGroup = $Website->activeModules;
        $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];

        $allModules  = $Website->activeModules;    
    
        $urlAfterAction     = urlencode($Website->getCurrentUrl());
        $urlEdition         = URL_USER.$Website->_lgUrl.'?controller=moduleonepage&uri='.$Website->getModule().'&lg='.$Website->getLangueTradution().'&back='.$urlAfterAction;
        
        extract($content);

        $article = unserialize(base64_decode($article));

        if (!empty($article)) {
            if ($article) {
                $iarticle = array_reverse($article);
            }
            
            
            $cArticles = 0;
            
            foreach ($article as $k => $page) {
                $article[$k]['page'] = $Website->_convertMethod($page['page']);
            }
        }
        

        $tplModulePage = Template::getWebsiteView($templateDefault,$Website->getTheme());
        ob_start(); if (is_file($tplModulePage)) { include $tplModulePage; }  $out = ob_get_clean();
        
        return $out;
        
    }
}