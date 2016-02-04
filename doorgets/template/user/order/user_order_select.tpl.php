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
$customer = new CustomerService($isContent['user_id'],$this->doorGets);

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">
        
    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=[{!$this->doorGets->controllerNameNow()!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour')!}]</a></span>
            <b class="glyphicon glyphicon-credit-card"></b> [{!$this->doorGets->__('Commandes')!}] 
        </legend>
        <h3>
            <i class="fa fa-caret-right"></i> [{!ucfirst($isContent['reference'])!}] <small>n°[{!$isContent['id']!}]</small> 
        </h3>
        <div class="separateur-tb"></div>
        <div class="row top-select-order">
            <div class="col-md-2">
                <i class="fa fa-calendar green-c"></i></b> [{!$this->doorGets->__('Date')!}]
                <p class="green-c">[{!GetDate::in($isContent['date_creation'],2,$this->doorGets->myLanguage)!}]</p>
            </div>
            <div class="col-md-2">
                <i class="fa fa-money violet"></i> [{!$this->doorGets->__('Total')!}] 
                <p class="violet">
                    [{!$isContent['amount_with_shipping']!}] 
                    <small>[{!$isContent['amount_vat']!}] ([{!$this->doorGets->__('Taxe')!}])</small>
                    [{?($isContent['shipping_amount'] > 0):}]
                    <small>[{!$isContent['shipping_amount']!}] ([{!$this->doorGets->__('Livraison')!}])</small>
                    [?]

                </p>
            </div>
            <div class="col-md-2">
                <i class="fa fa-money violet"></i> [{!$this->doorGets->__('Bénéfices')!}] 
                <p class="violet">
                    [{!$isContent['amount_profit']!}]
                </p>
            </div>
            <div class="col-md-2">
                <i class="fa fa-truck gris-c"></i> [{!$this->doorGets->__('Livraison')!}] 
                <p class="gris-c">
                    OK
                </p>
            </div>

            <div class="col-md-2">
                <i class="fa fa-comments orange-c"></i> [{?(0 < 2):}][{!$this->doorGets->__('Message')!}][??][{!$this->doorGets->__('Messages')!}][?]
                <p class="orange-c">0</p>
            </div>
            <div class="col-md-2">
                <i class="fa fa-shopping-basket bleu-c"></i> [{?($isContent['count'] < 2):}][{!$this->doorGets->__('Produit')!}][??][{!$this->doorGets->__('Produits')!}][?]
                <p class="bleu-c">[{!$isContent['count']!}]</p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><i class="fa fa-money"></i> [{!$this->doorGets->__('Paiement')!}]</h4>
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form['status']->open()!}]
                        [{!$isContent['status_ico']!}] [{!$this->doorGets->__('Status')!}]  
                        [{!$this->doorGets->Form['status']->select('','new_status',$statusPayment,$isContent['status'])!}]
                        [{!$this->doorGets->Form['status']->submit($this->doorGets->__('Sauvegarder'),'new_status','btn')!}]
                        [{!$this->doorGets->Form['status']->close()!}]
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><i class="fa fa-truck"></i> [{!$this->doorGets->__('Adresse de livraison')!}]</h4>
                                <div class="separateur-tb"></div>
                                <p>[{!$isContent['shipping_firstname']!}] [{!$isContent['shipping_lastname']!}] [{!$isContent['shipping_company']!}]
                                <br />
                                [{!$isContent['shipping_address']!}]
                                <br />
                                [{!$isContent['shipping_zipcode']!}], [{!$isContent['shipping_city']!}] [{!$isContent['shipping_country']!}]
                                <br />
                                [{!$isContent['shipping_phone']!}]</p>
                                <p><b>[{!$this->doorGets->__('Méthode de livraison')!}]</b> <br />[{!$isContent['method_shipping']!}]</p>
                                [{?($isContent['status'] === 'payment_success'):}]
                                    <p><b>[{!$this->doorGets->__('Documents')!}]</b> <br />
                                    <a class="btn btn-default" href="#"><i class="fa fa-cogs"></i> [{!$this->doorGets->__('Générer le bon de livraison')!}]</a></p>
                                    <p><a class="btn btn-default" href="#"><i class="fa fa-download"></i> [{!$this->doorGets->__('Télécharger le bon de livraison')!}]</a></p>
                                    <p><a class="btn btn-default" href="#"><i class="fa fa-print"></i> [{!$this->doorGets->__('Imprimer le bon de livraison')!}]</a></p>
                                [?]
                            </div>
                            <div class="col-md-6">
                                <h4><i class="fa fa-file"></i> [{!$this->doorGets->__('Adresse de facturation')!}]</h4>
                                <div class="separateur-tb"></div>
                                <p>[{!$isContent['billing_firstname']!}] [{!$isContent['billing_lastname']!}] [{!$isContent['billing_company']!}]
                                <br />
                                [{!$isContent['billing_address']!}]
                                <br />
                                [{!$isContent['billing_zipcode']!}], [{!$isContent['billing_city']!}] [{!$isContent['billing_country']!}]
                                <br />
                                [{!$isContent['shipping_phone']!}]</p>
                                <p><b>[{!$this->doorGets->__('Méthode de paiement')!}]</b> <br />[{!$isContent['method_billing']!}] [{!$isContent['transaction_id']!}]</p></p>
                                [{?($isContent['status'] === 'payment_success'):}]
                                    <p><b>[{!$this->doorGets->__('Documents')!}]</b> <br />
                                    <a class="btn btn-default" href="#"><i class="fa fa-cogs"></i> [{!$this->doorGets->__('Générer la facture')!}]</a></p>
                                    <p><a class="btn btn-default" href="#"><i class="fa fa-download"></i> [{!$this->doorGets->__('Télécharger la facture')!}]</a></p>
                                    <p><a class="btn btn-default" href="#"><i class="fa fa-print"></i> [{!$this->doorGets->__('Imprimer la facture')!}]</a></p>
                                [?]
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b class="fa fa-shopping-basket"></b> [{!$this->doorGets->__('Produits')!}]
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>[{!$this->doorGets->__("Produit")!}]</th>
                                    <th class="text-center">[{!$this->doorGets->__("Quantité")!}]</th>
                                    <th class="text-center">[{!$this->doorGets->__("Prix unitaire")!}]</th>
                                    <th class="text-right">[{!$this->doorGets->__("Total")!}]</th>
                                </tr>
                                [{/($isContent['products'] as $key=>$product):}]
                                    [{?(is_array($product) && array_key_exists('price',$product) && array_key_exists('quantity',$product)):}]
                                    <tr class="tr-[{!$key!}]">
                                        <td><span class="pull-right"><img class="ico-product" src="[{!$product['image']!}]"></span>[{!$product['title']!}]</td>
                                        <td class="text-center">
                                            <input class="input-qty-checkout input-qty-checkout-[[{!$product['id']!}]]"  disabled="disabled" value="[{!$product['quantity']!}]"> 
                                        </td>
                                        <td class="text-center">[{!$product['pricettctoshow']!}]</td>
                                        <td class="text-right"><span class="total-[{!$key!}]">[{!$product['totalttctoshow']!}]</span></td>
                                    </tr>
                                    [?]
                                [/]
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            <b class="glyphicon glyphicon-user"></b> <b>[{!$isContent['user_lastname']!}] [{!$isContent['user_firstname']!}]</b> <small class="pull-right">n° [{!$isContent['user_id']!}]</small>
                        </p>
                        <div class="separateur-tb"></div>
                        <p>
                            <b>[{!$this->doorGets->__("E-mail")!}]</b> <br />
                            <i class="fa fa-envelope-o"></i> <a href="mailto:[{!$customer->info['email']!}]" >[{!$customer->info['email']!}]</a>
                        </p>
                        <p>
                            <b>[{!$this->doorGets->__("Dernière connexion")!}]</b> <br />
                            <i class="fa fa-calendar"></i> [{!$customer->info['last_connexion']!}]
                        </p>
                        <p>
                            <b>[{!$this->doorGets->__("Compte crée")!}]</b> <br />
                            <i class="fa fa-calendar"></i> [{!$customer->info['date_creation']!}]
                        </p>
                        <p>
                            <b>[{!$this->doorGets->__("Commandes validées")!}]</b> <br />
                            <i class="fa fa-line-chart"></i> [{!$customer->countSuccess!}]
                        </p>
                        <p>
                            <b>[{!$this->doorGets->__("Total payé depuis la création du compte")!}]</b> <br />
                            <i class="fa fa-money"></i> [{!$customer->amountSuccess!}]
                        </p>

                        <p>
                            <b>[{!$this->doorGets->__("Bénéfices depuis la création du compte")!}]</b> <br />
                            <i class="fa fa-money"></i> [{!$customer->amountProfit!}]
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>