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


class CustomerService {
    
    public $id;
    public $info = array();
    public $contribution = array();
    public $orders = array();
    public $doorGets;
    
    public $countSuccess = 0;
    public $amountSuccess = '';
    public $amountProfit = '';

    public function __construct($id,&$doorGets) {
        
        $this->doorGets = $doorGets;
        $this->id = $id;
        $this->contribution = $this->initContribution();
        //$this->orders = $this->initOrders();

    }

    public function initOrders() {

        $cutomerOrders = new OrderQuery($this->doorGets);
        $cutomerOrders->filterByUserId($this->id);
        $cutomerOrders->find();
        $data = $cutomerOrders->_getEntities('array');

        $counter = 0;
        $amounts = array();
        $amountsProfit = array();
        if (!empty($data)) {
            foreach ($data as $order) {
                if ($order['status'] === 'payment_success') {
                    $counter++;
                    if (!array_key_exists($order['currency'], $amounts)) {
                        $amounts[$order['currency']] = 0.00;
                    }
                    $amounts[$order['currency']] += (float)$order['amount_with_shipping'];
                    if (!array_key_exists($order['currency'], $amountsProfit)) {
                        $amountsProfit[$order['currency']] = 0.00;
                    }
                    $amountsProfit[$order['currency']] += (float)$order['amount_profit'];
                }
            }
        }

        $this->countSuccess     = $counter;
        if (!empty($amounts)) {
            foreach ($amounts as $currency => $amount) {
                $this->amountSuccess .= $this->doorGets->setCurrencyIcon($amount,$currency).' | ';
            }
            $this->amountSuccess = substr($this->amountSuccess,0,-2);
        }
        if (!empty($amountsProfit)) {
            foreach ($amountsProfit as $currency => $amount) {
                $this->amountProfit .= $this->doorGets->setCurrencyIcon($amount,$currency).' | ';
            }
            $this->amountProfit = substr($this->amountProfit,0,-2);
        }
        
        return $data;
    }

    public function initContribution() {

        $id = $this->id;
        $out = array();
        $isUser = $this->doorGets->dbQS($id,'_users_info','id_user');
        if (!empty($isUser)) {

            $info['count_notification'] = 0;
            $info['count_track'] = 0;
            $info['last_connexion'] = 0;
            $info['total_contribution'] = 0;
            $info['network_name'] = '-';
            $info['network_id'] = '0';
            $info['email']       = $isUser['email'];

            $groupes = $this->doorGets->loadGroupes();
            if (array_key_exists($isUser['network'],$groupes)) {
                $info['network_name'] = $groupes[$isUser['network']]; 
                $info['network_id'] = $isUser['network'];    
            }
            
            $info['date_creation'] = GetDate::in($isUser['date_creation'],2,$this->doorGets->myLanguage);
            
            $isUserNotification = $this->doorGets->dbQ("SELECT count(*) as counter FROM _users_notification WHERE id_user = ".$id);
            $info['count_notification'] = (int)$isUserNotification[0]['counter'];
            
            $isUserLastConnexion = $this->doorGets->dbQ("SELECT date  FROM _users_notification WHERE id_user = ".$id." ORDER BY date DESC LIMIT 1");
            if (!empty($isUserLastConnexion)) {
                
                $info['last_connexion'] = GetDate::in($isUserLastConnexion[0]['date'],2,$this->doorGets->myLanguage);
            }
            
            $isUserTrack = $this->doorGets->dbQ("SELECT count(*) as counter FROM _users_track WHERE id_user = ".$id);
            $info['count_track'] = (int)$isUserTrack[0]['counter'];
            

            $LogineExistInfoGroupe = $this->doorGets->dbQS($isUser['network'],'_users_groupes');
            if (!empty($LogineExistInfoGroupe)) {
                
                $out['liste_module'] =  $this->doorGets->_toArray($LogineExistInfoGroupe['liste_module']);
                if (!empty($out['liste_module'])) {
                    
                    // init
                    $outListeTypeModule = array();
                    $realCount = 0;
                    
                    foreach($out['liste_module'] as $idModule) {
                        $countContents = 0;
                        $isModule = $this->doorGets->dbQS($idModule,'_modules');
                        if (!empty($isModule)) {
                            if (in_array($isModule['type'],Constant::$contributions)) {
                                
                                $outListeTypeModule[$isModule['uri']]['type'] = $isModule['type'];
                                $nameModule = $this->doorGets->getRealUri($isModule['uri']);
                                $isCounterContents = $this->doorGets->dbQ("SELECT count(*) as counter FROM _m_".$nameModule." WHERE id_user = ".$id." ");
                                $countContents = (int)$isCounterContents[0]['counter'];
                                $realCount = $realCount + $countContents;

                                $outListeTypeModule[$isModule['uri']]['count'] = $countContents;
                            }
                        }
                    }
                    $info['total_contribution']       = $realCount;
                    $out             = $outListeTypeModule;
                    
                }
            }
            $this->info = $info;
        }
        
        return $out;
    }

}