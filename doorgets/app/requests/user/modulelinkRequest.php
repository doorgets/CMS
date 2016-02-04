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


class ModuleLinkRequest extends doorGetsUserModuleRequest{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $this->doorGets->Table = '_dg_links';
        // Init langue 
        $lgActuel       = $this->doorGets->getLangueTradution();
        $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        // Init url redirection 
        $redirectUrl = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&lg='.$lgActuel;
        
        // get Content for edit 
        $params = $this->doorGets->Params();
        if (array_key_exists('uri',$params['GET'])) {
            
            $uri = $params['GET']['uri'];
            $isContent = $this->doorGets->dbQS($uri,$this->doorGets->Table,'uri_module'," AND langue = '$lgActuel' LIMIT 1");
            
        }
        
        $champsObligatoire = array('label','link');
        
        if (!empty($this->doorGets->Form->i)) {

            $this->doorGets->checkMode();
            
            // gestion des champs vide
            foreach($this->doorGets->Form->i as $k=>$v) {
                
                if (empty($v))
                {
                    $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_'.$k] = 'ok';   
                }
            }
            
            if (empty($this->doorGets->Form->e)) {
                
                $data = array(
                    'label' => $this->doorGets->Form->i['label'],
                    'link' => $this->doorGets->Form->i['link'],
                );

                $this->doorGets->dbQU($isContent['id'],$data,$this->doorGets->Table);
                
                FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                header('Location:'.$redirectUrl);
                exit();
                
            }
            
            FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
        }
        
    }
}
