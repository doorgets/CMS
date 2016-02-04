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
            <span class="create" ><a class="doorGets-comebackform" href="?controller=widgets"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <span class="create" ><a  href="?controller=modules&action=editblock&id=[{!$moduleInfos['id']!}]&lg=[{!$lgActuel!}]"><b class="glyphicon glyphicon-cog"></b> [{!$this->doorGets->__('Paramètres')!}]</a></span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <img src="[{!BASE_IMG.'mod_carousel.png'!}]" title="[{!$this->doorGets->__("Carousel")!}]" class="doorGets-img-ico px25" />
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
                    <div class="zone-add-carousel">
                        <ul id="sortableCarousel" class="list-group">
                        [{/($article as $k => $page):}]
                            <li  class="list-group-item ui-state-highlight">
                                [{!$this->doorGets->__('Position')!}] <span class="c-carousel">[{!$pos!}]</span> <span class="btn no-loader label label-danger pull-right delete-bt-carousel">X</span> 
                                <div class="separateur-tb"></div> 
                                [{!$this->doorGets->Form->select($this->doorGets->__("Type "),"type_".$pos,$type,$page['type'])!}]
                                <div class="separateur-tb"></div> 
                                <div class="show-image-carousel-[{!$pos!}]">
                                    [{?(!empty($page['image'])):}]
                                    <div style="padding:0;border-radius:4px;width: 180px;">
                                        <span class="btn no-loader btn-danger pull-right remove-img-ajax">x</span>
                                        <img src="[{!URL.'data/'.$moduleInfos['uri'].'/'.$page['image']!}]" class="edit-image-[{!'modulecarousel_edit_image_'.$pos!}] img-responsive edit-image-back" />
                                    </div>
                                    [?]
                                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'image_'.$pos,$page['image'])!}]
                                    <div class="separateur-tb"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            [{!$this->doorGets->Form->input('','position_'.$pos,"hidden",$page['position'],'sortable-input-pos')!}]
                                            [{!$this->doorGets->Form->input($this->doorGets->__("Titre"),'title_'.$pos,'text',$page['url'])!}]
                                            <div class="separateur-tb"></div>
                                        </div> 
                                        <div class="col-md-6">
                                            [{!$this->doorGets->Form->input($this->doorGets->__("Url"),'url_'.$pos,'text',$page['url'])!}]
                                            <div class="separateur-tb"></div>
                                        </div> 
                                    </div>
                                </div>
                                <script type="text/javascript">isUploadedCarouselInput("modulecarousel_edit_image_[{!$pos!}]"); </script>
                                <div class="show-html-carousel-[{!$pos!}]">
                                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Contenu').' <span class="cp-obli">*</span>','page_'.$pos.'_tinymce',$page['page'],'tinymce ckeditor')!}]
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
                    <div class="zone-add-carousel">
                        <ul id="sortableCarousel" class="list-group">
                            <li  class="list-group-item ui-state-highlight">
                                [{!$this->doorGets->__('Position')!}] <span class="c-carousel">X</span> <span class="btn no-loader label label-danger pull-right delete-bt-carousel">X</span> 
                                <div class="separateur-tb"></div> 
                                [{!$this->doorGets->Form->select($this->doorGets->__("Type "),"type_1",$type,'image','select-type-carousel')!}]
                                <div class="separateur-tb"></div> 
                                <div class="show-image-carousel-[{!$pos!}]">
                                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__("Image"),"image_1")!}]
                                    <div class="separateur-tb"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            [{!$this->doorGets->Form->input("","position_1","hidden",1,'sortable-input-pos')!}]
                                            [{!$this->doorGets->Form->input($this->doorGets->__("Titre"),"title_1")!}]
                                            <div class="separateur-tb"></div>
                                        </div> 
                                        <div class="col-md-6">
                                            [{!$this->doorGets->Form->input($this->doorGets->__("Url"),"url_1")!}]
                                            <div class="separateur-tb"></div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="show-html-carousel-1" style="display:none;">
                                    [{!$this->doorGets->Form->textarea($this->doorGets->__("Contenu"),"page_1"."_tinymce","","tinymce ckeditor")!}]
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="btn no-loader btn-success btn-add-page text-center">+ [{!$this->doorGets->__("Ajouter une page")!}]</div>
                    </div>
                    <script type="text/javascript">isUploadedCarouselInput("modulecarousel_edit_image_1"); </script>
                                
                [?]
                <script type="text/javascript">

                    window.addEventListener('load',function(){

                        function reloadType() {
                            var allCarousel = $("[id^=modulecarousel_edit_type_]");
                            $.each(allCarousel, function( index, value ) {
                                var id = $(value).attr('id').replace('modulecarousel_edit_type_','');
                                var type = $(value).val();
                                console.log(type);
                                if (type === 'image') {
                                    $('.show-image-carousel-'+id).show();
                                    $('.show-html-carousel-'+id).hide();
                                } else {
                                    $('.show-image-carousel-'+id).hide();
                                    $('.show-html-carousel-'+id).show();
                                }
                                $(value).on('change',function(){
                                    var type = $(value).val();
                                    if (type === 'image') {
                                        $('.show-image-carousel-'+id).show();
                                        $('.show-html-carousel-'+id).hide();
                                    } else {
                                        $('.show-image-carousel-'+id).hide();
                                        $('.show-html-carousel-'+id).show();
                                    }
                                });
                            });
                        }
                        function addType(id) {
                            var carousel = $("#modulecarousel_edit_type_"+id);
                            var type = carousel.val();
                            console.log(type + "  : 1 " + '.show-image-carousel-');
                            console.log(id);
                            if (type === 'image') {
                                $('.show-image-carousel-'+id).show();
                                $('.show-html-carousel-'+id).hide();
                            } else {
                                $('.show-image-carousel-'+id).hide();
                                $('.show-html-carousel-'+id).show();
                            }
                            carousel.on('change',function(){
                                var type = carousel.val();
                                var id = $(this).attr('id').replace('modulecarousel_edit_type_','');
                                 console.log(type + "  : 2 " + '.show-image-carousel-');
                            console.log(id);
                                if (type === 'image') {
                                    $('.show-image-carousel-'+id).show();
                                    $('.show-html-carousel-'+id).hide();
                                } else {
                                    $('.show-image-carousel-'+id).hide();
                                    $('.show-html-carousel-'+id).show();
                                }
                            });
                        }
                        reloadType();
                        $( "#sortableCarousel" ).sortable({
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
                        
                        function reloadLiCarousel() {
                            var ii = 1;
                            $( "#sortableCarousel li.list-group-item " ).each(function() {
                                $( this  ).find('.c-carousel').html(ii);
                                $( this  ).find('.sortable-input-pos').val(ii);
                                ii++;
                                
                            });
                            return ii - 1;
                        }
                        
                        function deleteCarousel() {
                            $(".delete-bt-carousel").click(function() {
                                $(this).closest('li').remove();
                                reloadLiCarousel();

                            });
                        }   

                        var settings = { mode : "textareas" };
                        
                        $("body").on('click','.btn-add-page', AddNewEditor);
                        
                        function AddNewEditor(){

                            var iCarousel = 1;
                            $( "#sortableCarousel li.list-group-item " ).each(function() {
                                iCarousel++;
                            });
                            var newElement = $('<li  class="list-group-item ui-state-highlight"> \
                                    [{!$this->doorGets->__("Position")!}] <span class="c-carousel">X</span> <span class="btn no-loader label label-danger pull-right delete-bt-carousel">X</span>  \
                                    <div class="separateur-tb"></div> \
                                    [{!$this->doorGets->Form->select($this->doorGets->__("Type "),"type_'+iCarousel+'",$type,"select-type-carousel")!}] \
                                    <div class="separateur-tb"></div>  \
                                    <div class="show-image-carousel-'+iCarousel+'"> \
                                        [{!$this->doorGets->Form->fileAjax($this->doorGets->__("Image"),"image_'+iCarousel+'")!}] \
                                        <div class="separateur-tb"></div> \
                                        <div class="row"> \
                                            <div class="col-md-6">\
                                                [{!$this->doorGets->Form->input("","position_'+iCarousel+'","hidden","1","sortable-input-pos")!}] \
                                                [{!$this->doorGets->Form->input($this->doorGets->__("Titre"),"title_'+iCarousel+'")!}] \
                                                <div class="separateur-tb"></div> \
                                            </div> \
                                            <div class="col-md-6"> \
                                                [{!$this->doorGets->Form->input($this->doorGets->__("Url"),"url_'+iCarousel+'")!}] \
                                                <div class="separateur-tb"></div> \
                                            </div> \
                                        <div> \
                                    </div> \
                                    <div class="show-html-carousel-'+iCarousel+'" style="display:none;"> \
                                        [{!$this->doorGets->Form->textarea($this->doorGets->__("Contenu"),"page_'+iCarousel+'"."_tinymce","","tinymce ckeditor")!}] \
                                    </div> \
                                </li>');
                            $('.zone-add-carousel ul').first().append(newElement);
                            var iCarousel = reloadLiCarousel();

                            tinymce.remove();
                            initTinymce();
                            deleteCarousel();  
                            isUploadedCarouselInput("modulecarousel_edit_image_"+iCarousel); 
                            addType(iCarousel);
                        }

                        reloadLiCarousel();
                        deleteCarousel();
                        

                        $('#sortableCarousel').mouseout(function() {
                            if (!down) {
                                reloadLiCarousel();
                                deleteCarousel();
                            }
                        });
                    });
                    
                </script>
                </div>
                <div class="tab-pane" id="tabs-2">
                    [{!$this->doorGets->Form->select($this->doorGets->__("Nombre d'item par affichage"),'items_count',$countItems,$isContent['items_count'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Afficher la navigation"),'navigation',$yesNo,$isContent['navigation'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Stop avec la souris"),'stop_on_hover',$yesNo,$isContent['stop_on_hover'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Démarrage automatique"),'auto_play',$yesNo,$isContent['auto_play'])!}]
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
