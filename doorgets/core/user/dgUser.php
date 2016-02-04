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


class dgUser extends Langue{
    
    public function __construct($id) {
        
        parent::__construct();
        
        $isUser = $this->dbQS($id,'_users_info','id_user');
        if (!empty($isUser)) {
            
            $isUser['count_notification'] = 0;
            $isUser['count_track'] = 0;
            $isUser['last_connexion'] = 0;
            $isUser['total_contribution'] = 0;
            $isUser['network_name'] = '-';
            
            $nameGroupe = $this->dbQS($isUser['network'],'_users_groupes');
            if (!empty($nameGroupe)) {
                $isUser['network_name'] = $nameGroupe['title'];    
            }
            
            $isUser['date_creation'] = GetDate::in($isUser['date_creation']);
            
            $isUserNotification = $this->dbQ("SELECT count(*) as counter FROM _users_notification WHERE id_user = ".$id);
            $isUser['count_notification'] = (int)$isUserNotification[0]['counter'];
            
            $isUserLastConnexion = $this->dbQ("SELECT date  FROM _users_notification WHERE id_user = ".$id." ORDER BY date DESC LIMIT 1");
            if (!empty($isUserLastConnexion)) {
                
                $isUser['last_connexion'] = GetDate::in($isUserLastConnexion[0]['date']);
            }
            
            $isUserTrack = $this->dbQ("SELECT count(*) as counter FROM _users_track WHERE id_user = ".$id);
            $isUser['count_track'] = (int)$isUserTrack[0]['counter'];
            
            $LogineExistInfoGroupe = $this->dbQS($isUser['network'],'_users_groupes');
            if (!empty($LogineExistInfoGroupe)) {
                
                $isUser['liste_module'] =  $this->listeToArray($LogineExistInfoGroupe['liste_module']);
                
                if (!empty($isUser['liste_module'])) {
                    
                    // init
                    $outListeTypeModule = array();
                    $realCount = 0;
                    
                    foreach($isUser['liste_module'] as $nameModule) {
                        
                        $countContents = 0;
                        $isModule = $this->dbQS($nameModule,'_modules','uri');
                        if (!empty($isModule)) {
                            
                            $outListeTypeModule[$nameModule]['type'] = $isModule['type'];
                            
                            if (
                               $isModule['type'] === 'blog' || $isModule['type'] === 'tuto'  || $isModule['type'] === 'news' || $isModule['type'] === 'multipage' 
                           ) {
                                $isCounterContents = $this->dbQ("SELECT count(*) as counter FROM _m_".$nameModule." WHERE id_user = ".$id." ");
                                $countContents = (int)$isCounterContents[0]['counter'];
                                $realCount = $realCount + $countContents;
                            }
                            
                            
                            
                            $outListeTypeModule[$nameModule]['count'] = $countContents;
                            
                        }
                    }
                    $isUser['total_contribution']       = $realCount;
                    $isUser['liste_module']             = $outListeTypeModule;
                    
                }
                
                
            }
            
            /*
            $out = '';
            
                
                $blockInfos = new BlockTable();
                $blockInfos->setClassCass('doorgets-listing');
                
                $blockInfos->addTitle($this->getWords("Date d'inscription"),'date_inscription',' td-title center');
                $blockInfos->addTitle($this->getWords("Dérnnière connexion"),'date_connexion',' td-title center');
                $blockInfos->addTitle($this->getWords("Nbre de contibution"),'nb_contribution',' td-title center');
                $blockInfos->addTitle($this->getWords("Nbre d'action"),'nb_action',' td-title center');
                $blockInfos->addTitle($this->getWords("Nbre de page afficher"),'nb_page',' td-title center');
                
                $blockInfos->addContent('date_inscription',$isUser['date_creation'],'center');
                $blockInfos->addContent('date_connexion',$isUser['last_connexion'],'center' );
                $blockInfos->addContent('nb_contribution',$isUser['total_contribution'],'center' );
                $blockInfos->addContent('nb_action',$isUser['count_track'],'center' );
                $blockInfos->addContent('nb_page',$isUser['count_notification'],'center' );
                
                if (!empty($isUser['liste_module'])) {
                    
                    $blockModule = new BlockTable();
                    $blockModule->setClassCass('doorgets-listing');
                    $blockModule->addTitle($this->getWords("Module"),'module','first-title td-title left');
                    $blockModule->addTitle($this->getWords("Type"),'titre','td-title center');
                    $blockModule->addTitle($this->getWords("Nbre de contribution"),'nb_contribution','td-title center');
                    
                    foreach($isUser['liste_module'] as $k=>$v) {
                        
                        $blockModule->addContent('module',$k );
                        $blockModule->addContent('titre',$v['type'],'center' );
                        $blockModule->addContent('nb_contribution',$v['count'],'center' );
                    }
                }
                
                $fTpl = GenView::getAdmin('doorgets','users/info.dguser.tpl.php');
                ob_start();
                include $fTpl;
                $out = ob_get_clean();
           
            
            $this->user = $out;
            
            */
        }
        
        return $isUser;
        
    }
    
    
    
}