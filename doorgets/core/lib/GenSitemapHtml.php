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


class GenSitemapHtml extends Langue{
    
    private $getHtml;
    
    public function __construct($lg= 'fr') {
        
        parent::__construct($lg);
        $this->genHTML();
    }
    
    public function getHtml() {
        return $this->getHtml;
    }
    
    
    private function genHTML() {
        return $this->loadModuleActive();
    }
    
    public function loadModuleActive() {
        
        $module = $this->getRubriques();
        
        if (!empty($module)) {
            foreach($module as $name=>$tab) {
                
                switch($tab['type']) {
                    
                    case 'multipage':
                        
                        $this->getHtml .= $this->getSysMultipage($name,$tab['label']);
                        break;
                    case 'news':
                    case 'blog':
                    case 'image':
                    case 'video':
                        $this->getHtml .= $this->getSysModule($name,$tab['label']);
                        break;
                    
                    case 'page':
                    case 'inbox':
                    case 'faq':
                    case 'partner':
                        $this->getHtml .= $this->getSysPage($name,$tab['label']);
                        break;
                    
                }
                
            }
        }
        
    }
    
    private function getSysPage($name,$titre) {
        
        $out = '<h3><a href="'.BASE_URL.'?'.$name.'" >'.$titre.'</a></h3>';
        return $out;
        
    }
    
    private function getSysModule($name,$titre) {
        
        $out = '<h3><a href="'.BASE_URL.'?'.$name.'" >'.$titre.'</a><h3>';
        $out .= '<ul>'.$this->getSysModuleCategories($name).'</ul>';
        return $out;
        
    }
    
    private function getSysMultipage($name,$titre) {
        
        $out = '<h3><a href="'.BASE_URL.'?'.$name.'" >'.$titre.'</a><h3>';
        $out .= '<ul>'.$this->getSysModuleContentMultipage($name).'</ul>';
        return $out;
        
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
        $cContent = count($isContent);
        if ($cContent > 0) {
            for($i=0;$i<$cContent;$i++) {
                
                $out .= '<li><a href="'.BASE_URL.'?doorgets='.$isContent[$i]['uri'].'" >'.$isContent[$i]['nom'].'</a></li>';
                $out .= '<ul>'.$this->getSysModuleContent($name,$isContent[$i]['id']).'</ul>';
                
            }
        }
        
        return $out;
        
    }
    
    private function getSysModuleContent($name,$categorie) {
        
        $out = '';
        $table = '_m_'.$name;
        $tableTrad = '_m_'.$name.'_traduction';
        
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
        $cContent = count($isContent);
        $base = URL;
        if ($cContent > 0) {
            
            for($i=0;$i<$cContent;$i++) {
                
                $out .= '<li><a href="'.BASE_URL.'?'.$name.'='.$isContent[$i]['uri'].'" >'.$isContent[$i]['titre'].'</a></li>';
                
            }
        }
        
        return $out;
        
    }
    
    private function getSysModuleContentMultipage($name) {
        
        $out = '';
        $table = '_m_'.$name;
        $tableTrad = '_m_'.$name.'_traduction';
        
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
        $cContent = count($isContent);
        $base = URL;
        if ($cContent > 0) {
            
            for($i=0;$i<$cContent;$i++) {
                
                $out .= '<li><a href="'.BASE_URL.'?'.$name.'='.$isContent[$i]['uri'].'" >'.$isContent[$i]['titre'].'</a></li>';
                
            }
        }
        
        return $out;
        
    }
    
    
}