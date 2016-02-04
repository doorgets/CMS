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

    $article = $this->doorGets->_cleanPHP($isContent['reponse_tinymce']);
    
    $cVersion = $this->getCountVersion();
    $versions = $this->getAllVersion();
    $url = "?controller=module".$moduleInfos['type']."&uri=".$moduleInfos['uri']."&action=edit&id=".$isContent['id_content']."&lg=".$lgActuel;

    unset($aActivation[0]);

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
        [{!$this->doorGets->Form->open('post','');}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                [{?($is_modo):}]
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Version')!}]</a></li>
                [?]
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{?($is_modo):}]
                        [{!$this->doorGets->Form->select($this->doorGets->__('Statut'),'active',$aActivation,$isContent['active']);}]
                        <div class="separateur-tb"></div>
                    [?]
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Question').' <span class="cp-obli">*</span>','question',$isContent['question'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Réponse').' <span class="cp-obli">*</span>','reponse_tinymce',$article,'tinymce ckeditor')!}]
                    <div class="separateur-tb"></div>
                </div>
                [{?($is_modo):}]
                <div class="tab-pane fade" id="tabs-2">
                    <div class="separateur-tb"></div>
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
                            <th>[{!$this->doorGets->__('Statut')!}]</th>
                            <th>[{!$this->doorGets->__('Date')!}]</th>
                            <th></th>
                        </tr>
                        [{/($versions as $version):}]
                            [{
                                $ImageStatut = 'fa-ban red';
                                if ($version['active'] == '2') {
                                    $ImageStatut = 'fa-eye green-c';
                                } elseif ($version['active'] == '3') {
                                    $ImageStatut = 'fa-hourglass-start orange-c';
                                } elseif ($version['active'] == '4') {
                                    $ImageStatut = 'fa-pencil gris-c';
                                }

                                $urlStatut = '<i class="fa '.$ImageStatut.' fa-lg" ></i>';
                            }]
                            <tr>
                                <td>[{!$version['id']!}]</td>
                                <td>[{!$version['pseudo']!}]</td>
                                <td>[{!$version['id_user']!}]</td>
                                <td>[{!$version['id_groupe']!}]</td>
                                <td>[{!$urlStatut!}]</td>
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
        [{?($user_can_edit):}]
        <div class="text-center">
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
        </div>
        [??]
            [{!$htmlCanotEdit!}]
        [?]
        [{!$this->doorGets->Form->close();}]
        
    </div>
</div>
