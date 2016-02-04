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


class doorGetsApiRequest {
    
    public $doorGets = null; 
    
    public function __construct(&$doorGets) {
        
        $this->doorGets = $doorGets;
        $this->Action   = $doorGets->Action();

        $this->doAction();
        
        $doorGets->setModel($this);
        
        $this->doorGets     = $doorGets;
    }
    
    public function doAction() {
        
        $out = '';
        
        switch($this->Action) {
            
            case 'index':
                // to do
                break;
        }
        
        return $out;
        
    }
    
    public function getFormDataFromParams($type = 'POST'){

        $params = $this->doorGets->Params();
        switch ($type) {
            case 'PUT':
                $formParams = $params['PUT'];
                $provider = $this->getPutProvider();
                break;
            
            default:
                $formParams = $params['POST'];
                $provider = $this->getPostProvider();
                break;
        }
        

        $out['success'] = array();
        foreach ($formParams as $key => $value) {
            
            if (array_key_exists($key,$provider)) {
                $out['success'][$key] = $value;
            }
        }
        
        $out['error'] = array();
        foreach ($provider as $key => $value) {
            
            if ($value['required'] && !array_key_exists($key,$out['success'])) {
                $out['error'][$key] = 'Not found';
            }

            if ($value['required'] && empty($out['success'][$key]) && !array_key_exists($key, $out['error'])) {
                $out['error'][$key] = 'Empty';
            }

            if ($value['required'] && !array_key_exists($key,$out['error'])) {
                
                $finalValue = $out['success'][$key];

                switch ($value['type']) {
                    case 'int':
                        if (!is_int($finalValue)) {
                            $out['success'][$key] = (int) $finalValue;
                        }
                        break;
                    case 'email':
                        if (!filter_var($finalValue, FILTER_VALIDATE_EMAIL)) {
                            $out['error'][$key] = 'Type: email';;
                        }
                        break;
                    case 'varchar':
                        if (!is_string($finalValue) && strlen($finalValue) > 255) {
                            $out['error'][$key] = 'Type: varchar max 255';
                        }
                        break;
                    case 'text':
                        if (!is_string($finalValue)) {
                            $out['error'][$key] = 'Type: text';
                        }
                        break;
                }
            }
        }

        return $out;
    }

    public function saveLastContentVersion($id_content,$next_content = array(),$name_field="id_content") {

        $lgActuel       = $this->doorGets->getLangueTradution();
        $User           = $this->doorGets->user;

        // Save last Version
        $isLastVersionTemp = $isLastVersion = $this->doorGets->dbQS($id_content,$this->doorGets->Table.'_traduction',"id_content"," AND langue='$lgActuel' LIMIT 1 ");
        if (!empty($isLastVersion)) {

            unset($isLastVersion['id']);
            unset($isLastVersionTemp['id']);
            if (array_key_exists('date_modification', $isLastVersionTemp)) {
                unset($isLastVersionTemp['date_modification']);
            }
            if (array_key_exists('active', $next_content)) {
                $isLastVersionTemp['active']    = $next_content['active'];
            }
            

            $next_content['pseudo']         = $isLastVersion['pseudo']          = $isLastVersionTemp['pseudo']          = $User['pseudo'];
            $next_content['id_user']        = $isLastVersion['id_user']         = $isLastVersionTemp['id_user']         = $User['id'];
            $next_content['id_groupe']      = $isLastVersion['id_groupe']       = $isLastVersionTemp['id_groupe']       = $User['groupe'];
            $next_content['date_creation']  = $isLastVersion['date_creation']   = $isLastVersionTemp['date_creation']   = time();

            if (count($next_content) > 4) {

                foreach ($isLastVersion as $key => $value) {
                    if (!array_key_exists($key, $next_content)) {
                        unset($isLastVersion[$key]);
                    }
                }

                ksort($isLastVersion);
                ksort($next_content);
                
                $checkIfDataEqualLastVersion = strcmp(serialize($isLastVersion), serialize($next_content));

                if ($checkIfDataEqualLastVersion !== 0) {

                    $this->doorGets->dbQI($isLastVersionTemp,$this->doorGets->Table.'_version');

                }

            }

        }

    }
    
}
