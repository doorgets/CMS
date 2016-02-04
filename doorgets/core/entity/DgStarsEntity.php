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

class DgStarsEntity extends AbstractEntity
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
	protected $IdGroupe; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriModule; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriContent; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Stars; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Url; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $AdressIp; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdUser($IdUser) {
		$this->IdUser = $IdUser;
		return $this;
	} 
	

	public function setIdGroupe($IdGroupe) {
		$this->IdGroupe = $IdGroupe;
		return $this;
	} 
	

	public function setUriModule($UriModule) {
		$this->UriModule = $UriModule;
		return $this;
	} 
	

	public function setUriContent($UriContent) {
		$this->UriContent = $UriContent;
		return $this;
	} 
	

	public function setStars($Stars) {
		$this->Stars = $Stars;
		return $this;
	} 
	

	public function setUrl($Url) {
		$this->Url = $Url;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 
	

	public function setAdressIp($AdressIp) {
		$this->AdressIp = $AdressIp;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdUser() {
		return $this->IdUser ;
	} 

	public function getIdGroupe() {
		return $this->IdGroupe ;
	} 

	public function getUriModule() {
		return $this->UriModule ;
	} 

	public function getUriContent() {
		return $this->UriContent ;
	} 

	public function getStars() {
		return $this->Stars ;
	} 

	public function getUrl() {
		return $this->Url ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
	} 

	public function getAdressIp() {
		return $this->AdressIp ;
	} 

	public function getLangue() {
		return $this->Langue ;
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
		
	public function getValidationIdUser() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdGroupe() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
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
		
	public function getValidationUriContent() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationStars() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUrl() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateCreation() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAdressIp() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
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


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'UriModule' =>  'uri_module',            
		    'UriContent' =>  'uri_content',            
		    'Stars' =>  'stars',            
		    'Url' =>  'url',            
		    'DateCreation' =>  'date_creation',            
		    'AdressIp' =>  'adress_ip',            
		    'Langue' =>  'langue',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}