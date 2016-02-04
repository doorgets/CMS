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



class doorgetsBackupsIO extends Langue{
    
    public $installDB;
    
    protected $doorGets;

    protected $dataInfo  = array();

    public function __construct(&$doorGets,$dataInfo = array()) {
        
        $this->dataInfo = $dataInfo; 
        $this->doorGets = $doorGets; 
        $this->installDB = new DoDatabaseInstaller($doorGets);
        parent::__construct($doorGets->myLanguage);
    }
    
    public function genExport() {
        return $this->genExportMatrice();
    }
    
    public function doImport($file) {
        
        // Création d'une sauvegarde de récupération
        return $this->genImportMatrice($file);
    
    }
    
    private function genImportMatrice($file) {
        
        $ff=$file;
        $file = BASE.'io/'.$file;
        
        if (!is_file($file)) return false;
        $fileName = str_replace('.zip','',$ff);
        $contents = '';
        $configData = '';
        
        // Extraction des données de la databse vers un dossier Temp
        $nameDirTemp = BASE.'data/_temp/';
        if (!is_dir($nameDirTemp)) { @mkdir($nameDirTemp);}
        if (!is_dir($nameDirTemp.$fileName.'/')) { @mkdir($nameDirTemp.$fileName.'/');}
        $dirTempDatabase = $nameDirTemp.$fileName.'/';
        $dirToCopyAllDatas = BASE.'';


        // Récupération du fichier de configuration doorgets.php
        $zip = new ZipArchive;
        if ($res = $zip->open($file)) {
            
            $zip->extractTo($dirTempDatabase);
            $zip->close();
        }

        $contents = file_get_contents($dirTempDatabase.'database/doorgets.php');
        $configData  = unserialize($contents);
        
        if (!empty($configData) && is_array($configData)) {
            
            $sql_query_install = '';
            $dirDatabase = 'database/';
            
            //$this->doorGets->dbpdo = null;
            $db = new CRUDx();
            
            // Installation de la base de données
            $sqlToSave = array();
            foreach($configData as $k=>$v) {
                

                if (!empty($v['sql_create_table'])) {
                    
                    $query = $v['sql_create_table'];
                    $query = trim($query);

                    if (!empty($query)) {

                        $sql_query_install .= $query;
                        
                    }
                    
                }

                $dirDatabaseName = $dirTempDatabase.$dirDatabase.$k.'/';
                $allFiles = $this->files($dirDatabaseName);
                foreach($allFiles as $nameFile) {
                    
                    if (is_file($dirDatabaseName.$nameFile)) {
                         
                        $dataTableFile = file_get_contents($dirDatabaseName.$nameFile);
                        if ($dataTableContent = unserialize($dataTableFile)) {
                            
                            $sqlToSave[] = $dataTableContent;
                        }
                    }
                }
            }

            $db->dbQuery($sql_query_install);
            $db->dbpdo->commit();
            $db->dbpdo = null;

            foreach ($sqlToSave as $query) {
                
                if(!empty($query)) {

                    $db = new CRUD();
                    $db->dbQuery($query);
                    $db->dbpdo->commit();
                    $db->dbpdo = null;
                }
            }
            
            // Copie des fichiers doorGets
            $this->full_copy($dirTempDatabase.'doorgets/',BASE);

            // Suppression des données temporaire
            if (is_dir($nameDirTemp)) { $this->destroy_dir($nameDirTemp); }
            
        }
        
        FlashInfo::set($this->l("Votre sauvegarde est installée"));
        header("Location:./?controller=configuration&action=backups"); exit();
        
    }
    
    private function genExportMatrice() {
        
        $arrayCatInc = Constant::$modulesToExport;
        $arrayExclude = array('_dg_translator','_dg_translator_traduction','_dg_translator_version');

        include CONFIGURATION.'tables.php';
        
        $isAllModule = $this->dbQ("SELECT id,uri,type,extras FROM _modules ORDER BY id DESC LIMIT 200");
        $cAllModule = count($isAllModule);
        if (!empty($isAllModule)) {
            for($i=0;$i<$cAllModule;$i++) {
                if (in_array($isAllModule[$i]['type'],$arrayCatInc)) {
                    
                    $isAllModule[$i]['uri'] = $this->getRealUri($isAllModule[$i]['uri']);
                    $table['_m_'.$isAllModule[$i]['uri']]['count'] = 0;
                    $table['_m_'.$isAllModule[$i]['uri']]['type'] = $isAllModule[$i]['type'];
                    
                    switch($isAllModule[$i]['type']) {
                    
                        case 'faq':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlFaq($isAllModule[$i]['uri']);
                            break;
                        case 'partner':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlPartner($isAllModule[$i]['uri']);
                            break;
                        case 'image':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlImage($isAllModule[$i]['uri']);
                            break;
                        case 'video':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlVideo($isAllModule[$i]['uri']);
                            break;
                        case 'multipage':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlMultipage($isAllModule[$i]['uri']);
                            break;
                        case 'news':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlNews($isAllModule[$i]['uri']);
                            break;
                        case 'sharedlinks':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlSharedlinks($isAllModule[$i]['uri']);
                            break;
                        case 'blog':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlBlog($isAllModule[$i]['uri']);
                            break;
                        case 'genform':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlGenform($isAllModule[$i]['uri'],unserialize($isAllModule[$i]['extras']));
                            break;
                        case 'genform':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->installDB->createSqlGenform($isAllModule[$i]['uri'],unserialize($isAllModule[$i]['extras']));
                            break;
                        
                    }
                    if ($isAllModule[$i]['type'] !== 'genform') {

                        $table['_m_'.$isAllModule[$i]['uri'].'_traduction']['count'] = 0;
                        $table['_m_'.$isAllModule[$i]['uri'].'_traduction']['type'] = $isAllModule[$i]['type'].'_traduction';
                        $table['_m_'.$isAllModule[$i]['uri'].'_traduction']['sql_create_table'] = '';  

                        $table['_m_'.$isAllModule[$i]['uri'].'_version']['count'] = 0;
                        $table['_m_'.$isAllModule[$i]['uri'].'_version']['type'] = $isAllModule[$i]['type'].'_version';
                        $table['_m_'.$isAllModule[$i]['uri'].'_version']['sql_create_table'] = '';   

                    }                    
                }
            }
        }
        
        $timer = time();
        $tmpCode = uniqid()."_".$timer;

        // Création de l'archive zipper
        $filename   = "doorGets_backup_$tmpCode.zip";
        $zip_file   = BASE."io/$filename";
        $json_file   = BASE."io/doorGets_backup_$tmpCode.json";
        
        $zipArchive = new ZipDir();
        $resArchive = $zipArchive->open($zip_file, ZipArchive::CREATE);

        if ($resArchive === TRUE) {
            // Création de la copie de la database
            $zipArchive->addEmptyDir('database/');
            
            $groupBy = 500; 
            // Création des fichiers d'éxportation de la base
            foreach($table as $name_table=>$v) {
               
                if (!in_array($name_table,$arrayExclude)) {

                    $iTable = $this->dbQ('SELECT COUNT(*) as counter FROM '.$name_table);
                    $table[$name_table]['count'] = (int)$iTable[0]['counter'];
                    
                    $dirIoFile = 'database/'.$name_table.'/';
                    $zipArchive->addEmptyDir($dirIoFile);
                    
                    $totalPosition = 0;
                    if ($table[$name_table]['count'] > $groupBy) { 
                        
                        $totalPosition = ceil($table[$name_table]['count'] / $groupBy);
                    }

                    for($i=0;$i<($totalPosition+1);$i++) {

                        $initPos = ($i) ? ($groupBy * $i) : 0;
                        $valContent = $this->dbQA($name_table," LIMIT $initPos, $groupBy");
                        $sqlToSave = '';
                        $fileNameSaved = $dirIoFile.$name_table.'-'.$i.'.php';

                        if (!empty($valContent)) {
                            $cValContentcount = count($valContent);
                            
                            for ($j=0; $j < $cValContentcount; $j++) { 
                                
                                $sqlToSave .= $this->dbVQI($valContent[$j],$name_table);
                            }

                            $sqlToSaveSerialized = serialize($sqlToSave);
                            $zipArchive->addFromString( $fileNameSaved,$sqlToSaveSerialized );   
                        }
                    }
                }
            }

            $tableInfo = serialize($table);
            $zipArchive->addFromString( 'database/doorgets.php',$tableInfo );

            $zipArchive->addDir(BASE.'api', 'doorgets/api');
            $zipArchive->addDir(BASE.'ajax', 'doorgets/ajax');
            $zipArchive->addDir(BASE.'cache', 'doorgets/cache');
            $zipArchive->addDir(BASE.'config', 'doorgets/config');
            $zipArchive->addDir(BASE.'data', 'doorgets/data');
            $zipArchive->addDir(BASE.'dg-user', 'doorgets/dg-user');
            $zipArchive->addDir(BASE.'doorgets', 'doorgets/doorgets');
            $zipArchive->addDir(BASE.'installer', 'doorgets/installer');
            $zipArchive->addDir(BASE.'io', 'doorgets/io');
            $zipArchive->addDir(BASE.'rss', 'doorgets/rss');
            $zipArchive->addDir(BASE.'skin', 'doorgets/skin');
            $zipArchive->addDir(BASE.'t', 'doorgets/t');
            $zipArchive->addDir(BASE.'oauth2', 'doorgets/oauth2');
            $zipArchive->addDir(BASE.'themes', 'doorgets/themes');
            $zipArchive->addDir(BASE.'update', 'doorgets/update');
            $zipArchive->addDir(BASE.'u', 'doorgets/u');

            $zipArchive->addFile(BASE.'index.php', 'doorgets/index.php');
            $zipArchive->addFile(BASE.'favicon.ico', 'doorgets/favicon.ico');

            $zipArchive->close();

        }

        // Create json file for infos
        $this->dataInfo['file'] = $filename;

        if (file_put_contents($json_file,json_encode($this->dataInfo,JSON_PRETTY_PRINT))){
            return true;
        }

        return false;
        
    }
    
    public function full_copy( $source, $target ) {
        
        if ( is_dir( $source ) ) {
             @mkdir( $target , 0777, true);
            $d = dir( $source );
            while ( FALSE !== ( $entry = $d->read() ) ) {
                if ( $entry == '.' || $entry == '..' ) {
                    continue;
                }
                $Entry = $source . '/' . $entry; 
                if ( is_dir( $Entry ) ) {
                    $this->full_copy( $Entry, $target . '/' . $entry );
                    continue;
                }
                copy( $Entry, $target . '/' . $entry );
            }
    
            $d->close();
        }else {
            copy( $source, $target );
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
