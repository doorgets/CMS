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

class PaypalQuery extends AbstractQuery 
{

	protected $_table = '_paypal';
    
    protected $_className = 'Paypal';

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
		
	public function findByToken($Token) {
		$this->_findBy['Token'] =  $Token;
		$this->_load();
		return $this;
	} 
		
	public function findBySuccesspageredirectrequested($Successpageredirectrequested) {
		$this->_findBy['Successpageredirectrequested'] =  $Successpageredirectrequested;
		$this->_load();
		return $this;
	} 
		
	public function findByTimestamp($Timestamp) {
		$this->_findBy['Timestamp'] =  $Timestamp;
		$this->_load();
		return $this;
	} 
		
	public function findByCorrelationid($Correlationid) {
		$this->_findBy['Correlationid'] =  $Correlationid;
		$this->_load();
		return $this;
	} 
		
	public function findByAck($Ack) {
		$this->_findBy['Ack'] =  $Ack;
		$this->_load();
		return $this;
	} 
		
	public function findByVersion($Version) {
		$this->_findBy['Version'] =  $Version;
		$this->_load();
		return $this;
	} 
		
	public function findByBuild($Build) {
		$this->_findBy['Build'] =  $Build;
		$this->_load();
		return $this;
	} 
		
	public function findByInsuranceoptionselected($Insuranceoptionselected) {
		$this->_findBy['Insuranceoptionselected'] =  $Insuranceoptionselected;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingoptionisdefault($Shippingoptionisdefault) {
		$this->_findBy['Shippingoptionisdefault'] =  $Shippingoptionisdefault;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Transactionid($Paymentinfo0Transactionid) {
		$this->_findBy['Paymentinfo0Transactionid'] =  $Paymentinfo0Transactionid;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Transactiontype($Paymentinfo0Transactiontype) {
		$this->_findBy['Paymentinfo0Transactiontype'] =  $Paymentinfo0Transactiontype;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Paymenttype($Paymentinfo0Paymenttype) {
		$this->_findBy['Paymentinfo0Paymenttype'] =  $Paymentinfo0Paymenttype;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Ordertime($Paymentinfo0Ordertime) {
		$this->_findBy['Paymentinfo0Ordertime'] =  $Paymentinfo0Ordertime;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Amt($Paymentinfo0Amt) {
		$this->_findBy['Paymentinfo0Amt'] =  $Paymentinfo0Amt;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Feeamt($Paymentinfo0Feeamt) {
		$this->_findBy['Paymentinfo0Feeamt'] =  $Paymentinfo0Feeamt;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Taxamt($Paymentinfo0Taxamt) {
		$this->_findBy['Paymentinfo0Taxamt'] =  $Paymentinfo0Taxamt;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Currencycode($Paymentinfo0Currencycode) {
		$this->_findBy['Paymentinfo0Currencycode'] =  $Paymentinfo0Currencycode;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Paymentstatus($Paymentinfo0Paymentstatus) {
		$this->_findBy['Paymentinfo0Paymentstatus'] =  $Paymentinfo0Paymentstatus;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Pendingreason($Paymentinfo0Pendingreason) {
		$this->_findBy['Paymentinfo0Pendingreason'] =  $Paymentinfo0Pendingreason;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Reasoncode($Paymentinfo0Reasoncode) {
		$this->_findBy['Paymentinfo0Reasoncode'] =  $Paymentinfo0Reasoncode;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Protectioneligibility($Paymentinfo0Protectioneligibility) {
		$this->_findBy['Paymentinfo0Protectioneligibility'] =  $Paymentinfo0Protectioneligibility;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Protectioneligibilitytype($Paymentinfo0Protectioneligibilitytype) {
		$this->_findBy['Paymentinfo0Protectioneligibilitytype'] =  $Paymentinfo0Protectioneligibilitytype;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Securemerchantaccountid($Paymentinfo0Securemerchantaccountid) {
		$this->_findBy['Paymentinfo0Securemerchantaccountid'] =  $Paymentinfo0Securemerchantaccountid;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Errorcode($Paymentinfo0Errorcode) {
		$this->_findBy['Paymentinfo0Errorcode'] =  $Paymentinfo0Errorcode;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentinfo0Ack($Paymentinfo0Ack) {
		$this->_findBy['Paymentinfo0Ack'] =  $Paymentinfo0Ack;
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
		
	public function findOneByToken($Token) {
		$this->_findOneBy['Token'] =  $Token;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySuccesspageredirectrequested($Successpageredirectrequested) {
		$this->_findOneBy['Successpageredirectrequested'] =  $Successpageredirectrequested;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTimestamp($Timestamp) {
		$this->_findOneBy['Timestamp'] =  $Timestamp;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCorrelationid($Correlationid) {
		$this->_findOneBy['Correlationid'] =  $Correlationid;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAck($Ack) {
		$this->_findOneBy['Ack'] =  $Ack;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByVersion($Version) {
		$this->_findOneBy['Version'] =  $Version;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBuild($Build) {
		$this->_findOneBy['Build'] =  $Build;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByInsuranceoptionselected($Insuranceoptionselected) {
		$this->_findOneBy['Insuranceoptionselected'] =  $Insuranceoptionselected;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingoptionisdefault($Shippingoptionisdefault) {
		$this->_findOneBy['Shippingoptionisdefault'] =  $Shippingoptionisdefault;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Transactionid($Paymentinfo0Transactionid) {
		$this->_findOneBy['Paymentinfo0Transactionid'] =  $Paymentinfo0Transactionid;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Transactiontype($Paymentinfo0Transactiontype) {
		$this->_findOneBy['Paymentinfo0Transactiontype'] =  $Paymentinfo0Transactiontype;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Paymenttype($Paymentinfo0Paymenttype) {
		$this->_findOneBy['Paymentinfo0Paymenttype'] =  $Paymentinfo0Paymenttype;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Ordertime($Paymentinfo0Ordertime) {
		$this->_findOneBy['Paymentinfo0Ordertime'] =  $Paymentinfo0Ordertime;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Amt($Paymentinfo0Amt) {
		$this->_findOneBy['Paymentinfo0Amt'] =  $Paymentinfo0Amt;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Feeamt($Paymentinfo0Feeamt) {
		$this->_findOneBy['Paymentinfo0Feeamt'] =  $Paymentinfo0Feeamt;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Taxamt($Paymentinfo0Taxamt) {
		$this->_findOneBy['Paymentinfo0Taxamt'] =  $Paymentinfo0Taxamt;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Currencycode($Paymentinfo0Currencycode) {
		$this->_findOneBy['Paymentinfo0Currencycode'] =  $Paymentinfo0Currencycode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Paymentstatus($Paymentinfo0Paymentstatus) {
		$this->_findOneBy['Paymentinfo0Paymentstatus'] =  $Paymentinfo0Paymentstatus;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Pendingreason($Paymentinfo0Pendingreason) {
		$this->_findOneBy['Paymentinfo0Pendingreason'] =  $Paymentinfo0Pendingreason;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Reasoncode($Paymentinfo0Reasoncode) {
		$this->_findOneBy['Paymentinfo0Reasoncode'] =  $Paymentinfo0Reasoncode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Protectioneligibility($Paymentinfo0Protectioneligibility) {
		$this->_findOneBy['Paymentinfo0Protectioneligibility'] =  $Paymentinfo0Protectioneligibility;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Protectioneligibilitytype($Paymentinfo0Protectioneligibilitytype) {
		$this->_findOneBy['Paymentinfo0Protectioneligibilitytype'] =  $Paymentinfo0Protectioneligibilitytype;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Securemerchantaccountid($Paymentinfo0Securemerchantaccountid) {
		$this->_findOneBy['Paymentinfo0Securemerchantaccountid'] =  $Paymentinfo0Securemerchantaccountid;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Errorcode($Paymentinfo0Errorcode) {
		$this->_findOneBy['Paymentinfo0Errorcode'] =  $Paymentinfo0Errorcode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentinfo0Ack($Paymentinfo0Ack) {
		$this->_findOneBy['Paymentinfo0Ack'] =  $Paymentinfo0Ack;
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
		
	public function findByLikeToken($Token) {
		$this->_findByLike['Token'] =  $Token;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSuccesspageredirectrequested($Successpageredirectrequested) {
		$this->_findByLike['Successpageredirectrequested'] =  $Successpageredirectrequested;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTimestamp($Timestamp) {
		$this->_findByLike['Timestamp'] =  $Timestamp;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCorrelationid($Correlationid) {
		$this->_findByLike['Correlationid'] =  $Correlationid;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAck($Ack) {
		$this->_findByLike['Ack'] =  $Ack;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeVersion($Version) {
		$this->_findByLike['Version'] =  $Version;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBuild($Build) {
		$this->_findByLike['Build'] =  $Build;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeInsuranceoptionselected($Insuranceoptionselected) {
		$this->_findByLike['Insuranceoptionselected'] =  $Insuranceoptionselected;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingoptionisdefault($Shippingoptionisdefault) {
		$this->_findByLike['Shippingoptionisdefault'] =  $Shippingoptionisdefault;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Transactionid($Paymentinfo0Transactionid) {
		$this->_findByLike['Paymentinfo0Transactionid'] =  $Paymentinfo0Transactionid;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Transactiontype($Paymentinfo0Transactiontype) {
		$this->_findByLike['Paymentinfo0Transactiontype'] =  $Paymentinfo0Transactiontype;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Paymenttype($Paymentinfo0Paymenttype) {
		$this->_findByLike['Paymentinfo0Paymenttype'] =  $Paymentinfo0Paymenttype;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Ordertime($Paymentinfo0Ordertime) {
		$this->_findByLike['Paymentinfo0Ordertime'] =  $Paymentinfo0Ordertime;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Amt($Paymentinfo0Amt) {
		$this->_findByLike['Paymentinfo0Amt'] =  $Paymentinfo0Amt;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Feeamt($Paymentinfo0Feeamt) {
		$this->_findByLike['Paymentinfo0Feeamt'] =  $Paymentinfo0Feeamt;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Taxamt($Paymentinfo0Taxamt) {
		$this->_findByLike['Paymentinfo0Taxamt'] =  $Paymentinfo0Taxamt;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Currencycode($Paymentinfo0Currencycode) {
		$this->_findByLike['Paymentinfo0Currencycode'] =  $Paymentinfo0Currencycode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Paymentstatus($Paymentinfo0Paymentstatus) {
		$this->_findByLike['Paymentinfo0Paymentstatus'] =  $Paymentinfo0Paymentstatus;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Pendingreason($Paymentinfo0Pendingreason) {
		$this->_findByLike['Paymentinfo0Pendingreason'] =  $Paymentinfo0Pendingreason;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Reasoncode($Paymentinfo0Reasoncode) {
		$this->_findByLike['Paymentinfo0Reasoncode'] =  $Paymentinfo0Reasoncode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Protectioneligibility($Paymentinfo0Protectioneligibility) {
		$this->_findByLike['Paymentinfo0Protectioneligibility'] =  $Paymentinfo0Protectioneligibility;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Protectioneligibilitytype($Paymentinfo0Protectioneligibilitytype) {
		$this->_findByLike['Paymentinfo0Protectioneligibilitytype'] =  $Paymentinfo0Protectioneligibilitytype;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Securemerchantaccountid($Paymentinfo0Securemerchantaccountid) {
		$this->_findByLike['Paymentinfo0Securemerchantaccountid'] =  $Paymentinfo0Securemerchantaccountid;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Errorcode($Paymentinfo0Errorcode) {
		$this->_findByLike['Paymentinfo0Errorcode'] =  $Paymentinfo0Errorcode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentinfo0Ack($Paymentinfo0Ack) {
		$this->_findByLike['Paymentinfo0Ack'] =  $Paymentinfo0Ack;
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
		
	public function filterByToken($Token, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Token',$Token,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySuccesspageredirectrequested($Successpageredirectrequested, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Successpageredirectrequested',$Successpageredirectrequested,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTimestamp($Timestamp, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Timestamp',$Timestamp,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCorrelationid($Correlationid, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Correlationid',$Correlationid,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAck($Ack, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Ack',$Ack,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByVersion($Version, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Version',$Version,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBuild($Build, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Build',$Build,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByInsuranceoptionselected($Insuranceoptionselected, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Insuranceoptionselected',$Insuranceoptionselected,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingoptionisdefault($Shippingoptionisdefault, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Shippingoptionisdefault',$Shippingoptionisdefault,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Transactionid($Paymentinfo0Transactionid, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Transactionid',$Paymentinfo0Transactionid,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Transactiontype($Paymentinfo0Transactiontype, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Transactiontype',$Paymentinfo0Transactiontype,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Paymenttype($Paymentinfo0Paymenttype, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Paymenttype',$Paymentinfo0Paymenttype,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Ordertime($Paymentinfo0Ordertime, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Ordertime',$Paymentinfo0Ordertime,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Amt($Paymentinfo0Amt, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Amt',$Paymentinfo0Amt,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Feeamt($Paymentinfo0Feeamt, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Feeamt',$Paymentinfo0Feeamt,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Taxamt($Paymentinfo0Taxamt, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Taxamt',$Paymentinfo0Taxamt,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Currencycode($Paymentinfo0Currencycode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Currencycode',$Paymentinfo0Currencycode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Paymentstatus($Paymentinfo0Paymentstatus, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Paymentstatus',$Paymentinfo0Paymentstatus,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Pendingreason($Paymentinfo0Pendingreason, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Pendingreason',$Paymentinfo0Pendingreason,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Reasoncode($Paymentinfo0Reasoncode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Reasoncode',$Paymentinfo0Reasoncode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Protectioneligibility($Paymentinfo0Protectioneligibility, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Protectioneligibility',$Paymentinfo0Protectioneligibility,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Protectioneligibilitytype($Paymentinfo0Protectioneligibilitytype, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Protectioneligibilitytype',$Paymentinfo0Protectioneligibilitytype,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Securemerchantaccountid($Paymentinfo0Securemerchantaccountid, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Securemerchantaccountid',$Paymentinfo0Securemerchantaccountid,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Errorcode($Paymentinfo0Errorcode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Errorcode',$Paymentinfo0Errorcode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentinfo0Ack($Paymentinfo0Ack, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Paymentinfo0Ack',$Paymentinfo0Ack,$_condition);

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
		
	public function filterLikeByToken($Token) {
		$this->_filterLikeBy['Token'] =  $Token;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySuccesspageredirectrequested($Successpageredirectrequested) {
		$this->_filterLikeBy['Successpageredirectrequested'] =  $Successpageredirectrequested;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTimestamp($Timestamp) {
		$this->_filterLikeBy['Timestamp'] =  $Timestamp;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCorrelationid($Correlationid) {
		$this->_filterLikeBy['Correlationid'] =  $Correlationid;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAck($Ack) {
		$this->_filterLikeBy['Ack'] =  $Ack;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByVersion($Version) {
		$this->_filterLikeBy['Version'] =  $Version;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBuild($Build) {
		$this->_filterLikeBy['Build'] =  $Build;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByInsuranceoptionselected($Insuranceoptionselected) {
		$this->_filterLikeBy['Insuranceoptionselected'] =  $Insuranceoptionselected;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingoptionisdefault($Shippingoptionisdefault) {
		$this->_filterLikeBy['Shippingoptionisdefault'] =  $Shippingoptionisdefault;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Transactionid($Paymentinfo0Transactionid) {
		$this->_filterLikeBy['Paymentinfo0Transactionid'] =  $Paymentinfo0Transactionid;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Transactiontype($Paymentinfo0Transactiontype) {
		$this->_filterLikeBy['Paymentinfo0Transactiontype'] =  $Paymentinfo0Transactiontype;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Paymenttype($Paymentinfo0Paymenttype) {
		$this->_filterLikeBy['Paymentinfo0Paymenttype'] =  $Paymentinfo0Paymenttype;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Ordertime($Paymentinfo0Ordertime) {
		$this->_filterLikeBy['Paymentinfo0Ordertime'] =  $Paymentinfo0Ordertime;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Amt($Paymentinfo0Amt) {
		$this->_filterLikeBy['Paymentinfo0Amt'] =  $Paymentinfo0Amt;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Feeamt($Paymentinfo0Feeamt) {
		$this->_filterLikeBy['Paymentinfo0Feeamt'] =  $Paymentinfo0Feeamt;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Taxamt($Paymentinfo0Taxamt) {
		$this->_filterLikeBy['Paymentinfo0Taxamt'] =  $Paymentinfo0Taxamt;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Currencycode($Paymentinfo0Currencycode) {
		$this->_filterLikeBy['Paymentinfo0Currencycode'] =  $Paymentinfo0Currencycode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Paymentstatus($Paymentinfo0Paymentstatus) {
		$this->_filterLikeBy['Paymentinfo0Paymentstatus'] =  $Paymentinfo0Paymentstatus;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Pendingreason($Paymentinfo0Pendingreason) {
		$this->_filterLikeBy['Paymentinfo0Pendingreason'] =  $Paymentinfo0Pendingreason;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Reasoncode($Paymentinfo0Reasoncode) {
		$this->_filterLikeBy['Paymentinfo0Reasoncode'] =  $Paymentinfo0Reasoncode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Protectioneligibility($Paymentinfo0Protectioneligibility) {
		$this->_filterLikeBy['Paymentinfo0Protectioneligibility'] =  $Paymentinfo0Protectioneligibility;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Protectioneligibilitytype($Paymentinfo0Protectioneligibilitytype) {
		$this->_filterLikeBy['Paymentinfo0Protectioneligibilitytype'] =  $Paymentinfo0Protectioneligibilitytype;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Securemerchantaccountid($Paymentinfo0Securemerchantaccountid) {
		$this->_filterLikeBy['Paymentinfo0Securemerchantaccountid'] =  $Paymentinfo0Securemerchantaccountid;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Errorcode($Paymentinfo0Errorcode) {
		$this->_filterLikeBy['Paymentinfo0Errorcode'] =  $Paymentinfo0Errorcode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentinfo0Ack($Paymentinfo0Ack) {
		$this->_filterLikeBy['Paymentinfo0Ack'] =  $Paymentinfo0Ack;
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
		
	public function orderByToken($direction = 'ASC') {
		$this->loadDirection('token',$direction);
		return $this;
	} 
		
	public function orderBySuccesspageredirectrequested($direction = 'ASC') {
		$this->loadDirection('successpageredirectrequested',$direction);
		return $this;
	} 
		
	public function orderByTimestamp($direction = 'ASC') {
		$this->loadDirection('timestamp',$direction);
		return $this;
	} 
		
	public function orderByCorrelationid($direction = 'ASC') {
		$this->loadDirection('correlationid',$direction);
		return $this;
	} 
		
	public function orderByAck($direction = 'ASC') {
		$this->loadDirection('ack',$direction);
		return $this;
	} 
		
	public function orderByVersion($direction = 'ASC') {
		$this->loadDirection('version',$direction);
		return $this;
	} 
		
	public function orderByBuild($direction = 'ASC') {
		$this->loadDirection('build',$direction);
		return $this;
	} 
		
	public function orderByInsuranceoptionselected($direction = 'ASC') {
		$this->loadDirection('insuranceoptionselected',$direction);
		return $this;
	} 
		
	public function orderByShippingoptionisdefault($direction = 'ASC') {
		$this->loadDirection('shippingoptionisdefault',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Transactionid($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_transactionid',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Transactiontype($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_transactiontype',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Paymenttype($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_paymenttype',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Ordertime($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_ordertime',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Amt($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_amt',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Feeamt($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_feeamt',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Taxamt($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_taxamt',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Currencycode($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_currencycode',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Paymentstatus($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_paymentstatus',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Pendingreason($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_pendingreason',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Reasoncode($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_reasoncode',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Protectioneligibility($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_protectioneligibility',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Protectioneligibilitytype($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_protectioneligibilitytype',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Securemerchantaccountid($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_securemerchantaccountid',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Errorcode($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_errorcode',$direction);
		return $this;
	} 
		
	public function orderByPaymentinfo0Ack($direction = 'ASC') {
		$this->loadDirection('paymentinfo_0_ack',$direction);
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
		    'UserId' =>  'user_id',            
		    'UserGroupe' =>  'user_groupe',            
		    'UserPseudo' =>  'user_pseudo',            
		    'Token' =>  'token',            
		    'Successpageredirectrequested' =>  'successpageredirectrequested',            
		    'Timestamp' =>  'timestamp',            
		    'Correlationid' =>  'correlationid',            
		    'Ack' =>  'ack',            
		    'Version' =>  'version',            
		    'Build' =>  'build',            
		    'Insuranceoptionselected' =>  'insuranceoptionselected',            
		    'Shippingoptionisdefault' =>  'shippingoptionisdefault',            
		    'Paymentinfo0Transactionid' =>  'paymentinfo_0_transactionid',            
		    'Paymentinfo0Transactiontype' =>  'paymentinfo_0_transactiontype',            
		    'Paymentinfo0Paymenttype' =>  'paymentinfo_0_paymenttype',            
		    'Paymentinfo0Ordertime' =>  'paymentinfo_0_ordertime',            
		    'Paymentinfo0Amt' =>  'paymentinfo_0_amt',            
		    'Paymentinfo0Feeamt' =>  'paymentinfo_0_feeamt',            
		    'Paymentinfo0Taxamt' =>  'paymentinfo_0_taxamt',            
		    'Paymentinfo0Currencycode' =>  'paymentinfo_0_currencycode',            
		    'Paymentinfo0Paymentstatus' =>  'paymentinfo_0_paymentstatus',            
		    'Paymentinfo0Pendingreason' =>  'paymentinfo_0_pendingreason',            
		    'Paymentinfo0Reasoncode' =>  'paymentinfo_0_reasoncode',            
		    'Paymentinfo0Protectioneligibility' =>  'paymentinfo_0_protectioneligibility',            
		    'Paymentinfo0Protectioneligibilitytype' =>  'paymentinfo_0_protectioneligibilitytype',            
		    'Paymentinfo0Securemerchantaccountid' =>  'paymentinfo_0_securemerchantaccountid',            
		    'Paymentinfo0Errorcode' =>  'paymentinfo_0_errorcode',            
		    'Paymentinfo0Ack' =>  'paymentinfo_0_ack',            
		    'DateCreation' =>  'date_creation',            
		    'DateCreationHuman' =>  'date_creation_human',            
		    'DateModification' =>  'date_modification',            
		    'DateModificationHuman' =>  'date_modification_human',		
		));
	} 


}