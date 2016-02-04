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


class TraductionsRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
        
        $out = '';
        
        $_toLanguage  = $this->doorGets->getLangueTradutionForTraduction();
        $allLanguages = $this->doorGets->getAllLanguages();
        
        $fileTraduction = LANGUE.$_toLanguage.'.lg.php';
        if (!is_file($fileTraduction)) {
            $valContent = "<?php \n\t ".'$_w = array();'.PHP_EOL;
            @file_put_contents($fileTraduction,$valContent);
        }
        
        include $fileTraduction;
        if (!isset($_w)) {
            $valContent = "<?php \t ".'$_w = array();'.PHP_EOL;
            @file_put_contents($fileTraduction,$valContent);
        }
        
        switch($this->Action) {
            
            case 'index':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    $fileTraduction = LANGUE.$_toLanguage.'.lg.php';
                    if (is_file($fileTraduction)) {
                        
                        $iAdd = 0;
                        $outTempTranslate = '<?php '.PHP_EOL;
                        $idsToDelete = array();
                        foreach($this->doorGets->Form->i as $k => $w) {
                            
                            $w = trim($w);
                            //if (!empty($w)) {
                                
                                $strWords = substr($k,0,6);
                                if ($strWords === 'words_') {
                                    $k = (int)str_replace('words_','',$k);
                                    $outTempTranslate .= "\t".'$_w[] = "'.$w.'"; '.PHP_EOL;
                                    $iAdd++; 
                                }
                                
                                
                            //}
                            
                            $strWordsDel = substr($k,0,5);
                            if ($strWordsDel === 'wdel_') {
                                $idsToDelete[] = (int)str_replace('wdel_','',$k);
                            }
                        }
                        
                        if (empty($iAdd)) {
                            $outTempTranslate .= "\t".'$_w = array(); ';
                        }
                        
                        @file_put_contents($fileTraduction,$outTempTranslate);
                        
                        // Delete
                        if (!empty($idsToDelete)) {
                            
                            $fileTraductionDel = LANGUE.'temp.lg.php';
                            include $fileTraductionDel;
                            
                            $wTranslateDel = $wTranslate;
                            foreach($idsToDelete as $id) {
                                unset($wTranslateDel[$id]);
                            }
                            $outTempTranslate = '<?php '.PHP_EOL;
                            foreach($wTranslateDel as $w) {
                                
                                $outTempTranslate .= "\t".'$wTranslate[] = "'.$w.'"; '.PHP_EOL;
                                
                            }
                            
                            @file_put_contents($fileTraductionDel,$outTempTranslate);
                            
                            foreach($allLanguages as $langue => $v) {
                                
                                unset($_w);
                                $fileTraductionDel = LANGUE.$langue.'.lg.php';
                                include $fileTraductionDel;
                                
                                $wTranslateDel = $_w;
                                foreach($idsToDelete as $id) {
                                    unset($wTranslateDel[$id]);
                                }
                                $outTempTranslate = '<?php '.PHP_EOL;
                                foreach($wTranslateDel as $w) {
                                    
                                    $outTempTranslate .= "\t".'$_w[] = "'.$w.'"; '.PHP_EOL;
                                    
                                }
                                
                                @file_put_contents($fileTraductionDel,$outTempTranslate);
                            }
                            
                        }
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                    header('Location:./?controller=traductions&lg='.$_toLanguage);
                    exit();
                    
                }
                
                break;
            
            
        }
        
        return $out;
        
    }
}
