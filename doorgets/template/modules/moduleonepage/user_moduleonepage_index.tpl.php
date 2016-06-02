<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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
    
    // echo '<pre>';
    // var_dump($article);
    // exit();
    
    $pos = 1;
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">
        
    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=modules"><img src="[{!BASE_IMG!}]retour.png" class="retour-img"> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" ><a  href="?controller=modules&action=editonepage&id=[{!$moduleInfos['id']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-cog"></b> [{!$this->doorGets->__('Paramètres')!}]</a></span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <img src="[{!BASE_IMG.'mod_onepage.png'!}]" title="[{!$this->doorGets->__("Onepage")!}]" class="doorGets-img-ico px25" />
            [{!$moduleInfos['titre']!}]
        </legend>
        
        [{!$this->doorGets->Form->open('post','');}]
        <div >
            <ul class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Informations ')!}]</a></li>
                <li  role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Paramètres ')!}]</a></li>
            </ul>
            <div class="tab-content" >
                <div class="tab-pane fade in active" id="tabs-1">
                [{?(!empty($article)):}]
                    <div class="zone-add-onepage">
                        <ul id="sortableOnepage" class="list-group">
                        [{/($article as $k => $page):}]
                            <li  class="list-group-item ui-state-highlight">
                                [{!$this->doorGets->__('Position')!}] <span class="c-onepage">[{!$pos!}]</span> <span class="btn no-loader label label-danger pull-right delete-bt-onepage">X</span> 
                                <div class="separateur-tb"></div> 
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#content-[{!$pos!}]" aria-controls="content-[{!$pos!}]" role="tab" data-toggle="tab">[{!$this->doorGets->__('Informations')!}]</a></li>
                                    <li role="presentation"><a href="#options-[{!$pos!}]" aria-controls="options-[{!$pos!}]" role="tab" data-toggle="tab">[{!$this->doorGets->__('Options')!}]</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="content-[{!$pos!}]">
                                        <div class="row">
                                            <div class="col-md-3">
                                                [{!$this->doorGets->Form->input('','position_'.$pos,"hidden",$page['position'],'sortable-input-pos')!}]
                                                [{!$this->doorGets->Form->input($this->doorGets->__('Titre du menu').' <span class="cp-obli">*</span>','title_'.$pos,'text',$page['title'])!}]
                                            </div>
                                            <div class="col-md-3">
                                                [{!$this->doorGets->Form->input($this->doorGets->__('Marqueur').' <span class="cp-obli">*</span>','marqueur_'.$pos,'text',$page['marqueur'])!}]
                                                <small>[{!$this->doorGets->__('Caractères alpha numérique seulement')!}]</small>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                                [{!$this->doorGets->Form->select($this->doorGets->__('Afficher dans le menu'),'showinmenu_'.$pos,$yesNo,$page['showinmenu'])!}]
                                            </div>
                                        </div>
                                        <div class="separateur-tb"></div>
                                        <div class="">
                                            [{!$this->doorGets->Form->textarea($this->doorGets->__('Contenu').' <span class="cp-obli">*</span>','page_'.$pos.'_tinymce',$page['page'],'tinymce ckeditor')!}]
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane " id="options-[{!$pos!}]">
                                        <div class="row">
                                            <div class="col-md-6">
                                                [{!$this->doorGets->Form->input($this->doorGets->__('Couleur de fond'),'backcolor_'.$pos,'text',$page['backcolor'],'text',$page['marqueur'])!}]
                                                <div class="separateur-tb"></div>
                                                [{!$this->doorGets->Form->select($this->doorGets->__('Opacité '),'opacity_'.$pos,$opacity,$page['opacity'])!}]
                                                <div class="separateur-tb"></div>
                                                [{!$this->doorGets->Form->input($this->doorGets->__('Hauteur ').'<small>[PX]</small>','height_'.$pos,'text',$page['height'])!}]
                                                
                                            </div>
                                            <div class="col-md-6">
                                                [{?(!empty($page['backimage'])):}]
                                                <div style="padding:0;border-radius:4px;width: 180px;">
                                                    <span class="btn no-loader btn-danger pull-right remove-img-ajax">x</span>
                                                    <img src="[{!URL.'data/temp/'.$page['backimage']!}]" class="edit-image-[{!'moduleonepage_edit_backimage_'.$pos!}] img-responsive edit-image-back" />
                                                </div>
                                                [?]
                                                [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image de fond'),'backimage_'.$pos,$page['backimage'])!}]
                                                <div class="separateur-tb"></div>
                                                <script type="text/javascript">isUploadedOnepageInput("moduleonepage_edit_backimage_[{!$pos!}]"); </script>
                                           </div>
                                        </div> 
                                    </div>
                                </div>
                            </li>
                            [{$pos++;}]
                        [/]
                        </ul>
                    </div>
                    <div>
                        <div class="btn btn-success btn-add-page text-center no-loader">+ [{!$this->doorGets->__("Ajouter une page")!}]</div>
                    </div>
                    <div class="separateur-tb"></div>
                [??]
                    <div class="separateur-tb"></div>
                    <div class="zone-add-onepage">
                        <ul id="sortableOnepage" class="list-group">
                            <li  class="list-group-item ui-state-highlight">
                                [{!$this->doorGets->__('Position')!}] <span class="c-onepage">X</span> <span class="btn no-loader label label-danger pull-right delete-bt-onepage">X</span> 
                                <div class="separateur-tb"></div> 
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active"><a href="#content-1" aria-controls="content-1" role="tab" data-toggle="tab">[{!$this->doorGets->__('Informations')!}]</a></li>
                                    <li role="presentation"><a href="#options-1" aria-controls="options-1" role="tab" data-toggle="tab">[{!$this->doorGets->__('Options')!}]</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="content-1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                [{!$this->doorGets->Form->input("","position_1","hidden",1,'sortable-input-pos')!}]
                                                [{!$this->doorGets->Form->input($this->doorGets->__("Titre du menu")." <span class=\"cp-obli\">*</span>","title_1")!}]
                                            </div>
                                            <div class="col-md-3">
                                                [{!$this->doorGets->Form->input($this->doorGets->__("Marqueur")." <span class=\"cp-obli\">*</span>","marqueur_1")!}]
                                                <small>[{!$this->doorGets->__("Caractères alpha numérique seulement")!}]</small>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                                [{!$this->doorGets->Form->select($this->doorGets->__('Afficher dans le menu'),'showinmenu_1',$yesNo)!}]
                                            </div>
                                        </div>
                                        <div class="separateur-tb"></div>
                                        <div class="">
                                            [{!$this->doorGets->Form->textarea($this->doorGets->__("Contenu")." <span class=\"cp-obli\">*</span>","page_1"."_tinymce","","tinymce ckeditor")!}]
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane " id="options-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                [{!$this->doorGets->Form->input($this->doorGets->__("Couleur de fond"),"backcolor_1","text")!}]
                                                <div class="separateur-tb"></div>
                                                [{!$this->doorGets->Form->select($this->doorGets->__("Opacité "),"opacity_1",$opacity)!}]
                                                <div class="separateur-tb"></div>
                                                [{!$this->doorGets->Form->input($this->doorGets->__("Hauteur ")."<small>[PX]</small>","height_1")!}]
                                                
                                            </div>
                                            <div class="col-md-6">
                                                [{!$this->doorGets->Form->fileAjax($this->doorGets->__("Image de fond"),"backimage_1")!}]
                                                <div class="separateur-tb"></div>
                                           </div>
                                        </div> 
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="btn no-loader btn-success btn-add-page text-center">+ [{!$this->doorGets->__("Ajouter une page")!}]</div>
                    </div>
                    <script type="text/javascript">isUploadedOnepageInput("moduleonepage_edit_backimage_1"); </script>
                                           
                [?]
                <script type="text/javascript">

                    window.addEventListener('load',function(){
                        $( "#sortableOnepage" ).sortable({
                            stop: function(event, ui){
                                tinymce.remove();
                                initTinymce();
                            }
                        });

                        var down = false;
                        $(document).mousedown(function() {
                            down = true;
                        }).mouseup(function() {
                            down = false;  
                        });
                        
                        function reloadLiOnepage() {
                            var ii = 1;
                            $( "#sortableOnepage li.list-group-item " ).each(function() {
                                $( this  ).find('.c-onepage').html(ii);
                                $( this  ).find('.sortable-input-pos').val(ii);
                                ii++;
                                
                            });
                            return ii - 1;
                        }
                        
                        function deleteOnepage() {
                            $(".delete-bt-onepage").click(function() {
                                $(this).closest('li').remove();
                                reloadLiOnepage();
                            });
                        }   

                        var settings = { mode : "textareas" };
                        
                        $("body").on('click','.btn-add-page', AddNewEditor);
                        
                        function AddNewEditor(){

                            var iOnepage = 1;
                            $( "#sortableOnepage li.list-group-item " ).each(function() {
                                iOnepage++;
                            });

                            console.log("iOnepage: " + iOnepage);
                            var newElement = $('<li  class="list-group-item ui-state-highlight"> \
                                    [{!$this->doorGets->__("Position")!}] <span class="c-onepage">X</span> <span class="btn no-loader label label-danger pull-right delete-bt-onepage">X</span>  \
                                    <div class="separateur-tb"></div>  \
                                    <ul class="nav nav-tabs" > \
                                        <li role="presentation" class="active"><a href="#content'+iOnepage+'" aria-controls="content'+iOnepage+'" role="tab" data-toggle="tab">[{!$this->doorGets->__("Informations")!}]</a></li> \
                                        <li role="presentation"><a href="#options'+iOnepage+'" aria-controls="options'+iOnepage+'" role="tab" data-toggle="tab">[{!$this->doorGets->__('Options')!}]</a></li> \
                                    </ul> \
                                    <div class="tab-content"> \
                                        <div role="tabpanel" class="tab-pane active" id="content'+iOnepage+'"> \
                                            <div class="row"> \
                                                <div class="col-md-3"> \
                                                    [{!$this->doorGets->Form->input("","position_'+iOnepage+'","hidden","1","sortable-input-pos")!}] \
                                                    [{!$this->doorGets->Form->input($this->doorGets->__("Titre du menu")." <span class=\"cp-obli\">*</span>","title_'+iOnepage+'")!}] \
                                                </div> \
                                                <div class="col-md-3"> \
                                                    [{!$this->doorGets->Form->input($this->doorGets->__("Marqueur")." <span class=\"cp-obli\">*</span>","marqueur_'+iOnepage+'")!}] \
                                                    <small>[{!$this->doorGets->__("Caractères alpha numérique seulement")!}]</small> \
                                                </div> \
                                                <div class="col-md-3"> \
                                                </div> \
                                                <div class="col-md-3"> \
                                                    [{!$this->doorGets->Form->select($this->doorGets->__("Afficher dans le menu"),"showinmenu_'+iOnepage+'",$yesNo)!}] \
                                                </div> \
                                            </div> \
                                            <div class="separateur-tb"></div> \
                                            <div class=""> \
                                                [{!$this->doorGets->Form->textarea($this->doorGets->__("Contenu")." <span class=\"cp-obli\">*</span>","page_'+iOnepage+'"."_tinymce","","tinymce ckeditor")!}] \
                                            </div> \
                                        </div> \
                                        <div role="tabpanel" class="tab-pane " id="options'+iOnepage+'"> \
                                            <div class="row"> \
                                                <div class="col-md-6"> \
                                                    [{!$this->doorGets->Form->input($this->doorGets->__("Couleur de fond"),"backcolor_'+iOnepage+'","text")!}] \
                                                    <div class="separateur-tb"></div> \
                                                    [{!$this->doorGets->Form->select($this->doorGets->__("Opacité "),"opacity_'+iOnepage+'",$opacity)!}] \
                                                    <div class="separateur-tb"></div> \
                                                    [{!$this->doorGets->Form->input($this->doorGets->__("Hauteur ")."<small>[PX]</small>","height_'+iOnepage+'")!}] \
                                                </div> \
                                                <div class="col-md-6"> \
                                                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__("Image de fond"),"backimage_'+iOnepage+'")!}] \
                                                    <div class="separateur-tb"></div> \
                                               </div> \
                                            </div> \
                                        </div> \
                                    </div> \
                                </li>');
                            $('.zone-add-onepage ul').first().append(newElement);
                            var iOnepage = reloadLiOnepage();

                            tinymce.remove();
                            initTinymce();
                            deleteOnepage();  
                            isUploadedOnepageInput("moduleonepage_edit_backimage_"+iOnepage); 
                        }

                        reloadLiOnepage();
                        deleteOnepage();
                        

                        $('#sortableOnepage').mouseout(function() {
                            if (!down) {
                                reloadLiOnepage();
                                deleteOnepage();
                            }
                        });
                    });
                    
                </script>
                </div>
                <div class="tab-pane" id="tabs-2">
                    [{!$this->doorGets->Form->select($this->doorGets->__('Image de fond fixe').' <span class=\"cp-obli\">*</span>','backimage_fixe',$yesNo,$isContent['backimage_fixe'])!}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
            
        </div>
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
        </div>
        [{!$this->doorGets->Form->close();}]
        <div class="separateur-tb"></div> 
    </div>   
</div>
