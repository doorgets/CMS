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

class UsersAddressEntity extends AbstractEntity
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
	protected $IdUser; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Title; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Country; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Region; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $City; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Zipcode; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Address; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Phone1; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Phone2; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Phone3; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Name; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $OtherInfo; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IsDefault; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IsBilling; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IsShipping; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdUser($IdUser) {
		$this->IdUser = $IdUser;
		return $this;
	} 
	

	public function setTitle($Title) {
		$this->Title = $Title;
		return $this;
	} 
	

	public function setCountry($Country) {
		$this->Country = $Country;
		return $this;
	} 
	

	public function setRegion($Region) {
		$this->Region = $Region;
		return $this;
	} 
	

	public function setCity($City) {
		$this->City = $City;
		return $this;
	} 
	

	public function setZipcode($Zipcode) {
		$this->Zipcode = $Zipcode;
		return $this;
	} 
	

	public function setAddress($Address) {
		$this->Address = $Address;
		return $this;
	} 
	

	public function setPhone1($Phone1) {
		$this->Phone1 = $Phone1;
		return $this;
	} 
	

	public function setPhone2($Phone2) {
		$this->Phone2 = $Phone2;
		return $this;
	} 
	

	public function setPhone3($Phone3) {
		$this->Phone3 = $Phone3;
		return $this;
	} 
	

	public function setName($Name) {
		$this->Name = $Name;
		return $this;
	} 
	

	public function setOtherInfo($OtherInfo) {
		$this->OtherInfo = $OtherInfo;
		return $this;
	} 
	

	public function setIsDefault($IsDefault) {
		$this->IsDefault = $IsDefault;
		return $this;
	} 
	

	public function setIsBilling($IsBilling) {
		$this->IsBilling = $IsBilling;
		return $this;
	} 
	

	public function setIsShipping($IsShipping) {
		$this->IsShipping = $IsShipping;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdUser() {
		return $this->IdUser ;
	} 

	public function getTitle() {
		return $this->Title ;
	} 

	public function getCountry() {
		return $this->Country ;
	} 

	public function getRegion() {
		return $this->Region ;
	} 

	public function getCity() {
		return $this->City ;
	} 

	public function getZipcode() {
		return $this->Zipcode ;
	} 

	public function getAddress() {
		return $this->Address ;
	} 

	public function getPhone1() {
		return $this->Phone1 ;
	} 

	public function getPhone2() {
		return $this->Phone2 ;
	} 

	public function getPhone3() {
		return $this->Phone3 ;
	} 

	public function getName() {
		return $this->Name ;
	} 

	public function getOtherInfo() {
		return $this->OtherInfo ;
	} 

	public function getIsDefault() {
		return $this->IsDefault ;
	} 

	public function getIsBilling() {
		return $this->IsBilling ;
	} 

	public function getIsShipping() {
		return $this->IsShipping ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
	} 

	public function getDateModification() {
		return $this->DateModification ;
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
		
	public function getValidationIdUser() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTitle() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCountry() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationRegion() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCity() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationZipcode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAddress() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPhone1() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPhone2() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPhone3() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationOtherInfo() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIsDefault() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIsBilling() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIsShipping() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
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


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'Title' =>  'title',            
		    'Country' =>  'country',            
		    'Region' =>  'region',            
		    'City' =>  'city',            
		    'Zipcode' =>  'zipcode',            
		    'Address' =>  'address',            
		    'Phone1' =>  'phone1',            
		    'Phone2' =>  'phone2',            
		    'Phone3' =>  'phone3',            
		    'Name' =>  'name',            
		    'OtherInfo' =>  'other_info',            
		    'IsDefault' =>  'is_default',            
		    'IsBilling' =>  'is_billing',            
		    'IsShipping' =>  'is_shipping',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}