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

$img['facebook']    = '<img  src="'.BASE_IMG.'icone_facebook.png" > ';
$img['twitter']     = '<img  src="'.BASE_IMG.'icone_twitter.png" > ';
$img['youtube']     = '<img  src="'.BASE_IMG.'icone_youtube.png" > ';
$img['google']      = '<img  src="'.BASE_IMG.'icone_google.png" > ';
$img['pinterest']   = '<img  src="'.BASE_IMG.'icone_pinterest.png" > ';
$img['linkedin']    = '<img  src="'.BASE_IMG.'icone_linkedin.png" > ';
$img['myspace']     = '<img  src="'.BASE_IMG.'icone_myspace.png" > ';

$nFace      = $img['facebook'].'http://www.facebook.com/<span style="color:#000099;">'.$this->doorGets->configWeb['facebook'].'</span>';
$nTwitter   = $img['twitter'].'http://www.twitter.com/<span style="color:#000099;">'.$this->doorGets->configWeb['twitter'].'</span>';
$nYoutube   = $img['youtube'].'http://www.youtube.com/user/<span style="color:#000099;">'.$this->doorGets->configWeb['youtube'].'</span>';
$nGoogle    = $img['google'].'https://plus.google.com/u/0/<span style="color:#000099;">'.$this->doorGets->configWeb['google'].'</span>';
$nPinterest = $img['pinterest'].'https://www.pinterest.com/<span style="color:#000099;">'.$this->doorGets->configWeb['pinterest'].'</span>';
$nLinkedin  = $img['linkedin'].'http://www.linkedin.com/in/<span style="color:#000099;">'.$this->doorGets->configWeb['linkedin'].'</span>';
$nMyspace   = $img['myspace'].'http://www.myspace.com/<span style="color:#000099;">'.$this->doorGets->configWeb['myspace'].'</span>';

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
                <b class="glyphicon glyphicon-link"></b> [{!$this->doorGets->__('Réseaux sociaux')!}]
                <small>[{!$this->doorGets->__('Connecter les réseaux sociaux à votre site')!}].</small>
            </h2>
        </div>
        [{!$this->doorGets->Form->open('post')!}]
            <div class="row">
                <div class="col-md-6">
                    [{!$this->doorGets->Form->input($nFace,'facebook','text',$this->doorGets->configWeb['facebook'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($nTwitter,'twitter','text',$this->doorGets->configWeb['twitter'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($nYoutube,'youtube','text',$this->doorGets->configWeb['youtube'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($nGoogle,'google','text',$this->doorGets->configWeb['google'])!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="col-md-6">
                    [{!$this->doorGets->Form->input($nPinterest,'pinterest','text',$this->doorGets->configWeb['pinterest'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($nLinkedin,'linkedin','text',$this->doorGets->configWeb['linkedin'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($nMyspace,'myspace','text',$this->doorGets->configWeb['myspace'])!}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
            <div class="text-center">
                [{! $this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
