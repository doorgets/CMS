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

class WidgetsView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out = '';
        
        $Rubriques = array(
            
            'index'         => 'index',
            
        );
        
        $lgActuel       = $this->doorGets->getLangueTradution(); 
        $groupes        = $this->doorGets->loadGroupesToSelect();
        $yesno          = $this->doorGets->getArrayForms();

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
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
                    $groupes = $this->doorGets->loadGroupesOptionToSelect($this->doorGets->Table,'type',Constant::$widgets);

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
                    foreach (Constant::$widgets as $key => $value) {
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
                            $outFilterORDER = $tableName.$getFilter.'  '.$getDesc;
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
                        
                        $imageIcone = BASE_IMG.'ico_module.png';
                        if (array_key_exists($all[$i]['type'],$listeInfos)) {$imageIcone = $listeInfos[$all[$i]['type']]['image'];}
                        $urlImage = '<img src="'.$imageIcone.'" class="px36"> ';
                            
                        $urlGerer   = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller=module'.$all[$i]['type'].'&uri='.$all[$i]['uri'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font" ></b></a>';
                        $urlDelete  = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=modules&action=delete&id='.$all[$i]['id_module'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlEdit    = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=modules&action=edit'.$all[$i]['type'].'&id='.$all[$i]['id_module'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-cog" ></b></a>';
                        
                        $all[$i]["active"] = ($all[$i]["active"])?'<i class="fa fa-check fa-lg green-c"></i>':'<i class="fa fa-ban fa-lg red-c"></i>';
                        $block->addContent('titre',$urlImage.$all[$i]["titre"]);
                        $block->addContent('uri',$all[$i]["uri"]);
                        $block->addContent('type',$all[$i]["type"],'tb-70 text-center');
                        $block->addContent('active',$all[$i]["active"],'tb-30 text-center');
                        $block->addContent('show',$urlGerer,'text-center');
                        $block->addContent('edit',$urlEdit,'text-center');
                        $block->addContent('delete',$urlDelete,'text-center');
                        
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
            
            $ActionFile = 'user/modules/widgets/user_'.$this->doorGets->controllerNameNow().'_'.$this->Action;
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}