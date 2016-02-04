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
                <b class="glyphicon glyphicon-globe"></b> [{!$this->doorGets->__('Langue')!}] / [{!$this->doorGets->__('Heure')!}]
                <small>[{!$this->doorGets->__('Configurer les langues du site')!}].</small>
            </h2>
        </div>
        [{!$this->doorGets->Form->open('post')!}]
        [{!$this->doorGets->Form->select($this->doorGets->__('Zone horaire').' : ','horaire',$this->doorGets->getArrayForms('times_zone'),$this->doorGets->configWeb['horaire'])!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->select($this->doorGets->__('Langue du backoffice').' : ','lg',$arrLangue,$this->doorGets->configWeb['langue'])!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->select($this->doorGets->__('Langue du FrontOffice par defaut').' : ','lg_front',$arrLangue,$this->doorGets->configWeb['langue_front'])!}]
        <div class="separateur-tb"></div>
        [{?(!SAAS_ENV || (SAAS_ENV && SAAS_CONFIG_LANGUE)):}]
        <label>[{!$this->doorGets->__('Langues actives sur le FrontOffice')!}] :</label>
        <ul>
        [{/($arrLangue as $k=>$v):}]
            [{$isChecked = '';}]
            <li>
                [{?( array_key_exists($k,$this->doorGets->configWeb['langue_groupe']) ):}][{ $isChecked = 'checked'; }][?]
                [{!$this->doorGets->Form->checkbox('<img src="'.URL.'skin/img/drap_'.$k.'.png" class="ico-15"> '.$v,'lg_groupe_'.$k,$k,$isChecked)!}]
            </li>
        [/]
        </ul>
        <div class="separateur-tb"></div>
        [?]
        <div class="text-center">
            [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
