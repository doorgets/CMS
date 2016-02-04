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

$send_email_to = $this->doorGets->configWeb['email'];


?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">
        
    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$getHtmlFormAddTop!}]
        </legend>
        
        [{!$this->doorGets->Form->open('post','')!}]
        [{!$this->doorGets->Form->input('','type','hidden','addgenform')!}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Champs du formulaire')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Paramètres')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__("Clé").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small>','uri');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Url de redirection').' <small style="font-weight:100;">('.$this->doorGets->__('Laissez vide pour ne pas rediriger la page').')</small>','redirection')!}]
                    <div class="separateur-tb"></div>
                    
                </div>
                <div class="tab-pane fade" id="tabs-2">      
                    <label>[{!$this->doorGets->__('Choisir les champs de votre formulaire')!}] :</label>
                    <div class="separateur-tb"></div>
                    <span class="cp-obli">*</span> [{!$this->doorGets->__('Champ obligatoire')!}] 
                    <div class="row">
                        <div class="col-md-10"> 
                            <ul id="sortable" class=" list-group" style="min-height: 30px;width: 100%;background: #f1f1f1;">
                                [{?(!empty($iLabel)):}]
                                    
                                    [{-($i=1;$i<$iLabel+1;$i++):}]
                                    
                                        [{
                                        
                                            switch ($Form['input-type-'.$i]) {
                                            
                                                case 'tag-title':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxTitle(true,false,$i,$Form['input-label-'.$i],$Form['input-active-'.$i],$Form['input-filter-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                    
                                                case 'tag-quotte':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxQuotte(true,false,$i,$Form['input-label-'.$i],$Form['input-active-'.$i],$Form['input-filter-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                    
                                                case 'tag-separateur':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxSeparateur(true,false,$i,$Form['input-label-'.$i],$Form['input-active-'.$i],$Form['input-filter-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'text':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxText('text',false,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-filter-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'textarea':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxText('textarea',false,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-filter-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'select':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxSelect('select',false,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$Form['input-liste-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'checkbox':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxSelect('checkbox',false,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$Form['input-liste-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'radio':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{!$this->getBoxSelect('radio',false,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$Form['input-liste-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'file':
                                                    }]
                                                    <li  class=" ui-state-highlight list-group-item">
                                                        [{
                                                            $tZip = $tPng = $tJpg = $tGif = $tPdf = $tSwf = $tDoc = '1';
                                                            if (!array_key_exists('input-zip-'.$i,$Form) ) {$tZip = '';}
                                                            if (!array_key_exists('input-png-'.$i,$Form) ) {$tPng = '';}
                                                            if (!array_key_exists('input-jpg-'.$i,$Form) ) {$tJpg = '';}
                                                            if (!array_key_exists('input-gif-'.$i,$Form) ) {$tGif = '';}
                                                            if (!array_key_exists('input-pdf-'.$i,$Form) ) {$tPdf = '';}
                                                            if (!array_key_exists('input-swf-'.$i,$Form) ) {$tSwf = '';}
                                                            if (!array_key_exists('input-doc-'.$i,$Form) ) {$tDoc = '';}
                                                        }]
                                                        [{!$this->getBoxFile(false,false,$i, $Form['input-label-'.$i],
                                                                                            $Form['input-value-'.$i],
                                                                                            $Form['input-active-'.$i],
                                                                                            $Form['input-obligatoire-'.$i],
                                                                                            $Form['input-info-'.$i],
                                                                                            $Form['input-css-'.$i],
                                                                                            $tZip,$tPng,$tJpg,$tGif,$tPdf,$tSwf,$tDoc)!}]
                                                    </li>
                                                    [{
                                                    break;
                                            }
                                        }]
                                    [-]
                                [?]
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul class="list-group" >
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxTitle(true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxQuotte(true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxSeparateur(true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxText('text',true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxText('textarea',true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxSelect('select',true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxSelect('checkbox',true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxSelect('radio',true,true)!}]
                                </li>
                                <li class="draggable ui-state-highlight list-group-item">
                                    [{!$this->getBoxFile(true,true)!}]
                                </li>
                            </ul>
                        </div>            
                    </div>
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-3">      
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activé').'','active','1','checked');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer la sécurité').' CAPTCHA','recaptcha','1','checked');}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Recevoir les notifications par e-mail').'','send_mail','1','checked');}]
                    <div class="separateur-tb"></div>
                    
                </div>
            </div>
        </div>
        
        <div class="separateur-tb"></div>
        <div class="text-center">[{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]</div>
        [{!$this->doorGets->Form->close();}]
    </div>

</div>
