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
        $content
 */
        $labelModuleGroup   = $this->getActiveModules();

        $urlAfterAction     = urlencode(PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $urlEdition         = URL_USER.$this->_lgUrl.'?controller=moduleblock&uri='.$isBlock['uri'].'&lg='.$this->getLangueTradution().'&back='.$urlAfterAction;
    
?>
<!-- doorGets:start:widgets/block -->
<div class="block-static block-static-[{!$uri_module!}]">
    [{?($this->isUser && in_array($Module['id'],$this->_User['liste_widget'])):}]
    <div class="btn-group btn-front-edit-[{!$uri_module!}] navbar-right pull-right z-max-index">
        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
            <b  class="glyphicon glyphicon-cog"></b> [{!$this->__('Action')!}]
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$this->__('Modifier le block')!}]</a></li>
        </ul>
    </div>
    [?]
    [{!$content!}]
</div>
<!-- doorGets:end:widgets/block -->
