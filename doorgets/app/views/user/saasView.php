<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
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



class SaasView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        
        $out            = '';
        $tableName      = '_dg_saas';
        $User           = $this->doorGets->user;
        $lgActuel       = $this->doorGets->getLangueTradution(); 
        $controllerName = $this->doorGets->controllerNameNow();

        $domaine = str_replace(array('http://','https://','builder.','www.'), '', URL);

        // Check if is content modo
        (in_array('emailnotification', $User['liste_module_interne'])) ? $is_modo = true : $is_modo = false;

        $is_modules_modo = true;

        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Cloud'),
            'add'           => $this->doorGets->__('Ajouter'),
            'edit'          => $this->doorGets->__('Editer'),
            'delete'        => $this->doorGets->__('Supprimer'),
            
        );
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);

            if (!empty($isContent)) {
                
                
                $this->isContent = $isContent;

                $arrForCountSearchQuery = array();
                
                $countTotal = $this->doorGets->getCountTable($tableName,$arrForCountSearchQuery);

                $userContent = $this->doorGets->getProfileInfos($isContent['id_user']);
                
            }
            
        }

        // Init count total contents
        $countContents = 0;
        // $arrForCountSearchQuery[] = array('key'=>"id_user",'type'=>'=','value'=>c);
        // $countContents = $this->doorGets->getCountTable($this->doorGets->Table,$arrForCountSearchQuery);

        // Check limit to add content
        $isLimited = false;
        if ( $User['saas_options']['saas_add'] &&  $User['saas_options']['saas_limit'] !== '0' ) {
            $isLimited = (int)$User['saas_options']['saas_limit'];
        }

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
                        "domain"=>$this->doorGets->__('Domaine'),
                        "pseudo"=>$this->doorGets->__('Pseudo'),
                        "title"=>$this->doorGets->__('Titre'),
                        "description"=>$this->doorGets->__('Desciption'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    $isFieldTraductionArray = array();

                    $isFieldArraySort   = array('id','domain','pseudo','title','description','date_creation');
                    $isFieldArraySearchInput = array('id','domain','pseudo','title','description','date_creation',);
                    $isFieldArraySearch = array('id','domain','pseudo','title','description','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[5];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " _dg_saas "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    
                    $filters  = array();
                    $sqlLabelSearchModo = "  ( id_user = '".$User['id']."' ";
                    if (!empty($this->doorGets->user['liste_enfant_modo'])) {
                        $sqlLabelSearchModo .= ' OR ';
                        foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {

                            //$arrForCountSearchQuery[] = array('key'=>'network','type'=>'=','value'=> $idGroup);
                            $sqlLabelSearchModo .=  "  id_groupe = $idGroup OR ";
                        }
                        $sqlLabelSearchModo = substr($sqlLabelSearchModo,0,-3);
                    }
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
                                            
                                            $sqlLabelSearch .= $tableName.".".$v." LIKE '%".$valueQP."%' AND ";
                                            
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
                    

                    $finalPer = $ini+$per;
                    if ($finalPer >  $cResultsInt) {
                        $finalPer = $cResultsInt;
                    }
                    
                    // Create sql query for transaction
                    $outSqlGroupe = " WHERE $sqlLabelSearchModo ".$sqlLabelSearch;
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=saas".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=saas".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
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
                    $urlPage = "./?controller=saas&page=";
                    $urlPageGo = './?controller=saas';
                    
                    foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $isFieldArraySort[5] )
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
                    
                    // Search field
                    foreach ($isFieldArraySearchInput as $fieldName) {
                        
                        //  Check field value
                        $valFilter = (array_key_exists('q_'.$fieldName,$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName] : '';

                        // Check type and put field
                        switch ($fieldName) {
                    
                            case 'id':
                            case 'pseudo':
                            case 'domain':
                            case 'title':
                            case 'description':
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
                    $block->addContent('delete','' );
                    // end Seach

                    if (empty($cAll)) {
                        $block->addContent('id','' );
                        $block->addContent('pseudo','' );
                        $block->addContent('domain','' );
                        $block->addContent('title','' ,'center');
                        $block->addContent('description','' ,'center');
                        $block->addContent('date_creation','','tb-150 text-center');
                        $block->addContent('edit','','center');
                        $block->addContent('delete','','center');
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        $urlEdit = '<a href="?controller=saas&action=edit&id='.$all[$i]['id'].'&lg='.$lgActuel.'"><i class="glyphicon glyphicon-pencil green-font"></i></a>';
                        $urlDelete= '<a href="?controller=saas&action=delete&id='.$all[$i]['id'].'&lg='.$lgActuel.'"><i class="glyphicon glyphicon-remove red-c"></i></a>';
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        $urlDomain = URL.$this->doorGets->configWeb['saas_position'].$all[$i]['domain'];

                        $all[$i]['domain'] = '<a href="'.$urlDomain.'" target="_blank">'.$urlDomain.'</a>';
                        $block->addContent('id',$all[$i]['id'],'tb-30 text-center');
                        $block->addContent('pseudo',$all[$i]['pseudo'],'tb-50 text-center');
                        $block->addContent('domain',$all[$i]['domain'],'tb-150 text-center');
                        $block->addContent('title',$all[$i]['title'],'tb-150 text-center');
                        $block->addContent('description',$all[$i]['description'],'tb-150 text-center');
                        $block->addContent('date_creation',$dateCreation,'tb-150 text-center');
                        $block->addContent('edit',$urlEdit,'tb-30 text-center');
                        $block->addContent('delete',$urlDelete,'tb-30 text-center');
                    }
                    
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;

                case 'edit':

                    $domaine = str_replace(array('http://','https://','builder.','www.'), '', URL);
                    //$saasUrl = PROTOCOL.$isContent['domain'].'.'.$domaine;
                    $saasUrl = URL.$this->doorGets->configWeb['saas_position'].$isContent['domain'].'/';


                    $countDaysToDelete = (int) $userContent['saas_options']['saas_date_end'];
                    $countDaysToDeleteSeconde = $countDaysToDelete * 86400;

                    $now = time();
                    $dateCreation = (int) $isContent['date_creation'];
                    $dateToDelete =  $dateCreation + $countDaysToDeleteSeconde;

                    $daysLeft = ceil(($dateToDelete - $now) / 86400);
                    
                    $removeInProgress = ($daysLeft >= 0 || $countDaysToDelete === 0) ? false : true ;

                    break;
            }
            
            $ActionFile = 'user/'.$controllerName.'/user_'.$controllerName.'_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
    }
}
