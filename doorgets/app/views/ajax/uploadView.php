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


class UploadView extends doorGetsAjaxView{
    
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
            'uploadImage' => 'Upload images',
            
        );
        
        $params = $this->doorGets->Params();

        if (array_key_exists($this->Action,$arrayAction) && !empty($this->doorGets->user))
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'uploadImage':
                
                    $uri = 'temp';
                    // if (array_key_exists('uri',$params['GET'])) {

                    //     $uri = $params['GET']['uri'];
                        
                    // }else {

                    //     $error = true;
                    // }
                    
                    $error = false;

                    if (
                        !isset($_FILES[0]) 
                        || $_FILES[0]["error"] !== 0 
                        || !array_key_exists($_FILES[0]["type"],Constant::$extensionsImage)) {
                        
                        $error = true; 
                    }
                    
                    if (!$error) {
                        
                        $extension = '.'.Constant::$extensionsImage[$_FILES[0]["type"]];
                        $nameFileImage = time().'-'.uniqid('doorgets').$extension;
        
                        if (!is_dir(BASE_DATA.$uri)) { 
                            @mkdir(BASE_DATA.$uri, 0777, true);
                            copy(BASE_DATA.'index.php',BASE_DATA.$uri.'/index.php');
                        }
                        
                        if (move_uploaded_file($_FILES[0]['tmp_name'], BASE_DATA.$uri.'/'.$nameFileImage)) {

                            $response['code'] = 200;
                            $response['data'] = array(
                                'path' => $nameFileImage, 
                                'extension' => $extension
                            );
 
                        } else {
                            
                            $response['data'] = array(
                                'message' => 'upload fail : send'
                            );
                        }
                        
                    }else {

                        $response['data'] = array(
                            'error' => $error,
                            'extension' => $extension,
                            'message' => 'upload fail : error'                          
                        );
                    
                    }

	                break;

	        }
        }
        return json_encode($response);;
    }
}
