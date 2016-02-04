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


class MediaRequest extends doorGetsUserRequest{
    
    private $sizeMax = 8192000;
    
    private $typeFile = array();
    private $typeExtension = array();
    private $typeImage = array();
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $lgActuel = $this->doorGets->getLangueTradution();
        
        $typeFile["image/png"] = "data/upload/png/";
        $typeFile["image/jpeg"] = "data/upload/jpg/";
        $typeFile["image/gif"] = "data/upload/gif/";
        
        $typeFile["application/zip"] = "data/upload/zip/";
        $typeFile["application/x-zip-compressed"] = "data/upload/xzip/";
        $typeFile["application/pdf"] = "data/upload/pdf/";
        $typeFile["application/x-shockwave-flash"] = "data/upload/swf/";
        
        $typeExtension["image/png"] = "png";
        $typeExtension["image/jpeg"] = "jpg";
        $typeExtension["image/gif"] = "gif";
        
        $typeExtension["application/zip"] = "zip";
        $typeExtension["application/x-zip-compressed"] = "zip";
        
        $typeExtension["application/pdf"] = "pdf";
        $typeExtension["application/x-shockwave-flash"] = "swf";
        
        $typeImage["image/png"] = '<img src="'.BASE_IMG.'png.png" class="ico_fichier" >';
        $typeImage["image/jpeg"] = '<img src="'.BASE_IMG.'jpg.png" class="ico_fichier" >';
        $typeImage["image/gif"] = '<img src="'.BASE_IMG.'gif.png" class="ico_fichier" >';
        $typeImage["application/zip"] = '<img src="'.BASE_IMG.'zip.png" class="ico_fichier" >';
        $typeImage["application/x-zip-compressed"] = '<img src="'.BASE_IMG.'zip.png" class="ico_fichier" >';
        $typeImage["application/pdf"] = '<img src="'.BASE_IMG.'pdf.png" class="ico_fichier" >';
        $typeImage["application/x-shockwave-flash"] = '<img src="'.BASE_IMG.'swf.png" class="ico_fichier" >';
        
        $this->typeFile = $typeFile;
        $this->typeExtension = $typeExtension;
        $this->typeImage = $typeImage;
        
        $out = '';
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }
                    
                }
                
            }
        }
        
        switch($this->Action) {
            
            case 'add':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (!is_dir(BASE_DATA.'upload')) { 
                        @mkdir(BASE_DATA.'upload', 0777, true);
                        copy(BASE_DATA.'index.php',BASE_DATA.'upload/index.php');
                    }

                    if (empty($this->doorGets->Form->i['title'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir le nom du fichier"),"error");
                        $this->doorGets->Form->e['media_add_title'] = 'ok';
                        
                    }
                    if ( isset($_FILES['media_add_path']) &&  $_FILES['media_add_path']['error'] != 0 ) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez importer un fichier valide"),"error");
                        $this->doorGets->Form->e['media_add_path'] = 'ok';
                        
                    }
                    
                    if ( isset($_FILES['media_add_path']) && empty($this->doorGets->Form->e)) {
                        
                        if (!array_key_exists($_FILES['media_add_path']["type"],$this->typeFile) ) {
                            
                            FlashInfo::set($this->doorGets->__("Veuillez importer un fichier valide"),"error");
                            
                            $this->doorGets->Form->e['media_add_path'] = 'ok';
                        
                        }
                        if ($_FILES['media_add_path']["size"] > $this->sizeMax) {
                            
                            FlashInfo::set($this->doorGets->__("Votre fichier est trop lourd"),"error");
                            
                            $this->doorGets->Form->e['media_add_path'] = 'ok';
                        
                        }
                    }
                    
                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_dg_files');
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $ttff = $_FILES['media_add_path']["type"];
                        
                        $sSize = $_FILES['media_add_path']['size'];
                        $ttf = $this->typeExtension[$ttff];
                        $uni = time().'-'.uniqid($ttf);
                        
                        if (!is_dir(BASE_DATA.'upload/'.$ttf)) { 
                            @mkdir(BASE_DATA.'upload/'.$ttf, 0777, true);
                            copy(BASE_DATA.'index.php',BASE_DATA.'upload/'.$ttf.'/index.php');
                        }

                        $nameFileImage = $uni.'-doorgets.'.$ttf;
                        
                        $uploaddir = $this->typeFile[$ttff];
                        $uploadfile = BASE.$uploaddir.$nameFileImage;
                        
                        if (move_uploaded_file($_FILES['media_add_path']['tmp_name'], $uploadfile)) {
                            $this->doorGets->Form->i['fichier'] = $nameFileImage;
                        }
                        
                        $data['uri']            = $this->doorGets->Form->i['uri'];
                        $data['id_user']        = $this->doorGets->user['id'];
                        $data['id_groupe']      = $this->doorGets->user['groupe'];
                        $data['type']           = $ttff;
                        $data['date_creation']  = time();
                        
                        $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataTraduction['id_file'] = $idContent;
                            $dataTraduction['title']   = $this->doorGets->Form->i['title'];
                            $dataTraduction['path']    = $nameFileImage;
                            $dataTraduction['langue']  = $k;
                            $dataTraduction['size']    = $sSize;
                            
                            
                            $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,$this->doorGets->Table.'_traduction');

                        }

                        $dataModification['groupe_traduction'] = serialize($idsTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);
                        
                        FlashInfo::set($this->doorGets->__("Le fichier a bien été télécharger"));
                        header('Location:./?controller=media&action=select&id='.$idContent.'&lg='.$lgActuel); exit();
                        
                    }
                    
                }
                
                break;
            
            case 'edit':
                
                $error = false;
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->i['title'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir le nom du fichier"),"error");
                        $this->doorGets->Form->e['media_edit_title'] = 'ok';
                        $error = true;
                        
                    }
                    
                    if ($_FILES['media_edit_path']['error'] === 0) {
                        
                        if ( isset($_FILES['media_edit_path'])    && empty($this->doorGets->Form->e)) {
                            
                            if ($_FILES['media_edit_path']["type"] !== $isContent['type']) {
                                
                                FlashInfo::set($this->doorGets->__("Veuillez importer un fichier du même type"),"error");
                                $this->doorGets->Form->e['media_edit_path'] = 'ok';
                                $error = true;
                            
                            }
                            if ($_FILES['media_edit_path']["size"] > $this->sizeMax) {
                                
                                FlashInfo::set($this->doorGets->__("Votre fichier est trop lourd"),"error");
                                $this->doorGets->Form->e['media_edit_path'] = 'ok';
                                $error = true;
                            
                            }
                        }
                        
                    }
                    
                    $uri = $this->doorGets->Form->i['uri'];
                    $isValidUri = $this->doorGets->isValidUri($uri,'_dg_files',$isContent);
                    if (!$isValidUri) {
                        $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_edit_uri'] = 'ok';
                    }
                    
                    if (empty($this->doorGets->Form->e)) {

                        $sSize = $isContent['size'];
                        $pathFileImage = $isContent['path'];
                        if ($_FILES['media_edit_path']['error'] === 0) {

                            $ttff = $_FILES['media_edit_path']["type"];
                            $sSize = $_FILES['media_edit_path']['size'];

                            $ttf = $this->typeExtension[$ttff];
                            $uni = time().'-'.uniqid($ttf);
                            
                            $pathFileImage = $uni.'-doorgets.'.$ttf;
                            
                            $uploaddir = $this->typeFile[$ttff];
                            $uploadfile = BASE.$uploaddir.$pathFileImage;
                            
                            @move_uploaded_file($_FILES['media_edit_path']['tmp_name'], $uploadfile);                            
                        }
                        
                        $data['uri'] = $this->doorGets->Form->i['uri'];
                        
                        $dataTraduction['title']              = $this->doorGets->Form->i['title'];
                        $dataTraduction['size']               = $sSize;
                        $dataTraduction['path']               = $pathFileImage;
                        $dataTraduction['date_modification']  = time();
                        
                        $this->doorGets->dbQU($isContent['id_file'],$data,$this->doorGets->Table);
                        $this->doorGets->dbQU($isContent['id'],$dataTraduction,$this->doorGets->Table.'_traduction');

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=media&action=select&id='.$isContent['id_file'].'&lg='.$lgActuel);
                        exit();
                        
                    }
                    
                    if (!$error) {
                        FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    }
                    
                }
                
                break;
            
            case 'delete':
                
                $urlFile = $isContent['path'];
                $uploaddir = $this->typeFile[$isContent['type']];
                $uploadfile = BASE.$uploaddir.$urlFile;
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id_file'],$this->doorGets->Table);
                        $this->doorGets->dbQD($isContent['id_file'],$this->doorGets->Table.'_traduction','id_file','=','');
                        if (is_file($uploadfile)) {
                            @unlink($uploadfile);
                        }
                        
                        FlashInfo::set($this->doorGets->__("Le fichier à été corréctement supprimer"));
                        header('Location:./?controller=media');
                        exit();
                        
                    }
                }
                
                break;
            
            case 'massdelete':
                
                if (
                    
                    !empty($this->doorGets->Form['massdelete_index']->i)
                    && isset($this->doorGets->Form['massdelete_index']->i['groupe_delete_index'])
                   
               ) {
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form['massdelete_index']->e))
                    {
                        
                        $ListeForDeleted = $this->doorGets->_toArray($this->doorGets->Form['massdelete_index']->i['groupe_delete_index']);
                
                        foreach($ListeForDeleted as $id) {
                            
                            $isCont = $this->doorGets->dbQS($id,$this->doorGets->Table);
                            if (!empty($isCont)) {
                                
                                $urlFile = $isCont['fichier'];
                                $uploaddir = $this->typeFile[$isCont['type']];
                                $uploadfile = BASE.$uploaddir.$urlFile;
                                
                                if (is_file($uploadfile)) { @unlink($uploadfile); }
                                
                            }
                            
                            $this->doorGets->dbQD($id,$this->doorGets->Table);
                            $this->doorGets->dbQD($id,$this->doorGets->Table.'_traduction','id_file','=','');
                        
                        }
                        
                        FlashInfo::set($this->doorGets->__("Les données sont supprimées"));
                        header('Location:./?controller='.$this->doorGets->controllerNameNow()); exit();
                        
                    }
                    
                }
                
                break;
        }
    }
}

