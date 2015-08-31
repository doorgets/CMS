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


class doorgetsWebsite extends Langue{
    
    private   $theme;
    
    private   $uri;
    
    private   $Params        = array();
    
    private   $activeModules = array();
    
    private   $module;
    
    private   $category;
    
    private   $contentView;
    
    private   $content;
    
    private   $position;
    
    private   $label;
    
    private   $type;
    
    private   $rubriques    = array();
    
    private   $meta         = array();
    
    public    $form         = array();
    
    public    $genform         = array();
    
    public    $Controller;
    
    protected $htmlContent;
    

    public    $isUser = false;

    public    $_User = array();

    public    $_lgUrl = '';

    public    $loginUrl = '';

    public    $registerUrl = '';

    public      $isRtlLanguage = false;
    
    public function __construct($lg = '') {
        
        $this->User     = new AuthUser();
        $isUser        = $this->User->isConnected();

        if (!empty($isUser)) {
            $this->_User = $isUser;
            $this->isUser = true;
        }


        $lgTemp = $lg;
        if (empty($lg)) {
            
            $db = new CRUD();
            $isWebsite = $db->dbQS(1,'_website');
            if (!empty($isWebsite)) {
                
                $lgTemp = $isWebsite['langue_front'];
                
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
        $this->module               = $this->configWeb['module_homepage'];
        $this->theme                = $this->configWeb['theme'];
        $this->rubriques            = $this->getRubriques('_rubrique');
        $this->activeModules        = $this->getAllActiveModules();
        
        // Widget Newsletter init
        $this->initNewsletterWidget();
        
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
            
            $this->genController();

            $this->htmlContent = $this->getHtmlWrapper();
            
        }

    }
    
    public function genController() {
       
        $nameController = 'module'.$this->type.'Controller';
        $fileNameController = CONTROLLERS.'website/'.$nameController.'.php';
       
        if (!is_file($fileNameController))
        { $this->htmlContent = $this->getHtmlWaitingPage(); return true; }
        require_once $fileNameController;
        
        if (!class_exists ($nameController))
        { echo 'Class  not found : ' . $nameController.' : '; exit(); }
        
        $this->Controller = new $nameController($this);
        
    }
    
    public function getCurrentUser() {
        
        return $this->User;
    
    }

    public function getCurrentAdmin() {
        
        return $this->Admin;
    
    }
    
    public function getWebsiteRubriques() {
        
        return $this->rubriques;
    
    }
    
    public function getTheme() {
        
        return $this->theme;
    
    }
    
    public function getUri() {
        
        return $this->uri;
    
    }
    
    public function getActiveModules() {
        
        return $this->activeModules;
    
    }
    
    public function getModule() {
        
        return $this->module;
    
    }
    
    public function getCategory() {
        
        return $this->category;
    
    }
    
    public function getContent() {
        
        return $this->content;
    
    }
    
    public function setContent($value) {
        
        $this->content = $value;
    
    }
    
    public function getContentView() {
        
        return $this->contentView;
    
    }
    
    public function setContentView($value) {
        
        $this->contentView = $value;
    
    }
    
    public function getPosition() {
        
        return $this->position;
    
    }
    
    public function getType() {
        
        return $this->type;
    
    }
    
    public function getLabel() {
        
        return $this->type;
    
    }
    
    public function getParams() {
        
        return $this->Params;
    
    }
    
    public function getHtmlContent() {
        
        return $this->htmlContent;
        
    }
    
    public function loadParams() {
        
        $GET = $POST = array();
        
        if (!empty($_GET)) {
            foreach($_GET as $k=>$v) {
                $GET[$k] = filter_input(INPUT_GET,$k,FILTER_SANITIZE_STRING);
            }
        }
        
        $this->Params['GET'] = $GET;
        
        if (!empty($_POST)) {
            foreach($_POST as $k=>$v) {
                $POST[$k] = filter_input(INPUT_POST,$k,FILTER_SANITIZE_STRING);
            }
        }
        
        $this->Params['POST'] = $POST;
        
    }
    
    public function loadPosition() {
        
        $this->position = 'root';
        
        // Get module
        if (array_key_exists('doorgets',$this->Params['GET']) )
        {
            
            $uriCategory    = $this->Params['GET']['doorgets'];
            $isCategory     = $this->dbQS($uriCategory,'_categories_traduction','uri'," AND langue = '".$this->myLanguage."' LIMIT 1 ");
            
            if (!empty($isCategory)) {
                
                $isParentCategory = $this->dbQS($isCategory['id_cat'],'_categories');
                
                if (!empty($isParentCategory)) {
                    
                    if (array_key_exists($isParentCategory['uri_module'],$this->activeModules)) {
                        
                        
                        $this->category     =   $isCategory;
                        $this->position     =   'category';
                        $this->module       =   $isParentCategory['uri_module'];
                        
                    }
                }
            }
        }
        
        // Get Content
        $this->checkModuleContent();
        
        if (
            array_key_exists($this->module,$this->rubriques)
       ) {
        
            $this->label    = $this->rubriques[$this->module]['label'];
            $this->type     = $this->rubriques[$this->module]['type'];
            
        }
        
        
        
    }
    
    public function loadMeta() {
        
        $meta['label']          = $this->configWeb['slogan'];
        $meta['title']          = $this->configWeb['title'];
        $meta['description']    = $this->configWeb['description'];
        $meta['keywords']       = $this->configWeb['keywords'];

        $meta['facebook_type']          = '';
        $meta['facebook_title']         = '';
        $meta['facebook_description']   = '';
        $meta['facebook_image']         = '';

        $meta['twitter_type']          = '';
        $meta['twitter_title']         = '';
        $meta['twitter_description']   = '';
        $meta['twitter_image']         = '';
        $meta['twitter_player']         = '';
        
        if (
            !empty($this->position)
            && $this->position === 'root'
            && array_key_exists($this->module,$this->rubriques)
        ) {
            
            $meta['label']          = $this->rubriques[$this->module]['all']['nom'].' &#8250; '.$this->configWeb['title'];
            $meta['title']          = $this->rubriques[$this->module]['all']['meta_titre'];
            $meta['description']    = $this->rubriques[$this->module]['all']['meta_description'];
            $meta['keywords']       = $this->rubriques[$this->module]['all']['meta_keys'];

            $meta['facebook_type']          = $this->rubriques[$this->module]['all']['meta_facebook_type'];
            $meta['facebook_title']         = $this->rubriques[$this->module]['all']['meta_facebook_titre'];
            $meta['facebook_description']   = $this->rubriques[$this->module]['all']['meta_facebook_description'];
            $meta['facebook_image']         = $this->rubriques[$this->module]['all']['meta_facebook_image'];

            $meta['twitter_type']          = $this->rubriques[$this->module]['all']['meta_twitter_type'];
            $meta['twitter_title']         = $this->rubriques[$this->module]['all']['meta_twitter_titre'];
            $meta['twitter_description']   = $this->rubriques[$this->module]['all']['meta_twitter_description'];
            $meta['twitter_image']         = $this->rubriques[$this->module]['all']['meta_twitter_image'];
            $meta['twitter_player']        = $this->rubriques[$this->module]['all']['meta_twitter_player'];
            
        }
        
        if (!empty($this->position) && $this->position === 'category' && array_key_exists($this->module,$this->rubriques)) {
            
            $meta['label']          = $this->category['nom'] . ' &#8250; ' .$this->rubriques[$this->module]['all']['nom'].' &#8250; '.$this->configWeb['title'];
            $meta['title']          = $this->category['meta_titre'];
            $meta['description']    = $this->category['meta_description'];
            $meta['keywords']       = $this->category['meta_keys'];
            
        }
        
        if (!empty($this->position) && $this->position === 'content' && array_key_exists($this->module,$this->rubriques)) {
            
            $meta['label']          = $this->content['titre'] . ' &#8250; ' .$this->rubriques[$this->module]['all']['nom'].' &#8250; '.$this->configWeb['title'];
            $meta['title']          = $this->content['meta_titre'];
            $meta['description']    = $this->content['meta_description'];
            $meta['keywords']       = $this->content['meta_keys'];
            
            $meta['facebook_type']          = $this->content['meta_facebook_type'];
            $meta['facebook_title']         = $this->content['meta_facebook_titre'];
            $meta['facebook_description']   = $this->content['meta_facebook_description'];
            $meta['facebook_image']         = $this->content['meta_facebook_image'];

            $meta['twitter_type']          = $this->content['meta_twitter_type'];
            $meta['twitter_title']         = $this->content['meta_twitter_titre'];
            $meta['twitter_description']   = $this->content['meta_twitter_description'];
            $meta['twitter_image']         = $this->content['meta_twitter_image'];
            $meta['twitter_player']        = $this->content['meta_twitter_player'];
            
        }
        
        $this->meta = $meta;
        
    }
    
    public function checkModuleContent() {
        
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
    
    public function checkTheme() {
        
        $dirTheme = THEME.$this->theme;
        if (is_dir($dirTheme))
        {
            return true;
        }
        
        return false;
    }
    
    public function getHtmlSitemap() {
        
        $Sitemap = new GenSitemapHtml($this->myLanguage());
        return $Sitemap->getHtml();
        
    }
    
    public function getHtmlBlock($uri_module='') {
        
        $out = "";

        if (empty($uri_module)) {return null;}
        $isBlock = $this->dbQS($uri_module,'_dg_block','uri');
        if (empty($isBlock)) {return null;}
        
        $allModules = $this->getActiveModules();
        
        if (array_key_exists($uri_module,$allModules)) {

            $Module = $allModules[$uri_module];

            $groupe_traduction = @unserialize($isBlock['groupe_traduction']);
            $idLangueTraduction = $groupe_traduction[$this->myLanguage];
            
            $isContentTraduction = $this->dbQS($idLangueTraduction,'_dg_block_traduction');
            if (empty($isContentTraduction)) {return null;}
            
            $content  = htmlspecialchars_decode(html_entity_decode($isContentTraduction['article_tinymce']));
            $content = $this->_convertMethod($content);
            
            $tplBlock = Template::getWebsiteView('widgets/block',$this->getTheme());
            ob_start(); if (is_file($tplBlock)) { include $tplBlock; } $out = ob_get_clean();

        }

        return $out;
        
    }
    
    public function getHtmlForm($uri_module = '') {
        
        $out = '';
        $allModules = $this->getActiveModules();
        $uri_module_real = $this->getRealUri($uri_module);

        if (array_key_exists($uri_module,$allModules)) {
            
            $Module = $allModules[$uri_module];
            
            $titre      = $Module['all']['titre'];
            $formulaire =  unserialize($Module['all']['extras']);
            
            $form = $this->genform[$uri_module_real]  = new Formulaire($uri_module_real);
            
            $dataGenForm = $this->_getGenFormFields(unserialize($Module['all']['extras']));
            
            // Modules GenForm init
            $this->initHtmlForm($uri_module_real,$Module,$dataGenForm);
            
            $tplForm = Template::getWebsiteView('widgets/form',$this->getTheme());
            ob_start(); if (is_file($tplForm)) { include $tplForm; } $out = ob_get_clean();            
        
        }
        
        return $out;
        
    }
    
    public function getHtmlWrapper() {
        
        $title          = $this->configWeb['title'];
        $copyright      = $this->configWeb['copyright'];
        $dateCreated    = $this->configWeb['year'];
        $yearNow        = date('Y',time());
        
        $dateWesbsite = $dateCreated.'-'.$yearNow;
        if ($dateCreated == $yearNow) { $dateWesbsite = $yearNow; }
        
        $countComments = $this->getCountCommentActivated();
        
        $tplWrapper = Template::getWebsiteView('wrapper',$this->getTheme());
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
    
    public function getHtmlBadge($userId) {
        
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

        $networks = array();

        foreach($ntworks as $name) {

            $nameHold = $name;
            $name = 'id_'.$name;
            if (array_key_exists($name,$profile) && !empty($profile[$name])) {

                $networks[$this->getUrl($nameHold)] = $this->getImageSkin($nameHold);
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
                        
                        $isContent = $this->dbQS($this->content['id_content'],'_m_'.$this->getRealUri($this->module).'_traduction','id_content'," AND langue = '".$uri_language."' LIMIT 1");
                        if (!empty($isContent)) {
                            
                            $languagesMenu[$uri_language]['url']    = $base_url.$uri_language.'/?'.$this->getRealUri($this->module).'='.$isContent['uri'];
                            $languagesMenu[$uri_language]['label']  = $label;
                        }
                        
                    } elseif ($this->position === 'category') {
                        
                        $isCategory = $this->dbQS($this->category['id_cat'],'_categories_traduction','id_cat'," AND langue = '".$uri_language."' LIMIT 1");
                        if (!empty($isCategory)) {
                            
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
    
    public function getHtmlComment() {
        
        if (empty($this->configWeb['m_comment'])) return null;
        
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
    
    public function getHtmlNetwork() {
        
        // change position in array for change order
        $ntworks = array(
            
            'facebook',
            'twitter',
            'linkedin',
            'pinterest',
            'youtube',
            'google',
            'myspace',
            
        );
        
        $networks = array();
        
        foreach($ntworks as $name) {
            
            if (
                array_key_exists($name,$this->configWeb)
                && !empty($this->configWeb[$name])
            ) {
                $networks[$this->getUrl($name)] = $this->getImageSkin($name);
            }
            
        }
        
        $tplNetworks = Template::getWebsiteView('widgets/networks',$this->getTheme());
        ob_start(); if (is_file($tplNetworks)) { include $tplNetworks; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlAnalytics() {
        
        $codeAnalytics = $this->configWeb['analytics'];
        
        $tplAnalytics = Template::getWebsiteView('widgets/analytics',$this->getTheme());
        ob_start(); if (is_file($tplAnalytics)) { include $tplAnalytics; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlModuleComments() {
        
        $isModuleComments = $this->dbQA('_dg_comments'," WHERE uri_module = '".$this->getRealUri($this->module)."' AND uri_content = '".$this->uri."' AND validation = '2' ORDER BY date_creation DESC  ");
        $countComments = count($isModuleComments);
        
        $tplModuleComments = Template::getWebsiteView('widgets/comment_listing',$this->getTheme());
        ob_start(); if (is_file($tplModuleComments)) { include $tplModuleComments; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getHtmlModuleSearch($q = '') {
        
        $form = new Formulaire('');
        
        $tplModuleSearch = Template::getWebsiteView('widgets/module_search',$this->getTheme());
        ob_start(); if (is_file($tplModuleSearch)) { include $tplModuleSearch; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    
    public function getHtmlFixed($position = 'top') {
        
        $out = '';
        
        if (
            $this->position == 'root'
            && array_key_exists($this->module,$this->activeModules)
       ) {
            switch($position) {
                
                case 'top':
                    
                    $fixed_top = $this->activeModules[$this->module]['all']['top_tinymce'];
                    if (!empty($fixed_top)) {
                        $out = '<div class="doorGets-fixed-top">';
                        $out .= htmlspecialchars_decode(html_entity_decode($fixed_top));
                        $out .= '</div>';
                        
                    }
                    
                    break;
                
                case 'bottom':
                    
                    
                    $fixed_bottom = $this->activeModules[$this->module]['all']['bottom_tinymce'];
                    if (!empty($fixed_bottom)) {
                        $out = '<div class="doorGets-fixed-bottom">';
                        $out .= htmlspecialchars_decode(html_entity_decode($fixed_bottom));
                        $out .= '</div>';
                    }
                    
                    break;
                
            }
        }
        
        return $out;
    }
    
    public function getHtmlModuleCategories() {
        
        $category_now = $this->getCategory();
        $togo = 'doorgets';
        if ($this->type === 'multipage') {
            
            $categories = $this->loadMultipageCategories($this->module);
            $togo = $this->module;
            
        }else{
            $this->loadCategories($this->module);
            $categories = $this->categorieSimple_;
        }
        
        $tplModuleCategories = Template::getWebsiteView('widgets/module_categories',$this->getTheme());
        ob_start(); if (is_file($tplModuleCategories)) { include $tplModuleCategories; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    
    public function initHtmlForm($uri_form = '',$Module= array(),$data = array()) {
        
        $sizeMax = 8192000;
        
        $typeFile["application/msword"] = "data/_form/";
        $typeFile["application/vnd.openxmlformats-officedocument.wordprocessingml.document"] = "data/_form/";
        
        $typeFile["image/png"] = "data/_form/";
        $typeFile["image/jpeg"] = "data/_form/";
        $typeFile["image/gif"] = "data/_form/";
        
        $typeFile["application/zip"] = "data/_form/";
        $typeFile["application/x-zip-compressed"] = "data/_form/";
        $typeFile["application/pdf"] = "data/_form/";
        $typeFile["application/x-shockwave-flash"] = "data/_form/";
        
        $typeExtension["application/msword"] = "doc";
        $typeExtension["application/vnd.openxmlformats-officedocument.wordprocessingml.document"] = "doc";
        
        $typeExtension["image/png"] = "png";
        $typeExtension["image/jpeg"] = "jpg";
        $typeExtension["image/gif"] = "gif";
        
        $typeExtension["application/zip"] = "zip";
        $typeExtension["application/x-zip-compressed"] = "zip";
        
        $typeExtension["application/pdf"] = "pdf";
        $typeExtension["application/x-shockwave-flash"] = "swf";
        
        
        if (!empty($this->genform) && !empty($data) && !empty($uri_form)) {
            
            if (!empty($this->genform[$uri_form]->i) )
            {
                
                $this->checkMode(false);
                
                
                foreach($data as $k=>$v) {
                    
                    $value = '';
                    // test des champs obligatoires
                    if (
                        $v['obligatoire'] === 'yes'
                        && ( !array_key_exists($k,$this->genform[$uri_form]->i) || empty($this->genform[$uri_form]->i[$k]) )
                        && $v['type'] !== 'file'
                   ) {
                        
                        $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                    }
                    
                    // test des filtres
                    if ($v['type'] === 'text') {
                        
                        $value = $this->genform[$uri_form]->i[$k];
                        
                        switch($v['filtre']) {
                            
                            case 'email':
                                
                                $isEmail = filter_var($value,FILTER_VALIDATE_EMAIL);
                                if (empty($isEmail)) {
                                    $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                }
                                
                                break;
                            
                            case 'url':
                                
                                $isURL = filter_var($value,FILTER_VALIDATE_URL);
                                if (empty($isURL)) {
                                    $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                }
                                
                                break;
                            
                            case 'alpha':
                                
                                $isAlpha = ctype_alpha($value);
                                if (empty($isAlpha)) {
                                    $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                }
                                
                                break;
                            
                            case 'num':
                                
                                $isNum = ctype_digit($value);
                                if (empty($isNum)) {
                                    $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                }
                                
                                break;
                            
                            case 'alphanum':
                                
                                $isAlphaNum = ctype_alnum($value);
                                if (empty($isAlphaNum)) {
                                    $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                }
                                
                                break;
                        }
                        
                    }
                    
                    if ($v['type'] === 'file' && $v['obligatoire'] === 'yes') {
                        
                        
                        if ( isset($_FILES[$uri_form.'_'.$k]) &&  $_FILES[$uri_form.'_'.$k]['error'] != 0) {
                        
                            $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                            
                        }
                        
                        if ( isset($_FILES[$uri_form.'_'.$k]) && empty($this->Controller->form->e)) {
                            
                            if (!array_key_exists($_FILES[$uri_form.'_'.$k]["type"],$typeFile) ) {
                                
                                $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                
                            }else{
                                
                                $extension = $typeExtension[$_FILES[$uri_form.'_'.$k]["type"]];
                                
                                if ($v['file-type'][$extension] !== 1) {
                                    
                                    $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                    
                                }
                                
                            }
                            
                            if ($_FILES[$uri_form.'_'.$k]["size"] > $sizeMax) {
                                
                                $this->genform[$uri_form]->e[$uri_form.'_'.$k] = 'ok';
                                
                            }
                        }
                    }
                }
                
                if (empty($this->genform[$uri_form]->e)) {
                    
                    foreach($data as $k=>$v) {
                        
                        if ($v['type'] === 'file' && $_FILES[$uri_form.'_'.$k]['error'] != 4) {
                            
                            $ttff = $_FILES[$uri_form.'_'.$k]["type"];
                            $sSize = $_FILES[$uri_form.'_'.$k]['size'];
                            $ttf = $typeExtension[$ttff];
                            
                            $uni = time().'-'.uniqid($ttf);
                            
                            $nameFileImage = $uni.'-doorgets.'.$ttf;
                            
                            $uploaddir = $typeFile[$ttff];
                            $uploadfile = BASE.$uploaddir.$nameFileImage;
                            
                            if (move_uploaded_file($_FILES[$uri_form.'_'.$k]['tmp_name'], $uploadfile)) {
                                $this->genform[$uri_form]->i[$k] = $nameFileImage;
                            }
                            
                        }
                        
                    }
                }
                
                if (empty($this->genform[$uri_form]->e) )
                {
                    $dOut = array();
                    foreach($this->genform[$uri_form]->i as $key=>$val) {
                        
                        if (array_key_exists($key,$data)) {
                            $key = str_replace('-','_',$key);
                            $dOut[$key] = $val;
                        }
                        
                    }
                    
                    if (!empty($dOut)) {
                        
                        $dOut['date_creation']  = time();
                        $dOut['adresse_ip']     = $_SERVER['REMOTE_ADDR'];
                        $dOut['codechallenge']  = $this->genform[$uri_form]->i['codechallenge'];
                        
                        
                        $isChallenge = $this->dbQS($this->genform[$uri_form]->i['codechallenge'],'_m_'.$uri_form,'codechallenge');
                        if (empty($isChallenge)) {
                            
                            $idNewForm = $this->dbQI($dOut,'_m_'.$uri_form);
                            $this->genform[$uri_form]->isSended = true;
                            
                            // Mail Sender Notification
                            $moduleInfo = $this->dbQS($this->getModule(),'_modules','uri');
                            if (!empty($moduleInfo) && !empty($moduleInfo['notification_mail'])) {
                                
                                $_email = $this->configWeb['email'];
                                $_lg    = $this->configWeb['langue'];
                                $_sujet = '['.$uri_form.'] '.$this->l("Vous avez un nouveau message").' - '.$idNewForm;
                                
                                new SendMailAlert($_email,$_sujet,'',$this->doorGets);
                                
                            }
                            
                            if (!empty($Module['all']['redirection'])) {
                                
                                header('Location:'.$Module['all']['redirection']);
                                
                            }
                        }else{
                            $_POST = array();
                        }
                    }
                    
                }
                
            }
        }
        
    }
    
    public function initNewsletterWidget() {
        
        if (empty($this->configWeb['m_newsletter'])) return null;
        
        // Start Widget Newsletter
        
        // Init form
        $this->form['newsletter']   = new Formulaire('doorgets_newsletter');
        
        // Check validation for form submit
        if (!empty($this->form['newsletter']->i) )
        {
            
            $this->checkMode(false);
            
            $email          = $this->form['newsletter']->i['email'];
            $isEmail        = filter_var($email, FILTER_VALIDATE_EMAIL);
            $isEmailExist   = $this->dbQS($email,'_dg_newsletter','email');
            $isIpExist      = $this->dbQS($_SERVER['REMOTE_ADDR'],'_dg_newsletter','client_ip'," ORDER BY date_creation DESC LIMIT 1 ");
            
            if (empty($this->form['newsletter']->i['nom']) )
            {
               $this->form['newsletter']->e['doorgets_newsletter_nom'] = 'ok'; 
            }
            if (!$isEmail || !empty($isEmailExist) )
            {
               $this->form['newsletter']->e['doorgets_newsletter_email'] = 'ok'; 
            }
            if (!empty($isIpExist)) {
                
                $time_hack = 60;
                $time_ip   = (int)$isIpExist['date_creation'];
                
                $time_left = time() - $time_ip;
                
                if ($time_left < $time_hack) {
                    $this->form['newsletter']->e['doorgets_hack'] = 'ok'; 
                }
            }
            
            if (empty($this->form['newsletter']->e) )
            {
                
                if (array_key_exists('recaptcha_response_field',$this->form['newsletter']->i) )
                { unset($this->form['newsletter']->i["recaptcha_response_field"]); }
                
                if (array_key_exists('recaptcha_challenge_field',$this->form['newsletter']->i) )
                { unset($this->form['newsletter']->i["recaptcha_challenge_field"]); }
                
                $data = $this->form['newsletter']->i;
                $data['client_ip']      = $_SERVER['REMOTE_ADDR'];
                $data['date_creation']  = time();
                $this->dbQI($data,'_dg_newsletter');
                
            }
            
        }
        
    }
    
    public function initCommentWidget() {
        
        if (empty($this->configWeb['m_comment'])) return null;
        
        $idForm = uniqid();
        if (!array_key_exists('idForm',$_SESSION)) {
            
            $_SESSION['idForm'] = $idForm;
        }
        
        // Init form
        $this->form['comment']   = new Formulaire('doorgets_comment');
        
        if (
           !empty($this->form['comment']->i)
           && $_SESSION['idForm'] !== $this->form['comment']->i['secureFormulaire']
        ) {  
            
            header("Location:".$_SERVER['REQUEST_URI']);
        }
        
        // Check validation for form submit
        if (
           !empty($this->form['comment']->i)
           && $_SESSION['idForm'] === $this->form['comment']->i['secureFormulaire']
        ) {

            $this->checkMode(false);
            
            $name   = $this->form['comment']->i['name'];
            if (empty($name)) { $this->form['comment']->e['doorgets_comment_nom'] = 'ok'; }
            
            $email  = $this->form['comment']->i['email'];
            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (empty($isEmail)) { $this->form['comment']->e['doorgets_comment_email'] = 'ok'; }
            
            $comment = $this->form['comment']->i['comment'];
            if (empty($comment)) { $this->form['comment']->e['doorgets_comment_nom'] = 'ok'; }
            
            if (empty($this->form['comment']->e)) {
                
                
                $statut = 3;
                // reset sercure form
                $_SESSION['idForm'] = $idForm;
                
                // add comment to database
                $data = array(
                    
                    'uri_module'    => $this->module,
                    'uri_content'   => $this->uri,
                    'nom'           => $name,
                    'email'         => $email,
                    'comment'       => $comment,
                    'url'           => $_SERVER["REQUEST_URI"],
                    'date_creation' => time(),
                    'validation'    => $statut,
                    'adress_ip'     => $_SERVER["REMOTE_ADDR"],
                    'langue'        => $this->myLanguage
                    
                );
                
                $idComment = $this->dbQI($data,'_dg_comments');
                
                // Mail Sender Notification
                $moduleInfo = $this->dbQS($this->getModule(),'_modules','uri');
                if (!empty($moduleInfo) && !empty($moduleInfo['notification_mail'])) {
                    
                    $_email = $this->configWeb['email'];
                    $_lg    = $this->configWeb['langue'];
                    $_sujet = '['.$this->getModule().'] '.$this->l("Vous avez un nouveau commentaire").' - ['.$idComment.']';
                    $_message   = "<br /> \n\r <br /> \n\r <b>".$data['url']."</b><br /> \n\r <br /> \n\r ".$data['comment']."<br /> \n\r <br /> \n\r <b>".$data['email'].' - '.$data['nom'].'</b>';
                    
                    new SendMailAlert($_email,$_sujet,$_message,$this);
                    
                }
            }
        }
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
    
    public function getHtmlWaitingPage() {
        
        $label      = $this->configWeb['title'];
        $content    = $this->configWeb['statut_tinymce'];
        
        $tplWantingPage = Template::getWebsiteView('waitingpage',$this->getTheme());
        ob_start(); if (is_file($tplWantingPage)) { include $tplWantingPage; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    
    public function getLastComments($count = 5) {
        
        $cLanguage = count($this->allLanguagesWebsite);
        
        $allComments = $this->dbQ("SELECT * FROM _dg_comments WHERE validation = 2 ORDER BY id LIMIT $count");
        
        $i = 0;
        $Comments = array();
        foreach($allComments as $Comment) {
            
            $Comments[$i]['author']  = $Comment['nom'];
            $Comments[$i]['url']     = URL.'?'.$Comment['uri_module'].'='.$Comment['uri_content'];
            $Comments[$i]['comment'] = $this->_truncate($Comment['comment'],50);

            if ($cLanguage > 1) {

                $Comments[$i]['url']     = URL.'t/'.$Comment['langue'].'/?'.$Comment['uri_module'].'='.$Comment['uri_content'];
            }
            
            $i++;
        
        }
        
        $tplComments = Template::getWebsiteView('widgets/comment_last',$this->getTheme());
        ob_start(); if (is_file($tplComments)) { include $tplComments; } $out = ob_get_clean();
        
        return $out;
        
    }
    
    public function getLastModuleContents($module , $count = 3, $catId = '') {
        
        $out = '';
        $iMaxDescription = 500;
        
        $nameTable      = '_m_'.$module;
        $nameTableTrad  = $nameTable.'_traduction';
        //echo $module;
        $isModule = $this->dbQS($module,'_modules','uri');
        $valActive = array("blog","news","video","image","sharedlinks");
        
        if (empty($isModule)) { 
            return '# Error Class doorgetsWebsite  line '.__LINE__; 
        }
        
        if (!in_array($isModule['type'],$valActive)) { 
            return '# Error Class doorgetsWebiste ['.$isModule['type'].'] line '.__LINE__; 
        }
        
        $catSql = '';
        if (!empty($catId) && is_numeric($catId)) {

            $catSql = " AND categorie LIKE '%".$catId.",%'";
        }
        
        if (!empty($isModule)) {
            
            $Contents = $this->dbQ("SELECT * FROM $nameTable WHERE active = 2 $catSql ORDER BY id DESC LIMIT $count");
            
            if (!empty($Contents)) {
                
                switch($isModule['type']) {
                    
                    case 'news':
                        
                        foreach($Contents as $k=>$content) {
                        
                            $lgTrad = unserialize($content['groupe_traduction']);
                            $Contents[$k]['groupe_traduction'] = $lgTrad;
                            $idLg = $Contents[$k]['groupe_traduction'][$this->myLanguage()];
                            
                            $isContent = $this->dbQS($idLg,$nameTableTrad);
                            $Contents[$k]['content_traduction'] = $isContent;
                            
                            $Contents[$k]['date'] = GetDate::in($Contents[$k]['date_creation'],2,$this->myLanguage);
                            
                            $Contents[$k]['article'] = html_entity_decode($Contents[$k]['content_traduction']['article_tinymce']);
                            $lenArticle = strlen($Contents[$k]['article']);
                            
                            if ($lenArticle > $iMaxDescription - 1) {

                                $Contents[$k]['article'] = substr(strip_tags($Contents[$k]['article']),0,$iMaxDescription).'...';
                            }
                        }
                        
                        $tplNews = Template::getWebsiteView('modules/news/news_last_contents',$this->getTheme());
                        ob_start(); if (is_file($tplNews)) { include $tplNews; } $out = ob_get_clean();
                        break;

                    case 'sharedlinks':
                        
                        foreach($Contents as $k=>$content) {
                        
                            $lgTrad = unserialize($content['groupe_traduction']);
                            $Contents[$k]['groupe_traduction'] = $lgTrad;
                            $idLg = $Contents[$k]['groupe_traduction'][$this->myLanguage()];
                            
                            $isContent = $this->dbQS($idLg,$nameTableTrad);
                            $Contents[$k]['content_traduction'] = $isContent;
                            
                            $Contents[$k]['date'] = GetDate::in($Contents[$k]['date_creation'],2,$this->myLanguage);
                            
                            $Contents[$k]['article'] = $Contents[$k]['content_traduction']['article_tinymce'];
                            
                        }
                        
                        $tplSharedlinks = Template::getWebsiteView('modules/sharedlinks/sharedlinks_last_contents',$this->getTheme());
                        ob_start(); if (is_file($tplSharedlinks)) { include $tplSharedlinks; } $out = ob_get_clean();
                        break;
                    
                    case 'blog':
                        
                        foreach($Contents as $k=>$content) {
                        
                            $lgTrad = unserialize($content['groupe_traduction']);
                            $Contents[$k]['groupe_traduction'] = $lgTrad;
                            $idLg = $Contents[$k]['groupe_traduction'][$this->myLanguage()];
                            
                            $isContent = $this->dbQS($idLg,$nameTableTrad);
                            $Contents[$k]['content_traduction'] = $isContent;
                            $Contents[$k]['image'] = $isContent['image'];
                            
                            $Contents[$k]['date'] = GetDate::in($Contents[$k]['date_creation'],2,$this->myLanguage);
                            
                            $Contents[$k]['article'] = html_entity_decode($Contents[$k]['content_traduction']['article_tinymce']);
                            $lenArticle = strlen($Contents[$k]['article']);
                            
                            if ($lenArticle > $iMaxDescription - 1) {

                                $Contents[$k]['article'] = substr(strip_tags($Contents[$k]['article']),0,$iMaxDescription).'...';
                            }
                        }
                        
                        $tplNews = Template::getWebsiteView('modules/blog/blog_last_contents',$this->getTheme());
                        ob_start(); if (is_file($tplNews)) { include $tplNews; } $out = ob_get_clean();
                        break;
                    
                    case 'video':
                        
                        foreach($Contents as $k=>$content) {
                        
                            $lgTrad = unserialize($content['groupe_traduction']);
                            $Contents[$k]['groupe_traduction'] = $lgTrad;
                            $idLg = $Contents[$k]['groupe_traduction'][$this->myLanguage()];
                            
                            $isContent = $this->dbQS($idLg,$nameTableTrad);
                            $Contents[$k]['content_traduction'] = $isContent;
                            
                            $Contents[$k]['date'] = GetDate::in($Contents[$k]['date_creation'],2,$this->myLanguage);
                            
                        }
                        
                        $tplVideo = Template::getWebsiteView('modules/video/video_last_contents',$this->getTheme());
                        ob_start(); if (is_file($tplVideo)) { include $tplVideo; } $out = ob_get_clean();
                        break;
                    
                    case 'image':
                        
                        foreach($Contents as $k=>$content) {
                        
                            $lgTrad = unserialize($content['groupe_traduction']);
                            $Contents[$k]['groupe_traduction'] = $lgTrad;
                            $idLg = $Contents[$k]['groupe_traduction'][$this->myLanguage()];
                            
                            $isContent = $this->dbQS($idLg,$nameTableTrad);
                            $Contents[$k]['content_traduction'] = $isContent;
                            
                            $Contents[$k]['date'] = GetDate::in($Contents[$k]['date_creation'],2,$this->myLanguage);
                            
                        }
                        
                        $tplImage = Template::getWebsiteView('modules/image/image_last_contents',$this->getTheme());
                        ob_start(); if (is_file($tplImage)) { include $tplImage; } $out = ob_get_clean();
                        break;
                }
                
            }
            
        }
        
        return $out;
    
    }
    
    public function getMediaUrl($uri = null) {

        $url = '';

        $typeFile["image/png"] = "data/upload/png/";
        $typeFile["image/jpeg"] = "data/upload/jpg/";
        $typeFile["image/gif"] = "data/upload/gif/";
        
        $typeFile["application/zip"] = "data/upload/zip/";
        $typeFile["application/x-zip-compressed"] = "data/upload/xzip/";
        $typeFile["application/pdf"] = "data/upload/pdf/";
        $typeFile["application/x-shockwave-flash"] = "data/upload/swf/";

        if (!is_null($uri)) {
            
            $isContent = $this->dbQS($uri,'_dg_files','uri');
            if (!empty($isContent)) {
                
                $groupeTraduction = @unserialize($isContent['groupe_traduction']);
                if (array_key_exists($this->myLanguage, $groupeTraduction)) {

                    $isContentTraduction = $this->dbQS($groupeTraduction[$this->myLanguage],'_dg_files_traduction');
                    if (!empty($isContentTraduction) && array_key_exists($isContent['type'], $typeFile)) {

                        $url = URL.$typeFile[$isContent['type']].$isContentTraduction['path'];
                    }
                }
            }
        }

        return $url;
    }

    public function getCurrentUrl(){

        $base_url = URL;
        $language = $this->myLanguage;
        $languages = $this->allLanguagesWebsite;

        if (count($languages) > 1) {
            $base_url = URL.'t/'.$this->myLanguage;
        }

        $currentPath = '';
        if ($this->type !== 'page') {

            $currentPath = $base_url.'/?'.$this->module;
            
            if ($this->position === 'content') {
                
                $isContent = $this->dbQS($this->content['id_content'],'_m_'.$this->getRealUri($this->module).'_traduction','id_content'," AND langue = '".$language."' LIMIT 1");
                if (!empty($isContent)) {
                    
                    $currentPath = $base_url.'/?'.$this->getRealUri($this->module).'='.$isContent['uri'];
                }
                
            }
            
            if ($this->position === 'category') {
                
                $isCategory = $this->dbQS($this->category['id_cat'],'_categories_traduction','id_cat'," AND langue = '".$language."' LIMIT 1");
                if (!empty($isCategory)) {
                    
                    $currentPath = $base_url.'/?doorgets='.$isCategory['uri'];
                }
                
            }
            
        }else{
            
            $currentPath =  $base_url.'/?'.$this->module;            
        }

        return $currentPath;
    }
    
    public function _convertTag($string) {
        
        $out = '';
        $convertArray = array(
            "\[url=([^\]]*)\](.*)\[\/url\]" => '<a href="$1" >$2</a>',
            "\[img=([^\]]*)\](.*)\[\/img\]" => '<img src="$1" alt="$2" />',
            "\[b\](.*?)\[\/b\]" => '<strong>$1</strong>',
            "\[li\](.*?)\[\/li\]" => '<li>$1</li>',
            "\[ul\](.*?)\[\/ul\]" => '<ul>$1</ul>',
            "\[h1\](.*?)\[\/h1\]" => '<h1>$1</h1>',
            "\[h2\](.*?)\[\/h2\]" => '<h2>$1</h2>',
            "\[h3\](.*?)\[\/h3\]" => '<h3>$1</h3>',
            "\[h4\](.*?)\[\/h4\]" => '<h4>$1</h4>',
            "\[br\/\]" => '<br />'
            
            
        );
        
        
        foreach($convertArray as $k=>$v) {
            
            $val = '/'.$k.'/i';
            $string = preg_replace($val,$v,$string);
            
        }
        
        return $string;
    }
    
    public function _convertMethod($string) {
        
        $stringToOut = $string;
        
        $autorizedMethod = array(
            "getLastModuleContents",
            "getLastComments",
            "getHtmlBlock",
            "getHtmlSitemap",
            "getHtmlNetwork",
            "getHtmlNewsletter",
            "getHtmlForm",
            "getMediaUrl"
        );
        
        $strStart = "{{!"; $strEnd = "!}}";
        $cExplode = explode("{{!",$string);
        unset($cExplode[0]);
        
        $count    = $cExplode;
        
        if (!empty($cExplode)) {

            foreach($cExplode as $Content) {
                
                $posStrEnd = strpos($Content,$strEnd);
                if ($posStrEnd !== false) {
                    
                    $nameMethod = substr($Content,0,$posStrEnd);
                    $eMethod = explode('/',$nameMethod);
                    $cMethod = count($eMethod);
                    
                    if ($cMethod === 1) {

                        if (method_exists($this,$eMethod[0]) && in_array($eMethod[0],$autorizedMethod)) {

                            $mehodContent = $this->$eMethod[0]();
                            $nameMethodSub = '{{!'.$eMethod[0].'!}}';
                            $stringToOut = str_ireplace($nameMethodSub,$mehodContent,$stringToOut);
                        }
                    }
                    if ($cMethod === 2) {
                        
                        if (method_exists($this,$eMethod[0]) && in_array($eMethod[0],$autorizedMethod)) {

                            $mehodContent = $this->$eMethod[0]($eMethod[1]);
                            $nameMethodSub = '{{!'.$eMethod[0].'/'.$eMethod[1].'!}}';
                            $stringToOut = str_ireplace($nameMethodSub,$mehodContent,$stringToOut);
                        }
                    }
                    if ($cMethod === 3) {
                        
                        if (method_exists($this,$eMethod[0]) && in_array($eMethod[0],$autorizedMethod)) {

                            $mehodContent = $this->$eMethod[0]($eMethod[1],$eMethod[2]);
                            $nameMethodSub = '{{!'.$eMethod[0].'/'.$eMethod[1].'/'.$eMethod[2].'!}}';
                            $stringToOut = str_ireplace($nameMethodSub,$mehodContent,$stringToOut);
                        }
                    }
                    
                    if ($cMethod === 4) {
                        
                        if (method_exists($this,$eMethod[0]) && in_array($eMethod[0],$autorizedMethod)) {

                            $mehodContent = $this->$eMethod[0]($eMethod[1],$eMethod[2],$eMethod[3]);
                            $nameMethodSub = '{{!'.$eMethod[0].'/'.$eMethod[1].'/'.$eMethod[2].'/'.$eMethod[3].'!}}';
                            $stringToOut = str_ireplace($nameMethodSub,$mehodContent,$stringToOut);
                        }
                    }
                }
            }
        }
        
        return $stringToOut;
    }

    public function __destruct() {
        
        parent::__destruct();

    }
    
}
