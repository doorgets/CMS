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

class PaypalEntity extends AbstractEntity
{

	

	/**
	* @type  : int
	* @size  : 11 
	* @key   : PRIMARY KEY 
	* @extra : AUTO INCREMENT
	*/
	protected $Id; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $UserId; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $UserGroupe; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UserPseudo; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Token; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Successpageredirectrequested; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Timestamp; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Correlationid; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Ack; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Version; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Build; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Insuranceoptionselected; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Shippingoptionisdefault; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Transactionid; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Transactiontype; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Paymenttype; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Ordertime; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Amt; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Feeamt; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Taxamt; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Currencycode; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Paymentstatus; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Pendingreason; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Reasoncode; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Protectioneligibility; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Protectioneligibilitytype; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Securemerchantaccountid; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Errorcode; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Paymentinfo0Ack; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $DateCreationHuman; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $DateModificationHuman; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setUserId($UserId) {
		$this->UserId = $UserId;
		return $this;
	} 
	

	public function setUserGroupe($UserGroupe) {
		$this->UserGroupe = $UserGroupe;
		return $this;
	} 
	

	public function setUserPseudo($UserPseudo) {
		$this->UserPseudo = $UserPseudo;
		return $this;
	} 
	

	public function setToken($Token) {
		$this->Token = $Token;
		return $this;
	} 
	

	public function setSuccesspageredirectrequested($Successpageredirectrequested) {
		$this->Successpageredirectrequested = $Successpageredirectrequested;
		return $this;
	} 
	

	public function setTimestamp($Timestamp) {
		$this->Timestamp = $Timestamp;
		return $this;
	} 
	

	public function setCorrelationid($Correlationid) {
		$this->Correlationid = $Correlationid;
		return $this;
	} 
	

	public function setAck($Ack) {
		$this->Ack = $Ack;
		return $this;
	} 
	

	public function setVersion($Version) {
		$this->Version = $Version;
		return $this;
	} 
	

	public function setBuild($Build) {
		$this->Build = $Build;
		return $this;
	} 
	

	public function setInsuranceoptionselected($Insuranceoptionselected) {
		$this->Insuranceoptionselected = $Insuranceoptionselected;
		return $this;
	} 
	

	public function setShippingoptionisdefault($Shippingoptionisdefault) {
		$this->Shippingoptionisdefault = $Shippingoptionisdefault;
		return $this;
	} 
	

	public function setPaymentinfo0Transactionid($Paymentinfo0Transactionid) {
		$this->Paymentinfo0Transactionid = $Paymentinfo0Transactionid;
		return $this;
	} 
	

	public function setPaymentinfo0Transactiontype($Paymentinfo0Transactiontype) {
		$this->Paymentinfo0Transactiontype = $Paymentinfo0Transactiontype;
		return $this;
	} 
	

	public function setPaymentinfo0Paymenttype($Paymentinfo0Paymenttype) {
		$this->Paymentinfo0Paymenttype = $Paymentinfo0Paymenttype;
		return $this;
	} 
	

	public function setPaymentinfo0Ordertime($Paymentinfo0Ordertime) {
		$this->Paymentinfo0Ordertime = $Paymentinfo0Ordertime;
		return $this;
	} 
	

	public function setPaymentinfo0Amt($Paymentinfo0Amt) {
		$this->Paymentinfo0Amt = $Paymentinfo0Amt;
		return $this;
	} 
	

	public function setPaymentinfo0Feeamt($Paymentinfo0Feeamt) {
		$this->Paymentinfo0Feeamt = $Paymentinfo0Feeamt;
		return $this;
	} 
	

	public function setPaymentinfo0Taxamt($Paymentinfo0Taxamt) {
		$this->Paymentinfo0Taxamt = $Paymentinfo0Taxamt;
		return $this;
	} 
	

	public function setPaymentinfo0Currencycode($Paymentinfo0Currencycode) {
		$this->Paymentinfo0Currencycode = $Paymentinfo0Currencycode;
		return $this;
	} 
	

	public function setPaymentinfo0Paymentstatus($Paymentinfo0Paymentstatus) {
		$this->Paymentinfo0Paymentstatus = $Paymentinfo0Paymentstatus;
		return $this;
	} 
	

	public function setPaymentinfo0Pendingreason($Paymentinfo0Pendingreason) {
		$this->Paymentinfo0Pendingreason = $Paymentinfo0Pendingreason;
		return $this;
	} 
	

	public function setPaymentinfo0Reasoncode($Paymentinfo0Reasoncode) {
		$this->Paymentinfo0Reasoncode = $Paymentinfo0Reasoncode;
		return $this;
	} 
	

	public function setPaymentinfo0Protectioneligibility($Paymentinfo0Protectioneligibility) {
		$this->Paymentinfo0Protectioneligibility = $Paymentinfo0Protectioneligibility;
		return $this;
	} 
	

	public function setPaymentinfo0Protectioneligibilitytype($Paymentinfo0Protectioneligibilitytype) {
		$this->Paymentinfo0Protectioneligibilitytype = $Paymentinfo0Protectioneligibilitytype;
		return $this;
	} 
	

	public function setPaymentinfo0Securemerchantaccountid($Paymentinfo0Securemerchantaccountid) {
		$this->Paymentinfo0Securemerchantaccountid = $Paymentinfo0Securemerchantaccountid;
		return $this;
	} 
	

	public function setPaymentinfo0Errorcode($Paymentinfo0Errorcode) {
		$this->Paymentinfo0Errorcode = $Paymentinfo0Errorcode;
		return $this;
	} 
	

	public function setPaymentinfo0Ack($Paymentinfo0Ack) {
		$this->Paymentinfo0Ack = $Paymentinfo0Ack;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 
	

	public function setDateCreationHuman($DateCreationHuman) {
		$this->DateCreationHuman = $DateCreationHuman;
		return $this;
	} 
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 
	

	public function setDateModificationHuman($DateModificationHuman) {
		$this->DateModificationHuman = $DateModificationHuman;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getUserId() {
		return $this->UserId ;
	} 

	public function getUserGroupe() {
		return $this->UserGroupe ;
	} 

	public function getUserPseudo() {
		return $this->UserPseudo ;
	} 

	public function getToken() {
		return $this->Token ;
	} 

	public function getSuccesspageredirectrequested() {
		return $this->Successpageredirectrequested ;
	} 

	public function getTimestamp() {
		return $this->Timestamp ;
	} 

	public function getCorrelationid() {
		return $this->Correlationid ;
	} 

	public function getAck() {
		return $this->Ack ;
	} 

	public function getVersion() {
		return $this->Version ;
	} 

	public function getBuild() {
		return $this->Build ;
	} 

	public function getInsuranceoptionselected() {
		return $this->Insuranceoptionselected ;
	} 

	public function getShippingoptionisdefault() {
		return $this->Shippingoptionisdefault ;
	} 

	public function getPaymentinfo0Transactionid() {
		return $this->Paymentinfo0Transactionid ;
	} 

	public function getPaymentinfo0Transactiontype() {
		return $this->Paymentinfo0Transactiontype ;
	} 

	public function getPaymentinfo0Paymenttype() {
		return $this->Paymentinfo0Paymenttype ;
	} 

	public function getPaymentinfo0Ordertime() {
		return $this->Paymentinfo0Ordertime ;
	} 

	public function getPaymentinfo0Amt() {
		return $this->Paymentinfo0Amt ;
	} 

	public function getPaymentinfo0Feeamt() {
		return $this->Paymentinfo0Feeamt ;
	} 

	public function getPaymentinfo0Taxamt() {
		return $this->Paymentinfo0Taxamt ;
	} 

	public function getPaymentinfo0Currencycode() {
		return $this->Paymentinfo0Currencycode ;
	} 

	public function getPaymentinfo0Paymentstatus() {
		return $this->Paymentinfo0Paymentstatus ;
	} 

	public function getPaymentinfo0Pendingreason() {
		return $this->Paymentinfo0Pendingreason ;
	} 

	public function getPaymentinfo0Reasoncode() {
		return $this->Paymentinfo0Reasoncode ;
	} 

	public function getPaymentinfo0Protectioneligibility() {
		return $this->Paymentinfo0Protectioneligibility ;
	} 

	public function getPaymentinfo0Protectioneligibilitytype() {
		return $this->Paymentinfo0Protectioneligibilitytype ;
	} 

	public function getPaymentinfo0Securemerchantaccountid() {
		return $this->Paymentinfo0Securemerchantaccountid ;
	} 

	public function getPaymentinfo0Errorcode() {
		return $this->Paymentinfo0Errorcode ;
	} 

	public function getPaymentinfo0Ack() {
		return $this->Paymentinfo0Ack ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
	} 

	public function getDateCreationHuman() {
		return $this->DateCreationHuman ;
	} 

	public function getDateModification() {
		return $this->DateModification ;
	} 

	public function getDateModificationHuman() {
		return $this->DateModificationHuman ;
	} 

		
	public function getValidationId() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => true,
			'auto_increment' => true
		);
	} 
		
	public function getValidationUserId() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUserGroupe() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUserPseudo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationToken() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSuccesspageredirectrequested() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTimestamp() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCorrelationid() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAck() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationVersion() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBuild() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationInsuranceoptionselected() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingoptionisdefault() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Transactionid() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Transactiontype() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Paymenttype() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Ordertime() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Amt() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Feeamt() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Taxamt() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Currencycode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Paymentstatus() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Pendingreason() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Reasoncode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Protectioneligibility() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Protectioneligibilitytype() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Securemerchantaccountid() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Errorcode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPaymentinfo0Ack() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateCreation() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateCreationHuman() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateModification() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateModificationHuman() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
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


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}