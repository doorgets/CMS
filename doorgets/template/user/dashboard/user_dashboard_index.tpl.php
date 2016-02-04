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
            <b class="glyphicon glyphicon-dashboard"></b> [{!$this->doorGets->__('Tableau de bord')!}]
        </legend>
        [{?(($hasStats && !SAAS_ENV) || ($hasStats && SAAS_ENV && SAAS_STATS)):}]
        <div class="row">
            <div class="col-md-12">
                <div id="chart_div" style="width: 110%; height: 500px;margin-left:-100px;margin-top:-20px;"></div>
            </div>
        </div>
        [?]
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default box-dash">
                    <div class="box-dash-title panel-heading">
                        <b class="glyphicon glyphicon-signal"></b> [{!$this->doorGets->__('Activité')!}]
                    </div>
                    <div class="panel-body padding-0 panel-dash-module">
                        [{?(!empty($history)):}]
                            [{/($history as $track):}]
                                [{?(array_key_exists('history',$track)):}]
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <img class="media-object avatars" src="[{!URL.'data/users/'.$track['user_infos']['avatar']!}]" >    
                                    </div>
                                    <div class="media-body">
                                        <small class="pull-right">[{!$track['date']!}]</small>
                                        [{!$track['history']!}]
                                    </div>
                                </div>
                                [?]
                            [/]
                        [??]
                            <div class="comment-center"><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a pas encore d'historique")!}].</div>
                        [?]
                    </div>
                </div>
            </div>
            [{?($is_user_modo):}]
            <div class="col-md-4">
                <div class="panel panel-default box-dash">
                    <div class="box-dash-title panel-heading">
                        <a href="?controller=users">
                            <small class="pull-right">[{!$totalUsers!}]</small>
                            <b class="glyphicon glyphicon-user"></b> [{!$this->doorGets->__('Utilisateurs')!}]
                        </a>
                    </div>
                    <div class="panel-body padding-0 panel-dash-module">
                        [{?(!empty($usersInfoCollection)):}]
                            [{/($usersInfoCollection as $user):}]
                                [{
                                    $user['status_ico'] = '<i class="fa fa-exclamation-triangle red-c"></i>';
                                    if (array_key_exists($user['active'],Constant::$userStatus)) {
                                        $user['status_ico'] = Constant::$userStatus[$user['active']];
                                    }
                                    $user['first_name'] = ucfirst($user['first_name']);
                                    $user['last_name'] = ucfirst($user['last_name']);
                                    $user['date_creation'] = GetDate::before($user['date_creation'],$this->doorGets);
                                }]
                                <div class="box-dash-content-out padding-10">
                                    <small class="pull-right">[{!$user['date_creation']!}]</small>
                                    [{!$user['status_ico']!}] [{!$this->doorGets->__('Utilisateur')!}] n° <a href="?controller=users&action=edit&id=[{!$user['id']!}]" target="_blank">[{!$user['id']!}]</a>
                                    <br />
                                    <b>[{!$user['pseudo']!}]</b> [{!$user['first_name']!}] [{!$user['last_name']!}] 
                                </div>
                            [/]
                        [?]
                    </div>
                </div>
            </div>
            [?]
            [{?(!empty($allModules)):}]
            <div class="col-md-4">
                <div class="panel panel-default box-dash">
                    <div class="box-dash-title panel-heading">
                        <a href="?controller=modules">
                            <span class="pull-right">[{!$iModules!}]</span>
                            <b class="glyphicon glyphicon-asterisk"></b> [{!$this->doorGets->__("Modules")!}] 
                        </a>
                    </div>
                    <div class="panel-body padding-0 panel-dash-module">
                        [{?(!empty($allModules)):}]
                            [{/($allModules as $v):}]
                                [{?($v['active'] === '1'):}]
                                [{
                                    $imgType = '<img src="'.$listeInfos[$v['type']]['image'].'" >';
                                }]
                                <div class="box-dash-content-in">
                                    <a href="[{!$v['url']!}]" title="[{!$this->doorGets->__('Gérer le contenu')!}]" style="display: block;">
                                        [{!$imgType!}] [{!$this->doorGets->_truncate($v['label'])!}]
                                        [{?(!empty($v['count'])):}]<span class="badge right">[{!$this->doorGets->_truncate($v['count'])!}]</span>[?]
                                    </a>
                                </div>
                                [?]
                            [/]
                        [?]
                    </div>
                </div>
            </div>
            [?]
            [{?($is_comment_modo):}]
                <div class="col-md-4">
                    <div class="panel panel-default box-dash">
                        <div class="box-dash-title panel-heading">
                            <a href="?controller=comment">
                                <span class="pull-right">[{!number_format($iComments,0,',',' ')!}]</span>
                                <b class="glyphicon glyphicon-comment"></b>  [{!$this->doorGets->__("Commentaires")!}]
                            </a>
                        </div>
                        <div class="panel-body padding-0 panel-dash-comment">
                            [{?(!empty($lastComments)):}]
                                [{/($lastComments as $v):}]
                                    [{
                                        $imgVal = '<i class="fa fa-ban fa-lg red-c"></i>';
                                        if ($v['validation'] === '2') {
                                            $imgVal = '<i class="fa fa-check fa-lg green-c"></i>';
                                        } elseif ($v['validation'] === '3') {
                                            $imgVal = '<i class="fa fa-hourglass-end fa-lg orange-c"></i>';
                                        }
                                    }]
                                    <div class="box-dash-content-in">
                                        <a href="?controller=comment&action=select&id=[{!$v['id']!}]">
                                            [{!$imgVal!}] [{!GetDate::in($v['date_creation'],1,$this->doorGets->myLanguage)!}] <br />
                                            [{!$this->doorGets->_truncate($v['nom'])!}]
                                            <i class="fa fa-caret-right"></i> [{!$this->doorGets->_truncate($v['comment'])!}]   
                                        </a>
                                    </div>
                                [/]
                            [??]
                                <div class="comment-center"><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a pas encore de commentaire")!}].</div>
                            [?]
                        </div>
                    </div>
                </div>
            [?]
            [{?($is_inbox_modo):}]
                <div class="col-md-4">
                    <div class="panel panel-default box-dash">
                        <div class="box-dash-title panel-heading">
                            <a href="?controller=inbox">
                                <span class="pull-right">[{!number_format($iInbox,0,',',' ')!}]</span>
                                <b class="glyphicon glyphicon-envelope"></b>  [{!$this->doorGets->__("Messages")!}]
                            </a>
                        </div>
                        <div class="panel-body padding-0 panel-dash-inbox">
                            [{?(!empty($lastInbox)):}] 
                                [{/($lastInbox as $v):}]
                                    [{
                                        $imgVal = '<i class="fa fa-eye-slash fa-lg orange-c"></i> ';
                                        if ($v['lu'] === '1') {
                                            $imgVal = '<i class="fa fa-eye fa-lg green-c"></i> ';
                                        }
                                    }]
                                    <div class="box-dash-content-in">
                                        <a href="?controller=inbox&action=select&id=[{!$v['id']!}]">
                                              [{!$imgVal!}] [{!GetDate::in($v['date_creation'],1,$this->doorGets->myLanguage)!}] <br />
                                              [{!$this->doorGets->_truncate($v['nom'],'30')!}] <i class="fa fa-caret-right"></i> [{!$this->doorGets->_truncate($v['sujet'],'30')!}]
                                        </a>
                                    </div>
                                [/]
                            [??]
                                <div class="comment-center"><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Il n'y a pas encore de message")!}].</div>
                            [?]
                        </div>
                    </div>
                </div>
            [?]
            [{?($is_support_modo):}]
                <div class="col-md-4">
                    <div class="panel panel-default box-dash">
                        <div class="box-dash-title panel-heading">
                            <a href="?controller=inbox">
                                <span class="pull-right">[{!number_format($iSupport,0,',',' ')!}]</span>
                                <b class="glyphicon  glyphicon-question-sign"></b>  [{!$this->doorGets->__("Support")!}]
                            </a>
                        </div>
                        <div class="panel-body padding-0 panel-dash-inbox">
                            [{?(!empty($lastSupport)):}] 
                                [{/($lastSupport as $v):}]
                                    [{
                                        $imgVal = '<i class="fa fa-eye-slash fa-lg orange-c"></i> ';
                                        if ($v['readed_support'] === '2') {
                                            $imgVal = '<i class="fa fa-eye fa-lg green-c"></i> ';
                                        }
                                    }]
                                    <div class="box-dash-content-in">
                                        <a href="?controller=support&action=ticket&id=[{!$v['id']!}]">
                                              [{!$imgVal!}] [{!GetDate::in($v['date_creation'],1,$this->doorGets->myLanguage)!}] <br />
                                              [{!$this->doorGets->_truncate($v['pseudo'],'30')!}] <i class="fa fa-caret-right"></i> [{!$this->doorGets->_truncate($v['subject'],'30')!}]
                                        </a>
                                    </div>
                                [/]
                            [??]
                                <div class="comment-center"><i class="fa fa-exclamation-triangle"></i> [{!$this->doorGets->__("Aucun résulat")!}].</div>
                            [?]
                        </div>
                    </div>
                </div>
            [?]
        </div>
    </div>
</div>
[{?(($hasStats && !SAAS_ENV) || ($hasStats && SAAS_ENV && SAAS_STATS)):}]
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);
      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
        [{!$jsChartTitleFinal!}]
        [{!$jsChartFinal!}]
      ]);

    var options = {
      seriesType: 'bars',
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
[?]
