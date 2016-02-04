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

class UsersTrackQuery extends AbstractQuery 
{

	protected $_table = '_users_track';
    
    protected $_className = 'UsersTrack';

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
		
	public function findByIdSession($IdSession) {
		$this->_findBy['IdSession'] =  $IdSession;
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
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title) {
		$this->_findBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByUriModule($UriModule) {
		$this->_findBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByIdContent($IdContent) {
		$this->_findBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findByAction($Action) {
		$this->_findBy['Action'] =  $Action;
		$this->_load();
		return $this;
	} 
		
	public function findByIpUser($IpUser) {
		$this->_findBy['IpUser'] =  $IpUser;
		$this->_load();
		return $this;
	} 
		
	public function findByUrlPage($UrlPage) {
		$this->_findBy['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this;
	} 
		
	public function findByUrlReferer($UrlReferer) {
		$this->_findBy['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this;
	} 
		
	public function findByDate($Date) {
		$this->_findBy['Date'] =  $Date;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDate($from,$to) {
		$this->_findRangeBy['Date'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDate($int) {
		$this->_findGreaterThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDate($int) {
		$this->_findLessThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdSession($IdSession) {
		$this->_findOneBy['IdSession'] =  $IdSession;
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
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title) {
		$this->_findOneBy['Title'] =  $Title;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriModule($UriModule) {
		$this->_findOneBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdContent($IdContent) {
		$this->_findOneBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAction($Action) {
		$this->_findOneBy['Action'] =  $Action;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIpUser($IpUser) {
		$this->_findOneBy['IpUser'] =  $IpUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUrlPage($UrlPage) {
		$this->_findOneBy['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUrlReferer($UrlReferer) {
		$this->_findOneBy['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDate($Date) {
		$this->_findOneBy['Date'] =  $Date;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdSession($IdSession) {
		$this->_findByLike['IdSession'] =  $IdSession;
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
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title) {
		$this->_findByLike['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriModule($UriModule) {
		$this->_findByLike['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdContent($IdContent) {
		$this->_findByLike['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAction($Action) {
		$this->_findByLike['Action'] =  $Action;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIpUser($IpUser) {
		$this->_findByLike['IpUser'] =  $IpUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUrlPage($UrlPage) {
		$this->_findByLike['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUrlReferer($UrlReferer) {
		$this->_findByLike['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDate($Date) {
		$this->_findByLike['Date'] =  $Date;
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
		
	public function filterByIdSession($IdSession, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdSession',$IdSession,$_condition);

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
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUriModule($UriModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriModule',$UriModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdContent($IdContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdContent',$IdContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAction($Action, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Action',$Action,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIpUser($IpUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IpUser',$IpUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUrlPage($UrlPage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UrlPage',$UrlPage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUrlReferer($UrlReferer, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UrlReferer',$UrlReferer,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDate($Date, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Date',$Date,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDate($from,$to) {
		$this->_filterRangeBy['Date'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDate($int) {
		$this->_filterGreaterThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDate($int) {
		$this->_filterLessThanBy['Date'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdSession($IdSession) {
		$this->_filterLikeBy['IdSession'] =  $IdSession;
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
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title) {
		$this->_filterLikeBy['Title'] =  $Title;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriModule($UriModule) {
		$this->_filterLikeBy['UriModule'] =  $UriModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdContent($IdContent) {
		$this->_filterLikeBy['IdContent'] =  $IdContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAction($Action) {
		$this->_filterLikeBy['Action'] =  $Action;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIpUser($IpUser) {
		$this->_filterLikeBy['IpUser'] =  $IpUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUrlPage($UrlPage) {
		$this->_filterLikeBy['UrlPage'] =  $UrlPage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUrlReferer($UrlReferer) {
		$this->_filterLikeBy['UrlReferer'] =  $UrlReferer;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDate($Date) {
		$this->_filterLikeBy['Date'] =  $Date;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByIdSession($direction = 'ASC') {
		$this->loadDirection('id_session',$direction);
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
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC') {
		$this->loadDirection('title',$direction);
		return $this;
	} 
		
	public function orderByUriModule($direction = 'ASC') {
		$this->loadDirection('uri_module',$direction);
		return $this;
	} 
		
	public function orderByIdContent($direction = 'ASC') {
		$this->loadDirection('id_content',$direction);
		return $this;
	} 
		
	public function orderByAction($direction = 'ASC') {
		$this->loadDirection('action',$direction);
		return $this;
	} 
		
	public function orderByIpUser($direction = 'ASC') {
		$this->loadDirection('ip_user',$direction);
		return $this;
	} 
		
	public function orderByUrlPage($direction = 'ASC') {
		$this->loadDirection('url_page',$direction);
		return $this;
	} 
		
	public function orderByUrlReferer($direction = 'ASC') {
		$this->loadDirection('url_referer',$direction);
		return $this;
	} 
		
	public function orderByDate($direction = 'ASC') {
		$this->loadDirection('date',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdSession' =>  'id_session',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'Langue' =>  'langue',            
		    'Title' =>  'title',            
		    'UriModule' =>  'uri_module',            
		    'IdContent' =>  'id_content',            
		    'Action' =>  'action',            
		    'IpUser' =>  'ip_user',            
		    'UrlPage' =>  'url_page',            
		    'UrlReferer' =>  'url_referer',            
		    'Date' =>  'date',		
		));
	} 


}