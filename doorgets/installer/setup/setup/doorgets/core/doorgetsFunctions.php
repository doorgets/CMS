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

class doorgetsFunctions {


    public function isOneclickInstaller() {

        $params = $this->Params;
        return (array_key_exists('oneclick', $params['POST']))
            ? true : false;

    }

    public function getProvider() {
        return array(
            'nodatabase' => array(
                'required' => false,
                'type' => 'boolean',
                'size' => 10,
                'default' => false
            ),
            'langue' => array(
                'required' => false,
                'type' => 'text',
                'size' => 2,
                'default' => 'en'
            ),
            'timezone' => array(
                'required' => false,
                'type' => 'text',
                'size' => 5,
                'default' => 'Europe/Paris'
            ),
            'database_host' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'database_name' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'database_login' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'database_password' => array(
                'required' => false,
                'type' => 'text',
                'size' => 255
            ),
            'website_title' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'website_slogan' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'website_copyright' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'website_meta_keywords' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'website_meta_description' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
            'website_year_creation' => array(
                'required' => true,
                'type' => 'int',
                'size' => 4
            ),
            'user_email' => array(
                'required' => true,
                'type' => 'email',
                'size' => 255
            ),
            'user_password' => array(
                'required' => true,
                'type' => 'text',
                'size' => 255
            ),
        );
    }

    public function getFormDataFromProvider(){

        $provider = $this->getProvider();
        $formParams = $this->Params['POST'];

        if (array_key_exists('fromJson', $formParams) ) {
            $formParams['fromJson'] = html_entity_decode($formParams['fromJson']);
            $isJson = $this->isJson($formParams['fromJson']);

            if($isJson !== true) {
                $this->_errorJson($isJson);
            } 

            $formParams = json_decode($formParams['fromJson'],true);

            if (empty($formParams)) {
                $this->_errorJson('No data');
            }
        }

        $out['success'] = array();
        foreach ($formParams as $key => $value) {
            
            if (array_key_exists($key,$provider)) {
                $out['success'][$key] = $value;
            }
        }

        $out['error'] = array();
        foreach ($provider as $key => $value) {
            
            if ($value['required'] && !array_key_exists($key,$out['success'])) {
                $out['error'][$key] = 'Not found';
            }

            if ($value['required'] && empty($out['success'][$key]) && !array_key_exists($key, $out['error'])) {
                $out['error'][$key] = 'Empty';
            }

            if ($value['required'] && !array_key_exists($key,$out['error'])) {
                
                $finalValue = $out['success'][$key];

                switch ($value['type']) {
                    case 'int':
                        if (!is_int($finalValue)) {
                            $out['success'][$key] = (int) $finalValue;
                        }
                        break;
                    case 'email':
                        if (!filter_var($finalValue, FILTER_VALIDATE_EMAIL)) {
                            $out['error'][$key] = 'Type: email';;
                        }
                        break;
                    case 'url':
                        if (!filter_var($finalValue, FILTER_VALIDATE_URL)) {
                            $out['error'][$key] = 'Type: url';;
                        }
                        break;
                    case 'varchar':
                        if (!is_string($finalValue) && strlen($finalValue) > 255) {
                            $out['error'][$key] = 'Type: varchar max 255';
                        }
                        break;
                    case 'text':
                        if (!is_string($finalValue)) {
                            $out['error'][$key] = 'Type: text';
                        }
                        break;
                    case 'boolean':
                        if (!is_bool($finalValue)) {
                            $out['error'][$key] = 'Type: text';
                        }
                        break;
                }

            } else {
                if (array_key_exists('default', $value) && empty($out['success'][$key])) {
                    $out['success'][$key] = $value['default']; 
                }
            }
        }

        return $out;
    }

    public function _errorJson($errorResponse, $errors = array()) {

        header("Content-type: application/json; charset=utf-8");
        
        $return = json_encode(
            array(
                'success'   =>  false,
                'response'  =>  $errorResponse,
                'errors'    => $errors
            )
        );
        echo $return; exit();
    }

    public function _successJson($successResponse) {

        header("Content-type: application/json; charset=utf-8");
        
        $return = json_encode(
            array(
                'success'   =>  true,
                'response'  =>  $successResponse
            )
        );
        echo $return; exit();
    }
    
    public function installDatabase($data) {

        $this->createDatabase($data);

        $adm_email = $data['user_email'];

        $sql_host   = $data['database_host'];
        $sql_db     = $data['database_name'];
        $sql_login  = $data['database_login'];
        $sql_pwd    = $data['database_password'];
        $mysql_version    = $data['mysql_version'];
            
        $this->getSQLQueryToImport($sql_host,$sql_db,$sql_login,$sql_pwd,$mysql_version);
        return true;
    }

    public function updateDatabase($data = array()){

        $adm_email = $data['user_email'];

        $sql_host   = $data['database_host'];
        $sql_db     = $data['database_name'];
        $sql_login  = $data['database_login'];
        $sql_pwd    = $data['database_password'];
            
        $db = new CRUD($sql_host,$sql_db,$sql_login,$sql_pwd);
        
        $dataTrad['title']              = $data['website_title'];
        $dataTrad['slogan']             = $data['website_slogan'];
        $dataTrad['description']        = $data['website_meta_description'];
        $dataTrad['copyright']          = $data['website_copyright'];
        $dataTrad['year']               = $data['website_year_creation'];
        $dataTrad['keywords']           = $data['website_meta_keywords'];
        $dataTrad['date_modification']  = time();

        $fileTempUser = BASE.'temp/_fromUser.php';
        if (is_file($fileTempUser)) {
            
            $dataFileUser = file_get_contents($fileTempUser);
            if ($dataUser = unserialize($dataFileUser)) {

                $dataUserId = $dataUser['user_id']; 
                
                $login      = $data['user_email'];
                
                $crypto = $this->_cryptMe($data['user_password']);

                $queryUser['login']     = $login;
                $queryUser['password']  = $crypto['password'];
                $queryUser['salt']      = $crypto['salt'];

                $db->dbQU($dataUserId,$queryUser,'_users');

                $queryUserInfo['email']     = $login;
                $queryUserInfo['langue']    = $data['langue'];
                
                $db->dbQU($dataUserId,$queryUserInfo,'_users_info');

                $arrGroupeLangue = array();
                foreach($this->allLanguages as $key_language=>$label) {
                    
                    $dataTrad['langue'] = $key_language;
                    $db->dbQD($key_language,'_website_traduction','langue','=','');
                    $arrGroupeLangue[$data['langue']] = $db->dbQI($dataTrad,'_website_traduction');
                }

                
                $dataWebsite['version_doorgets']    = '7.0';
                $dataWebsite['langue']              = $data['langue'];
                $dataWebsite['langue_front']        = $data['langue'];
                $dataWebsite['langue_groupe']       = serialize(array($data['langue'] => $data['langue']));
                $dataWebsite['horaire']             = $data['timezone'];
                $dataWebsite['email']               = $adm_email;

                $db->dbQU(1,$dataWebsite,'_website');

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
    
    private function getSQLQueryToImport($sql_host,$sql_db,$sql_login,$sql_pwd,$mysql_version) {
        
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

                try {
                    
                    $db = Connexion::getInstance($sql_host,$sql_db,$sql_login, $sql_pwd)->getConnexion();

                    // $default_charset = 'utf8';
                    // $default_collation = 'utf8_general_ci';

                    // if ($mysql_version > '5.5.3') {
                    //     $default_charset = 'utf8mb4';
                    //     $default_collation = 'utf8mb4_general_ci';
                    // } 

                    // $db->query("SET NAMES '$default_charset' COLLATE '$default_collation';");
                    // Installation de la base de données
                    $queries = '';
                    foreach($configData as $k=>$v) {

                        if (!empty($v['sql_create_table'])) {
                            
                            $query = str_replace("\n",' ',$v['sql_create_table']);
                            $query = str_replace("\t",'',$query);
                            $query = str_replace("\r",'',$query);
                            
                            //$bigQueries['create'] .= $query;
                            $queries .= $query;
                            
                        }    
                    }

                    $db->exec($queries);

                    // Installation de la base de données
                    foreach($configData as $k=>$v) {
                        
                        $dirDatabaseName = $dirTempDatabase.'database/'.$k.'/';
                        $allFiles = $this->files($dirDatabaseName);
                        foreach($allFiles as $nameFile) {
                            
                            if (!empty($queries)) {
                                $db->exec(file_get_contents($dirDatabaseName.$nameFile));
                            }
                        }
                    }
                }
                catch (PDOException $e){
                    //echo "DataBase Errorz: " .$e->getMessage() .'<br>'; exit();
                }
                catch (Exception $e) {
                    //echo "General Errorz: ".$e->getMessage() .'<br>'; exit();
                }
                // Suppression des données temporaire
                if (is_dir($nameDirTemp)) { $this->destroy_dir($nameDirTemp); }
                
            }
        }
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
    
    private function loadConfig($data = array()) {
        
        $key = $this->keygen(20);
        $keydoorGets = $this->keygen(20);
        
        $url = $sql_host = $sql_db = $sql_login = $sql_pwd = $sql_prefix = $adm_name = $adm_login = $adm_pwd = $adm_e = $mysql_version = "";
        
        $adm_e = $data['user_email'];
        $adm_pwd = $data['user_password'];

        $sql_host   = $data['database_host'];
        $sql_db     = $data['database_name'];
        $sql_login  = $data['database_login'];
        $sql_pwd    = $data['database_password'];
        $mysql_version    = $data['mysql_version'];

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
        $iOut .= "define('SQL_VERSION','".$mysql_version."');".PHP_EOL;
        
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
        chmod($dir, 0777);
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
    
    public function installByOneclick($data) {


        $isCreatedQuery = true;
        if (!$data['nodatabase']) {
            $isConnected = $this->isConnectedToDatabase($data['database_host'],$data['database_name'],$data['database_login'], $data['database_password']);
                
            if (empty($isConnected)) {
                $isCreatedQuery = false;
            } else {
                $data['mysql_version'] = $isConnected;
                $this->createDatabase($data);
                $isCreatedQuery = $this->installDatabase($data);
            }
        } else {
            $isCreatedQuery = true;
        }
        
        
        if ($isCreatedQuery) {
            
            $this->extractDoorgets();
            $z = $this->loadConfig($data);

            $this->updateDatabase($data);
            
            //$this->destroy_dir(BASE);
            $this->_doorgets($z['k'],$z['u'],$z['v'],$z['e']);
            
            return $isCreatedQuery;
            
        }

        return $isCreatedQuery;
    }

    public function isConnectedToDatabase($host="localhost",$database="",$login="root",$pwd="") {
        
        try {
            $conn = new PDO(
                "mysql:host=".$host.";", 
                $login, 
                $pwd
            );
            $version = $conn->query('select version()')->fetchColumn();
            $version = mb_substr($version, 0, 6);
        }
        catch (PDOException $e){
            $conn = null;
            return false;
        }
        catch (Exception $e) {
            $conn = null;
            return false;
        }
        
        $conn = $version;
        return true;
        
    }

    public function getNeededApacheModulesAndPHPExtensions(){

        $out = array();

        if (function_exists('get_loaded_extensions')) {

            $ext = get_loaded_extensions();
            $extensionsNeeded = array(
                'pdo_mysql',
                'json',
                'zip',
                'gd',
                'date',
                'hash',
                'SimpleXML'
            );

            foreach ($extensionsNeeded as $extName) {
                if (!in_array($extName,$ext)) {
                    $out[] = $extName." php extension not found!";
                }
            }
        }
        
        if (function_exists('apache_get_modules')) {

            $mod = apache_get_modules();

            $apacheNeeded = array(
                'mod_rewrite',
            );
            foreach ($apacheNeeded as $moduleName) {
                if (!in_array($moduleName,$mod)) {
                    $out[] = $moduleName." apache module not found!";
                }
            }

        }

        return $out;
    }

    public function isJson($string) {

        // decode the JSON data
        $result = json_decode($string);

        // switch and check possible JSON errors
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $error = ''; // JSON is valid // No error has occurred
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
            // PHP >= 5.3.3
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_RECURSION:
                $error = 'One or more recursive references in the value to be encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_INF_OR_NAN:
                $error = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }

        if ($error !== '') {
            // throw the Exception or exit // or whatever :)
            return $error;
        }

        // everything is OK
        return true;
    }

    public function createDatabase($data) {

        if (!is_array($data)) {
            return false;
        }
        
        $sql_host   = $data['database_host'];
        $sql_db     = $data['database_name'];
        $sql_login  = $data['database_login'];
        $sql_pwd    = $data['database_password'];
        $mysql_version = $data['mysql_version'];

        $default_charset = 'utf8';
        $default_collation = 'utf8_general_ci';

        if ($mysql_version > '5.5.3') {
            $default_charset = 'utf8mb4';
            $default_collation = 'utf8mb4_general_ci';
        } 

        try {
            $dbh = new PDO("mysql:host=".$sql_host, $sql_login, $sql_pwd);
            $createTable    =   $dbh->query("CREATE DATABASE IF NOT EXISTS `$sql_db` DEFAULT CHARACTER SET $default_charset COLLATE $default_collation;");
            $dbh->exec("
                GRANT ALL PRIVILEGES ON `$sql_db`.* TO '$sql_login'@'$sql_host' WITH GRANT OPTION;
                FLUSH PRIVILEGES;
            ");
            $dbh = null;
            $out  = true;
        } catch (PDOException $e) {
            $out  = false;
        }
    }
}