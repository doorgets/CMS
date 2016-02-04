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


class IndexView extends doorGetsAjaxView{
    
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
            'getUserByPseudo' => 'Get user by pseudo',
            
        );
        
        $params = $this->doorGets->Params();

        if (array_key_exists($this->Action,$arrayAction) )
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'getUserByPseudo':

	            	$value = '';
	                $response['code'] = 200;
                    
	                if (array_key_exists('value',$params['GET'])) {

	                	$value = $params['GET']['value'];

	                } elseif (array_key_exists('value',$params['POST'])) {

	                	$value = $params['POST']['value'];
	                }

	                if ($value) {

	                	$query = "
							SELECT pseudo, id_user, last_name, first_name  
                            FROM _users_info
							WHERE pseudo LIKE '%$value%'
							LIMIT 10
	                	";

	                	$response['data'] = $this->doorGets->dbQ($query);

	                }

	                break;

	        }
        }

        return json_encode($response);;
    }
}
