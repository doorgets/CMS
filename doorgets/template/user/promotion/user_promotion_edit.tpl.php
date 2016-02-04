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

$now = time();
$current = false;
if (    
    ((!empty($isContent['date_from_time'])  && $now > (int)$isContent['date_from_time'])
        || empty($isContent['date_from_time']))
    &&  ( empty($isContent['date_to_time']) || $now < (int)$isContent['date_to_time'] )
) {
    $current = true;
}

if ($isContent['active'] != '1') {
    $iActive = '<i class="fa fa-stop-circle-o red-c"></i>';
} else if($isContent['active'] == '1' && !$current) {
    $iActive = '<i class="fa fa-pause-circle-o orange-c"></i>';
} else {
    $iActive = '<i class="fa fa-play-circle-o green-c"></i>';
}
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a class="doorGets-comebackform" href="?controller=promotion"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__('Retour');}]</a></span>
            <a href="?controller=promotion"><i class="fa fa-gift"></i> [{!$this->doorGets->__('Mes promotions')!}]  </a> 
             / [{!$this->doorGets->__('Modifier une promotion')!}] [{!$iActive!}]
        </legend>
        <div class="width-listing">
            <div >
            <ul class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__('Catégories')!}]</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    [{!$this->doorGets->Form->open('post','','');}]
                    <div class="row">
                        <div class="col-md-10">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Titre").' <span class="cp-obli">*</span>','title','text',$isContent['title']);}]
                        </div>
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Limite").' <small>('.$this->doorGets->__("0 pour illimité").')</small>','userlimit','text',$isContent['userlimit']);}]
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->select($this->doorGets->__('Active'),'active',$aActivation,$isContent['active']);}]
                        </div>
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->select($this->doorGets->__('Priorité'),'priority',$aPriority,$isContent['priority']);}]
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker6'>
                                    <span class="input-group-addon">
                                        Début
                                    </span>
                                    <input type='text' class="form-control doorGets-date-input datepicker-from"  id="promotion_edit_date_from" name="promotion_edit_date_from" value="[{!$isContent['date_from']!}]"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <input type='text' class="form-control" id="promotion_edit_date_from_hour"  name="promotion_edit_date_from_hour" value="[{!$isContent['date_from_hour']!}]"/>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker7'>
                                    <span class="input-group-addon">
                                        Fin
                                    </span>
                                    <input type='text' class="form-control doorGets-date-input datepicker-to"  id="promotion_edit_date_to" name="promotion_edit_date_to"  value="[{!$isContent['date_to']!}]" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <input type='text' class="form-control" id="promotion_edit_date_to_hour" name="promotion_edit_date_to_hour" value="[{!$isContent['date_to_hour']!}]"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        
                        <div class="col-md-6 text-right">
                            [{!$this->doorGets->Form->select($this->doorGets->__('Type de réduction'),'reduction_type',$aType,$isContent['reduction_type']);}]
                        </div>
                        <div class="col-md-2 text-left">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Valeur'),'reduction_value','text',$isContent['reduction_value']);}]   
                        </div>   
                    </div>
                </div>
                <div class="tab-pane" id="tabs-2">
                    <div class="row">
                        <div class="col-md-12">
                            [{!$this->doorGets->Form->select($this->doorGets->__('Faire la promotion partout'),'active_all',$aActivation,$isContent['active_all']);}]
                            <div class="separateur-tb"></div>
                        </div>
                       [{?(!empty($shopModules)):}]
                            [{/($shopModules as $module):}]
                            <div class="col-md-3">
                                <div class="list-group">
                                    <div class="list-group-item"><b class="glyphicon glyphicon-align-justify"></b> [{!$module['label']!}]</div>
                                    [{?(!empty($categories[$module['id']])):}]
                                        [{/($categories[$module['id']] as $uri=>$value):}]
                                            [{ 
                                                $checked = '';
                                                if (array_key_exists($module["id"],$isContent['categories']) && array_key_exists($value["id"],$isContent['categories'][$module["id"]]) ) {
                                                    $checked = 'checked';
                                                }
                                            }]
                                            <div class="list-group-item cat-index-level-[{!$value['level']!}]">
                                                [{!$this->doorGets->Form->checkbox(''.$value['name'],'categories['.$module["id"].']['.$value['id'].']','1',$checked,'cat-edit-level-'.$value['level'])!}]
                                            </div>
                                        [/]
                                    [?]
                                </div>
                            </div>
                            [/]
                        [?] 
                    </div>
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
<script type="text/javascript">
    $( ".datepicker-from" ).datepicker({
        minDate: '0',
        dateFormat : "dd-mm-yy",
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        changeHour: true,
        onClose: function( selectedDate ) {
            $( ".datepicker-to" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    
    $('#promotion_edit_date_from_hour').timepicker({ 'timeFormat': 'H:i:s' });
    $('#promotion_edit_date_to_hour').timepicker({ 'timeFormat': 'H:i:s' });

    $( ".datepicker-to" ).datepicker({
        defaultDate: "+1m",
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        minDate: '0',
        onClose: function( selectedDate ) {
            $( ".datepicker-from" ).datepicker( "option", "maxDate", selectedDate );
        }
        
    });
</script>
