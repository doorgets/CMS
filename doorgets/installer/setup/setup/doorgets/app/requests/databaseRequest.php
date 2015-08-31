<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
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

class databaseRequest extends doorgetsRequest{
    
    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets);
        
    }
    
    public function indexAction() {
        
        $isConnected = false;
        
        $actionName = $this->doorgets->getStep();
        
        $form = $this->doorgets->form['doorgets_'.$actionName]  = new Formulaire('doorgets_'.$actionName);
        
        if (!empty($form->i) && empty($form->e) )
        {
            $StepsList = $this->doorgets->getStepsList();
            $iPos = 1; $pos = array_keys($StepsList,$actionName);
            if (!empty($pos)) { $pos = (int)$pos[0]; }
            
            if (empty($form->i['hote']) )
            {
                $form->e['doorgets_database_hote'] = "ok";
            }
            if (empty($form->i['login']) )
            {
                $form->e['doorgets_database_login'] = "ok";
            }
            if (empty($form->i['name']) )
            {
                $form->e['doorgets_database_name'] = "ok";
            }
            
            
            if (empty($form->e)) {
                
                $isConnected = $this->isConnectedToDatabase($form->i['hote'],$form->i['name'],$form->i['login'],$form->i['password']);
                
            }
            
            if ($isConnected) {
                if ($pos <= count($StepsList)) {
                    
                    $fileTemp = BASE.'temp/database.php';
                    $isDatabaseConnect = serialize($form->i);
                    file_put_contents($fileTemp,$isDatabaseConnect);
                    
                    $databaseIsInsalled = $this->installDatabase();

                    if($databaseIsInsalled) {
                        $nexPos = $pos + 1;
                        $this->doorgets->setStep($StepsList[$nexPos]);
                    }
                    
                    header("Location:".$_SERVER['REQUEST_URI']); exit();            
                }                
            }
            
        }
    }
    
    public function installDatabase() {

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
                
                $db = new CRUD($sql_host,$sql_db,$sql_login,$sql_pwd);
                 
                $bigQueries = $this->getSQLQueryToImport();
                        
                if (!empty($bigQueries)) {

                    if(array_key_exists('create', $bigQueries)) {
                        $db->dbQL($bigQueries['create']);
                        unset($bigQueries['create']);
                    }
                    
                    foreach ($bigQueries as $bigquery) {

                        if (!empty($bigquery)) {

                            $db->dbQL($bigquery);
                        }
                    }

                    return true;
                }
            }

            return false;
        }
    }

    private function getSQLQueryToImport() {


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
    
    private function isConnectedToDatabase($host="localhost",$database="",$login="root",$pwd="") {
        
        try{
            
            $con = @mysql_connect($host,$login,$pwd);
            if (!empty($con)) {
                
                $db_selected = mysql_select_db($database, $con);
                if ($db_selected) {
                   return true;
                }
                
            }
            
            return false;
            
        }catch(Exception $e) {  }
        
    }
    
}