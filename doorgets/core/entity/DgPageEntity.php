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

class DgPageEntity extends AbstractEntity
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
	protected $Uri; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Active; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Comments; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Partage; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Facebook; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdFacebook; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Disqus; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdDisqus; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Mailsender; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Sendto; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $InRss; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Ordre; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $GroupeTraduction; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
	

	/**
	* @type  : int
	* @size  : 111  
	*/
	protected $IdModo; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $ValModo; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModo; 
 
	

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
	

	public function setUri($Uri) {
		$this->Uri = $Uri;
		return $this;
	} 
	

	public function setActive($Active) {
		$this->Active = $Active;
		return $this;
	} 
	

	public function setComments($Comments) {
		$this->Comments = $Comments;
		return $this;
	} 
	

	public function setPartage($Partage) {
		$this->Partage = $Partage;
		return $this;
	} 
	

	public function setFacebook($Facebook) {
		$this->Facebook = $Facebook;
		return $this;
	} 
	

	public function setIdFacebook($IdFacebook) {
		$this->IdFacebook = $IdFacebook;
		return $this;
	} 
	

	public function setDisqus($Disqus) {
		$this->Disqus = $Disqus;
		return $this;
	} 
	

	public function setIdDisqus($IdDisqus) {
		$this->IdDisqus = $IdDisqus;
		return $this;
	} 
	

	public function setMailsender($Mailsender) {
		$this->Mailsender = $Mailsender;
		return $this;
	} 
	

	public function setSendto($Sendto) {
		$this->Sendto = $Sendto;
		return $this;
	} 
	

	public function setInRss($InRss) {
		$this->InRss = $InRss;
		return $this;
	} 
	

	public function setOrdre($Ordre) {
		$this->Ordre = $Ordre;
		return $this;
	} 
	

	public function setGroupeTraduction($GroupeTraduction) {
		$this->GroupeTraduction = $GroupeTraduction;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 
	

	public function setIdModo($IdModo) {
		$this->IdModo = $IdModo;
		return $this;
	} 
	

	public function setValModo($ValModo) {
		$this->ValModo = $ValModo;
		return $this;
	} 
	

	public function setDateModo($DateModo) {
		$this->DateModo = $DateModo;
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

	public function getUri() {
		return $this->Uri ;
	} 

	public function getActive() {
		return $this->Active ;
	} 

	public function getComments() {
		return $this->Comments ;
	} 

	public function getPartage() {
		return $this->Partage ;
	} 

	public function getFacebook() {
		return $this->Facebook ;
	} 

	public function getIdFacebook() {
		return $this->IdFacebook ;
	} 

	public function getDisqus() {
		return $this->Disqus ;
	} 

	public function getIdDisqus() {
		return $this->IdDisqus ;
	} 

	public function getMailsender() {
		return $this->Mailsender ;
	} 

	public function getSendto() {
		return $this->Sendto ;
	} 

	public function getInRss() {
		return $this->InRss ;
	} 

	public function getOrdre() {
		return $this->Ordre ;
	} 

	public function getGroupeTraduction() {
		return $this->GroupeTraduction ;
	} 

	public function getDateCreation() {
		return $this->DateCreation ;
	} 

	public function getIdModo() {
		return $this->IdModo ;
	} 

	public function getValModo() {
		return $this->ValModo ;
	} 

	public function getDateModo() {
		return $this->DateModo ;
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
		
	public function getValidationComments() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPartage() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationFacebook() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdFacebook() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDisqus() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdDisqus() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationMailsender() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationSendto() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationInRss() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationOrdre() {
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
		
	public function getValidationIdModo() {
		return array(
			'type'	         => 'int', 
			'size'			 => 111, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationValModo() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationDateModo() {
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
		    'IdGroupe' =>  'id_groupe',            
		    'Uri' =>  'uri',            
		    'Active' =>  'active',            
		    'Comments' =>  'comments',            
		    'Partage' =>  'partage',            
		    'Facebook' =>  'facebook',            
		    'IdFacebook' =>  'id_facebook',            
		    'Disqus' =>  'disqus',            
		    'IdDisqus' =>  'id_disqus',            
		    'Mailsender' =>  'mailsender',            
		    'Sendto' =>  'sendto',            
		    'InRss' =>  'in_rss',            
		    'Ordre' =>  'ordre',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'DateCreation' =>  'date_creation',            
		    'IdModo' =>  'id_modo',            
		    'ValModo' =>  'val_modo',            
		    'DateModo' =>  'date_modo',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}