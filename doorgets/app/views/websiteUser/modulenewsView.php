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


class moduleNewsView extends doorgetsWebsiteUserView{
    
    public function __construct(&$doorGetsWebsiteUser) {
        
        parent::__construct($doorGetsWebsiteUser);
    }
    
    public function getContent() {
        
        $out = $q = $qN = '';
        $Website = $this->Website;

        $Profile                = $Website->profile;
        $User                   = $Website->_User;
        
        $hasMe                  = $Website->isMyProfile($User,$Profile);

        $Module = $Website->getModule();
        $moduleInfo = $Website->activeModules;
        $templateDefault = 'modules/news/news_listing';
        $templateDefaultContent = 'modules/news/news_content';
        
        if (array_key_exists($Module,$moduleInfo)) {
            if (!empty($moduleInfo[$Module]['all']['template_index'])) {
                $templateDefault = $moduleInfo[$Module]['all']['template_index'];
                $templateDefault = str_replace('.tpl.php','',$templateDefault);
            }
            if (!empty($moduleInfo[$Module]['all']['template_content'])) {
                $templateDefaultContent = $moduleInfo[$Module]['all']['template_content'];
                $templateDefaultContent = str_replace('.tpl.php','',$templateDefaultContent);
            }
        }
        
        $nameTable = '_m_'.$Website->getRealUri($Website->getModule());
        
        $categories = $Website->loadCategories($Website->getModule());
        $categoriesIds = $Website->categoriesIds;
        
        if ($Website->getPosition() === 'root' || $Website->getPosition() === 'category') {
            
            $Params = $Website->getParams();
            $ModuleInfos = $Website->moduleInfos($Website->getModule());
            
            $par = $ModuleInfos['groupe_by'];
            
            if (array_key_exists('q',$Params['GET']) && !empty($Params['GET']['q']) )
            {
                $q = mb_strtolower($Params['GET']['q'],'UTF-8');
            }
            
            if (!empty($q) )
            {
                $qN = '&amp;q='.$q;
            }
            
            $outFilterAND = $sqlGroupe = $getCategory = '';
            $outGroupe = 'all';
            $valFilter = 'date';
            $outFilterORDER = ' '.$nameTable.'.date_creation DESC ';
            
            $outSqlGroupe = " WHERE ".$nameTable.".active = 2 AND ";
            if ($hasMe) {
                //$outSqlGroupe = " WHERE ";
            }
            
            $outSqlGroupe .= $nameTable.".id_user = '".$this->Website->profile['id']."'";
            $outSqlGroupe .= " AND ".$nameTable."_traduction.id_content = ".$nameTable.".id
            AND ".$nameTable."_traduction.langue = '".$Website->myLanguage()."'
            ORDER BY ".$nameTable.".ordre DESC ";
            
            $outRub = $Website->getModule();
            $categoryLabel = '';
            if (array_key_exists('doorgets',$Params['GET'])) {
               
                $getCategory = $Params['GET']['doorgets'];
                $isCategorie = $Website->dbQS($getCategory,'_categories_traduction','uri');
                if (!empty($isCategorie)) {
                    
                    $outGroupe = $getCategory;
                    
                    $outSqlGroupe = " WHERE ".$nameTable.".active = 2 AND ";
                    if ($hasMe) {
                        //$outSqlGroupe = " WHERE ";
                    }

                    $outSqlGroupe .= " ".$nameTable.".id_user = '".$this->Website->profile['id']."'";
                    $outSqlGroupe .= " AND ".$nameTable."_traduction.id_content = ".$nameTable.".id
                    AND ".$nameTable.".categorie LIKE '%".$isCategorie['id_cat'].",%'
                    AND ".$nameTable."_traduction.langue = '".$Website->myLanguage()."'
                    ORDER BY ".$nameTable.".ordre DESC ";
                    
                    $outRub = 'doorgets='.$getCategory;
                    if (array_key_exists($getCategory,$categories)) {
                        $categoryLabel = $categories[$getCategory];
                    }
                    
                    $parentCategories = $Website->getBreadcrumb($Website->getModule(),$isCategorie['id_cat']);
                    sort($parentCategories);
                    
                }
                
            }
            
            if (!empty($q)) {
                
                $outSqlGroupe = " WHERE ".$nameTable.".active = 2 AND ";
                if ($hasMe) {
                    //$outSqlGroupe = " WHERE ";
                }

                $outSqlGroupe .= $nameTable."_traduction.id_content = ".$nameTable.".id
                AND ".$nameTable."_traduction.langue = '".$Website->myLanguage()."'  ";
            }
            
            $champsliste[] = $nameTable.'_traduction.titre';
            $champsliste[] = $nameTable.'_traduction.description';
            $champsliste[] = $nameTable.'_traduction.uri';
            $champsliste[] = $nameTable.'_traduction.article_tinymce';
            $champsliste[] = $nameTable.'_traduction.meta_titre';
            $champsliste[] = $nameTable.'_traduction.meta_description';
            $champsliste[] = $nameTable.'_traduction.meta_keys';
            
            if (!empty($q) && !empty($champsliste)) {
                $sqlGroupe .= " AND (";
                foreach($champsliste as $v) {
                    $sqlGroupe .= " ".$v." LIKE '%".$q."%' OR";
                }
                $sqlGroupe = substr($sqlGroupe,0,-2);
                $sqlGroupe .= ") ";
            }
            
            $outSqlGroupe = $outSqlGroupe.$sqlGroupe;
            
            $isContents = $Website->dbQ('SELECT COUNT(*) as counter FROM '.$nameTable.', '.$nameTable.'_traduction '.$outSqlGroupe);
            $totalContents = (int)$isContents[0]['counter'];
            $urlPage = $Website->getBaseUrl()."?$outRub$qN&amp;p=";
            
            $p = 1;
            $ini = 0;
            $per = $par;
            
            if (
                array_key_exists('p',$Params['GET']) 
                && is_numeric($Params['GET']['p'])
                && $Params['GET']['p'] <= (ceil($totalContents / $per))
           ) {
                $p      = $Params['GET']['p'];
                $ini    = $p * $per - $per;
            }
            
            $sqlLimit = " $outSqlGroupe   LIMIT ".$ini.",".$per;
            
            $getPagination = '';
            if ($totalContents > $per) { $getPagination = Pagination::pagePublic($totalContents,$p,$per,$urlPage); }
            
            $nameTableTrad = $nameTable.'_traduction';
            $all = $Website->dbQ("
                SELECT ".$nameTableTrad.".id as id , ".$nameTable.".id as id_content 
                FROM ".$nameTable.', '.$nameTableTrad.' '.$sqlLimit
            );

            foreach ($all as $k => $content) {
                $isContent = $Website->dbQS($content['id_content'],$nameTable);
                $isContentTrad = $Website->dbQS($content['id'],$nameTableTrad);
                $all[$k] = array_merge($isContent,$isContentTrad);
            }
            $cAll = count($all);
            
            $finalPer = $ini+$per;
            if ($finalPer >  $totalContents) { $finalPer = $totalContents; }
            
            $out = '';
            $contents = array();
            $iMaxDescription = 500;
            
            if (!empty($all)) {
            
                foreach($all as $k=>$data) {

                    $contents[$k]['active'] = $data['active'];
                    $contents[$k]['uri'] = $data['uri'];
                    $contents[$k]['title'] = $data['titre'];
                    $contents[$k]['description'] = $data['description'];
                    $contents[$k]['article'] = html_entity_decode($data['article_tinymce']);
                    $lenArticle = strlen($contents[$k]['article']);
                    
                    if ($lenArticle > $iMaxDescription - 1) {
                        $contents[$k]['article'] = $Website->_truncate($contents[$k]['article'],$iMaxDescription); //$Website->_truncate($contents[$k]['article'],$iMaxDescription);;
                    }
                    
                    $contents[$k]['order'] = $data['ordre'];
                    $contents[$k]['categories'] = $data['categorie'];
                    $contents[$k]['date'] = GetDate::in($data['date_creation'],2,$Website->myLanguage);
                }
            }
            
            $groupeBy = $par;
            if (!empty($contents)) {$ini = $ini+1;}

            $labelModuleGroup  = $Website->activeModules;
            $labelModule       = $labelModuleGroup[$Website->getModule()]['all']['nom'];

            $urlAfterAction    = urlencode($Website->getCurrentUrl());
            $urlAdd            = URL_USER.$Website->_lgUrl.'?controller=modulenews&uri='.$Website->getModule().'&action=add';

            $tplModuleNewsListing = Template::getWebsiteView('modules/news/news_listing',$Website->getTheme());
            ob_start(); if (is_file($tplModuleNewsListing)) { include $tplModuleNewsListing; }  $out .= ob_get_clean();
            
        }else{
            
            $linksToCategories = '';
            
            $isContent = $Website->dbQS($Website->getUri(),$nameTable.'_traduction','uri');

            if (!empty($isContent)) {
                
                $isContentActive = $Website->dbQS($isContent['id_content'],$nameTable,'id'," AND active = 2 LIMIT 1");
                $isContentActiveVersion    = $Website->dbQS($isContent['id_content'],$nameTable.'_version','id_content'," AND active = 2 AND langue = '".$Website->myLanguage."' LIMIT 1");
                
                if (!empty($isContentActive)) {

                    $isContent['article'] = html_entity_decode($isContent['article_tinymce']);
                    $isContent['article'] = $Website->_convertMethod($isContent['article']);
                    $isContent['title'] = $isContent['titre'];
                    
                    unset($isContent['titre']);
                    unset($isContent['article_tinymce']);
                    unset($isContent['id']);
                    unset($isContent['meta_titre']);
                    unset($isContent['meta_description']);
                    unset($isContent['meta_keys']);
                    unset($isContent['langue']);

                    $isContent['stars']         = 0;
                    $isContent['stars'] = 0; $isContent['stars_count']   = $isContentActive['stars_count'];
                    if (!empty($isContentActive['stars_count'])) {
                        $isContent['stars']         = number_format(($isContentActive['stars'] / $isContentActive['stars_count']),'1' );
                    }

                    $isContent['active']        = $isContentActive['active'];
                    $isContent['author_badge']  = $isContentActive['author_badge'];
                    $isContent['id_user']       = $isContentActive['id_user'];
                    $isContent['id_groupe']     = $isContentActive['id_groupe'];                   
                    $isContent['comments']      = $isContentActive['comments'];
                    $isContent['sharethis']     = $isContentActive['partage'];
                    $isContent['facebook']      = $isContentActive['facebook'];
                    $isContent['disqus']        = $isContentActive['disqus'];
                    
                    $isContent['image_gallery'] = $Website->_toArray($isContent['image_gallery'],';');
                    
                    $isContent['date_creation'] = GetDate::in($isContentActive['date_creation'],2,$Website->myLanguage);
                    $isContent['date_modification'] = GetDate::in($isContent['date_modification'],2,$Website->myLanguage);
                        
                    $aCategories = $Website->_toArray($isContentActive['categorie']);
                    if (!empty($aCategories)) {
                        foreach($aCategories as $id_category) {
                            if (array_key_exists($id_category,$categoriesIds)) {
                                $linksToCategories .= '<a href="'.BASE_URL.'?doorgets='.$categoriesIds[$id_category].'">'.$Website->categorieSimple[$id_category].'</a>';
                            }
                            
                        }
                    }

                } elseif (empty($isContentActive) && !empty($isContentActiveVersion)) {

                    $isContentActive = $Website->dbQS($isContent['id_content'],$nameTable);

                    if (!empty($isContentActive)) {

                        $isContent['article'] = html_entity_decode($isContentActiveVersion['article_tinymce']);
                        $isContent['article'] = $Website->_convertMethod($isContent['article']);
                        $isContent['title'] = $isContentActiveVersion['titre'];
                        
                        unset($isContent['titre']);
                        unset($isContent['article_tinymce']);
                        unset($isContent['id']);
                        unset($isContent['meta_titre']);
                        unset($isContent['meta_description']);
                        unset($isContent['meta_keys']);
                        unset($isContent['langue']);
                        
                        $isContent['stars']         = 0;
                        $isContent['stars'] = 0; $isContent['stars_count']   = $isContentActive['stars_count'];
                        if (!empty($isContentActive['stars_count'])) {
                            $isContent['stars']         = number_format(($isContentActive['stars'] / $isContentActive['stars_count']),'1' );
                        }

                        $isContent['active']        = $isContentActive['active'];
                        $isContent['author_badge']  = $isContentActive['author_badge'];
                        $isContent['id_user']       = $isContentActive['id_user'];
                        $isContent['id_groupe']     = $isContentActive['id_groupe'];                   
                        $isContent['comments']      = $isContentActive['comments'];
                        $isContent['sharethis']     = $isContentActive['partage'];
                        $isContent['facebook']      = $isContentActive['facebook'];
                        $isContent['disqus']        = $isContentActive['disqus'];
                        
                        $isContent['image_gallery'] = $Website->_toArray($isContent['image_gallery'],';');
                        
                        $isContent['date_creation'] = GetDate::in($isContentActive['date_creation'],2,$Website->myLanguage);
                        $isContent['date_modification'] = GetDate::in($isContent['date_modification'],2,$Website->myLanguage);
                        
                        $aCategories = $Website->_toArray($isContentActive['categorie']);
                        if (!empty($aCategories)) {
                            foreach($aCategories as $id_category) {
                                if (array_key_exists($id_category,$categoriesIds)) {
                                    $linksToCategories .= '<a href="'.BASE_URL.'?doorgets='.$categoriesIds[$id_category].'">'.$Website->categorieSimple[$id_category].'</a>';
                                }
                                
                            }
                        }
                    }
                }
                
                
            }
            
            $nexContent         = $Website->getUrlNextContent();
            $prevContent        = $Website->getUrlPreviousContent();
            $cComment           = $Website->getCountComment($Website->getModule(),$isContent['uri']);
            
            $urlAfterAction     = $Website->getBaseUrl().'?'.$Website->getModule().'='.urlencode($isContent['uri']);
            $urlGoToComments    = $urlAfterAction.'#comments';

            $urlEdition         = URL_USER.$Website->_lgUrl.'?controller=modulenews&uri='.$Website->getModule().'&action=edit&id='.$isContent['id_content'].'&lg='.$Website->getLangueTradution().'&back='.$urlAfterAction;
            $urlDelete          = URL_USER.$Website->_lgUrl.'?controller=modulenews&uri='.$Website->getModule().'&action=delete&id='.$isContent['id_content'].'&lg='.$Website->getLangueTradution();
            $urlAdd             = URL_USER.$Website->_lgUrl.'?controller=modulenews&uri='.$Website->getModule().'&action=add';
            
            $labelModuleGroup = $Website->activeModules;
            $labelModule = $labelModuleGroup[$Website->getModule()]['all']['nom'];
            
            $this->userPrivilege['modo']  =  ( $Website->isUser && 
                (
                    in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                    && in_array($isContent['id_groupe'],$Website->_User['liste_enfant']) 
                    && in_array($isContent['id_groupe'],$Website->_User['liste_enfant_modo']) 
                ) 
            ) ? true : false ;

            $this->userPrivilege['edit']  =  ( $Website->isUser && 
                ( 
                    (   
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && $isContent['id_user'] === $Website->_User['id'] && $this->userPrivilege['edit']
                    ) || (
                        $this->userPrivilege['modo']
                    ) 
                ) 
            ) ? true : false ;

            $this->userPrivilege['delete']  =  ( $Website->isUser && 
                ( 
                    (   
                        in_array($labelModuleGroup[$Website->getModule()]['all']['id'],$Website->_User['liste_module'])  
                        && $isContent['id_user'] === $Website->_User['id'] && $this->userPrivilege['delete']
                    ) || (
                        $this->userPrivilege['modo']
                    ) 
                ) 
            ) ? true : false ;

            extract($isContent);
            
            $tplModuleNewsContent = Template::getWebsiteView('modules/news/news_content',$Website->getTheme());
            ob_start(); if (is_file($tplModuleNewsContent)) { include $tplModuleNewsContent; }  $out .= ob_get_clean();
            
        }
        
        return $out;
        
    }
    
}
