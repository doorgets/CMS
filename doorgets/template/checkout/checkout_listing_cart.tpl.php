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


?><div >
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>[{!$this->doorGets->__("Produit")!}]</th>
                <th class="text-center">[{!$this->doorGets->__("Quantité")!}]</th>
                <th class="text-center">[{!$this->doorGets->__("Prix unitaire")!}]</th>
                <th class="text-right">[{!$this->doorGets->__("Total")!}]</th>
                <th class="text-right"></th>
            </tr>
            [{/($Products as $key=>$product):}]
                [{?(is_array($product) && array_key_exists('price',$product) && array_key_exists('quantity',$product)):}]
                <tr class="tr-[{!$key!}]">
                    <td><span class="pull-right"><img class="ico-product" src="[{!$product['image']!}]"></span>[{!$product['title']!}]</td>
                    <td class="text-center">
                        <a class="btn btn-xs no-loader click-cart-minus" href="[{!URL.'ajax/?controller=cart&action=minus&uri='.$key.'&lg='.$this->langue!}]"><i class="fa fa-minus"></i> </a> 
                        <input class="input-qty-checkout input-qty-checkout-[[{!$product['id']!}]]"  disabled="disabled" value="[{!$product['quantity']!}]"> 
                        <a class="btn btn-xs no-loader click-cart-plus" href="[{!URL.'ajax/?controller=cart&action=plus&uri='.$key.'&lg='.$this->langue!}]"> <i class="fa fa-plus"></i></a> 
                    </td>
                    <td class="text-center">[{!$product['pricettctoshow']!}]</td>
                    <td class="text-right"><span class="total-[{!$key!}]">[{!$product['totalttctoshow']!}]</span></td>
                    <td class="text-right"><a class="click-cart-remove" href="[{!URL.'ajax/?controller=cart&action=remove&uri='.$key.'&lg='.$this->langue!}]" title="[{!$this->doorGets->__("Supprimer")!}]"><i class="fa fa-close red"></i></a></td>
                </tr>
                [?]
            [/]
        </table>
    </div>
</div>