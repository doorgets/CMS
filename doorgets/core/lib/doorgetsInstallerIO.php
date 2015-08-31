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



class doorgetsInstallerIO extends Langue{
    
    use TraitDatabaseInstaller;
    
    protected $doorGets;

    protected $dataInfo  = array();

    public function __construct(&$doorGets,$dataInfo) {
        
        $this->dataInfo = $dataInfo; 
        $this->doorGets = $doorGets;    
        parent::__construct($doorGets->myLanguage);
    }
    
    public function genExport() {
        return $this->genExportMatrice();
    }  
    
    private function genExportMatrice() {
        
        $arrayCatInc = array('blog','news','multipage','video','image','faq','partner','genform','sharedlinks');
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
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlFaq($isAllModule[$i]['uri']);
                            break;
                        case 'partner':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlPartner($isAllModule[$i]['uri']);
                            break;
                        case 'image':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlImage($isAllModule[$i]['uri']);
                            break;
                        case 'video':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlVideo($isAllModule[$i]['uri']);
                            break;
                        case 'multipage':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlMultipage($isAllModule[$i]['uri']);
                            break;
                        case 'news':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlNews($isAllModule[$i]['uri']);
                            break;
                        case 'sharedlinks':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlSharedlinks($isAllModule[$i]['uri']);
                            break;
                        case 'blog':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlBlog($isAllModule[$i]['uri']);
                            break;
                        case 'genform':
                            $table['_m_'.$isAllModule[$i]['uri']]['sql_create_table'] = $this->createSqlGenform($isAllModule[$i]['uri'],unserialize($isAllModule[$i]['extras']));
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
        $filename   = "doorGets_CMS_7.0_$tmpCode.zip";
        $zip_file   = BASE."installer/$filename";
        $json_file   = BASE."installer/doorGets_CMS_7.0_$tmpCode.json";
        $zip_file_doorgets = BASE."installer/doorgets.zip.$tmpCode";
        $zip_file_database = BASE."installer/database.zip.$tmpCode";
        
        $zipdoorGets = new ZipDir();
        $resdoorGets = $zipdoorGets->open($zip_file_doorgets, ZipArchive::CREATE);
        
        if ($resdoorGets === TRUE) {

            $zipdoorGets->addDir(BASE.'api', 'api');
            $zipdoorGets->addDir(BASE.'ajax', 'ajax');
            $zipdoorGets->addDir(BASE.'cache', 'cache');
            $zipdoorGets->addDir(BASE.'config', 'config');
            $zipdoorGets->addDir(BASE.'data', 'data');
            $zipdoorGets->addDir(BASE.'dg-user', 'dg-user');
            $zipdoorGets->addDir(BASE.'doorgets', 'doorgets');
            $zipdoorGets->addDir(BASE.'installer', 'installer');
            $zipdoorGets->addDir(BASE.'io', 'io');
            $zipdoorGets->addDir(BASE.'rss', 'rss');
            $zipdoorGets->addDir(BASE.'skin', 'skin');
            $zipdoorGets->addDir(BASE.'t', 't');
            $zipdoorGets->addDir(BASE.'oauth2', 'oauth2');
            $zipdoorGets->addDir(BASE.'themes', 'themes');
            $zipdoorGets->addDir(BASE.'update', 'update');
            $zipdoorGets->addDir(BASE.'u', 'u');

            //$zipdoorGets->addFile(BASE.'Table2Model.php', 'Table2Model.php');
            //$zipdoorGets->addFile(BASE.'cmd.php', 'cmd.php');
            $zipdoorGets->addFile(BASE.'404.php', '404.php');
            $zipdoorGets->addFile(BASE.'index.php', 'index.php');
            $zipdoorGets->addFile(BASE.'.htaccess', '.htaccess');
            $zipdoorGets->addFile(BASE.'favicon.ico', 'favicon.ico');

            $zipdoorGets->close();

        }

        $zipDatabase = new ZipDir();
        $resDatabase = $zipDatabase->open($zip_file_database, ZipArchive::CREATE);

        if ($resDatabase === TRUE) {
            // Création de la copie de la database
            $zipDatabase->addEmptyDir('database/');
            
            $groupBy = 1000; 
            // Création des fichiers d'éxportation de la base
            foreach($table as $name_table=>$v) {
               
                if (!in_array($name_table,$arrayExclude)) {

                    $iTable = $this->dbQ('SELECT COUNT(*) as counter FROM '.$name_table);
                    $table[$name_table]['count'] = (int)$iTable[0]['counter'];
                    
                    $dirIoFile = 'database/'.$name_table.'/';
                    $zipDatabase->addEmptyDir($dirIoFile);
                    
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
                            $zipDatabase->addFromString( $fileNameSaved,$sqlToSaveSerialized );   
                        }
                    }
                }
            }

            $tableInfo = serialize($table);
            $zipDatabase->addFromString( 'database/doorgets.php',$tableInfo );

            $zipDatabase->close();
        }

        $zipArchive = new ZipDir();
        $res = $zipArchive->open($zip_file, ZipArchive::CREATE);
        if ($res === TRUE) {
            
            $userInformation = serialize(array(
                'user_id' => $this->doorGets->user['id'],
                'pseudo' => $this->doorGets->user['pseudo']
            ));
            
            $zipArchive->addFromString('setup/temp/_fromUser.php',$userInformation);
                
            $zipArchive->addDir(BASE.'doorgets/installer/setup/setup/', 'setup');
            $zipArchive->addFile(BASE.'doorgets/installer/setup/index.php', 'index.php');

            $zipArchive->addFile($zip_file_doorgets, 'setup/data/doorgets.zip');
            $zipArchive->addFile($zip_file_database, 'setup/data/database.zip');
            
            $zipArchive->close();

        }

        if (is_file($zip_file_doorgets)) {
            unlink($zip_file_doorgets);
        }

        if (is_file($zip_file_database)) {
            unlink($zip_file_database);
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
}
