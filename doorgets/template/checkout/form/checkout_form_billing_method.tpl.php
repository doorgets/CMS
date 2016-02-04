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

$default = "";
if ($this->hasPaypal) {
    $default = "paypal";
} elseif ($this->hasStripe) {
    $default = "stripe";
} elseif ($this->hasTransfer) {
    $default = "transfer";
} elseif ($this->hasCheck) {
    $default = "check";
} elseif ($this->hasCash) {
    $default = "cash";
}

if (array_key_exists('methodBilling', $_POST)) {
    $default = filter_input(INPUT_POST,'methodBilling',FILTER_SANITIZE_STRING);
}

?><ul class="list-group">
    [{?($this->hasPaypal):}]
    <li class="list-group-item">
        <div class="radio">
            <label class="block">
                <input type="radio" name="methodBilling" id="optionsPaypal" value="paypal" [{?($default ==='paypal'):}]checked[?]>
            <i class="fa fa-cc-paypal"></i> Paypal
            </label>
        </div>
    </li>
    [?]
    [{?($this->hasStripe):}]
    <li class="list-group-item">
        <div class="radio">
            <label>
                <input type="radio" name="methodBilling" id="optionsStripe" value="stripe" [{?($default ==='stripe'):}]checked[?]>
            <i class="fa fa-cc-stripe"></i> Stripe
            </label>
        </div>
    </li>
    [?]
    [{?($this->hasTransfer):}]
    <li class="list-group-item">
        <div class="radio">
            <label>
                <input type="radio" name="methodBilling" id="optionsTransfer" value="transfer" [{?($default ==='transfer'):}]checked[?]>
            <i class="fa fa-exchange"></i> [{!$this->doorGets->__("Virement bancaire")!}]
            </label>
        </div>
    </li>
    [?]
    [{?($this->hasCheck):}]
    <li class="list-group-item">
        <div class="radio">
            <label>
                <input type="radio" name="methodBilling" id="optionsCheck" value="check" [{?($default ==='check'):}]checked[?]>
            <i class="fa fa-paper-plane-o"></i> [{!$this->doorGets->__("Chèque")!}]
            </label>
        </div>
    </li>
    [?]
    [{?($this->hasCash):}]
    <li class="list-group-item">
        <div class="radio">
            <label>
                <input type="radio" name="methodBilling" id="optionsCash" value="cash" [{?($default ==='cash'):}]checked[?]>
            <i class="fa fa-money"></i> [{!$this->doorGets->__("Payer en espèces")!}]
            </label>
        </div>
    </li>
    [?]
</ul>