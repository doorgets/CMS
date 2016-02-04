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


?><!doctype html>
<html lang="[{$doorGets->myLanguage()}]">
    <head>
    <title>doorGets</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <META NAME="robots" CONTENT="noindex,nofollow,noarchive">

    <link href="[{!URL.'skin/lib/jquery/jquery-ui.min.css'!}]" rel="stylesheet" type="text/css" />
    <link href="[{!URL.'skin/lib/bootstrap/css/bootstrap.min.css'!}]" rel="stylesheet" type="text/css" />
    <link href="[{!URL.'skin/css/font-awesome/css/font-awesome.min.css'!}]" rel="stylesheet" type="text/css" />
    <link href="[{!URL.'skin/css/bigadmin.m.css'!}]" rel="stylesheet" type="text/css" />
    
    [{?($doorGets->isRtlLanguage):}]
        <link href="[{!URL.'skin/css/doorgets.rtl.css'!}]" rel="stylesheet" type="text/css" />
    [?]
    
    <script type="text/javascript" src="[{!URL!}]skin/lib/jquery/external/jquery/jquery.js"></script>
    <script  src="[{!URL.'skin/lib/jquery/jquery-ui.min.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/lib/bootstrap/js/bootstrap.min.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/js/bigadmin.js'!}]" type="text/javascript"></script>
    <script type="text/javascript">
        var BASE_URL = "[{!URL!}]"; 
        var SPIN_URL = "[{!URL!}]skin/img/spinner.gif";
        var CURRENT_CONTROLLER = "[{!$doorGets->getRealUri($doorGets->Uri)!}]"; 
        var CURRENT_URI = "[{!$doorGets->ControllerNameNow()!}]"; 
        var CURRENT_ACTION = "[{!$doorGets->Action!}]";
    </script>
    
	
    </head>
    <body>
        
        <div class="doorGets-wrapper-index-enter">
