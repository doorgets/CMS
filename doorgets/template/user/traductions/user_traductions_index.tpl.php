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
            <span class="create">
                <a href="?controller=translator"><b class="glyphicon glyphicon-list-alt"></b> [{!$this->doorGets->__('CRUD')!}]</a>
            </span>
            <span class="create">[{!$this->doorGets->genLangueMenuAdminTraduction()!}]</span>
            <b class="glyphicon glyphicon-flag"></b> [{!$this->doorGets->__('Traductions')!}]
        </legend>
        
        [{?(!empty($cFields)):}]
            [{!$this->doorGets->__('Nombre de phrases traduites')!}] : [{!$cFieldsTo!}] / <b>[{!$cFields!}]</b>
            <div class="separateur-tb"></div>
            [{!$this->doorGets->Form->open('post');}]
            [{/($wTranslate as $k => $v):}]
                [{
                    $valCss = '';
                    $googleTranslateUrl = '<a href="https://translate.google.com/#fr/'.$_toLanguage.'/'.urlencode($v).'" target="blank">'.$v.' <b class="glyphicon glyphicon-share-alt"></b></a>';
                }]
                [{?(!array_key_exists($k,$_w)):}][{
                    $valCss = 'doorGets-no-value';
                    $_w[$k] = $v;
                }][?]
                <div style="margin-bottom:5px;border-left: solid 5px #ccc;padding: 5px;">
                    [{?($k):}]<span class="right">[{!$this->doorGets->Form->checkbox(' '.$this->doorGets->__('Supprimer'),'wdel_'.$k,'1')!}]</span>[?]  
                    [{?($k):}][{!$this->doorGets->Form->input($k." : <b>$googleTranslateUrl</b>",'words_'.$k,'text',$_w[$k],$valCss)!}][?]
                    [{?(!$k):}][{!$this->doorGets->Form->input($k." : <b>$v</b>",'words_'.$k,'hidden',$_w[$k],$valCss)!}][?]
                </div>
                
            [/]

            <div class="separateur-tb"></div>
            <div class="text-center">[{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]</div>
            
            [{!$this->doorGets->Form->close();}]
        [??]
            <div class="alert alert-info">
                [{!$this->doorGets->__('Aucune phrase à traduire.')!}]
            </div>
        [?]
    </div>
</div>
