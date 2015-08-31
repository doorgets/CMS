<?php

class RubriqueEntity extends AbstractEntity
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
	* @size  : 220  
	*/
	protected $Name; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Ordre; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IdModule; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IdParent; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Showinmenu; 
	

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
	

	public function setName($Name)
	{
		
		$this->Name = $Name;

		return $this;
	} 
	

	public function setOrdre($Ordre)
	{
		
		$this->Ordre = $Ordre;

		return $this;
	} 
	

	public function setIdModule($IdModule)
	{
		
		$this->IdModule = $IdModule;

		return $this;
	} 
	

	public function setIdParent($IdParent)
	{
		
		$this->IdParent = $IdParent;

		return $this;
	} 
	

	public function setShowinmenu($Showinmenu)
	{
		
		$this->Showinmenu = $Showinmenu;

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
		
	public function getName()
	{
		return $this->Name ;
	} 
		
	public function getOrdre()
	{
		return $this->Ordre ;
	} 
		
	public function getIdModule()
	{
		return $this->IdModule ;
	} 
		
	public function getIdParent()
	{
		return $this->IdParent ;
	} 
		
	public function getShowinmenu()
	{
		return $this->Showinmenu ;
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
		
	public function getValidationName()
	{
		return array(
			'type'	         => 'varchar', 
			'size'			 => 220, 
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
		
	public function getValidationIdModule()
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
		
	public function getValidationShowinmenu()
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
		    'Name' =>  'name',            
		    'Ordre' =>  'ordre',            
		    'IdModule' =>  'idModule',            
		    'IdParent' =>  'idParent',            
		    'Showinmenu' =>  'showinmenu',            
		    'DateCreation' =>  'date_creation',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}