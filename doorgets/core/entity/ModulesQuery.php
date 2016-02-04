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

class ModulesQuery extends AbstractQuery 
{

	protected $_table = '_modules';
    
    protected $_className = 'Modules';

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
		
	public function findByType($Type) {
		$this->_findBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByUri($Uri) {
		$this->_findBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByActive($Active) {
		$this->_findBy['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByActive($from,$to) {
		$this->_findRangeBy['Active'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByActive($int) {
		$this->_findGreaterThanBy['Active'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByActive($int) {
		$this->_findLessThanBy['Active'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByAuthorBadge($AuthorBadge) {
		$this->_findBy['AuthorBadge'] =  $AuthorBadge;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByAuthorBadge($from,$to) {
		$this->_findRangeBy['AuthorBadge'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByAuthorBadge($int) {
		$this->_findGreaterThanBy['AuthorBadge'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByAuthorBadge($int) {
		$this->_findLessThanBy['AuthorBadge'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIsFirst($IsFirst) {
		$this->_findBy['IsFirst'] =  $IsFirst;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIsFirst($from,$to) {
		$this->_findRangeBy['IsFirst'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIsFirst($int) {
		$this->_findGreaterThanBy['IsFirst'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIsFirst($int) {
		$this->_findLessThanBy['IsFirst'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPlugins($Plugins) {
		$this->_findBy['Plugins'] =  $Plugins;
		$this->_load();
		return $this;
	} 
		
	public function findByGroupeTraduction($GroupeTraduction) {
		$this->_findBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByBynum($Bynum) {
		$this->_findBy['Bynum'] =  $Bynum;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByBynum($from,$to) {
		$this->_findRangeBy['Bynum'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByBynum($int) {
		$this->_findGreaterThanBy['Bynum'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByBynum($int) {
		$this->_findLessThanBy['Bynum'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByAvoiraussi($Avoiraussi) {
		$this->_findBy['Avoiraussi'] =  $Avoiraussi;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByAvoiraussi($from,$to) {
		$this->_findRangeBy['Avoiraussi'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByAvoiraussi($int) {
		$this->_findGreaterThanBy['Avoiraussi'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByAvoiraussi($int) {
		$this->_findLessThanBy['Avoiraussi'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByImage($Image) {
		$this->_findBy['Image'] =  $Image;
		$this->_load();
		return $this;
	} 
		
	public function findByTemplateIndex($TemplateIndex) {
		$this->_findBy['TemplateIndex'] =  $TemplateIndex;
		$this->_load();
		return $this;
	} 
		
	public function findByTemplateContent($TemplateContent) {
		$this->_findBy['TemplateContent'] =  $TemplateContent;
		$this->_load();
		return $this;
	} 
		
	public function findByNotificationMail($NotificationMail) {
		$this->_findBy['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByNotificationMail($from,$to) {
		$this->_findRangeBy['NotificationMail'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByNotificationMail($int) {
		$this->_findGreaterThanBy['NotificationMail'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByNotificationMail($int) {
		$this->_findLessThanBy['NotificationMail'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByUriNotificationModerator($UriNotificationModerator) {
		$this->_findBy['UriNotificationModerator'] =  $UriNotificationModerator;
		$this->_load();
		return $this;
	} 
		
	public function findByUriNotificationUserSuccess($UriNotificationUserSuccess) {
		$this->_findBy['UriNotificationUserSuccess'] =  $UriNotificationUserSuccess;
		$this->_load();
		return $this;
	} 
		
	public function findByUriNotificationUserError($UriNotificationUserError) {
		$this->_findBy['UriNotificationUserError'] =  $UriNotificationUserError;
		$this->_load();
		return $this;
	} 
		
	public function findByExtras($Extras) {
		$this->_findBy['Extras'] =  $Extras;
		$this->_load();
		return $this;
	} 
		
	public function findByRedirection($Redirection) {
		$this->_findBy['Redirection'] =  $Redirection;
		$this->_load();
		return $this;
	} 
		
	public function findByRecaptcha($Recaptcha) {
		$this->_findBy['Recaptcha'] =  $Recaptcha;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByRecaptcha($from,$to) {
		$this->_findRangeBy['Recaptcha'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByRecaptcha($int) {
		$this->_findGreaterThanBy['Recaptcha'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByRecaptcha($int) {
		$this->_findLessThanBy['Recaptcha'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByWithPassword($WithPassword) {
		$this->_findBy['WithPassword'] =  $WithPassword;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByWithPassword($from,$to) {
		$this->_findRangeBy['WithPassword'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByWithPassword($int) {
		$this->_findGreaterThanBy['WithPassword'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByWithPassword($int) {
		$this->_findLessThanBy['WithPassword'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPassword($Password) {
		$this->_findBy['Password'] =  $Password;
		$this->_load();
		return $this;
	} 
		
	public function findByPublicModule($PublicModule) {
		$this->_findBy['PublicModule'] =  $PublicModule;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPublicModule($from,$to) {
		$this->_findRangeBy['PublicModule'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPublicModule($int) {
		$this->_findGreaterThanBy['PublicModule'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPublicModule($int) {
		$this->_findLessThanBy['PublicModule'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPublicComment($PublicComment) {
		$this->_findBy['PublicComment'] =  $PublicComment;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPublicComment($from,$to) {
		$this->_findRangeBy['PublicComment'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPublicComment($int) {
		$this->_findGreaterThanBy['PublicComment'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPublicComment($int) {
		$this->_findLessThanBy['PublicComment'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPublicAdd($PublicAdd) {
		$this->_findBy['PublicAdd'] =  $PublicAdd;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPublicAdd($from,$to) {
		$this->_findRangeBy['PublicAdd'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPublicAdd($int) {
		$this->_findGreaterThanBy['PublicAdd'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPublicAdd($int) {
		$this->_findLessThanBy['PublicAdd'] = $int;
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
		
	public function findOneByType($Type) {
		$this->_findOneBy['Type'] =  $Type;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUri($Uri) {
		$this->_findOneBy['Uri'] =  $Uri;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByActive($Active) {
		$this->_findOneBy['Active'] =  $Active;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAuthorBadge($AuthorBadge) {
		$this->_findOneBy['AuthorBadge'] =  $AuthorBadge;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIsFirst($IsFirst) {
		$this->_findOneBy['IsFirst'] =  $IsFirst;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPlugins($Plugins) {
		$this->_findOneBy['Plugins'] =  $Plugins;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGroupeTraduction($GroupeTraduction) {
		$this->_findOneBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBynum($Bynum) {
		$this->_findOneBy['Bynum'] =  $Bynum;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAvoiraussi($Avoiraussi) {
		$this->_findOneBy['Avoiraussi'] =  $Avoiraussi;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByImage($Image) {
		$this->_findOneBy['Image'] =  $Image;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTemplateIndex($TemplateIndex) {
		$this->_findOneBy['TemplateIndex'] =  $TemplateIndex;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTemplateContent($TemplateContent) {
		$this->_findOneBy['TemplateContent'] =  $TemplateContent;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNotificationMail($NotificationMail) {
		$this->_findOneBy['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriNotificationModerator($UriNotificationModerator) {
		$this->_findOneBy['UriNotificationModerator'] =  $UriNotificationModerator;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriNotificationUserSuccess($UriNotificationUserSuccess) {
		$this->_findOneBy['UriNotificationUserSuccess'] =  $UriNotificationUserSuccess;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByUriNotificationUserError($UriNotificationUserError) {
		$this->_findOneBy['UriNotificationUserError'] =  $UriNotificationUserError;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByExtras($Extras) {
		$this->_findOneBy['Extras'] =  $Extras;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRedirection($Redirection) {
		$this->_findOneBy['Redirection'] =  $Redirection;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRecaptcha($Recaptcha) {
		$this->_findOneBy['Recaptcha'] =  $Recaptcha;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByWithPassword($WithPassword) {
		$this->_findOneBy['WithPassword'] =  $WithPassword;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPassword($Password) {
		$this->_findOneBy['Password'] =  $Password;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPublicModule($PublicModule) {
		$this->_findOneBy['PublicModule'] =  $PublicModule;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPublicComment($PublicComment) {
		$this->_findOneBy['PublicComment'] =  $PublicComment;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPublicAdd($PublicAdd) {
		$this->_findOneBy['PublicAdd'] =  $PublicAdd;
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
		
	public function findByLikeType($Type) {
		$this->_findByLike['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUri($Uri) {
		$this->_findByLike['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeActive($Active) {
		$this->_findByLike['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAuthorBadge($AuthorBadge) {
		$this->_findByLike['AuthorBadge'] =  $AuthorBadge;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIsFirst($IsFirst) {
		$this->_findByLike['IsFirst'] =  $IsFirst;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePlugins($Plugins) {
		$this->_findByLike['Plugins'] =  $Plugins;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGroupeTraduction($GroupeTraduction) {
		$this->_findByLike['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBynum($Bynum) {
		$this->_findByLike['Bynum'] =  $Bynum;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAvoiraussi($Avoiraussi) {
		$this->_findByLike['Avoiraussi'] =  $Avoiraussi;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeImage($Image) {
		$this->_findByLike['Image'] =  $Image;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTemplateIndex($TemplateIndex) {
		$this->_findByLike['TemplateIndex'] =  $TemplateIndex;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTemplateContent($TemplateContent) {
		$this->_findByLike['TemplateContent'] =  $TemplateContent;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNotificationMail($NotificationMail) {
		$this->_findByLike['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriNotificationModerator($UriNotificationModerator) {
		$this->_findByLike['UriNotificationModerator'] =  $UriNotificationModerator;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriNotificationUserSuccess($UriNotificationUserSuccess) {
		$this->_findByLike['UriNotificationUserSuccess'] =  $UriNotificationUserSuccess;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeUriNotificationUserError($UriNotificationUserError) {
		$this->_findByLike['UriNotificationUserError'] =  $UriNotificationUserError;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeExtras($Extras) {
		$this->_findByLike['Extras'] =  $Extras;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRedirection($Redirection) {
		$this->_findByLike['Redirection'] =  $Redirection;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRecaptcha($Recaptcha) {
		$this->_findByLike['Recaptcha'] =  $Recaptcha;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeWithPassword($WithPassword) {
		$this->_findByLike['WithPassword'] =  $WithPassword;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePassword($Password) {
		$this->_findByLike['Password'] =  $Password;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePublicModule($PublicModule) {
		$this->_findByLike['PublicModule'] =  $PublicModule;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePublicComment($PublicComment) {
		$this->_findByLike['PublicComment'] =  $PublicComment;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePublicAdd($PublicAdd) {
		$this->_findByLike['PublicAdd'] =  $PublicAdd;
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
		
	public function filterByType($Type, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Type',$Type,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUri($Uri, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Uri',$Uri,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByActive($Active, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Active',$Active,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByActive($from,$to) {
		$this->_filterRangeBy['Active'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByActive($int) {
		$this->_filterGreaterThanBy['Active'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByActive($int) {
		$this->_filterLessThanBy['Active'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByAuthorBadge($AuthorBadge, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('AuthorBadge',$AuthorBadge,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByAuthorBadge($from,$to) {
		$this->_filterRangeBy['AuthorBadge'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByAuthorBadge($int) {
		$this->_filterGreaterThanBy['AuthorBadge'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByAuthorBadge($int) {
		$this->_filterLessThanBy['AuthorBadge'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIsFirst($IsFirst, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IsFirst',$IsFirst,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIsFirst($from,$to) {
		$this->_filterRangeBy['IsFirst'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIsFirst($int) {
		$this->_filterGreaterThanBy['IsFirst'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIsFirst($int) {
		$this->_filterLessThanBy['IsFirst'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPlugins($Plugins, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Plugins',$Plugins,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGroupeTraduction($GroupeTraduction, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('GroupeTraduction',$GroupeTraduction,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBynum($Bynum, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Bynum',$Bynum,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByBynum($from,$to) {
		$this->_filterRangeBy['Bynum'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByBynum($int) {
		$this->_filterGreaterThanBy['Bynum'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByBynum($int) {
		$this->_filterLessThanBy['Bynum'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByAvoiraussi($Avoiraussi, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Avoiraussi',$Avoiraussi,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByAvoiraussi($from,$to) {
		$this->_filterRangeBy['Avoiraussi'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByAvoiraussi($int) {
		$this->_filterGreaterThanBy['Avoiraussi'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByAvoiraussi($int) {
		$this->_filterLessThanBy['Avoiraussi'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByImage($Image, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Image',$Image,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTemplateIndex($TemplateIndex, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TemplateIndex',$TemplateIndex,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTemplateContent($TemplateContent, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TemplateContent',$TemplateContent,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByNotificationMail($NotificationMail, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('NotificationMail',$NotificationMail,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByNotificationMail($from,$to) {
		$this->_filterRangeBy['NotificationMail'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByNotificationMail($int) {
		$this->_filterGreaterThanBy['NotificationMail'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByNotificationMail($int) {
		$this->_filterLessThanBy['NotificationMail'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByUriNotificationModerator($UriNotificationModerator, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriNotificationModerator',$UriNotificationModerator,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUriNotificationUserSuccess($UriNotificationUserSuccess, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriNotificationUserSuccess',$UriNotificationUserSuccess,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByUriNotificationUserError($UriNotificationUserError, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('UriNotificationUserError',$UriNotificationUserError,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByExtras($Extras, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Extras',$Extras,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByRedirection($Redirection, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Redirection',$Redirection,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByRecaptcha($Recaptcha, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Recaptcha',$Recaptcha,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByRecaptcha($from,$to) {
		$this->_filterRangeBy['Recaptcha'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByRecaptcha($int) {
		$this->_filterGreaterThanBy['Recaptcha'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByRecaptcha($int) {
		$this->_filterLessThanBy['Recaptcha'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByWithPassword($WithPassword, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('WithPassword',$WithPassword,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByWithPassword($from,$to) {
		$this->_filterRangeBy['WithPassword'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByWithPassword($int) {
		$this->_filterGreaterThanBy['WithPassword'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByWithPassword($int) {
		$this->_filterLessThanBy['WithPassword'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPassword($Password, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Password',$Password,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPublicModule($PublicModule, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PublicModule',$PublicModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPublicModule($from,$to) {
		$this->_filterRangeBy['PublicModule'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPublicModule($int) {
		$this->_filterGreaterThanBy['PublicModule'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPublicModule($int) {
		$this->_filterLessThanBy['PublicModule'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPublicComment($PublicComment, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PublicComment',$PublicComment,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPublicComment($from,$to) {
		$this->_filterRangeBy['PublicComment'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPublicComment($int) {
		$this->_filterGreaterThanBy['PublicComment'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPublicComment($int) {
		$this->_filterLessThanBy['PublicComment'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPublicAdd($PublicAdd, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PublicAdd',$PublicAdd,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPublicAdd($from,$to) {
		$this->_filterRangeBy['PublicAdd'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPublicAdd($int) {
		$this->_filterGreaterThanBy['PublicAdd'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPublicAdd($int) {
		$this->_filterLessThanBy['PublicAdd'] = $int;
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
		
	public function filterLikeByType($Type) {
		$this->_filterLikeBy['Type'] =  $Type;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUri($Uri) {
		$this->_filterLikeBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByActive($Active) {
		$this->_filterLikeBy['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAuthorBadge($AuthorBadge) {
		$this->_filterLikeBy['AuthorBadge'] =  $AuthorBadge;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIsFirst($IsFirst) {
		$this->_filterLikeBy['IsFirst'] =  $IsFirst;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPlugins($Plugins) {
		$this->_filterLikeBy['Plugins'] =  $Plugins;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGroupeTraduction($GroupeTraduction) {
		$this->_filterLikeBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBynum($Bynum) {
		$this->_filterLikeBy['Bynum'] =  $Bynum;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAvoiraussi($Avoiraussi) {
		$this->_filterLikeBy['Avoiraussi'] =  $Avoiraussi;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByImage($Image) {
		$this->_filterLikeBy['Image'] =  $Image;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTemplateIndex($TemplateIndex) {
		$this->_filterLikeBy['TemplateIndex'] =  $TemplateIndex;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTemplateContent($TemplateContent) {
		$this->_filterLikeBy['TemplateContent'] =  $TemplateContent;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNotificationMail($NotificationMail) {
		$this->_filterLikeBy['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriNotificationModerator($UriNotificationModerator) {
		$this->_filterLikeBy['UriNotificationModerator'] =  $UriNotificationModerator;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriNotificationUserSuccess($UriNotificationUserSuccess) {
		$this->_filterLikeBy['UriNotificationUserSuccess'] =  $UriNotificationUserSuccess;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByUriNotificationUserError($UriNotificationUserError) {
		$this->_filterLikeBy['UriNotificationUserError'] =  $UriNotificationUserError;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByExtras($Extras) {
		$this->_filterLikeBy['Extras'] =  $Extras;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRedirection($Redirection) {
		$this->_filterLikeBy['Redirection'] =  $Redirection;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRecaptcha($Recaptcha) {
		$this->_filterLikeBy['Recaptcha'] =  $Recaptcha;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByWithPassword($WithPassword) {
		$this->_filterLikeBy['WithPassword'] =  $WithPassword;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPassword($Password) {
		$this->_filterLikeBy['Password'] =  $Password;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPublicModule($PublicModule) {
		$this->_filterLikeBy['PublicModule'] =  $PublicModule;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPublicComment($PublicComment) {
		$this->_filterLikeBy['PublicComment'] =  $PublicComment;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPublicAdd($PublicAdd) {
		$this->_filterLikeBy['PublicAdd'] =  $PublicAdd;
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
		
	public function orderByType($direction = 'ASC') {
		$this->loadDirection('type',$direction);
		return $this;
	} 
		
	public function orderByUri($direction = 'ASC') {
		$this->loadDirection('uri',$direction);
		return $this;
	} 
		
	public function orderByActive($direction = 'ASC') {
		$this->loadDirection('active',$direction);
		return $this;
	} 
		
	public function orderByAuthorBadge($direction = 'ASC') {
		$this->loadDirection('author_badge',$direction);
		return $this;
	} 
		
	public function orderByIsFirst($direction = 'ASC') {
		$this->loadDirection('is_first',$direction);
		return $this;
	} 
		
	public function orderByPlugins($direction = 'ASC') {
		$this->loadDirection('plugins',$direction);
		return $this;
	} 
		
	public function orderByGroupeTraduction($direction = 'ASC') {
		$this->loadDirection('groupe_traduction',$direction);
		return $this;
	} 
		
	public function orderByBynum($direction = 'ASC') {
		$this->loadDirection('bynum',$direction);
		return $this;
	} 
		
	public function orderByAvoiraussi($direction = 'ASC') {
		$this->loadDirection('avoiraussi',$direction);
		return $this;
	} 
		
	public function orderByImage($direction = 'ASC') {
		$this->loadDirection('image',$direction);
		return $this;
	} 
		
	public function orderByTemplateIndex($direction = 'ASC') {
		$this->loadDirection('template_index',$direction);
		return $this;
	} 
		
	public function orderByTemplateContent($direction = 'ASC') {
		$this->loadDirection('template_content',$direction);
		return $this;
	} 
		
	public function orderByNotificationMail($direction = 'ASC') {
		$this->loadDirection('notification_mail',$direction);
		return $this;
	} 
		
	public function orderByUriNotificationModerator($direction = 'ASC') {
		$this->loadDirection('uri_notification_moderator',$direction);
		return $this;
	} 
		
	public function orderByUriNotificationUserSuccess($direction = 'ASC') {
		$this->loadDirection('uri_notification_user_success',$direction);
		return $this;
	} 
		
	public function orderByUriNotificationUserError($direction = 'ASC') {
		$this->loadDirection('uri_notification_user_error',$direction);
		return $this;
	} 
		
	public function orderByExtras($direction = 'ASC') {
		$this->loadDirection('extras',$direction);
		return $this;
	} 
		
	public function orderByRedirection($direction = 'ASC') {
		$this->loadDirection('redirection',$direction);
		return $this;
	} 
		
	public function orderByRecaptcha($direction = 'ASC') {
		$this->loadDirection('recaptcha',$direction);
		return $this;
	} 
		
	public function orderByWithPassword($direction = 'ASC') {
		$this->loadDirection('with_password',$direction);
		return $this;
	} 
		
	public function orderByPassword($direction = 'ASC') {
		$this->loadDirection('password',$direction);
		return $this;
	} 
		
	public function orderByPublicModule($direction = 'ASC') {
		$this->loadDirection('public_module',$direction);
		return $this;
	} 
		
	public function orderByPublicComment($direction = 'ASC') {
		$this->loadDirection('public_comment',$direction);
		return $this;
	} 
		
	public function orderByPublicAdd($direction = 'ASC') {
		$this->loadDirection('public_add',$direction);
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
		    'Type' =>  'type',            
		    'Uri' =>  'uri',            
		    'Active' =>  'active',            
		    'AuthorBadge' =>  'author_badge',            
		    'IsFirst' =>  'is_first',            
		    'Plugins' =>  'plugins',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'Bynum' =>  'bynum',            
		    'Avoiraussi' =>  'avoiraussi',            
		    'Image' =>  'image',            
		    'TemplateIndex' =>  'template_index',            
		    'TemplateContent' =>  'template_content',            
		    'NotificationMail' =>  'notification_mail',            
		    'UriNotificationModerator' =>  'uri_notification_moderator',            
		    'UriNotificationUserSuccess' =>  'uri_notification_user_success',            
		    'UriNotificationUserError' =>  'uri_notification_user_error',            
		    'Extras' =>  'extras',            
		    'Redirection' =>  'redirection',            
		    'Recaptcha' =>  'recaptcha',            
		    'WithPassword' =>  'with_password',            
		    'Password' =>  'password',            
		    'PublicModule' =>  'public_module',            
		    'PublicComment' =>  'public_comment',            
		    'PublicAdd' =>  'public_add',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


}