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


class UsersTracking{
    
    static function check($dataTrack = array(),&$doorGets) {
        
        $db = $doorGets;
        if (
           empty($dataTrack)
           || !array_key_exists('id_user',$dataTrack)
           || !array_key_exists('title',$dataTrack)
           || !array_key_exists('uri_module',$dataTrack)
           || !array_key_exists('id_content',$dataTrack)
           || !array_key_exists('action',$dataTrack)
       ) { return false; }
        
        $dataTrack['id_session']    = session_id();
        $dataTrack['ip_user']       = $_SERVER['REMOTE_ADDR'];
        $dataTrack['url_page']      = $_SERVER['REQUEST_URI'];
        $dataTrack['url_referer']   = $_SERVER['HTTP_REFERER'];
        $dataTrack['date']          = time();
        
        if ($db->dbQI($dataTrack,'_users_track')) {
            return true;
        }
        
        return false;
        
    }
    
}