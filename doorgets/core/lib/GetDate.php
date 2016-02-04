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


class GetDate{
    
    public static function in($time = 0,$format = 1,$langue= 'fr') {
        
        if (!is_numeric($time) || empty($time)) { $time = time(); }
        switch($format) {
            case 1:
                
                if ($langue === 'fr') {
                    
                    $out = date('d/m/Y - H:i',$time); // Temps 31/12/1984
                    
                }else{
                    
                    $out = date('m/d/Y - h:i a',$time); // Temps 12/31/1984
                    
                }
                break;

            
            case 2:
                
                if ($langue === 'fr') {
                    
                    $out = date('d/m/Y',$time); // Temps 31/12/1984
                    
                }else{
                    
                    $out = date('m/d/Y',$time); // Temps 12/31/1984
                    
                }
                break;
            
            case 3:
                
                $out = ucfirst(strftime("%A %d %B %Y",$time));  // Temps Mercredi 20 mars 2013 
                break;
            
            case 4:
                
                $out = ucfirst(strftime("%A %d %B %Y %H:%M",$time));     // Temps Mercredi 20 mars 2013 18:41
                break;

            case 5:
                
                if ($langue === 'fr') {
                    
                    $out = date('d/m/Y - H:i:s',$time); // Temps 31/12/1984
                    
                }else{
                    
                    $out = date('m/d/Y - h:i:s a',$time); // Temps 12/31/1984
                    
                }
                break;
                
            default:
                if ($langue === 'fr') {
                    
                    $out = date('d/m/Y',$time); // Temps 31/12/1984
                    
                }else{
                    
                    $out = date('m/d/Y',$time); // Temps 12/31/1984
                    
                }
                break;
        }
        
        return $out;
        
    }

    public static function before($time,&$doorGets = null) {

        $out = '';
        $timeNow = time();

        if (is_null($doorGets) || $time > $timeNow) {
            return '';
        }

        $timeLeft = $timeNow - $time;

        if ($timeLeft < 300) {
            
            $out = $doorGets->__("Maintenant");

        } elseif ($timeLeft > 300 && $timeLeft < 3600) {
            
            $timeLeft = ceil($timeLeft / 60);
            $out = $timeLeft.' '.$doorGets->__("minutes");

        } elseif ($timeLeft > 3600 && $timeLeft < 86400) {
            
            $timeLeft = ceil($timeLeft / 3600);
            $out = $timeLeft.' '.$doorGets->__("heures");
        
        }elseif ($timeLeft > 86400 && $timeLeft < 2592000) {
        
            $timeLeft = ceil($timeLeft / 86400);
            $out = $timeLeft.' '.$doorGets->__("jours");
        
        } elseif ($timeLeft > 2592000 && $timeLeft < 31536000) {
        
            $timeLeft = ceil($timeLeft / 2592000);
            $out = $timeLeft.' '.$doorGets->__("mois");
        
        }
        //$out = 'Il y a '.$timeLesft. ' minutes';

        return $out;
    }


    
}