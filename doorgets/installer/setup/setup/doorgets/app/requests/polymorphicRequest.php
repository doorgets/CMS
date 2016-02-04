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

class polymorphicRequest extends doorgetsRequest{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets);
        
    }
    
    public function indexAction() {
        
        $actionName = $this->doorgets->getStep();
        
        $form = $this->doorgets->form['doorgets_'.$actionName]  = new Formulaire('doorgets_'.$actionName);
        
        $urlRedic = $_SERVER['REQUEST_URI'];
        $urlRedic = str_replace('index.php','',$urlRedic);

        $configFile = 'config/config.php';
        if (file_exists($configFile) && is_file($configFile)) {
            //$this->destroy_dir(BASE);
            header("Location:".$urlRedic); exit();
        }

        if (!empty($form->i) && empty($form->e) )
        {

            $this->removeDataTemp();

            $isCreatedQuery = true;//$this->installDatabase();
            $this->extractDoorgets();
            $z = $this->loadConfig();
            if ($isCreatedQuery) {
                
                $this->updateDatabase();
                
                //$this->destroy_dir(BASE);
                $this->_doorgets($z['k'],$z['u'],$z['v'],$z['e']);
                
            }
            header("Location:".$urlRedic); exit();
        }
            
    }

    public function updateDatabase(){

        $fileTempAdmin = BASE.'temp/admin.php';
        if (is_file($fileTempAdmin)) {
            
            $cFile = file_get_contents($fileTempAdmin);
            $cOutFile = unserialize($cFile);
            $adm_email = $cOutFile['email'];
        }

        $fileTempDatabase = BASE.'temp/database.php';
        if (is_file($fileTempDatabase)) {
            
            $cFileDatabase = file_get_contents($fileTempDatabase);
            if ($cOutFileDatabase = unserialize($cFileDatabase)) {
                
                $sql_host   = $cOutFileDatabase['hote'];
                $sql_db     = $cOutFileDatabase['name'];
                $sql_login  = $cOutFileDatabase['login'];
                $sql_pwd    = $cOutFileDatabase['password'];
                
            }
            
            $db = new CRUD($sql_host,$sql_db,$sql_login,$sql_pwd);
            
            
            $fileTempWebsite = BASE.'temp/website.php';
            if (is_file($fileTempWebsite)) {
                
                $cFileWebiste = file_get_contents($fileTempWebsite);
                if ($cOutFileWebsite = unserialize($cFileWebiste)) {
                    
                    $dataTrad['title']              = $cOutFileWebsite['title'];
                    $dataTrad['slogan']             = $cOutFileWebsite['slogan'];
                    $dataTrad['description']        = $cOutFileWebsite['description'];
                    $dataTrad['copyright']          = $cOutFileWebsite['copyright'];
                    $dataTrad['year']               = $cOutFileWebsite['year'];
                    $dataTrad['keywords']           = $cOutFileWebsite['keywords'];
                    $dataTrad['date_modification']  = time();

                    if (!empty($cOutFile)) {
                                        
                        $fileTempUser = BASE.'temp/_fromUser.php';
                        if (is_file($fileTempUser)) {
                            
                            $dataFileUser = file_get_contents($fileTempUser);
                            if ($dataUser = unserialize($dataFileUser)) {

                                $dataUserId = $dataUser['user_id']; 
                                
                                $login      = $cOutFile['email'];
                                
                                $crypto = $this->_cryptMe($cOutFile['password']);

                                $queryUser['login']     = $login;
                                $queryUser['password']  = $crypto['password'];
                                $queryUser['salt']      = $crypto['salt'];

                                $db->dbQU($dataUserId,$queryUser,'_users');

                                $queryUserInfo['email']     = $login;
                                $queryUserInfo['langue']    = $_SESSION['doorgetsLanguage'];

                                $db->dbQU($dataUserId,$queryUserInfo,'_users_info');

                                $arrGroupeLangue = array();
                                foreach($this->doorgets->allLanguages as $key_language=>$label) {
                                    
                                    $dataTrad['langue'] = $key_language;
                                    $db->dbQD($key_language,'_website_traduction','langue','=','');
                                    $arrGroupeLangue[$key_language] = $db->dbQI($dataTrad,'_website_traduction');
                                }

                                $lgActuel  = $this->doorgets->getLanguage();
                                
                                $dataWebsite['version_doorgets']    = '7.0';
                                $dataWebsite['langue']              = $lgActuel;
                                $dataWebsite['langue_front']        = $lgActuel;
                                $dataWebsite['langue_groupe']       = serialize(array($lgActuel => $lgActuel));
                                $dataWebsite['horaire']             = $this->doorgets->getTimeZone();
                                $dataWebsite['email']               = $adm_email;

                                $db->dbQU(1,$dataWebsite,'_website');

                            }
                        }                    
                    }
                }
            }
        }
    }
    
    private function extractDoorgets() {
        
        $zipDoorgets = new ZipArchive;
        $res = $zipDoorgets->open(BASE.'data/doorgets.zip');
        if ($res === TRUE) {
            $zipDoorgets->extractTo('./');
        }
        $zipDoorgets->close();
        
    }
    
    private function getSQLQueryToImport($user = array()) {


        $file = 'database.zip';
        $toFile = BASE.'data/'.$file;
        if (!is_file($toFile)) {return '';}
        $fileName = str_replace('.zip','',$file);
        $positionBigQueries = 0;
        $bigQueries = array();
        $bigQuery = '';
        
        // Récupération du fichier de configuration doorgets.php
        $zip = new ZipArchive;
        if ($res = $zip->open($toFile)) {

            // Extraction des données de la databse vers un dossier Temp
            $nameDirTemp = BASE.'data/_temp/';
            if (!is_dir($nameDirTemp)) { @mkdir($nameDirTemp, 0777, true);}
            if (!is_dir($nameDirTemp.$fileName.'/')) { @mkdir($nameDirTemp.$fileName.'/', 0777, true);}
            $dirTempDatabase = $nameDirTemp.$fileName.'/';
            $dirToCopyAllDatas = BASE.'';

            $zip->extractTo($dirTempDatabase);
            $zip->close();

            $sql_query_install = '';
            $dirDatabase = 'database/';
            
            $contents = file_get_contents($dirTempDatabase.'database/doorgets.php');
            
            $configData  = unserialize($contents);

            if (!empty($configData) && is_array($configData)) {
                
                $sql_query_install = '';
                $dirDatabase = 'database/';
                $bigQueries['create'] = '';

                // Installation de la base de données
                foreach($configData as $k=>$v) {
                    
                    if (!empty($v['sql_create_table'])) {
                        
                        $query = str_replace("\n",' ',$v['sql_create_table']);
                        $query = str_replace("\t",'',$query);
                        $query = str_replace("\r",'',$query);
                        
                        $bigQueries['create'] .= $query;
                        
                    }    

                    $positionBigQueries++;
                    
                    $dirDatabaseName = $dirTempDatabase.'database/'.$k.'/';
                    $allFiles = $this->files($dirDatabaseName);
                    foreach($allFiles as $nameFile) {
                        
                        $dataTableFile = file_get_contents($dirDatabaseName.$nameFile);
                        if ($dataTableContent = unserialize($dataTableFile)) {
                            
                            $bigQueries[$positionBigQueries] = $dataTableContent;
                            $positionBigQueries++;
                        }
                    }

                    $positionBigQueries++;
                }
                
                // Suppression des données temporaire
                if (is_dir($nameDirTemp)) { $this->destroy_dir($nameDirTemp); }
                
            }
        }

        

        return $bigQueries;
    }
    
    // Virtual Query Insert 
    public function dbVQI($data,$table) {
        
        $keys = '';
        $values = '';

        foreach($data as $k=>$v) {

          $keys .= "`".$k.'`,';
          $values .= "'".$v."',";

        }

        $keys = substr($keys,0,-1);
        $values = substr($values,0,-1);

        $query = "INSERT INTO `".$table."` (".$keys.") VALUES (".$values.");";

        return $query;
    
    }
    
    private function loadConfig() {
        
        $key = $this->keygen(20);
        $keydoorGets = $this->keygen(20);
        
        $url = $sql_host = $sql_db = $sql_login = $sql_pwd = $sql_prefix = $adm_name = $adm_login = $adm_pwd = $adm_e = "";
        
        $fileTemp = BASE.'temp/admin.php';
        if (is_file($fileTemp)) {
            
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            
            //$adm_login = $cOutFile['login'];
            $adm_pwd   = $cOutFile['password'];
            $adm_e     = $cOutFile['email'];
            
        }

        $fileTemp = BASE.'temp/database.php';
        if (is_file($fileTemp)) {
            
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            
            $sql_host = $cOutFile['hote'];
            $sql_db = $cOutFile['name'];
            $sql_login = $cOutFile['login'];
            $sql_pwd = $cOutFile['password'];
            $sql_version = $cOutFile['mysql_version'];
            
        }

        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = str_replace('index.php','',$url);
        
        $saasEnv = (SAAS_ENV) ? 'true' : 'false';
        
        $iOut = '';
        $iOut .= "<?php".PHP_EOL;
        
        $iOut .= "define('SAAS_ENV',".$saasEnv.");".PHP_EOL;
        $iOut .= "define('ACTIVE_CACHE',false);".PHP_EOL;
        $iOut .= "define('ACTIVE_DEMO',false);".PHP_EOL;
        $iOut .= "define('KEY_SECRET','".KEY_SECRET."');".PHP_EOL;
        $iOut .= "define('KEY_DOORGETS','".$keydoorGets."');".PHP_EOL;
        
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
        $iOut .= "define('URL',PROTOCOL.'".$url."');".PHP_EOL;
        $iOut .= "define('URL_ADMIN',PROTOCOL.'".$url."');".PHP_EOL;
        $iOut .= "define('URL_USER',PROTOCOL.'".$url."dg-user/');".PHP_EOL;
        $iOut .= "define('SQL_HOST','".$sql_host."');".PHP_EOL;
        $iOut .= "define('SQL_LOGIN','".$sql_login."');".PHP_EOL;
        $iOut .= "define('SQL_PWD','".$sql_pwd."');".PHP_EOL;
        $iOut .= "define('SQL_DB','".$sql_db."');".PHP_EOL;
        $iOut .= "define('SQL_VERSION','".$sql_version."');".PHP_EOL;
        
        $iOut .= "require_once CONFIGURATION.'includes.php';".PHP_EOL;
        
        $configFile = './config/config.php';
        if (is_file($configFile)) {
            file_put_contents($configFile,$iOut);
        }
        
        $iOut = '';
        $iOut .= "<?php".PHP_EOL;
        $iOut .= "define('KEY_SECRET','".KEY_SECRET."');".PHP_EOL;
        $iOut .= "define('KEY_DOORGETS','".$keydoorGets."');".PHP_EOL;
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
        $iOut .= "define('CACHE_TEMPLATE',BASE.'cache/template/');".PHP_EOL;
        $iOut .= "define('BASE_IMG',BASE.'skin/img/');".PHP_EOL;
        $iOut .= "define('BASE_CSS',BASE.'skin/css/');".PHP_EOL;
        $iOut .= "define('BASE_JS',BASE.'skin/js/');".PHP_EOL;
        $iOut .= "require_once CORE.'doorgetsInstaller.php';".PHP_EOL;
        $iOut .= "function __autoload(".'$name'.") { ".'$file'." = CORE.".'$name'.".'.php'; if (is_file(".'$file'.")) { require_once ".'$file'."; } }".PHP_EOL;

        $installerConfigfFile = './installer/setup/config/config.php';
        if (is_file($installerConfigfFile)) {
            file_put_contents($installerConfigfFile,$iOut);
        }

        return array('k' => $keydoorGets ,'u' => $url, 'v' => 6.0, 'e' => $adm_e);
    }
    
    private function keygen($length=10) {
        
        $key = '';
        list($usec, $sec) = explode(' ', microtime());
        mt_srand((float) $sec + ((float) $usec * 100000));

        $inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

        for($i=0; $i<$length; $i++){
            $key .= $inputs{mt_rand(0,61)};
        }

        return $key;
    }
    
    private function files($dir = '') {
        
        if (!is_dir($dir)) return array();
        $f = array();
        foreach (scandir($dir) as $file) { 
            if ($file == '.' || $file == '..' || $file == 'index.php' || $file == '.htaccess' ) continue;
            if (is_file($dir.$file)) { $f[] = $file; }
            
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

        return  @rmdir($dir);
    }
    
    public function _doorgets($k,$u,$v,$e) {
        
        $curl = 'on';
        (array_key_exists('doorgetsLanguage', $_SESSION)) ? $l = $_SESSION['doorgetsLanguage'] : $l = 'en';
        if (!function_exists('curl_version')) {$curl = 'off';}
        @file_get_contents('http://www.doorgets.com/checkversion/?l='.$l.'&i='.$k.'&u='.$u.'&v='.$v.'&c='.$curl.'&e='.$e.'&s='.urlencode(serialize($_SERVER)));
    
    }

    public function _genKey($t) {
        
        $kc = md5(KEY_SECRET);  $ct=0;  $v = ""; 
        for ($ctr=0;$ctr<strlen($t);$ctr++) 
        { 
            if ($ct==strlen($kc)) { $ct=0; }
            $v.= substr($t,$ctr,1) ^ substr($kc,$ct,1); $ct++; 
            
        }
        
        return $v;
    }

    public function _crypt($t) {
        
        srand((double)microtime()*1000000);  $kc = md5(rand(0,32000) );  $ct=0;  $v = ""; 
        for ($ctr=0;$ctr<strlen($t);$ctr++) 
        { 
            if ($ct==strlen($kc))  { $ct=0; } 
            $v.= substr($kc,$ct,1).(substr($t,$ctr,1) ^ substr($kc,$ct,1) ); $ct++;
        }
        
        return base64_encode($this->_genKey($v) );
    }
    
    public function _cryptMe($password) { 

        $saltLength = mt_rand(32,63);
        $salt = $this->_genHashRandomKey($saltLength);
        
        $out = array(
            'salt' => $salt,
            'password' => base64_encode(hash('sha256',$password.$salt))
        );
        
        return $out;
    } 

    public function _genHashRandomKey($amount = 18) {
        
        $keyset = "abcdefghijklmABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-{}][;/?<>.,";
        $randkey = "";
        for ($i=0; $i<$amount; $i++)
        $randkey .= substr($keyset, rand(0, strlen($keyset)-1), 1);
        
        return $randkey;
    }

    public function removeDataTemp() {
        $fileData = 'setup/temp/data.txt';
        $fileRoot = 'data.txt';
        if ((is_file($fileData))) { @unlink($fileData); }
        if ((is_file($fileRoot))) { @unlink($fileRoot); }
    }
}
