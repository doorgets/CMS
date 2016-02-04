<?php 

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/

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
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Currency; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $StatutTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $CguTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $TermsTinymce; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $PrivacyTinymce; 
	

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
	* @type  : text
	* @size  : 0  
	*/
	protected $SignatureTinymce; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $ShippingFreeActive; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $ShippingSlowActive; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $ShippingFastActive; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingFreeInfo; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingSlowInfo; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ShippingFastInfo; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $ShippingSlowAmount; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $ShippingFastAmount; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $StoreVat; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 
	

	public function setCurrency($Currency) {
		$this->Currency = $Currency;
		return $this;
	} 
	

	public function setStatutTinymce($StatutTinymce) {
		$this->StatutTinymce = $StatutTinymce;
		return $this;
	} 
	

	public function setCguTinymce($CguTinymce) {
		$this->CguTinymce = $CguTinymce;
		return $this;
	} 
	

	public function setTermsTinymce($TermsTinymce) {
		$this->TermsTinymce = $TermsTinymce;
		return $this;
	} 
	

	public function setPrivacyTinymce($PrivacyTinymce) {
		$this->PrivacyTinymce = $PrivacyTinymce;
		return $this;
	} 
	

	public function setTitle($Title) {
		$this->Title = $Title;
		return $this;
	} 
	

	public function setSlogan($Slogan) {
		$this->Slogan = $Slogan;
		return $this;
	} 
	

	public function setDescription($Description) {
		$this->Description = $Description;
		return $this;
	} 
	

	public function setCopyright($Copyright) {
		$this->Copyright = $Copyright;
		return $this;
	} 
	

	public function setYear($Year) {
		$this->Year = $Year;
		return $this;
	} 
	

	public function setKeywords($Keywords) {
		$this->Keywords = $Keywords;
		return $this;
	} 
	

	public function setSignatureTinymce($SignatureTinymce) {
		$this->SignatureTinymce = $SignatureTinymce;
		return $this;
	} 
	

	public function setShippingFreeActive($ShippingFreeActive) {
		$this->ShippingFreeActive = $ShippingFreeActive;
		return $this;
	} 
	

	public function setShippingSlowActive($ShippingSlowActive) {
		$this->ShippingSlowActive = $ShippingSlowActive;
		return $this;
	} 
	

	public function setShippingFastActive($ShippingFastActive) {
		$this->ShippingFastActive = $ShippingFastActive;
		return $this;
	} 
	

	public function setShippingFreeInfo($ShippingFreeInfo) {
		$this->ShippingFreeInfo = $ShippingFreeInfo;
		return $this;
	} 
	

	public function setShippingSlowInfo($ShippingSlowInfo) {
		$this->ShippingSlowInfo = $ShippingSlowInfo;
		return $this;
	} 
	

	public function setShippingFastInfo($ShippingFastInfo) {
		$this->ShippingFastInfo = $ShippingFastInfo;
		return $this;
	} 
	

	public function setShippingSlowAmount($ShippingSlowAmount) {
		$this->ShippingSlowAmount = $ShippingSlowAmount;
		return $this;
	} 
	

	public function setShippingFastAmount($ShippingFastAmount) {
		$this->ShippingFastAmount = $ShippingFastAmount;
		return $this;
	} 
	

	public function setStoreVat($StoreVat) {
		$this->StoreVat = $StoreVat;
		return $this;
	} 
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getLangue() {
		return $this->Langue ;
	} 

	public function getCurrency() {
		return $this->Currency ;
	} 

	public function getStatutTinymce() {
		return $this->StatutTinymce ;
	} 

	public function getCguTinymce() {
		return $this->CguTinymce ;
	} 

	public function getTermsTinymce() {
		return $this->TermsTinymce ;
	} 

	public function getPrivacyTinymce() {
		return $this->PrivacyTinymce ;
	} 

	public function getTitle() {
		return $this->Title ;
	} 

	public function getSlogan() {
		return $this->Slogan ;
	} 

	public function getDescription() {
		return $this->Description ;
	} 

	public function getCopyright() {
		return $this->Copyright ;
	} 

	public function getYear() {
		return $this->Year ;
	} 

	public function getKeywords() {
		return $this->Keywords ;
	} 

	public function getSignatureTinymce() {
		return $this->SignatureTinymce ;
	} 

	public function getShippingFreeActive() {
		return $this->ShippingFreeActive ;
	} 

	public function getShippingSlowActive() {
		return $this->ShippingSlowActive ;
	} 

	public function getShippingFastActive() {
		return $this->ShippingFastActive ;
	} 

	public function getShippingFreeInfo() {
		return $this->ShippingFreeInfo ;
	} 

	public function getShippingSlowInfo() {
		return $this->ShippingSlowInfo ;
	} 

	public function getShippingFastInfo() {
		return $this->ShippingFastInfo ;
	} 

	public function getShippingSlowAmount() {
		return $this->ShippingSlowAmount ;
	} 

	public function getShippingFastAmount() {
		return $this->ShippingFastAmount ;
	} 

	public function getStoreVat() {
		return $this->StoreVat ;
	} 

	public function getDateModification() {
		return $this->DateModification ;
	} 

		
	public function getValidationId() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => true,
			'auto_increment' => true
		);
	} 
		
	public function getValidationLangue() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCurrency() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationStatutTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCguTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTermsTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPrivacyTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTitle() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSlogan() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCopyright() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationYear() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationKeywords() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSignatureTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingFreeActive() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingSlowActive() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingFastActive() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingFreeInfo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingSlowInfo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingFastInfo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingSlowAmount() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShippingFastAmount() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationStoreVat() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateModification() {
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
		    'Currency' =>  'currency',            
		    'StatutTinymce' =>  'statut_tinymce',            
		    'CguTinymce' =>  'cgu_tinymce',            
		    'TermsTinymce' =>  'terms_tinymce',            
		    'PrivacyTinymce' =>  'privacy_tinymce',            
		    'Title' =>  'title',            
		    'Slogan' =>  'slogan',            
		    'Description' =>  'description',            
		    'Copyright' =>  'copyright',            
		    'Year' =>  'year',            
		    'Keywords' =>  'keywords',            
		    'SignatureTinymce' =>  'signature_tinymce',            
		    'ShippingFreeActive' =>  'shipping_free_active',            
		    'ShippingSlowActive' =>  'shipping_slow_active',            
		    'ShippingFastActive' =>  'shipping_fast_active',            
		    'ShippingFreeInfo' =>  'shipping_free_info',            
		    'ShippingSlowInfo' =>  'shipping_slow_info',            
		    'ShippingFastInfo' =>  'shipping_fast_info',            
		    'ShippingSlowAmount' =>  'shipping_slow_amount',            
		    'ShippingFastAmount' =>  'shipping_fast_amount',            
		    'StoreVat' =>  'store_vat',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}