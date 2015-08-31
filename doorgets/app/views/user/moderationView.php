<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
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
                    
                    $p = 1;
                    $ini = 0;
                    $per = 25;

                    $iPos = 0;
                    $urlToGo = "./?controller=$controllerName";
                    $urlPage = "./?controller=$controllerName&page=";

                    $isFieldArray       = array(
                        
                        "id"    =>  array ( 
                            'label'     => $this->doorGets->__('Id'),
                            'type'      => 'text',
                            'options'   => null,
                            'name'      => 'Id',
                            'sort'      => true,
                            'search'    => true
                        ),
                        "id_user"    =>  array ( 
                            'label'     => $this->doorGets->__('Id').' '.$this->doorGets->__('User'),
                            'type'      => 'text',
                            'options'   => null,
                            'name'      => 'IdUser',
                            'sort'      => true,
                            'search'    => true
                        ),
                        "pseudo"    =>  array ( 
                            'label'     => $this->doorGets->__('Pseudo'),
                            'type'      => 'text',
                            'options'   => null,
                            'name'      => 'Pseudo',
                            'sort'      => true,
                            'search'    => true
                        ),
                        "id_groupe"    =>  array ( 
                            'label'     => $this->doorGets->__('Id').' '.$this->doorGets->__('Module'),
                            'type'      => 'text',
                            'options'   => null,
                            'name'      => 'IdGroupe',
                            'sort'      => true,
                            'search'    => true
                        ),
                        "type_module"    =>  array ( 
                            'label'     => $this->doorGets->__('Type').' '.$this->doorGets->__('Module'),
                            'type'      => 'select',
                            'options'   => array(
                                'blog'      => $this->doorGets->__('Blog'),
                                'news'      => $this->doorGets->__("Fil d'actualités"),
                                'video'     => $this->doorGets->__('Galerie vidéos'),
                                'image'     => $this->doorGets->__("Galerie d'image"),
                            ),
                            'name'      => 'TypeModule',
                            'sort'      => true,
                            'search'    => true
                        ),
                        "action"    =>  array ( 
                            'label'     => $this->doorGets->__('Action'),
                            'type'      => 'select',
                            'options'   => array(
                                'add'       => $this->doorGets->__('Ajout'),
                                'edit'      => $this->doorGets->__("Modification")
                            ),
                            'name'      => 'TypeModule',
                            'sort'      => true,
                            'search'    => true
                        ),
                        "date_creation"    =>  array ( 
                            'label'     => $this->doorGets->__('Date'),
                            'type'      => 'date',
                            'options'   => null,
                            'name'      => 'DateCreation',
                            'sort'      => true,
                            'search'    => true
                        ),
                    );
                    
                    $iniUrlSortBy = 'id';

                    $isFieldArraySort   = array('id','id_user','id_groupe','type_module','pseudo','action','date_creation',);
                    $isFieldArraySearch = array('id','id_user','id_groupe','id_content','type_module','pseudo','action','date_creation','date_creation_start','date_creation_end',);
                    $isFieldArrayDate   = array('date_creation');

                    $urlOrderby         = '&orderby='.$iniUrlSortBy;
                    $urlSearchQuery     = '';
                    $urlSort            = '&desc';
                    $urlLg              = '&lg='.$lgActuel;
                    $urlCategorie       = '';
                    $urlGroupBy         = '&gby='.$per;


                    if ( array_key_exists('gby',$_GET) && is_numeric($_GET['gby']) && $_GET['gby'] < 300) {
                
                        $per = $_GET['gby'];
                    }

                    if ( array_key_exists('page',$_GET) && is_numeric($_GET['page']) && $_GET['page'] > 0) {

                        $p = $_GET['page'];
                        $ini = $p * $per - $per;
                    }
                    
                    $backUrl = urlencode('?controller=moderation&page='.$p);

                    // Init sort 
                    $getDesc = 'DESC';
                    $getSort = '&asc';
                    if (isset($_GET['asc']))
                    {
                        $getDesc = 'ASC';
                        $getSort = '&desc';
                        $urlSort = '&asc';
                    }


                    // Init Query
                    $moderationQuery        = new  ModerationQuery($this->doorGets);
                    if (!empty($User['liste_enfant'])) {
                        foreach($User['liste_enfant'] as $id_groupe) {
                            $moderationQuery->filterByIdGroupe($id_groupe,'OR');
                        }
                    }
                    
                    $moderationCollection   = $moderationQuery
                        ->paginate($p,$per)
                    ;    

                    // Init Filters

                    $getFilter = '';
                    if (
                        array_key_exists('orderby',$params['GET'])
                        && !empty($params['GET']['orderby'])
                        && in_array($params['GET']['orderby'],$isFieldArraySort)
                    ) {
                        
                        $getFilter      = $params['GET']['orderby'];
                        $getFilterOrderBy = 'orderBy'.$isFieldArray[$getFilter]['name'];
                        $urlOrderby     = '&orderby='.$getFilter;
                        
                        $moderationCollection->$getFilterOrderBy($getDesc);

                    } else {

                        $moderationCollection->orderById($getDesc);

                    }

                    $aGroupeFilter = array();
                    if (!empty($isFieldArraySearch)) {
                        
                        // Récupére les paramêtres du get et post pour la recherche par filtre
                        foreach($isFieldArraySearch as $fieldName)
                        {
                            
                            $valueQP = '';
                            
                            if (
                                array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['GET'])
                                && !empty($params['GET']['doorGets_search_filter_q_'.$fieldName])
                            ) {
                                
                                $valueQP = trim($params['GET']['doorGets_search_filter_q_'.$fieldName]);
                                $aGroupeFilter['doorGets_search_filter_q_'.$fieldName] = $valueQP;
                                
                            }

                            if (
                                array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['POST'])
                                && !array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['GET'])
                                && !empty($params['POST']['doorGets_search_filter_q_'.$fieldName])
                            ) {
                                
                                $valueQP = trim($params['POST']['doorGets_search_filter_q_'.$fieldName]);
                                $aGroupeFilter['doorGets_search_filter_q_'.$fieldName] = $valueQP;
                                
                            }

                            if ((   
                                    array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['GET'])
                                    && !empty($params['GET']['doorGets_search_filter_q_'.$fieldName])
                                ) || (   
                                    array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['POST'])
                                    && !array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['GET'])
                                    && !empty($params['POST']['doorGets_search_filter_q_'.$fieldName])
                            )) {

                                if (!empty($valueQP)) {
                                    
                                    $valEnd = str_replace('_start','',$fieldName);
                                    $valEnd = str_replace('_end','',$fieldName);
                                    
                                    if (in_array($valEnd,$isFieldArrayDate)) {
                                        
                                        if (
                                            array_key_exists('doorGets_search_filter_q_'.$fieldName,$params['GET'])
                                            && !empty($params['GET']['doorGets_search_filter_q_'.$fieldName])
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
                                        
                                        if (strlen(str_replace('_end','',$fieldName)) !== strlen($fieldName)) {
                                            
                                            $filterRangeByFieldTable = 'filterRangeBy'.$isFieldArray[$valEnd]['name'];
                                            $moderationCollection->$filterRangeByFieldTable($from,$to);

                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_start='.$fromFormat;
                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'_end='.$toFormat;

                                        }
                                        
                                    }else{

                                        if (in_array($fieldName,$isFieldArraySort)) {

                                            $nameFieldTable = 'filterBy'.$isFieldArray[$fieldName]['name'];
                                            $moderationCollection->$nameFieldTable($valueQP);

                                            $urlSearchQuery .= '&doorGets_search_filter_q_'.$valEnd.'='.$valueQP;
                                        }
                                    }
                                }
                            }
                        }
                    }

                    // Join traduction 
                    //$moderationCollection->join('DgFilesTraduction', array('id'=>'id_file'), array('langue' => $lgActuel));

                    // var_dump($moderationCollection);
                    // exit();
                    // Execute Query
                    $moderationCollection->find();

                    $count = $moderationCollection->count();
                    $countTotal = $moderationCollection->countTotal();

                    $moderationEntities     = $moderationCollection->_getEntities('array');
                    
                    $imgTop = '<div class="d-top"></div>';
                    $imgBottom= '<div class="d-bottom"></div>';

                    $block = new BlockTable();
                    $block->setClassCss('doorgets-listing');
                    
                    foreach ($isFieldArray as $fieldName=>$field) {
                        
                        $_css   = '_css_'.$fieldName;
                        $_img   = '_img_'.$fieldName;
                        $_desc  = '_desc_'.$fieldName;
                        
                        $$_css = $$_img = $$_desc = $leftFirst = '';
                        
                        if (
                            $getFilter === $fieldName
                            || ( empty($getFilter) && $fieldName === $iniUrlSortBy )
                       ) {
                            $$_css = ' class="green" ';
                            $$_img = $imgTop;
                            $$_desc = $getSort;
                            if ($getDesc === 'ASC') {
                                $$_img = $imgBottom;
                                $$_desc = '';
                            }
                        }


                        $leftFirst = ($iPos === 0 && $fieldName !== 'id') ? 'first-title left' : '' ;
                        
                        $dgLabel = $field['label'];
                        if (in_array($fieldName,$isFieldArraySort))
                        {
                            $dgLabel = '<a href="'.$urlToGo.'&orderby='.$fieldName.$urlSearchQuery.'&gby='.$per.$$_desc.'" '.$$_css.'  >'.$$_img.$field['label'].'</a>';
                        }

                        $block->addTitle($dgLabel,$fieldName,"$leftFirst text-center");
                        $iPos++;
                        
                    }
                    
                    // Search field
                    foreach ($isFieldArray as $fieldName=>$field) {
                        
                        //  Check field value
                        $valFilter = (array_key_exists('doorGets_search_filter_q_'.$fieldName,$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName] : '';

                        // Check type and put field
                        switch ($field['type']) {

                            case 'text':
                                $sFilter    = $this->doorGets->Form['_search_filter']->input('','doorGets_search_filter_q_'.$fieldName,'text',$valFilter);
                                break;

                            case 'select':

                                if (is_array($field['options'])) {
                                    $field['options'] = array_merge(array(''),$field['options']);
                                    $sFilter    = $this->doorGets->Form['_search_filter']->select('','doorGets_search_filter_q_'.$fieldName,$field['options'],$valFilter);
                                }

                                break;

                            case 'date':

                                $valFilterStart = (array_key_exists('doorGets_search_filter_q_'.$fieldName.'_start',$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName.'_start'] : '';
                                $valFilterEnd = (array_key_exists('doorGets_search_filter_q_'.$fieldName.'_end',$aGroupeFilter)) ? $aGroupeFilter['doorGets_search_filter_q_'.$fieldName.'_end'] : '';

                                $sFilter    = $this->doorGets->Form['_search_filter']->input('','doorGets_search_filter_q_'.$fieldName.'_start','text',$valFilterStart,'doorGets-date-input datepicker-from text-center');
                                $sFilter    .= $this->doorGets->Form['_search_filter']->input('','doorGets_search_filter_q_'.$fieldName.'_end','text',$valFilter,'doorGets-date-input datepicker-to text-center');

                                break;

                            default:
                                $sFilter    = '#';
                                break;
                        }
                        
                        $block->addContent($fieldName,$sFilter );
                    }

                    if (empty($moderationEntities)) {
                        
                        foreach($isFieldArray as $fieldName=>$field) {

                            $block->addContent($fieldName,'' );
                        }

                    } else {
                    
                        for($i=0;$i<$count;$i++) {

                            foreach($isFieldArray as $fieldName=>$field) {

                                if (is_array($field['options']) && array_key_exists($moderationEntities[$i][$fieldName], $field['options'])) {
                                    
                                    $moderationEntities[$i][$fieldName] = $field['options'][$moderationEntities[$i][$fieldName]];
                                }

                                $id = $moderationEntities[$i]['id'];
                                $cssClass  = 'text-center';
                                switch ($fieldName) {

                                    case 'date_creation':
                                        $moderationEntities[$i][$fieldName] = GetDate::in($moderationEntities[$i]['date_creation'],1,$this->doorGets->myLanguage());
                                        break;
                                }
                                
                                $urlToGoNext = '?controller=module'.strtolower($moderationEntities[$i]['type_module']).'&uri='.$moderationEntities[$i]['uri_module'].'&action=edit&id='.$moderationEntities[$i]['id_content'].'&lg='.$moderationEntities[$i]['langue'].'&back='.$backUrl;
                                $content = '<a href="'.$urlToGoNext.'" class="td-block">'.$moderationEntities[$i][$fieldName].'</a>';
                                $block->addContent($fieldName,$content ,$cssClass);
                            }
                        }
                    }

                    $finalPer = $ini+$per;
                    if ($finalPer >  $countTotal) {
                        $finalPer = $countTotal;
                    }

                    $urlPage = "./?controller=$controllerName".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlGroupBy.$urlLg.'&page=';
                    $urlPagePosition = "./?controller=$controllerName".$urlCategorie.$urlOrderby.$urlSearchQuery.$urlSort.$urlLg.'&page='.$p;
                    
                    $valPage = ($countTotal > $per) ? Pagination::page($countTotal,$p,$per,$urlPage) : '';

                    break;
            }
            
            $ActionFile = 'user/'.$controllerName.'/user_'.$controllerName.'_'.$this->Action;
            
            $tpl = Template::getView($ActionFile);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
            
        }
        
        return $out;
    }
}
