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

unset($aActivation[0]);
   
    
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$htmlAddTop!}]
            : [{!$this->doorGets->__('Ajouter une vidéo')!}] 
        </legend>
        [{!$this->doorGets->Form->open('post','')!}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__("Galerie d'images")!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('META')!}]</a></li>
                [{?($is_modo):}]
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Commentaire')!}]</a></li>
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Paramètres')!}]</a></li>
                [?]
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{?($is_modo):}]
                        [{!$this->doorGets->Form->select($this->doorGets->__('Statut'),'active',$aActivation,2);}]
                        <div class="separateur-tb"></div>   
                    [?]
                    
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre');}]
                    [{?($is_modo):}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->input($this->doorGets->__("Clé d'URL").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri');}]
                    [??]
                        [{!$this->doorGets->Form->input('','uri','hidden');}]
                    [?]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Code Youtube').' <span class="cp-obli">*</span>','youtube')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__('Temps').' ('.$this->doorGets->__('minute').')','temps',$this->timer)!}]
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-9">
                            [{!$this->doorGets->Form->textarea($this->doorGets->__('Description').' <span class="cp-obli">*</span>','article_tinymce','','tinymce ckeditor')!}]
                        </div>
                        <div class="col-md-3">
                            <div class="list-group">
                                <div class="list-group-item"><b class="glyphicon glyphicon-align-justify"></b> [{!$this->doorGets->__('Catégories')!}]</div>
                                [{?(!empty($listeCategories)):}]
                                    [{/($listeCategories as $uri=>$value):}]
                                        <div class="list-group-item cat-index-level-[{!$value['level']!}]">
                                            [{!$this->doorGets->Form->checkbox(''.$value['name'],'categories_'.$value['id'],'1','','cat-edit-level-'.$value['level'])!}]
                                        </div>
                                    [/]
                                [?]
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="live-preview-content live-preview"></div>
                        </div>
                    </div> 
                    <div class="separateur-tb"></div>
                    [{!$formAddBottomExtra!}]
                    <script type="text/javascript">
                        isUploadedInput("modulevideo_add_image");
                        isUploadedMultiInput("modulevideo_add_image_gallery");
                        isUploadedFacebookInput("modulevideo_add_meta_facebook_image");
                        isUploadedTwitterInput("modulevideo_add_meta_twitter_image");
                    </script>
    </div>
</div>
