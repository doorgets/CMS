<?php

class UsersGroupesEntity extends AbstractEntity
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
	protected $Uri; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeWidget; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModule; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleLimit; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleList; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleShow; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleAdd; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleEdit; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleDelete; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleModo; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleAdmin; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleInterne; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeModuleInterneModo; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeEnfant; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeEnfantModo; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ListeParent; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $CanSubscribe; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $EditorCkeditor; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $EditorTinymce; 
	

	/**
	* @type  : int
	* @size  : 255  
	*/
	protected $DateCreation; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $GroupeTraduction; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Attributes; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Payment; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PaymentAmountMonth; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PaymentGroupExpired; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PaymentTranche; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PaymentGroupUpgrade; 
 
	

	public function setId($Id)
	{
		
		$this->Id = $Id;

		return $this;
	} 
	

	public function setUri($Uri)
	{
		
		$this->Uri = $Uri;

		return $this;
	} 
	

	public function setListeWidget($ListeWidget)
	{
		
		$this->ListeWidget = $ListeWidget;

		return $this;
	} 
	

	public function setListeModule($ListeModule)
	{
		
		$this->ListeModule = $ListeModule;

		return $this;
	} 
	

	public function setListeModuleLimit($ListeModuleLimit)
	{
		
		$this->ListeModuleLimit = $ListeModuleLimit;

		return $this;
	} 
	

	public function setListeModuleList($ListeModuleList)
	{
		
		$this->ListeModuleList = $ListeModuleList;

		return $this;
	} 
	

	public function setListeModuleShow($ListeModuleShow)
	{
		
		$this->ListeModuleShow = $ListeModuleShow;

		return $this;
	} 
	

	public function setListeModuleAdd($ListeModuleAdd)
	{
		
		$this->ListeModuleAdd = $ListeModuleAdd;

		return $this;
	} 
	

	public function setListeModuleEdit($ListeModuleEdit)
	{
		
		$this->ListeModuleEdit = $ListeModuleEdit;

		return $this;
	} 
	

	public function setListeModuleDelete($ListeModuleDelete)
	{
		
		$this->ListeModuleDelete = $ListeModuleDelete;

		return $this;
	} 
	

	public function setListeModuleModo($ListeModuleModo)
	{
		
		$this->ListeModuleModo = $ListeModuleModo;

		return $this;
	} 
	

	public function setListeModuleAdmin($ListeModuleAdmin)
	{
		
		$this->ListeModuleAdmin = $ListeModuleAdmin;

		return $this;
	} 
	

	public function setListeModuleInterne($ListeModuleInterne)
	{
		
		$this->ListeModuleInterne = $ListeModuleInterne;

		return $this;
	} 
	

	public function setListeModuleInterneModo($ListeModuleInterneModo)
	{
		
		$this->ListeModuleInterneModo = $ListeModuleInterneModo;

		return $this;
	} 
	

	public function setListeEnfant($ListeEnfant)
	{
		
		$this->ListeEnfant = $ListeEnfant;

		return $this;
	} 
	

	public function setListeEnfantModo($ListeEnfantModo)
	{
		
		$this->ListeEnfantModo = $ListeEnfantModo;

		return $this;
	} 
	

	public function setListeParent($ListeParent)
	{
		
		$this->ListeParent = $ListeParent;

		return $this;
	} 
	

	public function setCanSubscribe($CanSubscribe)
	{
		
		$this->CanSubscribe = $CanSubscribe;

		return $this;
	} 
	

	public function setEditorCkeditor($EditorCkeditor)
	{
		
		$this->EditorCkeditor = $EditorCkeditor;

		return $this;
	} 
	

	public function setEditorTinymce($EditorTinymce)
	{
		
		$this->EditorTinymce = $EditorTinymce;

		return $this;
	} 
	

	public function setDateCreation($DateCreation)
	{
		
		$this->DateCreation = $DateCreation;

		return $this;
	} 
	

	public function setGroupeTraduction($GroupeTraduction)
	{
		
		$this->GroupeTraduction = $GroupeTraduction;

		return $this;
	} 
	

	public function setAttributes($Attributes)
	{
		
		$this->Attributes = $Attributes;

		return $this;
	} 
	

	public function setPayment($Payment)
	{
		
		$this->Payment = $Payment;

		return $this;
	} 
	

	public function setPaymentAmountMonth($PaymentAmountMonth)
	{
		
		$this->PaymentAmountMonth = $PaymentAmountMonth;

		return $this;
	} 
	

	public function setPaymentGroupExpired($PaymentGroupExpired)
	{
		
		$this->PaymentGroupExpired = $PaymentGroupExpired;

		return $this;
	} 
	

	public function setPaymentTranche($PaymentTranche)
	{
		
		$this->PaymentTranche = $PaymentTranche;

		return $this;
	} 
	

	public function setPaymentGroupUpgrade($PaymentGroupUpgrade)
	{
		
		$this->PaymentGroupUpgrade = $PaymentGroupUpgrade;

		return $this;
	} 

		
	public function getId()
	{
		return $this->Id ;
	} 
		
	public function getUri()
	{
		return $this->Uri ;
	} 
		
	public function getListeWidget()
	{
		return $this->ListeWidget ;
	} 
		
	public function getListeModule()
	{
		return $this->ListeModule ;
	} 
		
	public function getListeModuleLimit()
	{
		return $this->ListeModuleLimit ;
	} 
		
	public function getListeModuleList()
	{
		return $this->ListeModuleList ;
	} 
		
	public function getListeModuleShow()
	{
		return $this->ListeModuleShow ;
	} 
		
	public function getListeModuleAdd()
	{
		return $this->ListeModuleAdd ;
	} 
		
	public function getListeModuleEdit()
	{
		return $this->ListeModuleEdit ;
	} 
		
	public function getListeModuleDelete()
	{
		return $this->ListeModuleDelete ;
	} 
		
	public function getListeModuleModo()
	{
		return $this->ListeModuleModo ;
	} 
		
	public function getListeModuleAdmin()
	{
		return $this->ListeModuleAdmin ;
	} 
		
	public function getListeModuleInterne()
	{
		return $this->ListeModuleInterne ;
	} 
		
	public function getListeModuleInterneModo()
	{
		return $this->ListeModuleInterneModo ;
	} 
		
	public function getListeEnfant()
	{
		return $this->ListeEnfant ;
	} 
		
	public function getListeEnfantModo()
	{
		return $this->ListeEnfantModo ;
	} 
		
	public function getListeParent()
	{
		return $this->ListeParent ;
	} 
		
	public function getCanSubscribe()
	{
		return $this->CanSubscribe ;
	} 
		
	public function getEditorCkeditor()
	{
		return $this->EditorCkeditor ;
	} 
		
	public function getEditorTinymce()
	{
		return $this->EditorTinymce ;
	} 
		
	public function getDateCreation()
	{
		return $this->DateCreation ;
	} 
		
	public function getGroupeTraduction()
	{
		return $this->GroupeTraduction ;
	} 
		
	public function getAttributes()
	{
		return $this->Attributes ;
	} 
		
	public function getPayment()
	{
		return $this->Payment ;
	} 
		
	public function getPaymentAmountMonth()
	{
		return $this->PaymentAmountMonth ;
	} 
		
	public function getPaymentGroupExpired()
	{
		return $this->PaymentGroupExpired ;
	} 
		
	public function getPaymentTranche()
	{
		return $this->PaymentTranche ;
	} 
		
	public function getPaymentGroupUpgrade()
	{
		return $this->PaymentGroupUpgrade ;
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
		
	public function getValidationUri()
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
		
	public function getValidationListeWidget()
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
		
	public function getValidationListeModule()
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
		
	public function getValidationListeModuleLimit()
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
		
	public function getValidationListeModuleList()
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
		
	public function getValidationListeModuleShow()
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
		
	public function getValidationListeModuleAdd()
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
		
	public function getValidationListeModuleEdit()
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
		
	public function getValidationListeModuleDelete()
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
		
	public function getValidationListeModuleModo()
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
		
	public function getValidationListeModuleAdmin()
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
		
	public function getValidationListeModuleInterne()
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
		
	public function getValidationListeModuleInterneModo()
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
		
	public function getValidationListeEnfant()
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
		
	public function getValidationListeEnfantModo()
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
		
	public function getValidationListeParent()
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
		
	public function getValidationCanSubscribe()
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
		
	public function getValidationEditorCkeditor()
	{
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationEditorTinymce()
	{
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
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
		
	public function getValidationAttributes()
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
		
	public function getValidationPayment()
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
		
	public function getValidationPaymentAmountMonth()
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
		
	public function getValidationPaymentGroupExpired()
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
		
	public function getValidationPaymentTranche()
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
		
	public function getValidationPaymentGroupUpgrade()
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
		    'Uri' =>  'uri',            
		    'ListeWidget' =>  'liste_widget',            
		    'ListeModule' =>  'liste_module',            
		    'ListeModuleLimit' =>  'liste_module_limit',            
		    'ListeModuleList' =>  'liste_module_list',            
		    'ListeModuleShow' =>  'liste_module_show',            
		    'ListeModuleAdd' =>  'liste_module_add',            
		    'ListeModuleEdit' =>  'liste_module_edit',            
		    'ListeModuleDelete' =>  'liste_module_delete',            
		    'ListeModuleModo' =>  'liste_module_modo',            
		    'ListeModuleAdmin' =>  'liste_module_admin',            
		    'ListeModuleInterne' =>  'liste_module_interne',            
		    'ListeModuleInterneModo' =>  'liste_module_interne_modo',            
		    'ListeEnfant' =>  'liste_enfant',            
		    'ListeEnfantModo' =>  'liste_enfant_modo',            
		    'ListeParent' =>  'liste_parent',            
		    'CanSubscribe' =>  'can_subscribe',            
		    'EditorCkeditor' =>  'editor_ckeditor',            
		    'EditorTinymce' =>  'editor_tinymce',            
		    'DateCreation' =>  'date_creation',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Attributes' =>  'attributes',            
		    'Payment' =>  'payment',            
		    'PaymentAmountMonth' =>  'payment_amount_month',            
		    'PaymentGroupExpired' =>  'payment_group_expired',            
		    'PaymentTranche' =>  'payment_tranche',            
		    'PaymentGroupUpgrade' =>  'payment_group_upgrade',		
		)); 

	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}