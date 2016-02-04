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
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title-breadcrumb page-header">
        <ol class="breadcrumb">
            <li><a href="./?controller=configuration">[{!$this->doorGets->__('Configuration')!}]</a></li>
            <li class="active">[{!$htmlConfigSelect!}]</li> 
        </ol>
    </div>
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
            <h2>
                <i class="fa fa-cc-paypal"></i> [{!$this->doorGets->__('Paiement avec Paypal')!}]
            </h2>
        </div>
        [{!$this->doorGets->Form->open('post')!}]

            <div class="panel panel-default">
                <div class="panel-heading">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer'),'paypal_active',1,$isPaypalActive)!}]
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Utilisateur').' <span class="cp-obli">*</span>','paypal_user','text',$this->doorGets->configWeb['paypal_user'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe').' <span class="cp-obli">*</span>','paypal_password','text',$this->doorGets->configWeb['paypal_password'])!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Signature').' <span class="cp-obli">*</span>','paypal_signature','text',$this->doorGets->configWeb['paypal_signature'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Demo'),'paypal_demo',1,$isPaypalDemo)!}]
                        
                       </div>
                    </div>
                </div>
            </div>

            <div class="separateur-tb"></div>
            <div class="text-center">
                [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>

        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
