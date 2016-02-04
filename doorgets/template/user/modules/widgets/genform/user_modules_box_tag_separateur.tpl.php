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
    
        <img  src="[{!BASE_IMG!}]genform_separateur.png" title="Séparateur"> [{!$this->doorGets->__('Séparateur')!}]
        <div class="right hid"  [{?($displayDelete):}]  style="display: none;" [?] >
            <span class="right close-me"><img  src="[{!BASE_IMG!}]delete.png" title="[{!$this->doorGets->__('Suppimer')!}]"></span>
        </div>
        <div class=" right hid"   [{?($displayBox):}]  style="display: none;" [?]  >
            <select class="input-active"  [{?($i):}] name="input-active-[{!$i!}]" [?]  >
                <option value="yes"  [{?($lActive === 'yes'):}] selected="selected" [?] >[{!$this->doorGets->__('Visible')!}]</option>
                <option value="no"  [{?($lActive === 'no'):}] selected="selected" [?] >[{!$this->doorGets->__('Invisible')!}]</option>
            </select>
        </div>
    </div>
    <div class="hid"   [{?($displayBox):}]  style="display: none;" [?]  >
        
        <input class="input-label"  value=" 1 " type="hidden">
        <input class="input-filter" value="" type="hidden"  >
        <input class="input-type" value="tag-separateur" type="hidden" [{?($i):}] name="input-type-[{!$i!}]" [?]  >
        <div class="btn-plus">+ [{!$this->doorGets->__('Plus')!}]</div>
        <div  class="box-moins" style="display: none;"  >
            <div class="btn-moins">- [{!$this->doorGets->__('Masquer')!}]</div>
            <table class="tb-cp">
                <tr>
                    <td>
                        <label>[{!$this->doorGets->__('Classe CSS')!}]</label>
                        <input class="input-css"  [{?($i):}] name="input-css-[{!$i!}]" [?] value="[{!$lCss!}]"   >
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>