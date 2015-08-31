<?php

class DgBlockTraductionEntity extends AbstractEntity
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
	protected $IdBlock; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriModule; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Titre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Description; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ArticleTinymce; 
	

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
	

	public function setIdBlock($IdBlock)
	{
		
		$this->IdBlock = $IdBlock;

		return $this;
	} 
	

	public function setUriModule($UriModule)
	{
		
		$this->UriModule = $UriModule;

		return $this;
	} 
	

	public function setLangue($Langue)
	{
		
		$this->Langue = $Langue;

		return $this;
	} 
	

	public function setTitre($Titre)
	{
		
		$this->Titre = $Titre;

		return $this;
	} 
	

	public function setDescription($Description)
	{
		
		$this->Description = $Description;

		return $this;
	} 
	

	public function setArticleTinymce($ArticleTinymce)
	{
		
		$this->ArticleTinymce = $ArticleTinymce;

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
		
	public function getIdBlock()
	{
		return $this->IdBlock ;
	} 
		
	public function getUriModule()
	{
		return $this->UriModule ;
	} 
		
	public function getLangue()
	{
		return $this->Langue ;
	} 
		
	public function getTitre()
	{
		return $this->Titre ;
	} 
		
	public function getDescription()
	{
		return $this->Description ;
	} 
		
	public function getArticleTinymce()
	{
		return $this->ArticleTinymce ;
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
		
	public function getValidationIdBlock()
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
		
	public function getValidationTitre()
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
		
	public function getValidationArticleTinymce()
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
		    'IdBlock' =>  'id_block',            
		    'UriModule' =>  'uri_module',            
		    'Langue' =>  'langue',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'ArticleTinymce' =>  'article_tinymce',            
		    'DateModification' =>  'date_modification',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}