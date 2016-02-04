<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 5.1 - 11 November, 2013
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
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
<div class="text-center">
    <a href="[{!BASE!}]" class="logo-auth" title="[{!$this->doorGets->__('Accéder au site')!}]"><img src="[{!BASE!}]skin/img/logo_auth.png"></a>
</div>
<div class="doorGets-box-login">
    <h3 class="doorGets-title">[{!$this->doorGets->__("Activation de votre compte")!}]</h3>
    <div>
        <div class="separateur-tb"></div>
        [{?($isOkForActivation):}]
            <div class="alert alert-success  text-center">
                <h2><strong>[{!$this->doorGets->__("C'est bon")!}] !</strong> <br /><small>[{!$this->doorGets->__("Vous êtes maintenant membre")!}].</small></h2>
            </div>
        [??]
            <div class="alert alert-danger text-center">
                <h2><strong>[{!$this->doorGets->__("Désolé")!}] !</strong> <br /><small>[{!$this->doorGets->__("le code fourni est peut être incorrect ou a expiré")!}].</small></h2>
            </div>
        [?]
    </div>
</div>
<div class="text-center ">
    <br />
    <a href="?controller=authentification" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-user"></b> [{!$this->doorGets->__("Se connecter")!}]</a>
    <br />
    <a href="[{!URL!}][{?(count($this->doorGets->allLanguagesWebsite > 1)):}][{!'t/'.$this->doorGets->myLanguage.'/'!}][?]" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-home"></b> [{!$this->doorGets->__('Accéder au site')!}]</a>
</div>
