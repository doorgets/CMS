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


class PageView extends doorGetsApiView{
    
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

        if (!empty($User)) {

            (in_array($moduleInfos['id'], $this->doorGets->user['liste_module_modo'])) ? $is_modo = true : $is_modo = false;
            (
                in_array('module', $this->doorGets->user['liste_module_interne'])  
                && in_array('module_'.$moduleInfos['type'],  $this->doorGets->user['liste_module_interne'])

            ) ? $is_modules_modo = true : $is_modules_modo = false;
        }
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
                        
                        $this->isContent = $isContent = array_merge($isContent,$isContentTraduction);
                        
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
                    $isContent['article'] = html_entity_decode($isContent['article_tinymce']);

                    unset($isContent['groupe_traduction']);
                    unset($isContent['article_tinymce']);
                    unset($isContent['id_user']);
                    unset($isContent['id_groupe']);
                    unset($isContent['id_content']);

                    $response['code']       = 200;
                    $response['data']       = $isContent;
                    $response['next']       = $idNextContent;
                    $response['previous']   = $idPreviousContent;

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
