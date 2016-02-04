<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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


class ModulesView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $lgActuel = $this->doorGets->getLangueTradution();
        
        // Init action
        $Rubriques = array(
            
            'index'                 => $this->doorGets->__('Index'),
            'addblock'              => $this->doorGets->__('Ajouter'),
            'addsurvey'             => $this->doorGets->__('Ajouter'),
            'addcarousel'           => $this->doorGets->__('Ajouter'),
            //'addshop'               => $this->doorGets->__('Ajouter'),
            'addblog'               => $this->doorGets->__('Ajouter'),
            'addpage'               => $this->doorGets->__('Ajouter'),
            'addgendata'            => $this->doorGets->__('Ajouter'),
            'addgenform'            => $this->doorGets->__('Ajouter'),
            'addmultipage'          => $this->doorGets->__('Ajouter'),
            'addinbox'              => $this->doorGets->__('Ajouter'),
            'addlink'               => $this->doorGets->__('Ajouter'),
            'addnews'               => $this->doorGets->__('Ajouter'),
            'addsharedlinks'        => $this->doorGets->__('Ajouter'),
            'addonepage'            => $this->doorGets->__('Ajouter'),
            'addimage'              => $this->doorGets->__('Ajouter'),
            'addvideo'              => $this->doorGets->__('Ajouter'),
            'addfaq'                => $this->doorGets->__('Ajouter'),
            'addpartner'            => $this->doorGets->__('Ajouter'),
            'editblock'             => $this->doorGets->__('Modifier'),
            'editsurvey'            => $this->doorGets->__('Modifier'),
            'editcarousel'          => $this->doorGets->__('Modifier'),
            //'editshop'              => $this->doorGets->__('Modifier'),
            'editblog'              => $this->doorGets->__('Modifier'),
            'editpage'              => $this->doorGets->__('Modifier'),
            'editmultipage'         => $this->doorGets->__('Modifier'),
            'editinbox'             => $this->doorGets->__('Modifier'),
            'editgenform'           => $this->doorGets->__('Modifier'),
            'editlink'              => $this->doorGets->__('Modifier'),
            'editnews'              => $this->doorGets->__('Modifier'),
            'editonepage'           => $this->doorGets->__('Modifier'),
            'editsharedlinks'       => $this->doorGets->__('Modifier'),
            'editimage'             => $this->doorGets->__('Modifier'),
            'editvideo'             => $this->doorGets->__('Modifier'),
            'editfaq'               => $this->doorGets->__('Modifier'),
            'editpartner'           => $this->doorGets->__('Modifier'),
            'delete'                => $this->doorGets->__('Supprimer'),
            'type'                  => $this->doorGets->__('Module'),
            'massdelete'            => $this->doorGets->__('Supprimer par groupe'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET']) && !array_key_exists('uri',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_modules');
            
            if (!empty($isContent)) {
                
                $lgGroupe = @unserialize($isContent['groupe_traduction']);
                $idLgGroupe = $lgGroupe[$lgActuel];
                
                $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,'_modules_traduction');
                if (!empty($isContentTraduction)) {
                    unset($isContentTraduction['id']);
                    $isContent = array_merge($isContent,$isContentTraduction);
                }
                
                $imageIcone = BASE_DATA.'/_gestion/'.$isContent['image'];
            
                if (!is_file($imageIcone)) {
                    $imageIcone = BASE_IMG.'/ico_module.png';
                }
                
                $isActiveModule = '';
                if (!empty($isContent['active'])) { $isActiveModule = 'checked'; }

                $isPasswordModule = '';
                if (!empty($isContent['with_password'])) { $isPasswordModule = 'checked'; }

                $isAuthorBadge = '';
                if (array_key_exists( 'author_badge', $isContent) && !empty($isContent['author_badge'])) { $isAuthorBadge = 'checked'; }
                
                $isActiveNotification = '';
                if (!empty($isContent['notification_mail'])) { $isActiveNotification = 'checked'; }
                
                $isPublicModule = '';
                if (!empty($isContent['public_module'])) { $isPublicModule = 'checked'; }
                
                $isPublicComment = '';
                if (!empty($isContent['public_comment'])) { $isPublicComment = 'checked'; }
                
                $isPublicAdd = '';
                if (!empty($isContent['public_add'])) { $isPublicAdd = 'checked'; }
                
                $isHomePage = '';
                if (!empty($isContent['is_first'])) { $isHomePage = 'checked'; }
                
                $this->isContent = $isContent;

            }
            
        }
        
        // Init variables form
        $numGroupe = array();
        for($i=1;$i<100;$i++) {
            $numGroupe[$i] = $i;
        }
        
        $editMode = true;
        include CONFIG.'modules.php';
        
        $arrayEmpty = array('' => ' -------' );
        $notifications = $this->doorGets->getAllEmailNotifications();
        $allNotifications = array_merge($arrayEmpty,$notifications);
        
        $ouinon = $this->doorGets->getArrayForms();
        
        $modules = $allModules = $this->doorGets->loadModules(true,true);

        $modulesBlocks      = $this->doorGets->loadModulesBlocks(true);
        $modulesSurvey      = $this->doorGets->loadModulesSurvey(true);
        $modulesCarousel    = $this->doorGets->loadModulesCarousel(true);
        $modulesGenforms    = $this->doorGets->loadModulesGenforms(true);

        $canAddType = array_merge(Constant::$modulesCanAdd,array('genform','carousel'));;
        $moduleType = array('page','blog','news','multipage','video','faq','image','partner','inbox','sharedlinks','onepage');
        $iCountContents = 0;
        
        $_uri_module = str_replace('add', '', $this->Action);
        $_uri_module = str_replace('edit', '', $_uri_module);

        $__uri = $_uri_module.'/';

        (in_array($_uri_module, $moduleType)) ? $_type = 'modules/'  : $_type = 'widgets/';

        if (!array_key_exists($_uri_module, $liste) && array_key_exists($_uri_module, $listeWidgets) ) { 
            $liste = $listeWidgets;
        }
        if (!array_key_exists($_uri_module, $liste)) { 
            $__uri = $_type = '';
        } 

        foreach($modules as $k => $v) {
            
            $allModules[$k]['url_edit'] = "?controller=modules&action=edit".$v['type']."&id=".$v['id'];
            
            if (!in_array($v['type'],$canAddType)) {
                
                unset($modules[$k]);
                $allModules[$k]['count']    = '';
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
                
                
            }else{
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_m_'.$v['uri']);
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
                
            }
            
            if ($v['type'] === 'inbox') {
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_dg_inbox',array(array('key'=>'uri_module','type'=>'=','value'=>$v['uri'])));
                $allModules[$k]['url']      = "?controller=inbox&q_uri_module=".$v['uri'];
            }
            
            if ($v['type'] === 'genform') {
                
                $allModules[$k]['count']    = $this->doorGets->getCountTable('_m_'.$v['uri']);
                $allModules[$k]['url']      = "?controller=module".$v['type']."&uri=".$v['uri'];
            }
            
            $iCountContents += $allModules[$k]['count'];
        }

        $htmlFormAddTop = 'user/modules/user_modules_form_add';
        $tpl = Template::getView($htmlFormAddTop);  ob_start();if (is_file($tpl)) { include $tpl; } $getHtmlFormAddTop = ob_get_clean();


        $htmlFormAddTop = 'user/modules/user_modules_form_edit';
        $tpl = Template::getView($htmlFormAddTop);  ob_start();if (is_file($tpl)) { include $tpl; } $getHtmlFormEditTop = ob_get_clean();
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'addgenform':
                    
                    $Form = $this->doorGets->Form->i;
                    $label = 'input-label';
                    $cLabel = strlen($label);
                    $iLabel = 0;
                    if (!empty($Form)) {
                        foreach($Form as $k=>$v) {
                            $restLabel = substr($k,0,$cLabel);
                            if ($restLabel === $label) {
                                $iLabel++;
                            }
                        }
                        
                    }
                    
                    break;
                
                case 'editgenform':
                    
                    
                    $isContent['extras'] = unserialize(base64_decode($isContent['extras']));
                    
                    $this->genArraysForm($isContent['extras']);
                    
                    $isSendEmailTo = '';
                    if ($isContent['notification_mail'] === '1') { $isSendEmailTo = 'checked'; }
                    $isSendEmailUser = '';
                    if ($isContent['send_mail_user'] === '1') { $isSendEmailUser = 'checked'; }
                    $isActiveRecaptcha = '';
                    if ($isContent['recaptcha'] === '1') { $isActiveRecaptcha = 'checked'; }
                    
                    $Form = $this->doorGets->Form->i;
                    $label = 'input-label';
                    $cLabel = strlen($label);
                    $iLabel = 0;
                    
                    if (!empty($Form)) {
                        foreach($Form as $k=>$v) {
                            $restLabel = substr($k,0,$cLabel);
                            if ($restLabel === $label) {
                                $iLabel++;
                            }
                        }
                        
                    }
                    
                    break;
                
                case 'type':

                    $editMode = false;
                    include CONFIG.'modules.php';

                    break;

                case 'index':
                    
                    $tableName = $this->doorGets->Table;
                    
                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 50;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel = $this->doorGets->getLangueTradution();
                    
                    $arFilterActivation = $this->doorGets->getArrayForms('activation_mod');
                    $groupes = $this->doorGets->loadGroupesOptionToSelect($this->doorGets->Table,'type',Constant::$_modules);

                    $isFieldArray       = array(
                        "titre"=>$this->doorGets->__('Titre'),
                        "uri"=>$this->doorGets->__('Clée'),
                        "active"=>$this->doorGets->__('Statut'),
                        "type"=>$this->doorGets->__('Type'),
                    );
                    
                    $isFieldArraySearchType = array(
                        
                        'titre'      => array('type' =>'text','value'=>''),
                        'uri'        => array('type' =>'text','value'=>''),
                        'type'       => array('type' =>'select','value'=>$groupes),
                        'active'     => array('type' =>'select','value'=>$arFilterActivation),
                        
                    );

                    $isFieldTraductionArray       = array("titre");

                    $isFieldArraySort   = array('titre','uri','active','type',);
                    $isFieldArraySearch = array('titre','uri','active','type',);
                    $isFieldArrayDate   = array();
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " ".$this->doorGets->Table.",".$this->doorGets->Table."_traduction "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.id_module",'type'=>'!=!','value'=>$this->doorGets->Table.".id");
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.langue",'type'=>'like','value'=>$lgActuel);
                    $nextCondition = ' AND (';
                    foreach (Constant::$_modules as $key => $value) {
                        $nextCondition .= ' '.$this->doorGets->Table.".type = '$value' OR ";
                    }
                    $nextCondition = substr($nextCondition,0,-3);
                    $nextCondition .= ')';

                    // Init Query Search
                    $aGroupeFilter = array();
                    if (!empty($isFieldArraySearch)) {
                        
                        // Récupére les paramêtres du get et post pour la recherche par filtre
                        foreach($isFieldArraySearch as $v)
                        {
                            
                            $valueQP = '';
                            if (
                                array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                && (!empty($params['GET']['doorGets_search_filter_q_'.$v])
                                    || ($params['GET']['doorGets_search_filter_q_'.$v] === '0' && $v === 'active'))
                            ) {
                                
                                $valueQP = trim($params['GET']['doorGets_search_filter_q_'.$v]);
                                $aGroupeFilter['doorGets_search_filter_q_'.$v] = $valueQP;
                                
                            }
                            
                            if (
                                array_key_exists('doorGets_search_filter_q_'.$v,$params['POST'])
                                && !array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                && (!empty($params['POST']['doorGets_search_filter_q_'.$v])
                                    || ($params['POST']['doorGets_search_filter_q_'.$v] === '0' && $v === 'active'))
                            ) {
                                
                                $valueQP = trim($params['POST']['doorGets_search_filter_q_'.$v]);
                                $aGroupeFilter['doorGets_search_filter_q_'.$v] = $valueQP;
                                
                            }
                            
                            if (
                                ( array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                    && (!empty($params['GET']['doorGets_search_filter_q_'.$v])
                                    || ($params['GET']['doorGets_search_filter_q_'.$v] === '0' && $v === 'active'))
                                )
                                ||
                                ( array_key_exists('doorGets_search_filter_q_'.$v,$params['POST'])
                                    && !array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                    && (!empty($params['POST']['doorGets_search_filter_q_'.$v])
                                    || ($params['POST']['doorGets_search_filter_q_'.$v] === '0' && $v === 'active'))
                                )
                            ) {
                                
                                if (in_array($v,$isFieldArraySort)) {
                                    
                                    if (in_array($v,$isFieldTraductionArray)) {    
                                        $sqlLabelSearch .= $tableName."_traduction.".$v." LIKE '%".$valueQP."%' AND ";
                                        $arrForCountSearchQuery[] = array('key'=>$tableName."_traduction.".$v,'type'=>'like','value'=>$valueQP);
                                    } else {
                                        $sqlLabelSearch .= $tableName.".".$v." LIKE '%".$valueQP."%' AND ";
                                        $arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'like','value'=>$valueQP);
                                    }
                                }
                                
                            }
                            
                        }
                        
                        // préparation de la requête mysql
                        if (!empty($sqlLabelSearch)) {
                            
                            $sqlLabelSearch = substr($sqlLabelSearch,0,-4);
                            $sqlLabelSearch = " AND ( $sqlLabelSearch ) ";
                            
                        }
                        
                    }
                    
                    // Init Group By
                    if (
                        array_key_exists('gby',$params['GET'])
                        && is_numeric($params['GET']['gby'])
                        && $params['GET']['gby'] < 300
                    ) {
                        $per = $params['GET']['gby'];
                        $urlGroupBy = '&gby='.$per;
                    }
                    
                    // Init count total fields
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery,$nextCondition);
                    
                    // Init categorie
                    $sqlCategorie = '';
                    
                    // Init sort 
                    $getDesc = 'ASC';
                    $getSort = '&desc';
                    if (isset($_GET['desc']))
                    {
                        $getDesc = 'DESC';
                        $getSort = '&asc';
                        $urlSort = '&desc';
                    }
                    
                    // Init filter for order by 
                    $outFilterORDER = $tableName.'_traduction.titre  '.$getDesc;
                    
                    $getFilter = '';
                    if (
                        array_key_exists('orderby',$params['GET'])
                        && !empty($params['GET']['orderby'])
                        && in_array($params['GET']['orderby'],$isFieldArraySort)
                   ) {
                        
                        $getFilter      = $params['GET']['orderby'];
                        
                        if (in_array($getFilter,$isFieldTraductionArray)) { 
                            $outFilterORDER = $tableName.'_traduction.'.$getFilter.'  '.$getDesc;
                        } else {
                            $outFilterORDER = $tableName.'.'.$getFilter.'  '.$getDesc;
                        }
                        $urlOrderby     = '&orderby='.$getFilter;
                        
                    }
                    
                    // Init page position
                    if (
                        array_key_exists('page',$params['GET'])
                        && is_numeric($params['GET']['page'])
                        && $params['GET']['page'] <= (ceil($cResultsInt / $per))
                   ) {
                        
                        $p = $params['GET']['page'];
                        $ini = $p * $per - $per;
                    }
                    
                    $finalPer = $ini+$per;
                    if ($finalPer >  $cResultsInt) {
                        $finalPer = $cResultsInt;
                    }
                    
                    // Create sql query for transaction
                    $outSqlGroupe = " WHERE 1=1 ".$sqlLabelSearch;
                    $sqlLimit = " $outSqlGroupe AND ".$this->doorGets->Table.".id = ".$this->doorGets->Table."_traduction.id_module AND langue = '$lgActuel' $nextCondition ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow().$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=".$this->doorGets->controllerNameNow().$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
                    // Generate the pagination system
                    $valPage = '';
                    if ($cResultsInt > $per) {
                        
                        $valPage = Pagination::page($cResultsInt,$p,$per,$urlPage);
                        
                    }
                    
                    $tAll = " ".$this->doorGets->Table.", ".$this->doorGets->Table."_traduction"; 
                
                    // Select all contents / Query SQL
                    $all = $this->doorGets->dbQA($tAll,$sqlLimit);
                    $cAll = count($all);
                    
                    /**********
                     *
                     *  Start block creation for listing fields
                     * 
                     **********/
                    
                    $block = new BlockTable();
                    
                    $imgTop = '<div class="d-top"></div>';
                    $imgBottom= '<div class="d-bottom"></div>';
                    $block->setClassCss('doorgets-listing');
                    
                    $iPos = 0;
                    $dgSelMass = '';
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow()."&page=";
                    $urlPageGo = './?controller='.$this->doorGets->controllerNameNow();
                    
                    foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $isFieldArraySort[0] )
                       ) {
                            $$_css = ' class="green" ';
                            $$_img = $imgTop;
                            $$_desc = $getSort;
                            if ($getDesc === 'ASC') {
                                $$_img = $imgBottom;
                                $$_desc = '';
                            }
                        }
                        
                        if ($iPos === 0) {
                            $leftFirst = 'first-title text-left';
                        }
                        
                        $dgLabel = $fieldNameLabel;
                        if (in_array($fieldName,$isFieldArraySort))
                        {
                            $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                        }
                        
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title ");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','show','td-title');
                    $block->addTitle('','edit','td-title');
                    $block->addTitle('','delete','td-title');
                    
                    

                    // $valFilterTitle = '';
                    // if (array_key_exists('doorGets_search_filter_q_titre',$aGroupeFilter)) {
                    //     $valFilterTitle = $aGroupeFilter['doorGets_search_filter_q_titre'];
                    // }
                    
                    
                    // $sFilterTitle  = $this->doorGets->Form['_search_filter']->input('','q_titre','text',$valFilterTitle);
                    
                    $outFilter = '';
                    foreach($isFieldArraySearchType as $nameField => $value) {
                        
                        $nameFieldVal   = 'valFilter'.ucfirst($nameField);
                        $sNameFieldVar  = 'sFilter'.ucfirst($nameField);
                        
                        $keyNameField   = 'q_'.$nameField;
                        $keyNameFieldVal   = 'q_'.$nameField;
                        
                        $$nameFieldVal  = '';
                        
                        if (array_key_exists($keyNameField,$aGroupeFilter)) {
                            $$nameFieldVal = $aGroupeFilter[$keyNameField];
                        }
                        
                        switch($value['type']) {
                            
                            case 'text':
                                
                                $$sNameFieldVar = $this->doorGets->Form['_search_filter']->input('',$keyNameFieldVal,'text',$$nameFieldVal);
                                
                                break;
                            case 'select':
                                
                                $$sNameFieldVar  = $this->doorGets->Form['_search_filter']->select('',$keyNameFieldVal,$value['value'],$$nameFieldVal);
                                
                                break;
                            
                        }
                        
                        $block->addContent($nameField,$$sNameFieldVar);
                        
                    }
                    // Search
                    
                    $block->addContent('show','--','tb-30 text-center');
                    $block->addContent('edit','--','tb-30 text-center');
                    $block->addContent('delete','--','tb-30 text-center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {

                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $block->addContent($nameField,'' );
                        }
                        $block->addContent('show','','text-center');
                        $block->addContent('edit','','text-center');
                        $block->addContent('delete','','text-center');
                        
                    }
                    
                    include CONFIG.'modules.php';

                    for($i=0;$i<$cAll;$i++) {
                        
                        $cResultsComInt = '';
                        $cResultsContentsInt = '';
                        $cResultsCatInt = '';
                        $cResultsRub = '-';
                        $idRub = 0;
                        $urlActive = '<i class="fa fa-ban fa-lg red-c"></i>';

                        if (
                            $all[$i]['type'] !== 'page'  
                            && $all[$i]['type'] !== 'inbox'
                            && $all[$i]['type'] !== 'block'
                            && $all[$i]['type'] !== 'carousel'
                            && $all[$i]['type'] !== 'survey'
                            && $all[$i]['type'] !== 'link'
                            && $all[$i]['type'] !== 'onepage' 
                       ) {
                            
                            $iComments = $this->doorGets->dbQ("SELECT COUNT(*) as counter FROM _dg_comments WHERE uri_module = '".$all[$i]['uri']."' ");
                            $cResultsComInt = (int)$iComments[0]['counter'];
                            
                            $iContents = $this->doorGets->dbQ("SELECT COUNT(*) as counters FROM _m_".$this->doorGets->getRealUri($all[$i]['uri'])."  ");
                            $cResultsContentsInt = (int)$iContents[0]['counters'];
                            
                            $iCat = $this->doorGets->dbQ("SELECT COUNT(*) as counters FROM _categories WHERE uri_module = '".$all[$i]['uri']."' ");
                            $cResultsCatInt = (int)$iCat[0]['counters'];
                            
                            $aRubrique = $this->doorGets->dbQS($all[$i]['id_module'],'_rubrique','idModule');
                            if (!empty($aRubrique)) {
                                $cResultsRub = $aRubrique['name'].' <i class="fa fa-sort"></i> '.$aRubrique['ordre'];
                                $idRub = $aRubrique['id'];
                            }
                            
                        }
                        
                        if ($all[$i]['type'] === 'page' || $all[$i]['type'] === 'onepage' || $all[$i]['type'] === 'link' || $all[$i]['type'] === 'block' || $all[$i]['type'] === 'genform' || $all[$i]['type'] === 'carousel' || $all[$i]['type'] === 'survey' ) {
                            
                            $aRubrique = $this->doorGets->dbQS($all[$i]['id_module'],'_rubrique','idModule');
                            if (!empty($aRubrique)) {
                                $cResultsRub = $aRubrique['name'].' <i class="fa fa-sort"></i> '.$aRubrique['ordre'];
                                $idRub = $aRubrique['id'];
                            }
                            
                        }
                        
                        
                        if ($all[$i]['type'] === 'inbox') {
                            
                            $iContents = $this->doorGets->dbQ("SELECT COUNT(*) as counters FROM _dg_inbox WHERE uri_module = '".$all[$i]['uri']."'  ");
                            $cResultsContentsInt = (int)$iContents[0]['counters'];
                            
                            $aRubrique = $this->doorGets->dbQS($all[$i]['id_module'],'_rubrique','idModule');
                            if (!empty($aRubrique)) {
                                $cResultsRub = $aRubrique['name'].' <i class="fa fa-sort"></i> '.$aRubrique['ordre'];
                                $idRub = $aRubrique['id'];
                            }
                            
                        }
                        
                        
                        $isFirstr = $imgFirst = '';
                        if ($all[$i]['is_first']) {
                            
                            $imgFirst = '<img src="'.BASE_IMG.'home.png" class="ico-home" />';
                            $isHomePageIn = 1;
                            
                        }
                        
                        $imgRubrique = '<i class="fa fa-list"></i>';
                        

                        $imageIcone = BASE_IMG.'ico_module.png';
                        if (array_key_exists($all[$i]['type'],$listeInfos)) {$imageIcone = $listeInfos[$all[$i]['type']]['image'];}
                        $urlImage = '<img src="'.$imageIcone.'" class="px36"> ';
                            
                        $urlGerer   = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller=module'.$all[$i]['type'].'&uri='.$all[$i]['uri'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font" ></b></a>';
                        $urlDelete  = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=modules&action=delete&id='.$all[$i]['id_module'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlEdit    = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=modules&action=edit'.$all[$i]['type'].'&id='.$all[$i]['id_module'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-cog" ></b></a>';
                        
                        if ($all[$i]['active'] === '1') {
                            $urlActive ='<i class="fa fa-check fa-lg green-c"></i>'; 
                        }

                        $tGerer = $this->doorGets->__("Gérer le contenu du module").' '.$all[$i]['uri'];
                        $tEditer = $this->doorGets->__("Paramètres du module").' '.$all[$i]['uri'];
                        $tDel = $this->doorGets->__("Supprimer le module").' '.$all[$i]['uri'];
                        
                        $urlGerer = '<a title="'.$tGerer.'" href="./?controller=module'.$all[$i]['type'].'&uri='.$all[$i]['uri'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                        $urlEditer = '<a title="'.$tEditer.'" href="./?controller=modules&action=edit'.$all[$i]['type'].'&id='.$all[$i]['id_module'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-cog"></b></a>';
                        $urlSupprimer = '<a title="'.$tDel.'" href="./?controller=modules&action=delete&id='.$all[$i]['id_module'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        
                        $urlImage = '<img src="'.$imageIcone.'" class="px36" alt="'.ucfirst($all[$i]['nom']).'" > ';
                        $urlTitre = $imgFirst.ucfirst($all[$i]['titre']);
                        if ($all[$i]['type'] === 'inbox') {
                            $urlImage = '<img src="'.$imageIcone.'" class="px36" >';
                            $urlTitre = $imgFirst.' '.ucfirst($all[$i]['titre']).'';
                            $urlGerer = '<a title="'.$tGerer.'"  href="./?controller='.$all[$i]['type'].'&q_uri_module='.$all[$i]['uri'].'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                        
                        }

                        $urlType = '<em>'.$all[$i]['type'].'</em>';
                        $urlName = '<small><em>'.$all[$i]['uri'].'</em></small>';
                        
                        $urlRubrique = '<a class="size12" href="./?controller=rubriques&action=edit&id='.$idRub.'">'.$imgRubrique.' '.$cResultsRub.'</a>';
                        if ($cResultsRub === '-') { $urlRubrique = ''; } 
                        $all[$i]["uri"] = ' <span class="pull-right">'.$urlRubrique.'</span>'.$all[$i]["uri"];
                        if (!empty($cResultsContentsInt)) {
                            $cResultsContentsInt = number_format($cResultsContentsInt,0,',',' ');
                            $urlTitre = $urlTitre.' '.'<span class="badge right">'.$cResultsContentsInt.'</span>';
                        }
                        
                        $block->addContent('active',$urlActive,'tb-30 text-center');
                        $block->addContent('titre',$urlImage.$urlTitre);
                        $block->addContent('uri',$all[$i]["uri"]);
                        $block->addContent('type',$all[$i]["type"],'tb-70 text-center');
                        $block->addContent('show',$urlGerer,'text-center');
                        $block->addContent('edit',$urlEdit,'text-center');
                        $block->addContent('delete',$urlDelete,'text-center');
                        // $block->addContent('image',$urlImage,'tb-30');
                        // $block->addContent('titre',$urlTitre);
                        // $block->addContent('rubrique',$urlRubrique,'tb-250 ');
                        // $block->addContent('gerer',$urlGerer,'tb-30');
                        // $block->addContent('editer',$urlEditer,'tb-30');
                        // $block->addContent('supprimer',$urlSupprimer,'tb-30');
                        
                    }
                    
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;
                
            }
            $ActionFile = 'user/modules/'.$_type.$__uri.'user_modules_'.$this->Action;
            $tpl = Template::getView($ActionFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        }
        
        return $out;
        
    }
    
    public function getBoxTitle($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lActive = '', $lFilter = '' ,$lCss = '') {
        
        $boxTag = 'user/modules/widgets/genform/user_modules_box_tag_title';
        $tpl = Template::getView($boxTag);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        return $out;
        
    }
    
    public function getBoxQuotte($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lActive = '', $lFilter = '' ,$lCss = '') {
        
        $boxTag = 'user/modules/widgets/genform/user_modules_box_tag_quotte';
        $tpl = Template::getView($boxTag);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        return $out;
        
    }

    public function getBoxSeparateur($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lActive = '', $lFilter = '' ,$lCss = '') {
        
        $boxTag = 'user/modules/widgets/genform/user_modules_box_tag_separateur';
        $tpl = Template::getView($boxTag);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
            
        return $out;
        
    }
    
    public function getBoxText($type="text",$displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lValue = '',$lActive = '',$lObli = '', $lFilter = '' , $lInfo = '' , $lCss = '') {
        
        $boxFile = 'user/modules/widgets/genform/user_modules_box_text';
        $tpl = Template::getView($boxFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getBoxSelect($type="radio",$displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lValue = '',$lActive = '',$lObli = '',  $lInfo = '' , $lCss = '' , $lListe = '') {
        
        $boxFile = 'user/modules/widgets/genform/user_modules_box_select';
        $tpl = Template::getView($boxFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getBoxFile($displayDelete=false,$displayBox=false,$i=0,$lLabel = '',$lValue = '',$lActive = '',$lObli = '',  $lInfo = '' , $lCss = '' , $tZip = '',$tPng = '', $tJpg = '', $tGif = '', $tPdf = '', $tSwf = '', $tDoc = '') {
        
        $boxFile = 'user/modules/widgets/genform/user_modules_box_file';
        $tpl = Template::getView($boxFile);  ob_start();if (is_file($tpl)) { include $tpl; } $out = $tpl; $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function genArraysForm($data) {
        
        
        if (!empty($data)) {
            
            $iLabel = count($data);
            for($i=1;$i<$iLabel+1;$i++) {
                
                $this->doorGets->Form->i['input-type-'.$i]    = 'text';
                $this->doorGets->Form->i['input-label-'.$i]       = $data[$i]['label'];
                $this->doorGets->Form->i['input-css-'.$i]         = $data[$i]['css'];
                
            
                switch ($data[$i]['type']) {
                    
                    case 'tag-title':
                        
                        $this->doorGets->Form->i['input-active-'.$i]  = $data[$i]['active'];
                        
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = 'no';
                        $this->doorGets->Form->i['input-info-'.$i]        = '';
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'tag-title';
                        $this->doorGets->Form->i['input-filter-'.$i]  = $data[$i]['filtre'];
                        break;
                    
                    case 'tag-quotte':
                        
                        $this->doorGets->Form->i['input-active-'.$i]  = $data[$i]['active'];
                        
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = 'no';
                        $this->doorGets->Form->i['input-info-'.$i]        = '';
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'tag-quotte';
                        $this->doorGets->Form->i['input-filter-'.$i]  = $data[$i]['filtre'];
                        break;
                    
                    case 'tag-separateur':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = 'no';
                        $this->doorGets->Form->i['input-info-'.$i]        = '';
                        
                        $this->doorGets->Form->i['input-type-'.$i]        = 'tag-separateur';
                        $this->doorGets->Form->i['input-filter-'.$i]      = $data[$i]['filtre'];
                        break;
                    
                    case 'text':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'text';
                        $this->doorGets->Form->i['input-filter-'.$i]  = $data[$i]['filtre'];
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'textarea':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'textarea';
                        $this->doorGets->Form->i['input-filter-'.$i]  = '';
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'select':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'select';
                        $this->doorGets->Form->i['input-liste-'.$i]   = $data[$i]['liste'];
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'checkbox':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'checkbox';
                        $this->doorGets->Form->i['input-liste-'.$i]   = $data[$i]['liste'];
                        $this->doorGets->Form->i['input-value-'.$i]       = $data[$i]['value'];
                        break;
                    
                    case 'radio':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'radio';
                        $this->doorGets->Form->i['input-liste-'.$i]   = $data[$i]['liste'];
                        $this->doorGets->Form->i['input-value-'.$i]   = $data[$i]['value'];
                        break;
                    
                    case 'file':
                        
                        $this->doorGets->Form->i['input-active-'.$i]      = $data[$i]['active'];
                        $this->doorGets->Form->i['input-obligatoire-'.$i] = $data[$i]['obligatoire'];
                        $this->doorGets->Form->i['input-info-'.$i]        = $data[$i]['info'];
                        
                        $this->doorGets->Form->i['input-type-'.$i]    = 'file';
                        $this->doorGets->Form->i['input-value-'.$i]   = $data[$i]['value'];
                        
                        $this->doorGets->Form->i['input-zip-'.$i] = $data[$i]['file-type']['zip'];
                        $this->doorGets->Form->i['input-png-'.$i] = $data[$i]['file-type']['png'];
                        $this->doorGets->Form->i['input-jpg-'.$i] = $data[$i]['file-type']['jpg'];
                        $this->doorGets->Form->i['input-gif-'.$i] = $data[$i]['file-type']['gif'];
                        $this->doorGets->Form->i['input-pdf-'.$i] = $data[$i]['file-type']['pdf'];
                        $this->doorGets->Form->i['input-swf-'.$i] = $data[$i]['file-type']['swf'];
                        $this->doorGets->Form->i['input-doc-'.$i] = $data[$i]['file-type']['doc'];
                        
                        break;
                }
            }
            
        }
        
    
    }
    
}
