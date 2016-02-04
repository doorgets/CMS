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

class CartQuery extends AbstractQuery 
{

	protected $_table = '_cart';
    
    protected $_className = 'Cart';

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
		
	public function findByStatus($Status) {
		$this->_findBy['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function findByUserId($UserId) {
		$this->_findBy['UserId'] =  $UserId;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUserId($from,$to) {
		$this->_findRangeBy['UserId'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUserId($int) {
		$this->_findGreaterThanBy['UserId'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUserId($int) {
		$this->_findLessThanBy['UserId'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUserGroupe($UserGroupe) {
		$this->_findBy['UserGroupe'] =  $UserGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUserGroupe($from,$to) {
		$this->_findRangeBy['UserGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUserGroupe($int) {
		$this->_findGreaterThanBy['UserGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUserGroupe($int) {
		$this->_findLessThanBy['UserGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUserPseudo($UserPseudo) {
		$this->_findBy['UserPseudo'] =  $UserPseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByUserLastname($UserLastname) {
		$this->_findBy['UserLastname'] =  $UserLastname;
		$this->_load();
		return $this;
	} 
		
	public function findByUserFirstname($UserFirstname) {
		$this->_findBy['UserFirstname'] =  $UserFirstname;
		$this->_load();
		return $this;
	} 
		
	public function findByVat($Vat) {
		$this->_findBy['Vat'] =  $Vat;
		$this->_load();
		return $this;
	} 
		
	public function findByOrderId($OrderId) {
		$this->_findBy['OrderId'] =  $OrderId;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByOrderId($from,$to) {
		$this->_findRangeBy['OrderId'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByOrderId($int) {
		$this->_findGreaterThanBy['OrderId'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByOrderId($int) {
		$this->_findLessThanBy['OrderId'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrencyAfter($CurrencyAfter) {
		$this->_findBy['CurrencyAfter'] =  $CurrencyAfter;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrencyBefore($CurrencyBefore) {
		$this->_findBy['CurrencyBefore'] =  $CurrencyBefore;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingAmount($ShippingAmount) {
		$this->_findBy['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrencyCode($CurrencyCode) {
		$this->_findBy['CurrencyCode'] =  $CurrencyCode;
		$this->_load();
		return $this;
	} 
		
	public function findByProducts($Products) {
		$this->_findBy['Products'] =  $Products;
		$this->_load();
		return $this;
	} 
		
	public function findByTotalAmount($TotalAmount) {
		$this->_findBy['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByTotalAmountVat($TotalAmountVat) {
		$this->_findBy['TotalAmountVat'] =  $TotalAmountVat;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
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
		
	public function findByDateCreationHuman($DateCreationHuman) {
		$this->_findBy['DateCreationHuman'] =  $DateCreationHuman;
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
		
	public function findByDateModificationHuman($DateModificationHuman) {
		$this->_findBy['DateModificationHuman'] =  $DateModificationHuman;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatus($Status) {
		$this->_findOneBy['Status'] =  $Status;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserId($UserId) {
		$this->_findOneBy['UserId'] =  $UserId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserGroupe($UserGroupe) {
		$this->_findOneBy['UserGroupe'] =  $UserGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserPseudo($UserPseudo) {
		$this->_findOneBy['UserPseudo'] =  $UserPseudo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserLastname($UserLastname) {
		$this->_findOneBy['UserLastname'] =  $UserLastname;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserFirstname($UserFirstname) {
		$this->_findOneBy['UserFirstname'] =  $UserFirstname;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByVat($Vat) {
		$this->_findOneBy['Vat'] =  $Vat;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOrderId($OrderId) {
		$this->_findOneBy['OrderId'] =  $OrderId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrencyAfter($CurrencyAfter) {
		$this->_findOneBy['CurrencyAfter'] =  $CurrencyAfter;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrencyBefore($CurrencyBefore) {
		$this->_findOneBy['CurrencyBefore'] =  $CurrencyBefore;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingAmount($ShippingAmount) {
		$this->_findOneBy['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrencyCode($CurrencyCode) {
		$this->_findOneBy['CurrencyCode'] =  $CurrencyCode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProducts($Products) {
		$this->_findOneBy['Products'] =  $Products;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTotalAmount($TotalAmount) {
		$this->_findOneBy['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTotalAmountVat($TotalAmountVat) {
		$this->_findOneBy['TotalAmountVat'] =  $TotalAmountVat;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreationHuman($DateCreationHuman) {
		$this->_findOneBy['DateCreationHuman'] =  $DateCreationHuman;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModification($DateModification) {
		$this->_findOneBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModificationHuman($DateModificationHuman) {
		$this->_findOneBy['DateModificationHuman'] =  $DateModificationHuman;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatus($Status) {
		$this->_findByLike['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserId($UserId) {
		$this->_findByLike['UserId'] =  $UserId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserGroupe($UserGroupe) {
		$this->_findByLike['UserGroupe'] =  $UserGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserPseudo($UserPseudo) {
		$this->_findByLike['UserPseudo'] =  $UserPseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserLastname($UserLastname) {
		$this->_findByLike['UserLastname'] =  $UserLastname;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserFirstname($UserFirstname) {
		$this->_findByLike['UserFirstname'] =  $UserFirstname;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeVat($Vat) {
		$this->_findByLike['Vat'] =  $Vat;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOrderId($OrderId) {
		$this->_findByLike['OrderId'] =  $OrderId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrencyAfter($CurrencyAfter) {
		$this->_findByLike['CurrencyAfter'] =  $CurrencyAfter;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrencyBefore($CurrencyBefore) {
		$this->_findByLike['CurrencyBefore'] =  $CurrencyBefore;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingAmount($ShippingAmount) {
		$this->_findByLike['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrencyCode($CurrencyCode) {
		$this->_findByLike['CurrencyCode'] =  $CurrencyCode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProducts($Products) {
		$this->_findByLike['Products'] =  $Products;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTotalAmount($TotalAmount) {
		$this->_findByLike['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTotalAmountVat($TotalAmountVat) {
		$this->_findByLike['TotalAmountVat'] =  $TotalAmountVat;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreationHuman($DateCreationHuman) {
		$this->_findByLike['DateCreationHuman'] =  $DateCreationHuman;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModification($DateModification) {
		$this->_findByLike['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModificationHuman($DateModificationHuman) {
		$this->_findByLike['DateModificationHuman'] =  $DateModificationHuman;
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
		
	public function filterByStatus($Status, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Status',$Status,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUserId($UserId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserId',$UserId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUserId($from,$to) {
		$this->_filterRangeBy['UserId'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUserId($int) {
		$this->_filterGreaterThanBy['UserId'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUserId($int) {
		$this->_filterLessThanBy['UserId'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUserGroupe($UserGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserGroupe',$UserGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUserGroupe($from,$to) {
		$this->_filterRangeBy['UserGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUserGroupe($int) {
		$this->_filterGreaterThanBy['UserGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUserGroupe($int) {
		$this->_filterLessThanBy['UserGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUserPseudo($UserPseudo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserPseudo',$UserPseudo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUserLastname($UserLastname, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserLastname',$UserLastname,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUserFirstname($UserFirstname, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserFirstname',$UserFirstname,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByVat($Vat, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Vat',$Vat,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOrderId($OrderId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OrderId',$OrderId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByOrderId($from,$to) {
		$this->_filterRangeBy['OrderId'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByOrderId($int) {
		$this->_filterGreaterThanBy['OrderId'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByOrderId($int) {
		$this->_filterLessThanBy['OrderId'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCurrencyAfter($CurrencyAfter, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CurrencyAfter',$CurrencyAfter,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCurrencyBefore($CurrencyBefore, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CurrencyBefore',$CurrencyBefore,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingAmount($ShippingAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingAmount',$ShippingAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCurrencyCode($CurrencyCode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CurrencyCode',$CurrencyCode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByProducts($Products, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Products',$Products,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTotalAmount($TotalAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TotalAmount',$TotalAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTotalAmountVat($TotalAmountVat, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TotalAmountVat',$TotalAmountVat,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

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
		
	public function filterByDateCreationHuman($DateCreationHuman, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateCreationHuman',$DateCreationHuman,$_condition);

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
		
	public function filterByDateModificationHuman($DateModificationHuman, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateModificationHuman',$DateModificationHuman,$_condition);

		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatus($Status) {
		$this->_filterLikeBy['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserId($UserId) {
		$this->_filterLikeBy['UserId'] =  $UserId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserGroupe($UserGroupe) {
		$this->_filterLikeBy['UserGroupe'] =  $UserGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserPseudo($UserPseudo) {
		$this->_filterLikeBy['UserPseudo'] =  $UserPseudo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserLastname($UserLastname) {
		$this->_filterLikeBy['UserLastname'] =  $UserLastname;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserFirstname($UserFirstname) {
		$this->_filterLikeBy['UserFirstname'] =  $UserFirstname;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByVat($Vat) {
		$this->_filterLikeBy['Vat'] =  $Vat;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOrderId($OrderId) {
		$this->_filterLikeBy['OrderId'] =  $OrderId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrencyAfter($CurrencyAfter) {
		$this->_filterLikeBy['CurrencyAfter'] =  $CurrencyAfter;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrencyBefore($CurrencyBefore) {
		$this->_filterLikeBy['CurrencyBefore'] =  $CurrencyBefore;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingAmount($ShippingAmount) {
		$this->_filterLikeBy['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrencyCode($CurrencyCode) {
		$this->_filterLikeBy['CurrencyCode'] =  $CurrencyCode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProducts($Products) {
		$this->_filterLikeBy['Products'] =  $Products;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTotalAmount($TotalAmount) {
		$this->_filterLikeBy['TotalAmount'] =  $TotalAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTotalAmountVat($TotalAmountVat) {
		$this->_filterLikeBy['TotalAmountVat'] =  $TotalAmountVat;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreationHuman($DateCreationHuman) {
		$this->_filterLikeBy['DateCreationHuman'] =  $DateCreationHuman;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModification($DateModification) {
		$this->_filterLikeBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModificationHuman($DateModificationHuman) {
		$this->_filterLikeBy['DateModificationHuman'] =  $DateModificationHuman;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByStatus($direction = 'ASC') {
		$this->loadDirection('status',$direction);
		return $this;
	} 
		
	public function orderByUserId($direction = 'ASC') {
		$this->loadDirection('user_id',$direction);
		return $this;
	} 
		
	public function orderByUserGroupe($direction = 'ASC') {
		$this->loadDirection('user_groupe',$direction);
		return $this;
	} 
		
	public function orderByUserPseudo($direction = 'ASC') {
		$this->loadDirection('user_pseudo',$direction);
		return $this;
	} 
		
	public function orderByUserLastname($direction = 'ASC') {
		$this->loadDirection('user_lastname',$direction);
		return $this;
	} 
		
	public function orderByUserFirstname($direction = 'ASC') {
		$this->loadDirection('user_firstname',$direction);
		return $this;
	} 
		
	public function orderByVat($direction = 'ASC') {
		$this->loadDirection('vat',$direction);
		return $this;
	} 
		
	public function orderByOrderId($direction = 'ASC') {
		$this->loadDirection('order_id',$direction);
		return $this;
	} 
		
	public function orderByCurrencyAfter($direction = 'ASC') {
		$this->loadDirection('currency_after',$direction);
		return $this;
	} 
		
	public function orderByCurrencyBefore($direction = 'ASC') {
		$this->loadDirection('currency_before',$direction);
		return $this;
	} 
		
	public function orderByShippingAmount($direction = 'ASC') {
		$this->loadDirection('shipping_amount',$direction);
		return $this;
	} 
		
	public function orderByCurrencyCode($direction = 'ASC') {
		$this->loadDirection('currency_code',$direction);
		return $this;
	} 
		
	public function orderByProducts($direction = 'ASC') {
		$this->loadDirection('products',$direction);
		return $this;
	} 
		
	public function orderByTotalAmount($direction = 'ASC') {
		$this->loadDirection('total_amount',$direction);
		return $this;
	} 
		
	public function orderByTotalAmountVat($direction = 'ASC') {
		$this->loadDirection('total_amount_vat',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByDateCreationHuman($direction = 'ASC') {
		$this->loadDirection('date_creation_human',$direction);
		return $this;
	} 
		
	public function orderByDateModification($direction = 'ASC') {
		$this->loadDirection('date_modification',$direction);
		return $this;
	} 
		
	public function orderByDateModificationHuman($direction = 'ASC') {
		$this->loadDirection('date_modification_human',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Status' =>  'status',            
		    'UserId' =>  'user_id',            
		    'UserGroupe' =>  'user_groupe',            
		    'UserPseudo' =>  'user_pseudo',            
		    'UserLastname' =>  'user_lastname',            
		    'UserFirstname' =>  'user_firstname',            
		    'Vat' =>  'vat',            
		    'OrderId' =>  'order_id',            
		    'CurrencyAfter' =>  'currency_after',            
		    'CurrencyBefore' =>  'currency_before',            
		    'ShippingAmount' =>  'shipping_amount',            
		    'CurrencyCode' =>  'currency_code',            
		    'Products' =>  'products',            
		    'TotalAmount' =>  'total_amount',            
		    'TotalAmountVat' =>  'total_amount_vat',            
		    'Langue' =>  'langue',            
		    'DateCreation' =>  'date_creation',            
		    'DateCreationHuman' =>  'date_creation_human',            
		    'DateModification' =>  'date_modification',            
		    'DateModificationHuman' =>  'date_modification_human',		
		));
	} 


}