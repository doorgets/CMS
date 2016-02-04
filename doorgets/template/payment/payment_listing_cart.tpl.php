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

$subscription['amount_total'] = $this->doorGets->setCurrencyIcon($subscription['amount_total'],$subscription['currency']);
$subscription['amount_month'] = $this->doorGets->setCurrencyIcon($subscription['amount_month'],$subscription['currency']);
$subscription['tranche'] = $subscription['tranche'].' '.$this->doorGets->__("Mois");

?><div >
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>[{!$this->doorGets->__("Produit")!}]</th>
                <th class="text-center">[{!$this->doorGets->__("Quantité")!}]</th>
                <th class="text-right">[{!$this->doorGets->__("Prix unitaire")!}]</th>
            </tr>
            <tr class="tr-[{!$key!}]">
                <td></span>[{!$this->doorGets->__($subscription['title'])!}]</td>
                <td class="text-center">
                    [{!$subscription['tranche']!}]
                </td>
                <td class="text-right">[{!$subscription['amount_month']!}]/[{!$this->doorGets->__("Mois")!}]</td>
            </tr>
        </table>
    </div>
</div>