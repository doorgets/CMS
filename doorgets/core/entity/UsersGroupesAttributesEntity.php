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

class UsersGroupesAttributesEntity extends AbstractEntity
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
	protected $Active; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Required; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $GroupeTraduction; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Uri; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Type; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Params; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setActive($Active) {
		$this->Active = $Active;
		return $this;
	} 
	

	public function setRequired($Required) {
		$this->Required = $Required;
		return $this;
	} 
	

	public function setGroupeTraduction($GroupeTraduction) {
		$this->GroupeTraduction = $GroupeTraduction;
		return $this;
	} 
	

	public function setUri($Uri) {
		$this->Uri = $Uri;
		return $this;
	} 
	

	public function setType($Type) {
		$this->Type = $Type;
		return $this;
	} 
	

	public function setParams($Params) {
		$this->Params = $Params;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getActive() {
		return $this->Active ;
	} 

	public function getRequired() {
		return $this->Required ;
	} 

	public function getGroupeTraduction() {
		return $this->GroupeTraduction ;
	} 

	public function getUri() {
		return $this->Uri ;
	} 

	public function getType() {
		return $this->Type ;
	} 

	public function getParams() {
		return $this->Params ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
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
		
	public function getValidationActive() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationRequired() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationGroupeTraduction() {
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
		
	public function getValidationType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationParams() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
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


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Active' =>  'active',            
		    'Required' =>  'required',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Uri' =>  'uri',            
		    'Type' =>  'type',            
		    'Params' =>  'params',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}