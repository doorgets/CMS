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


class Template{
    
    static function getView($name)
    {
        
        $cacheDirectory = CACHE_TEMPLATE;
        
        if (!is_dir($cacheDirectory)) { @mkdir($cacheDirectory, 0777, true); }
        
        // Explode $name for create dir if not exists
        $explodeName = explode('/',$name);
        $cExplodeName = count($explodeName);
        $fileName = $explodeName[$cExplodeName - 1].'.tpl.php';
        $fileTemp = $cacheDirectory.$fileName;
        
        // If dir exists on $name create it if not exists
        // $explodeName[$cExplodeName - 1] is file name
        if ($cExplodeName > 1) {
            
            for($i=0;$i<$cExplodeName;$i++) {
                
                $dirNewName = '';
                for( $z=0; $z<$i; $z++) {
                    
                    $dirNewName .= $explodeName[$z].'/';
                    
                }
                
                if (!is_dir($cacheDirectory.$dirNewName)) {
                    
                    @mkdir($cacheDirectory.$dirNewName, 0777, true);
                    
                }
                
            }
            
            $fileTemp = $cacheDirectory.$dirNewName.$fileName;
            
        }
        
        $nameFile = $name.'.php';
        $file = TEMPLATE.$name.'.tpl.php';
        
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
    
    
}