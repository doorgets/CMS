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

class PromotionEntity extends AbstractEntity
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
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Title; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Userlimit; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Usercount; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Active; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Priority; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $DateFrom; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $DateTo; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $DateFromHour; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $DateToHour; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateFromTime; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateToTime; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ReductionType; 
	

	/**
	* @type  : decimal
	* @size  : 7  
	*/
	protected $ReductionValue; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Stockmin; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Showprice; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $ActiveAll; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Categories; 
	

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
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdUser($IdUser) {
		$this->IdUser = $IdUser;
		return $this;
	} 
	

	public function setTitle($Title) {
		$this->Title = $Title;
		return $this;
	} 
	

	public function setUserlimit($Userlimit) {
		$this->Userlimit = $Userlimit;
		return $this;
	} 
	

	public function setUsercount($Usercount) {
		$this->Usercount = $Usercount;
		return $this;
	} 
	

	public function setActive($Active) {
		$this->Active = $Active;
		return $this;
	} 
	

	public function setPriority($Priority) {
		$this->Priority = $Priority;
		return $this;
	} 
	

	public function setDateFrom($DateFrom) {
		$this->DateFrom = $DateFrom;
		return $this;
	} 
	

	public function setDateTo($DateTo) {
		$this->DateTo = $DateTo;
		return $this;
	} 
	

	public function setDateFromHour($DateFromHour) {
		$this->DateFromHour = $DateFromHour;
		return $this;
	} 
	

	public function setDateToHour($DateToHour) {
		$this->DateToHour = $DateToHour;
		return $this;
	} 
	

	public function setDateFromTime($DateFromTime) {
		$this->DateFromTime = $DateFromTime;
		return $this;
	} 
	

	public function setDateToTime($DateToTime) {
		$this->DateToTime = $DateToTime;
		return $this;
	} 
	

	public function setReductionType($ReductionType) {
		$this->ReductionType = $ReductionType;
		return $this;
	} 
	

	public function setReductionValue($ReductionValue) {
		$this->ReductionValue = $ReductionValue;
		return $this;
	} 
	

	public function setStockmin($Stockmin) {
		$this->Stockmin = $Stockmin;
		return $this;
	} 
	

	public function setShowprice($Showprice) {
		$this->Showprice = $Showprice;
		return $this;
	} 
	

	public function setActiveAll($ActiveAll) {
		$this->ActiveAll = $ActiveAll;
		return $this;
	} 
	

	public function setCategories($Categories) {
		$this->Categories = $Categories;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdUser() {
		return $this->IdUser ;
	} 

	public function getTitle() {
		return $this->Title ;
	} 

	public function getUserlimit() {
		return $this->Userlimit ;
	} 

	public function getUsercount() {
		return $this->Usercount ;
	} 

	public function getActive() {
		return $this->Active ;
	} 

	public function getPriority() {
		return $this->Priority ;
	} 

	public function getDateFrom() {
		return $this->DateFrom ;
	} 

	public function getDateTo() {
		return $this->DateTo ;
	} 

	public function getDateFromHour() {
		return $this->DateFromHour ;
	} 

	public function getDateToHour() {
		return $this->DateToHour ;
	} 

	public function getDateFromTime() {
		return $this->DateFromTime ;
	} 

	public function getDateToTime() {
		return $this->DateToTime ;
	} 

	public function getReductionType() {
		return $this->ReductionType ;
	} 

	public function getReductionValue() {
		return $this->ReductionValue ;
	} 

	public function getStockmin() {
		return $this->Stockmin ;
	} 

	public function getShowprice() {
		return $this->Showprice ;
	} 

	public function getActiveAll() {
		return $this->ActiveAll ;
	} 

	public function getCategories() {
		return $this->Categories ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
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
		
	public function getValidationUserlimit() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUsercount() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationActive() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPriority() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateFrom() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateTo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateFromHour() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateToHour() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateFromTime() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateToTime() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationReductionType() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationReductionValue() {
		return array(
			'type'	         => 'decimal', 
			'size'			 => 7, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationStockmin() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationShowprice() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationActiveAll() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCategories() {
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
		    'IdUser' =>  'id_user',            
		    'Title' =>  'title',            
		    'Userlimit' =>  'userlimit',            
		    'Usercount' =>  'usercount',            
		    'Active' =>  'active',            
		    'Priority' =>  'priority',            
		    'DateFrom' =>  'date_from',            
		    'DateTo' =>  'date_to',            
		    'DateFromHour' =>  'date_from_hour',            
		    'DateToHour' =>  'date_to_hour',            
		    'DateFromTime' =>  'date_from_time',            
		    'DateToTime' =>  'date_to_time',            
		    'ReductionType' =>  'reduction_type',            
		    'ReductionValue' =>  'reduction_value',            
		    'Stockmin' =>  'stockmin',            
		    'Showprice' =>  'showprice',            
		    'ActiveAll' =>  'active_all',            
		    'Categories' =>  'categories',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}