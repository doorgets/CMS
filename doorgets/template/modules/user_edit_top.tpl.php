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
if (!array_key_exists('titre', $isContent) && array_key_exists('question', $isContent)) {
    $isContent['titre'] = $isContent['question'];   
}

$ImageStatut = 'fa-ban red';
if ($isContent['active'] == '2') {
    $ImageStatut = 'fa-eye green-c';
} elseif ($isContent['active'] == '3') {
    $ImageStatut = 'fa-hourglass-start orange-c';
} elseif ($isContent['active'] == '4') {
    $ImageStatut = 'fa-pencil gris-c';
}

$urlStatut = '<i class="fa '.$ImageStatut.' fa-lg" ></i>';
?>
<span class="create" ><a class="doorGets-comebackform" href="[{!$this->doorGets->goBackUrl()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
[{?($is_modo):}]
<span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
[?]
<a href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$moduleInfos['uri']!}]&lg=[{!$lgActuel!}]"><img src="[{!BASE_IMG.'mod_'.$moduleInfos['type'].'.png'!}]" title="[{!$moduleInfos['nom']!}]" class="doorGets-img-ico px25" /> [{!$moduleInfos['nom']!}]</a> 

[{?($is_modo && $isVersionActive):}]
<span class="badge create">
    [{!$this->doorGets->__('Version')!}] #[{!$version_id!}] 
    <a href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$moduleInfos['uri']!}]&action=edit&id=[{!$isContent['id_content']!}]&lg=[{!$lgActuel!}]" class="red">[{!$this->doorGets->__('Annuler')!}]</a>
</span>
[?] 
<small><i class="fa fa-chevron-right" ></i> [{!$isContent['titre']!}]  [{!$urlStatut!}]</small>
