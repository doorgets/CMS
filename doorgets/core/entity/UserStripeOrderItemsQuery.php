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

class UserStripeOrderItemsQuery extends AbstractQuery 
{

	protected $_table = '_user_stripe_order_items';
    
    protected $_className = 'UserStripeOrderItems';

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
		
	public function findByIdOrder($IdOrder) {
		$this->_findBy['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdOrder($from,$to) {
		$this->_findRangeBy['IdOrder'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdOrder($int) {
		$this->_findGreaterThanBy['IdOrder'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdOrder($int) {
		$this->_findLessThanBy['IdOrder'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTypeOrder($TypeOrder) {
		$this->_findBy['TypeOrder'] =  $TypeOrder;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByTypeOrder($from,$to) {
		$this->_findRangeBy['TypeOrder'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByTypeOrder($int) {
		$this->_findGreaterThanBy['TypeOrder'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByTypeOrder($int) {
		$this->_findLessThanBy['TypeOrder'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUriModule($UriModule) {
		$this->_findBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByIdContent($IdContent) {
		$this->_findBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdContent($from,$to) {
		$this->_findRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdContent($int) {
		$this->_findGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdContent($int) {
		$this->_findLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByRealAmount($RealAmount) {
		$this->_findBy['RealAmount'] =  $RealAmount;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByRealAmount($from,$to) {
		$this->_findRangeBy['RealAmount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByRealAmount($int) {
		$this->_findGreaterThanBy['RealAmount'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByRealAmount($int) {
		$this->_findLessThanBy['RealAmount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title) {
		$this->_findBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByTitle($from,$to) {
		$this->_findRangeBy['Title'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByTitle($int) {
		$this->_findGreaterThanBy['Title'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByTitle($int) {
		$this->_findLessThanBy['Title'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTotalAmount($TotalAmount) {
		$this->_findBy['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByTotalAmount($from,$to) {
		$this->_findRangeBy['TotalAmount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByTotalAmount($int) {
		$this->_findGreaterThanBy['TotalAmount'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByTotalAmount($int) {
		$this->_findLessThanBy['TotalAmount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByQuantity($Quantity) {
		$this->_findBy['Quantity'] =  $Quantity;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByQuantity($from,$to) {
		$this->_findRangeBy['Quantity'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByQuantity($int) {
		$this->_findGreaterThanBy['Quantity'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByQuantity($int) {
		$this->_findLessThanBy['Quantity'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDiscount($Discount) {
		$this->_findBy['Discount'] =  $Discount;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDiscount($from,$to) {
		$this->_findRangeBy['Discount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDiscount($int) {
		$this->_findGreaterThanBy['Discount'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDiscount($int) {
		$this->_findLessThanBy['Discount'] = $int;
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
		
	public function findOneByIdOrder($IdOrder) {
		$this->_findOneBy['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTypeOrder($TypeOrder) {
		$this->_findOneBy['TypeOrder'] =  $TypeOrder;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriModule($UriModule) {
		$this->_findOneBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdContent($IdContent) {
		$this->_findOneBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRealAmount($RealAmount) {
		$this->_findOneBy['RealAmount'] =  $RealAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title) {
		$this->_findOneBy['Title'] =  $Title;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTotalAmount($TotalAmount) {
		$this->_findOneBy['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByQuantity($Quantity) {
		$this->_findOneBy['Quantity'] =  $Quantity;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDiscount($Discount) {
		$this->_findOneBy['Discount'] =  $Discount;
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
		
	public function findByLikeIdOrder($IdOrder) {
		$this->_findByLike['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTypeOrder($TypeOrder) {
		$this->_findByLike['TypeOrder'] =  $TypeOrder;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriModule($UriModule) {
		$this->_findByLike['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdContent($IdContent) {
		$this->_findByLike['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRealAmount($RealAmount) {
		$this->_findByLike['RealAmount'] =  $RealAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title) {
		$this->_findByLike['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTotalAmount($TotalAmount) {
		$this->_findByLike['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeQuantity($Quantity) {
		$this->_findByLike['Quantity'] =  $Quantity;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDiscount($Discount) {
		$this->_findByLike['Discount'] =  $Discount;
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
		
	public function filterByIdOrder($IdOrder, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdOrder',$IdOrder,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdOrder($from,$to) {
		$this->_filterRangeBy['IdOrder'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdOrder($int) {
		$this->_filterGreaterThanBy['IdOrder'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdOrder($int) {
		$this->_filterLessThanBy['IdOrder'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTypeOrder($TypeOrder, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TypeOrder',$TypeOrder,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByTypeOrder($from,$to) {
		$this->_filterRangeBy['TypeOrder'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByTypeOrder($int) {
		$this->_filterGreaterThanBy['TypeOrder'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByTypeOrder($int) {
		$this->_filterLessThanBy['TypeOrder'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUriModule($UriModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriModule',$UriModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdContent($IdContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdContent',$IdContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdContent($from,$to) {
		$this->_filterRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdContent($int) {
		$this->_filterGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdContent($int) {
		$this->_filterLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByRealAmount($RealAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('RealAmount',$RealAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByRealAmount($from,$to) {
		$this->_filterRangeBy['RealAmount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByRealAmount($int) {
		$this->_filterGreaterThanBy['RealAmount'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByRealAmount($int) {
		$this->_filterLessThanBy['RealAmount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByTitle($from,$to) {
		$this->_filterRangeBy['Title'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByTitle($int) {
		$this->_filterGreaterThanBy['Title'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByTitle($int) {
		$this->_filterLessThanBy['Title'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTotalAmount($TotalAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TotalAmount',$TotalAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByTotalAmount($from,$to) {
		$this->_filterRangeBy['TotalAmount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByTotalAmount($int) {
		$this->_filterGreaterThanBy['TotalAmount'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByTotalAmount($int) {
		$this->_filterLessThanBy['TotalAmount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByQuantity($Quantity, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Quantity',$Quantity,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByQuantity($from,$to) {
		$this->_filterRangeBy['Quantity'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByQuantity($int) {
		$this->_filterGreaterThanBy['Quantity'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByQuantity($int) {
		$this->_filterLessThanBy['Quantity'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDiscount($Discount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Discount',$Discount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDiscount($from,$to) {
		$this->_filterRangeBy['Discount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDiscount($int) {
		$this->_filterGreaterThanBy['Discount'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDiscount($int) {
		$this->_filterLessThanBy['Discount'] = $int;
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
		
	public function filterLikeByIdOrder($IdOrder) {
		$this->_filterLikeBy['IdOrder'] =  $IdOrder;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTypeOrder($TypeOrder) {
		$this->_filterLikeBy['TypeOrder'] =  $TypeOrder;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriModule($UriModule) {
		$this->_filterLikeBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdContent($IdContent) {
		$this->_filterLikeBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRealAmount($RealAmount) {
		$this->_filterLikeBy['RealAmount'] =  $RealAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title) {
		$this->_filterLikeBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTotalAmount($TotalAmount) {
		$this->_filterLikeBy['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByQuantity($Quantity) {
		$this->_filterLikeBy['Quantity'] =  $Quantity;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDiscount($Discount) {
		$this->_filterLikeBy['Discount'] =  $Discount;
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
		
	public function orderByIdOrder($direction = 'ASC') {
		$this->loadDirection('id_order',$direction);
		return $this;
	} 
		
	public function orderByTypeOrder($direction = 'ASC') {
		$this->loadDirection('type_order',$direction);
		return $this;
	} 
		
	public function orderByUriModule($direction = 'ASC') {
		$this->loadDirection('uri_module',$direction);
		return $this;
	} 
		
	public function orderByIdContent($direction = 'ASC') {
		$this->loadDirection('id_content',$direction);
		return $this;
	} 
		
	public function orderByRealAmount($direction = 'ASC') {
		$this->loadDirection('real_amount',$direction);
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC') {
		$this->loadDirection('title',$direction);
		return $this;
	} 
		
	public function orderByTotalAmount($direction = 'ASC') {
		$this->loadDirection('total_amount',$direction);
		return $this;
	} 
		
	public function orderByQuantity($direction = 'ASC') {
		$this->loadDirection('quantity',$direction);
		return $this;
	} 
		
	public function orderByDiscount($direction = 'ASC') {
		$this->loadDirection('discount',$direction);
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
		    'IdOrder' =>  'id_order',            
		    'TypeOrder' =>  'type_order',            
		    'UriModule' =>  'uri_module',            
		    'IdContent' =>  'id_content',            
		    'RealAmount' =>  'real_amount',            
		    'Title' =>  'title',            
		    'TotalAmount' =>  'total_amount',            
		    'Quantity' =>  'quantity',            
		    'Discount' =>  'discount',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}