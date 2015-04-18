<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 6.0 - 20, February 2014
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2014 By Mounir R'Quiba -> Crazy PHP Lover
    
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


define('APP',BASE.'doorgets/app/');
define('CORE',BASE.'doorgets/core/');
define('LIB',BASE.'doorgets/lib/');
define('CONFIG',BASE.'doorgets/config/');
define('TEMPLATE',BASE.'doorgets/template/');
define('ROUTER',BASE.'doorgets/routers/');
define('CONFIGURATION',BASE.'config/');

define('THEME',BASE.'themes/');

define('LANGUE',BASE.'doorgets/locale/');
define('LANGUE_DEFAULT_FILE',BASE.'doorgets/locale/temp.lg.php');

define('CONTROLLERS',BASE.'doorgets/app/controllers/');
define('MODELS',BASE.'doorgets/app/models/');
define('VIEW',BASE.'doorgets/app/views/');

define('CACHE_TEMPLATE',BASE.'cache/template/');

define('BASE_IMG',BASE.'skin/img/');
define('BASE_CSS',BASE.'skin/css/');
define('BASE_JS',BASE.'skin/js/');

require_once CORE.'doorgetsInstaller.php';

function __autoload($name){ $file = CORE.$name.'.php'; if(is_file($file)) { require_once $file; } }