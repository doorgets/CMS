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

class DgSurveyTraductionQuery extends AbstractQuery 
{

	protected $_table = '_dg_survey_traduction';
    
    protected $_className = 'DgSurveyTraduction';

    public function __construct(&$doorGets = null) {
        parent::__construct($doorGets);
    }

	protected $_pk = 'id';

	public function _getPk() {
		return $this->_pk;
	} 

	public function findByPK($Id) {
		$this->_findBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findById($Id) {
		$this->_findBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findRangeById($from,$to) {
		$this->_findRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanById($int) {
		$this->_findGreaterThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanById($int) {
		$this->_findLessThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdSurvey($IdSurvey) {
		$this->_findBy['IdSurvey'] =  $IdSurvey;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdSurvey($from,$to) {
		$this->_findRangeBy['IdSurvey'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdSurvey($int) {
		$this->_findGreaterThanBy['IdSurvey'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdSurvey($int) {
		$this->_findLessThanBy['IdSurvey'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUriModule($UriModule) {
		$this->_findBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByTitre($Titre) {
		$this->_findBy['Titre'] =  $Titre;
		$this->_load();
		return $this;
	} 
		
	public function findByQuestion($Question) {
		$this->_findBy['Question'] =  $Question;
		$this->_load();
		return $this;
	} 
		
	public function findByQuestionImage($QuestionImage) {
		$this->_findBy['QuestionImage'] =  $QuestionImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseA($ResponseA) {
		$this->_findBy['ResponseA'] =  $ResponseA;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseAImage($ResponseAImage) {
		$this->_findBy['ResponseAImage'] =  $ResponseAImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseB($ResponseB) {
		$this->_findBy['ResponseB'] =  $ResponseB;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseBImage($ResponseBImage) {
		$this->_findBy['ResponseBImage'] =  $ResponseBImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseC($ResponseC) {
		$this->_findBy['ResponseC'] =  $ResponseC;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseCImage($ResponseCImage) {
		$this->_findBy['ResponseCImage'] =  $ResponseCImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseD($ResponseD) {
		$this->_findBy['ResponseD'] =  $ResponseD;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseDImage($ResponseDImage) {
		$this->_findBy['ResponseDImage'] =  $ResponseDImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseE($ResponseE) {
		$this->_findBy['ResponseE'] =  $ResponseE;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseEImage($ResponseEImage) {
		$this->_findBy['ResponseEImage'] =  $ResponseEImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseF($ResponseF) {
		$this->_findBy['ResponseF'] =  $ResponseF;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseFImage($ResponseFImage) {
		$this->_findBy['ResponseFImage'] =  $ResponseFImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseG($ResponseG) {
		$this->_findBy['ResponseG'] =  $ResponseG;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseGImage($ResponseGImage) {
		$this->_findBy['ResponseGImage'] =  $ResponseGImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseH($ResponseH) {
		$this->_findBy['ResponseH'] =  $ResponseH;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseHImage($ResponseHImage) {
		$this->_findBy['ResponseHImage'] =  $ResponseHImage;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseI($ResponseI) {
		$this->_findBy['ResponseI'] =  $ResponseI;
		$this->_load();
		return $this;
	} 
		
	public function findByResponseIImage($ResponseIImage) {
		$this->_findBy['ResponseIImage'] =  $ResponseIImage;
		$this->_load();
		return $this;
	} 
		
	public function findByDescription($Description) {
		$this->_findBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByArticleTinymce($ArticleTinymce) {
		$this->_findBy['ArticleTinymce'] =  $ArticleTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByDateModification($DateModification) {
		$this->_findBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateModification($from,$to) {
		$this->_findRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateModification($int) {
		$this->_findGreaterThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateModification($int) {
		$this->_findLessThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdSurvey($IdSurvey) {
		$this->_findOneBy['IdSurvey'] =  $IdSurvey;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriModule($UriModule) {
		$this->_findOneBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitre($Titre) {
		$this->_findOneBy['Titre'] =  $Titre;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByQuestion($Question) {
		$this->_findOneBy['Question'] =  $Question;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByQuestionImage($QuestionImage) {
		$this->_findOneBy['QuestionImage'] =  $QuestionImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseA($ResponseA) {
		$this->_findOneBy['ResponseA'] =  $ResponseA;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseAImage($ResponseAImage) {
		$this->_findOneBy['ResponseAImage'] =  $ResponseAImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseB($ResponseB) {
		$this->_findOneBy['ResponseB'] =  $ResponseB;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseBImage($ResponseBImage) {
		$this->_findOneBy['ResponseBImage'] =  $ResponseBImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseC($ResponseC) {
		$this->_findOneBy['ResponseC'] =  $ResponseC;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseCImage($ResponseCImage) {
		$this->_findOneBy['ResponseCImage'] =  $ResponseCImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseD($ResponseD) {
		$this->_findOneBy['ResponseD'] =  $ResponseD;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseDImage($ResponseDImage) {
		$this->_findOneBy['ResponseDImage'] =  $ResponseDImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseE($ResponseE) {
		$this->_findOneBy['ResponseE'] =  $ResponseE;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseEImage($ResponseEImage) {
		$this->_findOneBy['ResponseEImage'] =  $ResponseEImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseF($ResponseF) {
		$this->_findOneBy['ResponseF'] =  $ResponseF;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseFImage($ResponseFImage) {
		$this->_findOneBy['ResponseFImage'] =  $ResponseFImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseG($ResponseG) {
		$this->_findOneBy['ResponseG'] =  $ResponseG;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseGImage($ResponseGImage) {
		$this->_findOneBy['ResponseGImage'] =  $ResponseGImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseH($ResponseH) {
		$this->_findOneBy['ResponseH'] =  $ResponseH;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseHImage($ResponseHImage) {
		$this->_findOneBy['ResponseHImage'] =  $ResponseHImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseI($ResponseI) {
		$this->_findOneBy['ResponseI'] =  $ResponseI;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByResponseIImage($ResponseIImage) {
		$this->_findOneBy['ResponseIImage'] =  $ResponseIImage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDescription($Description) {
		$this->_findOneBy['Description'] =  $Description;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByArticleTinymce($ArticleTinymce) {
		$this->_findOneBy['ArticleTinymce'] =  $ArticleTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModification($DateModification) {
		$this->_findOneBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdSurvey($IdSurvey) {
		$this->_findByLike['IdSurvey'] =  $IdSurvey;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriModule($UriModule) {
		$this->_findByLike['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitre($Titre) {
		$this->_findByLike['Titre'] =  $Titre;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeQuestion($Question) {
		$this->_findByLike['Question'] =  $Question;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeQuestionImage($QuestionImage) {
		$this->_findByLike['QuestionImage'] =  $QuestionImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseA($ResponseA) {
		$this->_findByLike['ResponseA'] =  $ResponseA;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseAImage($ResponseAImage) {
		$this->_findByLike['ResponseAImage'] =  $ResponseAImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseB($ResponseB) {
		$this->_findByLike['ResponseB'] =  $ResponseB;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseBImage($ResponseBImage) {
		$this->_findByLike['ResponseBImage'] =  $ResponseBImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseC($ResponseC) {
		$this->_findByLike['ResponseC'] =  $ResponseC;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseCImage($ResponseCImage) {
		$this->_findByLike['ResponseCImage'] =  $ResponseCImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseD($ResponseD) {
		$this->_findByLike['ResponseD'] =  $ResponseD;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseDImage($ResponseDImage) {
		$this->_findByLike['ResponseDImage'] =  $ResponseDImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseE($ResponseE) {
		$this->_findByLike['ResponseE'] =  $ResponseE;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseEImage($ResponseEImage) {
		$this->_findByLike['ResponseEImage'] =  $ResponseEImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseF($ResponseF) {
		$this->_findByLike['ResponseF'] =  $ResponseF;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseFImage($ResponseFImage) {
		$this->_findByLike['ResponseFImage'] =  $ResponseFImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseG($ResponseG) {
		$this->_findByLike['ResponseG'] =  $ResponseG;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseGImage($ResponseGImage) {
		$this->_findByLike['ResponseGImage'] =  $ResponseGImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseH($ResponseH) {
		$this->_findByLike['ResponseH'] =  $ResponseH;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseHImage($ResponseHImage) {
		$this->_findByLike['ResponseHImage'] =  $ResponseHImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseI($ResponseI) {
		$this->_findByLike['ResponseI'] =  $ResponseI;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeResponseIImage($ResponseIImage) {
		$this->_findByLike['ResponseIImage'] =  $ResponseIImage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDescription($Description) {
		$this->_findByLike['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeArticleTinymce($ArticleTinymce) {
		$this->_findByLike['ArticleTinymce'] =  $ArticleTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModification($DateModification) {
		$this->_findByLike['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 

		
	public function filterById($Id, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Id',$Id,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeById($from,$to) {
		$this->_filterRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanById($int) {
		$this->_filterGreaterThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanById($int) {
		$this->_filterLessThanBy['Id'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdSurvey($IdSurvey, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdSurvey',$IdSurvey,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdSurvey($from,$to) {
		$this->_filterRangeBy['IdSurvey'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdSurvey($int) {
		$this->_filterGreaterThanBy['IdSurvey'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdSurvey($int) {
		$this->_filterLessThanBy['IdSurvey'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUriModule($UriModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriModule',$UriModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTitre($Titre, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Titre',$Titre,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByQuestion($Question, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Question',$Question,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByQuestionImage($QuestionImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('QuestionImage',$QuestionImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseA($ResponseA, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseA',$ResponseA,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseAImage($ResponseAImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseAImage',$ResponseAImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseB($ResponseB, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseB',$ResponseB,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseBImage($ResponseBImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseBImage',$ResponseBImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseC($ResponseC, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseC',$ResponseC,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseCImage($ResponseCImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseCImage',$ResponseCImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseD($ResponseD, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseD',$ResponseD,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseDImage($ResponseDImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseDImage',$ResponseDImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseE($ResponseE, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseE',$ResponseE,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseEImage($ResponseEImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseEImage',$ResponseEImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseF($ResponseF, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseF',$ResponseF,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseFImage($ResponseFImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseFImage',$ResponseFImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseG($ResponseG, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseG',$ResponseG,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseGImage($ResponseGImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseGImage',$ResponseGImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseH($ResponseH, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseH',$ResponseH,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseHImage($ResponseHImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseHImage',$ResponseHImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseI($ResponseI, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseI',$ResponseI,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByResponseIImage($ResponseIImage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ResponseIImage',$ResponseIImage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDescription($Description, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Description',$Description,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByArticleTinymce($ArticleTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ArticleTinymce',$ArticleTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateModification($DateModification, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateModification',$DateModification,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateModification($from,$to) {
		$this->_filterRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateModification($int) {
		$this->_filterGreaterThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateModification($int) {
		$this->_filterLessThanBy['DateModification'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdSurvey($IdSurvey) {
		$this->_filterLikeBy['IdSurvey'] =  $IdSurvey;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriModule($UriModule) {
		$this->_filterLikeBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitre($Titre) {
		$this->_filterLikeBy['Titre'] =  $Titre;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByQuestion($Question) {
		$this->_filterLikeBy['Question'] =  $Question;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByQuestionImage($QuestionImage) {
		$this->_filterLikeBy['QuestionImage'] =  $QuestionImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseA($ResponseA) {
		$this->_filterLikeBy['ResponseA'] =  $ResponseA;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseAImage($ResponseAImage) {
		$this->_filterLikeBy['ResponseAImage'] =  $ResponseAImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseB($ResponseB) {
		$this->_filterLikeBy['ResponseB'] =  $ResponseB;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseBImage($ResponseBImage) {
		$this->_filterLikeBy['ResponseBImage'] =  $ResponseBImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseC($ResponseC) {
		$this->_filterLikeBy['ResponseC'] =  $ResponseC;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseCImage($ResponseCImage) {
		$this->_filterLikeBy['ResponseCImage'] =  $ResponseCImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseD($ResponseD) {
		$this->_filterLikeBy['ResponseD'] =  $ResponseD;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseDImage($ResponseDImage) {
		$this->_filterLikeBy['ResponseDImage'] =  $ResponseDImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseE($ResponseE) {
		$this->_filterLikeBy['ResponseE'] =  $ResponseE;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseEImage($ResponseEImage) {
		$this->_filterLikeBy['ResponseEImage'] =  $ResponseEImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseF($ResponseF) {
		$this->_filterLikeBy['ResponseF'] =  $ResponseF;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseFImage($ResponseFImage) {
		$this->_filterLikeBy['ResponseFImage'] =  $ResponseFImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseG($ResponseG) {
		$this->_filterLikeBy['ResponseG'] =  $ResponseG;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseGImage($ResponseGImage) {
		$this->_filterLikeBy['ResponseGImage'] =  $ResponseGImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseH($ResponseH) {
		$this->_filterLikeBy['ResponseH'] =  $ResponseH;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseHImage($ResponseHImage) {
		$this->_filterLikeBy['ResponseHImage'] =  $ResponseHImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseI($ResponseI) {
		$this->_filterLikeBy['ResponseI'] =  $ResponseI;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByResponseIImage($ResponseIImage) {
		$this->_filterLikeBy['ResponseIImage'] =  $ResponseIImage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDescription($Description) {
		$this->_filterLikeBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByArticleTinymce($ArticleTinymce) {
		$this->_filterLikeBy['ArticleTinymce'] =  $ArticleTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModification($DateModification) {
		$this->_filterLikeBy['DateModification'] =  $DateModification;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByIdSurvey($direction = 'ASC') {
		$this->loadDirection('id_survey',$direction);
		return $this;
	} 
		
	public function orderByUriModule($direction = 'ASC') {
		$this->loadDirection('uri_module',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByTitre($direction = 'ASC') {
		$this->loadDirection('titre',$direction);
		return $this;
	} 
		
	public function orderByQuestion($direction = 'ASC') {
		$this->loadDirection('question',$direction);
		return $this;
	} 
		
	public function orderByQuestionImage($direction = 'ASC') {
		$this->loadDirection('question_image',$direction);
		return $this;
	} 
		
	public function orderByResponseA($direction = 'ASC') {
		$this->loadDirection('response_a',$direction);
		return $this;
	} 
		
	public function orderByResponseAImage($direction = 'ASC') {
		$this->loadDirection('response_a_image',$direction);
		return $this;
	} 
		
	public function orderByResponseB($direction = 'ASC') {
		$this->loadDirection('response_b',$direction);
		return $this;
	} 
		
	public function orderByResponseBImage($direction = 'ASC') {
		$this->loadDirection('response_b_image',$direction);
		return $this;
	} 
		
	public function orderByResponseC($direction = 'ASC') {
		$this->loadDirection('response_c',$direction);
		return $this;
	} 
		
	public function orderByResponseCImage($direction = 'ASC') {
		$this->loadDirection('response_c_image',$direction);
		return $this;
	} 
		
	public function orderByResponseD($direction = 'ASC') {
		$this->loadDirection('response_d',$direction);
		return $this;
	} 
		
	public function orderByResponseDImage($direction = 'ASC') {
		$this->loadDirection('response_d_image',$direction);
		return $this;
	} 
		
	public function orderByResponseE($direction = 'ASC') {
		$this->loadDirection('response_e',$direction);
		return $this;
	} 
		
	public function orderByResponseEImage($direction = 'ASC') {
		$this->loadDirection('response_e_image',$direction);
		return $this;
	} 
		
	public function orderByResponseF($direction = 'ASC') {
		$this->loadDirection('response_f',$direction);
		return $this;
	} 
		
	public function orderByResponseFImage($direction = 'ASC') {
		$this->loadDirection('response_f_image',$direction);
		return $this;
	} 
		
	public function orderByResponseG($direction = 'ASC') {
		$this->loadDirection('response_g',$direction);
		return $this;
	} 
		
	public function orderByResponseGImage($direction = 'ASC') {
		$this->loadDirection('response_g_image',$direction);
		return $this;
	} 
		
	public function orderByResponseH($direction = 'ASC') {
		$this->loadDirection('response_h',$direction);
		return $this;
	} 
		
	public function orderByResponseHImage($direction = 'ASC') {
		$this->loadDirection('response_h_image',$direction);
		return $this;
	} 
		
	public function orderByResponseI($direction = 'ASC') {
		$this->loadDirection('response_i',$direction);
		return $this;
	} 
		
	public function orderByResponseIImage($direction = 'ASC') {
		$this->loadDirection('response_i_image',$direction);
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC') {
		$this->loadDirection('description',$direction);
		return $this;
	} 
		
	public function orderByArticleTinymce($direction = 'ASC') {
		$this->loadDirection('article_tinymce',$direction);
		return $this;
	} 
		
	public function orderByDateModification($direction = 'ASC') {
		$this->loadDirection('date_modification',$direction);
		return $this;
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


}