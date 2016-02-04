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

class DgOnepageTraductionEntity extends AbstractEntity
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
	protected $IdContent; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MenuPosition; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $BackimageFixe; 
	

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
	* @type  : text
	* @size  : 0  
	*/
	protected $ArticleTinymce; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Uri; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriModule; 
	

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
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookType; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookTitre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookDescription; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaFacebookImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterType; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterTitre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterDescription; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $MetaTwitterPlayer; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdContent($IdContent) {
		$this->IdContent = $IdContent;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 
	

	public function setMenuPosition($MenuPosition) {
		$this->MenuPosition = $MenuPosition;
		return $this;
	} 
	

	public function setBackimageFixe($BackimageFixe) {
		$this->BackimageFixe = $BackimageFixe;
		return $this;
	} 
	

	public function setTitre($Titre) {
		$this->Titre = $Titre;
		return $this;
	} 
	

	public function setDescription($Description) {
		$this->Description = $Description;
		return $this;
	} 
	

	public function setArticleTinymce($ArticleTinymce) {
		$this->ArticleTinymce = $ArticleTinymce;
		return $this;
	} 
	

	public function setUri($Uri) {
		$this->Uri = $Uri;
		return $this;
	} 
	

	public function setUriModule($UriModule) {
		$this->UriModule = $UriModule;
		return $this;
	} 
	

	public function setMetaTitre($MetaTitre) {
		$this->MetaTitre = $MetaTitre;
		return $this;
	} 
	

	public function setMetaDescription($MetaDescription) {
		$this->MetaDescription = $MetaDescription;
		return $this;
	} 
	

	public function setMetaKeys($MetaKeys) {
		$this->MetaKeys = $MetaKeys;
		return $this;
	} 
	

	public function setMetaFacebookType($MetaFacebookType) {
		$this->MetaFacebookType = $MetaFacebookType;
		return $this;
	} 
	

	public function setMetaFacebookTitre($MetaFacebookTitre) {
		$this->MetaFacebookTitre = $MetaFacebookTitre;
		return $this;
	} 
	

	public function setMetaFacebookDescription($MetaFacebookDescription) {
		$this->MetaFacebookDescription = $MetaFacebookDescription;
		return $this;
	} 
	

	public function setMetaFacebookImage($MetaFacebookImage) {
		$this->MetaFacebookImage = $MetaFacebookImage;
		return $this;
	} 
	

	public function setMetaTwitterType($MetaTwitterType) {
		$this->MetaTwitterType = $MetaTwitterType;
		return $this;
	} 
	

	public function setMetaTwitterTitre($MetaTwitterTitre) {
		$this->MetaTwitterTitre = $MetaTwitterTitre;
		return $this;
	} 
	

	public function setMetaTwitterDescription($MetaTwitterDescription) {
		$this->MetaTwitterDescription = $MetaTwitterDescription;
		return $this;
	} 
	

	public function setMetaTwitterImage($MetaTwitterImage) {
		$this->MetaTwitterImage = $MetaTwitterImage;
		return $this;
	} 
	

	public function setMetaTwitterPlayer($MetaTwitterPlayer) {
		$this->MetaTwitterPlayer = $MetaTwitterPlayer;
		return $this;
	} 
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdContent() {
		return $this->IdContent ;
	} 

	public function getLangue() {
		return $this->Langue ;
	} 

	public function getMenuPosition() {
		return $this->MenuPosition ;
	} 

	public function getBackimageFixe() {
		return $this->BackimageFixe ;
	} 

	public function getTitre() {
		return $this->Titre ;
	} 

	public function getDescription() {
		return $this->Description ;
	} 

	public function getArticleTinymce() {
		return $this->ArticleTinymce ;
	} 

	public function getUri() {
		return $this->Uri ;
	} 

	public function getUriModule() {
		return $this->UriModule ;
	} 

	public function getMetaTitre() {
		return $this->MetaTitre ;
	} 

	public function getMetaDescription() {
		return $this->MetaDescription ;
	} 

	public function getMetaKeys() {
		return $this->MetaKeys ;
	} 

	public function getMetaFacebookType() {
		return $this->MetaFacebookType ;
	} 

	public function getMetaFacebookTitre() {
		return $this->MetaFacebookTitre ;
	} 

	public function getMetaFacebookDescription() {
		return $this->MetaFacebookDescription ;
	} 

	public function getMetaFacebookImage() {
		return $this->MetaFacebookImage ;
	} 

	public function getMetaTwitterType() {
		return $this->MetaTwitterType ;
	} 

	public function getMetaTwitterTitre() {
		return $this->MetaTwitterTitre ;
	} 

	public function getMetaTwitterDescription() {
		return $this->MetaTwitterDescription ;
	} 

	public function getMetaTwitterImage() {
		return $this->MetaTwitterImage ;
	} 

	public function getMetaTwitterPlayer() {
		return $this->MetaTwitterPlayer ;
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
		
	public function getValidationIdContent() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
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
		
	public function getValidationMenuPosition() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBackimageFixe() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTitre() {
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
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationArticleTinymce() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUri() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUriModule() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaKeys() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaFacebookImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterTitre() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterDescription() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMetaTwitterPlayer() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
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
		    'IdContent' =>  'id_content',            
		    'Langue' =>  'langue',            
		    'MenuPosition' =>  'menu_position',            
		    'BackimageFixe' =>  'backimage_fixe',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'ArticleTinymce' =>  'article_tinymce',            
		    'Uri' =>  'uri',            
		    'UriModule' =>  'uri_module',            
		    'MetaTitre' =>  'meta_titre',            
		    'MetaDescription' =>  'meta_description',            
		    'MetaKeys' =>  'meta_keys',            
		    'MetaFacebookType' =>  'meta_facebook_type',            
		    'MetaFacebookTitre' =>  'meta_facebook_titre',            
		    'MetaFacebookDescription' =>  'meta_facebook_description',            
		    'MetaFacebookImage' =>  'meta_facebook_image',            
		    'MetaTwitterType' =>  'meta_twitter_type',            
		    'MetaTwitterTitre' =>  'meta_twitter_titre',            
		    'MetaTwitterDescription' =>  'meta_twitter_description',            
		    'MetaTwitterImage' =>  'meta_twitter_image',            
		    'MetaTwitterPlayer' =>  'meta_twitter_player',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}