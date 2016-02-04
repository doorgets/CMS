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


class RubriquesRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_rubrique');
            if (empty($isContent)) {
                header('Location:./?controller=rubriques'); exit();
            }
        }
        
        switch($this->Action) {
            
            case 'add':
                
                $cResultsInt = $this->doorGets->getCountTable('_rubrique');
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v)  && $k !== 'idModule' ) {
                            
                            $this->doorGets->Form->e['rubriques_add_'.$k] = 'ok';
                            
                        }
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $data['name'] = $this->doorGets->Form->i['name'];
                        $data['ordre'] = $cResultsInt + 1;
                        $data['idModule'] = $this->doorGets->Form->i['idModule'];
                        $data['showinmenu'] = $this->doorGets->Form->i['showinmenu'];
                        $data['date_creation'] = time();
                        
                        $idContent = $this->doorGets->dbQI($data,'_rubrique');
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=rubriques'); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'edit':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v)  && $k !== 'idModule' ) {
                            
                            $this->doorGets->Form->e['rubriques_edit_'.$k] = 'ok';
                            
                        }
                    }
                    if (empty($this->doorGets->Form->e)) {
                        
                        $data = $this->doorGets->Form->i;
                        $data = array(
                            'name' => $this->doorGets->Form->i['name'],
                            'idModule' => $this->doorGets->Form->i['idModule'],
                            'showinmenu' => $this->doorGets->Form->i['showinmenu'],
                        );

                        $this->doorGets->dbQU($isContent['id'],$data,'_rubrique');
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();
                        header('Location:./?controller=rubriques');
                        exit();
                    }
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)) {
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->dbQD($isContent['id'],'_rubrique','id');
                    $this->doorGets->dbQL("UPDATE _rubrique SET ordre = ordre - 1 WHERE ordre > ".$isContent['ordre']." ");
                    
                    $this->doorGets->clearModuleDBCache('_rubrique');

                    FlashInfo::set($this->doorGets->__("Vos informations sont bien supprimées"));
                    header('Location:./?controller=rubriques');
                    exit();
                    
                }
                
                break;
            
        }
        
    }
    
    
    
    
    
}
