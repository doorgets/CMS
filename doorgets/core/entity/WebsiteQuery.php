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

class WebsiteQuery extends AbstractQuery 
{

	protected $_table = '_website';
    
    protected $_className = 'Website';

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
		
	public function findByStatut($Statut) {
		$this->_findBy['Statut'] =  $Statut;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByStatut($from,$to) {
		$this->_findRangeBy['Statut'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByStatut($int) {
		$this->_findGreaterThanBy['Statut'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByStatut($int) {
		$this->_findLessThanBy['Statut'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByStatutVersion($StatutVersion) {
		$this->_findBy['StatutVersion'] =  $StatutVersion;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByStatutVersion($from,$to) {
		$this->_findRangeBy['StatutVersion'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByStatutVersion($int) {
		$this->_findGreaterThanBy['StatutVersion'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByStatutVersion($int) {
		$this->_findLessThanBy['StatutVersion'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByStatutIp($StatutIp) {
		$this->_findBy['StatutIp'] =  $StatutIp;
		$this->_load();
		return $this;
	} 
		
	public function findByVersionDoorgets($VersionDoorgets) {
		$this->_findBy['VersionDoorgets'] =  $VersionDoorgets;
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
		
	public function findByDescription($Description) {
		$this->_findBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByKeywords($Keywords) {
		$this->_findBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByAddresses($Addresses) {
		$this->_findBy['Addresses'] =  $Addresses;
		$this->_load();
		return $this;
	} 
		
	public function findByPays($Pays) {
		$this->_findBy['Pays'] =  $Pays;
		$this->_load();
		return $this;
	} 
		
	public function findByVille($Ville) {
		$this->_findBy['Ville'] =  $Ville;
		$this->_load();
		return $this;
	} 
		
	public function findByAdresse($Adresse) {
		$this->_findBy['Adresse'] =  $Adresse;
		$this->_load();
		return $this;
	} 
		
	public function findByCodepostal($Codepostal) {
		$this->_findBy['Codepostal'] =  $Codepostal;
		$this->_load();
		return $this;
	} 
		
	public function findByTelFix($TelFix) {
		$this->_findBy['TelFix'] =  $TelFix;
		$this->_load();
		return $this;
	} 
		
	public function findByTelMobil($TelMobil) {
		$this->_findBy['TelMobil'] =  $TelMobil;
		$this->_load();
		return $this;
	} 
		
	public function findByTelFax($TelFax) {
		$this->_findBy['TelFax'] =  $TelFax;
		$this->_load();
		return $this;
	} 
		
	public function findByFacebook($Facebook) {
		$this->_findBy['Facebook'] =  $Facebook;
		$this->_load();
		return $this;
	} 
		
	public function findByTwitter($Twitter) {
		$this->_findBy['Twitter'] =  $Twitter;
		$this->_load();
		return $this;
	} 
		
	public function findByPinterest($Pinterest) {
		$this->_findBy['Pinterest'] =  $Pinterest;
		$this->_load();
		return $this;
	} 
		
	public function findByMyspace($Myspace) {
		$this->_findBy['Myspace'] =  $Myspace;
		$this->_load();
		return $this;
	} 
		
	public function findByLinkedin($Linkedin) {
		$this->_findBy['Linkedin'] =  $Linkedin;
		$this->_load();
		return $this;
	} 
		
	public function findByYoutube($Youtube) {
		$this->_findBy['Youtube'] =  $Youtube;
		$this->_load();
		return $this;
	} 
		
	public function findByGoogle($Google) {
		$this->_findBy['Google'] =  $Google;
		$this->_load();
		return $this;
	} 
		
	public function findByAnalytics($Analytics) {
		$this->_findBy['Analytics'] =  $Analytics;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLangueFront($LangueFront) {
		$this->_findBy['LangueFront'] =  $LangueFront;
		$this->_load();
		return $this;
	} 
		
	public function findByLangueGroupe($LangueGroupe) {
		$this->_findBy['LangueGroupe'] =  $LangueGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByHoraire($Horaire) {
		$this->_findBy['Horaire'] =  $Horaire;
		$this->_load();
		return $this;
	} 
		
	public function findByMentions($Mentions) {
		$this->_findBy['Mentions'] =  $Mentions;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMentions($from,$to) {
		$this->_findRangeBy['Mentions'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMentions($int) {
		$this->_findGreaterThanBy['Mentions'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMentions($int) {
		$this->_findLessThanBy['Mentions'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCgu($Cgu) {
		$this->_findBy['Cgu'] =  $Cgu;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByCgu($from,$to) {
		$this->_findRangeBy['Cgu'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByCgu($int) {
		$this->_findGreaterThanBy['Cgu'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByCgu($int) {
		$this->_findLessThanBy['Cgu'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMNewsletter($MNewsletter) {
		$this->_findBy['MNewsletter'] =  $MNewsletter;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMNewsletter($from,$to) {
		$this->_findRangeBy['MNewsletter'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMNewsletter($int) {
		$this->_findGreaterThanBy['MNewsletter'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMNewsletter($int) {
		$this->_findLessThanBy['MNewsletter'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMComment($MComment) {
		$this->_findBy['MComment'] =  $MComment;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMComment($from,$to) {
		$this->_findRangeBy['MComment'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMComment($int) {
		$this->_findGreaterThanBy['MComment'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMComment($int) {
		$this->_findLessThanBy['MComment'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMCommentFacebook($MCommentFacebook) {
		$this->_findBy['MCommentFacebook'] =  $MCommentFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMCommentFacebook($from,$to) {
		$this->_findRangeBy['MCommentFacebook'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMCommentFacebook($int) {
		$this->_findGreaterThanBy['MCommentFacebook'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMCommentFacebook($int) {
		$this->_findLessThanBy['MCommentFacebook'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMCommentDisqus($MCommentDisqus) {
		$this->_findBy['MCommentDisqus'] =  $MCommentDisqus;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMCommentDisqus($from,$to) {
		$this->_findRangeBy['MCommentDisqus'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMCommentDisqus($int) {
		$this->_findGreaterThanBy['MCommentDisqus'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMCommentDisqus($int) {
		$this->_findLessThanBy['MCommentDisqus'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMSharethis($MSharethis) {
		$this->_findBy['MSharethis'] =  $MSharethis;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMSharethis($from,$to) {
		$this->_findRangeBy['MSharethis'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMSharethis($int) {
		$this->_findGreaterThanBy['MSharethis'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMSharethis($int) {
		$this->_findLessThanBy['MSharethis'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMSitemap($MSitemap) {
		$this->_findBy['MSitemap'] =  $MSitemap;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMSitemap($from,$to) {
		$this->_findRangeBy['MSitemap'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMSitemap($int) {
		$this->_findGreaterThanBy['MSitemap'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMSitemap($int) {
		$this->_findLessThanBy['MSitemap'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByMRss($MRss) {
		$this->_findBy['MRss'] =  $MRss;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMRss($from,$to) {
		$this->_findRangeBy['MRss'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMRss($int) {
		$this->_findGreaterThanBy['MRss'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMRss($int) {
		$this->_findLessThanBy['MRss'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdFacebook($IdFacebook) {
		$this->_findBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByIdDisqus($IdDisqus) {
		$this->_findBy['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this;
	} 
		
	public function findByTheme($Theme) {
		$this->_findBy['Theme'] =  $Theme;
		$this->_load();
		return $this;
	} 
		
	public function findByThemeBootstrap($ThemeBootstrap) {
		$this->_findBy['ThemeBootstrap'] =  $ThemeBootstrap;
		$this->_load();
		return $this;
	} 
		
	public function findByModuleHomepage($ModuleHomepage) {
		$this->_findBy['ModuleHomepage'] =  $ModuleHomepage;
		$this->_load();
		return $this;
	} 
		
	public function findByOauthGoogleId($OauthGoogleId) {
		$this->_findBy['OauthGoogleId'] =  $OauthGoogleId;
		$this->_load();
		return $this;
	} 
		
	public function findByOauthGoogleSecret($OauthGoogleSecret) {
		$this->_findBy['OauthGoogleSecret'] =  $OauthGoogleSecret;
		$this->_load();
		return $this;
	} 
		
	public function findByOauthGoogleActive($OauthGoogleActive) {
		$this->_findBy['OauthGoogleActive'] =  $OauthGoogleActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByOauthGoogleActive($from,$to) {
		$this->_findRangeBy['OauthGoogleActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByOauthGoogleActive($int) {
		$this->_findGreaterThanBy['OauthGoogleActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByOauthGoogleActive($int) {
		$this->_findLessThanBy['OauthGoogleActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByOauthFacebookId($OauthFacebookId) {
		$this->_findBy['OauthFacebookId'] =  $OauthFacebookId;
		$this->_load();
		return $this;
	} 
		
	public function findByOauthFacebookSecret($OauthFacebookSecret) {
		$this->_findBy['OauthFacebookSecret'] =  $OauthFacebookSecret;
		$this->_load();
		return $this;
	} 
		
	public function findByOauthFacebookActive($OauthFacebookActive) {
		$this->_findBy['OauthFacebookActive'] =  $OauthFacebookActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByOauthFacebookActive($from,$to) {
		$this->_findRangeBy['OauthFacebookActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByOauthFacebookActive($int) {
		$this->_findGreaterThanBy['OauthFacebookActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByOauthFacebookActive($int) {
		$this->_findLessThanBy['OauthFacebookActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findBySmtpMandrillSsl($SmtpMandrillSsl) {
		$this->_findBy['SmtpMandrillSsl'] =  $SmtpMandrillSsl;
		$this->_load();
		return $this;
	} 
		
	public function findBySmtpMandrillActive($SmtpMandrillActive) {
		$this->_findBy['SmtpMandrillActive'] =  $SmtpMandrillActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeBySmtpMandrillActive($from,$to) {
		$this->_findRangeBy['SmtpMandrillActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanBySmtpMandrillActive($int) {
		$this->_findGreaterThanBy['SmtpMandrillActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanBySmtpMandrillActive($int) {
		$this->_findLessThanBy['SmtpMandrillActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findBySmtpMandrillHost($SmtpMandrillHost) {
		$this->_findBy['SmtpMandrillHost'] =  $SmtpMandrillHost;
		$this->_load();
		return $this;
	} 
		
	public function findBySmtpMandrillPort($SmtpMandrillPort) {
		$this->_findBy['SmtpMandrillPort'] =  $SmtpMandrillPort;
		$this->_load();
		return $this;
	} 
		
	public function findBySmtpMandrillUsername($SmtpMandrillUsername) {
		$this->_findBy['SmtpMandrillUsername'] =  $SmtpMandrillUsername;
		$this->_load();
		return $this;
	} 
		
	public function findBySmtpMandrillPassword($SmtpMandrillPassword) {
		$this->_findBy['SmtpMandrillPassword'] =  $SmtpMandrillPassword;
		$this->_load();
		return $this;
	} 
		
	public function findByStripeActive($StripeActive) {
		$this->_findBy['StripeActive'] =  $StripeActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByStripeActive($from,$to) {
		$this->_findRangeBy['StripeActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByStripeActive($int) {
		$this->_findGreaterThanBy['StripeActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByStripeActive($int) {
		$this->_findLessThanBy['StripeActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByStripeSecretKey($StripeSecretKey) {
		$this->_findBy['StripeSecretKey'] =  $StripeSecretKey;
		$this->_load();
		return $this;
	} 
		
	public function findByStripePublishableKey($StripePublishableKey) {
		$this->_findBy['StripePublishableKey'] =  $StripePublishableKey;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalDemo($PaypalDemo) {
		$this->_findBy['PaypalDemo'] =  $PaypalDemo;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPaypalDemo($from,$to) {
		$this->_findRangeBy['PaypalDemo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPaypalDemo($int) {
		$this->_findGreaterThanBy['PaypalDemo'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPaypalDemo($int) {
		$this->_findLessThanBy['PaypalDemo'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalActive($PaypalActive) {
		$this->_findBy['PaypalActive'] =  $PaypalActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPaypalActive($from,$to) {
		$this->_findRangeBy['PaypalActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPaypalActive($int) {
		$this->_findGreaterThanBy['PaypalActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPaypalActive($int) {
		$this->_findLessThanBy['PaypalActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalUser($PaypalUser) {
		$this->_findBy['PaypalUser'] =  $PaypalUser;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalPassword($PaypalPassword) {
		$this->_findBy['PaypalPassword'] =  $PaypalPassword;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalSignature($PaypalSignature) {
		$this->_findBy['PaypalSignature'] =  $PaypalSignature;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalReturnurl($PaypalReturnurl) {
		$this->_findBy['PaypalReturnurl'] =  $PaypalReturnurl;
		$this->_load();
		return $this;
	} 
		
	public function findByPaypalCancelurl($PaypalCancelurl) {
		$this->_findBy['PaypalCancelurl'] =  $PaypalCancelurl;
		$this->_load();
		return $this;
	} 
		
	public function findByTransferActive($TransferActive) {
		$this->_findBy['TransferActive'] =  $TransferActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByTransferActive($from,$to) {
		$this->_findRangeBy['TransferActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByTransferActive($int) {
		$this->_findGreaterThanBy['TransferActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByTransferActive($int) {
		$this->_findLessThanBy['TransferActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByTransferTinymce($TransferTinymce) {
		$this->_findBy['TransferTinymce'] =  $TransferTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByCheckActive($CheckActive) {
		$this->_findBy['CheckActive'] =  $CheckActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByCheckActive($from,$to) {
		$this->_findRangeBy['CheckActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByCheckActive($int) {
		$this->_findGreaterThanBy['CheckActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByCheckActive($int) {
		$this->_findLessThanBy['CheckActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCheckTinymce($CheckTinymce) {
		$this->_findBy['CheckTinymce'] =  $CheckTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByCashActive($CashActive) {
		$this->_findBy['CashActive'] =  $CashActive;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByCashActive($from,$to) {
		$this->_findRangeBy['CashActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByCashActive($int) {
		$this->_findGreaterThanBy['CashActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByCashActive($int) {
		$this->_findLessThanBy['CashActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCashTinymce($CashTinymce) {
		$this->_findBy['CashTinymce'] =  $CashTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByCurrency($Currency) {
		$this->_findBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasHost($SaasHost) {
		$this->_findBy['SaasHost'] =  $SaasHost;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasHostInt($SaasHostInt) {
		$this->_findBy['SaasHostInt'] =  $SaasHostInt;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasName($SaasName) {
		$this->_findBy['SaasName'] =  $SaasName;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasUser($SaasUser) {
		$this->_findBy['SaasUser'] =  $SaasUser;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasPassword($SaasPassword) {
		$this->_findBy['SaasPassword'] =  $SaasPassword;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasArchive($SaasArchive) {
		$this->_findBy['SaasArchive'] =  $SaasArchive;
		$this->_load();
		return $this;
	} 
		
	public function findBySaasPosition($SaasPosition) {
		$this->_findBy['SaasPosition'] =  $SaasPosition;
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
		
	public function findOneByStatut($Statut) {
		$this->_findOneBy['Statut'] =  $Statut;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatutVersion($StatutVersion) {
		$this->_findOneBy['StatutVersion'] =  $StatutVersion;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatutIp($StatutIp) {
		$this->_findOneBy['StatutIp'] =  $StatutIp;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByVersionDoorgets($VersionDoorgets) {
		$this->_findOneBy['VersionDoorgets'] =  $VersionDoorgets;
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
		
	public function findOneByDescription($Description) {
		$this->_findOneBy['Description'] =  $Description;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByKeywords($Keywords) {
		$this->_findOneBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAddresses($Addresses) {
		$this->_findOneBy['Addresses'] =  $Addresses;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPays($Pays) {
		$this->_findOneBy['Pays'] =  $Pays;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByVille($Ville) {
		$this->_findOneBy['Ville'] =  $Ville;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAdresse($Adresse) {
		$this->_findOneBy['Adresse'] =  $Adresse;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCodepostal($Codepostal) {
		$this->_findOneBy['Codepostal'] =  $Codepostal;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTelFix($TelFix) {
		$this->_findOneBy['TelFix'] =  $TelFix;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTelMobil($TelMobil) {
		$this->_findOneBy['TelMobil'] =  $TelMobil;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTelFax($TelFax) {
		$this->_findOneBy['TelFax'] =  $TelFax;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByFacebook($Facebook) {
		$this->_findOneBy['Facebook'] =  $Facebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTwitter($Twitter) {
		$this->_findOneBy['Twitter'] =  $Twitter;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPinterest($Pinterest) {
		$this->_findOneBy['Pinterest'] =  $Pinterest;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMyspace($Myspace) {
		$this->_findOneBy['Myspace'] =  $Myspace;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLinkedin($Linkedin) {
		$this->_findOneBy['Linkedin'] =  $Linkedin;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByYoutube($Youtube) {
		$this->_findOneBy['Youtube'] =  $Youtube;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGoogle($Google) {
		$this->_findOneBy['Google'] =  $Google;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAnalytics($Analytics) {
		$this->_findOneBy['Analytics'] =  $Analytics;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangueFront($LangueFront) {
		$this->_findOneBy['LangueFront'] =  $LangueFront;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangueGroupe($LangueGroupe) {
		$this->_findOneBy['LangueGroupe'] =  $LangueGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByHoraire($Horaire) {
		$this->_findOneBy['Horaire'] =  $Horaire;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMentions($Mentions) {
		$this->_findOneBy['Mentions'] =  $Mentions;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCgu($Cgu) {
		$this->_findOneBy['Cgu'] =  $Cgu;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMNewsletter($MNewsletter) {
		$this->_findOneBy['MNewsletter'] =  $MNewsletter;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMComment($MComment) {
		$this->_findOneBy['MComment'] =  $MComment;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMCommentFacebook($MCommentFacebook) {
		$this->_findOneBy['MCommentFacebook'] =  $MCommentFacebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMCommentDisqus($MCommentDisqus) {
		$this->_findOneBy['MCommentDisqus'] =  $MCommentDisqus;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMSharethis($MSharethis) {
		$this->_findOneBy['MSharethis'] =  $MSharethis;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMSitemap($MSitemap) {
		$this->_findOneBy['MSitemap'] =  $MSitemap;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMRss($MRss) {
		$this->_findOneBy['MRss'] =  $MRss;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdFacebook($IdFacebook) {
		$this->_findOneBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdDisqus($IdDisqus) {
		$this->_findOneBy['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTheme($Theme) {
		$this->_findOneBy['Theme'] =  $Theme;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByThemeBootstrap($ThemeBootstrap) {
		$this->_findOneBy['ThemeBootstrap'] =  $ThemeBootstrap;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByModuleHomepage($ModuleHomepage) {
		$this->_findOneBy['ModuleHomepage'] =  $ModuleHomepage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOauthGoogleId($OauthGoogleId) {
		$this->_findOneBy['OauthGoogleId'] =  $OauthGoogleId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOauthGoogleSecret($OauthGoogleSecret) {
		$this->_findOneBy['OauthGoogleSecret'] =  $OauthGoogleSecret;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOauthGoogleActive($OauthGoogleActive) {
		$this->_findOneBy['OauthGoogleActive'] =  $OauthGoogleActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOauthFacebookId($OauthFacebookId) {
		$this->_findOneBy['OauthFacebookId'] =  $OauthFacebookId;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOauthFacebookSecret($OauthFacebookSecret) {
		$this->_findOneBy['OauthFacebookSecret'] =  $OauthFacebookSecret;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOauthFacebookActive($OauthFacebookActive) {
		$this->_findOneBy['OauthFacebookActive'] =  $OauthFacebookActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySmtpMandrillSsl($SmtpMandrillSsl) {
		$this->_findOneBy['SmtpMandrillSsl'] =  $SmtpMandrillSsl;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySmtpMandrillActive($SmtpMandrillActive) {
		$this->_findOneBy['SmtpMandrillActive'] =  $SmtpMandrillActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySmtpMandrillHost($SmtpMandrillHost) {
		$this->_findOneBy['SmtpMandrillHost'] =  $SmtpMandrillHost;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySmtpMandrillPort($SmtpMandrillPort) {
		$this->_findOneBy['SmtpMandrillPort'] =  $SmtpMandrillPort;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySmtpMandrillUsername($SmtpMandrillUsername) {
		$this->_findOneBy['SmtpMandrillUsername'] =  $SmtpMandrillUsername;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySmtpMandrillPassword($SmtpMandrillPassword) {
		$this->_findOneBy['SmtpMandrillPassword'] =  $SmtpMandrillPassword;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStripeActive($StripeActive) {
		$this->_findOneBy['StripeActive'] =  $StripeActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStripeSecretKey($StripeSecretKey) {
		$this->_findOneBy['StripeSecretKey'] =  $StripeSecretKey;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStripePublishableKey($StripePublishableKey) {
		$this->_findOneBy['StripePublishableKey'] =  $StripePublishableKey;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalDemo($PaypalDemo) {
		$this->_findOneBy['PaypalDemo'] =  $PaypalDemo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalActive($PaypalActive) {
		$this->_findOneBy['PaypalActive'] =  $PaypalActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalUser($PaypalUser) {
		$this->_findOneBy['PaypalUser'] =  $PaypalUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalPassword($PaypalPassword) {
		$this->_findOneBy['PaypalPassword'] =  $PaypalPassword;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalSignature($PaypalSignature) {
		$this->_findOneBy['PaypalSignature'] =  $PaypalSignature;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalReturnurl($PaypalReturnurl) {
		$this->_findOneBy['PaypalReturnurl'] =  $PaypalReturnurl;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPaypalCancelurl($PaypalCancelurl) {
		$this->_findOneBy['PaypalCancelurl'] =  $PaypalCancelurl;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTransferActive($TransferActive) {
		$this->_findOneBy['TransferActive'] =  $TransferActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTransferTinymce($TransferTinymce) {
		$this->_findOneBy['TransferTinymce'] =  $TransferTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCheckActive($CheckActive) {
		$this->_findOneBy['CheckActive'] =  $CheckActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCheckTinymce($CheckTinymce) {
		$this->_findOneBy['CheckTinymce'] =  $CheckTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCashActive($CashActive) {
		$this->_findOneBy['CashActive'] =  $CashActive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCashTinymce($CashTinymce) {
		$this->_findOneBy['CashTinymce'] =  $CashTinymce;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCurrency($Currency) {
		$this->_findOneBy['Currency'] =  $Currency;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasHost($SaasHost) {
		$this->_findOneBy['SaasHost'] =  $SaasHost;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasHostInt($SaasHostInt) {
		$this->_findOneBy['SaasHostInt'] =  $SaasHostInt;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasName($SaasName) {
		$this->_findOneBy['SaasName'] =  $SaasName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasUser($SaasUser) {
		$this->_findOneBy['SaasUser'] =  $SaasUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasPassword($SaasPassword) {
		$this->_findOneBy['SaasPassword'] =  $SaasPassword;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasArchive($SaasArchive) {
		$this->_findOneBy['SaasArchive'] =  $SaasArchive;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySaasPosition($SaasPosition) {
		$this->_findOneBy['SaasPosition'] =  $SaasPosition;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
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
		
	public function findByLikeStatut($Statut) {
		$this->_findByLike['Statut'] =  $Statut;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatutVersion($StatutVersion) {
		$this->_findByLike['StatutVersion'] =  $StatutVersion;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatutIp($StatutIp) {
		$this->_findByLike['StatutIp'] =  $StatutIp;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeVersionDoorgets($VersionDoorgets) {
		$this->_findByLike['VersionDoorgets'] =  $VersionDoorgets;
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
		
	public function findByLikeDescription($Description) {
		$this->_findByLike['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeKeywords($Keywords) {
		$this->_findByLike['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAddresses($Addresses) {
		$this->_findByLike['Addresses'] =  $Addresses;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePays($Pays) {
		$this->_findByLike['Pays'] =  $Pays;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeVille($Ville) {
		$this->_findByLike['Ville'] =  $Ville;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAdresse($Adresse) {
		$this->_findByLike['Adresse'] =  $Adresse;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCodepostal($Codepostal) {
		$this->_findByLike['Codepostal'] =  $Codepostal;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTelFix($TelFix) {
		$this->_findByLike['TelFix'] =  $TelFix;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTelMobil($TelMobil) {
		$this->_findByLike['TelMobil'] =  $TelMobil;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTelFax($TelFax) {
		$this->_findByLike['TelFax'] =  $TelFax;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeFacebook($Facebook) {
		$this->_findByLike['Facebook'] =  $Facebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTwitter($Twitter) {
		$this->_findByLike['Twitter'] =  $Twitter;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePinterest($Pinterest) {
		$this->_findByLike['Pinterest'] =  $Pinterest;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMyspace($Myspace) {
		$this->_findByLike['Myspace'] =  $Myspace;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLinkedin($Linkedin) {
		$this->_findByLike['Linkedin'] =  $Linkedin;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeYoutube($Youtube) {
		$this->_findByLike['Youtube'] =  $Youtube;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGoogle($Google) {
		$this->_findByLike['Google'] =  $Google;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAnalytics($Analytics) {
		$this->_findByLike['Analytics'] =  $Analytics;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangueFront($LangueFront) {
		$this->_findByLike['LangueFront'] =  $LangueFront;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangueGroupe($LangueGroupe) {
		$this->_findByLike['LangueGroupe'] =  $LangueGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeHoraire($Horaire) {
		$this->_findByLike['Horaire'] =  $Horaire;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMentions($Mentions) {
		$this->_findByLike['Mentions'] =  $Mentions;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCgu($Cgu) {
		$this->_findByLike['Cgu'] =  $Cgu;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMNewsletter($MNewsletter) {
		$this->_findByLike['MNewsletter'] =  $MNewsletter;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMComment($MComment) {
		$this->_findByLike['MComment'] =  $MComment;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMCommentFacebook($MCommentFacebook) {
		$this->_findByLike['MCommentFacebook'] =  $MCommentFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMCommentDisqus($MCommentDisqus) {
		$this->_findByLike['MCommentDisqus'] =  $MCommentDisqus;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMSharethis($MSharethis) {
		$this->_findByLike['MSharethis'] =  $MSharethis;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMSitemap($MSitemap) {
		$this->_findByLike['MSitemap'] =  $MSitemap;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMRss($MRss) {
		$this->_findByLike['MRss'] =  $MRss;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdFacebook($IdFacebook) {
		$this->_findByLike['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdDisqus($IdDisqus) {
		$this->_findByLike['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTheme($Theme) {
		$this->_findByLike['Theme'] =  $Theme;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeThemeBootstrap($ThemeBootstrap) {
		$this->_findByLike['ThemeBootstrap'] =  $ThemeBootstrap;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeModuleHomepage($ModuleHomepage) {
		$this->_findByLike['ModuleHomepage'] =  $ModuleHomepage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOauthGoogleId($OauthGoogleId) {
		$this->_findByLike['OauthGoogleId'] =  $OauthGoogleId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOauthGoogleSecret($OauthGoogleSecret) {
		$this->_findByLike['OauthGoogleSecret'] =  $OauthGoogleSecret;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOauthGoogleActive($OauthGoogleActive) {
		$this->_findByLike['OauthGoogleActive'] =  $OauthGoogleActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOauthFacebookId($OauthFacebookId) {
		$this->_findByLike['OauthFacebookId'] =  $OauthFacebookId;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOauthFacebookSecret($OauthFacebookSecret) {
		$this->_findByLike['OauthFacebookSecret'] =  $OauthFacebookSecret;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOauthFacebookActive($OauthFacebookActive) {
		$this->_findByLike['OauthFacebookActive'] =  $OauthFacebookActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSmtpMandrillSsl($SmtpMandrillSsl) {
		$this->_findByLike['SmtpMandrillSsl'] =  $SmtpMandrillSsl;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSmtpMandrillActive($SmtpMandrillActive) {
		$this->_findByLike['SmtpMandrillActive'] =  $SmtpMandrillActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSmtpMandrillHost($SmtpMandrillHost) {
		$this->_findByLike['SmtpMandrillHost'] =  $SmtpMandrillHost;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSmtpMandrillPort($SmtpMandrillPort) {
		$this->_findByLike['SmtpMandrillPort'] =  $SmtpMandrillPort;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSmtpMandrillUsername($SmtpMandrillUsername) {
		$this->_findByLike['SmtpMandrillUsername'] =  $SmtpMandrillUsername;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSmtpMandrillPassword($SmtpMandrillPassword) {
		$this->_findByLike['SmtpMandrillPassword'] =  $SmtpMandrillPassword;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStripeActive($StripeActive) {
		$this->_findByLike['StripeActive'] =  $StripeActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStripeSecretKey($StripeSecretKey) {
		$this->_findByLike['StripeSecretKey'] =  $StripeSecretKey;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStripePublishableKey($StripePublishableKey) {
		$this->_findByLike['StripePublishableKey'] =  $StripePublishableKey;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalDemo($PaypalDemo) {
		$this->_findByLike['PaypalDemo'] =  $PaypalDemo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalActive($PaypalActive) {
		$this->_findByLike['PaypalActive'] =  $PaypalActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalUser($PaypalUser) {
		$this->_findByLike['PaypalUser'] =  $PaypalUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalPassword($PaypalPassword) {
		$this->_findByLike['PaypalPassword'] =  $PaypalPassword;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalSignature($PaypalSignature) {
		$this->_findByLike['PaypalSignature'] =  $PaypalSignature;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalReturnurl($PaypalReturnurl) {
		$this->_findByLike['PaypalReturnurl'] =  $PaypalReturnurl;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePaypalCancelurl($PaypalCancelurl) {
		$this->_findByLike['PaypalCancelurl'] =  $PaypalCancelurl;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTransferActive($TransferActive) {
		$this->_findByLike['TransferActive'] =  $TransferActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTransferTinymce($TransferTinymce) {
		$this->_findByLike['TransferTinymce'] =  $TransferTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCheckActive($CheckActive) {
		$this->_findByLike['CheckActive'] =  $CheckActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCheckTinymce($CheckTinymce) {
		$this->_findByLike['CheckTinymce'] =  $CheckTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCashActive($CashActive) {
		$this->_findByLike['CashActive'] =  $CashActive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCashTinymce($CashTinymce) {
		$this->_findByLike['CashTinymce'] =  $CashTinymce;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCurrency($Currency) {
		$this->_findByLike['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasHost($SaasHost) {
		$this->_findByLike['SaasHost'] =  $SaasHost;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasHostInt($SaasHostInt) {
		$this->_findByLike['SaasHostInt'] =  $SaasHostInt;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasName($SaasName) {
		$this->_findByLike['SaasName'] =  $SaasName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasUser($SaasUser) {
		$this->_findByLike['SaasUser'] =  $SaasUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasPassword($SaasPassword) {
		$this->_findByLike['SaasPassword'] =  $SaasPassword;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasArchive($SaasArchive) {
		$this->_findByLike['SaasArchive'] =  $SaasArchive;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSaasPosition($SaasPosition) {
		$this->_findByLike['SaasPosition'] =  $SaasPosition;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
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
		
	public function filterByStatut($Statut, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Statut',$Statut,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByStatut($from,$to) {
		$this->_filterRangeBy['Statut'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByStatut($int) {
		$this->_filterGreaterThanBy['Statut'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByStatut($int) {
		$this->_filterLessThanBy['Statut'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByStatutVersion($StatutVersion, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StatutVersion',$StatutVersion,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByStatutVersion($from,$to) {
		$this->_filterRangeBy['StatutVersion'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByStatutVersion($int) {
		$this->_filterGreaterThanBy['StatutVersion'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByStatutVersion($int) {
		$this->_filterLessThanBy['StatutVersion'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByStatutIp($StatutIp, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StatutIp',$StatutIp,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByVersionDoorgets($VersionDoorgets, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('VersionDoorgets',$VersionDoorgets,$_condition);

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
		
	public function filterByDescription($Description, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Description',$Description,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByKeywords($Keywords, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Keywords',$Keywords,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAddresses($Addresses, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Addresses',$Addresses,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPays($Pays, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Pays',$Pays,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByVille($Ville, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Ville',$Ville,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAdresse($Adresse, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Adresse',$Adresse,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCodepostal($Codepostal, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Codepostal',$Codepostal,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTelFix($TelFix, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TelFix',$TelFix,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTelMobil($TelMobil, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TelMobil',$TelMobil,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTelFax($TelFax, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TelFax',$TelFax,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByFacebook($Facebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Facebook',$Facebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTwitter($Twitter, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Twitter',$Twitter,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPinterest($Pinterest, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Pinterest',$Pinterest,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMyspace($Myspace, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Myspace',$Myspace,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLinkedin($Linkedin, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Linkedin',$Linkedin,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByYoutube($Youtube, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Youtube',$Youtube,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGoogle($Google, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Google',$Google,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAnalytics($Analytics, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Analytics',$Analytics,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangueFront($LangueFront, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('LangueFront',$LangueFront,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLangueGroupe($LangueGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('LangueGroupe',$LangueGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByHoraire($Horaire, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Horaire',$Horaire,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMentions($Mentions, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Mentions',$Mentions,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMentions($from,$to) {
		$this->_filterRangeBy['Mentions'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMentions($int) {
		$this->_filterGreaterThanBy['Mentions'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMentions($int) {
		$this->_filterLessThanBy['Mentions'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCgu($Cgu, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Cgu',$Cgu,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByCgu($from,$to) {
		$this->_filterRangeBy['Cgu'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByCgu($int) {
		$this->_filterGreaterThanBy['Cgu'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByCgu($int) {
		$this->_filterLessThanBy['Cgu'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMNewsletter($MNewsletter, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MNewsletter',$MNewsletter,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMNewsletter($from,$to) {
		$this->_filterRangeBy['MNewsletter'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMNewsletter($int) {
		$this->_filterGreaterThanBy['MNewsletter'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMNewsletter($int) {
		$this->_filterLessThanBy['MNewsletter'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMComment($MComment, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MComment',$MComment,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMComment($from,$to) {
		$this->_filterRangeBy['MComment'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMComment($int) {
		$this->_filterGreaterThanBy['MComment'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMComment($int) {
		$this->_filterLessThanBy['MComment'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMCommentFacebook($MCommentFacebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MCommentFacebook',$MCommentFacebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMCommentFacebook($from,$to) {
		$this->_filterRangeBy['MCommentFacebook'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMCommentFacebook($int) {
		$this->_filterGreaterThanBy['MCommentFacebook'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMCommentFacebook($int) {
		$this->_filterLessThanBy['MCommentFacebook'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMCommentDisqus($MCommentDisqus, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MCommentDisqus',$MCommentDisqus,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMCommentDisqus($from,$to) {
		$this->_filterRangeBy['MCommentDisqus'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMCommentDisqus($int) {
		$this->_filterGreaterThanBy['MCommentDisqus'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMCommentDisqus($int) {
		$this->_filterLessThanBy['MCommentDisqus'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMSharethis($MSharethis, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MSharethis',$MSharethis,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMSharethis($from,$to) {
		$this->_filterRangeBy['MSharethis'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMSharethis($int) {
		$this->_filterGreaterThanBy['MSharethis'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMSharethis($int) {
		$this->_filterLessThanBy['MSharethis'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMSitemap($MSitemap, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MSitemap',$MSitemap,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMSitemap($from,$to) {
		$this->_filterRangeBy['MSitemap'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMSitemap($int) {
		$this->_filterGreaterThanBy['MSitemap'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMSitemap($int) {
		$this->_filterLessThanBy['MSitemap'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByMRss($MRss, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MRss',$MRss,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMRss($from,$to) {
		$this->_filterRangeBy['MRss'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMRss($int) {
		$this->_filterGreaterThanBy['MRss'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMRss($int) {
		$this->_filterLessThanBy['MRss'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdFacebook($IdFacebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdFacebook',$IdFacebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdDisqus($IdDisqus, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdDisqus',$IdDisqus,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTheme($Theme, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Theme',$Theme,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByThemeBootstrap($ThemeBootstrap, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ThemeBootstrap',$ThemeBootstrap,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByModuleHomepage($ModuleHomepage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ModuleHomepage',$ModuleHomepage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOauthGoogleId($OauthGoogleId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OauthGoogleId',$OauthGoogleId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOauthGoogleSecret($OauthGoogleSecret, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OauthGoogleSecret',$OauthGoogleSecret,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOauthGoogleActive($OauthGoogleActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OauthGoogleActive',$OauthGoogleActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByOauthGoogleActive($from,$to) {
		$this->_filterRangeBy['OauthGoogleActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByOauthGoogleActive($int) {
		$this->_filterGreaterThanBy['OauthGoogleActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByOauthGoogleActive($int) {
		$this->_filterLessThanBy['OauthGoogleActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByOauthFacebookId($OauthFacebookId, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OauthFacebookId',$OauthFacebookId,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOauthFacebookSecret($OauthFacebookSecret, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OauthFacebookSecret',$OauthFacebookSecret,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByOauthFacebookActive($OauthFacebookActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('OauthFacebookActive',$OauthFacebookActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByOauthFacebookActive($from,$to) {
		$this->_filterRangeBy['OauthFacebookActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByOauthFacebookActive($int) {
		$this->_filterGreaterThanBy['OauthFacebookActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByOauthFacebookActive($int) {
		$this->_filterLessThanBy['OauthFacebookActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterBySmtpMandrillSsl($SmtpMandrillSsl, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SmtpMandrillSsl',$SmtpMandrillSsl,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySmtpMandrillActive($SmtpMandrillActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SmtpMandrillActive',$SmtpMandrillActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeBySmtpMandrillActive($from,$to) {
		$this->_filterRangeBy['SmtpMandrillActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanBySmtpMandrillActive($int) {
		$this->_filterGreaterThanBy['SmtpMandrillActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanBySmtpMandrillActive($int) {
		$this->_filterLessThanBy['SmtpMandrillActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterBySmtpMandrillHost($SmtpMandrillHost, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SmtpMandrillHost',$SmtpMandrillHost,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySmtpMandrillPort($SmtpMandrillPort, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SmtpMandrillPort',$SmtpMandrillPort,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySmtpMandrillUsername($SmtpMandrillUsername, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SmtpMandrillUsername',$SmtpMandrillUsername,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySmtpMandrillPassword($SmtpMandrillPassword, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SmtpMandrillPassword',$SmtpMandrillPassword,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStripeActive($StripeActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StripeActive',$StripeActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByStripeActive($from,$to) {
		$this->_filterRangeBy['StripeActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByStripeActive($int) {
		$this->_filterGreaterThanBy['StripeActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByStripeActive($int) {
		$this->_filterLessThanBy['StripeActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByStripeSecretKey($StripeSecretKey, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StripeSecretKey',$StripeSecretKey,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStripePublishableKey($StripePublishableKey, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StripePublishableKey',$StripePublishableKey,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalDemo($PaypalDemo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalDemo',$PaypalDemo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPaypalDemo($from,$to) {
		$this->_filterRangeBy['PaypalDemo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPaypalDemo($int) {
		$this->_filterGreaterThanBy['PaypalDemo'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPaypalDemo($int) {
		$this->_filterLessThanBy['PaypalDemo'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalActive($PaypalActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalActive',$PaypalActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPaypalActive($from,$to) {
		$this->_filterRangeBy['PaypalActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPaypalActive($int) {
		$this->_filterGreaterThanBy['PaypalActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPaypalActive($int) {
		$this->_filterLessThanBy['PaypalActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalUser($PaypalUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalUser',$PaypalUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalPassword($PaypalPassword, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalPassword',$PaypalPassword,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalSignature($PaypalSignature, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalSignature',$PaypalSignature,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalReturnurl($PaypalReturnurl, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalReturnurl',$PaypalReturnurl,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPaypalCancelurl($PaypalCancelurl, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('PaypalCancelurl',$PaypalCancelurl,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTransferActive($TransferActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TransferActive',$TransferActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByTransferActive($from,$to) {
		$this->_filterRangeBy['TransferActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByTransferActive($int) {
		$this->_filterGreaterThanBy['TransferActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByTransferActive($int) {
		$this->_filterLessThanBy['TransferActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByTransferTinymce($TransferTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TransferTinymce',$TransferTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCheckActive($CheckActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CheckActive',$CheckActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByCheckActive($from,$to) {
		$this->_filterRangeBy['CheckActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByCheckActive($int) {
		$this->_filterGreaterThanBy['CheckActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByCheckActive($int) {
		$this->_filterLessThanBy['CheckActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCheckTinymce($CheckTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CheckTinymce',$CheckTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCashActive($CashActive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CashActive',$CashActive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByCashActive($from,$to) {
		$this->_filterRangeBy['CashActive'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByCashActive($int) {
		$this->_filterGreaterThanBy['CashActive'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByCashActive($int) {
		$this->_filterLessThanBy['CashActive'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCashTinymce($CashTinymce, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('CashTinymce',$CashTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCurrency($Currency, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Currency',$Currency,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasHost($SaasHost, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasHost',$SaasHost,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasHostInt($SaasHostInt, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasHostInt',$SaasHostInt,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasName($SaasName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasName',$SaasName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasUser($SaasUser, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasUser',$SaasUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasPassword($SaasPassword, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasPassword',$SaasPassword,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasArchive($SaasArchive, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasArchive',$SaasArchive,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySaasPosition($SaasPosition, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SaasPosition',$SaasPosition,$_condition);

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
		
	public function filterLikeByStatut($Statut) {
		$this->_filterLikeBy['Statut'] =  $Statut;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatutVersion($StatutVersion) {
		$this->_filterLikeBy['StatutVersion'] =  $StatutVersion;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatutIp($StatutIp) {
		$this->_filterLikeBy['StatutIp'] =  $StatutIp;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByVersionDoorgets($VersionDoorgets) {
		$this->_filterLikeBy['VersionDoorgets'] =  $VersionDoorgets;
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
		
	public function filterLikeByDescription($Description) {
		$this->_filterLikeBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByKeywords($Keywords) {
		$this->_filterLikeBy['Keywords'] =  $Keywords;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAddresses($Addresses) {
		$this->_filterLikeBy['Addresses'] =  $Addresses;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPays($Pays) {
		$this->_filterLikeBy['Pays'] =  $Pays;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByVille($Ville) {
		$this->_filterLikeBy['Ville'] =  $Ville;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAdresse($Adresse) {
		$this->_filterLikeBy['Adresse'] =  $Adresse;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCodepostal($Codepostal) {
		$this->_filterLikeBy['Codepostal'] =  $Codepostal;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTelFix($TelFix) {
		$this->_filterLikeBy['TelFix'] =  $TelFix;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTelMobil($TelMobil) {
		$this->_filterLikeBy['TelMobil'] =  $TelMobil;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTelFax($TelFax) {
		$this->_filterLikeBy['TelFax'] =  $TelFax;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByFacebook($Facebook) {
		$this->_filterLikeBy['Facebook'] =  $Facebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTwitter($Twitter) {
		$this->_filterLikeBy['Twitter'] =  $Twitter;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPinterest($Pinterest) {
		$this->_filterLikeBy['Pinterest'] =  $Pinterest;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMyspace($Myspace) {
		$this->_filterLikeBy['Myspace'] =  $Myspace;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLinkedin($Linkedin) {
		$this->_filterLikeBy['Linkedin'] =  $Linkedin;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByYoutube($Youtube) {
		$this->_filterLikeBy['Youtube'] =  $Youtube;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGoogle($Google) {
		$this->_filterLikeBy['Google'] =  $Google;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAnalytics($Analytics) {
		$this->_filterLikeBy['Analytics'] =  $Analytics;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangueFront($LangueFront) {
		$this->_filterLikeBy['LangueFront'] =  $LangueFront;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangueGroupe($LangueGroupe) {
		$this->_filterLikeBy['LangueGroupe'] =  $LangueGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByHoraire($Horaire) {
		$this->_filterLikeBy['Horaire'] =  $Horaire;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMentions($Mentions) {
		$this->_filterLikeBy['Mentions'] =  $Mentions;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCgu($Cgu) {
		$this->_filterLikeBy['Cgu'] =  $Cgu;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMNewsletter($MNewsletter) {
		$this->_filterLikeBy['MNewsletter'] =  $MNewsletter;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMComment($MComment) {
		$this->_filterLikeBy['MComment'] =  $MComment;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMCommentFacebook($MCommentFacebook) {
		$this->_filterLikeBy['MCommentFacebook'] =  $MCommentFacebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMCommentDisqus($MCommentDisqus) {
		$this->_filterLikeBy['MCommentDisqus'] =  $MCommentDisqus;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMSharethis($MSharethis) {
		$this->_filterLikeBy['MSharethis'] =  $MSharethis;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMSitemap($MSitemap) {
		$this->_filterLikeBy['MSitemap'] =  $MSitemap;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMRss($MRss) {
		$this->_filterLikeBy['MRss'] =  $MRss;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdFacebook($IdFacebook) {
		$this->_filterLikeBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdDisqus($IdDisqus) {
		$this->_filterLikeBy['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTheme($Theme) {
		$this->_filterLikeBy['Theme'] =  $Theme;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByThemeBootstrap($ThemeBootstrap) {
		$this->_filterLikeBy['ThemeBootstrap'] =  $ThemeBootstrap;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByModuleHomepage($ModuleHomepage) {
		$this->_filterLikeBy['ModuleHomepage'] =  $ModuleHomepage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOauthGoogleId($OauthGoogleId) {
		$this->_filterLikeBy['OauthGoogleId'] =  $OauthGoogleId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOauthGoogleSecret($OauthGoogleSecret) {
		$this->_filterLikeBy['OauthGoogleSecret'] =  $OauthGoogleSecret;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOauthGoogleActive($OauthGoogleActive) {
		$this->_filterLikeBy['OauthGoogleActive'] =  $OauthGoogleActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOauthFacebookId($OauthFacebookId) {
		$this->_filterLikeBy['OauthFacebookId'] =  $OauthFacebookId;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOauthFacebookSecret($OauthFacebookSecret) {
		$this->_filterLikeBy['OauthFacebookSecret'] =  $OauthFacebookSecret;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOauthFacebookActive($OauthFacebookActive) {
		$this->_filterLikeBy['OauthFacebookActive'] =  $OauthFacebookActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySmtpMandrillSsl($SmtpMandrillSsl) {
		$this->_filterLikeBy['SmtpMandrillSsl'] =  $SmtpMandrillSsl;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySmtpMandrillActive($SmtpMandrillActive) {
		$this->_filterLikeBy['SmtpMandrillActive'] =  $SmtpMandrillActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySmtpMandrillHost($SmtpMandrillHost) {
		$this->_filterLikeBy['SmtpMandrillHost'] =  $SmtpMandrillHost;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySmtpMandrillPort($SmtpMandrillPort) {
		$this->_filterLikeBy['SmtpMandrillPort'] =  $SmtpMandrillPort;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySmtpMandrillUsername($SmtpMandrillUsername) {
		$this->_filterLikeBy['SmtpMandrillUsername'] =  $SmtpMandrillUsername;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySmtpMandrillPassword($SmtpMandrillPassword) {
		$this->_filterLikeBy['SmtpMandrillPassword'] =  $SmtpMandrillPassword;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStripeActive($StripeActive) {
		$this->_filterLikeBy['StripeActive'] =  $StripeActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStripeSecretKey($StripeSecretKey) {
		$this->_filterLikeBy['StripeSecretKey'] =  $StripeSecretKey;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStripePublishableKey($StripePublishableKey) {
		$this->_filterLikeBy['StripePublishableKey'] =  $StripePublishableKey;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalDemo($PaypalDemo) {
		$this->_filterLikeBy['PaypalDemo'] =  $PaypalDemo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalActive($PaypalActive) {
		$this->_filterLikeBy['PaypalActive'] =  $PaypalActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalUser($PaypalUser) {
		$this->_filterLikeBy['PaypalUser'] =  $PaypalUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalPassword($PaypalPassword) {
		$this->_filterLikeBy['PaypalPassword'] =  $PaypalPassword;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalSignature($PaypalSignature) {
		$this->_filterLikeBy['PaypalSignature'] =  $PaypalSignature;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalReturnurl($PaypalReturnurl) {
		$this->_filterLikeBy['PaypalReturnurl'] =  $PaypalReturnurl;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPaypalCancelurl($PaypalCancelurl) {
		$this->_filterLikeBy['PaypalCancelurl'] =  $PaypalCancelurl;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTransferActive($TransferActive) {
		$this->_filterLikeBy['TransferActive'] =  $TransferActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTransferTinymce($TransferTinymce) {
		$this->_filterLikeBy['TransferTinymce'] =  $TransferTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCheckActive($CheckActive) {
		$this->_filterLikeBy['CheckActive'] =  $CheckActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCheckTinymce($CheckTinymce) {
		$this->_filterLikeBy['CheckTinymce'] =  $CheckTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCashActive($CashActive) {
		$this->_filterLikeBy['CashActive'] =  $CashActive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCashTinymce($CashTinymce) {
		$this->_filterLikeBy['CashTinymce'] =  $CashTinymce;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCurrency($Currency) {
		$this->_filterLikeBy['Currency'] =  $Currency;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasHost($SaasHost) {
		$this->_filterLikeBy['SaasHost'] =  $SaasHost;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasHostInt($SaasHostInt) {
		$this->_filterLikeBy['SaasHostInt'] =  $SaasHostInt;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasName($SaasName) {
		$this->_filterLikeBy['SaasName'] =  $SaasName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasUser($SaasUser) {
		$this->_filterLikeBy['SaasUser'] =  $SaasUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasPassword($SaasPassword) {
		$this->_filterLikeBy['SaasPassword'] =  $SaasPassword;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasArchive($SaasArchive) {
		$this->_filterLikeBy['SaasArchive'] =  $SaasArchive;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySaasPosition($SaasPosition) {
		$this->_filterLikeBy['SaasPosition'] =  $SaasPosition;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
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
		
	public function orderByStatut($direction = 'ASC') {
		$this->loadDirection('statut',$direction);
		return $this;
	} 
		
	public function orderByStatutVersion($direction = 'ASC') {
		$this->loadDirection('statut_version',$direction);
		return $this;
	} 
		
	public function orderByStatutIp($direction = 'ASC') {
		$this->loadDirection('statut_ip',$direction);
		return $this;
	} 
		
	public function orderByVersionDoorgets($direction = 'ASC') {
		$this->loadDirection('version_doorgets',$direction);
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
		
	public function orderByCopyright($direction = 'ASC') {
		$this->loadDirection('copyright',$direction);
		return $this;
	} 
		
	public function orderByYear($direction = 'ASC') {
		$this->loadDirection('year',$direction);
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC') {
		$this->loadDirection('description',$direction);
		return $this;
	} 
		
	public function orderByKeywords($direction = 'ASC') {
		$this->loadDirection('keywords',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByAddresses($direction = 'ASC') {
		$this->loadDirection('addresses',$direction);
		return $this;
	} 
		
	public function orderByPays($direction = 'ASC') {
		$this->loadDirection('pays',$direction);
		return $this;
	} 
		
	public function orderByVille($direction = 'ASC') {
		$this->loadDirection('ville',$direction);
		return $this;
	} 
		
	public function orderByAdresse($direction = 'ASC') {
		$this->loadDirection('adresse',$direction);
		return $this;
	} 
		
	public function orderByCodepostal($direction = 'ASC') {
		$this->loadDirection('codepostal',$direction);
		return $this;
	} 
		
	public function orderByTelFix($direction = 'ASC') {
		$this->loadDirection('tel_fix',$direction);
		return $this;
	} 
		
	public function orderByTelMobil($direction = 'ASC') {
		$this->loadDirection('tel_mobil',$direction);
		return $this;
	} 
		
	public function orderByTelFax($direction = 'ASC') {
		$this->loadDirection('tel_fax',$direction);
		return $this;
	} 
		
	public function orderByFacebook($direction = 'ASC') {
		$this->loadDirection('facebook',$direction);
		return $this;
	} 
		
	public function orderByTwitter($direction = 'ASC') {
		$this->loadDirection('twitter',$direction);
		return $this;
	} 
		
	public function orderByPinterest($direction = 'ASC') {
		$this->loadDirection('pinterest',$direction);
		return $this;
	} 
		
	public function orderByMyspace($direction = 'ASC') {
		$this->loadDirection('myspace',$direction);
		return $this;
	} 
		
	public function orderByLinkedin($direction = 'ASC') {
		$this->loadDirection('linkedin',$direction);
		return $this;
	} 
		
	public function orderByYoutube($direction = 'ASC') {
		$this->loadDirection('youtube',$direction);
		return $this;
	} 
		
	public function orderByGoogle($direction = 'ASC') {
		$this->loadDirection('google',$direction);
		return $this;
	} 
		
	public function orderByAnalytics($direction = 'ASC') {
		$this->loadDirection('analytics',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByLangueFront($direction = 'ASC') {
		$this->loadDirection('langue_front',$direction);
		return $this;
	} 
		
	public function orderByLangueGroupe($direction = 'ASC') {
		$this->loadDirection('langue_groupe',$direction);
		return $this;
	} 
		
	public function orderByHoraire($direction = 'ASC') {
		$this->loadDirection('horaire',$direction);
		return $this;
	} 
		
	public function orderByMentions($direction = 'ASC') {
		$this->loadDirection('mentions',$direction);
		return $this;
	} 
		
	public function orderByCgu($direction = 'ASC') {
		$this->loadDirection('cgu',$direction);
		return $this;
	} 
		
	public function orderByMNewsletter($direction = 'ASC') {
		$this->loadDirection('m_newsletter',$direction);
		return $this;
	} 
		
	public function orderByMComment($direction = 'ASC') {
		$this->loadDirection('m_comment',$direction);
		return $this;
	} 
		
	public function orderByMCommentFacebook($direction = 'ASC') {
		$this->loadDirection('m_comment_facebook',$direction);
		return $this;
	} 
		
	public function orderByMCommentDisqus($direction = 'ASC') {
		$this->loadDirection('m_comment_disqus',$direction);
		return $this;
	} 
		
	public function orderByMSharethis($direction = 'ASC') {
		$this->loadDirection('m_sharethis',$direction);
		return $this;
	} 
		
	public function orderByMSitemap($direction = 'ASC') {
		$this->loadDirection('m_sitemap',$direction);
		return $this;
	} 
		
	public function orderByMRss($direction = 'ASC') {
		$this->loadDirection('m_rss',$direction);
		return $this;
	} 
		
	public function orderByIdFacebook($direction = 'ASC') {
		$this->loadDirection('id_facebook',$direction);
		return $this;
	} 
		
	public function orderByIdDisqus($direction = 'ASC') {
		$this->loadDirection('id_disqus',$direction);
		return $this;
	} 
		
	public function orderByTheme($direction = 'ASC') {
		$this->loadDirection('theme',$direction);
		return $this;
	} 
		
	public function orderByThemeBootstrap($direction = 'ASC') {
		$this->loadDirection('theme_bootstrap',$direction);
		return $this;
	} 
		
	public function orderByModuleHomepage($direction = 'ASC') {
		$this->loadDirection('module_homepage',$direction);
		return $this;
	} 
		
	public function orderByOauthGoogleId($direction = 'ASC') {
		$this->loadDirection('oauth_google_id',$direction);
		return $this;
	} 
		
	public function orderByOauthGoogleSecret($direction = 'ASC') {
		$this->loadDirection('oauth_google_secret',$direction);
		return $this;
	} 
		
	public function orderByOauthGoogleActive($direction = 'ASC') {
		$this->loadDirection('oauth_google_active',$direction);
		return $this;
	} 
		
	public function orderByOauthFacebookId($direction = 'ASC') {
		$this->loadDirection('oauth_facebook_id',$direction);
		return $this;
	} 
		
	public function orderByOauthFacebookSecret($direction = 'ASC') {
		$this->loadDirection('oauth_facebook_secret',$direction);
		return $this;
	} 
		
	public function orderByOauthFacebookActive($direction = 'ASC') {
		$this->loadDirection('oauth_facebook_active',$direction);
		return $this;
	} 
		
	public function orderBySmtpMandrillSsl($direction = 'ASC') {
		$this->loadDirection('smtp_mandrill_ssl',$direction);
		return $this;
	} 
		
	public function orderBySmtpMandrillActive($direction = 'ASC') {
		$this->loadDirection('smtp_mandrill_active',$direction);
		return $this;
	} 
		
	public function orderBySmtpMandrillHost($direction = 'ASC') {
		$this->loadDirection('smtp_mandrill_host',$direction);
		return $this;
	} 
		
	public function orderBySmtpMandrillPort($direction = 'ASC') {
		$this->loadDirection('smtp_mandrill_port',$direction);
		return $this;
	} 
		
	public function orderBySmtpMandrillUsername($direction = 'ASC') {
		$this->loadDirection('smtp_mandrill_username',$direction);
		return $this;
	} 
		
	public function orderBySmtpMandrillPassword($direction = 'ASC') {
		$this->loadDirection('smtp_mandrill_password',$direction);
		return $this;
	} 
		
	public function orderByStripeActive($direction = 'ASC') {
		$this->loadDirection('stripe_active',$direction);
		return $this;
	} 
		
	public function orderByStripeSecretKey($direction = 'ASC') {
		$this->loadDirection('stripe_secret_key',$direction);
		return $this;
	} 
		
	public function orderByStripePublishableKey($direction = 'ASC') {
		$this->loadDirection('stripe_publishable_key',$direction);
		return $this;
	} 
		
	public function orderByPaypalDemo($direction = 'ASC') {
		$this->loadDirection('paypal_demo',$direction);
		return $this;
	} 
		
	public function orderByPaypalActive($direction = 'ASC') {
		$this->loadDirection('paypal_active',$direction);
		return $this;
	} 
		
	public function orderByPaypalUser($direction = 'ASC') {
		$this->loadDirection('paypal_user',$direction);
		return $this;
	} 
		
	public function orderByPaypalPassword($direction = 'ASC') {
		$this->loadDirection('paypal_password',$direction);
		return $this;
	} 
		
	public function orderByPaypalSignature($direction = 'ASC') {
		$this->loadDirection('paypal_signature',$direction);
		return $this;
	} 
		
	public function orderByPaypalReturnurl($direction = 'ASC') {
		$this->loadDirection('paypal_returnurl',$direction);
		return $this;
	} 
		
	public function orderByPaypalCancelurl($direction = 'ASC') {
		$this->loadDirection('paypal_cancelurl',$direction);
		return $this;
	} 
		
	public function orderByTransferActive($direction = 'ASC') {
		$this->loadDirection('transfer_active',$direction);
		return $this;
	} 
		
	public function orderByTransferTinymce($direction = 'ASC') {
		$this->loadDirection('transfer_tinymce',$direction);
		return $this;
	} 
		
	public function orderByCheckActive($direction = 'ASC') {
		$this->loadDirection('check_active',$direction);
		return $this;
	} 
		
	public function orderByCheckTinymce($direction = 'ASC') {
		$this->loadDirection('check_tinymce',$direction);
		return $this;
	} 
		
	public function orderByCashActive($direction = 'ASC') {
		$this->loadDirection('cash_active',$direction);
		return $this;
	} 
		
	public function orderByCashTinymce($direction = 'ASC') {
		$this->loadDirection('cash_tinymce',$direction);
		return $this;
	} 
		
	public function orderByCurrency($direction = 'ASC') {
		$this->loadDirection('currency',$direction);
		return $this;
	} 
		
	public function orderBySaasHost($direction = 'ASC') {
		$this->loadDirection('saas_host',$direction);
		return $this;
	} 
		
	public function orderBySaasHostInt($direction = 'ASC') {
		$this->loadDirection('saas_host_int',$direction);
		return $this;
	} 
		
	public function orderBySaasName($direction = 'ASC') {
		$this->loadDirection('saas_name',$direction);
		return $this;
	} 
		
	public function orderBySaasUser($direction = 'ASC') {
		$this->loadDirection('saas_user',$direction);
		return $this;
	} 
		
	public function orderBySaasPassword($direction = 'ASC') {
		$this->loadDirection('saas_password',$direction);
		return $this;
	} 
		
	public function orderBySaasArchive($direction = 'ASC') {
		$this->loadDirection('saas_archive',$direction);
		return $this;
	} 
		
	public function orderBySaasPosition($direction = 'ASC') {
		$this->loadDirection('saas_position',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
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
		    'Statut' =>  'statut',            
		    'StatutVersion' =>  'statut_version',            
		    'StatutIp' =>  'statut_ip',            
		    'VersionDoorgets' =>  'version_doorgets',            
		    'Title' =>  'title',            
		    'Slogan' =>  'slogan',            
		    'Copyright' =>  'copyright',            
		    'Year' =>  'year',            
		    'Description' =>  'description',            
		    'Keywords' =>  'keywords',            
		    'Email' =>  'email',            
		    'Addresses' =>  'addresses',            
		    'Pays' =>  'pays',            
		    'Ville' =>  'ville',            
		    'Adresse' =>  'adresse',            
		    'Codepostal' =>  'codepostal',            
		    'TelFix' =>  'tel_fix',            
		    'TelMobil' =>  'tel_mobil',            
		    'TelFax' =>  'tel_fax',            
		    'Facebook' =>  'facebook',            
		    'Twitter' =>  'twitter',            
		    'Pinterest' =>  'pinterest',            
		    'Myspace' =>  'myspace',            
		    'Linkedin' =>  'linkedin',            
		    'Youtube' =>  'youtube',            
		    'Google' =>  'google',            
		    'Analytics' =>  'analytics',            
		    'Langue' =>  'langue',            
		    'LangueFront' =>  'langue_front',            
		    'LangueGroupe' =>  'langue_groupe',            
		    'Horaire' =>  'horaire',            
		    'Mentions' =>  'mentions',            
		    'Cgu' =>  'cgu',            
		    'MNewsletter' =>  'm_newsletter',            
		    'MComment' =>  'm_comment',            
		    'MCommentFacebook' =>  'm_comment_facebook',            
		    'MCommentDisqus' =>  'm_comment_disqus',            
		    'MSharethis' =>  'm_sharethis',            
		    'MSitemap' =>  'm_sitemap',            
		    'MRss' =>  'm_rss',            
		    'IdFacebook' =>  'id_facebook',            
		    'IdDisqus' =>  'id_disqus',            
		    'Theme' =>  'theme',            
		    'ThemeBootstrap' =>  'theme_bootstrap',            
		    'ModuleHomepage' =>  'module_homepage',            
		    'OauthGoogleId' =>  'oauth_google_id',            
		    'OauthGoogleSecret' =>  'oauth_google_secret',            
		    'OauthGoogleActive' =>  'oauth_google_active',            
		    'OauthFacebookId' =>  'oauth_facebook_id',            
		    'OauthFacebookSecret' =>  'oauth_facebook_secret',            
		    'OauthFacebookActive' =>  'oauth_facebook_active',            
		    'SmtpMandrillSsl' =>  'smtp_mandrill_ssl',            
		    'SmtpMandrillActive' =>  'smtp_mandrill_active',            
		    'SmtpMandrillHost' =>  'smtp_mandrill_host',            
		    'SmtpMandrillPort' =>  'smtp_mandrill_port',            
		    'SmtpMandrillUsername' =>  'smtp_mandrill_username',            
		    'SmtpMandrillPassword' =>  'smtp_mandrill_password',            
		    'StripeActive' =>  'stripe_active',            
		    'StripeSecretKey' =>  'stripe_secret_key',            
		    'StripePublishableKey' =>  'stripe_publishable_key',            
		    'PaypalDemo' =>  'paypal_demo',            
		    'PaypalActive' =>  'paypal_active',            
		    'PaypalUser' =>  'paypal_user',            
		    'PaypalPassword' =>  'paypal_password',            
		    'PaypalSignature' =>  'paypal_signature',            
		    'PaypalReturnurl' =>  'paypal_returnurl',            
		    'PaypalCancelurl' =>  'paypal_cancelurl',            
		    'TransferActive' =>  'transfer_active',            
		    'TransferTinymce' =>  'transfer_tinymce',            
		    'CheckActive' =>  'check_active',            
		    'CheckTinymce' =>  'check_tinymce',            
		    'CashActive' =>  'cash_active',            
		    'CashTinymce' =>  'cash_tinymce',            
		    'Currency' =>  'currency',            
		    'SaasHost' =>  'saas_host',            
		    'SaasHostInt' =>  'saas_host_int',            
		    'SaasName' =>  'saas_name',            
		    'SaasUser' =>  'saas_user',            
		    'SaasPassword' =>  'saas_password',            
		    'SaasArchive' =>  'saas_archive',            
		    'SaasPosition' =>  'saas_position',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}