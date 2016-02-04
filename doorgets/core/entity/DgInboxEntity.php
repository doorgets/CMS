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

class DgInboxEntity extends AbstractEntity
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
	protected $UriModule; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Sujet; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Nom; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Email; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Message; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Telephone; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Lu; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Archive; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateArchive; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateLu; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setUriModule($UriModule) {
		$this->UriModule = $UriModule;
		return $this;
	} 
	

	public function setSujet($Sujet) {
		$this->Sujet = $Sujet;
		return $this;
	} 
	

	public function setNom($Nom) {
		$this->Nom = $Nom;
		return $this;
	} 
	

	public function setEmail($Email) {
		$this->Email = $Email;
		return $this;
	} 
	

	public function setMessage($Message) {
		$this->Message = $Message;
		return $this;
	} 
	

	public function setTelephone($Telephone) {
		$this->Telephone = $Telephone;
		return $this;
	} 
	

	public function setLu($Lu) {
		$this->Lu = $Lu;
		return $this;
	} 
	

	public function setArchive($Archive) {
		$this->Archive = $Archive;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 
	

	public function setDateArchive($DateArchive) {
		$this->DateArchive = $DateArchive;
		return $this;
	} 
	

	public function setDateLu($DateLu) {
		$this->DateLu = $DateLu;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getUriModule() {
		return $this->UriModule ;
	} 

	public function getSujet() {
		return $this->Sujet ;
	} 

	public function getNom() {
		return $this->Nom ;
	} 

	public function getEmail() {
		return $this->Email ;
	} 

	public function getMessage() {
		return $this->Message ;
	} 

	public function getTelephone() {
		return $this->Telephone ;
	} 

	public function getLu() {
		return $this->Lu ;
	} 

	public function getArchive() {
		return $this->Archive ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
	} 

	public function getDateArchive() {
		return $this->DateArchive ;
	} 

	public function getDateLu() {
		return $this->DateLu ;
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
		
	public function getValidationSujet() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationNom() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationEmail() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMessage() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTelephone() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLu() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationArchive() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
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
		
	public function getValidationDateArchive() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateLu() {
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
		    'UriModule' =>  'uri_module',            
		    'Sujet' =>  'sujet',            
		    'Nom' =>  'nom',            
		    'Email' =>  'email',            
		    'Message' =>  'message',            
		    'Telephone' =>  'telephone',            
		    'Lu' =>  'lu',            
		    'Archive' =>  'archive',            
		    'DateCreation' =>  'date_creation',            
		    'DateArchive' =>  'date_archive',            
		    'DateLu' =>  'date_lu',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}