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
            <b class="glyphicon violet glyphicon-send "></b> [{!$this->doorGets->__('Supprimer par groupe')!}] : [{!$cListe!}] [{?($cListe > 1):}]  [{!$this->doorGets->__('éléments')!}] [??] [{!$this->doorGets->__('élément')!}] [?]
        </legend>
        
        [{?(empty($varListeFile)):}]
            
            <div class="alert alert-info">
                <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun élement dans votre séléction.")!}]  <a class="doorGets-comebackform" href="./[{!$this->doorGets->goBackUrl()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a>
            </div>
           
        [??]
            [{!$this->doorGets->Form['massdelete_index']->open('post')!}]
            [{!$this->doorGets->Form['massdelete_index']->input('','groupe_delete_index','hidden',$varListeFile)!}]
            
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form['massdelete_index']->submit($this->doorGets->__("Supprimer"),'','btn btn-danger btn-lg')!}]    
            </div>
            [{!$this->doorGets->Form['massdelete_index']->close()!}]
        [?]   
    </div>
</div>