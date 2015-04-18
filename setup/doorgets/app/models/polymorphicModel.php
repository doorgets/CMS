<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 6.0 - 20, February 2014
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
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

class polymorphicModel extends doorgetsModel{
    
    public function __construct($doorgets){
        
        parent::__construct($doorgets);
        
    }
    
    public function indexAction(){
        
        $actionName = $this->doorgets->getStep();
        
        $form = $this->doorgets->form['doorgets_'.$actionName]  = new Formulaire('doorgets_'.$actionName);
        
        if( !empty($form->i) && empty($form->e) )
        {
            
            $isCreatedQuery = $this->installDatabase();
            $this->extractDoorgets();
            $z = $this->loadConfig();
            if($isCreatedQuery){
                
                $this->destroy_dir(BASE);
                $this->_doorgets($z['k'],$z['u'],$z['v'],$z['e']);
                
                $urlRedic = $_SERVER['REQUEST_URI'];
                $urlRedic = str_replace('index.php','',$urlRedic);
                // redirection vers le panel administrateur
                header("Location:".$urlRedic.'dg-admin/');
                exit();
                
            }
            
        }
    }
    
    public function installDatabase(){
        
        $fileTempAdmin = BASE.'temp/admin.php';
        if(is_file($fileTempAdmin)){
            
            $cFile = file_get_contents($fileTempAdmin);
            $cOutFile = unserialize($cFile);
            
            $adm_email = $cOutFile['email'];
            
        }
        
        $sql_query = "
        
            
            DROP TABLE IF EXISTS `_dg_block`;
            CREATE TABLE IF NOT EXISTS `_dg_block` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `uri` varchar(255) DEFAULT NULL,
                `groupe_traduction` text,
                `date_creation` int(11) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                `id_user` int(11) DEFAULT NULL,
                `id_groupe` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_block_traduction`;
            CREATE TABLE IF NOT EXISTS `_dg_block_traduction` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_block` int(11) DEFAULT NULL,
                `uri_module` varchar(255) DEFAULT NULL,
                `langue` varchar(255) DEFAULT NULL,
                `titre` varchar(255) DEFAULT NULL,
                `description` varchar(255) DEFAULT NULL,
                `article_tinymce` text,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            
            DROP TABLE IF EXISTS `_dg_inbox`;
            CREATE TABLE IF NOT EXISTS `_dg_inbox` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `uri_module` varchar(255) DEFAULT NULL,
                `sujet` varchar(255) NOT NULL,
                `nom` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `message` text,
                `telephone` varchar(255) DEFAULT NULL,
                `lu` int(11) NOT NULL DEFAULT '0',
                `archive` int(11) NOT NULL DEFAULT '0',
                `date_creation` int(11) NOT NULL DEFAULT '0',
                `date_archive` int(11) NOT NULL DEFAULT '0',
                `date_lu` int(11) NOT NULL DEFAULT '0',
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_links`;
            CREATE TABLE IF NOT EXISTS `_dg_links` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `langue` varchar(255) DEFAULT NULL,
                `uri_module` varchar(255) DEFAULT NULL,
                `label` varchar(255) DEFAULT NULL,
                `link` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_newsletter_emailling_campagne`;
            CREATE TABLE IF NOT EXISTS `_dg_newsletter_emailling_campagne` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_groupe` int(11) NOT NULL,
                `id_models` int(11) NOT NULL,
                `statut` varchar(255) NOT NULL,
                `titre` text NOT NULL,
                `description` text NOT NULL,
                `message` text,
                `date_creation` int(11) NOT NULL,
                `date_modification` int(11) DEFAULT NULL,
                `date_envoi` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_newsletter_emailling_groupe`;
            CREATE TABLE IF NOT EXISTS `_dg_newsletter_emailling_groupe` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `titre` varchar(255) DEFAULT NULL,
                `description` text NOT NULL,
                `date_creation` int(11) NOT NULL,
                `date_modification` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_newsletter_emailling_models`;
            CREATE TABLE IF NOT EXISTS `_dg_newsletter_emailling_models` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `titre` varchar(255) DEFAULT NULL,
                `description` text,
                `langue` varchar(255) DEFAULT NULL,
                `format` varchar(255) DEFAULT NULL,
                `sujet` varchar(255) DEFAULT NULL,
                `article_tinymce` text,
                `date_creation` int(11) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_newsletter`;
            CREATE TABLE IF NOT EXISTS `_dg_newsletter` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_user` int(11) NOT NULL DEFAULT '0',
                `id_groupe` int(11) NOT NULL DEFAULT '0',
                `nom` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `description` text,
                `newsletter` int(11) DEFAULT '1',
                `client_ip` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_page`;
            CREATE TABLE IF NOT EXISTS `_dg_page` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_user` int(11) DEFAULT '0',
                `id_groupe` int(11) DEFAULT '0',
                `uri` varchar(255) DEFAULT NULL,
                `active` int(11) NOT NULL DEFAULT '0',
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
                `date_creation` int(11) DEFAULT NULL,
                `id_modo` int(111) DEFAULT NULL,
                `val_modo` int(11) DEFAULT '0',
                `date_modo` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_page_traduction`;
            CREATE TABLE IF NOT EXISTS `_dg_page_traduction` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_content` int(11) NOT NULL DEFAULT '0',
                `langue` varchar(255) DEFAULT NULL,
                `titre` varchar(255) DEFAULT NULL,
                `description` text,
                `article_tinymce` text,
                `uri` varchar(255) DEFAULT NULL,
                `uri_module` varchar(255) DEFAULT NULL,
                `meta_titre` varchar(255) DEFAULT NULL,
                `meta_description` varchar(255) DEFAULT NULL,
                `meta_keys` varchar(255) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_files`;
            CREATE TABLE IF NOT EXISTS `_dg_files` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_user` int(11) DEFAULT '0',
                `id_groupe` int(11) DEFAULT '0',
                `type` varchar(255) NOT NULL,
                `nom` varchar(255) DEFAULT NULL,
                `description` text,
                `fichier` varchar(255) DEFAULT NULL,
                `poid` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_categories`;
            CREATE TABLE IF NOT EXISTS `_categories` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `uri_module` varchar(255) DEFAULT NULL,
                `groupe_traduction` text,
                `ordre` int(11) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_categories_traduction`;
            CREATE TABLE IF NOT EXISTS `_categories_traduction` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_cat` int(11) NOT NULL DEFAULT '0',
                `langue` varchar(10) NOT NULL DEFAULT 'fr',
                `nom` varchar(255) DEFAULT NULL,
                `titre` varchar(255) DEFAULT NULL,
                `description` text,
                `uri` varchar(255) DEFAULT NULL,
                `meta_titre` varchar(255) DEFAULT NULL,
                `meta_description` varchar(255) DEFAULT NULL,
                `meta_keys` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_dg_comments`;   
            CREATE TABLE IF NOT EXISTS `_dg_comments` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_user` int(11) DEFAULT '0',
                `id_groupe` int(11) DEFAULT '0',
                `uri_module` varchar(255) DEFAULT NULL,
                `uri_content` varchar(255) DEFAULT NULL,
                `nom` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `url` varchar(255) DEFAULT NULL,
                `comment` text,
                `lu` int(11) NOT NULL DEFAULT '0',
                `archive` int(11) NOT NULL DEFAULT '0',
                `date_creation` int(11) DEFAULT NULL,
                `validation` int(11) DEFAULT '0',
                `date_validation` int(11) DEFAULT '0',
                `date_archive` int(11) NOT NULL DEFAULT '0',
                `adress_ip` varchar(255) DEFAULT NULL,
                `langue` varchar(255) DEFAULT 'en',
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_modules`; 
            CREATE TABLE IF NOT EXISTS `_modules` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `type` varchar(255) DEFAULT NULL,
                `uri` varchar(255) DEFAULT NULL,
                `active` int(11) DEFAULT '1',
                `is_first` int(11) DEFAULT '0',
                `plugins` text,
                `groupe_traduction` text,
                `bynum` int(11) DEFAULT '10',
                `avoiraussi` int(11) NOT NULL DEFAULT '3',
                `image` varchar(255) DEFAULT NULL,
                `template_index` varchar(255) DEFAULT NULL,
                `template_content` varchar(255) DEFAULT NULL,
                `notification_mail` int(11) NOT NULL DEFAULT '1',
                `extras` text,
                `redirection` varchar(255) DEFAULT NULL,
                `recaptcha` int(11) NOT NULL DEFAULT '0',
                `date_creation` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_modules_traduction`;
            CREATE TABLE IF NOT EXISTS `_modules_traduction` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_module` int(11) DEFAULT NULL,
                `langue` varchar(255) DEFAULT NULL,
                `nom` varchar(255) DEFAULT NULL,
                `titre` varchar(255) DEFAULT NULL,
                `description` text,
                `send_mail_to` varchar(255) DEFAULT NULL,
                `top_tinymce` text,
                `bottom_tinymce` text,
                `extras` text,
                `send_mail_user` varchar(255) DEFAULT NULL,
                `send_mail_name` varchar(255) DEFAULT NULL,
                `send_mail_email` varchar(255) DEFAULT NULL,
                `send_mail_sujet` varchar(255) DEFAULT NULL,
                `send_mail_message` text,
                `meta_titre` varchar(255) DEFAULT NULL,
                `meta_description` varchar(255) DEFAULT NULL,
                `meta_keys` varchar(255) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_rubrique`;
            CREATE TABLE IF NOT EXISTS `_rubrique` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(220) DEFAULT NULL,
                `ordre` int(11) DEFAULT NULL,
                `idModule` int(11) NOT NULL DEFAULT '0',
                `idParent` int(11) DEFAULT '0',
                `showinmenu` int(11) DEFAULT '1',
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_rubrique_users`;
            CREATE TABLE IF NOT EXISTS `_rubrique_users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(220) DEFAULT NULL,
                `ordre` int(11) DEFAULT NULL,
                `idModule` int(11) NOT NULL DEFAULT '0',
                `idParent` int(11) DEFAULT '0',
                `showinmenu` int(11) DEFAULT '1',
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_users`;
            CREATE TABLE IF NOT EXISTS `_users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `login` varchar(255) DEFAULT NULL,
                `password` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_users_groupes`;
            CREATE TABLE IF NOT EXISTS `_users_groupes` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `title` varchar(255) DEFAULT NULL,
                `description` text,
                `liste_module` text,
                `liste_module_limit` text,
                `liste_module_modo` text,
                `liste_module_interne` text,
                `liste_module_interne_modo` text,
                `liste_enfant` text,
                `liste_enfant_modo` text,
                `liste_parent` text,
                `can_subscribe` int(11) DEFAULT '1',
                `date_creation` int(255) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_users_info`;
            CREATE TABLE IF NOT EXISTS `_users_info` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `active` int(11) DEFAULT '0',
                `id_user` int(11) DEFAULT NULL,
                `langue` varchar(255) DEFAULT NULL,
                `network` int(11) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `pseudo` varchar(255) DEFAULT NULL,
                `last_name` varchar(255) DEFAULT NULL,
                `first_name` varchar(255) DEFAULT NULL,
                `description` text,
                `horaire` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_users_notification`;
            CREATE TABLE IF NOT EXISTS `_users_notification` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_user` int(11) DEFAULT NULL,
                `id_session` varchar(255) DEFAULT NULL,
                `ip_session` varchar(255) DEFAULT NULL,
                `url_page` varchar(255) DEFAULT NULL,
                `url_referer` varchar(255) DEFAULT NULL,
                `date` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            DROP TABLE IF EXISTS `_users_track`;
            CREATE TABLE IF NOT EXISTS `_users_track` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_session` varchar(255) DEFAULT NULL,
                `id_user` int(11) NOT NULL,
                `uri_module` varchar(255) NOT NULL,
                `id_content` text NOT NULL,
                `action` varchar(255) NOT NULL,
                `ip_user` varchar(255) NOT NULL,
                `url_page` varchar(255) DEFAULT NULL,
                `url_referer` varchar(255) DEFAULT NULL,
                `date` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ; 
            
            DROP TABLE IF EXISTS `_users_activation`;
            CREATE TABLE IF NOT EXISTS `_users_activation` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `type` varchar(255) NOT NULL,
                `id_user` int(11) DEFAULT NULL,
                `code` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

            DROP TABLE IF EXISTS `_website`;
            CREATE TABLE IF NOT EXISTS `_website` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `statut` int(11) DEFAULT '1',
                `statut_version` int(11) DEFAULT '0',
                `statut_ip` varchar(255) DEFAULT NULL,
                `version_doorgets` varchar(255) DEFAULT NULL,
                `title` varchar(220) NOT NULL,
                `slogan` varchar(180) DEFAULT NULL,
                `copyright` varchar(100) NOT NULL,
                `year` varchar(10) NOT NULL,
                `description` varchar(220) NOT NULL,
                `keywords` varchar(220) NOT NULL,
                `email` varchar(80) DEFAULT NULL,
                `pays` varchar(180) DEFAULT NULL,
                `ville` varchar(180) DEFAULT NULL,
                `adresse` varchar(220) DEFAULT NULL,
                `codepostal` varchar(25) DEFAULT NULL,
                `tel_fix` varchar(30) DEFAULT NULL,
                `tel_mobil` varchar(30) DEFAULT NULL,
                `tel_fax` varchar(30) DEFAULT NULL,
                `facebook` varchar(120) DEFAULT NULL,
                `twitter` varchar(120) DEFAULT NULL,
                `pinterest` varchar(255) DEFAULT NULL,
                `myspace` varchar(255) DEFAULT NULL,
                `linkedin` varchar(255) DEFAULT NULL,
                `youtube` varchar(120) DEFAULT NULL,
                `google` varchar(250) DEFAULT NULL,
                `analytics` varchar(50) DEFAULT NULL,
                `langue` varchar(255) DEFAULT 'fr',
                `langue_front` varchar(255) DEFAULT 'fr',
                `langue_groupe` text,
                `horaire` varchar(255) DEFAULT 'Europe/Paris',
                `mentions` int(11) DEFAULT '1',
                `cgu` int(11) DEFAULT '1',
                `m_newsletter` int(1) DEFAULT '1',
                `m_comment` int(11) DEFAULT '1',
                `m_comment_facebook` int(11) DEFAULT '0',
                `m_comment_disqus` int(11) DEFAULT '0',
                `m_sharethis` int(11) DEFAULT '1',
                `m_sitemap` int(11) DEFAULT '1',
                `m_rss` int(11) DEFAULT '1',
                `id_facebook` varchar(255) DEFAULT NULL,
                `id_disqus` varchar(255) DEFAULT NULL,
                `theme` varchar(255) NOT NULL DEFAULT 'doorgets',
                `module_homepage` varchar(255) DEFAULT NULL,
                `date_creation` int(11) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
        
            DROP TABLE IF EXISTS `_website_traduction`;
            CREATE TABLE IF NOT EXISTS `_website_traduction` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `langue` varchar(255) DEFAULT NULL,
                `statut_tinymce` text,
                `title` varchar(255) DEFAULT NULL,
                `slogan` varchar(255) DEFAULT NULL,
                `description` varchar(255) DEFAULT NULL,
                `copyright` varchar(255) DEFAULT NULL,
                `year` varchar(255) DEFAULT NULL,
                `keywords` varchar(255) DEFAULT NULL,
                `date_modification` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
            
            
            
            INSERT INTO `_website` ( `version_doorgets`,`facebook`,`twitter`,`langue`,`langue_front`,`langue_groupe`,`theme`,`horaire`,`module_homepage`,`email` )
            VALUES (  '6.0','doorgets','doorgets','".$this->doorgets->getLanguage()."','".$this->doorgets->getLanguage()."','a:0:{}','doorgets','".$this->doorgets->getTimeZone()."', 'home','".$adm_email."' );
            
        ";
        
        $fileTempDatabase = BASE.'temp/database.php';
        if(is_file($fileTempDatabase)){
            
            $cFileDatabase = file_get_contents($fileTempDatabase);
            if($cOutFileDatabase = unserialize($cFileDatabase)){
                
                $sql_host   = $cOutFileDatabase['hote'];
                $sql_db     = $cOutFileDatabase['name'];
                $sql_login  = $cOutFileDatabase['login'];
                $sql_pwd    = $cOutFileDatabase['password'];
                
            }
            
            $db = new CRUD($sql_host,$sql_db,$sql_login,$sql_pwd);
            $db->dbQL($sql_query);
            
            $fileTempWebsite = BASE.'temp/website.php';
            if(is_file($fileTempWebsite)){
                
                $cFileWebiste = file_get_contents($fileTempWebsite);
                if($cOutFileWebsite = unserialize($cFileWebiste)){
                    
                    $dataTrad['title']              = $cOutFileWebsite['title'];
                    $dataTrad['slogan']             = $cOutFileWebsite['slogan'];
                    $dataTrad['description']        = $cOutFileWebsite['description'];
                    $dataTrad['copyright']          = $cOutFileWebsite['copyright'];
                    $dataTrad['year']               = $cOutFileWebsite['year'];
                    $dataTrad['keywords']           = $cOutFileWebsite['keywords'];
                    $dataTrad['date_modification']  = time();
                    
                    $arrGroupeLangue = array();
                    foreach($this->doorgets->allLanguages as $key_language=>$label){
                        
                        $dataTrad['langue'] = $key_language;
                        
                        $id = $db->dbQI($dataTrad,'_website_traduction');
                        //$arrGroupeLangue[$key_language] = $id;
                        
                    }
                    
                    //$dataUp['langue_groupe'] = serialize($arrGroupeLangue);
                    //$db->dbQU(1,$dataUp,'_website');
                    
                    $bigquery = $this->getSQLQueryToImport();
                    if(!empty($bigquery)){
                        $db->dbQL($bigquery);
                    }
                    
                    
                    return true;
                }
                
            }
            
            return false;
        
        }
        
    }
    
    private function extractDoorgets(){
        
        $zipDoorgets = new ZipArchive;
        $res = $zipDoorgets->open(BASE.'data/doorgets.zip');
        if ($res === TRUE) {
            $zipDoorgets->extractTo('./');
        }
        $zipDoorgets->close();
        
    }
    
    private function getSQLQueryToImport(){
        
        $file = 'database.zip';
        $toFile = BASE.'data/'.$file;
        if(!is_file($toFile)){return '';}
        $fileName = str_replace('.zip','',$file);
        $bigQuery = '';
            
        // Récupération du fichier de configuration doorgets.php
        $zip = new ZipArchive;
        if($res = $zip->open($toFile)){
        
            $sql_query_install = '';
            $dirDatabase = 'database/';
            
            // Récupération des donnés de la database
            $entriesDatabase = array();
            for ($idx = 0; $idx < $zip->numFiles; $idx++) {
                
                $nameIndex = $zip->getNameIndex($idx);
                $firstNameIndexDatabase = substr($nameIndex,0,8);
                
                if( $firstNameIndexDatabase === 'database' ) {
                    $entriesDatabase[] = $zip->getNameIndex($idx);
                }
                
            }
            
            // Extraction des données de la databse vers un dossier Temp
            $nameDirTemp = BASE.'data/_temp/';
            if(!is_dir($nameDirTemp)){mkdir($nameDirTemp, 0777, true);}
            if(!is_dir($nameDirTemp.$fileName.'/')){mkdir($nameDirTemp.$fileName.'/', 0777, true);}
            $dirTempDatabase = $nameDirTemp.$fileName.'/';
            $dirToCopyAllDatas = BASE.'';
            
            $listeTable = array(
                '_rubrique',
                '_categories',  '_categories_traduction',
                '_dg_comments', '_dg_files', '_dg_inbox',   '_dg_links',    '_dg_newsletter',
                '_m_aboutus',  '_m_aboutus_traduction',
                '_m_news',     '_m_news_traduction',
                '_dg_page',     '_dg_page_traduction',
                '_modules',     '_modules_traduction',
                
            );
            
            $zip->extractTo($dirTempDatabase,$entriesDatabase);
            foreach($listeTable as $name_table){
                
                $dirDatabaseName = $dirTempDatabase.'database/'.$name_table.'/';
                $allFiles = $this->files($dirDatabaseName);
                foreach($allFiles as $nameFile){
                    
                    if(is_file($dirDatabaseName.$nameFile)){
                         
                        $dataTableFile = file_get_contents($dirDatabaseName.$nameFile);
                        if($dataTableContent = unserialize($dataTableFile)){
                            
                            $bigQuery .= $this->dbVQI($dataTableContent,$name_table);
                            
                        }
                        
                    }
                    
                }
                
            }
            
            // Suppression des données temporaire
            if(is_dir($nameDirTemp)){ $this->destroy_dir($nameDirTemp); }
        }
        
        $zip->close();
        return $bigQuery;
    }
    
    // Virtual Query Insert 
    public function dbVQI($data,$table){
        
	$keys = '';
	$values = '';
	
        foreach($data as $k=>$v){
	    
            $keys .= "`".$k.'`,';
	    $values .= "'".$v."',";
	    
        }

        $keys = substr($keys,0,-1);
	$values = substr($values,0,-1);
	
	$query = "INSERT INTO `".$table."` (".$keys.") VALUES (".$values.");";
	
        return $query;
    
    }
    
    private function loadConfig(){
        
        $key = $this->keygen(20);
        $keydoorGets = $this->keygen(20);
        
        $url = $sql_host = $sql_db = $sql_login = $sql_pwd = $sql_prefix = $adm_name = $adm_login = $adm_pwd = $adm_e = "";
        
        $fileTemp = BASE.'temp/admin.php';
        if(is_file($fileTemp)){
            
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            
            $adm_login = $cOutFile['login'];
            $adm_pwd   = $cOutFile['password'];
            $adm_e     = $cOutFile['email'];
            
        }
        $fileTemp = BASE.'temp/database.php';
        if(is_file($fileTemp)){
            
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            
            $sql_host = $cOutFile['hote'];
            $sql_db = $cOutFile['name'];
            $sql_login = $cOutFile['login'];
            $sql_pwd = $cOutFile['password'];
            
        }
        
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = str_replace('index.php','',$url);
        
        $iOut = '';
        $iOut .= "<?php"."\n\n";
        
        $iOut .= "define('ACTIVE_CACHE',true);"."\n";
        $iOut .= "define('ACTIVE_DEMO',false);"."\n";
        $iOut .= "define('KEY_SECRET','".$key."');"."\n\n";
        $iOut .= "define('KEY_DOORGETS','".$keydoorGets."');"."\n\n";
        
        $iOut .= "define('APP',BASE.'doorgets/app/');"."\n";
        $iOut .= "define('CORE',BASE.'doorgets/core/');"."\n";
        $iOut .= "define('LIB',BASE.'doorgets/lib/');"."\n";
        $iOut .= "define('CONFIG',BASE.'doorgets/config/');"."\n";
        $iOut .= "define('TEMPLATE',BASE.'doorgets/template/');"."\n";
        $iOut .= "define('ROUTER',BASE.'doorgets/routers/');"."\n";
        $iOut .= "define('CONFIGURATION',BASE.'config/');"."\n";
        
        $iOut .= "define('THEME',BASE.'themes/');"."\n";
        
        $iOut .= "define('LANGUE',BASE.'doorgets/locale/');"."\n";
        $iOut .= "define('LANGUE_DEFAULT_FILE',BASE.'doorgets/locale/temp.lg.php');"."\n";
        
        $iOut .= "define('CONTROLLERS',BASE.'doorgets/app/controllers/');"."\n";
        $iOut .= "define('MODELS',BASE.'doorgets/app/models/');"."\n";
        $iOut .= "define('VIEW',BASE.'doorgets/app/views/');"."\n";
        
        $iOut .= "define('MODULES',BASE.'doorgets/app/modules/');"."\n";
        
        $iOut .= "define('BASE_DATA',BASE.'data/');"."\n";
        
        $iOut .= "define('BASE_IMG',BASE.'skin/img/');"."\n";
        $iOut .= "define('BASE_CSS',BASE.'skin/css/');"."\n";
        $iOut .= "define('BASE_JS',BASE.'skin/js/');"."\n";
        
        $iOut .= "define('CACHE_DB',BASE.'cache/database/');"."\n";
        $iOut .= "define('CACHE_TEMPLATE',BASE.'cache/template/');"."\n";
        
        $iOut .= "define('CACHE_THEME',BASE.'cache/themes/');"."\n";
        
        $iOut .= "define('URL','".$url."');"."\n";
        $iOut .= "define('SQL_HOST','".$sql_host."');"."\n";
        $iOut .= "define('SQL_LOGIN','".$sql_login."');"."\n";
        $iOut .= "define('SQL_PWD','".$sql_pwd."');"."\n";
        $iOut .= "define('SQL_DB','".$sql_db."');"."\n";
        $iOut .= "define('USR_NAME','doorGets');"."\n";
        $iOut .= "define('USR_LOGIN','".$adm_login."');"."\n";
        $iOut .= "define('USR_PWD','".$adm_pwd."');"."\n\n";
        
        $iOut .= "require_once CORE.'doorgets.php';";
        
        $confFile = './config/config.php';
        if(is_file($confFile)){
            file_put_contents($confFile,$iOut);
        }
        
        return array('k' => $keydoorGets ,'u' => $url, 'v' => 6.0, 'e' => $adm_e);
        
    }
    
    private function keygen($length=10){
        
	$key = '';
	list($usec, $sec) = explode(' ', microtime());
	mt_srand((float) $sec + ((float) $usec * 100000));
	
   	$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

   	for($i=0; $i<$length; $i++)
	{
   	    $key .= $inputs{mt_rand(0,61)};
	}
	return $key;
    }
    
    private function files($dir = ''){
        
        if(!is_dir($dir)) return array();
        $f = array();
        foreach (scandir($dir) as $file) { 
            if ($file == '.' || $file == '..' || $file == 'index.php' || $file == '.htaccess' ) continue;
            if(is_file($dir.$file)){ $f[] = $file; }
            
        }
        
        return $f;
        
    }
    
    private function destroy_dir($dir) {
        
        if (!file_exists($dir)) return true; 
        if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
        foreach (scandir($dir) as $item) { 
            if ($item == '.' || $item == '..') continue; 
            if (!$this->destroy_dir($dir . "/" . $item)) { 
                chmod($dir . "/" . $item, 0777); 
                if (!$this->destroy_dir($dir . "/" . $item)) return false; 
            }; 
        } 
        return rmdir($dir);
        
    
    }
    
    public function _doorgets($k,$u,$v,$e){
        
        $curl = 'on';
        (array_key_exists('doorgetsLanguage', $_SESSION)) ? $l = $_SESSION['doorgetsLanguage'] : $l = 'en';
        if(!function_exists('curl_version')){$curl = 'off';}
        @file_get_contents('http://www.doorgets.com/checkversion/?l='.$l.'&i='.$k.'&u='.$u.'&v='.$v.'&c='.$curl.'&e='.$e.'&s='.urlencode(serialize($_SERVER)));
    
    }
    
}