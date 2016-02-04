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
$urlContent = URL.'?'.$isContent['uri_module'].'='.$isContent['uri_content'];
$cWebiste = $this->doorGets->allLanguagesWebsite;
$iWebsite = count($cWebiste);
if ($iWebsite > 1) {
    $urlContent = URL.'t/'.$isContent['langue'].'/?'.$isContent['uri_module'].'='.$isContent['uri_content'];
}


?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=[{!$this->doorGets->controllerNameNow()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" ><a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&action=delete&id=[{!$isContent['id']!}]"  title="[{!$this->doorGets->__("Supprimer")!}]" >
                <b class="glyphicon glyphicon-remove red"></b>
                [{!$this->doorGets->__("Supprimer")!}]
            </a></span>
            <b class="glyphicon glyphicon-comment"></b> <a href="?controller=comment">[{!$this->doorGets->__('Commentaire')!}]</a>
             / [{!$this->doorGets->__("Modération")!}]
        </legend>
        <ul class="pager">
            <li class="previous [{?(empty($urlPrevious)):}]disabled[?]"><a href="[{!$urlPrevious!}]">&larr; [{!$this->doorGets->__('Précèdent')!}]</a></li>
            <li class="next [{?(empty($urlNext)):}]disabled[?]"><a href="[{!$urlNext!}]">[{!$this->doorGets->__('Suivant')!}] &rarr;</a></li>
        </ul>
        <div class="separateur-tb"></div>
        <div>
            <blockquote>
                [{!$formActivation!}]
            </blockquote>
        </div>
        <div class="separateur-tb"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    [{!$isContent['email']!}] / [{!$isContent['adress_ip']!}]
                </div>
                [{!$this->doorGets->__('Par')!}] : <b>[{!$isContent['nom']!}]</b>
            </div>
            <div class="panel-body">
                <p>[{!$isContent['comment']!}]</p>
            </div>
            <div class="panel-footer">
                [{!$this->doorGets->__('Url de la page')!}]  : <b><a href="[{!$urlContent!}]" title="[{!$urlContent!}]" target="_blank">[{!$urlContent!}]</a></b>
            </div>
        </div>
    </div>
</div>