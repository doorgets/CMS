<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

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

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <b class="glyphicon glyphicon-euro"></b> [{!$this->doorGets->__('Paiement')!}]
        </legend>
        <div class="width-listing">
            
            <form action="[{!$_SERVER['REQUEST_URI']!}]" method="post">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="[{!$this->doorGets->configWeb['stripe_publishable_key']!}]"
                        data-amount="[{!$amount!}]"
                        data-email="[{!$this->user['login']!}]"
                        data-name="[{!$this->doorGets->configWeb['title']!}]"
                        data-description="2 widgets ($20.00)"
                        data-image="[{!BASE_IMG!}]logo.png"
                ></script>
            </form>
        </div>
    </div>
</div>
