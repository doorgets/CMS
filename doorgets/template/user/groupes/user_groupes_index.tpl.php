<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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
    <div class="doorGets-rubrique-center-title">
        
    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a href="?controller=groupes&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Créer un groupe')!}]</a></span>
            [{?((in_array('attributes', $this->doorGets->user['liste_module_interne']) && !SAAS_ENV)
            || (in_array('attributes', $this->doorGets->user['liste_module_interne']) && SAAS_ENV && SAAS_TRADUCTION) ):}]
                <span class="create" >
                    <a href="?controller=attributes"><b class="glyphicon glyphicon-pushpin"></b>
                        [{!$this->doorGets->__('Attributs')!}]
                    </a>
                </span>
            [?]
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <b class="glyphicon glyphicon-cloud"></b> [{!$this->doorGets->__('Groupes')!}]
        </legend>
        [{?($cAll != 0):}]
            [{!$block->getHtml()!}]
        [??]
            <div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun groupe")!}].</span>
        [?]
    </div>
</div>