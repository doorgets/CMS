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

class UserFacebookEntity extends AbstractEntity
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
	protected $IdFacebook; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Name; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Email; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $FirstName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MiddleName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $LastName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Gender; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Link; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Birthday; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Location; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Timezone; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $AccessToken; 
	

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
	

	public function setIdFacebook($IdFacebook) {
		$this->IdFacebook = $IdFacebook;
		return $this;
	} 
	

	public function setName($Name) {
		$this->Name = $Name;
		return $this;
	} 
	

	public function setEmail($Email) {
		$this->Email = $Email;
		return $this;
	} 
	

	public function setFirstName($FirstName) {
		$this->FirstName = $FirstName;
		return $this;
	} 
	

	public function setMiddleName($MiddleName) {
		$this->MiddleName = $MiddleName;
		return $this;
	} 
	

	public function setLastName($LastName) {
		$this->LastName = $LastName;
		return $this;
	} 
	

	public function setGender($Gender) {
		$this->Gender = $Gender;
		return $this;
	} 
	

	public function setLink($Link) {
		$this->Link = $Link;
		return $this;
	} 
	

	public function setBirthday($Birthday) {
		$this->Birthday = $Birthday;
		return $this;
	} 
	

	public function setLocation($Location) {
		$this->Location = $Location;
		return $this;
	} 
	

	public function setTimezone($Timezone) {
		$this->Timezone = $Timezone;
		return $this;
	} 
	

	public function setAccessToken($AccessToken) {
		$this->AccessToken = $AccessToken;
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

	public function getIdFacebook() {
		return $this->IdFacebook ;
	} 

	public function getName() {
		return $this->Name ;
	} 

	public function getEmail() {
		return $this->Email ;
	} 

	public function getFirstName() {
		return $this->FirstName ;
	} 

	public function getMiddleName() {
		return $this->MiddleName ;
	} 

	public function getLastName() {
		return $this->LastName ;
	} 

	public function getGender() {
		return $this->Gender ;
	} 

	public function getLink() {
		return $this->Link ;
	} 

	public function getBirthday() {
		return $this->Birthday ;
	} 

	public function getLocation() {
		return $this->Location ;
	} 

	public function getTimezone() {
		return $this->Timezone ;
	} 

	public function getAccessToken() {
		return $this->AccessToken ;
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
		
	public function getValidationIdFacebook() {
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
		
	public function getValidationEmail() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationFirstName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMiddleName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLastName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationGender() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLink() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBirthday() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLocation() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTimezone() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAccessToken() {
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
		    'IdFacebook' =>  'id_facebook',            
		    'Name' =>  'name',            
		    'Email' =>  'email',            
		    'FirstName' =>  'first_name',            
		    'MiddleName' =>  'middle_name',            
		    'LastName' =>  'last_name',            
		    'Gender' =>  'gender',            
		    'Link' =>  'link',            
		    'Birthday' =>  'birthday',            
		    'Location' =>  'location',            
		    'Timezone' =>  'timezone',            
		    'AccessToken' =>  'access_token',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}