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
$cPromo = count($Discountcodes);
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a href="?controller=discountcode&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b>  [{!$this->doorGets->__('Créer un code de réduction')!}]</a></span>
            <i class="fa fa-gift"></i> [{!$this->doorGets->__('Mes codes de réductions')!}] 
        </legend>
        <div class="width-listing">
            <div class="row">
                <div class="col-md-12">
                    [{?(count($Discountcodes) > 0):}]
                        [{/($Discountcodes as $discountcode):}]
                            <div class="panel panel-default">
                                <div class="panel-heading addr-block-title"> 
                                    <div class="pull-right">
                                        <a href="?controller=discountcode&action=edit&id=[{!$discountcode['id']!}]" alt="[{!$this->doorGets->__('Modifier')!}] " ><b class="glyphicon glyphicon-pencil green-font" ></b></a>
                                        <a href="?controller=discountcode&action=delete&id=[{!$discountcode['id']!}]" alt="[{!$this->doorGets->__('Supprimer')!}] "><b class="glyphicon glyphicon-remove red" ></b></a>
                                    </div>
                                    [{!$discountcode['title']!}]
                                </div>
                                <div class="panel-body discountcode-view addr-block-body">
                                </div>
                            </div>
                        [/]
                    [??]
                        <div class="alert alert-info text-center">
                            [{!$this->doorGets->__('Aucun code de réduction')!}]
                        </div>
                    [?]
                </div>
            </div>
        </div>
    </div>
</div>
