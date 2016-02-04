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

class UserGoogleQuery extends AbstractQuery 
{

	protected $_table = '_user_google';
    
    protected $_className = 'UserGoogle';

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
		
	public function findByIdGoogle($IdGoogle) {
		$this->_findBy['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByVerifiedEmail($VerifiedEmail) {
		$this->_findBy['VerifiedEmail'] =  $VerifiedEmail;
		$this->_load();
		return $this;
	} 
		
	public function findByName($Name) {
		$this->_findBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByGivenName($GivenName) {
		$this->_findBy['GivenName'] =  $GivenName;
		$this->_load();
		return $this;
	} 
		
	public function findByFamilyName($FamilyName) {
		$this->_findBy['FamilyName'] =  $FamilyName;
		$this->_load();
		return $this;
	} 
		
	public function findByLink($Link) {
		$this->_findBy['Link'] =  $Link;
		$this->_load();
		return $this;
	} 
		
	public function findByPicture($Picture) {
		$this->_findBy['Picture'] =  $Picture;
		$this->_load();
		return $this;
	} 
		
	public function findByGender($Gender) {
		$this->_findBy['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function findByLocale($Locale) {
		$this->_findBy['Locale'] =  $Locale;
		$this->_load();
		return $this;
	} 
		
	public function findByAccessToken($AccessToken) {
		$this->_findBy['AccessToken'] =  $AccessToken;
		$this->_load();
		return $this;
	} 
		
	public function findByRefreshToken($RefreshToken) {
		$this->_findBy['RefreshToken'] =  $RefreshToken;
		$this->_load();
		return $this;
	} 
		
	public function findByUserData($UserData) {
		$this->_findBy['UserData'] =  $UserData;
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
		
	public function findOneByIdGoogle($IdGoogle) {
		$this->_findOneBy['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByVerifiedEmail($VerifiedEmail) {
		$this->_findOneBy['VerifiedEmail'] =  $VerifiedEmail;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByName($Name) {
		$this->_findOneBy['Name'] =  $Name;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGivenName($GivenName) {
		$this->_findOneBy['GivenName'] =  $GivenName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByFamilyName($FamilyName) {
		$this->_findOneBy['FamilyName'] =  $FamilyName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLink($Link) {
		$this->_findOneBy['Link'] =  $Link;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPicture($Picture) {
		$this->_findOneBy['Picture'] =  $Picture;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGender($Gender) {
		$this->_findOneBy['Gender'] =  $Gender;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLocale($Locale) {
		$this->_findOneBy['Locale'] =  $Locale;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAccessToken($AccessToken) {
		$this->_findOneBy['AccessToken'] =  $AccessToken;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRefreshToken($RefreshToken) {
		$this->_findOneBy['RefreshToken'] =  $RefreshToken;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserData($UserData) {
		$this->_findOneBy['UserData'] =  $UserData;
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
		
	public function findByLikeIdGoogle($IdGoogle) {
		$this->_findByLike['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeVerifiedEmail($VerifiedEmail) {
		$this->_findByLike['VerifiedEmail'] =  $VerifiedEmail;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeName($Name) {
		$this->_findByLike['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGivenName($GivenName) {
		$this->_findByLike['GivenName'] =  $GivenName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeFamilyName($FamilyName) {
		$this->_findByLike['FamilyName'] =  $FamilyName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLink($Link) {
		$this->_findByLike['Link'] =  $Link;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePicture($Picture) {
		$this->_findByLike['Picture'] =  $Picture;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGender($Gender) {
		$this->_findByLike['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLocale($Locale) {
		$this->_findByLike['Locale'] =  $Locale;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAccessToken($AccessToken) {
		$this->_findByLike['AccessToken'] =  $AccessToken;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRefreshToken($RefreshToken) {
		$this->_findByLike['RefreshToken'] =  $RefreshToken;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserData($UserData) {
		$this->_findByLike['UserData'] =  $UserData;
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
		
	public function filterByIdGoogle($IdGoogle, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdGoogle',$IdGoogle,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByVerifiedEmail($VerifiedEmail, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('VerifiedEmail',$VerifiedEmail,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByName($Name, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Name',$Name,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGivenName($GivenName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('GivenName',$GivenName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByFamilyName($FamilyName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('FamilyName',$FamilyName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLink($Link, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Link',$Link,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPicture($Picture, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Picture',$Picture,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGender($Gender, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Gender',$Gender,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLocale($Locale, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Locale',$Locale,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAccessToken($AccessToken, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AccessToken',$AccessToken,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByRefreshToken($RefreshToken, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('RefreshToken',$RefreshToken,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUserData($UserData, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserData',$UserData,$_condition);

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
		
	public function filterLikeByIdGoogle($IdGoogle) {
		$this->_filterLikeBy['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByVerifiedEmail($VerifiedEmail) {
		$this->_filterLikeBy['VerifiedEmail'] =  $VerifiedEmail;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByName($Name) {
		$this->_filterLikeBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGivenName($GivenName) {
		$this->_filterLikeBy['GivenName'] =  $GivenName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByFamilyName($FamilyName) {
		$this->_filterLikeBy['FamilyName'] =  $FamilyName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLink($Link) {
		$this->_filterLikeBy['Link'] =  $Link;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPicture($Picture) {
		$this->_filterLikeBy['Picture'] =  $Picture;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGender($Gender) {
		$this->_filterLikeBy['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLocale($Locale) {
		$this->_filterLikeBy['Locale'] =  $Locale;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAccessToken($AccessToken) {
		$this->_filterLikeBy['AccessToken'] =  $AccessToken;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRefreshToken($RefreshToken) {
		$this->_filterLikeBy['RefreshToken'] =  $RefreshToken;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserData($UserData) {
		$this->_filterLikeBy['UserData'] =  $UserData;
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
		
	public function orderByIdGoogle($direction = 'ASC') {
		$this->loadDirection('id_google',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByVerifiedEmail($direction = 'ASC') {
		$this->loadDirection('verified_email',$direction);
		return $this;
	} 
		
	public function orderByName($direction = 'ASC') {
		$this->loadDirection('name',$direction);
		return $this;
	} 
		
	public function orderByGivenName($direction = 'ASC') {
		$this->loadDirection('given_name',$direction);
		return $this;
	} 
		
	public function orderByFamilyName($direction = 'ASC') {
		$this->loadDirection('family_name',$direction);
		return $this;
	} 
		
	public function orderByLink($direction = 'ASC') {
		$this->loadDirection('link',$direction);
		return $this;
	} 
		
	public function orderByPicture($direction = 'ASC') {
		$this->loadDirection('picture',$direction);
		return $this;
	} 
		
	public function orderByGender($direction = 'ASC') {
		$this->loadDirection('gender',$direction);
		return $this;
	} 
		
	public function orderByLocale($direction = 'ASC') {
		$this->loadDirection('locale',$direction);
		return $this;
	} 
		
	public function orderByAccessToken($direction = 'ASC') {
		$this->loadDirection('access_token',$direction);
		return $this;
	} 
		
	public function orderByRefreshToken($direction = 'ASC') {
		$this->loadDirection('refresh_token',$direction);
		return $this;
	} 
		
	public function orderByUserData($direction = 'ASC') {
		$this->loadDirection('user_data',$direction);
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
		    'IdGoogle' =>  'id_google',            
		    'Email' =>  'email',            
		    'VerifiedEmail' =>  'verified_email',            
		    'Name' =>  'name',            
		    'GivenName' =>  'given_name',            
		    'FamilyName' =>  'family_name',            
		    'Link' =>  'link',            
		    'Picture' =>  'picture',            
		    'Gender' =>  'gender',            
		    'Locale' =>  'locale',            
		    'AccessToken' =>  'access_token',            
		    'RefreshToken' =>  'refresh_token',            
		    'UserData' =>  'user_data',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}