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
$cPromo = count($Promotions);
$vReduction = array(
    'percent' => '%',
    'amount' => Constant::$currencyIcon[$this->doorGets->configWeb['currency']]
);
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            [{!$storeMenuHtml!}]
            <span class="create" ><a href="?controller=promotion&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Créer une promotion')!}]</a></span>
            <i class="fa fa-gift"></i> [{!$this->doorGets->__('Mes promotions')!}] 
        </legend>
        <div class="width-listing">
            <div class="row">
                <div class="col-md-12">
                    [{?(count($Promotions) > 0):}]
                        [{/($Promotions as $promotion):}]
                            [{
                                
                                $reduction = $promotion['reduction_value'].$vReduction[$promotion['reduction_type']];
                                $now = time();
                                $current = false;
                                if (    
                                    ((!empty($promotion['date_from_time'])  && $now > (int)$promotion['date_from_time'])
                                        || empty($promotion['date_from_time']))
                                    &&  ( empty($promotion['date_to_time']) || $now < (int)$promotion['date_to_time'] )
                                ) {
                                    $current = true;
                                }

                                $promotion['date_from_time'] = (empty($promotion['date_from_time'])) ? '-' : GetDate::in($promotion['date_from_time']);
                                $promotion['date_to_time'] = (empty($promotion['date_to_time'])) ? '-' : GetDate::in($promotion['date_to_time']);
                                if ($promotion['active'] != '1') {
                                    $iActive = '<i class="fa fa-stop-circle-o red-c"></i>';
                                } else if($promotion['active'] == '1' && !$current) {
                                    $iActive = '<i class="fa fa-pause-circle-o orange-c"></i>';
                                } else {
                                    $iActive = '<i class="fa fa-play-circle-o green-c"></i>';
                                }
                                
                            }]
                            <div class="panel panel-default">
                                <div class="panel-heading addr-block-title"> 
                                    <div class="pull-right">
                                        <a href="?controller=promotion&action=edit&id=[{!$promotion['id']!}]" alt="[{!$this->doorGets->__('Modifier')!}] " ><b class="glyphicon glyphicon-pencil green-font" ></b></a>
                                        <a href="?controller=promotion&action=delete&id=[{!$promotion['id']!}]" alt="[{!$this->doorGets->__('Supprimer')!}] "><b class="glyphicon glyphicon-remove red" ></b></a>
                                    </div>
                                    [{!$iActive!}] <span class="reduction-box">[{!$reduction!}]</span>  <i class="fa fa-sort"></i> [{!$promotion['priority']!}] [{!$promotion['title']!}]
                                </div>
                                [{?($promotion['active'] == '1'):}]
                                <div class="panel-body promotion-view addr-block-body">
                                    <div class="row">
                                        <div class="col-md-3">&nbsp;</div>
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i> [{!$this->doorGets->__('Début')!}]: [{!$promotion['date_from_time']!}]
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i> [{!$this->doorGets->__('Fin')!}]: [{!$promotion['date_to_time']!}]
                                        </div>
                                        <div class="col-md-3">&nbsp;</div>
                                    </div>
                                </div>
                                [?]
                            </div>
                        [/]
                    [??]
                        <div class="alert alert-info text-center">
                            [{!$this->doorGets->__('Aucune promotion')!}]
                        </div>
                    [?]
                </div>
            </div>
        </div>
    </div>
</div>
