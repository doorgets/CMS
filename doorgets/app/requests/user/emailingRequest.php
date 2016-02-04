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


class EmailingRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $tableName = '_dg_newsletter';
        $controllerName = 'emailing';
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$tableName);
            if (empty($isContent)) {
                header('Location:./?controller='.$controllerName); exit();
            }
        }
        
        switch($this->Action) {
            
            case 'index':
                
                if (!empty($this->doorGets->Form['_tocsv']->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $allContacts = $this->doorGets->dbQ("SELECT nom,email FROM _dg_newsletter WHERE newsletter = 1");
                    if (!empty($allContacts)) {
                        
                        $fileName = '_doorGets_newsletter_'.time().'.csv';
                        $fileToCSV = BASE.'cache/'.$fileName;
                        
                        $fp = fopen($fileToCSV, 'w');
                        foreach ($allContacts as $fields) { fputcsv($fp, $fields); }
                        fclose($fp);
                        
                        header('Content-type: text/csv');
                        header('Content-disposition: attachment;filename='.$fileName);
                        
                        echo file_get_contents($fileToCSV); @unlink($fileToCSV); exit();
                        
                    }
                }
                break;
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && $k !== 'description' && $k != 'id_user') {
                            
                            $this->doorGets->Form->e[$controllerName.'_add_'.$k] = 'ok';
                            
                        }
                    }
                    $var = $this->doorGets->Form->i['email'];
                    $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
                    $isEmailExist = $this->doorGets->dbQS($var,$tableName,'email');
                    if (!empty($isEmailExist)) {
                        
                        $this->doorGets->Form->e[$controllerName.'_add_email'] = 'ok';
                        
                    }
                    if (empty($isEmail)) {
                        
                        $this->doorGets->Form->e[$controllerName.'_add_email'] = 'ok';
                        
                    }
                    if (empty($this->doorGets->Form->e )) {
                        
                        $data = $this->doorGets->Form->i;
                        $data['date_creation'] = time();
                        
                        $idUser = $this->doorGets->dbQI($data,$tableName);
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller='.$controllerName);
                        exit();
                    }
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'edit':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v)  && $k !== 'description' ) {
                            
                            $this->doorGets->Form->e[$controllerName.'_edit_'.$k] = 'ok';
                            
                        }
                    }
                    
                    $var = $this->doorGets->Form->i['email'];
                    $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
                    $isEmailExist = $this->doorGets->dbQS($var,$tableName,'email'," AND id != '$id' LIMIT 1 ");
                    if (!empty($isEmailExist)) {
                        
                        $this->doorGets->Form->e[$controllerName.'_edit_email'] = 'ok';
                        
                    }
                    if (empty($isEmail)) {
                        
                        $this->doorGets->Form->e[$controllerName.'_edit_email'] = 'ok';
                        
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = array(
                            'nom' => $this->doorGets->Form->i['nom'],
                            'email' => $this->doorGets->Form->i['email'],
                            'description' => $this->doorGets->Form->i['description'],
                        );

                        $this->doorGets->dbQU($isContent['id'],$data,$tableName);
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller='.$controllerName);
                        exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id'],$tableName);
                        FlashInfo::set($this->doorGets->__("Le contact à été corréctement supprimer"));
                        header('Location:./?controller='.$controllerName); exit();
                        
                    }
                }
                
                break;
            
            case 'massdelete':
                
                if (
                    
                    !empty($this->doorGets->Form['massdelete_index']->i)
                    && isset($this->doorGets->Form['massdelete_index']->i['groupe_delete_index'])
                   
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form['massdelete_index']->e))
                    {
                        
                        $ListeForDeleted = $this->doorGets->_toArray($this->doorGets->Form['massdelete_index']->i['groupe_delete_index']);
                
                        foreach($ListeForDeleted as $id) {
                            
                            $this->doorGets->dbQD($id,$tableName);
                            
                        }
                        
                        FlashInfo::set($this->doorGets->__("Les données sont supprimées"));
                        header('Location:./?controller='.$controllerName); exit();
                        
                    }
                    
                }
                
                break;
        }
    }
}

