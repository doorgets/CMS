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

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">
            
        </div>
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=groupes&lg=[{!$lgActuel!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdmin()!}]</span>
            <b class="glyphicon glyphicon-user"></b> <a href="?controller=groupes&lg=[{!$lgActuel!}]">[{!$this->doorGets->__('Groupe')!}]</a> 
             / [{!$isContent['title']!}] 
        </legend>
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__("Modules internes")!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__("Modules doorGets")!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__("Modérateurs")!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Attributs')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-6">[{!$this->doorGets->__('Editeur de texte')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-7">[{!$this->doorGets->__('Cloud')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->open('post','');}]
                    [{!$this->doorGets->Form->select($this->doorGets->__("Autoriser l'inscription"),'can_subscribe',$aYesNo,$isContent['can_subscribe']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__("Vérification du compte"),'register_verification',$aYesNo,$isContent['register_verification']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Nom du groupe').' <span class="cp-obli">*</span>','title','text',$isContent['title']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__("Clé").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','text',$isContent['uri']);}]
                    <div class="separateur-tb"></div> 
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description').' <span class="cp-obli">*</span>','description','text',$isContent['description']);}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Modules')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneModules as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Widgets')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneWidgets as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Configuration')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneConfiguration as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Menu principal')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneMenu as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Utilisateurs')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneUsers as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Boutique')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneShop as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Fichiers')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneMedia as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Mon profil')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneProfile as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Modération')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneModeration as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Statistiques')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneStats as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Templates')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneTemplates as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Campagnes')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneCampagnes as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
                                            </div>
                                        </div>
                                    [/]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">[{!$this->doorGets->__('Api Access Token')!}]</div>
                                <div class="panel-body">
                                    [{/($modulesInterneApi as $k=>$v):}]
                                        [{  $check = ""; if (in_array($k,$activeModulesInterne)) {$check = 'checked';} }]
                                        <div  class="doorGets-liste-modules-content-boxin" >
                                            <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                                [{!$this->doorGets->Form->checkbox(ucfirst($v),'modules_interne_'.$k,$k,$check);}] 
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
                                        <table  class="table">
                                            <tr>
                                                <td >
                                                    <div class="extra-module">
                                                        <div  class="check-submodule-[{!$k!}]" >
                                                        [{?(!in_array($v['type'],$noLimitType)):}]
                                                            [{  $check = ""; if (in_array($k,$activeModulesList)) {$check = 'checked';} }]
                                                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Lister'),'module_doorgets_can_list_'.$k,$k,$check);}]
                                                            [{  $check = ""; if (in_array($k,$activeModulesShow)) {$check = 'checked';} }]
                                                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Voir'),'module_doorgets_can_show_'.$k,$k,$check);}]
                                                            [{  $check = ""; if (in_array($k,$activeModulesAdd)) {$check = 'checked';} }]
                                                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ajouter'),'module_doorgets_can_add_'.$k,$k,$check);}]
                                                            [{  $check = ""; if (in_array($k,$activeModulesDelete)) {$check = 'checked';} }]
                                                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Supprimer'),'module_doorgets_can_delete_'.$k,$k,$check);}]
                                                        [?]
                                                        
                                                        [{  $check = ""; if (in_array($k,$activeModulesEdit)) {$check = 'checked';} }]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Modifier'),'module_doorgets_can_edit_'.$k,$k,$check);}]
                                                        [{  $check = ""; if (in_array($k,$activeModulesModo)) {$check = 'checked';} }]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Modérer'),'module_doorgets_can_modo_'.$k,$k,$check);}]
                                                        [{  $check = ""; if (in_array($k,$activeModulesAdmin)) {$check = 'checked';} }]
                                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Administrer'),'module_doorgets_can_admin_'.$k,$k,$check);}]
                                                        </div>
                                                    </div>

                                                    <div class="extra-module">
                                                        [{?(!in_array($v['type'],$noLimitType)):}]
                                                            <div  class=" check-submodule-[{!$k!}]" >
                                                            [{?(!array_key_exists($k,$activeModulesLimit)):}][{$activeModulesLimit[$k] = 0;}][?]
                                                            [{!$this->doorGets->Form->input($this->doorGets->__('Limite *'),'module_doorgets_limit_'.$k,'text',$activeModulesLimit[$k],'mod-group-input is-digit-input');}]
                                                            </div>
                                                        [??]
                                                            [{!$this->doorGets->Form->input('','module_doorgets_limit_'.$k,'hidden','0');}]
                                                        [?]
                                                    </div>
                                                    [{$check = ""; if (in_array($k,$activeModules)) {$check = 'checked';} }]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','module_doorgets_'.$k,$k,$check);}] 

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('#groupes_edit_module_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                    [{ if (!in_array($k,$activeModules)) {  }] $('.check-submodule-[{!$k!}]').hide(); [{ } }]
                                </script>
                                [/]
                            
                        </div>
                        [?]
                        [{?($cWidgets > 0):}]
                        <h2 class="title">[{!$this->doorGets->__("Widgets")!}]</h2>
                        <div class="panel panel-default">
                            [{?($cBlocks > 0):}]
                                [{/($widgets['blok'] as $k=>$v):}]
                                <div  class="doorGets-liste-modules-content-boxin" >
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        [{$check = ""; if (in_array($k,$activeWidgets)) {$check = 'checked';} }]
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,$check);}]
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                            $('#groupes_edit_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                            [{ if (!in_array($k,$activeWidgets)) {  }] $('.check-submodule-[{!$k!}]').hide(); [{ } }]
                                        </script>
                                    </div>
                                </div>
                                [/]
                            [?]
                            [{?($cCarousel > 0):}]
                               [{/($widgets['carousel'] as $k=>$v):}]
                               <div  class="doorGets-liste-modules-content-boxin" >
                                   <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                       [{$check = ""; if (in_array($k,$activeWidgets)) {$check = 'checked';} }]
                                       <table class="table">
                                           <tr>
                                               <td >
                                                   [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                   [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                   [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,$check);}] 
                                               </td>
                                           </tr>
                                       </table>
                                       <script type="text/javascript">
                                           $('#groupes_edit_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                           [{ if (!in_array($k,$activeWidgets)) {  }] $('.check-submodule-[{!$k!}]').hide(); [{ } }]
                                       </script>
                                   </div>
                               </div>
                               [/]
                            [?]
                            [{?($cGenforms > 0):}]
                                [{/($widgets['genform'] as $k=>$v):}]
                                <div  class="doorGets-liste-modules-content-boxin" >
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        [{$check = ""; if (in_array($k,$activeWidgets)) {$check = 'checked';} }]
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,$check);}] 
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                            $('#groupes_edit_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                            [{ if (!in_array($k,$activeWidgets)) {  }] $('.check-submodule-[{!$k!}]').hide(); [{ } }]
                                        </script>
                                    </div>
                                </div>
                                [/]
                            [?]
                            [{?($cSurvey > 0):}]
                                [{/($widgets['survey'] as $k=>$v):}]
                                <div  class="doorGets-liste-modules-content-boxin" >
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}]" >
                                        [{$check = ""; if (in_array($k,$activeWidgets)) {$check = 'checked';} }]
                                        <table class="table">
                                            <tr>
                                                <td >
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_limit_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->input('','widget_doorgets_can_modo_'.$k,'hidden','0');}]
                                                    [{!$this->doorGets->Form->checkbox(ucfirst($v['label']).' <small>('.$v['type'].')</small>','widget_doorgets_'.$k,$k,$check);}] 
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">
                                            $('#groupes_edit_widget_doorgets_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-submodule-[{!$k!}]').fadeIn(); }else{  $('.check-submodule-[{!$k!}]').fadeOut();  } });
                                            [{ if (!in_array($k,$activeWidgets)) {  }] $('.check-submodule-[{!$k!}]').hide(); [{ } }]
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
                    <h2 class="title">[{!$this->doorGets->__("Liste des groupes enfants")!}]</h2>
                        [{/($groupes as $k=>$v):}]
                        <div class="panel panel-default">
                            <div class="panel-body">
                                [{$check = ""; if (in_array($k,$activeGroupesEnfants)) {$check = 'checked';} }]
                                <div class="row ">
                                    <div  class="doorGets-liste-modules-content check-module-[{!$k!}] col-md-10" >
                                        [{!$this->doorGets->Form->checkbox(ucfirst($v),'groupes_enfants_'.$k,$k,$check);}]
                                    </div>
                                    <div  class="doorGets-liste-modules-subcontent check-subgroupe-[{!$k!}]  col-md-2" >
                                        [{  $check = ""; if (in_array($k,$activeGroupesEnfantsModo)) {$check = 'checked';} }]
                                        [{!$this->doorGets->Form->checkbox($this->doorGets->__('Modérateur'),'groupes_enfants_can_modo_'.$k,'can_modo',$check);}]
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('#groupes_edit_groupes_enfants_[{!$k!}]').click(function() { if ($(this).is(':checked')) { $('.check-subgroupe-[{!$k!}]').fadeIn(); }else{ $('.check-subgroupe-[{!$k!}]').fadeOut(); } });
                                    [{ if (!in_array($k,$activeGroupesEnfants)) { }] $('.check-subgroupe-[{!$k!}]').hide(); [{ } }]
                                </script>
                            </div>
                        </div>
                        [/]
                    <h2 class="title">[{!$this->doorGets->__("Liste des groupes parents")!}]</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            [{?(!empty($activeGroupesParents)):}]
                                [{/($activeGroupesParents as $k=>$v):}]
                                    [{?(array_key_exists($v,$groupes)):}]
                                        [{$check = ""; if (in_array($v,$activeGroupesParents)) {$check = 'checked';} }]
                                        <div class="input-group ">
                                            <input type="checkbox" checked="checked" disabled> [{!$groupes[$v]!}]
                                        </div>
                                    [?]
                                [/]
                            [??]
                                <div><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a aucun parent pour ce groupe")!}]</span></div>
                            [?]
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-5">
                    <div class="overflow"> 
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="title-header-attributes" >
                                    <li>[{!$this->doorGets->__("Attributs du groupe")!}]</li>
                                </ul> 
                                <ul id="is-groupe-in" class="connectedSortable">
                                    [{/($AttributesActifs as $key => $attibute):}]
                                        <li class="ui-state-default" id="groupe-out-[{!$key!}]">[{!$attibute['title']!}] <span class="pull-right">[[{!$attibute['type']!}]]</span></li>
                                    [/]
                                </ul>
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
                </div>
                <div class="tab-pane fade" id="tabs-6">
                    [{$check = ""; if ($activeEditorCkeditor) {$check = 'checked';} }]
                    [{!$this->doorGets->Form->checkbox('CKEditor','editor_ckeditor','active',$check);}]
                    <a href="http://ckeditor.com/" target="blank">http://ckeditor.com/</a>
                    <div class="separateur-tb"></div>
                    [{$check = ""; if ($activeEditorTinymce) {$check = 'checked';} }]
                    [{!$this->doorGets->Form->checkbox('TinyMCE','editor_tinymce','active',$check);}]
                    <a href="http://www.tinymce.com/" target="blank">http://www.tinymce.com/</a>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select('Roxy Fileman:','fileman',$fileman,$isContent['fileman']);}]
                    <br /><a href="http://www.roxyfileman.com/" target="blank">http://www.roxyfileman.com/</a>                
                </div>
                 <div class="tab-pane fade" id="tabs-7">    
                    <div class="row">
                        <div class="col-md-6">
                            [{$check = ""; if ($isContent['saas_options']['saas_add']) {$check = 'checked';} }]
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__("Ajouter"),'saas_add','active',$check);}]
                            <div class="separateur-tb"></div>
                            [{$check = ""; if ($isContent['saas_options']['saas_delete']) {$check = 'checked';} }]
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__("Supprimer"),'saas_delete','active',$check);}]
                            <div class="separateur-tb"></div>           
                        </div>    
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Limite').'*','saas_limit','text',$isContent['saas_options']['saas_limit'],'mod-group-input is-digit-input');}]
                            <div class="separateur-tb"></div> 
                        </div>
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Nombre de jours').'*','saas_date_end','text',$isContent['saas_options']['saas_date_end'],'mod-group-input is-digit-input');}]
                            <div class="separateur-tb"></div> 
                        </div>
                    </div> 
                    <div class="row">
                        [{/($activeSaasOptions['saas_constant'] as $k=>$v):}]
                            [{?(is_bool($activeSaasOptions['saas_constant'][$k])):}]
                            [{ $check = ($activeSaasOptions['saas_constant'][$k])?'checked':"";}]
                            <div class="col-md-3">
                                    [{!$this->doorGets->Form->checkbox($k,'saas_constant['.$k.']',1,$check);}] 
                            </div>
                            [?]
                        [/]
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
    <script type="text/javascript">

        function doTransfertToInput() {

            var newValueAttribute;

            $( "#is-groupe-in li" ).each(function() {
                var id = $(this).attr('id');
                console.log(id);
                if (id && id != undefined) {
                    id = id.replace('groupe-out-','');
                    newValueAttribute = newValueAttribute + id + ',';
                }
                
            });

            newValueAttribute = newValueAttribute.replace('undefined','')
            $('#groupes_edit_attributes').val(newValueAttribute);

        }

        $('#is-groupe-in').mouseout(function() {
            doTransfertToInput();
        });

        $('#is-groupe-out').mouseout(function() {
            doTransfertToInput();
        });

        $('#groupes_edit_submit').click(function() {
            doTransfertToInput();
        });
    </script>
</div>
