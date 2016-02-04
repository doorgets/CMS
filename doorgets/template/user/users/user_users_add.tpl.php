<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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


$cGroupes = count($groupes) - 1;


?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">

        </div>
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=users"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <b class="glyphicon glyphicon-user"></b> <a href="?controller=users">[{!$this->doorGets->__('Utilisateur')!}] </a> 
             / [{!$this->doorGets->__('Créer un utilisateur')!}] 
        </legend>
        [{?(!empty($cGroupes)):}]
    
            [{!$this->doorGets->Form->open('post','','');}]
            <div >
                <ul class="nav nav-tabs">
                    <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Paramètres')!}]</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabs-1">
                        [{!$this->doorGets->Form->select($this->doorGets->__("Groupe").' <span class="cp-obli">*</span> : ','network',$groupes);}]
                        <div class="separateur-tb"></div>
                        <div class="row">
                            <div class="col-md-6">
                                [{!$this->doorGets->Form->input($this->doorGets->__("Pseudo").' <span class="cp-obli">*</span>','pseudo');}]
                                <div class="separateur-tb"></div>
                                [{!$this->doorGets->Form->input($this->doorGets->__('Adresse email').' <span class="cp-obli">*</span>','login');}]
                                <div class="separateur-tb"></div>
                                [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe').' <span class="cp-obli">*</span>','password');}]
                                <div class="separateur-tb"></div>
                            </div>
                            <div class="col-md-6">
                                [{!$this->doorGets->Form->input($this->doorGets->__('Prénom'),'first_name')!}]
                                <div class="separateur-tb"></div>
                                [{!$this->doorGets->Form->input($this->doorGets->__('Nom de famille'),'last_name')!}]
                                <div class="separateur-tb"></div>
                                [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'description');}]
                                <div class="separateur-tb"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-2">    
                        [{!$this->doorGets->Form->select($this->doorGets->__("Statut"),'active',$aUsersActivation,'2');}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->select($this->doorGets->__('Fuseau horaire').' : ','horaire',$this->doorGets->getArrayForms('times_zone'),$this->doorGets->configWeb['horaire'])!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->select($this->doorGets->__("Langue").' : ','langue',$this->doorGets->getAllLanguages(),$this->doorGets->myLanguage());}]
                        <div class="separateur-tb"></div>
                    </div>
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
            [{!$this->doorGets->Form->close();}]
            
        [??]
            <div class="alert alert-info">
                [{!$this->doorGets->__("Vous devez créer un groupe pour ajouter un utilisateur")!}]
            </div>
        [?]
    </div>
</div>