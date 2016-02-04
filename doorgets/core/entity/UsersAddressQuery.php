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

class UsersAddressQuery extends AbstractQuery 
{

	protected $_table = '_users_address';
    
    protected $_className = 'UsersAddress';

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
		
	public function findByCountry($Country) {
		$this->_findBy['Country'] =  $Country;
		$this->_load();
		return $this;
	} 
		
	public function findByRegion($Region) {
		$this->_findBy['Region'] =  $Region;
		$this->_load();
		return $this;
	} 
		
	public function findByCity($City) {
		$this->_findBy['City'] =  $City;
		$this->_load();
		return $this;
	} 
		
	public function findByZipcode($Zipcode) {
		$this->_findBy['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByAddress($Address) {
		$this->_findBy['Address'] =  $Address;
		$this->_load();
		return $this;
	} 
		
	public function findByPhone1($Phone1) {
		$this->_findBy['Phone1'] =  $Phone1;
		$this->_load();
		return $this;
	} 
		
	public function findByPhone2($Phone2) {
		$this->_findBy['Phone2'] =  $Phone2;
		$this->_load();
		return $this;
	} 
		
	public function findByPhone3($Phone3) {
		$this->_findBy['Phone3'] =  $Phone3;
		$this->_load();
		return $this;
	} 
		
	public function findByName($Name) {
		$this->_findBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByOtherInfo($OtherInfo) {
		$this->_findBy['OtherInfo'] =  $OtherInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByIsDefault($IsDefault) {
		$this->_findBy['IsDefault'] =  $IsDefault;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIsDefault($from,$to) {
		$this->_findRangeBy['IsDefault'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIsDefault($int) {
		$this->_findGreaterThanBy['IsDefault'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIsDefault($int) {
		$this->_findLessThanBy['IsDefault'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIsBilling($IsBilling) {
		$this->_findBy['IsBilling'] =  $IsBilling;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIsBilling($from,$to) {
		$this->_findRangeBy['IsBilling'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIsBilling($int) {
		$this->_findGreaterThanBy['IsBilling'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIsBilling($int) {
		$this->_findLessThanBy['IsBilling'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIsShipping($IsShipping) {
		$this->_findBy['IsShipping'] =  $IsShipping;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIsShipping($from,$to) {
		$this->_findRangeBy['IsShipping'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIsShipping($int) {
		$this->_findGreaterThanBy['IsShipping'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIsShipping($int) {
		$this->_findLessThanBy['IsShipping'] = $int;
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
		
	public function findOneByCountry($Country) {
		$this->_findOneBy['Country'] =  $Country;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRegion($Region) {
		$this->_findOneBy['Region'] =  $Region;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCity($City) {
		$this->_findOneBy['City'] =  $City;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByZipcode($Zipcode) {
		$this->_findOneBy['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAddress($Address) {
		$this->_findOneBy['Address'] =  $Address;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPhone1($Phone1) {
		$this->_findOneBy['Phone1'] =  $Phone1;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPhone2($Phone2) {
		$this->_findOneBy['Phone2'] =  $Phone2;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPhone3($Phone3) {
		$this->_findOneBy['Phone3'] =  $Phone3;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByName($Name) {
		$this->_findOneBy['Name'] =  $Name;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOtherInfo($OtherInfo) {
		$this->_findOneBy['OtherInfo'] =  $OtherInfo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIsDefault($IsDefault) {
		$this->_findOneBy['IsDefault'] =  $IsDefault;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIsBilling($IsBilling) {
		$this->_findOneBy['IsBilling'] =  $IsBilling;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIsShipping($IsShipping) {
		$this->_findOneBy['IsShipping'] =  $IsShipping;
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
		
	public function findByLikeCountry($Country) {
		$this->_findByLike['Country'] =  $Country;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRegion($Region) {
		$this->_findByLike['Region'] =  $Region;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCity($City) {
		$this->_findByLike['City'] =  $City;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeZipcode($Zipcode) {
		$this->_findByLike['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAddress($Address) {
		$this->_findByLike['Address'] =  $Address;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePhone1($Phone1) {
		$this->_findByLike['Phone1'] =  $Phone1;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePhone2($Phone2) {
		$this->_findByLike['Phone2'] =  $Phone2;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePhone3($Phone3) {
		$this->_findByLike['Phone3'] =  $Phone3;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeName($Name) {
		$this->_findByLike['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOtherInfo($OtherInfo) {
		$this->_findByLike['OtherInfo'] =  $OtherInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIsDefault($IsDefault) {
		$this->_findByLike['IsDefault'] =  $IsDefault;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIsBilling($IsBilling) {
		$this->_findByLike['IsBilling'] =  $IsBilling;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIsShipping($IsShipping) {
		$this->_findByLike['IsShipping'] =  $IsShipping;
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
		
	public function filterByCountry($Country, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Country',$Country,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByRegion($Region, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Region',$Region,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCity($City, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('City',$City,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByZipcode($Zipcode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Zipcode',$Zipcode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAddress($Address, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Address',$Address,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPhone1($Phone1, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Phone1',$Phone1,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPhone2($Phone2, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Phone2',$Phone2,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPhone3($Phone3, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Phone3',$Phone3,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByName($Name, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Name',$Name,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOtherInfo($OtherInfo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OtherInfo',$OtherInfo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIsDefault($IsDefault, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IsDefault',$IsDefault,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIsDefault($from,$to) {
		$this->_filterRangeBy['IsDefault'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIsDefault($int) {
		$this->_filterGreaterThanBy['IsDefault'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIsDefault($int) {
		$this->_filterLessThanBy['IsDefault'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIsBilling($IsBilling, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IsBilling',$IsBilling,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIsBilling($from,$to) {
		$this->_filterRangeBy['IsBilling'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIsBilling($int) {
		$this->_filterGreaterThanBy['IsBilling'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIsBilling($int) {
		$this->_filterLessThanBy['IsBilling'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIsShipping($IsShipping, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IsShipping',$IsShipping,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIsShipping($from,$to) {
		$this->_filterRangeBy['IsShipping'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIsShipping($int) {
		$this->_filterGreaterThanBy['IsShipping'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIsShipping($int) {
		$this->_filterLessThanBy['IsShipping'] = $int;
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
		
	public function filterLikeByCountry($Country) {
		$this->_filterLikeBy['Country'] =  $Country;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRegion($Region) {
		$this->_filterLikeBy['Region'] =  $Region;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCity($City) {
		$this->_filterLikeBy['City'] =  $City;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByZipcode($Zipcode) {
		$this->_filterLikeBy['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAddress($Address) {
		$this->_filterLikeBy['Address'] =  $Address;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPhone1($Phone1) {
		$this->_filterLikeBy['Phone1'] =  $Phone1;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPhone2($Phone2) {
		$this->_filterLikeBy['Phone2'] =  $Phone2;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPhone3($Phone3) {
		$this->_filterLikeBy['Phone3'] =  $Phone3;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByName($Name) {
		$this->_filterLikeBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOtherInfo($OtherInfo) {
		$this->_filterLikeBy['OtherInfo'] =  $OtherInfo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIsDefault($IsDefault) {
		$this->_filterLikeBy['IsDefault'] =  $IsDefault;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIsBilling($IsBilling) {
		$this->_filterLikeBy['IsBilling'] =  $IsBilling;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIsShipping($IsShipping) {
		$this->_filterLikeBy['IsShipping'] =  $IsShipping;
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
		
	public function orderByCountry($direction = 'ASC') {
		$this->loadDirection('country',$direction);
		return $this;
	} 
		
	public function orderByRegion($direction = 'ASC') {
		$this->loadDirection('region',$direction);
		return $this;
	} 
		
	public function orderByCity($direction = 'ASC') {
		$this->loadDirection('city',$direction);
		return $this;
	} 
		
	public function orderByZipcode($direction = 'ASC') {
		$this->loadDirection('zipcode',$direction);
		return $this;
	} 
		
	public function orderByAddress($direction = 'ASC') {
		$this->loadDirection('address',$direction);
		return $this;
	} 
		
	public function orderByPhone1($direction = 'ASC') {
		$this->loadDirection('phone1',$direction);
		return $this;
	} 
		
	public function orderByPhone2($direction = 'ASC') {
		$this->loadDirection('phone2',$direction);
		return $this;
	} 
		
	public function orderByPhone3($direction = 'ASC') {
		$this->loadDirection('phone3',$direction);
		return $this;
	} 
		
	public function orderByName($direction = 'ASC') {
		$this->loadDirection('name',$direction);
		return $this;
	} 
		
	public function orderByOtherInfo($direction = 'ASC') {
		$this->loadDirection('other_info',$direction);
		return $this;
	} 
		
	public function orderByIsDefault($direction = 'ASC') {
		$this->loadDirection('is_default',$direction);
		return $this;
	} 
		
	public function orderByIsBilling($direction = 'ASC') {
		$this->loadDirection('is_billing',$direction);
		return $this;
	} 
		
	public function orderByIsShipping($direction = 'ASC') {
		$this->loadDirection('is_shipping',$direction);
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
		    'Country' =>  'country',            
		    'Region' =>  'region',            
		    'City' =>  'city',            
		    'Zipcode' =>  'zipcode',            
		    'Address' =>  'address',            
		    'Phone1' =>  'phone1',            
		    'Phone2' =>  'phone2',            
		    'Phone3' =>  'phone3',            
		    'Name' =>  'name',            
		    'OtherInfo' =>  'other_info',            
		    'IsDefault' =>  'is_default',            
		    'IsBilling' =>  'is_billing',            
		    'IsShipping' =>  'is_shipping',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}