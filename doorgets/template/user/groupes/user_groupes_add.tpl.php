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

    unset($aYesNo[0]);


?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
            
        </div>
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=groupes"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <b class="glyphicon glyphicon-cloud"></b> <a href="?controller=groupes">[{!$this->doorGets->__('Groupes')!}]</a> 
             / [{!$this->doorGets->__('Créer un groupe')!}] 
        </legend>
        
        [{!$this->doorGets->Form->open('post','');}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Modules internes')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Modules doorGets')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Modérateurs')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Attributs')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-6">[{!$this->doorGets->__('Editeur de texte')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-7">[{!$this->doorGets->__('Cloud')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->select($this->doorGets->__("Autoriser l'inscription"),'can_subscribe',$aYesNo,'2');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Vérification du compte"),'register_verification',$aYesNo,'2');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Nom du groupe').' <span class="cp-obli">*</span>','title');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__("Clé").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description').' <span class="cp-obli">*</span>','description');}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Modules')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneModules as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Widgets')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneWidgets as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Configuration')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneConfiguration as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Menu principal')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneMenu as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Utilisateurs')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneUsers as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Boutique')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneShop as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Fichiers')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneMedia as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Mon profil')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneProfile as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Modérateur')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneModeration as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Statistiques')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneStats as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Templates')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneTemplates as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Campagnes')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneCampagnes as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Api Access Token')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneApi as $k=>$v):}]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="tab-pane fade" id="tabs-3">
                    <div class="doorGets-liste-modules-box">
                        <h2 class="title">[{!$this->doorGets->__("Modules")!}]</h2>
                        [{?($cModules > 0):}]
                        <div class="panel panel-default">
                            [{/($modules as $k=>$v):}]
                            <div  class="doorGets-liste-modules-content-boxin" >
                                <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                    <table class="table">
                                        <tr>
                                            <td >
                                                <div class="extra-module">
                                                    <div  class="check-submodule-[{!$k!}]" >
                                                    [{?(!in_array($v['type'],$noLimitType)):}]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Lister'),'module_doorgets_can_list_'.$k,$k,'checked');}]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Voir'),'module_doorgets_can_show_'.$k,$k,'checked');}]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ajouter'),'module_doorgets_can_add_'.$k,$k,'checked');}]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Supprimer'),'module_doorgets_can_delete_'.$k,$k,'checked');}]
                                                    [?]

                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Modifier'),'module_doorgets_can_edit_'.$k,$k,'checked');}]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Modérer'),'module_doorgets_can_modo_'.$k,$k,'');}]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Administrer'),'module_doorgets_can_admin_'.$k,$k,'');}]
                                                    
                                                    </div>
                                                </div>

                                                <div class="extra-module">
                                                    [{?(!in_array($v['type'],$noLimitType)):}]
                                                        <div  class=" check-submodule-[{!$k!}]" >
                                                        [{!$this->doorGets->Form->input($this->doorGets->__('Limite *'),'module_doorgets_limit_'.$k,'text','0','mod-group-input is-digit-input');}]
                                                        </div>
                                                    [??]
                                                        [{!$this->doorGets->Form->input('','module_doorgets_limit_'.$k,'hidden','0');}]
                                                    [?]
                                                </div>
                                                
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','module_doorgets_'.$k,$k,'');}] 

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <script type="text/javascript">
                                    $('#groupes_add_module_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                    if ($('#groupes_add_module_doorgets_[{!$k!}]').is(':checked')) {  $('.check-submodule-[{!$k!}]').fadeIn(); }else{ $('.check-submodule-[{!$k!}]').fadeOut(); }
                                </script>
                            </div>
                            [/]
                        </div>
                        [?]
                        <h2 class="title">[{!$this->doorGets->__("Widgets")!}]</h2>
                        [{?($cWidgets > 0):}]
                        <div class="panel panel-default">
                            [{?($cBlocks > 0):}]
                                [{/($widgets['blok'] as $k=>$v):}]
                                <div  class="doorGets-liste-modules-content-boxin" >
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,'');}]
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                            $('#groupes_add_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                         </script>
                                    </div>
                                </div>
                                [/]
                            [?]
                            [{?($cCarousel > 0):}]
                               [{/($widgets['carousel'] as $k=>$v):}]
                               <div  class="doorGets-liste-modules-content-boxin" >
                                   <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        <table class="table">
                                            <tr>
                                                <td >
                                                   [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                   [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                   [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,'');}]         
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                           $('#groupes_add_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                        </script>
                                   </div>
                               </div>
                               [/]
                            [?]
                            [{?($cGenforms > 0):}]
                                [{/($widgets['genform'] as $k=>$v):}]
                                <div  class="doorGets-liste-modules-content-boxin" >
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,'');}] 
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                            $('#groupes_add_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                        </script>
                                    </div>
                                </div>
                                [/]
                            [?]
                            [{?($cSurvey > 0):}]
                                [{/($widgets['survey'] as $k=>$v):}]
                                <div  class="doorGets-liste-modules-content-boxin" >
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,'');}] 
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                            $('#groupes_add_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                        </script>
                                    </div>
                                </div>
                                [/]
                            [?]
                            </table>
                        </div>
                        [?]

                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-4">
                    [{?(!empty($groupes)):}]
                    <table class="table">
                        [{/($groupes as $k=>$v):}]
                            <div  class="doorGets-liste-modules-content-boxin" >
                                <tr>
                                    <td>
                                        <div class="extra-module">
                                            <div  class=" check-subgroupe-[{!$k!}]" >
                                                [{/($subModule as $kk=>$vv):}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($vv),'groupes_enfants_'.$kk.'_'.$k,$kk,'');}]
                                                [/]
                                            </div>
                                        </div>
                                        <div  class=" check-module-[{!$k!}]" >
                                            [{!$this->doorGets->Form->checkbox(ucfirst($v),'groupes_enfants_'.$k,$k);}]
                                        </div>
                                    </td>
                                </tr>
                                <script type="text/javascript">
                                    $('#groupes_add_groupes_enfants_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-subgroupe-[{!$k!}]').fadeIn(); }else{ $('.check-subgroupe-[{!$k!}]').fadeOut(); } });
                                    if ($('#groupes_add_groupes_enfants_[{!$k!}]').is(':checked')) { $('.check-subgroupe-[{!$k!}]').fadeIn(); }else{ $('.check-subgroupe-[{!$k!}]').fadeOut(); }
                                </script>
                            </div>
                        [/] 
                    </table>
                    [?]
                </div>
                <div class="tab-pane fade" id="tabs-5">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="title-header-attributes" >
                                <li>[{!$this->doorGets->__("Attributs du groupe")!}]</li>
                            </ul> 
                            <ul id="is-groupe-in" class="connectedSortable"></ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="title-header-attributes" >
                                <li>[{!$this->doorGets->__("Attributs disponible")!}]</li>
                            </ul>
                            <ul id="is-groupe-out" class="connectedSortable">
                                [{/($Attributes as $key => $attibute):}]
                                    <li class="ui-state-default" id="groupe-out-[{!$key!}]">[{!$attibute['title']!}] <span class="pull-right">[[{!$attibute['type']!}]]</span></li>
                                [/]
                            </ul> 
                        </div>
                    </div>
                    [{!$this->doorGets->Form->input('','attributes','hidden','');}]
                </div>
                <div class="tab-pane fade" id="tabs-6">    
                    [{!$this->doorGets->Form->checkbox('CKEditor','editor_ckeditor','active','');}]
                    <a href="http://ckeditor.com/" target="blank">http://ckeditor.com/</a>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox('TinyMCE','editor_tinymce','active','');}]
                    <a href="http://www.tinymce.com/" target="blank">http://www.tinymce.com/</a>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select('Roxy Fileman:','fileman',$fileman,'none');}]
                    <br /><a href="http://www.roxyfileman.com/" target="blank">http://www.roxyfileman.com/</a>              
                </div>
                <div class="tab-pane fade" id="tabs-7">    
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__("Ajouter"),'saas_add','active','');}]
                            <div class="separateur-tb"></div>
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__("Supprimer"),'saas_delete','active','');}]
                            <div class="separateur-tb"></div>           
                        </div>    
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Limite').'*','saas_limit','text','0','mod-group-input is-digit-input');}]
                            <div class="separateur-tb"></div> 
                        </div>
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Nombre de jours').'*','saas_date_end','text','0','mod-group-input is-digit-input');}]
                            <div class="separateur-tb"></div> 
                        </div>
                    </div>  
                    <div class="row">
                        [{/($activeSaasOptions['saas_constant'] as $k=>$v):}]
                            [{ $check = (is_bool($activeSaasOptions['saas_constant'][$k]) && $activeSaasOptions['saas_constant'][$k])?'checked':"";}]
                            <div class="col-md-3">
                                    [{!$this->doorGets->Form->checkbox($k,'saas_constant['.$k.']',$k,$check);}] 
                            </div>
                        [/]
                    </div>         
                </div>
            </div>
        </div>

        <div class="separateur-tb"></div>
        <div>* [{!$this->doorGets->__("Nombre maximum d'ajout")!}], [{!$this->doorGets->__("0 pour illimité")!}]</div>
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        [{!$this->doorGets->Form->close();}] 
    </div>
    <script type="text/javascript">

        function doTransfertToInput() {

            var newValueAttribute;

            $( "#is-groupe-in li" ).each(function() {
                var id = $(this).attr('id');
                
                if (typeof id !== 'undefined') {
                    var idTmp = id.replace('groupe-out-','');
                    newValueAttribute = newValueAttribute + idTmp + ',';
                }
                
            });

            newValueAttribute = newValueAttribute.replace('undefined','')
            $('#groupes_add_attributes').val(newValueAttribute);
        }

        $('#is-groupe-in').mouseout(function() {
            
            doTransfertToInput();
        });

        $('#is-groupe-out').mouseout(function() {
            
            doTransfertToInput(); 
        });

        $('#groupes_add_submit').click(function() {
            doTransfertToInput();
        });
    </script>
</div>
