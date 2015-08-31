<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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
    
    $phpOpen = '[[php/o]]';
    $phpClose = '[[php/c]]';
    
    $article = $isContent['article_tinymce'];
    
    $article = str_replace(";?",$phpOpen,$article);
    $article = str_replace("?&",$phpClose,$article);
    $article = htmlspecialchars_decode(html_entity_decode($article));
    $article = str_replace($phpOpen,"; ?",$article); 
    $article = str_replace($phpClose,"? &",$article); 
    
    $ruri = $this->doorGets->getRealUri($this->doorGets->Uri);
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
        
        [{?(!empty($isContent['image'])):}]
            <img src="[{!URL.'data/'.$ruri.'/'.$isContent['image']!}]" class="edit-image-[{!$ruri!}] img-responsive edit-image-back" />
        [?]
        [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image de couverture').' ','image',$isContent['image']);}]
        <div class="separateur-tb"></div>
        [{!$this->doorGets->Form->textarea($this->doorGets->__('Article').' <span class="cp-obli">*</span>','article_tinymce',$article,'tinymce ckeditor')!}]
        <div class="separateur-tb"></div>
        [{?(!empty($listeCategories)):}]
            <label>[{!$this->doorGets->__('Catégories')!}] </label>
            <div class="separateur-tb"></div>
            [{/($listeCategories as $uri=>$value):}]
                [{$valCheck = '';}]
                [{?(in_array($value['id'],$listeCategoriesContent)):}]
                    [{$valCheck = 'checked';}]
                [?]
                [{!$this->doorGets->Form->checkbox($value['name'],'categories_'.$value['id'],'1',$valCheck,'cat-edit-level-'.$value['level'])!}]
            [/]
            <div class="separateur-tb"></div>
        [?]
        [{!$formEditBottomExtra!}]
        
    </div>
</div>
