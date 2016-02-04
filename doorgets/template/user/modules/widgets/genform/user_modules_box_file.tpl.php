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
    -= One life for One code =-
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
<div class="cp-text">
    <div class="cp-title">
        
        <img  src="[{!BASE_IMG!}]genform_upload.png" title="[{!$this->doorGets->__('Envoyer un fichier')!}]"> [{!$this->doorGets->__('Envoyer un fichier')!}]
        
        <div class="right hid"  [{?($displayDelete):}]  style="display: none;" [?] >
            <span class="right close-me"><img  src="[{!BASE_IMG!}]delete.png" title="[{!$this->doorGets->__('Suppimer')!}]"></span>
        </div>
        
        <div class=" right hid"   [{?($displayBox):}]  style="display: none;" [?]  >
            
            <select class="input-obligatoire"  [{?($i):}] name="input-obligatoire-[{!$i!}]" [?]  >
                <option value="no"  [{?($lObli === 'no'):}] selected="selected" [?] >[{!$this->doorGets->__('Optionnel')!}]</option>
                <option value="yes"  [{?($lObli === 'yes'):}] selected="selected" [?] >[{!$this->doorGets->__('Obligatoire')!}]</option>
            </select>
            
            <select class="input-active"  [{?($i):}] name="input-active-[{!$i!}]" [?]  >
                <option value="yes"  [{?($lActive === 'yes'):}] selected="selected" [?] >[{!$this->doorGets->__('Visible')!}]</option>
                <option value="no"  [{?($lActive === 'no'):}] selected="selected" [?] >[{!$this->doorGets->__('Invisible')!}]</option>
            </select>
            
        </div>
        
    </div>
    <div class="hid"  [{?($displayBox):}]  style="display: none;" [?] >
    
        <table class="tb-cp">
            <tr>
                <td>
                
                    <label class="cp-label">[{!$this->doorGets->__('Label')!}] <span class="cp-obli">*</span></label>
                    <input class="input-label [{?( array_key_exists('input-label-'.$i,$this->doorGets->Form->e) ):}]  l-error [?]"
                           [{?($i):}] name="input-label-[{!$i!}]" [?] value="[{!$lLabel!}]"  >
                    <input class="input-type" value="file" type="hidden" >
                    <input class="input-value"  type="hidden"
                        [{?($i):}] name="input-value-[{!$i!}]" value = "[{!$lValue!}]" [?]  >
                </td>
            </tr>
            <tr>
                <td >
                    <div >
                        <label>[{!$this->doorGets->__('Type de fichier')!}]</label>
                        [{?($i && empty($tZip) && empty($tPng) && empty($tJpg) && empty($tGif) && empty($tPdf) && empty($tSwf) && empty($tDoc)):}]
                            <span class="right" >[{!$this->doorGets->__('Veuillez choisir un type de fichier')!}]</span>
                        [?]
                    </div>
                    
                    <div class="box-bt-type">
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-zip" 
                            [{?($i):}] name="input-zip-[{!$i!}]" [?]
                            [{?(!$i && empty($tZip)):}]  checked="checked" [?]
                            [{?( $i && !empty($tZip) ):}]  checked="checked" [?]
                            value="1"  >
                        Zip / xZip</label></div>
                        
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-png" 
                            [{?($i):}] name="input-png-[{!$i!}]" [?]
                            [{?(!$i && empty($tPng)):}]  checked="checked" [?]
                            [{?( $i && !empty($tPng) ):}]  checked="checked" [?]
                             value="1"  >
                        PNG</label></div>
                        
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-jpg" 
                            [{?($i):}] name="input-jpg-[{!$i!}]" [?]
                            [{?(!$i && empty($tJpg)):}]  checked="checked" [?]
                            [{?( $i && !empty($tJpg) ):}]  checked="checked" [?]
                            value="1"  >
                        JPG/JPEG </label></div>
                        
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-gif" 
                            [{?($i):}] name="input-gif-[{!$i!}]" [?]
                            [{?(!$i && empty($tGif)):}]  checked="checked" [?]
                            [{?( $i && !empty($tGif) ):}]  checked="checked" [?]
                            value="1"  >
                        GIF</label></div>
                        
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-swf" 
                            [{?($i):}] name="input-swf-[{!$i!}]" [?]
                            [{?(!$i && empty($tSwf)):}]  checked="checked" [?]
                            [{?( $i && !empty($tSwf) ):}]  checked="checked" [?]
                            value="1"  >
                        SWF</label></div>
                        
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-pdf" 
                            [{?($i):}] name="input-pdf-[{!$i!}]" [?]
                            [{?(!$i && empty($tPdf)):}]  checked="checked" [?]
                            [{?( $i && !empty($tPdf) ):}]  checked="checked" [?]
                            value="1"  >
                        PDF</label></div>
                        
                        <div class="box-w-file">
                            <label>
                            <input type="checkbox" class="input-doc" 
                            [{?($i):}] name="input-doc-[{!$i!}]" [?]
                            [{?( !$i && empty($tDoc) ):}]  checked="checked" [?]
                            [{?( $i && !empty($tDoc) ):}]  checked="checked" [?]
                            value="1"  >
                        DOC / DOCX</label></div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="btn-plus">+ [{!$this->doorGets->__('Plus')!}]</div>
        <div  class="box-moins" style="display: none;"  >
            <div class="btn-moins">- [{!$this->doorGets->__('Masquer')!}]</div>
            <table class="tb-cp" >
                <tr>
                    <td>
                        <label>[{!$this->doorGets->__('Information')!}]</label>
                        <input class="input-info"   [{?($i):}] name="input-info-[{!$i!}]" [?] value="[{!$lInfo!}]"  >
                    </td>
                    <td>
                        <label>[{!$this->doorGets->__('Classe CSS')!}]</label>
                        <input class="input-css"  [{?($i):}] name="input-css-[{!$i!}]" [?] value="[{!$lCss!}]"  >
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>