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


class GenSitemapXml extends Langue{
    
    private $xmlOut;
    private $lg;
    public function __construct($lg= 'fr') {
        
        parent::__construct($lg);

        // Merci à www.caron.ws
        $this->lg = URL;
        $cLanguages = count($this->allLanguagesWebsite);
        if ($cLanguages > 1) {
            $this->lg = URL.'t/'.$lg.'/';
        }
        $base = $this->lg;
        
        $this->xmlOut = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $this->xmlOut .= "<url><loc>$base</loc><priority>1.00</priority><changefreq>daily</changefreq></url>";
        
        $this->Gen();
        
        $this->xmlOut .= '</urlset>';
        
        $fileSitemap = BASE.'sitemap.xml';
        $newXml = new SimpleXMLElement($this->xmlOut);
        $newXml->asXML($fileSitemap);
        
        $aL = $this->allLanguages;
        
        foreach($aL as $k=>$v) {
            
            parent::__construct($k);
            $this->lg = URL.'t/'.$k.'/';
            $base = $this->lg;
            
            $this->xmlOut = '';
            $this->xmlOut = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            $this->xmlOut .= "<url><loc>$base</loc><priority>1.00</priority><changefreq>daily</changefreq></url>";
            
            $this->Gen();
            
            $this->xmlOut .= '</urlset>';
            
            $fileSitemap = BASE.'t/'.$k.'/sitemap.xml';
            $newXml = new SimpleXMLElement($this->xmlOut);
            $newXml->asXML($fileSitemap);
            
        }
        
    }
    
    public function Gen() {
        
        return $this->genXML();
    
    }
    
    
    
    private function genXML() {
        return $this->loadModuleActive();
    }
    
    public function loadModuleActive() {
        
        $module = $this->getRubriques();
        
        if (!empty($module)) {
            foreach($module as $name=>$tab) {
                
                switch($tab['type']) {
                    
                    case 'multipage':
                        $this->getSysMultipage($name,$tab['label']);
                        break;
                    case 'news':
                    case 'shop':
                    case 'sharedlinks':
                    case 'blog':
                    case 'image':
                    case 'video':
                        $this->getSysModule($name,$tab['label']);
                        break;
                    
                    case 'page':
                    case 'inbox':
                    case 'faq':
                    case 'partner':
                        $this->getSysPage($name,$tab['label']);
                        break;
                    
                    
                }
                
            }
        }
    }
    
    private function getSysPage($name,$titre) {
        
        $uri = $this->lg.'?'.$name;
        $this->xmlOut .=    "<url><loc>$uri</loc><priority>0.80</priority><changefreq>weekly</changefreq></url>";
        
    }
    
    private function getSysModule($name,$titre) {
        
        $uri = $this->lg.'?'.$name;
        $this->xmlOut .= "<url><loc>$uri</loc><priority>0.80</priority><changefreq>monthly</changefreq></url>";
        $this->getSysModuleCategories($name);
        
    }
    
    private function getSysMultipage($name,$titre) {
        
        $uri = $this->lg.'?'.$name;
        //$this->xmlOut .= "<url><loc>$uri</loc><priority>0.80</priority><changefreq>monthly</changefreq></url>";
        $this->getSysModuleContentMultipage($name);
        
    }
    
    private function getSysModuleCategories($name) {
        
        $out = '';
        $lgActu = $this->myLanguage();
        
        $sqlT = "
        SELECT _categories_traduction.uri, _categories_traduction.id,_categories.uri_module , _categories.id, _categories_traduction.nom
        FROM _categories, _categories_traduction
        WHERE _categories_traduction.langue =  '$lgActu'
        AND _categories.id = _categories_traduction.id_cat
        AND _categories.uri_module = '$name'
        ORDER BY _categories.ordre ASC 
        LIMIT 0 , 30";
        $isContent = $this->dbQ($sqlT);
        $cContents = count($isContent);
        if ($cContents > 0) {
            for($i=0;$i<$cContents;$i++) {
                
                $uri = $this->lg.'?doorgets='.$isContent[$i]['uri'];
                $this->xmlOut .=    "<url><loc>$uri</loc><priority>0.70</priority><changefreq>monthly</changefreq></url>";
                $this->getSysModuleContent($name,$isContent[$i]['id']);
            }
        }
        
        return $out;
        
    }
    
    private function getSysModuleContent($name,$categorie) {
        
        $out = '';
        $nameTable = $this->getRealUri($name);
        $table = '_m_'.$nameTable;
        $tableTrad = $table.'_traduction';
        
        $lgActu = $this->myLanguage();
        
        $sqlT = "
        SELECT $table.active, $tableTrad.uri, $tableTrad.titre
        FROM $table, $tableTrad
        WHERE $tableTrad.langue =  '$lgActu'
        AND $table.categorie LIKE '%$categorie,%'
        AND $table.active = 2
        AND $table.id = $tableTrad.id_content
        ORDER BY $table.date_creation DESC 
        LIMIT 500";
        
        $isContent = $this->dbQ($sqlT);
        
        $cContents = count($isContent);
        $base = $this->lg;
        if ($cContents > 0) {
            
            for($i=0;$i<$cContents;$i++) {
                
                $uri = $this->lg.'?'.$name.'='.$isContent[$i]['uri'];
                $this->xmlOut .=    "<url><loc>$uri</loc><priority>0.60</priority><changefreq>monthly</changefreq></url>";
                
            }
        }
        
        return $out;
        
    }
    
    private function getSysModuleContentMultipage($name) {
        
        $out = '';
        $nameTable = $this->getRealUri($name);
        $table = '_m_'.$nameTable;
        $tableTrad = $table.'_traduction';
        
        $lgActu = $this->myLanguage();
        
        $sqlT = "
        SELECT $table.active, $tableTrad.uri, $tableTrad.titre
        FROM $table, $tableTrad
        WHERE $tableTrad.langue =  '$lgActu'
        AND $table.active = 2
        AND $table.id = $tableTrad.id_content
        ORDER BY $table.date_creation DESC 
        LIMIT 500";
        
        $isContent = $this->dbQ($sqlT);
        
        $cContents = count($isContent);
        $base = $this->lg;
        if ($cContents > 0) {
            
            for($i=0;$i<$cContents;$i++) {
                
                $uri = $this->lg.'?'.$name.'='.$isContent[$i]['uri'];
                $this->xmlOut .=    "<url><loc>$uri</loc><priority>0.60</priority><changefreq>monthly</changefreq></url>";
                
            }
        }
        
        return $out;
        
    }
    
    
}