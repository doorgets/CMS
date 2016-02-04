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

class DgInboxQuery extends AbstractQuery 
{

	protected $_table = '_dg_inbox';
    
    protected $_className = 'DgInbox';

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
		
	public function findBySujet($Sujet) {
		$this->_findBy['Sujet'] =  $Sujet;
		$this->_load();
		return $this;
	} 
		
	public function findByNom($Nom) {
		$this->_findBy['Nom'] =  $Nom;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByMessage($Message) {
		$this->_findBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByTelephone($Telephone) {
		$this->_findBy['Telephone'] =  $Telephone;
		$this->_load();
		return $this;
	} 
		
	public function findByLu($Lu) {
		$this->_findBy['Lu'] =  $Lu;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByLu($from,$to) {
		$this->_findRangeBy['Lu'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByLu($int) {
		$this->_findGreaterThanBy['Lu'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByLu($int) {
		$this->_findLessThanBy['Lu'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByArchive($Archive) {
		$this->_findBy['Archive'] =  $Archive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByArchive($from,$to) {
		$this->_findRangeBy['Archive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByArchive($int) {
		$this->_findGreaterThanBy['Archive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByArchive($int) {
		$this->_findLessThanBy['Archive'] = $int;
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
		
	public function findByDateArchive($DateArchive) {
		$this->_findBy['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateArchive($from,$to) {
		$this->_findRangeBy['DateArchive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateArchive($int) {
		$this->_findGreaterThanBy['DateArchive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateArchive($int) {
		$this->_findLessThanBy['DateArchive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateLu($DateLu) {
		$this->_findBy['DateLu'] =  $DateLu;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateLu($from,$to) {
		$this->_findRangeBy['DateLu'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateLu($int) {
		$this->_findGreaterThanBy['DateLu'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateLu($int) {
		$this->_findLessThanBy['DateLu'] = $int;
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
		
	public function findOneBySujet($Sujet) {
		$this->_findOneBy['Sujet'] =  $Sujet;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNom($Nom) {
		$this->_findOneBy['Nom'] =  $Nom;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessage($Message) {
		$this->_findOneBy['Message'] =  $Message;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTelephone($Telephone) {
		$this->_findOneBy['Telephone'] =  $Telephone;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLu($Lu) {
		$this->_findOneBy['Lu'] =  $Lu;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByArchive($Archive) {
		$this->_findOneBy['Archive'] =  $Archive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateArchive($DateArchive) {
		$this->_findOneBy['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateLu($DateLu) {
		$this->_findOneBy['DateLu'] =  $DateLu;
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
		
	public function findByLikeSujet($Sujet) {
		$this->_findByLike['Sujet'] =  $Sujet;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNom($Nom) {
		$this->_findByLike['Nom'] =  $Nom;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessage($Message) {
		$this->_findByLike['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTelephone($Telephone) {
		$this->_findByLike['Telephone'] =  $Telephone;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLu($Lu) {
		$this->_findByLike['Lu'] =  $Lu;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeArchive($Archive) {
		$this->_findByLike['Archive'] =  $Archive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateArchive($DateArchive) {
		$this->_findByLike['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateLu($DateLu) {
		$this->_findByLike['DateLu'] =  $DateLu;
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
		
	public function filterBySujet($Sujet, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Sujet',$Sujet,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByNom($Nom, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Nom',$Nom,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMessage($Message, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Message',$Message,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTelephone($Telephone, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Telephone',$Telephone,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLu($Lu, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Lu',$Lu,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByLu($from,$to) {
		$this->_filterRangeBy['Lu'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByLu($int) {
		$this->_filterGreaterThanBy['Lu'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByLu($int) {
		$this->_filterLessThanBy['Lu'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByArchive($Archive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Archive',$Archive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByArchive($from,$to) {
		$this->_filterRangeBy['Archive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByArchive($int) {
		$this->_filterGreaterThanBy['Archive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByArchive($int) {
		$this->_filterLessThanBy['Archive'] = $int;
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
		
	public function filterByDateArchive($DateArchive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateArchive',$DateArchive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateArchive($from,$to) {
		$this->_filterRangeBy['DateArchive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateArchive($int) {
		$this->_filterGreaterThanBy['DateArchive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateArchive($int) {
		$this->_filterLessThanBy['DateArchive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateLu($DateLu, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateLu',$DateLu,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateLu($from,$to) {
		$this->_filterRangeBy['DateLu'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateLu($int) {
		$this->_filterGreaterThanBy['DateLu'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateLu($int) {
		$this->_filterLessThanBy['DateLu'] = $int;
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
		
	public function filterLikeBySujet($Sujet) {
		$this->_filterLikeBy['Sujet'] =  $Sujet;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNom($Nom) {
		$this->_filterLikeBy['Nom'] =  $Nom;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessage($Message) {
		$this->_filterLikeBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTelephone($Telephone) {
		$this->_filterLikeBy['Telephone'] =  $Telephone;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLu($Lu) {
		$this->_filterLikeBy['Lu'] =  $Lu;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByArchive($Archive) {
		$this->_filterLikeBy['Archive'] =  $Archive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateArchive($DateArchive) {
		$this->_filterLikeBy['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateLu($DateLu) {
		$this->_filterLikeBy['DateLu'] =  $DateLu;
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
		
	public function orderBySujet($direction = 'ASC') {
		$this->loadDirection('sujet',$direction);
		return $this;
	} 
		
	public function orderByNom($direction = 'ASC') {
		$this->loadDirection('nom',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByMessage($direction = 'ASC') {
		$this->loadDirection('message',$direction);
		return $this;
	} 
		
	public function orderByTelephone($direction = 'ASC') {
		$this->loadDirection('telephone',$direction);
		return $this;
	} 
		
	public function orderByLu($direction = 'ASC') {
		$this->loadDirection('lu',$direction);
		return $this;
	} 
		
	public function orderByArchive($direction = 'ASC') {
		$this->loadDirection('archive',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByDateArchive($direction = 'ASC') {
		$this->loadDirection('date_archive',$direction);
		return $this;
	} 
		
	public function orderByDateLu($direction = 'ASC') {
		$this->loadDirection('date_lu',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'UriModule' =>  'uri_module',            
		    'Sujet' =>  'sujet',            
		    'Nom' =>  'nom',            
		    'Email' =>  'email',            
		    'Message' =>  'message',            
		    'Telephone' =>  'telephone',            
		    'Lu' =>  'lu',            
		    'Archive' =>  'archive',            
		    'DateCreation' =>  'date_creation',            
		    'DateArchive' =>  'date_archive',            
		    'DateLu' =>  'date_lu',		
		));
	} 


}