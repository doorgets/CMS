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

class SupportMessagesQuery extends AbstractQuery 
{

	protected $_table = '_support_messages';
    
    protected $_className = 'SupportMessages';

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
		
	public function findByIdSupport($IdSupport) {
		$this->_findBy['IdSupport'] =  $IdSupport;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdSupport($from,$to) {
		$this->_findRangeBy['IdSupport'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdSupport($int) {
		$this->_findGreaterThanBy['IdSupport'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdSupport($int) {
		$this->_findLessThanBy['IdSupport'] = $int;
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
		
	public function findByIdSupportUser($IdSupportUser) {
		$this->_findBy['IdSupportUser'] =  $IdSupportUser;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdSupportUser($from,$to) {
		$this->_findRangeBy['IdSupportUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdSupportUser($int) {
		$this->_findGreaterThanBy['IdSupportUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdSupportUser($int) {
		$this->_findLessThanBy['IdSupportUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdSupportGroupe($IdSupportGroupe) {
		$this->_findBy['IdSupportGroupe'] =  $IdSupportGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdSupportGroupe($from,$to) {
		$this->_findRangeBy['IdSupportGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdSupportGroupe($int) {
		$this->_findGreaterThanBy['IdSupportGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdSupportGroupe($int) {
		$this->_findLessThanBy['IdSupportGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIsSupportAgent($IsSupportAgent) {
		$this->_findBy['IsSupportAgent'] =  $IsSupportAgent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIsSupportAgent($from,$to) {
		$this->_findRangeBy['IsSupportAgent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIsSupportAgent($int) {
		$this->_findGreaterThanBy['IsSupportAgent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIsSupportAgent($int) {
		$this->_findLessThanBy['IsSupportAgent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMessage($Message) {
		$this->_findBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByDateCreation($DateCreation) {
		$this->_findBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateCreation($from,$to) {
		$this->_findRangeBy['DateCreation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateCreation($int) {
		$this->_findGreaterThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateCreation($int) {
		$this->_findLessThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdSupport($IdSupport) {
		$this->_findOneBy['IdSupport'] =  $IdSupport;
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
		
	public function findOneByIdSupportUser($IdSupportUser) {
		$this->_findOneBy['IdSupportUser'] =  $IdSupportUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdSupportGroupe($IdSupportGroupe) {
		$this->_findOneBy['IdSupportGroupe'] =  $IdSupportGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIsSupportAgent($IsSupportAgent) {
		$this->_findOneBy['IsSupportAgent'] =  $IsSupportAgent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessage($Message) {
		$this->_findOneBy['Message'] =  $Message;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdSupport($IdSupport) {
		$this->_findByLike['IdSupport'] =  $IdSupport;
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
		
	public function findByLikeIdSupportUser($IdSupportUser) {
		$this->_findByLike['IdSupportUser'] =  $IdSupportUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdSupportGroupe($IdSupportGroupe) {
		$this->_findByLike['IdSupportGroupe'] =  $IdSupportGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIsSupportAgent($IsSupportAgent) {
		$this->_findByLike['IsSupportAgent'] =  $IsSupportAgent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessage($Message) {
		$this->_findByLike['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
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
		
	public function filterByIdSupport($IdSupport, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdSupport',$IdSupport,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdSupport($from,$to) {
		$this->_filterRangeBy['IdSupport'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdSupport($int) {
		$this->_filterGreaterThanBy['IdSupport'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdSupport($int) {
		$this->_filterLessThanBy['IdSupport'] = $int;
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
		
	public function filterByIdSupportUser($IdSupportUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdSupportUser',$IdSupportUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdSupportUser($from,$to) {
		$this->_filterRangeBy['IdSupportUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdSupportUser($int) {
		$this->_filterGreaterThanBy['IdSupportUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdSupportUser($int) {
		$this->_filterLessThanBy['IdSupportUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdSupportGroupe($IdSupportGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdSupportGroupe',$IdSupportGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdSupportGroupe($from,$to) {
		$this->_filterRangeBy['IdSupportGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdSupportGroupe($int) {
		$this->_filterGreaterThanBy['IdSupportGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdSupportGroupe($int) {
		$this->_filterLessThanBy['IdSupportGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIsSupportAgent($IsSupportAgent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IsSupportAgent',$IsSupportAgent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIsSupportAgent($from,$to) {
		$this->_filterRangeBy['IsSupportAgent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIsSupportAgent($int) {
		$this->_filterGreaterThanBy['IsSupportAgent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIsSupportAgent($int) {
		$this->_filterLessThanBy['IsSupportAgent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMessage($Message, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Message',$Message,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateCreation($DateCreation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateCreation',$DateCreation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateCreation($from,$to) {
		$this->_filterRangeBy['DateCreation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateCreation($int) {
		$this->_filterGreaterThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateCreation($int) {
		$this->_filterLessThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdSupport($IdSupport) {
		$this->_filterLikeBy['IdSupport'] =  $IdSupport;
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
		
	public function filterLikeByIdSupportUser($IdSupportUser) {
		$this->_filterLikeBy['IdSupportUser'] =  $IdSupportUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdSupportGroupe($IdSupportGroupe) {
		$this->_filterLikeBy['IdSupportGroupe'] =  $IdSupportGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIsSupportAgent($IsSupportAgent) {
		$this->_filterLikeBy['IsSupportAgent'] =  $IsSupportAgent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessage($Message) {
		$this->_filterLikeBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByIdSupport($direction = 'ASC') {
		$this->loadDirection('id_support',$direction);
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
		
	public function orderByIdSupportUser($direction = 'ASC') {
		$this->loadDirection('id_support_user',$direction);
		return $this;
	} 
		
	public function orderByIdSupportGroupe($direction = 'ASC') {
		$this->loadDirection('id_support_groupe',$direction);
		return $this;
	} 
		
	public function orderByIsSupportAgent($direction = 'ASC') {
		$this->loadDirection('is_support_agent',$direction);
		return $this;
	} 
		
	public function orderByMessage($direction = 'ASC') {
		$this->loadDirection('message',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdSupport' =>  'id_support',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'IdSupportUser' =>  'id_support_user',            
		    'IdSupportGroupe' =>  'id_support_groupe',            
		    'IsSupportAgent' =>  'is_support_agent',            
		    'Message' =>  'message',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


}