<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Websitehttp://www.doorgets.com
    Contacthttp://www.doorgets.com/t/en/?contact
    
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

function vdump($var){
    echo '<pre>';
    var_dump($var);
    exit();
}



class doorgetsFunctions{
    
    
    public $Categories = array();
    public $_tempdata = array();
    public $Level = 0;
    public $user = null;

    public function checkMode($isAdminPanel = true) {
        
        // check if is user
        if ($isAdminPanel && empty($this->user)) {  header('Location:./');exit(); }

        // Check Size Folders
        if (SAAS_ENV) {
            $sizeFolders = $this->getTotalPathSize(BASE);
            if ( $sizeFolders > SAAS_SIZE_LIMIT) {
                FlashInfo::set($this->__("Espace disque insuffisant"),'error'); 
                header('Location:'.$_SERVER['REQUEST_URI']);exit();
            }
        }
        // check if is demo mode
        if (ACTIVE_DEMO) {
            FlashInfo::set($this->__("Mode démo").', '.$this->__("Aucune modification n'est autorisée").' !','info');
            header('Location:'.$_SERVER['REQUEST_URI']);exit();
        }   
    }

    public function checkAjaxMode() {

        // check if is demo mode
        if (ACTIVE_DEMO) {
            $response = array(
                'code' => 404,
                'data' => array('message'=>'Demo mode')
            );
            
            echo json_encode($response, JSON_FORCE_OBJECT);
            exit();
        }
    }

    public function clearDBCache() {
        
        $dir = CACHE_DB;
        if (!is_dir($dir)) {
             @mkdir($dir, 0777, true);
        }

        foreach (scandir($dir) as $file) { 
            if ($file == '.' || $file == '..') continue;
            $f = $dir.$file;
            if (is_file($f)) {
                unlink($f);
            }
        }
    }

    public function clearModuleDBCache($moduleName = '') {
        
        $dir = CACHE_DB.$moduleName.'/';
        if (is_dir($dir)) {
            foreach (scandir($dir) as $file) { 
                if ($file == '.' || $file == '..') continue;
                $f = $dir.$file;
                if (is_file($f)) {
                    unlink($f);
                } 
            }
        }
    }
    
    /*
     * $filter = array(
     *              array('key'=>'fooKey','type'=>'like or =','value'=>'fooValue'),
     *              array('key'=>'otherFooKey','type'=>'like or =','value'=>'otherFooValue'),
     *           );
    */
    public function getCountTable($table,$filter = array(),$other = '',$condition = 'AND') {
        
        $table = $this->getRealUri($table);
        $cFilter = count($filter);
        $outFilter = '';
        if (!empty($cFilter)) {
            
            $outFilter = ' WHERE ';
            for($i=0;$i < $cFilter;$i++) {
                
                if (array_key_exists($i,$filter)) {
                    
                    // KEY
                    
                    if (array_key_exists('key',$filter[$i])) {
                        
                        $outFilter .= ' '.$filter[$i]['key'];
                        
                    }
                    
                    // TYPE
                    
                    $type = ' = '; $startValue = "'"; $endValue = "'";
                    
                    if ($filter[$i]['type'] === '!=!' )
                    {
                        
                        $type = ' = '; $startValue = ''; $endValue = '';
                    
                    }elseif ($filter[$i]['type'] === '>' )
                    {
                        
                        $type = ' >= '; $startValue = ""; $endValue = "";
                        
                    }elseif ($filter[$i]['type'] === '<' )
                    {
                        
                        $type = ' <= '; $startValue = ""; $endValue = "";
                        
                    }elseif (array_key_exists('type',$filter[$i]) && $filter[$i]['type'] === 'like' )
                    {
                        
                        $type = ' LIKE '; $startValue = "'%"; $endValue = "%'";
                    }
                    
                    $outFilter .= $type;
                    
                    // VALUE
                    
                    if (array_key_exists('value',$filter[$i]) )
                    {
                        
                        $outFilter .= $startValue.$filter[$i]['value'].$endValue;
                    }
                    
                }
                
                if ($i != ( $cFilter - 1) )
                {
                    $outFilter .= " $condition ";
                }
            }
        }
        
        $Query = "SELECT COUNT(*) as counter FROM $table $outFilter $other ";
        //echo '----- '.$Query.'------- <br /><br />';
        
        $isContent = $this->dbQ($Query);
        $cResultsInt = (int)$isContent[0]['counter'];
        
        return $cResultsInt; 
    }

    public function getUserSqlCount($withUser = false) {

        $User        = $this->user;

        $allModules  = $this->loadModules(true);

        $sqlUser = '';
        if ($User && !empty($allModules)) {

            foreach($allModules as $k=>$v) {
                if (in_array($k,$User['liste_module'])) {
                    $myActivatedUri[$k] = $v['uri'];
                }
            }

            if (!empty($myActivatedUri)) {
                $sqlUser .= " ( ";
                $i=1;
                foreach($myActivatedUri as $uri_module) {
                    if ($i > 1) {$sqlUser .= " OR ";}
                    $sqlUser .= " uri_module = '".$uri_module."' "; $i++;
                }
                $sqlUser .= " ) ";
            }  

            if ($withUser) {
                if (!empty($sqlUser) && !empty($User['liste_enfant_modo'])) {
                    $sqlUser .= ' AND ';
                    $sqlUser .= " ( ";
                    $i=1;
                    foreach ($User['liste_enfant_modo'] as $idGroup) {
                        if ($i > 1) {$sqlUser .= " OR ";}
                        $sqlUser .= " id_groupe = '".$idGroup."' "; $i++;
                    }
                    $sqlUser .= " ) ";
                }
            }
        }

        return $sqlUser;
    }

    public function getCountComment($uri_module,$uri_content) {
        
        $userSqlCount = ($this->getUserSqlCount(true)) ? ' AND '.$this->getUserSqlCount(true) : '';
        
        $filter = array(
            array('key'=>'uri_module','type'=>'=','value'=>$uri_module),
            array('key'=>'uri_content','type'=>'=','value'=>$uri_content),
            array('key'=>'validation','type'=>'=','value'=>'2'),
        );
        
        return $this->getCountTable('_dg_comments',$filter,$userSqlCount);  
    }
    
    public function getCountMessageNotRead() {
        
        $id_user = 0;
        if (property_exists($this, 'user') && !is_null($this->user)) {
            $id_user = $this->user['id'];
        } elseif (property_exists($this, '_User')  && !is_null($this->_User) && array_key_exists('id',$this->_User)) {
            $id_user = $this->_User['id'];
        } 

        if ($id_user === 0) {
            return $id_user;
        }

        $filter = array(
            
            array('key'=>'readed','type'=>'=','value'=>'2'),
            array('key'=>'id_user','type'=>'=','value'=>$id_user),
        );
        
        return $this->getCountTable('_users_inbox',$filter);  
    }

    public function getCountCommentNotRead() {
        
        $userSqlCount = ($this->getUserSqlCount()) ? ' AND '.$this->getUserSqlCount() : '';
       
        $filter = array(
            
            array('key'=>'validation','type'=>'=','value'=>'3'),
        );
        
        return $this->getCountTable('_dg_comments',$filter,$userSqlCount);  
    }

    public function getCountCommentActivated() {
        
        $userSqlCount = ($this->getUserSqlCount()) ? ' AND '.$this->getUserSqlCount() : '';
        
        $filter = array(
            
            array('key'=>'validation','type'=>'=','value'=>'2'),
        );
        
        return $this->getCountTable('_dg_comments',$filter,$userSqlCount);  
    }
    
    public function getCountInboxNotRead() {
        
        $userSqlCount = ($this->getUserSqlCount()) ? ' AND '.$this->getUserSqlCount() : '';
        
        $filter = array(
            array('key'=>'lu','type'=>'=','value'=>'2'),
        );
        
        return $this->getCountTable('_dg_inbox',$filter,$userSqlCount);  
    }

    public function getCountModerationWaitting() {

        $userSqlCount = ($this->getUserSqlCount(true)) ? ' WHERE '.$this->getUserSqlCount(true) : '';
        
        return $this->getCountTable('_moderation',array(),$userSqlCount);  
    }

    public function getCountSupportNotRead() {
        
        $filter = array(
            array('key'=>'readed_support','type'=>'=','value'=>'1'),
        );
        
        return $this->getCountTable('_support',$filter);  
    }

    public function getCountUserSupportNotRead() {
        
        $filter = array(
            
            array('key'=>'readed_user','type'=>'=','value'=>'1'),
            array('key'=>'id_user','type'=>'=','value'=>$this->user['id']),
        );
        
        return $this->getCountTable('_support',$filter);  
    }
    
    public function loadUserCategories($module='',$userId) {
        
        $out = array(0=>'Choisir...');
        $outs = $outIds = $outs_ = array();
        
        $Categories = $this->getCategories($module);
        if (!empty($Categories)) {
            foreach($Categories as $Categorie) {
                
                $iCategorie = $this->getCountTable('_m_'.$module,array(
                    array(
                        'key'=>'categorie',
                        'type'=>'like',
                        'value'=>$Categorie['id'].','
                    ),
                    array(
                        'key'=>'id_user',
                        'type'=>'=',
                        'value'=>$userId.','
                    )
                ));
                
                $outIds[$Categorie['id']]   = $Categorie['uri'];
                $out[$Categorie['id']]      = $Categorie['name'];
                $outs[$Categorie['uri']]    = $Categorie['name'];
                
                $outs_[$Categorie['uri']]['name']   = $Categorie['name'];
                $outs_[$Categorie['uri']]['level']  = $Categorie['level'];
                $outs_[$Categorie['uri']]['id']     = $Categorie['id'];
                $outs_[$Categorie['uri']]['count']  = $iCategorie;
                
                
            }
        }
        $this->categorieSimple_ = $outs_;
        $this->categorieSimple = $out;
        $this->categoriesIds = $outIds;
        return $outs;
    }

    public function loadCategories($module='') {
        
        $out = array(0=>'Choisir...');
        $outs = $outIds = $outs_ = $outs__ = array();
        
        $Categories = $this->getCategories($module);
        if (!empty($Categories)) {
            foreach($Categories as $Categorie) {
                
                $iCategorie = $this->getCountTable('_m_'.$module,array(array('key'=>'categorie','type'=>'like','value'=>$Categorie['id'].',')));
                
                $outIds[$Categorie['id']]   = $Categorie['uri'];
                $out[$Categorie['id']]      = $Categorie['name'];
                $outs[$Categorie['uri']]    = $Categorie['name'];
                
                $outs_[$Categorie['uri']]['name']   = $Categorie['name'];
                $outs_[$Categorie['uri']]['level']  = $Categorie['level'];
                $outs_[$Categorie['uri']]['id']     = $Categorie['id'];
                $outs_[$Categorie['uri']]['count']  = $iCategorie;

                $outs__[$Categorie['id']]['id']     = $Categorie['id'];
                $outs__[$Categorie['id']]['name']   = $Categorie['name'];
                $outs__[$Categorie['id']]['level']  = $Categorie['level'];
                $outs__[$Categorie['id']]['uri']    = $Categorie['uri'];
                $outs__[$Categorie['id']]['count']  = $iCategorie;
                
            }
        }

        $this->categorieSimple_ = $outs_;
        $this->categorieSimple__ = $outs__;
        $this->categorieSimple = $out;
        $this->categoriesIds = $outIds;
        return $outs;
    }
    
    public function getAllCategories($module) {
        
        $out = array();
        
        $isContent = $this->dbQ("
        SELECT _categories.id as id,
        _categories.id_parent as id_parent,
        _categories.ordre as ordre,
        _categories.uri_module as module,
        _categories_traduction.nom as nom,
        _categories_traduction.titre as titre,
        _categories_traduction.uri as uri
        FROM _categories,_categories_traduction
        WHERE  _categories.id = _categories_traduction.id_cat
        AND _categories.uri_module = '$module'
        AND _categories_traduction.langue = '".$this->getLangueTradution()."'
        ORDER BY _categories.ordre ASC ");
        
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $iContents = $this->getCountTable('_m_'.$isContent[$i]['module'],array(array('key'=>'categorie','type'=>'like','value'=>$isContent[$i]['id'].',')));
                
                $out[$isContent[$i]['id']]['module']        = $isContent[$i]['module'];
                $out[$isContent[$i]['id']]['id']            = $isContent[$i]['id'];
                $out[$isContent[$i]['id']]['nom']           = $isContent[$i]['nom'];
                $out[$isContent[$i]['id']]['titre']         = $isContent[$i]['titre'];
                $out[$isContent[$i]['id']]['ordre']         = $isContent[$i]['ordre'];
                $out[$isContent[$i]['id']]['uri']           = $isContent[$i]['uri'];
                $out[$isContent[$i]['id']]['id_parent']     = $isContent[$i]['id_parent'];
                $out[$isContent[$i]['id']]['count']         = $iContents;
            }
        }
        
        return $out;
    }
    
    public function getMenuCategories($parent, $niveau, $array,&$out = array()) {
        
        foreach ($array AS $noeud) {
            
            if ($parent == $noeud['id_parent']) {
                
                $i = count($array);
                $iContents = $this->getCountTable('_m_'.$noeud['module'],array(array('key'=>'categorie','type'=>'like','value'=>$noeud['id'].',')));
                
                $out[$noeud['id']]['module']        = $noeud['module'];
                $out[$noeud['id']]['id']            = $noeud['id'] ;
                $out[$noeud['id']]['nom']           = $noeud['nom'] ;
                $out[$noeud['id']]['uri']           = $noeud['uri'] ;
                $out[$noeud['id']]['id_parent']     = $noeud['id_parent'] ;
                $out[$noeud['id']]['titre']         = $noeud['titre'] ;
                $out[$noeud['id']]['ordre']         = $noeud['ordre'] ;
                $out[$noeud['id']]['nb_brother']    = $this->getCountBrotherCategorie($noeud['id'],$array);
                $out[$noeud['id']]['level']         = $niveau ;
                $out[$noeud['id']]['count']         = $iContents ;
                
                $this->getMenuCategories($noeud['id'], ($niveau + 1), $array,$out);
            }
         
        }
        
        return $out;
    }
    
    public function getBreadcrumb($module=0,$categorie=0,$position=1,&$out= array()) {
        
        $isContent = $this->dbQ("
        SELECT _categories.id as id,
        _categories.id_parent as id_parent,
        _categories.ordre as ordre,
        _categories.uri_module as module,
        _categories_traduction.nom as nom,
        _categories_traduction.titre as titre,
        _categories_traduction.uri as uri
        FROM _categories,_categories_traduction
        WHERE  _categories.id = _categories_traduction.id_cat
        AND _categories.id = '$categorie'
        AND _categories.uri_module = '$module'
        AND _categories_traduction.langue = '".$this->getLangueTradution()."'
        ORDER BY _categories.ordre ASC ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $out[$position]['id']        = $isContent[$i]['id'];
                $out[$position]['nom']       = $isContent[$i]['nom'];
                $out[$position]['titre']     = $isContent[$i]['titre'];
                $out[$position]['ordre']     = $isContent[$i]['ordre'];
                $out[$position]['uri']       = $isContent[$i]['uri'];
                $out[$position]['id_parent'] = $isContent[$i]['id_parent'];
                $out[$position]['position']  = $position;
                
                if ($isContent[$i]['id_parent'] !== '0') {
                    $this->getBreadcrumb($module,$isContent[$i]['id_parent'],$position+1,$out);
                }
            }
        }
        
        return $out;
    }
    
    public function getCountBrotherCategorie($categorie_id,$array) {
        
        if (array_key_exists($categorie_id,$array)) {
            $parent_id = $array[$categorie_id]['id_parent'];
        }
        $i = 0;
        if (!empty($array) && is_array($array)) {
            foreach($array as $v) {
                if ($v['id_parent'] == $parent_id) {
                    $i++;
                }
            }
        }
        return $i;   
    }
    
    public function getMenuCategoriesOptions($parent, $niveau, $array,&$out = array(0=>'')) {
     
        foreach ($array AS $noeud) {
            $deca = '';
            if ($parent == $noeud['id_parent']) {
                
                for ($i = 0; $i < $niveau; $i++) { $deca .= "&nbsp;&nbsp;"; }
                $out[$noeud['id']] = $deca.' '.$noeud['nom'] ;
                $this->getMenuCategoriesOptions($noeud['id'], ($niveau + 1), $array,$out);
            }
         
        }
        
        return $out;
    }
    
    public function loadMultipageCategories($module='') {
        
        $nameTable = '_m_'.$module;
        $nameTableTraduction = $nameTable.'_traduction';
        $tablesSql = $nameTable.', '.$nameTableTraduction;
        
        $out = array();
        
        $isContent = $this->dbQA($tablesSql," WHERE $nameTable.active = 2 AND $nameTable.id = $nameTableTraduction.id_content AND  $nameTableTraduction.langue = '".$this->myLanguage."' ORDER BY ordre LIMIT 100");
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $out[$isContent[$i]['uri']]['uri']       = $isContent[$i]['uri'];
                $out[$isContent[$i]['uri']]['level']     = $isContent[$i]['level'];
                $out[$isContent[$i]['uri']]['id']        = $isContent[$i]['id'];
                $out[$isContent[$i]['uri']]['nom']       = $isContent[$i]['nom'];
                $out[$isContent[$i]['uri']]['titre']     = $isContent[$i]['titre'];
                $out[$isContent[$i]['uri']]['ordre']     = $isContent[$i]['ordre'];
                $out[$isContent[$i]['uri']]['id_parent'] = $isContent[$i]['id_parent'];
                $out[$isContent[$i]['uri']]['position']  = $isContent[$i]['position'];
            }
        }
        return $out;  
    }
    
    public function moduleInfos($uri,$langue="fr") {
        
        $langue = $this->myLanguage;
        
        $moduleInfos                        = array();
        
        $moduleInfos['id']                  = '';
        $moduleInfos['uri']                 = '';
        $moduleInfos['author_badge']        = '';
        $moduleInfos['nom']                 = '';
        $moduleInfos['titre']               = '';
        $moduleInfos['description']         = '';
        $moduleInfos['type']                = '';
        $moduleInfos['groupe_by']           = '';
        $moduleInfos['groupe_by_see_to']    = '';

        $moduleInfos['uri_notification_moderator']    = '';
        $moduleInfos['uri_notification_user_success']    = '';
        $moduleInfos['uri_notification_user_error']    = '';
        
        $isModule = $this->dbQS($uri,'_modules','uri');
        
        if (
            !empty($isModule)
            && $isLangueGroupe = unserialize($isModule['groupe_traduction'])
       ) {
            
            $moduleInfos['id']                  = $isModule['id'];
            $moduleInfos['uri']                 = $isModule['uri'];
            $moduleInfos['author_badge']        = $isModule['author_badge'];
            $moduleInfos['type']                = $isModule['type'];
            $moduleInfos['groupe_by']           = $isModule['bynum'];
            $moduleInfos['groupe_by_see_to']    = $isModule['avoiraussi'];
            
            $moduleInfos['uri_notification_moderator']      = $isModule['uri_notification_moderator'];
            $moduleInfos['uri_notification_user_success']   = $isModule['uri_notification_user_success'];
            $moduleInfos['uri_notification_user_error']     = $isModule['uri_notification_user_error'];

            $idTraduction = $isLangueGroupe[$langue];
            $isModuleTraduction = $this->dbQS($idTraduction,'_modules_traduction');
            if (!empty($isModuleTraduction)) {
                
                $moduleInfos['nom']         = ucfirst($isModuleTraduction['nom']);
                $moduleInfos['titre']       = $isModuleTraduction['titre'];
                $moduleInfos['description'] = $isModuleTraduction['description'];
                $moduleInfos['all']         = $isModuleTraduction;
            }
        }
        
        return $moduleInfos; 
    }
    
    public function loadModulesRubrique($module = "",$table="_rubrique") {
        
        $out = array('-');
        $outRubrique = array();

        $isAllRubrique = $this->dbQ("SELECT idModule FROM $table LIMIT 200");
        $cAllRubrique = count($isAllRubrique);
        if (!empty($isAllRubrique)) {
            for($i=0;$i<$cAllRubrique;$i++) {
                $outRubrique[] = $isAllRubrique[$i]['idModule'];
            }
        }

        $isAllModule = $this->dbQ("SELECT id,uri FROM _modules WHERE type != 'block'  LIMIT 200");
        $cAllModule = count($isAllModule);
        if (!empty($isAllModule)) {
            for($i=0;$i<$cAllModule;$i++) {
                if (
                    $module == $isAllModule[$i]['id'] 
               ) {
                    $out[$isAllModule[$i]['id']] = $isAllModule[$i]['uri'];
                    
                }else{
                    if (!in_array($isAllModule[$i]['id'], $outRubrique)) {
                        $out[$isAllModule[$i]['id']] = $isAllModule[$i]['uri'];
                    }
                }
                
            }
        }

        
        return $out;   
    }

    public function loadAttributes() {

        $out  = array();
        $lgActuel = $this->getLangueTradution();

        $Attributes = $this->dbQ("SELECT * FROM _users_groupes_attributes u, _users_groupes_attributes_traduction t WHERE u.id = t.id_attribute AND t.langue = '$lgActuel' ORDER BY title LIMIT 5000");
        
        foreach ($Attributes as $key => $value) {

            unset($value['groupe_traduction']);
            unset($value['groupe_traduction']);
            
            $value['params'] = unserialize(base64_decode($value['params']));
            
            $out[$value['id_attribute']] = $value;

        }

        return $out;
    }
    
    public function loadGroupes() {
        
        $out = array();
        
        $isContent = $this->dbQ("SELECT * FROM _users_groupes ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {

            for($i=0;$i<$cContent;$i++) {

                if ($traductions = @unserialize($isContent[$i]['groupe_traduction'])) {

                    $isTraduction = $this->dbQS($traductions[$this->getLangueTradution()],'_users_groupes_traduction');
                    if ($isTraduction) {
                        $out[$isContent[$i]['id']] = $isTraduction['title'];
                    }
                    
                }

            }
        }
        
        return $out;  
    }

    public function loadGroupesAttributes() {
        
        $out = array();
        
        $isContent = $this->dbQ("SELECT * FROM _users_groupes ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {

            for($i=0;$i<$cContent;$i++) {

                if ($traductions = @unserialize($isContent[$i]['groupe_traduction'])) {

                    $isTraduction = $this->dbQS($traductions[$this->getLangueTradution()],'_users_groupes_traduction');
                    if ($isTraduction) {
                        $out[$isContent[$i]['id']] = unserialize(base64_decode($isContent[$i]['attributes']));
                    }
                    
                }

            }
        }
        
        return $out;  
    }

    public function loadUserAttributesWithValues($idUser,$userAttributes) {
        
        $Attributes = $this->loadAttributes();
        
        foreach ($Attributes as $id => $value) {

            if (
                !in_array($id, $userAttributes) 
                || (in_array($id, $userAttributes) && $Attributes[$id]['active'] === '2')
            ) {
                unset($Attributes[$id]);
            
            } else {

                $isAttribute = $this->dbQS($id,'_users_groupes_attributes_values','id_attribute', " AND id_user = '".$idUser."' LIMIT 1");
                if (empty($isAttribute)) {

                    $isAttribute = $newAttribute = array(
                        'id_user'           => $idUser,
                        'id_attribute'      => $id,
                        'value'             => '',
                        'date_creation'     => time(),
                        'date_modification' => time()
                    );

                    $isAttribute['id'] = $this->dbQI($newAttribute,'_users_groupes_attributes_values'); 
                }

                $Attributes[$id]['value']   = $isAttribute['value'];

            }

        }

        return $Attributes;  
    }

    public function loadGroupesSubscriber() {
        
        $out = array();
        
        $isAllContent = $this->dbQ("SELECT * FROM _users_groupes WHERE can_subscribe = 1 ");

        $cContent = count($isAllContent);
        if ($cContent > 0) {

            for($i=0;$i<$cContent;$i++) {

                if ($traductions = @unserialize($isAllContent[$i]['groupe_traduction'])) {

                    $isTraduction = $this->dbQS($traductions[$this->getLangueTradution()],'_users_groupes_traduction');
                    if ($isTraduction) {
                        $out[$isAllContent[$i]['uri']]['title'] = $isTraduction['title'];
                        $out[$isAllContent[$i]['uri']]['uri'] = $isAllContent[$i]['uri'];
                        $out[$isAllContent[$i]['uri']]['id'] = $isAllContent[$i]['id'];
                        $out[$isAllContent[$i]['uri']]['verification'] = ($isAllContent[$i]['register_verification'] == 1) ? true: false;
                    }
                    
                }

            }
        }
        
        return $out;  
    }
    
    public function loadGroupesToSelect() {
        
        $out = array('--');
        
        $isContent = $this->dbQ("SELECT * FROM _users_groupes ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                if ($traductions = @unserialize($isContent[$i]['groupe_traduction'])) {
                    
                    $isTraduction = $this->dbQS($traductions[$this->getLangueTradution()],'_users_groupes_traduction');
                    if ($isTraduction) {
                        $out[$isContent[$i]['id']] = $isTraduction['title'];
                    }
                    
                }
                
            }
        }
        
        return $out;  
    }
    
    public function loadGroupesOptionToSelect($table = '_dg_inbox',$key ='uri_module',$include = array()) {
        
        $out = array('--');
        $query = "SELECT * FROM $table GROUP BY $key ";
        if (!empty($include)) {
            $next = ' WHERE (';
            foreach ($include as $field) {
               $next .= " type = '$field' OR ";
            }
            $next = substr($next,0,-3);
            $next .= ')';
            $query = "SELECT * FROM $table $next GROUP BY $key ";
        }
        $isContent = $this->dbQ($query);
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $out[$isContent[$i][$key]] = $isContent[$i][$key];
                
            }
        }
        
        return $out; 
    }
    
    public function loadModules($with_type = false,$isUser = false, $onlyType = '') {
        
        $out = array();
        if (empty($onlyType)) {
            $isContent = $this->dbQ("SELECT * FROM _modules  WHERE type != 'block' AND type != 'genform' AND type != 'carousel' AND type != 'survey' ");
        } else {
            if (is_array($onlyType) && !empty($onlyType)) {
                $sql = ' (';
                foreach ($onlyType as $type) {
                    $sql .= " type = '$type' OR ";
                }
                $sql = substr($sql,0,-3);
                $sql .= ') ';
                $isContent = $this->dbQ("SELECT * FROM _modules  WHERE $sql ");
            } else {
                $isContent = $this->dbQ("SELECT * FROM _modules  WHERE type = '$onlyType' ");
            }
            
        }
        $cContent = count($isContent);

        if ($cContent > 0) {

            for($i=0;$i<$cContent;$i++) {

                if (!$isUser) {

                    if (!$with_type) {
                        
                        $out[$isContent[$i]['id']] = $isContent[$i]['uri'];
                        
                    }else{
                        
                        $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
                        
                        if (!empty($isModuleTrad)) {
                            
                            $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                            $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                            $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                            $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                            $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];
                            
                        }
                    }

                }else{

                    if (array_key_exists('liste_module',$this->user) && in_array($isContent[$i]['id'], $this->user['liste_module'])) {

                        if (!$with_type) {
                        
                            $out[$isContent[$i]['id']] = $isContent[$i]['uri'];
                            
                        }else{
                            
                            $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
                            
                            if (!empty($isModuleTrad)) {
                                
                                $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                                $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                                $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                                $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                                $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];
                                
                            }
                        }
                    }
                }

            }
        }
        
        return $out;  
    }

    public function loadWidgets($isUser = false) {
        
        $out = array();

        $out['blok']        = $this->loadModulesBlocks($isUser);
        $out['carousel']    = $this->loadModulesCarousel($isUser);
        $out['genform']     = $this->loadModulesGenforms($isUser);
        $out['survey']     = $this->loadModulesSurvey($isUser);

        return $out;
    }
    
    public function loadModulesSurvey($isUser = false) {
        
        $out = array();
        
        $isContent = $this->dbQ("SELECT * FROM _modules  WHERE type = 'survey'  ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {

            for($i=0;$i<$cContent;$i++) {
                
                $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
                
                if (!empty($isModuleTrad)) {

                    if (!$isUser) {

                        $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                        $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                        $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                        $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                        $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];    
                    
                    }else{

                        if (array_key_exists('liste_widget',$this->user) && in_array($isContent[$i]['id'], $this->user['liste_widget'])) {

                            $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                            $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                            $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                            $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                            $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];  

                        }

                    }
                                        
                }
            }
        }
        
        return $out;  
    }

    public function loadModulesBlocks($isUser = false) {
        
        $out = array();
        
        $isContent = $this->dbQ("SELECT * FROM _modules  WHERE type = 'block'  ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {

            for($i=0;$i<$cContent;$i++) {
                
                $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
                
                if (!empty($isModuleTrad)) {

                    if (!$isUser) {

                        $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                        $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                        $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                        $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                        $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];    
                    
                    }else{

                        if (array_key_exists('liste_widget',$this->user) && in_array($isContent[$i]['id'], $this->user['liste_widget'])) {

                            $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                            $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                            $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                            $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                            $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];  

                        }

                    }
                                        
                }
            }
        }
        
        return $out;  
    }
    
    public function loadModulesCarousel($isUser = false) {
       
       $out = array();
       
       $isContent = $this->dbQ("SELECT * FROM _modules  WHERE type = 'carousel'  ");
       
       $cContent = count($isContent);
       if ($cContent > 0) {
           for($i=0;$i<$cContent;$i++) {
               
               $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
               if (!empty($isModuleTrad)) {
                   
                   if (!$isUser) {

                       $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                       $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                       $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                       $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                       $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];    
                   
                   }else{

                       if (array_key_exists('liste_widget',$this->user) && in_array($isContent[$i]['id'], $this->user['liste_widget'])) {
                           $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                           $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                           $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                           $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                           $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];  
                       }
                   }                        
               }
           }
       }
       
       return $out; 
    }
    public function loadModulesGenforms($isUser = false) {
        
        $out = array();
        
        $isContent = $this->dbQ("SELECT * FROM _modules  WHERE type = 'genform'  ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
                if (!empty($isModuleTrad)) {
                    
                    if (!$isUser) {

                        $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                        $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                        $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                        $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                        $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];    
                    
                    }else{

                        if (array_key_exists('liste_widget',$this->user) && in_array($isContent[$i]['id'], $this->user['liste_widget'])) {

                            $out[$isContent[$i]['id']]['id']        = $isContent[$i]['id'];
                            $out[$isContent[$i]['id']]['active']    = $isContent[$i]['active'];  
                            $out[$isContent[$i]['id']]['uri']       = $isContent[$i]['uri'];
                            $out[$isContent[$i]['id']]['type']      = $isContent[$i]['type'];
                            $out[$isContent[$i]['id']]['label']     = $isModuleTrad['titre'];  

                        }

                    }                        
                }
            }
        }
        
        return $out;
    }
    
    public function getAllActiveModules($withAllData = true) {
        
        $out = array();
        
        $lgActuel = $this->getLangueTradution();

        $isContent = $this->dbQ("SELECT * FROM _modules WHERE active = 1 ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $lgGroupe = @unserialize($isContent[$i]['groupe_traduction']);
                $idLgGroupe = $lgGroupe[$lgActuel];
                $isModuleTrad = $this->dbQS($idLgGroupe,'_modules_traduction');
                if (!empty($isModuleTrad)) {

                    $out[$isContent[$i]['uri']]['id']     = (int) $isContent[$i]['id'];
                    $out[$isContent[$i]['uri']]['type']   = $isContent[$i]['type'];
                    $out[$isContent[$i]['uri']]['title']   = $isModuleTrad['titre'];
                    $out[$isContent[$i]['uri']]['is_home']   = (bool)$isContent[$i]['is_first'];
                    unset($isContent[$i]['extras']);
                    if($withAllData) {
                        $out[$isContent[$i]['uri']]['all']    = $isContent[$i] + $isModuleTrad;
                    }
                } 
            }
        }
        
        return $out; 
    }

    public function getAllActiveApiModules($withAllData = true) {
        
        $out = array();
        
        $modulesType = Constant::$modulesWithGallery;

        $isContent = $this->dbQ("SELECT * FROM _modules WHERE active = 1 ");
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $isModuleTrad = $this->dbQS($isContent[$i]['id'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."' LIMIT 1");
                if (!empty($isModuleTrad) && in_array($isContent[$i]['type'],$modulesType)) {
                    
                    $out[$isContent[$i]['uri']]['id']     = (int) $isContent[$i]['id'];
                    $out[$isContent[$i]['uri']]['type']   = $isContent[$i]['type'];
                    $out[$isContent[$i]['uri']]['is_home']   = (bool)$isContent[$i]['is_first'];
                    unset($isContent[$i]['extras']);
                    if($withAllData) {
                        $out[$isContent[$i]['uri']]['all']    = $isContent[$i] + $isModuleTrad;
                    }
                } 
            }
        }
        
        return $out; 
    }
    
    public function movePosition($type,$table,$id,$pos,$max) {
        
        $out = '';

        if (!empty($this->Form['_position_up']->i)) {
            
            $this->checkMode();
            
            $id =   $this->Form['_position_up']->i['id'];
            $type = $this->Form['_position_up']->i['type'];
            $pos =   $this->Form['_position_up']->i['position'];
            
            $posPlus = $pos + 1;
            $posMoins = $pos - 1;
            
            if ($pos > 1) {
                
                $this->dbQL("UPDATE  $table SET ordre = ordre + 1 WHERE ordre = $posMoins LIMIT 1");
                $this->dbQL("UPDATE  $table SET ordre = $posMoins WHERE  id = $id LIMIT 1");

                $this->clearModuleDBCache($table);
                
                FlashInfo::set($this->l("La position a bien été mise à jour"));
                header('Location:'.$_SERVER['REQUEST_URI']); exit();
                
            }
            
            
        }
        
        if (!empty($this->Form['_position_down']->i)) {
            
            $this->checkMode();
            
            $id =   $this->Form['_position_down']->i['id'];
            $type = $this->Form['_position_down']->i['type'];
            $pos =   $this->Form['_position_down']->i['position'];
            
            $posPlus = $pos + 1;
            $posMoins = $pos - 1;
            
            if ($pos < $max) {
                
                $this->dbQL("UPDATE  $table SET ordre = ordre - 1 WHERE ordre = $posPlus LIMIT 1");
                $this->dbQL("UPDATE  $table SET ordre = $posPlus WHERE  id = $id LIMIT 1");
                
                $this->clearModuleDBCache($table);

                FlashInfo::set($this->l("La position a bien été mise à jour"));
                header('Location:'.$_SERVER['REQUEST_URI']); exit();
                
            }
            
            
        }
        
        
        $tpl = Template::getView('user/rubriques/user_moveposition');
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
    }

    public function movePositionCategories($type,$table,$id,$id_parent,$pos,$max,$class="") {
        
        $out = '';
       
        if (!empty($this->Form['_position_up']->i)) {
            
            $this->checkMode();
            
            $id         =   $this->Form['_position_up']->i['id'];
            $type       =   $this->Form['_position_up']->i['type'];
            $pos        =   $this->Form['_position_up']->i['position'];
            $id_parent  =   $this->Form['_position_up']->i['id_parent'];
            
            $posPlus = $pos + 1;
            $posMoins = $pos - 1;
            
            if ($pos > 1) {
                
                $this->dbQL("UPDATE  $table SET ordre = ordre + 1 WHERE id_parent = $id_parent AND ordre = $posMoins LIMIT 1");
                $this->dbQL("UPDATE  $table SET ordre = $posMoins WHERE id_parent = $id_parent AND   id = $id LIMIT 1");
                
                $this->clearModuleDBCache($table);

                FlashInfo::set($this->l("La position a bien été mise à jour"));
                header('Location:'.$_SERVER['REQUEST_URI']); exit();
                
            }
            
            
        }
        
        if (!empty($this->Form['_position_down']->i)) {
            
            $this->checkMode();
            
            $id         =   $this->Form['_position_down']->i['id'];
            $type       =   $this->Form['_position_down']->i['type'];
            $pos        =   $this->Form['_position_down']->i['position'];
            $id_parent  =   $this->Form['_position_down']->i['id_parent'];
            
            $posPlus = $pos + 1;
            $posMoins = $pos - 1;
            
            if ($pos < $max) {
                
                $this->dbQL("UPDATE  $table SET ordre = ordre - 1 WHERE id_parent = $id_parent AND ordre = $posPlus LIMIT 1");
                $this->dbQL("UPDATE  $table SET ordre = $posPlus WHERE id_parent = $id_parent AND id = $id LIMIT 1");
                
                $this->clearModuleDBCache($table);

                FlashInfo::set($this->l("La position a bien été mise à jour"));
                header('Location:'.$_SERVER['REQUEST_URI']); exit();
                
            }
            
            
        }
        
        
        $tpl = Template::getView('user/rubriques/user_moveposition_categories');
        ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        
        return $out;
    }

    public function getArrayForms($nameKey = 'yesno') {
        
        $array = array();
        
        $array['yesno'] =  array(
            
           0 => '--',
           1 => $this->l('Oui'),
           2 => $this->l('Non')
            
        );

        $array['yn'] =  array(
            
           1 => $this->l('Oui'),
           0 => $this->l('Non')
            
        );
        
        $array['gender'] =  array(
            
           0 => '--',
           1 => $this->l('Homme'),
           2 => $this->l('Femme')
            
        );
        
        $array['profile_type'] =  array(
            
           1 => $this->l('Tous le monde'),
           2 => $this->l('Seulement les membres'),
           3 => $this->l('Seulement mes contacts'),
           4 => $this->l('Seulement moi'),
            
        );
        
        $array['website_activation'] =  array(
            
           1 => $this->l('Activer'),
           2 => $this->l('Désactiver')
            
        );

        $array['content_activation'] =  array(
            '' => '--',
           1 => $this->l('Activer'),
           2 => $this->l('Désactiver')
            
        );

        $array['activation_mod'] =  array(
            '' => '--',
            0 => $this->l('Désactiver'),
            1 => $this->l('Activer')
            
        );
        
        $array['activation'] =  array(
            
            0 => '--',
            1 => $this->l('Inactive'),
            2 => $this->l('Active'),
            3 => $this->l('En attente de modération'),
            4 => $this->l('En cours de rédaction')
            
        );

        $array['product_activation'] =  array(
            
            0 => '--',
            1 => $this->l('Inactive'),
            2 => $this->l('Active'),
            3 => $this->l('En attente de modération'),
            4 => $this->l('En cours de création')
            
        );
        
        $array['product_stock'] =  array(
            '' => $this->l('Gérer le stock'),
            'up' => $this->l('Augmenter le stock'),
            'down' => $this->l('Diminuer le stock'),
        );

        $array['comment_activation'] =  array(
            
            0 => '--',
            1 => $this->l('Bloquer'),
            2 => $this->l('Activer'),
            3 => $this->l('En attente de modération')
            
        );
        
        $array['facebook_type'] = array(
            "article"                   => $this->l("Article"),
            "book"                      => $this->l("Livre"),
            "books.author"              => $this->l("Livre Auteur"),
            "books.genre"               => $this->l("Genre Livre"),
            "business.business"         => $this->l("Entreprise"),
            "fitness.course"            => $this->l("Cours de remise en forme"),
            "music.album"               => $this->l("Album Musique"),
            "music.musician"            => $this->l("Musicien Musique"),
            "music.playlist"            => $this->l("Musique Playlist"),
            "music.radio_station"       => $this->l("Station de Radio Musique"),
            "music.song"                => $this->l("Musique chanson"),
            "object"                    => $this->l("Objet").'('.$this->l("Object générique").')',
            "place"                     => $this->l("Endroit"),
            "product"                   => $this->l("Produit"),
            "product.group"             => $this->l("Groupe de produits"),
            "product.item"              => $this->l("Point de produit"),
            "profile"                   => $this->l("Profil"),
            "quick_election.election"   => $this->l("Election"),
            "restaurant"                => $this->l("Restaurant"),
            "restaurant.menu"           => $this->l("Restaurant Menu"),
            "restaurant.menu_item"      => $this->l("Restaurant Menu Point"),
            "restaurant.menu_section"   => $this->l("Restaurant Menu Section"),
            "video.episode"             => $this->l("Vidéo Episode"),
            "video.movie"               => $this->l("Vidéo Film"),
            "video.tv_show"             => $this->l("Video TV Show"),
            "video.other"               => $this->l("Vidéo Autres"),
            "website"                   => $this->l("Site Internet"),
        );

        $array['twitter_type'] = array(
            "app"                   => $this->l("App"),
            "photo"                 => $this->l("Photo"),
            "player"                => $this->l("Player"),
            "product"               => $this->l("Produit"),
            "summary"               => $this->l("Résumé"),
            "summary_large_image"   => $this->l("Résumé avec une grande photo"),
        );

        $array['users_activation'] =  array(
            
            0 => '--',
            1 => $this->l('Inactive'),
            2 => $this->l('Active'),
            3 => $this->l("En attente d'activation"),
            4 => $this->l('Bannir'),
            5 => $this->l('Fermé')
            
        );
        
        $array['input_filter'] =  array(
            
            'simple'    => $this->l('Simple'),
            'email'     => $this->l('Email'),
            'url'       => $this->l('URL'),
            'alpha'     => $this->l("Alpha"),
            'num'       => $this->l('Numérique'),
            'alphanum'  => $this->l("Alpha-Numérique"),
            'date'      => $this->l('Date')
            
        );

        $array['input_file'] =  array(
            
            'zip'   => 'zip',
            'png'   => 'png',
            'jpg'   => 'jpg',
            'gif'   => 'gif',
            'swf'   => 'swf',
            'pdf'   => 'pdf',
            'doc'   => 'doc'
            
        );
        
        $array['sub_module'] =  array(
            
            'can_modo'      => $this->l("Modérateur")
            
        );
        
        $array['mail_format'] =  array(
            
            'html'       => $this->l("HTML"),
            'txt'      => $this->l("Texte")
            
        );
        
        $array['times_zone'] = array (
    
            "Pacific/Wake" => "(GMT-12:00) International Date Line West", 
            "Pacific/Apia" => "(GMT-11:00) Midway Island", 
            "Pacific/Apia" => "(GMT-11:00) Samoa", 
            "Pacific/Honolulu" => "(GMT-10:00) Hawaii", 
            "America/Anchorage" => "(GMT-09:00) Alaska", 
            "America/Los_Angeles" => "(GMT-08:00) Pacific Time (US & Canada); Tijuana", 
            "America/Phoenix" => "(GMT-07:00) Arizona", 
            "America/Chihuahua" => "(GMT-07:00) Chihuahua", 
            "America/Chihuahua" => "(GMT-07:00) La Paz", 
            "America/Chihuahua" => "(GMT-07:00) Mazatlan", 
            "America/Denver" => "(GMT-07:00) Mountain Time (US & Canada)", 
            "America/Managua" => "(GMT-06:00) Central America", 
            "America/Chicago" => "(GMT-06:00) Central Time (US & Canada)", 
            "America/Mexico_City" => "(GMT-06:00) Guadalajara", 
            "America/Mexico_City" => "(GMT-06:00) Mexico City", 
            "America/Mexico_City" => "(GMT-06:00) Monterrey", 
            "America/Regina" => "(GMT-06:00) Saskatchewan", 
            "America/Bogota" => "(GMT-05:00) Bogota", 
            "America/New_York" => "(GMT-05:00) Eastern Time (US & Canada)", 
            "America/Indiana/Indianapolis" => "(GMT-05:00) Indiana (East)", 
            "America/Bogota" => "(GMT-05:00) Lima", 
            "America/Bogota" => "(GMT-05:00) Quito", 
            "America/Halifax" => "(GMT-04:00) Atlantic Time (Canada)", 
            "America/Caracas" => "(GMT-04:00) Caracas", 
            "America/Caracas" => "(GMT-04:00) La Paz", 
            "America/Santiago" => "(GMT-04:00) Santiago", 
            "America/St_Johns" => "(GMT-03:30) Newfoundland", 
            "America/Sao_Paulo" => "(GMT-03:00) Brasilia", 
            "America/Argentina/Buenos_Aires" => "(GMT-03:00) Buenos Aires", 
            "America/Argentina/Buenos_Aires" => "(GMT-03:00) Georgetown", 
            "America/Godthab" => "(GMT-03:00) Greenland", 
            "America/Noronha" => "(GMT-02:00) Mid-Atlantic", 
            "Atlantic/Azores" => "(GMT-01:00) Azores", 
            "Atlantic/Cape_Verde" => "(GMT-01:00) Cape Verde Is.", 
            "Africa/Casablanca" => "(GMT) Casablanca", 
            "Europe/London" => "(GMT) Edinburgh", 
            "Europe/London" => "(GMT) Greenwich Mean TimeDublin", 
            "Europe/London" => "(GMT) Lisbon", 
            "Europe/London" => "(GMT) London", 
            "Africa/Casablanca" => "(GMT) Monrovia", 
            "Europe/Berlin" => "(GMT+01:00) Amsterdam", 
            "Europe/Belgrade" => "(GMT+01:00) Belgrade", 
            "Europe/Berlin" => "(GMT+01:00) Berlin", 
            "Europe/Berlin" => "(GMT+01:00) Bern", 
            "Europe/Belgrade" => "(GMT+01:00) Bratislava", 
            "Europe/Paris" => "(GMT+01:00) Brussels", 
            "Europe/Belgrade" => "(GMT+01:00) Budapest", 
            "Europe/Paris" => "(GMT+01:00) Copenhagen", 
            "Europe/Belgrade" => "(GMT+01:00) Ljubljana", 
            "Europe/Paris" => "(GMT+01:00) Madrid", 
            "Europe/Paris" => "(GMT+01:00) Paris", 
            "Europe/Belgrade" => "(GMT+01:00) Prague", 
            "Europe/Berlin" => "(GMT+01:00) Rome", 
            "Europe/Sarajevo" => "(GMT+01:00) Sarajevo", 
            "Europe/Sarajevo" => "(GMT+01:00) Skopje", 
            "Europe/Berlin" => "(GMT+01:00) Stockholm", 
            "Europe/Berlin" => "(GMT+01:00) Vienna", 
            "Europe/Sarajevo" => "(GMT+01:00) Warsaw", 
            "Africa/Lagos" => "(GMT+01:00) West Central Africa", 
            "Europe/Sarajevo" => "(GMT+01:00) Zagreb", 
            "Europe/Istanbul" => "(GMT+02:00) Athens", 
            "Europe/Bucharest" => "(GMT+02:00) Bucharest", 
            "Africa/Cairo" => "(GMT+02:00) Cairo", 
            "Africa/Johannesburg" => "(GMT+02:00) Harare", 
            "Europe/Helsinki" => "(GMT+02:00) Helsinki", 
            "Europe/Istanbul" => "(GMT+02:00) Istanbul", 
            "Asia/Jerusalem" => "(GMT+02:00) Jerusalem", 
            "Europe/Helsinki" => "(GMT+02:00) Kyiv", 
            "Europe/Istanbul" => "(GMT+02:00) Minsk", 
            "Africa/Johannesburg" => "(GMT+02:00) Pretoria", 
            "Europe/Helsinki" => "(GMT+02:00) Riga", 
            "Europe/Helsinki" => "(GMT+02:00) Sofia", 
            "Europe/Helsinki" => "(GMT+02:00) Tallinn", 
            "Europe/Helsinki" => "(GMT+02:00) Vilnius", 
            "Asia/Baghdad" => "(GMT+03:00) Baghdad", 
            "Asia/Riyadh" => "(GMT+03:00) Kuwait", 
            "Europe/Moscow" => "(GMT+03:00) Moscow", 
            "Africa/Nairobi" => "(GMT+03:00) Nairobi", 
            "Asia/Riyadh" => "(GMT+03:00) Riyadh", 
            "Europe/Moscow" => "(GMT+03:00) St. Petersburg", 
            "Europe/Moscow" => "(GMT+03:00) Volgograd", 
            "Asia/Tehran" => "(GMT+03:30) Tehran", 
            "Asia/Muscat" => "(GMT+04:00) Abu Dhabi", 
            "Asia/Tbilisi" => "(GMT+04:00) Baku", 
            "Asia/Muscat" => "(GMT+04:00) Muscat", 
            "Asia/Tbilisi" => "(GMT+04:00) Tbilisi", 
            "Asia/Tbilisi" => "(GMT+04:00) Yerevan", 
            "Asia/Kabul" => "(GMT+04:30) Kabul", 
            "Asia/Yekaterinburg" => "(GMT+05:00) Ekaterinburg", 
            "Asia/Karachi" => "(GMT+05:00) Islamabad", 
            "Asia/Karachi" => "(GMT+05:00) Karachi", 
            "Asia/Karachi" => "(GMT+05:00) Tashkent", 
            "Asia/Calcutta" => "(GMT+05:30) Chennai", 
            "Asia/Calcutta" => "(GMT+05:30) Kolkata", 
            "Asia/Calcutta" => "(GMT+05:30) Mumbai", 
            "Asia/Calcutta" => "(GMT+05:30) New Delhi", 
            "Asia/Katmandu" => "(GMT+05:45) Kathmandu", 
            "Asia/Novosibirsk" => "(GMT+06:00) Almaty", 
            "Asia/Dhaka" => "(GMT+06:00) Astana", 
            "Asia/Dhaka" => "(GMT+06:00) Dhaka", 
            "Asia/Novosibirsk" => "(GMT+06:00) Novosibirsk", 
            "Asia/Colombo" => "(GMT+06:00) Sri Jayawardenepura", 
            "Asia/Rangoon" => "(GMT+06:30) Rangoon", 
            "Asia/Bangkok" => "(GMT+07:00) Bangkok", 
            "Asia/Bangkok" => "(GMT+07:00) Hanoi", 
            "Asia/Bangkok" => "(GMT+07:00) Jakarta", 
            "Asia/Krasnoyarsk" => "(GMT+07:00) Krasnoyarsk", 
            "Asia/Hong_Kong" => "(GMT+08:00) Beijing", 
            "Asia/Hong_Kong" => "(GMT+08:00) Chongqing", 
            "Asia/Hong_Kong" => "(GMT+08:00) Hong Kong", 
            "Asia/Irkutsk" => "(GMT+08:00) Irkutsk", 
            "Asia/Singapore" => "(GMT+08:00) Kuala Lumpur", 
            "Australia/Perth" => "(GMT+08:00) Perth", 
            "Asia/Singapore" => "(GMT+08:00) Singapore", 
            "Asia/Taipei" => "(GMT+08:00) Taipei", 
            "Asia/Irkutsk" => "(GMT+08:00) Ulaan Bataar", 
            "Asia/Hong_Kong" => "(GMT+08:00) Urumqi", 
            "Asia/Tokyo" => "(GMT+09:00) Osaka", 
            "Asia/Tokyo" => "(GMT+09:00) Sapporo", 
            "Asia/Seoul" => "(GMT+09:00) Seoul", 
            "Asia/Tokyo" => "(GMT+09:00) Tokyo", 
            "Asia/Yakutsk" => "(GMT+09:00) Yakutsk", 
            "Australia/Adelaide" => "(GMT+09:30) Adelaide", 
            "Australia/Darwin" => "(GMT+09:30) Darwin", 
            "Australia/Brisbane" => "(GMT+10:00) Brisbane", 
            "Australia/Sydney" => "(GMT+10:00) Canberra", 
            "Pacific/Guam" => "(GMT+10:00) Guam", 
            "Australia/Hobart" => "(GMT+10:00) Hobart", 
            "Australia/Sydney" => "(GMT+10:00) Melbourne", 
            "Pacific/Guam" => "(GMT+10:00) Port Moresby", 
            "Australia/Sydney" => "(GMT+10:00) Sydney", 
            "Asia/Vladivostok" => "(GMT+10:00) Vladivostok", 
            "Asia/Magadan" => "(GMT+11:00) Magadan", 
            "Asia/Magadan" => "(GMT+11:00) New Caledonia", 
            "Asia/Magadan" => "(GMT+11:00) Solomon Is.", 
            "Pacific/Auckland" => "(GMT+12:00) Auckland", 
            "Pacific/Fiji" => "(GMT+12:00) Fiji", 
            "Pacific/Fiji" => "(GMT+12:00) Kamchatka", 
            "Pacific/Fiji" => "(GMT+12:00) Marshall Is.", 
            "Pacific/Auckland" => "(GMT+12:00) Wellington", 
            "Pacific/Tongatapu" => "(GMT+13:00) Nuku'alofa",
            
        );
        
        $array['country'] = array(

            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "BQ" => "British Antarctic Territory",
            "IO" => "British Indian Ocean Territory",
            "VG" => "British Virgin Islands",
            "BN" => "Brunei",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CT" => "Canton and Enderbury Islands",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos [Keeling] Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo - Brazzaville",
            "CD" => "Congo - Kinshasa",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "CI" => "Côte d’Ivoire",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "NQ" => "Dronning Maud Land",
            "DD" => "East Germany",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "FQ" => "French Southern and Antarctic Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and McDonald Islands",
            "HN" => "Honduras",
            "HK" => "Hong Kong SAR China",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JT" => "Johnston Island",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Laos",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macau SAR China",
            "MK" => "Macedonia",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "FX" => "Metropolitan France",
            "MX" => "Mexico",
            "FM" => "Micronesia",
            "MI" => "Midway Islands",
            "MD" => "Moldova",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar [Burma]",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NT" => "Neutral Zone",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "KP" => "North Korea",
            "VD" => "North Vietnam",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PC" => "Pacific Islands Trust Territory",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territories",
            "PA" => "Panama",
            "PZ" => "Panama Canal Zone",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "YD" => "People's Democratic Republic of Yemen",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn Islands",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RO" => "Romania",
            "RU" => "Russia",
            "RW" => "Rwanda",
            "RE" => "Réunion",
            "BL" => "Saint Barthélemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "KR" => "South Korea",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syria",
            "ST" => "São Tomé and Príncipe",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UM" => "U.S. Minor Outlying Islands",
            "PU" => "U.S. Miscellaneous Pacific Islands",
            "VI" => "U.S. Virgin Islands",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "SU" => "Union of Soviet Socialist Republics",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "ZZ" => "Unknown or Invalid Region",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VA" => "Vatican City",
            "VE" => "Venezuela",
            "VN" => "Vietnam",
            "WK" => "Wake Island",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
            "AX" => "Åland Islands",
        );

        return $array[$nameKey];
    }
    
    public function getWebsiteInfoByAttribute($attribute = 'domaine') {
        
        if (!empty($this->configWeb) && array_key_exists($attribute,$this->configWeb) )
        {
            return $this->configWeb[$attribute];    
        }
        
        return null;
    }
    
    public function getRubriques($table = '_rubrique') {
        
        
        $rubOut = array();
        $isGroupeRubrique = $this->dbQ("SELECT * FROM $table WHERE showinmenu = '1' ORDER BY ordre");
        
        if (!empty($isGroupeRubrique)) {
            
            foreach($isGroupeRubrique as $v) {
                
                if (!empty($v['idModule'])) {
                    
                        
                    $isModule = $this->dbQS($v['idModule'],'_modules');
                    
                    if (!empty($isModule) AND $isModule['active'] === '1') {
                        
                        $isModuleTrad = $this->dbQS($v['idModule'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."'");
                        if (!empty($isModuleTrad)) {
                            
                            $rubOut[$isModule['uri']]['label']      = $isModuleTrad['nom'];
                            $rubOut[$isModule['uri']]['type']       = $isModule['type'];
                            $rubOut[$isModule['uri']]['all']        = $isModule + $isModuleTrad;
                            if ($isModule['type'] === 'multipage') {
                                $rubOut[$isModule['uri']]['categories'] = $this->getCategoriesMultipage($this->getRealUri($isModule['uri']));
                            }else{
                                $rubOut[$isModule['uri']]['categories'] = $this->getCategories($isModule['uri']); 
                            }
                            
                        }
                        
                    }
                }   
            }
            
        }
        
        return $rubOut; 
    }
    
    public function getRubriquesUsers($table = '_rubrique',$modulesArray) {
        
        
        $rubOut = array();
        $isGroupeRubrique = $this->dbQ("SELECT * FROM $table WHERE showinmenu = '1' ORDER BY ordre");
        
        if (!empty($isGroupeRubrique)) {
            
            foreach($isGroupeRubrique as $v) {
                
                if (!empty($v['idModule'])) {
                    
                    $isModule = $this->dbQS($v['idModule'],'_modules');
                    
                    if (!empty($isModule) AND $isModule['active'] === '1' AND  in_array($v['idModule'],$modulesArray)) {
                        
                        $isModuleTrad = $this->dbQS($v['idModule'],'_modules_traduction','id_module'," AND langue = '".$this->myLanguage()."'");
                        if (!empty($isModuleTrad)) {
                            
                            $rubOut[$isModule['uri']]['label']      = $isModuleTrad['nom'];
                            $rubOut[$isModule['uri']]['type']       = $isModule['type'];
                            $rubOut[$isModule['uri']]['all']        = $isModule + $isModuleTrad;
                            $rubOut[$isModule['uri']]['categories'] = $this->getCategories($isModule['uri']);
                            
                        }
                        
                    }
                }   
            }
            
        }
        
        return $rubOut;
    }
    
    public function getCategories($module='') {
        
        $out = array();
        $Categories = $this->getAllCategories($module);
        $menuCategories = $this->getMenuCategories(0,0,$Categories);
        
        $isAllRC = $this->dbQ("
        SELECT _categories.id as id,
        _categories.uri_module as module,
        _categories_traduction.nom as nom,
        _categories_traduction.uri as uri
        FROM _categories,_categories_traduction
        WHERE  _categories.id = _categories_traduction.id_cat
        AND _categories.uri_module = '$module'
        AND _categories_traduction.langue = '".$this->getLangueTradution()."'
        ORDER BY _categories.ordre ASC ");
        
        
        if (!empty($menuCategories)) {
            foreach($menuCategories as $Categorie) {
                $out[$Categorie['uri']]['id'] = $Categorie['id'];
                $out[$Categorie['uri']]['name'] = $Categorie['nom'];
                $out[$Categorie['uri']]['level'] = $Categorie['level'];
                $out[$Categorie['uri']]['uri'] = $Categorie['uri'];
            }
        }
        
        
        return $out;
    }

    public function getCategoriesMultipage($module='') {
        
        $nameTable = '_m_'.$module;
        $nameTableTraduction = $nameTable.'_traduction';
        $tablesSql = $nameTable.', '.$nameTableTraduction;
        
        $out = array();
        
        $isContent = $this->dbQA($tablesSql," WHERE $nameTable.active = 2 AND $nameTable.id = $nameTableTraduction.id_content AND  $nameTableTraduction.langue = '".$this->myLanguage."' ORDER BY ordre LIMIT 100");
        
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                $out[$isContent[$i]['uri']]['id']       = $isContent[$i]['id'];
                $out[$isContent[$i]['uri']]['level']    = 0;
                $out[$isContent[$i]['uri']]['name']     = $isContent[$i]['titre'];

            }
        }
        
        return $out;
    }
    
    public function getUrl($type = '') {
        
        $out = '';
        
        if (empty($type)) { return $out; }
        
        switch($type) {
            
            case 'facebook':
                if (!empty($this->configWeb['facebook'])) {
                    $out = 'http://www.facebook.com/'.$this->configWeb['facebook'];   
                }
                break;
            
            case 'twitter':
                if (!empty($this->configWeb['twitter'])) {
                    $out = 'http://www.twitter.com/'.$this->configWeb['twitter'];   
                }
                break;
            
            case 'pinterest':
                if (!empty($this->configWeb['pinterest'])) {
                    $out = 'https://www.pinterest.com/'.$this->configWeb['pinterest'];   
                }
                break;
            
            case 'linkedin':
                if (!empty($this->configWeb['linkedin'])) {
                    $out = 'http://www.linkedin.com/in/'.$this->configWeb['linkedin'];   
                }
                break;
            
            case 'youtube':
                if (!empty($this->configWeb['youtube'])) {
                    $out = 'http://www.youtube.com/user/'.$this->configWeb['youtube'];   
                }
                break;
            
            case 'google':
                if (!empty($this->configWeb['google'])) {
                    $out = 'https://plus.google.com/u/0/'.$this->configWeb['google'];   
                }
                break;
            
            case 'myspace':
                if (!empty($this->configWeb['myspace'])) {
                    $out = 'http://www.myspace.com/'.$this->configWeb['myspace'];   
                }
                break;
            
        }
        
        return $out;
    }

    public function getUrlProfile($type = '',$value = '') {
        
        $out = '';
        
        if (empty($type) || empty($value)) { return $out; }
        
        switch($type) {
            
            case 'facebook':
                $out = 'http://www.facebook.com/'.$value;   
                break;
            
            case 'twitter':
                $out = 'http://www.twitter.com/'.$value;   
                break;
            
            case 'pinterest':
                $out = 'https://www.pinterest.com/'.$value;   
                break;
            
            case 'linkedin':
                $out = 'http://www.linkedin.com/in/'.$value;  
                break;
            
            case 'youtube':
                $out = 'http://www.youtube.com/user/'.$value;   
                break;
            
            case 'google':
                $out = 'https://plus.google.com/u/0/'.$value;  
                break;
            
            case 'myspace':
                $out = 'http://www.myspace.com/'.$value;   
                break;
            
        }
        
        return $out;
    }
    
    public function getImageSkin($type = '') {
        
        $out = '';
        
        if (empty($type)) { return $out; }
        
        switch($type) {
            
            case 'facebook':
                $out =  URL.'skin/img/icone_facebook.png';   
                break;
            
            case 'twitter':

                $out = URL.'skin/img/icone_twitter.png'; 
                break;
            
            case 'pinterest':

                $out =  URL.'skin/img/icone_pinterest.png';   
                break;

            case 'linkedin':

                $out =  URL.'skin/img/icone_linkedin.png';   
                break;

            case 'youtube':

                $out =  URL.'skin/img/icone_youtube.png';   
                break;

            case 'google':

                $out =  URL.'skin/img/icone_google.png';   
                break;

            case 'myspace':
            
                $out =  URL.'skin/img/icone_myspace.png';   
                break;
        }
        
        return $out;
    }

    public function varDumpArray(&$array = array(),$removedKeys = array()) {

        $return = '$array = array('."<br />";
        
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (!array_key_exists($key, $removedKeys)) {
                    (is_numeric($key))? $k = $key : $k = "'$key'";
                    (is_numeric($value))? $v = $value : $v = "'$value'";

                    $return .= $k.' => $this->doorGets->Form->i['.$k."],<br />"; 
                }
            }
        }

        $return .= ');'."<br />";

        return $return;
    }

    public function varDumpArrayToTable(&$array = array(),$removedKeys = array()) {

        $return = "<br />";
        
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (!array_key_exists($key, $removedKeys)) {
                    (is_numeric($key))? $k = $key : $k = "$key";
                    (is_numeric($value))? $v = $value : $v = "'$value'";

                    $return .= "`$k` varchar(255) DEFAULT NULL, <br />";  
                }
            }
        }

        return $return;
    }
    
    public function _cleanPHP($var){
        
        $phpOpen = '[[php/o]]';
        $phpClose = '[[php/c]]';
        
        $var = str_replace(";?",$phpOpen,$var);
        $var = str_replace("?&",$phpClose,$var);
        $var = html_entity_decode($var);
        $var = str_replace($phpOpen,"; ?",$var); 
        $var = str_replace($phpClose,"? &",$var); 
        
        // $var = str_replace('&lt;','<',$var);
        // $var = str_replace('&gt;','>;',$var);
        //vdump($var);
        return $var;
    }

    public function _toArray($list,$delimiter = ',',$prefix = '#') {
        
        $out = array();
        $ListeArray = array();
        
        if (!empty($list)) {
            
            $ListeArray = explode($delimiter,$list); 
        }

        foreach ($ListeArray as $key => $value) {
            if ($value !== '') {
                $out[$key] = trim(str_replace($prefix, '', $value));
            }
        }
        
        return $out;
    }

    public function _toArrayInv($listeArray,$delimiter = ',',$prefix = '#') {
        
        $out = '';
        
        if (is_array($listeArray)) {
            foreach ($listeArray as $value) {
                $out .= $prefix.$value.$delimiter;
            }
        }
        
        return $out;
    }

    public function _toArrayKeys($list) {
        
        $out = array();
        $ListeArray = array();
        
        if (!empty($list)) {
            
            $ListeArray = explode(',',$list); 
        }
        foreach ($ListeArray as $key => $value) {
            $value = trim(str_replace('#', '', $value));
            $vKey = strstr($value,'|',true);
            $vValue = str_replace('|','',strstr($value,'|'));
            if (!empty($value)) {
                $out[$vKey] = $vValue;
            }
        }
        
        return $out;
    }

    public function updateNewListToParent($table,$idContent,$idParent,$action =  'add') {

        $isContent = $this->dbQS($idContent,$table);
        if (!empty($isContent)) {
        
            $holdListe  = $isContent['liste_parent'];
            $holdListe  = str_replace('#'.$idParent.',', '', $holdListe);
            
            $newListeParent = $holdListe;
            
            if ($action === 'add') {
                
                $newListeParent   = $holdListe.'#'.$idParent.',';
                
            }
            
            $data['liste_parent'] = $newListeParent;
            
            $this->dbQU($idContent,$data,$table);
        }
    }
    
    public function _genKey($t) {
        
        $kc = md5(KEY_SECRET);  $ct=0;  $v = ""; 
        for ($ctr=0;$ctr<strlen($t);$ctr++) 
        { 
            if ($ct==strlen($kc)) { $ct=0; }
            $v.= substr($t,$ctr,1) ^ substr($kc,$ct,1); $ct++; 
            
        }
        
        return $v;
    }
    
    public function _genHashRandomKey($amount = 18) {
        
        $keyset = "abcdefghijklmABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-{}][;/?<>.,";
        $randkey = "";
        for ($i=0; $i<$amount; $i++)
        $randkey .= substr($keyset, rand(0, strlen($keyset)-1), 1);
        
        return $randkey;
    }

    public function _genRandomKey($amount = 18) {
        
        $keyset = "abcdefghijklmABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randkey = "";
        for ($i=0; $i<$amount; $i++)
        $randkey .= substr($keyset, rand(0, strlen($keyset)-1), 1);
        
        return $randkey;
    }
    
    public function _trackMe($idUser,$idGroup) {
        
        $dataTrack['id_user']       = $idUser;
        $dataTrack['id_groupe']     = $idGroup;
        $dataTrack['id_session']    = session_id();
        $dataTrack['ip_session']    = $_SERVER['REMOTE_ADDR'];
        $dataTrack['url_page']      = $_SERVER['REQUEST_URI'];
        
        if (!array_key_exists('HTTP_REFERER',$_SERVER)) { $_SERVER['HTTP_REFERER'] = ''; }
        
        $dataTrack['url_referer']   = $_SERVER['HTTP_REFERER'];
        $dataTrack['date']          = time();
        
        $this->dbQI($dataTrack,'_users_notification');
    }
    
    public function _crypt($t) {
        
        srand((double)microtime()*1000000);  $kc = md5(rand(0,32000) );  $ct=0;  $v = ""; 
        for ($ctr=0;$ctr<strlen($t);$ctr++) 
        { 
            if ($ct==strlen($kc))  { $ct=0; } 
            $v.= substr($kc,$ct,1).(substr($t,$ctr,1) ^ substr($kc,$ct,1) ); $ct++;
        }
        
        return base64_encode($this->_genKey($v) );
    }

    public function _decrypt($t) { 
        
        $t = $this->_genKey(base64_decode($t)); $v = ""; 
        for ($ctr=0;$ctr<strlen($t);$ctr++) 
        { 
            $md5 = substr($t,$ctr,1);  $ctr++; 
            $v.= (substr($t,$ctr,1) ^ $md5); 
        }
        
        return $v;
    }

    public function _cryptMe($password) { 

        $saltLength = mt_rand(32,63);
        $salt = $this->_genHashRandomKey($saltLength);
        
        $out = array(
            'salt' => $salt,
            'password' => base64_encode(hash('sha256',$password.$salt))
        );
        
        return $out;
    } 

    public function _decryptMe($password,$salt,$hashSaved) { 

        $hash = hash('sha256',$password.$salt);
        $hashSaved = base64_decode($hashSaved);
        
        $out = false;

        if ($hash === $hashSaved) {
            $out = true;
        }

        return $out;
    } 

    public function _decryptV1($t) { 
        
        $t = $this->_genKey(base64_decode($t)); $v = ""; 
        for ($ctr=0;$ctr<strlen($t);$ctr++) 
        { 
            $md5 = substr($t,$ctr,1);  $ctr++; 
            $v.= (substr($t,$ctr,1) ^ $md5); 
        }
        
        $myPassword = hash('sha256',$password);
        $cryptPassword = $this->_decryptV1($v);

        return ($cryptPassword === $myPassword) ? true : false ;
    
        return $v;
    }

    public function _checkDecryptV1($password) {

        
    }

    public function _truncate($string,$lenMax = 100) {
        $len = strlen($string);
        if ($len > $lenMax - 1) {
            $string = substr(strip_tags($string),0,$lenMax);
            $string = substr($string,0,strrpos($string," ")).'...';
        }

        return $string;
    }
    
    public function _formToHtml($data,$form) {
        
        
        $out = '';
        if (empty($data)) { return $out; }
        $iData = count($data);
        
        for($i=1;$i<$iData+1;$i++) {
            
            $valObli = '';
            if ($data[$i]['obligatoire'] === 'yes') {$valObli = ' <span class="color-red">*</span>';}
            switch ($data[$i]['type']) {
                
                case 'tag-title':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12">';
                        $out .= '<'.$data[$i]['filtre'].' class="'.$data[$i]['css'].'">'.$data[$i]['label'].'</'.$data[$i]['filtre'].'>';
                        $out .= '</div>';                        
                    }

                    break;
                
                case 'tag-quotte':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12">';
                        $out .= '<blockquote class="'.$data[$i]['css'].'">'.$data[$i]['label'].'</blockquote>';
                        $out .= '</div>';                        
                    }

                    break;
                
                case 'tag-separateur':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12">';
                        $out .= '<hr class="'.$data[$i]['css'].'" />';
                        $out .= '</div>';                        
                    }

                    break;
                
                case 'text':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12">';
                        $out .= '<div class="input-group '.$data[$i]['css'].'">';
                        $out .= $form->input($data[$i]['label'].$valObli.' <div class="in-label"></div> ',$data[$i]['value'],'text','','form-control '.$data[$i]['css']);
                        $out .= '<small>'.$data[$i]['info'].'</small></div></div>';                        
                    }

                    break;
                
                case 'textarea':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12">';
                        $out .= '<div class="input-group '.$data[$i]['css'].'">';
                        $out .= $form->textarea($data[$i]['label'].$valObli.' <div class="in-label"></div> ',$data[$i]['value'],'','form-control '.$data[$i]['css']);
                        $out .= '<small>'.$data[$i]['info'].'</small></div></div>';
                    }
                    break;
                
                case 'select':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $r = array();
                        $e = explode(',',$data[$i]['liste']);
                        foreach($e as $v) {
                            if (!empty($v)) {
                                $r[$v] = trim($v);
                            }
                        }
                        $out .= '<div class="col-xs-12"><div class="input-group '.$data[$i]['css'].'">';
                        $out .= '';
                        $out .= $form->select($data[$i]['label'].$valObli.'<div class="in-label"></div> ',$data[$i]['value'],$r,'form-control '.$data[$i]['css']);
                        $out .= '<small>'.$data[$i]['info'].'</small></div></div>';
                    }
                    break;
                
                case 'checkbox':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $e = explode(',',$data[$i]['liste']);
                        $out .= '<div class="col-xs-12"><div class="input-group '.$data[$i]['css'].'">';
                        $out .= $form->checkbox($data[$i]['label'].$valObli,$data[$i]['value'],1,'','checkbox-inline');
                        $out .= '<small>'.$data[$i]['info'].'</small></div></div>';
                    }
                    break;
                
                case 'radio':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12"><div class="input-group '.$data[$i]['css'].'">';
                        $e = explode(',',$data[$i]['liste']);
                        $out .= '<label>'.$data[$i]['label'].$valObli.'</label>';
                        foreach($e as $v) {
                            $v = trim($v);
                            if (!empty($v)) {
                                $out .= $form->radio($v,$data[$i]['value'],$v,'','radio-inline');
                            }
                        }
                        $out .= '<small>'.$data[$i]['info'].'</small></div></div>';
                    }
                    break;
                
                case 'file':
                    
                    if ($data[$i]['active'] === 'yes') {
                        $out .= '<div class="col-xs-12"><div class="input-group '.$data[$i]['css'].'">';
                        $out .= $form->file($data[$i]['label'].$valObli,$data[$i]['value']);
                        $out .= '<small>'.$data[$i]['info'].'</small></div></div>';
                    }
                    break;
            }
        }
        
        return $out;
    }
    
    public function _getGenFormFields($data) {
        
        $out = array();
        if (empty($data)) { return $out; }
        $iData = count($data);
        
        $aFields = array("text","textarea","select","checkbox","radio","file");
        for($i=1;$i<$iData+1;$i++) {
            
            if (in_array($data[$i]['type'],$aFields) && $data[$i]['active'] === 'yes') {
                
                $out[$data[$i]['value']] = $data[$i];
                
            }
        }
        return $out;
    }
    
    public function isIpUserStatut() {
        
        $listeIP = $this->_toArray($this->configWeb['statut_ip']);
        
        if (!empty($listeIP) && in_array($_SERVER['REMOTE_ADDR'],$listeIP) )
        {
            return true;
        }
        return false;
    }
    
    public function getAllThemesName() {
        
        $dir = BASE.'themes/';
        $f = array();
        foreach (scandir($dir) as $file) { 
            
            if ($file == '.' || $file == '..' || $file == 'index.php') continue;
            if (is_dir($dir.$file)) { $f[] = $file; }
            
        }
        
        return $f;  
    }
    
    public function duplicateTheme($dirFrom,$dirTo) {
        
        $dir = BASE.'themes/';
         @mkdir($dir.$dirTo, 0777, true);
        if ($this->rcopy($dir.$dirFrom, $dir.$dirTo)) {
            return true;
        }
        return false;
    }
    
    public function deleteTheme($dirName) {
        
        $dir = BASE.'themes/';
        $this->rrmdir($dir.$dirName);
    }
    
    private function rrmdir($dir) {
        
        if (is_dir($dir)) {
            
            $files = scandir($dir);
            foreach ($files as $file) {
                
                if ($file != "." && $file != "..") {
                    
                    $this->rrmdir("$dir/$file");
                }

                 @rmdir($dir);
            }

        } elseif (file_exists($dir)) {
            
            unlink($dir);
        }
    }
    
    public function listThemeFiles($dirName) {
        
        
        $dir = BASE.'themes/'.$dirName;

        if (is_dir($dir)) {
            
            $files = scandir($dir);

            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                      
                    $dirFile = str_replace(BASE.'themes/','',"$dir/$file");

                    if (substr($file, -3) === '.js') {
                        $this->_tempdata['js']["$dirFile"] = $file;   
                    }
                    if (substr($file, -4) === '.css') {
                        $this->_tempdata['css']["$dirFile"] = $file;   
                    }
                    if (substr($file, -8) === '.tpl.php') {
                        $this->_tempdata['tpl']["$dirFile"] = $file;   
                    }
                    
                    $this->listThemeFiles("$dirFile");
                }
            }
            
        
        }
        return $this->_tempdata;
    }
    
    public function rcopy($src, $dst) {
      if (file_exists($dst)) $this->rrmdir($dst);
      if (is_dir($src)) {
        @mkdir($dst, 0777, true);
        $files = scandir($src);
        foreach ($files as $file)
        if ($file != "." && $file != "..") $this->rcopy("$src/$file", "$dst/$file"); 
      }
      else if (file_exists($src)) copy($src, $dst);
    }
    
    public function files($dir = '',$type = '') {
        
        if (!is_dir($dir)) return array();
        $f = array();
        foreach (scandir($dir) as $file) { 

            if ($file == '.' || $file == '..' || $file == 'index.php' || $file == '.htaccess' ) continue;
            if (is_file($dir.$file)) { 

                $ext = $this->getFileExtension($file);
                if(empty($type) ) {

                    $f[] = $file; 
                } elseif (is_string($type) && $type === $ext) {

                    $f[] = $file; 

                } elseif (is_array($type) && in_array($ext,$type)) {

                    $f[] = $file; 
                }
            }
        }
        
        return $f;
    }

    public function getFileExtension($file_name) {
        return substr(strrchr($file_name,'.'),1);
    }
    
    public function getIdContentPosition($id,$pos = 'next') {
        
        $User           = $this->user;
        $lgActuel       = $this->getLangueTradution();
        $moduleInfos    = $this->moduleInfos($this->Uri,$lgActuel);
        
        $is_modo = (in_array($moduleInfos['id'], $User['liste_module_modo']))?true:false;
        
        $sqlUserOther       = '';
        if ($is_modo) {
            if (!empty($User['liste_enfant'])) {
                
                $sqlUserOther .= " AND ( ( ".$this->Table.".id_user = '".$User['id']."' AND ".$this->Table.".id_groupe = '".$User['groupe']."' ) ";
                
                foreach($User['liste_enfant'] as $id_groupe) {
                    
                    $sqlUserOther .= " OR ".$this->Table.".id_groupe = '".$id_groupe."' ";
                    
                }
                
                $sqlUserOther .= ')';
            }
        }else{
            
            $sqlUserOther = " AND ".$this->Table.".id_user = '".$User['id']."' AND ".$this->Table.".id_groupe = '".$User['groupe']."' ";
            
        }

        $isContent = $this->dbQS($id,$this->Table);
        if (!empty($isContent)) {
            
            $position = (int)$isContent['ordre'] ;

            if ($pos==='next') {
                $isPosContent = $this->dbQA($this->Table," WHERE ordre > ".$position." $sqlUserOther ORDER BY ordre  LIMIT 1"); 
            }else{
                $isPosContent = $this->dbQA($this->Table," WHERE ordre < ".$position." $sqlUserOther ORDER BY ordre DESC LIMIT 1"); 
            }
            
            if (!empty($isPosContent)) {
                return (int)$isPosContent[0]['id'];
            }
            
        }
        
        return 0;
    }
    
    
    public function getIdContentPositionDate($id,$pos = 'next') {
        
        $isContent = $this->dbQS($id,$this->Table);
        if (!empty($isContent)) {
            
            if ($pos==='next') {
                $isPosContent = $this->dbQA($this->Table," WHERE id > ".$id." LIMIT 1"); 
            }else{
                $isPosContent = $this->dbQA($this->Table," WHERE id < ".$id." ORDER BY id DESC LIMIT 1"); 
            }
            if (!empty($isPosContent)) {
                return (int)$isPosContent[0]['id'];
            }
            
        }
        
        return 0;
    }
    
    public function getMyInboxContentPositionDate($id,$idUser,$hasSender=false,$pos = 'next') {
        
        $table = '_users_inbox';
        $sqlSender = ($hasSender) ? 'id_user_sent' : 'id_user';
        $sqlSenderDelete = ($hasSender) ? 'user_sent_delete' : 'user_delete';
        $isContent = $this->dbQS($id,$table);
        if (!empty($isContent)) {
            
            $sqlUser = " $table.$sqlSender = $idUser AND $table.$sqlSenderDelete = 0 AND ";
            
            if ($pos==='next') {
                $isPosContent = $this->dbQA($table," WHERE $sqlUser id > ".$id." LIMIT 1"); 
            }else{
                $isPosContent = $this->dbQA($table," WHERE $sqlUser id < ".$id." ORDER BY id DESC LIMIT 1"); 
            }
            if (!empty($isPosContent)) {
                return (int)$isPosContent[0]['id'];
            }
            
        }
        
        return 0;
    }



    public function getContentPaginatePosition($field,$value,$pos = 'next') {
        
        $isContent = $this->dbQS($value,$this->Table,$field);
        if (!empty($isContent)) {
            
            if ($pos==='next') {
                $isPosContent = $this->dbQA($this->Table," WHERE $field > '".$value."' ORDER BY $field ASC LIMIT 1"); 
            }else{
                $isPosContent = $this->dbQA($this->Table," WHERE $field < '".$value."' ORDER BY $field DESC LIMIT 1");
            }
            if (!empty($isPosContent)) {
                return (int)$isPosContent[0]['id'];
            }
            
        }
        
        return 0;
    }

    public function getContentPosition($field,$value) {
        
        $table = $this->Table;

        $query = "      
            SELECT $field, (SELECT COUNT(*) FROM $table WHERE $field <= '$value' ORDER BY $field ASC) AS position
            FROM $table
            WHERE $field = '$value' 
            ORDER BY $field ASC 
            LIMIT 1
        ";

        $isContent = $this->dbQ($query);

        return (int) $isContent[0]['position'];
    }
    
    public function validateDate($date, $format = 'd-m-Y') {
        
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function time() {
        
        $date = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
        
        return $date->getTimestamp() + $date->getOffset();  
    }

    public function copyGravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        
        $hash = md5( strtolower( trim( $email ) ) );
        
        $noImageFile = 'no-image.jpeg';

        $url = 'http://www.gravatar.com/avatar/';
        $url .= $hash;
        $url .= "?s=$s&d=$d&r=$r";
        
        $dir = BASE_DATA.'users/';
        if (!is_dir($dir)) { @mkdir($dir, 0777, true);}
        @copy(BASE_DATA.'index.php',$dir.'index.php');
        
        $img = $dir.$hash.'.jpeg';
        if (@file_get_contents($url)) {
            if (file_put_contents($img, file_get_contents($url))) {
                return $hash.'.jpeg';
            }            
        }

        return  $noImageFile;
    }
    
    public function msort($array, $key, $sort_flags = SORT_REGULAR) {
        if (is_array($array) && count($array) > 0) {
            if (!empty($key)) {
                $mapping = array();
                foreach ($array as $k => $v) {
                    $sort_key = '';
                    if (!is_array($key)) {
                        $sort_key = $v[$key];
                    } else {
                        foreach ($key as $key_key) {
                            $sort_key .= $v[$key_key];
                        }
                        $sort_flags = SORT_STRING;
                    }
                    $mapping[$k] = $sort_key;
                }
                asort($mapping, $sort_flags);
                $sorted = array();
                foreach ($mapping as $k => $v) {
                    $sorted[] = $array[$k];
                }
                return $sorted;
            }
        }
        return $array;
    }

    public function fireWallIp($increment = true,$timer = 1800) {

        $adresseIP  = $_SERVER['REMOTE_ADDR'];
        $isIp       = $this->dbQS($adresseIP,'_dg_firewall','adresse_ip');

        $dataIp['adresse_ip'] = $adresseIP;
        $dataIp['level'] = 1;
        
        if (empty($isIp)) {

            $dataIp['date_creation'] = time();
            $this->dbQI($dataIp,'_dg_firewall');

        }else{

            $level = (int) $isIp['level']; 

            if ($increment) {

                $level++;
                $this->dbQU($adresseIP,array('level'=>$level),'_dg_firewall','adresse_ip');    

            }

            $dataIp['level']         = $level;
            $dataIp['date_creation'] = $isIp['date_creation'];
            
        }
        
        $time_left = time() - $dataIp['date_creation'];
        $dataIp['time_left'] = $time_left;
        $dataIp['time_stop'] = (int) ceil(($timer - $time_left) / 60);

        if ($time_left > $timer) {
            $this->clearFireWallIp();
        }

        return $dataIp;
    }

    public function clearFireWallIp() {

        $adresseIP  = $_SERVER['REMOTE_ADDR'];
        $isIp       = $this->dbQD($adresseIP,'_dg_firewall','adresse_ip','=','');
        
    }

    public function _errorJson($errorResponse, $errors = array()) {

        header("Content-type: application/json; charset=utf-8");
        
        $return = json_encode(
            array(
                'success'   =>  false,
                'response'  =>  $errorResponse,
                'errors'    => $errors
            )
            , JSON_PRETTY_PRINT
        );

        echo $return; exit();
    }

    public function _successJson($successResponse) {

        header("Content-type: application/json; charset=utf-8");
        
        $return = json_encode(
            array(
                'success'   =>  true,
                'response'  =>  $successResponse
            )
            , JSON_PRETTY_PRINT
        );

        echo $return; exit();
    }

    public function successHeaderResponse($message = '', $url = '') {

        $ajax = false;

        if ($ajax) {
            
            $this->_successJson($message);
        
        } else {

            FlashInfo::set($message);
            $this->_redirect($url);
        }
    }

    public function errorHeaderResponse($message = '', $errors = array()) {

        $ajax = false;

        if ($ajax) {
            
            $this->_errorJson($message,$errors);
        
        } else {

            FlashInfo::set($message,"error");
        }
    }

    public function redirectToErrorHeader() {

        header('Status : 404 Not Found');
        header('HTTP/1.0 404 Not Found');
        include BASE.'404.php';
        exit();

    }
    
    public function isValidUri($uri,$table = null,$content = array()) {

        $return         = false;
        $isMyContent    = false;
        $_uri           = $uri;

        $lenUri         = strlen($uri);

        $uri = str_replace('-', '', $uri);

        $isUriValid = ctype_alnum($uri);

        if ( $isUriValid || $lenUri > 250 ) {

            if (is_null($table)) {

               $return = true; 

            }else{
                
                $isUriExist = $this->dbQS($_uri,$table,'uri');

                if (is_array($content) && array_key_exists('uri', $content) && $content['uri'] === $_uri) {
                    $isMyContent = true;
                } 
                if ( !empty($isUriExist) && $isMyContent) {
                    $return = true; 
                }
                if ( empty($isUriExist)) {
                    $return = true;
                } 
            }
            
            
            
        }

        return $return;
    }

    public function checkIfUriExist($uri,$table = null,$lgActuel = '') {

        $return = false;
        $_uri           = $uri;

        $lenUri         = strlen($uri);

        $uri = str_replace('-', '', $uri);

        $isUriValid = ctype_alnum($uri);

        if ( $isUriValid || $lenUri > 250 ) {
            if (is_null($table)) {

               $return = true; 

            }else{
                
                $isUriExist = $this->dbQS($uri,$table,'uri');
                if (empty($isUriExist)) {

                    $isUriExist = $this->dbQS($uri.'-'.$lgActuel,$table,'uri');
                }

                if (!empty($isUriExist)) {
                    $return = true;
                } 
            }
        } else {
            $return = true;
        }

        return $return;
    }
    
    public function getRealUri($uri) {
        
        return trim(str_replace('-','_',$uri)); 
    }

    public function generateUri ($string) {
        
        $from = explode (',', "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,(,),[,],'");
        $to = explode (',', 'c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,,,,,,');
        $string = preg_replace ('~[^wd]+~', '-', str_replace ($from, $to, trim ($string)));
        
        return strtolower (preg_replace ('/^-/', '', preg_replace ('/-$/', '', $string)));
    }

    public function _redirect($url = '') {

        if (empty($url) && !isset($_GET['back'])) { 
            $url = $_SERVER['REQUEST_URI']; 
            header('Location:'.$url); exit();
        }
        
        if (isset($_GET['back'])) {
            $url = $this->filterUrl($_GET['back']);
            header('Location:'.$url); exit();
        }

        header('Location:'.$url); exit();
    }

    public function filterUrl($url) {

        return urldecode($url);
    }

    public function goBackUrl() {
        
        $Params = $this->Params();
        if (array_key_exists('back', $Params['GET'])) {
            return $this->filterUrl($Params['GET']['back']);
        }

        $lgActuel = $this->getLangueTradution();
        
        if (!array_key_exists('HTTP_REFERER',$_SERVER)) { return './'; }
        $url_now = PROTOCOL.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
        $urlReferer = $_SERVER['HTTP_REFERER'];
        
        $action = $this->Action();

        (empty($this->Uri)) ? $uri = '' : $uri = '&uri='.$this->Uri;
        
        if ($action === 'edit') {
            return './?controller='.$this->controllerNameNow().$uri.'&lg='.$lgActuel;
        }
        
        $hostRefererArray = parse_url($urlReferer);

        if (is_array($hostRefererArray) && array_key_exists('host', $hostRefererArray)) {
            $hostReferer = $hostRefererArray['host'];
            $host = $_SERVER['HTTP_HOST'];
        }

        return $urlReferer;
    }  

    public function _moveUploadImage($files,$fileName,$uri) {

        $extension = '.png';
        $success = '';

        if ( isset($_FILES[$fileName]) && $_FILES[$fileName]["error"] === 0 ) {

            if ($_FILES[$fileName]["type"] == "image/jpeg") {
                $extension = '.jpg';
            }
        }else{
            $success = false;
        }

        if ($success !== false) {

            $nameFileImage = time().'-'.uniqid('doorgets').$extension;

            if (!is_dir(BASE_DATA.$uri)) { 
                @mkdir(BASE_DATA.$uri, 0777, true);
                copy(BASE_DATA.'index.php',BASE_DATA.$uri.'/index.php');
            }
            
            if (move_uploaded_file($files['image']['tmp_name'], BASE_DATA.$uri.'/'.$nameFileImage)) {

                $success = $nameFileImage;

            } else {
                
                $success = false;
            }
            
        }else {

            $success = false;
        
        }  

        return $success; 
    }
    

    // Generate dynamic field for user attribute
    public function createFieldFromField($attribute,&$form)
    {
        $out = '';
        
        if ($attribute['required'] === '1') {
            $attribute['title'] = $attribute['title'].' <span class="cp-obli">*</span>';
        }

        $fileType = '';
        
        switch ($attribute['type']) {
            
            case 'text':
                
                $out .= $form->input($attribute['title'],'attribute_'.$attribute['id_attribute'],'text',$attribute['value']);
                break;
            
            case 'textarea':
                
                $out .= $form->textarea($attribute['title'],'attribute_'.$attribute['id_attribute'],$attribute['value']);
                break;
            
            case 'select':
                
                $out .= $form->select($attribute['title'],'attribute_'.$attribute['id_attribute'],$attribute['params']['filter_select'],$attribute['value']);
                break;
         
            case 'checkbox':
                
                $out .= '<label>'.$attribute['title'].'</label> ';
                $attribute['value'] = $this->_toArray($attribute['value']);

                foreach ($attribute['params']['filter_select'] as $key => $value) {
                    
                    $checked = ''; 

                    if ( in_array($key, $attribute['value']) ) { 
                        $checked = 'checked'; 
                    }

                    $out .= $form->checkbox($value,'attribute_'.$attribute['id_attribute'].'_'.$key,'1',$checked);
                }
                
                break;
            
            case 'radio':

                $out .= '<label>'.$attribute['title'].'</label><br />';
                foreach ($attribute['params']['filter_select'] as $key => $value) {
                    
                    $checked = '';  
                    if ( $attribute['value'] !== '' && (int) $key === (int) $attribute['value']) { 
                        $checked = 'checked'; 
                    }

                    $out .= $form->radio($value,'attribute_'.$attribute['id_attribute'],$key,$checked);
                }

                break;

            case 'file':

                if ($attribute['params']['filter_file_zip']) {  $fileType .= 'zip,'; }
                if ($attribute['params']['filter_file_png']) {  $fileType .= 'png,'; }
                if ($attribute['params']['filter_file_jpg']) {  $fileType .= 'jpg,'; }
                if ($attribute['params']['filter_file_gif']) {  $fileType .= 'gif,'; }
                if ($attribute['params']['filter_file_swf']) {  $fileType .= 'swf,'; }
                if ($attribute['params']['filter_file_pdf']) {  $fileType .= 'pdf,'; }
                if ($attribute['params']['filter_file_doc']) {  $fileType .= 'doc,'; }

                $fileType = substr($fileType, 0, -1);
                $attribute['title'] = $attribute['title'].' <span class="cp-obli">*</span> <small>('.($fileType).')</small>';
                
                $out .= $form->file($attribute['title'],'attribute_'.$attribute['id_attribute']);
                if (!empty($attribute['value'])) {
                    
                    $pathFile = URL.'data/users/'.$attribute['value'];
                    $linkPathFile = '<a href="'.$pathFile.'" title="'.$pathFile.'" target="blank">'.$pathFile.'</a>';

                    $out .= $linkPathFile;
                }
                
                break;
            
        }

        if (!empty($attribute['description'])) {
            $out .= '<div ><small>'.$attribute['description'].'</small></div>';
        }

        if (!empty($out)) {
            $out .= '<div class="separateur-tb"></div>';
        }

        return $out; 
    }

    public function createFolderUser($pseudo,$id) {

        $index = "<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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

umask(0022);
session_start();

define('BASE','../../');
define('DOORGETS','http://www.doorgets.com/'); // Ne pas supprimer
require_once BASE.'config/config.php';

define('BASE_URL',URL);
\$userId = $id;  \$langueZone =  '';
require_once ROUTER.'websiteUserRouter.php';".PHP_EOL;

        $langue = "<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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
umask(0022);
session_start();

define('BASE','../../../../');
define('DOORGETS','http://www.doorgets.com/'); // Ne pas supprimer
require_once BASE.'config/config.php';

\$userId = $id;  \$langueZone =  basename(__DIR__);
define('BASE_URL',URL.'t/'.\$langueZone.'/');
require_once ROUTER.'websiteUserRouter.php';".PHP_EOL;

        $empty = '<?php header("Location:../"); exit();'.PHP_EOL;

        $languages = $this->getAllLanguages();
        $folder = BASE.'u/'.$pseudo;
        if ($folder) {

            @mkdir($folder, 0777, true);
            @mkdir($folder.'/t', 0777, true);
            file_put_contents($folder.'/index.php', $index);
            foreach ($languages as $key => $label) {
                file_put_contents($folder.'/t/index.php', $empty);
                @mkdir($folder.'/t/'.$key, 0777, true);
                file_put_contents($folder.'/t/'.$key.'/index.php', $langue);
            }
            
        }

        
    }

    public function getProfileLight($userId) {

        $profile = array();
        $user = null;
        $usersInfoQuery = new UsersInfoQuery($this);
        $userEntity = $usersInfoQuery->filterByIdUser($userId)
            ->find()
            ->_getEntity();

        if ($userEntity) {
            $profile = $userEntity->getData();
        }

        return $profile;
    }

    public function getProfileInfos($userId) {

        $profile = array();
        $user = null;
        $usersInfoQuery = new UsersInfoQuery($this);
        $userEntity = $usersInfoQuery->filterByIdUser($userId)
            ->find()
            ->_getEntity();

        if ($userEntity) {

            $usersGroupesQuery = new UsersGroupesQuery($this);
            $usersGroupesEntity = $usersGroupesQuery->filterById($userEntity->getNetwork())->find()
                ->_getEntity();

            if ($usersGroupesEntity) {

                $userData = $userEntity->getData();
                $userDataGroupe = $usersGroupesEntity->getData();

                // Load all data about user
                $profile['profile_type']                  =  $userData['profile_type'];
                
                $profile['id']                            =  $userData['id_user'];
                $profile['groupe']                        =  $userData['network'];
                $profile['login']                         =  $userData['email'];

                $profile['timezone']                      =  $userData['horaire'];
                
                $profile['pseudo']                        =  ucfirst($userData['pseudo']);
                $profile['langue']                        =  $userData['langue'];
                $profile['last_name']                     =  ucfirst($userData['last_name']);
                $profile['first_name']                    =  ucfirst($userData['first_name']);
                $profile['description']                   =  $userData['description'];
                
                $profile['website']                       =  $userData['website'];
                $profile['id_facebook']                   =  $userData['id_facebook'];
                $profile['id_twitter']                    =  $userData['id_twitter'];
                $profile['id_youtube']                    =  $userData['id_youtube'];
                $profile['id_google']                     =  $userData['id_google'];
                $profile['id_pinterest']                  =  $userData['id_pinterest'];
                $profile['id_linkedin']                   =  $userData['id_linkedin'];
                $profile['id_myspace']                    =  $userData['id_myspace'];
                
                $profile['country']                       =  $userData['country'];
                $profile['city']                          =  $userData['city'];
                $profile['zipcode']                       =  $userData['zipcode'];
                $profile['adresse']                       =  $userData['adresse'];
                $profile['tel_fix']                       =  $userData['tel_fix'];
                $profile['tel_mobil']                     =  $userData['tel_mobil'];
                $profile['tel_fax']                       =  $userData['tel_fax'];
                
                $profile['avatar']                        =  $userData['avatar'];
                
                $profile['gender']                        =  $userData['gender'];
                $profile['birthday']                      =  $userData['birthday'];
                
                $profile['notification_mail']             =  $userData['notification_mail'];
                $profile['notification_newsletter']       =  $userData['notification_newsletter'];
                
                $profile['liste_widget']                  =  $this->_toArray($userDataGroupe['liste_widget']);
                $profile['liste_module']                  =  $this->_toArray($userDataGroupe['liste_module']);
                $profile['liste_module_interne']          =  $this->_toArray($userDataGroupe['liste_module_interne']);
                $profile['liste_enfant']                  =  $this->_toArray($userDataGroupe['liste_enfant']);
                
                $profile['liste_module_limit']            =  $this->_toArrayKeys($userDataGroupe['liste_module_limit']);
                
                $profile['liste_module_edit']             =  $this->_toArray($userDataGroupe['liste_module_edit']);
                $profile['liste_module_delete']           =  $this->_toArray($userDataGroupe['liste_module_delete']);

                $profile['liste_module_modo']             =  $this->_toArray($userDataGroupe['liste_module_modo']);
                $profile['liste_module_interne_modo']     =  $this->_toArray($userDataGroupe['liste_module_interne_modo']);
                $profile['liste_enfant_modo']             =  $this->_toArray($userDataGroupe['liste_enfant_modo']);
                
                $profile['liste_enfant']                  =  $this->_toArray($userDataGroupe['liste_enfant']);
                
                $profile['attributes']                    =  unserialize(base64_decode($userDataGroupe['attributes']));
                
                $profile['editor_group']                  = array('-- '.$this->__('Aucun').' --');
                
                $profile['editor_html']                   = $userData['editor_html'];

                if (!empty($userDataGroupe['editor_ckeditor'])) {

                    $profile['editor_group']['editor_ckeditor']   = 'editor_ckeditor';
                }

                if (!empty($userDataGroupe['editor_tinymce'])) {

                    $profile['editor_group']['editor_tinymce']    = 'editor_tinymce';
                }

                if (empty($userDataGroupe['saas_options'])) {
                    $profile['saas_options'] = array(
                        'saas_add' => false,
                        'saas_delete' => false,
                        'saas_limit' => 0,
                        'saas_date_end' => 0,
                    );
                } else {
                    $profile['saas_options'] = @unserialize($userDataGroupe['saas_options']);
                }
            }
        }
        
        return $profile;
    }

    public function getAllEmailNotifications() {

        $data = array();
        $lgActuel = $this->getLangueTradution();

        $emailnotificationQuery = new DgEmailNotificationQuery($this);
        $emailnotificationQuery->orderByUri();
        $emailnotificationCollection = $emailnotificationQuery->find();

        $emailnotificationEntities = $emailnotificationCollection->_getEntities('array');
        if ($emailnotificationEntities) {

            foreach ($emailnotificationEntities as $emailnotificationEntity) {
                $data[$emailnotificationEntity['uri']]  = $emailnotificationEntity['uri'];
            }
            
        }

        return $data;
    }

    public function getEmailNotificationByUri($uri='',$variables = array()) {

        $data = array();
        $lgActuel = $this->getLangueTradution();

        $emailnotificationQuery = new DgEmailNotificationQuery($this);
        $emailnotificationQuery->filterByUri($uri);
        
        $emailnotificationCollection = $emailnotificationQuery->find();

        $emailnotificationEntity = $emailnotificationCollection->_getEntity();
        if ($emailnotificationEntity) {

            $entityData = $emailnotificationEntity->getData();
            $groupeLangue = unserialize($entityData['groupe_traduction']);
            
            $emailnotificationTraductionQuery = new DgEmailNotificationTraductionQuery($this);
            $emailnotificationTraductionQuery->filterById($groupeLangue[$lgActuel]);

            $emailnotificationTraductionCollection    = $emailnotificationTraductionQuery->find();

            $emailnotificationTraductionEntity        = $emailnotificationTraductionCollection->_getEntity();
            if ($emailnotificationTraductionEntity) {

                $entityTraductionData = $emailnotificationTraductionEntity->getData();

                $data['subject'] = html_entity_decode(($entityTraductionData['subject']));
                $data['message'] = htmlspecialchars_decode(html_entity_decode($entityTraductionData['message_tinymce']));
                    
                $countVariables = count($variables);
                for ($i=0; $i < $countVariables; $i++) { 
                    
                    if (array_key_exists($i,$variables)) {

                        $data['message'] = str_replace('$doorGets'.$i,$variables[$i],$data['message']);
                    }
                }
            }
        }

        return $data;
    }

    public function sendEmailNotificationToGroupe($uri, $moduleId, $variables = array()) {

        $usersGroupesQuery = new UsersGroupesQuery($this);
        $usersGroupesQuery->filterLikeByListeModuleModo('%'.$moduleId.',%');
        $usersGroupesCollection = $usersGroupesQuery->find();
        
        $usersGroupesEntities = $usersGroupesCollection->_getEntities('array');

        if ($usersGroupesEntities) {

            foreach ($usersGroupesEntities as $usersGroupesEntity) {
                
                $usersInfoQuery = new UsersInfoQuery($this);
                $usersInfoQuery->filterByNetwork($usersGroupesEntity['id']);
                $usersInfoCollection = $usersInfoQuery->find();

                $usersInfoEntities = $usersInfoCollection->_getEntities('array');

                if ($usersInfoEntities) {

                    foreach ($usersInfoEntities as $usersInfoEntity) {
                        
                        $this->sendEmailNotificationToUser($uri,$usersInfoEntity,$variables);

                    }
                }
            }
        }

    }

    public function sendEmailNotificationToUser($uri, $user, $variables = array()) {

        if (!is_array($user) && ( is_string($user) || is_numeric($user))) {

            $usersInfoQuery = new UsersInfoQuery($this);
            $usersInfoQuery->filterById($user);
            $usersInfoCollection = $usersInfoQuery->find();

            $usersInfoEntity = $usersInfoCollection->_getEntity();

            if ($usersInfoEntity) {

                $user = $usersInfoEntity->getData();
            
            } else {

                $usersInfoQuery = new UsersInfoQuery($this);
                $usersInfoQuery->filterByPseudo($user);
                $usersInfoCollection = $usersInfoQuery->find();

                $usersInfoEntity = $usersInfoCollection->_getEntity();

                if ($usersInfoEntity) {

                    $user = $usersInfoEntity->getData();
                }

            }

        }

        if (is_array($user) &&  array_key_exists('notification_mail', $user) && $user['notification_mail']) {
            
            new SendMailNotification(
                $uri,
                $user['email'],
                $this,
                $variables
            );            
        }
    }

    public function isMyProfile(&$user = null,&$profile = null){

        if (is_null($user) && is_null($profile)) {
            $user = $this->_User;
            $profile = $this->profile;
        }
        
        $out = false;

        if ( 
            is_array($user) && is_array($profile) 
            && array_key_exists('id',$user) && array_key_exists('id',$profile) 
            && $user['id'] === $profile['id']
        ) {

            $out = true;
        }

        return $out; 

    }

    public function getIdContentTraduction($isContent) {
        $lg = $this->myLanguage;
        if ($traductions = unserialize($isContent['groupe_traduction'])) {
            if (array_key_exists($lg, $traductions)) {
                return $traductions[$lg];
            }
        }
        return null;
    }

    public function getTotalPathSize($path){
        $bytestotal = 0;
        $path = realpath($path);
        if($path!==false){
            foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
                $bytestotal += $object->getSize();
            }
        }
        return ceil($bytestotal/1000000);
    }

    public function copyFileToRealPath($uriModule,$fileName){
        
        if (!is_dir(BASE_DATA.$uriModule)) { 
            @mkdir(BASE_DATA.$uriModule, 0777, true);
            copy(BASE_DATA.'index.php',BASE_DATA.$uriModule.'/index.php');
        }

        $eFiles = explode(';',$fileName);
        
        if (!empty($eFiles)) {
            foreach ($eFiles as $fName) {
                if (is_file(BASE_DATA.'temp/'.$fName)) {
                    copy(BASE_DATA.'temp/'.$fName,BASE_DATA.$uriModule.'/'.$fName);
                }
            } 
        }
    }

    public function setCurrencyIcon($amount,$currency = null) {

        $amount = (float)$amount;
        if (is_null($currency)) {
            $currency = $this->configWeb['currency'];
        }
        $currenyCode = strtolower($currency);
        // vdump($currenyCode);
        switch ($currenyCode) {
            case 'eur':
                $currency = '€';
                $currencyBefore = '';
                $currencyAfter = $currency;
                break;
            case 'usd':
                $currency = '$';
                $currencyBefore = $currency;
                $currencyAfter = '';
                break;
            case 'gbp':
                $currency = '£';
                $currencyBefore = $currency;
                $currencyAfter = '';
                break;
            
            default:
                $currency = '€';
                $currencyBefore = '';
                $currencyAfter = $currency;
                break;
        }
        
        return $currencyBefore.number_format($amount,2,',',' ').$currencyAfter;
    }
}
