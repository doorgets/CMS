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

$methodShipping = $this->cart->methodShipping;

?><ul class="list-group">
    [{?($this->shipping['free']['active']):}]
    <li class="list-group-item">
        <div class="radio">
            <label class="block">
                <input class="methodShipping" type="radio" name="methodShipping" id="optionsFree" value="free" [{?($methodShipping === 'free'):}]checked[?]>
                [{!$this->doorGets->__('Gratuit')!}] - [{!$this->cart->setCurrency(0)!}]
                [{?(!empty($this->shipping['free']['info'])):}]
                <div class="alert alert-info" role="alert">[{!$this->shipping['free']['info']!}]</div>
                [?]
            </label>
        </div>
    </li>
    [?]
    [{?($this->shipping['slow']['active']):}]
    <li class="list-group-item">
        <div class="radio">
            <label class="block">
                <input class="methodShipping" type="radio" name="methodShipping" id="optionsSlow" value="slow" [{?($methodShipping === 'slow'):}]checked[?]>
                [{!$this->doorGets->__('Simple')!}] - [{!$this->cart->setCurrency($this->shipping['slow']['amount'])!}]
                [{?(!empty($this->shipping['slow']['info'])):}]
                <div class="alert alert-info" role="alert">[{!$this->shipping['slow']['info']!}]</div>
                [?]
            </label>
        </div>
    </li>
    [?]
    [{?($this->shipping['fast']['active']):}]
    <li class="list-group-item">
        <div class="radio">
            <label class="block">
                <input class="methodShipping" type="radio" name="methodShipping" id="optionsFast" value="fast" [{?($methodShipping === 'fast'):}]checked[?]>
                [{!$this->doorGets->__('Rapide')!}] - [{!$this->cart->setCurrency($this->shipping['fast']['amount'])!}]
                [{?(!empty($this->shipping['fast']['info'])):}]
                <div class="alert alert-info" role="alert">[{!$this->shipping['fast']['info']!}]</div>
                [?]
            </label>
        </div>
    </li>
    [?]
</ul>