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


class TranslatorView extends doorGetsAjaxView{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $this->doorGets->checkAjaxMode();
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $arrayAction = array(
            
            'index'         => 'Home',
            'getTraduction' => 'Get traduction sentence',
            
        );
        
        $params = $this->doorGets->Params();

        if (array_key_exists($this->Action,$arrayAction) )
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'getTraduction':

	            	$value = '';
	                
                    $response['data'] = array(
                        'message' => 'not found'
                    );

                    $langue = 'en';

                    if (
                        array_key_exists('sentence', $params['GET'])
                        && !empty(trim($params['GET']['sentence'])) 
                        // && array_key_exists('from', $params['POST'])
                        && array_key_exists('langue', $params['GET'])
                    ) {

                        $isContent = $this->doorGets->dbQS($params['GET']['sentence'],'_dg_translator','sentence');
                        if (!empty($isContent)) {
                            
                            $langue = $params['GET']['langue'];

                            $groupeTraduction = unserialize($isContent['groupe_traduction']);
                            if (array_key_exists($langue,$groupeTraduction)) {
                                $isContentTraduction = $this->doorGets->dbQS($groupeTraduction[$langue],'_dg_translator_traduction');

                                if (!empty($isContentTraduction)) {
                                    
                                    $response['code'] = 200;
                                    $response['data'] = array(
                                        'translated_sentence'   => $isContentTraduction['translated_sentence'],
                                        'is_translated'         => ($isContentTraduction['is_translated'] === '1') ? true : false
                                    );

                                }
                            }
                        }
                    }

                    
	                break;

	        }
        }

        return json_encode($response);;
    }
}
