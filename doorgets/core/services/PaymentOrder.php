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

class PaymentOrder {

    public $data;

    public function __construct(&$user) {
        $this->data = $this->init($user);
    }

    public function init($user){
        return array(
            'active' => $user['payment'],
            'title' => 'Adhésion',
            'currency' => $user['payment_currency'],
            'amount_month' => $user['payment_amount_month'],
            'amount_total' => $user['payment_amount_month'] * (float)$user['payment_tranche'],
            'group_expired' => $user['payment_group_expired'],
            'tranche' => $user['payment_tranche'],
            'group_upgrade' => $user['payment_group_upgrade'],
        );
    }
}