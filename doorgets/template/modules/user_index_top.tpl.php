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
<legend>
    <a href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$moduleInfos['uri']!}]&lg=[{!$lgActuel!}]"><img src="[{!BASE_IMG.'mod_'.$moduleInfos['type'].'.png'!}]" title="[{!$moduleInfos['nom']!}]" class="doorGets-img-ico px25" /> [{!$moduleInfos['nom']!}]</a> 
    [{?($is_modules_modo):}]
        <span class="create" ><a  href="?controller=modules&action=edit[{!$moduleInfos['type']!}]&id=[{!$moduleInfos['id']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-cog"></b> [{!$this->doorGets->__('Paramètres')!}]</a></span>
    [?]
    [{?($user_can_add && !($isLimited && $countContents >= $isLimited)):}]
        <span class="create" ><a href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$this->doorGets->Uri!}]&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Ajouter')!}]</a></span>
    [?]
    [{?($is_modo):}]
        <span class="create" >[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
    [?]
</legend>