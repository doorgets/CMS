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

class OrderService {

    public 
        $doorGets,
        $total = array(),
        $today = array(),
        $yesterday = array(),
        $week = array(),
        $month = array()
    ;

    public function __construct(&$doorGets) {
        $this->doorGets = $doorGets;
        
        $this->total['paid'] = $this->getTotalAmountPaid();
        $this->total['cancel'] = $this->getTotalAmountCancel();
        $this->total['waiting'] = $this->getTotalAmountWaiting();
        $this->total['profit'] = $this->getTotalAmountProfit();

        $time = time();
        $dateToday = getDate($time);
        $dateTodayFormat = $dateToday['year'].'-'.$dateToday['mon'].'-'.$dateToday['mday'];

        $startToday = strtotime($dateTodayFormat.' 00:00:01');
        $endToday = strtotime($dateTodayFormat.' 23:59:59');

        $this->today['paid'] = $this->getAmountPaidByDate($startToday,$endToday);
        $this->today['cancel'] = $this->getAmountCancelByDate($startToday,$endToday);
        $this->today['waiting'] = $this->getAmountWaitingByDate($startToday,$endToday);
        $this->today['profit'] = $this->getAmountProfitByDate($startToday,$endToday);

        $timeYesterday = $startToday - 10;
        $dateYesterday = getDate($timeYesterday);
        $dateYesterdayFormat = $dateYesterday['year'].'-'.$dateYesterday['mon'].'-'.$dateYesterday['mday'];

        $startYesterday = strtotime($dateYesterdayFormat.' 00:00:01');
        $endYesterday = strtotime($dateYesterdayFormat.' 23:59:59');
        
        $this->yesterday['paid'] = $this->getAmountPaidByDate($startYesterday,$endYesterday);
        $this->yesterday['cancel'] = $this->getAmountCancelByDate($startYesterday,$endYesterday);
        $this->yesterday['waiting'] = $this->getAmountWaitingByDate($startYesterday,$endYesterday);
        $this->yesterday['profit'] = $this->getAmountProfitByDate($startYesterday,$endYesterday);

        $timeWeek = $startToday - 604800;
        $dateWeek = getDate($timeWeek);
        $dateWeekFormat = $dateWeek['year'].'-'.$dateWeek['mon'].'-'.$dateWeek['mday'];

        $startWeek = strtotime($dateWeekFormat.' 00:00:01');
        $endWeek = $endToday;
        
        $this->week['paid'] = $this->getAmountPaidByDate($startWeek,$endWeek);
        $this->week['cancel'] = $this->getAmountCancelByDate($startWeek,$endWeek);
        $this->week['waiting'] = $this->getAmountWaitingByDate($startWeek,$endWeek);
        $this->week['profit'] = $this->getAmountProfitByDate($startWeek,$endWeek);

        $timeMonth = $startToday - 2592000;
        $dateMonth = getDate($timeMonth);
        $dateMonthFormat = $dateMonth['year'].'-'.$dateMonth['mon'].'-'.$dateMonth['mday'];

        $startMonth = strtotime($dateMonthFormat.' 00:00:01');
        $endMonth = $endToday;

        $this->month['paid'] = $this->getAmountPaidByDate($startMonth,$endMonth);
        $this->month['cancel'] = $this->getAmountCancelByDate($startMonth,$endMonth);
        $this->month['waiting'] = $this->getAmountWaitingByDate($startMonth,$endMonth);
        $this->month['profit'] = $this->getAmountProfitByDate($startMonth,$endMonth);

    }

    public function getTotalAmountPaid(){
        $result = $this->doorGets->dbQ("select sum(amount_with_shipping) as total, count(id) as counter from _order where status = 'payment_success'");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    public function getTotalAmountCancel(){
        $result = $this->doorGets->dbQ("select sum(amount_with_shipping) as total, count(id) as counter from _order where status = 'payment_cancel'");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    public function getTotalAmountWaiting(){
        $result = $this->doorGets->dbQ("select sum(amount_with_shipping) as total, count(id) as counter  from _order where status != 'payment_success' and status != 'payment_cancel'");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    public function getTotalAmountProfit(){
        $result = $this->doorGets->dbQ("select sum(amount_profit) as total, count(id) as counter  from _order where status = 'payment_success'");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    /// 
    public function getAmountPaidByDate($start,$end){
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }

        $result = $this->doorGets->dbQ("select sum(amount_with_shipping) as total, count(id) as counter from _order where status = 'payment_success' AND date_creation >= $start AND date_creation <= $end ");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    public function getAmountCancelByDate($start,$end){
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }

        $result = $this->doorGets->dbQ("select sum(amount_with_shipping) as total, count(id) as counter from _order where status = 'payment_cancel' AND date_creation >= $start AND date_creation <= $end ");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    public function getAmountWaitingByDate($start,$end){
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }

        $result = $this->doorGets->dbQ("select sum(amount_with_shipping) as total, count(id) as counter  from _order where status != 'payment_success' and status != 'payment_cancel' AND date_creation >= $start AND date_creation <= $end ");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }

    public function getAmountProfitByDate($start,$end){
        
        if (!is_numeric($start) && !is_numeric($end)) {
            return (float)0;
        }

        $result = $this->doorGets->dbQ("select sum(amount_profit) as total, count(id) as counter  from _order where status = 'payment_success' AND date_creation >= $start AND date_creation <= $end ");
        $total['sum'] = $this->doorGets->setCurrencyIcon($result[0]['total']);
        $total['count'] = $result[0]['counter'];
        return $total;
    }



}