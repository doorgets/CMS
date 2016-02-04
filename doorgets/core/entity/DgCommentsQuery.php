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

class DgCommentsQuery extends AbstractQuery 
{

	protected $_table = '_dg_comments';
    
    protected $_className = 'DgComments';

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
		
	public function findByUriModule($UriModule) {
		$this->_findBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByUriContent($UriContent) {
		$this->_findBy['UriContent'] =  $UriContent;
		$this->_load();
		return $this;
	} 
		
	public function findByNom($Nom) {
		$this->_findBy['Nom'] =  $Nom;
		$this->_load();
		return $this;
	} 
		
	public function findByStars($Stars) {
		$this->_findBy['Stars'] =  $Stars;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByStars($from,$to) {
		$this->_findRangeBy['Stars'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByStars($int) {
		$this->_findGreaterThanBy['Stars'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByStars($int) {
		$this->_findLessThanBy['Stars'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByUrl($Url) {
		$this->_findBy['Url'] =  $Url;
		$this->_load();
		return $this;
	} 
		
	public function findByComment($Comment) {
		$this->_findBy['Comment'] =  $Comment;
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
		
	public function findByValidation($Validation) {
		$this->_findBy['Validation'] =  $Validation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByValidation($from,$to) {
		$this->_findRangeBy['Validation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByValidation($int) {
		$this->_findGreaterThanBy['Validation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByValidation($int) {
		$this->_findLessThanBy['Validation'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateValidation($DateValidation) {
		$this->_findBy['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateValidation($from,$to) {
		$this->_findRangeBy['DateValidation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateValidation($int) {
		$this->_findGreaterThanBy['DateValidation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateValidation($int) {
		$this->_findLessThanBy['DateValidation'] = $int;
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
		
	public function findByAdressIp($AdressIp) {
		$this->_findBy['AdressIp'] =  $AdressIp;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
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
		
	public function findOneByIdGroupe($IdGroupe) {
		$this->_findOneBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriModule($UriModule) {
		$this->_findOneBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriContent($UriContent) {
		$this->_findOneBy['UriContent'] =  $UriContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNom($Nom) {
		$this->_findOneBy['Nom'] =  $Nom;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStars($Stars) {
		$this->_findOneBy['Stars'] =  $Stars;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUrl($Url) {
		$this->_findOneBy['Url'] =  $Url;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByComment($Comment) {
		$this->_findOneBy['Comment'] =  $Comment;
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
		
	public function findOneByValidation($Validation) {
		$this->_findOneBy['Validation'] =  $Validation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateValidation($DateValidation) {
		$this->_findOneBy['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateArchive($DateArchive) {
		$this->_findOneBy['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAdressIp($AdressIp) {
		$this->_findOneBy['AdressIp'] =  $AdressIp;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
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
		
	public function findByLikeIdGroupe($IdGroupe) {
		$this->_findByLike['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriModule($UriModule) {
		$this->_findByLike['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriContent($UriContent) {
		$this->_findByLike['UriContent'] =  $UriContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNom($Nom) {
		$this->_findByLike['Nom'] =  $Nom;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStars($Stars) {
		$this->_findByLike['Stars'] =  $Stars;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUrl($Url) {
		$this->_findByLike['Url'] =  $Url;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeComment($Comment) {
		$this->_findByLike['Comment'] =  $Comment;
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
		
	public function findByLikeValidation($Validation) {
		$this->_findByLike['Validation'] =  $Validation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateValidation($DateValidation) {
		$this->_findByLike['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateArchive($DateArchive) {
		$this->_findByLike['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAdressIp($AdressIp) {
		$this->_findByLike['AdressIp'] =  $AdressIp;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
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
		
	public function filterByUriModule($UriModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriModule',$UriModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUriContent($UriContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriContent',$UriContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByNom($Nom, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Nom',$Nom,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStars($Stars, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Stars',$Stars,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByStars($from,$to) {
		$this->_filterRangeBy['Stars'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByStars($int) {
		$this->_filterGreaterThanBy['Stars'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByStars($int) {
		$this->_filterLessThanBy['Stars'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUrl($Url, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Url',$Url,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByComment($Comment, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Comment',$Comment,$_condition);

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
		
	public function filterByValidation($Validation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Validation',$Validation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByValidation($from,$to) {
		$this->_filterRangeBy['Validation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByValidation($int) {
		$this->_filterGreaterThanBy['Validation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByValidation($int) {
		$this->_filterLessThanBy['Validation'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateValidation($DateValidation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateValidation',$DateValidation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateValidation($from,$to) {
		$this->_filterRangeBy['DateValidation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateValidation($int) {
		$this->_filterGreaterThanBy['DateValidation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateValidation($int) {
		$this->_filterLessThanBy['DateValidation'] = $int;
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
		
	public function filterByAdressIp($AdressIp, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AdressIp',$AdressIp,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

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
		
	public function filterLikeByIdGroupe($IdGroupe) {
		$this->_filterLikeBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriModule($UriModule) {
		$this->_filterLikeBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriContent($UriContent) {
		$this->_filterLikeBy['UriContent'] =  $UriContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNom($Nom) {
		$this->_filterLikeBy['Nom'] =  $Nom;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStars($Stars) {
		$this->_filterLikeBy['Stars'] =  $Stars;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUrl($Url) {
		$this->_filterLikeBy['Url'] =  $Url;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByComment($Comment) {
		$this->_filterLikeBy['Comment'] =  $Comment;
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
		
	public function filterLikeByValidation($Validation) {
		$this->_filterLikeBy['Validation'] =  $Validation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateValidation($DateValidation) {
		$this->_filterLikeBy['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateArchive($DateArchive) {
		$this->_filterLikeBy['DateArchive'] =  $DateArchive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAdressIp($AdressIp) {
		$this->_filterLikeBy['AdressIp'] =  $AdressIp;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
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
		
	public function orderByIdGroupe($direction = 'ASC') {
		$this->loadDirection('id_groupe',$direction);
		return $this;
	} 
		
	public function orderByUriModule($direction = 'ASC') {
		$this->loadDirection('uri_module',$direction);
		return $this;
	} 
		
	public function orderByUriContent($direction = 'ASC') {
		$this->loadDirection('uri_content',$direction);
		return $this;
	} 
		
	public function orderByNom($direction = 'ASC') {
		$this->loadDirection('nom',$direction);
		return $this;
	} 
		
	public function orderByStars($direction = 'ASC') {
		$this->loadDirection('stars',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByUrl($direction = 'ASC') {
		$this->loadDirection('url',$direction);
		return $this;
	} 
		
	public function orderByComment($direction = 'ASC') {
		$this->loadDirection('comment',$direction);
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
		
	public function orderByValidation($direction = 'ASC') {
		$this->loadDirection('validation',$direction);
		return $this;
	} 
		
	public function orderByDateValidation($direction = 'ASC') {
		$this->loadDirection('date_validation',$direction);
		return $this;
	} 
		
	public function orderByDateArchive($direction = 'ASC') {
		$this->loadDirection('date_archive',$direction);
		return $this;
	} 
		
	public function orderByAdressIp($direction = 'ASC') {
		$this->loadDirection('adress_ip',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'UriModule' =>  'uri_module',            
		    'UriContent' =>  'uri_content',            
		    'Nom' =>  'nom',            
		    'Stars' =>  'stars',            
		    'Email' =>  'email',            
		    'Url' =>  'url',            
		    'Comment' =>  'comment',            
		    'Lu' =>  'lu',            
		    'Archive' =>  'archive',            
		    'DateCreation' =>  'date_creation',            
		    'Validation' =>  'validation',            
		    'DateValidation' =>  'date_validation',            
		    'DateArchive' =>  'date_archive',            
		    'AdressIp' =>  'adress_ip',            
		    'Langue' =>  'langue',		
		));
	} 


}