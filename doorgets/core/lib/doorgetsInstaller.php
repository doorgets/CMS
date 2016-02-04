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


class doorgetsInstaller extends Langue{
    
    private $files;
    
    private $fileName;
    
    public $doorGets;
    
    public $html;
    
    public function __construct(&$doorGets) {
        
		if (!is_object($doorGets)) { return null; }
	    $this->doorGets = $doorGets;
		
		
	    $dir = BASE."installer/";
		$this->files = $doorGets->files($dir,array('json'));
		$this->zipFiles = $doorGets->files($dir,array('zip'));
		
		$isOut = true;
		
		$params = $doorGets->Params();
		if (array_key_exists('do',$params['GET'])) {
		    
		    $actioninstaller = $params['GET']['do'];
		    if (array_key_exists('file',$params['GET']) && (in_array($params['GET']['file'],$this->files) || in_array($params['GET']['file'],$this->zipFiles))) {
				
				$this->fileName = $params['GET']['file'];
			}
		    
		    if (!empty($params['GET']['file']) &&  !in_array($params['GET']['file'],$this->files) && !in_array($params['GET']['file'],$this->zipFiles)) {
				
				header('Location:./?controller=configuration&action=setup'); exit();
		    }
		    
		    $translate = $this;
		    
		    switch($actioninstaller) {
			
				case 'create':
				    
				    $isOut = false;
				    $this->html = $this->getHtmlCreateInstaller();
				    
				    break;
				
				case 'delete':
				    
				    if (!empty($this->fileName)) {
					
						$isOut = false;
						$this->html = $this->getHtmlDeleteInstaller();
				    }

				    break;
		    }
		}
		   
		if ($isOut) {

		    $this->html = $this->getHtmlIndex();
		}
    }
    
    public function getHtml() {
		return $this->html;
    }
    
    public function getFiles() {
		return $this->files;
    }
    
    public function getFileName() {
	
		if (!empty($this->fileName)) {
		    $fileName = trim(str_replace('.zip','',$this->fileName));
		    $fileName = (int) trim(str_replace('doorGets_CMS_7.0_','',$fileName));
		    $this->fileName = GetDate::in($fileName).' / '.$this->fileName;
		}
		
		return $this->fileName;
    }
    
    private function getHtmlIndex() {
	
		$translate = $this->doorGets;
		
		$allFiles = $this->getFiles();
		/**********
		 *
		 *  Start block creation for listing fields
		 * 
		 **********/
		if (!empty($allFiles)) {
		    
		    $block = new BlockTable();
		    $block->setClassCss('doorgets-listing');
		    
		    $block->addTitle('','title','first-title td-title');
		    $block->addTitle('','size','td-title');
		    $block->addTitle('','download','td-title');
		    $block->addTitle('','delete','td-title');
		    
		    $allFiles = array_reverse($allFiles);
		    
		    foreach($allFiles as $k=>$v) {
				$file = file_get_contents(BASE.'installer/'.$v);
				$dataInfo = json_decode($file);
				
			    $date = '<span class="pull-right">'.GetDate::in($dataInfo->date).'</span>';
			    $sizeFile = 0;
			    if (is_file(BASE.'installer/'.$dataInfo->file)) {  $sizeFile = filesize(BASE.'installer/'.$dataInfo->file); }
			    
			    $linkDownload 	= '<a href="'.URL.'installer/'.$dataInfo->file.'" ><b class="glyphicon glyphicon-download-alt" title="'.$translate->__('Telecharger').'"></b></a>';
			    $linkDelete 	= '<a href="?controller=configuration&action=setup&do=delete&file='.$dataInfo->file.'" ><b title="'.$translate->__('Supprimer').'" class="glyphicon glyphicon-floppy-remove red"></b></a>';
			    
			    $block->addContent('title','<b class="glyphicon glyphicon-floppy-disk"></b> <b>'.$dataInfo->title.'</b>'.$date,'first-title td-title');
			    $block->addContent('size','<span class="badge">'.number_format(((int)$sizeFile/1000000),2,',',' ').' Mo </span>','tb-30 ');
			    $block->addContent('download',$linkDownload,'tb-30 center');
			    $block->addContent('delete',$linkDelete,'tb-30 center');
			    
		    } 
		}
		
		$fTpl = Template::getView('user/configuration/installer/user_configuration_installer_index');
    	ob_start(); include $fTpl; $out = ob_get_clean();
	
		return $out;
	
    }
    
    public function getHtmlCreateInstaller() {

		$form = $this->doorGets->Form['installer_create'];
		$translate = $this->doorGets;
		$fTpl = Template::getView('user/configuration/installer/user_configuration_installer_create');
    	ob_start(); include $fTpl; $out = ob_get_clean();
	
		return $out;
	
    }
    
    
    public function getHtmlDeleteInstaller() {
	
		$form = $this->doorGets->Form['installer_delete'];
		$translate = $this->doorGets;
		$fTpl = Template::getView('user/configuration/installer/user_configuration_installer_delete');
    	ob_start(); include $fTpl; $out = ob_get_clean();
	
		return $out;
	
    }   
}