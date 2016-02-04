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


class ModuleShopView extends doorGetsUserModuleView{
    
    public $cart = array();

    public function __construct(&$doorGets) {
        parent::__construct($doorGets);
        $this->cart = new Cart($this->doorGets);
    }

    public function getContent() {

        require CONFIGURATION.'product.php';
        
        $out                = '';
        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        
        $isVersionActive    = false;
        $version_id         = 0;
        
        // Check if is content modo
        $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;

        // Check if is content admin
        $is_admin = (in_array($moduleInfos['id'], $User['liste_module_admin']))?true:false;

        // Check if is module modo
        (
            in_array('module', $User['liste_module_interne'])  
            && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

        // check if user can edit content
        $user_can_add = (in_array($moduleInfos['id'], $User['liste_module_add']))?true:false;
        
        // check if user can edit content
        $user_can_edit = (in_array($moduleInfos['id'], $User['liste_module_edit']))?true:false;

        // check if user can delete content
        $user_can_delete = (in_array($moduleInfos['id'], $User['liste_module_delete']))?true:false;

        // Init count total contents
        $countContents = 0;
        $arrForCountSearchQuery[] = array('key'=>"id_user",'type'=>'=','value'=>$User['id']);
        $countContents = $this->doorGets->getCountTable($this->doorGets->Table,$arrForCountSearchQuery);

        // Check limit to add content
        $isLimited = 0;
        if (array_key_exists($moduleInfos['id'], $User['liste_module_limit']) &&  $User['liste_module_limit'] !== '0') {
            $isLimited = (int)$User['liste_module_limit'][$moduleInfos['id']];
        }
        
        $listeCategories = $this->doorGets->categorieSimple_;
        unset($listeCategories[0]);
        
        $aActivation = $this->doorGets->getArrayForms('product_activation');
        $aStock = $this->doorGets->getArrayForms('product_stock');

        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index'),
            'add'           => $this->doorGets->__('Ajouter'),
            'edit'          => $this->doorGets->__('Modifier'),
            'delete'        => $this->doorGets->__('Supprimer'),
            'massdelete'    => $this->doorGets->__('Supprimer par groupe'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        // $isContent[]
                        $this->isContent = $isContent;
                    }
                    
                }
                
                $idNextContent      = $this->doorGets->getIdContentPosition($isContent['id_content']);
                $idPreviousContent  = $this->doorGets->getIdContentPosition($isContent['id_content'],'prev');
                
                $urlPrevious = '';
                if (!empty($idPreviousContent)) {
                    $urlPrevious = '?controller='.$this->doorGets->controllerNameNow().'&uri='.$this->doorGets->Uri.'&action=edit&id='.$idPreviousContent.'&lg='.$lgActuel;
                }
                $urlNext = '';
                if (!empty($idNextContent)) {
                    $urlNext = '?controller='.$this->doorGets->controllerNameNow().'&uri='.$this->doorGets->Uri.'&action=edit&id='.$idNextContent.'&lg='.$lgActuel;
                }

                $DgDownloadEntity = new DgDownloadEntity($isContent['id_file'],$this->doorGets);
                $isContent['file'] = $DgDownloadEntity->getData();
            }
            
        }

        if (array_key_exists('version',$params['GET']) && $is_modo) {

            $version_id = $params['GET']['version'];
            $isContentVesion = $this->getVersionById($version_id,$isContent);

            if (!empty($isContentVesion)) {

                $isContent = array_merge($isContent,$isContentVesion);
                $isVersionActive    = true;
                
            }
            
        }

        $fileIndexTop = 'modules/'.$this->doorGets->zoneArea().'_index_top';
        $tplIndexTop = Template::getView($fileIndexTop);
        ob_start(); if (is_file($tplIndexTop)) { include $tplIndexTop;} $htmlIndexTop = ob_get_clean();
        
        $fileCategoryLeft = 'modules/'.$this->doorGets->zoneArea().'_category_left';
        $tplCategoryLeft = Template::getView($fileCategoryLeft);
        ob_start(); if (is_file($tplCategoryLeft)) { include $tplCategoryLeft;} $htmlCategoryLeft = ob_get_clean();


        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {

                case 'index':
                    
                    if (!empty($this->doorGets->Uri) && !empty($this->doorGets->Table)) {
                        
                        $q = '';
                        $urlSearchQuery = '';
                        
                        $p = 1;
                        $ini = 0;
                        $per = 10;
                        
                        $params = $this->doorGets->Params();
                        $lgActuel = $this->doorGets->getLangueTradution();
                        
                        $isFieldArray       = array(
                            
                            "id"=>$this->doorGets->__('Id'),
                            "image"=>$this->doorGets->__('Image'),
                            "titre"=>$this->doorGets->__('Titre'),
                            "code"=>$this->doorGets->__('Référence'),
                            "quantity_stock"=>$this->doorGets->__('Stock'),
                            "price"=>$this->doorGets->__('Prix'),
                            "active"=>$this->doorGets->__('Statut'),
                            
                        );
                        

                        $isFieldArraySort   = array('id','active','titre','code','quantity_stock','price');
                        $isInClassicTable   = array('id','active','code');
                        $isFieldArraySearch = array('id','titre','active','code','quantity_stock','price');
                        $isFieldArrayDate   = array();
                        
                        

                        $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                        $urlSearchQuery     = '';
                        $urlSort            = '&desc';
                        $urlLg              = '&lg='.$lgActuel;
                        $urlCategorie       = '';
                        $urlGroupBy         = '&gby='.$per;
                        
                        // Init table query
                        $tAll = $this->doorGets->Table." , ".$this->doorGets->Table."_traduction "; 
                        
                        // Create query search for mysql
                        $sqlLabelSearch = '';
                        $arrForCountSearchQuery = array();
                        $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.id_content",'type'=>'!=!','value'=>$this->doorGets->Table.".id");
                        $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.langue",'type'=>'=','value'=>$lgActuel);
                        
                        // Check if is not modo
                        if (!$is_modo) {
                            $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".id_user",'type'=>'=','value'=>$User['id']);
                        }
                        
                        $sqlUserOther       = '';
                        if ($is_modo) {
                            if (!empty($User['liste_enfant'])) {
                                
                                $sqlUserOther .= " AND ( ( ".$this->doorGets->Table.".id_user = '".$User['id']."' AND ".$this->doorGets->Table.".id_groupe = '".$User['groupe']."' ) ";
                                
                                foreach($User['liste_enfant'] as $id_groupe) {
                                    
                                    $sqlUserOther .= " OR ".$this->doorGets->Table.".id_groupe = '".$id_groupe."' ";
                                    
                                }
                                
                                $sqlUserOther .= ')';
                            }
                        }else{
                            
                            $sqlUserOther = " AND ".$this->doorGets->Table.".id_user = '".$User['id']."' AND ".$this->doorGets->Table.".id_groupe = '".$User['groupe']."' ";
                            
                        }

                        // Init Query Search
                        $aGroupeFilter = array();
                        if (!empty($isFieldArraySearch)) {
                            
                            // Récupére les paramêtres du get et post pour la recherche par filtre
                            foreach($isFieldArraySearch as $v)
                            {
                                
                                $valueQP = '';
                                if (
                                    array_key_exists('q_'.$v,$params['GET'])
                                    && !empty($params['GET']['q_'.$v])
                               ) {
                                    
                                    $valueQP = trim($params['GET']['q_'.$v]);
                                    $aGroupeFilter['q_'.$v] = $valueQP;
                                    
                                }
                                
                                if (
                                    array_key_exists('q_'.$v,$params['POST'])
                                    && !array_key_exists('q_'.$v,$params['GET'])
                                    && !empty($params['POST']['q_'.$v])
                               ) {
                                    
                                    $valueQP = trim($params['POST']['q_'.$v]);
                                    $aGroupeFilter['q_'.$v] = $valueQP;
                                    
                                }
                                
                                if (
                                    ( array_key_exists('q_'.$v,$params['GET'])
                                        && !empty($params['GET']['q_'.$v])
                                    )
                                    ||
                                    ( array_key_exists('q_'.$v,$params['POST'])
                                        && !array_key_exists('q_'.$v,$params['GET'])
                                        && !empty($params['POST']['q_'.$v])
                                    )
                               ) {
                                    
                                    
                                    if (!empty($valueQP)) {
                                        
                                        $valEnd = str_replace('_start','',$v);
                                        $valEnd = str_replace('_end','',$v);
                                        
                                        if (in_array($valEnd,$isFieldArrayDate)) {
                                            
                                            if (
                                                array_key_exists('q_'.$v,$params['GET'])
                                                && !empty($params['GET']['q_'.$v])
                                           ) {
                                                $fromFormat = trim($params['GET']['q_'.$valEnd.'_start']);
                                                $toFormat = trim($params['GET']['q_'.$valEnd.'_end']);
                                                
                                            }else{
                                                $fromFormat = trim($params['POST']['q_'.$valEnd.'_start']);
                                                $toFormat = trim($params['POST']['q_'.$valEnd.'_end']);
                                            }
                                            
                                            $isValStart = $this->doorGets->validateDate($fromFormat);
                                            $isValEnd   = $this->doorGets->validateDate($toFormat);
                                            
                                            $from = "";
                                            $to = "";
                                            
                                            if ($isValStart && $isValEnd) {
                                                
                                                if (!empty($fromFormat) )
                                                { $from = strtotime($fromFormat);  }
                                                
                                                
                                                if (!empty($toFormat) )
                                                {  $to = strtotime($toFormat); $to = $to + ( 60 * 60 * 24 ); }
                                                
                                                if (strlen(str_replace('_end','',$v)) !== strlen($v)) {
                                                    
                                                    $valEnd =  filter_var($valEnd, FILTER_SANITIZE_STRING);
                                                    $nameTable = $tableName.".".$valEnd;
                                                    
                                                    $sqlLabelSearch .= $nameTable." >= $from AND ";
                                                    $sqlLabelSearch .= $nameTable." <= $to AND ";
                                                    
                                                    $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                                    $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                                    
                                                    $urlSearchQuery .= '&q_'.$valEnd.'_end='.$toFormat;
                                                    
                                                }
                                            }
                                            
                                            
                                        }else{
                                            
                                            if (in_array($v,$isInClassicTable))
                                            {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                                
                                            }elseif (in_array($v,$isFieldArraySort)) {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table."_traduction.".$v." LIKE '%".$valueQP."%' AND ";
                                                if ($v === 'pseudo') {
                                                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                                }else{
                                                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.".$v,'type'=>'like','value'=>$valueQP);
                                                }
                                            }
                                            
                                            $urlSearchQuery .= '&q_'.$valEnd.'='.$valueQP;
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
                            
                            $per        = $params['GET']['gby'];
                            $urlGroupBy = '&gby='.$per;
                            
                        }

                        // Init count total fields
                        $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);
                        
                        // Init categorie
                        $sqlCategorie = '';
                        
                        if (
                            array_key_exists('categorie',$params['GET'])
                            && !empty($params['GET']['categorie'])
                            && array_key_exists($params['GET']['categorie'],$this->doorGets->categorieSimple)
                       ) {
                            
                            
                            $getCategorie = $params['GET']['categorie'];
                            
                            $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.categorie','type'=>'like','value'=>'#'.$getCategorie.',');
                            
                            $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);
                            
                            $sqlCategorie = " AND ".$this->doorGets->Table.".categorie LIKE '%#".$getCategorie.",%'";
                            $urlCategorie = '&categorie='.$getCategorie;
                            
                        }
                        
                        // Init sort 
                        $getDesc = 'DESC';
                        $getSort = '&asc';
                        if (isset($_GET['asc']))
                        {
                            $getDesc = 'ASC';
                            $getSort = '&desc';
                            $urlSort = '&asc';
                        }
                        
                        // Init filter for order by 
                        $outFilterORDER = $this->doorGets->Table.'_traduction.date_modification  '.$getDesc;
                        
                        $getFilter = '';
                        if (
                            array_key_exists('orderby',$params['GET'])
                            && !empty($params['GET']['orderby'])
                            && in_array($params['GET']['orderby'],$isFieldArraySort)
                       ) {
                            
                            $getFilter      = $params['GET']['orderby'];
                            
                            $outFilterORDER = $this->doorGets->Table.'_traduction.'.$getFilter.'  '.$getDesc;
                            
                            // Execption for field that not in traduction table
                            if (in_array($getFilter,$isInClassicTable) )
                            {
                                $outFilterORDER = $this->doorGets->Table.'.'.$getFilter.'  '.$getDesc;
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
                        $outSqlGroupe = " WHERE ".$this->doorGets->Table."_traduction.id_content = ".$this->doorGets->Table.".id
                        AND ".$this->doorGets->Table."_traduction.langue = '".$lgActuel."' ".$sqlCategorie." ".$sqlUserOther." ".$sqlLabelSearch;
                        

                        $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                        
                        // Create url to go for pagination
                        $urlPage = "./?controller=module".$moduleInfos['type']."&uri=".$this->doorGets->Uri.$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                        $urlPagePosition = "./?controller=module".$moduleInfos['type']."&uri=".$this->doorGets->Uri.$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
                        // Generate the pagination system
                        $valPage = '';
                        if ($cResultsInt > $per) {
                            
                            $valPage = Pagination::page($cResultsInt,$p,$per,$urlPage);
                            
                        }
                        
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
                        $urlPage = "./?controller=module".$moduleInfos['type']."&uri=".$this->doorGets->Uri.$urlCategorie."&lg=$lgActuel&page=";
                        $urlPageGo = './?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.$urlCategorie.'&lg='.$lgActuel;
                        
                        //$block->addTitle($dgSelMass,'sel_mass','td-title');
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
                            
                            if ($fieldName !== 'titre') {
                                $leftFirst = ' text-center ';
                            }
                            
                            $dgLabel = $fieldNameLabel;
                            if (in_array($fieldName,$isFieldArraySort))
                            {
                                $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                            }
                            
                            $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title");
                            $iPos++;
                            
                        }

                        
                        $block->addTitle('','edit','td-title');
                        $block->addTitle('','delete','td-title');
                        
                        $arFilterActivation = $this->doorGets->getArrayForms('activation');
                        
                        $valFilterTitre = '';
                        if (array_key_exists('q_titre',$aGroupeFilter)) {
                            $valFilterTitre = $aGroupeFilter['q_titre'];
                        }

                        $valFilterId = '';
                        if (array_key_exists('q_id',$aGroupeFilter)) {
                            $valFilterId = $aGroupeFilter['q_id'];
                        }

                        $valFilterActive = 0;
                        if (array_key_exists('q_active',$aGroupeFilter)) {
                            $valFilterActive = $aGroupeFilter['q_active'];
                        }

                        $valFilterPrice = '';
                        if (array_key_exists('q_price',$aGroupeFilter)) {
                            $valFilterPrice = $aGroupeFilter['q_price'];
                        }

                        $valFilterCode = '';
                        if (array_key_exists('q_code',$aGroupeFilter)) {
                            $valFilterCode = $aGroupeFilter['q_code'];
                        }

                        $valFilterQty = '';
                        if (array_key_exists('q_quantity_stock',$aGroupeFilter)) {
                            $valFilterQty = $aGroupeFilter['q_quantity_stock'];
                        }
                        
                        $sFilterActive  = $this->doorGets->Form['_search_filter']->select('','q_active',$arFilterActivation,$valFilterActive);
                        $sFilterTitre   = $this->doorGets->Form['_search_filter']->input('','q_titre','text',$valFilterTitre);
                        $sFilterId   = $this->doorGets->Form['_search_filter']->input('','q_id','text',$valFilterId);
                        $valFilterPrice   = $this->doorGets->Form['_search_filter']->input('','q_price','text',$valFilterPrice);
                        $valFilterQty   = $this->doorGets->Form['_search_filter']->input('','q_quantity_stock','text',$valFilterCode);
                        $valFilterCode   = $this->doorGets->Form['_search_filter']->input('','q_quantity_stock','text',$valFilterCode);

                        
                        // Search
                        $urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
                        $urlMassdelete = '';
                        
                        //$block->addContent('sel_mass',$urlMassdelete );
                        $block->addContent('id',$sFilterId );
                        $block->addContent('image','--','text-center tb-30' );
                        $block->addContent('titre',$sFilterTitre );
                        $block->addContent('code',$valFilterCode ,'text-center tb-100');
                        $block->addContent('price',$valFilterPrice ,'text-center tb-50');
                        $block->addContent('quantity_stock',$valFilterQty ,'text-center tb-50');
                        $block->addContent('active',$sFilterActive ,'text-center tb-30');
                        // $block->addContent('pseudo',$sFilterPseudo ,'text-center');
                        // $block->addContent('date_modification',$sFilterDate,'text-center');
                        $block->addContent('edit','--','text-center');
                        $block->addContent('delete','--','text-center');
                        
                        // end Seach
                        
                        if (empty($cAll)) {
                            
                            foreach($isFieldArray as $fieldName=>$field) {

                                $block->addContent($fieldName,'' );
                            }

                            $block->addContent('edit','','center');
                            $block->addContent('delete','','center');
                            
                        }
                        
                        $cart = $this->cart;
                        for($i=0;$i<$cAll;$i++) {
                            
                            $ImageStatut = 'fa-ban red';
                            if ($all[$i]['active'] == '2') {
                                $ImageStatut = 'fa-eye green-c';
                            } elseif ($all[$i]['active'] == '3') {
                                $ImageStatut = 'fa-hourglass-start orange-c';
                            } elseif ($all[$i]['active'] == '4') {
                                $ImageStatut = 'fa-pencil gris-c';
                            }

                            $urlStatut = '<i class="fa '.$ImageStatut.' fa-lg" ></i>';

                            $urlImage = '';
                            if (!empty($all[$i]['image'])) {
                                $urlImage = '<img src="'.URL.'data/'.$this->doorGets->Uri.'/'.$all[$i]['image'].'" class="ico-shop-list" >';
                            }
                            $urlId = $all[$i]['id_content'];
                            $urlQty = (empty($all[$i]['quantity_limit']))?$all[$i]['quantity_stock']:Constant::$infinite;
                            $urlCode = $all[$i]['code'];
                            $urlPrice = $this->doorGets->setCurrencyIcon($all[$i]['price']*(1+$cart->vat),$this->doorGets->configWeb['currency']);
                            $urlTitle = $all[$i]["titre"];
                            $urlDelete = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=delete&id='.$all[$i]['id_content'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                            $urlEdit = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=edit&id='.$all[$i]['id_content'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                            // $dateCreation = GetDate::in($all[$i]['date_modification'],1,$this->doorGets->myLanguage());
                            
                            $block->addContent('id',$urlId ,'tb-30 text-center');
                            $block->addContent('image',$urlImage );
                            $block->addContent('titre',$urlTitle );
                            $block->addContent('code',$urlCode ,'tb-150 text-center');
                            $block->addContent('quantity_stock',$urlQty ,'tb-30 text-center');
                            $block->addContent('price',$urlPrice ,'tb-30 text-center');
                            $block->addContent('active',$urlStatut ,'tb-30 text-center');
                            // $block->addContent('pseudo',$all[$i]['pseudo'] ,'tb-150 text-center');
                            // $block->addContent('date_modification',$dateCreation,'tb-150 text-center');
                            $block->addContent('edit',$urlEdit,'tb-30 text-center');
                            $block->addContent('delete',$urlDelete,'tb-30 text-center');
                            
                        }

                        $fileSearchTop = 'modules/'.$this->doorGets->zoneArea().'_search_top';
                        $tplSearchTop = Template::getView($fileSearchTop);
                        ob_start(); if (is_file($tplSearchTop)) { include $tplSearchTop;} $htmlSearchTop = ob_get_clean();
                        
                        
                        /**********
                         *
                         *  End block creation for listing fields
                         * 
                         */
                        
                    }
                    
                    break;
                
                case 'add':

                    if ($isLimited && $countContents >= $isLimited) {
                        $fileLimited = 'modules/'.$this->doorGets->zoneArea().'_limited';
                        $tplLimited = Template::getView($fileLimited);
                        ob_start(); if (is_file($tplLimited)) { include $tplLimited;} $htmlLimited = ob_get_clean();

                        return $htmlLimited;
                    }

                    unset($aActivation[3]);
                    
                    $isAuthorBadge = '';
                    if ($moduleInfos['author_badge']) {
                        $isAuthorBadge = 'checked';
                    }

                    $formAddTop = $formAddBottom = '';
                    $fileFormAddTop = 'modules/'.$this->doorGets->zoneArea().'_form_add_top';
                    $tplFormAddTop = Template::getView($fileFormAddTop);
                    ob_start(); if (is_file($tplFormAddTop)) { include $tplFormAddTop; } $formAddTop = ob_get_clean();

                    $formAddTopExtra = $formAddBottomExtra = '';
                    $fileFormAddTopExtra = 'modules/'.$this->doorGets->zoneArea().'_form_add_top_extra';
                    $tplFormAddTopExtra = Template::getView($fileFormAddTopExtra);
                    ob_start(); if (is_file($tplFormAddTopExtra)) { include $tplFormAddTopExtra; } $formAddTopExtra = ob_get_clean();
                    
                    $fileAddTop = 'modules/'.$this->doorGets->zoneArea().'_add_top';
                    $tplAddTop = Template::getView($fileAddTop);
                    ob_start(); if (is_file($tplAddTop)) { include $tplAddTop;} $htmlAddTop = ob_get_clean();
                    
                    $fileFormAddBottom = 'modules/'.$this->doorGets->zoneArea().'_form_add_bottom';
                    $tplFormAddBottom = Template::getView($fileFormAddBottom);
                    ob_start(); if (is_file($tplFormAddBottom)) { include $tplFormAddBottom;} $formAddBottom = ob_get_clean();
                    
                    $fileFormAddBottomExtra = 'modules/'.$this->doorGets->zoneArea().'_form_add_bottom_extra';
                    $tplFormAddBottomExtra = Template::getView($fileFormAddBottomExtra);
                    ob_start(); if (is_file($tplFormAddBottomExtra)) { include $tplFormAddBottomExtra;} $formAddBottomExtra = ob_get_clean();

                    
                    break;
                
                case 'edit':
                    
                    $isActiveContent =  $isActiveComments =  $isActiveEmail = '';
                    $isAuthorBadge = $isActivePartage =  $isActiveFacebook =   $isActiveDisqus =  $isActiveRss = '';
                    
                    if (!empty($isContent['active'])) { $isActiveContent = 'checked'; }
                    if (!empty($isContent['author_badge'])) { $isAuthorBadge = 'checked'; }
                    if (!empty($isContent['comments'])) { $isActiveComments = 'checked'; }
                    if (!empty($isContent['partage'])) { $isActivePartage = 'checked'; }
                    if (!empty($isContent['mailsender'])) { $isActiveEmail = 'checked'; }
                    if (!empty($isContent['facebook'])) { $isActiveFacebook = 'checked'; }
                    if (!empty($isContent['in_rss'])) { $isActiveRss = 'checked'; }
                    if (!empty($isContent['disqus'])) { $isActiveDisqus = 'checked'; }

                    $isActiveQuantityLimit = $isActiveQuantityNostock = '';
                    $isActiveOptSale = $isActiveOptShowPrice = $isActiveOptOnlyWeb = '';
                    $isActivePromotion = $isActiveIsFree = $isActivePromotionCode = '';

                    $hasUnlimited = false;
                    if (!empty($isContent['quantity_limit'])) { $isActiveQuantityLimit = 'checked'; $hasUnlimited = true;}
                    if (!empty($isContent['quantity_nostock'])) { $isActiveQuantityNostock = 'checked'; }
                    if (!empty($isContent['opt_sale'])) { $isActiveOptSale = 'checked'; }
                    if (!empty($isContent['opt_show_price'])) { $isActiveOptShowPrice = 'checked'; }
                    if (!empty($isContent['opt_only_web'])) { $isActiveOptOnlyWeb = 'checked'; }
                    if (!empty($isContent['promotion_active'])) { $isActivePromotion = 'checked'; }
                    if (!empty($isContent['promotion_code_active'])) { $isActivePromotionCode = 'checked'; }
                    if (!empty($isContent['is_free'])) { $isActiveIsFree = 'checked'; }
                    
                    if (!empty($isContent) && in_array($moduleInfos['type'],Constant::$modulesWithGallery)) {
                        $image_gallery = $this->doorGets->_toArray($isContent['image_gallery'],';');
                    }
                    
                    $htmlCanotEdit = '';
                    $fileCanotEdit = 'modules/'.$this->doorGets->zoneArea().'_canot_edit';
                    $tplCanotEdit = Template::getView($fileCanotEdit);
                    ob_start(); if (is_file($tplCanotEdit)) { include $tplCanotEdit;} $htmlCanotEdit = ob_get_clean();

                    $formEditTop = $formEditBottom = '';
                    $fileFormEditTop = 'modules/'.$this->doorGets->zoneArea().'_form_edit_top';
                    $tplFormEditTop = Template::getView($fileFormEditTop);
                    ob_start(); if (is_file($tplFormEditTop)) { include $tplFormEditTop; } $formEditTop = ob_get_clean();
                    
                    $fileFormEditBottom = 'modules/'.$this->doorGets->zoneArea().'_form_edit_bottom';
                    $tplFormEditBottom = Template::getView($fileFormEditBottom);
                    ob_start(); if (is_file($tplFormEditBottom)) { include $tplFormEditBottom;} $formEditBottom = ob_get_clean();
                    
                    $formEditTopExtra = $formEditBottomExtra = '';
                    $fileFormEditTopExtra = 'modules/'.$this->doorGets->zoneArea().'_form_edit_top_extra';
                    $tplFormEditTopExtra = Template::getView($fileFormEditTopExtra);
                    ob_start(); if (is_file($tplFormEditTopExtra)) { include $tplFormEditTopExtra; } $formEditTopExtra = ob_get_clean();
                    
                    $fileFormEditBottomExtra = 'modules/'.$this->doorGets->zoneArea().'_form_edit_bottom_extra';
                    $tplFormEditBottomExtra = Template::getView($fileFormEditBottomExtra);
                    ob_start(); if (is_file($tplFormEditBottomExtra)) { include $tplFormEditBottomExtra;} $formEditBottomExtra = ob_get_clean();

                    $fileEditTop = 'modules/'.$this->doorGets->zoneArea().'_edit_top';
                    $tplEditTop = Template::getView($fileEditTop);
                    ob_start(); if (is_file($tplEditTop)) { include $tplEditTop;} $htmlEditTop = ob_get_clean();

                    break;
                
                case 'delete':
                    
                    $htmlCanotDelete = '';
                    $fileCanotDelete = 'modules/'.$this->doorGets->zoneArea().'_canot_delete';
                    $tplCanotDelete = Template::getView($fileCanotDelete);
                    ob_start(); if (is_file($tplCanotDelete)) { include $tplCanotDelete;} $htmlCanotDelete = ob_get_clean();

                    $formDelete = '';
                    $fileFormDelete = 'modules/'.$this->doorGets->zoneArea().'_form_delete';
                    $tplFormDelete = Template::getView($fileFormDelete);
                    ob_start(); if (is_file($tplFormDelete)) { include $tplFormDelete;} $formDelete = ob_get_clean();
                    
                    break;
                
                
            }
            
            $ActionFile = 'modules/'.$this->doorGets->controllerNameNow().'/'.$this->doorGets->zoneArea().'_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
}
