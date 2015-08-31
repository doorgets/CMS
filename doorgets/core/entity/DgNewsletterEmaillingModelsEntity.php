<?php

class DgNewsletterEmaillingModelsEntity extends AbstractEntity
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
	protected $Titre; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Description; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Format; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Sujet; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ArticleTinymce; 
	

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
 
	

	public function setId($Id)
	{
		
		$this->Id = $Id;

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
	

	public function setLangue($Langue)
	{
		
		$this->Langue = $Langue;

		return $this;
	} 
	

	public function setFormat($Format)
	{
		
		$this->Format = $Format;

		return $this;
	} 
	

	public function setSujet($Sujet)
	{
		
		$this->Sujet = $Sujet;

		return $this;
	} 
	

	public function setArticleTinymce($ArticleTinymce)
	{
		
		$this->ArticleTinymce = $ArticleTinymce;

		return $this;
	} 
	

	public function setDateCreation($DateCreation)
	{
		
		$this->DateCreation = $DateCreation;

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
		
	public function getTitre()
	{
		return $this->Titre ;
	} 
		
	public function getDescription()
	{
		return $this->Description ;
	} 
		
	public function getLangue()
	{
		return $this->Langue ;
	} 
		
	public function getFormat()
	{
		return $this->Format ;
	} 
		
	public function getSujet()
	{
		return $this->Sujet ;
	} 
		
	public function getArticleTinymce()
	{
		return $this->ArticleTinymce ;
	} 
		
	public function getDateCreation()
	{
		return $this->DateCreation ;
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
			'type'	         => 'text', 
			'size'			 => 0, 
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
		
	public function getValidationFormat()
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
		
	public function getValidationSujet()
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
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'Langue' =>  'langue',            
		    'Format' =>  'format',            
		    'Sujet' =>  'sujet',            
		    'ArticleTinymce' =>  'article_tinymce',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}