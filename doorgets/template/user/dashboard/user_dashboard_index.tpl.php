<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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
            <b class="glyphicon glyphicon-dashboard"></b> [{!$this->doorGets->__('Tableau de bord')!}]
        </legend>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default box-dash">
                    <div class="box-dash-title panel-heading">
                        <b class="glyphicon glyphicon-signal"></b> [{!$this->doorGets->__('Activité')!}]
                    </div>
                    <div class="panel-body box-dash-content">
                        [{?(!empty($history)):}]
                            [{/($history as $track):}]
                                [{?(array_key_exists('history',$track)):}]
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <img class="media-object avatars" src="[{!URL.'data/users/'.$track['user_infos']['avatar']!}]" >    
                                    </div>
                                    <div class="media-body">
                                        <h4><small>[{!$track['date']!}]</small></h4>
                                        <small class="pull-right"></small>
                                        [{!$track['history']!}]
                                    </div>
                                </div>
                                [?]
                            [/]
                        [??]
                            <div class="comment-center">[{!$this->doorGets->__("Il n'y a pas encore d'historique")!}].</div>
                        [?]
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    [{?($is_comment_modo):}]
                        <div class="col-md-12">
                            <div class="panel panel-default box-dash">
                                <div class="box-dash-title panel-heading">
                                    <a href="?controller=comment">
                                        <b class="glyphicon glyphicon-comment"></b>  [{!$this->doorGets->__("Commentaire")!}]
                                    </a>
                                </div>
                                <div class="panel-body box-dash-content">
                                    [{?(!empty($lastComments)):}]
                                        <ul class="list-group">  
                                        [{/($lastComments as $v):}]
                                            [{
                                                $imgVal = '<img src="'.BASE_IMG.'puce-rouge.png" title="'.$this->doorGets->__('Bloquer').'" />';
                                                if ($v['validation'] === '2') {
                                                    $imgVal = '<img src="'.BASE_IMG.'puce-verte.png" title="'.$this->doorGets->__('Activer').'" />';
                                                }
                                                if ($v['validation'] === '3') {
                                                    $imgVal = '<img src="'.BASE_IMG.'puce-orange.png" title="'.$this->doorGets->__('En attente de modération').'" />';
                                                }
                                            }]
                                            <li class="list-group-item">
                                                <a href="?controller=comment&action=select&id=[{!$v['id']!}]">
                                                    <h4>
                                                      [{!$imgVal!}] [{!$this->doorGets->_truncate($v['nom'])!}] <small>([{!$this->doorGets->_truncate($v['email'])!}])</small>
                                                    </h4>
                                                    <p>[{!$this->doorGets->_truncate($v['comment'])!}]</p>
                                                    <div class="text-right">
                                                        <small>[{!GetDate::in($v['date_creation'],1,$this->doorGets->myLanguage)!}]</small>
                                                    </div>
                                                </a>
                                            </li>
                                        [/]
                                            <li class="list-group-item text-right">
                                                <span>[{!$this->doorGets->__("Total")!}] : [{!$iComments!}]</span>
                                            </li>
                                        </ul>
                                    [??]
                                        <div class="comment-center">[{!$this->doorGets->__("Il n'y a pas encore de commentaire")!}].</div>
                                    [?]
                                </div>
                            </div>
                        </div>
                    [?]
                    [{?($is_inbox_modo):}]
                        <div class="col-md-12">
                            <div class="panel panel-default box-dash">
                                <div class="box-dash-title panel-heading">
                                    <a href="?controller=inbox">
                                        <b class="glyphicon glyphicon-envelope"></b>  [{!$this->doorGets->__("Message")!}]
                                    </a>
                                </div>
                                <div class="panel-body box-dash-content">
                                    [{?(!empty($lastInbox)):}]
                                        <ul class="list-group">  
                                        [{/($lastInbox as $v):}]
                                            [{
                                                $imgVal = '<img src="'.BASE_IMG.'puce-orange.png" title="'.$this->doorGets->__('Non lu').'" />';
                                                if ($v['lu'] === '1') {
                                                    $imgVal = '<img src="'.BASE_IMG.'puce-verte.png" title="'.$this->doorGets->__('Lu').'" />';
                                                }
                                            }]
                                            <li class="list-group-item">
                                                <a href="?controller=inbox&action=select&id=[{!$v['id']!}]">
                                                    <h4 >
                                                      [{!$imgVal!}] [{!$this->doorGets->_truncate($v['nom'],'30')!}] - [{!$this->doorGets->_truncate($v['sujet'],'30')!}] 
                                                      <small>([{!$this->doorGets->_truncate($v['email'])!}])</small>
                                                    </h4>
                                                    <p>[{!$this->doorGets->_truncate($v['message'])!}]</p>
                                                    <div class="text-right"><small>[{!GetDate::in($v['date_creation'],1,$this->doorGets->myLanguage)!}]</small></div>
                                                </a>
                                            </li>
                                        [/]
                                            <li class="list-group-item text-right">
                                                <span >[{!$this->doorGets->__("Total")!}] : [{!$iInbox!}]</span>
                                            </li>
                                        </ul>
                                    [??]
                                        <div class="comment-center">[{!$this->doorGets->__("Il n'y a pas encore de message")!}].</div>
                                    [?]
                                </div>
                            </div>
                        </div>
                    [?]
                    [{?(!empty($allModules)):}]
                        
                        <div class="col-md-12">
                            <div class="panel panel-default box-dash">
                                <div class="box-dash-title panel-heading">
                                    <a href="?controller=modules">
                                        <b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__("Module")!}]
                                    </a>
                                </div>
                                <div class="panel-body box-dash-content">
                                    [{?(!empty($allModules)):}]
                                        <ul class="list-group">  
                                        [{/($allModules as $v):}]
                                            [{
                                                $imgVal = '<img src="'.BASE_IMG.'puce-verte.png" title="'.$this->doorGets->__('Active').'" />';
                                                if ($v['active'] === '0') {
                                                    $imgVal = '<img src="'.BASE_IMG.'puce-rouge.png" title="'.$this->doorGets->__('Désactivé').'" />';
                                                }
                                                $imgType = '<img src="'.$listeInfos[$v['type']]['image'].'" >';
                                            }]
                                            <li class="list-group-item">
                                                <a href="[{!$v['url']!}]" title="[{!$this->doorGets->__('Gérer le contenu')!}]" style="display: block;">
                                                    [{!$imgVal!}] [{!$imgType!}] [{!$this->doorGets->_truncate($v['label'])!}]
                                                    [{?(!empty($v['count'])):}]<span class="badge right">[{!$this->doorGets->_truncate($v['count'])!}]</span>[?]
                                                </a>
                                                
                                            </li>

                                        [/]
                                            <li class="list-group-item text-right">
                                                <span >[{!$this->doorGets->__("Total")!}] [ [{!$this->doorGets->__("Module")!}] : [{!$iModules!}] - [{!$this->doorGets->__("Contenu")!}] : [{!$iCountContents!}] ]</span>
                                            </li>
                                        </ul>
                                    [??]
                                        <div class="comment-center">[{!$this->doorGets->__("Il n'y a pas encore de module")!}].</div>
                                    [?]
                                </div>
                            </div>
                        </div>
                    [?]
                    [{?(!empty($modulesBlocks) || !empty($modulesGenforms)):}]
                        
                        <div class="col-md-12">
                            <div class="panel panel-default box-dash">
                                <div class="box-dash-title panel-heading">
                                    <b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__("Widgets")!}]
                                </div>
                                <div class="panel-body box-dash-content">
                                    <ul class="list-group"> 
                                    [{?(!empty($modulesBlocks)):}]
                                         
                                        [{/($modulesBlocks as $v):}]
                                            [{
                                                $imgVal = '<img src="'.BASE_IMG.'puce-verte.png" title="'.$this->doorGets->__('Active').'" />';
                                                if ($v['active'] === '0') {
                                                    $imgVal = '<img src="'.BASE_IMG.'puce-rouge.png" title="'.$this->doorGets->__('Désactivé').'" />';
                                                }
                                                $imgType = '<img src="'.$listeInfos[$v['type']]['image'].'" >';
                                            }]
                                            <li class="list-group-item">
                                                <a href="?controller=moduleblock&uri=[{!$v['uri']!}]" title="[{!$this->doorGets->__('Gérer le contenu')!}]" style="display: block;">
                                                    [{!$imgVal!}] [{!$imgType!}] [{!$this->doorGets->_truncate($v['label'])!}]
                                                </a>
                                            </li>
                                        [/]
                                    [?]
                                    [{?(!empty($modulesGenforms)):}] 
                                        [{/($modulesGenforms as $v):}]
                                            [{
                                                $imgVal = '<img src="'.BASE_IMG.'puce-verte.png" title="'.$this->doorGets->__('Active').'" />';
                                                if ($v['active'] === '0') {
                                                    $imgVal = '<img src="'.BASE_IMG.'puce-rouge.png" title="'.$this->doorGets->__('Désactivé').'" />';
                                                }
                                                $imgType = '<img src="'.$listeInfos[$v['type']]['image'].'" >';
                                            }]
                                            <li class="list-group-item">
                                                <a href="?controller=modulegenform&uri=[{!$v['uri']!}]" title="[{!$this->doorGets->__('Gérer le contenu')!}]" style="display: block;">
                                                    [{!$imgVal!}] [{!$imgType!}] [{!$this->doorGets->_truncate($v['label'])!}]
                                                    [{?(!empty($v['count'])):}]<span class="badge right">[{!$this->doorGets->_truncate($v['count'])!}]</span>[?]
                                                </a>
                                            </li>
                                        [/]
                                    [?]
                                    </ul>
                                    [{?(empty($modulesGenforms) && empty($modulesBlocks)):}] 
                                        <div class="comment-center">[{!$this->doorGets->__("Il n'y a pas encore de contenu")!}].</div>
                                    [?]
                                </div>
                                <div class="panel-footer text-right">
                                    <span>[{!$this->doorGets->__("Total")!}] : [{!$iModulesBlocks + $iModulesGenforms!}]</span>
                                </div>
                            </div>
                        </div>
                    [?]
                </div> 
            </div>
        </div>
        
    </div>

</div>
<script type="text/javascript">
  
    $( ".sortable-dash" ).sortable();
    $( ".sortable-dash" ).disableSelection();

    function checkHistory() {
        $.ajax({
            url: '[{!$urlHistory!}]',
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data.data);
            if (data.data.length > 0) {

                $.each(data.data, function(key,value){

                    $('#show-history .list-group').prepend('<li class="list-group-item"><a href="' + value.url + '">' + value.url + ' : ' + value.time + '</a></li>');
                });
            }
            
        });      
    }

    
    window.setInterval(function(){
        //checkHistory();
    }, 5000);
</script>
