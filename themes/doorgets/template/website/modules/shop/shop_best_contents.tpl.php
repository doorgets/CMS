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

 
 /*
  * Variables :
  *
      

 */
    $labelModuleGroup = $this->getActiveModules();
    $labelModule = $labelModuleGroup[$module]['all']['nom'];
    $currencyCode = (!array_key_exists($this->configWeb['currency'],Constant::$currency)) ? 'eur': $this->configWeb['currency'];
    $currencyIcon = Constant::$currencyIcon[$currencyCode];
?>
<!-- doorGets:start:modules/shop/shop_best_contents -->
<div class="container doorGets-shop-last-contents doorGets-module-last-[{!$module!}]">
    <div class="row">
        <div class="col-md-12">
            [{?(!empty($Contents)):}]
                [{/($Contents as $content):}]
                    <div class="col-md-4 content-listing-shop">    
                        <div class=" left-date-shop">
                            <a href="[{!$this->getBaseUrl()!}]?[{!$module!}]=[{!$content['uri']!}]">
                                <img src="[{!URL!}]data/[{!$module!}]/[{!$content['image']!}]" class="img-thumbnail img-responsive hover-t img-shop-listing" />
                            </a>
                        </div>
                        <div class="row bottom-listing-shop">
                            <div class="col-md-12 text-center">
                                <div class="bottom-listing-shop-title">[{!$content['titre']!}]</div>
                                [{?($content['opt_show_price']):}]
                                <div class="bottom-listing-shop-price">[{!$content['price']!}]</div>
                                [?]
                            </div>
                        </div>
                    </div>
                [/]
            [?]
        </div>
    </div>
</div>
<!-- doorGets:end:modules/shop/shop_best_contents -->