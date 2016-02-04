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


class Pagination{
    
    static function page($nbFields,$pos=1,$nbCount=10,$path,$LgPrem='',$LgPrec='',$LgSuiv='',$LgDern='') {
        
        return Pagination::pagePublic($nbFields,$pos,$nbCount,$path,$LgPrem,$LgPrec,$LgSuiv,$LgDern);
    
    }
    
    static function pagePublic($nbFields,$pos=1,$nbCount=10,$path,$LgPrem='',$LgPrec='',$LgSuiv='',$LgDern='') {
        
        $link ='<ul class="pagination pagination-lg">';
        $flink = '';
        $cPage = ceil($nbFields/$nbCount);
        $cBy = 0;
        $cStart = ($pos < 3 and $pos > 1)? $pos-1 : $pos-2;
        
        if ($pos == 1) {$cStart = 1;}
        if ($pos == $cPage) {$cStart = $pos - 4;}
        if ($pos == $cPage-1) {$cStart = $pos - 3;}
        
        $posPlus = $pos+1;
        $posMoins = $pos-1;
        
        if ($cPage > 5) {
            
           $link .= ($pos < 4)? "<li class=\"disabled\" ><span> << </span></li>" : " <li><a  href=\"".$path."1\" > << </a></li> ";
        
        }
        
        $linkp = ($pos < 2)? "<li class=\"disabled\" ><span> < </span></li>  " : "<li><a   href=\"$path$posMoins\" > < </a></li>";
        $link .= $linkp;
        
        for($i=$cStart;$i<=$cPage;$i++) {
            
            $cBy++;
            if ($cBy > 0 and $cBy < 6) {
                
                if ($pos == $i) {
                  
                  $link .= " <li class=\"active\"><span  >$i</span></li> ";
                  
                }elseif ($i >= 1) {
                  
                  $link .= " <li><a  href=\"$path$i\"  >$i</a></li> ";
                }
            }
        }
        
        
        $link = substr($link,0,-1);
        $vlink = ($pos > ($cPage-1))? "  <li class=\"disabled\"><span  > > </span></li>" : "  <li><a  href=\"$path$posPlus\" > > </a></li> ";
        
        if ($cPage > 5) {
            
           $flink = ($pos > ($cPage-3))? "<li class=\"disabled\"><span > >> </span></li>" : "  <li><a  href=\"$path$cPage\" > >> </a></li>";
        
        }
        
        $link .= $vlink;
        $link .= $flink;
        
        $link .= '</ul>';
        
        $out = '<div class="doorGets-pagination-module-c text-center">'.$link.'</div>';
        return $out;
    
    }
    
}