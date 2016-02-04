<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
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
$cBilling = 0;
$cShipping = 0;
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a href="?controller=address&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Créer une adresse')!}]</a></span>
            <b class="glyphicon glyphicon-road"></b> [{!$this->doorGets->__('Mes adresses')!}] 
        </legend>
        <div class="width-listing">
            <div class="row">
                <div class="col-md-6">
                    <h3>[{!$this->doorGets->__('Adresse de facturation')!}]</h3>
                    <div class="separateur-tb"></div>
                    [{/($myAddress as $address):}]
                        [{?($address['is_billing'] === '1'):}]
                        <div class="panel panel-default">
                            <div class="panel-heading addr-block-title"> 
                                <div class="pull-right">
                                    <a href="?controller=address&action=edit&id=[{!$address['id']!}]" alt="[{!$this->doorGets->__('Modifier')!}] " ><b class="glyphicon glyphicon-pencil green-font" ></b></a>
                                    <a href="?controller=address&action=delete&id=[{!$address['id']!}]" alt="[{!$this->doorGets->__('Supprimer')!}] "><b class="glyphicon glyphicon-remove red" ></b></a>
                                </div>
                                [{!$address['title']!}]
                            </div>
                            <div class="panel-body address-view addr-block-body">
                                <div>[{!$address['address']!}]</div>
                                <span>[{!$address['city']!}]</span>
                                <span>[{!$address['zipcode']!}]</span>
                                <div>[{!$address['country']!}]</div>
                            </div>
                        </div>
                        [{$cBilling++;}]
                        [?]
                    [/]
                    [{?($cBilling == 0):}]
                    <div class="alert alert-info text-center">
                        [{!$this->doorGets->__('Aucune adresse de facturation')!}]
                    </div>
                    [?]
                </div>
                <div class="col-md-6">
                    <h3>[{!$this->doorGets->__('Adresse de livraison')!}]</h3>
                    <div class="separateur-tb"></div>
                    [{/($myAddress as $address):}]

                        [{?($address['is_shipping'] === '1'):}]
                        <div class="panel panel-default">
                            <div class="panel-heading addr-block-title"> 
                                <div class="pull-right">
                                    <a href="?controller=address&action=edit&id=[{!$address['id']!}]" alt="[{!$this->doorGets->__('Modifier')!}] " ><b class="glyphicon glyphicon-pencil green-font" ></b></a>
                                    <a href="?controller=address&action=delete&id=[{!$address['id']!}]" alt="[{!$this->doorGets->__('Supprimer')!}] "><b class="glyphicon glyphicon-remove red" ></b></a>
                                </div>
                                [{!$address['title']!}]
                            </div>
                            <div class="panel-body address-view addr-block-body">
                                <div>[{!$address['address']!}]</div>
                                <span>[{!$address['city']!}]</span>
                                <span>[{!$address['zipcode']!}]</span>
                                <div>[{!$address['country']!}]</div>
                            </div>
                        </div>
                        [{$cShipping++;}]
                        [?]
                    [/]
                    [{?($cShipping == 0):}]
                    <div class="alert alert-info text-center">
                        [{!$this->doorGets->__('Aucune adresse de livraison')!}]
                    </div>
                    [?]
                </div>
            </div>
        </div>
    </div>
</div>
