<?php

class CategoriesEntity extends AbstractEntity
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
	protected $IdParent; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriModule; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $GroupeTraduction; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Ordre; 
	

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
	

	public function setIdParent($IdParent)
	{
		
		$this->IdParent = $IdParent;

		return $this;
	} 
	

	public function setUriModule($UriModule)
	{
		
		$this->UriModule = $UriModule;

		return $this;
	} 
	

	public function setGroupeTraduction($GroupeTraduction)
	{
		
		$this->GroupeTraduction = $GroupeTraduction;

		return $this;
	} 
	

	public function setOrdre($Ordre)
	{
		
		$this->Ordre = $Ordre;

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
		
	public function getIdParent()
	{
		return $this->IdParent ;
	} 
		
	public function getUriModule()
	{
		return $this->UriModule ;
	} 
		
	public function getGroupeTraduction()
	{
		return $this->GroupeTraduction ;
	} 
		
	public function getOrdre()
	{
		return $this->Ordre ;
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
		
	public function getValidationIdParent()
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
		
	public function getValidationUriModule()
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
		
	public function getValidationGroupeTraduction()
	{
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationOrdre()
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
		    'IdParent' =>  'id_parent',            
		    'UriModule' =>  'uri_module',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Ordre' =>  'ordre',            
		    'DateCreation' =>  'date_creation',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}