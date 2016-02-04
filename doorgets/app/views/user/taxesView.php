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


class TaxesView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $me = $this->doorGets->user;

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_taxes');
            if (!empty($isContent)) {
                // $isCheckedDefault = ($isContent['is_default'] === '1') ? 'checked': '';             
            }

        }

        $storeMenuFile = 'user/user_store_menu';
        $tplStoreMenu = Template::getView($storeMenuFile);
        ob_start(); if (is_file($tplStoreMenu)) { include $tplStoreMenu; } $storeMenuHtml = ob_get_clean();

        $aActivation = $this->doorGets->getArrayForms('yn');
        $currencyCode = $this->doorGets->configWeb['currency'];
        $currencyIcon = Constant::$currencyIcon[$currencyCode];
        $aPriority = range(0,10);
        $aPercent = range(0,100);
        $aStockmin = range(0,100);
        $aType = array(
            'percent' => $this->doorGets->__("Pourcentage"). ' %',
            'amount' => $this->doorGets->__("Montant").' '.$currencyIcon
        );

        switch($this->Action) {
            
            case 'index':
                
                $TaxesQuery = new TaxesQuery($this->doorGets);
                $TaxesQuery->orderByPriority();
                $TaxesQuery->find();
                $Taxess = $TaxesQuery->_getEntities('array');

                break;

            case 'add':
                
                $shopModules = $this->doorGets->loadModules(true,true,'shop');
                $categories = array();

                if (!empty($shopModules)) {
                    foreach ($shopModules as $module) {
                        $this->doorGets->loadCategories($module['uri']);
                        $categories[$module['id']] = $this->doorGets->categorieSimple_;
                    }
                }
                break;

            case 'edit':
                break;
            
            case 'delete':
                break;
            
            
        }
        
        $ActionFile = 'user/taxes/user_taxes_'.$this->Action;
        $tpl = Template::getView($ActionFile);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
        
    }
    
}