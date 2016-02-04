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


class ThemeRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        
        $isAllTheme = $this->doorGets->getAllThemesName();
        $nameTheme  = $this->doorGets->configWeb['theme'];

        $controllerName = 'theme';
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (
           ( $this->Action === 'edit' || $this->Action === 'delete'  )
           && !array_key_exists('name',$params['GET'])
       ) {
            
            header('Location:./?controller='.$controllerName); exit();
            
        }
        $fileSelectedTo = '';
        $jsSAAS = $tplSAAS = false;
        if (array_key_exists('name',$params['GET'])) {
            
            $name = $params['GET']['name'];
            if (!in_array($name,$isAllTheme)) {
                header('Location:./?controller='.$controllerName); exit();
            }

            $themeListe = $this->doorGets->listThemeFiles($name);

            $fileContent = $urlFile = '';
            $fileSelected = $nameTheme.'/css/doorgets.css';
            
            if (array_key_exists('file',$params['GET'])) {
                
                $fileSelected = $params['GET']['file'];
            }

            if (array_key_exists($fileSelected,$themeListe['js'])) {
                
                $fileContent = @file_get_contents(THEME.$fileSelected);
                $jsSAAS = true;

            } elseif (array_key_exists($fileSelected,$themeListe['css'])) {
                
                $fileContent = @file_get_contents(THEME.$fileSelected);

            } elseif (array_key_exists($fileSelected,$themeListe['tpl'])) {
                
                $fileContent = @file_get_contents(THEME.$fileSelected);
                $tplSAAS = true;
            }
        }
        
        if (($this->Action === 'edit' && !is_file(THEME.$fileSelected)) || (SAAS_ENV && $tplSAAS) || (SAAS_ENV && !SAAS_THEME_JS && $jsSAAS)) {
            
            header('Location:?controller=theme&action=edit&name='.$name.'&file='.$nameTheme.'/css/doorgets.css'); exit();
        }
        
        
        switch($this->Action) {
            
            case 'index':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    if (empty($this->doorGets->Form->e)) {
                        
                        $dDefault['theme']       = $this->doorGets->Form->i['theme'];
                        
                        $this->doorGets->dbQU(1,$dDefault,'_website');
                        //$this->doorGets->clearDBCache();
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header("Location:".$_SERVER['REQUEST_URI']);
                        exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'add':
                
                $form = $this->doorGets->Form;
                if (!empty($form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    // gestion de l'uri
                    $lenUri = strlen($form->i['titre']);
                    $isUriValide = ctype_alnum($form->i['titre']);
                    
                    if (empty($isUriValide) || $lenUri > 250) {
                        
                        $this->doorGets->Form->e['add_theme_titre'] = 'ok';
                        
                    }
                    if (in_array($form->i['titre'],$isAllTheme)) {
                        
                        $this->doorGets->Form->e['add_theme_titre'] = 'ok';
                        
                    }
                    
                    if (in_array($form->i['theme'],$isAllTheme) && empty($this->doorGets->Form->e)) {
                        
                        $form->i['titre'] = strtolower($form->i['titre']);
                        
                        // add to default theme
                        if (array_key_exists('defaut',$form->i)) {
                            
                            $data['theme'] = $form->i['titre'];
                            $this->doorGets->dbQU(1,$data,'_website');
                            //$this->doorGets->clearDBCache();
                            
                        }
                        
                        // Duplicate theme
                        $this->doorGets->duplicateTheme($form->i['theme'],$form->i['titre']);
                        
                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=theme&action=edit&name='.$form->i['titre']);
                        exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                
                break;

            case 'import':
                
                $form = $this->doorGets->Form;
                // vdump($form->i);
                if (!empty($form->i) && !SAAS_ENV) {
                    
                    $this->doorGets->checkMode();
                    
                    $newname = 'doorgets'.time();
                    $dirTheme = BASE.'themes/';
                    if (array_key_exists('import_theme_file', $_FILES) && $_FILES["import_theme_file"]["name"]) {

                        $filename = $_FILES["import_theme_file"]["name"];
                        $source = $_FILES["import_theme_file"]["tmp_name"];
                        $type = $_FILES["import_theme_file"]["type"];
                        
                        $name = explode(".", $filename);
                        $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
                        foreach($accepted_types as $mime_type) {
                            if($mime_type == $type) {
                                $okay = true;
                                break;
                            } 
                        }
                        
                        $fileName = strtolower($name[0]);
                        $newname = trim(str_replace(array('doorgets','cms',' '),'',$fileName));

                        if (is_dir($dirTheme.$newname)) {
                            $newname = 'doorgets'.uniqid();
                        } 

                        $continue = strtolower($name[1]) == 'zip' ? true : false;
                        if(!$continue) {
                            $this->doorGets->Form->e['import_theme_file'] = 'ok';
                        }

                    } else {
                        $this->doorGets->Form->e['import_theme_file'] = 'ok';
                    }

                    if (empty($this->doorGets->Form->e)) {
                        $entries = array();
                        $target_path = $dirTheme.$fileName; 
                        if(move_uploaded_file($source, $target_path)) {
                            $zip = new ZipArchive();
                            $x = $zip->open($target_path);
                            if ($x === true) {
                                $dir = trim($zip->getNameIndex(0));
                                for ($i = 0; $i < $zip->numFiles; $i++) {
                                    $entries[] = $zip->getNameIndex($i);
                                }
                                $fo = '';
                                if (array_key_exists(0, $entries)) {
                                    $fo = $entries[0];
                                }

                                $zip->extractTo($dirTheme.'/');
                                $zip->close();
                        
                                @unlink($target_path);
                            }
                        } else {    
                            $this->doorGets->Form->e['import_theme_file'] = 'ok';
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=theme&action=edit&name='.$newname);
                        exit();
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                
                break;
            
            case 'edit':
                

                $form = $this->doorGets->Form['edit'];
                if (!empty($form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $urlFile = THEME.$fileSelected;
                    // NO FILTER BECAUSE SAVED IN FILE :)
                    $fileContent = $_POST['theme_content_nofi'];
                    @file_put_contents($urlFile,$fileContent);
                    
                    $websiteData = array(
                        'theme_bootstrap'=>$form->i['bootstrap_version']
                    );
                    
                    $this->doorGets->dbQU(Constant::$websiteId,$websiteData,'_website');

                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    header("Location:".$_SERVER['REQUEST_URI']);
                    exit();
                }

                $formDownload = $this->doorGets->Form['download'];
                if (!empty($formDownload->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $archiveFileName = ucfirst($name).' doorGets CMS Template.zip';
                    
                    $zip = new ZipDir();
                    $res = $zip->open($archiveFileName, ZipArchive::CREATE);
                    if ($res === TRUE) {
                        $zip->addDir(BASE."themes/$name/", "$name/");
                    }
                    $zip->close();

                    header("Content-type: application/zip"); 
                    header("Content-Disposition: attachment; filename=$archiveFileName");
                    header("Content-length: " . filesize($archiveFileName));
                    header("Pragma: no-cache"); 
                    header("Expires: 0"); 
                    @readfile("$archiveFileName");

                }
                break;
            
            case 'delete':
                
                $form = $this->doorGets->Form;
                if (!empty($form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $this->doorGets->deleteTheme($form->i['theme']);
                    FlashInfo::set($this->doorGets->__("Un thème a été supprimé"));
                    header('Location:./?controller=theme');
                    
                    
                }
                break;
        }
    }
    
}
