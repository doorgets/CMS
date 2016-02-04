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
        [{!$this->doorGets->__('Mot de passe oublié')!}]
    </h3>
    <div>
        [{?($fireWallIp['level'] < 6):}]
            <div>
                [{?($isOkForActivation):}]
                    <div class="alert alert-success">
                        [{!$this->doorGets->__("Un email vient de vous être envoyé pour réinitialiser votre mot de passe")!}].
                    </div>
                [??]
                    <div class="alert alert-info">
                        [{!$this->doorGets->__("Indiquez-nous l'email du compte dont vous avez oublié le mot de passe")!}],
                        [{!$this->doorGets->__("nous vous y enverrons un email pour réinitialiser le mot de passe")!}] :
                    </div>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->open('post','','')!}]
                    [{!$this->doorGets->Form->input($this->doorGets->__('Adresse email'),'email')!}]
                     <div class="separateur-tb"></div>
                    <label >[{!$this->doorGets->__("Êtes-vous un humain, ou spammeur ?")!}] </label> 
                    [{!$this->doorGets->Form->captcha()!}]
                    <div class="separateur-tb"></div>
                    <div class="text-center">
                        [{!$this->doorGets->Form->submit($this->doorGets->__('Valider'))!}]
                    </div>
                    [{!$this->doorGets->Form->close()!}]
                [?]
            </div>
        [??]
            <div class="alert alert-danger text-center" role="alert">
                <b class="glyphicon glyphicon-warning-sign"></b>
                [{!$this->doorGets->__('Suite à de nombreuses tentatives de connexion sans succès vous devez patienter')!}] 
                <b>[{!$fireWallIp['time_stop']!}]</b>
                [{?($fireWallIp['time_stop'] > 1 ):}] [{!$this->doorGets->__('minutes')!}] [??] [{!$this->doorGets->__('minutes')!}] [?] !
            </div>
            <div class="alert alert-info text-center" role="alert">
                [{!$this->doorGets->__('Adresse IP')!}] : [{!$fireWallIp['adresse_ip']!}]
            </div>
        [?]

    </div>
</div>
<div class="text-center ">
    
    <a href="?controller=authentification" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-user"></b> [{!$this->doorGets->__("Se connecter")!}]</a>
    [{?($countGroupes > 0):}]
        <br />
        [{?($countGroupes === 1):}]
            <a href="?controller=authentification&action=register" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-star"></b> [{!$this->doorGets->__("S'inscrire")!}]</a>
        [??]
            [{/($groupes as $id => $groupe):}]
                <a href="?controller=authentification&action=register&groupe=[{!$groupe['uri']!}]" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-star"></b> [{!$this->doorGets->__("S'inscrire en tant que")!}] [{!$groupe['title']!}]</a>
                <br />
            [/]
        [?]
    [?]
    <br />
    <a href="[{!URL!}][{?(count($this->doorGets->allLanguagesWebsite > 1)):}][{!'t/'.$this->doorGets->myLanguage.'/'!}][?]" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-home"></b> [{!$this->doorGets->__('Accéder au site')!}]</a>
</div>
