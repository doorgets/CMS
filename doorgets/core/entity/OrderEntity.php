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

class OrderEntity extends AbstractEntity
{

	

	/**
	* @type  : int
	* @size  : 11 
	* @key   : PRIMARY KEY 
	* @extra : AUTO INCREMENT
	*/
	protected $Id; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Type; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $TransactionId; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingId; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Reference; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Status; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $StatusShipping; 
	

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
	protected $UserLastname; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UserFirstname; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingLastname; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingFirstname; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingCompany; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingAddress; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingZipcode; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingCity; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingCountry; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingPhone; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingLastname; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingFirstname; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingCompany; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingAddress; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingZipcode; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingCity; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingCountry; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingPhone; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingRegion; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingRegion; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Vat; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $Amount; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $AmountReal; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $AmountBilling; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $AmountProfit; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $AmountWithShipping; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $AmountVat; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Count; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Currency; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingAmount; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MethodBilling; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MethodShipping; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Products; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Message; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ErrorLog; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $History; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BillingPdf; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingPdf; 
	

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
	

	public function setType($Type) {
		$this->Type = $Type;
		return $this;
	} 
	

	public function setTransactionId($TransactionId) {
		$this->TransactionId = $TransactionId;
		return $this;
	} 
	

	public function setShippingId($ShippingId) {
		$this->ShippingId = $ShippingId;
		return $this;
	} 
	

	public function setReference($Reference) {
		$this->Reference = $Reference;
		return $this;
	} 
	

	public function setStatus($Status) {
		$this->Status = $Status;
		return $this;
	} 
	

	public function setStatusShipping($StatusShipping) {
		$this->StatusShipping = $StatusShipping;
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
	

	public function setUserLastname($UserLastname) {
		$this->UserLastname = $UserLastname;
		return $this;
	} 
	

	public function setUserFirstname($UserFirstname) {
		$this->UserFirstname = $UserFirstname;
		return $this;
	} 
	

	public function setShippingLastname($ShippingLastname) {
		$this->ShippingLastname = $ShippingLastname;
		return $this;
	} 
	

	public function setShippingFirstname($ShippingFirstname) {
		$this->ShippingFirstname = $ShippingFirstname;
		return $this;
	} 
	

	public function setShippingCompany($ShippingCompany) {
		$this->ShippingCompany = $ShippingCompany;
		return $this;
	} 
	

	public function setShippingAddress($ShippingAddress) {
		$this->ShippingAddress = $ShippingAddress;
		return $this;
	} 
	

	public function setShippingZipcode($ShippingZipcode) {
		$this->ShippingZipcode = $ShippingZipcode;
		return $this;
	} 
	

	public function setShippingCity($ShippingCity) {
		$this->ShippingCity = $ShippingCity;
		return $this;
	} 
	

	public function setShippingCountry($ShippingCountry) {
		$this->ShippingCountry = $ShippingCountry;
		return $this;
	} 
	

	public function setShippingPhone($ShippingPhone) {
		$this->ShippingPhone = $ShippingPhone;
		return $this;
	} 
	

	public function setBillingLastname($BillingLastname) {
		$this->BillingLastname = $BillingLastname;
		return $this;
	} 
	

	public function setBillingFirstname($BillingFirstname) {
		$this->BillingFirstname = $BillingFirstname;
		return $this;
	} 
	

	public function setBillingCompany($BillingCompany) {
		$this->BillingCompany = $BillingCompany;
		return $this;
	} 
	

	public function setBillingAddress($BillingAddress) {
		$this->BillingAddress = $BillingAddress;
		return $this;
	} 
	

	public function setBillingZipcode($BillingZipcode) {
		$this->BillingZipcode = $BillingZipcode;
		return $this;
	} 
	

	public function setBillingCity($BillingCity) {
		$this->BillingCity = $BillingCity;
		return $this;
	} 
	

	public function setBillingCountry($BillingCountry) {
		$this->BillingCountry = $BillingCountry;
		return $this;
	} 
	

	public function setBillingPhone($BillingPhone) {
		$this->BillingPhone = $BillingPhone;
		return $this;
	} 
	

	public function setBillingRegion($BillingRegion) {
		$this->BillingRegion = $BillingRegion;
		return $this;
	} 
	

	public function setShippingRegion($ShippingRegion) {
		$this->ShippingRegion = $ShippingRegion;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 
	

	public function setVat($Vat) {
		$this->Vat = $Vat;
		return $this;
	} 
	

	public function setAmount($Amount) {
		$this->Amount = $Amount;
		return $this;
	} 
	

	public function setAmountReal($AmountReal) {
		$this->AmountReal = $AmountReal;
		return $this;
	} 
	

	public function setAmountBilling($AmountBilling) {
		$this->AmountBilling = $AmountBilling;
		return $this;
	} 
	

	public function setAmountProfit($AmountProfit) {
		$this->AmountProfit = $AmountProfit;
		return $this;
	} 
	

	public function setAmountWithShipping($AmountWithShipping) {
		$this->AmountWithShipping = $AmountWithShipping;
		return $this;
	} 
	

	public function setAmountVat($AmountVat) {
		$this->AmountVat = $AmountVat;
		return $this;
	} 
	

	public function setCount($Count) {
		$this->Count = $Count;
		return $this;
	} 
	

	public function setCurrency($Currency) {
		$this->Currency = $Currency;
		return $this;
	} 
	

	public function setShippingAmount($ShippingAmount) {
		$this->ShippingAmount = $ShippingAmount;
		return $this;
	} 
	

	public function setMethodBilling($MethodBilling) {
		$this->MethodBilling = $MethodBilling;
		return $this;
	} 
	

	public function setMethodShipping($MethodShipping) {
		$this->MethodShipping = $MethodShipping;
		return $this;
	} 
	

	public function setProducts($Products) {
		$this->Products = $Products;
		return $this;
	} 
	

	public function setMessage($Message) {
		$this->Message = $Message;
		return $this;
	} 
	

	public function setErrorLog($ErrorLog) {
		$this->ErrorLog = $ErrorLog;
		return $this;
	} 
	

	public function setHistory($History) {
		$this->History = $History;
		return $this;
	} 
	

	public function setBillingPdf($BillingPdf) {
		$this->BillingPdf = $BillingPdf;
		return $this;
	} 
	

	public function setShippingPdf($ShippingPdf) {
		$this->ShippingPdf = $ShippingPdf;
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

	public function getType() {
		return $this->Type ;
	} 

	public function getTransactionId() {
		return $this->TransactionId ;
	} 

	public function getShippingId() {
		return $this->ShippingId ;
	} 

	public function getReference() {
		return $this->Reference ;
	} 

	public function getStatus() {
		return $this->Status ;
	} 

	public function getStatusShipping() {
		return $this->StatusShipping ;
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

	public function getUserLastname() {
		return $this->UserLastname ;
	} 

	public function getUserFirstname() {
		return $this->UserFirstname ;
	} 

	public function getShippingLastname() {
		return $this->ShippingLastname ;
	} 

	public function getShippingFirstname() {
		return $this->ShippingFirstname ;
	} 

	public function getShippingCompany() {
		return $this->ShippingCompany ;
	} 

	public function getShippingAddress() {
		return $this->ShippingAddress ;
	} 

	public function getShippingZipcode() {
		return $this->ShippingZipcode ;
	} 

	public function getShippingCity() {
		return $this->ShippingCity ;
	} 

	public function getShippingCountry() {
		return $this->ShippingCountry ;
	} 

	public function getShippingPhone() {
		return $this->ShippingPhone ;
	} 

	public function getBillingLastname() {
		return $this->BillingLastname ;
	} 

	public function getBillingFirstname() {
		return $this->BillingFirstname ;
	} 

	public function getBillingCompany() {
		return $this->BillingCompany ;
	} 

	public function getBillingAddress() {
		return $this->BillingAddress ;
	} 

	public function getBillingZipcode() {
		return $this->BillingZipcode ;
	} 

	public function getBillingCity() {
		return $this->BillingCity ;
	} 

	public function getBillingCountry() {
		return $this->BillingCountry ;
	} 

	public function getBillingPhone() {
		return $this->BillingPhone ;
	} 

	public function getBillingRegion() {
		return $this->BillingRegion ;
	} 

	public function getShippingRegion() {
		return $this->ShippingRegion ;
	} 

	public function getLangue() {
		return $this->Langue ;
	} 

	public function getVat() {
		return $this->Vat ;
	} 

	public function getAmount() {
		return $this->Amount ;
	} 

	public function getAmountReal() {
		return $this->AmountReal ;
	} 

	public function getAmountBilling() {
		return $this->AmountBilling ;
	} 

	public function getAmountProfit() {
		return $this->AmountProfit ;
	} 

	public function getAmountWithShipping() {
		return $this->AmountWithShipping ;
	} 

	public function getAmountVat() {
		return $this->AmountVat ;
	} 

	public function getCount() {
		return $this->Count ;
	} 

	public function getCurrency() {
		return $this->Currency ;
	} 

	public function getShippingAmount() {
		return $this->ShippingAmount ;
	} 

	public function getMethodBilling() {
		return $this->MethodBilling ;
	} 

	public function getMethodShipping() {
		return $this->MethodShipping ;
	} 

	public function getProducts() {
		return $this->Products ;
	} 

	public function getMessage() {
		return $this->Message ;
	} 

	public function getErrorLog() {
		return $this->ErrorLog ;
	} 

	public function getHistory() {
		return $this->History ;
	} 

	public function getBillingPdf() {
		return $this->BillingPdf ;
	} 

	public function getShippingPdf() {
		return $this->ShippingPdf ;
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
		
	public function getValidationType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTransactionId() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingId() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationReference() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationStatus() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationStatusShipping() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
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
		
	public function getValidationUserLastname() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUserFirstname() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingLastname() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingFirstname() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingCompany() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingAddress() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingZipcode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingCity() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingCountry() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingPhone() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingLastname() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingFirstname() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingCompany() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingAddress() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingZipcode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingCity() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingCountry() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingPhone() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingRegion() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingRegion() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLangue() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationVat() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAmount() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAmountReal() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAmountBilling() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAmountProfit() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAmountWithShipping() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAmountVat() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCount() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCurrency() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingAmount() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMethodBilling() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMethodShipping() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationProducts() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMessage() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationErrorLog() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationHistory() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBillingPdf() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingPdf() {
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


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}