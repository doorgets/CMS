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

$login = (ACTIVE_DEMO)?'demo@doorgets.com':'';
$password = (ACTIVE_DEMO)?'doorgets':'';
$lLogin = (ACTIVE_DEMO)?': '.$login:'';
$lPassword = (ACTIVE_DEMO)?' : '.$password:'';

?>
<div class="text-center">
    <a href="[{!BASE!}]" class="logo-auth" title="[{!$this->doorGets->__('Accéder au site')!}]"><img src="[{!BASE!}]skin/img/logo_auth.png"></a>
</div>
<div class="doorGets-box-login">
    [{?(count($this->doorGets->allLanguagesWebsite) > 1):}]
    <div  class="btn-group pull-right btn-langue-change">
        <a  class="btn btn-default dropdown-toggle no-loader" data-toggle="dropdown" href="#">
            [{!$this->doorGets->allLanguagesWebsite[$this->doorGets->myLanguage]!}] 
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" role="menu">
            [{/($this->doorGets->allLanguagesWebsite as $key=>$label):}]
                <li [{?($this->doorGets->myLanguage === $key):}]class="active"[?] >
                    <a class="navbut" href="[{!URL_USER.$key.'/?controller=authentification'}]">
                        [{!$label!}]
                    </a>
                </li>
            [/]
        </ul>
    </div>
    [?]
    <h3 class="doorGets-title">
        [{!$this->doorGets->__('Identifiez-vous')!}]
    </h3>
    [{?($fireWallIp['level'] < 6):}]
        <div>
            [{?($fireWallIp['level'] > 1):}]
            <div class="alert alert-danger" role="alert">
                <b class="glyphicon glyphicon-warning-sign"></b>
                [{!$this->doorGets->__("Nombre de tentatives restantes")!}] <span class="badge">[{!( 6 - $fireWallIp['level'])!}]</span>
            </div>
            [?]
            [{!$this->doorGets->Form->open('post','','')!}]

            [{?($this->doorGets->configWeb['oauth_google_active']):}]
            <a href="[{!BASE!}]/oauth2/google/login/" class="google-sigin"><i class="fa fa-google"></i>  Google</a> 
            <div class="separateur-tb"></div>
            [?]

            [{?($this->doorGets->configWeb['oauth_facebook_active']):}]
            <a href="[{!BASE!}]/oauth2/facebook/login/" class="facebook-sigin"><i class="fa fa-facebook"></i>  Facebook</a> 
            <div class="separateur-tb"></div>
            [?]

            [{!$this->doorGets->Form->input('<b class="glyphicon glyphicon-user"></b> '.$this->doorGets->__('Adresse électronique')." $lLogin",'login','text',$login)!}]
            <br />
            [{!'<small class="right"><a href="?controller=authentification&action=forget">'.$this->doorGets->__('Mot de passe oublié').' ?</a></small>'.$this->doorGets->Form->input('<b class="glyphicon glyphicon-lock"></b> '.$this->doorGets->__('Mot de passe')." $lPassword",'password','password',$password)!}]
            
            <div class="text-center">
                [{!$this->doorGets->Form->submit($this->doorGets->__('Se connecter'),'','btn btn-lg btn-info')!}]
            </div>
            [{!$this->doorGets->Form->close()!}]
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
<div class="text-center ">
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
    <a href="[{!URL!}][{?(count($this->doorGets->allLanguagesWebsite > 1)):}][{!'t/'.$this->doorGets->myLanguage.'/'!}][?]" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-home"></b> [{!$this->doorGets->__('Accéder au site')!}]</a>
</div>
