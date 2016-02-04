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

class UserFacebookQuery extends AbstractQuery 
{

	protected $_table = '_user_facebook';
    
    protected $_className = 'UserFacebook';

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
		
	public function findByIdFacebook($IdFacebook) {
		$this->_findBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByName($Name) {
		$this->_findBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByFirstName($FirstName) {
		$this->_findBy['FirstName'] =  $FirstName;
		$this->_load();
		return $this;
	} 
		
	public function findByMiddleName($MiddleName) {
		$this->_findBy['MiddleName'] =  $MiddleName;
		$this->_load();
		return $this;
	} 
		
	public function findByLastName($LastName) {
		$this->_findBy['LastName'] =  $LastName;
		$this->_load();
		return $this;
	} 
		
	public function findByGender($Gender) {
		$this->_findBy['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function findByLink($Link) {
		$this->_findBy['Link'] =  $Link;
		$this->_load();
		return $this;
	} 
		
	public function findByBirthday($Birthday) {
		$this->_findBy['Birthday'] =  $Birthday;
		$this->_load();
		return $this;
	} 
		
	public function findByLocation($Location) {
		$this->_findBy['Location'] =  $Location;
		$this->_load();
		return $this;
	} 
		
	public function findByTimezone($Timezone) {
		$this->_findBy['Timezone'] =  $Timezone;
		$this->_load();
		return $this;
	} 
		
	public function findByAccessToken($AccessToken) {
		$this->_findBy['AccessToken'] =  $AccessToken;
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
		
	public function findOneByIdFacebook($IdFacebook) {
		$this->_findOneBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByName($Name) {
		$this->_findOneBy['Name'] =  $Name;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByFirstName($FirstName) {
		$this->_findOneBy['FirstName'] =  $FirstName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMiddleName($MiddleName) {
		$this->_findOneBy['MiddleName'] =  $MiddleName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLastName($LastName) {
		$this->_findOneBy['LastName'] =  $LastName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGender($Gender) {
		$this->_findOneBy['Gender'] =  $Gender;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLink($Link) {
		$this->_findOneBy['Link'] =  $Link;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBirthday($Birthday) {
		$this->_findOneBy['Birthday'] =  $Birthday;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLocation($Location) {
		$this->_findOneBy['Location'] =  $Location;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTimezone($Timezone) {
		$this->_findOneBy['Timezone'] =  $Timezone;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAccessToken($AccessToken) {
		$this->_findOneBy['AccessToken'] =  $AccessToken;
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
		
	public function findByLikeIdFacebook($IdFacebook) {
		$this->_findByLike['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeName($Name) {
		$this->_findByLike['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeFirstName($FirstName) {
		$this->_findByLike['FirstName'] =  $FirstName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMiddleName($MiddleName) {
		$this->_findByLike['MiddleName'] =  $MiddleName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLastName($LastName) {
		$this->_findByLike['LastName'] =  $LastName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGender($Gender) {
		$this->_findByLike['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLink($Link) {
		$this->_findByLike['Link'] =  $Link;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBirthday($Birthday) {
		$this->_findByLike['Birthday'] =  $Birthday;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLocation($Location) {
		$this->_findByLike['Location'] =  $Location;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTimezone($Timezone) {
		$this->_findByLike['Timezone'] =  $Timezone;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAccessToken($AccessToken) {
		$this->_findByLike['AccessToken'] =  $AccessToken;
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
		
	public function filterByIdFacebook($IdFacebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdFacebook',$IdFacebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByName($Name, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Name',$Name,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByFirstName($FirstName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('FirstName',$FirstName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMiddleName($MiddleName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MiddleName',$MiddleName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLastName($LastName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('LastName',$LastName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGender($Gender, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Gender',$Gender,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLink($Link, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Link',$Link,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBirthday($Birthday, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Birthday',$Birthday,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLocation($Location, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Location',$Location,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTimezone($Timezone, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Timezone',$Timezone,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAccessToken($AccessToken, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AccessToken',$AccessToken,$_condition);

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
		
	public function filterLikeByIdFacebook($IdFacebook) {
		$this->_filterLikeBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByName($Name) {
		$this->_filterLikeBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByFirstName($FirstName) {
		$this->_filterLikeBy['FirstName'] =  $FirstName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMiddleName($MiddleName) {
		$this->_filterLikeBy['MiddleName'] =  $MiddleName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLastName($LastName) {
		$this->_filterLikeBy['LastName'] =  $LastName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGender($Gender) {
		$this->_filterLikeBy['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLink($Link) {
		$this->_filterLikeBy['Link'] =  $Link;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBirthday($Birthday) {
		$this->_filterLikeBy['Birthday'] =  $Birthday;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLocation($Location) {
		$this->_filterLikeBy['Location'] =  $Location;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTimezone($Timezone) {
		$this->_filterLikeBy['Timezone'] =  $Timezone;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAccessToken($AccessToken) {
		$this->_filterLikeBy['AccessToken'] =  $AccessToken;
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
		
	public function orderByIdFacebook($direction = 'ASC') {
		$this->loadDirection('id_facebook',$direction);
		return $this;
	} 
		
	public function orderByName($direction = 'ASC') {
		$this->loadDirection('name',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByFirstName($direction = 'ASC') {
		$this->loadDirection('first_name',$direction);
		return $this;
	} 
		
	public function orderByMiddleName($direction = 'ASC') {
		$this->loadDirection('middle_name',$direction);
		return $this;
	} 
		
	public function orderByLastName($direction = 'ASC') {
		$this->loadDirection('last_name',$direction);
		return $this;
	} 
		
	public function orderByGender($direction = 'ASC') {
		$this->loadDirection('gender',$direction);
		return $this;
	} 
		
	public function orderByLink($direction = 'ASC') {
		$this->loadDirection('link',$direction);
		return $this;
	} 
		
	public function orderByBirthday($direction = 'ASC') {
		$this->loadDirection('birthday',$direction);
		return $this;
	} 
		
	public function orderByLocation($direction = 'ASC') {
		$this->loadDirection('location',$direction);
		return $this;
	} 
		
	public function orderByTimezone($direction = 'ASC') {
		$this->loadDirection('timezone',$direction);
		return $this;
	} 
		
	public function orderByAccessToken($direction = 'ASC') {
		$this->loadDirection('access_token',$direction);
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
		    'IdFacebook' =>  'id_facebook',            
		    'Name' =>  'name',            
		    'Email' =>  'email',            
		    'FirstName' =>  'first_name',            
		    'MiddleName' =>  'middle_name',            
		    'LastName' =>  'last_name',            
		    'Gender' =>  'gender',            
		    'Link' =>  'link',            
		    'Birthday' =>  'birthday',            
		    'Location' =>  'location',            
		    'Timezone' =>  'timezone',            
		    'AccessToken' =>  'access_token',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}