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
<div class="text-center">
    <a href="[{!BASE!}]" class="logo-auth" title="[{!$this->doorGets->__('Accéder au site')!}]"><img src="[{!BASE!}]skin/img/logo_auth.png"></a>
</div>
<div class="doorGets-box-login">
    <h3 class="doorGets-title">
        [{!$this->doorGets->__('Nouveau mot de passe')!}]
        <small class="right" style="padding: 4px;">
            &#187; <a href="?controller=authentification&action=register">S'inscrire</a>
            &#187; <a href="?controller=authentification">Se connecter</a>
        </small>
    </h3>
    <div>
        <div class="separateur-tb"></div>
        [{?($isOkForActivation):}]
            [{?($this->doorGets->Form->isSended):}]
                <div>
                    [{!$this->doorGets->__("C'est bon")!}] ! [{!$this->doorGets->__("Vous pouvez maintenant vous connecter")!}].
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->__("Cliquez ici")!}] : <a href="?controller=authentification">[{!$this->doorGets->__("Se connecter maintenant")!}]</a>
                </div>
            [??]
                [{!$this->doorGets->Form->open('post','','')!}]
                [{!$this->doorGets->Form->input($this->doorGets->__('Adresse électronique'),'email')!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe'),'password','password')!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->input($this->doorGets->__('Confirmez votre mot de passe'),'re-password','password')!}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->submit($this->doorGets->__('Valider'))!}]
                [{!$this->doorGets->Form->close()!}]
            [?]
        [??]
            <div>
                [{!$this->doorGets->__("Désolé")!}] ! [{!$this->doorGets->__("le code fourni est peut être incorrect ou a expiré")!}].
                <div class="separateur-tb"></div>
                [{!$this->doorGets->__("Cliquez ici")!}] : <a href="?controller=authentification&action=forget">[{!$this->doorGets->__("Redéfinissez votre mot de passe")!}].</a>
                <div class="separateur-tb"></div>
            </div>
        [?]
    </div>
</div>
