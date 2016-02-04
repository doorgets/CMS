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


class EmailingView extends doorGetsUserView{
    
    public $listGroupe;
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        $this->listGroupe = $this->getEmaillingGroupes();
    }
    
    public function getContent() {
        
        $out = '';
        $tableName = '_dg_newsletter';
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Contact'),
            'add'           => $this->doorGets->__('Ajouter un contact'),
            'edit'          => $this->doorGets->__('Editer un contact'),
            'delete'        => $this->doorGets->__('Supprimer un contact'),
            'massdelete'    => $this->doorGets->__('Suppression par groupe'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$tableName);
            if (empty($isContent)) {
                return NULL;
            }
        }
        
        $groupes = $this->doorGets->loadGroupesToSelect();
        $aUsersActivation = $this->doorGets->getArrayForms('users_activation');
        
        
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
                    $lgActuel = $this->doorGets->getLangueTradution();
                    
                    $isFieldArray       = array(
                        
                        "nom"=>$this->doorGets->__('Nom'),
                        "email"=>$this->doorGets->__('E-Mail'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('nom','email','date_creation',);
                    $isFieldArraySearch = array('nom','email','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " _dg_newsletter "; 
                    
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
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_start='.$fromFormat;
                                            //$urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                        }
                                        
                                    }else{
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            $sqlLabelSearch .= $tableName.".".$v." LIKE '%".$valueQP."%' AND ";
                                            $arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'like','value'=>$valueQP);
                                            
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
                    $outSqlGroupe = " WHERE 1=1 ".$sqlLabelSearch;
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$finalPer;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=emailing".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=emailing".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
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
                    $urlPage = "./?controller=emailing&page=";
                    $urlPageGo = './?controller=emailing';
                    
                    $block->addTitle($dgSelMass,'sel_mass','td-title');
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
                    
                    $arFilterActivation = $this->doorGets->getArrayForms('activation');
                    
                    $valFilterNom = '';
                    if (array_key_exists('q_nom',$aGroupeFilter)) {
                        $valFilterNom = $aGroupeFilter['q_nom'];
                    }
                    
                    $valFilterEmail = '';
                    if (array_key_exists('q_email',$aGroupeFilter)) {
                        $valFilterEmail = $aGroupeFilter['q_email'];
                    }
                    
                    $valFilterActive = 0;
                    if (array_key_exists('q_active',$aGroupeFilter)) {
                        $valFilterActive = $aGroupeFilter['q_active'];
                    }
                    
                    $valFilterGroupe = 0;
                    if (array_key_exists('q_network',$aGroupeFilter)) {
                        $valFilterGroupe = $aGroupeFilter['q_network'];
                    }
                    
                    $valFilterDateStart = '';
                    if (array_key_exists('q_date_creation_start',$aGroupeFilter)) {
                        $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                    }
                    
                    $sFilterActive      = $this->doorGets->Form['_search_filter']->select('','q_active',$arFilterActivation,$valFilterActive);
                    $sFilterNom         = $this->doorGets->Form['_search_filter']->input('','q_nom','text',$valFilterNom);
                    $sFilterEmail       = $this->doorGets->Form['_search_filter']->input('','q_email','text',$valFilterEmail);
                    $sFilterGroupe      = $this->doorGets->Form['_search_filter']->select('','q_network',$groupes,$valFilterGroupe);
                    $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    // Search
                    $urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
                    $urlMassdelete = '';
                    
                    $block->addContent('sel_mass',$urlMassdelete );
                    $block->addContent('nom',$sFilterNom );
                    $block->addContent('email',$sFilterEmail );
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        $block->addContent('sel_mass','' );
                        $block->addContent('nom','' );
                        $block->addContent('email','' );
                        $block->addContent('date_creation','','center');
                        $block->addContent('edit','','center');
                        $block->addContent('delete','','center');
                        
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $ImageStatut = BASE_IMG.'puce-rouge.png';
                        if ($all[$i]['newsletter'] == '1')
                        {
                            
                            $ImageStatut = BASE_IMG.'puce-verte.png';
                            
                        }
                        $urlStatut = '<img src="'.$ImageStatut.'" style="vertical-align: middle;" >';
                        
                        $urlMassdelete  = '<input id="'.$all[$i]["id"].'" type="checkbox" class="check-me-mass" >';
                        $urlNom         = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=emailing&action=edit&id='.$all[$i]['id'].'">'.$all[$i]["nom"].'</a>';
                        $urlEmail       = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=emailing&action=edit&id='.$all[$i]['id'].'">'.$all[$i]["email"].'</a>';
                        $urlGroupe      = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=emailing&action=edit&id='.$all[$i]['id'].'">'.$all[$i]["id_groupe"].'</a>';
                        $urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=emailing&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlEdit        = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=emailing&action=edit&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        $block->addContent('sel_mass',$urlMassdelete );
                        $block->addContent('nom',$urlNom );
                        $block->addContent('email',$urlEmail );
                        $block->addContent('date_creation',$dateCreation,'tb-70 text-center');
                        $block->addContent('edit',$urlEdit,'tb-30 text-center');
                        $block->addContent('delete',$urlDelete,'tb-30 center');
                        
                    }
                    
                    $formMassDelete = '';
                    $fileFormMassDelete = 'user/emailing/user_emailing_massdelete_form';
                    $tplFormMassDelete = Template::getView($fileFormMassDelete);
                    ob_start(); if (is_file($tplFormMassDelete)) { include $tplFormMassDelete;} $formMassDelete = ob_get_clean();
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    
                    break;
                
                case 'massdelete':
                    
                    $varListeFile = '';
                    $cListe = 0;
                    
                    if (
                        array_key_exists('emailing_massdelete_groupe_delete',$params['POST'])
                   ) {
                        
                        $varListeFile = $params['POST']['emailing_massdelete_groupe_delete'];
                        $ListeForDeleted = $this->doorGets->_toArray($varListeFile);
                        $cListe = count($ListeForDeleted);
                        
                    }
                    
                    $formMassDeleteIndex = '';
                    $fileFormMassDeleteIndex = 'user/users/user_emailing_massdelete';
                    $tplFormMassDeleteIndex = Template::getView($fileFormMassDeleteIndex);
                    ob_start(); if (is_file($tplFormMassDeleteIndex)) { include $tplFormMassDeleteIndex;} $formMassDeleteIndex = ob_get_clean();
                    
                    break;
            }
            
            $ActionFile = 'user/emailing/user_emailing_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start();
            if (is_file($tpl)) { include $tpl; }
            
            $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
    /*
     *  Methode utile à la class 
     *
     */
    
    private function getEmaillingGroupes() {
        
        $out = array();
        
        $isAllRC = $this->doorGets->dbQ("SELECT * FROM _dg_newsletter_emailling_groupe ");
        
        $cRC = count($isAllRC);
        if ($cRC > 0) {
            for($i=0;$i<$cRC;$i++) {
                
                $out[$isAllRC[$i]['id']] = $isAllRC[$i]['titre'];
                
            }
        }
        
        return $out;
        
        
    }
    
    private function getEmaillingModels() {
        
        $out = array();
        
        $isAllRC = $this->doorGets->dbQ("SELECT * FROM _dg_newsletter_emailling_models ");
        
        $cRC = count($isAllRC);
        if ($cRC > 0) {
            for($i=0;$i<$cRC;$i++) {
                
                $out[$isAllRC[$i]['id']] = $isAllRC[$i]['titre'];
                
            }
        }
        
        return $out;
        
        
    }
    
}
