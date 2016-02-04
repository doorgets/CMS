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

class DgTranslatorTraductionQuery extends AbstractQuery 
{

	protected $_table = '_dg_translator_traduction';
    
    protected $_className = 'DgTranslatorTraduction';

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
		
	public function findByIdTranslator($IdTranslator) {
		$this->_findBy['IdTranslator'] =  $IdTranslator;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdTranslator($from,$to) {
		$this->_findRangeBy['IdTranslator'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdTranslator($int) {
		$this->_findGreaterThanBy['IdTranslator'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdTranslator($int) {
		$this->_findLessThanBy['IdTranslator'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByTranslatedSentence($TranslatedSentence) {
		$this->_findBy['TranslatedSentence'] =  $TranslatedSentence;
		$this->_load();
		return $this;
	} 
		
	public function findByIsTranslated($IsTranslated) {
		$this->_findBy['IsTranslated'] =  $IsTranslated;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIsTranslated($from,$to) {
		$this->_findRangeBy['IsTranslated'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIsTranslated($int) {
		$this->_findGreaterThanBy['IsTranslated'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIsTranslated($int) {
		$this->_findLessThanBy['IsTranslated'] = $int;
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
		
	public function findOneByIdTranslator($IdTranslator) {
		$this->_findOneBy['IdTranslator'] =  $IdTranslator;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTranslatedSentence($TranslatedSentence) {
		$this->_findOneBy['TranslatedSentence'] =  $TranslatedSentence;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIsTranslated($IsTranslated) {
		$this->_findOneBy['IsTranslated'] =  $IsTranslated;
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
		
	public function findByLikeIdTranslator($IdTranslator) {
		$this->_findByLike['IdTranslator'] =  $IdTranslator;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTranslatedSentence($TranslatedSentence) {
		$this->_findByLike['TranslatedSentence'] =  $TranslatedSentence;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIsTranslated($IsTranslated) {
		$this->_findByLike['IsTranslated'] =  $IsTranslated;
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
		
	public function filterByIdTranslator($IdTranslator, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdTranslator',$IdTranslator,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdTranslator($from,$to) {
		$this->_filterRangeBy['IdTranslator'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdTranslator($int) {
		$this->_filterGreaterThanBy['IdTranslator'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdTranslator($int) {
		$this->_filterLessThanBy['IdTranslator'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTranslatedSentence($TranslatedSentence, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TranslatedSentence',$TranslatedSentence,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIsTranslated($IsTranslated, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IsTranslated',$IsTranslated,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIsTranslated($from,$to) {
		$this->_filterRangeBy['IsTranslated'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIsTranslated($int) {
		$this->_filterGreaterThanBy['IsTranslated'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIsTranslated($int) {
		$this->_filterLessThanBy['IsTranslated'] = $int;
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
		
	public function filterLikeByIdTranslator($IdTranslator) {
		$this->_filterLikeBy['IdTranslator'] =  $IdTranslator;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTranslatedSentence($TranslatedSentence) {
		$this->_filterLikeBy['TranslatedSentence'] =  $TranslatedSentence;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIsTranslated($IsTranslated) {
		$this->_filterLikeBy['IsTranslated'] =  $IsTranslated;
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
		
	public function orderByIdTranslator($direction = 'ASC') {
		$this->loadDirection('id_translator',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByTranslatedSentence($direction = 'ASC') {
		$this->loadDirection('translated_sentence',$direction);
		return $this;
	} 
		
	public function orderByIsTranslated($direction = 'ASC') {
		$this->loadDirection('is_translated',$direction);
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
		    'IdTranslator' =>  'id_translator',            
		    'Langue' =>  'langue',            
		    'TranslatedSentence' =>  'translated_sentence',            
		    'IsTranslated' =>  'is_translated',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}