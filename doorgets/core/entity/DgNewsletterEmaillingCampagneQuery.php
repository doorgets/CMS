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

class DgNewsletterEmaillingCampagneQuery extends AbstractQuery 
{

	protected $_table = '_dg_newsletter_emailling_campagne';
    
    protected $_className = 'DgNewsletterEmaillingCampagne';

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
		
	public function findByIdUserGroupe($IdUserGroupe) {
		$this->_findBy['IdUserGroupe'] =  $IdUserGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdUserGroupe($from,$to) {
		$this->_findRangeBy['IdUserGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdUserGroupe($int) {
		$this->_findGreaterThanBy['IdUserGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdUserGroupe($int) {
		$this->_findLessThanBy['IdUserGroupe'] = $int;
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
		
	public function findByIdModels($IdModels) {
		$this->_findBy['IdModels'] =  $IdModels;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdModels($from,$to) {
		$this->_findRangeBy['IdModels'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdModels($int) {
		$this->_findGreaterThanBy['IdModels'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdModels($int) {
		$this->_findLessThanBy['IdModels'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByStatut($Statut) {
		$this->_findBy['Statut'] =  $Statut;
		$this->_load();
		return $this;
	} 
		
	public function findByTitre($Titre) {
		$this->_findBy['Titre'] =  $Titre;
		$this->_load();
		return $this;
	} 
		
	public function findByDescription($Description) {
		$this->_findBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByMessage($Message) {
		$this->_findBy['Message'] =  $Message;
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
		
	public function findByDateValidation($DateValidation) {
		$this->_findBy['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateValidation($from,$to) {
		$this->_findRangeBy['DateValidation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateValidation($int) {
		$this->_findGreaterThanBy['DateValidation'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateValidation($int) {
		$this->_findLessThanBy['DateValidation'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByDateEnvoi($DateEnvoi) {
		$this->_findBy['DateEnvoi'] =  $DateEnvoi;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateEnvoi($from,$to) {
		$this->_findRangeBy['DateEnvoi'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateEnvoi($int) {
		$this->_findGreaterThanBy['DateEnvoi'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByDateEnvoi($int) {
		$this->_findLessThanBy['DateEnvoi'] = $int;
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
		
	public function findOneByIdUserGroupe($IdUserGroupe) {
		$this->_findOneBy['IdUserGroupe'] =  $IdUserGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdGroupe($IdGroupe) {
		$this->_findOneBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByIdModels($IdModels) {
		$this->_findOneBy['IdModels'] =  $IdModels;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatut($Statut) {
		$this->_findOneBy['Statut'] =  $Statut;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitre($Titre) {
		$this->_findOneBy['Titre'] =  $Titre;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDescription($Description) {
		$this->_findOneBy['Description'] =  $Description;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMessage($Message) {
		$this->_findOneBy['Message'] =  $Message;
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
		
	public function findOneByDateValidation($DateValidation) {
		$this->_findOneBy['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateEnvoi($DateEnvoi) {
		$this->_findOneBy['DateEnvoi'] =  $DateEnvoi;
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
		
	public function findByLikeIdUserGroupe($IdUserGroupe) {
		$this->_findByLike['IdUserGroupe'] =  $IdUserGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdGroupe($IdGroupe) {
		$this->_findByLike['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeIdModels($IdModels) {
		$this->_findByLike['IdModels'] =  $IdModels;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatut($Statut) {
		$this->_findByLike['Statut'] =  $Statut;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitre($Titre) {
		$this->_findByLike['Titre'] =  $Titre;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDescription($Description) {
		$this->_findByLike['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMessage($Message) {
		$this->_findByLike['Message'] =  $Message;
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
		
	public function findByLikeDateValidation($DateValidation) {
		$this->_findByLike['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateEnvoi($DateEnvoi) {
		$this->_findByLike['DateEnvoi'] =  $DateEnvoi;
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
		
	public function filterByIdUserGroupe($IdUserGroupe, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdUserGroupe',$IdUserGroupe,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdUserGroupe($from,$to) {
		$this->_filterRangeBy['IdUserGroupe'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdUserGroupe($int) {
		$this->_filterGreaterThanBy['IdUserGroupe'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdUserGroupe($int) {
		$this->_filterLessThanBy['IdUserGroupe'] = $int;
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
		
	public function filterByIdModels($IdModels, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdModels',$IdModels,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdModels($from,$to) {
		$this->_filterRangeBy['IdModels'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdModels($int) {
		$this->_filterGreaterThanBy['IdModels'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdModels($int) {
		$this->_filterLessThanBy['IdModels'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByStatut($Statut, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Statut',$Statut,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTitre($Titre, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Titre',$Titre,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDescription($Description, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Description',$Description,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMessage($Message, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Message',$Message,$_condition);

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
		
	public function filterByDateValidation($DateValidation, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateValidation',$DateValidation,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateValidation($from,$to) {
		$this->_filterRangeBy['DateValidation'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateValidation($int) {
		$this->_filterGreaterThanBy['DateValidation'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateValidation($int) {
		$this->_filterLessThanBy['DateValidation'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByDateEnvoi($DateEnvoi, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateEnvoi',$DateEnvoi,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateEnvoi($from,$to) {
		$this->_filterRangeBy['DateEnvoi'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateEnvoi($int) {
		$this->_filterGreaterThanBy['DateEnvoi'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateEnvoi($int) {
		$this->_filterLessThanBy['DateEnvoi'] = $int;
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
		
	public function filterLikeByIdUserGroupe($IdUserGroupe) {
		$this->_filterLikeBy['IdUserGroupe'] =  $IdUserGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdGroupe($IdGroupe) {
		$this->_filterLikeBy['IdGroupe'] =  $IdGroupe;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByIdModels($IdModels) {
		$this->_filterLikeBy['IdModels'] =  $IdModels;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatut($Statut) {
		$this->_filterLikeBy['Statut'] =  $Statut;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitre($Titre) {
		$this->_filterLikeBy['Titre'] =  $Titre;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDescription($Description) {
		$this->_filterLikeBy['Description'] =  $Description;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMessage($Message) {
		$this->_filterLikeBy['Message'] =  $Message;
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
		
	public function filterLikeByDateValidation($DateValidation) {
		$this->_filterLikeBy['DateValidation'] =  $DateValidation;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateEnvoi($DateEnvoi) {
		$this->_filterLikeBy['DateEnvoi'] =  $DateEnvoi;
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
		
	public function orderByIdUserGroupe($direction = 'ASC') {
		$this->loadDirection('id_user_groupe',$direction);
		return $this;
	} 
		
	public function orderByIdGroupe($direction = 'ASC') {
		$this->loadDirection('id_groupe',$direction);
		return $this;
	} 
		
	public function orderByIdModels($direction = 'ASC') {
		$this->loadDirection('id_models',$direction);
		return $this;
	} 
		
	public function orderByStatut($direction = 'ASC') {
		$this->loadDirection('statut',$direction);
		return $this;
	} 
		
	public function orderByTitre($direction = 'ASC') {
		$this->loadDirection('titre',$direction);
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC') {
		$this->loadDirection('description',$direction);
		return $this;
	} 
		
	public function orderByMessage($direction = 'ASC') {
		$this->loadDirection('message',$direction);
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
		
	public function orderByDateValidation($direction = 'ASC') {
		$this->loadDirection('date_validation',$direction);
		return $this;
	} 
		
	public function orderByDateEnvoi($direction = 'ASC') {
		$this->loadDirection('date_envoi',$direction);
		return $this;
	} 


	public function _getMap() { 
		$parentMap = parent::_getMap();
		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'IdUser' =>  'id_user',            
		    'IdUserGroupe' =>  'id_user_groupe',            
		    'IdGroupe' =>  'id_groupe',            
		    'IdModels' =>  'id_models',            
		    'Statut' =>  'statut',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'Message' =>  'message',            
		    'DateCreation' =>  'date_creation',            
		    'DateModification' =>  'date_modification',            
		    'DateValidation' =>  'date_validation',            
		    'DateEnvoi' =>  'date_envoi',		
		));
	} 


}