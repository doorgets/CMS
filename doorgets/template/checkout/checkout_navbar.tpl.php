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

$hasUser = (empty($user))?false:true;
$hasProducts = (empty($products))?false:true;

?>
<div class="row progress-checkout">
    <div class="col-md-3 [{?($hasProducts):}]green-c[??]gris-c[?]"><i class="fa fa-shopping-basket"></i> [{!$this->doorGets->__("Votre panier")!}] [{?($hasProducts):}]<i class="fa fa-check pull-right"></i>[?]</div>
    <div class="col-md-3 [{?($hasProducts && $hasUser):}]green-c[??]gris-c[?]"><i class="fa fa-user"></i> [{!$this->doorGets->__("Vos informations")!}] [{?($hasProducts && $hasUser):}]<i class="fa fa-check pull-right"></i>[?]</div>
    <div class="col-md-3 [{?($hasProducts && $hasUser):}]green-c[??]gris-c[?]"><i class="fa fa-truck"></i> [{!$this->doorGets->__("Adresse de livraison")!}] [{?($hasProducts && $hasUser):}]<i class="fa fa-check pull-right"></i>[?]</div>
    <div class="col-md-3 [{?($hasProducts && $hasUser):}]green-c[??]gris-c[?]"><i class="fa fa-file-archive-o"></i> [{!$this->doorGets->__("Adresse de facturation")!}] [{?($hasProducts && $hasUser):}]<i class="fa fa-check pull-right"></i>[?]</div>
</div>