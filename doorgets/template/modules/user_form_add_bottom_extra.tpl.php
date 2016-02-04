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

$aAuthorBadge = Constant::$modulesWithUserBadge;
// var_dump($this->doorGets->configWeb);
// exit();
?>
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->inputTags($this->doorGets->__('Tags'),'tags');}]
            <div class="separateur-tb"></div>
        </div>
        <div class="tab-pane fade" id="tabs-2">
            <ul id="sortable-gallery-image">
            </ul>
            [{!$this->doorGets->Form->multiFileAjax($this->doorGets->__('Ajouter une image'),'image_gallery')!}]
        </div>
        <div class="tab-pane fade" id="tabs-3">
            [{!$this->doorGets->Form->input($this->doorGets->__('Meta Titre'),'meta_titre');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Meta Description'),'meta_description');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Meta mots clés'),'meta_keys');}]
            <div class="separateur-tb"></div>  
            <hr />
            <h4 class="violet">Facebook META</h4>
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_facebook_type',$this->doorGets->getArrayForms('facebook_type'));}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_facebook_titre');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_facebook_description');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_facebook_image');}]
            <div class="separateur-tb"></div>
            <hr />
            <h4 class="violet">Twitter META</h4>
            <div class="separateur-tb"></div
            [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_twitter_type',$this->doorGets->getArrayForms('twitter_type'));}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_twitter_titre');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_twitter_description');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_twitter_image');}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->input('Player iframe URL (https)','meta_twitter_player');}]
            <div class="separateur-tb"></div>
        </div>
        [{?($is_modo):}]
        <div class="tab-pane fade" id="tabs-4">
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires doorGets'),'comments','1','checked')!}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires').' Disqus ','disqus','1','')!}]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires').' Facebook ','facebook','1','')!}]
            <div class="separateur-tb"></div>
        </div>
        <div class="tab-pane fade" id="tabs-5">
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser le partage').' ShareThis','partage','1','checked')!}]
            [{?(in_array($moduleInfos['type'],$aAuthorBadge)):}]
                <div class="separateur-tb"></div>
                [{!$this->doorGets->Form->checkbox($this->doorGets->__("Afficher de badge de l'auteur"),'author_badge','1',$isAuthorBadge)!}]
            [?]
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ajouter au flux RSS').'','in_rss','1','checked')!}]
            <div class="separateur-tb"></div>
        </div>
        [?]
    </div>
</div>
<div class="separateur-tb"></div>
<div class="text-center">
  [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
</div>
  [{!$this->doorGets->Form->close();}]
        
<script type="text/javascript">

$("#module[{!$moduleInfos['type']!}]_add_titre").keyup(function() {

    var str = $(this).val();
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
  
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
      .replace(/\s+/g, '-') // collapse whitespace and replace by -
      .replace(/-+/g, '-'); // collapse dashes
      
    $("#module[{!$moduleInfos['type']!}]_add_uri").val(str);        
});
$("#module[{!$moduleInfos['type']!}]_add_titre").keyup(function() {

    var str = $(this).val();
    $("#module[{!$moduleInfos['type']!}]_add_meta_titre").val(str);
    $("#module[{!$moduleInfos['type']!}]_add_meta_facebook_titre").val(str);
    $("#module[{!$moduleInfos['type']!}]_add_meta_twitter_titre").val(str);
    
});
$("#module[{!$moduleInfos['type']!}]_add_meta_description").keyup(function() {

    var str = $(this).val();
    var lendesc =  str.length;
    if (lendesc >= 250) {
      str = str.substr(0,250);
    }
    $("#module[{!$moduleInfos['type']!}]_add_meta_facebook_description").val(str);
    $("#module[{!$moduleInfos['type']!}]_add_meta_twitter_description").val(str);
    
});
</script>
