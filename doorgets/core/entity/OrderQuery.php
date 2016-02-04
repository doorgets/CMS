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

class OrderQuery extends AbstractQuery 
{

	protected $_table = '_order';
    
    protected $_className = 'Order';

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
		
	public function findByType($Type) {
		$this->_findBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByTransactionId($TransactionId) {
		$this->_findBy['TransactionId'] =  $TransactionId;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingId($ShippingId) {
		$this->_findBy['ShippingId'] =  $ShippingId;
		$this->_load();
		return $this;
	} 
		
	public function findByReference($Reference) {
		$this->_findBy['Reference'] =  $Reference;
		$this->_load();
		return $this;
	} 
		
	public function findByStatus($Status) {
		$this->_findBy['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function findByStatusShipping($StatusShipping) {
		$this->_findBy['StatusShipping'] =  $StatusShipping;
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
		
	public function findByShippingLastname($ShippingLastname) {
		$this->_findBy['ShippingLastname'] =  $ShippingLastname;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingFirstname($ShippingFirstname) {
		$this->_findBy['ShippingFirstname'] =  $ShippingFirstname;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingCompany($ShippingCompany) {
		$this->_findBy['ShippingCompany'] =  $ShippingCompany;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingAddress($ShippingAddress) {
		$this->_findBy['ShippingAddress'] =  $ShippingAddress;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingZipcode($ShippingZipcode) {
		$this->_findBy['ShippingZipcode'] =  $ShippingZipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingCity($ShippingCity) {
		$this->_findBy['ShippingCity'] =  $ShippingCity;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingCountry($ShippingCountry) {
		$this->_findBy['ShippingCountry'] =  $ShippingCountry;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingPhone($ShippingPhone) {
		$this->_findBy['ShippingPhone'] =  $ShippingPhone;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingLastname($BillingLastname) {
		$this->_findBy['BillingLastname'] =  $BillingLastname;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingFirstname($BillingFirstname) {
		$this->_findBy['BillingFirstname'] =  $BillingFirstname;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingCompany($BillingCompany) {
		$this->_findBy['BillingCompany'] =  $BillingCompany;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingAddress($BillingAddress) {
		$this->_findBy['BillingAddress'] =  $BillingAddress;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingZipcode($BillingZipcode) {
		$this->_findBy['BillingZipcode'] =  $BillingZipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingCity($BillingCity) {
		$this->_findBy['BillingCity'] =  $BillingCity;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingCountry($BillingCountry) {
		$this->_findBy['BillingCountry'] =  $BillingCountry;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingPhone($BillingPhone) {
		$this->_findBy['BillingPhone'] =  $BillingPhone;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingRegion($BillingRegion) {
		$this->_findBy['BillingRegion'] =  $BillingRegion;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingRegion($ShippingRegion) {
		$this->_findBy['ShippingRegion'] =  $ShippingRegion;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByVat($Vat) {
		$this->_findBy['Vat'] =  $Vat;
		$this->_load();
		return $this;
	} 
		
	public function findByAmount($Amount) {
		$this->_findBy['Amount'] =  $Amount;
		$this->_load();
		return $this;
	} 
		
	public function findByAmountReal($AmountReal) {
		$this->_findBy['AmountReal'] =  $AmountReal;
		$this->_load();
		return $this;
	} 
		
	public function findByAmountBilling($AmountBilling) {
		$this->_findBy['AmountBilling'] =  $AmountBilling;
		$this->_load();
		return $this;
	} 
		
	public function findByAmountProfit($AmountProfit) {
		$this->_findBy['AmountProfit'] =  $AmountProfit;
		$this->_load();
		return $this;
	} 
		
	public function findByAmountWithShipping($AmountWithShipping) {
		$this->_findBy['AmountWithShipping'] =  $AmountWithShipping;
		$this->_load();
		return $this;
	} 
		
	public function findByAmountVat($AmountVat) {
		$this->_findBy['AmountVat'] =  $AmountVat;
		$this->_load();
		return $this;
	} 
		
	public function findByCount($Count) {
		$this->_findBy['Count'] =  $Count;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrency($Currency) {
		$this->_findBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingAmount($ShippingAmount) {
		$this->_findBy['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByMethodBilling($MethodBilling) {
		$this->_findBy['MethodBilling'] =  $MethodBilling;
		$this->_load();
		return $this;
	} 
		
	public function findByMethodShipping($MethodShipping) {
		$this->_findBy['MethodShipping'] =  $MethodShipping;
		$this->_load();
		return $this;
	} 
		
	public function findByProducts($Products) {
		$this->_findBy['Products'] =  $Products;
		$this->_load();
		return $this;
	} 
		
	public function findByMessage($Message) {
		$this->_findBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByErrorLog($ErrorLog) {
		$this->_findBy['ErrorLog'] =  $ErrorLog;
		$this->_load();
		return $this;
	} 
		
	public function findByHistory($History) {
		$this->_findBy['History'] =  $History;
		$this->_load();
		return $this;
	} 
		
	public function findByBillingPdf($BillingPdf) {
		$this->_findBy['BillingPdf'] =  $BillingPdf;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingPdf($ShippingPdf) {
		$this->_findBy['ShippingPdf'] =  $ShippingPdf;
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
		
	public function findOneByType($Type) {
		$this->_findOneBy['Type'] =  $Type;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTransactionId($TransactionId) {
		$this->_findOneBy['TransactionId'] =  $TransactionId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingId($ShippingId) {
		$this->_findOneBy['ShippingId'] =  $ShippingId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReference($Reference) {
		$this->_findOneBy['Reference'] =  $Reference;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatus($Status) {
		$this->_findOneBy['Status'] =  $Status;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatusShipping($StatusShipping) {
		$this->_findOneBy['StatusShipping'] =  $StatusShipping;
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
		
	public function findOneByShippingLastname($ShippingLastname) {
		$this->_findOneBy['ShippingLastname'] =  $ShippingLastname;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingFirstname($ShippingFirstname) {
		$this->_findOneBy['ShippingFirstname'] =  $ShippingFirstname;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingCompany($ShippingCompany) {
		$this->_findOneBy['ShippingCompany'] =  $ShippingCompany;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingAddress($ShippingAddress) {
		$this->_findOneBy['ShippingAddress'] =  $ShippingAddress;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingZipcode($ShippingZipcode) {
		$this->_findOneBy['ShippingZipcode'] =  $ShippingZipcode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingCity($ShippingCity) {
		$this->_findOneBy['ShippingCity'] =  $ShippingCity;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingCountry($ShippingCountry) {
		$this->_findOneBy['ShippingCountry'] =  $ShippingCountry;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingPhone($ShippingPhone) {
		$this->_findOneBy['ShippingPhone'] =  $ShippingPhone;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingLastname($BillingLastname) {
		$this->_findOneBy['BillingLastname'] =  $BillingLastname;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingFirstname($BillingFirstname) {
		$this->_findOneBy['BillingFirstname'] =  $BillingFirstname;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingCompany($BillingCompany) {
		$this->_findOneBy['BillingCompany'] =  $BillingCompany;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingAddress($BillingAddress) {
		$this->_findOneBy['BillingAddress'] =  $BillingAddress;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingZipcode($BillingZipcode) {
		$this->_findOneBy['BillingZipcode'] =  $BillingZipcode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingCity($BillingCity) {
		$this->_findOneBy['BillingCity'] =  $BillingCity;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingCountry($BillingCountry) {
		$this->_findOneBy['BillingCountry'] =  $BillingCountry;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingPhone($BillingPhone) {
		$this->_findOneBy['BillingPhone'] =  $BillingPhone;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingRegion($BillingRegion) {
		$this->_findOneBy['BillingRegion'] =  $BillingRegion;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingRegion($ShippingRegion) {
		$this->_findOneBy['ShippingRegion'] =  $ShippingRegion;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByVat($Vat) {
		$this->_findOneBy['Vat'] =  $Vat;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmount($Amount) {
		$this->_findOneBy['Amount'] =  $Amount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmountReal($AmountReal) {
		$this->_findOneBy['AmountReal'] =  $AmountReal;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmountBilling($AmountBilling) {
		$this->_findOneBy['AmountBilling'] =  $AmountBilling;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmountProfit($AmountProfit) {
		$this->_findOneBy['AmountProfit'] =  $AmountProfit;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmountWithShipping($AmountWithShipping) {
		$this->_findOneBy['AmountWithShipping'] =  $AmountWithShipping;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAmountVat($AmountVat) {
		$this->_findOneBy['AmountVat'] =  $AmountVat;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCount($Count) {
		$this->_findOneBy['Count'] =  $Count;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrency($Currency) {
		$this->_findOneBy['Currency'] =  $Currency;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingAmount($ShippingAmount) {
		$this->_findOneBy['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMethodBilling($MethodBilling) {
		$this->_findOneBy['MethodBilling'] =  $MethodBilling;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMethodShipping($MethodShipping) {
		$this->_findOneBy['MethodShipping'] =  $MethodShipping;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByProducts($Products) {
		$this->_findOneBy['Products'] =  $Products;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessage($Message) {
		$this->_findOneBy['Message'] =  $Message;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByErrorLog($ErrorLog) {
		$this->_findOneBy['ErrorLog'] =  $ErrorLog;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByHistory($History) {
		$this->_findOneBy['History'] =  $History;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBillingPdf($BillingPdf) {
		$this->_findOneBy['BillingPdf'] =  $BillingPdf;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingPdf($ShippingPdf) {
		$this->_findOneBy['ShippingPdf'] =  $ShippingPdf;
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
		
	public function findByLikeType($Type) {
		$this->_findByLike['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTransactionId($TransactionId) {
		$this->_findByLike['TransactionId'] =  $TransactionId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingId($ShippingId) {
		$this->_findByLike['ShippingId'] =  $ShippingId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReference($Reference) {
		$this->_findByLike['Reference'] =  $Reference;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatus($Status) {
		$this->_findByLike['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatusShipping($StatusShipping) {
		$this->_findByLike['StatusShipping'] =  $StatusShipping;
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
		
	public function findByLikeShippingLastname($ShippingLastname) {
		$this->_findByLike['ShippingLastname'] =  $ShippingLastname;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingFirstname($ShippingFirstname) {
		$this->_findByLike['ShippingFirstname'] =  $ShippingFirstname;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingCompany($ShippingCompany) {
		$this->_findByLike['ShippingCompany'] =  $ShippingCompany;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingAddress($ShippingAddress) {
		$this->_findByLike['ShippingAddress'] =  $ShippingAddress;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingZipcode($ShippingZipcode) {
		$this->_findByLike['ShippingZipcode'] =  $ShippingZipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingCity($ShippingCity) {
		$this->_findByLike['ShippingCity'] =  $ShippingCity;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingCountry($ShippingCountry) {
		$this->_findByLike['ShippingCountry'] =  $ShippingCountry;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingPhone($ShippingPhone) {
		$this->_findByLike['ShippingPhone'] =  $ShippingPhone;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingLastname($BillingLastname) {
		$this->_findByLike['BillingLastname'] =  $BillingLastname;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingFirstname($BillingFirstname) {
		$this->_findByLike['BillingFirstname'] =  $BillingFirstname;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingCompany($BillingCompany) {
		$this->_findByLike['BillingCompany'] =  $BillingCompany;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingAddress($BillingAddress) {
		$this->_findByLike['BillingAddress'] =  $BillingAddress;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingZipcode($BillingZipcode) {
		$this->_findByLike['BillingZipcode'] =  $BillingZipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingCity($BillingCity) {
		$this->_findByLike['BillingCity'] =  $BillingCity;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingCountry($BillingCountry) {
		$this->_findByLike['BillingCountry'] =  $BillingCountry;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingPhone($BillingPhone) {
		$this->_findByLike['BillingPhone'] =  $BillingPhone;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingRegion($BillingRegion) {
		$this->_findByLike['BillingRegion'] =  $BillingRegion;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingRegion($ShippingRegion) {
		$this->_findByLike['ShippingRegion'] =  $ShippingRegion;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeVat($Vat) {
		$this->_findByLike['Vat'] =  $Vat;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmount($Amount) {
		$this->_findByLike['Amount'] =  $Amount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmountReal($AmountReal) {
		$this->_findByLike['AmountReal'] =  $AmountReal;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmountBilling($AmountBilling) {
		$this->_findByLike['AmountBilling'] =  $AmountBilling;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmountProfit($AmountProfit) {
		$this->_findByLike['AmountProfit'] =  $AmountProfit;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmountWithShipping($AmountWithShipping) {
		$this->_findByLike['AmountWithShipping'] =  $AmountWithShipping;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAmountVat($AmountVat) {
		$this->_findByLike['AmountVat'] =  $AmountVat;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCount($Count) {
		$this->_findByLike['Count'] =  $Count;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrency($Currency) {
		$this->_findByLike['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingAmount($ShippingAmount) {
		$this->_findByLike['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMethodBilling($MethodBilling) {
		$this->_findByLike['MethodBilling'] =  $MethodBilling;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMethodShipping($MethodShipping) {
		$this->_findByLike['MethodShipping'] =  $MethodShipping;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeProducts($Products) {
		$this->_findByLike['Products'] =  $Products;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessage($Message) {
		$this->_findByLike['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeErrorLog($ErrorLog) {
		$this->_findByLike['ErrorLog'] =  $ErrorLog;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeHistory($History) {
		$this->_findByLike['History'] =  $History;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBillingPdf($BillingPdf) {
		$this->_findByLike['BillingPdf'] =  $BillingPdf;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingPdf($ShippingPdf) {
		$this->_findByLike['ShippingPdf'] =  $ShippingPdf;
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
		
	public function filterByType($Type, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Type',$Type,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTransactionId($TransactionId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TransactionId',$TransactionId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingId($ShippingId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingId',$ShippingId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByReference($Reference, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Reference',$Reference,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStatus($Status, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Status',$Status,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStatusShipping($StatusShipping, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StatusShipping',$StatusShipping,$_condition);

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
		
	public function filterByShippingLastname($ShippingLastname, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingLastname',$ShippingLastname,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingFirstname($ShippingFirstname, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingFirstname',$ShippingFirstname,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingCompany($ShippingCompany, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingCompany',$ShippingCompany,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingAddress($ShippingAddress, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingAddress',$ShippingAddress,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingZipcode($ShippingZipcode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingZipcode',$ShippingZipcode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingCity($ShippingCity, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingCity',$ShippingCity,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingCountry($ShippingCountry, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingCountry',$ShippingCountry,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingPhone($ShippingPhone, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingPhone',$ShippingPhone,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingLastname($BillingLastname, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingLastname',$BillingLastname,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingFirstname($BillingFirstname, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingFirstname',$BillingFirstname,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingCompany($BillingCompany, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingCompany',$BillingCompany,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingAddress($BillingAddress, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingAddress',$BillingAddress,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingZipcode($BillingZipcode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingZipcode',$BillingZipcode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingCity($BillingCity, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingCity',$BillingCity,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingCountry($BillingCountry, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingCountry',$BillingCountry,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingPhone($BillingPhone, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingPhone',$BillingPhone,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingRegion($BillingRegion, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingRegion',$BillingRegion,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingRegion($ShippingRegion, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingRegion',$ShippingRegion,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByVat($Vat, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Vat',$Vat,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmount($Amount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Amount',$Amount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmountReal($AmountReal, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AmountReal',$AmountReal,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmountBilling($AmountBilling, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AmountBilling',$AmountBilling,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmountProfit($AmountProfit, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AmountProfit',$AmountProfit,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmountWithShipping($AmountWithShipping, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AmountWithShipping',$AmountWithShipping,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAmountVat($AmountVat, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AmountVat',$AmountVat,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCount($Count, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Count',$Count,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCurrency($Currency, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Currency',$Currency,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingAmount($ShippingAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingAmount',$ShippingAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMethodBilling($MethodBilling, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MethodBilling',$MethodBilling,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMethodShipping($MethodShipping, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MethodShipping',$MethodShipping,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByProducts($Products, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Products',$Products,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMessage($Message, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Message',$Message,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByErrorLog($ErrorLog, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ErrorLog',$ErrorLog,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByHistory($History, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('History',$History,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBillingPdf($BillingPdf, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BillingPdf',$BillingPdf,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingPdf($ShippingPdf, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingPdf',$ShippingPdf,$_condition);

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
		
	public function filterLikeByType($Type) {
		$this->_filterLikeBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTransactionId($TransactionId) {
		$this->_filterLikeBy['TransactionId'] =  $TransactionId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingId($ShippingId) {
		$this->_filterLikeBy['ShippingId'] =  $ShippingId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReference($Reference) {
		$this->_filterLikeBy['Reference'] =  $Reference;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatus($Status) {
		$this->_filterLikeBy['Status'] =  $Status;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatusShipping($StatusShipping) {
		$this->_filterLikeBy['StatusShipping'] =  $StatusShipping;
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
		
	public function filterLikeByShippingLastname($ShippingLastname) {
		$this->_filterLikeBy['ShippingLastname'] =  $ShippingLastname;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingFirstname($ShippingFirstname) {
		$this->_filterLikeBy['ShippingFirstname'] =  $ShippingFirstname;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingCompany($ShippingCompany) {
		$this->_filterLikeBy['ShippingCompany'] =  $ShippingCompany;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingAddress($ShippingAddress) {
		$this->_filterLikeBy['ShippingAddress'] =  $ShippingAddress;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingZipcode($ShippingZipcode) {
		$this->_filterLikeBy['ShippingZipcode'] =  $ShippingZipcode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingCity($ShippingCity) {
		$this->_filterLikeBy['ShippingCity'] =  $ShippingCity;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingCountry($ShippingCountry) {
		$this->_filterLikeBy['ShippingCountry'] =  $ShippingCountry;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingPhone($ShippingPhone) {
		$this->_filterLikeBy['ShippingPhone'] =  $ShippingPhone;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingLastname($BillingLastname) {
		$this->_filterLikeBy['BillingLastname'] =  $BillingLastname;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingFirstname($BillingFirstname) {
		$this->_filterLikeBy['BillingFirstname'] =  $BillingFirstname;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingCompany($BillingCompany) {
		$this->_filterLikeBy['BillingCompany'] =  $BillingCompany;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingAddress($BillingAddress) {
		$this->_filterLikeBy['BillingAddress'] =  $BillingAddress;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingZipcode($BillingZipcode) {
		$this->_filterLikeBy['BillingZipcode'] =  $BillingZipcode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingCity($BillingCity) {
		$this->_filterLikeBy['BillingCity'] =  $BillingCity;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingCountry($BillingCountry) {
		$this->_filterLikeBy['BillingCountry'] =  $BillingCountry;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingPhone($BillingPhone) {
		$this->_filterLikeBy['BillingPhone'] =  $BillingPhone;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingRegion($BillingRegion) {
		$this->_filterLikeBy['BillingRegion'] =  $BillingRegion;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingRegion($ShippingRegion) {
		$this->_filterLikeBy['ShippingRegion'] =  $ShippingRegion;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByVat($Vat) {
		$this->_filterLikeBy['Vat'] =  $Vat;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmount($Amount) {
		$this->_filterLikeBy['Amount'] =  $Amount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmountReal($AmountReal) {
		$this->_filterLikeBy['AmountReal'] =  $AmountReal;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmountBilling($AmountBilling) {
		$this->_filterLikeBy['AmountBilling'] =  $AmountBilling;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmountProfit($AmountProfit) {
		$this->_filterLikeBy['AmountProfit'] =  $AmountProfit;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmountWithShipping($AmountWithShipping) {
		$this->_filterLikeBy['AmountWithShipping'] =  $AmountWithShipping;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAmountVat($AmountVat) {
		$this->_filterLikeBy['AmountVat'] =  $AmountVat;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCount($Count) {
		$this->_filterLikeBy['Count'] =  $Count;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrency($Currency) {
		$this->_filterLikeBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingAmount($ShippingAmount) {
		$this->_filterLikeBy['ShippingAmount'] =  $ShippingAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMethodBilling($MethodBilling) {
		$this->_filterLikeBy['MethodBilling'] =  $MethodBilling;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMethodShipping($MethodShipping) {
		$this->_filterLikeBy['MethodShipping'] =  $MethodShipping;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByProducts($Products) {
		$this->_filterLikeBy['Products'] =  $Products;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessage($Message) {
		$this->_filterLikeBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByErrorLog($ErrorLog) {
		$this->_filterLikeBy['ErrorLog'] =  $ErrorLog;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByHistory($History) {
		$this->_filterLikeBy['History'] =  $History;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBillingPdf($BillingPdf) {
		$this->_filterLikeBy['BillingPdf'] =  $BillingPdf;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingPdf($ShippingPdf) {
		$this->_filterLikeBy['ShippingPdf'] =  $ShippingPdf;
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
		
	public function orderByType($direction = 'ASC') {
		$this->loadDirection('type',$direction);
		return $this;
	} 
		
	public function orderByTransactionId($direction = 'ASC') {
		$this->loadDirection('transaction_id',$direction);
		return $this;
	} 
		
	public function orderByShippingId($direction = 'ASC') {
		$this->loadDirection('shipping_id',$direction);
		return $this;
	} 
		
	public function orderByReference($direction = 'ASC') {
		$this->loadDirection('reference',$direction);
		return $this;
	} 
		
	public function orderByStatus($direction = 'ASC') {
		$this->loadDirection('status',$direction);
		return $this;
	} 
		
	public function orderByStatusShipping($direction = 'ASC') {
		$this->loadDirection('status_shipping',$direction);
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
		
	public function orderByShippingLastname($direction = 'ASC') {
		$this->loadDirection('shipping_lastname',$direction);
		return $this;
	} 
		
	public function orderByShippingFirstname($direction = 'ASC') {
		$this->loadDirection('shipping_firstname',$direction);
		return $this;
	} 
		
	public function orderByShippingCompany($direction = 'ASC') {
		$this->loadDirection('shipping_company',$direction);
		return $this;
	} 
		
	public function orderByShippingAddress($direction = 'ASC') {
		$this->loadDirection('shipping_address',$direction);
		return $this;
	} 
		
	public function orderByShippingZipcode($direction = 'ASC') {
		$this->loadDirection('shipping_zipcode',$direction);
		return $this;
	} 
		
	public function orderByShippingCity($direction = 'ASC') {
		$this->loadDirection('shipping_city',$direction);
		return $this;
	} 
		
	public function orderByShippingCountry($direction = 'ASC') {
		$this->loadDirection('shipping_country',$direction);
		return $this;
	} 
		
	public function orderByShippingPhone($direction = 'ASC') {
		$this->loadDirection('shipping_phone',$direction);
		return $this;
	} 
		
	public function orderByBillingLastname($direction = 'ASC') {
		$this->loadDirection('billing_lastname',$direction);
		return $this;
	} 
		
	public function orderByBillingFirstname($direction = 'ASC') {
		$this->loadDirection('billing_firstname',$direction);
		return $this;
	} 
		
	public function orderByBillingCompany($direction = 'ASC') {
		$this->loadDirection('billing_company',$direction);
		return $this;
	} 
		
	public function orderByBillingAddress($direction = 'ASC') {
		$this->loadDirection('billing_address',$direction);
		return $this;
	} 
		
	public function orderByBillingZipcode($direction = 'ASC') {
		$this->loadDirection('billing_zipcode',$direction);
		return $this;
	} 
		
	public function orderByBillingCity($direction = 'ASC') {
		$this->loadDirection('billing_city',$direction);
		return $this;
	} 
		
	public function orderByBillingCountry($direction = 'ASC') {
		$this->loadDirection('billing_country',$direction);
		return $this;
	} 
		
	public function orderByBillingPhone($direction = 'ASC') {
		$this->loadDirection('billing_phone',$direction);
		return $this;
	} 
		
	public function orderByBillingRegion($direction = 'ASC') {
		$this->loadDirection('billing_region',$direction);
		return $this;
	} 
		
	public function orderByShippingRegion($direction = 'ASC') {
		$this->loadDirection('shipping_region',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByVat($direction = 'ASC') {
		$this->loadDirection('vat',$direction);
		return $this;
	} 
		
	public function orderByAmount($direction = 'ASC') {
		$this->loadDirection('amount',$direction);
		return $this;
	} 
		
	public function orderByAmountReal($direction = 'ASC') {
		$this->loadDirection('amount_real',$direction);
		return $this;
	} 
		
	public function orderByAmountBilling($direction = 'ASC') {
		$this->loadDirection('amount_billing',$direction);
		return $this;
	} 
		
	public function orderByAmountProfit($direction = 'ASC') {
		$this->loadDirection('amount_profit',$direction);
		return $this;
	} 
		
	public function orderByAmountWithShipping($direction = 'ASC') {
		$this->loadDirection('amount_with_shipping',$direction);
		return $this;
	} 
		
	public function orderByAmountVat($direction = 'ASC') {
		$this->loadDirection('amount_vat',$direction);
		return $this;
	} 
		
	public function orderByCount($direction = 'ASC') {
		$this->loadDirection('count',$direction);
		return $this;
	} 
		
	public function orderByCurrency($direction = 'ASC') {
		$this->loadDirection('currency',$direction);
		return $this;
	} 
		
	public function orderByShippingAmount($direction = 'ASC') {
		$this->loadDirection('shipping_amount',$direction);
		return $this;
	} 
		
	public function orderByMethodBilling($direction = 'ASC') {
		$this->loadDirection('method_billing',$direction);
		return $this;
	} 
		
	public function orderByMethodShipping($direction = 'ASC') {
		$this->loadDirection('method_shipping',$direction);
		return $this;
	} 
		
	public function orderByProducts($direction = 'ASC') {
		$this->loadDirection('products',$direction);
		return $this;
	} 
		
	public function orderByMessage($direction = 'ASC') {
		$this->loadDirection('message',$direction);
		return $this;
	} 
		
	public function orderByErrorLog($direction = 'ASC') {
		$this->loadDirection('error_log',$direction);
		return $this;
	} 
		
	public function orderByHistory($direction = 'ASC') {
		$this->loadDirection('history',$direction);
		return $this;
	} 
		
	public function orderByBillingPdf($direction = 'ASC') {
		$this->loadDirection('billing_pdf',$direction);
		return $this;
	} 
		
	public function orderByShippingPdf($direction = 'ASC') {
		$this->loadDirection('shipping_pdf',$direction);
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
		    'Type' =>  'type',            
		    'TransactionId' =>  'transaction_id',            
		    'ShippingId' =>  'shipping_id',            
		    'Reference' =>  'reference',            
		    'Status' =>  'status',            
		    'StatusShipping' =>  'status_shipping',            
		    'UserId' =>  'user_id',            
		    'UserGroupe' =>  'user_groupe',            
		    'UserPseudo' =>  'user_pseudo',            
		    'UserLastname' =>  'user_lastname',            
		    'UserFirstname' =>  'user_firstname',            
		    'ShippingLastname' =>  'shipping_lastname',            
		    'ShippingFirstname' =>  'shipping_firstname',            
		    'ShippingCompany' =>  'shipping_company',            
		    'ShippingAddress' =>  'shipping_address',            
		    'ShippingZipcode' =>  'shipping_zipcode',            
		    'ShippingCity' =>  'shipping_city',            
		    'ShippingCountry' =>  'shipping_country',            
		    'ShippingPhone' =>  'shipping_phone',            
		    'BillingLastname' =>  'billing_lastname',            
		    'BillingFirstname' =>  'billing_firstname',            
		    'BillingCompany' =>  'billing_company',            
		    'BillingAddress' =>  'billing_address',            
		    'BillingZipcode' =>  'billing_zipcode',            
		    'BillingCity' =>  'billing_city',            
		    'BillingCountry' =>  'billing_country',            
		    'BillingPhone' =>  'billing_phone',            
		    'BillingRegion' =>  'billing_region',            
		    'ShippingRegion' =>  'shipping_region',            
		    'Langue' =>  'langue',            
		    'Vat' =>  'vat',            
		    'Amount' =>  'amount',            
		    'AmountReal' =>  'amount_real',            
		    'AmountBilling' =>  'amount_billing',            
		    'AmountProfit' =>  'amount_profit',            
		    'AmountWithShipping' =>  'amount_with_shipping',            
		    'AmountVat' =>  'amount_vat',            
		    'Count' =>  'count',            
		    'Currency' =>  'currency',            
		    'ShippingAmount' =>  'shipping_amount',            
		    'MethodBilling' =>  'method_billing',            
		    'MethodShipping' =>  'method_shipping',            
		    'Products' =>  'products',            
		    'Message' =>  'message',            
		    'ErrorLog' =>  'error_log',            
		    'History' =>  'history',            
		    'BillingPdf' =>  'billing_pdf',            
		    'ShippingPdf' =>  'shipping_pdf',            
		    'DateCreation' =>  'date_creation',            
		    'DateCreationHuman' =>  'date_creation_human',            
		    'DateModification' =>  'date_modification',            
		    'DateModificationHuman' =>  'date_modification_human',		
		));
	} 


}