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

    $cVersion = $this->getCountVersion();
    $versions = $this->getAllVersion();

    $url = "?controller=module".$moduleInfos['type']."&uri=".$moduleInfos['uri']."&action=edit&id=".$isContent['id_content']."&lg=".$lgActuel;
    $aAuthorBadge = Constant::$modulesWithUserBadge;

    $ruri = $this->doorGets->Uri;

    
?>
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
            [{?(in_array($moduleInfos['type'],$aAuthorBadge)):}]
                [{!$this->doorGets->Form->checkbox($this->doorGets->__("Afficher de badge de l'auteur"),'author_badge',1,$isAuthorBadge)!}]
            [?]
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
        </div>
    [?]
    </div>
</div>

[{?($user_can_edit):}]
<div class="separateur-tb"></div>
<div class="text-center">
    [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
</div>
[??]
    [{!$htmlCanotEdit!}]
[?]

[{!$this->doorGets->Form->close();}]

<script type="text/javascript">
    
    
    $("#module[{!$moduleInfos['type']!}]_edit_titre").keyup(function() {
    
        var str = $(this).val();
        $("#module[{!$moduleInfos['type']!}]_edit_meta_titre").val(str);
        $("#module[{!$moduleInfos['type']!}]_edit_meta_facebook_titre").val(str);
        $("#module[{!$moduleInfos['type']!}]_edit_meta_twitter_titre").val(str);
        
    });
    $("#module[{!$moduleInfos['type']!}]_edit_meta_description").keyup(function() {
    
        var str = $(this).val();
        var lendesc =  str.length;
        if (lendesc >= 250) {
            str = str.substr(0,250);
        }
        $("#module[{!$moduleInfos['type']!}]_edit_meta_facebook_description").val(str);
        $("#module[{!$moduleInfos['type']!}]_edit_meta_twitter_description").val(str);
        
    });
</script>
