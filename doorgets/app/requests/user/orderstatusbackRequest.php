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


class OrderstatusbackRequest extends doorGetsUserRequest
{
    
    
    public function __construct(&$doorGets) {
        parent::__construct($doorGets);
    }
    
    public function doAction() {
        
        $out = '';
        
        $lgActuel   = $this->doorGets->getLangueTradution(); 
        $groupes    = $this->doorGets->loadGroupes();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgAttribute = $lgGroupe[$lgActuel];
                    $isContentTraduction = $this->doorGets->dbQS($idLgAttribute,$this->doorGets->Table.'_traduction');

                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }
                }
            }
        }
        
        switch($this->Action) {
            
            case 'index':
                
                // to do
                
                break;
            
            case 'add':

                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                );

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                            
                        }
                    }

                    

                    if (empty($this->doorGets->Form->e)) {

                        $dataOrderstatus = array(
                            'date_creation' => time()
                        );
                                                
                        $idContent = $this->doorGets->dbQI($dataOrderstatus,$this->doorGets->Table);

                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {

                            $dataTraduction['title']          = $this->doorGets->Form->i['title'];
                            $dataTraduction['langue']         = $k;
                            $dataTraduction['id_content']   = $idContent;
                            
                            $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,$this->doorGets->Table.'_traduction');

                        }

                        $dataModification['groupe_traduction'] = serialize($idsTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller='.$this->doorGets->controllerNameNow().'&action=edit&id='.$idContent); exit();

                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'edit':
                
                // Champs du formulaire non obligatoire
                $noObligatoire = array(
                );


                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';
                            
                        }
                    }
                    
                    if (empty($this->doorGets->Form->e)) {

                        
                        $dataOrderstatus = array(
                        );

                        $dataTraduction = array(
                            'title' => $this->doorGets->Form->i['title'],
                            'date_modification' => time()
                        );

                        $this->doorGets->dbQU($isContent['id_content'],$dataOrderstatus,$this->doorGets->Table);
                        if (!empty($idLgAttribute)) {
                            $this->doorGets->dbQU($idLgAttribute,$dataTraduction,$this->doorGets->Table.'_traduction');
                        }

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();

                        $redirectUrl = './?controller='.$this->doorGets->controllerNameNow().'&action=edit&id='.$isContent['id_content'].'&lg='.$lgActuel;
                        header('Location:'.$redirectUrl); exit();
                        
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)) {
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table,'id','=','');
                    $this->doorGets->dbQD($isContent['id_content'],$this->doorGets->Table.'_traduction','id_content','=','');
                    //$this->doorGets->clearDBCache();
                    FlashInfo::set($this->doorGets->__("Un attribut vient d'être supprimé avec succès"));
                    header('Location:./?controller='.$this->doorGets->controllerNameNow());
                    exit();
                    
                }
                
                break;            
            
        }
        
        return $out;
        
    }
    
}
