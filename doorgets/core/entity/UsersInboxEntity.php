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

class UsersInboxEntity extends AbstractEntity
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
	* @type  : int
	* @size  : 11  
	*/
	protected $IdUserSent; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $PseudoUser; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $PseudoUserSent; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $UserDelete; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $UserSentDelete; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Email; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Phone; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Name; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Subject; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Message; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $Readed; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateReaded; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateDeleted; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateSentDeleted; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdUser($IdUser) {
		$this->IdUser = $IdUser;
		return $this;
	} 
	

	public function setIdUserSent($IdUserSent) {
		$this->IdUserSent = $IdUserSent;
		return $this;
	} 
	

	public function setPseudoUser($PseudoUser) {
		$this->PseudoUser = $PseudoUser;
		return $this;
	} 
	

	public function setPseudoUserSent($PseudoUserSent) {
		$this->PseudoUserSent = $PseudoUserSent;
		return $this;
	} 
	

	public function setUserDelete($UserDelete) {
		$this->UserDelete = $UserDelete;
		return $this;
	} 
	

	public function setUserSentDelete($UserSentDelete) {
		$this->UserSentDelete = $UserSentDelete;
		return $this;
	} 
	

	public function setEmail($Email) {
		$this->Email = $Email;
		return $this;
	} 
	

	public function setPhone($Phone) {
		$this->Phone = $Phone;
		return $this;
	} 
	

	public function setName($Name) {
		$this->Name = $Name;
		return $this;
	} 
	

	public function setSubject($Subject) {
		$this->Subject = $Subject;
		return $this;
	} 
	

	public function setMessage($Message) {
		$this->Message = $Message;
		return $this;
	} 
	

	public function setReaded($Readed) {
		$this->Readed = $Readed;
		return $this;
	} 
	

	public function setDateReaded($DateReaded) {
		$this->DateReaded = $DateReaded;
		return $this;
	} 
	

	public function setDateDeleted($DateDeleted) {
		$this->DateDeleted = $DateDeleted;
		return $this;
	} 
	

	public function setDateSentDeleted($DateSentDeleted) {
		$this->DateSentDeleted = $DateSentDeleted;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdUser() {
		return $this->IdUser ;
	} 

	public function getIdUserSent() {
		return $this->IdUserSent ;
	} 

	public function getPseudoUser() {
		return $this->PseudoUser ;
	} 

	public function getPseudoUserSent() {
		return $this->PseudoUserSent ;
	} 

	public function getUserDelete() {
		return $this->UserDelete ;
	} 

	public function getUserSentDelete() {
		return $this->UserSentDelete ;
	} 

	public function getEmail() {
		return $this->Email ;
	} 

	public function getPhone() {
		return $this->Phone ;
	} 

	public function getName() {
		return $this->Name ;
	} 

	public function getSubject() {
		return $this->Subject ;
	} 

	public function getMessage() {
		return $this->Message ;
	} 

	public function getReaded() {
		return $this->Readed ;
	} 

	public function getDateReaded() {
		return $this->DateReaded ;
	} 

	public function getDateDeleted() {
		return $this->DateDeleted ;
	} 

	public function getDateSentDeleted() {
		return $this->DateSentDeleted ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
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
		
	public function getValidationIdUserSent() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPseudoUser() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPseudoUserSent() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUserDelete() {
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUserSentDelete() {
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
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
		
	public function getValidationPhone() {
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
		
	public function getValidationSubject() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
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
		
	public function getValidationReaded() {
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateReaded() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateDeleted() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateSentDeleted() {
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


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdUserSent' =>  'id_user_sent',            
		    'PseudoUser' =>  'pseudo_user',            
		    'PseudoUserSent' =>  'pseudo_user_sent',            
		    'UserDelete' =>  'user_delete',            
		    'UserSentDelete' =>  'user_sent_delete',            
		    'Email' =>  'email',            
		    'Phone' =>  'phone',            
		    'Name' =>  'name',            
		    'Subject' =>  'subject',            
		    'Message' =>  'message',            
		    'Readed' =>  'readed',            
		    'DateReaded' =>  'date_readed',            
		    'DateDeleted' =>  'date_deleted',            
		    'DateSentDeleted' =>  'date_sent_deleted',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}