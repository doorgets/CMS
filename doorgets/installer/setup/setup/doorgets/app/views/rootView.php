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

class rootView extends doorgetsView{
    
    public function __construct(&$doorgets) {
        parent::__construct($doorgets);
    }
    
    public function getArrayZones() {
        
        $array = array (
    
            "Pacific/Wake" => "(GMT-12:00) International Date Line West", 
            "Pacific/Apia" => "(GMT-11:00) Midway Island", 
            "Pacific/Apia" => "(GMT-11:00) Samoa", 
            "Pacific/Honolulu" => "(GMT-10:00) Hawaii", 
            "America/Anchorage" => "(GMT-09:00) Alaska", 
            "America/Los_Angeles" => "(GMT-08:00) Pacific Time (US & Canada); Tijuana", 
            "America/Phoenix" => "(GMT-07:00) Arizona", 
            "America/Chihuahua" => "(GMT-07:00) Chihuahua", 
            "America/Chihuahua" => "(GMT-07:00) La Paz", 
            "America/Chihuahua" => "(GMT-07:00) Mazatlan", 
            "America/Denver" => "(GMT-07:00) Mountain Time (US & Canada)", 
            "America/Managua" => "(GMT-06:00) Central America", 
            "America/Chicago" => "(GMT-06:00) Central Time (US & Canada)", 
            "America/Mexico_City" => "(GMT-06:00) Guadalajara", 
            "America/Mexico_City" => "(GMT-06:00) Mexico City", 
            "America/Mexico_City" => "(GMT-06:00) Monterrey", 
            "America/Regina" => "(GMT-06:00) Saskatchewan", 
            "America/Bogota" => "(GMT-05:00) Bogota", 
            "America/New_York" => "(GMT-05:00) Eastern Time (US & Canada)", 
            "America/Indiana/Indianapolis" => "(GMT-05:00) Indiana (East)", 
            "America/Bogota" => "(GMT-05:00) Lima", 
            "America/Bogota" => "(GMT-05:00) Quito", 
            "America/Halifax" => "(GMT-04:00) Atlantic Time (Canada)", 
            "America/Caracas" => "(GMT-04:00) Caracas", 
            "America/Caracas" => "(GMT-04:00) La Paz", 
            "America/Santiago" => "(GMT-04:00) Santiago", 
            "America/St_Johns" => "(GMT-03:30) Newfoundland", 
            "America/Sao_Paulo" => "(GMT-03:00) Brasilia", 
            "America/Argentina/Buenos_Aires" => "(GMT-03:00) Buenos Aires", 
            "America/Argentina/Buenos_Aires" => "(GMT-03:00) Georgetown", 
            "America/Godthab" => "(GMT-03:00) Greenland", 
            "America/Noronha" => "(GMT-02:00) Mid-Atlantic", 
            "Atlantic/Azores" => "(GMT-01:00) Azores", 
            "Atlantic/Cape_Verde" => "(GMT-01:00) Cape Verde Is.", 
            "Africa/Casablanca" => "(GMT) Casablanca", 
            "Europe/London" => "(GMT) Edinburgh", 
            "Europe/London" => "(GMT) Greenwich Mean Time : Dublin", 
            "Europe/London" => "(GMT) Lisbon", 
            "Europe/London" => "(GMT) London", 
            "Africa/Casablanca" => "(GMT) Monrovia", 
            "Europe/Berlin" => "(GMT+01:00) Amsterdam", 
            "Europe/Belgrade" => "(GMT+01:00) Belgrade", 
            "Europe/Berlin" => "(GMT+01:00) Berlin", 
            "Europe/Berlin" => "(GMT+01:00) Bern", 
            "Europe/Belgrade" => "(GMT+01:00) Bratislava", 
            "Europe/Paris" => "(GMT+01:00) Brussels", 
            "Europe/Belgrade" => "(GMT+01:00) Budapest", 
            "Europe/Paris" => "(GMT+01:00) Copenhagen", 
            "Europe/Belgrade" => "(GMT+01:00) Ljubljana", 
            "Europe/Paris" => "(GMT+01:00) Madrid", 
            "Europe/Paris" => "(GMT+01:00) Paris", 
            "Europe/Belgrade" => "(GMT+01:00) Prague", 
            "Europe/Berlin" => "(GMT+01:00) Rome", 
            "Europe/Sarajevo" => "(GMT+01:00) Sarajevo", 
            "Europe/Sarajevo" => "(GMT+01:00) Skopje", 
            "Europe/Berlin" => "(GMT+01:00) Stockholm", 
            "Europe/Berlin" => "(GMT+01:00) Vienna", 
            "Europe/Sarajevo" => "(GMT+01:00) Warsaw", 
            "Africa/Lagos" => "(GMT+01:00) West Central Africa", 
            "Europe/Sarajevo" => "(GMT+01:00) Zagreb", 
            "Europe/Istanbul" => "(GMT+02:00) Athens", 
            "Europe/Bucharest" => "(GMT+02:00) Bucharest", 
            "Africa/Cairo" => "(GMT+02:00) Cairo", 
            "Africa/Johannesburg" => "(GMT+02:00) Harare", 
            "Europe/Helsinki" => "(GMT+02:00) Helsinki", 
            "Europe/Istanbul" => "(GMT+02:00) Istanbul", 
            "Asia/Jerusalem" => "(GMT+02:00) Jerusalem", 
            "Europe/Helsinki" => "(GMT+02:00) Kyiv", 
            "Europe/Istanbul" => "(GMT+02:00) Minsk", 
            "Africa/Johannesburg" => "(GMT+02:00) Pretoria", 
            "Europe/Helsinki" => "(GMT+02:00) Riga", 
            "Europe/Helsinki" => "(GMT+02:00) Sofia", 
            "Europe/Helsinki" => "(GMT+02:00) Tallinn", 
            "Europe/Helsinki" => "(GMT+02:00) Vilnius", 
            "Asia/Baghdad" => "(GMT+03:00) Baghdad", 
            "Asia/Riyadh" => "(GMT+03:00) Kuwait", 
            "Europe/Moscow" => "(GMT+03:00) Moscow", 
            "Africa/Nairobi" => "(GMT+03:00) Nairobi", 
            "Asia/Riyadh" => "(GMT+03:00) Riyadh", 
            "Europe/Moscow" => "(GMT+03:00) St. Petersburg", 
            "Europe/Moscow" => "(GMT+03:00) Volgograd", 
            "Asia/Tehran" => "(GMT+03:30) Tehran", 
            "Asia/Muscat" => "(GMT+04:00) Abu Dhabi", 
            "Asia/Tbilisi" => "(GMT+04:00) Baku", 
            "Asia/Muscat" => "(GMT+04:00) Muscat", 
            "Asia/Tbilisi" => "(GMT+04:00) Tbilisi", 
            "Asia/Tbilisi" => "(GMT+04:00) Yerevan", 
            "Asia/Kabul" => "(GMT+04:30) Kabul", 
            "Asia/Yekaterinburg" => "(GMT+05:00) Ekaterinburg", 
            "Asia/Karachi" => "(GMT+05:00) Islamabad", 
            "Asia/Karachi" => "(GMT+05:00) Karachi", 
            "Asia/Karachi" => "(GMT+05:00) Tashkent", 
            "Asia/Calcutta" => "(GMT+05:30) Chennai", 
            "Asia/Calcutta" => "(GMT+05:30) Kolkata", 
            "Asia/Calcutta" => "(GMT+05:30) Mumbai", 
            "Asia/Calcutta" => "(GMT+05:30) New Delhi", 
            "Asia/Katmandu" => "(GMT+05:45) Kathmandu", 
            "Asia/Novosibirsk" => "(GMT+06:00) Almaty", 
            "Asia/Dhaka" => "(GMT+06:00) Astana", 
            "Asia/Dhaka" => "(GMT+06:00) Dhaka", 
            "Asia/Novosibirsk" => "(GMT+06:00) Novosibirsk", 
            "Asia/Colombo" => "(GMT+06:00) Sri Jayawardenepura", 
            "Asia/Rangoon" => "(GMT+06:30) Rangoon", 
            "Asia/Bangkok" => "(GMT+07:00) Bangkok", 
            "Asia/Bangkok" => "(GMT+07:00) Hanoi", 
            "Asia/Bangkok" => "(GMT+07:00) Jakarta", 
            "Asia/Krasnoyarsk" => "(GMT+07:00) Krasnoyarsk", 
            "Asia/Hong_Kong" => "(GMT+08:00) Beijing", 
            "Asia/Hong_Kong" => "(GMT+08:00) Chongqing", 
            "Asia/Hong_Kong" => "(GMT+08:00) Hong Kong", 
            "Asia/Irkutsk" => "(GMT+08:00) Irkutsk", 
            "Asia/Singapore" => "(GMT+08:00) Kuala Lumpur", 
            "Australia/Perth" => "(GMT+08:00) Perth", 
            "Asia/Singapore" => "(GMT+08:00) Singapore", 
            "Asia/Taipei" => "(GMT+08:00) Taipei", 
            "Asia/Irkutsk" => "(GMT+08:00) Ulaan Bataar", 
            "Asia/Hong_Kong" => "(GMT+08:00) Urumqi", 
            "Asia/Tokyo" => "(GMT+09:00) Osaka", 
            "Asia/Tokyo" => "(GMT+09:00) Sapporo", 
            "Asia/Seoul" => "(GMT+09:00) Seoul", 
            "Asia/Tokyo" => "(GMT+09:00) Tokyo", 
            "Asia/Yakutsk" => "(GMT+09:00) Yakutsk", 
            "Australia/Adelaide" => "(GMT+09:30) Adelaide", 
            "Australia/Darwin" => "(GMT+09:30) Darwin", 
            "Australia/Brisbane" => "(GMT+10:00) Brisbane", 
            "Australia/Sydney" => "(GMT+10:00) Canberra", 
            "Pacific/Guam" => "(GMT+10:00) Guam", 
            "Australia/Hobart" => "(GMT+10:00) Hobart", 
            "Australia/Sydney" => "(GMT+10:00) Melbourne", 
            "Pacific/Guam" => "(GMT+10:00) Port Moresby", 
            "Australia/Sydney" => "(GMT+10:00) Sydney", 
            "Asia/Vladivostok" => "(GMT+10:00) Vladivostok", 
            "Asia/Magadan" => "(GMT+11:00) Magadan", 
            "Asia/Magadan" => "(GMT+11:00) New Caledonia", 
            "Asia/Magadan" => "(GMT+11:00) Solomon Is.", 
            "Pacific/Auckland" => "(GMT+12:00) Auckland", 
            "Pacific/Fiji" => "(GMT+12:00) Fiji", 
            "Pacific/Fiji" => "(GMT+12:00) Kamchatka", 
            "Pacific/Fiji" => "(GMT+12:00) Marshall Is.", 
            "Pacific/Auckland" => "(GMT+12:00) Wellington", 
            "Pacific/Tongatapu" => "(GMT+13:00) Nuku'alofa"
            
        );
        
        
        return $array;
    }

    public function isChmod777() {
        
        try{
            
            $file = dirname('index.php');
            if (@is_writable($file)) {
                return true;
            }
            
            return false;
            
        }catch(Exception $e) {  }
        
    }
    
}