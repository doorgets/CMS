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

$totaltoshow = $this->cart->getTotalAmountPromo(true);
$subtotaltoshow = $this->cart->getSubTotalAmountPromoVAT(true);
$totalttctoshow = $this->cart->getTotalAmountPromoShippingVAT(true);
$count = $this->cart->getCount();

?>
<div class="container checkout-to-go">
    <div class="head-checkout">
        <div class="head-checkout-title"><i class="fa fa-shopping-basket"></i> [{!$this->doorGets->__("Votre panier")!}]</div>
    </div>
    [{?(!empty($count)):}]
    
        <!-- cart listing -->
        [{!$this->getView('checkout/checkout_listing_cart',$listingCartParams)!}]
        <div class="separateur-tb"></div>
        <div class="row"> 
            <div class="col-md-2">
                [{!$this->getView('checkout/form/checkout_form_codepromo',$formParams)!}]
            </div>
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-2 text-right total-count-bottom">
                <p><b>Sous-total</b> <span class="subtotal-cart-amount">[{!$subtotaltoshow!}]</span></p>
                <p><b>Frais de livraison</b> <span class="shipping-amount">[{!$this->cart->getShippingAmount()!}]</span></p>
            </div>
            <div class="col-md-2 text-right total-count-bottom">
                <p class="grand-total-cart"><b>[{!$this->doorGets->__("Total TTC")!}]</b> <span class="total-cart-amount">[{!$totalttctoshow!}]</span></p>
            </div>
        </div>
        [{?(!$hasUser):}]
        <div class="row section-choose-login">
            <div class="col-md-12">
                <div class="separateur-tb"></div>
                <div class="head-checkout">
                    <div class="head-checkout-title"><i class="fa fa-user"></i> [{!$this->doorGets->__("Vos informations")!}]</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 text-center login-member">
                        <h3>[{!$this->doorGets->__("Déjà Membre")!}]</h3>
                        <p>[{!$this->doorGets->__("Si vous avez déjà un compte")!}]</p>
                    </div>
                </div>
                [{!$this->getView('checkout/form/checkout_form_login',$formParams)!}]
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 text-center login-register-label login-new-member">
                        <h3>[{!$this->doorGets->__("Nouveau membre")!}]</h3>
                        <p>[{!$this->doorGets->__("Pour créer un compte")!}]</p>
                    </div>
                    <div class="col-md-6 text-center login-register-label login-not-member">
                        <h3>[{!$this->doorGets->__("Anonyme")!}]</h3>
                        <p>[{!$this->doorGets->__("Sans créer de compte")!}]</p>
                    </div>
                </div>
                [{!$this->getView('checkout/form/checkout_form_register',$formParams)!}]
            </div>
        </div>
        [??]
        <div class="row section-choose-login">
            <div class="col-md-12">
                <div class="separateur-tb"></div>
                <div class="head-checkout">
                    <div class="head-checkout-title"><i class="fa fa-user"></i> [{!$this->doorGets->__("Vos informations")!}]</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-info"><i class="fa fa-check-square-o"></i> [{!ucfirst($this->doorGets->user['first_name'])!}] [{!ucfirst($this->doorGets->user['last_name'])!}]</div>
            </div>
        </div>
        [?]
        [{?($hasUser):}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form['address']->open('post','','','form-login-checkout');}]
            <div class="section-address-checkout" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="head-checkout">
                            <div class="head-checkout-title"><i class="fa fa-truck"></i> [{!$this->doorGets->__("Adresse de livraison")!}]</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                [{!$this->getView('checkout/form/checkout_form_shipping',$formParams)!}]
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="head-checkout">
                            <div class="head-checkout-title"><i class="fa fa-file-archive-o"></i> [{!$this->doorGets->__("Adresse de facturation")!}]</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                [{!$this->getView('checkout/form/checkout_form_billing',$formParams)!}]
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="separateur-tb"></div>
                        <div class="head-checkout">
                            <div class="head-checkout-title"><i class="fa fa-map-marker"></i> [{!$this->doorGets->__("Methode de livraison")!}]</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                [{!$this->getView('checkout/form/checkout_form_shipping_method',$formParams)!}]
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="separateur-tb"></div>
                        <div class="head-checkout">
                            <div class="head-checkout-title"><i class="fa fa-money"></i> [{!$this->doorGets->__("Methode de paiement")!}]</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                [{!$this->getView('checkout/form/checkout_form_billing_method',$formParams)!}]
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form['address']->textarea($this->doorGets->__("Si vous voulez nous laisser un message à propos de votre commande, merci de bien vouloir le renseigner dans le champ ci-contre"),'message')!}]</a>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form['address']->submit($this->doorGets->__("Finaliser ma commande"),'','btn btn-success btn-lg')!}]</a>
            </div>
            [{!$this->doorGets->Form['address']->close()!}]
        [?]
    [??]
    <div class="alert alert-default text-center">
        <p>[{!$this->doorGets->__("Votre panier est vide")!}].</p>
        <p><a class="btn btn-lg  no-loader" href="[{!URL!}]"><i class="fa fa-home"></i> [{!$this->doorGets->__("Continuer mes achats")!}]</a></p>
    </div>
    [?]
</div>