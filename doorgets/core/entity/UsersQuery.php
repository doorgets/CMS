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

class UsersQuery extends AbstractQuery 
{

	protected $_table = '_users';
    
    protected $_className = 'Users';

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
		
	public function findByLogin($Login) {
		$this->_findBy['Login'] =  $Login;
		$this->_load();
		return $this;
	} 
		
	public function findByPassword($Password) {
		$this->_findBy['Password'] =  $Password;
		$this->_load();
		return $this;
	} 
		
	public function findByToken($Token) {
		$this->_findBy['Token'] =  $Token;
		$this->_load();
		return $this;
	} 
		
	public function findBySalt($Salt) {
		$this->_findBy['Salt'] =  $Salt;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLogin($Login) {
		$this->_findOneBy['Login'] =  $Login;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPassword($Password) {
		$this->_findOneBy['Password'] =  $Password;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByToken($Token) {
		$this->_findOneBy['Token'] =  $Token;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySalt($Salt) {
		$this->_findOneBy['Salt'] =  $Salt;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLogin($Login) {
		$this->_findByLike['Login'] =  $Login;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePassword($Password) {
		$this->_findByLike['Password'] =  $Password;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeToken($Token) {
		$this->_findByLike['Token'] =  $Token;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSalt($Salt) {
		$this->_findByLike['Salt'] =  $Salt;
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
		
	public function filterByLogin($Login, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Login',$Login,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPassword($Password, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Password',$Password,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByToken($Token, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Token',$Token,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySalt($Salt, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Salt',$Salt,$_condition);

		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLogin($Login) {
		$this->_filterLikeBy['Login'] =  $Login;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPassword($Password) {
		$this->_filterLikeBy['Password'] =  $Password;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByToken($Token) {
		$this->_filterLikeBy['Token'] =  $Token;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySalt($Salt) {
		$this->_filterLikeBy['Salt'] =  $Salt;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByLogin($direction = 'ASC') {
		$this->loadDirection('login',$direction);
		return $this;
	} 
		
	public function orderByPassword($direction = 'ASC') {
		$this->loadDirection('password',$direction);
		return $this;
	} 
		
	public function orderByToken($direction = 'ASC') {
		$this->loadDirection('token',$direction);
		return $this;
	} 
		
	public function orderBySalt($direction = 'ASC') {
		$this->loadDirection('salt',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Login' =>  'login',            
		    'Password' =>  'password',            
		    'Token' =>  'token',            
		    'Salt' =>  'salt',		
		));
	} 


}