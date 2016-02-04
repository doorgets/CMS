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

class ModerationView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out            = '';
        $tableName      = '_moderation';
        $lgActuel       = $this->doorGets->getLangueTradution(); 
        $controllerName = $this->doorGets->controllerNameNow();

        $User           = $this->doorGets->user;
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Index de la page'),
            
        );

        $lgActuel   = $this->doorGets->getLangueTradution();
        $params     = $this->doorGets->Params();
        
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
                        "id"=>$this->doorGets->__('id'),
                        "pseudo"=>$this->doorGets->__('Pseudo'),
                        "type_module"=>$this->doorGets->__('Module'),
                        "action"=>$this->doorGets->__('Action'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('id','pseudo','type_module','action','date_creation');
                    $isFieldArraySearchInput = array('id','pseudo','type_module','action','date_creation',);
                    $isFieldArraySearch = array('id','pseudo','type_module','action','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[4];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " _moderation "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    
                    $filters  = array();
                    $sqlLabelSearchModo = '  (';

                    foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {

                        //$arrForCountSearchQuery[] = array('key'=>'network','type'=>'=','value'=> $idGroup);
                        $sqlLabelSearchModo .=  "  id_groupe = $idGroup OR ";
                        
                    }
                    
                    $sqlLabelSearchModo = substr($sqlLabelSearchModo,0,-3);
                    $sqlLabelSearchModo .= ')';

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
                                            
                                            $nameTable = $valEnd;
                                            
                                            $sqlLabelSearch .= $nameTable." >= $from AND ";
                                            $sqlLabelSearch .= $nameTable." <= $to AND ";
                                            
                                            // $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                            // $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;

                                        }
                                        
                                    }else{

                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if ($v === 'active' || $v === 'network')  {

                                                $sqlLabelSearch .= $v." = ".$valueQP." AND ";
                                                //$arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'!=!','value'=>$valueQP,'',' AND ');
                                            
                                            } else {

                                                $sqlLabelSearch .= $v." LIKE '%".$valueQP."%' AND ";
                                                //$arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'like','value'=>$valueQP,'',' AND ');
                                            
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
                        
                        $per = $params['GET']['gby'];
                        $urlGroupBy = '&gby='.$per;
                    }

                    // Init count total fields
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery,'WHERE '.$sqlLabelSearchModo.' '.$sqlLabelSearch,' OR ');
                    
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
                    
                    $backUrl        = urlencode('?controller=moderation&page='.$p);

                    $finalPer = $ini+$per;
                    if ($finalPer >  $cResultsInt) {
                        $finalPer = $cResultsInt;
                    }
                    
                    // Create sql query for transaction
                    $outSqlGroupe = " WHERE $sqlLabelSearchModo ".$sqlLabelSearch;
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=moderation".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=moderation".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
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
                    $urlPage = "./?controller=moderation&page=";
                    $urlPageGo = './?controller=moderation';
                    
                    foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $isFieldArraySort[4] )
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
                    
                    // Search field
                    foreach ($isFieldArraySearchInput as $fieldName) {
                        
                        //  Check field value
                        $valFilter = (array_key_exists('q_'.$fieldName,$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName] : '';

                        // Check type and put field
                        switch ($fieldName) {

                            case 'id':
                            case 'pseudo':
                            case 'type_module':
                            case 'action':
                                $sFilter    = $this->doorGets->Form['_search_filter']->input('','q_'.$fieldName,'text',$valFilter);
                                break;

                            case 'date_creation':

                                $valFilterStart = (array_key_exists('q_'.$fieldName.'_start',$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName.'_start'] : '';
                                $valFilterEnd = (array_key_exists('q_'.$fieldName.'_end',$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName.'_end'] : '';

                                $sFilter    = $this->doorGets->Form['_search_filter']->input('','q_'.$fieldName.'_start','text',$valFilterStart,'doorGets-date-input datepicker-from text-center');
                                $sFilter    .= $this->doorGets->Form['_search_filter']->input('','q_'.$fieldName.'_end','text',$valFilter,'doorGets-date-input datepicker-to text-center');

                                break;

                            default:
                                $sFilter    = '#';
                                break;
                        }
                        
                        $block->addContent($fieldName,$sFilter );
                    }

                    $block->addContent('edit','' );
                    // end Seach
                    
                    if (empty($cAll)) {
                        $block->addContent('id','' );
                        $block->addContent('pseudo','' );
                        $block->addContent('type_module','' );
                        $block->addContent('action','' ,'center');
                        $block->addContent('date_creation','tb-150 text-center');
                        $block->addContent('edit','','center');
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        $urlToGoNext = '<a href="?controller=module'.strtolower($all[$i]['type_module']).'&uri='.$all[$i]['uri_module'].'&action=edit&id='.$all[$i]['id_content'].'&lg='.$all[$i]['langue'].'&back='.$backUrl.'"><i class="glyphicon glyphicon-pencil green-font"></i></a>';
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        $block->addContent('id',$all[$i]['id'],'tb-30 text-center');
                        $block->addContent('pseudo',$all[$i]['pseudo'],'tb-300 text-center');
                        $block->addContent('type_module',$all[$i]['type_module'],'tb-150 text-center');
                        $block->addContent('action',$all[$i]['action'],'tb-150 text-center');
                        $block->addContent('date_creation',$dateCreation,'tb-150 text-center');
                        $block->addContent('edit',$urlToGoNext,'tb-30 text-center');
                    }
                    
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;
            }
            
            $ActionFile = 'user/moderation/user_moderation_'.$this->Action;
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}