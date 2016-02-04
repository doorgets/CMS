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


class modulePartnerView extends doorgetsWebsiteView{
    
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
        
        $templateDefault = 'modules/partner/partner_listing';
        if (array_key_exists($Module,$moduleInfo)) {
            
            
            if (!empty($moduleInfo[$Module]['all']['template_index'])) {
                $templateDefault = $moduleInfo[$Module]['all']['template_index'];
                $templateDefault = str_replace('.tpl.php','',$templateDefault);
            }
            
        }
        
        $nameTable          = '_m_'.$Website->getRealUri($Website->getModule());
        $nameTableTrad      = $nameTable."_traduction";
        $nameTableVersion   = $nameTable.'_version';

        $isContents  = array();
        
        $sql = "SELECT * FROM $nameTable, $nameTableTrad
        WHERE $nameTable.id = $nameTableTrad.id_content AND $nameTableTrad.langue = '".$Website->myLanguage()."'
        ORDER BY $nameTable.ordre DESC ";
        
        $isFinaleContents = $Website->dbQ($sql);
        $isContents = array();
        $labelModuleGroup = $Website->activeModules;
        $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];

        if (!empty($isFinaleContents)) {
            foreach ($isFinaleContents as $partner) {
                
                $isContentVersion = $Website->dbQS(
                    $partner['id_content'],
                    $nameTableVersion,
                    'id_content',
                    " AND active = '2' AND langue = '".$Website->myLanguage()."' LIMIT 1"
                );

                $partner['modo']  =  ( $Website->isUser && 
                    (
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && in_array($partner['id_groupe'],$Website->_User['liste_enfant']) 
                        && in_array($partner['id_groupe'],$Website->_User['liste_enfant_modo']) 
                    ) 
                ) ? true : false ;

                $partner['edit']  =  ( $Website->isUser && 
                    ( 
                        (   
                            in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                            && $partner['id_user'] === $Website->_User['id'] && $this->userPrivilege['edit']
                        ) || (
                            $partner['modo']
                        ) 
                    ) 
                ) ? true : false ;

                $partner['delete']  =  ( $Website->isUser && 
                    ( 
                        (   
                            in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                            && $partner['id_user'] === $Website->_User['id'] && $this->userPrivilege['delete']
                        ) || (
                            $partner['modo']
                        ) 
                    ) 
                ) ? true : false ;
                
                if ($partner['active'] == '2') {
                    
                    $isContents[] = $partner;

                } elseif ($partner['active'] != '2' && !empty($isContentVersion)) {
                    
                    $partner['image']         = $isContentVersion['image'];
                    $partner['titre']         = $isContentVersion['titre'];
                    $partner['url']           = $isContentVersion['url'];
                    $partner['description']   = $isContentVersion['description'];

                    $isContents[] = $partner;
                }
            }
        }

        $i = 1;
        $iC = count($isContents);

        $allModules  = $Website->activeModules;
          
        $urlAfterAction     = urlencode($Website->getCurrentUrl());
        $urlAdd             = URL_USER.$Website->_lgUrl.'?controller=modulepartner&uri='.$Website->getModule().'&action=add';

        $labelModuleGroup = $Website->activeModules;
        $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];

        $realModuleUri = $Website->getRealUri($Website->getModule());

        $tplModuleMultipageListing = Template::getWebsiteView($templateDefault,$Website->getTheme());
        ob_start(); if (is_file($tplModuleMultipageListing)) { include $tplModuleMultipageListing; }  $out .= ob_get_clean();
        
        return $out;
        
    }
}