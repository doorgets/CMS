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
            <b class="glyphicon glyphicon-envelope"></b> [{!$this->doorGets->__('Api Access Token')!}] 
        </legend>
        <div class="width-listing">
            [{!$htmlAccountRubrique!}]
            <div class="content-user-sercurity">
                <h3>[{!$this->doorGets->__("Générer une clée pour communiquer avec l'api doorGets")!}]</h3>
                <div class="separateur-tb"></div>
                [{?(in_array('api',$this->doorGets->user['liste_module_interne'])):}]
                    [{?(empty($isUserApi)):}]
                        <div class="alert alert-danger text-center">
                            [{!$this->doorGets->__("Vous n'avez pas de clée pour le moment")!}]
                        </div>
                    [??]
                        <div class="alert alert-success text-center">
                            [{!$isUserApi['token']!}]
                        </div>
                    [?]
                    [{!$this->doorGets->Form->open('post','','')!}]
                        [{!$this->doorGets->Form->input('','is_ok','hidden','is_ok','input-user')!}]
                        <div class="text-center"> 
                            [{!$this->doorGets->Form->submit($this->doorGets->__('Générer une nouvelle clé'))!}]
                        </div>
                    [{!$this->doorGets->Form->close();}]
                [??]
                    <div class="alert alert-danger text-center">
                        [{!$this->doorGets->__("Vous ne pouvez pas générer de clée")!}]
                    </div>
                [?]
            </div>

        </div>
    </div>
</div>