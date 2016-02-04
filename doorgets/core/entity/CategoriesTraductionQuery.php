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

class CategoriesTraductionQuery extends AbstractQuery 
{

	protected $_table = '_categories_traduction';
    
    protected $_className = 'CategoriesTraduction';

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
		
	public function findByIdCat($IdCat) {
		$this->_findBy['IdCat'] =  $IdCat;
		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdCat($from,$to) {
		$this->_findRangeBy['IdCat'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdCat($int) {
		$this->_findGreaterThanBy['IdCat'] = $int;
		$this->_load();
		return $this;
	} 


	public function findLessThanByIdCat($int) {
		$this->_findLessThanBy['IdCat'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue) {
		$this->_findBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByNom($Nom) {
		$this->_findBy['Nom'] =  $Nom;
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
		
	public function findByUri($Uri) {
		$this->_findBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByMetaTitre($MetaTitre) {
		$this->_findBy['MetaTitre'] =  $MetaTitre;
		$this->_load();
		return $this;
	} 
		
	public function findByMetaDescription($MetaDescription) {
		$this->_findBy['MetaDescription'] =  $MetaDescription;
		$this->_load();
		return $this;
	} 
		
	public function findByMetaKeys($MetaKeys) {
		$this->_findBy['MetaKeys'] =  $MetaKeys;
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
		
	public function findOneByIdCat($IdCat) {
		$this->_findOneBy['IdCat'] =  $IdCat;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue) {
		$this->_findOneBy['Langue'] =  $Langue;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNom($Nom) {
		$this->_findOneBy['Nom'] =  $Nom;
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
		
	public function findOneByUri($Uri) {
		$this->_findOneBy['Uri'] =  $Uri;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMetaTitre($MetaTitre) {
		$this->_findOneBy['MetaTitre'] =  $MetaTitre;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMetaDescription($MetaDescription) {
		$this->_findOneBy['MetaDescription'] =  $MetaDescription;
		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMetaKeys($MetaKeys) {
		$this->_findOneBy['MetaKeys'] =  $MetaKeys;
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
		
	public function findByLikeIdCat($IdCat) {
		$this->_findByLike['IdCat'] =  $IdCat;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue) {
		$this->_findByLike['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeNom($Nom) {
		$this->_findByLike['Nom'] =  $Nom;
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
		
	public function findByLikeUri($Uri) {
		$this->_findByLike['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMetaTitre($MetaTitre) {
		$this->_findByLike['MetaTitre'] =  $MetaTitre;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMetaDescription($MetaDescription) {
		$this->_findByLike['MetaDescription'] =  $MetaDescription;
		$this->_load();
		return $this;
	} 
		
	public function findByLikeMetaKeys($MetaKeys) {
		$this->_findByLike['MetaKeys'] =  $MetaKeys;
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
		
	public function filterByIdCat($IdCat, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdCat',$IdCat,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdCat($from,$to) {
		$this->_filterRangeBy['IdCat'] =  array(
			'from' => $from,
			'to'   => $to
		);
		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdCat($int) {
		$this->_filterGreaterThanBy['IdCat'] = $int;
		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdCat($int) {
		$this->_filterLessThanBy['IdCat'] = $int;
		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByNom($Nom, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Nom',$Nom,$_condition);

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
		
	public function filterByUri($Uri, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Uri',$Uri,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMetaTitre($MetaTitre, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MetaTitre',$MetaTitre,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMetaDescription($MetaDescription, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MetaDescription',$MetaDescription,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMetaKeys($MetaKeys, $condition = 'AND') {
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MetaKeys',$MetaKeys,$_condition);

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
		
	public function filterLikeByIdCat($IdCat) {
		$this->_filterLikeBy['IdCat'] =  $IdCat;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue) {
		$this->_filterLikeBy['Langue'] =  $Langue;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNom($Nom) {
		$this->_filterLikeBy['Nom'] =  $Nom;
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
		
	public function filterLikeByUri($Uri) {
		$this->_filterLikeBy['Uri'] =  $Uri;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMetaTitre($MetaTitre) {
		$this->_filterLikeBy['MetaTitre'] =  $MetaTitre;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMetaDescription($MetaDescription) {
		$this->_filterLikeBy['MetaDescription'] =  $MetaDescription;
		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMetaKeys($MetaKeys) {
		$this->_filterLikeBy['MetaKeys'] =  $MetaKeys;
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
		
	public function orderByIdCat($direction = 'ASC') {
		$this->loadDirection('id_cat',$direction);
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC') {
		$this->loadDirection('langue',$direction);
		return $this;
	} 
		
	public function orderByNom($direction = 'ASC') {
		$this->loadDirection('nom',$direction);
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
		
	public function orderByUri($direction = 'ASC') {
		$this->loadDirection('uri',$direction);
		return $this;
	} 
		
	public function orderByMetaTitre($direction = 'ASC') {
		$this->loadDirection('meta_titre',$direction);
		return $this;
	} 
		
	public function orderByMetaDescription($direction = 'ASC') {
		$this->loadDirection('meta_description',$direction);
		return $this;
	} 
		
	public function orderByMetaKeys($direction = 'ASC') {
		$this->loadDirection('meta_keys',$direction);
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
		    'IdCat' =>  'id_cat',            
		    'Langue' =>  'langue',            
		    'Nom' =>  'nom',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'Uri' =>  'uri',            
		    'MetaTitre' =>  'meta_titre',            
		    'MetaDescription' =>  'meta_description',            
		    'MetaKeys' =>  'meta_keys',            
		    'DateCreation' =>  'date_creation',		
		));
	} 


}