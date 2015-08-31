<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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


class ModulesView extends doorGetsApiView{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        
        $isContent          = array();
        $idNextContent      = 0;
        $idPreviousContent  = 0;
        $id                 = 0;

        // Check if is content modo
        (in_array($moduleInfos['id'], $User['liste_module_modo'])) ? $is_modo = true : $is_modo = false;

        // Check if is module modo
        (
            in_array('module', $User['liste_module_interne'])  
            && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

        // check if user can edit content
        (in_array($moduleInfos['id'], $User['liste_module_edit'])) ? $user_can_edit = true : $user_can_edit = false;

        // check if user can delete content
        (in_array($moduleInfos['id'], $User['liste_module_delete'])) ? $user_can_delete = true : $user_can_delete = false;

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;

                        $idNextContent      = $this->doorGets->getIdContentPosition($isContent['id_content']);
                        $idPreviousContent  = $this->doorGets->getIdContentPosition($isContent['id_content'],'prev');
                    
                    } else {

                        $this->isContent = $isContent = array();
                    }
                }
            }
            
        }
        
        switch ($this->doorGets->requestMethod) {

            case 'GET':

                if (!empty($isContent)) {

                    $timeCreation = (int) $isContent['date_creation'];
                    $timeModification = (int) $isContent['date_modification'];

                    $isContent['id'] = $isContent['id_content'];
                    $isContent['date_creation'] = date(DATE_ATOM,$timeCreation);
                    $isContent['date_modification'] = date(DATE_ATOM,$timeModification);

                    unset($isContent['groupe_traduction']);
                    unset($isContent['id_user']);
                    unset($isContent['id_groupe']);
                    unset($isContent['id_content']);

                    $response['code']       = 200;
                    $response['data']       = $isContent;
                    $response['next']       = $idNextContent;
                    $response['previous']   = $idPreviousContent;

                }

                if (!empty($this->doorGets->Table) && empty($isContent) && $id === 0) {
                    
                    $withAllData = false;
                    $all = $this->doorGets->getAllActiveModules($withAllData);
                    $cResultsInt = count($all);

                    $response['code']       = 200;
                    $response['data']       = $all;
                    $response['total']      = $cResultsInt;

                }
                
                break;
            
        }
        
        if ($response['code'] === 200) {

            unset($response['code']);
            $this->doorGets->_successJson($response);

        } else {
            
            $this->doorGets->_errorJson($response);
        }
    }
}
