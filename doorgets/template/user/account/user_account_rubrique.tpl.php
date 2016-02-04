<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


    $menu = $this->doorGets->Action();
    // Init $menu from Action Controller
?>
<ul class="nav nav-tabs">
    <li class="[{?($menu === 'password'):}]active[?]"><a href="?controller=account&action=password">[{!$this->doorGets->__('Mot de passe')!}]</a></li>
    <li class="[{?($menu === 'email'):}]active[?]"><a href="?controller=account&action=email">[{!$this->doorGets->__('Adresse email')!}]</a></li>
    <li class="[{?($menu === 'oauth'):}]active[?]"><a href="?controller=account&action=oauth">OAuth2</a></li>
    <li class="[{?($menu === 'api'):}]active[?]"><a href="?controller=account&action=api">[{!$this->doorGets->__('Api')!}]</a></li>
    <li class="[{?($menu === 'close'):}]active[?]"><a href="?controller=account&action=close">[{!$this->doorGets->__('Fermer mon compte')!}]</a></li>
</ul>