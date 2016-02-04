<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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
                <b class="glyphicon glyphicon-cloud-upload"></b> [{!$this->doorGets->__("Cloud")!}]
                <small>[{!$this->doorGets->__("Configuration du Cloud")!}].</small>
            </h2>

        </div>
        [{!$this->doorGets->Form->open('post')!}]
        <div class="row">
            <div class="col-md-6">
                <h3>[{!$this->doorGets->__("Base de données")!}] (ROOT)</h3>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Hôte'),'saas_host','text',$this->doorGets->configWeb['saas_host'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Utilisateur'),'saas_user','text',$this->doorGets->configWeb['saas_user'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe'),'saas_password','password',$this->doorGets->configWeb['saas_password'])!}]
                <div class="separateur-tb"></div>
            </div>
            <div class="col-md-6">
                <h3>[{!$this->doorGets->__("Système de fichier")!}]</h3>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Archive'),'saas_archive','text',$this->doorGets->configWeb['saas_archive'])!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Position'),'saas_position','text',$this->doorGets->configWeb['saas_position'])!}]
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
