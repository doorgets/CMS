<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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
                <b class="glyphicon glyphicon-envelope"></b> [{!$this->doorGets->__('Adresse')!}] & [{!$this->doorGets->__('Contact')!}]
                <small>[{!$this->doorGets->__('Configurer les informations de contact de votre site')!}].</small>
            </h2>
        </div>

        [{!$this->doorGets->Form->open('post')!}]
            <div class="row">
                <div class="col-md-6">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Addresse email').' <span class="cp-obli">*</span>','email','text',$this->doorGets->configWeb['email'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone fixe').'<br />','tel_fix','text',$this->doorGets->configWeb['tel_fix'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone mobile').'<br />','tel_mobil','text',$this->doorGets->configWeb['tel_mobil'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone fax').'<br />','tel_fax','text',$this->doorGets->configWeb['tel_fax'])!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="col-md-6">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Pays').'<br />','pays','text',$this->doorGets->configWeb['pays'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Ville').'<br />','ville','text',$this->doorGets->configWeb['ville'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Code Postal').'<br />','codepostal','text',$this->doorGets->configWeb['codepostal'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Adresse').'<br />','adresse','text',$this->doorGets->configWeb['adresse'])!}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
        [{!$this->doorGets->Form->close()!}]
        
    </div>
</div>
