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
                <b class="glyphicon glyphicon-stats"></b> [{!$this->doorGets->__('Google Analytics')!}]
                <small>[{!$this->doorGets->__('Connecter Google Analytics à votre site')!}].</small>
            </h2>
        </div>
        [{!$this->doorGets->Form->open('post')!}]
        [{!$this->doorGets->Form->input($this->doorGets->__('Votre code Google Analytics').'<br />','analytics','text',$this->doorGets->configWeb['analytics'])!}]
        <div class="separateur-tb"></div>
        <div>
            <p>
                [{!$this->doorGets->__("Laissez vide pour désactiver l'analytics")!}]
            </p>
            <div class="separateur-tb"></div>
            <p>
                [{!$this->doorGets->__("Google Analytics est un service d'analyse de sites web gratuit proposé par Google")!}]
            </p>
            <p>
                [{!$this->doorGets->__("Créer votre compte gratuitement sur")!}] :
                <a target="blank" href="http://www.google.com/analytics/">http://www.google.com/analytics/</a>
            </p>
        </div>
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
