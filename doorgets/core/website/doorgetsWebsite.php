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


class doorgetsWebsite extends AbstractDoorgetsWebsite{

    public       $namespace = 'website';
    
    protected    $theme;
    
    protected    $uri;
    
    protected    $Params        = array();
    
    public    $activeModules = array();
    
    protected    $module;
    
    protected    $category;
    
    protected    $contentView;
    
    protected    $content;
    
    protected    $position;
    
    protected    $label;
    
    protected    $type;
    
    protected    $rubriques    = array();
    
    protected    $meta         = array();
    
    public    $form         = array();
    
    public    $genform         = array();
    
    public    $Controller;
    
    protected $htmlContent;
    
    public    $isCarousel = false;

    public    $isUser = false;

    public    $_User = array();

    public    $_lgUrl = '';

    public    $loginUrl = '';

    public    $registerUrl = '';

    public    $isRtlLanguage = false;

    public    $hasCart = false;
    
    public function __construct($lg = '',$userId = 0) {
        

        $this->User     = new AuthUser();
        $isUser        = $this->User->isConnected();

        if (!empty($isUser)) {
            $this->_User = $isUser;
            $this->isUser = true;
        }

        $lgTemp = $lg;
        $crud = new CRUD();
        $isWebsite = $crud->dbQS(Constant::$websiteId,'_website');
        if (!empty($isWebsite) && empty($lg)) {
                
            $lgTemp = $isWebsite['langue_front'];
            //vdump($isWebsite);
            $isWebsite['langue_groupe'] = unserialize($isWebsite['langue_groupe']);
            $isWebsite['langue_groupe'][$lgTemp] = $lgTemp;
            
            
            $urlToRedirect = URL.'t/'.$lgTemp;
            

            $cLangues = count($isWebsite['langue_groupe']);
            if ($cLangues === 1) {
                $urlToRedirect = URL;

            }

            if ($cLangues > 1) {
                header('HTTP/1.1 301 Moved Permanently', false, 301);
                header('Location: '.$urlToRedirect); exit();    
            }    
          
        } else if(!empty($isWebsite)){
            if ($lgWebsite = unserialize($isWebsite['langue_groupe'])){
                if (!array_key_exists($lgTemp,$lgWebsite)) {
                    $this->redirectToErrorHeader();
                }
            }
        }

        if (!empty($isUser)) {
            $this->_lgUrl = $isUser['langue'].'/';
        }

        parent::__construct($lgTemp);

        if (!empty($lg) && array_key_exists($lgTemp,$this->allLanguages))
        {
            $this->configWeb['langue_front'] = $lgTemp;
        }
        
        if (!empty($lg) && count($this->allLanguagesWebsite) === 1)
        {
            header('HTTP/1.1 301 Moved Permanently', false, 301);
            header('Location: '.URL); exit();
        }
        
        if (
            
            !array_key_exists($this->configWeb['langue_front'],$this->configWeb['langue_groupe'])
            && empty($this->allLanguagesWebsite)
        ) {
           
            header('Location:'.URL.'#'); exit();
        }
        
        @date_default_timezone_set($this->configWeb['horaire']);
        
        $this->module = '';
        $this->activeModules        = $this->getAllActiveModules();
        if (array_key_exists($this->configWeb['module_homepage'],$this->activeModules) && empty($_GET)) {
            $this->module               = $this->configWeb['module_homepage'];
        }
        
        $this->myLanguage           = $this->configWeb['langue_front'];
        $this->theme                = $this->configWeb['theme'];
        $this->rubriques            = $this->getRubriques('_rubrique');
        
        
        // Check if shop module exists
        //$this->initHasCart();

        // Widget Newsletter init
        $this->initNewsletterWidget();
        
        // Changement de template
        $this->initChangeTemplate();

        $themeExists = $this->checkTheme();
        if (empty($themeExists)) { die('The dir <b>'.THEME.'/'.$this->theme.'</b> not found.'); }
        
        $this->htmlContent = $this->getHtmlWaitingPage();
        $isIpUserStatut = $this->isIpUserStatut();
        
        if ($this->configWeb['statut'] === '1' || $isIpUserStatut) {
            
            $this->loadParams();
            $this->loadPosition();

            if ($this->position == 'error') {
                $this->redirectToErrorHeader();
            }
            
            $this->loadMeta();
            
            $this->isRtlLanguage = (in_array($this->myLanguage,Constant::$rtlLanguage)) ? true : false;

            // Widget Comment init
            $this->initCommentWidget();
            
            $this->loadCategories($this->module);
            if (!empty($this->categorieSimple_)) {
                $this->hasCategories = true;
            }

            $this->genController();

            $this->htmlContent = $this->getHtmlWrapper();
            
        }

    }
    
    public function genController() {

        $nameController = 'module'.$this->type.'Controller';
        $fileNameController = CONTROLLERS.'website/'.$nameController.'.php';
       
        if (!is_file($fileNameController))
        { 
            $this->redirectToErrorHeader();
            $this->htmlContent = $this->getHtmlWaitingPage(); return true; 
        }
        require_once $fileNameController;
        
        if (!class_exists ($nameController))
        { 
            $this->redirectToErrorHeader();
            echo 'Class  not found : ' . $nameController.' : '; exit(); }
        
        //$this->Controller = new $nameController($this);
        new $nameController($this);

    }
    
    public function checkModuleContent() {
        
        foreach($this->activeModules as $nameModule=>$v) {
            
            if (array_key_exists($nameModule,$this->Params['GET'])) {
                
                $this->type     = $v['type'];
                $this->module   = $nameModule;
                
                if (
                    $this->type !== 'onepage'
                    && $this->type !== 'page'
                    && $this->type !== 'inbox'
                    && $this->type !== 'link'
                ) {
                  
                    $uriContent = $this->Params['GET'][$nameModule];

                    $nameModule = $this->getRealUri($nameModule);

                    $table = '_m_'.$nameModule;
                    $tableTraduction = '_m_'.$nameModule.'_traduction';
                    $uri_language = $this->myLanguage;
                    if ($this->type !== 'faq' && $this->type !== 'partner') {
                        $isContent = $this->dbQ("
                            SELECT id 
                            FROM $tableTraduction
                            WHERE uri = '$uriContent'
                            AND langue = '".$uri_language."' LIMIT 1
                        ");
                    }
                    
                    if (!empty($isContent)) {
                        $isContent = $this->dbQS($isContent[0]['id'],$tableTraduction);
                        $isContentActive    = $this->dbQS($isContent['id_content'],$table,'id',' AND active = 2 LIMIT 1');
                        if (!empty($isContentActive)) {
                            
                            $isContent['ordre'] = $isContentActive['ordre'];
                            
                            $this->content  = $isContent;
                            $this->position = 'content';
                            $this->uri      = $isContent['uri'];     

                        }else {

                            $isContentActiveVersion    = $this->dbQS($isContent['id_content'],$table.'_version','id_content'," AND active = 2 AND langue = '".$this->myLanguage."' LIMIT 1");
                            if (!empty($isContentActiveVersion)) {

                                $isContentActive    = $this->dbQS($isContent['id_content'],$table,'id');

                                $isContent['ordre'] = $isContentActive['ordre'];
                                
                                $this->content  = $isContent;
                                $this->position = 'content';
                                $this->uri      = $isContent['uri'];  

                            } else {

                                $this->position = 'error';
                                
                            }
                        }
                    }    
                }
            }
        }
        
    }
    
    public function getHtmlWrapper() {
        
        $title          = $this->configWeb['title'];
        $copyright      = $this->configWeb['copyright'];
        $dateCreated    = $this->configWeb['year'];
        $yearNow        = date('Y',time());
        $type           = $this->type;

        $dateWesbsite = $dateCreated.'-'.$yearNow;
        if ($dateCreated == $yearNow) { $dateWesbsite = $yearNow; }
        
        $countComments = $this->getCountCommentActivated();
        
        if ($type === 'onepage') {
            $tplWrapper = Template::getWebsiteView('wrapper_onepage',$this->getTheme());
        } else {
            $tplWrapper = Template::getWebsiteView('wrapper',$this->getTheme());
        }
        
        ob_start(); if (is_file($tplWrapper)) { include $tplWrapper; } $out = ob_get_clean();
        return $out;
        
    }
    
    public function getHtmlHeader() {

        extract($this->meta);
        
        $lgFacebook = 'fr_FR';
        switch($this->myLanguage) {
            
            case 'en': $lgFacebook = 'en_US'; break;
            case 'de': $lgFacebook = 'de_DE'; break;
            case 'it': $lgFacebook = 'it_IT'; break;
            case 'ru': $lgFacebook = 'ru_RU'; break;
            case 'pl': $lgFacebook = 'pl_PL'; break;
            case 'tu': $lgFacebook = 'tr_TR'; break;
            case 'su': $lgFacebook = 'sv_SE'; break;
            case 'es': $lgFacebook = 'es_LA'; break;
            case 'po': $lgFacebook = 'pt_BR'; break;
        }
        
        $rss = new GenRss(1);
        $rssLinks = $rss->getAllToRssLink();
        
        $url = PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $base_data = URL.'data/'.$this->module.'/';

        $bootstrap_version = (array_key_exists('bootstrap_version', $_SESSION) && array_key_exists($_SESSION['bootstrap_version'], Constant::$bootstrapThemes))?$_SESSION['bootstrap_version']:$this->configWeb['theme_bootstrap'];

        $tplHeader = Template::getWebsiteView('header',$this->getTheme());
        ob_start(); if (is_file($tplHeader)) { include $tplHeader; } $out = ob_get_clean();
        
        return $out;
    }
    
    public function getHtmlFooter() {
        
        $tplFooter = Template::getWebsiteView('footer',$this->getTheme());
        ob_start(); if (is_file($tplFooter)) { include $tplFooter; } $out = ob_get_clean();
        
        return $out;
    }
    
    public function getHtmlNavigation() {
        
        $User       = $this->getCurrentUser();
        $isUser     = $User->isConnected();
        $navigation = $this->rubriques;
        
        $i = 1;
        $cNav = count($navigation);
        $Pseudo = '';
        if (!empty($isUser)) { 
            $Pseudo = ucfirst($isUser['pseudo']);
        }
        
        $user = $this->User->isConnected();
        $cLan = count($this->allLanguagesWebsite);
        $toLangue = ''; 
        if ($cLan > 1 && !empty($user)) {  
            $toLangue = $user['langue'].'/'; 
        } elseif($cLan > 1 ) {
            $toLangue = $this->myLanguage.'/';
        }

        $this->loginUrl = URL_USER.$toLangue.'?controller=authentification';
        $this->registerUrl = URL_USER.$toLangue.'?controller=authentification&action=register';
        
        $groupes    = $this->loadGroupesSubscriber();
        
        $backUrl = $this->getCurrentUrl();

        $tplNavigation= Template::getWebsiteView('widgets/navigation',$this->getTheme());
        ob_start(); if (is_file($tplNavigation)) { include $tplNavigation; }  $out = ob_get_clean();
        
        return $out;
    }
    
    public function getHtmlNavigationUser() {
        
        $out        = '';
        $User       = $this->getCurrentUser();
        $isUser     = $User->isConnected();
        
        
        if (!empty($isUser)) {
            $tplNavigationUser    = Template::getView('user/user_rubrique_public');
            ob_start(); if (is_file($tplNavigationUser)) { include $tplNavigationUser; }  $out = ob_get_clean();            
        }
        
        return $out;
    }
    
    public function getHtmlBadge($userId = 0) {
        
        $profile = $this->getProfileInfos($userId);

        if ( empty($profile)) {
            return '';
        }
        
        $_lastname = $profile['last_name'];
        $_name = trim($profile['last_name'].' '.$profile['first_name']);
        $_description  = $profile['description'];
        
        $_name = (empty($_name)) ? $profile['pseudo'] : $_name;
        $_lastname = (empty($_lastname)) ? $profile['last_name'] : $_lastname;

        $ntworks = array(
            'facebook','twitter','linkedin','pinterest','youtube','google','myspace',
        );

        $hasBadge = (in_array('showprofile',$profile['liste_module_interne']))?true:false;
        
        $networks = array();
        foreach($ntworks as $name) {

            $nameHold = $name;
            $name = 'id_'.$name;
            if (array_key_exists($name,$profile) && !empty($profile[$name])) {

                $networks[$this->getUrlProfile($nameHold,$profile[$name])] = $this->getImageSkin($nameHold);
            }
        }
        
        $tplBadge = Template::getWebsiteView('user/user_badge',$this->getTheme());
        ob_start(); if (is_file($tplBadge)) { include $tplBadge; } $out = ob_get_clean();
        return $out;
        
    }

    public function getHtmlLanguages() {
        
        $base_url = URL.'t/';
        $languages = $this->allLanguagesWebsite;
        
        $languagesMenu = array();
        if (count($languages) > 1) {
            foreach($languages as $uri_language => $label) {
                
                if ($this->type !== 'page') {
                    
                    $languagesMenu[$uri_language]['url']    = $base_url.$uri_language.'/?'.$this->module;
                    $languagesMenu[$uri_language]['label']  = $label;
                    
                    if ($this->position === 'content') {
                        $tableTaduction = '_m_'.$this->getRealUri($this->module).'_traduction';
                        $idContent = $this->content['id_content'];
                        $isContent = $this->dbQS($idContent,$tableTaduction,'id_content',"AND langue = '".$uri_language."' LIMIT 1");
                        
                        if (!empty($isContent)) {
                            $isContent = $this->dbQS($isContent['id'],$tableTaduction);

                            $languagesMenu[$uri_language]['url']    = $base_url.$uri_language.'/?'.$this->module.'='.$isContent['uri'];
                            $languagesMenu[$uri_language]['label']  = $label;
                        }
                        
                    } elseif ($this->position === 'category') {
                        
                        $idCat = $this->category['id_cat'];
                        $isCategory = $this->dbQS($idCat,'_categories_traduction','id_cat',"AND langue = '".$uri_language."' LIMIT 1");
                        if (!empty($isCategory)) {
                            $isCategory = $this->dbQS($isCategory['id'],'_categories_traduction');
                            $languagesMenu[$uri_language]['url']    = $base_url.$uri_language.'/?doorgets='.$isCategory['uri'];
                            $languagesMenu[$uri_language]['label']  = $label;
                        }
                        
                    } 
                    
                }else{
                    
                    $languagesMenu[$uri_language]['url']    = $base_url.$uri_language.'/?'.$this->module;
                    $languagesMenu[$uri_language]['label']  = $label;
                    
                }
                
            }
        }
        
        $tplTanguages= Template::getWebsiteView('widgets/languages',$this->getTheme());
        ob_start(); if (is_file($tplTanguages)) { include $tplTanguages; }  $out = ob_get_clean();
        
        return $out;
    }
    
    public function getUrlPreviousContent($admin = false) {
        
        $out = array();
        $order = 1;
        if (!empty($this->content)) {
            if (array_key_exists('ordre',$this->content)) {
                $order = $this->content['ordre'];
            }
        }
        
        $nameTable = '_m_'.$this->getRealUri($this->module);
        $nameTableTraduction = $nameTable.'_traduction';
        
        $isContent = $this->dbQ("SELECT id,ordre,groupe_traduction FROM $nameTable WHERE ordre > $order AND active = 2 ORDER BY ordre LIMIT 1");
        if (!empty($isContent)) {

            $groupe_traduction = @unserialize($isContent[0]['groupe_traduction']);
            $idContentTraduction = $groupe_traduction[$this->myLanguage];
            
            $isContentTraduction = $this->dbQS($idContentTraduction,$nameTableTraduction);
            if (!empty($isContentTraduction)) {
                
                $out['label']   = $isContentTraduction['titre'];
                $out['url']     = BASE_URL.'?'.$this->module.'='.$isContentTraduction['uri'];
            }

        }
        
        return $out;
    
    }
    
    public function getUrlNextContent($admin = false) {
        
        $out = array();
        $order = 1;
        if (!empty($this->content)) {
            if (array_key_exists('ordre',$this->content)) {
                $order = $this->content['ordre'];
            }
        }
        
        if ($order !== 1) {
            
            $nameTable = '_m_'.$this->getRealUri($this->module);
            $nameTableTraduction = $nameTable.'_traduction';
            
            $isContent = $this->dbQ("SELECT id,ordre,groupe_traduction FROM $nameTable WHERE ordre < $order AND active = 2 ORDER BY ordre DESC LIMIT 1");
            if (!empty($isContent)) {
                
                $groupe_traduction = @unserialize($isContent[0]['groupe_traduction']);
                $idContentTraduction = $groupe_traduction[$this->myLanguage];
                
                $isContentTraduction = $this->dbQS($idContentTraduction,$nameTableTraduction);
                if (!empty($isContentTraduction)) {
                    
                    $out['label']   = $isContentTraduction['titre'];
                    $out['url']     = BASE_URL.'?'.$this->module.'='.$isContentTraduction['uri'];
                }

                
            }
        }
        
        
        return $out;
    
    }
    
    public function getCurrentUrl(){

        $base_url = URL;
        $language = $this->myLanguage;
        $languages = $this->allLanguagesWebsite;
        $allModules = $this->activeModules;

        if (count($languages) > 1) {
            $base_url = URL.'t/'.$this->myLanguage;
        }

        $currentPath = '';
        if ($this->type !== 'page') {

            $currentPath = $base_url.'/?'.$this->module;
            
            if ($this->position === 'content') {
                
                $isContent = $this->dbQS($this->content['id_content'],'_m_'.$this->getRealUri($this->module).'_traduction','id_content'," AND langue = '".$language."' LIMIT 1");
                if (!empty($isContent)) {
                    
                    $currentPath = $base_url.'/?'.$this->module.'='.$isContent['uri'];
                }
                
            }
            
            if ($this->position === 'category') {
                
                $isCategory = $this->dbQS($this->category['id_cat'],'_categories_traduction','id_cat'," AND langue = '".$language."' LIMIT 1");
                if (!empty($isCategory)) {
                    
                    $currentPath = $base_url.'/?doorgets='.$isCategory['uri'];
                }
                
            }
            
        }else{
            
            $currentPath = $base_url;
            if (array_key_exists($this->module, $allModules)) {
                $currentPath =  $base_url.'/?'.$this->module;
                if ($allModules[$this->module]['is_home']) {
                    $currentPath = $base_url;
                }
            }
                        
        }

        return $currentPath;
    }

    public function getBaseUrl(){
        $base_url = URL;
        $language = $this->myLanguage;
        $languages = $this->allLanguagesWebsite;

        if (count($languages) > 1) {
            $base_url = $base_url.'t/'.$this->myLanguage.'/';
        }
        return $base_url;
    }
    
    public function __destruct() {
        
        parent::__destruct();
    }
}
