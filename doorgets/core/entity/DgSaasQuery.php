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

class DgSaasQuery extends AbstractQuery 
{

	protected $_table = '_dg_saas';
    
    protected $_className = 'DgSaas';

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
		
	public function findByPseudo($Pseudo) {
		$this->_findBy['Pseudo'] =  $Pseudo;
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
		
	public function findByIdGroupe($IdGroupe) {
		$this->_findBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdGroupe($from,$to) {
		$this->_findRangeBy['IdGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdGroupe($int) {
		$this->_findGreaterThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdGroupe($int) {
		$this->_findLessThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDomain($Domain) {
		$this->_findBy['Domain'] =  $Domain;
		$this->_load();
		return $this;
	} 
		
	public function findByDomainReal($DomainReal) {
		$this->_findBy['DomainReal'] =  $DomainReal;
		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title) {
		$this->_findBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findBySlogan($Slogan) {
		$this->_findBy['Slogan'] =  $Slogan;
		$this->_load();
		return $this;
	} 
		
	public function findByDescription($Description) {
		$this->_findBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByKeywords($Keywords) {
		$this->_findBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function findByCopyright($Copyright) {
		$this->_findBy['Copyright'] =  $Copyright;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByTimezone($Timezone) {
		$this->_findBy['Timezone'] =  $Timezone;
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
		
	public function findOneByPseudo($Pseudo) {
		$this->_findOneBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdUser($IdUser) {
		$this->_findOneBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdGroupe($IdGroupe) {
		$this->_findOneBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDomain($Domain) {
		$this->_findOneBy['Domain'] =  $Domain;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDomainReal($DomainReal) {
		$this->_findOneBy['DomainReal'] =  $DomainReal;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title) {
		$this->_findOneBy['Title'] =  $Title;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySlogan($Slogan) {
		$this->_findOneBy['Slogan'] =  $Slogan;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDescription($Description) {
		$this->_findOneBy['Description'] =  $Description;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByKeywords($Keywords) {
		$this->_findOneBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCopyright($Copyright) {
		$this->_findOneBy['Copyright'] =  $Copyright;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTimezone($Timezone) {
		$this->_findOneBy['Timezone'] =  $Timezone;
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
		
	public function findByLikePseudo($Pseudo) {
		$this->_findByLike['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdUser($IdUser) {
		$this->_findByLike['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdGroupe($IdGroupe) {
		$this->_findByLike['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDomain($Domain) {
		$this->_findByLike['Domain'] =  $Domain;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDomainReal($DomainReal) {
		$this->_findByLike['DomainReal'] =  $DomainReal;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title) {
		$this->_findByLike['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSlogan($Slogan) {
		$this->_findByLike['Slogan'] =  $Slogan;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDescription($Description) {
		$this->_findByLike['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeKeywords($Keywords) {
		$this->_findByLike['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCopyright($Copyright) {
		$this->_findByLike['Copyright'] =  $Copyright;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTimezone($Timezone) {
		$this->_findByLike['Timezone'] =  $Timezone;
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
		
	public function filterByPseudo($Pseudo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Pseudo',$Pseudo,$_condition);

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
		
	public function filterByIdGroupe($IdGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdGroupe',$IdGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdGroupe($from,$to) {
		$this->_filterRangeBy['IdGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdGroupe($int) {
		$this->_filterGreaterThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdGroupe($int) {
		$this->_filterLessThanBy['IdGroupe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDomain($Domain, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Domain',$Domain,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDomainReal($DomainReal, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DomainReal',$DomainReal,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySlogan($Slogan, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Slogan',$Slogan,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDescription($Description, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Description',$Description,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByKeywords($Keywords, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Keywords',$Keywords,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCopyright($Copyright, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Copyright',$Copyright,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTimezone($Timezone, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Timezone',$Timezone,$_condition);

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
		
	public function filterLikeByPseudo($Pseudo) {
		$this->_filterLikeBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdUser($IdUser) {
		$this->_filterLikeBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdGroupe($IdGroupe) {
		$this->_filterLikeBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDomain($Domain) {
		$this->_filterLikeBy['Domain'] =  $Domain;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDomainReal($DomainReal) {
		$this->_filterLikeBy['DomainReal'] =  $DomainReal;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title) {
		$this->_filterLikeBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySlogan($Slogan) {
		$this->_filterLikeBy['Slogan'] =  $Slogan;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDescription($Description) {
		$this->_filterLikeBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByKeywords($Keywords) {
		$this->_filterLikeBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCopyright($Copyright) {
		$this->_filterLikeBy['Copyright'] =  $Copyright;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTimezone($Timezone) {
		$this->_filterLikeBy['Timezone'] =  $Timezone;
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
		
	public function orderByPseudo($direction = 'ASC') {
		$this->loadDirection('pseudo',$direction);
		return $this;
	} 
		
	public function orderByIdUser($direction = 'ASC') {
		$this->loadDirection('id_user',$direction);
		return $this;
	} 
		
	public function orderByIdGroupe($direction = 'ASC') {
		$this->loadDirection('id_groupe',$direction);
		return $this;
	} 
		
	public function orderByDomain($direction = 'ASC') {
		$this->loadDirection('domain',$direction);
		return $this;
	} 
		
	public function orderByDomainReal($direction = 'ASC') {
		$this->loadDirection('domain_real',$direction);
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC') {
		$this->loadDirection('title',$direction);
		return $this;
	} 
		
	public function orderBySlogan($direction = 'ASC') {
		$this->loadDirection('slogan',$direction);
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC') {
		$this->loadDirection('description',$direction);
		return $this;
	} 
		
	public function orderByKeywords($direction = 'ASC') {
		$this->loadDirection('keywords',$direction);
		return $this;
	} 
		
	public function orderByCopyright($direction = 'ASC') {
		$this->loadDirection('copyright',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByTimezone($direction = 'ASC') {
		$this->loadDirection('timezone',$direction);
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
		    'Pseudo' =>  'pseudo',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'Domain' =>  'domain',            
		    'DomainReal' =>  'domain_real',            
		    'Title' =>  'title',            
		    'Slogan' =>  'slogan',            
		    'Description' =>  'description',            
		    'Keywords' =>  'keywords',            
		    'Copyright' =>  'copyright',            
		    'Email' =>  'email',            
		    'Langue' =>  'langue',            
		    'Timezone' =>  'timezone',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}