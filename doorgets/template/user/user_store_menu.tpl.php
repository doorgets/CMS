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
$controller = $this->doorGets->controllerNameNow();
?>
            <span  class="create-order">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog"></i> [{!$this->doorGets->__('Gérer ma boutique')!}] <i class="fa fa-caret-down"></i></a>
                    <div class="row dropdown-menu">
                        <div class="col-md-6">
                            <ul >
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=order" [{?($controller === 'order'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Commandes')!}] 
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=orderdelivery"  [{?($controller === 'orderdelivery'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Bons de livraison')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=orderinvoices"  [{?($controller === 'orderinvoices'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Factures')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=orderback"  [{?($controller === 'orderback'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Retour produits')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=orderassets" [{?($controller === 'orderassets'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Avoirs')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=providers" [{?($controller === 'providers'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Fournisseurs')!}]
                                    </a>
                                </li>
                                [?]
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul >
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=taxes"  [{?($controller === 'taxes'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Taxes')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=promotion" [{?($controller === 'promotion'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Promotion')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=promotioncodes" [{?($controller === 'promotioncodes'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Codes de promotion')!}]
                                    </a>
                                </li>
                                [?]
                                
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=orderstatus" [{?($controller === 'orderstatus'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('États des commandes')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=orderstatusback" [{?($controller === 'orderstatusback'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('États de retour')!}]
                                    </a>
                                </li>
                                [?]
                                [{?(in_array('promotion', $this->doorGets->user['liste_module_interne'])):}]
                                <li>
                                    <a href="?controller=ordermessage" [{?($controller === 'ordermessage'):}]class="active"[?]>
                                        <i class="fa fa-caret-right"></i>
                                        [{!$this->doorGets->__('Messages prédéfinis')!}]
                                    </a>
                                </li>
                                [?]
                            </ul>
                        </div>
                    </div>
                </div>
            </span>