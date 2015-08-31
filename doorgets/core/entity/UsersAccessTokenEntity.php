<?php

class UsersAccessTokenEntity extends AbstractEntity
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
	protected $Token; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IsValid; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
 
	

	public function setId($Id)
	{
		
		$this->Id = $Id;

		return $this;
	} 
	

	public function setIdUser($IdUser)
	{
		
		$this->IdUser = $IdUser;

		return $this;
	} 
	

	public function setToken($Token)
	{
		
		$this->Token = $Token;

		return $this;
	} 
	

	public function setIsValid($IsValid)
	{
		
		$this->IsValid = $IsValid;

		return $this;
	} 
	

	public function setDateCreation($DateCreation)
	{
		
		$this->DateCreation = $DateCreation;

		return $this;
	} 

		
	public function getId()
	{
		return $this->Id ;
	} 
		
	public function getIdUser()
	{
		return $this->IdUser ;
	} 
		
	public function getToken()
	{
		return $this->Token ;
	} 
		
	public function getIsValid()
	{
		return $this->IsValid ;
	} 
		
	public function getDateCreation()
	{
		return $this->DateCreation ;
	} 

		
	public function getValidationId()
	{
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => true,
			'auto_increment' => true
		);
	} 
		
	public function getValidationIdUser()
	{
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationToken()
	{
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIsValid()
	{
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateCreation()
	{
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
		    'Token' =>  'token',            
		    'IsValid' =>  'is_valid',            
		    'DateCreation' =>  'date_creation',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}