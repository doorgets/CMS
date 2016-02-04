<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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

if ($hasUser) {
    $count = 1;
    $subscription['amount_total'] = $this->doorGets->setCurrencyIcon($subscription['amount_total'],$subscription['currency']);
    $subscription['amount_month'] = $this->doorGets->setCurrencyIcon($subscription['amount_month'],$subscription['currency']);
    $dateEnd = GetDate::in(time() + (84600 * 30) * (int)$subscription['tranche'],2,$this->langue);  
}

?>
<div class="container payment-to-go">
    [{?($hasUser):}]
       [{!$this->doorGets->Form['address']->open('post','','','form-login-payment');}]
        <div class="row">
            <div class="col-md-4">
                <div class="head-payment">
                    <div class="head-payment-title"><i class="fa fa-coffee"></i> [{!$this->doorGets->__("Abonnement")!}]</div>
                </div>
                <!-- cart listing -->
                [{!$this->getView('payment/payment_listing_cart',$listingCartParams)!}]
                <div class="separateur-tb"></div>
                <div class="row"> 
                    <div class="col-md-6">
                        <i class="fa fa-calendar-check-o"></i> [{!$this->doorGets->__("Date de fin")!}] <b>[{!$dateEnd!}]</b>
                    </div>
                    <div class="col-md-6 text-right total-count-bottom">
                        <p class="grand-total-cart"><b>[{!$this->doorGets->__("Total TTC")!}]</b> <span class="total-cart-amount">[{!$subscription['amount_total']!}]</span></p>
                    </div>
                </div>          
            </div>
            <div class="col-md-5">
                <div class="head-payment">
                    <div class="head-payment-title"><i class="fa fa-file-archive-o"></i> [{!$this->doorGets->__("Adresse de facturation")!}]</div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        [{!$this->getView('payment/form/payment_form_billing',$formParams)!}]
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="section-address-payment" >
                    <div class="head-payment">
                        <div class="head-payment-title"><i class="fa fa-money"></i> [{!$this->doorGets->__("Paiement")!}]</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            [{!$this->getView('payment/form/payment_form_billing_method',$formParams)!}]
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form['address']->submit($this->doorGets->__("Payer"),'','btn btn-success btn-lg')!}]</a>
        </div>
        [{!$this->doorGets->Form['address']->close()!}]
    [?]
</div>