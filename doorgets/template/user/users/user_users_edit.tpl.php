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

unset($groupes[0]);
unset($aUsersActivation[0]);

$arCountry = $this->doorGets->getArrayForms('country');
array_unshift($arCountry, $this->doorGets->__('Choisir votre pays'));

// $customer = new CustomerService($isContent['id'],$this->doorGets);
// vdump($customer);
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">

        </div>
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=users"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <b class="glyphicon glyphicon-user"></b> <a href="?controller=users">[{!$this->doorGets->__('Utilisateur')!}] </a>
             / [{!$isContent['pseudo']!}]
        </legend>
        
        [{?(in_array($isContent['network'],$this->doorGets->user['liste_enfant_modo'])):}]
            [{!$this->doorGets->Form->open('post')!}]
                <div >
                    <ul class="nav nav-tabs">
                        <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Groupe')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Avatar')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Réseaux sociaux')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Coordonnées')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-6">[{!$this->doorGets->__('Mot de passe')!}]</a></li>
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-7">[{!$this->doorGets->__('Paramètres')!}]</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabs-1">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Adresse email').' <span class="cp-obli">*</span>','email','text',$isContent['email'],'input-user');}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($this->doorGets->__('Nom'),'last_name','text',$isContent['last_name'],'input-user')!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($this->doorGets->__('Prénom'),'first_name','text',$isContent['first_name'],'input-user')!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($this->doorGets->__('Description courte'),'description','text',$isContent['description'],'input-user')!}]
                            <div class="separateur-tb"></div>
                            [{/($Attributes as $key => $Attribute):}]
                                [{!$this->doorGets->createFieldFromField($Attribute, $this->doorGets->Form)!}] 
                            [/]
                        </div>
                        <div class="tab-pane fade" id="tabs-2">
                            [{!$this->doorGets->Form->select($this->doorGets->__("Groupe").' <span class="cp-obli">*</span> : ','network',$groupes,$isContent['network']);}] 
                        </div>
                        <div class="tab-pane fade" id="tabs-3">
                            <img class="avatar-account" src="[{!URL.'data/users/'.$isContent['avatar']!}]" >
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->file($this->doorGets->__('Avatar'),'avatar')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="tab-pane fade" id="tabs-4">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Site perso'),'website','text',$isContent['website'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nFace,'id_facebook','text',$isContent['id_facebook'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nTwitter,'id_twitter','text',$isContent['id_twitter'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nYoutube,'id_youtube','text',$isContent['id_youtube'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nGoogle,'id_google','text',$isContent['id_google'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nPinterest,'id_pinterest','text',$isContent['id_pinterest'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nLinkedin,'id_linkedin','text',$isContent['id_linkedin'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->input($nMyspace,'id_myspace','text',$isContent['id_myspace'])!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="tab-pane fade" id="tabs-5">
                            <div class="row">
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->select($this->doorGets->__('Pays'),'country',$arCountry,$isContent['country'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Région').'<br />','region','text',$isContent['region'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Ville').'<br />','city','text',$isContent['city'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Code Postal').'<br />','zipcode','text',$isContent['zipcode'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Adresse').'<br />','adresse','text',$isContent['adresse'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-6">
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone fixe').'<br />','tel_fix','text',$isContent['tel_fix'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone mobile').'<br />','tel_mobil','text',$isContent['tel_mobil'])!}]
                                    <div class="separateur-tb"></div>
                                    [{!$this->doorGets->Form->input($this->doorGets->__('Téléphone fax').'<br />','tel_fax','text',$isContent['tel_fax'])!}]
                                    <div class="separateur-tb"></div>
                                </div>
                            </div> 
                                
                        </div>

                        <div class="tab-pane fade" id="tabs-6">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe'),'password');}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="tab-pane fade" id="tabs-7">      
                            [{!$this->doorGets->Form->select($this->doorGets->__("Statut"),'active',$aUsersActivation,$isContent['active']);}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->select($this->doorGets->__('Langue').' : ','langue',$this->doorGets->getAllLanguages(),$isContent['langue'])!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->select($this->doorGets->__('Fuseau horaire').' : ','horaire',$this->doorGets->getArrayForms('times_zone'),$isContent['horaire'])!}]
                            <div class="separateur-tb"></div>
                            <h3 >[{!$this->doorGets->__('Type de profil')!}]</h3>
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->select($this->doorGets->__('Qui peut voir le profil').' ?','profile_type',$this->doorGets->getArrayForms('profile_type'),$isContent['profile_type'])!}]
                            <div class="separateur-tb"></div>
                            <h3 >[{!$this->doorGets->__('Notifications')!}]</h3>
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les notifications par mail'),'notification_mail',1,$isActiveNotificationMail)!}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Recevoir la newletter'),'notification_newsletter',1,$isActiveNotificationNewsletter)!}]
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
            <div class="title-box alert alert-danger text-center">
                [{!$this->doorGets->__("Vous ne pouvez pas modifier cet utilisateur")!}]
            </div>
        [?]
    </div>
</div>