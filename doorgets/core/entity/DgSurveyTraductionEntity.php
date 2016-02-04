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

class DgSurveyTraductionEntity extends AbstractEntity
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
	protected $IdSurvey; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $UriModule; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Langue; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Titre; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Question; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $QuestionImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseA; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseAImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseB; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseBImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseC; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseCImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseD; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseDImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseE; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseEImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseF; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseFImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseG; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseGImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseH; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseHImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseI; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $ResponseIImage; 
	

	/**
	* @type  : varchar
	* @size  : 255  
	*/
	protected $Description; 
	

	/**
	* @type  : text
	* @size  : 0  
	*/
	protected $ArticleTinymce; 
	

	/**
	* @type  : int
	* @size  : 11  
	*/
	protected $DateModification; 
 
	

	public function setId($Id) {
		$this->Id = $Id;
		return $this;
	} 
	

	public function setIdSurvey($IdSurvey) {
		$this->IdSurvey = $IdSurvey;
		return $this;
	} 
	

	public function setUriModule($UriModule) {
		$this->UriModule = $UriModule;
		return $this;
	} 
	

	public function setLangue($Langue) {
		$this->Langue = $Langue;
		return $this;
	} 
	

	public function setTitre($Titre) {
		$this->Titre = $Titre;
		return $this;
	} 
	

	public function setQuestion($Question) {
		$this->Question = $Question;
		return $this;
	} 
	

	public function setQuestionImage($QuestionImage) {
		$this->QuestionImage = $QuestionImage;
		return $this;
	} 
	

	public function setResponseA($ResponseA) {
		$this->ResponseA = $ResponseA;
		return $this;
	} 
	

	public function setResponseAImage($ResponseAImage) {
		$this->ResponseAImage = $ResponseAImage;
		return $this;
	} 
	

	public function setResponseB($ResponseB) {
		$this->ResponseB = $ResponseB;
		return $this;
	} 
	

	public function setResponseBImage($ResponseBImage) {
		$this->ResponseBImage = $ResponseBImage;
		return $this;
	} 
	

	public function setResponseC($ResponseC) {
		$this->ResponseC = $ResponseC;
		return $this;
	} 
	

	public function setResponseCImage($ResponseCImage) {
		$this->ResponseCImage = $ResponseCImage;
		return $this;
	} 
	

	public function setResponseD($ResponseD) {
		$this->ResponseD = $ResponseD;
		return $this;
	} 
	

	public function setResponseDImage($ResponseDImage) {
		$this->ResponseDImage = $ResponseDImage;
		return $this;
	} 
	

	public function setResponseE($ResponseE) {
		$this->ResponseE = $ResponseE;
		return $this;
	} 
	

	public function setResponseEImage($ResponseEImage) {
		$this->ResponseEImage = $ResponseEImage;
		return $this;
	} 
	

	public function setResponseF($ResponseF) {
		$this->ResponseF = $ResponseF;
		return $this;
	} 
	

	public function setResponseFImage($ResponseFImage) {
		$this->ResponseFImage = $ResponseFImage;
		return $this;
	} 
	

	public function setResponseG($ResponseG) {
		$this->ResponseG = $ResponseG;
		return $this;
	} 
	

	public function setResponseGImage($ResponseGImage) {
		$this->ResponseGImage = $ResponseGImage;
		return $this;
	} 
	

	public function setResponseH($ResponseH) {
		$this->ResponseH = $ResponseH;
		return $this;
	} 
	

	public function setResponseHImage($ResponseHImage) {
		$this->ResponseHImage = $ResponseHImage;
		return $this;
	} 
	

	public function setResponseI($ResponseI) {
		$this->ResponseI = $ResponseI;
		return $this;
	} 
	

	public function setResponseIImage($ResponseIImage) {
		$this->ResponseIImage = $ResponseIImage;
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
	

	public function setDateModification($DateModification) {
		$this->DateModification = $DateModification;
		return $this;
	} 


	public function getId() {
		return $this->Id ;
	} 

	public function getIdSurvey() {
		return $this->IdSurvey ;
	} 

	public function getUriModule() {
		return $this->UriModule ;
	} 

	public function getLangue() {
		return $this->Langue ;
	} 

	public function getTitre() {
		return $this->Titre ;
	} 

	public function getQuestion() {
		return $this->Question ;
	} 

	public function getQuestionImage() {
		return $this->QuestionImage ;
	} 

	public function getResponseA() {
		return $this->ResponseA ;
	} 

	public function getResponseAImage() {
		return $this->ResponseAImage ;
	} 

	public function getResponseB() {
		return $this->ResponseB ;
	} 

	public function getResponseBImage() {
		return $this->ResponseBImage ;
	} 

	public function getResponseC() {
		return $this->ResponseC ;
	} 

	public function getResponseCImage() {
		return $this->ResponseCImage ;
	} 

	public function getResponseD() {
		return $this->ResponseD ;
	} 

	public function getResponseDImage() {
		return $this->ResponseDImage ;
	} 

	public function getResponseE() {
		return $this->ResponseE ;
	} 

	public function getResponseEImage() {
		return $this->ResponseEImage ;
	} 

	public function getResponseF() {
		return $this->ResponseF ;
	} 

	public function getResponseFImage() {
		return $this->ResponseFImage ;
	} 

	public function getResponseG() {
		return $this->ResponseG ;
	} 

	public function getResponseGImage() {
		return $this->ResponseGImage ;
	} 

	public function getResponseH() {
		return $this->ResponseH ;
	} 

	public function getResponseHImage() {
		return $this->ResponseHImage ;
	} 

	public function getResponseI() {
		return $this->ResponseI ;
	} 

	public function getResponseIImage() {
		return $this->ResponseIImage ;
	} 

	public function getDescription() {
		return $this->Description ;
	} 

	public function getArticleTinymce() {
		return $this->ArticleTinymce ;
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
		
	public function getValidationIdSurvey() {
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
		
	public function getValidationQuestion() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationQuestionImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseA() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseAImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseB() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseBImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseC() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseCImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseD() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseDImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseE() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseEImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseF() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseFImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseG() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseGImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseH() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseHImage() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseI() {
		return array(
			'type'	         => 'varchar', 
			'size'			 => 255, 
			'unique' 		 => false,
			'required' 		 => false,
			'primary_key' 	 => false,
			'auto_increment' => false
		);
	} 
		
	public function getValidationResponseIImage() {
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
		    'IdSurvey' =>  'id_survey',            
		    'UriModule' =>  'uri_module',            
		    'Langue' =>  'langue',            
		    'Titre' =>  'titre',            
		    'Question' =>  'question',            
		    'QuestionImage' =>  'question_image',            
		    'ResponseA' =>  'response_a',            
		    'ResponseAImage' =>  'response_a_image',            
		    'ResponseB' =>  'response_b',            
		    'ResponseBImage' =>  'response_b_image',            
		    'ResponseC' =>  'response_c',            
		    'ResponseCImage' =>  'response_c_image',            
		    'ResponseD' =>  'response_d',            
		    'ResponseDImage' =>  'response_d_image',            
		    'ResponseE' =>  'response_e',            
		    'ResponseEImage' =>  'response_e_image',            
		    'ResponseF' =>  'response_f',            
		    'ResponseFImage' =>  'response_f_image',            
		    'ResponseG' =>  'response_g',            
		    'ResponseGImage' =>  'response_g_image',            
		    'ResponseH' =>  'response_h',            
		    'ResponseHImage' =>  'response_h_image',            
		    'ResponseI' =>  'response_i',            
		    'ResponseIImage' =>  'response_i_image',            
		    'Description' =>  'description',            
		    'ArticleTinymce' =>  'article_tinymce',            
		    'DateModification' =>  'date_modification',		
		));
	} 


    public function __construct($data = array(),&$doorGets = null, $joinMaps = array()) {
        parent::__construct($data,$doorGets,$joinMaps);
    }
}