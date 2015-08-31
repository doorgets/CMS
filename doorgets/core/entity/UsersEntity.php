<?php

class UsersEntity extends AbstractEntity
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
	protected $Login; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Password; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Token; 
 
	

	public function setId($Id)
	{
		
		$this->Id = $Id;

		return $this;
	} 
	

	public function setLogin($Login)
	{
		
		$this->Login = $Login;

		return $this;
	} 
	

	public function setPassword($Password)
	{
		
		$this->Password = $Password;

		return $this;
	} 
	

	public function setToken($Token)
	{
		
		$this->Token = $Token;

		return $this;
	} 

		
	public function getId()
	{
		return $this->Id ;
	} 
		
	public function getLogin()
	{
		return $this->Login ;
	} 
		
	public function getPassword()
	{
		return $this->Password ;
	} 
		
	public function getToken()
	{
		return $this->Token ;
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
		
	public function getValidationLogin()
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
		
	public function getValidationPassword()
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

	

	public function _getMap() { 

		
		$parentMap = parent::_getMap();

		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Login' =>  'login',            
		    'Password' =>  'password',            
		    'Token' =>  'token',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}