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

    
$send_email_to = $isContent['send_mail_to'];

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$getHtmlFormEditTop!}]
        </legend>
        
        [{!$this->doorGets->Form->open('post','')!}]
        [{!$this->doorGets->Form->input('','type','hidden','editgenform')!}]
        <div >
            <ul  class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Champs du formulaire')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__('Paramètres')!}]</a></li>
            </ul>
                <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre','text',$isContent['titre'])!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Url de redirection').' <small style="font-weight:100;">('.$this->doorGets->__('Laissez vide pour ne pas rediriger la page').')</small>','redirection','text',$isContent['redirection'])!}]
                    <div class="separateur-tb"></div>
                    
                </div>
                <div class="tab-pane fade" id="tabs-2">       
                    <span class="cp-obli">*</span> [{!$this->doorGets->__('Champ obligatoire')!}] 
                    <div class="row">
                        <div class="col-md-12">
                            <ul id="editsortable" class=" list-group" style="min-height: 30px;width: 100%;background: #f1f1f1;">
                                [{?(!empty($iLabel)):}]
                                    
                                    [{-($i=1;$i<$iLabel+1;$i++):}]
                                    
                                        [{
                                        
                                            switch ($Form['input-type-'.$i]) {
                                            
                                                case 'tag-title':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxTitle(true,false,$i,$Form['input-label-'.$i],$Form['input-active-'.$i],$Form['input-filter-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                    
                                                case 'tag-quotte':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxQuotte(true,false,$i,$Form['input-label-'.$i],$Form['input-active-'.$i],$Form['input-filter-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                    
                                                case 'tag-separateur':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxSeparateur(true,false,$i,$Form['input-label-'.$i],$Form['input-active-'.$i],$Form['input-filter-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                    
                                                case 'text':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxText('text',true,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-filter-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'textarea':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxText('textarea',true,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-filter-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'select':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxSelect('select',true,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$Form['input-liste-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'checkbox':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxSelect('checkbox',true,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$Form['input-liste-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'radio':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{!$this->getBoxSelect('radio',true,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$Form['input-liste-'.$i])!}]
                                                    </li>
                                                    [{
                                                    break;
                                                case 'file':
                                                    }]
                                                    <li  class="list-group-item ui-state-highlight">
                                                        [{
                                                            $tZip = $tPng = $tJpg = $tGif = $tPdf = $tSwf = $tDoc = '';
                                                            if (array_key_exists('input-zip-'.$i,$Form) && !empty($Form['input-zip-'.$i])) {$tZip = '1';}
                                                            if (array_key_exists('input-png-'.$i,$Form) && !empty($Form['input-png-'.$i])) {$tPng = '1';}
                                                            if (array_key_exists('input-jpg-'.$i,$Form) && !empty($Form['input-jpg-'.$i])) {$tJpg = '1';}
                                                            if (array_key_exists('input-gif-'.$i,$Form) && !empty($Form['input-gif-'.$i])) {$tGif = '1';}
                                                            if (array_key_exists('input-pdf-'.$i,$Form) && !empty($Form['input-pdf-'.$i])) {$tPdf = '1';}
                                                            if (array_key_exists('input-swf-'.$i,$Form) && !empty($Form['input-swf-'.$i])) {$tSwf = '1';}
                                                            if (array_key_exists('input-doc-'.$i,$Form) && !empty($Form['input-doc-'.$i])) {$tDoc = '1';}
                                                        }]
                                                        [{!$this->getBoxFile(true,false,$i,$Form['input-label-'.$i],$Form['input-value-'.$i],$Form['input-active-'.$i],$Form['input-obligatoire-'.$i],$Form['input-info-'.$i],$Form['input-css-'.$i],$tZip,$tPng,$tJpg,$tGif,$tPdf,$tSwf,$tDoc)!}]
                                                    </li>
                                                    [{
                                                    break;
                                            }
                                        }]
                                    [-]
                                [?]
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="tab-pane fade" id="tabs-3">       
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activé').'','active','1',$isActiveModule);}]
                    <div class="separateur-tb"></div>        
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Activer la sécurité').' CAPTCHA','recaptcha','1',$isActiveRecaptcha);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Recevoir les notifications par e-mail'),'send_mail','1',$isSendEmailTo);}]
                    <div class="separateur-tb"></div>
                </div>
            </div>
        </div>
         <div class="separateur-tb"></div>
        <div class="text-center">[{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]</div>
        
        [{!$this->doorGets->Form->close();}]
    </div>

</div>