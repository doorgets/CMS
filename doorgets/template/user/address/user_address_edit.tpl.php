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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=address"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <a href="?controller=address"><b class="glyphicon glyphicon-road"></b> [{!$this->doorGets->__('Mes adresses')!}]  </a> 
             / [{!$this->doorGets->__('Modifier une adresse')!}]
        </legend>
        <div class="width-listing">
            [{!$this->doorGets->Form->open('post','','');}]
            <div class="row">
                <div class="col-md-6">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Titre").' <span class="cp-obli">*</span>','title','text',$isContent['title']);}]
                </div>
                <div class="col-md-6">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Nom").' / '.$this->doorGets->__("Prénom").' / '.$this->doorGets->__("Entreprise").' <span class="cp-obli">*</span>','name','text',$isContent['name']);}]
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="row">
                <div class="col-md-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Pays").' <span class="cp-obli">*</span>','country','text',$isContent['country']);}]
                </div>
                <div class="col-md-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Ville").' <span class="cp-obli">*</span>','city','text',$isContent['city']);}]
                </div>
                <div class="col-md-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Code Postal").' <span class="cp-obli">*</span>','zipcode','text',$isContent['zipcode']);}]
                </div>
            </div> 
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->textarea($this->doorGets->__("Adresse").' <span class="cp-obli">*</span>','address',$isContent['address']);}]
            <div class="separateur-tb"></div>
            <div class="row">
                <div class="col-md-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Téléphone").' 1','phone1','text',$isContent['phone1']);}]
                </div>
                <div class="col-md-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Téléphone").' 2','phone2','text',$isContent['phone2']);}]
                </div>
                <div class="col-md-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__("Téléphone").' 3','phone3','text',$isContent['phone3']);}]
                </div>
            </div> 
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->textarea($this->doorGets->__("Autre"),'other_info',$isContent['other_info']);}]
            <div class="separateur-tb"></div>
            <div class="row">
                <div class="col-md-3">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__("Adresse par defaut"),'is_default','1','checked',$isCheckedDefault);}]
                </div>
                <div class="col-md-3">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__("Adresse de livraison"),'is_shipping','1','checked',$isCheckedIsShipping);}]
                </div>
                <div class="col-md-3">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__("Adresse de facturation"),'is_billing','1','checked',$isCheckedIsBilling);}]
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
            [{!$this->doorGets->Form->close();}]
            
        </div>
    </div>
</div>
