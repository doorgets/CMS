<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=saas"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <b class="glyphicon glyphicon-cloud-upload"></b> <a href="?controller=saas">[{!$this->doorGets->__('Cloud')!}] </a> 
             / [{!$this->doorGets->__('Créer un site')!}] 
        </legend>
        
        [{?($User['saas_options']['saas_add']):}]
            [{?( !$isLimited || $countContents < $isLimited ):}]
                [{!$this->doorGets->Form->open('post','','');}]
                <div >
                    <ul class="nav nav-tabs">
                        <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabs-1">
                            <div class="alert alert-success text-center">
                                <label>[{!$this->doorGets->__("Veuillez choisir un domaine").' <span class="cp-obli">*</span>'!}]</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        [{!$this->doorGets->Form->inputAddon('','domain','text','','input-user text-right','.'.$domaine);}]

                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                                <small style="font-weight:100;">([{!$this->doorGets->__("Caractères alpha numérique seulement");}])</small>
                            </div>
                            <div class="separateur-tb"></div>
                            <h3>[{!$this->doorGets->__('Site web')!}]</h3>
                            <div class="separateur-tb"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','title');}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Slogan').' <span class="cp-obli">*</span>','slogan');}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Description').' <span class="cp-obli">*</span>','description');}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Mots clés').' <span class="cp-obli">*</span>','keywords');}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Copyright').' <span class="cp-obli">*</span>','copyright');}]
                                    <div class="separateur-tb"></div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            [{!$this->doorGets->Form->select($this->doorGets->l('Fuseau horaire').'<br >','time_zone',$this->doorGets->getArrayForms('times_zone'),$User['timezone'])!}]
                                            <div class="separateur-tb"></div>
                                        </div>
                                        <div class="col-md-4">
                                            [{!$this->doorGets->Form->select($this->doorGets->l('Langue').'<br >','language',$this->doorGets->getAllLanguages(),$this->doorGets->myLanguage)!}]
                                            <div class="separateur-tb"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>[{!$this->doorGets->__('Administrateur')!}]</h3>
                            <div class="separateur-tb"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('E-mail').' <span class="cp-obli">*</span>','email','text',$User['login']);}]
                                </div>
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe').' <span class="cp-obli">*</span>','password');}]
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separateur-tb"></div>
                <div class="text-center">
                    [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
                </div>
                [{!$this->doorGets->Form->close();}]
            [??]
                <div class="alert alert-danger text-center">
                    [{!$this->doorGets->__("Vous ne pouvez pas faire cette action")!}]. [{!$isLimited!}] [{!$this->doorGets->__("Site Web")!}] [{!$this->doorGets->__("maximum")!}]
                </div>
            [?]
        [??]
            <div class="alert alert-danger text-center">
                [{!$this->doorGets->__("Vous ne pouvez pas faire cette action")!}].
            </div>
        [?]
    </div>
</div>
