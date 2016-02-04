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

class DgCartQuery extends AbstractQuery 
{

	protected $_table = '_dg_cart';
    
    protected $_className = 'DgCart';

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
		
	public function findByProductType($ProductType) {
		$this->_findBy['ProductType'] =  $ProductType;
		$this->_load();
		return $this;
	} 
		
	public function findByProductId($ProductId) {
		$this->_findBy['ProductId'] =  $ProductId;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByProductId($from,$to) {
		$this->_findRangeBy['ProductId'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByProductId($int) {
		$this->_findGreaterThanBy['ProductId'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByProductId($int) {
		$this->_findLessThanBy['ProductId'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByProductUri($ProductUri) {
		$this->_findBy['ProductUri'] =  $ProductUri;
		$this->_load();
		return $this;
	} 
		
	public function findByProductQuantity($ProductQuantity) {
		$this->_findBy['ProductQuantity'] =  $ProductQuantity;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByProductQuantity($from,$to) {
		$this->_findRangeBy['ProductQuantity'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByProductQuantity($int) {
		$this->_findGreaterThanBy['ProductQuantity'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByProductQuantity($int) {
		$this->_findLessThanBy['ProductQuantity'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByProductPrice($ProductPrice) {
		$this->_findBy['ProductPrice'] =  $ProductPrice;
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
		
	public function findOneByIdGroupe($IdGroupe) {
		$this->_findOneBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProductType($ProductType) {
		$this->_findOneBy['ProductType'] =  $ProductType;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProductId($ProductId) {
		$this->_findOneBy['ProductId'] =  $ProductId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProductUri($ProductUri) {
		$this->_findOneBy['ProductUri'] =  $ProductUri;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProductQuantity($ProductQuantity) {
		$this->_findOneBy['ProductQuantity'] =  $ProductQuantity;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProductPrice($ProductPrice) {
		$this->_findOneBy['ProductPrice'] =  $ProductPrice;
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
		
	public function findByLikeIdGroupe($IdGroupe) {
		$this->_findByLike['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProductType($ProductType) {
		$this->_findByLike['ProductType'] =  $ProductType;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProductId($ProductId) {
		$this->_findByLike['ProductId'] =  $ProductId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProductUri($ProductUri) {
		$this->_findByLike['ProductUri'] =  $ProductUri;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProductQuantity($ProductQuantity) {
		$this->_findByLike['ProductQuantity'] =  $ProductQuantity;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProductPrice($ProductPrice) {
		$this->_findByLike['ProductPrice'] =  $ProductPrice;
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
		
	public function filterByProductType($ProductType, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ProductType',$ProductType,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByProductId($ProductId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ProductId',$ProductId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByProductId($from,$to) {
		$this->_filterRangeBy['ProductId'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByProductId($int) {
		$this->_filterGreaterThanBy['ProductId'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByProductId($int) {
		$this->_filterLessThanBy['ProductId'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByProductUri($ProductUri, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ProductUri',$ProductUri,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByProductQuantity($ProductQuantity, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ProductQuantity',$ProductQuantity,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByProductQuantity($from,$to) {
		$this->_filterRangeBy['ProductQuantity'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByProductQuantity($int) {
		$this->_filterGreaterThanBy['ProductQuantity'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByProductQuantity($int) {
		$this->_filterLessThanBy['ProductQuantity'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByProductPrice($ProductPrice, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ProductPrice',$ProductPrice,$_condition);

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
		
	public function filterLikeByIdGroupe($IdGroupe) {
		$this->_filterLikeBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProductType($ProductType) {
		$this->_filterLikeBy['ProductType'] =  $ProductType;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProductId($ProductId) {
		$this->_filterLikeBy['ProductId'] =  $ProductId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProductUri($ProductUri) {
		$this->_filterLikeBy['ProductUri'] =  $ProductUri;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProductQuantity($ProductQuantity) {
		$this->_filterLikeBy['ProductQuantity'] =  $ProductQuantity;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProductPrice($ProductPrice) {
		$this->_filterLikeBy['ProductPrice'] =  $ProductPrice;
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
		
	public function orderByIdGroupe($direction = 'ASC') {
		$this->loadDirection('id_groupe',$direction);
		return $this;
	} 
		
	public function orderByProductType($direction = 'ASC') {
		$this->loadDirection('product_type',$direction);
		return $this;
	} 
		
	public function orderByProductId($direction = 'ASC') {
		$this->loadDirection('product_id',$direction);
		return $this;
	} 
		
	public function orderByProductUri($direction = 'ASC') {
		$this->loadDirection('product_uri',$direction);
		return $this;
	} 
		
	public function orderByProductQuantity($direction = 'ASC') {
		$this->loadDirection('product_quantity',$direction);
		return $this;
	} 
		
	public function orderByProductPrice($direction = 'ASC') {
		$this->loadDirection('product_price',$direction);
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
		    'IdGroupe' =>  'id_groupe',            
		    'ProductType' =>  'product_type',            
		    'ProductId' =>  'product_id',            
		    'ProductUri' =>  'product_uri',            
		    'ProductQuantity' =>  'product_quantity',            
		    'ProductPrice' =>  'product_price',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}