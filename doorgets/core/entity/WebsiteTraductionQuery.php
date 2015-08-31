<?php

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

	public function findByPK($Id)
	{
		$this->_findBy['Id'] =  $Id;

		$this->_load();
		return $this;
	} 
		
	public function findById($Id)
	{
		$this->_findBy['Id'] =  $Id;

		$this->_load();
		return $this;
	} 
		
	public function findRangeById($from,$to)
	{
		$this->_findRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);

		$this->_load();
		return $this;
	} 


	public function findGreaterThanById($int)
	{
		$this->_findGreaterThanBy['Id'] = $int;

		$this->_load();
		return $this;
	} 


	public function findLessThanById($int)
	{
		$this->_findLessThanBy['Id'] = $int;

		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue)
	{
		$this->_findBy['Langue'] =  $Langue;

		$this->_load();
		return $this;
	} 
		
	public function findByStatutTinymce($StatutTinymce)
	{
		$this->_findBy['StatutTinymce'] =  $StatutTinymce;

		$this->_load();
		return $this;
	} 
		
	public function findByTitle($Title)
	{
		$this->_findBy['Title'] =  $Title;

		$this->_load();
		return $this;
	} 
		
	public function findBySlogan($Slogan)
	{
		$this->_findBy['Slogan'] =  $Slogan;

		$this->_load();
		return $this;
	} 
		
	public function findByDescription($Description)
	{
		$this->_findBy['Description'] =  $Description;

		$this->_load();
		return $this;
	} 
		
	public function findByCopyright($Copyright)
	{
		$this->_findBy['Copyright'] =  $Copyright;

		$this->_load();
		return $this;
	} 
		
	public function findByYear($Year)
	{
		$this->_findBy['Year'] =  $Year;

		$this->_load();
		return $this;
	} 
		
	public function findByKeywords($Keywords)
	{
		$this->_findBy['Keywords'] =  $Keywords;

		$this->_load();
		return $this;
	} 
		
	public function findByDateModification($DateModification)
	{
		$this->_findBy['DateModification'] =  $DateModification;

		$this->_load();
		return $this;
	} 
		
	public function findRangeByDateModification($from,$to)
	{
		$this->_findRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);

		$this->_load();
		return $this;
	} 


	public function findGreaterThanByDateModification($int)
	{
		$this->_findGreaterThanBy['DateModification'] = $int;

		$this->_load();
		return $this;
	} 


	public function findLessThanByDateModification($int)
	{
		$this->_findLessThanBy['DateModification'] = $int;

		$this->_load();
		return $this;
	} 

		
	public function findOneById($Id)
	{
		$this->_findOneBy['Id'] =  $Id;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue)
	{
		$this->_findOneBy['Langue'] =  $Langue;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByStatutTinymce($StatutTinymce)
	{
		$this->_findOneBy['StatutTinymce'] =  $StatutTinymce;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitle($Title)
	{
		$this->_findOneBy['Title'] =  $Title;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySlogan($Slogan)
	{
		$this->_findOneBy['Slogan'] =  $Slogan;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDescription($Description)
	{
		$this->_findOneBy['Description'] =  $Description;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByCopyright($Copyright)
	{
		$this->_findOneBy['Copyright'] =  $Copyright;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByYear($Year)
	{
		$this->_findOneBy['Year'] =  $Year;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByKeywords($Keywords)
	{
		$this->_findOneBy['Keywords'] =  $Keywords;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDateModification($DateModification)
	{
		$this->_findOneBy['DateModification'] =  $DateModification;

		$this->_load();
		return $this->_result;
	} 

		
	public function findByLikeId($Id)
	{
		$this->_findByLike['Id'] =  $Id;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue)
	{
		$this->_findByLike['Langue'] =  $Langue;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeStatutTinymce($StatutTinymce)
	{
		$this->_findByLike['StatutTinymce'] =  $StatutTinymce;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitle($Title)
	{
		$this->_findByLike['Title'] =  $Title;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSlogan($Slogan)
	{
		$this->_findByLike['Slogan'] =  $Slogan;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeDescription($Description)
	{
		$this->_findByLike['Description'] =  $Description;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeCopyright($Copyright)
	{
		$this->_findByLike['Copyright'] =  $Copyright;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeYear($Year)
	{
		$this->_findByLike['Year'] =  $Year;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeKeywords($Keywords)
	{
		$this->_findByLike['Keywords'] =  $Keywords;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeDateModification($DateModification)
	{
		$this->_findByLike['DateModification'] =  $DateModification;

		$this->_load();
		return $this;
	} 

		
	public function filterById($Id, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Id',$Id,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeById($from,$to)
	{
		$this->_filterRangeBy['Id'] =  array(
			'from' => $from,
			'to'   => $to
		);

		$this->_load();
		return $this;
	} 


	public function filterGreaterThanById($int)
	{
		$this->_filterGreaterThanBy['Id'] = $int;

		$this->_load();
		return $this;
	} 


	public function filterLessThanById($int)
	{
		$this->_filterLessThanBy['Id'] = $int;

		$this->_load();
		return $this;
	} 
		
	public function filterByLangue($Langue, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Langue',$Langue,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByStatutTinymce($StatutTinymce, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('StatutTinymce',$StatutTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTitle($Title, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Title',$Title,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySlogan($Slogan, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Slogan',$Slogan,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDescription($Description, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Description',$Description,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByCopyright($Copyright, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Copyright',$Copyright,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByYear($Year, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Year',$Year,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByKeywords($Keywords, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Keywords',$Keywords,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByDateModification($DateModification, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('DateModification',$DateModification,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByDateModification($from,$to)
	{
		$this->_filterRangeBy['DateModification'] =  array(
			'from' => $from,
			'to'   => $to
		);

		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByDateModification($int)
	{
		$this->_filterGreaterThanBy['DateModification'] = $int;

		$this->_load();
		return $this;
	} 


	public function filterLessThanByDateModification($int)
	{
		$this->_filterLessThanBy['DateModification'] = $int;

		$this->_load();
		return $this;
	} 

		
	public function filterLikeById($Id)
	{
		$this->_filterLikeBy['Id'] =  $Id;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue)
	{
		$this->_filterLikeBy['Langue'] =  $Langue;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByStatutTinymce($StatutTinymce)
	{
		$this->_filterLikeBy['StatutTinymce'] =  $StatutTinymce;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitle($Title)
	{
		$this->_filterLikeBy['Title'] =  $Title;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySlogan($Slogan)
	{
		$this->_filterLikeBy['Slogan'] =  $Slogan;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDescription($Description)
	{
		$this->_filterLikeBy['Description'] =  $Description;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByCopyright($Copyright)
	{
		$this->_filterLikeBy['Copyright'] =  $Copyright;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByYear($Year)
	{
		$this->_filterLikeBy['Year'] =  $Year;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByKeywords($Keywords)
	{
		$this->_filterLikeBy['Keywords'] =  $Keywords;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDateModification($DateModification)
	{
		$this->_filterLikeBy['DateModification'] =  $DateModification;

		$this->_load();
		return $this;
	} 

		
	public function orderById($direction = 'ASC')
	{
		$this->loadDirection('id',$direction);
		
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC')
	{
		$this->loadDirection('langue',$direction);
		
		return $this;
	} 
		
	public function orderByStatutTinymce($direction = 'ASC')
	{
		$this->loadDirection('statut_tinymce',$direction);
		
		return $this;
	} 
		
	public function orderByTitle($direction = 'ASC')
	{
		$this->loadDirection('title',$direction);
		
		return $this;
	} 
		
	public function orderBySlogan($direction = 'ASC')
	{
		$this->loadDirection('slogan',$direction);
		
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC')
	{
		$this->loadDirection('description',$direction);
		
		return $this;
	} 
		
	public function orderByCopyright($direction = 'ASC')
	{
		$this->loadDirection('copyright',$direction);
		
		return $this;
	} 
		
	public function orderByYear($direction = 'ASC')
	{
		$this->loadDirection('year',$direction);
		
		return $this;
	} 
		
	public function orderByKeywords($direction = 'ASC')
	{
		$this->loadDirection('keywords',$direction);
		
		return $this;
	} 
		
	public function orderByDateModification($direction = 'ASC')
	{
		$this->loadDirection('date_modification',$direction);
		
		return $this;
	} 

	

	public function _getMap() { 

		
		$parentMap = parent::_getMap();

		return array_merge($parentMap, array(            
		    'Id' =>  'id',            
		    'Langue' =>  'langue',            
		    'StatutTinymce' =>  'statut_tinymce',            
		    'Title' =>  'title',            
		    'Slogan' =>  'slogan',            
		    'Description' =>  'description',            
		    'Copyright' =>  'copyright',            
		    'Year' =>  'year',            
		    'Keywords' =>  'keywords',            
		    'DateModification' =>  'date_modification',		
		)); 

	} 


}