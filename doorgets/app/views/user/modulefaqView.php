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


class ModuleFaqView extends doorGetsUserModuleOrderView {
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out = '';
        
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        $listeCategories    = $this->doorGets->categorieSimple;
        $User               = $this->doorGets->user;
        $isVersionActive    = false;


        unset($listeCategories[0]);
        $aActivation = $this->doorGets->getArrayForms('activation');
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index'),
            'add'           => $this->doorGets->__('Ajouter'),
            'edit'          => $this->doorGets->__('Modifier'),
            'delete'        => $this->doorGets->__('Supprimer'),
            'massdelete'    => $this->doorGets->__('Supprimer par groupe'),
            
        );
        
        // Check if is content modo
        $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;

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
                        
                        $this->isContent = $isContent = array_merge($isContent,$isContentTraduction);
                        
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
            }
            
        }
        
        if (array_key_exists('version',$params['GET'])) {

            $version_id = $params['GET']['version'];
            $isContentVesion = $this->getVersionById($version_id,$isContent);
            if (!empty($isContentVesion)) {

                $isContent = array_merge($isContent,$isContentVesion);
                $isVersionActive    = true;
                
            }
            
        }
        

        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    if (!empty($this->doorGets->Uri) && !empty($this->doorGets->Table)) {
                        
                        $q = '';
                        $urlSearchQuery = '';
                        
                        $p = 1;
                        $ini = 0;
                        $per = 50;
                        
                        $params = $this->doorGets->Params();
                        $lgActuel =$this->doorGets->getLangueTradution();
                        
                        $isFieldArray       = array(
                            
                            "question"=>$this->doorGets->__('Question'),
                            "active"=>$this->doorGets->__('Statut'),
                            "pseudo"=>$this->doorGets->__('Pseudo'),
                            "date_creation"=>$this->doorGets->__('Date'),
                        );
                        
                        $isFieldArraySort   = array('ordre','active','pseudo','question','date_creation',);
                        $isInClassicTable   = array('ordre','active','pseudo');
                        $isFieldArraySearch = array('question','active','date_creation_start','date_creation_end',);
                        $isFieldArrayDate   = array('date_creation');
                        
                        
                        if ($is_modo && $is_modules_modo) {
                            $isFieldArray["ordre"] = $this->doorGets->__('Position');
                        }
                        
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
                                                
                                                $nameTable = $this->doorGets->Table.".".$valEnd;
                                                
                                                $sqlLabelSearch .= $nameTable." >= $from AND ";
                                                $sqlLabelSearch .= $nameTable." <= $to AND ";
                                                
                                                $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                                $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                                
                                                $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                            }
                                            
                                        }else{
                                            
                                            if (in_array($v,$isInClassicTable))
                                            {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                                
                                            }elseif (in_array($v,$isFieldArraySort)) {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table."_traduction.".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.".$v,'type'=>'like','value'=>$valueQP);
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
                            
                            if ($iPos === 0) {
                                $leftFirst = 'first-title left';
                            }
                            
                            $dgLabel = $fieldNameLabel;
                            if (in_array($fieldName,$isFieldArraySort))
                            {
                                $dgLabel = '<a href="'.$urlPageGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$fieldNameLabel.'</a>';
                            }
                            
                            $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title text-center");
                            $iPos++;
                            
                        }
                        
                        if ($getFilter === 'ordre' && empty($urlCategorie) )
                        {
                            $block->addTitle('','topup','td-title');
                            $block->addTitle('','topbottom','td-title');                            
                        }

                        $block->addTitle('','edit','td-title');
                        $block->addTitle('','delete','td-title');
                        
                        $arFilterActivation = $this->doorGets->getArrayForms('activation');
                        
                        $valFilterQuestion = '';
                        if (array_key_exists('doorGets_search_filter_q_question',$aGroupeFilter)) {
                            $valFilterQuestion = $aGroupeFilter['q_question'];
                        }

                        $valFilterPseudo = '';
                        if (array_key_exists('doorGets_search_filter_q_pseudo',$aGroupeFilter)) {
                            $valFilterPseudo = $aGroupeFilter['q_pseudo'];
                        }
                        
                        $valFilterActive = 0;
                        if (array_key_exists('doorGets_search_filter_q_active',$aGroupeFilter)) {
                            $valFilterActive = $aGroupeFilter['q_active'];
                        }
                        
                        $valFilterDateStart = '';
                        if (array_key_exists('doorGets_search_filter_q_date_creation_start',$aGroupeFilter)) {
                            $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                        }
                        
                        $valFilterDateEnd = '';
                        if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                            $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                        }
                        
                        $sFilterActive      = $this->doorGets->Form['_search_filter']->select('','q_active',$arFilterActivation,$valFilterActive);
                        $sFilterPseudo      = $this->doorGets->Form['_search_filter']->input('','q_pseudo','text',$valFilterPseudo);
                        $sFilterQuestion    = $this->doorGets->Form['_search_filter']->input('','q_question','text',$valFilterQuestion);
                        $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                        $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                        
                        // Search
                        $urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
                        $urlMassdelete = '';
                        
                        //$block->addContent('sel_mass',$urlMassdelete );
                        $block->addContent('pseudo',$sFilterPseudo );
                        $block->addContent('question',$sFilterQuestion );
                        $block->addContent('active',$sFilterActive ,'text-center');
                        $block->addContent('date_creation',$sFilterDate,'text-center');
                        if ($is_modo && $is_modules_modo) {
                            $block->addContent('ordre','--','text-center');
                        }
                        if ($getFilter === 'ordre' && empty($urlCategorie) && $is_modo && $is_modules_modo )
                        {
                            $block->addContent('topbottom','--','text-center');
                            $block->addContent('topup','--','text-center');
                        }
                        $block->addContent('edit','--','text-center');
                        $block->addContent('delete','--','text-center');
                        
                        // end Seach
                        
                        if (empty($cAll)) {
                            
                            //$block->addContent('sel_mass','' );
                            $block->addContent('pseudo','' );
                            $block->addContent('question','' );
                            $block->addContent('active','' ,'text-center');
                            $block->addContent('date_creation','','text-center');
                            if ($is_modo && $is_modules_modo) {
                                $block->addContent('ordre','','text-center');
                            }
                            if ($getFilter === 'ordre' && empty($urlCategorie) && $is_modo && $is_modules_modo )
                            {
                                $block->addContent('topbottom','--','text-center');
                                $block->addContent('topup','--','text-center');
                            }
                            $block->addContent('edit','','text-center');
                            $block->addContent('delete','','text-center');
                            
                        }
                        
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
                            
                            $contentId = $all[$i]['id_content'];
                            $urlTitle = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=edit&id='.$all[$i]['id_content'].'&lg='.$lgActuel.'">'.$all[$i]["question"].'</a>';
                            $urlDelete = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=delete&id='.$all[$i]['id_content'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                            $urlEdit = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=module'.$moduleInfos['type'].'&uri='.$this->doorGets->Uri.'&action=edit&id='.$all[$i]['id_content'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                            $urlMovedown = '';
                            if ($all[$i]['ordre'] != $cResultsInt) {
                                $urlMovedown = $this->doorGets->movePosition('down',$this->doorGets->Table,$all[$i]['id_content'],$all[$i]['ordre'],$cResultsInt);
                            }
                            $urlMoveup = '';
                            if ($all[$i]['ordre'] != 1) {
                                $urlMoveup = $this->doorGets->movePosition('up',$this->doorGets->Table,$all[$i]['id_content'],$all[$i]['ordre'],$cResultsInt);
                            }
                            $dateCreation = GetDate::in($all[$i]['date_creation'],1,$this->doorGets->myLanguage());
                            
                            //$block->addContent('sel_mass',$contentId );
                            $block->addContent('pseudo',$all[$i]['pseudo'],'text-center');
                            $block->addContent('question',$urlTitle );
                            $block->addContent('active',$urlStatut ,'text-center');
                            $block->addContent('date_creation',$dateCreation,'text-center');
                            if ($is_modo && $is_modules_modo) {
                                $block->addContent('ordre',$all[$i]["ordre"],'tb-30 text-center');
                            }
                            if ($getFilter === 'ordre' && empty($urlCategorie) )
                            {
                                $block->addContent('topbottom',$urlMovedown,'tb-30 text-center');
                                $block->addContent('topup',$urlMoveup,'tb-30 text-center');
                            }
                            $block->addContent('edit',$urlEdit,'text-center');
                            $block->addContent('delete',$urlDelete,'text-center');
                            
                        }
                        
                        $formMassDelete = '';
                        $fileFormMassDelete = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_massdelete';
                        $tplFormMassDelete = Template::getView($fileFormMassDelete);
                        ob_start(); if (is_file($tplFormMassDelete)) { include $tplFormMassDelete;} $formMassDelete = ob_get_clean();
                        
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
                    
                    $formAddTop = $formAddBottom = '';
                    $fileFormAddTop = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_add_top';
                    $tplFormAddTop = Template::getView($fileFormAddTop);
                    ob_start(); if (is_file($tplFormAddTop)) { include $tplFormAddTop; } $formAddTop = ob_get_clean();
                    
                    $fileFormAddBottom = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_add_bottom';
                    $tplFormAddBottom = Template::getView($fileFormAddBottom);
                    ob_start(); if (is_file($tplFormAddBottom)) { include $tplFormAddBottom;} $formAddBottom = ob_get_clean();
                    
                    $fileAddTop = 'modules/'.$this->doorGets->zoneArea().'_add_top';
                    $tplAddTop = Template::getView($fileAddTop);
                    ob_start(); if (is_file($tplAddTop)) { include $tplAddTop;} $htmlAddTop = ob_get_clean();
                    
                    break;
                
                case 'edit':
                    
                    $isActiveContent =  $isActiveComments =  $isActiveEmail = '';
                    $isActivePartage =  $isActiveFacebook =   $isActiveDisqus =  $isActiveRss = '';
                    
                    if (!empty($isContent['active'])) { $isActiveContent = 'checked'; }
                    if (!empty($isContent['comments'])) { $isActiveComments = 'checked'; }
                    if (!empty($isContent['partage'])) { $isActivePartage = 'checked'; }
                    if (!empty($isContent['mailsender'])) { $isActiveEmail = 'checked'; }
                    if (!empty($isContent['facebook'])) { $isActiveFacebook = 'checked'; }
                    if (!empty($isContent['in_rss'])) { $isActiveRss = 'checked'; }
                    if (!empty($isContent['disqus'])) { $isActiveDisqus = 'checked'; }

                    $htmlCanotEdit = '';
                    $fileCanotEdit = 'modules/'.$this->doorGets->zoneArea().'_canot_edit';
                    $tplCanotEdit = Template::getView($fileCanotEdit);
                    ob_start(); if (is_file($tplCanotEdit)) { include $tplCanotEdit;} $htmlCanotEdit = ob_get_clean();
                    
                    $formEditTop = $formEditBottom = '';
                    $fileFormEditTop = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_edit_top';
                    $tplFormEditTop = Template::getView($fileFormEditTop);
                    ob_start(); if (is_file($tplFormEditTop)) { include $tplFormEditTop; } $formEditTop = ob_get_clean();
                    
                    $fileFormEditBottom = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_edit_bottom';
                    $tplFormEditBottom = Template::getView($fileFormEditBottom);
                    ob_start(); if (is_file($tplFormEditBottom)) { include $tplFormEditBottom;} $formEditBottom = ob_get_clean();
                    
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
                    $fileFormDelete = 'modules/'.$this->doorGets->zoneArea().'/'.$this->doorGets->zoneArea().'_form_delete';
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