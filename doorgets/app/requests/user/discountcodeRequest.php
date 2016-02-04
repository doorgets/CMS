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


class DiscountcodeRequest extends doorGetsUserRequest{
    
    
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
            $isContent = $this->doorGets->dbQS($id,'_discountcode');
        }
        
        switch($this->Action) {
            
            case 'index':
                break;

            case 'add':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                );

                $checkedFields = array(
                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {

                        $now = time();
                        $DiscountcodeEntity = new DiscountcodeEntity(null,$this->doorGets);
                        $DiscountcodeEntity->setData($this->doorGets->Form->i);
                        $DiscountcodeEntity->setIdUser($me['id']);
                        $DiscountcodeEntity->setDateCreation($now);
                        $DiscountcodeEntity->setDateModification($now);
                        $DiscountcodeEntity->save(false);
                        
                        $idContent = $DiscountcodeEntity->getId();
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=discountcode'); exit();
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                break;

            case 'edit':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                );

                $checkedFields = array(
                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {

                        $now = time();
                        $DiscountcodeEntity = new DiscountcodeEntity($isContent['id'],$this->doorGets);
                        $DiscountcodeEntity->setData($this->doorGets->Form->i);
                        $DiscountcodeEntity->setDateModification($now);
                        $DiscountcodeEntity->save(false);

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=discountcode'); exit();
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                break;

            case 'delete':

                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)) {
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->dbQD($isContent['id'],'_discountcode','id','=','');
                    //$this->doorGets->clearDBCache();
                    FlashInfo::set($this->doorGets->__("Un code de réduction vient d'être supprimé avec succès"));
                    header('Location:./?controller=discountcode');
                    exit();
                    
                }

                break;
            
        }
        
        return $out;
        
    }
    
}
