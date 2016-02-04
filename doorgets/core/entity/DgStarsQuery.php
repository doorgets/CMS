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

class DgStarsQuery extends AbstractQuery 
{

	protected $_table = '_dg_stars';
    
    protected $_className = 'DgStars';

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
		
	public function findByUrl($Url) {
		$this->_findBy['Url'] =  $Url;
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
		
	public function findOneByStars($Stars) {
		$this->_findOneBy['Stars'] =  $Stars;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUrl($Url) {
		$this->_findOneBy['Url'] =  $Url;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
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
		
	public function findByLikeStars($Stars) {
		$this->_findByLike['Stars'] =  $Stars;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUrl($Url) {
		$this->_findByLike['Url'] =  $Url;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
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
		
	public function filterByUrl($Url, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Url',$Url,$_condition);

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
		
	public function filterLikeByStars($Stars) {
		$this->_filterLikeBy['Stars'] =  $Stars;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUrl($Url) {
		$this->_filterLikeBy['Url'] =  $Url;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
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
		
	public function orderByStars($direction = 'ASC') {
		$this->loadDirection('stars',$direction);
		return $this;
	} 
		
	public function orderByUrl($direction = 'ASC') {
		$this->loadDirection('url',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
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
		    'Stars' =>  'stars',            
		    'Url' =>  'url',            
		    'DateCreation' =>  'date_creation',            
		    'AdressIp' =>  'adress_ip',            
		    'Langue' =>  'langue',		
		));
	} 


}