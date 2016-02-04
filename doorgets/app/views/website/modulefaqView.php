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


class moduleFaqView extends doorgetsWebsiteView{
    
    public function __construct(&$doorGetsWebsite) {
        
        parent::__construct($doorGetsWebsite);
    }
    
    public function getContent() {
        
        $out = '';
        $Website = $this->Website;
        $Module = $Website->getModule();
        $moduleInfo = $Website->activeModules;

        $labelModule = $moduleInfo[$Module]['all']['nom'];
        
        $User = $Website->_User;

        $tplPassword = $this->checkModulePassword(
            $moduleInfo[$Module]['all']['with_password'],
            $moduleInfo[$Module]['all']['password'],
            $Module
        );
        
        if (!empty($tplPassword)) {
            return $tplPassword;
        }
        
        $templateDefault = 'modules/faq/faq_listing';
        if (array_key_exists($Module,$moduleInfo)) {
            
            
            if (!empty($moduleInfo[$Module]['all']['template_index'])) {
                $templateDefault = $moduleInfo[$Module]['all']['template_index'];
                $templateDefault = str_replace('.tpl.php','',$templateDefault);
            }
            
        }
        $nameTable = '_m_'.$Website->getRealUri($Website->getModule());
        $nameTableTrad = $nameTable."_traduction";
        
        $isContents  = array();
        
        $sql = "SELECT * FROM $nameTable, $nameTableTrad
        WHERE $nameTable.id = $nameTableTrad.id_content  AND $nameTableTrad.langue = '".$Website->myLanguage()."'
        ORDER BY $nameTable.ordre DESC ";

        $isContents = $Website->dbQ($sql);
        
        $labelModuleGroup = $Website->activeModules;
        $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];
        
        foreach($isContents as $k=>$content) {
            
            $isContentActiveVersion    = $Website->dbQS($content['id_content'],$nameTable.'_version','id_content'," AND active = 2 AND langue = '".$Website->myLanguage."' LIMIT 1");
            
            if ($content['active'] != '2' && !empty($isContentActiveVersion)) {

                $isContents[$k]['question']     = $isContentActiveVersion['question'];
                $isContents[$k]['reponse_tinymce']      = $isContentActiveVersion['reponse_tinymce'];       

            } elseif ($content['active'] != '2') {
                
                unset($isContents[$k]);
                continue;
            }

            $isContents[$k]['reponse'] = html_entity_decode($isContents[$k]['reponse_tinymce']);
            unset($isContents[$k]['reponse_tinymce']);
            
            $isContents[$k]['modo']  =  ( $Website->isUser && 
                (
                    in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                    && in_array($content['id_groupe'],$Website->_User['liste_enfant']) 
                    && in_array($content['id_groupe'],$Website->_User['liste_enfant_modo']) 
                ) 
            ) ? true : false ;

            $isContents[$k]['edit']  =  ( $Website->isUser && 
                ( 
                    (   
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && $content['id_user'] === $Website->_User['id'] && $this->userPrivilege['edit']
                    ) || (
                        $isContents[$k]['modo']
                    ) 
                ) 
            ) ? true : false ;

            $isContents[$k]['delete']  =  ( $Website->isUser && 
                ( 
                    (   
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && $content['id_user'] === $Website->_User['id'] && $this->userPrivilege['delete']
                    ) || (
                        $isContents[$k]['modo']
                    ) 
                ) 
            ) ? true : false ;

        }


        $i=$ii=1;
        $_imgTop = URL.'/themes/'.$Website->getTheme().'/img/top.png';

        $allModules         = $labelModuleGroup = $Website->activeModules;  

        $urlAfterAction     = urlencode($Website->getCurrentUrl());
        $urlAdd             = URL_USER.$Website->_lgUrl.'?controller=modulefaq&uri='.$Website->getModule().'&action=add';


        $tplModuleMultipageListing = Template::getWebsiteView($templateDefault,$Website->getTheme());
        ob_start(); if (is_file($tplModuleMultipageListing)) { include $tplModuleMultipageListing; }  $out .= ob_get_clean();
        
        return $out;
        
    }
}