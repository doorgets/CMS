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



class Convertag{

    static function get($words='') {
        
        $out = '';
        
        $convertArray = array(
            "\[url=([^\]]*)\](.*)\[\/url\]" => '<a href="$1" >$2</a>',
            "\[b\](.*?)\[\/b\]" => '<strong>$1</strong>',
            "\[li\](.*?)\[\/li\]" => '<li>$1</li>',
            "\[ul\](.*?)\[\/ul\]" => '<ul>$1</ul>',
            "\[h1\](.*?)\[\/h1\]" => '<h1>$1</h1>',
            "\[h2\](.*?)\[\/h2\]" => '<h2>$1</h2>',
            "\[h3\](.*?)\[\/h3\]" => '<h3>$1</h3>',
            "\[h4\](.*?)\[\/h4\]" => '<h4>$1</h4>',
            "\[br\/\]" => '<br />'
            
            
        );
        
        
        foreach($convertArray as $k=>$v) {
            
            $val = '/'.$k.'/i';
            if (!is_array($words)) {
                $words = preg_replace($val,$v,$words);
            }
            
            
        }


        return $words;
    
    }
    
    static function in($words='') {
        
        $out = '';
        
        $convertArray = array(
            
            "<strong>(.*?)<\/strong>" => '[b]$1[/b]',
            "<br \/>" => '[br/]',
            "<ul>(.*?)<\/ul>" => '[ul]$1[/ul]',
            "<li>(.*?)<\/li>" => '[li]$1[/li]',
            "<h1>(.*?)<\/h1>" => '[h1]$1[/h1]',
            "<h2>(.*?)<\/h2>" => '[h2]$1[/h2]',
            "<h3>(.*?)<\/h3>" => '[h3]$1[/h3]',
            "<h4>(.*?)<\/h4>" => '[h4]$1[/h4]',
            '<a href="(.*?)" >(.*?)<\/a>' => '[url=$1]$2[/url]'
        );
        
        foreach($convertArray as $k=>$v) {
            
            $val = '/'.$k.'/i';
            $words = preg_replace($val,$v,$words);
            
        }
        
        
        return $words;
    
    }
    
    
}
