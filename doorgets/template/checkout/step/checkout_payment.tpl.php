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
$title  = '<i class="fa fa-credit-card"></i> '.$this->doorGets->__('Paiement');
switch ($billingMethod) {
    case 'stripe':
        $title  = '<i class="fa fa-cc-stripe"></i> '.$this->doorGets->__('Paiement avec Stripe');
        break;
    case 'transfer':
        $title  = '<i class="fa fa-exchange"></i> '.$this->doorGets->__('Paiement par virement bancaire');
        break;
    case 'check':
        $title  = '<i class="fa fa-paper-plane-o"></i> '.$this->doorGets->__('Paiement par chèque');
        break;
    case 'cash':
        $title  = '<i class="fa fa-money"></i> '.$this->doorGets->__('Paiement en liquide');
        break;
}
?>
<div class="container checkout-to-go">
    <h2>[{!$title!}]</h2>
    <div class="text-center">

    [{?($billingMethod === 'stripe'):}]
        
        [{?(!$postFinish):}]
        <form action="[{!$_SERVER['REQUEST_URI']!}]" method="post">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="[{!$this->doorGets->configWeb['stripe_publishable_key']!}]"
                    data-amount="[{!$total!}]"
                    data-email="[{!$this->user['login']!}]"
                    data-name="[{!$this->doorGets->configWeb['title']!}]"
                    data-description="[{!$this->cart->setCurrency($this->cart->getTotalAmountPromoVAT())!}]"
                    data-image="[{!BASE_IMG!}]logo.png"
                    data-label="[{!$this->doorGets->__('Payer par carte')!}]"
                    data-currency="[{!$currencyCode!}]"
                    data-locale="[{!$this->langue!}]"
            ></script>
        </form>
        <script type="text/javascript">
        $(window).ready(function() {
            $('.stripe-button-el').trigger('click');
        });
        </script>
        [?]
        <br /><br /><br />
        <img src="[{!BASE_IMG!}]stripe.png">
    </div>
    [?]

    [{?($billingMethod === 'transfer'):}]
        <div class="alert alert-success">
            <h4><i class="fa fa-check fa-lg"></i> [{!$this->doorGets->__('Nous vous remercions et nous vous confirmons la bonne prise en compte de votre commande passée sur notre site')!}].</h4>
        </div> 
        <div class="alert alert-info">
            [{!$this->doorGets->__('Nous attendons maintenant votre virement afin de valider votre commande')!}].   
        </div> 
        <div class="row text-left">
            <div class="col-md-12">
                <div class="alert">
                    [{!$this->doorGets->configWeb['transfer_tinymce']!}]
                </div>
            </div>
        </div>
        <div class="alert text-center red">
            [{!$this->doorGets->__("Vous allez être redirigé automatiquement dans")!}] <span id="time-left-redirect">5</span>s   
        </div>
    [?]
    
    [{?($billingMethod === 'check' ):}]
        <div class="alert alert-success">
            <h4><i class="fa fa-check fa-lg"></i> [{!$this->doorGets->__('Nous vous remercions et nous vous confirmons la bonne prise en compte de votre commande passée sur notre site')!}].</h4>
        </div> 
        <div class="alert alert-info">
            [{!$this->doorGets->__('Nous attendons maintenant votre chèque afin de valider votre commande')!}].   
        </div> 
        <div class="row text-left">
            <div class="col-md-12">
                <div class="alert">
                    [{!$this->doorGets->configWeb['check_tinymce']!}]
                </div>
            </div>
        </div>
        <div class="alert text-center red">
            [{!$this->doorGets->__("Vous allez être redirigé automatiquement dans")!}] <span id="time-left-redirect">5</span>s   
        </div>
    [?]
    [{?($billingMethod === 'cash'):}]
        <div class="alert alert-success">
            <h4><i class="fa fa-check fa-lg"></i> [{!$this->doorGets->__('Nous vous remercions et nous vous confirmons la bonne prise en compte de votre commande passée sur notre site')!}].</h4>
        </div> 
        <div class="alert alert-info">
            [{!$this->doorGets->__('Nous attendons maintenant votre paiement afin de valider votre commande')!}].   
        </div> 
        <div class="row text-left">
            <div class="col-md-12">
                [{!$this->doorGets->configWeb['cash_tinymce']!}]
            </div>
        </div>
        <div class="alert text-center red">
            [{!$this->doorGets->__("Vous allez être redirigé automatiquement dans")!}] <span id="time-left-redirect">5</span>s   
        </div>
    [?]
    </div>
</div>