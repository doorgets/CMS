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


class AddressRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }
    
    public function doAction() {
        
        $out = '';
        
        $cName = $this->doorGets->controllerNameNow();
        $me = $this->doorGets->user;
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_address');
        }
        
        switch($this->Action) {
            
            case 'index':
                break;
            case 'add':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                    
                    'is_default',
                    'is_billing',
                    'is_shipping',
                    'phone1',
                    'phone2',
                    'phone3',
                    'other_info',
                );

                $checkedFields = array(
                    
                    'is_default',
                    'is_billing',
                    'is_shipping'

                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $paramsAttibute = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {

                        if (array_key_exists('is_default',$this->doorGets->Form->i)) {
                            $this->doorGets->dbQU($me['id'],array('is_default'=>0),'_users_address','id_user','');
                        }

                        foreach ($checkedFields as $key) {
                            if (!array_key_exists($key,$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i[$key] = 0;
                            }
                        }

                        $now = time();
                        $UsersAddressEntity = new UsersAddressEntity(null,$this->doorGets);
                        $UsersAddressEntity->setData($this->doorGets->Form->i);
                        $UsersAddressEntity->setIdUser($me['id']);
                        $UsersAddressEntity->setDateCreation($now);
                        $UsersAddressEntity->setDateModification($now);
                        $UsersAddressEntity->save(false);
                        
                        $idContent = $UsersAddressEntity->getId();

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=address'); exit();
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                break;

            case 'edit':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                    
                    'is_default',
                    'is_billing',
                    'is_shipping',
                    'phone1',
                    'phone2',
                    'phone3',
                    'other_info',
                );

                $checkedFields = array(
                    
                    'is_default',
                    'is_billing',
                    'is_shipping'

                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $paramsAttibute = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {

                        if (array_key_exists('is_default',$this->doorGets->Form->i)) {
                            $this->doorGets->dbQU($me['id'],array('is_default'=>0),'_users_address','id_user','');
                        }

                        foreach ($checkedFields as $key) {
                            if (!array_key_exists($key,$this->doorGets->Form->i)) {
                                $this->doorGets->Form->i[$key] = 0;
                            }
                        }
                        
                        $now = time();
                        $UsersAddressEntity = new UsersAddressEntity($isContent['id'],$this->doorGets);
                        $UsersAddressEntity->setData($this->doorGets->Form->i);
                        $UsersAddressEntity->setDateModification($now);
                        $UsersAddressEntity->save(false);
                        
                        $idContent = $UsersAddressEntity->getId();

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=address'); exit();
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                break;
            case 'delete':

                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)) {
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->dbQD($isContent['id'],'_users_address','id','=','');
                    //$this->doorGets->clearDBCache();
                    FlashInfo::set($this->doorGets->__("Une adresse vient d'être supprimé avec succès"));
                    header('Location:./?controller=address');
                    exit();
                    
                }

                break;
            
        }
        
        return $out;
        
    }
    
}
