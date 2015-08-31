<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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
            <span class="create" > <a href="?controller=modules&action=type"class="violet" ><b class="glyphicon glyphicon-plus"></b> [{!$this->doorGets->__('Créer un module')!}]</a></span>
            <b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__('Modules')!}]
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
        </legend>
        
        [{?($cAll === 0 && $callWidgets === 0):}]
            <div class="alert alert-info text-center">[{!$this->doorGets->__("Aucun module")!}].</span>
        [??]
            <div class="panel panel-default module-list-show">
                <div class="panel-heading">
                    <div class="title"><b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__("Modules")!}]</div>
                </div>
                <div class="panel-body">
                    [{?($cAll != 0):}]
                        [{!$block->getHtml()!}]
                    [??]
                        <div class="alert alert-info text-center">[{!$this->doorGets->__("Aucun module")!}].</span>
                    [?]
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="panel panel-default module-list-show">
                <div class="panel-heading">
                    <div class="title"><b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__("Widgets")!}]</div>
                </div>
                <div class="panel-body">
                    [{?($callWidgets != 0):}]
                        [{!$blockWidgets->getHtml()!}]
                    [??]
                        <div class="alert alert-info text-center">[{!$this->doorGets->__("Aucun module")!}].</span>
                    [?]
                </div>
            </div>
        [?]
    </div>
</div>