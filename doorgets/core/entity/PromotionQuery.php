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

class PromotionQuery extends AbstractQuery 
{

	protected $_table = '_promotion';
    
    protected $_className = 'Promotion';

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
		
	public function findByIdUser($IdUser) {
		$this->_findBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdUser($from,$to) {
		$this->_findRangeBy['IdUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdUser($int) {
		$this->_findGreaterThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdUser($int) {
		$this->_findLessThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title) {
		$this->_findBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByUserlimit($Userlimit) {
		$this->_findBy['Userlimit'] =  $Userlimit;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUserlimit($from,$to) {
		$this->_findRangeBy['Userlimit'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUserlimit($int) {
		$this->_findGreaterThanBy['Userlimit'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUserlimit($int) {
		$this->_findLessThanBy['Userlimit'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUsercount($Usercount) {
		$this->_findBy['Usercount'] =  $Usercount;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUsercount($from,$to) {
		$this->_findRangeBy['Usercount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUsercount($int) {
		$this->_findGreaterThanBy['Usercount'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUsercount($int) {
		$this->_findLessThanBy['Usercount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByActive($Active) {
		$this->_findBy['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function findByPriority($Priority) {
		$this->_findBy['Priority'] =  $Priority;
		$this->_load();
		return $this;
	} 
		
	public function findByDateFrom($DateFrom) {
		$this->_findBy['DateFrom'] =  $DateFrom;
		$this->_load();
		return $this;
	} 
		
	public function findByDateTo($DateTo) {
		$this->_findBy['DateTo'] =  $DateTo;
		$this->_load();
		return $this;
	} 
		
	public function findByDateFromHour($DateFromHour) {
		$this->_findBy['DateFromHour'] =  $DateFromHour;
		$this->_load();
		return $this;
	} 
		
	public function findByDateToHour($DateToHour) {
		$this->_findBy['DateToHour'] =  $DateToHour;
		$this->_load();
		return $this;
	} 
		
	public function findByDateFromTime($DateFromTime) {
		$this->_findBy['DateFromTime'] =  $DateFromTime;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateFromTime($from,$to) {
		$this->_findRangeBy['DateFromTime'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateFromTime($int) {
		$this->_findGreaterThanBy['DateFromTime'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateFromTime($int) {
		$this->_findLessThanBy['DateFromTime'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateToTime($DateToTime) {
		$this->_findBy['DateToTime'] =  $DateToTime;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateToTime($from,$to) {
		$this->_findRangeBy['DateToTime'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateToTime($int) {
		$this->_findGreaterThanBy['DateToTime'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateToTime($int) {
		$this->_findLessThanBy['DateToTime'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByReductionType($ReductionType) {
		$this->_findBy['ReductionType'] =  $ReductionType;
		$this->_load();
		return $this;
	} 
		
	public function findByReductionValue($ReductionValue) {
		$this->_findBy['ReductionValue'] =  $ReductionValue;
		$this->_load();
		return $this;
	} 
		
	public function findByStockmin($Stockmin) {
		$this->_findBy['Stockmin'] =  $Stockmin;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByStockmin($from,$to) {
		$this->_findRangeBy['Stockmin'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByStockmin($int) {
		$this->_findGreaterThanBy['Stockmin'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByStockmin($int) {
		$this->_findLessThanBy['Stockmin'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByShowprice($Showprice) {
		$this->_findBy['Showprice'] =  $Showprice;
		$this->_load();
		return $this;
	} 
		
	public function findByActiveAll($ActiveAll) {
		$this->_findBy['ActiveAll'] =  $ActiveAll;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByActiveAll($from,$to) {
		$this->_findRangeBy['ActiveAll'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByActiveAll($int) {
		$this->_findGreaterThanBy['ActiveAll'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByActiveAll($int) {
		$this->_findLessThanBy['ActiveAll'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCategories($Categories) {
		$this->_findBy['Categories'] =  $Categories;
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
		
	public function findOneByIdUser($IdUser) {
		$this->_findOneBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title) {
		$this->_findOneBy['Title'] =  $Title;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserlimit($Userlimit) {
		$this->_findOneBy['Userlimit'] =  $Userlimit;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUsercount($Usercount) {
		$this->_findOneBy['Usercount'] =  $Usercount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByActive($Active) {
		$this->_findOneBy['Active'] =  $Active;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPriority($Priority) {
		$this->_findOneBy['Priority'] =  $Priority;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateFrom($DateFrom) {
		$this->_findOneBy['DateFrom'] =  $DateFrom;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateTo($DateTo) {
		$this->_findOneBy['DateTo'] =  $DateTo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateFromHour($DateFromHour) {
		$this->_findOneBy['DateFromHour'] =  $DateFromHour;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateToHour($DateToHour) {
		$this->_findOneBy['DateToHour'] =  $DateToHour;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateFromTime($DateFromTime) {
		$this->_findOneBy['DateFromTime'] =  $DateFromTime;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateToTime($DateToTime) {
		$this->_findOneBy['DateToTime'] =  $DateToTime;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReductionType($ReductionType) {
		$this->_findOneBy['ReductionType'] =  $ReductionType;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReductionValue($ReductionValue) {
		$this->_findOneBy['ReductionValue'] =  $ReductionValue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStockmin($Stockmin) {
		$this->_findOneBy['Stockmin'] =  $Stockmin;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShowprice($Showprice) {
		$this->_findOneBy['Showprice'] =  $Showprice;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByActiveAll($ActiveAll) {
		$this->_findOneBy['ActiveAll'] =  $ActiveAll;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCategories($Categories) {
		$this->_findOneBy['Categories'] =  $Categories;
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
		
	public function findByLikeIdUser($IdUser) {
		$this->_findByLike['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title) {
		$this->_findByLike['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserlimit($Userlimit) {
		$this->_findByLike['Userlimit'] =  $Userlimit;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUsercount($Usercount) {
		$this->_findByLike['Usercount'] =  $Usercount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeActive($Active) {
		$this->_findByLike['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePriority($Priority) {
		$this->_findByLike['Priority'] =  $Priority;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateFrom($DateFrom) {
		$this->_findByLike['DateFrom'] =  $DateFrom;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateTo($DateTo) {
		$this->_findByLike['DateTo'] =  $DateTo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateFromHour($DateFromHour) {
		$this->_findByLike['DateFromHour'] =  $DateFromHour;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateToHour($DateToHour) {
		$this->_findByLike['DateToHour'] =  $DateToHour;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateFromTime($DateFromTime) {
		$this->_findByLike['DateFromTime'] =  $DateFromTime;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateToTime($DateToTime) {
		$this->_findByLike['DateToTime'] =  $DateToTime;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReductionType($ReductionType) {
		$this->_findByLike['ReductionType'] =  $ReductionType;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReductionValue($ReductionValue) {
		$this->_findByLike['ReductionValue'] =  $ReductionValue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStockmin($Stockmin) {
		$this->_findByLike['Stockmin'] =  $Stockmin;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShowprice($Showprice) {
		$this->_findByLike['Showprice'] =  $Showprice;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeActiveAll($ActiveAll) {
		$this->_findByLike['ActiveAll'] =  $ActiveAll;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCategories($Categories) {
		$this->_findByLike['Categories'] =  $Categories;
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
		
	public function filterByIdUser($IdUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdUser',$IdUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdUser($from,$to) {
		$this->_filterRangeBy['IdUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdUser($int) {
		$this->_filterGreaterThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdUser($int) {
		$this->_filterLessThanBy['IdUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUserlimit($Userlimit, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Userlimit',$Userlimit,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUserlimit($from,$to) {
		$this->_filterRangeBy['Userlimit'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUserlimit($int) {
		$this->_filterGreaterThanBy['Userlimit'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUserlimit($int) {
		$this->_filterLessThanBy['Userlimit'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUsercount($Usercount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Usercount',$Usercount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUsercount($from,$to) {
		$this->_filterRangeBy['Usercount'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUsercount($int) {
		$this->_filterGreaterThanBy['Usercount'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUsercount($int) {
		$this->_filterLessThanBy['Usercount'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByActive($Active, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Active',$Active,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPriority($Priority, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Priority',$Priority,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateFrom($DateFrom, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateFrom',$DateFrom,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateTo($DateTo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateTo',$DateTo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateFromHour($DateFromHour, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateFromHour',$DateFromHour,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateToHour($DateToHour, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateToHour',$DateToHour,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateFromTime($DateFromTime, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateFromTime',$DateFromTime,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateFromTime($from,$to) {
		$this->_filterRangeBy['DateFromTime'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateFromTime($int) {
		$this->_filterGreaterThanBy['DateFromTime'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateFromTime($int) {
		$this->_filterLessThanBy['DateFromTime'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateToTime($DateToTime, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateToTime',$DateToTime,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateToTime($from,$to) {
		$this->_filterRangeBy['DateToTime'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateToTime($int) {
		$this->_filterGreaterThanBy['DateToTime'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateToTime($int) {
		$this->_filterLessThanBy['DateToTime'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByReductionType($ReductionType, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ReductionType',$ReductionType,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByReductionValue($ReductionValue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ReductionValue',$ReductionValue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStockmin($Stockmin, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Stockmin',$Stockmin,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByStockmin($from,$to) {
		$this->_filterRangeBy['Stockmin'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByStockmin($int) {
		$this->_filterGreaterThanBy['Stockmin'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByStockmin($int) {
		$this->_filterLessThanBy['Stockmin'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByShowprice($Showprice, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Showprice',$Showprice,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByActiveAll($ActiveAll, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ActiveAll',$ActiveAll,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByActiveAll($from,$to) {
		$this->_filterRangeBy['ActiveAll'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByActiveAll($int) {
		$this->_filterGreaterThanBy['ActiveAll'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByActiveAll($int) {
		$this->_filterLessThanBy['ActiveAll'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCategories($Categories, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Categories',$Categories,$_condition);

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
		
	public function filterLikeByIdUser($IdUser) {
		$this->_filterLikeBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title) {
		$this->_filterLikeBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserlimit($Userlimit) {
		$this->_filterLikeBy['Userlimit'] =  $Userlimit;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUsercount($Usercount) {
		$this->_filterLikeBy['Usercount'] =  $Usercount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByActive($Active) {
		$this->_filterLikeBy['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPriority($Priority) {
		$this->_filterLikeBy['Priority'] =  $Priority;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateFrom($DateFrom) {
		$this->_filterLikeBy['DateFrom'] =  $DateFrom;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateTo($DateTo) {
		$this->_filterLikeBy['DateTo'] =  $DateTo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateFromHour($DateFromHour) {
		$this->_filterLikeBy['DateFromHour'] =  $DateFromHour;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateToHour($DateToHour) {
		$this->_filterLikeBy['DateToHour'] =  $DateToHour;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateFromTime($DateFromTime) {
		$this->_filterLikeBy['DateFromTime'] =  $DateFromTime;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateToTime($DateToTime) {
		$this->_filterLikeBy['DateToTime'] =  $DateToTime;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReductionType($ReductionType) {
		$this->_filterLikeBy['ReductionType'] =  $ReductionType;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReductionValue($ReductionValue) {
		$this->_filterLikeBy['ReductionValue'] =  $ReductionValue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStockmin($Stockmin) {
		$this->_filterLikeBy['Stockmin'] =  $Stockmin;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShowprice($Showprice) {
		$this->_filterLikeBy['Showprice'] =  $Showprice;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByActiveAll($ActiveAll) {
		$this->_filterLikeBy['ActiveAll'] =  $ActiveAll;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCategories($Categories) {
		$this->_filterLikeBy['Categories'] =  $Categories;
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
		
	public function orderByIdUser($direction = 'ASC') {
		$this->loadDirection('id_user',$direction);
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC') {
		$this->loadDirection('title',$direction);
		return $this;
	} 
		
	public function orderByUserlimit($direction = 'ASC') {
		$this->loadDirection('userlimit',$direction);
		return $this;
	} 
		
	public function orderByUsercount($direction = 'ASC') {
		$this->loadDirection('usercount',$direction);
		return $this;
	} 
		
	public function orderByActive($direction = 'ASC') {
		$this->loadDirection('active',$direction);
		return $this;
	} 
		
	public function orderByPriority($direction = 'ASC') {
		$this->loadDirection('priority',$direction);
		return $this;
	} 
		
	public function orderByDateFrom($direction = 'ASC') {
		$this->loadDirection('date_from',$direction);
		return $this;
	} 
		
	public function orderByDateTo($direction = 'ASC') {
		$this->loadDirection('date_to',$direction);
		return $this;
	} 
		
	public function orderByDateFromHour($direction = 'ASC') {
		$this->loadDirection('date_from_hour',$direction);
		return $this;
	} 
		
	public function orderByDateToHour($direction = 'ASC') {
		$this->loadDirection('date_to_hour',$direction);
		return $this;
	} 
		
	public function orderByDateFromTime($direction = 'ASC') {
		$this->loadDirection('date_from_time',$direction);
		return $this;
	} 
		
	public function orderByDateToTime($direction = 'ASC') {
		$this->loadDirection('date_to_time',$direction);
		return $this;
	} 
		
	public function orderByReductionType($direction = 'ASC') {
		$this->loadDirection('reduction_type',$direction);
		return $this;
	} 
		
	public function orderByReductionValue($direction = 'ASC') {
		$this->loadDirection('reduction_value',$direction);
		return $this;
	} 
		
	public function orderByStockmin($direction = 'ASC') {
		$this->loadDirection('stockmin',$direction);
		return $this;
	} 
		
	public function orderByShowprice($direction = 'ASC') {
		$this->loadDirection('showprice',$direction);
		return $this;
	} 
		
	public function orderByActiveAll($direction = 'ASC') {
		$this->loadDirection('active_all',$direction);
		return $this;
	} 
		
	public function orderByCategories($direction = 'ASC') {
		$this->loadDirection('categories',$direction);
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


}