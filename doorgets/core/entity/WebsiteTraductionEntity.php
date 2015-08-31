<?php

class WebsiteTraductionEntity extends AbstractEntity
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
	protected $Langue; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $StatutTinymce; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Title; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Slogan; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Description; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Copyright; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Year; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Keywords; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
 
	

	public function setId($Id)
	{
		
		$this->Id = $Id;

		return $this;
	} 
	

	public function setLangue($Langue)
	{
		
		$this->Langue = $Langue;

		return $this;
	} 
	

	public function setStatutTinymce($StatutTinymce)
	{
		
		$this->StatutTinymce = $StatutTinymce;

		return $this;
	} 
	

	public function setTitle($Title)
	{
		
		$this->Title = $Title;

		return $this;
	} 
	

	public function setSlogan($Slogan)
	{
		
		$this->Slogan = $Slogan;

		return $this;
	} 
	

	public function setDescription($Description)
	{
		
		$this->Description = $Description;

		return $this;
	} 
	

	public function setCopyright($Copyright)
	{
		
		$this->Copyright = $Copyright;

		return $this;
	} 
	

	public function setYear($Year)
	{
		
		$this->Year = $Year;

		return $this;
	} 
	

	public function setKeywords($Keywords)
	{
		
		$this->Keywords = $Keywords;

		return $this;
	} 
	

	public function setDateModification($DateModification)
	{
		
		$this->DateModification = $DateModification;

		return $this;
	} 

		
	public function getId()
	{
		return $this->Id ;
	} 
		
	public function getLangue()
	{
		return $this->Langue ;
	} 
		
	public function getStatutTinymce()
	{
		return $this->StatutTinymce ;
	} 
		
	public function getTitle()
	{
		return $this->Title ;
	} 
		
	public function getSlogan()
	{
		return $this->Slogan ;
	} 
		
	public function getDescription()
	{
		return $this->Description ;
	} 
		
	public function getCopyright()
	{
		return $this->Copyright ;
	} 
		
	public function getYear()
	{
		return $this->Year ;
	} 
		
	public function getKeywords()
	{
		return $this->Keywords ;
	} 
		
	public function getDateModification()
	{
		return $this->DateModification ;
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
		
	public function getValidationLangue()
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
		
	public function getValidationStatutTinymce()
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
		
	public function getValidationTitle()
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
		
	public function getValidationSlogan()
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
		
	public function getValidationDescription()
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
		
	public function getValidationCopyright()
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
		
	public function getValidationYear()
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
		
	public function getValidationKeywords()
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
		
	public function getValidationDateModification()
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
		    'Langue' =>  'langue',            
		    'StatutTinymce' =>  'statut_tinymce',            
		    'Title' =>  'title',            
		    'Slogan' =>  'slogan',            
		    'Description' =>  'description',            
		    'Copyright' =>  'copyright',            
		    'Year' =>  'year',            
		    'Keywords' =>  'keywords',            
		    'DateModification' =>  'date_modification',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}