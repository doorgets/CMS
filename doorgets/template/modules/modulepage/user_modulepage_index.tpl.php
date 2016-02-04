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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=modules"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            [{?($is_modo):}]
                <span class="create" ><a  href="?controller=modules&action=editpage&id=[{!$moduleInfos['id']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-cog"></b> [{!$this->doorGets->__('Paramètres')!}]</a></span>
                <span class="create" >[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            [?]
            [{?($is_modo && $isVersionActive):}]
            <span class="badge create">
                [{!$this->doorGets->__('Version')!}] #[{!$version_id!}] 
                <a href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$moduleInfos['uri']!}]&lg=[{!$lgActuel!}]" class="red">[{!$this->doorGets->__('Annuler')!}]</a>
            </span>
            [?] 
            <img src="[{!BASE_IMG.'mod_page.png'!}]" title="[{!$this->doorGets->__("Page statique")!}]" class="doorGets-img-ico px25" />[{!$moduleInfos['nom']!}]
        </legend>
        [{!$this->doorGets->Form->open('post');}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('META')!}]</a></li>
                [{?($is_modo):}]
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Commentaire')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Paramètres')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Version')!}]</a></li>
                [?]
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{?($is_modo):}]
                        [{!$this->doorGets->Form->select($this->doorGets->__('Statut'),'active',$aActivation,$isContent['active']);}]
                        <div class="separateur-tb"></div>
                    [?]
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre','text',$isContent['titre']);}]
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-12">
                            [{!$this->doorGets->Form->textarea($this->doorGets->__('Contenu de la page').' <span class="cp-obli">*</span>','article_tinymce',$article,'tinymce ckeditor')!}]
                        </div>
                        <div class="col-md-12">
                            <div class="live-preview-content live-preview"></div>
                        </div>
                    </div> 
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-2">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Titre'),'meta_titre','text',$isContent['meta_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Description'),'meta_description','text',$isContent['meta_description']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta mots clés'),'meta_keys','text',$isContent['meta_keys']);}]
                    <div class="separateur-tb"></div>  
                    <hr />
                    <h4 class="violet">Facebook META</h4>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_facebook_type',$this->doorGets->getArrayForms('facebook_type'),$isContent['meta_facebook_type']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_facebook_titre','text',$isContent['meta_facebook_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_facebook_description','text',$isContent['meta_facebook_description']);}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($isContent['meta_facebook_image'])):}]
                        <img src="[{!URL.'data/'.$ruri.'/'.$isContent['meta_facebook_image']!}]" class="edit-image-facebook-[{!$ruri!}] img-responsive edit-image-back" />
                    [?]
                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_facebook_image',$isContent['meta_facebook_image']);}]
                    <div class="separateur-tb"></div>
                    <hr />
                    <h4 class="violet">Twitter META</h4>
                    <div class="separateur-tb"></div
                    [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_twitter_type',$this->doorGets->getArrayForms('twitter_type'),$isContent['meta_twitter_type']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_twitter_titre','text',$isContent['meta_twitter_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_twitter_description','text',$isContent['meta_twitter_description']);}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($isContent['meta_twitter_image'])):}]
                        <img src="[{!URL.'data/'.$ruri.'/'.$isContent['meta_twitter_image']!}]" class="edit-image-twitter-[{!$ruri!}] img-responsive edit-image-back" />
                    [?]
                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_twitter_image',$isContent['meta_twitter_image']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input('Player iframe URL (https)','meta_twitter_player','text',$isContent['meta_twitter_player']);}]
                    <div class="separateur-tb"></div>
                </div>
                [{?($is_modo):}]
                <div class="tab-pane fade" id="tabs-3">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires doorGets'),'comments',1,$isActiveComments)!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires').' Disqus ','disqus','1',$isActiveDisqus)!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires').' Facebook ','facebook','1',$isActiveFacebook)!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-4">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser le partage').' ShareThis','partage',1,$isActivePartage)!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ajouter au flux RSS').'','in_rss',1,$isActiveRss)!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-5">
                    <h4>
                        [{!$this->doorGets->__('Nombre de version')!}] : [{!$cVersion!}]
                    </h4>
                    [{?($cVersion > 0):}]
                    <table class="table text-center">
                        <tr>
                            <th>[{!$this->doorGets->__('Id')!}]</th>
                            <th>[{!$this->doorGets->__('Pseudo utilisateur')!}]</th>
                            <th>[{!$this->doorGets->__('Id utilisateur')!}]</th>
                            <th>[{!$this->doorGets->__('Id groupe')!}]</th>
                            <th>[{!$this->doorGets->__('Date')!}]</th>
                            <th></th>
                        </tr>
                        [{/($versions as $version):}]
                            <tr>
                                <td>[{!$version['id']!}]</td>
                                <td>[{!$version['pseudo']!}]</td>
                                <td>[{!$version['id_user']!}]</td>
                                <td>[{!$version['id_groupe']!}]</td>
                                <td>[{!GetDate::in($version['date_creation'])!}]</td>
                                <td "><a href="[{!$url.'&version='.$version['id']!}]" title="[{!$this->doorGets->__('Charger')!}]"><b class="glyphicon glyphicon-transfer "></b></a></td>
                            </tr>
                        [/]
                    </table>
                    [?]
                    <div class="separateur-tb"></div>
                </div>
                [?]
            </div>
        </div>
        <div class="separateur-tb"></div>
        <div class="text-center">[{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]</div>
        
        [{!$this->doorGets->Form->close();}]
        
        <script type="text/javascript">
            
            $("#module[{!$moduleInfos['type']!}]_edit_titre").keyup(function() {
            
                var str = $(this).val();
                $("#module[{!$moduleInfos['type']!}]_edit_meta_titre").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_facebook_titre").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_twitter_titre").val(str);
                
            });
            $("#module[{!$moduleInfos['type']!}]_edit_description").keyup(function() {
            
                var str = $(this).val();
                var lendesc =  str.length;
                if (lendesc >= 250) {
                    str = str.substr(0,250);
                }
                $("#module[{!$moduleInfos['type']!}]_edit_meta_description").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_facebook_description").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_twitter_description").val(str);
                
            });
        </script>
        
    </div> 
</div>
