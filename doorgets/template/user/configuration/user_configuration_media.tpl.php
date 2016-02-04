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
                <b class="glyphicon glyphicon-picture"></b> [{!$this->doorGets->__('Logo')!}] & [{!$this->doorGets->__('Icône')!}]
                <small>[{!$this->doorGets->__("Modifier le logo et l'icône de votre site")!}].</small>
            </h2>
        </div>
        
        [{!$this->doorGets->Form['configuration_media_logo']->open('post')!}]
        <div class="doorGets-configuration-box-media">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>(FrontOffice) [{!$this->doorGets->__('Choisir une image pour votre logo').' :</b> '.$this->doorGets->__('Format .PNG seulement')!}]
                </div>
                <div class="panel-body">
                    <img src="[{!BASE_IMG.'logo.png'!}]" class="doorGets-img-ico" >
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['configuration_media_logo']->file('','img_logo')!}]
                </div>
                <div class="panel-footer">
                    [{!$this->doorGets->Form['configuration_media_logo']->submit($this->doorGets->__('Sauvegarder'))!}]
                </div>
            </div>
        </div>
        [{!$this->doorGets->Form['configuration_media_logo']->close()!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form['configuration_media_logo_backoffice']->open('post')!}]
        <div class="doorGets-configuration-box-media">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>(BackOffice) [{!$this->doorGets->__('Choisir une image pour votre logo').' :</b> '.$this->doorGets->__('Format .PNG seulement')!}]
                </div>
                <div class="panel-body">
                    <img src="[{!BASE_IMG.'logo_backoffice.png'!}]" class="doorGets-img-ico" >
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['configuration_media_logo_backoffice']->file('','img_logo')!}]
                </div>
                <div class="panel-footer">
                    [{!$this->doorGets->Form['configuration_media_logo_backoffice']->submit($this->doorGets->__('Sauvegarder'))!}]
                </div>
            </div>
        </div>
        [{!$this->doorGets->Form['configuration_media_logo_backoffice']->close()!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form['configuration_media_logo_authentification']->open('post')!}]
        <div class="doorGets-configuration-box-media">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>(Authentification) [{!$this->doorGets->__('Choisir une image pour votre logo').' :</b> '.$this->doorGets->__('Format .PNG seulement')!}]
                </div>
                <div class="panel-body">
                    <img src="[{!BASE_IMG.'logo_auth.png'!}]" class="doorGets-img-ico" >
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['configuration_media_logo_authentification']->file('','img_logo')!}]
                </div>
                <div class="panel-footer">
                    [{!$this->doorGets->Form['configuration_media_logo_authentification']->submit($this->doorGets->__('Sauvegarder'))!}]
                </div>
            </div>
        </div>
        [{!$this->doorGets->Form['configuration_media_logo_authentification']->close()!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form['configuration_media_logo_mail']->open('post')!}]
        <div class="doorGets-configuration-box-media">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>(Mail) [{!$this->doorGets->__('Choisir une image pour votre signature mail').' :</b> '.$this->doorGets->__('Format .PNG seulement')!}]
                </div>
                <div class="panel-body">
                    <img src="[{!BASE_IMG.'logo_mail.png'!}]" class="doorGets-img-ico" >
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['configuration_media_logo_mail']->file('','img_logo')!}]
                </div>
                <div class="panel-footer">
                    [{!$this->doorGets->Form['configuration_media_logo_mail']->submit($this->doorGets->__('Sauvegarder'))!}]
                </div>
            </div>
        </div>
        [{!$this->doorGets->Form['configuration_media_logo_mail']->close()!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form['configuration_media_icone']->open('post')!}]
        <div class="doorGets-configuration-box-media">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>[{!$this->doorGets->__('Choisir une image pour votre icône').' :</b> '.$this->doorGets->__('Format .ICO seulement')!}]
                </div>
                <div class="panel-body">
                    <img src="[{!URL.'favicon.ico'!}]" class="doorGets-img-ico" >
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['configuration_media_logo']->file('','icone_logo')!}]
                </div>
                <div class="panel-footer">
                    [{!$this->doorGets->Form['configuration_media_icone']->submit($this->doorGets->__('Sauvegarder'))!}]
                </div>
            </div>
        </div>
        [{!$this->doorGets->Form['configuration_media_icone']->close()!}]
        
    </div>
</div>
