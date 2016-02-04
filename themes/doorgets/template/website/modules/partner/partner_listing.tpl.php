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

 
    /*
    * Variables :
    *
    *
        $isContents

    */
 
?>
<!-- doorGets:start:modules/partner/partner_listing -->
<div class="doorGets-partner-listing doorGets-module-[{!$Website->getModule()!}]">
    
    <div>
        <div class="page-header">
            [{?($this->userPrivilege['add']):}]
            <div class="btn-group pull-right btn-add-content">
                <a href="[{!$urlAdd!}]" class="btn btn-success btn-large">
                    <b class="glyphicon glyphicon-plus"></b> 
                    <span>[{!$Website->__('Ajouter un partenaire')!}]</span>
                </a>
            </div>
            [?]
            <p>
                <h2>[{!$Website->__('Nos Partenaires')!}]</h2>
            </p>
        </div>
        <div class="row list-partner [{?($i===$iC):}]list-partner-last[?] ">
        [{?(
            ( !$this->modulePrivilege['public_module'] && $this->userPrivilege['show'] )
            || $this->modulePrivilege['public_module']
        ):}]
            [{/($isContents as $content):}]

                [{$urlEdition   = URL_USER.$Website->_lgUrl.'?controller=modulepartner&uri='.$Website->getModule().'&action=edit&id='.$content['id_content'].'&lg='.$Website->getLangueTradution().'&back='.$urlAfterAction;}]
                [{$urlDelete    = URL_USER.$Website->_lgUrl.'?controller=modulepartner&uri='.$Website->getModule().'&action=delete&id='.$content['id_content'].'&lg='.$Website->getLangueTradution().'&back='.$urlAfterAction;}]
                
                <div class="col-sm-6 col-md-4">
                    [{?( $content['edit'] || $content['delete'] || $content['modo']):}]
                    <div class="btn-group btn-front-edit-[{!$allModules[$Website->getModule()]['all']['uri']!}] navbar-right pull-right z-max-index" >
                        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                            <b  class="glyphicon glyphicon-cog"></b> [{!$Website->__('Action')!}]
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            [{?( $content['edit'] || $content['modo'] ):}]
                                <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$Website->__('Modifier')!}]</a></li>
                            [?]
                            [{?( $content['delete'] || $content['modo'] ):}]
                                <li class="divider"></li>
                                <li><a href="[{!$urlDelete!}]" class="navbut"><b class="glyphicon glyphicon-remove"></b> [{!$Website->__('Supprimer')!}]</a></li>
                            [?] 
                        </ul>
                    </div>
                    [?]
                    <div class="thumbnail">
                        <img src="[{!URL.'data/'.$Website->getModule().'/'.$content['image']!}]" alt="[{!$content['titre']!}]">
                        <div class="caption">
                            <h3>[{!$content['titre']!}]</h3>
                            <p>[{!$content['description']!}]</p>
                            <p><b class="glyphicon glyphicon-share-alt"></b> <a href="[{!$content['url']!}]" title="[{!$content['url']!}]" target="blank" >[{!$content['url']!}] </a></p>
                        </div>
                    </div>
                </div>
            
            [{$i++;}]
            [/]
        [{???(empty($Website->isUser)):}]
            <div class="alert alert-danger">
                [{!$Website->__('Vous devez vous connecter pour afficher ce contenu')!}] : <a href="[{!$this->loginUrl!}]&back=[{!urlencode($Website->getCurrentUrl())!}]">Se connecter</a> ou <a href="[{!$this->registerUrl!}]&back=[{!urlencode($Website->getCurrentUrl())!}]">S'inscrire</a>
            </div>
        [??]
            <div class="alert alert-danger">
                [{!$Website->__('Vous ne pouvez pas voir ce contenu')!}]
            </div>
        [?]
        </div>
    </div>
</div>
<!-- doorGets:end:modules/partner/partner_listing -->
