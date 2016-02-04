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
            <span class="create" ><a href="?controller=media&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Ajouter un fichier')!}]</a></span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <b class="glyphicon violet glyphicon-folder-open"></b> <a href="?controller=media">[{!$this->doorGets->__('Media')!}]</a> 
             / [{!$this->doorGets->__('Modifier un fichier')!}] 
        </legend>
        
        
        [{!$this->doorGets->Form->open('post','')!}]
        [{!$this->doorGets->Form->input($this->doorGets->__('Nom du fichier').' <span class="cp-obli">*</span><br />','title','text',$isContent['title'])!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->input($this->doorGets->__("Clé").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','text',$isContent['uri']);}]
                <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->file($this->doorGets->__('Votre fichier').' <span class="cp-obli">*</span><br />','path')!}]
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        <div class="separateur-tb"></div>
        <p>
            [{!$this->doorGets->__('Type de fichier')!}] : <b>png, jpeg, gif, zip, pdf, swf</b>
            <br />
            [{!$this->doorGets->__('Taille Maximum')!}] : <b>2M</b>
        </p>
        [{!$this->doorGets->Form->close()!}]
        <div class="separateur-tb"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                [{!$this->doorGets->__('Fichier actuel')!}]
            </div>
            <div class="panel-body">
                
                [{?(!empty($printImage)):}]
                    <div class="box-image-media">
                        [{!$printImage!}]
                    </div>
                    <div class="separateur-tb"></div>
                [?]
                [{!$this->doorGets->__('Uri')!}] : <b class="badge">[{!$isContent['uri']!}]</b>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->__('Label')!}] : <b>[{!$isContent['title']!}]</b>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->__('Taille du fichier')!}] : <b>[{!$isContent['size']!}]</b>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->__('Type de fichier')!}] : <b>[{!$typeExtension[$isContent['type']]!}]</b>
                <div class="separateur-tb"></div>
                [{!$this->doorGets->__('Date de création')!}] : <b>[{!GetDate::in($isContent['date_modification'],1,$this->doorGets->myLanguage)!}]</b>                
            </div>
        </div>
    </div>
</div>