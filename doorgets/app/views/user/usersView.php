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

class UsersView extends doorGetsUserView{
    
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
        
        $groupes = $this->doorGets->loadGroupesToSelect();

        $canAddUser = false;
        if (!empty($this->doorGets->user['liste_enfant_modo'])) {
            
            $canAddUser = true;
            foreach ($groupes as $idGroupe => $label) {
            
                if (!empty($idGroupe) && !in_array($idGroupe,$this->doorGets->user['liste_enfant_modo'])) {

                    unset($groupes[$idGroupe]);
                }   
            }
        }

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,'_users_info');
            $LogineExistInfoGroupe = $this->doorGets->dbQS($isContent['network'],'_users_groupes');

            if (!empty($LogineExistInfoGroupe)) {
                $LogineExistInfoGroupe['attributes'] =  @unserialize(base64_decode($LogineExistInfoGroupe['attributes']));
            }

            $isActiveNotificationNewsletter = $isActiveNotificationMail = '';
                
            if (!empty($isContent['notification_mail'])) { $isActiveNotificationMail = 'checked'; }
            if (!empty($isContent['notification_newsletter'])) { $isActiveNotificationNewsletter = 'checked'; }
            
            $img['facebook']    = '<img  src="'.BASE_IMG.'icone_facebook.png" > ';
            $img['twitter']     = '<img  src="'.BASE_IMG.'icone_twitter.png" > ';
            $img['youtube']     = '<img  src="'.BASE_IMG.'icone_youtube.png" > ';
            $img['google']      = '<img  src="'.BASE_IMG.'icone_google.png" > ';
            $img['pinterest']   = '<img  src="'.BASE_IMG.'icone_pinterest.png" > ';
            $img['linkedin']    = '<img  src="'.BASE_IMG.'icone_linkedin.png" > ';
            $img['myspace']     = '<img  src="'.BASE_IMG.'icone_myspace.png" > ';
            
            
            $nFace      = $img['facebook'].'http://www.facebook.com/<span style="color:#000099;">'.$isContent['id_facebook'].'</span>';
            $nTwitter   = $img['twitter'].'http://www.twitter.com/<span style="color:#000099;">'.$isContent['id_twitter'].'</span>';
            $nYoutube   = $img['youtube'].'http://www.youtube.com/user/<span style="color:#000099;">'.$isContent['id_youtube'].'</span>';
            $nGoogle    = $img['google'].'https://plus.google.com/u/0/<span style="color:#000099;">'.$isContent['id_google'].'</span>';
            $nPinterest = $img['pinterest'].'https://www.pinterest.com/<span style="color:#000099;">'.$isContent['id_pinterest'].'</span>';
            $nLinkedin  = $img['linkedin'].'http://www.linkedin.com/in/<span style="color:#000099;">'.$isContent['id_linkedin'].'</span>';
            $nMyspace   = $img['myspace'].'http://www.myspace.com/<span style="color:#000099;">'.$isContent['id_myspace'].'</span>';
            
            $genderAr = $this->doorGets->getArrayForms('gender');
        }
        
        $aUsersActivation = $this->doorGets->getArrayForms('users_activation');
        
        
        if (array_key_exists($this->Action,$Rubriques) )
        {
            switch($this->Action) {
                
                case 'index':
                    
                    
                    $tableName = '_users_info';
                    $q = '';
                    $urlSearchQuery = '';
                    
                    $p = 1;
                    $ini = 0;
                    $per = 50;

                    $params = $this->doorGets->Params();
                    $lgActuel = $this->doorGets->getLangueTradution();
                    
                    $isFieldArray       = array(
                        
                        "pseudo"=>$this->doorGets->__('Pseudo'),
                        "last_name"=>$this->doorGets->__('Nom'),
                        "first_name"=>$this->doorGets->__('Prénom'),
                        "network"=>$this->doorGets->__('Groupe'),
                        "active"=>$this->doorGets->__('Statut'),
                        "date_creation"=>$this->doorGets->__('Date')
                    );
                    

                    $isFieldArraySort   = array('pseudo','last_name','first_name','pseudo','active','network','date_creation',);
                    $isFieldArraySearch = array('pseudo','last_name','first_name','active','network','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');
                    
                    $urlOrderby         = '&orderby='.$isFieldArraySort[6];
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;
                    
                    // Init table query
                    $tAll = " _users_info "; 
                    
                    // Create query search for mysql
                    $sqlLabelSearch = '';
                    $arrForCountSearchQuery = array();
                    
                    $filters  = array();
                    $sqlLabelSearchModo = '  (';

                    foreach ($this->doorGets->user['liste_enfant_modo'] as $idGroup) {
                        //$arrForCountSearchQuery[] = array('key'=>'network','type'=>'=','value'=> $idGroup);
                        $sqlLabelSearchModo .=  "  network = $idGroup OR ";
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
                    
                    $finalPer = $ini+$per;
                    if ($finalPer >  $cResultsInt) {
                        $finalPer = $cResultsInt;
                    }
                    
                    // Create sql query for transaction
                    $outSqlGroupe = " WHERE $sqlLabelSearchModo ".$sqlLabelSearch;
                    $sqlLimit = " $outSqlGroupe ORDER BY $outFilterORDER  LIMIT ".$ini.",".$per;
                    
                    // Create url to go for pagination
                    $urlPage = "./?controller=users".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=users".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
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
                    $urlPage = "./?controller=users&page=";
                    $urlPageGo = './?controller=users';
                    
                    $block->addTitle($dgSelMass,'sel_mass','td-title');
                    foreach($isFieldArray as $fieldName=>$fieldNameLabel) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $isFieldArraySort[6] )
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
                        $css = 'td-title';
                        if ($fieldName === 'date_creation') {
                            $css = 'tb-50 td-title';
                        }
                        
                        $block->addTitle($dgLabel,$fieldName,"$leftFirst $css");
                        $iPos++;
                        
                    }
                    
                    $block->addTitle('','edit','td-title');
                    $block->addTitle('','delete','td-title');
                    
                    $arFilterActivation = $this->doorGets->getArrayForms('users_activation');
                    
                    $valFilterPseudo = '';
                    if (array_key_exists('doorGets_search_filter_q_pseudo',$aGroupeFilter)) {
                        $valFilterPseudo = $aGroupeFilter['doorGets_search_filter_q_pseudo'];
                    }
                    
                    $valFilterLastName = '';
                    if (array_key_exists('doorGets_search_filter_q_last_name',$aGroupeFilter)) {
                        $valFilterLastName = $aGroupeFilter['doorGets_search_filter_q_last_name'];
                    }
                    
                    $valFilterFirstName = '';
                    if (array_key_exists('doorGets_search_filter_q_first_name',$aGroupeFilter)) {
                        $valFilterFirstName = $aGroupeFilter['doorGets_search_filter_q_first_name'];
                    }
                    
                    $valFilterActive = 0;
                    if (array_key_exists('doorGets_search_filter_q_active',$aGroupeFilter)) {
                        $valFilterActive = $aGroupeFilter['doorGets_search_filter_q_active'];
                    }
                    
                    $valFilterGroupe = 0;
                    if (array_key_exists('doorGets_search_filter_q_network',$aGroupeFilter)) {
                        $valFilterGroupe = $aGroupeFilter['doorGets_search_filter_q_network'];
                    }
                    
                    $valFilterDateStart = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_start',$aGroupeFilter)) {
                        $valFilterDateStart = $aGroupeFilter['doorGets_search_filter_q_date_creation_start'];
                    }
                    
                    $valFilterDateEnd = '';
                    if (array_key_exists('doorGets_search_filter_q_date_creation_end',$aGroupeFilter)) {
                        $valFilterDateEnd = $aGroupeFilter['doorGets_search_filter_q_date_creation_end'];
                    }
                    
                    $sFilterActive      = $this->doorGets->Form['_search_filter']->select('','q_active',$arFilterActivation,$valFilterActive);
                    $sFilterPseudo      = $this->doorGets->Form['_search_filter']->input('','q_pseudo','text',$valFilterPseudo);
                    $sFilterLastName    = $this->doorGets->Form['_search_filter']->input('','q_last_name','text',$valFilterLastName);
                    $sFilterFirstName   = $this->doorGets->Form['_search_filter']->input('','q_first_name','text',$valFilterFirstName);
                    $sFilterGroupe      = $this->doorGets->Form['_search_filter']->select('','q_network',$groupes,$valFilterGroupe);
                    $sFilterDate        = $this->doorGets->Form['_search_filter']->input('','q_date_creation_start','text',$valFilterDateStart,'doorGets-date-input datepicker-from');
                    $sFilterDate        .= $this->doorGets->Form['_search_filter']->input('','q_date_creation_end','text',$valFilterDateEnd,'doorGets-date-input datepicker-to');
                    
                    // Search
                    $urlMassdelete = '<input type="checkbox" class="check-me-mass-all" />';
                    $urlMassdelete = '';
                    
                    $block->addContent('sel_mass',$urlMassdelete );
                    $block->addContent('pseudo',$sFilterPseudo );
                    $block->addContent('last_name',$sFilterLastName );
                    $block->addContent('first_name',$sFilterFirstName );
                    $block->addContent('network',$sFilterGroupe ,'center');
                    $block->addContent('active',$sFilterActive ,'center');
                    $block->addContent('date_creation',$sFilterDate,'center');
                    $block->addContent('edit','--','center');
                    $block->addContent('delete','--','center');
                    
                    // end Seach
                    
                    if (empty($cAll)) {
                        
                        $block->addContent('sel_mass','' );
                        $block->addContent('pseudo','' );
                        $block->addContent('last_name','' );
                        $block->addContent('first_name','' );
                        $block->addContent('network','' ,'center');
                        $block->addContent('active','' ,'center');
                        $block->addContent('date_creation','','center');
                        $block->addContent('edit','','center');
                        $block->addContent('delete','','center');
                        
                    }
                    
                    for($i=0;$i<$cAll;$i++) {
                        
                        $urlStatut = '<i class="fa fa-exclamation-triangle red-c"></i>';
                        if (array_key_exists($all[$i]['active'],Constant::$userStatus)) {
                            $urlStatut = Constant::$userStatus[$all[$i]['active']];
                        }

                        $tGroupes = '-';
                        if (array_key_exists($all[$i]["network"],$groupes)) {
                            $tGroupes = $groupes[$all[$i]["network"]];
                        }
                        
                        $imgUser = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=users&action=edit&id='.$all[$i]['id'].'"><img class="avatar-listing" src="'.URL.'data/users/'.$all[$i]["avatar"].'" title="'.$all[$i]["pseudo"].'" /></a>';

                        $urlMassdelete  = '<input id="'.$all[$i]["id"].'" type="checkbox" class="check-me-mass" >';
                        $urlPseudo      = $all[$i]["pseudo"];
                        $urlLastName    = $all[$i]["last_name"];
                        $urlFirstName   = $all[$i]["first_name"];
                        $urlGroupe      = $tGroupes.'</a>';
                        $urlDelete      = '<a title="'.$this->doorGets->__('Supprimer').'" href="./?controller=users&action=delete&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-remove red"></b></a>';
                        $urlEdit        = '<a title="'.$this->doorGets->__('Modifier').'" href="./?controller=users&action=edit&id='.$all[$i]['id'].'"><b class="glyphicon glyphicon-pencil green-font" ></b></a>';
                        
                        $dateCreation = GetDate::in($all[$i]['date_creation'],2,$this->doorGets->myLanguage());
                        
                        $block->addContent('sel_mass',$imgUser );
                        $block->addContent('pseudo',$urlPseudo );
                        $block->addContent('last_name',$urlLastName );
                        $block->addContent('first_name',$urlFirstName );
                        $block->addContent('network',$urlGroupe,'center' );
                        $block->addContent('active',$urlStatut ,'center');
                        $block->addContent('date_creation',$dateCreation,'center');
                        $block->addContent('edit',$urlEdit,'center');
                        $block->addContent('delete',$urlDelete,'center');
                        
                    }
                    
                    $formMassDelete = '';
                    $fileFormMassDelete = 'user/users/user_users_massdelete_form';
                    $tplFormMassDelete = Template::getView($fileFormMassDelete);
                    ob_start(); if (is_file($tplFormMassDelete)) { include $tplFormMassDelete;} $formMassDelete = ob_get_clean();
                    
                    /**********
                     *
                     *  End block creation for listing fields
                     * 
                     */
                    
                    break;
                
                case 'edit':

                    $Attributes = $this->doorGets->loadUserAttributesWithValues($isContent['id'],$LogineExistInfoGroupe['attributes']);
                    break;
            }
            
            $ActionFile = 'user/users/user_users_'.$this->Action;
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}