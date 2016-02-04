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


class CommentRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (empty($isContent)) {
                header('Location:./?controller='.$this->doorGets->controllerNameNow()); exit();
            }
        }
        
        switch($this->Action) {
            
            case 'select':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $data['validation'] = $this->doorGets->Form->i['validation'];
                    $this->doorGets->dbQU($isContent['id'],$data,$this->doorGets->Table);
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    
                }
                
                break;
            
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                     
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id'],$this->doorGets->Table);
                        FlashInfo::set($this->doorGets->__("Le commentaire à été corréctement supprimer"));
                        header('Location:./?controller='.$this->doorGets->controllerNameNow()); exit();
                        
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
                            
                            $this->doorGets->dbQD($id,$this->doorGets->Table);
                            
                        }
                        
                        FlashInfo::set($this->doorGets->__("Les données sont supprimées"));
                        header('Location:./?controller='.$this->doorGets->controllerNameNow()); exit();
                        
                    }
                    
                }
                
                break;
        }
    }
}

