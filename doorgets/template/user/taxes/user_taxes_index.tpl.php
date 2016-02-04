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
$cPromo = count($Taxess);
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
            <span class="create" ><a href="?controller=taxes&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Créer une régle de taxe')!}]</a></span>
            <b class="glyphicon glyphicon-scissors"></b> [{!$this->doorGets->__('Mes régles de taxe')!}] 
        </legend>
        <div class="width-listing">
            <div class="row">
                <div class="col-md-12">
                    [{?(count($Taxess) > 0):}]
                        [{/($Taxess as $taxes):}]
                            [{
                                
                                $iActive = ($taxes['active'] == '1')?'<i class="fa fa-play-circle-o green-c"></i>':'<i class="fa fa-stop-circle-o red-c"></i>';
                            }]
                            <div class="panel panel-default">
                                <div class="panel-heading addr-block-title"> 
                                    <div class="pull-right">
                                        <a href="?controller=taxes&action=edit&id=[{!$taxes['id']!}]" alt="[{!$this->doorGets->__('Modifier')!}] " ><b class="glyphicon glyphicon-pencil green-font" ></b></a>
                                        <a href="?controller=taxes&action=delete&id=[{!$taxes['id']!}]" alt="[{!$this->doorGets->__('Supprimer')!}] "><b class="glyphicon glyphicon-remove red" ></b></a>
                                    </div>
                                    [{!$iActive!}] <span class="reduction-box">[{!$taxes['percent']!}] %</span>  <i class="fa fa-caret-right"></i>[{!$taxes['priority']!}] [{!$taxes['title']!}]
                                </div>
                                
                            </div>
                        [/]
                    [??]
                        <div class="alert alert-info text-center">
                            [{!$this->doorGets->__('Aucune taxes')!}]
                        </div>
                    [?]
                </div>
            </div>
        </div>
    </div>
</div>
