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

class PaypalPaymentService {

    public $doorGets;

    public 
        $subscription,
        $endpoint,
        $total,
        $totalttc,
        $products,
        $user,
        $password,
        $signature,
        $params = array()
    ;

    public function __construct(&$doorGets,$subscription,$method= 'SetExpressCheckout',$params = array()) {
        
        $this->doorGets = $doorGets;
        $this->subscription = $subscription;

        $this->endpoint = ($doorGets->configWeb['paypal_demo'])?
            'https://api-3T.sandbox.paypal.com/nvp' : 'https://api-3T.paypal.com/nvp' ;


    }

    public function request($method,$paramsArray = array()) {

        $returnUrl = BASE_URL.'payment/?success&lg='.$this->doorGets->myLanguage;
        $cancelUrl = BASE_URL.'payment/?cancel&lg='.$this->doorGets->myLanguage;

        $paramsArray = array_merge($paramsArray,array(
            'METHOD' => $method,
            'VERSION' => '124.0',
            'USER' => $this->doorGets->configWeb['paypal_user'],
            'SIGNATURE' => $this->doorGets->configWeb['paypal_signature'],
            'PWD' => $this->doorGets->configWeb['paypal_password'],
            'RETURNURL' => $returnUrl,
            'CANCELURL' => $cancelUrl
        ));   

        $paramsArray['PAYMENTREQUEST_0_AMT'] = number_format($this->subscription->data['amount_total'],2);
        $paramsArray['PAYMENTREQUEST_0_CURRENCYCODE'] = strtoupper($this->subscription->data['currency']);
        $paramsArray['PAYMENTREQUEST_0_SHIPPINGAMT'] = number_format(0,2);
        $paramsArray['PAYMENTREQUEST_0_ITEMAMT'] = number_format($this->subscription->data['amount_total'],2);
        
        $paramsArray['L_PAYMENTREQUEST_0_NAME0'] = $this->subscription->data['title'];
        $paramsArray['L_PAYMENTREQUEST_0_DESC0'] = 'desc';
        $paramsArray['L_PAYMENTREQUEST_0_AMT0'] = number_format($this->subscription->data['amount_month'],2);
        $paramsArray['L_PAYMENTREQUEST_0_QTY0'] = (int)$this->subscription->data['tranche'];

        //vdump($paramsArray);

        $params = http_build_query($paramsArray);
        //echo $params;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->endpoint,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_VERBOSE => 1
        ));

        $response = curl_exec($curl);
        $responseArray = array();
 
        parse_str($response,$responseArray);
        if (curl_errno($curl)) {
            //vdump(curl_errno($curl));
            curl_close($curl);
            return false;
        } else {
            if ($responseArray['ACK'] == 'Success') {
                //vdump($responseArray);
            } else {
                vdump($responseArray);
                curl_close($curl);
                return false; 
            }
        }
        curl_close($curl);

        return $responseArray;
    }

    public function getUrl() {

        $response = $this->request('SetExpressCheckout');
        $demo = (!empty($this->doorGets->configWeb['paypal_demo']))? 'sandbox.': '';
        $paypalUrl = 'https://www.'.$demo.'paypal.com/websrc?cmd=_express-checkout&useraction=commit&token='.$response['TOKEN'];

        return $paypalUrl;
    }
}