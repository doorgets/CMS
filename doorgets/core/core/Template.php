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


class Template{
    
    public static $withCache = false;

    static function getView($name,$userName = '__')
    {
        if (empty($userName) || is_string($userName)) {
            $userName = '__';
        }
        $cacheDirectory = CACHE_TEMPLATE;
        $userCacheDirectory = $cacheDirectory;

        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }
        if (!is_dir($userCacheDirectory)) { @mkdir($userCacheDirectory, 0777, true); }
        
        // Explode $name for create dir if not exists
        $explodeName = explode('/',$name);
        $cExplodeName = count($explodeName);
        $fileName = $explodeName[$cExplodeName - 1].'.tpl.php';
        $fileTemp = $userCacheDirectory.$fileName;
        
        // If dir exists on $name create it if not exists
        // $explodeName[$cExplodeName - 1] is file name
        if ($cExplodeName > 1) {
            
            for($i=0;$i<$cExplodeName;$i++) {
                
                $dirNewName = '';
                for( $z=0; $z<$i; $z++) {
                    
                    $dirNewName .= $explodeName[$z].'/';
                    
                }
                
                if (!is_dir($userCacheDirectory.$dirNewName)) {
                    
                    @mkdir($userCacheDirectory.$dirNewName, 0777, true);
                    
                }
                
            }
            
            $fileTemp = $userCacheDirectory.$dirNewName.$fileName;
            
        }
        
        if (is_file($fileTemp) && self::$withCache)
        {
            return $fileTemp;
        }

        $nameFile = $name.'.php';
        $file = TEMPLATE.$name.'.tpl.php';
        
        if (is_file($file))
        {
                
            $html = file_get_contents($file);
            
            $convertArray = array(
                
            "[?]" => '<?php endif; ?>',
            "[/]" => '<?php endforeach; ?>',
            "[-]" => '<?php endfor; ?>',
                "[{???" => '<?php elseif',
            "[??]" => '<?php else: ?>',
            "[{?" => '<?php if',
            "?}]" => ' endif; ?>',
            "[{/" => '<?php foreach',
            "/}]" => ' endforeach; ?>',
            "[{-" => '<?php for',
            "-}]" => ' endfor; ?>',
            "[{!" => '<?php echo ',
                "[{" => '<?php ',
                "!}]" => '; ?>',
                "}]" => ' ?>',
            "?><?php" => '',
            "?>
    <?php" => '',
            "?>
                <?php" => '',
                "if (!defined(DOORGETS)) { header('Location:../'); exit(); }" => '',
            
                
            );
            
            foreach($convertArray as $k=>$v) {
                
                $html = str_replace($k,$v,$html);
                
            }
            
            file_put_contents($fileTemp,$html);
            return $fileTemp;
        
        }
        
        return 'Template not found : '.$file;
        
    }
    
    static function getWebsiteView($name,$theme="doorgets",$userName = '__')
    {
        
        if (empty($userName) || is_string($userName)) {
            $userName = '__';
        }

        if (!is_dir(CACHE_THEME)) { @mkdir(CACHE_THEME, 0777, true); }

        $cacheDirectory = CACHE_THEME.$theme.'/';
        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }

        $cacheDirectory = CACHE_THEME.$theme.'/website/';
        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }

        $userCacheDirectory = $cacheDirectory;

        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }
        if (!is_dir($userCacheDirectory)) { @mkdir($userCacheDirectory, 0777, true); }
        
        $cacheThemeDirectory = $userCacheDirectory.'/';
        $userCacheThemeDirectory = $userCacheDirectory.'/';

        if (!is_dir($cacheThemeDirectory)) { @mkdir($cacheThemeDirectory, 0777, true); }
        if (!is_dir($userCacheThemeDirectory)) { @mkdir($userCacheThemeDirectory, 0777, true); }
        
        // Explode $name for create dir if not exists
        $explodeName = explode('/',$name);
        $cExplodeName = count($explodeName);
        $fileName = $explodeName[$cExplodeName - 1].'.tpl.php';
        $fileTemp = $userCacheThemeDirectory.$fileName;
        
        // If dir exists on $name create it if not exists
        // $explodeName[$cExplodeName - 1] is file name
        if ($cExplodeName > 1) {
            
            for($i=0;$i<$cExplodeName;$i++) {
                
                $dirNewName = '';
                for( $z=0; $z<$i; $z++) {
                    
                    $dirNewName .= $explodeName[$z].'/';
                    
                }
                
                if (!is_dir($userCacheDirectory.$dirNewName)) {
                    
                    @mkdir($userCacheDirectory.$dirNewName, 0777, true);
                    
                }
            }
            
            $fileTemp = $userCacheDirectory.$dirNewName.$fileName;
            
        }
        
        if (is_file($fileTemp) && self::$withCache)
        {
            return $fileTemp;
        }
        
        $nameFile = $name.'.tpl.php';
        $file = THEME.$theme.'/template/website/'.$nameFile;
        
        if (is_file($file))
        {
                
            $html = file_get_contents($file);
            
            $convertArray = array(
            
            "[!]" => '<?php echo $Website->',
            "[?]" => '<?php endif; ?>',
            "[/]" => '<?php endforeach; ?>',
            "[-]" => '<?php endfor; ?>',
                "[{???" => '<?php elseif',
            "[??]" => '<?php else: ?>',
            "[{?" => '<?php if',
            "?}]" => ' endif; ?>',
            "[{/" => '<?php foreach',
            "/}]" => ' endforeach; ?>',
            "[{-" => '<?php for',
            "-}]" => ' endfor; ?>',
            "[{!" => '<?php echo ',
                "[{" => '<?php ',
                "{/!}" => '; ?>',
                "!}]" => '; ?>',
                "}]" => ' ?>',
            "?><?php" => '',
            "?>
    <?php" => '',
            "?>
                <?php" => '',
                "if (!defined(DOORGETS)) { header('Location:../'); exit(); }" => '',
            
                
            );
            
            foreach($convertArray as $k=>$v) {
                
                $html = str_replace($k,$v,$html);
                
            }
            
            file_put_contents($fileTemp,$html);
            return $fileTemp;
        
        }
        
        return 'Template not found : '.$file;
        
    }

    // static function getWebsiteUserView($name,$theme="doorgets",$userName = '__')
    // {
    //     return self::getWebsiteView($name,$theme,$userName);
    // }

    static function getWebsiteUserView($name,$theme="doorgets",$userName = '__')
    {

        if (empty($userName) || is_string($userName)) {
            $userName = '__';
        }

        if (!is_dir(CACHE_THEME)) { @mkdir(CACHE_THEME, 0777, true); }

        $cacheDirectory = CACHE_THEME.$theme.'/';
        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }

        $cacheDirectory = CACHE_THEME.$theme.'/websiteUser/';
        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }

        $userCacheDirectory = $cacheDirectory;
        if (!is_dir($userCacheDirectory)) { @mkdir($userCacheDirectory, 0777, true); }
        
        $cacheThemeDirectory = $userCacheDirectory.'/';
        $userCacheThemeDirectory = $userCacheDirectory.'/';

        if (!is_dir($cacheThemeDirectory)) { @mkdir($cacheThemeDirectory, 0777, true); }
        if (!is_dir($userCacheThemeDirectory)) { @mkdir($userCacheThemeDirectory, 0777, true); }
        
        // Explode $name for create dir if not exists
        $explodeName = explode('/',$name);
        $cExplodeName = count($explodeName);
        $fileName = $explodeName[$cExplodeName - 1].'.tpl.php';
        $fileTemp = $userCacheThemeDirectory.$fileName;
        
        // If dir exists on $name create it if not exists
        // $explodeName[$cExplodeName - 1] is file name
        if ($cExplodeName > 1) {
            
            for($i=0;$i<$cExplodeName;$i++) {
                
                $dirNewName = '';
                for( $z=0; $z<$i; $z++) {
                    
                    $dirNewName .= $explodeName[$z].'/';
                    
                }
                
                if (!is_dir($userCacheDirectory.$dirNewName)) {
                    
                    @mkdir($userCacheDirectory.$dirNewName, 0777, true);
                    
                }
            }
            
            $fileTemp = $userCacheDirectory.$dirNewName.$fileName;
            
        }
        
        if (is_file($fileTemp) && self::$withCache)
        {
            return $fileTemp;
        }
        
        $nameFile = $name.'.tpl.php';
        $file = THEME.$theme.'/template/websiteUser/'.$nameFile;
        
        if (is_file($file))
        {
                
            $html = file_get_contents($file);
            
            $convertArray = array(
            
            "[!]" => '<?php echo $Website->',
            "[?]" => '<?php endif; ?>',
            "[/]" => '<?php endforeach; ?>',
            "[-]" => '<?php endfor; ?>',
                "[{???" => '<?php elseif',
            "[??]" => '<?php else: ?>',
            "[{?" => '<?php if',
            "?}]" => ' endif; ?>',
            "[{/" => '<?php foreach',
            "/}]" => ' endforeach; ?>',
            "[{-" => '<?php for',
            "-}]" => ' endfor; ?>',
            "[{!" => '<?php echo ',
                "[{" => '<?php ',
                "{/!}" => '; ?>',
                "!}]" => '; ?>',
                "}]" => ' ?>',
            "?><?php" => '',
            "?>
    <?php" => '',
            "?>
                <?php" => '',
                "if (!defined(DOORGETS)) { header('Location:../'); exit(); }" => '',
            
                
            );
            
            foreach($convertArray as $k=>$v) {
                
                $html = str_replace($k,$v,$html);
                
            }
            
            file_put_contents($fileTemp,$html);
            return $fileTemp;
        
        }
        
        return 'Template not found : '.$file;
        
    }

    static function get($name,$params = array()) {
        
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                 $$key = $value;
            }
        }

        $tpl = Template::getView($name); 
        ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();

        return $out;
    }
}
