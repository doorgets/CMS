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

class WebsiteTraductionQuery extends AbstractQuery 
{

	protected $_table = '_website_traduction';
    
    protected $_className = 'WebsiteTraduction';

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
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrency($Currency) {
		$this->_findBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByStatutTinymce($StatutTinymce) {
		$this->_findBy['StatutTinymce'] =  $StatutTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByCguTinymce($CguTinymce) {
		$this->_findBy['CguTinymce'] =  $CguTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByTermsTinymce($TermsTinymce) {
		$this->_findBy['TermsTinymce'] =  $TermsTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByPrivacyTinymce($PrivacyTinymce) {
		$this->_findBy['PrivacyTinymce'] =  $PrivacyTinymce;
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
		
	public function findByCopyright($Copyright) {
		$this->_findBy['Copyright'] =  $Copyright;
		$this->_load();
		return $this;
	} 
		
	public function findByYear($Year) {
		$this->_findBy['Year'] =  $Year;
		$this->_load();
		return $this;
	} 
		
	public function findByKeywords($Keywords) {
		$this->_findBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function findBySignatureTinymce($SignatureTinymce) {
		$this->_findBy['SignatureTinymce'] =  $SignatureTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingFreeActive($ShippingFreeActive) {
		$this->_findBy['ShippingFreeActive'] =  $ShippingFreeActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByShippingFreeActive($from,$to) {
		$this->_findRangeBy['ShippingFreeActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByShippingFreeActive($int) {
		$this->_findGreaterThanBy['ShippingFreeActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByShippingFreeActive($int) {
		$this->_findLessThanBy['ShippingFreeActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingSlowActive($ShippingSlowActive) {
		$this->_findBy['ShippingSlowActive'] =  $ShippingSlowActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByShippingSlowActive($from,$to) {
		$this->_findRangeBy['ShippingSlowActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByShippingSlowActive($int) {
		$this->_findGreaterThanBy['ShippingSlowActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByShippingSlowActive($int) {
		$this->_findLessThanBy['ShippingSlowActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingFastActive($ShippingFastActive) {
		$this->_findBy['ShippingFastActive'] =  $ShippingFastActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByShippingFastActive($from,$to) {
		$this->_findRangeBy['ShippingFastActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByShippingFastActive($int) {
		$this->_findGreaterThanBy['ShippingFastActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByShippingFastActive($int) {
		$this->_findLessThanBy['ShippingFastActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingFreeInfo($ShippingFreeInfo) {
		$this->_findBy['ShippingFreeInfo'] =  $ShippingFreeInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingSlowInfo($ShippingSlowInfo) {
		$this->_findBy['ShippingSlowInfo'] =  $ShippingSlowInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingFastInfo($ShippingFastInfo) {
		$this->_findBy['ShippingFastInfo'] =  $ShippingFastInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingSlowAmount($ShippingSlowAmount) {
		$this->_findBy['ShippingSlowAmount'] =  $ShippingSlowAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByShippingFastAmount($ShippingFastAmount) {
		$this->_findBy['ShippingFastAmount'] =  $ShippingFastAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByStoreVat($StoreVat) {
		$this->_findBy['StoreVat'] =  $StoreVat;
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
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrency($Currency) {
		$this->_findOneBy['Currency'] =  $Currency;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatutTinymce($StatutTinymce) {
		$this->_findOneBy['StatutTinymce'] =  $StatutTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCguTinymce($CguTinymce) {
		$this->_findOneBy['CguTinymce'] =  $CguTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTermsTinymce($TermsTinymce) {
		$this->_findOneBy['TermsTinymce'] =  $TermsTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPrivacyTinymce($PrivacyTinymce) {
		$this->_findOneBy['PrivacyTinymce'] =  $PrivacyTinymce;
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
		
	public function findOneByCopyright($Copyright) {
		$this->_findOneBy['Copyright'] =  $Copyright;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByYear($Year) {
		$this->_findOneBy['Year'] =  $Year;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByKeywords($Keywords) {
		$this->_findOneBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySignatureTinymce($SignatureTinymce) {
		$this->_findOneBy['SignatureTinymce'] =  $SignatureTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingFreeActive($ShippingFreeActive) {
		$this->_findOneBy['ShippingFreeActive'] =  $ShippingFreeActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingSlowActive($ShippingSlowActive) {
		$this->_findOneBy['ShippingSlowActive'] =  $ShippingSlowActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingFastActive($ShippingFastActive) {
		$this->_findOneBy['ShippingFastActive'] =  $ShippingFastActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingFreeInfo($ShippingFreeInfo) {
		$this->_findOneBy['ShippingFreeInfo'] =  $ShippingFreeInfo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingSlowInfo($ShippingSlowInfo) {
		$this->_findOneBy['ShippingSlowInfo'] =  $ShippingSlowInfo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingFastInfo($ShippingFastInfo) {
		$this->_findOneBy['ShippingFastInfo'] =  $ShippingFastInfo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingSlowAmount($ShippingSlowAmount) {
		$this->_findOneBy['ShippingSlowAmount'] =  $ShippingSlowAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByShippingFastAmount($ShippingFastAmount) {
		$this->_findOneBy['ShippingFastAmount'] =  $ShippingFastAmount;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStoreVat($StoreVat) {
		$this->_findOneBy['StoreVat'] =  $StoreVat;
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
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrency($Currency) {
		$this->_findByLike['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatutTinymce($StatutTinymce) {
		$this->_findByLike['StatutTinymce'] =  $StatutTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCguTinymce($CguTinymce) {
		$this->_findByLike['CguTinymce'] =  $CguTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTermsTinymce($TermsTinymce) {
		$this->_findByLike['TermsTinymce'] =  $TermsTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePrivacyTinymce($PrivacyTinymce) {
		$this->_findByLike['PrivacyTinymce'] =  $PrivacyTinymce;
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
		
	public function findByLikeCopyright($Copyright) {
		$this->_findByLike['Copyright'] =  $Copyright;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeYear($Year) {
		$this->_findByLike['Year'] =  $Year;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeKeywords($Keywords) {
		$this->_findByLike['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSignatureTinymce($SignatureTinymce) {
		$this->_findByLike['SignatureTinymce'] =  $SignatureTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingFreeActive($ShippingFreeActive) {
		$this->_findByLike['ShippingFreeActive'] =  $ShippingFreeActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingSlowActive($ShippingSlowActive) {
		$this->_findByLike['ShippingSlowActive'] =  $ShippingSlowActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingFastActive($ShippingFastActive) {
		$this->_findByLike['ShippingFastActive'] =  $ShippingFastActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingFreeInfo($ShippingFreeInfo) {
		$this->_findByLike['ShippingFreeInfo'] =  $ShippingFreeInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingSlowInfo($ShippingSlowInfo) {
		$this->_findByLike['ShippingSlowInfo'] =  $ShippingSlowInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingFastInfo($ShippingFastInfo) {
		$this->_findByLike['ShippingFastInfo'] =  $ShippingFastInfo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingSlowAmount($ShippingSlowAmount) {
		$this->_findByLike['ShippingSlowAmount'] =  $ShippingSlowAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeShippingFastAmount($ShippingFastAmount) {
		$this->_findByLike['ShippingFastAmount'] =  $ShippingFastAmount;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStoreVat($StoreVat) {
		$this->_findByLike['StoreVat'] =  $StoreVat;
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
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCurrency($Currency, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Currency',$Currency,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStatutTinymce($StatutTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StatutTinymce',$StatutTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCguTinymce($CguTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CguTinymce',$CguTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTermsTinymce($TermsTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TermsTinymce',$TermsTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPrivacyTinymce($PrivacyTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PrivacyTinymce',$PrivacyTinymce,$_condition);

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
		
	public function filterByCopyright($Copyright, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Copyright',$Copyright,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByYear($Year, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Year',$Year,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByKeywords($Keywords, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Keywords',$Keywords,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySignatureTinymce($SignatureTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SignatureTinymce',$SignatureTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingFreeActive($ShippingFreeActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingFreeActive',$ShippingFreeActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByShippingFreeActive($from,$to) {
		$this->_filterRangeBy['ShippingFreeActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByShippingFreeActive($int) {
		$this->_filterGreaterThanBy['ShippingFreeActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByShippingFreeActive($int) {
		$this->_filterLessThanBy['ShippingFreeActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByShippingSlowActive($ShippingSlowActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingSlowActive',$ShippingSlowActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByShippingSlowActive($from,$to) {
		$this->_filterRangeBy['ShippingSlowActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByShippingSlowActive($int) {
		$this->_filterGreaterThanBy['ShippingSlowActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByShippingSlowActive($int) {
		$this->_filterLessThanBy['ShippingSlowActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByShippingFastActive($ShippingFastActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingFastActive',$ShippingFastActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByShippingFastActive($from,$to) {
		$this->_filterRangeBy['ShippingFastActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByShippingFastActive($int) {
		$this->_filterGreaterThanBy['ShippingFastActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByShippingFastActive($int) {
		$this->_filterLessThanBy['ShippingFastActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByShippingFreeInfo($ShippingFreeInfo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingFreeInfo',$ShippingFreeInfo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingSlowInfo($ShippingSlowInfo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingSlowInfo',$ShippingSlowInfo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingFastInfo($ShippingFastInfo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingFastInfo',$ShippingFastInfo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingSlowAmount($ShippingSlowAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingSlowAmount',$ShippingSlowAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByShippingFastAmount($ShippingFastAmount, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ShippingFastAmount',$ShippingFastAmount,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStoreVat($StoreVat, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StoreVat',$StoreVat,$_condition);

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
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrency($Currency) {
		$this->_filterLikeBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatutTinymce($StatutTinymce) {
		$this->_filterLikeBy['StatutTinymce'] =  $StatutTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCguTinymce($CguTinymce) {
		$this->_filterLikeBy['CguTinymce'] =  $CguTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTermsTinymce($TermsTinymce) {
		$this->_filterLikeBy['TermsTinymce'] =  $TermsTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPrivacyTinymce($PrivacyTinymce) {
		$this->_filterLikeBy['PrivacyTinymce'] =  $PrivacyTinymce;
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
		
	public function filterLikeByCopyright($Copyright) {
		$this->_filterLikeBy['Copyright'] =  $Copyright;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByYear($Year) {
		$this->_filterLikeBy['Year'] =  $Year;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByKeywords($Keywords) {
		$this->_filterLikeBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySignatureTinymce($SignatureTinymce) {
		$this->_filterLikeBy['SignatureTinymce'] =  $SignatureTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingFreeActive($ShippingFreeActive) {
		$this->_filterLikeBy['ShippingFreeActive'] =  $ShippingFreeActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingSlowActive($ShippingSlowActive) {
		$this->_filterLikeBy['ShippingSlowActive'] =  $ShippingSlowActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingFastActive($ShippingFastActive) {
		$this->_filterLikeBy['ShippingFastActive'] =  $ShippingFastActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingFreeInfo($ShippingFreeInfo) {
		$this->_filterLikeBy['ShippingFreeInfo'] =  $ShippingFreeInfo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingSlowInfo($ShippingSlowInfo) {
		$this->_filterLikeBy['ShippingSlowInfo'] =  $ShippingSlowInfo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingFastInfo($ShippingFastInfo) {
		$this->_filterLikeBy['ShippingFastInfo'] =  $ShippingFastInfo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingSlowAmount($ShippingSlowAmount) {
		$this->_filterLikeBy['ShippingSlowAmount'] =  $ShippingSlowAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByShippingFastAmount($ShippingFastAmount) {
		$this->_filterLikeBy['ShippingFastAmount'] =  $ShippingFastAmount;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStoreVat($StoreVat) {
		$this->_filterLikeBy['StoreVat'] =  $StoreVat;
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
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByCurrency($direction = 'ASC') {
		$this->loadDirection('currency',$direction);
		return $this;
	} 
		
	public function orderByStatutTinymce($direction = 'ASC') {
		$this->loadDirection('statut_tinymce',$direction);
		return $this;
	} 
		
	public function orderByCguTinymce($direction = 'ASC') {
		$this->loadDirection('cgu_tinymce',$direction);
		return $this;
	} 
		
	public function orderByTermsTinymce($direction = 'ASC') {
		$this->loadDirection('terms_tinymce',$direction);
		return $this;
	} 
		
	public function orderByPrivacyTinymce($direction = 'ASC') {
		$this->loadDirection('privacy_tinymce',$direction);
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
		
	public function orderByCopyright($direction = 'ASC') {
		$this->loadDirection('copyright',$direction);
		return $this;
	} 
		
	public function orderByYear($direction = 'ASC') {
		$this->loadDirection('year',$direction);
		return $this;
	} 
		
	public function orderByKeywords($direction = 'ASC') {
		$this->loadDirection('keywords',$direction);
		return $this;
	} 
		
	public function orderBySignatureTinymce($direction = 'ASC') {
		$this->loadDirection('signature_tinymce',$direction);
		return $this;
	} 
		
	public function orderByShippingFreeActive($direction = 'ASC') {
		$this->loadDirection('shipping_free_active',$direction);
		return $this;
	} 
		
	public function orderByShippingSlowActive($direction = 'ASC') {
		$this->loadDirection('shipping_slow_active',$direction);
		return $this;
	} 
		
	public function orderByShippingFastActive($direction = 'ASC') {
		$this->loadDirection('shipping_fast_active',$direction);
		return $this;
	} 
		
	public function orderByShippingFreeInfo($direction = 'ASC') {
		$this->loadDirection('shipping_free_info',$direction);
		return $this;
	} 
		
	public function orderByShippingSlowInfo($direction = 'ASC') {
		$this->loadDirection('shipping_slow_info',$direction);
		return $this;
	} 
		
	public function orderByShippingFastInfo($direction = 'ASC') {
		$this->loadDirection('shipping_fast_info',$direction);
		return $this;
	} 
		
	public function orderByShippingSlowAmount($direction = 'ASC') {
		$this->loadDirection('shipping_slow_amount',$direction);
		return $this;
	} 
		
	public function orderByShippingFastAmount($direction = 'ASC') {
		$this->loadDirection('shipping_fast_amount',$direction);
		return $this;
	} 
		
	public function orderByStoreVat($direction = 'ASC') {
		$this->loadDirection('store_vat',$direction);
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
		    'Langue' =>  'langue',            
		    'Currency' =>  'currency',            
		    'StatutTinymce' =>  'statut_tinymce',            
		    'CguTinymce' =>  'cgu_tinymce',            
		    'TermsTinymce' =>  'terms_tinymce',            
		    'PrivacyTinymce' =>  'privacy_tinymce',            
		    'Title' =>  'title',            
		    'Slogan' =>  'slogan',            
		    'Description' =>  'description',            
		    'Copyright' =>  'copyright',            
		    'Year' =>  'year',            
		    'Keywords' =>  'keywords',            
		    'SignatureTinymce' =>  'signature_tinymce',            
		    'ShippingFreeActive' =>  'shipping_free_active',            
		    'ShippingSlowActive' =>  'shipping_slow_active',            
		    'ShippingFastActive' =>  'shipping_fast_active',            
		    'ShippingFreeInfo' =>  'shipping_free_info',            
		    'ShippingSlowInfo' =>  'shipping_slow_info',            
		    'ShippingFastInfo' =>  'shipping_fast_info',            
		    'ShippingSlowAmount' =>  'shipping_slow_amount',            
		    'ShippingFastAmount' =>  'shipping_fast_amount',            
		    'StoreVat' =>  'store_vat',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}