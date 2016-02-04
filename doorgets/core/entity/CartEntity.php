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

class CartEntity extends AbstractEntity
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
	protected $Status; 
	

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
	* @type  : decimal
	* @size  : 7  
	*/
	protected $Vat; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $OrderId; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $CurrencyAfter; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $CurrencyBefore; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingAmount; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $CurrencyCode; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Products; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $TotalAmount; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $TotalAmountVat; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

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
	

	public function setStatus($Status) {
		$this->Status = $Status;
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
	

	public function setVat($Vat) {
		$this->Vat = $Vat;
		return $this;
	} 
	

	public function setOrderId($OrderId) {
		$this->OrderId = $OrderId;
		return $this;
	} 
	

	public function setCurrencyAfter($CurrencyAfter) {
		$this->CurrencyAfter = $CurrencyAfter;
		return $this;
	} 
	

	public function setCurrencyBefore($CurrencyBefore) {
		$this->CurrencyBefore = $CurrencyBefore;
		return $this;
	} 
	

	public function setShippingAmount($ShippingAmount) {
		$this->ShippingAmount = $ShippingAmount;
		return $this;
	} 
	

	public function setCurrencyCode($CurrencyCode) {
		$this->CurrencyCode = $CurrencyCode;
		return $this;
	} 
	

	public function setProducts($Products) {
		$this->Products = $Products;
		return $this;
	} 
	

	public function setTotalAmount($TotalAmount) {
		$this->TotalAmount = $TotalAmount;
		return $this;
	} 
	

	public function setTotalAmountVat($TotalAmountVat) {
		$this->TotalAmountVat = $TotalAmountVat;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
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

	public function getStatus() {
		return $this->Status ;
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

	public function getVat() {
		return $this->Vat ;
	} 

	public function getOrderId() {
		return $this->OrderId ;
	} 

	public function getCurrencyAfter() {
		return $this->CurrencyAfter ;
	} 

	public function getCurrencyBefore() {
		return $this->CurrencyBefore ;
	} 

	public function getShippingAmount() {
		return $this->ShippingAmount ;
	} 

	public function getCurrencyCode() {
		return $this->CurrencyCode ;
	} 

	public function getProducts() {
		return $this->Products ;
	} 

	public function getTotalAmount() {
		return $this->TotalAmount ;
	} 

	public function getTotalAmountVat() {
		return $this->TotalAmountVat ;
	} 

	public function getLangue() {
		return $this->Langue ;
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
		
	public function getValidationVat() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationOrderId() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCurrencyAfter() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCurrencyBefore() {
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
		
	public function getValidationCurrencyCode() {
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
		
	public function getValidationTotalAmount() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTotalAmountVat() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
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


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}