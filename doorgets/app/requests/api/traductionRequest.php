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


class TraductionRequest extends doorGetsApiRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }

    public function doAction() {
        
        $out    = '';
        $id     = 0;        
        if (!$this->doorGets->getIsUserLogged()) {
            $this->doorGets->_errorJson("Access Token required");
        }

        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $allLanguages       = $this->doorGets->getAllLanguages();
        $isVersionActive    = false;
        $version_id         = 0;
        $isContent          = array();
        
        // Check if is content modo
        (in_array('traduction', $User['liste_module_interne'])) ? $is_modo = true : $is_modo = false;

        // Check if is module modo
        (
            in_array('traduction', $User['liste_module_interne'])  
            && in_array('traduction_modo',  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

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
                    }
                }
            } else {
                $this->doorGets->_errorJson("Ressource not found");
            }
        }

        switch($this->doorGets->requestMethod) {
            
            case 'POST':
                
                if (!$is_modules_modo) {
                    $this->doorGets->_errorJson("Not authorized to add");
                }

                if (empty($this->isContent) && $is_modules_modo) {

                    $formData = $this->getFormDataFromParams();

                    if (empty($formData['error']) && $id === 0) {

                        $isUser = $this->doorGets->dbQS($formData['success']['sentence'],$this->doorGets->Table,'sentence');
                        if(!empty($isUser)) {

                            $formData['error']['sentence'] = 'Already exists';
                        } else {

                            $data['sentence']       = $formData['success']['sentence'];
                            $data['id_user']        = $User['id'];
                            $data['id_groupe']      = $User['groupe'];
                            $data['date_creation']  = time();
                            
                            $formData['success']['id'] = $this->doorGets->dbQI($data,$this->doorGets->Table);
                            
                            foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                                
                                $dataTraduction['translated_sentence']  = $formData['success']['sentence'];
                                $dataTraduction['langue']               = $k;
                                $dataTraduction['id_translator']        = $formData['success']['id'];
                                $dataTraduction['date_modification']    = time();
                                
                                $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,$this->doorGets->Table.'_traduction');

                            }

                            $dataModification['groupe_traduction'] = serialize($idsTraduction);
                            $this->doorGets->dbQU($formData['success']['id'],$dataModification,$this->doorGets->Table);

                            $this->doorGets->_successJson($formData['success']);
                        }
                    } 

                    $this->doorGets->_errorJson("Fields errors",$formData['error']);
                }
                
                
                break;

            case 'PUT':
            case 'PATCH':

                if (!empty($this->isContent)) {

                    $formData = $this->getFormDataFromParams('PUT');

                    if (empty($formData['error']) ) {

                        $dataTraduction['translated_sentence']  = $formData['success']['translated_sentence'];
                        $dataTraduction['is_translated']        = $formData['success']['is_translated'];
                        $dataTraduction['date_modification']    = time();
                        
                        $dataVersion = $dataTraduction;
                        $this->saveLastContentVersion($isContent['id_translator'],$dataVersion);

                        $this->doorGets->dbQU($isContent['id'],$dataTraduction,$this->doorGets->Table.'_traduction');
                        
                        $this->doorGets->_successJson("$id -> ".$isContent['langue']." updated");
                    }else {
                        $this->doorGets->_errorJson("Fields errors",$formData['error']);
                    }
                }

                break;

            case 'DELETE':
                
                if (!$is_modules_modo) {
                    $this->doorGets->_errorJson("Not authorized to delete");
                }

                if (!empty($this->isContent)) {

                    $this->doorGets->dbQD($isContent['id_translator'],$this->doorGets->Table);
                    $this->doorGets->dbQD($isContent['id_translator'],$this->doorGets->Table.'_traduction','id_translator','=','');
                    $this->doorGets->dbQD($isContent['id_translator'],$this->doorGets->Table.'_version','id_content','=','');
                    
                    $this->doorGets->_successJson("$id deleted");
                }
                break;
            
            
        }
        
        return $out;
        
    }

    public function saveLastContentVersion($id_content,$next_content = array(),$name_field="id_content") {

        $lgActuel       = $this->doorGets->getLangueTradution();
        $User           = $this->doorGets->user;

        // Save last Version
        $isLastVersionTemp = $isLastVersion = $this->doorGets->dbQS($id_content,$this->doorGets->Table.'_traduction',"id_translator"," AND langue='$lgActuel' LIMIT 1 ");
        if (!empty($isLastVersion)) {

            unset($isLastVersion['id']);
            unset($isLastVersionTemp['id']);
            if (array_key_exists('date_modification', $isLastVersionTemp)) {
                unset($isLastVersionTemp['date_modification']);
            }
            if (array_key_exists('id_translator', $isLastVersionTemp)) {
                $isLastVersionTemp['id_content'] =  $isLastVersionTemp['id_translator'];
                unset($isLastVersionTemp['id_translator']);
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
                
                $tempIsLastVersion  = $isLastVersion;
                $tempNext_content   = $next_content;

                unset($tempNext_content['date_modification']);
                unset($tempIsLastVersion['date_modification']);

                $checkIfDataEqualLastVersion = strcmp(serialize($tempNext_content), serialize($tempIsLastVersion));

                if ($checkIfDataEqualLastVersion !== 0) {

                    $this->doorGets->dbQI($isLastVersionTemp,$this->doorGets->Table.'_version');

                }

            }

        }

    }

    public function getPostProvider() {
        return array(
            'sentence'             => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
        );
    }

    public function getPutProvider() {
        return array(
            'translated_sentence'       => array(
                'required'  => true,
                'type'      => 'varchar'          
            ),
            'is_translated'             => array(
                'required'  => true,
                'type'      => 'int'          
            ),
        );
    }
}
