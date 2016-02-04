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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=modules"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <b class="glyphicon glyphicon-asterisk"></b> <a href="?controller=modules">[{!$this->doorGets->__('Module')!}] </a> 
             / [{!$this->doorGets->__("Choisir un type de module")!}]
        </legend>
        [{?(!empty($listeModules)):}]
        <div class="row">
            
            [{/($listeModules as $uri_module => $label):}]
            <div class="col-md-3 clearfix module-list-type-show ">
                
                <a class="no-underline" href="?controller=modules&action=add[{!$uri_module!}]">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <h3 class="panel-title"><img src="[{!$listeInfos[$uri_module]['image']!}]" class="px25" /> [{!$label!}]</h3>
                            
                        </div>
                        <div class="panel-body text-center">
                            
                            [{!$listeInfos[$uri_module]['description']!}]
                        </div>
                    </div>
                </a>
                
            </div>
            [/]
        </div>
        [??]
            <div class="alert alert-info text-center">[{!$this->doorGets->__("Vous n'avez pas de module disponible")!}]</div>
        [?]
        <legend>
            [{!$this->doorGets->__("Ou choisir un type de widget")!}]
        </legend>
        [{?(!empty($listeWidgets)):}]
        <div class="row">
            [{/($listeWidgets as $uri_module => $label):}]
            <div class="col-md-3 clearfix module-list-type-show ">
                
                <a class="no-underline" href="?controller=modules&action=add[{!$uri_module!}]">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <h3 class="panel-title"><img src="[{!$listeInfos[$uri_module]['image']!}]" class="px25" /> [{!$label!}]</h3>
                            
                        </div>
                        <div class="panel-body text-center">
                            
                            [{!$listeInfos[$uri_module]['description']!}]
                        </div>
                    </div>
                </a>
            </div>
            [/]
        </div>
        [??]
            <div class="alert alert-info text-center">[{!$this->doorGets->__("Vous n'avez pas de widget disponible")!}]</div>
        [?]
    </div>
</div>