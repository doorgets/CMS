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


class GenRss extends Langue{

    protected $Modules = array();
    
    protected $ModulesInfo = array();
    
    private $Get;

    public function __construct($init = 0,$lg="fr") {

        parent::__construct($lg);
        
        $this->loadModuleValid();
        
        if (!empty($_GET) && empty($init)) {
            foreach($_GET as $k=>$v) {
                if (array_key_exists($k,$this->ModulesInfo)) {
                    $this->simpleModuleToRss($k);
                }
            }
        }else{ $this->Get = $this->getAllToRss(); }
        
    }

    public function Modules() {

        return $this->Modules;

    }
    public function Get() {

        return $this->Get;

    }

    public function loadModuleValid() {

        $arListeModule = Constant::$modulesWithGallery;

        $out = array();
        $outInfo = array();
        $sql = " 
            SELECT * 
            FROM _modules, _modules_traduction 
            WHERE 	_modules.active = 1 
            AND _modules_traduction.id_module = _modules.id 
            AND _modules_traduction.langue = '".$this->myLanguage()."' 
        ";
        $isContent = $this->dbQ($sql);
        
        $cContents = count($isContent);

        if ($cContents > 0) {

            for($i=0;$i<$cContents;$i++) {

                $q = $isContent[$i]['type'];

                if (in_array($q,$arListeModule)) {
                    $out[$isContent[$i]['uri']] = $isContent[$i]['titre'];
                    $outInfo[$isContent[$i]['uri']] = $isContent[$i];
                }
            }
        }
        
        $this->Modules = $out;
        $this->ModulesInfo = $outInfo;
    }

    public function simpleModuleToRss($module_uri) {
        
        $out = '<?xml version="1.0" encoding="utf-8"?>
        <rss version="2.0">';
        
        if (array_key_exists($module_uri,$this->Modules)) {  

            // Merci à www.caron.ws
            $tableName = $this->getRealUri($module_uri);
            $table = '_m_'.$tableName;
            $table_trad = $table.'_traduction';

            $sql = "SELECT * 
                FROM $table, $table_trad 
                WHERE 	$table.active = 2 
                AND $table.in_rss = 1 
                AND $table_trad.id_content = $table.id 
                AND $table_trad.langue = '".$this->myLanguage()."' 
                LIMIT 50";
                
            $isContent = $this->dbQ($sql);
            $cContents = count($isContent);
            
            // definition des variables pour le $out
            $urlSite = URL;
            $titre = $this->ModulesInfo[$module_uri]['titre'];
            $description = $this->ModulesInfo[$module_uri]['description'];
            $dateGen = date("D, j M Y H:i:s \G\M\T",time());
            

            $out .= "
                <channel>
                    <title><![CDATA[".$titre."]]></title>
                    <description><![CDATA[".$description."]]></description>
                    <lastBuildDate>".$dateGen."</lastBuildDate>
                    <link>".$urlSite ."</link>
            ";

            for ($i=0; $i < $cContents ; $i++) {
                
                $idCategory = '0';
                $categories = $this->_toArray($isContent[$i]['categorie']);
                if (!empty($categories)) {
                    $idCategory = $categories[0];
                }
                
                // definition des variables pour le $out
                $dateCreation = date("D, j M Y H:i:s \G\M\T",$isContent[$i]['date_creation']);

                $cLanguages = count($this->allLanguagesWebsite);
                $toLg = URL;
                if ($cLanguages > 1) {
                    $toLg = URL.'t/'.$this->myLanguage().'/';
                }
                $url = $toLg.'?'.$module_uri.'='.$isContent[$i]['uri'];
                $titreCategorie = $this->getTitleCategorie($idCategory);
                if (!array_key_exists('description',$isContent[$i])) {
                $isContent[$i]['description'] = '';
                
            }
            
            $out .=" 
            <item>
                <category><![CDATA[".$titreCategorie."]]></category>
                <title><![CDATA[".$isContent[$i]['titre']."]]></title>
                <description><![CDATA[".$isContent[$i]['description']."]]></description>
                <pubDate>".$dateCreation."</pubDate>
                <link>".$url."</link>
            </item>
            ";
            
        }
        $out .= '</channel>
        </rss>';
        echo $out;
        
        }
        
    }
    
    public function ModuleToRss($module_uri) {
            
        $out = '<?xml version="1.0" encoding="utf-8"?>
        <rss version="2.0">';
        
        if (array_key_exists($module_uri,$this->Modules)) {  

            // Merci à www.caron.ws
            $tableName = $this->getRealUri($module_uri);
            $table = '_m_'.$tableName;
            $table_trad = $table.'_traduction';

            $sql = "SELECT * 
                FROM $table, $table_trad 
                WHERE 	$table.active = 1 
                AND $table.in_rss = 1 
                AND $table_trad.id_content = $table.id 
                AND $table_trad.langue = '".$this->myLanguage()."' 
                LIMIT 100";
                
            $isContent = $this->dbQ($sql);

            $cContents = count($isContent);
            
            // definition des variables pour le $out
            $urlSite = URL;
            $titre = $this->ModulesInfo[$module_uri]['titre'];
            $description = $this->ModulesInfo[$module_uri]['description'];
            $dateGen = date("D, j M Y H:i:s \G\M\T",time());
            

            $out .= "
                <channel>
                    <title>".$titre."</title>
                    <description>".$description."</description>
                    <lastBuildDate>".$dateGen."</lastBuildDate>
                    <link>".$urlSite ."</link>
            ";

            for ($i=0; $i < $cContents ; $i++) {
                
                if (!array_key_exists('description',$isContent[$i])) {
                        $isContent[$i]['description'] = $isContent[$i]['titre'];
                }
                // definition des variables pour le $out
                $dateCreation = date("D, j M Y H:i:s \G\M\T",$isContent[$i]['date_creation']);
                $url = URL.'t/'.$this->myLanguage().'/?'.$module_uri.'='.$isContent[$i]['uri'];
                $titreCategorie = $this->getTitleCategorie($isContent[$i]['categorie']);

                $out .=" 
                <item>
                <category>".$titreCategorie."</category>
                <title>".$isContent[$i]['titre']."</title>
                    <description>".$isContent[$i]['description']."</description>
                    <pubDate>".$dateCreation."</pubDate>
                    <link>".$url."</link>
                </item>
                ";
            }
            $out .= '</channel></rss>';
        }
        return $out;


    }
    
    public function getAllToRss() {
        
        $out = '';
        $x = $this->ModulesInfo;
        
        if (!empty($x)) {
            foreach($x as $k => $v) {
                $out .= '<div><a href="./?'.$k.'">'.$v['titre'].'</a></div><br />';
            }
        }
        $out .= '';
        return $out;
    }
    
    public function getAllToRssLink() {
        
        $out = '';
        $x = $this->ModulesInfo;
        
        if (!empty($x)) {
            foreach($x as $k => $v) {
                $out .= '<link rel="alternate" type="application/rss+xml" title="'.$v['titre'].'" href="'.URL.'rss/?'.$k.'" />'."\n\t";
            }
        }
        $out .= '';
        return $out;
    }
    

    private function getTitleCategorie($id_categorie) {

        $out = 'no-title';
        $table = '_categories';
        $table_trad = '_categories_traduction';
        
        $isContent = $this->dbQ(" 
            SELECT * 
            FROM $table, $table_trad 
            WHERE   $table.id = $id_categorie 
                    AND $table_trad.id_cat = $table.id 
                    AND $table_trad.langue = '".$this->myLanguage()."' 
            LIMIT 1
            ");
        
        if (!empty($isContent)) {
            $out = $isContent[0]['nom'];
        }
        return $out;

    }

    
}