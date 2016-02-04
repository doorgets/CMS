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
    
        [{?($type === 'text'):}]
            <img  src="[{!BASE_IMG!}]genform_text.png" title="[{!$this->doorGets->__('Champ texte')!}]"> [{!$this->doorGets->__('Champ texte')!}]
        [??]
            <img  src="[{!BASE_IMG!}]genform_textarea.png" title="[{!$this->doorGets->__('Champ texte multiligne')!}]"> [{!$this->doorGets->__('Champ texte multiligne')!}]
        [?]
        
        <div class="right hid"  [{?($displayDelete):}]  style="display: none;" [?] >
             <span class="right close-me"><img  src="[{!BASE_IMG!}]delete.png" title="[{!$this->doorGets->__('Suppimer')!}]"></span>
         </div>
        
        <div class=" right hid"   [{?($displayBox):}]  style="display: none;" [?]  >
            
            [{?($type === 'text'):}]
                
                <select class="input-filter"   [{?($i):}] name="input-filter-[{!$i!}]" [?]   >
                    <option value="simple" [{?($lFilter === 'simple'):}] selected="selected" [?] >[{!$this->doorGets->__('Simple')!}]</option>
                    <option value="email" [{?($lFilter === 'email'):}] selected="selected" [?] >[{!$this->doorGets->__('Email')!}]</option>
                    <option value="url" [{?($lFilter === 'url'):}] selected="selected" [?] >[{!$this->doorGets->__('URL')!}]</option>
                    <option value="alpha" [{?($lFilter === 'alpha'):}] selected="selected" [?] >[{!$this->doorGets->__('Alpha')!}]</option>
                    <option value="num" [{?($lFilter === 'num'):}] selected="selected" [?] >[{!$this->doorGets->__('Numérique')!}]</option>
                    <option value="alphanum" [{?($lFilter === 'alphanum'):}] selected="selected" [?] >[{!$this->doorGets->__('Alpha-Numérique')!}]</option>
                    <option value="date" [{?($lFilter === 'date'):}] selected="selected" [?] >[{!$this->doorGets->__('Date')!}]</option>
                </select>
                
            [??]
                <input class="input-filter" value="" type="hidden"  >
            [?]
            
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
    
    <div class="hid"   [{?($displayBox):}]  style="display: none;" [?]  >
    
        <table class="tb-cp">
            <tr>
                <td>
                    <label class="cp-label">[{!$this->doorGets->__('Label')!}] <span class="cp-obli">*</span></label>
                    <input class="input-label [{?( array_key_exists('input-label-'.$i,$this->doorGets->Form->e) ):}]  l-error [?]"
                        [{?($i):}] name="input-label-[{!$i!}]" [?] value="[{!$lLabel!}]" >
                   
                    [{?($type == 'text'):}]
                        <input class="input-type" value="text" type="hidden"
                            [{?($i):}] name="input-type-[{!$i!}]" [?]  >
                        <input class="input-value"  type="hidden"
                            [{?($i):}] name="input-value-[{!$i!}]" value = "[{!$lValue!}]" [?]  >
                    [??]
                        <input class="input-type" value="textarea" type="hidden"
                            [{?($i):}] name="input-type-[{!$i!}]" [?]  >
                        <input class="input-value"  type="hidden"
                            [{?($i):}] name="input-value-[{!$i!}]" value = "[{!$lValue!}]" [?]  >
                    [?]
                    
                </td>
            </tr>
        </table>
        <div class="btn-plus">+ [{!$this->doorGets->__('Plus')!}]</div>
        <div  class="box-moins" style="display: none;"  >
            <div class="btn-moins">- [{!$this->doorGets->__('Masquer')!}]</div>
            <table class="tb-cp">
                <tr>
                    <td>
                        <label>[{!$this->doorGets->__('Information')!}]</label>
                        <input class="input-info"  [{?($i):}] name="input-info-[{!$i!}]" [?] value="[{!$lInfo!}]"   >
                    </td>
                    <td>
                        <label>[{!$this->doorGets->__('Classe CSS')!}]</label>
                        <input class="input-css"  [{?($i):}] name="input-css-[{!$i!}]" [?] value="[{!$lCss!}]"   >
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>