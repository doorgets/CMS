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
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">

        </div>
        
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="[{!$this->doorGets->goBackUrl()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            [{?($is_modules_modo):}]
                <span class="create" ><a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&action=add&lg=[{!$lgActuel!}]"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Ajouter une notification')!}]</a></span>
            [?]
            [{?($is_modo && $isVersionActive):}]
            <span class="badge create">
                [{!$this->doorGets->__('Version')!}] #[{!$version_id!}] 
                <a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&action=edit&id=[{!$isContent['id_translator']!}]&lg=[{!$lgActuel!}]" class="red">[{!$this->doorGets->__('Annuler')!}]</a>
            </span>
            [?] 
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <b class="glyphicon glyphicon-bullhorn"></b> <a href="?controller=[{!$this->doorGets->controllerNameNow()!}]">[{!$this->doorGets->__('Notification email')!}]</a> 
             / [{!$this->doorGets->__('Modifier une notification')!}] 
        </legend>
        <ul class="pager">
            <li class="previous [{?(empty($urlPrevious)):}]disabled[?]"><a href="[{!$urlPrevious!}]">&larr; [{!$this->doorGets->__('Précèdent')!}]</a></li>
            <li class="next [{?(empty($urlNext)):}]disabled[?]"><a href="[{!$urlNext!}]">[{!$this->doorGets->__('Suivant')!}] &rarr;</a></li>
        </ul>    
        <div class="width-listing">

            [{!$this->doorGets->Form->open('post')!}]
            <div >
                <ul class="nav nav-tabs">
                    <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Modifier une notification')!}]</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabs-1">
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'title','text',$isContent['title'])!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->input($this->doorGets->__("Clé").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','text',$isContent['uri']);}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->input($this->doorGets->__('Sujet'),'subject','text',$isContent['subject'])!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->textarea($this->doorGets->__('Message').' <span class="cp-obli">*</span>','message_tinymce',$isContent['message_tinymce'],'tinymce ckeditor')!}]
            
                    </div>
                </div>
            </div>

        </div>
        
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>
