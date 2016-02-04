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

?><!doctype html>
<html lang="<?php echo $myLanguage; ?>">
    <head>
        <title>doorGets 7.0</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
	    <meta NAME="robots" CONTENT="noindex,nofollow,noarchive">
        <?php if($this->hasRtl): ?>
        <link href="<?php echo BASE_CSS.'doorgets_rtl_installer.css'; ?>" rel="stylesheet" type="text/css" />
        <?php else: ?>
        <link href="<?php echo BASE_CSS.'doorgets_installer.css'; ?>" rel="stylesheet" type="text/css" />
        <?php endif; ?>
    </head>
    <body>
	