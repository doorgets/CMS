<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


class MyInboxView extends doorGetsUserView{
    
    
    public function __construct(&$doorGets) {

        $doorGets->Table  = '_users_inbox';
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out                = '';
        $tableName          = $this->doorGets->Table;
        $User               = $this->doorGets->user;
        $allModules         = $this->doorGets->loadModules(true);
        $hasSender          = false;
        $myActivatedInboxUri = array();
        $sqlInboxUser = '';
        

        $Rubriques = array(
            
            'new'           => $this->doorGets->__('Envoyer un message'),
            'index'         => $this->doorGets->__('Messages'),
            'sent'         	=> $this->doorGets->__('Messages envoyés'),
            'select'        => $this->doorGets->__('Voir un message'),
            'trash'         => $this->doorGets->__('Corbeille'),
            'delete'        => $this->doorGets->__('Supprimer un message')
            
        );

         
        $menuFile = 'user/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_menu';
            
        $tplMenu = Template::getView($menuFile);
        ob_start(); if (is_file($tplMenu)) { include $tplMenu; } $htmlMenu = ob_get_clean();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$tableName);
            if (empty($isContent)) {
                return NULL;
            }

            $isLabelVisible     =   ($isContent["readed"] == 2) ? '<b class="glyphicon glyphicon-eye-close inbox-is-visible"></b>' : '<b class="glyphicon glyphicon-eye-open inbox-is-visible"></b>';
            $isVisibleMessage   =   ($isContent["readed"] == 2) ? $this->doorGets->__("Message non lu") : $this->doorGets->__("Message lu");
            $hasSender          =   ($isContent["id_user"] == $User['id']) ? false : true ;
            
            if ($hasSender) {

                $idNextContent      = $this->doorGets->getMyInboxContentPositionDate($isContent['id'],$User['id'],true);
                $idPreviousContent  = $this->doorGets->getMyInboxContentPositionDate($isContent['id'],$User['id'],true,'prev');
            } else {

                $idNextContent      = $this->doorGets->getMyInboxContentPositionDate($isContent['id'],$User['id']);
                $idPreviousContent  = $this->doorGets->getMyInboxContentPositionDate($isContent['id'],$User['id'],false,'prev');
            }
            
            $urlPrevious = '';
            if (!empty($idPreviousContent)) {
                $urlPrevious = '?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$idPreviousContent;
            }
            $urlNext = '';
            if (!empty($idNextContent)) {
                $urlNext = '?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$idNextContent;
            }
        }
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            
            switch($this->Action) {
                
                case 'index':

                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 50;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel =$this->doorGets->getLangueTradution();
                    
                    
                    $isFieldArray       = array(
                        
                        "subject"=>$this->doorGets->__('Sujet'),
                        "name"=>$this->doorGets->__('Nom'),
                        "email"=>$this->doorGets->__('E-mail'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('subject','name','email','date_creation',);
                    $isFieldArraySearch = array('subject','name','email','date_creation_start','date_creation_end',);
                    $isFieldArraySearchType = array(
                        
                        'subject'      => array('type' =>'text','value'=>''),
                        'name'        => array('type' =>'text','value'=>''),
                        'email'      => array('type' =>'text','value'=>''),
                        
                    );
                    
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[3];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " $tableName "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>'user_delete','type'=>'=','value'=>0);
                    $arrForCountSearchQuery[] = array('key'=>'id_user','type'=>'=','value'=>$User['id']);
                    
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
                                        
                                        
                                        if (!empty($fromFormat))
                                        { $from = strtotime($fromFormat);  }
                                        
                                        if (!empty($toFormat))
                                        {  $to = strtotime($toFormat); $to = $to + ( 60 * 60 * 24 ); }
                                        
                                        if (strlen(str_replace('_end','',$v)) !== strlen($v)) {
                                            
                                            $nameTable = $tableName.".".$valEnd;
                                            
                                            $sqlLabelSearch .= $nameTable." >= $from AND ";
                                            $sqlLabelSearch .= $nameTable." <= $to AND ";
                                            
                                            $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                            $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                        }
                                        
                                    }else{
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if ($v === 'uri_module') {
                                                
                                                $sqlLabelSearch .= $tableName.".".$v." = '".$valueQP."' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'=','value'=>$valueQP);
                                            
                                            }else{
                                                
                                                $sqlLabelSearch .= $tableName.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'like','value'=>$valueQP);
                                            
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
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery,$sqlInboxUser);
                    //if (empty($myActivatedInboxUri)) { $cResultsInt = 0; }
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
                    $outFilterORDER = $tableName.'.date_creation  '.$getDesc;
                    
                    $getFilter = '';
                    if (
                        array_key_exists('orderby',$params['GET'])
                        && !empty($params['GET']['orderby'])
                        && in_array($params['GET']['orderby'],$isFieldArraySort)
                   ) {
                        
                        $getFilter      = $params['GET']['orderby'];
                        
                        $outFilterORDER = $tableName.'.'.$getFilter.'  '.$getDesc;
                        
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
                    $outSqlGroupe = " WHERE $tableName.id_user = ".$User['id']." AND $tableName.user_delete = 0 ".$sqlInboxUser." ".$sqlLabelSearch;
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
                    
                    $block->addTitle($dgSelMass,'is_visible','td-title');
                    foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $isFieldArraySort[3] )
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
                            $leftFirst = 'first-title left';
                        }
                        
                        $dgLabel = $fieldNameLabel;
                        if (in_array($fieldName,$isFieldArraySort))
                        {
                            $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                        }
                        
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title center");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','edit','td-title');
                    $block->addTitle('','delete','td-title');
                    
                    // Search
                    $isVisible = '<input type="checkbox" class="check-me-mass-all" />';
                    $isVisible = '';
                    
                    $block->addContent('is_visible',$isVisible );
                    
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
                        $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                    }
                    
                    $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        $block->addContent('is_visible','' );
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $block->addContent($nameField,'' );
                        }
                        $block->addContent('date_creation','','center');
                        $block->addContent('edit','','center');
                        $block->addContent('delete','','center');
                        
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $isVisible  = ($all[$i]["readed"] == 2) ? '<b class="glyphicon glyphicon-hand-right inbox-is-visible"></b>' : '<b class="glyphicon glyphicon-eye-open inbox-is-visible"></b>';
                        
                        $urlVisible     = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'">'.$isVisible.'</a>';
                        $urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlSelect        = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-zoom-in"></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],1,$this->doorGets->myLanguage());
                        
                        $block->addContent('is_visible',$urlVisible );
                        
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            
                            if ($nameField === 'sujet') {
                               $all[$i][$nameField] = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'">'.$all[$i][$nameField].'</a>'; 
                            }
                            
                            $block->addContent($nameField, $all[$i][$nameField]);
                        }
                        
                        $block->addContent('date_creation',$dateCreation,'center');
                        $block->addContent('edit',$urlSelect,'center');
                        $block->addContent('delete',$urlDelete,'center');
                        
                    }
                    
                    $formMassDelete = '';
                    
                    $fileFormMassDelete = 'user/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_massdelete_form';
                    $tplFormMassDelete = Template::getView($fileFormMassDelete);
                    ob_start(); if (is_file($tplFormMassDelete)) { include $tplFormMassDelete;} $formMassDelete = ob_get_clean();
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;

                case 'sent':

                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 50;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel =$this->doorGets->getLangueTradution();
                    
                    
                    $isFieldArray       = array(
                        
                        "subject"=>$this->doorGets->__('Sujet'),
                        "pseudo_user"=>$this->doorGets->__('Pseudo'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('subject','pseudo_user','date_creation',);
                    $isFieldArraySearch = array('subject','pseudo_user','date_creation_start','date_creation_end',);
                    $isFieldArraySearchType = array(
                        
                        'subject'      => array('type' =>'text','value'=>''),
                        'pseudo_user'        => array('type' =>'text','value'=>''),
                        
                    );
                    
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[2];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " $tableName "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>'user_sent_delete','type'=>'=','value'=>0);
                    $arrForCountSearchQuery[] = array('key'=>'id_user_sent','type'=>'=','value'=>$User['id']);
                    
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
                                        
                                        
                                        if (!empty($fromFormat))
                                        { $from = strtotime($fromFormat);  }
                                        
                                        if (!empty($toFormat))
                                        {  $to = strtotime($toFormat); $to = $to + ( 60 * 60 * 24 ); }
                                        
                                        if (strlen(str_replace('_end','',$v)) !== strlen($v)) {
                                            
                                            $nameTable = $tableName.".".$valEnd;
                                            
                                            $sqlLabelSearch .= $nameTable." >= $from AND ";
                                            $sqlLabelSearch .= $nameTable." <= $to AND ";
                                            
                                            $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                            $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                        }
                                        
                                    }else{
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if ($v === 'uri_module') {
                                                
                                                $sqlLabelSearch .= $tableName.".".$v." = '".$valueQP."' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'=','value'=>$valueQP);
                                            
                                            }else{
                                                
                                                $sqlLabelSearch .= $tableName.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'like','value'=>$valueQP);
                                            
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
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery,$sqlInboxUser);
                    //if (empty($myActivatedInboxUri)) { $cResultsInt = 0; }
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
                    $outFilterORDER = $tableName.'.date_creation  '.$getDesc;
                    
                    $getFilter = '';
                    if (
                        array_key_exists('orderby',$params['GET'])
                        && !empty($params['GET']['orderby'])
                        && in_array($params['GET']['orderby'],$isFieldArraySort)
                   ) {
                        
                        $getFilter      = $params['GET']['orderby'];
                        
                        $outFilterORDER = $tableName.'.'.$getFilter.'  '.$getDesc;
                        
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
                    $outSqlGroupe = " WHERE $tableName.id_user_sent = ".$User['id']." AND $tableName.user_sent_delete = 0 ".$sqlInboxUser." ".$sqlLabelSearch;
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow()."&action=sent".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=".$this->doorGets->controllerNameNow()."&action=sent".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
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
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow()."&action=sent&page=";
                    $urlPageGo = './?controller='.$this->doorGets->controllerNameNow()."&action=sent";
                    
                    $block->addTitle($dgSelMass,'is_visible','td-title');
                    foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $isFieldArraySort[2] )
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
                            $leftFirst = 'first-title left';
                        }
                        
                        $dgLabel = $fieldNameLabel;
                        if (in_array($fieldName,$isFieldArraySort))
                        {
                            $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                        }
                        
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title center");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','edit','td-title');
                    $block->addTitle('','delete','td-title');
                    
                    // Search
                    $isVisible = '<input type="checkbox" class="check-me-mass-all" />';
                    $isVisible = '';
                    
                    $block->addContent('is_visible',$isVisible );
                    
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
                        $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                    }
                    
                    $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        $block->addContent('is_visible','' );
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $block->addContent($nameField,'' );
                        }
                        $block->addContent('date_creation','','center');
                        $block->addContent('edit','','center');
                        $block->addContent('delete','','center');
                        
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $isVisible  = ($all[$i]["readed"] == 2) ? '<b class="glyphicon glyphicon-eye-close inbox-is-visible"></b>' : '<b class="glyphicon glyphicon-eye-open inbox-is-visible"></b>';
                        
                        $urlVisible     = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'">'.$isVisible.'</a>';
                        $urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlSelect        = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-zoom-in"></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],1,$this->doorGets->myLanguage());
                        
                        $block->addContent('is_visible',$urlVisible );
                        
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            
                            if ($nameField === 'sujet') {
                               $all[$i][$nameField] = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id'].'">'.$all[$i][$nameField].'</a>'; 
                            }
                            
                            $block->addContent($nameField, $all[$i][$nameField]);
                        }
                        
                        $block->addContent('date_creation',$dateCreation,'center');
                        $block->addContent('edit',$urlSelect,'center');
                        $block->addContent('delete',$urlDelete,'center');
                        
                    }
                    
                    $formMassDelete = '';
                    
                    $fileFormMassDelete = 'user/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_massdelete_form';
                    $tplFormMassDelete = Template::getView($fileFormMassDelete);
                    ob_start(); if (is_file($tplFormMassDelete)) { include $tplFormMassDelete;} $formMassDelete = ob_get_clean();
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;

            }

            $ActionFile = 'user/'.$this->doorGets->controllerNameNow().'/user_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        }

        return $out;
    }
}