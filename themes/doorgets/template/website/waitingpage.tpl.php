<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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


 /*
  * Variables :
        $label
        $title
        $description 
        $keywords
 */
 

?><!doctype html>
<html lang="[{!$this->myLanguage()!}]">
    <head>
        <title>[{!$label!}]</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta name="generator" content="doorGets" />
        <meta name="author" content="Doorgets.com, doorgets" />
        <script type="text/javascript"  src="[{!BASE_JS.'jquery.js'!}]"></script>
        <script type="text/javascript"  src="[{!BASE_JS.'jquery.ui.js'!}]"></script>
        <link href="[{!URL!}]themes/[{!$this->theme!}]/css/doorgets.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    
    [{!$content!}]
    
    </body>
</html>
    