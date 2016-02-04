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

class UserStripeChargeQuery extends AbstractQuery 
{

	protected $_table = '_user_stripe_charge';
    
    protected $_className = 'UserStripeCharge';

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
		
	public function findByIdStripe($IdStripe) {
		$this->_findBy['IdStripe'] =  $IdStripe;
		$this->_load();
		return $this;
	} 
		
	public function findByIdCharge($IdCharge) {
		$this->_findBy['IdCharge'] =  $IdCharge;
		$this->_load();
		return $this;
	} 
		
	public function findByIdOrder($IdOrder) {
		$this->_findBy['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this;
	} 
		
	public function findByStatus($Status) {
		$this->_findBy['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function findByAmount($Amount) {
		$this->_findBy['Amount'] =  $Amount;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByAmount($from,$to) {
		$this->_findRangeBy['Amount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByAmount($int) {
		$this->_findGreaterThanBy['Amount'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByAmount($int) {
		$this->_findLessThanBy['Amount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrency($Currency) {
		$this->_findBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByData($Data) {
		$this->_findBy['Data'] =  $Data;
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
		
	public function findByDateModification($DateModification) {
		$this->_findBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateModification($from,$to) {
		$this->_findRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateModification($int) {
		$this->_findGreaterThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateModification($int) {
		$this->_findLessThanBy['DateModification'] = $int;
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
		
	public function findOneByIdStripe($IdStripe) {
		$this->_findOneBy['IdStripe'] =  $IdStripe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdCharge($IdCharge) {
		$this->_findOneBy['IdCharge'] =  $IdCharge;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdOrder($IdOrder) {
		$this->_findOneBy['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatus($Status) {
		$this->_findOneBy['Status'] =  $Status;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmount($Amount) {
		$this->_findOneBy['Amount'] =  $Amount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrency($Currency) {
		$this->_findOneBy['Currency'] =  $Currency;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByData($Data) {
		$this->_findOneBy['Data'] =  $Data;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModification($DateModification) {
		$this->_findOneBy['DateModification'] =  $DateModification;
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
		
	public function findByLikeIdStripe($IdStripe) {
		$this->_findByLike['IdStripe'] =  $IdStripe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdCharge($IdCharge) {
		$this->_findByLike['IdCharge'] =  $IdCharge;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdOrder($IdOrder) {
		$this->_findByLike['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatus($Status) {
		$this->_findByLike['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmount($Amount) {
		$this->_findByLike['Amount'] =  $Amount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrency($Currency) {
		$this->_findByLike['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeData($Data) {
		$this->_findByLike['Data'] =  $Data;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModification($DateModification) {
		$this->_findByLike['DateModification'] =  $DateModification;
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
		
	public function filterByIdStripe($IdStripe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdStripe',$IdStripe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdCharge($IdCharge, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdCharge',$IdCharge,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdOrder($IdOrder, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdOrder',$IdOrder,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStatus($Status, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Status',$Status,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmount($Amount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Amount',$Amount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByAmount($from,$to) {
		$this->_filterRangeBy['Amount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByAmount($int) {
		$this->_filterGreaterThanBy['Amount'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByAmount($int) {
		$this->_filterLessThanBy['Amount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCurrency($Currency, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Currency',$Currency,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByData($Data, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Data',$Data,$_condition);

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
		
	public function filterByDateModification($DateModification, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateModification',$DateModification,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateModification($from,$to) {
		$this->_filterRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateModification($int) {
		$this->_filterGreaterThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateModification($int) {
		$this->_filterLessThanBy['DateModification'] = $int;
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
		
	public function filterLikeByIdStripe($IdStripe) {
		$this->_filterLikeBy['IdStripe'] =  $IdStripe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdCharge($IdCharge) {
		$this->_filterLikeBy['IdCharge'] =  $IdCharge;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdOrder($IdOrder) {
		$this->_filterLikeBy['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatus($Status) {
		$this->_filterLikeBy['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmount($Amount) {
		$this->_filterLikeBy['Amount'] =  $Amount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrency($Currency) {
		$this->_filterLikeBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByData($Data) {
		$this->_filterLikeBy['Data'] =  $Data;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModification($DateModification) {
		$this->_filterLikeBy['DateModification'] =  $DateModification;
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
		
	public function orderByIdStripe($direction = 'ASC') {
		$this->loadDirection('id_stripe',$direction);
		return $this;
	} 
		
	public function orderByIdCharge($direction = 'ASC') {
		$this->loadDirection('id_charge',$direction);
		return $this;
	} 
		
	public function orderByIdOrder($direction = 'ASC') {
		$this->loadDirection('id_order',$direction);
		return $this;
	} 
		
	public function orderByStatus($direction = 'ASC') {
		$this->loadDirection('status',$direction);
		return $this;
	} 
		
	public function orderByAmount($direction = 'ASC') {
		$this->loadDirection('amount',$direction);
		return $this;
	} 
		
	public function orderByCurrency($direction = 'ASC') {
		$this->loadDirection('currency',$direction);
		return $this;
	} 
		
	public function orderByData($direction = 'ASC') {
		$this->loadDirection('data',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByDateModification($direction = 'ASC') {
		$this->loadDirection('date_modification',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdStripe' =>  'id_stripe',            
		    'IdCharge' =>  'id_charge',            
		    'IdOrder' =>  'id_order',            
		    'Status' =>  'status',            
		    'Amount' =>  'amount',            
		    'Currency' =>  'currency',            
		    'Data' =>  'data',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}