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

unset($aActivation[0]);
$urlLangueTraduction = '';
$cLanguageWebsite = count($this->doorGets->allLanguagesWebsite);
if ($cLanguageWebsite > 1) { $urlLangueTraduction = 't/'.$lgActuel.'/'; }

?>
[{!$this->doorGets->Form->open('post','');}]
<div >
    <ul class="nav nav-tabs">
        <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
        <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__("Galery d'image")!}]</a></li>
        <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__("META")!}]</a></li>
        [{?($is_modo):}]
            <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Commentaire')!}]</a></li>
            <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Paramètres')!}]</a></li>
            <li role="presentation" ><a data-toggle="tab" href="#tabs-6">[{!$this->doorGets->__('Version')!}]</a></li>
        [?]
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tabs-1">
            [{?($is_modo):}]
                <div class="col-md-3">
                    [{!$this->doorGets->Form->select($this->doorGets->__('Statut'),'active',$aActivation,$isContent['active']);}]
                </div>
            [?] 
            <div class="row">
                <div class="col-md-3">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre','text',$isContent['titre']);}]
                </div>

                <div class="col-md-5">
                [{?($is_modo):}]
                    [{!$this->doorGets->Form->input($this->doorGets->__("Url simplifiée").' <span class="cp-obli">*</span> <small style="font-weight:100; ">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','text',$isContent['uri']);}]
                [??]
                    [{!$this->doorGets->Form->input($this->doorGets->__("Url simplifiée").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','hidden',$isContent['uri']);}]  
                [?]
                </div> 
            </div> 
            <div class="separateur-tb"></div>
            [{?($isContent['active'] === '2'):}]
                <div class="alert alert-success"><a target="blank" href="[{!URL.$urlLangueTraduction.'?'.$moduleInfos['uri'].'='.$isContent['uri']!}]">[{!URL.$urlLangueTraduction.'?'.$moduleInfos['uri'].'='!}]<span>[{!$isContent['uri']!}]</span> <b class="glyphicon glyphicon-share-alt"></b></a></div>
            [?]