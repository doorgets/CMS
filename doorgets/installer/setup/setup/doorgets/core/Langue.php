<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
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


class Langue extends doorgetsFunctions {
    
    public  $allLanguages;
    
    public  $myLanguage;
    
    public function __construct() {
        $lg = 'en';
        if (array_key_exists('doorgetsLanguage',$_SESSION)) {$lg = $_SESSION['doorgetsLanguage'];}
        $this->myLanguage   = $lg;
        $this->allLanguages = $this->getAllLanguages();
        
    }
    
    public function getAllLanguages() {
        
        $arrLangue = array(

            'en' => 'English',
            'fr' => 'Français',
            'de' => 'Deutsch',
            'es' => 'Español',
            'pl' => 'Polski',
            'uk' => 'Pусский',
            'ru' => 'Pусский',
            'tu' => 'Türk',
            'po' => 'Português',
            'su' => 'Svenska',
            'it' => 'Italiano',
            'sk' => 'Slovenčina',
            'id' => 'Indonesia',
            'hi' => 'हिंदी',
            'ja' => '日本の',
            'ko' => '한국의',
            'th' => 'ภาษาไทย',
            'cn' => '中国',
            'iw' => 'עברית',
            'ar' => 'العربية'
            
        );
        
        $traductionFile = CONFIGURATION.'traduction.php';
        if (is_file($traductionFile)) {
            //include $traductionFile;
        }
        
        return $arrLangue;
        
    }
    
    
    public function l($word = '') {
       
        $fileLangue = LANGUE.$this->myLanguage.'.lg.php';
        $fileLanguePrincipale = LANGUE.'temp.lg.php';
        
        $_w = $wTranslate = array();
        
        if (!is_file($fileLanguePrincipale) || !is_file($fileLangue))
        {
            return $word;
        }
        
        include $fileLanguePrincipale;
        $wDefaut = $wTranslate;
        
        unset($wTranslate);
        include $fileLangue;
        
        if ($word === 'doorgets') { return 'doorGets'; }
        
        if (in_array($word,$wDefaut)) {
            
            $key = array_search($word,$wDefaut);
            
            if (array_key_exists($key,$_w) && !empty($_w[$key]) )
            {
                
                return $_w[$key];
            }
            
        }
        
        return $word;
        
    }
    
    
    public function myLanguage() {
        
        return $this->myLanguage;
        
    }
    
    public function setLangue($lg="fr") {
        
        $this->myLanguage = $lg;
        
    }
    
    
}
























