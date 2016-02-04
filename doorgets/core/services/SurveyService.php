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

class SurveyService {

    public $doorGets;
    public $table;

    public function __construct(&$doorGets) {
        $this->doorGets = $doorGets;
        $this->table = '_dg_survey_response';
    }

    public function add($uri_module = '', $value='') { 

        $out = array();
        $out['data'] = array();
        $out['errors'] = array();

        $userId = 0;
        $userGroup = 0;
        $pseudo = '';
        $sessionId = session_id();
        $ip = $_SERVER["REMOTE_ADDR"];

        $user = $this->doorGets->user;
        if (!empty($user)) {
            $pseudo = $user['pseudo'];
            $userId = $user['id'];
            $userGroup = $user['groupe'];            
        }
        $firewall = $this->firewall($uri_module,$userId);
        if (empty($firewall)) {
            if (!empty($uri_module) && !empty($value)) {
                $data = array(
                    'ip' => $ip,
                    'id_session' => $sessionId,
                    'pseudo' => $pseudo,
                    'id_user' => $userId,
                    'id_groupe' => $userGroup,
                    'uri_module' => $uri_module,
                    'value' => $value,
                    'langue' => $this->doorGets->myLanguage,
                    'date_creation' => time()
                );  
                $out['data'] = $this->doorGets->dbQI($data,$this->table);   

            }      
        } else {
            $out['errors'] = 'voted';
        }

        return $out;
    }

    public function firewall($uri_module,$id_user) {

        $sessionId = session_id();
        $langue = $this->doorGets->myLanguage;

        if (empty($id_user)) {
            $isAlreadyResponded = $this->doorGets->dbQS($sessionId,'_dg_survey_response','id_session'," AND uri_module = '$uri_module' AND langue = '$langue' LIMIT 1");
            $out = (empty($isAlreadyResponded))? false: $isAlreadyResponded;    
        } else {
            $isAlreadyResponded = $this->doorGets->dbQS($id_user,'_dg_survey_response','id_user'," AND uri_module = '$uri_module' AND langue = '$langue' LIMIT 1");
            $out = (empty($isAlreadyResponded))? false: $isAlreadyResponded;        
        }

        return $out;
    }

    public function getStats($uri_module) {
        
        $res = array();
        $table = $this->table;
        $langue = $this->doorGets->myLanguage;
        $sum = 0;
        foreach (Constant::$surveyResponse as $field) {
            $query = "
                SELECT COUNT(*) as counter 
                FROM $table
                WHERE 
                    uri_module = '$uri_module'
                    AND value = '$field';
                    AND langue = $langue
            ";
            $result = $this->doorGets->dbQ($query);
            $sum += $res[$field]['count'] = (int)$result[0]['counter'];
        }
        
        $out = array();
        foreach ($res as $key => $value) {
            $res[$key]['percent'] = (!$value['count'])?0: round((100/$sum) * $value['count']);
        }

        return $res;
    }
}