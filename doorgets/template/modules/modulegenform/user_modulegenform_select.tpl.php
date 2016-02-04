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
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=[{!$nameController!}]&uri=[{!$this->doorGets->Uri!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" >
                <a href="?controller=[{!$nameController!}]&uri=[{!$this->doorGets->Uri!}]&action=delete&id=[{!$isContent['id']!}]"  title="[{!$this->doorGets->__("Supprimer")!}]" >
                <b class="glyphicon glyphicon-remove"></b>
                [{!$this->doorGets->__("Supprimer")!}]</a>
            </span>
            <span class="create">
                <small>[{!GetDate::in($isContent['date_creation'],1,$this->doorGets->myLanguage)!}]</small>
            </span>
            <img src="[{!BASE_IMG.'mod_genform.png'!}]" title="[{!$this->doorGets->__("Formulaire")!}]" class="doorGets-img-ico px25" />[{!$moduleInfos['titre']!}]
             / <small>[{!$isContent['id']!}]</small> 
            
            
        </legend>
        <ul class="pager">
            <li class="previous [{?(empty($urlPrevious)):}]disabled[?]"><a href="[{!$urlPrevious!}]">&larr; [{!$this->doorGets->__('Précèdent')!}]</a></li>
            <li class="next [{?(empty($urlNext)):}]disabled[?]"><a href="[{!$urlNext!}]">[{!$this->doorGets->__('Suivant')!}] &rarr;</a></li>
        </ul>
        <div style="width: 100%;padding: 10px 0 0;border-bottom: solid 1px #ccc;overflow: hidden;">
            [{/($dataContent as $label=>$value):}]
            <div class="panel panel-default">
                <div class="panel-heading">[{!$label!}]</div>
                <div class="panel-body">
                  [{!$value!}]
                </div>
            </div>
            [/]
        </div>
    </div>
</div>