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

class DgOnepageQuery extends AbstractQuery 
{

	protected $_table = '_dg_onepage';
    
    protected $_className = 'DgOnepage';

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
		
	public function findByComments($Comments) {
		$this->_findBy['Comments'] =  $Comments;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByComments($from,$to) {
		$this->_findRangeBy['Comments'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByComments($int) {
		$this->_findGreaterThanBy['Comments'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByComments($int) {
		$this->_findLessThanBy['Comments'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByPartage($Partage) {
		$this->_findBy['Partage'] =  $Partage;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByPartage($from,$to) {
		$this->_findRangeBy['Partage'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByPartage($int) {
		$this->_findGreaterThanBy['Partage'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByPartage($int) {
		$this->_findLessThanBy['Partage'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByFacebook($Facebook) {
		$this->_findBy['Facebook'] =  $Facebook;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByFacebook($from,$to) {
		$this->_findRangeBy['Facebook'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByFacebook($int) {
		$this->_findGreaterThanBy['Facebook'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByFacebook($int) {
		$this->_findLessThanBy['Facebook'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdFacebook($IdFacebook) {
		$this->_findBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByDisqus($Disqus) {
		$this->_findBy['Disqus'] =  $Disqus;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDisqus($from,$to) {
		$this->_findRangeBy['Disqus'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDisqus($int) {
		$this->_findGreaterThanBy['Disqus'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDisqus($int) {
		$this->_findLessThanBy['Disqus'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByIdDisqus($IdDisqus) {
		$this->_findBy['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this;
	} 
		
	public function findByMailsender($Mailsender) {
		$this->_findBy['Mailsender'] =  $Mailsender;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByMailsender($from,$to) {
		$this->_findRangeBy['Mailsender'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByMailsender($int) {
		$this->_findGreaterThanBy['Mailsender'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByMailsender($int) {
		$this->_findLessThanBy['Mailsender'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findBySendto($Sendto) {
		$this->_findBy['Sendto'] =  $Sendto;
		$this->_load();
		return $this;
	} 
		
	public function findByInRss($InRss) {
		$this->_findBy['InRss'] =  $InRss;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByInRss($from,$to) {
		$this->_findRangeBy['InRss'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByInRss($int) {
		$this->_findGreaterThanBy['InRss'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByInRss($int) {
		$this->_findLessThanBy['InRss'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByOrdre($Ordre) {
		$this->_findBy['Ordre'] =  $Ordre;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByOrdre($from,$to) {
		$this->_findRangeBy['Ordre'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByOrdre($int) {
		$this->_findGreaterThanBy['Ordre'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByOrdre($int) {
		$this->_findLessThanBy['Ordre'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByGroupeTraduction($GroupeTraduction) {
		$this->_findBy['GroupeTraduction'] =  $GroupeTraduction;
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
		
	public function findByIdModo($IdModo) {
		$this->_findBy['IdModo'] =  $IdModo;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdModo($from,$to) {
		$this->_findRangeBy['IdModo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdModo($int) {
		$this->_findGreaterThanBy['IdModo'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdModo($int) {
		$this->_findLessThanBy['IdModo'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByValModo($ValModo) {
		$this->_findBy['ValModo'] =  $ValModo;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByValModo($from,$to) {
		$this->_findRangeBy['ValModo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByValModo($int) {
		$this->_findGreaterThanBy['ValModo'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByValModo($int) {
		$this->_findLessThanBy['ValModo'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateModo($DateModo) {
		$this->_findBy['DateModo'] =  $DateModo;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateModo($from,$to) {
		$this->_findRangeBy['DateModo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateModo($int) {
		$this->_findGreaterThanBy['DateModo'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateModo($int) {
		$this->_findLessThanBy['DateModo'] = $int;
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
		
	public function findOneByComments($Comments) {
		$this->_findOneBy['Comments'] =  $Comments;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByPartage($Partage) {
		$this->_findOneBy['Partage'] =  $Partage;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByFacebook($Facebook) {
		$this->_findOneBy['Facebook'] =  $Facebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdFacebook($IdFacebook) {
		$this->_findOneBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDisqus($Disqus) {
		$this->_findOneBy['Disqus'] =  $Disqus;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdDisqus($IdDisqus) {
		$this->_findOneBy['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMailsender($Mailsender) {
		$this->_findOneBy['Mailsender'] =  $Mailsender;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendto($Sendto) {
		$this->_findOneBy['Sendto'] =  $Sendto;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByInRss($InRss) {
		$this->_findOneBy['InRss'] =  $InRss;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByOrdre($Ordre) {
		$this->_findOneBy['Ordre'] =  $Ordre;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByGroupeTraduction($GroupeTraduction) {
		$this->_findOneBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateCreation($DateCreation) {
		$this->_findOneBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdModo($IdModo) {
		$this->_findOneBy['IdModo'] =  $IdModo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByValModo($ValModo) {
		$this->_findOneBy['ValModo'] =  $ValModo;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModo($DateModo) {
		$this->_findOneBy['DateModo'] =  $DateModo;
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
		
	public function findByLikeComments($Comments) {
		$this->_findByLike['Comments'] =  $Comments;
		$this->_load();
		return $this;
	} 
		
	public function findByLikePartage($Partage) {
		$this->_findByLike['Partage'] =  $Partage;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeFacebook($Facebook) {
		$this->_findByLike['Facebook'] =  $Facebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdFacebook($IdFacebook) {
		$this->_findByLike['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDisqus($Disqus) {
		$this->_findByLike['Disqus'] =  $Disqus;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdDisqus($IdDisqus) {
		$this->_findByLike['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMailsender($Mailsender) {
		$this->_findByLike['Mailsender'] =  $Mailsender;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendto($Sendto) {
		$this->_findByLike['Sendto'] =  $Sendto;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeInRss($InRss) {
		$this->_findByLike['InRss'] =  $InRss;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeOrdre($Ordre) {
		$this->_findByLike['Ordre'] =  $Ordre;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeGroupeTraduction($GroupeTraduction) {
		$this->_findByLike['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateCreation($DateCreation) {
		$this->_findByLike['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdModo($IdModo) {
		$this->_findByLike['IdModo'] =  $IdModo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeValModo($ValModo) {
		$this->_findByLike['ValModo'] =  $ValModo;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModo($DateModo) {
		$this->_findByLike['DateModo'] =  $DateModo;
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
		
	public function filterByComments($Comments, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Comments',$Comments,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByComments($from,$to) {
		$this->_filterRangeBy['Comments'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByComments($int) {
		$this->_filterGreaterThanBy['Comments'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByComments($int) {
		$this->_filterLessThanBy['Comments'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByPartage($Partage, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Partage',$Partage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByPartage($from,$to) {
		$this->_filterRangeBy['Partage'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByPartage($int) {
		$this->_filterGreaterThanBy['Partage'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByPartage($int) {
		$this->_filterLessThanBy['Partage'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByFacebook($Facebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Facebook',$Facebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByFacebook($from,$to) {
		$this->_filterRangeBy['Facebook'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByFacebook($int) {
		$this->_filterGreaterThanBy['Facebook'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByFacebook($int) {
		$this->_filterLessThanBy['Facebook'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdFacebook($IdFacebook, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdFacebook',$IdFacebook,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDisqus($Disqus, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Disqus',$Disqus,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDisqus($from,$to) {
		$this->_filterRangeBy['Disqus'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDisqus($int) {
		$this->_filterGreaterThanBy['Disqus'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDisqus($int) {
		$this->_filterLessThanBy['Disqus'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByIdDisqus($IdDisqus, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdDisqus',$IdDisqus,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMailsender($Mailsender, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Mailsender',$Mailsender,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByMailsender($from,$to) {
		$this->_filterRangeBy['Mailsender'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByMailsender($int) {
		$this->_filterGreaterThanBy['Mailsender'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByMailsender($int) {
		$this->_filterLessThanBy['Mailsender'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterBySendto($Sendto, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Sendto',$Sendto,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByInRss($InRss, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('InRss',$InRss,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByInRss($from,$to) {
		$this->_filterRangeBy['InRss'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByInRss($int) {
		$this->_filterGreaterThanBy['InRss'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByInRss($int) {
		$this->_filterLessThanBy['InRss'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByOrdre($Ordre, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Ordre',$Ordre,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByOrdre($from,$to) {
		$this->_filterRangeBy['Ordre'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByOrdre($int) {
		$this->_filterGreaterThanBy['Ordre'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByOrdre($int) {
		$this->_filterLessThanBy['Ordre'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByGroupeTraduction($GroupeTraduction, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('GroupeTraduction',$GroupeTraduction,$_condition);

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
		
	public function filterByIdModo($IdModo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdModo',$IdModo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdModo($from,$to) {
		$this->_filterRangeBy['IdModo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdModo($int) {
		$this->_filterGreaterThanBy['IdModo'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdModo($int) {
		$this->_filterLessThanBy['IdModo'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByValModo($ValModo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('ValModo',$ValModo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByValModo($from,$to) {
		$this->_filterRangeBy['ValModo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByValModo($int) {
		$this->_filterGreaterThanBy['ValModo'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByValModo($int) {
		$this->_filterLessThanBy['ValModo'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateModo($DateModo, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateModo',$DateModo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateModo($from,$to) {
		$this->_filterRangeBy['DateModo'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateModo($int) {
		$this->_filterGreaterThanBy['DateModo'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateModo($int) {
		$this->_filterLessThanBy['DateModo'] = $int;
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
		
	public function filterLikeByComments($Comments) {
		$this->_filterLikeBy['Comments'] =  $Comments;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByPartage($Partage) {
		$this->_filterLikeBy['Partage'] =  $Partage;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByFacebook($Facebook) {
		$this->_filterLikeBy['Facebook'] =  $Facebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdFacebook($IdFacebook) {
		$this->_filterLikeBy['IdFacebook'] =  $IdFacebook;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDisqus($Disqus) {
		$this->_filterLikeBy['Disqus'] =  $Disqus;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdDisqus($IdDisqus) {
		$this->_filterLikeBy['IdDisqus'] =  $IdDisqus;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMailsender($Mailsender) {
		$this->_filterLikeBy['Mailsender'] =  $Mailsender;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendto($Sendto) {
		$this->_filterLikeBy['Sendto'] =  $Sendto;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByInRss($InRss) {
		$this->_filterLikeBy['InRss'] =  $InRss;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByOrdre($Ordre) {
		$this->_filterLikeBy['Ordre'] =  $Ordre;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByGroupeTraduction($GroupeTraduction) {
		$this->_filterLikeBy['GroupeTraduction'] =  $GroupeTraduction;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateCreation($DateCreation) {
		$this->_filterLikeBy['DateCreation'] =  $DateCreation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdModo($IdModo) {
		$this->_filterLikeBy['IdModo'] =  $IdModo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByValModo($ValModo) {
		$this->_filterLikeBy['ValModo'] =  $ValModo;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModo($DateModo) {
		$this->_filterLikeBy['DateModo'] =  $DateModo;
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
		
	public function orderByUri($direction = 'ASC') {
		$this->loadDirection('uri',$direction);
		return $this;
	} 
		
	public function orderByActive($direction = 'ASC') {
		$this->loadDirection('active',$direction);
		return $this;
	} 
		
	public function orderByComments($direction = 'ASC') {
		$this->loadDirection('comments',$direction);
		return $this;
	} 
		
	public function orderByPartage($direction = 'ASC') {
		$this->loadDirection('partage',$direction);
		return $this;
	} 
		
	public function orderByFacebook($direction = 'ASC') {
		$this->loadDirection('facebook',$direction);
		return $this;
	} 
		
	public function orderByIdFacebook($direction = 'ASC') {
		$this->loadDirection('id_facebook',$direction);
		return $this;
	} 
		
	public function orderByDisqus($direction = 'ASC') {
		$this->loadDirection('disqus',$direction);
		return $this;
	} 
		
	public function orderByIdDisqus($direction = 'ASC') {
		$this->loadDirection('id_disqus',$direction);
		return $this;
	} 
		
	public function orderByMailsender($direction = 'ASC') {
		$this->loadDirection('mailsender',$direction);
		return $this;
	} 
		
	public function orderBySendto($direction = 'ASC') {
		$this->loadDirection('sendto',$direction);
		return $this;
	} 
		
	public function orderByInRss($direction = 'ASC') {
		$this->loadDirection('in_rss',$direction);
		return $this;
	} 
		
	public function orderByOrdre($direction = 'ASC') {
		$this->loadDirection('ordre',$direction);
		return $this;
	} 
		
	public function orderByGroupeTraduction($direction = 'ASC') {
		$this->loadDirection('groupe_traduction',$direction);
		return $this;
	} 
		
	public function orderByDateCreation($direction = 'ASC') {
		$this->loadDirection('date_creation',$direction);
		return $this;
	} 
		
	public function orderByIdModo($direction = 'ASC') {
		$this->loadDirection('id_modo',$direction);
		return $this;
	} 
		
	public function orderByValModo($direction = 'ASC') {
		$this->loadDirection('val_modo',$direction);
		return $this;
	} 
		
	public function orderByDateModo($direction = 'ASC') {
		$this->loadDirection('date_modo',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdGroupe' =>  'id_groupe',            
		    'Uri' =>  'uri',            
		    'Active' =>  'active',            
		    'Comments' =>  'comments',            
		    'Partage' =>  'partage',            
		    'Facebook' =>  'facebook',            
		    'IdFacebook' =>  'id_facebook',            
		    'Disqus' =>  'disqus',            
		    'IdDisqus' =>  'id_disqus',            
		    'Mailsender' =>  'mailsender',            
		    'Sendto' =>  'sendto',            
		    'InRss' =>  'in_rss',            
		    'Ordre' =>  'ordre',            
		    'GroupeTraduction' =>  'groupe_traduction',            
		    'DateCreation' =>  'date_creation',            
		    'IdModo' =>  'id_modo',            
		    'ValModo' =>  'val_modo',            
		    'DateModo' =>  'date_modo',		
		));
	} 


}