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

class StatsService {

    public 
        $doorGets,
        $data
    ;

    public function __construct(&$doorGets) {

        $this->doorGets = $doorGets;
        $time = time();
        $range = array(
            //'day', // Very slow
            'month',
            //'year'
        );
        
        $limitMax = $time - 86400;
        $isUser = $doorGets->dbQA('_users_info',' ORDER BY date_creation ASC LIMIT 1');

        if (!empty($isUser)) {
            $limitMax = (int) $isUser[0]['date_creation'];
        }
        
        //$limitMax = $time - (86400 * 30);

        $timeleft = $time - $limitMax;
        $hourLeft = ceil($timeleft / 3600);
        $dayLeft = ceil($timeleft / 86400);
        $monthLeft = ceil($timeleft / (86400 * 30));
        $yearLeft = ceil($timeleft / (86400 * 364));
        $final = 31;
        
        foreach ($range as $unit) {

            switch ($unit) {
                // case 'day':
                //     $final = $dayLeft;
                //     $timeAdd = 86400;
                //     break;
                case 'month':
                    $final = $monthLeft;
                    $timeAdd = 86400 * 31;
                    break;
                // case 'year':
                //     $final = $yearLeft;
                //     $timeAdd = 86400 * 364;
                //     break;
            }

            for($i=0;$i<=$final;$i++) {

                $timeStart = $time - ($i * $timeAdd);
                $date = getDate($timeStart);
                $dateFormat = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                
                $timeEnd = $time - (($i+1) * $timeAdd);
                $dateEnd = getDate($timeEnd);
                $dateEndFormat = $dateEnd['year'].'-'.$dateEnd['mon'].'-'.$dateEnd['mday'];

                $start = strtotime($dateFormat.' 23:59:59');
                $end = strtotime($dateEndFormat.' 23:59:59');

                if ($unit === 'day') {
                    $dateFormat = GetDate::in($start,2,$this->doorGets->myLanguage);
                } elseif ($unit === 'year') {
                    $dateFormat = ' '.$date['year'];
                } else {
                    $dateFormat = $date['mon'].'-'.$date['year'];
                }

                $this->data['accounts'][$unit]["$dateFormat"] = $this->getAccounts($start,$end);
                //$this->data['orders'][$unit]["$dateFormat"] = $this->getOrders($start,$end);
                $this->data['comments'][$unit]["$dateFormat"] = $this->getComments($start,$end);
                //$this->data['carts'][$unit]["$dateFormat"] = $this->getCarts($start,$end);
                $this->data['contributions'][$unit]["$dateFormat"] = $this->getContributions($start,$end);
                $this->data['tickets'][$unit]["$dateFormat"] = $this->getTickets($start,$end);
                $this->data['cloud'][$unit]["$dateFormat"] = $this->getCloud($start,$end);

            }
            
            $this->data['accounts'][$unit] = array_reverse($this->data['accounts'][$unit]);
            
        }
    }

    public function getAccounts($start,$end) {
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }
        $result = $this->doorGets->dbQ("
            select 
                count(id) as counter 
            from 
                _users_info 
            where 
                date_creation <= $start AND date_creation >= $end 
            ORDER BY 
                date_creation ASC
        ");

        return $result[0]['counter'];
    }

    public function getTickets($start,$end) {
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }
        $result = $this->doorGets->dbQ("
            select 
                count(id) as counter 
            from 
                _support 
            where 
                date_creation <= $start AND date_creation >= $end 
            ORDER BY 
                date_creation ASC
        ");

        return $result[0]['counter'];
    }

    public function getOrders($start,$end) {
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }
        $result = $this->doorGets->dbQ("
            select 
                count(id) as counter 
            from 
                _order 
            where 
                date_creation <= $start AND date_creation >= $end 
            ORDER BY 
                date_creation ASC
        ");

        return $result[0]['counter'];
    }

    public function getComments($start,$end) {
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }

        $result = $this->doorGets->dbQ("
            select 
                count(id) as counter 
            from 
                _dg_comments 
            where 
                date_creation <= $start AND date_creation >= $end 
            ORDER BY 
                date_creation ASC
        ");

        return $result[0]['counter'];
    }

    public function getCarts($start,$end) {
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }
        $result = $this->doorGets->dbQ("
            select 
                count(id) as counter 
            from 
                _cart 
            where 
                date_creation <= $start AND date_creation >= $end 
            ORDER BY 
                date_creation ASC
        ");

        return $result[0]['counter'];
    }

    public function getContributions($start,$end) {

        $modules = $this->doorGets->loadModules(true,true);

        $modulesBlocks      = $this->doorGets->loadModulesBlocks(true);
        $modulesCarousel    = $this->doorGets->loadModulesCarousel(true);
        $modulesGenforms    = $this->doorGets->loadModulesGenforms(true);

        $singleTable = Constant::$singleTable;

        $out = 0;
        foreach ($modules as $key => $value) {
            if (in_array($value['type'],$singleTable)) {

                $table = $this->doorGets->getRealUri($value['uri']);
                $table = '_m_'.$table;
                $result = $this->doorGets->dbQ("
                    select 
                        count(id) as counter 
                    from 
                        $table 
                    where 
                        date_creation <= $start AND date_creation >= $end 
                    ORDER BY 
                        date_creation ASC
                ");
                $out    += $result[0]['counter'];
            }
        }
        return $out;
    }

    public function getCloud($start,$end) {

        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }
        
        $result = $this->doorGets->dbQ("
            select 
                count(id) as counter 
            from 
                _dg_saas 
            where 
                date_creation <= $start AND date_creation >= $end 
            ORDER BY 
                date_creation ASC
        ");

        return $result[0]['counter'];
    }
}