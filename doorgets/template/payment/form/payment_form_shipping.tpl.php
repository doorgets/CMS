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



?>
<div class="shipping-payment-container">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Nom').' <span class="cp-obli">*</span>','shippingLastname','text',$address['shipping']['lastname']);}]
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Prénom').' <span class="cp-obli">*</span>','shippingFirstname','text',$address['shipping']['firstname']);}]
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Société'),'shippingCompany','text',$address['shipping']['company']);}]
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Adresse').' <span class="cp-obli">*</span>','shippingAddress','text',$address['shipping']['address']);}]
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Téléphone').' <span class="cp-obli">*</span>','shippingPhone','text',$address['shipping']['phone']);}]
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                [{!$form['address']->select($this->doorGets->__('Pays').' <span class="cp-obli">*</span>','shippingCountry',$countries,$address['shipping']['country']);}]
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Code postal').' <span class="cp-obli">*</span>','shippingZipcode','text',$address['shipping']['zipcode']);}]
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                [{!$form['address']->input($this->doorGets->__('Ville').' <span class="cp-obli">*</span>','shippingCity','text',$address['shipping']['city']);}]
            </div>
        </div>
    </div>
</div>
