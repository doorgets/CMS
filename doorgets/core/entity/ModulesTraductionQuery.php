<?php

class ModulesTraductionQuery extends AbstractQuery 
{

	protected $_table = '_modules_traduction';
    
    protected $_className = 'ModulesTraduction';

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
		
	public function findByIdModule($IdModule)
	{
		$this->_findBy['IdModule'] =  $IdModule;

		$this->_load();
		return $this;
	} 
		
	public function findRangeByIdModule($from,$to)
	{
		$this->_findRangeBy['IdModule'] =  array(
			'from' => $from,
			'to'   => $to
		);

		$this->_load();
		return $this;
	} 


	public function findGreaterThanByIdModule($int)
	{
		$this->_findGreaterThanBy['IdModule'] = $int;

		$this->_load();
		return $this;
	} 


	public function findLessThanByIdModule($int)
	{
		$this->_findLessThanBy['IdModule'] = $int;

		$this->_load();
		return $this;
	} 
		
	public function findByLangue($Langue)
	{
		$this->_findBy['Langue'] =  $Langue;

		$this->_load();
		return $this;
	} 
		
	public function findByNom($Nom)
	{
		$this->_findBy['Nom'] =  $Nom;

		$this->_load();
		return $this;
	} 
		
	public function findByTitre($Titre)
	{
		$this->_findBy['Titre'] =  $Titre;

		$this->_load();
		return $this;
	} 
		
	public function findByDescription($Description)
	{
		$this->_findBy['Description'] =  $Description;

		$this->_load();
		return $this;
	} 
		
	public function findBySendMailTo($SendMailTo)
	{
		$this->_findBy['SendMailTo'] =  $SendMailTo;

		$this->_load();
		return $this;
	} 
		
	public function findByTopTinymce($TopTinymce)
	{
		$this->_findBy['TopTinymce'] =  $TopTinymce;

		$this->_load();
		return $this;
	} 
		
	public function findByBottomTinymce($BottomTinymce)
	{
		$this->_findBy['BottomTinymce'] =  $BottomTinymce;

		$this->_load();
		return $this;
	} 
		
	public function findByExtras($Extras)
	{
		$this->_findBy['Extras'] =  $Extras;

		$this->_load();
		return $this;
	} 
		
	public function findBySendMailUser($SendMailUser)
	{
		$this->_findBy['SendMailUser'] =  $SendMailUser;

		$this->_load();
		return $this;
	} 
		
	public function findBySendMailName($SendMailName)
	{
		$this->_findBy['SendMailName'] =  $SendMailName;

		$this->_load();
		return $this;
	} 
		
	public function findBySendMailEmail($SendMailEmail)
	{
		$this->_findBy['SendMailEmail'] =  $SendMailEmail;

		$this->_load();
		return $this;
	} 
		
	public function findBySendMailSujet($SendMailSujet)
	{
		$this->_findBy['SendMailSujet'] =  $SendMailSujet;

		$this->_load();
		return $this;
	} 
		
	public function findBySendMailMessage($SendMailMessage)
	{
		$this->_findBy['SendMailMessage'] =  $SendMailMessage;

		$this->_load();
		return $this;
	} 
		
	public function findByMetaTitre($MetaTitre)
	{
		$this->_findBy['MetaTitre'] =  $MetaTitre;

		$this->_load();
		return $this;
	} 
		
	public function findByMetaDescription($MetaDescription)
	{
		$this->_findBy['MetaDescription'] =  $MetaDescription;

		$this->_load();
		return $this;
	} 
		
	public function findByMetaKeys($MetaKeys)
	{
		$this->_findBy['MetaKeys'] =  $MetaKeys;

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
		
	public function findOneByIdModule($IdModule)
	{
		$this->_findOneBy['IdModule'] =  $IdModule;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByLangue($Langue)
	{
		$this->_findOneBy['Langue'] =  $Langue;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByNom($Nom)
	{
		$this->_findOneBy['Nom'] =  $Nom;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTitre($Titre)
	{
		$this->_findOneBy['Titre'] =  $Titre;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByDescription($Description)
	{
		$this->_findOneBy['Description'] =  $Description;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendMailTo($SendMailTo)
	{
		$this->_findOneBy['SendMailTo'] =  $SendMailTo;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByTopTinymce($TopTinymce)
	{
		$this->_findOneBy['TopTinymce'] =  $TopTinymce;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByBottomTinymce($BottomTinymce)
	{
		$this->_findOneBy['BottomTinymce'] =  $BottomTinymce;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByExtras($Extras)
	{
		$this->_findOneBy['Extras'] =  $Extras;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendMailUser($SendMailUser)
	{
		$this->_findOneBy['SendMailUser'] =  $SendMailUser;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendMailName($SendMailName)
	{
		$this->_findOneBy['SendMailName'] =  $SendMailName;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendMailEmail($SendMailEmail)
	{
		$this->_findOneBy['SendMailEmail'] =  $SendMailEmail;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendMailSujet($SendMailSujet)
	{
		$this->_findOneBy['SendMailSujet'] =  $SendMailSujet;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneBySendMailMessage($SendMailMessage)
	{
		$this->_findOneBy['SendMailMessage'] =  $SendMailMessage;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMetaTitre($MetaTitre)
	{
		$this->_findOneBy['MetaTitre'] =  $MetaTitre;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMetaDescription($MetaDescription)
	{
		$this->_findOneBy['MetaDescription'] =  $MetaDescription;

		$this->_load();
		return $this->_result;
	} 
		
	public function findOneByMetaKeys($MetaKeys)
	{
		$this->_findOneBy['MetaKeys'] =  $MetaKeys;

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
		
	public function findByLikeIdModule($IdModule)
	{
		$this->_findByLike['IdModule'] =  $IdModule;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeLangue($Langue)
	{
		$this->_findByLike['Langue'] =  $Langue;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeNom($Nom)
	{
		$this->_findByLike['Nom'] =  $Nom;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeTitre($Titre)
	{
		$this->_findByLike['Titre'] =  $Titre;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeDescription($Description)
	{
		$this->_findByLike['Description'] =  $Description;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendMailTo($SendMailTo)
	{
		$this->_findByLike['SendMailTo'] =  $SendMailTo;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeTopTinymce($TopTinymce)
	{
		$this->_findByLike['TopTinymce'] =  $TopTinymce;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeBottomTinymce($BottomTinymce)
	{
		$this->_findByLike['BottomTinymce'] =  $BottomTinymce;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeExtras($Extras)
	{
		$this->_findByLike['Extras'] =  $Extras;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendMailUser($SendMailUser)
	{
		$this->_findByLike['SendMailUser'] =  $SendMailUser;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendMailName($SendMailName)
	{
		$this->_findByLike['SendMailName'] =  $SendMailName;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendMailEmail($SendMailEmail)
	{
		$this->_findByLike['SendMailEmail'] =  $SendMailEmail;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendMailSujet($SendMailSujet)
	{
		$this->_findByLike['SendMailSujet'] =  $SendMailSujet;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeSendMailMessage($SendMailMessage)
	{
		$this->_findByLike['SendMailMessage'] =  $SendMailMessage;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeMetaTitre($MetaTitre)
	{
		$this->_findByLike['MetaTitre'] =  $MetaTitre;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeMetaDescription($MetaDescription)
	{
		$this->_findByLike['MetaDescription'] =  $MetaDescription;

		$this->_load();
		return $this;
	} 
		
	public function findByLikeMetaKeys($MetaKeys)
	{
		$this->_findByLike['MetaKeys'] =  $MetaKeys;

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
		
	public function filterByIdModule($IdModule, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('IdModule',$IdModule,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterRangeByIdModule($from,$to)
	{
		$this->_filterRangeBy['IdModule'] =  array(
			'from' => $from,
			'to'   => $to
		);

		$this->_load();
		return $this;
	} 


	public function filterGreaterThanByIdModule($int)
	{
		$this->_filterGreaterThanBy['IdModule'] = $int;

		$this->_load();
		return $this;
	} 


	public function filterLessThanByIdModule($int)
	{
		$this->_filterLessThanBy['IdModule'] = $int;

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
		
	public function filterByNom($Nom, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Nom',$Nom,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTitre($Titre, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Titre',$Titre,$_condition);

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
		
	public function filterBySendMailTo($SendMailTo, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SendMailTo',$SendMailTo,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByTopTinymce($TopTinymce, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('TopTinymce',$TopTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByBottomTinymce($BottomTinymce, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('BottomTinymce',$BottomTinymce,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByExtras($Extras, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('Extras',$Extras,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySendMailUser($SendMailUser, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SendMailUser',$SendMailUser,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySendMailName($SendMailName, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SendMailName',$SendMailName,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySendMailEmail($SendMailEmail, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SendMailEmail',$SendMailEmail,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySendMailSujet($SendMailSujet, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SendMailSujet',$SendMailSujet,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterBySendMailMessage($SendMailMessage, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('SendMailMessage',$SendMailMessage,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMetaTitre($MetaTitre, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MetaTitre',$MetaTitre,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMetaDescription($MetaDescription, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MetaDescription',$MetaDescription,$_condition);

		$this->_load();
		return $this;
	} 
		
	public function filterByMetaKeys($MetaKeys, $condition = 'AND')
	{
		
		$_condition = $this->isAndOr($condition);
		$this->loadFilterBy('MetaKeys',$MetaKeys,$_condition);

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
		
	public function filterLikeByIdModule($IdModule)
	{
		$this->_filterLikeBy['IdModule'] =  $IdModule;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByLangue($Langue)
	{
		$this->_filterLikeBy['Langue'] =  $Langue;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByNom($Nom)
	{
		$this->_filterLikeBy['Nom'] =  $Nom;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTitre($Titre)
	{
		$this->_filterLikeBy['Titre'] =  $Titre;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByDescription($Description)
	{
		$this->_filterLikeBy['Description'] =  $Description;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendMailTo($SendMailTo)
	{
		$this->_filterLikeBy['SendMailTo'] =  $SendMailTo;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByTopTinymce($TopTinymce)
	{
		$this->_filterLikeBy['TopTinymce'] =  $TopTinymce;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByBottomTinymce($BottomTinymce)
	{
		$this->_filterLikeBy['BottomTinymce'] =  $BottomTinymce;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByExtras($Extras)
	{
		$this->_filterLikeBy['Extras'] =  $Extras;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendMailUser($SendMailUser)
	{
		$this->_filterLikeBy['SendMailUser'] =  $SendMailUser;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendMailName($SendMailName)
	{
		$this->_filterLikeBy['SendMailName'] =  $SendMailName;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendMailEmail($SendMailEmail)
	{
		$this->_filterLikeBy['SendMailEmail'] =  $SendMailEmail;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendMailSujet($SendMailSujet)
	{
		$this->_filterLikeBy['SendMailSujet'] =  $SendMailSujet;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeBySendMailMessage($SendMailMessage)
	{
		$this->_filterLikeBy['SendMailMessage'] =  $SendMailMessage;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMetaTitre($MetaTitre)
	{
		$this->_filterLikeBy['MetaTitre'] =  $MetaTitre;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMetaDescription($MetaDescription)
	{
		$this->_filterLikeBy['MetaDescription'] =  $MetaDescription;

		$this->_load();
		return $this;
	} 
		
	public function filterLikeByMetaKeys($MetaKeys)
	{
		$this->_filterLikeBy['MetaKeys'] =  $MetaKeys;

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
		
	public function orderByIdModule($direction = 'ASC')
	{
		$this->loadDirection('id_module',$direction);
		
		return $this;
	} 
		
	public function orderByLangue($direction = 'ASC')
	{
		$this->loadDirection('langue',$direction);
		
		return $this;
	} 
		
	public function orderByNom($direction = 'ASC')
	{
		$this->loadDirection('nom',$direction);
		
		return $this;
	} 
		
	public function orderByTitre($direction = 'ASC')
	{
		$this->loadDirection('titre',$direction);
		
		return $this;
	} 
		
	public function orderByDescription($direction = 'ASC')
	{
		$this->loadDirection('description',$direction);
		
		return $this;
	} 
		
	public function orderBySendMailTo($direction = 'ASC')
	{
		$this->loadDirection('send_mail_to',$direction);
		
		return $this;
	} 
		
	public function orderByTopTinymce($direction = 'ASC')
	{
		$this->loadDirection('top_tinymce',$direction);
		
		return $this;
	} 
		
	public function orderByBottomTinymce($direction = 'ASC')
	{
		$this->loadDirection('bottom_tinymce',$direction);
		
		return $this;
	} 
		
	public function orderByExtras($direction = 'ASC')
	{
		$this->loadDirection('extras',$direction);
		
		return $this;
	} 
		
	public function orderBySendMailUser($direction = 'ASC')
	{
		$this->loadDirection('send_mail_user',$direction);
		
		return $this;
	} 
		
	public function orderBySendMailName($direction = 'ASC')
	{
		$this->loadDirection('send_mail_name',$direction);
		
		return $this;
	} 
		
	public function orderBySendMailEmail($direction = 'ASC')
	{
		$this->loadDirection('send_mail_email',$direction);
		
		return $this;
	} 
		
	public function orderBySendMailSujet($direction = 'ASC')
	{
		$this->loadDirection('send_mail_sujet',$direction);
		
		return $this;
	} 
		
	public function orderBySendMailMessage($direction = 'ASC')
	{
		$this->loadDirection('send_mail_message',$direction);
		
		return $this;
	} 
		
	public function orderByMetaTitre($direction = 'ASC')
	{
		$this->loadDirection('meta_titre',$direction);
		
		return $this;
	} 
		
	public function orderByMetaDescription($direction = 'ASC')
	{
		$this->loadDirection('meta_description',$direction);
		
		return $this;
	} 
		
	public function orderByMetaKeys($direction = 'ASC')
	{
		$this->loadDirection('meta_keys',$direction);
		
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
		    'IdModule' =>  'id_module',            
		    'Langue' =>  'langue',            
		    'Nom' =>  'nom',            
		    'Titre' =>  'titre',            
		    'Description' =>  'description',            
		    'SendMailTo' =>  'send_mail_to',            
		    'TopTinymce' =>  'top_tinymce',            
		    'BottomTinymce' =>  'bottom_tinymce',            
		    'Extras' =>  'extras',            
		    'SendMailUser' =>  'send_mail_user',            
		    'SendMailName' =>  'send_mail_name',            
		    'SendMailEmail' =>  'send_mail_email',            
		    'SendMailSujet' =>  'send_mail_sujet',            
		    'SendMailMessage' =>  'send_mail_message',            
		    'MetaTitre' =>  'meta_titre',            
		    'MetaDescription' =>  'meta_description',            
		    'MetaKeys' =>  'meta_keys',            
		    'DateModification' =>  'date_modification',		
		)); 

	} 


}