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


class OrderView extends doorGetsUserView{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        $lgActuel   =$this->doorGets->getLangueTradution();
        $Rubriques  = array(
            
            'index'         => $this->doorGets->__('Commentaire'),
            'add'           => $this->doorGets->__('Ajouter un commentaire'),
            'select'        => $this->doorGets->__('Afficher un commentaire'),
            'delete'        => $this->doorGets->__('Supprimer un commentaire'),
            'massdelete'    => $this->doorGets->__('Suppression par groupe'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            include CONFIGURATION.'status.php';

            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (empty($isContent)) {
                return NULL;
            }
            $countries = $this->doorGets->getArrayForms('country');
            if (empty($isContent['shipping_country'])) {$isContent['shipping_country'] = 'FR';}
            if (empty($isContent['billing_country'])) {$isContent['billing_country'] = 'FR';}
            //$isContent['products'] = @unserialize($isContent['products']);
            $isContent['products'] =  unserialize(base64_decode($isContent['products']));
            $isContent['status_ico'] = Constant::$orderStatus[$isContent['status']];
            $isContent['status_label'] = $statusPayment[$isContent['status']];
            $isContent['amount_with_shipping'] = $this->doorGets->setCurrencyIcon($isContent['amount_with_shipping'],$isContent['currency']);
            $isContent['shipping_amount'] = $this->doorGets->setCurrencyIcon($isContent['shipping_amount'],$isContent['currency']);
            $isContent['amount_profit'] = $this->doorGets->setCurrencyIcon($isContent['amount_profit'],$isContent['currency']);
            $isContent['amount_vat'] = $this->doorGets->setCurrencyIcon($isContent['amount_vat'],$isContent['currency']);
            $isContent['shipping_country'] = $countries[$isContent['shipping_country']];
            $isContent['billing_country'] = $countries[$isContent['billing_country']];
            
            $idNextContent      = $this->doorGets->getIdContentPositionDate($isContent['id']);
            $idPreviousContent  = $this->doorGets->getIdContentPositionDate($isContent['id'],'prev');
            
            $urlPrevious = '';
            if (!empty($idPreviousContent)) {
                $urlPrevious = '?controller='.$this->doorGets->controllerNameNow().'&action=select&uri='.$this->doorGets->Uri.'&id='.$idPreviousContent;
            }
            $urlNext = '';
            if (!empty($idNextContent)) {
                $urlNext = '?controller='.$this->doorGets->controllerNameNow().'&action=select&uri='.$this->doorGets->Uri.'&id='.$idNextContent;
            }
        }
        
        $storeMenuFile = 'user/user_store_menu';
        $tplStoreMenu = Template::getView($storeMenuFile);
        ob_start(); if (is_file($tplStoreMenu)) { include $tplStoreMenu; } $storeMenuHtml = ob_get_clean();

        $groupes = array();
        $aStatutComment = $this->doorGets->getArrayForms('comment_activation');
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 50;
                    
                    
                    
                    $isFieldArray       = array(
                        
                        "id"=>$this->doorGets->__('Id'),
                        "status"=>$this->doorGets->__('Statut'),
                        "reference"=>$this->doorGets->__('Référence'),
                        "amount"=>$this->doorGets->__('Valeur'),
                        "currency"=>$this->doorGets->__('Devise'),
                        "transaction_id"=>$this->doorGets->__('Transaction'),
                        "method_billing"=>$this->doorGets->__('Méthode'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('id','status','reference','amount','currency','transaction_id','method_billing','date_creation',);
                    $isFieldArraySearch = array('id','status','reference','amount','currency','transaction_id','method_billing','date_creation_start','date_creation_end',);
                    $isFieldArraySearchType = array(
                        
                        'id'                  => array('type' =>'text','value'=>''),
                        'status'              => array('type' =>'text','value'=>''),
                        'reference'           => array('type' =>'text','value'=>''),
                        'amount'              => array('type' =>'text','value'=>''),
                        'currency'            => array('type' =>'text','value'=>''),
                        'transaction_id'      => array('type' =>'text','value'=>''),
                        'method_billing'      => array('type' =>'text','value'=>''),
                        
                    );
                    
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = $this->doorGets->Table; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    
                    // Init Query Search
                    $aGroupeFilter = array();
                    if (!empty($isFieldArraySearch)) {
                        
                        // Récupére les paramêtres du get et post pour la recherche par filtre
                        foreach($isFieldArraySearch as $v)
                        {
                            
                            $valueQP = '';
                            if (
                                array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                && !empty($params['GET']['doorGets_search_filter_q_'.$v])
                           ) {
                                
                                $valueQP = trim($params['GET']['doorGets_search_filter_q_'.$v]);
                                $aGroupeFilter['doorGets_search_filter_q_'.$v] = $valueQP;
                                
                            }
                            
                            if (
                                array_key_exists('doorGets_search_filter_q_'.$v,$params['POST'])
                                && !array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                && !empty($params['POST']['doorGets_search_filter_q_'.$v])
                           ) {
                                
                                $valueQP = trim($params['POST']['doorGets_search_filter_q_'.$v]);
                                $aGroupeFilter['doorGets_search_filter_q_'.$v] = $valueQP;
                                
                            }
                            
                            if (
                                ( array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                    && !empty($params['GET']['doorGets_search_filter_q_'.$v])
                                )
                                ||
                                ( array_key_exists('doorGets_search_filter_q_'.$v,$params['POST'])
                                    && !array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                    && !empty($params['POST']['doorGets_search_filter_q_'.$v])
                                )
                           ) {
                                
                                
                                if (!empty($valueQP)) {
                                    
                                    $valEnd = str_replace('_start','',$v);
                                    $valEnd = str_replace('_end','',$v);
                                    
                                    if (in_array($valEnd,$isFieldArrayDate)) {
                                        
                                        if (
                                            array_key_exists('doorGets_search_filter_q_'.$v,$params['GET'])
                                            && !empty($params['GET']['doorGets_search_filter_q_'.$v])
                                       ) {
                                            $fromFormat = trim($params['GET']['doorGets_search_filter_q_'.$valEnd.'_start']);
                                            $toFormat = trim($params['GET']['doorGets_search_filter_q_'.$valEnd.'_end']);
                                            
                                        }else{
                                            $fromFormat = trim($params['POST']['doorGets_search_filter_q_'.$valEnd.'_start']);
                                            $toFormat = trim($params['POST']['doorGets_search_filter_q_'.$valEnd.'_end']);
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
                                                $nameTable = $this->doorGets->Table.".".$valEnd;
                                                
                                                $sqlLabelSearch .= $nameTable." >= $from AND ";
                                                $sqlLabelSearch .= $nameTable." <= $to AND ";
                                                
                                                $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                                $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                                
                                                $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                                
                                            }
                                        }
                                        
                                    }else{
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if ($v === 'uri_module') {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." = '".$valueQP."' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'=','value'=>$valueQP);
                                            
                                            }else{
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                            
                                            }
                                            
                                        }
                                        
                                        $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'='.$valueQP;
                                        
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
                    $outFilterORDER = $this->doorGets->Table.'.date_creation  '.$getDesc;
                    
                    $getFilter = '';
                    if (
                        array_key_exists('orderby',$params['GET'])
                        && !empty($params['GET']['orderby'])
                        && in_array($params['GET']['orderby'],$isFieldArraySort)
                   ) {
                        
                        $getFilter      = $params['GET']['orderby'];
                        
                        $outFilterORDER = $this->doorGets->Table.'.'.$getFilter.'  '.$getDesc;
                        
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
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow().$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=".$this->doorGets->controllerNameNow().$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
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
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow()."&page=";
                    $urlPageGo = './?controller='.$this->doorGets->controllerNameNow();
                    
                    // $block->addTitle($dgSelMass,'sel_mass','td-title');
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
                            $leftFirst = 'first-title tb-50 left';
                        }
                        
                        $dgLabel = $fieldNameLabel;
                        if (in_array($fieldName,$isFieldArraySort))
                        {
                            $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                        }
                        
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title text-center");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','edit','td-title text-center');
                    // $block->addTitle('','delete','td-title text-center');
                    
                    // Search fields
                    
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
                    
                    
                    $valFilterDateStart = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_start',$aGroupeFilter)) {
                        $valFilterDateStart = $aGroupeFilter['doorGets_search_filter_q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['doorGets_search_filter_q_date_creation_end'];
                    }
                    
                    $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    // $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        // $block->addContent('sel_mass','' );
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            
                            $block->addContent($nameField,'' ,' text-center');
                        }
                        $block->addContent('date_creation','','tb-150 text-center');
                        $block->addContent('edit','',' text-center');
                        // $block->addContent('delete','',' text-center');
                        
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlSelect        = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-zoom-in"></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $css = ' text-center';                

                            switch ($nameField) {
                                case 'status':
                                    if (array_key_exists($all[$i][$nameField], Constant::$orderStatus)) {
                                        $all[$i][$nameField] = Constant::$orderStatus[$all[$i][$nameField]];
                                    }
                                    break;
                                case 'currency':
                                    if (array_key_exists($all[$i][$nameField], Constant::$currencyIcon)) {
                                        $all[$i][$nameField] = Constant::$currencyIcon[$all[$i][$nameField]];
                                    }
                                    break;
                            }

                            $block->addContent($nameField, $all[$i][$nameField],$css);
                        }
                        
                        $block->addContent('date_creation',$dateCreation,' text-center');
                        $block->addContent('edit',$urlSelect,' text-center');
                        // $block->addContent('delete',$urlDelete,' text-center');
                        
                    }
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    
                    break;
                
                case 'select':
                    
                    
                    break;
                
                case 'massdelete':
                    
                    $varListeFile = '';
                    $cListe = 0;
                    
                    if (
                        array_key_exists(''.$this->doorGets->controllerNameNow().'_massdelete_groupe_delete',$params['POST'])
                   ) {
                        
                        $varListeFile = $params['POST'][''.$this->doorGets->controllerNameNow().'_massdelete_groupe_delete'];
                        $ListeForDeleted = $this->doorGets->_toArray($varListeFile);
                        $cListe = count($ListeForDeleted);
                        
                    }
                    
                    $formMassDeleteIndex = '';
                    $fileFormMassDeleteIndex = 'user/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_massdelete';
                    $tplFormMassDeleteIndex = Template::getView($fileFormMassDeleteIndex);
                    ob_start(); if (is_file($tplFormMassDeleteIndex)) { include $tplFormMassDeleteIndex;} $formMassDeleteIndex = ob_get_clean();
                    
                    break;
            }
            
            $ActionFile = 'user/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
    
}