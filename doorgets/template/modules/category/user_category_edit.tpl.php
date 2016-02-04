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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=modulecategory&uri=[{!$this->doorGets->Uri!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <a href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$moduleInfos['uri']!}]&lg=[{!$lgActuel!}]"><img src="[{!BASE_IMG.'mod_'.$moduleInfos['type'].'.png'!}]" title="[{!$moduleInfos['nom']!}]" class="doorGets-img-ico px25" /> [{!$moduleInfos['nom']!}]</a> 
            / <a href="?controller=modulecategory&uri=[{!$moduleInfos['uri']!}]&lg=[{!$lgActuel!}]">[{!$this->doorGets->__('Catégories')!}]</a> 
            / [{!$isContent['nom']!}]
        </legend>
        <div class="trad-lg">
            
        </div>
        [{!$this->doorGets->Form->open('post','');}]
        [{!$this->doorGets->Form->input('','langue','hidden',$this->doorGets->myLanguage());}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('META')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__('Catégorie parente').' <span class="cp-obli">*</span>','id_parent',$categoriesOptions,$isContent['id_parent']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Nom').' <span class="cp-obli">*</span> <br />','nom','text',$isContent['nom']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span> <br />','titre','text',$isContent['titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Description').'<br />','description',$isContent['description']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__("Clé d'URL").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__('Caractères alpha numérique seulement').')</small><br />','uri','text',$isContent['uri']);}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-2">
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Titre').'<br />','meta_titre','text',$isContent['meta_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Description').'<br />','meta_description','text',$isContent['meta_description']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta mots clés').'<br />','meta_keys','text',$isContent['meta_keys']);}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
        </div>
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
        </div>
        [{!$this->doorGets->Form->close();}] 
    </div>
</div>