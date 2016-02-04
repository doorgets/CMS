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

class UserGoogleEntity extends AbstractEntity
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
	protected $IdGoogle; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Email; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $VerifiedEmail; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Name; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $GivenName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $FamilyName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Link; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Picture; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Gender; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Locale; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $AccessToken; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $RefreshToken; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $UserData; 
	

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
	

	public function setIdGoogle($IdGoogle) {
		$this->IdGoogle = $IdGoogle;
		return $this;
	} 
	

	public function setEmail($Email) {
		$this->Email = $Email;
		return $this;
	} 
	

	public function setVerifiedEmail($VerifiedEmail) {
		$this->VerifiedEmail = $VerifiedEmail;
		return $this;
	} 
	

	public function setName($Name) {
		$this->Name = $Name;
		return $this;
	} 
	

	public function setGivenName($GivenName) {
		$this->GivenName = $GivenName;
		return $this;
	} 
	

	public function setFamilyName($FamilyName) {
		$this->FamilyName = $FamilyName;
		return $this;
	} 
	

	public function setLink($Link) {
		$this->Link = $Link;
		return $this;
	} 
	

	public function setPicture($Picture) {
		$this->Picture = $Picture;
		return $this;
	} 
	

	public function setGender($Gender) {
		$this->Gender = $Gender;
		return $this;
	} 
	

	public function setLocale($Locale) {
		$this->Locale = $Locale;
		return $this;
	} 
	

	public function setAccessToken($AccessToken) {
		$this->AccessToken = $AccessToken;
		return $this;
	} 
	

	public function setRefreshToken($RefreshToken) {
		$this->RefreshToken = $RefreshToken;
		return $this;
	} 
	

	public function setUserData($UserData) {
		$this->UserData = $UserData;
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

	public function getIdGoogle() {
		return $this->IdGoogle ;
	} 

	public function getEmail() {
		return $this->Email ;
	} 

	public function getVerifiedEmail() {
		return $this->VerifiedEmail ;
	} 

	public function getName() {
		return $this->Name ;
	} 

	public function getGivenName() {
		return $this->GivenName ;
	} 

	public function getFamilyName() {
		return $this->FamilyName ;
	} 

	public function getLink() {
		return $this->Link ;
	} 

	public function getPicture() {
		return $this->Picture ;
	} 

	public function getGender() {
		return $this->Gender ;
	} 

	public function getLocale() {
		return $this->Locale ;
	} 

	public function getAccessToken() {
		return $this->AccessToken ;
	} 

	public function getRefreshToken() {
		return $this->RefreshToken ;
	} 

	public function getUserData() {
		return $this->UserData ;
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
		
	public function getValidationIdGoogle() {
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
		
	public function getValidationVerifiedEmail() {
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
		
	public function getValidationGivenName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationFamilyName() {
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
		
	public function getValidationPicture() {
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
		
	public function getValidationLocale() {
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
		
	public function getValidationRefreshToken() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUserData() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
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
		    'IdGoogle' =>  'id_google',            
		    'Email' =>  'email',            
		    'VerifiedEmail' =>  'verified_email',            
		    'Name' =>  'name',            
		    'GivenName' =>  'given_name',            
		    'FamilyName' =>  'family_name',            
		    'Link' =>  'link',            
		    'Picture' =>  'picture',            
		    'Gender' =>  'gender',            
		    'Locale' =>  'locale',            
		    'AccessToken' =>  'access_token',            
		    'RefreshToken' =>  'refresh_token',            
		    'UserData' =>  'user_data',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}