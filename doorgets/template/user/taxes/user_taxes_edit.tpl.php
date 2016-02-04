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

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=taxes"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <a href="?controller=taxes"><b class="glyphicon glyphicon-scissors"></b> [{!$this->doorGets->__('Mes régles de taxe')!}]  </a> 
             / [{!$this->doorGets->__('Modifier une taxe')!}]
        </legend>
        <div class="width-listing">
            <div >
            <ul class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->open('post','','');}]
                    <div class="row">
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->select($this->doorGets->__('Active'),'active',$aActivation,$isContent['active']);}]
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-10">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Titre").' <span class="cp-obli">*</span>','title','text',$isContent['title']);}]
                        </div>
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Taxe").' % <span class="cp-obli">*</span>','percent','text',$isContent['percent']);}]
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                </div>
            </div>
            <div class="separateur-tb"></div>
            <div class="text-center">
                [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'))!}]
            </div>
            [{!$this->doorGets->Form->close();}]
        </div>
    </div>
</div>
