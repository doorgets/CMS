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


class ModuleLinkView extends doorGetsUserModuleOrderView {
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);

        // Check if is content modo
        $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;

        // Check if is module modo
        (
            in_array('module', $User['liste_module_interne'])  
            && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

        // check if user can edit content
        $user_can_add = (in_array($moduleInfos['id'], $User['liste_module_add']))?true:false;
        
        // check if user can edit content
        $user_can_edit = (in_array($moduleInfos['id'], $User['liste_module_edit']))?true:false;

        // check if user can delete content
        $user_can_delete = (in_array($moduleInfos['id'], $User['liste_module_delete']))?true:false;
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index'),
            
        );
        
        // get Content for edit 
        $params = $this->doorGets->Params();
        if (array_key_exists('uri',$params['GET'])) {
            
            $uri = $params['GET']['uri'];
            $isContent = $this->doorGets->dbQS($uri,$this->doorGets->Table,'uri_module',"AND langue = '".$lgActuel."' LIMIT 1 ");
             
        }
        
        $ActionFile = 'modules/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
        
        $tpl = Template::getView($ActionFile);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
        
    }
    
}