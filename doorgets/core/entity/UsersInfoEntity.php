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

class UsersInfoEntity extends AbstractEntity
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
	protected $ProfileType; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Active; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IdUser; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Network; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Company; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Email; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Pseudo; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $LastName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $FirstName; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Country; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Region; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $City; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Zipcode; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Adresse; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $TelFix; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $TelMobil; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $TelFax; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdFacebook; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdTwitter; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdGoogle; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdLinkedin; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdPinterest; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdMyspace; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $IdYoutube; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $NotificationMail; 
	

	/**
	* @type  : int
	* @size  : 1  
	*/
	protected $NotificationNewsletter; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Birthday; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Gender; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Avatar; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Description; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Website; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Horaire; 
	

	/**
	* @type  : varchar
	* @size  : 50  
	*/
	protected $EditorHtml; 
	

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
	

	public function setProfileType($ProfileType) {
		$this->ProfileType = $ProfileType;
		return $this;
	} 
	

	public function setActive($Active) {
		$this->Active = $Active;
		return $this;
	} 
	

	public function setIdUser($IdUser) {
		$this->IdUser = $IdUser;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 
	

	public function setNetwork($Network) {
		$this->Network = $Network;
		return $this;
	} 
	

	public function setCompany($Company) {
		$this->Company = $Company;
		return $this;
	} 
	

	public function setEmail($Email) {
		$this->Email = $Email;
		return $this;
	} 
	

	public function setPseudo($Pseudo) {
		$this->Pseudo = $Pseudo;
		return $this;
	} 
	

	public function setLastName($LastName) {
		$this->LastName = $LastName;
		return $this;
	} 
	

	public function setFirstName($FirstName) {
		$this->FirstName = $FirstName;
		return $this;
	} 
	

	public function setCountry($Country) {
		$this->Country = $Country;
		return $this;
	} 
	

	public function setRegion($Region) {
		$this->Region = $Region;
		return $this;
	} 
	

	public function setCity($City) {
		$this->City = $City;
		return $this;
	} 
	

	public function setZipcode($Zipcode) {
		$this->Zipcode = $Zipcode;
		return $this;
	} 
	

	public function setAdresse($Adresse) {
		$this->Adresse = $Adresse;
		return $this;
	} 
	

	public function setTelFix($TelFix) {
		$this->TelFix = $TelFix;
		return $this;
	} 
	

	public function setTelMobil($TelMobil) {
		$this->TelMobil = $TelMobil;
		return $this;
	} 
	

	public function setTelFax($TelFax) {
		$this->TelFax = $TelFax;
		return $this;
	} 
	

	public function setIdFacebook($IdFacebook) {
		$this->IdFacebook = $IdFacebook;
		return $this;
	} 
	

	public function setIdTwitter($IdTwitter) {
		$this->IdTwitter = $IdTwitter;
		return $this;
	} 
	

	public function setIdGoogle($IdGoogle) {
		$this->IdGoogle = $IdGoogle;
		return $this;
	} 
	

	public function setIdLinkedin($IdLinkedin) {
		$this->IdLinkedin = $IdLinkedin;
		return $this;
	} 
	

	public function setIdPinterest($IdPinterest) {
		$this->IdPinterest = $IdPinterest;
		return $this;
	} 
	

	public function setIdMyspace($IdMyspace) {
		$this->IdMyspace = $IdMyspace;
		return $this;
	} 
	

	public function setIdYoutube($IdYoutube) {
		$this->IdYoutube = $IdYoutube;
		return $this;
	} 
	

	public function setNotificationMail($NotificationMail) {
		$this->NotificationMail = $NotificationMail;
		return $this;
	} 
	

	public function setNotificationNewsletter($NotificationNewsletter) {
		$this->NotificationNewsletter = $NotificationNewsletter;
		return $this;
	} 
	

	public function setBirthday($Birthday) {
		$this->Birthday = $Birthday;
		return $this;
	} 
	

	public function setGender($Gender) {
		$this->Gender = $Gender;
		return $this;
	} 
	

	public function setAvatar($Avatar) {
		$this->Avatar = $Avatar;
		return $this;
	} 
	

	public function setDescription($Description) {
		$this->Description = $Description;
		return $this;
	} 
	

	public function setWebsite($Website) {
		$this->Website = $Website;
		return $this;
	} 
	

	public function setHoraire($Horaire) {
		$this->Horaire = $Horaire;
		return $this;
	} 
	

	public function setEditorHtml($EditorHtml) {
		$this->EditorHtml = $EditorHtml;
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

	public function getProfileType() {
		return $this->ProfileType ;
	} 

	public function getActive() {
		return $this->Active ;
	} 

	public function getIdUser() {
		return $this->IdUser ;
	} 

	public function getLangue() {
		return $this->Langue ;
	} 

	public function getNetwork() {
		return $this->Network ;
	} 

	public function getCompany() {
		return $this->Company ;
	} 

	public function getEmail() {
		return $this->Email ;
	} 

	public function getPseudo() {
		return $this->Pseudo ;
	} 

	public function getLastName() {
		return $this->LastName ;
	} 

	public function getFirstName() {
		return $this->FirstName ;
	} 

	public function getCountry() {
		return $this->Country ;
	} 

	public function getRegion() {
		return $this->Region ;
	} 

	public function getCity() {
		return $this->City ;
	} 

	public function getZipcode() {
		return $this->Zipcode ;
	} 

	public function getAdresse() {
		return $this->Adresse ;
	} 

	public function getTelFix() {
		return $this->TelFix ;
	} 

	public function getTelMobil() {
		return $this->TelMobil ;
	} 

	public function getTelFax() {
		return $this->TelFax ;
	} 

	public function getIdFacebook() {
		return $this->IdFacebook ;
	} 

	public function getIdTwitter() {
		return $this->IdTwitter ;
	} 

	public function getIdGoogle() {
		return $this->IdGoogle ;
	} 

	public function getIdLinkedin() {
		return $this->IdLinkedin ;
	} 

	public function getIdPinterest() {
		return $this->IdPinterest ;
	} 

	public function getIdMyspace() {
		return $this->IdMyspace ;
	} 

	public function getIdYoutube() {
		return $this->IdYoutube ;
	} 

	public function getNotificationMail() {
		return $this->NotificationMail ;
	} 

	public function getNotificationNewsletter() {
		return $this->NotificationNewsletter ;
	} 

	public function getBirthday() {
		return $this->Birthday ;
	} 

	public function getGender() {
		return $this->Gender ;
	} 

	public function getAvatar() {
		return $this->Avatar ;
	} 

	public function getDescription() {
		return $this->Description ;
	} 

	public function getWebsite() {
		return $this->Website ;
	} 

	public function getHoraire() {
		return $this->Horaire ;
	} 

	public function getEditorHtml() {
		return $this->EditorHtml ;
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
		
	public function getValidationProfileType() {
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
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
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
		
	public function getValidationNetwork() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCompany() {
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
		
	public function getValidationPseudo() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationLastName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationFirstName() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCountry() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationRegion() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationCity() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationZipcode() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAdresse() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTelFix() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTelMobil() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTelFax() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
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
		
	public function getValidationIdTwitter() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdGoogle() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdLinkedin() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdPinterest() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdMyspace() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIdYoutube() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationNotificationMail() {
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationNotificationNewsletter() {
		return array(
			'type'	         => 'int', 
			'size'			 => 1, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationBirthday() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationGender() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAvatar() {
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
		
	public function getValidationWebsite() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationHoraire() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationEditorHtml() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 50, 
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
		    'ProfileType' =>  'profile_type',            
		    'Active' =>  'active',            
		    'IdUser' =>  'id_user',            
		    'Langue' =>  'langue',            
		    'Network' =>  'network',            
		    'Company' =>  'company',            
		    'Email' =>  'email',            
		    'Pseudo' =>  'pseudo',            
		    'LastName' =>  'last_name',            
		    'FirstName' =>  'first_name',            
		    'Country' =>  'country',            
		    'Region' =>  'region',            
		    'City' =>  'city',            
		    'Zipcode' =>  'zipcode',            
		    'Adresse' =>  'adresse',            
		    'TelFix' =>  'tel_fix',            
		    'TelMobil' =>  'tel_mobil',            
		    'TelFax' =>  'tel_fax',            
		    'IdFacebook' =>  'id_facebook',            
		    'IdTwitter' =>  'id_twitter',            
		    'IdGoogle' =>  'id_google',            
		    'IdLinkedin' =>  'id_linkedin',            
		    'IdPinterest' =>  'id_pinterest',            
		    'IdMyspace' =>  'id_myspace',            
		    'IdYoutube' =>  'id_youtube',            
		    'NotificationMail' =>  'notification_mail',            
		    'NotificationNewsletter' =>  'notification_newsletter',            
		    'Birthday' =>  'birthday',            
		    'Gender' =>  'gender',            
		    'Avatar' =>  'avatar',            
		    'Description' =>  'description',            
		    'Website' =>  'website',            
		    'Horaire' =>  'horaire',            
		    'EditorHtml' =>  'editor_html',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}