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


class TraductionView extends doorGetsApiView{
    
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
        $isVersionActive    = false;
        $version_id         = 0;
        $id = 0;
        // Check if is content modo
        (in_array('traduction', $User['liste_module_interne'])) ? $is_modo = true : $is_modo = false;

        // Check if is module modo
        (
            in_array('traduction', $User['liste_module_interne'])  
            && in_array('traduction_modo',  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;
        
        
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
                        $this->isContent = $isContent;
                    }

                    $field = 'sentence';

                    $idNextContent      = $this->doorGets->getContentPaginatePosition($field,$isContent['sentence']);
                    $idPreviousContent  = $this->doorGets->getContentPaginatePosition($field,$isContent['sentence'],'prev');
                    
                    $urlPrevious = '';
                    if (!empty($idPreviousContent)) {
                        $urlPrevious = '?controller='.$this->doorGets->controllerNameNow().'&action=edit&lg='.$lgActuel.'&id='.$idPreviousContent;
                    }
                    $urlNext = '';
                    if (!empty($idNextContent)) {
                        $urlNext = '?controller='.$this->doorGets->controllerNameNow().'&action=edit&lg='.$lgActuel.'&id='.$idNextContent;
                    }

                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.id','type'=>'!=!','value'=>$this->doorGets->Table.'_traduction.id_translator');
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'_traduction.langue','type'=>'=','value'=>$lgActuel);
                    
                    $tAll = $this->doorGets->Table.', '.$this->doorGets->Table.'_traduction';
                    $countTotal = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery);

                    $position = $this->doorGets->getContentPosition($field,$isContent['sentence']);
                }
                
            }
            
        }

        switch ($this->doorGets->requestMethod) {

            case 'GET':

                if (!empty($isContent)) {

                    $timeCreation = (int) $isContent['date_creation'];
                    $timeModification = (int) $isContent['date_modification'];

                    $isContent['id'] = $isContent['id_translator'];
                    $isContent['date_creation'] = date(DATE_ATOM,$timeCreation);
                    $isContent['date_modification'] = date(DATE_ATOM,$timeModification);

                    unset($isContent['groupe_traduction']);
                    unset($isContent['id_user']);
                    unset($isContent['id_groupe']);
                    unset($isContent['id_translator']);

                    $response['code']       = 200;
                    $response['data']       = $isContent;
                    $response['next']       = $idNextContent;
                    $response['previous']   = $idPreviousContent;
                    $response['position']   = $position;
                    
                }

                if (!empty($this->doorGets->Table) && empty($isContent) && $id === 0) {
                        
                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 100;
                    
                    $params = $this->doorGets->Params();
                    $lgActuel =$this->doorGets->getLangueTradution();
                    
                    
                    $isFieldArray       = array(
                        
                        "sentence"=>$this->doorGets->__('Phrase'),
                        "translated_sentence"=>$this->doorGets->__('Traduction'),
                        "is_translated"=>$this->doorGets->__('Traduit'),
                    );
                    
                    $isFieldArraySort   = array('sentence','translated_sentence','is_translated');
                    $isInClassicTable   = array('sentence');
                    $isFieldArraySearch = array('sentence','translated_sentence','is_translated');
                    
                    
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[0];
                    $urlSearchQuery     = '';
                    $urlSort            = '&asc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = $this->doorGets->Table.', '.$this->doorGets->Table.'_traduction'; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.id','type'=>'!=!','value'=>$this->doorGets->Table.'_traduction.id_translator');
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'_traduction.langue','type'=>'=','value'=>$lgActuel);
                    
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
                                            
                                        }
                                        
                                    }else{
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if (!in_array($v, $isInClassicTable)) {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table."_traduction.".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.".$v,'type'=>'like','value'=>$valueQP);
                                            
                                            }else{
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." LIKE '%".$valueQP."%' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                            
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
                    
                    // Init sort 
                    $getDesc = 'ASC';
                    $getSort = '&desc';
                    if (isset($_GET['desc']))
                    {
                        $getDesc = 'DESC';
                        $getSort = '&asc';
                    }
                    
                    // Init filter for order by 
                    $outFilterORDER = $this->doorGets->Table.'.sentence  '.$getDesc;
                    
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
                    $outSqlGroupe = " WHERE ".$this->doorGets->Table.".id = ".$this->doorGets->Table."_traduction.id_translator AND ".$this->doorGets->Table."_traduction.langue ='$lgActuel' ".$sqlLabelSearch;
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
                            
                            $all[$pos]['id'] = $all[$pos]['id_translator'];
                            unset($all[$pos]['groupe_traduction']);
                            unset($all[$pos]['id_user']);
                            unset($all[$pos]['id_groupe']);
                            unset($all[$pos]['id_translator']);
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
