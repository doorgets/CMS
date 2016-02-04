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

class CategoriesQuery extends AbstractQuery 
{

	protected $_table = '_categories';
    
    protected $_className = 'Categories';

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
		
	public function findByIdParent($IdParent) {
		$this->_findBy['IdParent'] =  $IdParent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdParent($from,$to) {
		$this->_findRangeBy['IdParent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdParent($int) {
		$this->_findGreaterThanBy['IdParent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdParent($int) {
		$this->_findLessThanBy['IdParent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUriModule($UriModule) {
		$this->_findBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByGroupeTraduction($GroupeTraduction) {
		$this->_findBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByOrdre($Ordre) {
		$this->_findBy['Ordre'] =  $Ordre;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByOrdre($from,$to) {
		$this->_findRangeBy['Ordre'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByOrdre($int) {
		$this->_findGreaterThanBy['Ordre'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByOrdre($int) {
		$this->_findLessThanBy['Ordre'] = $int;
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

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdParent($IdParent) {
		$this->_findOneBy['IdParent'] =  $IdParent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriModule($UriModule) {
		$this->_findOneBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGroupeTraduction($GroupeTraduction) {
		$this->_findOneBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOrdre($Ordre) {
		$this->_findOneBy['Ordre'] =  $Ordre;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdParent($IdParent) {
		$this->_findByLike['IdParent'] =  $IdParent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriModule($UriModule) {
		$this->_findByLike['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGroupeTraduction($GroupeTraduction) {
		$this->_findByLike['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOrdre($Ordre) {
		$this->_findByLike['Ordre'] =  $Ordre;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
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
		
	public function filterByIdParent($IdParent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdParent',$IdParent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdParent($from,$to) {
		$this->_filterRangeBy['IdParent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdParent($int) {
		$this->_filterGreaterThanBy['IdParent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdParent($int) {
		$this->_filterLessThanBy['IdParent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUriModule($UriModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriModule',$UriModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGroupeTraduction($GroupeTraduction, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('GroupeTraduction',$GroupeTraduction,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOrdre($Ordre, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Ordre',$Ordre,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByOrdre($from,$to) {
		$this->_filterRangeBy['Ordre'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByOrdre($int) {
		$this->_filterGreaterThanBy['Ordre'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByOrdre($int) {
		$this->_filterLessThanBy['Ordre'] = $int;
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

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdParent($IdParent) {
		$this->_filterLikeBy['IdParent'] =  $IdParent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriModule($UriModule) {
		$this->_filterLikeBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGroupeTraduction($GroupeTraduction) {
		$this->_filterLikeBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOrdre($Ordre) {
		$this->_filterLikeBy['Ordre'] =  $Ordre;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByIdParent($direction = 'ASC') {
		$this->loadDirection('id_parent',$direction);
		return $this;
	} 
		
	public function orderByUriModule($direction = 'ASC') {
		$this->loadDirection('uri_module',$direction);
		return $this;
	} 
		
	public function orderByGroupeTraduction($direction = 'ASC') {
		$this->loadDirection('groupe_traduction',$direction);
		return $this;
	} 
		
	public function orderByOrdre($direction = 'ASC') {
		$this->loadDirection('ordre',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdParent' =>  'id_parent',            
		    'UriModule' =>  'uri_module',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Ordre' =>  'ordre',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


}