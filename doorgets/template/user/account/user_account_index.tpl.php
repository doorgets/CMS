<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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
            <b class="glyphicon glyphicon-user"></b> [{!$this->user['pseudo']!}]
        </legend>
        <div class="width-listing">
            [{!$this->doorGets->Form->open('post')!}]
                <div >
                    <ul  class="nav nav-tabs">
                        <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Avatar')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Réseaux sociaux')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Coordonnées')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Paramètres')!}]</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabs-1">
                            <div class="row">
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Nom'),'last_name','text',$this->user['last_name'],'input-user')!}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Prénom'),'first_name','text',$this->user['first_name'],'input-user')!}]
                                    <div class="separateur-tb"></div>
                                </div>
                            </div>
                            [{!$this->doorGets->Form->input($this->doorGets->__('Description courte'),'description','text',$this->user['description'],'input-user')!}]
                            <div class="separateur-tb"></div>
                            [{/($Attributes as $key => $Attribute):}]
                                [{!$this->doorGets->createFieldFromField($Attribute, $this->doorGets->Form)!}] 
                            [/]
                        </div>
                        <div class="tab-pane fade" id="tabs-2">
                            <img class="avatar-account" src="[{!URL.'data/users/'.$this->user['avatar']!}]" >
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->file($this->doorGets->__('Avatar'),'avatar')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="tab-pane fade" id="tabs-3">
                            <div class="row">
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Site perso'),'website','text',$this->user['website'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($nFace,'id_facebook','text',$this->user['id_facebook'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($nTwitter,'id_twitter','text',$this->user['id_twitter'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($nYoutube,'id_youtube','text',$this->user['id_youtube'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($nGoogle,'id_google','text',$this->user['id_google'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($nPinterest,'id_pinterest','text',$this->user['id_pinterest'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($nLinkedin,'id_linkedin','text',$this->user['id_linkedin'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($nMyspace,'id_myspace','text',$this->user['id_myspace'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-4">
                        <div class="row">
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->select($this->doorGets->__('Pays'),'country',$this->doorGets->getArrayForms('country'),$this->user['country'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Région').'<br />','region','text',$this->user['region'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Ville').'<br />','city','text',$this->user['city'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Code Postal').'<br />','zipcode','text',$this->user['zipcode'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Adresse').'<br />','adresse','text',$this->user['adresse'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone fixe').'<br />','tel_fix','text',$this->user['tel_fix'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone mobile').'<br />','tel_mobil','text',$this->user['tel_mobil'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone fax').'<br />','tel_fax','text',$this->user['tel_fax'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 >[{!$this->doorGets->__('Choisissez votre langue par défaut')!}]</h3>
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->select($this->doorGets->__('Votre langue').' : ','langue',$this->doorGets->getAllLanguages(),$this->user['langue'])!}]
                                    <div class="separateur-tb"></div>
                                    <h3 >[{!$this->doorGets->__('Choisissez votre fuseau horaire')!}]</h3>
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->select($this->doorGets->__('Votre fuseau horaire').' : ','horaire',$this->doorGets->getArrayForms('times_zone'),$this->user['timezone'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-6">
                                    <h3 >[{!$this->doorGets->__('Notifications')!}]</h3>
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les notifications par mail'),'notification_mail',1,$isActiveNotificationMail)!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Recevoir la newletter'),'notification_newsletter',1,$isActiveNotificationNewsletter)!}]
                                    <div class="separateur-tb"></div>
                                    <h3 >[{!$this->doorGets->__('Choisissez un éditeur HTML')!}]</h3>
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->select($this->doorGets->__('Votre éditeur').' : ','editor_html',$this->user['editor_group'],$this->user['editor_html'])!}]
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
            
        </div>
    </div>
</div>
