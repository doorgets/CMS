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

$orderService = new OrderService($this->doorGets);

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$storeMenuHtml!}]
            <b class="glyphicon glyphicon-credit-card"></b> [{!$this->doorGets->__('Commandes')!}]
        </legend>
        <div >
        <ul class="nav nav-tabs">
            <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__("Aujourd'hui")!}]</a></li>
            <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__("Hier")!}]</a></li>
            <li role="presentation" ><a data-toggle="tab" href="#tabs-3">7 [{!$this->doorGets->__("Jours")!}]</a></li>
            <li role="presentation" ><a data-toggle="tab" href="#tabs-4">30 [{!$this->doorGets->__("Jours")!}]</a></li>
            <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__("Depuis le début")!}]</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tabs-1">
                <div class="row stats-order">
                    <div class="col-md-3">
                        <i class="fa fa-check-circle fa-lg green-c"></i>
                        <h3 class="green-c">[{!$this->doorGets->__('Ventes')!}]</h3>
                        <p class="sum-order">[{!$orderService->today['paid']['sum']!}]</p>
                        <p>[{?($orderService->today['paid']['count']):}][{!$orderService->today['paid']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-hourglass-start fa-lg orange-c"></i>
                        <h3 class="orange-c">[{!$this->doorGets->__('En attente')!}]</h3>
                        <p class="sum-order">[{!$orderService->today['waiting']['sum']!}]</p>
                        <p>[{?($orderService->today['waiting']['count']):}][{!$orderService->today['waiting']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-minus-circle fa-lg red-c"></i>
                        <h3 class="red-c">[{!$this->doorGets->__('Annuler')!}]</h3>
                        <p class="sum-order">[{!$orderService->today['cancel']['sum']!}]</p></p>
                        <p>[{?($orderService->today['cancel']['count']):}][{!$orderService->today['cancel']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-money fa-lg green"></i>
                        <h3 class="green">[{!$this->doorGets->__('Bénéfice')!}]</h3>
                        <p class="sum-order">[{!$orderService->today['profit']['sum']!}]</p>
                        <p>[{?($orderService->today['profit']['count']):}][{!$orderService->today['profit']['count']!}][?]</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-2">
                <div class="row stats-order">
                    <div class="col-md-3">
                        <i class="fa fa-check-circle fa-lg green-c"></i>
                        <h3 class="green-c">[{!$this->doorGets->__('Ventes')!}]</h3>
                        <p class="sum-order">[{!$orderService->yesterday['paid']['sum']!}]</p>
                        <p>[{?($orderService->yesterday['paid']['count']):}][{!$orderService->yesterday['paid']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-hourglass-start fa-lg orange-c"></i>
                        <h3 class="orange-c">[{!$this->doorGets->__('En attente')!}]</h3>
                        <p class="sum-order">[{!$orderService->yesterday['waiting']['sum']!}]</p>
                        <p>[{?($orderService->yesterday['waiting']['count']):}][{!$orderService->yesterday['waiting']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-minus-circle fa-lg red-c"></i>
                        <h3 class="red-c">[{!$this->doorGets->__('Annuler')!}]</h3>
                        <p class="sum-order">[{!$orderService->yesterday['cancel']['sum']!}]</p></p>
                        <p>[{?($orderService->yesterday['cancel']['count']):}][{!$orderService->yesterday['cancel']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-money fa-lg green"></i>
                        <h3 class="green">[{!$this->doorGets->__('Bénéfice')!}]</h3>
                        <p class="sum-order">[{!$orderService->yesterday['profit']['sum']!}]</p>
                        <p>[{?($orderService->yesterday['profit']['count']):}][{!$orderService->yesterday['profit']['count']!}][?]</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-3">
                <div class="row stats-order">
                    <div class="col-md-3">
                        <i class="fa fa-check-circle fa-lg green-c"></i>
                        <h3 class="green-c">[{!$this->doorGets->__('Ventes')!}]</h3>
                        <p class="sum-order">[{!$orderService->week['paid']['sum']!}]</p>
                        <p>[{?($orderService->week['paid']['count']):}][{!$orderService->week['paid']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-hourglass-start fa-lg orange-c"></i>
                        <h3 class="orange-c">[{!$this->doorGets->__('En attente')!}]</h3>
                        <p class="sum-order">[{!$orderService->week['waiting']['sum']!}]</p>
                        <p>[{?($orderService->week['waiting']['count']):}][{!$orderService->week['waiting']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-minus-circle fa-lg red-c"></i>
                        <h3 class="red-c">[{!$this->doorGets->__('Annuler')!}]</h3>
                        <p class="sum-order">[{!$orderService->week['cancel']['sum']!}]</p></p>
                        <p>[{?($orderService->week['cancel']['count']):}][{!$orderService->week['cancel']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-money fa-lg green"></i>
                        <h3 class="green">[{!$this->doorGets->__('Bénéfice')!}]</h3>
                        <p class="sum-order">[{!$orderService->week['profit']['sum']!}]</p>
                        <p>[{?($orderService->week['profit']['count']):}][{!$orderService->week['profit']['count']!}][?]</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-4">
                <div class="row stats-order">
                    <div class="col-md-3">
                        <i class="fa fa-check-circle fa-lg green-c"></i>
                        <h3 class="green-c">[{!$this->doorGets->__('Ventes')!}]</h3>
                        <p class="sum-order">[{!$orderService->month['paid']['sum']!}]</p>
                        <p>[{?($orderService->month['paid']['count']):}][{!$orderService->month['paid']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-hourglass-start fa-lg orange-c"></i>
                        <h3 class="orange-c">[{!$this->doorGets->__('En attente')!}]</h3>
                        <p class="sum-order">[{!$orderService->month['waiting']['sum']!}]</p>
                        <p>[{?($orderService->month['waiting']['count']):}][{!$orderService->month['waiting']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-minus-circle fa-lg red-c"></i>
                        <h3 class="red-c">[{!$this->doorGets->__('Annuler')!}]</h3>
                        <p class="sum-order">[{!$orderService->month['cancel']['sum']!}]</p></p>
                        <p>[{?($orderService->month['cancel']['count']):}][{!$orderService->month['cancel']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-money fa-lg green"></i>
                        <h3 class="green">[{!$this->doorGets->__('Bénéfice')!}]</h3>
                        <p class="sum-order">[{!$orderService->month['profit']['sum']!}]</p>
                        <p>[{?($orderService->month['profit']['count']):}][{!$orderService->month['profit']['count']!}][?]</p>
                    </div>
                </div> 
            </div>
            <div class="tab-pane" id="tabs-5">
                <div class="row stats-order">
                    <div class="col-md-3">
                        <i class="fa fa-check-circle fa-lg green-c"></i>
                        <h3 class="green-c">[{!$this->doorGets->__('Ventes')!}]</h3>
                        <p class="sum-order">[{!$orderService->total['paid']['sum']!}]</p>
                        <p>[{?($orderService->total['paid']['count']):}][{!$orderService->total['paid']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-hourglass-start fa-lg orange-c"></i>
                        <h3 class="orange-c">[{!$this->doorGets->__('En attente')!}]</h3>
                        <p class="sum-order">[{!$orderService->total['waiting']['sum']!}]</p>
                        <p>[{?($orderService->total['waiting']['count']):}][{!$orderService->total['waiting']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-minus-circle fa-lg red-c"></i>
                        <h3 class="red-c">[{!$this->doorGets->__('Annuler')!}]</h3>
                        <p class="sum-order">[{!$orderService->total['cancel']['sum']!}]</p></p>
                        <p>[{?($orderService->total['cancel']['count']):}][{!$orderService->total['cancel']['count']!}][?]</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-money fa-lg green"></i>
                        <h3 class="green">[{!$this->doorGets->__('Bénéfice')!}]</h3>
                        <p class="sum-order">[{!$orderService->total['profit']['sum']!}]</p>
                        <p>[{?($orderService->total['profit']['count']):}][{!$orderService->total['profit']['count']!}][?]</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separateur-tb"></div>
        <div class="width-listing">
            
                <div style="overflow: hidden;">
                    <div style="float: left;padding: 7px 0 ">
                        <i>
                            [{?(!empty($cAll)):}] [{!($ini+1)!}] [{!$this->doorGets->__("à")!}] [{!$finalPer!}] [{!$this->doorGets->__("sur")!}] [?]
                            <b>[{!$cResultsInt.' '!}] [{?( $cResultsInt > 1 ):}][{!$this->doorGets->__('Commandes')!}] [??] [{!$this->doorGets->__('Commande')!}] [?]</b>
                            [{?(!empty($q)):}] [{!$this->doorGets->__('pour la recherche : ').' <b>'.$q.'</b>'!}] [?]
                        </i>
                        <span id="doorGets-sort-count">
                            [{!$this->doorGets->__('Par')!}]
                            <a href="[{!$urlPagePosition!}]&gby=10" [{?($per=='10'):}] class="active" [?]>10</a>
                            <a href="[{!$urlPagePosition!}]&gby=20" [{?($per=='20'):}] class="active" [?]>20</a>
                            <a href="[{!$urlPagePosition!}]&gby=50" [{?($per=='50'):}] class="active" [?]>50</a>
                            <a href="[{!$urlPagePosition!}]&gby=100" [{?($per=='100'):}] class="active" [?]>100</a>
                        </span>
                         
                    </div>
                    <div  class="doorGets-box-search-module">
                        [{!$this->doorGets->Form['_search_filter']->open('post',$urlPageGo,'')!}]
                        [{!$this->doorGets->Form['_search_filter']->submit($this->doorGets->__('Chercher'),'','btn btn-success')!}]
                    <a href="?controller=[{!$this->doorGets->controllerNameNow()!}]&lg=[{!$lgActuel!}]" class="btn btn-danger doorGets-filter-bt" >[{!$this->doorGets->__('Reset')!}]</a>
                    </div>
                </div>
                <div class="separateur-tb"></div>
                [{!$block->getHtml()!}]
                [{!$this->doorGets->Form['_search']->close()!}]
            [{?(!empty($cAll)):}]    
                <br />
                [{!$valPage!}]
                <br /><br />
                
            [??]
               
                [{?(!empty($aGroupeFilter)):}]
                    <div class="alert alert-info">
                        <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucune commande trouvé pour votre recherche.");}]
                    </div>
                [??]
                    <div class="alert alert-info">
                        <i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a actuellement aucune commande")!}]
                    </div>
                [?]
                
            [?] 
        </div>

        
    </div>
</div>
