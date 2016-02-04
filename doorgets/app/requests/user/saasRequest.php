<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


class SaasRequest extends doorGetsUserRequest{
    
    public $dev = false;

    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }

    public function doAction() {
        
        $out = '';
        $tableName = '_dg_saas';
        $User = $this->doorGets->user;
        $controllerName = 'saas';

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$tableName);
            if (empty($isContent)) {
                header('Location:./?controller='.$controllerName); exit();
            }
        }
        
        switch($this->Action) {
            
            case 'index':
                break;
            
            case 'add':
                
                $time = time();
                $msgInfo = "Veuillez remplir correctement le formulaire";

                if (!empty($this->doorGets->Form->i) && $User['saas_options']['saas_add']) {
                    
                    $this->doorGets->checkMode();
                    
                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v)) {
                            $this->doorGets->Form->e[$controllerName.'_add_'.$k] = 'ok';
                        }
                    }

                    $subdomaine = strtolower($this->doorGets->Form->i['domain']);
                    $lenSub = strlen($subdomaine);
		            $isDomainExist = $this->doorGets->dbQS($subdomaine,$tableName,'domain');
                    if (!empty($isDomainExist) || $lenSub > 16) {
                        
                        $this->doorGets->Form->e[$controllerName.'_add_domain'] = 'ok';
                    }

                    $isValidDomain = $this->isValidDomain($subdomaine);
                    if (!$isValidDomain && !array_key_exists($controllerName.'_add_domain',$this->doorGets->Form->e)) {
                        $msgInfo = "Cette adresse est déja utilisée";
                        $this->doorGets->Form->e[$controllerName.'_add_domain'] = 'ok';
                    }

                    if (empty($this->doorGets->Form->e )) {
                        
                        $saasWebsite = new DgSaasEntity(array(),$this->doorGets);
                        $saasWebsite->setData($this->doorGets->Form->i);
			            $saasWebsite->setDomain($subdomaine);
                        $saasWebsite->setPseudo($User['pseudo']);
                        $saasWebsite->setIdUser($User['id']);
                        $saasWebsite->setIdGroupe($User['groupe']);
                        $saasWebsite->setLangue($this->doorGets->Form->i['language']);
                        $saasWebsite->setTimezone($this->doorGets->Form->i['time_zone']);
                        $saasWebsite->setDateCreation($time);
                        $saasWebsite->setDateModification($time);
                        $saasWebsite->save();
                        
                        //$isInstalledDatabase = $this->cloneDatabase('d611',$subdomaine);
                        //$isClonedFiles = $this->cloneFiles($subdomaine);
                        $this->installNewWebsite(
                            $subdomaine,
                            $saasWebsite,
                            $this->doorGets->Form->i['password'],
                            $this->doorGets->Form->i['language'],
                            $this->doorGets->Form->i['time_zone']
                        );
                        
                        $this->configSaas($subdomaine);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller='.$controllerName.'&action=edit&id='.$saasWebsite->getId()); exit();
                    }

                    FlashInfo::set($this->doorGets->__($msgInfo),"error");
                    
                }
                
                break;
            
            case 'edit':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller='.$controllerName); exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && $User['saas_options']['saas_delete']) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $saasWebsite = new DgSaasEntity($isContent['id'],$this->doorGets);
                        $saasWebsite->delete();

                        $this->removeWebsite($isContent['domain']);
                        
                        FlashInfo::set($this->doorGets->__("Le site a été corréctement supprimer"));
                        header('Location:./?controller='.$controllerName); exit();
                        
                    }
                }
                
                break;
            
        }
    }

    private function removeWebsite($subdomaine) {

        $zip = new ZipArchive;

        $host  = $hostRec  = $dbHost   =   $this->doorGets->configWeb['saas_host']; 

        $root           = $this->doorGets->configWeb['saas_user']; 
        $root_password  = $this->doorGets->configWeb['saas_password']; 

        $user   = $subdomaine;
        $pass   = 'doorgets';

        $db     = "$user"; 
        $path   = BASE.$this->doorGets->configWeb['saas_position'].$user;
        $dgZip  = BASE.$this->doorGets->configWeb['saas_archive'];

        $this->destroy_dir($path);
        
        try {
            $dbh = new PDO("mysql:host=$host", $root, $root_password);
            //   var_dump($dbh);

            $dbh->exec("
                DROP DATABASE `$db`;
                DROP USER '$user'@'$host';
                FLUSH PRIVILEGES;
            ") or die(print_r($dbh->errorInfo(), true));


        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
            //var_dump($e);
        }

    }

    public function cloneDatabase($database,$newDatabase){

        $host       =   $this->doorGets->configWeb['saas_host']; 
        $root           = $this->doorGets->configWeb['saas_user']; 
        $root_password  = $this->doorGets->configWeb['saas_password']; 

        try {

            $dbh = new PDO("mysql:host=$host", $root, $root_password);

            $dbh->exec("USE $database"); 
            $getTables  =   $dbh->query("SHOW TABLES");   
            $tables =   array();
            
            $array_selection = array();
            $imax = $getTables->columnCount();;
            while ($verif_reqs = $getTables->fetch(PDO::FETCH_ASSOC)) {
                for($i =0; $i < $imax; $i++) {
                    $meta = $getTables->getColumnMeta($i);
                    $name = $meta['name'];
                    $tables[]   =   $verif_reqs[$name];
                }
            }
            
            $createTable    =   $dbh->query("CREATE DATABASE IF NOT EXISTS `$newDatabase` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;") or die(print_r($dbh->errorInfo(), true));
            $dbh->exec("USE $newDatabase"); 

            foreach($tables as $cTable){
                
                $create     =   $dbh->query("CREATE TABLE $cTable LIKE ".$database.".".$cTable);
                if(!$create) {
                    $error  =   true;
                }
                $insert     =   $dbh->query("INSERT INTO $cTable SELECT * FROM ".$database.".".$cTable);
            }

            $dbh->exec("
                GRANT ALL PRIVILEGES ON `$newDatabase`.* TO '$root'@'$host' WITH GRANT OPTION;
                FLUSH PRIVILEGES;
            ");
        
        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }

        return !isset($error) ? true : false;
    }

    public function cloneFiles($subdomain) {

        $zip = new ZipArchive;
        
        $path   = BASE.$this->doorGets->configWeb['saas_position'].$subdomain;
        $dgZip  = BASE.$this->doorGets->configWeb['saas_archive'];

        if (!mkdir($path)) {
            return false;
        }

        if( chmod($path, 0777) ) { chmod($path, 0755); } 
        if ($zip->open($dgZip) === TRUE) { $zip->extractTo($path); $zip->close(); } else { return false; }
        if( chmod($path, 0777) ) { chmod($path, 0755); } 

    }

    private function installNewWebsite($subdomaine,$saasWebsite,$password,$langue,$timezone) {

        $zip = new ZipArchive;

        $host  = $hostRec  = $dbHost   =   $this->doorGets->configWeb['saas_host']; 

        $root           = $this->doorGets->configWeb['saas_user']; 
        $root_password  = $this->doorGets->configWeb['saas_password']; 

        $user   = $subdomaine;
        $pass   = $this->doorGets->_genRandomKey(30);

        $db     = "$user"; 
        $path   = BASE.$this->doorGets->configWeb['saas_position'].$user;
        $dgZip  = BASE.$this->doorGets->configWeb['saas_archive'];

        if (!is_file($dgZip)) { die($dgZip.' not found'); }

        $dgPassword = $password;

        try {

            $dbh = new PDO("mysql:host=$host", $root, $root_password);

            $dbh->exec("
                CREATE DATABASE IF NOT EXISTS `$db` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
                GRANT ALL PRIVILEGES ON `$db`.* TO '$root'@'$host' WITH GRANT OPTION;
                FLUSH PRIVILEGES;
                CREATE USER '$user'@'$host' IDENTIFIED BY '$pass';
                GRANT ALL PRIVILEGES ON `$db`.* TO '$user'@'$host' WITH GRANT OPTION;
                FLUSH PRIVILEGES;
            "); // or die(print_r($dbh->errorInfo(), true));

        } catch (PDOException $e) {
            //die("DB ERROR: ". $e->getMessage());
        }

        mkdir($path);
        if( chmod($path, 0777) ) { chmod($path, 0755); } 
        if ($zip->open($dgZip) === TRUE) { $zip->extractTo($path); $zip->close(); } else { die('zip not found'); }
        if( chmod($path, 0777) ) { chmod($path, 0755); } 

        //extract data from the post
        $fields_string = '';

        //set POST variables
        $domaine = str_replace(array('http://','https://','builder.','www.','v1/'), '', URL);
        $url = PROTOCOL.$domaine.$this->doorGets->configWeb['saas_position'].$user.'/';

        $fields = array(
            "nodatabase" => false,
            "oneclick" => true, 
            "database_host" => $dbHost,
            "database_name" => $db,
            "database_login" => $db,
            "database_password" => $pass,
            "website_title" => $saasWebsite->getTitle(),
            "website_slogan" => $saasWebsite->getSlogan(),
            "website_copyright" => $saasWebsite->getCopyright(),
            "website_meta_keywords" => $saasWebsite->getKeywords(),
            "website_meta_description" => $saasWebsite->getDescription(),
            "website_year_creation" => date('Y',time()),
            "user_email" => $saasWebsite->getEmail(),
            "user_password" => $dgPassword,
            "langue" => $langue,  
            "timezone" => $timezone
        );

        if ($this->dev) {
            $fields["database_login"] = 'root';
            $fields["database_password"] = 'root';
        }

        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        ob_start(); 

        //open connection
        $ch = curl_init();
        //echo $url;
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);

        $returnFromCurl = ob_get_clean();

	    return $result;
    }

    public function configSaas($subdomaine) {

        $userConfig = BASE.$this->doorGets->configWeb['saas_position'].$subdomaine.'/config/';

        $configFile = $userConfig.'config.php';
        $saasFile = $userConfig.'saas.php';

        if (file_exists($configFile) && file_exists($saasFile)) {
            $config = file_get_contents($configFile);
            $config = str_replace("define('SAAS_ENV',false);", "define('SAAS_ENV',true);", $config);
            file_put_contents($configFile, $config);

            $configSaas = "<?php".PHP_EOL;
            foreach ($this->doorGets->user['saas_options']['saas_constant'] as $key => $value) {
                if (is_bool($value)) {
                    $value = ($value)?'true':'false';
                }
                $configSaas .= "define('$key',$value);".PHP_EOL;
            }      
            file_put_contents($saasFile, $configSaas);      
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

    public function dbVQU($id,$data,$table,$fieldId="id",$other=' LIMIT 1 ',$equ="=") {
        
        $d = "UPDATE ".$table." SET ";
        foreach($data as $k=>$v) {
            $d .= $k." = '".$v."', ";
        }
        $d = substr($d,0,-2);
        $d .= " WHERE ".$fieldId." ".$equ." '$id' $other ;";
        
        return $d;
    }

    private function isValidDomain($domain){

        $realName = $domain;
        $out = $isValidName = $isValidFolder = false;
        if (!is_string($domain)) {return $out;}

        $lenUri = strlen($domain);

        $domain = str_replace('-', '', $domain);
        $isUriValid = ctype_alnum($domain);

        if ($isUriValid) {
            $isValidName = true;
        }

        if (!is_dir(BASE.$this->doorGets->configWeb['saas_position'].$realName)) {
            $isValidFolder = true;
        }

        if ($isValidFolder && $isValidName) {
            $out = true;
        }
        return $out;
    }


}
