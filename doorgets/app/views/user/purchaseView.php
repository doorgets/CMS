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


class PurchaseView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $tplAccountRubrique = Template::getView('user/account/user_account_rubrique');
        ob_start(); if (is_file($tplAccountRubrique)) { include $tplAccountRubrique; } $htmlAccountRubrique = ob_get_clean();
        
        switch($this->Action) {
            
            case 'index':

                $postFinish = false;

                $amount = 5000;
                $currency = 'eur';
                $orderId = '6735';

                $isUser = $this->doorGets->dbQS($this->user['id'],'_user_stripe','id_user');

                StripeService::init($this->doorGets);

                if (array_key_exists('stripeToken',$_POST)) {
                    
                    $token  = $_POST['stripeToken'];

                    $isUser = $this->doorGets->dbQS($this->user['id'],'_user_stripe','id_user');
                    if (empty($isUser)) {

                        $customer = \Stripe\Customer::create(array(
                          'email' => $this->user['login'],
                          'card'  => $token
                        ));

                        $dataCharge = array(
                            'customer' => $customer->id,
                            'amount'   => $amount,
                            'currency' => $currency,
                            "metadata" => array("order_id" => $orderId)
                        );

                        $dataUser = array(
                            'id_stripe'         => $customer->id,
                            'id_user'           => $this->user['id'],
                            'date_creation'     => time(),
                            'date_modification' => time()
                        );

                        $this->doorGets->dbQI($dataUser,'_user_stripe');

                    } else {

                        $dataCharge = array(
                            "amount"   => $amount, 
                            "currency" => $currency,
                            "customer" => $isUser['id_stripe'],
                            "metadata" => array("order_id" => $orderId)
                        );
                    }

                    $charge = \Stripe\Charge::create($dataCharge);

                    $dataChargeToSave = array(
                      
                        "id_user"     => $this->user['id'],
                        "id_stripe"   => $isUser['id_stripe'],
                        "id_charge"   => $charge->id,
                        "id_order"    => $orderId,
                        "status"      => $charge->status, 
                        "amount"      => $charge->amount, 
                        "currency"    => $charge->currency,
                        "data"        => @serialize($charge),
                        'date_creation'     => time(),
                        'date_modification' => time()
                    );

                    $idNewCharge = $this->doorGets->dbQI($dataChargeToSave,'_user_stripe_charge');

                    $postFinish = true;  
                }

                break;
            
        }
        
        $ActionFile = 'user/purchase/user_purchase_'.$this->Action;
        $tpl = Template::getView($ActionFile);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
        
    }
    
}