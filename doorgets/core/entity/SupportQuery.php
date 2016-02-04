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

class SupportQuery extends AbstractQuery 
{

	protected $_table = '_support';
    
    protected $_className = 'Support';

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
		
	public function findByStatus($Status) {
		$this->_findBy['Status'] =  $Status;
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
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLevel($Level) {
		$this->_findBy['Level'] =  $Level;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByLevel($from,$to) {
		$this->_findRangeBy['Level'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByLevel($int) {
		$this->_findGreaterThanBy['Level'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByLevel($int) {
		$this->_findLessThanBy['Level'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByReference($Reference) {
		$this->_findBy['Reference'] =  $Reference;
		$this->_load();
		return $this;
	} 
		
	public function findByCountMessages($CountMessages) {
		$this->_findBy['CountMessages'] =  $CountMessages;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByCountMessages($from,$to) {
		$this->_findRangeBy['CountMessages'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByCountMessages($int) {
		$this->_findGreaterThanBy['CountMessages'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByCountMessages($int) {
		$this->_findLessThanBy['CountMessages'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPseudo($Pseudo) {
		$this->_findBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByReadedUser($ReadedUser) {
		$this->_findBy['ReadedUser'] =  $ReadedUser;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByReadedUser($from,$to) {
		$this->_findRangeBy['ReadedUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByReadedUser($int) {
		$this->_findGreaterThanBy['ReadedUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByReadedUser($int) {
		$this->_findLessThanBy['ReadedUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByReadedSupport($ReadedSupport) {
		$this->_findBy['ReadedSupport'] =  $ReadedSupport;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByReadedSupport($from,$to) {
		$this->_findRangeBy['ReadedSupport'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByReadedSupport($int) {
		$this->_findGreaterThanBy['ReadedSupport'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByReadedSupport($int) {
		$this->_findLessThanBy['ReadedSupport'] = $int;
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
		
	public function findByDateClose($DateClose) {
		$this->_findBy['DateClose'] =  $DateClose;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateClose($from,$to) {
		$this->_findRangeBy['DateClose'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateClose($int) {
		$this->_findGreaterThanBy['DateClose'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateClose($int) {
		$this->_findLessThanBy['DateClose'] = $int;
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
		
	public function findOneByStatus($Status) {
		$this->_findOneBy['Status'] =  $Status;
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
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLevel($Level) {
		$this->_findOneBy['Level'] =  $Level;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReference($Reference) {
		$this->_findOneBy['Reference'] =  $Reference;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCountMessages($CountMessages) {
		$this->_findOneBy['CountMessages'] =  $CountMessages;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPseudo($Pseudo) {
		$this->_findOneBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReadedUser($ReadedUser) {
		$this->_findOneBy['ReadedUser'] =  $ReadedUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByReadedSupport($ReadedSupport) {
		$this->_findOneBy['ReadedSupport'] =  $ReadedSupport;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateClose($DateClose) {
		$this->_findOneBy['DateClose'] =  $DateClose;
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
		
	public function findByLikeStatus($Status) {
		$this->_findByLike['Status'] =  $Status;
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
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLevel($Level) {
		$this->_findByLike['Level'] =  $Level;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReference($Reference) {
		$this->_findByLike['Reference'] =  $Reference;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCountMessages($CountMessages) {
		$this->_findByLike['CountMessages'] =  $CountMessages;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePseudo($Pseudo) {
		$this->_findByLike['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReadedUser($ReadedUser) {
		$this->_findByLike['ReadedUser'] =  $ReadedUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeReadedSupport($ReadedSupport) {
		$this->_findByLike['ReadedSupport'] =  $ReadedSupport;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateClose($DateClose) {
		$this->_findByLike['DateClose'] =  $DateClose;
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
		
	public function filterByStatus($Status, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Status',$Status,$_condition);

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
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLevel($Level, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Level',$Level,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByLevel($from,$to) {
		$this->_filterRangeBy['Level'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByLevel($int) {
		$this->_filterGreaterThanBy['Level'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByLevel($int) {
		$this->_filterLessThanBy['Level'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByReference($Reference, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Reference',$Reference,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCountMessages($CountMessages, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CountMessages',$CountMessages,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByCountMessages($from,$to) {
		$this->_filterRangeBy['CountMessages'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByCountMessages($int) {
		$this->_filterGreaterThanBy['CountMessages'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByCountMessages($int) {
		$this->_filterLessThanBy['CountMessages'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPseudo($Pseudo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Pseudo',$Pseudo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByReadedUser($ReadedUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ReadedUser',$ReadedUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByReadedUser($from,$to) {
		$this->_filterRangeBy['ReadedUser'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByReadedUser($int) {
		$this->_filterGreaterThanBy['ReadedUser'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByReadedUser($int) {
		$this->_filterLessThanBy['ReadedUser'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByReadedSupport($ReadedSupport, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ReadedSupport',$ReadedSupport,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByReadedSupport($from,$to) {
		$this->_filterRangeBy['ReadedSupport'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByReadedSupport($int) {
		$this->_filterGreaterThanBy['ReadedSupport'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByReadedSupport($int) {
		$this->_filterLessThanBy['ReadedSupport'] = $int;
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
		
	public function filterByDateClose($DateClose, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateClose',$DateClose,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateClose($from,$to) {
		$this->_filterRangeBy['DateClose'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateClose($int) {
		$this->_filterGreaterThanBy['DateClose'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateClose($int) {
		$this->_filterLessThanBy['DateClose'] = $int;
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
		
	public function filterLikeByStatus($Status) {
		$this->_filterLikeBy['Status'] =  $Status;
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
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLevel($Level) {
		$this->_filterLikeBy['Level'] =  $Level;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReference($Reference) {
		$this->_filterLikeBy['Reference'] =  $Reference;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCountMessages($CountMessages) {
		$this->_filterLikeBy['CountMessages'] =  $CountMessages;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPseudo($Pseudo) {
		$this->_filterLikeBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReadedUser($ReadedUser) {
		$this->_filterLikeBy['ReadedUser'] =  $ReadedUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByReadedSupport($ReadedSupport) {
		$this->_filterLikeBy['ReadedSupport'] =  $ReadedSupport;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateClose($DateClose) {
		$this->_filterLikeBy['DateClose'] =  $DateClose;
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
		
	public function orderByStatus($direction = 'ASC') {
		$this->loadDirection('status',$direction);
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
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByLevel($direction = 'ASC') {
		$this->loadDirection('level',$direction);
		return $this;
	} 
		
	public function orderByReference($direction = 'ASC') {
		$this->loadDirection('reference',$direction);
		return $this;
	} 
		
	public function orderByCountMessages($direction = 'ASC') {
		$this->loadDirection('count_messages',$direction);
		return $this;
	} 
		
	public function orderByPseudo($direction = 'ASC') {
		$this->loadDirection('pseudo',$direction);
		return $this;
	} 
		
	public function orderByReadedUser($direction = 'ASC') {
		$this->loadDirection('readed_user',$direction);
		return $this;
	} 
		
	public function orderByReadedSupport($direction = 'ASC') {
		$this->loadDirection('readed_support',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByDateClose($direction = 'ASC') {
		$this->loadDirection('date_close',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'Status' =>  'status',            
		    'Subject' =>  'subject',            
		    'Message' =>  'message',            
		    'Langue' =>  'langue',            
		    'Level' =>  'level',            
		    'Reference' =>  'reference',            
		    'CountMessages' =>  'count_messages',            
		    'Pseudo' =>  'pseudo',            
		    'ReadedUser' =>  'readed_user',            
		    'ReadedSupport' =>  'readed_support',            
		    'DateCreation' =>  'date_creation',            
		    'DateClose' =>  'date_close',		
		));
	} 


}