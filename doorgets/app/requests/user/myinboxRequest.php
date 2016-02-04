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


class MyInboxRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }

    public function doAction() {
        
        $out = '';
        
        $User               = $this->doorGets->user;
        $tableName          = '_users_inbox';
        $controllerName     = 'myinbox';

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

                if ($isContent['readed'] == '2' && $isContent['id_user'] == $User['id']) {
                    
                    $data['readed'] = 1;
                    $data['date_readed'] = time();
                    $this->doorGets->dbQU($id,$data,$tableName);
                    
                }
                break;
            
            case 'delete':
                
                $sentUrl = '';
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = array();
                        if ($isContent['id_user'] == $User['id']) {
                            
                            $data['user_delete'] = 1;
                            $data['date_deleted'] = time();

                        }

                        if ($isContent['id_user_sent'] == $User['id']) {
                            
                            $data['user_sent_delete'] = 1;
                            $data['date_sent_deleted'] = time();
                            
                            $sentUrl = '&action=sent';
                        }
                        
                        if (!empty($data)) {

                            $this->doorGets->dbQU($id,$data,$tableName);
                            FlashInfo::set("Le message à été corréctement supprimer.");
                            header('Location:./?controller='.$controllerName.$sentUrl); exit();
                        }
                    }
                }
                
                break;
        }
    }
}
