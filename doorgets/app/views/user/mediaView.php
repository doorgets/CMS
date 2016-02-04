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



class MediaView extends doorGetsUserView{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function getContent() {
        
        $out      = '';
        $User     = $this->doorGets->user;
        $lgActuel = $this->doorGets->getLangueTradution();
        $isModo   = false;
        
        if (
            !empty($User) && in_array('media',$User['liste_module_interne'])
            && in_array('media',$User['liste_module_interne_modo'])
        ) { $isModo = true; }
        
        // files type start
        $typeFile["image/png"] = "data/upload/png/";
        $typeFile["image/jpeg"] = "data/upload/jpg/";
        $typeFile["image/gif"] = "data/upload/gif/";
        
        $typeFile["application/zip"] = "data/upload/zip/";
        $typeFile["application/x-zip-compressed"] = "data/upload/xzip/";
        $typeFile["application/pdf"] = "data/upload/pdf/";
        $typeFile["application/x-shockwave-flash"] = "data/upload/swf/";
        
        $typeExtension["image/png"] = "png";
        $typeExtension["image/jpeg"] = "jpg";
        $typeExtension["image/gif"] = "gif";
        
        $typeExtension["application/zip"] = "zip";
        $typeExtension["application/x-zip-compressed"] = "xzip";
        
        $typeExtension["application/pdf"] = "pdf";
        $typeExtension["application/x-shockwave-flash"] = "swf";
        
        $typeImage["image/png"] = '<img src="'.BASE_IMG.'png.png" class="ico_fichier" >';
        $typeImage["image/jpeg"] = '<img src="'.BASE_IMG.'jpg.png" class="ico_fichier" >';
        $typeImage["image/gif"] = '<img src="'.BASE_IMG.'gif.png" class="ico_fichier" >';
        $typeImage["application/zip"] = '<img src="'.BASE_IMG.'zip.png" class="ico_fichier" >';
        $typeImage["application/x-zip-compressed"] = '<img src="'.BASE_IMG.'zip.png" class="ico_fichier" >';
        $typeImage["application/pdf"] = '<img src="'.BASE_IMG.'pdf.png" class="ico_fichier" >';
        $typeImage["application/x-shockwave-flash"] = '<img src="'.BASE_IMG.'swf.png" class="ico_fichier" >';
        
        $this->typeFile         = $typeFile;
        $this->typeExtension    = $typeExtension;
        $this->typeImage        = $typeImage;
        // files type end
        
        $Rubriques = array(
            
            'index'         => $this->doorGets->__('Media'),
            'add'           => $this->doorGets->__('Ajouter un media'),
            'select'        => $this->doorGets->__('Voir un media'),
            'edit'          => $this->doorGets->__('Editer un media'),
            'delete'        => $this->doorGets->__('Supprimer un media'),
            'massdelete'    => $this->doorGets->__('Suppression par media'),
            
        );
        
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
                    
                }
                
            }
            $printImage = '';
            $isContent['size'] = number_format(((int)$isContent['size']/1000000),2,',',' ').' Mo';
            $urlFile = URL.$this->typeFile[$isContent['type']].$isContent['path'];
            if ($isContent['type'] === 'image/png' || $isContent['type'] === 'image/jpeg' || $isContent['type'] === 'image/gif') {
                $printImage = '<img src="'.$urlFile.'" alt="'.$isContent['title'].'" class="img img-responsive" />';
            }
            
            
        }
        
        $gTypes = $this->doorGets->loadGroupesOptionToSelect($this->doorGets->Table,'type');
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
                    $lgActuel =$this->doorGets->getLangueTradution();
                    
                    
                    $isFieldArray       = array(
                        
                        "title"=>$this->doorGets->__('Titre'),
                        "type"=>$this->doorGets->__('Type'),
                        "size"=>$this->doorGets->__('Poids'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    
                    $isFieldArraySort   = array('title','type','size','date_creation',);
                    $isFieldArraySearch = array('title','type','size','date_creation_start','date_creation_end',);
                    $isFieldArraySearchType = array(
                        

                        'title'       => array('type' =>'text','value'=>''),
                        'type'      => array('type' =>'select','value'=>$gTypes),
                        'size'      => array('type' =>'text','value'=>''),
                    );
                    
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[3];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = $this->doorGets->Table.', '.$this->doorGets->Table.'_traduction'; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.id','type'=>'!=!','value'=>$this->doorGets->Table.'_traduction.id_file');
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'.id','type'=>'>','value'=>0);
                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.'_traduction.langue','type'=>'=','value'=>$lgActuel);
                    
                    $sqlMediaOther       = '';
                    
                    if ($isModo && !empty($User['liste_enfant'])) {
                        
                        $sqlMediaOther .= " AND ( ( ".$this->doorGets->Table.".id_user = '".$User['id']."' AND ".$this->doorGets->Table.".id_groupe = '".$User['groupe']."' ) ";
                        
                        foreach($User['liste_enfant'] as $id_groupe) {
                            
                            $sqlMediaOther .= " OR ".$this->doorGets->Table.".id_groupe = '".$id_groupe."' ";
                            
                        }
                        
                        $sqlMediaOther .= ')';
                        
                    }else{
                        
                        $sqlMediaOther = " AND ".$this->doorGets->Table.".id_user = '".$User['id']."' AND ".$this->doorGets->Table.".id_groupe = '".$User['groupe']."' ";
                        
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
                                        
                                        if (in_array($v,$isFieldArraySort)) {
                                            
                                            if ($v === 'uri_module') {
                                                
                                                $sqlLabelSearch .= $this->doorGets->Table.".".$v." = '".$valueQP."' AND ";
                                                $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'=','value'=>$valueQP);
                                            
                                            }else{
                                                
                                                if ($v === 'title') {
                                                    $sqlLabelSearch .= $this->doorGets->Table."_traduction.".$v." LIKE '%".$valueQP."%' AND ";
                                                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table."_traduction.".$v,'type'=>'like','value'=>$valueQP);
                                                } else {
                                                    $sqlLabelSearch .= $this->doorGets->Table.".".$v." LIKE '%".$valueQP."%' AND ";
                                                    $arrForCountSearchQuery[] = array('key'=>$this->doorGets->Table.".".$v,'type'=>'like','value'=>$valueQP);
                                                }
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
                    $cResultsInt = $this->doorGets->getCountTable($tAll,$arrForCountSearchQuery,$sqlMediaOther);
                    
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
                    $outFilterORDER = $this->doorGets->Table.'.date_creation  '.$getDesc;
                    
                    $getFilter = '';
                    if (
                        array_key_exists('orderby',$params['GET'])
                        && !empty($params['GET']['orderby'])
                        && in_array($params['GET']['orderby'],$isFieldArraySort)
                   ) {
                        
                        $getFilter      = $params['GET']['orderby'];
                        if ($getFilter === 'title') { $getFilter = 'date_creation'; }
                        $outFilterORDER = $this->doorGets->Table.'.'.$getFilter.'  '.$getDesc;
                        
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
                    $outSqlGroupe = " WHERE ".$this->doorGets->Table.".id = ".$this->doorGets->Table."_traduction.id_file AND ".$this->doorGets->Table."_traduction.langue ='$lgActuel' ".$sqlMediaOther.$sqlLabelSearch;
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
                    $urlPage = "./?controller=".$this->doorGets->controllerNameNow().'&lg='.$lgActuel."&page=";
                    $urlPageGo = './?controller='.$this->doorGets->controllerNameNow().'&lg='.$lgActuel;
                    
                    //$block->addTitle($dgSelMass,'sel_mass','td-title');
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
                        
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst td-title text-center d");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','edit','td-title');
                    $block->addTitle('','delete','td-title');
                    
                    // Search
                    $urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
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
                    if (array_key_exists('q_date_creation_start',$aGroupeFilter)) {
                        $valFilterDateStart = $aGroupeFilter['q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['q_date_creation_end'];
                    }
                    
                    $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        //$block->addContent('sel_mass','' );
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $block->addContent($nameField,'' );
                        }
                        $block->addContent('date_creation','','text-center');
                        $block->addContent('edit','','text-center');
                        $block->addContent('delete','','text-center');
                        
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $urlId  = $all[$i]["id_file"];
                        
                        $urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=delete&id='.$all[$i]['id_file'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlEdit        = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=edit&id='.$all[$i]['id_file'].'&lg='.$lgActuel.'"><b class="glyphicon glyphicon-pencil green-font"></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        //$block->addContent('sel_mass',$urlId ,'tb-30 text-center');
                        
                        foreach($isFieldArraySearchType as $nameField => $value) {
                            $css = '';
                            if ($nameField === 'type') {
                                $all[$i][$nameField] = $this->typeImage[$all[$i][$nameField]]; $css ='tb-150 text-center';
                            }
                            if ($nameField === 'size') {
                                $all[$i][$nameField] = number_format(((int)$all[$i][$nameField]/1000000),2,',',' ').' Mo'; $css ='tb-50  text-right';
                            }
                            if ($nameField === 'title') {
                               $all[$i][$nameField] = '<a title="'.$this->doorGets->__('Afficher').'" href="./?controller='.$this->doorGets->controllerNameNow().'&action=select&id='.$all[$i]['id_file'].'&lg='.$lgActuel.'">'.$all[$i][$nameField].'</a>'; 
                            }
                            $block->addContent($nameField, $all[$i][$nameField],$css);
                        }
                        
                        $block->addContent('date_creation',$dateCreation,'tb-150 text-center');
                        $block->addContent('edit',$urlEdit,'tb-30 text-center');
                        $block->addContent('delete',$urlDelete,'tb-30 center');
                        
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