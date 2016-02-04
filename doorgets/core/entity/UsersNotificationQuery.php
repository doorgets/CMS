<?php 

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

class UsersNotificationQuery extends AbstractQuery 
{

	protected $_table = '_users_notification';
    
    protected $_className = 'UsersNotification';

    public function __construct(&$doorGets = null) {
        parent::__construct($doorGets);
    }

	protected $_pk = 'id';

	public function _getPk() {
		return $this->_pk;
	} 

	public function findByPK($Id) {
		$this->_findBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findById($Id) {
		$this->_findBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findRangeById($from,$to) {
		$this->_findRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanById($int) {
		$this->_findGreaterThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanById($int) {
		$this->_findLessThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdUser($IdUser) {
		$this->_findBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdUser($from,$to) {
		$this->_findRangeBy['IdUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdUser($int) {
		$this->_findGreaterThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdUser($int) {
		$this->_findLessThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdGroupe($IdGroupe) {
		$this->_findBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdGroupe($from,$to) {
		$this->_findRangeBy['IdGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdGroupe($int) {
		$this->_findGreaterThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdGroupe($int) {
		$this->_findLessThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdSession($IdSession) {
		$this->_findBy['IdSession'] =  $IdSession;
		$this->_load();
		return $this;
	} 
		
	public function findByIpSession($IpSession) {
		$this->_findBy['IpSession'] =  $IpSession;
		$this->_load();
		return $this;
	} 
		
	public function findByUrlPage($UrlPage) {
		$this->_findBy['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this;
	} 
		
	public function findByUrlReferer($UrlReferer) {
		$this->_findBy['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this;
	} 
		
	public function findByDate($Date) {
		$this->_findBy['Date'] =  $Date;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDate($from,$to) {
		$this->_findRangeBy['Date'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDate($int) {
		$this->_findGreaterThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDate($int) {
		$this->_findLessThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdUser($IdUser) {
		$this->_findOneBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdGroupe($IdGroupe) {
		$this->_findOneBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdSession($IdSession) {
		$this->_findOneBy['IdSession'] =  $IdSession;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIpSession($IpSession) {
		$this->_findOneBy['IpSession'] =  $IpSession;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUrlPage($UrlPage) {
		$this->_findOneBy['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUrlReferer($UrlReferer) {
		$this->_findOneBy['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDate($Date) {
		$this->_findOneBy['Date'] =  $Date;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdUser($IdUser) {
		$this->_findByLike['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdGroupe($IdGroupe) {
		$this->_findByLike['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdSession($IdSession) {
		$this->_findByLike['IdSession'] =  $IdSession;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIpSession($IpSession) {
		$this->_findByLike['IpSession'] =  $IpSession;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUrlPage($UrlPage) {
		$this->_findByLike['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUrlReferer($UrlReferer) {
		$this->_findByLike['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDate($Date) {
		$this->_findByLike['Date'] =  $Date;
		$this->_load();
		return $this;
	} 

		
	public function filterById($Id, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Id',$Id,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeById($from,$to) {
		$this->_filterRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanById($int) {
		$this->_filterGreaterThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanById($int) {
		$this->_filterLessThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdUser($IdUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdUser',$IdUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdUser($from,$to) {
		$this->_filterRangeBy['IdUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdUser($int) {
		$this->_filterGreaterThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdUser($int) {
		$this->_filterLessThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdGroupe($IdGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdGroupe',$IdGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdGroupe($from,$to) {
		$this->_filterRangeBy['IdGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdGroupe($int) {
		$this->_filterGreaterThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdGroupe($int) {
		$this->_filterLessThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdSession($IdSession, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdSession',$IdSession,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIpSession($IpSession, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IpSession',$IpSession,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUrlPage($UrlPage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UrlPage',$UrlPage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUrlReferer($UrlReferer, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UrlReferer',$UrlReferer,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDate($Date, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Date',$Date,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDate($from,$to) {
		$this->_filterRangeBy['Date'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDate($int) {
		$this->_filterGreaterThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDate($int) {
		$this->_filterLessThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdUser($IdUser) {
		$this->_filterLikeBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdGroupe($IdGroupe) {
		$this->_filterLikeBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdSession($IdSession) {
		$this->_filterLikeBy['IdSession'] =  $IdSession;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIpSession($IpSession) {
		$this->_filterLikeBy['IpSession'] =  $IpSession;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUrlPage($UrlPage) {
		$this->_filterLikeBy['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUrlReferer($UrlReferer) {
		$this->_filterLikeBy['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDate($Date) {
		$this->_filterLikeBy['Date'] =  $Date;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByIdUser($direction = 'ASC') {
		$this->loadDirection('id_user',$direction);
		return $this;
	} 
		
	public function orderByIdGroupe($direction = 'ASC') {
		$this->loadDirection('id_groupe',$direction);
		return $this;
	} 
		
	public function orderByIdSession($direction = 'ASC') {
		$this->loadDirection('id_session',$direction);
		return $this;
	} 
		
	public function orderByIpSession($direction = 'ASC') {
		$this->loadDirection('ip_session',$direction);
		return $this;
	} 
		
	public function orderByUrlPage($direction = 'ASC') {
		$this->loadDirection('url_page',$direction);
		return $this;
	} 
		
	public function orderByUrlReferer($direction = 'ASC') {
		$this->loadDirection('url_referer',$direction);
		return $this;
	} 
		
	public function orderByDate($direction = 'ASC') {
		$this->loadDirection('date',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'IdSession' =>  'id_session',            
		    'IpSession' =>  'ip_session',            
		    'UrlPage' =>  'url_page',            
		    'UrlReferer' =>  'url_referer',            
		    'Date' =>  'date',		
		));
	} 


}