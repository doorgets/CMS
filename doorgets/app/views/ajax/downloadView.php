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


class DownloadView extends doorGetsAjaxView{
    
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
            
            'index'  => 'Home',
            'upload' => 'Upload',
            
        );
        

        $typeExtension = array(
            "application/zip","application/x-zip-compressed"
        );
        

        $params = $this->doorGets->Params();

        if (array_key_exists($this->Action,$arrayAction) && !empty($this->doorGets->user))
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'upload':
                    
                    $error = false;
                    $dir = BASE_DATA.'_download/';
                    if (!is_dir($dir)) { 
                        @mkdir(BASE_DATA.$dir, 0777, true);
                        copy(BASE_DATA.'index.php',BASE_DATA.$dir.'/index.php');
                    }
                    if (array_key_exists('uri',$params['GET'])) {
                        $uri = $params['GET']['uri'];
                    }else {
                        $error = true;
                    }

                    $extension = '.zip';
                    

                    if ( isset($_FILES[0]) && $_FILES[0]["error"] === 0 && in_array($_FILES[0]["type"],$typeExtension) ) {
                        $extension = '.zip';
                    }else{
                        $error = true;
                    }
                    
                    if (!$error) {
                
                        $nameFileImage = time().'-'.uniqid('doorgets').$extension;
                        
                        $folderToSend = BASE_DATA.$dir.$uri.'/';
                        $uri = $this->doorGets->getRealUri($uri);
                        if (!is_dir($folderToSend)) { 
                            @mkdir($folderToSend, 0777, true);
                            copy(BASE_DATA.'index.php',$folderToSend.'index.php');
                        }
                        
                        if (move_uploaded_file($_FILES[0]['tmp_name'], $folderToSend.$nameFileImage)) {

                            $time = time();
                            $timeHuman = ucfirst(strftime("%A %d %B %Y %H:%M",$time));
                            

                            $fileSize = $_FILES[0]['size'];
                            $fileType = $_FILES[0]["type"];

                            $downloadFile = new DgDownloadEntity(null,$this->doorGets);
                            $downloadFile->setIdUser($this->doorGets->user['id']);
                            $downloadFile->setIdGroupe($this->doorGets->user['groupe']);
                            $downloadFile->setUriModule($uri);
                            $downloadFile->setPath($nameFileImage);
                            $downloadFile->setSize($fileSize);
                            $downloadFile->setType($fileType);

                            $downloadFile->setDateCreation($time);
                            $downloadFile->setDateModification($time);
                            $downloadFile->setDateCreationHuman($timeHuman);
                            $downloadFile->setDateModificationHuman($timeHuman);

                            $downloadFile->save();

                            $response['code'] = 200;
                            $response['data'] = array(
                                'id_file' => $downloadFile->getId(),
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
