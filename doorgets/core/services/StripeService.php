<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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

class StripeService {

    static function init(&$doorGets){
        
        $mail = null;

        if (!is_object($doorGets) || !is_array($doorGets->configWeb)) {
            return 'PHPMailerService: doorGets object not found';
        }

        $config = $doorGets->configWeb;
        
        if ($config['stripe_active']) {

            $stripe = array(
                "secret_key"      => $config['stripe_secret_key'],
                "publishable_key" => $config['stripe_publishable_key']
            );

            \Stripe\Stripe::setApiKey($stripe['secret_key']);

            return true;
        }
        
        return false;
    }
}