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

class UsersInfoQuery extends AbstractQuery 
{

	protected $_table = '_users_info';
    
    protected $_className = 'UsersInfo';

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
		
	public function findByProfileType($ProfileType) {
		$this->_findBy['ProfileType'] =  $ProfileType;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByProfileType($from,$to) {
		$this->_findRangeBy['ProfileType'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByProfileType($int) {
		$this->_findGreaterThanBy['ProfileType'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByProfileType($int) {
		$this->_findLessThanBy['ProfileType'] = $int;
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
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByNetwork($Network) {
		$this->_findBy['Network'] =  $Network;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByNetwork($from,$to) {
		$this->_findRangeBy['Network'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByNetwork($int) {
		$this->_findGreaterThanBy['Network'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByNetwork($int) {
		$this->_findLessThanBy['Network'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByCompany($Company) {
		$this->_findBy['Company'] =  $Company;
		$this->_load();
		return $this;
	} 
		
	public function findByEmail($Email) {
		$this->_findBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByPseudo($Pseudo) {
		$this->_findBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByLastName($LastName) {
		$this->_findBy['LastName'] =  $LastName;
		$this->_load();
		return $this;
	} 
		
	public function findByFirstName($FirstName) {
		$this->_findBy['FirstName'] =  $FirstName;
		$this->_load();
		return $this;
	} 
		
	public function findByCountry($Country) {
		$this->_findBy['Country'] =  $Country;
		$this->_load();
		return $this;
	} 
		
	public function findByRegion($Region) {
		$this->_findBy['Region'] =  $Region;
		$this->_load();
		return $this;
	} 
		
	public function findByCity($City) {
		$this->_findBy['City'] =  $City;
		$this->_load();
		return $this;
	} 
		
	public function findByZipcode($Zipcode) {
		$this->_findBy['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByAdresse($Adresse) {
		$this->_findBy['Adresse'] =  $Adresse;
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
		
	public function findByIdFacebook($IdFacebook) {
		$this->_findBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByIdTwitter($IdTwitter) {
		$this->_findBy['IdTwitter'] =  $IdTwitter;
		$this->_load();
		return $this;
	} 
		
	public function findByIdGoogle($IdGoogle) {
		$this->_findBy['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this;
	} 
		
	public function findByIdLinkedin($IdLinkedin) {
		$this->_findBy['IdLinkedin'] =  $IdLinkedin;
		$this->_load();
		return $this;
	} 
		
	public function findByIdPinterest($IdPinterest) {
		$this->_findBy['IdPinterest'] =  $IdPinterest;
		$this->_load();
		return $this;
	} 
		
	public function findByIdMyspace($IdMyspace) {
		$this->_findBy['IdMyspace'] =  $IdMyspace;
		$this->_load();
		return $this;
	} 
		
	public function findByIdYoutube($IdYoutube) {
		$this->_findBy['IdYoutube'] =  $IdYoutube;
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
		
	public function findByNotificationNewsletter($NotificationNewsletter) {
		$this->_findBy['NotificationNewsletter'] =  $NotificationNewsletter;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByNotificationNewsletter($from,$to) {
		$this->_findRangeBy['NotificationNewsletter'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByNotificationNewsletter($int) {
		$this->_findGreaterThanBy['NotificationNewsletter'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByNotificationNewsletter($int) {
		$this->_findLessThanBy['NotificationNewsletter'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByBirthday($Birthday) {
		$this->_findBy['Birthday'] =  $Birthday;
		$this->_load();
		return $this;
	} 
		
	public function findByGender($Gender) {
		$this->_findBy['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function findByAvatar($Avatar) {
		$this->_findBy['Avatar'] =  $Avatar;
		$this->_load();
		return $this;
	} 
		
	public function findByDescription($Description) {
		$this->_findBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByWebsite($Website) {
		$this->_findBy['Website'] =  $Website;
		$this->_load();
		return $this;
	} 
		
	public function findByHoraire($Horaire) {
		$this->_findBy['Horaire'] =  $Horaire;
		$this->_load();
		return $this;
	} 
		
	public function findByEditorHtml($EditorHtml) {
		$this->_findBy['EditorHtml'] =  $EditorHtml;
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
		
	public function findOneByProfileType($ProfileType) {
		$this->_findOneBy['ProfileType'] =  $ProfileType;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByActive($Active) {
		$this->_findOneBy['Active'] =  $Active;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdUser($IdUser) {
		$this->_findOneBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNetwork($Network) {
		$this->_findOneBy['Network'] =  $Network;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCompany($Company) {
		$this->_findOneBy['Company'] =  $Company;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEmail($Email) {
		$this->_findOneBy['Email'] =  $Email;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPseudo($Pseudo) {
		$this->_findOneBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLastName($LastName) {
		$this->_findOneBy['LastName'] =  $LastName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByFirstName($FirstName) {
		$this->_findOneBy['FirstName'] =  $FirstName;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCountry($Country) {
		$this->_findOneBy['Country'] =  $Country;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByRegion($Region) {
		$this->_findOneBy['Region'] =  $Region;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCity($City) {
		$this->_findOneBy['City'] =  $City;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByZipcode($Zipcode) {
		$this->_findOneBy['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAdresse($Adresse) {
		$this->_findOneBy['Adresse'] =  $Adresse;
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
		
	public function findOneByIdFacebook($IdFacebook) {
		$this->_findOneBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdTwitter($IdTwitter) {
		$this->_findOneBy['IdTwitter'] =  $IdTwitter;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdGoogle($IdGoogle) {
		$this->_findOneBy['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdLinkedin($IdLinkedin) {
		$this->_findOneBy['IdLinkedin'] =  $IdLinkedin;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdPinterest($IdPinterest) {
		$this->_findOneBy['IdPinterest'] =  $IdPinterest;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdMyspace($IdMyspace) {
		$this->_findOneBy['IdMyspace'] =  $IdMyspace;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdYoutube($IdYoutube) {
		$this->_findOneBy['IdYoutube'] =  $IdYoutube;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNotificationMail($NotificationMail) {
		$this->_findOneBy['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNotificationNewsletter($NotificationNewsletter) {
		$this->_findOneBy['NotificationNewsletter'] =  $NotificationNewsletter;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBirthday($Birthday) {
		$this->_findOneBy['Birthday'] =  $Birthday;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGender($Gender) {
		$this->_findOneBy['Gender'] =  $Gender;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByAvatar($Avatar) {
		$this->_findOneBy['Avatar'] =  $Avatar;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDescription($Description) {
		$this->_findOneBy['Description'] =  $Description;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByWebsite($Website) {
		$this->_findOneBy['Website'] =  $Website;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByHoraire($Horaire) {
		$this->_findOneBy['Horaire'] =  $Horaire;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByEditorHtml($EditorHtml) {
		$this->_findOneBy['EditorHtml'] =  $EditorHtml;
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
		
	public function findByLikeProfileType($ProfileType) {
		$this->_findByLike['ProfileType'] =  $ProfileType;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeActive($Active) {
		$this->_findByLike['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdUser($IdUser) {
		$this->_findByLike['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNetwork($Network) {
		$this->_findByLike['Network'] =  $Network;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCompany($Company) {
		$this->_findByLike['Company'] =  $Company;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEmail($Email) {
		$this->_findByLike['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePseudo($Pseudo) {
		$this->_findByLike['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLastName($LastName) {
		$this->_findByLike['LastName'] =  $LastName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeFirstName($FirstName) {
		$this->_findByLike['FirstName'] =  $FirstName;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCountry($Country) {
		$this->_findByLike['Country'] =  $Country;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeRegion($Region) {
		$this->_findByLike['Region'] =  $Region;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeCity($City) {
		$this->_findByLike['City'] =  $City;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeZipcode($Zipcode) {
		$this->_findByLike['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAdresse($Adresse) {
		$this->_findByLike['Adresse'] =  $Adresse;
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
		
	public function findByLikeIdFacebook($IdFacebook) {
		$this->_findByLike['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdTwitter($IdTwitter) {
		$this->_findByLike['IdTwitter'] =  $IdTwitter;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdGoogle($IdGoogle) {
		$this->_findByLike['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdLinkedin($IdLinkedin) {
		$this->_findByLike['IdLinkedin'] =  $IdLinkedin;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdPinterest($IdPinterest) {
		$this->_findByLike['IdPinterest'] =  $IdPinterest;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdMyspace($IdMyspace) {
		$this->_findByLike['IdMyspace'] =  $IdMyspace;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdYoutube($IdYoutube) {
		$this->_findByLike['IdYoutube'] =  $IdYoutube;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNotificationMail($NotificationMail) {
		$this->_findByLike['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNotificationNewsletter($NotificationNewsletter) {
		$this->_findByLike['NotificationNewsletter'] =  $NotificationNewsletter;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeBirthday($Birthday) {
		$this->_findByLike['Birthday'] =  $Birthday;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGender($Gender) {
		$this->_findByLike['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeAvatar($Avatar) {
		$this->_findByLike['Avatar'] =  $Avatar;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDescription($Description) {
		$this->_findByLike['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeWebsite($Website) {
		$this->_findByLike['Website'] =  $Website;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeHoraire($Horaire) {
		$this->_findByLike['Horaire'] =  $Horaire;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeEditorHtml($EditorHtml) {
		$this->_findByLike['EditorHtml'] =  $EditorHtml;
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
		
	public function filterByProfileType($ProfileType, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ProfileType',$ProfileType,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByProfileType($from,$to) {
		$this->_filterRangeBy['ProfileType'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByProfileType($int) {
		$this->_filterGreaterThanBy['ProfileType'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByProfileType($int) {
		$this->_filterLessThanBy['ProfileType'] = $int;
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
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByNetwork($Network, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Network',$Network,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByNetwork($from,$to) {
		$this->_filterRangeBy['Network'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByNetwork($int) {
		$this->_filterGreaterThanBy['Network'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByNetwork($int) {
		$this->_filterLessThanBy['Network'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByCompany($Company, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Company',$Company,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEmail($Email, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Email',$Email,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByPseudo($Pseudo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Pseudo',$Pseudo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByLastName($LastName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('LastName',$LastName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByFirstName($FirstName, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('FirstName',$FirstName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCountry($Country, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Country',$Country,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByRegion($Region, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Region',$Region,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCity($City, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('City',$City,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByZipcode($Zipcode, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Zipcode',$Zipcode,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAdresse($Adresse, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Adresse',$Adresse,$_condition);

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
		
	public function filterByIdFacebook($IdFacebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdFacebook',$IdFacebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdTwitter($IdTwitter, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdTwitter',$IdTwitter,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdGoogle($IdGoogle, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdGoogle',$IdGoogle,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdLinkedin($IdLinkedin, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdLinkedin',$IdLinkedin,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdPinterest($IdPinterest, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdPinterest',$IdPinterest,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdMyspace($IdMyspace, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdMyspace',$IdMyspace,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByIdYoutube($IdYoutube, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdYoutube',$IdYoutube,$_condition);

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
		
	public function filterByNotificationNewsletter($NotificationNewsletter, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('NotificationNewsletter',$NotificationNewsletter,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByNotificationNewsletter($from,$to) {
		$this->_filterRangeBy['NotificationNewsletter'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByNotificationNewsletter($int) {
		$this->_filterGreaterThanBy['NotificationNewsletter'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByNotificationNewsletter($int) {
		$this->_filterLessThanBy['NotificationNewsletter'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByBirthday($Birthday, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Birthday',$Birthday,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByGender($Gender, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Gender',$Gender,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByAvatar($Avatar, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Avatar',$Avatar,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDescription($Description, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Description',$Description,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByWebsite($Website, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Website',$Website,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByHoraire($Horaire, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Horaire',$Horaire,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByEditorHtml($EditorHtml, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('EditorHtml',$EditorHtml,$_condition);

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
		
	public function filterLikeByProfileType($ProfileType) {
		$this->_filterLikeBy['ProfileType'] =  $ProfileType;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByActive($Active) {
		$this->_filterLikeBy['Active'] =  $Active;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdUser($IdUser) {
		$this->_filterLikeBy['IdUser'] =  $IdUser;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNetwork($Network) {
		$this->_filterLikeBy['Network'] =  $Network;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCompany($Company) {
		$this->_filterLikeBy['Company'] =  $Company;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEmail($Email) {
		$this->_filterLikeBy['Email'] =  $Email;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPseudo($Pseudo) {
		$this->_filterLikeBy['Pseudo'] =  $Pseudo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLastName($LastName) {
		$this->_filterLikeBy['LastName'] =  $LastName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByFirstName($FirstName) {
		$this->_filterLikeBy['FirstName'] =  $FirstName;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCountry($Country) {
		$this->_filterLikeBy['Country'] =  $Country;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByRegion($Region) {
		$this->_filterLikeBy['Region'] =  $Region;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCity($City) {
		$this->_filterLikeBy['City'] =  $City;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByZipcode($Zipcode) {
		$this->_filterLikeBy['Zipcode'] =  $Zipcode;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAdresse($Adresse) {
		$this->_filterLikeBy['Adresse'] =  $Adresse;
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
		
	public function filterLikeByIdFacebook($IdFacebook) {
		$this->_filterLikeBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdTwitter($IdTwitter) {
		$this->_filterLikeBy['IdTwitter'] =  $IdTwitter;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdGoogle($IdGoogle) {
		$this->_filterLikeBy['IdGoogle'] =  $IdGoogle;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdLinkedin($IdLinkedin) {
		$this->_filterLikeBy['IdLinkedin'] =  $IdLinkedin;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdPinterest($IdPinterest) {
		$this->_filterLikeBy['IdPinterest'] =  $IdPinterest;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdMyspace($IdMyspace) {
		$this->_filterLikeBy['IdMyspace'] =  $IdMyspace;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdYoutube($IdYoutube) {
		$this->_filterLikeBy['IdYoutube'] =  $IdYoutube;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNotificationMail($NotificationMail) {
		$this->_filterLikeBy['NotificationMail'] =  $NotificationMail;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNotificationNewsletter($NotificationNewsletter) {
		$this->_filterLikeBy['NotificationNewsletter'] =  $NotificationNewsletter;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBirthday($Birthday) {
		$this->_filterLikeBy['Birthday'] =  $Birthday;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGender($Gender) {
		$this->_filterLikeBy['Gender'] =  $Gender;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByAvatar($Avatar) {
		$this->_filterLikeBy['Avatar'] =  $Avatar;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDescription($Description) {
		$this->_filterLikeBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByWebsite($Website) {
		$this->_filterLikeBy['Website'] =  $Website;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByHoraire($Horaire) {
		$this->_filterLikeBy['Horaire'] =  $Horaire;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByEditorHtml($EditorHtml) {
		$this->_filterLikeBy['EditorHtml'] =  $EditorHtml;
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
		
	public function orderByProfileType($direction = 'ASC') {
		$this->loadDirection('profile_type',$direction);
		return $this;
	} 
		
	public function orderByActive($direction = 'ASC') {
		$this->loadDirection('active',$direction);
		return $this;
	} 
		
	public function orderByIdUser($direction = 'ASC') {
		$this->loadDirection('id_user',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByNetwork($direction = 'ASC') {
		$this->loadDirection('network',$direction);
		return $this;
	} 
		
	public function orderByCompany($direction = 'ASC') {
		$this->loadDirection('company',$direction);
		return $this;
	} 
		
	public function orderByEmail($direction = 'ASC') {
		$this->loadDirection('email',$direction);
		return $this;
	} 
		
	public function orderByPseudo($direction = 'ASC') {
		$this->loadDirection('pseudo',$direction);
		return $this;
	} 
		
	public function orderByLastName($direction = 'ASC') {
		$this->loadDirection('last_name',$direction);
		return $this;
	} 
		
	public function orderByFirstName($direction = 'ASC') {
		$this->loadDirection('first_name',$direction);
		return $this;
	} 
		
	public function orderByCountry($direction = 'ASC') {
		$this->loadDirection('country',$direction);
		return $this;
	} 
		
	public function orderByRegion($direction = 'ASC') {
		$this->loadDirection('region',$direction);
		return $this;
	} 
		
	public function orderByCity($direction = 'ASC') {
		$this->loadDirection('city',$direction);
		return $this;
	} 
		
	public function orderByZipcode($direction = 'ASC') {
		$this->loadDirection('zipcode',$direction);
		return $this;
	} 
		
	public function orderByAdresse($direction = 'ASC') {
		$this->loadDirection('adresse',$direction);
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
		
	public function orderByIdFacebook($direction = 'ASC') {
		$this->loadDirection('id_facebook',$direction);
		return $this;
	} 
		
	public function orderByIdTwitter($direction = 'ASC') {
		$this->loadDirection('id_twitter',$direction);
		return $this;
	} 
		
	public function orderByIdGoogle($direction = 'ASC') {
		$this->loadDirection('id_google',$direction);
		return $this;
	} 
		
	public function orderByIdLinkedin($direction = 'ASC') {
		$this->loadDirection('id_linkedin',$direction);
		return $this;
	} 
		
	public function orderByIdPinterest($direction = 'ASC') {
		$this->loadDirection('id_pinterest',$direction);
		return $this;
	} 
		
	public function orderByIdMyspace($direction = 'ASC') {
		$this->loadDirection('id_myspace',$direction);
		return $this;
	} 
		
	public function orderByIdYoutube($direction = 'ASC') {
		$this->loadDirection('id_youtube',$direction);
		return $this;
	} 
		
	public function orderByNotificationMail($direction = 'ASC') {
		$this->loadDirection('notification_mail',$direction);
		return $this;
	} 
		
	public function orderByNotificationNewsletter($direction = 'ASC') {
		$this->loadDirection('notification_newsletter',$direction);
		return $this;
	} 
		
	public function orderByBirthday($direction = 'ASC') {
		$this->loadDirection('birthday',$direction);
		return $this;
	} 
		
	public function orderByGender($direction = 'ASC') {
		$this->loadDirection('gender',$direction);
		return $this;
	} 
		
	public function orderByAvatar($direction = 'ASC') {
		$this->loadDirection('avatar',$direction);
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC') {
		$this->loadDirection('description',$direction);
		return $this;
	} 
		
	public function orderByWebsite($direction = 'ASC') {
		$this->loadDirection('website',$direction);
		return $this;
	} 
		
	public function orderByHoraire($direction = 'ASC') {
		$this->loadDirection('horaire',$direction);
		return $this;
	} 
		
	public function orderByEditorHtml($direction = 'ASC') {
		$this->loadDirection('editor_html',$direction);
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
		    'ProfileType' =>  'profile_type',            
		    'Active' =>  'active',            
		    'IdUser' =>  'id_user',            
		    'Langue' =>  'langue',            
		    'Network' =>  'network',            
		    'Company' =>  'company',            
		    'Email' =>  'email',            
		    'Pseudo' =>  'pseudo',            
		    'LastName' =>  'last_name',            
		    'FirstName' =>  'first_name',            
		    'Country' =>  'country',            
		    'Region' =>  'region',            
		    'City' =>  'city',            
		    'Zipcode' =>  'zipcode',            
		    'Adresse' =>  'adresse',            
		    'TelFix' =>  'tel_fix',            
		    'TelMobil' =>  'tel_mobil',            
		    'TelFax' =>  'tel_fax',            
		    'IdFacebook' =>  'id_facebook',            
		    'IdTwitter' =>  'id_twitter',            
		    'IdGoogle' =>  'id_google',            
		    'IdLinkedin' =>  'id_linkedin',            
		    'IdPinterest' =>  'id_pinterest',            
		    'IdMyspace' =>  'id_myspace',            
		    'IdYoutube' =>  'id_youtube',            
		    'NotificationMail' =>  'notification_mail',            
		    'NotificationNewsletter' =>  'notification_newsletter',            
		    'Birthday' =>  'birthday',            
		    'Gender' =>  'gender',            
		    'Avatar' =>  'avatar',            
		    'Description' =>  'description',            
		    'Website' =>  'website',            
		    'Horaire' =>  'horaire',            
		    'EditorHtml' =>  'editor_html',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',		
		));
	} 


}