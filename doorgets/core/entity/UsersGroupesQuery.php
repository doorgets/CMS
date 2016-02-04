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

class UsersGroupesQuery extends AbstractQuery 
{

	protected $_table = '_users_groupes';
    
    protected $_className = 'UsersGroupes';

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
		
	public function findByUri($Uri) {
		$this->_findBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByListeWidget($ListeWidget) {
		$this->_findBy['ListeWidget'] =  $ListeWidget;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModule($ListeModule) {
		$this->_findBy['ListeModule'] =  $ListeModule;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleLimit($ListeModuleLimit) {
		$this->_findBy['ListeModuleLimit'] =  $ListeModuleLimit;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleList($ListeModuleList) {
		$this->_findBy['ListeModuleList'] =  $ListeModuleList;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleShow($ListeModuleShow) {
		$this->_findBy['ListeModuleShow'] =  $ListeModuleShow;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleAdd($ListeModuleAdd) {
		$this->_findBy['ListeModuleAdd'] =  $ListeModuleAdd;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleEdit($ListeModuleEdit) {
		$this->_findBy['ListeModuleEdit'] =  $ListeModuleEdit;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleDelete($ListeModuleDelete) {
		$this->_findBy['ListeModuleDelete'] =  $ListeModuleDelete;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleModo($ListeModuleModo) {
		$this->_findBy['ListeModuleModo'] =  $ListeModuleModo;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleAdmin($ListeModuleAdmin) {
		$this->_findBy['ListeModuleAdmin'] =  $ListeModuleAdmin;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleInterne($ListeModuleInterne) {
		$this->_findBy['ListeModuleInterne'] =  $ListeModuleInterne;
		$this->_load();
		return $this;
	} 
		
	public function findByListeModuleInterneModo($ListeModuleInterneModo) {
		$this->_findBy['ListeModuleInterneModo'] =  $ListeModuleInterneModo;
		$this->_load();
		return $this;
	} 
		
	public function findByListeEnfant($ListeEnfant) {
		$this->_findBy['ListeEnfant'] =  $ListeEnfant;
		$this->_load();
		return $this;
	} 
		
	public function findByListeEnfantModo($ListeEnfantModo) {
		$this->_findBy['ListeEnfantModo'] =  $ListeEnfantModo;
		$this->_load();
		return $this;
	} 
		
	public function findByListeParent($ListeParent) {
		$this->_findBy['ListeParent'] =  $ListeParent;
		$this->_load();
		return $this;
	} 
		
	public function findByCanSubscribe($CanSubscribe) {
		$this->_findBy['CanSubscribe'] =  $CanSubscribe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByCanSubscribe($from,$to) {
		$this->_findRangeBy['CanSubscribe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByCanSubscribe($int) {
		$this->_findGreaterThanBy['CanSubscribe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByCanSubscribe($int) {
		$this->_findLessThanBy['CanSubscribe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByEditorCkeditor($EditorCkeditor) {
		$this->_findBy['EditorCkeditor'] =  $EditorCkeditor;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByEditorCkeditor($from,$to) {
		$this->_findRangeBy['EditorCkeditor'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByEditorCkeditor($int) {
		$this->_findGreaterThanBy['EditorCkeditor'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByEditorCkeditor($int) {
		$this->_findLessThanBy['EditorCkeditor'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByEditorTinymce($EditorTinymce) {
		$this->_findBy['EditorTinymce'] =  $EditorTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByEditorTinymce($from,$to) {
		$this->_findRangeBy['EditorTinymce'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByEditorTinymce($int) {
		$this->_findGreaterThanBy['EditorTinymce'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByEditorTinymce($int) {
		$this->_findLessThanBy['EditorTinymce'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByFileman($Fileman) {
		$this->_findBy['Fileman'] =  $Fileman;
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
		
	public function findByGroupeTraduction($GroupeTraduction) {
		$this->_findBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByAttributes($Attributes) {
		$this->_findBy['Attributes'] =  $Attributes;
		$this->_load();
		return $this;
	} 
		
	public function findByRegisterVerification($RegisterVerification) {
		$this->_findBy['RegisterVerification'] =  $RegisterVerification;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByRegisterVerification($from,$to) {
		$this->_findRangeBy['RegisterVerification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByRegisterVerification($int) {
		$this->_findGreaterThanBy['RegisterVerification'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByRegisterVerification($int) {
		$this->_findLessThanBy['RegisterVerification'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasOptions($SaasOptions) {
		$this->_findBy['SaasOptions'] =  $SaasOptions;
		$this->_load();
		return $this;
	} 
		
	public function findByPayment($Payment) {
		$this->_findBy['Payment'] =  $Payment;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPayment($from,$to) {
		$this->_findRangeBy['Payment'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPayment($int) {
		$this->_findGreaterThanBy['Payment'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPayment($int) {
		$this->_findLessThanBy['Payment'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentCurrency($PaymentCurrency) {
		$this->_findBy['PaymentCurrency'] =  $PaymentCurrency;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentAmountMonth($PaymentAmountMonth) {
		$this->_findBy['PaymentAmountMonth'] =  $PaymentAmountMonth;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentGroupExpired($PaymentGroupExpired) {
		$this->_findBy['PaymentGroupExpired'] =  $PaymentGroupExpired;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPaymentGroupExpired($from,$to) {
		$this->_findRangeBy['PaymentGroupExpired'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPaymentGroupExpired($int) {
		$this->_findGreaterThanBy['PaymentGroupExpired'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPaymentGroupExpired($int) {
		$this->_findLessThanBy['PaymentGroupExpired'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentTranche($PaymentTranche) {
		$this->_findBy['PaymentTranche'] =  $PaymentTranche;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPaymentTranche($from,$to) {
		$this->_findRangeBy['PaymentTranche'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPaymentTranche($int) {
		$this->_findGreaterThanBy['PaymentTranche'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPaymentTranche($int) {
		$this->_findLessThanBy['PaymentTranche'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPaymentGroupUpgrade($PaymentGroupUpgrade) {
		$this->_findBy['PaymentGroupUpgrade'] =  $PaymentGroupUpgrade;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPaymentGroupUpgrade($from,$to) {
		$this->_findRangeBy['PaymentGroupUpgrade'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPaymentGroupUpgrade($int) {
		$this->_findGreaterThanBy['PaymentGroupUpgrade'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPaymentGroupUpgrade($int) {
		$this->_findLessThanBy['PaymentGroupUpgrade'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id) {
		$this->_findOneBy['Id'] =  $Id;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUri($Uri) {
		$this->_findOneBy['Uri'] =  $Uri;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeWidget($ListeWidget) {
		$this->_findOneBy['ListeWidget'] =  $ListeWidget;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModule($ListeModule) {
		$this->_findOneBy['ListeModule'] =  $ListeModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleLimit($ListeModuleLimit) {
		$this->_findOneBy['ListeModuleLimit'] =  $ListeModuleLimit;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleList($ListeModuleList) {
		$this->_findOneBy['ListeModuleList'] =  $ListeModuleList;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleShow($ListeModuleShow) {
		$this->_findOneBy['ListeModuleShow'] =  $ListeModuleShow;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleAdd($ListeModuleAdd) {
		$this->_findOneBy['ListeModuleAdd'] =  $ListeModuleAdd;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleEdit($ListeModuleEdit) {
		$this->_findOneBy['ListeModuleEdit'] =  $ListeModuleEdit;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleDelete($ListeModuleDelete) {
		$this->_findOneBy['ListeModuleDelete'] =  $ListeModuleDelete;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleModo($ListeModuleModo) {
		$this->_findOneBy['ListeModuleModo'] =  $ListeModuleModo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleAdmin($ListeModuleAdmin) {
		$this->_findOneBy['ListeModuleAdmin'] =  $ListeModuleAdmin;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleInterne($ListeModuleInterne) {
		$this->_findOneBy['ListeModuleInterne'] =  $ListeModuleInterne;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeModuleInterneModo($ListeModuleInterneModo) {
		$this->_findOneBy['ListeModuleInterneModo'] =  $ListeModuleInterneModo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeEnfant($ListeEnfant) {
		$this->_findOneBy['ListeEnfant'] =  $ListeEnfant;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeEnfantModo($ListeEnfantModo) {
		$this->_findOneBy['ListeEnfantModo'] =  $ListeEnfantModo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByListeParent($ListeParent) {
		$this->_findOneBy['ListeParent'] =  $ListeParent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCanSubscribe($CanSubscribe) {
		$this->_findOneBy['CanSubscribe'] =  $CanSubscribe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEditorCkeditor($EditorCkeditor) {
		$this->_findOneBy['EditorCkeditor'] =  $EditorCkeditor;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEditorTinymce($EditorTinymce) {
		$this->_findOneBy['EditorTinymce'] =  $EditorTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByFileman($Fileman) {
		$this->_findOneBy['Fileman'] =  $Fileman;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGroupeTraduction($GroupeTraduction) {
		$this->_findOneBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAttributes($Attributes) {
		$this->_findOneBy['Attributes'] =  $Attributes;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRegisterVerification($RegisterVerification) {
		$this->_findOneBy['RegisterVerification'] =  $RegisterVerification;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasOptions($SaasOptions) {
		$this->_findOneBy['SaasOptions'] =  $SaasOptions;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPayment($Payment) {
		$this->_findOneBy['Payment'] =  $Payment;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentCurrency($PaymentCurrency) {
		$this->_findOneBy['PaymentCurrency'] =  $PaymentCurrency;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentAmountMonth($PaymentAmountMonth) {
		$this->_findOneBy['PaymentAmountMonth'] =  $PaymentAmountMonth;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentGroupExpired($PaymentGroupExpired) {
		$this->_findOneBy['PaymentGroupExpired'] =  $PaymentGroupExpired;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentTranche($PaymentTranche) {
		$this->_findOneBy['PaymentTranche'] =  $PaymentTranche;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaymentGroupUpgrade($PaymentGroupUpgrade) {
		$this->_findOneBy['PaymentGroupUpgrade'] =  $PaymentGroupUpgrade;
		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id) {
		$this->_findByLike['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUri($Uri) {
		$this->_findByLike['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeWidget($ListeWidget) {
		$this->_findByLike['ListeWidget'] =  $ListeWidget;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModule($ListeModule) {
		$this->_findByLike['ListeModule'] =  $ListeModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleLimit($ListeModuleLimit) {
		$this->_findByLike['ListeModuleLimit'] =  $ListeModuleLimit;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleList($ListeModuleList) {
		$this->_findByLike['ListeModuleList'] =  $ListeModuleList;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleShow($ListeModuleShow) {
		$this->_findByLike['ListeModuleShow'] =  $ListeModuleShow;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleAdd($ListeModuleAdd) {
		$this->_findByLike['ListeModuleAdd'] =  $ListeModuleAdd;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleEdit($ListeModuleEdit) {
		$this->_findByLike['ListeModuleEdit'] =  $ListeModuleEdit;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleDelete($ListeModuleDelete) {
		$this->_findByLike['ListeModuleDelete'] =  $ListeModuleDelete;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleModo($ListeModuleModo) {
		$this->_findByLike['ListeModuleModo'] =  $ListeModuleModo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleAdmin($ListeModuleAdmin) {
		$this->_findByLike['ListeModuleAdmin'] =  $ListeModuleAdmin;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleInterne($ListeModuleInterne) {
		$this->_findByLike['ListeModuleInterne'] =  $ListeModuleInterne;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeModuleInterneModo($ListeModuleInterneModo) {
		$this->_findByLike['ListeModuleInterneModo'] =  $ListeModuleInterneModo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeEnfant($ListeEnfant) {
		$this->_findByLike['ListeEnfant'] =  $ListeEnfant;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeEnfantModo($ListeEnfantModo) {
		$this->_findByLike['ListeEnfantModo'] =  $ListeEnfantModo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeListeParent($ListeParent) {
		$this->_findByLike['ListeParent'] =  $ListeParent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCanSubscribe($CanSubscribe) {
		$this->_findByLike['CanSubscribe'] =  $CanSubscribe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEditorCkeditor($EditorCkeditor) {
		$this->_findByLike['EditorCkeditor'] =  $EditorCkeditor;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEditorTinymce($EditorTinymce) {
		$this->_findByLike['EditorTinymce'] =  $EditorTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeFileman($Fileman) {
		$this->_findByLike['Fileman'] =  $Fileman;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGroupeTraduction($GroupeTraduction) {
		$this->_findByLike['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAttributes($Attributes) {
		$this->_findByLike['Attributes'] =  $Attributes;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRegisterVerification($RegisterVerification) {
		$this->_findByLike['RegisterVerification'] =  $RegisterVerification;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasOptions($SaasOptions) {
		$this->_findByLike['SaasOptions'] =  $SaasOptions;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePayment($Payment) {
		$this->_findByLike['Payment'] =  $Payment;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentCurrency($PaymentCurrency) {
		$this->_findByLike['PaymentCurrency'] =  $PaymentCurrency;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentAmountMonth($PaymentAmountMonth) {
		$this->_findByLike['PaymentAmountMonth'] =  $PaymentAmountMonth;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentGroupExpired($PaymentGroupExpired) {
		$this->_findByLike['PaymentGroupExpired'] =  $PaymentGroupExpired;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentTranche($PaymentTranche) {
		$this->_findByLike['PaymentTranche'] =  $PaymentTranche;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaymentGroupUpgrade($PaymentGroupUpgrade) {
		$this->_findByLike['PaymentGroupUpgrade'] =  $PaymentGroupUpgrade;
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
		
	public function filterByUri($Uri, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Uri',$Uri,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeWidget($ListeWidget, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeWidget',$ListeWidget,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModule($ListeModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModule',$ListeModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleLimit($ListeModuleLimit, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleLimit',$ListeModuleLimit,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleList($ListeModuleList, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleList',$ListeModuleList,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleShow($ListeModuleShow, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleShow',$ListeModuleShow,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleAdd($ListeModuleAdd, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleAdd',$ListeModuleAdd,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleEdit($ListeModuleEdit, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleEdit',$ListeModuleEdit,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleDelete($ListeModuleDelete, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleDelete',$ListeModuleDelete,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleModo($ListeModuleModo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleModo',$ListeModuleModo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleAdmin($ListeModuleAdmin, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleAdmin',$ListeModuleAdmin,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleInterne($ListeModuleInterne, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleInterne',$ListeModuleInterne,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeModuleInterneModo($ListeModuleInterneModo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeModuleInterneModo',$ListeModuleInterneModo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeEnfant($ListeEnfant, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeEnfant',$ListeEnfant,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeEnfantModo($ListeEnfantModo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeEnfantModo',$ListeEnfantModo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByListeParent($ListeParent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ListeParent',$ListeParent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCanSubscribe($CanSubscribe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CanSubscribe',$CanSubscribe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByCanSubscribe($from,$to) {
		$this->_filterRangeBy['CanSubscribe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByCanSubscribe($int) {
		$this->_filterGreaterThanBy['CanSubscribe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByCanSubscribe($int) {
		$this->_filterLessThanBy['CanSubscribe'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByEditorCkeditor($EditorCkeditor, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('EditorCkeditor',$EditorCkeditor,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByEditorCkeditor($from,$to) {
		$this->_filterRangeBy['EditorCkeditor'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByEditorCkeditor($int) {
		$this->_filterGreaterThanBy['EditorCkeditor'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByEditorCkeditor($int) {
		$this->_filterLessThanBy['EditorCkeditor'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByEditorTinymce($EditorTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('EditorTinymce',$EditorTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByEditorTinymce($from,$to) {
		$this->_filterRangeBy['EditorTinymce'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByEditorTinymce($int) {
		$this->_filterGreaterThanBy['EditorTinymce'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByEditorTinymce($int) {
		$this->_filterLessThanBy['EditorTinymce'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByFileman($Fileman, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Fileman',$Fileman,$_condition);

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
		
	public function filterByGroupeTraduction($GroupeTraduction, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('GroupeTraduction',$GroupeTraduction,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAttributes($Attributes, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Attributes',$Attributes,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByRegisterVerification($RegisterVerification, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('RegisterVerification',$RegisterVerification,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByRegisterVerification($from,$to) {
		$this->_filterRangeBy['RegisterVerification'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByRegisterVerification($int) {
		$this->_filterGreaterThanBy['RegisterVerification'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByRegisterVerification($int) {
		$this->_filterLessThanBy['RegisterVerification'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterBySaasOptions($SaasOptions, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasOptions',$SaasOptions,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPayment($Payment, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Payment',$Payment,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPayment($from,$to) {
		$this->_filterRangeBy['Payment'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPayment($int) {
		$this->_filterGreaterThanBy['Payment'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPayment($int) {
		$this->_filterLessThanBy['Payment'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentCurrency($PaymentCurrency, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaymentCurrency',$PaymentCurrency,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentAmountMonth($PaymentAmountMonth, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaymentAmountMonth',$PaymentAmountMonth,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentGroupExpired($PaymentGroupExpired, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaymentGroupExpired',$PaymentGroupExpired,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPaymentGroupExpired($from,$to) {
		$this->_filterRangeBy['PaymentGroupExpired'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPaymentGroupExpired($int) {
		$this->_filterGreaterThanBy['PaymentGroupExpired'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPaymentGroupExpired($int) {
		$this->_filterLessThanBy['PaymentGroupExpired'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentTranche($PaymentTranche, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaymentTranche',$PaymentTranche,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPaymentTranche($from,$to) {
		$this->_filterRangeBy['PaymentTranche'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPaymentTranche($int) {
		$this->_filterGreaterThanBy['PaymentTranche'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPaymentTranche($int) {
		$this->_filterLessThanBy['PaymentTranche'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPaymentGroupUpgrade($PaymentGroupUpgrade, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaymentGroupUpgrade',$PaymentGroupUpgrade,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPaymentGroupUpgrade($from,$to) {
		$this->_filterRangeBy['PaymentGroupUpgrade'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPaymentGroupUpgrade($int) {
		$this->_filterGreaterThanBy['PaymentGroupUpgrade'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPaymentGroupUpgrade($int) {
		$this->_filterLessThanBy['PaymentGroupUpgrade'] = $int;
		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id) {
		$this->_filterLikeBy['Id'] =  $Id;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUri($Uri) {
		$this->_filterLikeBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeWidget($ListeWidget) {
		$this->_filterLikeBy['ListeWidget'] =  $ListeWidget;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModule($ListeModule) {
		$this->_filterLikeBy['ListeModule'] =  $ListeModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleLimit($ListeModuleLimit) {
		$this->_filterLikeBy['ListeModuleLimit'] =  $ListeModuleLimit;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleList($ListeModuleList) {
		$this->_filterLikeBy['ListeModuleList'] =  $ListeModuleList;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleShow($ListeModuleShow) {
		$this->_filterLikeBy['ListeModuleShow'] =  $ListeModuleShow;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleAdd($ListeModuleAdd) {
		$this->_filterLikeBy['ListeModuleAdd'] =  $ListeModuleAdd;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleEdit($ListeModuleEdit) {
		$this->_filterLikeBy['ListeModuleEdit'] =  $ListeModuleEdit;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleDelete($ListeModuleDelete) {
		$this->_filterLikeBy['ListeModuleDelete'] =  $ListeModuleDelete;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleModo($ListeModuleModo) {
		$this->_filterLikeBy['ListeModuleModo'] =  $ListeModuleModo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleAdmin($ListeModuleAdmin) {
		$this->_filterLikeBy['ListeModuleAdmin'] =  $ListeModuleAdmin;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleInterne($ListeModuleInterne) {
		$this->_filterLikeBy['ListeModuleInterne'] =  $ListeModuleInterne;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeModuleInterneModo($ListeModuleInterneModo) {
		$this->_filterLikeBy['ListeModuleInterneModo'] =  $ListeModuleInterneModo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeEnfant($ListeEnfant) {
		$this->_filterLikeBy['ListeEnfant'] =  $ListeEnfant;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeEnfantModo($ListeEnfantModo) {
		$this->_filterLikeBy['ListeEnfantModo'] =  $ListeEnfantModo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByListeParent($ListeParent) {
		$this->_filterLikeBy['ListeParent'] =  $ListeParent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCanSubscribe($CanSubscribe) {
		$this->_filterLikeBy['CanSubscribe'] =  $CanSubscribe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEditorCkeditor($EditorCkeditor) {
		$this->_filterLikeBy['EditorCkeditor'] =  $EditorCkeditor;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEditorTinymce($EditorTinymce) {
		$this->_filterLikeBy['EditorTinymce'] =  $EditorTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByFileman($Fileman) {
		$this->_filterLikeBy['Fileman'] =  $Fileman;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGroupeTraduction($GroupeTraduction) {
		$this->_filterLikeBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAttributes($Attributes) {
		$this->_filterLikeBy['Attributes'] =  $Attributes;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRegisterVerification($RegisterVerification) {
		$this->_filterLikeBy['RegisterVerification'] =  $RegisterVerification;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasOptions($SaasOptions) {
		$this->_filterLikeBy['SaasOptions'] =  $SaasOptions;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPayment($Payment) {
		$this->_filterLikeBy['Payment'] =  $Payment;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentCurrency($PaymentCurrency) {
		$this->_filterLikeBy['PaymentCurrency'] =  $PaymentCurrency;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentAmountMonth($PaymentAmountMonth) {
		$this->_filterLikeBy['PaymentAmountMonth'] =  $PaymentAmountMonth;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentGroupExpired($PaymentGroupExpired) {
		$this->_filterLikeBy['PaymentGroupExpired'] =  $PaymentGroupExpired;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentTranche($PaymentTranche) {
		$this->_filterLikeBy['PaymentTranche'] =  $PaymentTranche;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaymentGroupUpgrade($PaymentGroupUpgrade) {
		$this->_filterLikeBy['PaymentGroupUpgrade'] =  $PaymentGroupUpgrade;
		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC') {
		$this->loadDirection('id',$direction);
		return $this;
	} 
		
	public function orderByUri($direction = 'ASC') {
		$this->loadDirection('uri',$direction);
		return $this;
	} 
		
	public function orderByListeWidget($direction = 'ASC') {
		$this->loadDirection('liste_widget',$direction);
		return $this;
	} 
		
	public function orderByListeModule($direction = 'ASC') {
		$this->loadDirection('liste_module',$direction);
		return $this;
	} 
		
	public function orderByListeModuleLimit($direction = 'ASC') {
		$this->loadDirection('liste_module_limit',$direction);
		return $this;
	} 
		
	public function orderByListeModuleList($direction = 'ASC') {
		$this->loadDirection('liste_module_list',$direction);
		return $this;
	} 
		
	public function orderByListeModuleShow($direction = 'ASC') {
		$this->loadDirection('liste_module_show',$direction);
		return $this;
	} 
		
	public function orderByListeModuleAdd($direction = 'ASC') {
		$this->loadDirection('liste_module_add',$direction);
		return $this;
	} 
		
	public function orderByListeModuleEdit($direction = 'ASC') {
		$this->loadDirection('liste_module_edit',$direction);
		return $this;
	} 
		
	public function orderByListeModuleDelete($direction = 'ASC') {
		$this->loadDirection('liste_module_delete',$direction);
		return $this;
	} 
		
	public function orderByListeModuleModo($direction = 'ASC') {
		$this->loadDirection('liste_module_modo',$direction);
		return $this;
	} 
		
	public function orderByListeModuleAdmin($direction = 'ASC') {
		$this->loadDirection('liste_module_admin',$direction);
		return $this;
	} 
		
	public function orderByListeModuleInterne($direction = 'ASC') {
		$this->loadDirection('liste_module_interne',$direction);
		return $this;
	} 
		
	public function orderByListeModuleInterneModo($direction = 'ASC') {
		$this->loadDirection('liste_module_interne_modo',$direction);
		return $this;
	} 
		
	public function orderByListeEnfant($direction = 'ASC') {
		$this->loadDirection('liste_enfant',$direction);
		return $this;
	} 
		
	public function orderByListeEnfantModo($direction = 'ASC') {
		$this->loadDirection('liste_enfant_modo',$direction);
		return $this;
	} 
		
	public function orderByListeParent($direction = 'ASC') {
		$this->loadDirection('liste_parent',$direction);
		return $this;
	} 
		
	public function orderByCanSubscribe($direction = 'ASC') {
		$this->loadDirection('can_subscribe',$direction);
		return $this;
	} 
		
	public function orderByEditorCkeditor($direction = 'ASC') {
		$this->loadDirection('editor_ckeditor',$direction);
		return $this;
	} 
		
	public function orderByEditorTinymce($direction = 'ASC') {
		$this->loadDirection('editor_tinymce',$direction);
		return $this;
	} 
		
	public function orderByFileman($direction = 'ASC') {
		$this->loadDirection('fileman',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByGroupeTraduction($direction = 'ASC') {
		$this->loadDirection('groupe_traduction',$direction);
		return $this;
	} 
		
	public function orderByAttributes($direction = 'ASC') {
		$this->loadDirection('attributes',$direction);
		return $this;
	} 
		
	public function orderByRegisterVerification($direction = 'ASC') {
		$this->loadDirection('register_verification',$direction);
		return $this;
	} 
		
	public function orderBySaasOptions($direction = 'ASC') {
		$this->loadDirection('saas_options',$direction);
		return $this;
	} 
		
	public function orderByPayment($direction = 'ASC') {
		$this->loadDirection('payment',$direction);
		return $this;
	} 
		
	public function orderByPaymentCurrency($direction = 'ASC') {
		$this->loadDirection('payment_currency',$direction);
		return $this;
	} 
		
	public function orderByPaymentAmountMonth($direction = 'ASC') {
		$this->loadDirection('payment_amount_month',$direction);
		return $this;
	} 
		
	public function orderByPaymentGroupExpired($direction = 'ASC') {
		$this->loadDirection('payment_group_expired',$direction);
		return $this;
	} 
		
	public function orderByPaymentTranche($direction = 'ASC') {
		$this->loadDirection('payment_tranche',$direction);
		return $this;
	} 
		
	public function orderByPaymentGroupUpgrade($direction = 'ASC') {
		$this->loadDirection('payment_group_upgrade',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Uri' =>  'uri',            
		    'ListeWidget' =>  'liste_widget',            
		    'ListeModule' =>  'liste_module',            
		    'ListeModuleLimit' =>  'liste_module_limit',            
		    'ListeModuleList' =>  'liste_module_list',            
		    'ListeModuleShow' =>  'liste_module_show',            
		    'ListeModuleAdd' =>  'liste_module_add',            
		    'ListeModuleEdit' =>  'liste_module_edit',            
		    'ListeModuleDelete' =>  'liste_module_delete',            
		    'ListeModuleModo' =>  'liste_module_modo',            
		    'ListeModuleAdmin' =>  'liste_module_admin',            
		    'ListeModuleInterne' =>  'liste_module_interne',            
		    'ListeModuleInterneModo' =>  'liste_module_interne_modo',            
		    'ListeEnfant' =>  'liste_enfant',            
		    'ListeEnfantModo' =>  'liste_enfant_modo',            
		    'ListeParent' =>  'liste_parent',            
		    'CanSubscribe' =>  'can_subscribe',            
		    'EditorCkeditor' =>  'editor_ckeditor',            
		    'EditorTinymce' =>  'editor_tinymce',            
		    'Fileman' =>  'fileman',            
		    'DateCreation' =>  'date_creation',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Attributes' =>  'attributes',            
		    'RegisterVerification' =>  'register_verification',            
		    'SaasOptions' =>  'saas_options',            
		    'Payment' =>  'payment',            
		    'PaymentCurrency' =>  'payment_currency',            
		    'PaymentAmountMonth' =>  'payment_amount_month',            
		    'PaymentGroupExpired' =>  'payment_group_expired',            
		    'PaymentTranche' =>  'payment_tranche',            
		    'PaymentGroupUpgrade' =>  'payment_group_upgrade',		
		));
	} 


}