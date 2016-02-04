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


class AuthRequest extends doorGetsApiRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }

    public function doAction() {
        
        $out = '';
        
        // if (!$this->doorGets->getIsUserLogged()) {
        //     $this->doorGets->_errorJson("Access Token required");
        // }

        switch($this->doorGets->requestMethod) {
            
            case 'POST':

                $response = array();
                $formData = $this->getFormDataFromParams();

                if (empty($formData['error'])) {

                    $isUser = $this->doorGets->dbQS($formData['success']['login'],'_users','login');

                    if (!empty($isUser)) {
                        
                        $hasPassword = $this->doorGets->_decryptMe($formData['success']['password'],$isUser['salt'],$isUser['password']);
                        if ($hasPassword) {
                            
                            $isUserInfos = $this->doorGets->dbQS($isUser['id'],'_users_info','id_user');
                            if (!empty($isUserInfos)  && ( $isUserInfos['active'] == '2' OR $isUserInfos['active'] == '5')) {

                                $isAccessToken = $this->doorGets->dbQS($isUser['id'],'_users_access_token','id_user');

                                if (!empty($isAccessToken) && $isAccessToken['is_valid']) {

                                    $response['access_token'] = $isAccessToken['token'];
                                    $this->doorGets->_successJson($response);

                                } 
                            }
                        }
                    }

                    $this->doorGets->_errorJson("User not found");
                    

                } else {

                    $this->doorGets->_errorJson("Fields errors",$formData['error']);
                }
                
                break;
        }
        
        return $out;
        
    }

    public function getPostProvider() {
        return array(
            'login'             => array(
                'required'  => true,
                'type'      => 'email'          
            ),
            'password'                => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
        );
    }
}
