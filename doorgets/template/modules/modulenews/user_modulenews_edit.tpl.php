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

    
    $listeCategories = $this->doorGets->categorieSimple_;
    unset($listeCategories[0]);
    $listeCategoriesContent = $this->doorGets->_toArray($isContent['categorie']);
    
    $article = $this->doorGets->_cleanPHP($isContent['article_tinymce']);
    
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$htmlEditTop!}]
        </legend>
        
        <ul class="pager">
            <li class="previous [{?(empty($urlPrevious)):}]disabled[?]"><a href="[{!$urlPrevious!}]">&larr; [{!$this->doorGets->__('Précèdent')!}]</a></li>
            <li class="next [{?(empty($urlNext)):}]disabled[?]"><a href="[{!$urlNext!}]">[{!$this->doorGets->__('Suivant')!}] &rarr;</a></li>
        </ul>
        [{!$formEditTopExtra!}]
       <div class="separateur-tb"></div>
        <div class="row">
            <div class="col-md-9">
                [{!$this->doorGets->Form->textarea($this->doorGets->__('Article').' <span class="cp-obli">*</span>','article_tinymce',$article,'tinymce ckeditor')!}]
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item"><b class="glyphicon glyphicon-align-justify"></b> [{!$this->doorGets->__('Catégories')!}]</div>
                    [{?(!empty($listeCategories)):}]
                        [{/($listeCategories as $uri=>$value):}]
                            [{$valCheck = '';}]
                            [{?(in_array($value['id'],$listeCategoriesContent)):}]
                                [{$valCheck = 'checked';}]
                            [?]
                            <div class="list-group-item cat-index-level-[{!$value['level']!}]">
                                [{!$this->doorGets->Form->checkbox($value['name'],'categories_'.$value['id'],'1',$valCheck,'cat-edit-level-'.$value['level'])!}]
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
        [{!$formEditBottomExtra!}]
        <script type="text/javascript">
            isUploadedInput("modulenews_edit_image");
            isUploadedMultiInput("modulenews_edit_image_gallery");
            isUploadedFacebookInput("modulenews_edit_meta_facebook_image");
            isUploadedTwitterInput("modulenews_edit_meta_twitter_image");
        </script>
    </div>
</div>
