<?php

class DgNewsletterEmaillingCampagneEntity extends AbstractEntity
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
	protected $IdUserGroupe; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IdGroupe; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IdModels; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Statut; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Titre; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Description; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Message; 
	

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
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateValidation; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateEnvoi; 
 
	

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
	

	public function setIdUserGroupe($IdUserGroupe)
	{
		
		$this->IdUserGroupe = $IdUserGroupe;

		return $this;
	} 
	

	public function setIdGroupe($IdGroupe)
	{
		
		$this->IdGroupe = $IdGroupe;

		return $this;
	} 
	

	public function setIdModels($IdModels)
	{
		
		$this->IdModels = $IdModels;

		return $this;
	} 
	

	public function setStatut($Statut)
	{
		
		$this->Statut = $Statut;

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
	

	public function setMessage($Message)
	{
		
		$this->Message = $Message;

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
	

	public function setDateValidation($DateValidation)
	{
		
		$this->DateValidation = $DateValidation;

		return $this;
	} 
	

	public function setDateEnvoi($DateEnvoi)
	{
		
		$this->DateEnvoi = $DateEnvoi;

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
		
	public function getIdUserGroupe()
	{
		return $this->IdUserGroupe ;
	} 
		
	public function getIdGroupe()
	{
		return $this->IdGroupe ;
	} 
		
	public function getIdModels()
	{
		return $this->IdModels ;
	} 
		
	public function getStatut()
	{
		return $this->Statut ;
	} 
		
	public function getTitre()
	{
		return $this->Titre ;
	} 
		
	public function getDescription()
	{
		return $this->Description ;
	} 
		
	public function getMessage()
	{
		return $this->Message ;
	} 
		
	public function getDateCreation()
	{
		return $this->DateCreation ;
	} 
		
	public function getDateModification()
	{
		return $this->DateModification ;
	} 
		
	public function getDateValidation()
	{
		return $this->DateValidation ;
	} 
		
	public function getDateEnvoi()
	{
		return $this->DateEnvoi ;
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
		
	public function getValidationIdUserGroupe()
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
		
	public function getValidationIdGroupe()
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
		
	public function getValidationIdModels()
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
		
	public function getValidationStatut()
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
			'type'	         => 'text', 
			'size'			 => 0, 
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
		
	public function getValidationMessage()
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
		
	public function getValidationDateValidation()
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
		
	public function getValidationDateEnvoi()
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
		    'IdUserGroupe' =>  'id_user_groupe',            
		    'IdGroupe' =>  'id_groupe',            
		    'IdModels' =>  'id_models',            
		    'Statut' =>  'statut',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'Message' =>  'message',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',            
		    'DateValidation' =>  'date_validation',            
		    'DateEnvoi' =>  'date_envoi',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}