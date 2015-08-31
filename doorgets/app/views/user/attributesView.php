<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
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

class AttributesView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Utilisateurs'),
            'add'           => $this->doorGets->__('Ajouter'),
            'edit'          => $this->doorGets->__('Modifier'),
            'delete'        => $this->doorGets->__('Supprimer'),
            'massdelete'    => $this->doorGets->__('Supprimer par groupe'),
            
        );
        
        $lgActuel       = $this->doorGets->getLangueTradution(); 
        $groupes        = $this->doorGets->loadGroupesToSelect();
        $yesno          = $this->doorGets->getArrayForms();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_groupes_attributes');
            
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgAttribute = $lgGroupe[$lgActuel];
                    $isContentTraduction = $this->doorGets->dbQS($idLgAttribute,'_users_groupes_attributes_traduction');

                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);

                        $isContent['params']            = @unserialize($isContent['params']);
                        $isContent['groupe_traduction'] = @unserialize($isContent['groupe_traduction']);

                        $this->isContent = $isContent;
                        
                        
                    }
                    
                }
                
            }
        }
        
        $aUsersActivation = $this->doorGets->getArrayForms('users_activation');
        
        $typeField = array();

        $typeField['text'] = $this->doorGets->__('Champ texte');
        $typeField['textarea'] = $this->doorGets->__('Champ texte multiligne');
        $typeField['select'] = $this->doorGets->__('Sélection');
        $typeField['checkbox'] = $this->doorGets->__('Case à cocher');
        $typeField['radio'] = $this->doorGets->__('Bouton radio');
        $typeField['file'] = $this->doorGets->__('Envoyer un fichier');


        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    
                    $tableName = '_users_groupes_attributes';
                    
                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 50;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel = $this->doorGets->getLangueTradution();
                    
                    $isFieldArray       = array(
                        "active"=>$this->doorGets->__('Actif'),
                        "id"=>$this->doorGets->__('Id'),
                        "title"=>$this->doorGets->__('Titre'),
                        "type"=>$this->doorGets->__('Type'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('active','id','type','title','date_creation',);
                    $isFieldArraySearch = array('active','id','type','title','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " _users_groupes_attributes "; 
                    
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
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
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
                        
                        $per = $params['GET']['gby'];
                        
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
                    $sqlLimit = " $outSqlGroupe AND _users_groupes_attributes.id = _users_groupes_attributes_traduction.id_attribute AND langue = '$lgActuel' ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=attributes".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=attributes".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
                    // Generate the pagination system
                    $valPage = '';
                    if ($cResultsInt > $per) {
                        
                        $valPage = Pagination::page($cResultsInt,$p,$per,$urlPage);
                        
                    }
                    
                    $tAll = " _users_groupes_attributes, _users_groupes_attributes_traduction"; 
                
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
                    $urlPage = "./?controller=attributes&page=";
                    $urlPageGo = './?controller=attributes';
                    
                    $block->addTitle($dgSelMass,'id','td-title');
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
                    $yesno = $this->doorGets->getArrayForms();

                    $valFilterId = '';
                    if (array_key_exists('doorGets_search_filter_q_id',$aGroupeFilter)) {
                        $valFilterId = $aGroupeFilter['q_id'];
                    }

                    $valFilterActive = 0;
                    if (array_key_exists('doorGets_search_filter_q_active',$aGroupeFilter)) {
                        $valFilterActive = $aGroupeFilter['q_active'];
                    }
                    
                    $valFilterTitle = '';
                    if (array_key_exists('doorGets_search_filter_q_title',$aGroupeFilter)) {
                        $valFilterTitle = $aGroupeFilter['q_title'];
                    }
                    
                    $valFilterType = '';
                    if (array_key_exists('doorGets_search_filter_q_type',$aGroupeFilter)) {
                        $valFilterType = $aGroupeFilter['q_type'];
                    }
                    
                    $valFilterDateStart = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_start',$aGroupeFilter)) {
                        $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                    }
                    
                    $sFilterActive = $this->doorGets->Form['_search_filter']->select('','q_active',$yesno,$valFilterActive);
                    $sFilterId     = $this->doorGets->Form['_search_filter']->input('','q_id','text',$valFilterId);
                    $sFilterTitle  = $this->doorGets->Form['_search_filter']->input('','q_title','text',$valFilterTitle);
                    $sFilterType   = $this->doorGets->Form['_search_filter']->input('','q_type','text',$valFilterType);
                    $sFilterDate   = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate  .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    // Search
                    
                    $block->addContent('active',$sFilterActive );
                    $block->addContent('id',$sFilterId );
                    $block->addContent('title',$sFilterTitle );
                    $block->addContent('type',$sFilterType );
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {

                        $block->addContent('active',''  ,'tb-30 center');
                        $block->addContent('id',''  ,'tb-70 center');
                        $block->addContent('title','' );
                        $block->addContent('type','' );
                        $block->addContent('date_creation','','center');
                        $block->addContent('edit','','center');
                        $block->addContent('delete','','center');
                        
                    }
                    
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $ImageStatut = BASE_IMG.'puce-rouge.png';
                        if ($all[$i]['active'] == '1') {
                            $ImageStatut = BASE_IMG.'puce-verte.png';
                        }

                        $urlStatut = '<img src="'.$ImageStatut.'" style="vertical-align: middle;" >';

                        $urlId      = $all[$i]["id_attribute"];
                        $urlTitle   = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=attributes&action=edit&id='.$all[$i]['id_attribute'].'&lg='.$lgActuel.'">'.$all[$i]["title"].'</a>';
                        $urlType    = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=attributes&action=edit&id='.$all[$i]['id_attribute'].'&lg='.$lgActuel.'">'.$all[$i]["type"].'</a>';
                        $urlDelete  = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=attributes&action=delete&id='.$all[$i]['id_attribute'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlEdit    = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=attributes&action=edit&id='.$all[$i]['id_attribute'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font" ></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        $block->addContent('active',$urlStatut ,'tb-30 center');
                        $block->addContent('id',$urlId ,'tb-70 center');
                        $block->addContent('title',$urlTitle );
                        $block->addContent('type',$urlType );
                        $block->addContent('date_creation',$dateCreation,'center');
                        $block->addContent('edit',$urlEdit,'center');
                        $block->addContent('delete',$urlDelete,'center');
                        
                    }
                    
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;
                
                case 'edit':

                    break;
                
            }
            
            $ActionFile = 'user/attributes/user_attributes_'.$this->Action;
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}