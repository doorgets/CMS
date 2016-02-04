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

class DgEmailNotificationTraductionQuery extends AbstractQuery 
{

	protected $_table = '_dg_email_notification_traduction';
    
    protected $_className = 'DgEmailNotificationTraduction';

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
		
	public function findByIdContent($IdContent) {
		$this->_findBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdContent($from,$to) {
		$this->_findRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdContent($int) {
		$this->_findGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdContent($int) {
		$this->_findLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title) {
		$this->_findBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByType($Type) {
		$this->_findBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findBySubject($Subject) {
		$this->_findBy['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function findByMessageTinymce($MessageTinymce) {
		$this->_findBy['MessageTinymce'] =  $MessageTinymce;
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
		
	public function findOneByIdContent($IdContent) {
		$this->_findOneBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title) {
		$this->_findOneBy['Title'] =  $Title;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByType($Type) {
		$this->_findOneBy['Type'] =  $Type;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySubject($Subject) {
		$this->_findOneBy['Subject'] =  $Subject;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessageTinymce($MessageTinymce) {
		$this->_findOneBy['MessageTinymce'] =  $MessageTinymce;
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
		
	public function findByLikeIdContent($IdContent) {
		$this->_findByLike['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title) {
		$this->_findByLike['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeType($Type) {
		$this->_findByLike['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSubject($Subject) {
		$this->_findByLike['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessageTinymce($MessageTinymce) {
		$this->_findByLike['MessageTinymce'] =  $MessageTinymce;
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
		
	public function filterByIdContent($IdContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdContent',$IdContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdContent($from,$to) {
		$this->_filterRangeBy['IdContent'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdContent($int) {
		$this->_filterGreaterThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdContent($int) {
		$this->_filterLessThanBy['IdContent'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByType($Type, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Type',$Type,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySubject($Subject, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Subject',$Subject,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMessageTinymce($MessageTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MessageTinymce',$MessageTinymce,$_condition);

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
		
	public function filterLikeByIdContent($IdContent) {
		$this->_filterLikeBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title) {
		$this->_filterLikeBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByType($Type) {
		$this->_filterLikeBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySubject($Subject) {
		$this->_filterLikeBy['Subject'] =  $Subject;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessageTinymce($MessageTinymce) {
		$this->_filterLikeBy['MessageTinymce'] =  $MessageTinymce;
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
		
	public function orderByIdContent($direction = 'ASC') {
		$this->loadDirection('id_content',$direction);
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC') {
		$this->loadDirection('title',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByType($direction = 'ASC') {
		$this->loadDirection('type',$direction);
		return $this;
	} 
		
	public function orderBySubject($direction = 'ASC') {
		$this->loadDirection('subject',$direction);
		return $this;
	} 
		
	public function orderByMessageTinymce($direction = 'ASC') {
		$this->loadDirection('message_tinymce',$direction);
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
		    'IdContent' =>  'id_content',            
		    'Title' =>  'title',            
		    'Langue' =>  'langue',            
		    'Type' =>  'type',            
		    'Subject' =>  'subject',            
		    'MessageTinymce' =>  'message_tinymce',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}