<?php

class ModulesTraductionEntity extends AbstractEntity
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
	protected $IdModule; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Nom; 
	

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
	protected $SendMailTo; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $TopTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $BottomTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Extras; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailUser; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailEmail; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $SendMailSujet; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $SendMailMessage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTitre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaDescription; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaKeys; 
	

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
	

	public function setIdModule($IdModule)
	{
		
		$this->IdModule = $IdModule;

		return $this;
	} 
	

	public function setLangue($Langue)
	{
		
		$this->Langue = $Langue;

		return $this;
	} 
	

	public function setNom($Nom)
	{
		
		$this->Nom = $Nom;

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
	

	public function setSendMailTo($SendMailTo)
	{
		
		$this->SendMailTo = $SendMailTo;

		return $this;
	} 
	

	public function setTopTinymce($TopTinymce)
	{
		
		$this->TopTinymce = $TopTinymce;

		return $this;
	} 
	

	public function setBottomTinymce($BottomTinymce)
	{
		
		$this->BottomTinymce = $BottomTinymce;

		return $this;
	} 
	

	public function setExtras($Extras)
	{
		
		$this->Extras = $Extras;

		return $this;
	} 
	

	public function setSendMailUser($SendMailUser)
	{
		
		$this->SendMailUser = $SendMailUser;

		return $this;
	} 
	

	public function setSendMailName($SendMailName)
	{
		
		$this->SendMailName = $SendMailName;

		return $this;
	} 
	

	public function setSendMailEmail($SendMailEmail)
	{
		
		$this->SendMailEmail = $SendMailEmail;

		return $this;
	} 
	

	public function setSendMailSujet($SendMailSujet)
	{
		
		$this->SendMailSujet = $SendMailSujet;

		return $this;
	} 
	

	public function setSendMailMessage($SendMailMessage)
	{
		
		$this->SendMailMessage = $SendMailMessage;

		return $this;
	} 
	

	public function setMetaTitre($MetaTitre)
	{
		
		$this->MetaTitre = $MetaTitre;

		return $this;
	} 
	

	public function setMetaDescription($MetaDescription)
	{
		
		$this->MetaDescription = $MetaDescription;

		return $this;
	} 
	

	public function setMetaKeys($MetaKeys)
	{
		
		$this->MetaKeys = $MetaKeys;

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
		
	public function getIdModule()
	{
		return $this->IdModule ;
	} 
		
	public function getLangue()
	{
		return $this->Langue ;
	} 
		
	public function getNom()
	{
		return $this->Nom ;
	} 
		
	public function getTitre()
	{
		return $this->Titre ;
	} 
		
	public function getDescription()
	{
		return $this->Description ;
	} 
		
	public function getSendMailTo()
	{
		return $this->SendMailTo ;
	} 
		
	public function getTopTinymce()
	{
		return $this->TopTinymce ;
	} 
		
	public function getBottomTinymce()
	{
		return $this->BottomTinymce ;
	} 
		
	public function getExtras()
	{
		return $this->Extras ;
	} 
		
	public function getSendMailUser()
	{
		return $this->SendMailUser ;
	} 
		
	public function getSendMailName()
	{
		return $this->SendMailName ;
	} 
		
	public function getSendMailEmail()
	{
		return $this->SendMailEmail ;
	} 
		
	public function getSendMailSujet()
	{
		return $this->SendMailSujet ;
	} 
		
	public function getSendMailMessage()
	{
		return $this->SendMailMessage ;
	} 
		
	public function getMetaTitre()
	{
		return $this->MetaTitre ;
	} 
		
	public function getMetaDescription()
	{
		return $this->MetaDescription ;
	} 
		
	public function getMetaKeys()
	{
		return $this->MetaKeys ;
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
		
	public function getValidationNom()
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
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendMailTo()
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
		
	public function getValidationTopTinymce()
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
		
	public function getValidationBottomTinymce()
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
		
	public function getValidationExtras()
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
		
	public function getValidationSendMailUser()
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
		
	public function getValidationSendMailName()
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
		
	public function getValidationSendMailEmail()
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
		
	public function getValidationSendMailSujet()
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
		
	public function getValidationSendMailMessage()
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
		
	public function getValidationMetaTitre()
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
		
	public function getValidationMetaDescription()
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
		
	public function getValidationMetaKeys()
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
		    'IdModule' =>  'id_module',            
		    'Langue' =>  'langue',            
		    'Nom' =>  'nom',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'SendMailTo' =>  'send_mail_to',            
		    'TopTinymce' =>  'top_tinymce',            
		    'BottomTinymce' =>  'bottom_tinymce',            
		    'Extras' =>  'extras',            
		    'SendMailUser' =>  'send_mail_user',            
		    'SendMailName' =>  'send_mail_name',            
		    'SendMailEmail' =>  'send_mail_email',            
		    'SendMailSujet' =>  'send_mail_sujet',            
		    'SendMailMessage' =>  'send_mail_message',            
		    'MetaTitre' =>  'meta_titre',            
		    'MetaDescription' =>  'meta_description',            
		    'MetaKeys' =>  'meta_keys',            
		    'DateModification' =>  'date_modification',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}