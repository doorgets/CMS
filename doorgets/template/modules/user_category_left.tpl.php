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

    $activeCategory = '';
    if (array_key_exists('categorie',$params['GET'])) {
        $activeCategory = $params['GET']['categorie'];
    }
    
    
    $urlToCategorie = '?controller='.$this->doorGets->controllerNameNow().'&uri='.$this->doorGets->Uri;
    $urlToNewCategorie = '?controller=modulecategory&uri='.$this->doorGets->Uri;

    $categorieList = $this->doorGets->categorieSimple_;
    unset($categorieList[0]);

    $isActiveAll = 'active';
    if (array_key_exists($activeCategory,$categorieList)) {
        $isActiveAll = '';
    }

?>
<div class="list-group">
    <a class="list-group-item [{?(empty($activeCategory)):}] active [?]" href="[{!$urlToCategorie!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-align-justify"></b> [{!$this->doorGets->__('Toutes catégories')!}]</a>
    [{?(!empty($categorieList)):}]
        [{/($categorieList as $uri=>$value):}]
            <a class="list-group-item cat-index-level-[{!$value['level']!}] [{?($value['id'] == $activeCategory):}] active [?]"  href="[{!$urlToCategorie!}]&categorie=[{!$value['id']!}]&lg=[{!$lgActuel!}]">
                <b class="glyphicon glyphicon-align-justify"></b>
                [{!$value['name']!}]
            </a>
        [/]
    [?]
    [{?($is_admin):}]
        <a class="list-group-item " href="[{!$urlToNewCategorie!}]&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Ajouter une catégorie')!}]</a>
        <a class="list-group-item"  href="[{!$urlToNewCategorie!}]&lg=[{!$lgActuel!}]">[{!$this->doorGets->__('Gérer les catégories')!}]</a>
    [?]
</div>