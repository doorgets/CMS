<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-content">
        <div class="doorGets-rubrique-left-center-title page-header">

        </div>
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=saas"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <b class="glyphicon glyphicon-cloud-upload"></b> <a href="?controller=saas">[{!$this->doorGets->__('Cloud')!}] </a> 
             / [{!$isContent['title']!}]
        </legend>
        <div >
            <ul class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{?($removeInProgress):}]
                        <div class="alert alert-info text-center">
                            [{!$this->doorGets->__("En cours de suppresion")!}]
                        </div>
                    [??]
                    <div class="row">
                        <div class="col-md-5">
                            [{!$this->doorGets->__("Domaine")!}] : <a href="[{!$saasUrl!}]" target="blank">[{!$saasUrl!}]</a> 
                        </div>
                        <div class="col-md-3">
                            [{!$this->doorGets->__("Nombre de jours restants")!}] : <b>[{?($countDaysToDelete !== 0):}][{!$daysLeft!}][??]-[?]</b>
                        </div>
                        <div class="col-md-4">
                            [{!$this->doorGets->__("Date de suppression")!}]: <b>[{?($countDaysToDelete !== 0):}][{!GetDate::in($dateToDelete)!}][??]-[?]</b>
                        </div>
                    </div>
                    [?]
                </div>
            </div>
        </div>
        <div class="separateur-tb"></div>
        
    </div>
</div>