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


class doorgetsWebsiteUser extends AbstractDoorgetsWebsite
{
    
    public       $namespace = 'website_user';

    protected    $theme;
    
    protected    $uri;

    protected    $controller    = 'index';
    
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

    public    $profile = null;    

    public    $autorizedModuleType = array();

    public    $isRtlLanguage = false;

    public    $hasCart = false;
    
    public function __construct($lg = '',$userId) {

        $this->autorizedModuleType = array('blog','news','video','image','sharedlinks');

        $this->User     = new AuthUser();
        $isUser        = $this->User->isConnected();
        if (!empty($isUser)) {
            $this->_User = $isUser;
            $this->isUser = true;
        }

        parent::__construct('fr');

        $this->profile = $this->getProfileInfos($userId);
        

        $lgTemp = $lg;
        $isWebsite = $this->dbQS(Constant::$websiteId,'_website');
        if (!empty($isWebsite) && empty($lg)) {
            
            $lgTemp = $isWebsite['langue_front'];
            
            $isWebsite['langue_groupe'] = unserialize($isWebsite['langue_groupe']);
            $isWebsite['langue_groupe'][$lgTemp] = $lgTemp;

            $urlToRedirect = URL.'u/'. strtolower($this->profile['pseudo']).'/t/'.$lgTemp;
            

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
        
        $this->myLanguage           = $this->configWeb['langue_front'];
        $this->module               = 'index';
        $this->theme                = $this->configWeb['theme'];
        $this->rubriques            = $this->getRubriques('_rubrique');
        $this->activeModules        = $this->getAllActiveModules();
        
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

            
            if (!empty($this->profile)) {
                if (!in_array('showprofile',$this->profile['liste_module_interne'])) {
                    header('Status : 404 Not Found');
                    header('HTTP/1.0 404 Not Found');
                    header("Location:".BASE_URL);
                    exit;
                }
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
    }
    
    public function genController() {
        
        $Params = $this->getParams();
        if (array_key_exists('contact', $Params['GET'])) {
            $this->type = 'local';
            $this->controller = 'contact';

        } elseif (empty($Params['GET'])) {

            $this->type = 'local';
            $this->controller = 'index';

        } else {

            $this->controller = 'module'.$this->type;
        }
        
        $nameController = $this->controller.'Controller';
        $fileNameController = CONTROLLERS.'websiteUser/'.$nameController.'.php';
        
        if (!is_file($fileNameController))
        { 
            $this->redirectToErrorHeader();
            //echo 'File not found : ' . $fileNameController.' : '; exit(); 
        }

        if (!is_file($fileNameController))
        { 
            $this->redirectToErrorHeader();
            //$this->htmlContent = $this->getHtmlWaitingPage(); return true; 
        }
        require_once $fileNameController;
        
        if (!class_exists ($nameController))
        { echo 'Class  not found : ' . $nameController.' : '; exit(); }

        $this->Controller = new $nameController($this);
        
    }
    
    public function checkModuleContent() {
        
        $hasMe = $this->isMyProfile();

        foreach($this->activeModules as $nameModule=>$v) {
            
            if (array_key_exists($nameModule,$this->Params['GET'])) {
                
                $this->type     = $v['type'];
                $this->module   = $nameModule;
                
                if (
                    $this->type !== 'page'
                    && $this->type !== 'inbox'
                    && $this->type !== 'link'
                ) {
                  
                    $uriContent = $this->Params['GET'][$nameModule];

                    $nameModule = $this->getRealUri($nameModule);

                    $table = '_m_'.$nameModule;
                    $tableTraduction = '_m_'.$nameModule.'_traduction';
                    if ($this->type !== 'faq' && $this->type !== 'partner') {
                        $isContent = $this->dbQS($uriContent,$tableTraduction,'uri'," AND langue = '".$this->myLanguage."' LIMIT 1 ");
                    }
                    
                    if (!empty($isContent)) {
                        
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
        
        $dateWesbsite = $dateCreated.'-'.$yearNow;
        if ($dateCreated == $yearNow) { $dateWesbsite = $yearNow; }
        
        $countComments = $this->getCountCommentActivated();
        
        $tplWrapper = Template::getWebsiteUserView('wrapper',$this->getTheme());
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
        
        $bootstrap_version = (array_key_exists('bootstrap_version', $_SESSION) && array_key_exists($_SESSION['bootstrap_version'], Constant::$bootstrapThemes))?$_SESSION['bootstrap_version']:$this->configWeb['theme_bootstrap'];
        
        $tplHeader = Template::getWebsiteUserView('header',$this->getTheme());
        ob_start(); if (is_file($tplHeader)) { include $tplHeader; } $out = ob_get_clean();
        
        return $out;
    }
    
    public function getHtmlFooter() {
        
        $tplFooter = Template::getWebsiteUserView('footer',$this->getTheme());
        ob_start(); if (is_file($tplFooter)) { include $tplFooter; } $out = ob_get_clean();
        
        return $out;
    }
    
    public function getHtmlNavigation() {
        
        $User       = $this->getCurrentUser();
        $isUser     = $User->isConnected();
        $navigation = $this->rubriques;
        $profile    = $this->profile;
        
        foreach ($navigation as $uri_module => $menu) {
            
            if (!in_array($menu['type'], $this->autorizedModuleType)) {

                unset($navigation[$uri_module]);
            }
        }

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

        $backUrl        = $this->getCurrentUrl();
        $currentUrl     = urlencode($this->getCurrentUrl());
        $baseUrl        = $this->getBaseUrl();
        $controller     = $this->getController();

        $showContact        = in_array('myinbox',$profile['liste_module_interne']);
        $profileContactUrl  = $this->getBaseUrl().'?contact';

        $groupes    = $this->loadGroupesSubscriber();

        $tplNavigation= Template::getWebsiteUserView('widgets/navigation',$this->getTheme());
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

    public function getHtmlBadgeHeader() {
        
        $profile = $this->profile;

        if ( empty($profile)) {
            return '';
        }
        
        $_lastname = $profile['last_name'];
        $_name = trim($profile['last_name'].' '.$profile['first_name']);
        $_description  = $profile['description'];
        
        $_name = (empty($_name)) ? $profile['pseudo'] : $_name;
        $_lastname = (empty($_lastname)) ? $profile['last_name'] : $_lastname;

        $_website = (!empty($profile['website']))? '<a href="'.$profile['website'].'" target="self" >'.$profile['website'].'</a>':'';
        $ntworks = array(
            'facebook','twitter','linkedin','pinterest','youtube','google','myspace',
        );

        $networks = array();

        foreach($ntworks as $name) {

            $nameHold = $name;
            $name = 'id_'.$name;
            if (array_key_exists($name,$profile) && !empty($profile[$name])) {
                $key = $this->getUrlProfile($nameHold,$profile[$name]);
                $networks[$key] = $this->getImageSkin($nameHold);
            }

        }

        
        $tplBadge = Template::getWebsiteUserView('user/user_badge_header',$this->getTheme());
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
        
        $tplTanguages= Template::getWebsiteUserView('widgets/languages',$this->getTheme());
        ob_start(); if (is_file($tplTanguages)) { include $tplTanguages; }  $out = ob_get_clean();
        
        return $out;
    }
    
    public function getHtmlComment() {
        
        if (empty($this->configWeb['m_comment'])) return null;
        
        $hasUser = ($this->isUser)  ? true : false ;
        
        $form = $this->form['comment'];
        
        $tplComment = Template::getWebsiteView('widgets/comment',$this->getTheme());
        ob_start(); if (is_file($tplComment)) { include $tplComment; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlCommentDisqus() {
        
        if (empty($this->configWeb['m_comment_disqus'])) return null;
        
        $idDisqus = $this->configWeb['id_disqus'];
        
        $tplDisqus = Template::getWebsiteView('widgets/comment_disqus',$this->getTheme());
        ob_start(); if (is_file($tplDisqus)) { include $tplDisqus; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlCommentFacebook() {
        
        if (empty($this->configWeb['m_comment_facebook'])) return null;
        
        $idFacebook = $this->configWeb['id_facebook'];
        
        $tplFacebook = Template::getWebsiteView('widgets/comment_facebook',$this->getTheme());
        ob_start(); if (is_file($tplFacebook)) { include $tplFacebook; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlSharethis() {
        
        if (empty($this->configWeb['m_sharethis'])) return null;
        
        $tplSharethis = Template::getWebsiteView('widgets/sharethis',$this->getTheme());
        ob_start(); if (is_file($tplSharethis)) { include $tplSharethis; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlNewsletter() {
        
        if (empty($this->configWeb['m_newsletter'])) return null;
        
        $form = $this->form['newsletter'];
        
        $tplNewsletter = Template::getWebsiteView('widgets/newsletter',$this->getTheme());
        ob_start(); if (is_file($tplNewsletter)) { include $tplNewsletter; } $out = ob_get_clean();
        
        return $out;
    }
    
    public function getUrlPreviousContent($admin = false) {
        
        $pseudo  = strtolower($this->profile['pseudo']);

        $out = array();
        $order = 1;
        if (!empty($this->content)) {
            if (array_key_exists('ordre',$this->content)) {
                $order = $this->content['ordre'];
            }
        }
        
        $nameTable = '_m_'.$this->getRealUri($this->module);
        $nameTableTraduction = $nameTable.'_traduction';
        
        $isContent = $this->dbQ("SELECT id,ordre,groupe_traduction FROM $nameTable WHERE ordre > $order AND active = 2 AND id_user = '".$this->profile['id']."'  ORDER BY ordre LIMIT 1");
        if (!empty($isContent)) {

            $groupe_traduction = @unserialize($isContent[0]['groupe_traduction']);
            $idContentTraduction = $groupe_traduction[$this->myLanguage];
            
            $isContentTraduction = $this->dbQS($idContentTraduction,$nameTableTraduction);
            if (!empty($isContentTraduction)) {
                
                $out['label']   = $isContentTraduction['titre'];
                $out['url']     = './?'.$this->module.'='.$isContentTraduction['uri'];
            }
        }
        
        return $out;    
    }
    
    public function getUrlNextContent($admin = false) {
        
        $pseudo  = strtolower($this->profile['pseudo']);

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
            
            $isContent = $this->dbQ("SELECT id,ordre,groupe_traduction FROM $nameTable WHERE ordre < $order AND active = 2 AND id_user = '".$this->profile['id']."' ORDER BY ordre DESC LIMIT 1");
            if (!empty($isContent)) {
                
                $groupe_traduction = @unserialize($isContent[0]['groupe_traduction']);
                $idContentTraduction = $groupe_traduction[$this->myLanguage];
                
                $isContentTraduction = $this->dbQS($idContentTraduction,$nameTableTraduction);
                if (!empty($isContentTraduction)) {
                    
                    $out['label']   = $isContentTraduction['titre'];
                    $out['url']     = './?'.$this->module.'='.$isContentTraduction['uri'];
                }
            }
        }
        
        return $out;
    }
    
    public function getCurrentUrl(){

        $profile = $this->profile['pseudo'];
        $base_url = URL.'u/'.strtolower($profile).'/';
        $language = $this->myLanguage;
        $languages = $this->allLanguagesWebsite;

        if (count($languages) > 1) {
            $base_url = $base_url.'t/'.$this->myLanguage;
        }

        if ($this->module == 'index') {
            return $base_url;
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

        $profile = $this->profile['pseudo'];
        $base_url = URL.'u/'.strtolower($profile).'/';
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
