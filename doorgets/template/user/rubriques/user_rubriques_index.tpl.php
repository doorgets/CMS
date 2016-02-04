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


?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">
        
    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <span class="create" ><a href="?controller=rubriques&action=add"class="violet" ><b class="glyphicon glyphicon-plus"></b> [{!$this->doorGets->__('Créer une nouvelle rubrique')!}]</a></span>
            <b class="glyphicon glyphicon-align-justify"></b> [{!$this->doorGets->__('Menu')!}]
        </legend>
        [{?($cAll != 0):}]
            <ul id="draggablePanelList" class="list-unstyled">
            [{-($i=0;$i<$cAll;$i++):}]
                <li class="panel panel-info">
                    <div class="row panel-body">
                        <div class="col-md-10">
                            <input type="hidden" name="[{!$all[$i]['id']!}]" value="[{!$i!}]">
                            [{!$all[$i]['title']!}]
                        </div>
                        <div class="col-md-1">
                            [{!$all[$i]['urlEdit']!}]
                        </div>
                        <div class="col-md-1">
                            [{!$all[$i]['urlDelete']!}]
                        </div>
                    </div>
                </li>
            [-]
            </ul>
        [??]
            <div class="alert alert-info text-center"><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun résultat")!}]</span>
        [?]
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('load',function(){
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make the entire <li>...</li> draggable.
            handle: '.panel-body', 
            update: function() {
                var listToSend = "";
                $('.panel', panelList).each(function(index, elem) {
                        var $listItem = $(elem);
                        newIndex = $listItem.index();
                        var attrToSend = $listItem.find('input').attr('name');
                        listToSend = listToSend + attrToSend + '|';
                        $listItem.find('input').val(newIndex);
                        
                     // Persist the new indices.
                });
                // console.log(newIndex);
                var url = BASE_URL + 'ajax/?controller=rubriques&action=updateOrder&value='+listToSend;

                $.get(url , {} , function(data){
                    var rep = JSON.parse(data);

                    if (rep.code == 200) {
                        console.log(rep);
                    }
                });
                console.log(listToSend);
            }
        });
    });
        
</script>