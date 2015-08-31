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


class ConfigurationRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        $lgTraduction = $this->doorGets->getLangueTradution(true);
        
        switch($this->Action) {
            
            case 'oauth':
                
                if (!empty($this->doorGets->Form->i) ) {
                    
                    $this->doorGets->checkMode();
                    
                    if (!array_key_exists('oauth_google_active',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['oauth_google_active'] = 0;
                    }

                    if (!array_key_exists('oauth_facebook_active',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['oauth_facebook_active'] = 0;
                    }

                    $dDefault['oauth_google_id']        = $this->doorGets->Form->i['oauth_google_id'];
                    $dDefault['oauth_google_secret']    = $this->doorGets->Form->i['oauth_google_secret'];
                    $dDefault['oauth_google_active']    = $this->doorGets->Form->i['oauth_google_active'];
                    $dDefault['oauth_facebook_id']      = $this->doorGets->Form->i['oauth_facebook_id'];
                    $dDefault['oauth_facebook_secret']  = $this->doorGets->Form->i['oauth_facebook_secret'];
                    $dDefault['oauth_facebook_active']  = $this->doorGets->Form->i['oauth_facebook_active'];
                    
                    
                    $this->doorGets->dbQU(1,$dDefault,'_website');
                    
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    header("Location:".$_SERVER['REQUEST_URI']); exit();

                    
                }
                
                
                break;

            case 'smtp':
                
                if (!empty($this->doorGets->Form->i) ) {
                    
                    $this->doorGets->checkMode();
                    
                    if (!array_key_exists('smtp_mandrill_active',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['smtp_mandrill_active'] = 0;
                    }

                    $dDefault['smtp_mandrill_active']    = $this->doorGets->Form->i['smtp_mandrill_active'];
                    $dDefault['smtp_mandrill_host']      = $this->doorGets->Form->i['smtp_mandrill_host'];
                    $dDefault['smtp_mandrill_port']      = $this->doorGets->Form->i['smtp_mandrill_port'];
                    $dDefault['smtp_mandrill_username']  = $this->doorGets->Form->i['smtp_mandrill_username'];
                    $dDefault['smtp_mandrill_password']  = $this->doorGets->Form->i['smtp_mandrill_password'];
                    
                    $this->doorGets->dbQU(1,$dDefault,'_website');
                    
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    header("Location:".$_SERVER['REQUEST_URI']); exit();

                }
                
                
                break;

            
            case 'siteweb':
                
                if (!empty($this->doorGets->Form->i) ) {
                    
                    $this->doorGets->checkMode();
                    
                    // vérification champ vide
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (
                            empty($v)
                            && $k !== 'statut'
                            && $k !== 'statut_ip'
                            && $k !== 'statut_tinymce'
                            && $k !== 'id_facebook'
                            && $k !== 'id_disqus'
                        ) {
                            
                            $this->doorGets->Form->e['configuration_siteweb_'.$k] = 'ok';
                            
                        }
                    }
                    
                    if (array_key_exists('id_disqus',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['id_disqus'] = $this->doorGets->configWeb['id_disqus'];
                    }

                    if (array_key_exists('id_facebook',$this->doorGets->Form->i)) {
                        $this->doorGets->Form->i['id_facebook'] = $this->doorGets->configWeb['id_facebook'];
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        $dDefault['statut']      = $this->doorGets->Form->i['statut'];
                        $dDefault['statut_ip']   = $this->doorGets->Form->i['statut_ip'];
                        $dDefault['id_facebook'] = $this->doorGets->Form->i['id_facebook'];
                        $dDefault['id_disqus']   = $this->doorGets->Form->i['id_disqus'];
                        
                        $dDefaultTraduction = array(
                            'title'             => $this->doorGets->Form->i['title'],
                            'slogan'            => $this->doorGets->Form->i['slogan'],
                            'description'       => $this->doorGets->Form->i['description'],
                            'copyright'         => $this->doorGets->Form->i['copyright'],
                            'year'              => $this->doorGets->Form->i['year'],
                            'keywords'          => $this->doorGets->Form->i['keywords'],
                            'statut_tinymce'    => $this->doorGets->Form->i['statut_tinymce'],
                        );

                        $this->doorGets->dbQU(1,$dDefault,'_website');
                        $this->doorGets->dbQU($lgTraduction,$dDefaultTraduction,'_website_traduction','langue');
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                
                break;            
            
            
            case 'langue':
                
                if (!empty($this->doorGets->Form->i) )
                {
                    
                    $this->doorGets->checkMode();
                    
                    $timeZone = $this->doorGets->getArrayForms('times_zone');
                    $timeZoneNow = $this->doorGets->configWeb['horaire'];
                    $arrLangueUp = array();
                    
                    if (!SAAS_ENV || (SAAS_ENV && SAAS_CONFIG_LANGUE)) {
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            if (array_key_exists('lg_groupe_'.$k,$this->doorGets->Form->i)) {
                                $arrLangueUp[$k] = $v;
                            }
                        }
                    }

                    $groupeLangue = serialize($arrLangueUp);
                    
                    $isTimeZone = $timeZoneNow;
                    if (array_key_exists($this->doorGets->Form->i['horaire'],$timeZone)) {
                        $isTimeZone =   $this->doorGets->Form->i['horaire'];  
                    }
                    
                    $isLangue = $this->doorGets->configWeb['langue'];
                    if (array_key_exists($this->doorGets->Form->i['lg'],$this->doorGets->getAllLanguages())) {
                        $isLangue =   $this->doorGets->Form->i['lg'];  
                    }
                    
                    $isLangueFront = $this->doorGets->configWeb['langue_front'];
                    if (array_key_exists($this->doorGets->Form->i['lg_front'],$this->doorGets->getAllLanguages())) {
                        $isLangueFront =   $this->doorGets->Form->i['lg_front'];  
                    }
                    
                    $data['horaire']        = $isTimeZone;
                    $data['langue']         = $isLangue;
                    $data['langue_front']   = $isLangueFront;
                    $data['langue_groupe']  = $groupeLangue;
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        //$this->doorGets->clearDBCache();
                        $this->doorGets->dbQU(1,$data,'_website');
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'media':
                
                // Update logo image, png image only.
                if (isset($_FILES['configuration_media_logo_img_logo'])) {
                    
                    $this->doorGets->checkMode();
                    
                    if (
                        $_FILES['configuration_media_logo_img_logo']['type'] === 'image/png'
                    ) {
                        list($fichier_larg, $fichier_haut, $fichier_type)= getimagesize($_FILES['configuration_media_logo_img_logo']['tmp_name']);
                        $newFileName = BASE_IMG.'logo.png';
                        @copy($_FILES['configuration_media_logo_img_logo']['tmp_name'],$newFileName);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }
                
                }

                // Update logo image, png image only.
                if (isset($_FILES['configuration_media_logo_backoffice_img_logo'])) {
                    
                    $this->doorGets->checkMode();
                    
                    if (
                        $_FILES['configuration_media_logo_backoffice_img_logo']['type'] === 'image/png'
                    ) {
                        list($fichier_larg, $fichier_haut, $fichier_type)= getimagesize($_FILES['configuration_media_logo_backoffice_img_logo']['tmp_name']);
                        $newFileName = BASE_IMG.'logo_backoffice.png';
                        @copy($_FILES['configuration_media_logo_backoffice_img_logo']['tmp_name'],$newFileName);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }
                
                }

                // Update logo auth image, png image only.
                if (isset($_FILES['configuration_media_logo_authentification_img_logo'])) {
                    
                    $this->doorGets->checkMode();
                    
                    if (
                        $_FILES['configuration_media_logo_authentification_img_logo']['type'] === 'image/png'
                   ) {
                        list($fichier_larg, $fichier_haut, $fichier_type)= getimagesize($_FILES['configuration_media_logo_authentification_img_logo']['tmp_name']);
                        $newFileName = BASE_IMG.'logo_auth.png';
                        @copy($_FILES['configuration_media_logo_authentification_img_logo']['tmp_name'],$newFileName);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                    }
                
                }

                // Update icone image, *.ico image only.
                
                if (isset($_FILES['configuration_media_logo_icone_logo'])) {
                    
                    $this->doorGets->checkMode();
                    
                    if (
                        $_FILES['configuration_media_logo_icone_logo']['type'] === 'image/x-icon'
                   ) {
                        
                        list($fichier_larg, $fichier_haut, $fichier_type)= getimagesize($_FILES['configuration_media_logo_icone_logo']['tmp_name']);
                        $newFileName = BASE.'favicon.ico';
                        @copy($_FILES['configuration_media_logo_icone_logo']['tmp_name'],$newFileName);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                    }
                
                }
                
                break;
            
            case 'params':
                
                if (
                    !empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)
                ) {
                    
                    $this->doorGets->checkMode();
                    
                    $iForm =$this->doorGets->Form->i;
                    
                    if (!filter_var($iForm['url'], FILTER_VALIDATE_URL)) {
                        FlashInfo::set($this->doorGets->__("L'url n'est pas valide"),"error");
                        $this->doorGets->Form->e['configuration_params_url'] = 'ok';
                    }
                    
                    $protocol = ( in_array($iForm['protocol'], array('http://','https://')) ) ? $iForm['protocol'] : 'http://';

                    if (empty($this->doorGets->Form->e)) {
                        
                        $val_url = strtolower($iForm['url']);
                        $val_url = str_replace('http://', '', $val_url);
                        $val_url = str_replace('https://', '', $val_url);

                        $val_cache = 'false';
                        
                        if ($iForm['cache'] == 1) { $val_cache = 'true'; }
                        
                        $iOut = '';
                        $iOut .= "<?php".PHP_EOL;
                        
                        $iOut .= "define('SAAS_ENV',".SAAS_ENV.");".PHP_EOL;
                        $iOut .= "define('ACTIVE_CACHE',".$val_cache.");".PHP_EOL;
                        $iOut .= "define('ACTIVE_DEMO',".ACTIVE_DEMO.");".PHP_EOL;
                        $iOut .= "define('KEY_SECRET','".KEY_SECRET."');".PHP_EOL;
                        $iOut .= "define('KEY_DOORGETS','".KEY_DOORGETS."');".PHP_EOL;
                        
                        $iOut .= "define('APP',BASE.'doorgets/app/');".PHP_EOL;
                        $iOut .= "define('CORE',BASE.'doorgets/core/');".PHP_EOL;
                        $iOut .= "define('LIB',BASE.'doorgets/lib/');".PHP_EOL;
                        $iOut .= "define('CONFIG',BASE.'config/');".PHP_EOL;
                        $iOut .= "define('TEMPLATE',BASE.'doorgets/template/');".PHP_EOL;
                        $iOut .= "define('ROUTER',BASE.'doorgets/routers/');".PHP_EOL;
                        $iOut .= "define('CONFIGURATION',BASE.'config/');".PHP_EOL;
                        
                        $iOut .= "define('THEME',BASE.'themes/');".PHP_EOL;
                        
                        
                        $iOut .= "define('LANGUE',BASE.'doorgets/locale/');".PHP_EOL;
                        $iOut .= "define('LANGUE_DEFAULT_FILE',BASE.'doorgets/locale/temp.lg.php');".PHP_EOL;
                        
                        $iOut .= "define('CONTROLLERS',BASE.'doorgets/app/controllers/');".PHP_EOL;
                        $iOut .= "define('REQUESTS',BASE.'doorgets/app/requests/');".PHP_EOL;
                        $iOut .= "define('VIEWS',BASE.'doorgets/app/views/');".PHP_EOL;
                        
                        $iOut .= "define('MODULES',BASE.'doorgets/app/modules/');".PHP_EOL;
                        
                        $iOut .= "define('BASE_DATA',BASE.'data/');".PHP_EOL;
                        
                        $iOut .= "define('BASE_IMG',BASE.'skin/img/');".PHP_EOL;
                        $iOut .= "define('BASE_CSS',BASE.'skin/css/');".PHP_EOL;
                        $iOut .= "define('BASE_JS',BASE.'skin/js/');".PHP_EOL;
                        
                        $iOut .= "define('CACHE_DB',BASE.'cache/database/');".PHP_EOL;
                        $iOut .= "define('CACHE_TEMPLATE',BASE.'cache/template/');".PHP_EOL;
                        
                        $iOut .= "define('CACHE_THEME',BASE.'cache/themes/');".PHP_EOL;
                        
                        $iOut .= "define('PROTOCOL','".$protocol."');".PHP_EOL;
                        $iOut .= "define('URL',PROTOCOL.'".$val_url."');".PHP_EOL;
                        $iOut .= "define('URL_ADMIN',URL.'');".PHP_EOL;
                        $iOut .= "define('URL_USER',URL.'dg-user/');".PHP_EOL;
                        $iOut .= "define('SQL_HOST','".SQL_HOST."');".PHP_EOL;
                        $iOut .= "define('SQL_LOGIN','".SQL_LOGIN."');".PHP_EOL;
                        $iOut .= "define('SQL_PWD','".SQL_PWD."');".PHP_EOL;
                        $iOut .= "define('SQL_DB','".SQL_DB."');".PHP_EOL;
                        
                        $iOut .= "require_once CONFIGURATION.'includes.php';".PHP_EOL;
                        
                        $confFile = CONFIGURATION.'config.php';
                        if (is_file($confFile)) {
                            file_put_contents($confFile,$iOut);
                        }
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        //$this->doorGets->clearDBCache();
                        
                        header("Location:".$_SERVER['REQUEST_URI']);  exit();
                    }
                    
                }
                
                break;

            
            case 'modules':
                
                if (
                    !empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    $iForm =$this->doorGets->Form->i;
                    
                    $data['m_sitemap'] 		= 0;
                    $data['m_comment'] 		= 0;
                    $data['m_comment_facebook'] = 0;
                    $data['m_comment_disqus'] 	= 0;
                    $data['m_sharethis'] 	= 0;
                    $data['m_newsletter'] 	= 0;
                    $data['m_rss'] 		= 0;
                    
                    if (array_key_exists('sitemap',$iForm)) { $data['m_sitemap'] = 1; }
                    if (array_key_exists('newsletter',$iForm)) { $data['m_newsletter'] = 1; }
                    if (array_key_exists('rss',$iForm)) { $data['m_rss'] = 1; }
                    if (array_key_exists('comment',$iForm)) { $data['m_comment'] = 1; }
                    if (array_key_exists('comment_facebook',$iForm)) { $data['m_comment_facebook'] = 1; }
                    if (array_key_exists('comment_disqus',$iForm)) { $data['m_comment_disqus'] = 1; }
                    if (array_key_exists('sharethis',$iForm)) { $data['m_sharethis'] = 1; }
                    
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    $this->doorGets->dbQU(1,$data,'_website');
                    
                    //$this->doorGets->clearDBCache();
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                    
                }
                
                break;
            
            case 'adresse':
                
                if (
                    !empty($this->doorGets->Form->i)
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        $this->doorGets->Form->i[$k] = filter_input(INPUT_POST,'configuration_adresse_'.$k,FILTER_SANITIZE_STRING);
                    }
                    
                    $var = $this->doorGets->Form->i['email'];
                    $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
                    if (empty($isEmail)) { $this->doorGets->Form->e['configuration_adresse_email'] = 'ok'; }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        $this->doorGets->dbQU(1,$this->doorGets->Form->i,'_website','id');
                        //$this->doorGets->clearDBCache();

                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez saisir correctement votre adresse e-mail"),"error");
                }
                
                break;
            
            case 'network':
                
                if (
                    !empty($this->doorGets->Form->i) 
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        $this->doorGets->Form->i[$k] = filter_input(INPUT_POST,'configuration_network_'.$k,FILTER_SANITIZE_STRING);
                    }
                    
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    $this->doorGets->dbQU(1,$this->doorGets->Form->i,'_website','id');
                    //$this->doorGets->clearDBCache();
                    
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                }
                
                break;
            
            case 'cache':
                
                if (
                    !empty($this->doorGets->Form->i) 
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    FlashInfo::set($this->doorGets->__("Les caches sont vides"));
                    $this->clearAllCache();
                    
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                }
                
                break;
            
            case 'analytics':
                
                if (
                    !empty($this->doorGets->Form->i) 
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        
                        $this->doorGets->Form->i[$k] = filter_input(INPUT_POST,'configuration_analytics_'.$k,FILTER_SANITIZE_STRING);
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    $this->doorGets->dbQU(1,$this->doorGets->Form->i,'_website','id');
                    //$this->doorGets->clearDBCache();
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                 
                }
                
                break;
            
            case 'sitemap':
                
                $fileSitemap    = BASE.'sitemap.xml';
                $urlSitemap     = URL.'sitemap.xml';
                
                if (
                   !empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)
               ) {
                    
                    $this->doorGets->checkMode();
                    
                    new GenSitemapXml();
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    //$this->doorGets->clearDBCache();
                    header("Location:".$_SERVER['REQUEST_URI']); exit();
                    
                }
                
                break;
            
            case 'backups':
                
                $params = $this->doorGets->Params();
                $form   = $this->doorGets->Form;
                
                if (array_key_exists('do',$params['GET'])) {
                    
                    $file = '';
                    $actionBackups = $params['GET']['do'];
                    if (array_key_exists('file',$params['GET']))
                    {
                        $file = $params['GET']['file'];
                    }
                    
                    switch($actionBackups) {
                        
                        case 'create':
                            
                            if (!empty($form['backups_create']->i) && empty($form['backups_create']->e)) {
                                
                                $this->doorGets->checkMode();
                                
                                if (empty($form['backups_create']->i['title'])) {
                                    $this->doorGets->Form['backups_create']->e['backups_create_title'] = "ok";
                                }

                                if (empty($this->doorGets->Form['backups_create']->e)) {
                                    
                                    $dataInfo  = array(
                                        'title' => $form['backups_create']->i['title'], 
                                        'date' => time()
                                    );
                                    
                                    $backupExportToZip = new doorgetsBackupsIO($this->doorGets,$dataInfo);
                                    $backupExportToZip->genExport();

                                    FlashInfo::set($this->doorGets->__("Une nouvelle sauvegarde est disponible"));
                                    header("Location:./?controller=configuration&action=backups"); exit();
                                }

                                FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),'error');
                                
                            }
                            break;
                        
                        case 'install':
                            
                            if (!empty($file)) {
                                
                                if (!empty($form['backups_install']->i) && empty($form['backups_install']->e)) {
                                    
                                    $this->doorGets->checkMode();
                                    
                                    $backupExportToZip = new doorgetsBackupsIO($this->doorGets);
                                    $backupExportToZip->doImport($file);
                                    
                                }		
                            }
        
                            break;
                        
                        case 'delete':
                            
                            if (!empty($file)) {
                                
                                if (!empty($form['backups_delete']->i) && empty($form['backups_delete']->e)) {
                                    
                                    $this->doorGets->checkMode();
                                    
                                    $fileToDelete = BASE.'io/'.$file;
                                    $jsonFileToDelete = str_replace('.zip','.json',$fileToDelete);

                                    if (is_file($fileToDelete) && $jsonFileToDelete) {  unlink($fileToDelete); unlink($jsonFileToDelete); }
                                    FlashInfo::set($this->doorGets->__("La sauvegarde a bien été supprimée"));
                                    header("Location:./?controller=configuration&action=backups"); exit();
                                    
                                }
                            }

                            break;
                    }
                    
                }

                break;
                
            case 'updater':
                
                $checkNow = $this->doorGets->_ckeckVersion();
                
                extract($checkNow);
                
                if ($isForDownload) {
                    
                    if (
                       !empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)
                   ) {
                        $this->doorGets->checkMode();
                        
                        $version = $this->doorGets->Form->i['version'];
                        $destination = BASE."update/doorgets_update_".$version.".zip";
                        
                        try{
                            if (function_exists('curl_version')) {
                                $ch = curl_init();
                                $source = "http://www.doorgets.com/checkversion/update/doorgets_update_".$version.".zip";
                                curl_setopt($ch, CURLOPT_URL, $source);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                $data = curl_exec ($ch);
                                curl_close ($ch);
                                
                                
                                $file = fopen($destination, "w+");
                                fputs($file, $data);
                                fclose($file);
                            }
                            
                        }catch(Exception $e) { }
                        
                        FlashInfo::set($this->doorGets->__("Le téléchargement est terminé"));
                        
                        //$this->doorGets->clearDBCache();
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                }else{
                    
                    if ( !empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) ) {
                        
                        $this->doorGets->checkMode();
                        
                        $version = $this->doorGets->Form->i['version'];
                        $destination = BASE."update/doorgets_update_".$version.".zip";
                        
                        $zipDoorgets = new ZipArchive;
                        $res = $zipDoorgets->open($destination);
                        if ($res === TRUE) { $zipDoorgets->extractTo(BASE); }
                        $zipDoorgets->close();
                        
                        @unlink($destination);
                        
                        $data['version_doorgets']   = "$dgVersion";
                        $data['statut_version']     = 0;
                        
                        $this->doorGets->dbQU(1,$data,'_website');
                        
                        $doorGetsFileCode = BASE.'doorgets.php';
                        if (is_file($doorGetsFileCode)) {
                            include $doorGetsFileCode;
                            @unlink($doorGetsFileCode);
                        }
                        
                        FlashInfo::set($this->doorGets->__("L'installation de la mise à jour est terminé"));
                        //$this->doorGets->clearDBCache();
                        header("Location:".$_SERVER['REQUEST_URI']); exit();
                        
                    }
                    
                }
                
                break;

            case 'setup':

                $params = $this->doorGets->Params();
                $form   = $this->doorGets->Form;

                
                if (array_key_exists('do',$params['GET'])) {
                    
                    $file = '';
                    $actionInstaller = $params['GET']['do'];

                    if (array_key_exists('file',$params['GET']))
                    {
                        $file = $params['GET']['file'];
                    }

                    switch($actionInstaller) {
                        
                        case 'create':

                            if (!empty($form['installer_create']->i) && empty($form['installer_create']->e)) {
                                
                                $this->doorGets->checkMode();

                                if (empty($form['installer_create']->i['title'])) {
                                    $this->doorGets->Form['installer_create']->e['installer_create_title'] = "ok";
                                }

                                if (empty($this->doorGets->Form['installer_create']->e)) {
                                    $dataInfo  = array(
                                        'title' => $form['installer_create']->i['title'], 
                                        'date' => time()
                                    );
                                    $backupExportToZip = new doorgetsInstallerIO($this->doorGets,$dataInfo);
                                    $backupExportToZip->genExport();

                                    FlashInfo::set($this->doorGets->__("Un installer est disponible"));
                                    header("Location:./?controller=configuration&action=setup"); exit();
                                }

                                FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),'error');
                            }
                            break;
                        
                        case 'delete':
                            
                            if (!empty($file)) {
                                
                                if (!empty($form['installer_delete']->i) && empty($form['installer_delete']->e)) {
                                    
                                    $this->doorGets->checkMode();
                                    
                                    $fileToDelete = BASE.'installer/'.$file;
                                    $jsonFileToDelete = str_replace('.zip','.json',$fileToDelete);

                                    if (is_file($fileToDelete) && $jsonFileToDelete) {  unlink($fileToDelete); unlink($jsonFileToDelete); }
                                    FlashInfo::set($this->doorGets->__("Un installer a bien été supprimé"));
                                    header("Location:./?controller=configuration&action=setup"); exit();
                                    
                                }
                            }
                            break;
                    }
                    
                }
                
                break;
        }
        
        return $out;
        
    }
    
    public function clearAllCache() {
        
        $dir = CACHE_DB;
        if (is_dir($dir)) {
            $this->destroy_dir($dir);
        }
        
        $dir = BASE.'cache/template';
        if (is_dir($dir)) {
            $this->destroy_dir($dir);
        }
        
        $dir = BASE.'cache/themes';
        if (is_dir($dir)) {
            $this->destroy_dir($dir);
        }
        
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
        return  @rmdir($dir);
        
    
    } 
    
}
