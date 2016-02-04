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


class NewsView extends doorGetsApiView{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $moduleInfos        = $this->doorGets->moduleInfos($this->doorGets->Uri,$lgActuel);
        
        $isContent          = array();
        $idNextContent      = 0;
        $idPreviousContent  = 0;
        $id                 = 0;

        if (!empty($User)) {

            // Check if is content modo
            $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;

            // Check if is module modo
            (
                in_array('module', $User['liste_module_interne'])  
                && in_array('module_'.$moduleInfos['type'],  $User['liste_module_interne'])

            ) ? $is_modules_modo = true : $is_modules_modo = false;

            // check if user can edit content
            $user_can_edit = (in_array($moduleInfos['id'], $User['liste_module_edit']))?true:false;

            // check if user can delete content
            $user_can_delete = (in_array($moduleInfos['id'], $User['liste_module_delete']))?true:false;

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
                            $isContent['article_tinymce'] = html_entity_decode($isContent['article_tinymce']);
                                
                            $this->isContent = $isContent;

                            $idNextContent      = $this->doorGets->getIdContentPosition($isContent['id_content']);
                            $idPreviousContent  = $this->doorGets->getIdContentPosition($isContent['id_content'],'prev');
                        
                        } else {

                            $this->isContent = $isContent = array();
                        }
                    }
                }
            }
        }
            
        
        switch ($this->doorGets->requestMethod) {

            case 'GET':

                if (!empty($isContent)) {

                    $timeCreation = (int) $isContent['date_creation'];
                    $timeModification = (int) $isContent['date_modification'];

                    $isContent['id'] = $isContent['id_content'];
                    $isContent['date_creation'] = date(DATE_ATOM,$timeCreation);
                    $isContent['date_modification'] = date(DATE_ATOM,$timeModification);

                    unset($isContent['groupe_traduction']);
                    unset($isContent['id_user']);
                    unset($isContent['id_groupe']);
                    unset($isContent['id_content']);

                    $response['code']       = 200;
                    $response['data']       = $isContent;
                    $response['next']       = $idNextContent;
                    $response['previous']   = $idPreviousContent;

                }

                if (!empty($this->doorGets->Uri) && !empty($this->doorGets->Table) && empty($isContent) && $id === 0) {
                        
                    $q = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 10;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel = $this->doorGets->getLangueTradution();
                    
                    $isFieldArray       = array(
                        
                        "titre"=>$this->doorGets->__('Titre'),
                        "active"=>$this->doorGets->__('Statut'),
                        "pseudo"=>$this->doorGets->__('Pseudo'),
                        "date_creation"=>$this->doorGets->__('Date'),
                        
                    );
                    
                    $isFieldArraySort   = array('ordre','active','titre','pseudo','date_creation',);
                    $isInClassicTable   = array('ordre','active','pseudo');
                    $isFieldArraySearch = array('titre','active','pseudo','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');
                    
                    // Init table query
                    $tAll = $this->doorGets->Table." , ".$this->doorGets->Table."_traduction "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.id_content",'type'=>'!=!','value'=>$this->doorGets->Table.".id");
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.langue",'type'=>'=','value'=>$lgActuel);
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".active",'type'=>'=','value'=>'2');
                    
                    
                    
                    $sqlUserOther       = '';

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
                                                $nameTable = $tableName.".".$valEnd;
                                                
                                                $sqlLabelSearch .= $nameTable." >= $from AND ";
                                                $sqlLabelSearch .= $nameTable." <= $to AND ";
                                                
                                                $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'>','value'=>$from);
                                                $arrForCountSearchQuery[] = array('key'=>$nameTable,'type'=>'<','value'=>$to);
                                                
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
                        
                    }

                    // Init count total fields
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);
                    
                    // Init categorie
                    $sqlCategorie = '';
                    $getCategorie = '';
                    if (
                        array_key_exists('categorie',$params['GET'])
                        && !empty($params['GET']['categorie'])
                        && array_key_exists($params['GET']['categorie'],$this->doorGets->categorieSimple)
                    ) {
                        
                        
                        $getCategorie = $params['GET']['categorie'];
                        
                        $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.categorie','type'=>'like','value'=>'#'.$getCategorie.',');
                        
                        $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);
                        
                        $sqlCategorie = " AND ".$this->doorGets->Table.".categorie LIKE '%#".$getCategorie.",%'";
                        
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
                    $outSqlGroupe = " WHERE ".$this->doorGets->Table."_traduction.id_content = ".$this->doorGets->Table.".id AND ".$this->doorGets->Table.".active = 2 AND ".
                                    $this->doorGets->Table."_traduction.langue = '".$lgActuel."' ".$sqlCategorie." ".$sqlUserOther." ".$sqlLabelSearch;
                    
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                   
                    // Select all contents / Query SQL
                    $all = $this->doorGets->dbQA($tAll,$sqlLimit);
                    $cAll = count($all);
                    
                    $serializedFields  = array('groupe_traduction');
                    $dateFields  = array('date_creation','date_modification');

                    if ($cAll > 0) {

                        foreach ($all as $pos => $traduction) {

                            foreach ($traduction as $key => $value) {

                                if (in_array($key,$dateFields)) {
                                    $time = (int) $value;
                                    $all[$pos][$key] = date(DATE_ATOM,$time);
                                }
                            }
                            
                            $all[$pos]['id'] = $all[$pos]['id_content'];
                            $all[$pos]['article_tinymce'] = $this->doorGets->_truncate(html_entity_decode($all[$pos]['article_tinymce']));
                            unset($all[$pos]['groupe_traduction']);
                            unset($all[$pos]['id_user']);
                            unset($all[$pos]['id_groupe']);
                            unset($all[$pos]['id_content']);
                        }
                    }

                    $response['code']       = 200;
                    $response['data']       = $all;
                    $response['total']      = $cResultsInt;
                    $response['gby']        = $per;
                    $response['page']       = $p;
                    $response['orderby']    = $getFilter;

                }
                
                break;
            
        }
        
        if ($response['code'] === 200) {

            unset($response['code']);
            $this->doorGets->_successJson($response);

        } else {
            
            $this->doorGets->_errorJson($response);
        }
    }
}
