<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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


class Langue extends CRUD{
    
    public  $allLanguages;
    
    public  $allLanguagesWebsite;
    public  $allLanguagesSession;
    
    public  $myLanguage;
   
    public  $configWeb;
    
    public function __construct($lg='fr') {
        
        include BASE.'config/locale.php';
        
        parent::__construct();
        
        $this->myLanguage   = $lg;
        $defaultLg = 'en';

        $this->allLanguages = $this->getAllLanguages();
        
        $this->allLanguagesSession = $arrLangue;
        
        $lgTrad     = $this->getLangueTradution();
        $infoWeb    = $this->dbQS(1,'_website');
        
        $infoWebTraduction = $this->dbQS($lgTrad,'_website_traduction','langue');
        if (empty($infoWebTraduction)) {
            
            $infoWebTraductionTemp = $this->dbQS($defaultLg,'_website_traduction','langue');
            if (!empty($infoWebTraductionTemp)) {
                unset($infoWebTraductionTemp['id']);
                $infoWebTraductionTemp['langue'] = $lgTrad;
                
                $this->dbQI($infoWebTraductionTemp,'_website_traduction');
            }
        }
        
        $infoWebTraduction = $this->dbQS($lgTrad,'_website_traduction','langue');
        
        if (!empty($infoWeb) && !empty($infoWebTraduction))
        {
            
            $this->configWeb                            = $infoWeb;
            $this->configWeb['oauth_google_active']     =  ($infoWeb['oauth_google_active'] === '1') ? true : false;
            $this->configWeb['oauth_facebook_active']   =  ($infoWeb['oauth_facebook_active'] === '1') ? true : false;
            $this->configWeb['statut_tinymce']          =  html_entity_decode($infoWebTraduction['statut_tinymce']);
            $this->configWeb['title']                   =  $infoWebTraduction['title'];
            $this->configWeb['slogan']                  =  $infoWebTraduction['slogan'];
            $this->configWeb['description']             =  $infoWebTraduction['description'];
            $this->configWeb['copyright']               =  $infoWebTraduction['copyright'];
            $this->configWeb['year']                    =  $infoWebTraduction['year'];
            $this->configWeb['keywords']                =  $infoWebTraduction['keywords'];
            $this->configWeb['date_modification']       =  $infoWebTraduction['date_modification'];
            
            $this->configWeb['langue_groupe']        = @unserialize($this->configWeb['langue_groupe']);

            if (!is_array($this->configWeb['langue_groupe'])) {
              $this->configWeb['langue_groupe'] = array();
            }
            foreach($arrLangue as $k=>$v) {
                if (
                    !array_key_exists($k,$this->configWeb['langue_groupe'])
                    && $infoWeb['langue_front'] !== $k
               ) {
                    unset($arrLangue[$k]);
                }
            }
            $this->allLanguagesWebsite = $arrLangue;
        }
        
    }
    
    public function getAllLanguages() {
        
        include BASE.'config/locale.php';
        return $arrLangue;
        
    }
    
    
    public function l($word = '') {
        
        $fileLangue = LANGUE.$this->myLanguage.'.lg.php';
        $fileLanguePrincipale = LANGUE.'temp.lg.php';
        
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

        //$this->addToDatabaseTranslator($word);
        $this->addToTempTranslate($word);
        
        return $word;
        
    }

    public function __($word = '') {
        return $this->l($word);
    }
    
    
    public function myLanguage() {
        
        return $this->myLanguage;
        
    }
    
    public function setLangue($lg="fr") {
        
        $this->myLanguage = $lg;
        
    }
    
    private function addToDatabaseTranslator($word = '') {
        
        $table = '_dg_translator';

        $word = trim(filter_var($word, FILTER_SANITIZE_STRING));

        $data['sentence']       = $word;
        $data['id_user']        = 0;
        $data['id_groupe']      = 0;
        $data['date_creation']  = time();
        
        $hasSentence = $this->dbQS($word,$table,'sentence');
        
        if (empty($hasSentence) && !empty($word)) {

            $idContent = $this->dbQI($data,$table);
                
            foreach($this->getAllLanguages() as $k=>$v) {

                $dataTraduction['translated_sentence']  = $word;
                $dataTraduction['langue']               = $k;
                $dataTraduction['id_translator']        = $idContent;
                $dataTraduction['date_modification']    = time();
                
                $idsTraduction[$k]           = $this->dbQI($dataTraduction,$table.'_traduction');

            }

            $dataModification['groupe_traduction'] = serialize($idsTraduction);
            $this->dbQU($idContent,$dataModification,$table);            
        }
    }

    private function addToTempTranslate($word = '') {
        
        $fileTemp = LANGUE.'temp.lg.php';
        if (!empty($word) && is_file($fileTemp)) {
            
            include $fileTemp;
            
            if (isset($wTranslate) && is_array($wTranslate) && !in_array($word,$wTranslate)) {
                
                $wTranslate[] = $word;
                $outTempTranslate = '<?php '.PHP_EOL;
                foreach($wTranslate as $w) {
                    
                    $outTempTranslate .= '$wTranslate[] = "'.$w.'"; '.PHP_EOL;
                    
                }
                
                @file_put_contents($fileTemp,$outTempTranslate);
            
            }
            
        }
        
    }
    
    public function getLangueTradution($all = false) {
        
        $out = $this->myLanguage();
        $iLang = count($this->allLanguagesWebsite);
        
        if (isset($_GET['lg']) && array_key_exists($_GET['lg'],$this->allLanguages) ) {
            
            $out = filter_input(INPUT_GET,'lg',FILTER_SANITIZE_STRING);    
        }
        
        if (!$all) {
            if ($iLang === 1) {
                foreach($this->allLanguagesWebsite as $k=>$v) {
                    $out = $k;
                }
            }            
        }

        return $out;
        
    }

    public function getLangueTradutionForTraduction($all = false) {
        
        $out = $this->myLanguage();
        $iLang = count($this->allLanguagesWebsite);
        
        if (isset($_GET['lg'])) {
            
            $out = filter_input(INPUT_GET,'lg',FILTER_SANITIZE_STRING);    
        }
        
        return $out;
        
    }
    
    public function genLangueMenuAdmin() {
        
        $i = 0;
        $len = count($this->allLanguagesWebsite);
        
        if (empty($this->allLanguagesWebsite) || $len == 1) {return '';}
        $out = '';
        
        $url = '?';
        foreach($_GET as $k=>$v) {
            if ($k !== 'lg') {
                $url .= $k;
                if (!empty($v)) {
                    $url .= '='.$v;
                }
                $url .= '&';                
            }

        }
        
        $lgTo = $this->myLanguage();
        if (array_key_exists('lg', $_GET) && array_key_exists($_GET['lg'], $this->allLanguagesWebsite)) {
            $lgTo = filter_input(INPUT_GET, 'lg', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        
        $out .= '<ul class="nav nav-pills nav-traduction">';
        $out .= '<li class="dropdown">';
        $out .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
        //$out .= '<img src="'.BASE_IMG.'drap_'.$lgTo.'.png" class="px15" />';
        $out .= ' <span class="caret"></span> '.$this->allLanguagesWebsite[$lgTo].'  ';
        $out .= '</a>';
        $out .= '<ul class="dropdown-menu" role="menu">';
        foreach($this->allLanguagesWebsite as $k=>$v) {
                
            $out .= '<li> <a class=" ';
            
            if ($i == 0)
            {
                $out .= ' first ';
                
            }else if ($i == $len - 1)
            {
                $out .= ' last ';
            }
            
            if ((isset($_GET['lg']) && $_GET['lg']===$k)) {
                $out .= ' active';
            }
            
            if (!isset($_GET['lg']) && $k === $this->myLanguage()) {
                $out .= ' active ';
            }
            
            $out .= '" href="'.$url.'lg='.$k.'">';
            //$out .= ' <img src="'.BASE_IMG.'drap_'.$k.'.png" class="px15" /> ';
            $out .= $v.'</a></li>';
            $i++; 
            
        }
        
        $out .= '</ul></li></ul>';
        
        
        return $out;
        
    }

    public function genLangueMenuAdminTraduction() {
        
        $i = 0;
        $allLanguages = $this->getAllLanguages();
        $len = count($allLanguages);
        
        if (empty($allLanguages) || $len == 1) {return '';}
        $out = '';
        
        $url = '?';
        foreach($_GET as $k=>$v) {
            if ($k !== 'lg') {
                $url .= $k;
                if (!empty($v)) {
                    $url .= '='.$v;
                }
                $url .= '&';                
            }
        }
        
        $lgTo = $this->myLanguage();
        if (array_key_exists('lg', $_GET) && array_key_exists($_GET['lg'], $allLanguages)) {
            $lgTo = filter_input(INPUT_GET, 'lg', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        $lgToOther = $this->myLanguage();
        if (array_key_exists('lgother', $_GET) && array_key_exists($_GET['lgother'], $allLanguages)) {
            $lgToOther = filter_input(INPUT_GET, 'lgother', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        $out .= '<ul class="nav nav-pills nav-traduction ">';
        $out .= '<li class="dropdown">';
        $out .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
        //$out .= '<img src="'.BASE_IMG.'drap_'.$lgTo.'.png" class="px15" /> ';
        $out .= '<span class="caret"></span> '.$allLanguages[$lgTo].'  ';
        $out .= '</a>';
        $out .= '<ul class="dropdown-menu" role="menu">';
        foreach($allLanguages as $k=>$v) {
                
            $out .= '<li> <a class=" ';
            
            if ($i == 0)
            {
                $out .= ' first ';
                
            }else if ($i == $len - 1)
            {
                $out .= ' last ';
            }
            
            if ((isset($_GET['lg']) && $_GET['lg']===$k)) {
                $out .= ' active';
            }
            
            if (!isset($_GET['lg']) && $k === $this->myLanguage()) {
                $out .= ' active ';
            }
            
            $out .= '" href="'.$url.'lg='.$k.'&lgother='.$lgToOther.'">';
            //$out .= '<img src="'.BASE_IMG.'drap_'.$k.'.png" class="px15" /> ';
            $out .= $v.'</a></li>';
            $i++; 
            
        }
        
        $out .= '</ul></li></ul>';
        
        return $out;
        
    }

    public function genLangueMenuAdminOtherTraduction() {
        
        $i = 0;
        $allLanguages = $this->getAllLanguages();
        $len = count($allLanguages);
        
        if (empty($allLanguages) || $len == 1) {return '';}
        $out = '';
        
        $url = '?';
        foreach($_GET as $k=>$v) {
            if ($k !== 'lg') {
                $url .= $k;
                if (!empty($v)) {
                    $url .= '='.$v;
                }
                $url .= '&';                
            }
        }
        
        $lgTo = $this->myLanguage();
        if (array_key_exists('lg', $_GET) && array_key_exists($_GET['lg'], $allLanguages)) {
            $lgTo = filter_input(INPUT_GET, 'lg', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        $lgToOther = $lgTo;
        if (array_key_exists('lgother', $_GET) && array_key_exists($_GET['lgother'], $allLanguages)) {
            $lgToOther = filter_input(INPUT_GET, 'lgother', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $out .= '<ul class="nav nav-pills nav-traduction pull-right lang-trad-back">';
        $out .= '<li class="dropdown">';
        $out .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
        //$out .= '<img src="'.BASE_IMG.'drap_'.$lgToOther.'.png" class="px15" /> ';
        $out .= '<span class="caret"></span> '.$allLanguages[$lgToOther].'  ';
        $out .= '</a>';
        $out .= '<ul class="dropdown-menu" role="menu">';
        foreach($allLanguages as $k=>$v) {
                
            $out .= '<li> <a class=" ';
            
            if ($i == 0)
            {
                $out .= ' first ';
                
            }else if ($i == $len - 1)
            {
                $out .= ' last ';
            }
            
            if ((isset($_GET['lgother']) && $_GET['lgother']===$k)) {
                $out .= ' active';
            }
            
            if (!isset($_GET['lgother']) && $k === $this->myLanguage()) {
                $out .= ' active ';
            }
            
            $out .= '" href="'.$url.'lg='.$lgTo.'&lgother='.$k.'">';
            //$out .= '<img src="'.BASE_IMG.'drap_'.$k.'.png" class="px15" /> ';
            $out .= $v.'</a></li>';
            $i++; 
            
        }
        
        $out .= '</ul></li></ul>';
        
        
        return $out;
        
    }
    
    
    
    public function __destruct() {
        
        parent::__destruct();
    
    }
    
}
