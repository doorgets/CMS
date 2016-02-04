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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=media"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <b class="glyphicon violet glyphicon-folder-open"></b> <a href="?controller=media">[{!$this->doorGets->__('Media')!}]</a> 
             / [{!$this->doorGets->__('Ajouter un fichier')!}] 
        </legend>
        
        [{!$this->doorGets->Form->open('post','')!}]
        [{!$this->doorGets->Form->input($this->doorGets->__('Nom du fichier').' <span class="cp-obli">*</span><br />','title')!}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->input($this->doorGets->__("Clé").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri');}]
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
    </div>
</div>