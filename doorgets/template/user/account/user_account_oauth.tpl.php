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

$langueZone = $this->doorGets->langueZone;
$lgCurrentUrl = (!empty($langueZone)) ? $langueZone : '';
$currentUrl = urlencode(trim(URL.'dg-user/'.$lgCurrentUrl.'/?controller=account&action=oauth'));

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <b class="glyphicon glyphicon-envelope"></b> [{!$this->doorGets->__('Sécurité')!}] 
        </legend>
        <div class="width-listing">
            [{!$htmlAccountRubrique!}]
            <div class="content-user-sercurity">
                <h3> [{!$this->doorGets->__('Connexion avec Google')!}]  </h3>
                <div class="separateur-tb"></div>
                [{?($isUserGoogle):}]
                    <p class="alert alert-success text-center">  
                        Id Google: <b>[{!$UserGoogleEntity->getIdGoogle()!}]</b>
                    </p>
                [??]
                    [{?($this->doorGets->configWeb['oauth_google_active']):}]
                    <p class="alert alert-danger text-center">  
                        <a href="[{!BASE!}]/oauth2/google/connexion/?backurl=[{!$currentUrl!}]" class="btn btn-info">[{!$this->doorGets->__('Établir la connexion')!}]</a>
                    </p>
                    [??]
                    <p class="alert alert-info text-center">  
                        [{!$this->doorGets->__("La connexion n'est pas disponible")!}]
                    </p>
                    [?]
                [?]
                <h3>[{!$this->doorGets->__('Connexion avec Facebook')!}] </h3>
                <div class="separateur-tb"></div>
                [{?($isUserFacebook):}]
                    <p class="alert alert-success text-center">  
                        Id Facebook: <b>[{!$UserFacebookEntity->getIdFacebook()!}]</b>
                    </p>
                [??]
                    [{?($this->doorGets->configWeb['oauth_google_active']):}]
                    <p class="alert alert-danger text-center">  
                        <a href="[{!BASE!}]/oauth2/facebook/connexion/?backurl=[{!$currentUrl!}]" class="btn btn-info">[{!$this->doorGets->__('Établir la connexion')!}]</a>
                    </p>
                    [??]
                    <p class="alert alert-info text-center">  
                        [{!$this->doorGets->__("La connexion n'est pas disponible")!}]
                    </p>
                    [?]
                [?]            
            </div>
        </div>
    </div>
</div>