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



class SupportView extends doorGetsUserView{
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);

    }
    
    public function getContent() {
        

        $out            = '';
        $tableName      = '_support';
        $lgActuel       = $this->doorGets->getLangueTradution(); 
        $controllerName = $this->doorGets->controllerNameNow();

        $User           = $this->doorGets->user;

        // Check if is content modo
        $is_modo = (in_array('support',$this->doorGets->user['liste_module_interne'])) ?  true : false;

        $Rubriques = array(
            'index'       => 'index', 
            'add'         => 'add', 
            'ticket'      => 'ticket',
            'close'       => 'Close', 
        );

        $lgActuel   = $this->doorGets->getLangueTradution();
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        $avatar = 'skin/img/no-image.png';
        if (array_key_exists('id',$params['GET'])) {

            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_support');
            if (!empty($isContent)) {
                
                $this->isContent = $isContent;
                $isUser = $this->doorGets->dbQS($isContent['id_user'],'_users_info','id_user');
                if (!empty($isUser)) {
                    $avatar = 'data/users/'.$isUser['avatar'];
                }
            }
        }

        $params     = $this->doorGets->Params();
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'ticket':
                    if (!empty($isContent)) {
                        $supportMessages = new SupportMessagesQuery($this->doorGets);
                        $supportMessages->filterByIdSupport($isContent['id']);
                        $supportMessages->find();
                        $supportMessagesEntities = $supportMessages->_getEntities('array');
                    }
                    
                    break;
                
                case 'index':
                    
                    $sqlInboxUser = '';
                    $q = '';
                    $urlSearchQuery = '';
                    
                    $urlToGo = "./?controller=$controllerName";

                    $p = 1;
                    $ini = 0;
                    $per = 50;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel =$this->doorGets->getLangueTradution();
                    
                    $optionStatus = array(0=>'', 1 => $this->doorGets->__('Ouvert'),2=>$this->doorGets->__('Fermé'));

                    $isFieldArray       = array(
                        
                        "reference"=>$this->doorGets->__('Référence'),
                        "subject"=>$this->doorGets->__('Sujet'),
                        "pseudo"=>$this->doorGets->__('Pseudo'),
                        "status"=>$this->doorGets->__('Statut'),
                        "count_messages"=>$this->doorGets->__('Réponse'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('reference','subject','pseudo','status','count_messages','date_creation',);
                    $isFieldArraySearch = array('reference','subject','pseudo','status','count_messages','date_creation_start','date_creation_end',);
                    $isFieldArraySearchType = array(
                        
                        'reference'      => array('type' =>'text','value'=>''),
                        'subject'      => array('type' =>'text','value'=>''),
                        'pseudo'      => array('type' =>'text','value'=>''),
                        'count_messages'      => array('type' =>'text','value'=>''),
                        'status'      => array('type' =>'select','value'=>$optionStatus),
                     
                    );
                    
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[5];
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
                    
                    // $sqlUserOther       = '';
                    // if ($is_modo) {
                    //     if (!empty($User['liste_enfant'])) {

                    //         $sqlUserOther .= " AND ( ( id_user = '".$User['id']."' AND id_groupe = '".$User['groupe']."' ) ";
                            
                    //         foreach($User['liste_enfant'] as $id_groupe) {
                                
                    //             $sqlUserOther .= " OR id_groupe = '".$id_groupe."' ";
                                
                    //         }
                            
                    //         $sqlUserOther .= ')';
                    //     }
                    // }else{
                        
                    //     $sqlUserOther = " AND id_user = '".$User['id']."' AND id_groupe = '".$User['groupe']."' ";
                        
                    // }

                    $sqlUserOther = " ( id_user = '".$User['id']."' ";
                    if (!empty($this->doorGets->user['liste_enfant_modo'])) {
                        $sqlUserOther .= ' OR ';
                        foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {

                            //$arrForCountSearchQuery[] = array('key'=>'network','type'=>'=','value'=> $idGroup);
                            $sqlUserOther .=  "  id_groupe = $idGroup OR ";
                        }
                        $sqlUserOther = substr($sqlUserOther,0,-3);
                        
                    }
                    $sqlUserOther .= ')';

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
                                            
                                            // $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                            // $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                            
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;
                                        }
                                        
                                    }else{
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if ($v === 'uri_module') {
                                                
                                                $sqlLabelSearch .= $tableName.".".$v." = '".$valueQP."' AND ";
                                                //$arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'=','value'=>$valueQP);
                                            
                                            }else{
                                                
                                                $sqlLabelSearch .= $tableName.".".$v." LIKE '%".$valueQP."%' AND ";
                                                //$arrForCountSearchQuery[] = array('key'=>$tableName.".".$v,'type'=>'like','value'=>$valueQP);
                                            
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
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery,'WHERE '.$sqlUserOther.' '.$sqlInboxUser.' '.$sqlLabelSearch,' OR ');

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
                    $outSqlGroupe = " WHERE $sqlUserOther ".$sqlInboxUser." ".$sqlLabelSearch;
                    $sqlLimit = "  $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
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
                    $block->setClassCss('doorgets-listing-tickets');
                    
                    $iPos = 0;
                    $dgSelMass = '';
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow()."&page=";
                    $urlPageGo = './?controller='.$this->doorGets->controllerNameNow();
                    
                    //$block->addTitle($dgSelMass,'sel_mass','td-title');
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
                        $css = '';
                        if ($fieldName === 'reference' || $fieldName === 'pseudo') {
                            $css = ' tb-150 ';
                        }
                        if ( $fieldName === 'count_messages' ) {
                            $css = ' tb-30 ';
                        }
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title $css");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','edit','td-title');
                    //$block->addTitle('','delete','td-title');
                    
                    // Search
                    //$urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
                    $urlMassdelete = '';
                    
                    //$block->addContent('sel_mass',$urlMassdelete );
                    
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
                    
                    
                    $block->addContent('date_creation',$sFilterDate,'text-center tb-50');
                    $block->addContent('edit','--','text-center tb-30');
                    //$block->addContent('delete','--','text-center tb-30');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        //$block->addContent('sel_mass','' );
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $block->addContent($nameField,'' );
                        }
                        $block->addContent('date_creation','','center');
                        $block->addContent('edit','','center');
                        //$block->addContent('delete','','center');
                        
                    }

                    for($i=0;$i<$cAll;$i++) {
                        
                        $urlMassdelete  = '';
                        $isSupportAgent = ($all[$i]['id_user'] !== $User['id'] && in_array('support',$this->doorGets->user['liste_module_interne']) ) ? true : false;

                        //$urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlSelect        = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=ticket&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-file"></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        //$block->addContent('sel_mass',$urlMassdelete );
                        foreach($isFieldArraySearchType as $nameField => $value) {

                            $cssHover = '';
                            
                            $css = '';
                            if ($nameField === 'status') {
                                $css = ' tb-30 text-center ';
                                $all[$i][$nameField] = ($all[$i][$nameField] === '1') ? '<b class="glyphicon glyphicon-time"></b>' : '<b class="glyphicon glyphicon-ok
"></b>' ;
                            }
                            
                            if ($nameField === 'count_messages' || $nameField === 'pseudo') {
                                $css = ' tb-30 text-center ';
                            }

                            if ($isSupportAgent && $all[$i]['readed_support'] !== '2') {
                                $cssHover .= ' not-readed ';
                            }

                            if (!$isSupportAgent && $all[$i]['readed_user'] !== '2') {
                                $cssHover .= ' not-readed ';
                            }

                            $block->addContent($nameField, $all[$i][$nameField],$css.$cssHover);
                        }
                        
                        $block->addContent('date_creation',$dateCreation,'text-center '.$cssHover);
                        $block->addContent('edit',$urlSelect,'text-center '.$cssHover);
                        //$block->addContent('delete',$urlDelete,'center');
                        
                    }
                    
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    
                    break;
            }
            
            $ActionFile = 'user/'.$controllerName.'/user_'.$controllerName.'_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
    }
}
