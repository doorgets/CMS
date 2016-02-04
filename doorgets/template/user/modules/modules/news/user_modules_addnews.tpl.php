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
            [{!$getHtmlFormAddTop!}]
        </legend>
        [{!$this->doorGets->Form->open('post','')!}]
        [{!$this->doorGets->Form->input('','type','hidden','news')!}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Bloc Statique')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Trier')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('META')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Template')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-6">[{!$this->doorGets->__('Notifications')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-7">[{!$this->doorGets->__('Mot de passe')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-8">[{!$this->doorGets->__('Paramètres')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Nom').' <span class="cp-obli">*</span>','nom')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Description'),'description')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__("Clé d'URL").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small>','uri');}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-2">
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Haut de page'),'top_tinymce','','tinymce ckeditor')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Bas de page'),'bottom_tinymce','','tinymce ckeditor')!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-3">
                    [{!$this->doorGets->Form->select($this->doorGets->__('Résultat').' ','bynum',$numGroupe,30);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__('A voir aussi').' ','avoiraussi',$numGroupe,3);}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-4">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Titre'),'meta_titre');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Description'),'meta_description');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta mots clés'),'meta_keys');}]
                    <div class="separateur-tb"></div>  
                    <hr />
                    <h4 class="violet">Facebook META</h4>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_facebook_type',$this->doorGets->getArrayForms('facebook_type'));}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_facebook_titre');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_facebook_description');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_facebook_image');}]
                    <div class="separateur-tb"></div>
                    <hr />
                    <h4 class="violet">Twitter META</h4>
                    <div class="separateur-tb"></div
                    [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_twitter_type',$this->doorGets->getArrayForms('twitter_type'));}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_twitter_titre');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_twitter_description');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_twitter_image');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input('Player iframe URL (https)','meta_twitter_player');}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-5">
                    [{!$this->doorGets->Form->input('Index','template_index','text','modules/news/news_listing.tpl.php');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input('Content','template_content','text','modules/news/news_content.tpl.php');}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-6">
                    [{!$this->doorGets->Form->select($this->doorGets->__('Modérateur').': '.$this->doorGets->__('Contenu à modérer'),'uri_notification_moderator',$allNotifications);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Utilisateur").': '.$this->doorGets->__('Contenu accepté'),'uri_notification_user_success',$allNotifications);}] 
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Notification").': '.$this->doorGets->__('Contenu refusé'),'uri_notification_user_error',$allNotifications);}]
                </div>
                <div class="tab-pane fade" id="tabs-7">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer le mot de passe').'','with_password','1','');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Mot de passe'),'password');}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-8">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activé').'','active','1','checked');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__("Afficher le badge de l'auteur"),'author_badge','1','checked');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Recevoir les notifications par e-mail').'','notification_mail','1','');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Seuls les membres peuvent voir ce module'),'public_module','1','');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Seuls les membres peuvent poster un commentaire'),'public_comment','1','');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Seuls les membres peuvent voir le bouton ajouter'),'public_add','1','');}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Créer une nouvelle rubrique').'','new_topic','1','checked');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->checkbox($this->doorGets->__("Définir ce module comme la page d'accueil du site").'','is_first',1);}]
            <div class="separateur-tb"></div>
        </div>
        <div class="text-center">[{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]</div>
        [{!$this->doorGets->Form->close();}]
    </div>
</div>
