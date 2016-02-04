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

if (isset($isContent) && $_uri_module != 'delete') { 

    if (empty($isContent['nom']) && array_key_exists('titre', $isContent) && !empty($isContent['titre'])) {
        $isContent['nom'] = $isContent['titre'];
    }
?>
<span class="create" ><a class="doorGets-comebackform" href="?controller=modules&lg=[{!$lgActuel!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
<span class="create" ><a  href="?controller=module[{!$_uri_module!}]&uri=[{!$isContent['uri']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-pencil"></b> [{!$this->doorGets->__('Gérer le contenu')!}]</a></span>
<span class="create" >[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
<img src="[{!$listeInfos[$_uri_module]['image']!}]" class="px25" />
<a href="?controller=modules&lg=[{!$lgActuel!}]">[{!$this->doorGets->__('Module')!}] </a> 
/ [{!$isContent['nom']!}]

<?php
}