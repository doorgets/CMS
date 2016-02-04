<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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


class DashboardView extends doorGetsUserView{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets);
    }
    
    public function getContent() {
        
        $out = '';
        $User               = $this->doorGets->user;

        $lgActuel           = $this->doorGets->getLangueTradution();
        $_modules = array();

        $modules = $allModules = $this->doorGets->loadModules(true,true);

        $canAddType = array_merge(Constant::$modulesCanAdd,array('genform','carousel','survey','translator'));
        $iCountContents = 0;
        $arrForCountSearchQuery = array();
        
        
        foreach($modules as $k => $v) {
            
            $_modules[$v['uri']] = $v;

            $allModules[$k]['url_edit'] = "?controller=modules&action=edit".$v['type']."&id=".$v['id'];
            
            if (!in_array($v['type'],$canAddType)) {
                
                unset($modules[$k]);
                $allModules[$k]['count']    = '';
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
                
                
            }else{
                
                $moduleInfos    = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        
                $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;
                (
                    in_array('module', $User['liste_module_interne'])  
                    && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

                ) ? $is_modules_modo = true : $is_modules_modo = false;

                if (!$is_modo) {
                    
                    $arrForCountSearchQuery[] = array('key'=>"id_user",'type'=>'=','value'=>$User['id']);
                }

                $allModules[$k]['count']    = $this->doorGets->getCountTable('_m_'.$v['uri'],$arrForCountSearchQuery);
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
                
            }
            
            if ($v['type'] === 'inbox') {
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_dg_inbox',array(array('key'=>'uri_module','type'=>'=','value'=>$v['uri'])));
                $allModules[$k]['url']      = "?controller=inbox&q_uri_module=".$v['uri'];
            }
            
            
            $iCountContents += $allModules[$k]['count'];
        }
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index de la page'),
            
        );
        
        // include config/modules.php 
        include CONFIG.'modules.php';
        
        $lastComments = $lastInbox = array();
        $iComments = $iInbox = $iSupport =0;

        $is_user_modo = false;
        if (!empty($User) && (in_array('users', $User['liste_module_interne']) && !SAAS_ENV) ||
            (in_array('users',  $User['liste_module_interne']) && SAAS_ENV && !SAAS_USERS)) {
            $is_user_modo = true;
        }

        $is_comment_modo = false;
        if (!empty($User) && (in_array('comment', $User['liste_module_interne']) && !SAAS_ENV) ||
            (in_array('comment',  $User['liste_module_interne']) && SAAS_ENV && !SAAS_COMMENT)) {
            $is_comment_modo = true;
        }

        $is_inbox_modo = false;
        if (!empty($User) && (in_array('inbox', $User['liste_module_interne']) && !SAAS_ENV) ||
            (in_array('inbox',  $User['liste_module_interne']) && SAAS_ENV && !SAAS_INBOX)) {
            $is_inbox_modo = true;
        }

        $is_support_modo = false;
        if (!empty($User) && (in_array('support', $User['liste_module_interne']) && !SAAS_ENV) ||
            (in_array('support',  $User['liste_module_interne']) && SAAS_ENV && !SAAS_INBOX)) {
            $is_support_modo = true;
        }

        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    $urlHistory = URL.'ajax/?controller=history&action=getMyHistory';

                    $filterModules = array(
                        array('key'=>'type','type'=>'!=','value'=>'block'),
                        array('key'=>'type','type'=>'!=','value'=>'carousel'),
                    );
                    $filterValidation = array(
                        array('key'=>'validation','type'=>'=','value'=>'3'),
                    );
                    $filterActive = array(
                        array('key'=>'active','type'=>'=','value'=>'2'),
                    );
                    
                    if ($is_comment_modo) {
                        $iComments = $this->doorGets->getCountTable('_dg_comments');
                    }

                    if ($is_inbox_modo) {
                        $iInbox = $this->doorGets->getCountTable('_dg_inbox');
                    }

                    if ($is_support_modo) {
                        $iSupport = $this->doorGets->getCountTable('_support');
                    }

                    $iModules = count($allModules);

                    if ($is_comment_modo) {
                        $lastComments = $this->doorGets->dbQ("SELECT * FROM _dg_comments ORDER BY date_creation DESC LIMIT 10");
                    }
                    
                    if ($is_inbox_modo) {
                        $lastInbox = $this->doorGets->dbQ("SELECT * FROM _dg_inbox ORDER BY date_creation DESC LIMIT 10");
                    }

                    if ($is_support_modo) {
                        $lastSupport = $this->doorGets->dbQ("SELECT * FROM _support ORDER BY date_creation DESC LIMIT 10");
                    }

                    if ($is_user_modo) {
                        // Users
                        $UsersInfoQuery = new UsersInfoQuery($this->doorGets);

                        if (!empty($this->doorGets->user['liste_enfant_modo'])) {
                        
                            foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {
                        
                                $UsersInfoQuery->filterByNetwork($this->doorGets->user['liste_enfant_modo'],'OR');
                            }
                        }
                        
                        $UsersInfoQuery->orderByDateCreation('desc')
                            ->limit(500)
                            ->find();

                        $usersInfoCollection = $UsersInfoQuery->_getEntities('array');

                        $totalUsers = $UsersInfoQuery->countTotal();
                        $totalUsers = number_format($totalUsers,0,',',' ');

                        

                        // // Orders
                        // $OrderQuery = new OrderQuery($this->doorGets);
                        // $OrderQuery->orderByDateCreation('desc')
                        //     ->limit(500)
                        //     ->find();

                        // $orders = array();
                        // $ordersCollection = $OrderQuery->_getEntities('array');

                        // $totalOrders = $OrderQuery->countTotal();
                        // $totalOrders = number_format($totalOrders,0,',',' ');
                        
                    }
                    // Activity
                    $UsersTrackQuery = new UsersTrackQuery($this->doorGets);
                    $UsersTrackQuery->filterByIdUser($this->doorGets->user['id'],'OR');

                    if (!empty($this->doorGets->user['liste_enfant_modo'])) {
                    
                        foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {
                    
                            $UsersTrackQuery->filterByIdGroupe($this->doorGets->user['liste_enfant_modo'],'OR');
                        }
                    }
                    
                    $UsersTrackQuery->orderByDate('desc')
                        ->limit(500)
                        ->find();

                    $history = array();
                    $usersTrackColletion = $UsersTrackQuery->_getEntities('array');
                    // echo '<pre>';
                    // var_dump($usersTrackColletion);
                    if( !empty($usersTrackColletion)) {

                        $_userInfos = array();
                        foreach ($usersTrackColletion as $k => $userTrack) {

                            if (array_key_exists($userTrack['uri_module'],$_modules)) {
                                
                                $typeModule = 'module'.$_modules[$userTrack['uri_module']]['type'];
                                
                                if (!array_key_exists($userTrack['id_user'],$_userInfos)) {

                                    $userProfile = $this->doorGets->getProfileLight($userTrack['id_user']);

                                    if (empty($userProfile)) continue;
                                    $_userInfos[$userTrack['id_user']] = $userProfile;

                                }
                                
                                if (!empty($userProfile)) {
                                    $history[$k] = $userTrack;

                                    $history[$k]['user_infos'] = $_userInfos[$userTrack['id_user']];
                                    $editAction = '';
                                    if ($typeModule !== 'modulepage') {
                                        $editAction = '&action=edit&id='.$userTrack['id_content'];
                                    }
                                    $history[$k]['urlToGo'] = './?controller='.$typeModule.'&uri='.$userTrack['uri_module'].$editAction.'&lg='.$userTrack['langue'];
                                    $history[$k]['date'] = GetDate::before($userTrack['date'],$this->doorGets);
                                    //$history[$k]['date'] = GetDate::in($userTrack['date'],1,$this->doorGets->user['langue']);
                                    $history[$k]['title'] = html_entity_decode($history[$k]['title']);
                                    switch ($userTrack['action']) {
                                        
                                        case 'edit':
                                            $history[$k]['history'] = '<b>'.$userProfile['pseudo'].'</b> '.$this->doorGets->__('a modifié').' <a href="'.$history[$k]['urlToGo'].'"><b><em>'.$history[$k]['title'].'</em></b></a> '.$this->doorGets->__('dans').' <a href="./?controller='.$typeModule.'&uri='.$userTrack['uri_module'].'">'.$_modules[$userTrack['uri_module']]['label'].'</a>';
                                            break;
                                        
                                        case 'add':
                                            $history[$k]['history'] = '<b>'.$userProfile['pseudo'].'</b> '.$this->doorGets->__('a ajouté').' <a href="'.$history[$k]['urlToGo'].'"><b><em>'.$history[$k]['title'].'</em></b></a> '.$this->doorGets->__('dans').' <a href="./?controller='.$typeModule.'&uri='.$userTrack['uri_module'].'">'.$_modules[$userTrack['uri_module']]['label'].'</a>';
                                            break;
                                        
                                        case 'delete':
                                            $history[$k]['urlToGo'] = '';
                                            $history[$k]['history'] = '<b>'.$userProfile['pseudo'].'</b> '.$this->doorGets->__('a supprimé').' <b><em><del>'.$history[$k]['title'].'</del></em></b> '.$this->doorGets->__('dans').' <a href="./?controller='.$typeModule.'&uri='.$userTrack['uri_module'].'">'.$_modules[$userTrack['uri_module']]['label'].'</a>';
                                            break;
                                    } 
                                }
                                

                            } elseif (in_array($userTrack['uri_module'],array('translator'))) {

                                $typeModule = $userTrack['uri_module'];

                                if (!array_key_exists($userTrack['id_user'],$_userInfos)) {

                                    $userProfile = $this->doorGets->getProfileLight($userTrack['id_user']);
                                    if (empty($userProfile)) continue;
                                    $_userInfos[$userTrack['id_user']] = $userProfile;

                                }
                                
                                $history[$k] = $userTrack;

                                $history[$k]['user_infos'] = $_userInfos[$userTrack['id_user']];
                                $editAction = '';
                                if ($typeModule !== 'modulepage') {
                                    $editAction = '&action=edit&id='.$userTrack['id_content'];
                                }
                                $history[$k]['urlToGo'] = './?controller='.$typeModule.'&lg='.$userTrack['langue'].$editAction;
                                $history[$k]['date'] = GetDate::before($userTrack['date'],$this->doorGets);
                                //$history[$k]['date'] = GetDate::in($userTrack['date'],1,$this->doorGets->user['langue']);
                                $history[$k]['title'] = html_entity_decode($history[$k]['title']);
                                switch ($userTrack['action']) {
                                    
                                    case 'edit':
                                        $history[$k]['history'] = '<b>'.$userProfile['pseudo'].'</b> '.$this->doorGets->__('a modifié').' <a href="'.$history[$k]['urlToGo'].'"><b><em>'.$history[$k]['title'].'</em></b></a> '.$this->doorGets->__('dans').' <a href="./?controller='.$userTrack['uri_module'].'">'.$userTrack['uri_module'].'</a>';
                                        break;
                                    
                                    case 'add':
                                        $history[$k]['history'] = '<b>'.$userProfile['pseudo'].'</b> '.$this->doorGets->__('a ajouté').'<a href="'.$history[$k]['urlToGo'].'"><b><em>'.$history[$k]['title'].'</em></b></a> '.$this->doorGets->__('dans').' <a href="./?controller='.$userTrack['uri_module'].'">'.$userTrack['uri_module'].'</a>';
                                        break;
                                    
                                    case 'delete':
                                        $history[$k]['urlToGo'] = '';
                                        $history[$k]['history'] = '<b>'.$userProfile['pseudo'].'</b> '.$this->doorGets->__('a supprimé').' <b><em><del>'.$history[$k]['title'].'</del></em></b> '.$this->doorGets->__('dans').' <a href="./?controller='.$userTrack['uri_module'].'">'.$userTrack['uri_module'].'</a>';
                                        break;
                                }
                            }
                        }
                    }

                    $type = 'month';
                    $stats = new StatsService($this->doorGets);

                    $hasUser = (in_array('stats_user',$this->doorGets->user['liste_module_interne']))?true:false;
                    //$hasCart = (in_array('stats_cart',$this->doorGets->user['liste_module_interne']))?true:false;
                    //$hasOrder = (in_array('stats_order',$this->doorGets->user['liste_module_interne']))?true:false;
                    $hasContrib = (in_array('stats_contrib',$this->doorGets->user['liste_module_interne']))?true:false;
                    $hasComment = (in_array('stats_comment',$this->doorGets->user['liste_module_interne']))?true:false;
                    $hasCloud = (in_array('stats_cloud',$this->doorGets->user['liste_module_interne']))?true:false;
                    $hasTickets = (in_array('stats_tickets',$this->doorGets->user['liste_module_interne']))?true:false;

                    $jsChartTitleFinal = '';
                    $jsChartFinal = '';
                    $hasStats = false;

                    if (in_array('stats_dash',$this->doorGets->user['liste_module_interne'])) {
                        foreach ($stats->data['accounts'][$type] as $date => $sum) {

                            $jsChartTitle = "['".$this->doorGets->__('Date')."',";
                            $jsChart = "['$date',";
                            
                            if ($hasUser) {
                                $hasStats = true;
                                $jsChartTitle .= "'".$this->doorGets->__('Inscriptions')."', ";
                                $jsChart .= $stats->data['accounts'][$type][$date].',';
                            }

                            if ($hasTickets) {
                                $hasStats = true;
                                $jsChartTitle .= "'".$this->doorGets->__('Tickets')."', ";
                                $jsChart .= $stats->data['tickets'][$type][$date].',';
                            }
                            
                            // if ($hasCart) {
                            //     $hasStats = true;
                            //     $jsChartTitle .= "'".$this->doorGets->__('Paniers')."', ";
                            //     $jsChart .= $stats->data['carts'][$type][$date].',';
                            // }
                            
                            // if ($hasOrder) {
                            //     $hasStats = true;
                            //     $jsChartTitle .= "'".$this->doorGets->__('Commandes')."', ";
                            //     $jsChart .= $stats->data['orders'][$type][$date].',';
                            // }
                            
                            if ($hasContrib) {
                                $hasStats = true;
                                $jsChartTitle .= "'".$this->doorGets->__('Contributions')."', ";
                                $jsChart .= $stats->data['contributions'][$type][$date].',';
                            }
                            
                            if ($hasComment) {
                                $hasStats = true;
                                $jsChartTitle .= "'".$this->doorGets->__('Commentaires')."', ";
                                $jsChart .= $stats->data['comments'][$type][$date].',';
                            }
                            
                            if ($hasCloud) {
                                $hasStats = true;
                                $jsChartTitle .= "'".$this->doorGets->__('Cloud')."',";
                                $jsChart .= $stats->data['cloud'][$type][$date].',';
                            }

                            if ($hasStats) {
                                $jsChartTitle = substr($jsChartTitle,0,-1);
                                $jsChart = substr($jsChart,0,-1);    
                            }
                            
                            $jsChartTitle .= "],
                            ";
                            $jsChart .= "],
                            ";
                        
                            $jsChartTitleFinal = $jsChartTitle;
                            $jsChartFinal .= $jsChart;
                        }
                    }
                    

                    break;
            }
            
            $ActionFile = 'user/dashboard/user_dashboard_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}
