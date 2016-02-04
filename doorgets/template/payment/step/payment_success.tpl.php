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
<div class="container payment-to-go-final">
    <div class="alert alert-success text-center">
        <h2><i class="fa fa-check fa-lg"></i>[{!$this->doorGets->__("Nous avons bien reçu votre paiement")!}]</h2>
    </div>
    <div class="alert alert-info text-center">
        [{!$this->doorGets->__("Nous procédons à la préparation et l'envoi de votre commande dans les plus brefs délais")!}].   
    </div>
    <div class="alert text-center red">
        [{!$this->doorGets->__("Vous allez être redirigé automatiquement dans")!}] <span id="time-left-redirect">5</span>s   
    </div>
</div>