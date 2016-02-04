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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=[{!$this->doorGets->controllerNameNow()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <b class="glyphicon glyphicon-comment"></b> <a href="?controller=comment">[{!$this->doorGets->__('Commentaire')!}]</a>
             / [{!$this->doorGets->__("Supprimer par groupe")!}]
        </legend>
        
        [{?(empty($varListeFile)):}]
            
            <div class="alert alert-info">
                <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun élement dans votre séléction.")!}]  <a class="doorGets-comebackform" href="./?controller=[{!$this->doorGets->controllerNameNow()!}]">[{!$this->doorGets->__('Retour')!}]</a>
            </div>
           
        [??]
            <div class="alert alert-info">
                [{!$this->doorGets->Form['massdelete_index']->open('post')!}]
                [{!$this->doorGets->Form['massdelete_index']->input('','groupe_delete_index','hidden',$varListeFile)!}]
                
                [{!$cListe!}] [{?($cListe > 1):}]  [{!$this->doorGets->__('éléments')!}] [??] [{!$this->doorGets->__('élément')!}] [?]
                
            </div>
            <div class="title-box alert alert-danger text-center">
            [{!$this->doorGets->__("Voulez vous supprimer ces commentaires définitivement")!}] ?
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form['massdelete_index']->submit($this->doorGets->__("Oui"),'','btn btn-success btn-lg')!}]
                <a href="[{!$this->doorGets->goBackUrl()!}]" class="btn btn-danger bnt-lg">[{!$this->doorGets->__("Non")!}]</a>     
            </div>
            [{!$this->doorGets->Form['massdelete_index']->close()!}]
        [?]   
    </div>
</div>