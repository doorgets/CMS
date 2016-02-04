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
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">

        </div>
        
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="[{!$this->doorGets->goBackUrl()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            [{?($is_modules_modo):}]
                <span class="create" ><a href="?controller=translator&action=add&lg=[{!$lgActuel!}]"class="violet" ><b class="glyphicon glyphicon-plus"></b> [{!$this->doorGets->__('Ajouter une phrase')!}]</a></span>
            [?]
            [{?($is_modo && $isVersionActive):}]
            <span class="badge create">
                [{!$this->doorGets->__('Version')!}] #[{!$version_id!}] 
                <a href="?controller=translator&action=edit&id=[{!$isContent['id_translator']!}]&lg=[{!$lgActuel!}]" class="red">[{!$this->doorGets->__('Annuler')!}]</a>
            </span>
            [?] 
            <span class="create">[{!$this->doorGets->genLangueMenuAdminTraduction()!}]</span>
            <b class="glyphicon glyphicon-flag"></b> <a href="?controller=translator&lg=[{!$lgActuel!}]">[{!$this->doorGets->__('Traduction')!}]</a> 
             / [{!$this->doorGets->__('Modifier une phrase')!}] 
        </legend>
        <ul class="pager">
            <li class="previous [{?(empty($urlPrevious)):}]disabled[?]"><a href="[{!$urlPrevious!}]">&larr; [{!$this->doorGets->__('Précèdent')!}]</a></li>
            <li class="next [{?(empty($urlNext)):}]disabled[?]"><a href="[{!$urlNext!}]">[{!$this->doorGets->__('Suivant')!}] &rarr;</a></li>
        </ul>    
        <div class="width-listing">

            [{!$this->doorGets->Form->open('post')!}]
            <div >
                <ul class="nav nav-tabs">
                    <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Traduction')!}]</a></li>
                    [{?($is_modules_modo):}]
                        <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Version')!}]</a></li>
                    [?]
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabs-1">
                        [{!$this->doorGets->Form->input($this->doorGets->__('Phrase').' <span class="cp-obli">*</span> : '.$googleTranslateUrl.'<br />','translated_sentence','text',$isContent['translated_sentence'])!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->select($this->doorGets->__('Traduit'),'is_translated',$yesno,$isContent['is_translated']);}]
                        <div class="separateur-tb"></div>
                        <label>[{!$this->doorGets->__('Position')!}] : </label> [{!$position!}]/[{!$countTotal!}]
                    </div>
                    [{?($is_modules_modo):}]
                    <div class="tab-pane fade" id="tabs-2">
                        <div class="separateur-tb"></div>
                        <h4>
                            [{!$this->doorGets->__('Nombre de version')!}] : [{!$cVersion!}]
                        </h4>
                        [{?($cVersion > 0):}]
                        <table class="table text-center doorgets-listing">
                            <tr>
                                <th>[{!$this->doorGets->__('Id')!}]</th>
                                <th>[{!$this->doorGets->__('Pseudo utilisateur')!}]</th>
                                <th>[{!$this->doorGets->__('Id utilisateur')!}]</th>
                                <th>[{!$this->doorGets->__('Id groupe')!}]</th>
                                <th>[{!$this->doorGets->__('Traduit')!}]</th>
                                <th>[{!$this->doorGets->__('Date')!}]</th>
                                <th></th>
                            </tr>
                            [{/($versions as $version):}]
                                [{
                                    if (array_key_exists($version['is_translated'],$yesno) )
                                    {
                                        $version['is_translated'] = $yesno[$version['is_translated']];
                                        
                                    }
                                }]
                                <tr>
                                    <td>[{!$version['id']!}]</td>
                                    <td>[{!$version['pseudo']!}]</td>
                                    <td>[{!$version['id_user']!}]</td>
                                    <td>[{!$version['id_groupe']!}]</td>
                                    <td>[{!$version['is_translated']!}]</td>
                                    <td>[{!GetDate::in($version['date_creation'])!}]</td>
                                    <td "><a href="[{!$url.'&version='.$version['id']!}]" title="[{!$this->doorGets->__('Charger')!}]"><b class="glyphicon glyphicon-transfer "></b></a></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-left td-impair">
                                        <div class="panel panel-default">
                                            <div class="panel-footer">[{!$version['translated_sentence']!}]</div>
                                        </div>
                                    </td>
                                </tr>
                            [/]
                        </table>
                        [?]
                        <div class="separateur-tb"></div>
                    </div>
                    [?]
                </div>
            </div>

        </div>
        
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Aller à la prochaine traduction'),'go_to_next','1',"checked");}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
        </div>
        [{!$this->doorGets->Form->close()!}]
    </div>
</div>