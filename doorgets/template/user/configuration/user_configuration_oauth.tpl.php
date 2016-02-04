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
                <b class="glyphicon glyphicon-magnet"></b> OAuth2
                <small>[{!$this->doorGets->__('Configurer les informations de connexion via OAuth2')!}].</small>
            </h2>
        </div>
        [{!$this->doorGets->Form->open('post')!}]
            <div class="panel panel-default">
                <div class="panel-heading">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer Google Singin'),'oauth_google_active',1,$isGoogleActive)!}]
                </div>
                <div class="panel-body">
                    <label>[{!$this->doorGets->__('Origines JavaScript autorisées')!}]</label> : [{!URL!}]
                    <div class="separateur-tb"></div>
                    <label>[{!$this->doorGets->__('URI de redirection autorisés')!}]</label> : [{!URL!}]oauth2/google/connexion/
                    <div class="separateur-tb"></div>
                    <label>[{!$this->doorGets->__('URI de redirection autorisés')!}]</label> : [{!URL!}]oauth2/google/login/
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Google Id').' <span class="cp-obli">*</span>','oauth_google_id','text',$this->doorGets->configWeb['oauth_google_id'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Google Secret').' <span class="cp-obli">*</span>','oauth_google_secret','text',$this->doorGets->configWeb['oauth_google_secret'])!}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer Facebook Singin'),'oauth_facebook_active',1,$isFacebookActive)!}]
                </div>
                <div class="panel-body">
                    <label>[{!$this->doorGets->__('Origines JavaScript autorisées')!}]</label> : [{!URL!}]
                    <div class="separateur-tb"></div>
                    <label>[{!$this->doorGets->__('URI de redirection autorisés')!}]</label> : [{!URL!}]oauth2/facebook/connexion/
                    <div class="separateur-tb"></div>
                    <label>[{!$this->doorGets->__('URI de redirection autorisés')!}]</label> : [{!URL!}]oauth2/facebook/login/
                    <div class="separateur-tb"></div>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Facebook Id').' <span class="cp-obli">*</span>','oauth_facebook_id','text',$this->doorGets->configWeb['oauth_facebook_id'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Facebook Secret').' <span class="cp-obli">*</span>','oauth_facebook_secret','text',$this->doorGets->configWeb['oauth_facebook_secret'])!}]
                </div>
            </div>

            <div class="text-center">
                [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
        [{!$this->doorGets->Form->close()!}]
        
    </div>
</div>
