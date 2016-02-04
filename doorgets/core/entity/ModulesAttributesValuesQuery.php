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

class ModulesAttributesValuesQuery extends AbstractQuery 
{

	protected $_table = '_modules_attributes_values';
    
    protected $_className = 'ModulesAttributesValues';

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
		
	public function findByUriModule($UriModule) {
		$this->_findBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUriModule($from,$to) {
		$this->_findRangeBy['UriModule'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUriModule($int) {
		$this->_findGreaterThanBy['UriModule'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUriModule($int) {
		$this->_findLessThanBy['UriModule'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdContent($IdContent) {
		$this->_findBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdContent($from,$to) {
		$this->_findRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdContent($int) {
		$this->_findGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdContent($int) {
		$this->_findLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdAttribute($IdAttribute) {
		$this->_findBy['IdAttribute'] =  $IdAttribute;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdAttribute($from,$to) {
		$this->_findRangeBy['IdAttribute'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdAttribute($int) {
		$this->_findGreaterThanBy['IdAttribute'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdAttribute($int) {
		$this->_findLessThanBy['IdAttribute'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByValue($Value) {
		$this->_findBy['Value'] =  $Value;
		$this->_load();
		return $this;
	} 
		
	public function findByDateCreation($DateCreation) {
		$this->_findBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateCreation($from,$to) {
		$this->_findRangeBy['DateCreation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateCreation($int) {
		$this->_findGreaterThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateCreation($int) {
		$this->_findLessThanBy['DateCreation'] = $int;
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
		
	public function findOneByUriModule($UriModule) {
		$this->_findOneBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdContent($IdContent) {
		$this->_findOneBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdAttribute($IdAttribute) {
		$this->_findOneBy['IdAttribute'] =  $IdAttribute;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByValue($Value) {
		$this->_findOneBy['Value'] =  $Value;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
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
		
	public function findByLikeUriModule($UriModule) {
		$this->_findByLike['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdContent($IdContent) {
		$this->_findByLike['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdAttribute($IdAttribute) {
		$this->_findByLike['IdAttribute'] =  $IdAttribute;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeValue($Value) {
		$this->_findByLike['Value'] =  $Value;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
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
		
	public function filterByUriModule($UriModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriModule',$UriModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUriModule($from,$to) {
		$this->_filterRangeBy['UriModule'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUriModule($int) {
		$this->_filterGreaterThanBy['UriModule'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUriModule($int) {
		$this->_filterLessThanBy['UriModule'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdContent($IdContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdContent',$IdContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdContent($from,$to) {
		$this->_filterRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdContent($int) {
		$this->_filterGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdContent($int) {
		$this->_filterLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdAttribute($IdAttribute, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdAttribute',$IdAttribute,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdAttribute($from,$to) {
		$this->_filterRangeBy['IdAttribute'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdAttribute($int) {
		$this->_filterGreaterThanBy['IdAttribute'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdAttribute($int) {
		$this->_filterLessThanBy['IdAttribute'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByValue($Value, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Value',$Value,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateCreation($DateCreation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateCreation',$DateCreation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateCreation($from,$to) {
		$this->_filterRangeBy['DateCreation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateCreation($int) {
		$this->_filterGreaterThanBy['DateCreation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateCreation($int) {
		$this->_filterLessThanBy['DateCreation'] = $int;
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
		
	public function filterLikeByUriModule($UriModule) {
		$this->_filterLikeBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdContent($IdContent) {
		$this->_filterLikeBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdAttribute($IdAttribute) {
		$this->_filterLikeBy['IdAttribute'] =  $IdAttribute;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByValue($Value) {
		$this->_filterLikeBy['Value'] =  $Value;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
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
		
	public function orderByUriModule($direction = 'ASC') {
		$this->loadDirection('uri_module',$direction);
		return $this;
	} 
		
	public function orderByIdContent($direction = 'ASC') {
		$this->loadDirection('id_content',$direction);
		return $this;
	} 
		
	public function orderByIdAttribute($direction = 'ASC') {
		$this->loadDirection('id_attribute',$direction);
		return $this;
	} 
		
	public function orderByValue($direction = 'ASC') {
		$this->loadDirection('value',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
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
		    'UriModule' =>  'uri_module',            
		    'IdContent' =>  'id_content',            
		    'IdAttribute' =>  'id_attribute',            
		    'Value' =>  'value',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}