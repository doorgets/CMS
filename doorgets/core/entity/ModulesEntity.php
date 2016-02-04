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

class ModulesEntity extends AbstractEntity
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
	protected $Type; 
	

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
	protected $AuthorBadge; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $IsFirst; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Plugins; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $GroupeTraduction; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Bynum; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Avoiraussi; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Image; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $TemplateIndex; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $TemplateContent; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $NotificationMail; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriNotificationModerator; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriNotificationUserSuccess; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriNotificationUserError; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $Extras; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Redirection; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $Recaptcha; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $WithPassword; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Password; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PublicModule; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PublicComment; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $PublicAdd; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateCreation; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setType($Type) {
		$this->Type = $Type;
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
	

	public function setAuthorBadge($AuthorBadge) {
		$this->AuthorBadge = $AuthorBadge;
		return $this;
	} 
	

	public function setIsFirst($IsFirst) {
		$this->IsFirst = $IsFirst;
		return $this;
	} 
	

	public function setPlugins($Plugins) {
		$this->Plugins = $Plugins;
		return $this;
	} 
	

	public function setGroupeTraduction($GroupeTraduction) {
		$this->GroupeTraduction = $GroupeTraduction;
		return $this;
	} 
	

	public function setBynum($Bynum) {
		$this->Bynum = $Bynum;
		return $this;
	} 
	

	public function setAvoiraussi($Avoiraussi) {
		$this->Avoiraussi = $Avoiraussi;
		return $this;
	} 
	

	public function setImage($Image) {
		$this->Image = $Image;
		return $this;
	} 
	

	public function setTemplateIndex($TemplateIndex) {
		$this->TemplateIndex = $TemplateIndex;
		return $this;
	} 
	

	public function setTemplateContent($TemplateContent) {
		$this->TemplateContent = $TemplateContent;
		return $this;
	} 
	

	public function setNotificationMail($NotificationMail) {
		$this->NotificationMail = $NotificationMail;
		return $this;
	} 
	

	public function setUriNotificationModerator($UriNotificationModerator) {
		$this->UriNotificationModerator = $UriNotificationModerator;
		return $this;
	} 
	

	public function setUriNotificationUserSuccess($UriNotificationUserSuccess) {
		$this->UriNotificationUserSuccess = $UriNotificationUserSuccess;
		return $this;
	} 
	

	public function setUriNotificationUserError($UriNotificationUserError) {
		$this->UriNotificationUserError = $UriNotificationUserError;
		return $this;
	} 
	

	public function setExtras($Extras) {
		$this->Extras = $Extras;
		return $this;
	} 
	

	public function setRedirection($Redirection) {
		$this->Redirection = $Redirection;
		return $this;
	} 
	

	public function setRecaptcha($Recaptcha) {
		$this->Recaptcha = $Recaptcha;
		return $this;
	} 
	

	public function setWithPassword($WithPassword) {
		$this->WithPassword = $WithPassword;
		return $this;
	} 
	

	public function setPassword($Password) {
		$this->Password = $Password;
		return $this;
	} 
	

	public function setPublicModule($PublicModule) {
		$this->PublicModule = $PublicModule;
		return $this;
	} 
	

	public function setPublicComment($PublicComment) {
		$this->PublicComment = $PublicComment;
		return $this;
	} 
	

	public function setPublicAdd($PublicAdd) {
		$this->PublicAdd = $PublicAdd;
		return $this;
	} 
	

	public function setDateCreation($DateCreation) {
		$this->DateCreation = $DateCreation;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getType() {
		return $this->Type ;
	} 

	public function getUri() {
		return $this->Uri ;
	} 

	public function getActive() {
		return $this->Active ;
	} 

	public function getAuthorBadge() {
		return $this->AuthorBadge ;
	} 

	public function getIsFirst() {
		return $this->IsFirst ;
	} 

	public function getPlugins() {
		return $this->Plugins ;
	} 

	public function getGroupeTraduction() {
		return $this->GroupeTraduction ;
	} 

	public function getBynum() {
		return $this->Bynum ;
	} 

	public function getAvoiraussi() {
		return $this->Avoiraussi ;
	} 

	public function getImage() {
		return $this->Image ;
	} 

	public function getTemplateIndex() {
		return $this->TemplateIndex ;
	} 

	public function getTemplateContent() {
		return $this->TemplateContent ;
	} 

	public function getNotificationMail() {
		return $this->NotificationMail ;
	} 

	public function getUriNotificationModerator() {
		return $this->UriNotificationModerator ;
	} 

	public function getUriNotificationUserSuccess() {
		return $this->UriNotificationUserSuccess ;
	} 

	public function getUriNotificationUserError() {
		return $this->UriNotificationUserError ;
	} 

	public function getExtras() {
		return $this->Extras ;
	} 

	public function getRedirection() {
		return $this->Redirection ;
	} 

	public function getRecaptcha() {
		return $this->Recaptcha ;
	} 

	public function getWithPassword() {
		return $this->WithPassword ;
	} 

	public function getPassword() {
		return $this->Password ;
	} 

	public function getPublicModule() {
		return $this->PublicModule ;
	} 

	public function getPublicComment() {
		return $this->PublicComment ;
	} 

	public function getPublicAdd() {
		return $this->PublicAdd ;
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
		
	public function getValidationAuthorBadge() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationIsFirst() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPlugins() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
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
		
	public function getValidationBynum() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationAvoiraussi() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTemplateIndex() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationTemplateContent() {
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
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUriNotificationModerator() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUriNotificationUserSuccess() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationUriNotificationUserError() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationExtras() {
		return array(
			'type'	         => 'text', 
			'size'			 => 0, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationRedirection() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationRecaptcha() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationWithPassword() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPassword() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPublicModule() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPublicComment() {
		return array(
			'type'	         => 'int', 
			'size'			 => 11, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationPublicAdd() {
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


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Type' =>  'type',            
		    'Uri' =>  'uri',            
		    'Active' =>  'active',            
		    'AuthorBadge' =>  'author_badge',            
		    'IsFirst' =>  'is_first',            
		    'Plugins' =>  'plugins',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Bynum' =>  'bynum',            
		    'Avoiraussi' =>  'avoiraussi',            
		    'Image' =>  'image',            
		    'TemplateIndex' =>  'template_index',            
		    'TemplateContent' =>  'template_content',            
		    'NotificationMail' =>  'notification_mail',            
		    'UriNotificationModerator' =>  'uri_notification_moderator',            
		    'UriNotificationUserSuccess' =>  'uri_notification_user_success',            
		    'UriNotificationUserError' =>  'uri_notification_user_error',            
		    'Extras' =>  'extras',            
		    'Redirection' =>  'redirection',            
		    'Recaptcha' =>  'recaptcha',            
		    'WithPassword' =>  'with_password',            
		    'Password' =>  'password',            
		    'PublicModule' =>  'public_module',            
		    'PublicComment' =>  'public_comment',            
		    'PublicAdd' =>  'public_add',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}