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
            [{?(!SAAS_ENV || (SAAS_ENV && SAAS_THEME_ADD)):}]
            <span class="create" ><a href="?controller=theme&action=add"class="violet" ><b class="glyphicon glyphicon-plus"> </b>  [{!$this->doorGets->__('Générer un nouveau thème')!}]</a></span>
            <span class="create" ><a href="?controller=theme&action=import"class="violet" ><i class="fa fa-download"></i> </b>  [{!$this->doorGets->__('Importer un nouveau thème')!}]</a></span>
            [?]
            <b class="glyphicon glyphicon-tint"></b> <a href="?controller=theme">[{!$this->doorGets->__('Thème')!}] </a> 
        </legend>
        [{!$this->doorGets->Form->open('post')!}]
        <div class="row">
        [{/($isAllTheme as $theme):}]
            <div class="col-md-4 box-theme-index [{?($nameTheme === $theme):}]box-theme-index-select[?]">
                <label for="index_theme_theme_[{!$theme!}]">
                <div class="thumbnail">
                    [{?(!SAAS_ENV || (SAAS_ENV && SAAS_THEME_EDIT)):}]
                    <p>
                        [{?($countTheme > 1):}]
                            <a class="right" href="?controller=theme&action=delete&name=[{!$theme!}]" title="[{!$this->doorGets->__("Supprimer")!}]">
                                <img src="[{!BASE_IMG.'icone-delete.png'!}]" />
                            </a>
                        [?]
                        <a class="right"  href="?controller=theme&action=edit&name=[{!$theme!}]" title="[{!$this->doorGets->__("Editer")!}]">
                            <img src="[{!BASE_IMG.'edit.png'!}]" />
                        </a>
                    </p>
                    [?]
                    [{!$this->doorGets->Form->radio(ucfirst($theme).' ','theme',$theme,$nameTheme)!}]
                    <img src="[{!BASE!}]themes/[{!$theme!}]/doorgets.png" style="width:400px;height: 300px;" >
                    <div class="caption">
                        <h3>[{!ucfirst($theme)!}] [{?($nameTheme === $theme):}] <span ><img src="[{!BASE_IMG.'activer.png'!}]" /> <small>[{!$this->doorGets->__('Thème par défaut')!}]</small></span>[?]</h3>
                    </div>
                </div>
                </label>
            </div>
        [/]
        </div>
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{?($countTheme > 1):}][{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}][?]
        </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
