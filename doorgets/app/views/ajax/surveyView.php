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


class SurveyView extends doorGetsAjaxView{
    
    public function __construct(&$doorgets) {
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $arrayAction = array(
            
            'index'         => 'Home',
            'sendForm'      => 'Send form',
            
        );
        
        $out = '';
        
        $allModules = $this->doorGets->getAllActiveModules();
        $uri_module = $this->doorGets->Uri;
        $uri_module_real = $this->doorGets->getRealUri($uri_module);
        $this->doorGets->myLanguage = $this->doorGets->getLangueTradution();

        $params = $this->doorGets->Params();

        if (array_key_exists($this->Action,$arrayAction))
        {
            switch($this->Action) {
            
                case 'index':
                    break;

                case 'sendForm':
                    $response = $this->send($uri_module);
                    if (empty($response['errors'])) {
                        $response = array(
                            'code' => 200,
                            'data' => $response['data']
                        );
                    } else {
                        $response = array(
                            'code' => 400,
                            'data' => $response['errors']
                        );   
                    }
                    break;
            }
        }

        return json_encode($response, JSON_FORCE_OBJECT);
    }

    private function send($uri_module = '') {
        
        $response = array();
        $response['data'] = array();
        $response['errors'] = array();

        $params = $this->doorGets->Params();
        $data = $params['GET'];

        if (!array_key_exists('value',$data) && in_array($data['value'],Constant::$surveyResponse)) {
            $response['errors']['value'] = 'not found';
        } else {
            $surveyService = new SurveyService($this->doorGets);
            $surveyService->add($uri_module,$data['value']);
            $response['data'] = $surveyService->getStats($uri_module);
        }

        return $response;
    }
}
