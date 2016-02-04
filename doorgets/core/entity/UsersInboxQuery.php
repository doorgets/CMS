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

class UsersInboxQuery extends AbstractQuery 
{

	protected $_table = '_users_inbox';
    
    protected $_className = 'UsersInbox';

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
		
	public function findByIdUserSent($IdUserSent) {
		$this->_findBy['IdUserSent'] =  $IdUserSent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdUserSent($from,$to) {
		$this->_findRangeBy['IdUserSent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdUserSent($int) {
		$this->_findGreaterThanBy['IdUserSent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdUserSent($int) {
		$this->_findLessThanBy['IdUserSent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPseudoUser($PseudoUser) {
		$this->_findBy['PseudoUser'] =  $PseudoUser;
		$this->_load();
		return $this;
	} 
		
	public function findByPseudoUserSent($PseudoUserSent) {
		$this->_findBy['PseudoUserSent'] =  $PseudoUserSent;
		$this->_load();
		return $this;
	} 
		
	public function findByUserDelete($UserDelete) {
		$this->_findBy['UserDelete'] =  $UserDelete;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUserDelete($from,$to) {
		$this->_findRangeBy['UserDelete'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUserDelete($int) {
		$this->_findGreaterThanBy['UserDelete'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUserDelete($int) {
		$this->_findLessThanBy['UserDelete'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUserSentDelete($UserSentDelete) {
		$this->_findBy['UserSentDelete'] =  $UserSentDelete;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByUserSentDelete($from,$to) {
		$this->_findRangeBy['UserSentDelete'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByUserSentDelete($int) {
		$this->_findGreaterThanBy['UserSentDelete'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByUserSentDelete($int) {
		$this->_findLessThanBy['UserSentDelete'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByPhone($Phone) {
		$this->_findBy['Phone'] =  $Phone;
		$this->_load();
		return $this;
	} 
		
	public function findByName($Name) {
		$this->_findBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findBySubject($Subject) {
		$this->_findBy['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function findByMessage($Message) {
		$this->_findBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByReaded($Readed) {
		$this->_findBy['Readed'] =  $Readed;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByReaded($from,$to) {
		$this->_findRangeBy['Readed'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByReaded($int) {
		$this->_findGreaterThanBy['Readed'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByReaded($int) {
		$this->_findLessThanBy['Readed'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateReaded($DateReaded) {
		$this->_findBy['DateReaded'] =  $DateReaded;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateReaded($from,$to) {
		$this->_findRangeBy['DateReaded'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateReaded($int) {
		$this->_findGreaterThanBy['DateReaded'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateReaded($int) {
		$this->_findLessThanBy['DateReaded'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateDeleted($DateDeleted) {
		$this->_findBy['DateDeleted'] =  $DateDeleted;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateDeleted($from,$to) {
		$this->_findRangeBy['DateDeleted'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateDeleted($int) {
		$this->_findGreaterThanBy['DateDeleted'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateDeleted($int) {
		$this->_findLessThanBy['DateDeleted'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateSentDeleted($DateSentDeleted) {
		$this->_findBy['DateSentDeleted'] =  $DateSentDeleted;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateSentDeleted($from,$to) {
		$this->_findRangeBy['DateSentDeleted'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateSentDeleted($int) {
		$this->_findGreaterThanBy['DateSentDeleted'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateSentDeleted($int) {
		$this->_findLessThanBy['DateSentDeleted'] = $int;
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
		
	public function findOneByIdUser($IdUser) {
		$this->_findOneBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdUserSent($IdUserSent) {
		$this->_findOneBy['IdUserSent'] =  $IdUserSent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPseudoUser($PseudoUser) {
		$this->_findOneBy['PseudoUser'] =  $PseudoUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPseudoUserSent($PseudoUserSent) {
		$this->_findOneBy['PseudoUserSent'] =  $PseudoUserSent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserDelete($UserDelete) {
		$this->_findOneBy['UserDelete'] =  $UserDelete;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUserSentDelete($UserSentDelete) {
		$this->_findOneBy['UserSentDelete'] =  $UserSentDelete;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPhone($Phone) {
		$this->_findOneBy['Phone'] =  $Phone;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByName($Name) {
		$this->_findOneBy['Name'] =  $Name;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySubject($Subject) {
		$this->_findOneBy['Subject'] =  $Subject;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessage($Message) {
		$this->_findOneBy['Message'] =  $Message;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReaded($Readed) {
		$this->_findOneBy['Readed'] =  $Readed;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateReaded($DateReaded) {
		$this->_findOneBy['DateReaded'] =  $DateReaded;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateDeleted($DateDeleted) {
		$this->_findOneBy['DateDeleted'] =  $DateDeleted;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateSentDeleted($DateSentDeleted) {
		$this->_findOneBy['DateSentDeleted'] =  $DateSentDeleted;
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
		
	public function findByLikeIdUser($IdUser) {
		$this->_findByLike['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdUserSent($IdUserSent) {
		$this->_findByLike['IdUserSent'] =  $IdUserSent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePseudoUser($PseudoUser) {
		$this->_findByLike['PseudoUser'] =  $PseudoUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePseudoUserSent($PseudoUserSent) {
		$this->_findByLike['PseudoUserSent'] =  $PseudoUserSent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserDelete($UserDelete) {
		$this->_findByLike['UserDelete'] =  $UserDelete;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUserSentDelete($UserSentDelete) {
		$this->_findByLike['UserSentDelete'] =  $UserSentDelete;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePhone($Phone) {
		$this->_findByLike['Phone'] =  $Phone;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeName($Name) {
		$this->_findByLike['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSubject($Subject) {
		$this->_findByLike['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessage($Message) {
		$this->_findByLike['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReaded($Readed) {
		$this->_findByLike['Readed'] =  $Readed;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateReaded($DateReaded) {
		$this->_findByLike['DateReaded'] =  $DateReaded;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateDeleted($DateDeleted) {
		$this->_findByLike['DateDeleted'] =  $DateDeleted;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateSentDeleted($DateSentDeleted) {
		$this->_findByLike['DateSentDeleted'] =  $DateSentDeleted;
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
		
	public function filterByIdUserSent($IdUserSent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdUserSent',$IdUserSent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdUserSent($from,$to) {
		$this->_filterRangeBy['IdUserSent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdUserSent($int) {
		$this->_filterGreaterThanBy['IdUserSent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdUserSent($int) {
		$this->_filterLessThanBy['IdUserSent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPseudoUser($PseudoUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PseudoUser',$PseudoUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPseudoUserSent($PseudoUserSent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PseudoUserSent',$PseudoUserSent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUserDelete($UserDelete, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserDelete',$UserDelete,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUserDelete($from,$to) {
		$this->_filterRangeBy['UserDelete'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUserDelete($int) {
		$this->_filterGreaterThanBy['UserDelete'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUserDelete($int) {
		$this->_filterLessThanBy['UserDelete'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUserSentDelete($UserSentDelete, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UserSentDelete',$UserSentDelete,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByUserSentDelete($from,$to) {
		$this->_filterRangeBy['UserSentDelete'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByUserSentDelete($int) {
		$this->_filterGreaterThanBy['UserSentDelete'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByUserSentDelete($int) {
		$this->_filterLessThanBy['UserSentDelete'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPhone($Phone, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Phone',$Phone,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByName($Name, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Name',$Name,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySubject($Subject, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Subject',$Subject,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMessage($Message, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Message',$Message,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByReaded($Readed, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Readed',$Readed,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByReaded($from,$to) {
		$this->_filterRangeBy['Readed'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByReaded($int) {
		$this->_filterGreaterThanBy['Readed'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByReaded($int) {
		$this->_filterLessThanBy['Readed'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateReaded($DateReaded, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateReaded',$DateReaded,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateReaded($from,$to) {
		$this->_filterRangeBy['DateReaded'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateReaded($int) {
		$this->_filterGreaterThanBy['DateReaded'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateReaded($int) {
		$this->_filterLessThanBy['DateReaded'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateDeleted($DateDeleted, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateDeleted',$DateDeleted,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateDeleted($from,$to) {
		$this->_filterRangeBy['DateDeleted'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateDeleted($int) {
		$this->_filterGreaterThanBy['DateDeleted'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateDeleted($int) {
		$this->_filterLessThanBy['DateDeleted'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateSentDeleted($DateSentDeleted, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateSentDeleted',$DateSentDeleted,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateSentDeleted($from,$to) {
		$this->_filterRangeBy['DateSentDeleted'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateSentDeleted($int) {
		$this->_filterGreaterThanBy['DateSentDeleted'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateSentDeleted($int) {
		$this->_filterLessThanBy['DateSentDeleted'] = $int;
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
		
	public function filterLikeByIdUser($IdUser) {
		$this->_filterLikeBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdUserSent($IdUserSent) {
		$this->_filterLikeBy['IdUserSent'] =  $IdUserSent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPseudoUser($PseudoUser) {
		$this->_filterLikeBy['PseudoUser'] =  $PseudoUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPseudoUserSent($PseudoUserSent) {
		$this->_filterLikeBy['PseudoUserSent'] =  $PseudoUserSent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserDelete($UserDelete) {
		$this->_filterLikeBy['UserDelete'] =  $UserDelete;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUserSentDelete($UserSentDelete) {
		$this->_filterLikeBy['UserSentDelete'] =  $UserSentDelete;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPhone($Phone) {
		$this->_filterLikeBy['Phone'] =  $Phone;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByName($Name) {
		$this->_filterLikeBy['Name'] =  $Name;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySubject($Subject) {
		$this->_filterLikeBy['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessage($Message) {
		$this->_filterLikeBy['Message'] =  $Message;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReaded($Readed) {
		$this->_filterLikeBy['Readed'] =  $Readed;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateReaded($DateReaded) {
		$this->_filterLikeBy['DateReaded'] =  $DateReaded;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateDeleted($DateDeleted) {
		$this->_filterLikeBy['DateDeleted'] =  $DateDeleted;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateSentDeleted($DateSentDeleted) {
		$this->_filterLikeBy['DateSentDeleted'] =  $DateSentDeleted;
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
		
	public function orderByIdUser($direction = 'ASC') {
		$this->loadDirection('id_user',$direction);
		return $this;
	} 
		
	public function orderByIdUserSent($direction = 'ASC') {
		$this->loadDirection('id_user_sent',$direction);
		return $this;
	} 
		
	public function orderByPseudoUser($direction = 'ASC') {
		$this->loadDirection('pseudo_user',$direction);
		return $this;
	} 
		
	public function orderByPseudoUserSent($direction = 'ASC') {
		$this->loadDirection('pseudo_user_sent',$direction);
		return $this;
	} 
		
	public function orderByUserDelete($direction = 'ASC') {
		$this->loadDirection('user_delete',$direction);
		return $this;
	} 
		
	public function orderByUserSentDelete($direction = 'ASC') {
		$this->loadDirection('user_sent_delete',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByPhone($direction = 'ASC') {
		$this->loadDirection('phone',$direction);
		return $this;
	} 
		
	public function orderByName($direction = 'ASC') {
		$this->loadDirection('name',$direction);
		return $this;
	} 
		
	public function orderBySubject($direction = 'ASC') {
		$this->loadDirection('subject',$direction);
		return $this;
	} 
		
	public function orderByMessage($direction = 'ASC') {
		$this->loadDirection('message',$direction);
		return $this;
	} 
		
	public function orderByReaded($direction = 'ASC') {
		$this->loadDirection('readed',$direction);
		return $this;
	} 
		
	public function orderByDateReaded($direction = 'ASC') {
		$this->loadDirection('date_readed',$direction);
		return $this;
	} 
		
	public function orderByDateDeleted($direction = 'ASC') {
		$this->loadDirection('date_deleted',$direction);
		return $this;
	} 
		
	public function orderByDateSentDeleted($direction = 'ASC') {
		$this->loadDirection('date_sent_deleted',$direction);
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
		    'IdUser' =>  'id_user',            
		    'IdUserSent' =>  'id_user_sent',            
		    'PseudoUser' =>  'pseudo_user',            
		    'PseudoUserSent' =>  'pseudo_user_sent',            
		    'UserDelete' =>  'user_delete',            
		    'UserSentDelete' =>  'user_sent_delete',            
		    'Email' =>  'email',            
		    'Phone' =>  'phone',            
		    'Name' =>  'name',            
		    'Subject' =>  'subject',            
		    'Message' =>  'message',            
		    'Readed' =>  'readed',            
		    'DateReaded' =>  'date_readed',            
		    'DateDeleted' =>  'date_deleted',            
		    'DateSentDeleted' =>  'date_sent_deleted',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


}