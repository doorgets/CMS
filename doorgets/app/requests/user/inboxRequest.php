<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


class InboxRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function doAction() {
        
        $out = '';
        $tableName = '_dg_inbox';
        $controllerName = 'inbox';
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$tableName);
            if (empty($isContent)) {
                return null;
            }
        }
        
        switch($this->Action) {
            
            case 'select':
                if ($isContent['lu'] == '2') {
    
                    $data['lu'] = 1;
                    $data['date_lu'] = time();
                    $this->doorGets->dbQU($id,$data,'_dg_inbox');
                    
                }
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id'],$tableName);
                        FlashInfo::set($this->doorGets->__("Le message à été corréctement supprimer"));
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

