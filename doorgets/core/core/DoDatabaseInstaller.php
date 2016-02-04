<?php 

class DoDatabaseInstaller {

    public $doorGets;

    public function __construct(&$doorGets){
        $this->doorGets = $doorGets;
    }

	public function createPageInstance($name,$datas) {
                      
        $data['uri']                = $name;
        $data['id_user']            = 0;
        $data['id_groupe']          = 0;
        $data['active']             = 2;
        $data['date_creation']      = time();
        
        $id = $this->doorGets->dbQI($data,'_dg_page');
        
        $groupe_traduction = array();
        
        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
            
            $dataTraduction['titre']                = $datas['titre'];
            $dataTraduction['description']          = $datas['description'];
            $dataTraduction['uri_module']           = $name;
            $dataTraduction['id_content']           = $id;
            $dataTraduction['langue']               = $k;
            
            $dataTraduction['meta_titre']           = $datas['meta_titre'];
            $dataTraduction['meta_description']     = $datas['meta_description'];
            $dataTraduction['meta_keys']            = $datas['meta_keys'];
            
            $dataTraduction['meta_facebook_type']         = $datas['meta_facebook_type'];
            $dataTraduction['meta_facebook_titre']         = $datas['meta_facebook_titre'];
            $dataTraduction['meta_facebook_description']   = $datas['meta_facebook_description'];
            $dataTraduction['meta_facebook_image']         = $datas['meta_facebook_image'];

            $dataTraduction['meta_twitter_type']         = $datas['meta_twitter_type'];
            $dataTraduction['meta_twitter_titre']         = $datas['meta_twitter_titre'];
            $dataTraduction['meta_twitter_description']   = $datas['meta_twitter_description'];
            $dataTraduction['meta_twitter_image']         = $datas['meta_twitter_image'];
            $dataTraduction['meta_twitter_player']        = $datas['meta_twitter_player'];

            $dataTraduction['date_modification']    = time();
            
            $groupe_traduction[$k] = $this->doorGets->dbQI($dataTraduction,'_dg_page_traduction');
            
        }
        
        $data['groupe_traduction'] = @serialize($groupe_traduction);
        
        $this->doorGets->dbQU($id,$data,'_dg_page');
        
        
    }

    public function createOnepageInstance($name,$datas) {
                      
        $data['uri']                = $name;
        $data['id_user']            = 0;
        $data['id_groupe']          = 0;
        $data['active']             = 2;
        $data['date_creation']      = time();
        
        $id = $this->doorGets->dbQI($data,'_dg_onepage');
        
        $groupe_traduction = array();
        
        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
            
            $dataTraduction['titre']                = $datas['titre'];
            $dataTraduction['description']          = $datas['description'];
            $dataTraduction['uri_module']           = $name;
            $dataTraduction['id_content']           = $id;
            $dataTraduction['langue']               = $k;
            
            $dataTraduction['meta_titre']           = $datas['meta_titre'];
            $dataTraduction['meta_description']     = $datas['meta_description'];
            $dataTraduction['meta_keys']            = $datas['meta_keys'];
            
            $dataTraduction['meta_facebook_type']         = $datas['meta_facebook_type'];
            $dataTraduction['meta_facebook_titre']         = $datas['meta_facebook_titre'];
            $dataTraduction['meta_facebook_description']   = $datas['meta_facebook_description'];
            $dataTraduction['meta_facebook_image']         = $datas['meta_facebook_image'];

            $dataTraduction['meta_twitter_type']         = $datas['meta_twitter_type'];
            $dataTraduction['meta_twitter_titre']         = $datas['meta_twitter_titre'];
            $dataTraduction['meta_twitter_description']   = $datas['meta_twitter_description'];
            $dataTraduction['meta_twitter_image']         = $datas['meta_twitter_image'];
            $dataTraduction['meta_twitter_player']        = $datas['meta_twitter_player'];

            $dataTraduction['date_modification']    = time();
            
            $groupe_traduction[$k] = $this->doorGets->dbQI($dataTraduction,'_dg_onepage_traduction');
            
        }
        
        $data['groupe_traduction'] = @serialize($groupe_traduction);
        
        $this->doorGets->dbQU($id,$data,'_dg_onepage');
        
        
    }
    
    public function createCarouselInstance($name,$title) {
             
       $data['uri']                = $name;
       $data['id_user']            = 0;
       $data['id_groupe']          = 0;
       $data['date_creation']      = time();
       
       $iCrud = new Langue();
       $id = $iCrud->dbQI($data,'_dg_carousel');
       
       $groupe_traduction = array();
       
       $contentCarousel = serialize(array());
       
       foreach($this->doorGets->getAllLanguages() as $k=>$v) {
           
           $dataTraduction['titre']                = $title;
           $dataTraduction['uri_module']           = $name;
           $dataTraduction['id_carousel']          = $id;
           $dataTraduction['langue']               = $k;
           $dataTraduction['article_tinymce']      = $contentCarousel;
           $dataTraduction['date_modification']    = time();
           
           $groupe_traduction[$k] = $iCrud->dbQI($dataTraduction,'_dg_carousel_traduction');
           
       }
       
       $data['groupe_traduction'] = @serialize($groupe_traduction);
       
       $iCrud->dbQU($id,$data,'_dg_carousel');
       
       
    }

    public function createBlockInstance($name,$title) {
              
        $data['uri']                = $name;
        $data['id_user']            = 0;
        $data['id_groupe']          = 0;
        $data['date_creation']      = time();
        
        $id = $this->doorGets->dbQI($data,'_dg_block');
        
        $groupe_traduction = array();
        
        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
            
            $dataTraduction['titre']                = $title;
            $dataTraduction['uri_module']           = $name;
            $dataTraduction['id_block']             = $id;
            $dataTraduction['langue']               = $k;
            $dataTraduction['date_modification']    = time();
            
            $groupe_traduction[$k] = $this->doorGets->dbQI($dataTraduction,'_dg_block_traduction');
            
        }
        
        $data['groupe_traduction'] = @serialize($groupe_traduction);
        
        $this->doorGets->dbQU($id,$data,'_dg_block');
        
        
    }

    public function createSurveyInstance($name,$title) {
              
        $data['uri']                = $name;
        $data['id_user']            = 0;
        $data['id_groupe']          = 0;
        $data['date_creation']      = time();
        
        $id = $this->doorGets->dbQI($data,'_dg_survey');
        
        $groupe_traduction = array();
        
        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
            
            $dataTraduction['titre']                = $title;
            $dataTraduction['uri_module']           = $name;
            $dataTraduction['id_survey']            = $id;
            $dataTraduction['langue']               = $k;
            $dataTraduction['date_modification']    = time();
            
            $groupe_traduction[$k] = $this->doorGets->dbQI($dataTraduction,'_dg_survey_traduction');
            
        }
        
        $data['groupe_traduction'] = @serialize($groupe_traduction);
        
        $this->doorGets->dbQU($id,$data,'_dg_survey');
        
        
    }
    
    
    public function createGenformInstance($name,$datagenform) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $data = $this->doorGets->_getGenFormFields($datagenform);
        
        
        $nameGenform = '_m_'.$name;
        
        $out = "
        CREATE TABLE IF NOT EXISTS $nameGenform (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            ";
        if (!empty($data)) {
            foreach($data as $k=>$v) {
                $k = str_replace('-','_',$k);
                switch($v['type']) {
                    case 'textarea':
                        $out .= "`".$k."` text,";
                        break;
                    default:
                        $out .= "`".$k."` varchar(255) DEFAULT NULL,";
                }
                
            }
        }
        $out .= "
            `codechallenge` varchar(255) DEFAULT NULL,
            `adresse_ip` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB";
        
        return $out;
        
    }
    
    public function createLinkInstance($name) {
        
        $data['uri_module']         = $name;
        $data['date_creation']      = time();
        $data['date_modification']  = time();
        
        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
            $data['label']   = 'doorGets '.$k;
            $data['link']    = 'http://www.doorgets.com/t/'.$k;
            $data['langue']  = $k;
            $this->doorGets->dbQI($data,'_dg_links');
            
        }
        
    }
    
    
    
    public function createSqlMultipage($name) {
          
        $name = $this->doorGets->getRealUri($name);
        
        $namePage = '_m_'.$name;
        $namePageTrad = '_m_'.$name.'_traduction';
        $namePageVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$namePage`;
        CREATE TABLE IF NOT EXISTS $namePage (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$namePage` ADD INDEX (pseudo);
        ALTER TABLE `$namePage` ADD INDEX (id_user);
        ALTER TABLE `$namePage` ADD INDEX (id_groupe);
        ALTER TABLE `$namePage` ADD INDEX (active);
        ALTER TABLE `$namePage` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$namePageTrad`;
        CREATE TABLE IF NOT EXISTS $namePageTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$namePageTrad` ADD INDEX (uri(70));
        ALTER TABLE `$namePageTrad` ADD INDEX (id_content);
        ALTER TABLE `$namePageTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$namePageVersion`;
        CREATE TABLE IF NOT EXISTS $namePageVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$namePageVersion` ADD INDEX (id_content);
        ALTER TABLE `$namePageVersion` ADD INDEX (uri(70));
        ALTER TABLE `$namePageVersion` ADD INDEX (pseudo);
        ALTER TABLE `$namePageVersion` ADD INDEX (id_user);
        ALTER TABLE `$namePageVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$namePageVersion` ADD INDEX (langue);
        ALTER TABLE `$namePageVersion` ADD INDEX (active);

        ";
        
        return $out;
    
    }

    public function createSqlNews($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameNews = '_m_'.$name;
        $nameNewsTrad = '_m_'.$name.'_traduction';
        $nameNewsVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameNews`;
        CREATE TABLE IF NOT EXISTS $nameNews (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `author_badge` int(11) NOT NULL DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL DEFAULT '0',
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `date_start` int(11) DEFAULT NULL,
            `date_end` int(11) DEFAULT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameNews` ADD INDEX (pseudo);
        ALTER TABLE `$nameNews` ADD INDEX (id_user);
        ALTER TABLE `$nameNews` ADD INDEX (id_groupe);
        ALTER TABLE `$nameNews` ADD INDEX (active);
        ALTER TABLE `$nameNews` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$nameNewsTrad`;
        CREATE TABLE IF NOT EXISTS $nameNewsTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameNewsTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameNewsTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameNewsTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameNewsVersion`;
        CREATE TABLE IF NOT EXISTS $nameNewsVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameNewsVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameNewsVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameNewsVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameNewsVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameNewsVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameNewsVersion` ADD INDEX (langue);
        ALTER TABLE `$nameNewsVersion` ADD INDEX (active);

        ";
        
        return $out;
        
    }

    public function createSqlSharedlinks($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameSharedlinks = '_m_'.$name;
        $nameSharedlinksTrad = '_m_'.$name.'_traduction';
        $nameSharedlinksVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameSharedlinks`;
        CREATE TABLE IF NOT EXISTS $nameSharedlinks (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `rating` int(11) DEFAULT '0',
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `author_badge` int(11) NOT NULL DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `date_start` int(11) DEFAULT NULL,
            `date_end` int(11) DEFAULT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameSharedlinks` ADD INDEX (pseudo);
        ALTER TABLE `$nameSharedlinks` ADD INDEX (id_user);
        ALTER TABLE `$nameSharedlinks` ADD INDEX (id_groupe);
        ALTER TABLE `$nameSharedlinks` ADD INDEX (ordre);
        ALTER TABLE `$nameSharedlinks` ADD INDEX (active);

        DROP TABLE IF EXISTS `$nameSharedlinksTrad`;
        CREATE TABLE IF NOT EXISTS $nameSharedlinksTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `url` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameSharedlinksTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameSharedlinksTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameSharedlinksTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameSharedlinksVersion`;
        CREATE TABLE IF NOT EXISTS $nameSharedlinksVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `rating` int(11) DEFAULT '0',
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `url` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (langue);
        ALTER TABLE `$nameSharedlinksVersion` ADD INDEX (active);

        ";
        
        return $out;
        
    }
    
    public function createSqlBlog($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameBlog = '_m_'.$name;
        $nameBlogTrad = '_m_'.$name.'_traduction';
        $nameBlogVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameBlog`;
        CREATE TABLE IF NOT EXISTS $nameBlog (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(20) DEFAULT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `author_badge` int(11) NOT NULL DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `date_start` int(11) DEFAULT NULL,
            `date_end` int(11) DEFAULT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameBlog` ADD INDEX (pseudo);
        ALTER TABLE `$nameBlog` ADD INDEX (id_user);
        ALTER TABLE `$nameBlog` ADD INDEX (id_groupe);
        ALTER TABLE `$nameBlog` ADD INDEX (active);
        ALTER TABLE `$nameBlog` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$nameBlogTrad`;
        CREATE TABLE IF NOT EXISTS $nameBlogTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL,
            `langue` varchar(5) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) UNIQUE,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameBlogTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameBlogTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameBlogTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameBlogVersion`;
        CREATE TABLE IF NOT EXISTS $nameBlogVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameBlogVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameBlogVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameBlogVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameBlogVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameBlogVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameBlogVersion` ADD INDEX (langue);
        ALTER TABLE `$nameBlogVersion` ADD INDEX (active);
        
        ";
        
        return $out;
        
    }

    public function createSqlShop($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameShop = '_m_'.$name;
        $nameShopTrad = '_m_'.$name.'_traduction';
        $nameShopVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameShop`;
        CREATE TABLE IF NOT EXISTS $nameShop (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `product_type` varchar(255) DEFAULT 'simple',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `id_taxe` int(11) DEFAULT '0',
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `code` varchar(255) DEFAULT NULL, 
            `code_ean` varchar(255) DEFAULT NULL, 
            `code_upc` varchar(255) DEFAULT NULL, 
            `author_badge` int(11) NOT NULL DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL DEFAULT '0',
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `date_start` int(11) DEFAULT NULL,
            `date_end` int(11) DEFAULT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameShop` ADD INDEX (pseudo);
        ALTER TABLE `$nameShop` ADD INDEX (id_user);
        ALTER TABLE `$nameShop` ADD INDEX (id_groupe);
        ALTER TABLE `$nameShop` ADD INDEX (active);
        ALTER TABLE `$nameShop` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$nameShopTrad`;
        CREATE TABLE IF NOT EXISTS $nameShopTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `id_file` int(11) NOT NULL DEFAULT '0',
            `id_supplier` int(11) NOT NULL DEFAULT '0',
            `is_free` int(11) NOT NULL DEFAULT '0',
            `external_link` varchar(255) DEFAULT NULL,
            `slice_unit` varchar(255) DEFAULT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL, 
            `buying_price` decimal(7,2) DEFAULT '0.00', 
            `price` decimal(7,2) DEFAULT '0.00',
            `quantity_cart` int(11) DEFAULT '0',
            `quantity_order` int(11) DEFAULT '0',
            `quantity_back` int(11) DEFAULT '0',
            `quantity_stock` int(11) DEFAULT '0',
            `quantity_limit` int(11) DEFAULT '0', 
            `quantity_nostock` int(11) DEFAULT '0', 
            `quantity_action` varchar(255) DEFAULT NULL, 
            `quantity_action_value` varchar(255) DEFAULT NULL, 
            `opt_sale` int(11) DEFAULT '1', 
            `opt_show_price` int(11) DEFAULT '1',
            `opt_only_web` int(11) DEFAULT '0', 
            `promotion_active` int(11) DEFAULT '1',
            `promotion_code_active` int(11) DEFAULT '1',
            `short_description_tinymce` text, 
            `tags` text,
            `article_tinymce` text, 
            `titre` varchar(255) DEFAULT NULL,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameShopTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameShopTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameShopTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameShopVersion`;
        CREATE TABLE IF NOT EXISTS $nameShopVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `id_file` int(11) NOT NULL DEFAULT '0',
            `id_supplier` int(11) NOT NULL DEFAULT '0',
            `is_free` int(11) NOT NULL DEFAULT '0',
            `external_link` varchar(255) DEFAULT NULL,
            `slice_unit` varchar(255) DEFAULT NULL,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `type` varchar(255) NOT NULL DEFAULT 'simple',
            `active` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL,
            `code` varchar(255) DEFAULT NULL, 
            `code_ean` varchar(255) DEFAULT NULL, 
            `code_upc` varchar(255) DEFAULT NULL, 
            `buying_price` decimal(7,2) DEFAULT '0.00', 
            `price` decimal(7,2) DEFAULT '0.00', 
            `quantity_cart` int(11) DEFAULT '0',
            `quantity_order` int(11) DEFAULT '0',
            `quantity_back` int(11) DEFAULT '0',
            `quantity_stock` int(11) DEFAULT '0',
            `quantity_limit` int(11) DEFAULT '0', 
            `quantity_nostock` int(11) DEFAULT '0', 
            `quantity_action` varchar(255) DEFAULT NULL, 
            `quantity_action_value` varchar(255) DEFAULT NULL, 
            `opt_sale` int(11) DEFAULT '1', 
            `opt_show_price` int(11) DEFAULT '1',
            `opt_only_web` int(11) DEFAULT '0', 
            `promotion_active` int(11) DEFAULT '1',
            `promotion_code_active` int(11) DEFAULT '1',
            `short_description_tinymce` text, 
            `tags` text,
            `article_tinymce` text, 
            `titre` varchar(255) DEFAULT NULL,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameShopVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameShopVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameShopVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameShopVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameShopVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameShopVersion` ADD INDEX (langue);
        ALTER TABLE `$nameShopVersion` ADD INDEX (active);

        ";
        
        return $out;
        
    }
    
    public function createSqlVideo($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameVideo = '_m_'.$name;
        $nameVideoTrad = '_m_'.$name.'_traduction';
        $nameVideoVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameVideo`;
        CREATE TABLE IF NOT EXISTS $nameVideo (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `author_badge` int(11) NOT NULL DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `date_start` int(11) DEFAULT NULL,
            `date_end` int(11) DEFAULT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameVideo` ADD INDEX (pseudo);
        ALTER TABLE `$nameVideo` ADD INDEX (id_user);
        ALTER TABLE `$nameVideo` ADD INDEX (id_groupe);
        ALTER TABLE `$nameVideo` ADD INDEX (ordre);
        ALTER TABLE `$nameVideo` ADD INDEX (active);

        DROP TABLE IF EXISTS `$nameVideoTrad`;
        CREATE TABLE IF NOT EXISTS $nameVideoTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `youtube` varchar(255) DEFAULT NULL,
            `temps` int(11) NOT NULL DEFAULT '1',
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameVideoTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameVideoTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameVideoTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameVideoVersion`;
        CREATE TABLE IF NOT EXISTS $nameVideoVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `youtube` varchar(255) DEFAULT NULL,
            `temps` int(11) NOT NULL DEFAULT '1',
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameVideoVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameVideoVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameVideoVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameVideoVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameVideoVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameVideoVersion` ADD INDEX (langue);
        ALTER TABLE `$nameVideoVersion` ADD INDEX (active);

        ";
        
        return $out;
        
    }
    
    public function createSqlImage($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameImage = '_m_'.$name;
        $nameImageTrad = '_m_'.$name.'_traduction';
        $nameImageVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameImage`;
        CREATE TABLE IF NOT EXISTS $nameImage (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `stars` int(11) DEFAULT '0',
            `stars_count` int(11) DEFAULT '0',
            `author_badge` int(11) NOT NULL DEFAULT '0',
            `comments` int(11) NOT NULL DEFAULT '0',
            `partage` int(11) NOT NULL DEFAULT '1',
            `facebook` int(11) DEFAULT '0',
            `id_facebook` varchar(255) DEFAULT NULL,
            `disqus` int(11) DEFAULT '0',
            `id_disqus` varchar(255) DEFAULT NULL,
            `mailsender` int(11) DEFAULT '0',
            `sendto` varchar(255) DEFAULT NULL,
            `in_rss` int(11) NOT NULL DEFAULT '0',
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            `id_modo` int(111) DEFAULT NULL,
            `val_modo` int(11) DEFAULT '0',
            `date_modo` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameImage` ADD INDEX (pseudo);
        ALTER TABLE `$nameImage` ADD INDEX (id_user);
        ALTER TABLE `$nameImage` ADD INDEX (id_groupe);
        ALTER TABLE `$nameImage` ADD INDEX (active);
        ALTER TABLE `$nameImage` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$nameImageTrad`;
        CREATE TABLE IF NOT EXISTS $nameImageTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `langue` varchar(5) DEFAULT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameImageTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameImageTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameImageTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameImageVersion`;
        CREATE TABLE IF NOT EXISTS $nameImageVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) NOT NULL DEFAULT '0',
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `categorie` varchar(255) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `description` text,
            `tags` text,
            `article_tinymce` text,
            `uri` varchar(255) DEFAULT NULL,
            `image_gallery` text,
            `meta_titre` varchar(255) DEFAULT NULL,
            `meta_description` varchar(255) DEFAULT NULL,
            `meta_keys` varchar(255) DEFAULT NULL,
            `meta_facebook_type` varchar(255) DEFAULT NULL,
            `meta_facebook_titre` varchar(255) DEFAULT NULL,
            `meta_facebook_description` varchar(255) DEFAULT NULL,
            `meta_facebook_image` varchar(255) DEFAULT NULL,
            `meta_twitter_type` varchar(255) DEFAULT NULL,
            `meta_twitter_titre` varchar(255) DEFAULT NULL,
            `meta_twitter_description` varchar(255) DEFAULT NULL,
            `meta_twitter_image` varchar(255) DEFAULT NULL,
            `meta_twitter_player` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameImageVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameImageVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameImageVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameImageVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameImageVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameImageVersion` ADD INDEX (langue);
        ALTER TABLE `$nameImageVersion` ADD INDEX (active);
        ";
        
        return $out;
        
    }
    
    public function createSqlFaq($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $nameFaq = '_m_'.$name;
        $nameFaqTrad = '_m_'.$name.'_traduction';
        $nameFaqVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$nameFaq`;
        CREATE TABLE IF NOT EXISTS $nameFaq (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `active` int(11) NOT NULL,
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)  
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameFaq` ADD INDEX (pseudo);
        ALTER TABLE `$nameFaq` ADD INDEX (id_user);
        ALTER TABLE `$nameFaq` ADD INDEX (id_groupe);
        ALTER TABLE `$nameFaq` ADD INDEX (active);
        ALTER TABLE `$nameFaq` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$nameFaqTrad`;
        CREATE TABLE IF NOT EXISTS $nameFaqTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) DEFAULT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `uri` varchar(255) DEFAULT NULL,
            `question` text,
            `reponse_tinymce` text,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$nameFaqTrad` ADD INDEX (uri(70));
        ALTER TABLE `$nameFaqTrad` ADD INDEX (id_content);
        ALTER TABLE `$nameFaqTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$nameFaqVersion`;
        CREATE TABLE IF NOT EXISTS $nameFaqVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) DEFAULT NULL,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `uri` varchar(255) DEFAULT NULL,
            `question` text,
            `reponse_tinymce` text,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;

        ALTER TABLE `$nameFaqVersion` ADD INDEX (id_content);
        ALTER TABLE `$nameFaqVersion` ADD INDEX (uri(70));
        ALTER TABLE `$nameFaqVersion` ADD INDEX (pseudo);
        ALTER TABLE `$nameFaqVersion` ADD INDEX (id_user);
        ALTER TABLE `$nameFaqVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$nameFaqVersion` ADD INDEX (langue);
        ALTER TABLE `$nameFaqVersion` ADD INDEX (active);
        ";
        
        return $out;
        
    }
    
    public function createSqlPartner($name) {
              
        $name = $this->doorGets->getRealUri($name);
        
        $namePartner = '_m_'.$name;
        $namePartnerTrad = '_m_'.$name.'_traduction';
        $namePartnerVersion = '_m_'.$name.'_version';
        
        $out = "
        DROP TABLE IF EXISTS `$namePartner`;
        CREATE TABLE IF NOT EXISTS $namePartner (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `active` int(11) NOT NULL,
            `ordre` int(11) NOT NULL,
            `groupe_traduction` text,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$namePartner` ADD INDEX (pseudo);
        ALTER TABLE `$namePartner` ADD INDEX (id_user);
        ALTER TABLE `$namePartner` ADD INDEX (id_groupe);
        ALTER TABLE `$namePartner` ADD INDEX (active);
        ALTER TABLE `$namePartner` ADD INDEX (ordre);

        DROP TABLE IF EXISTS `$namePartnerTrad`;
        CREATE TABLE IF NOT EXISTS $namePartnerTrad (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) DEFAULT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `image` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `url` varchar(255) DEFAULT NULL,
            `description` text,
            `date_modification` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$namePartnerTrad` ADD INDEX (id_content);
        ALTER TABLE `$namePartnerTrad` ADD INDEX (langue);

        DROP TABLE IF EXISTS `$namePartnerVersion`;
        CREATE TABLE IF NOT EXISTS $namePartnerVersion (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_content` int(11) DEFAULT NULL,
            `pseudo` varchar(255) NOT NULL,
            `id_user` int(11) NOT NULL,
            `id_groupe` int(11) NOT NULL,
            `langue` varchar(5) DEFAULT NULL,
            `active` int(11) NOT NULL,
            `image` varchar(255) DEFAULT NULL,
            `titre` varchar(255) DEFAULT NULL,
            `url` varchar(255) DEFAULT NULL,
            `description` text,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;
        
        ALTER TABLE `$namePartnerVersion` ADD INDEX (id_content);
        ALTER TABLE `$namePartnerVersion` ADD INDEX (pseudo);
        ALTER TABLE `$namePartnerVersion` ADD INDEX (id_user);
        ALTER TABLE `$namePartnerVersion` ADD INDEX (id_groupe);
        ALTER TABLE `$namePartnerVersion` ADD INDEX (langue);
        ALTER TABLE `$namePartnerVersion` ADD INDEX (active);
        ";
        
        return $out;
        
    }

    public function createSqlGenform($name,$datagenform) {
        
        $data = $this->doorGets->_getGenFormFields($datagenform);
        
        if (empty($data)) {return '';}
        
        $nameGenform = '_m_'.$name;
        
        $out = "
        DROP TABLE IF EXISTS `$nameGenform`;
        
        CREATE TABLE IF NOT EXISTS `$nameGenform` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            ";
            
        foreach($data as $k=>$v) {
            $k = str_replace('-','_',$k);
            switch($v['type']) {
                case 'textarea':
                    $out .= "`".$k."` text,";
                    break;
                default:
                    $out .= "`".$k."` varchar(255) DEFAULT NULL,";
            }
            
        }
            
        $out .= "
            `codechallenge` varchar(255) DEFAULT NULL,
            `adresse_ip` varchar(255) DEFAULT NULL,
            `date_creation` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ;";
        
        
        return $out;
        
    }
}