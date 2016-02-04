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


class AddressView extends doorGetsUserView{
    
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
            $isContent = $this->doorGets->dbQS($id,'_users_address');
            if (!empty($isContent)) {
                $isCheckedDefault = ($isContent['is_default'] === '1') ? 'checked': '';
                $isCheckedIsBilling = ($isContent['is_billing'] === '1') ? 'checked': '';
                $isCheckedIsShipping = ($isContent['is_shipping'] === '1') ? 'checked': '';                
            }

        }
        
        switch($this->Action) {
            
            case 'index':
                
                $UsersAddressQuery = new UsersAddressQuery($this->doorGets);
                $UsersAddressQuery->filterByIdUser($me['id'])->find();
                $myAddress = $UsersAddressQuery->_getEntities('array');
                break;

            case 'add':
                break;

            case 'edit':
                break;
            
            case 'delete':
                break;
            
            
        }
        
        $ActionFile = 'user/address/user_address_'.$this->Action;
        $tpl = Template::getView($ActionFile);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
        
    }
    
}