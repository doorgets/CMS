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
        
$url = PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?><!doctype html>
<html lang="[{!$this->myLanguage()!}]">
    <head>
        <title>[{!$label!}]</title>
        
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
        <meta name="generator" content="doorGets" />
        <meta name="author" content="doorGets.com, doorGets CMS" />
        <meta name="description" content="[{!$description!}]" />
        <meta name="keywords" content="[{!$keywords!}]" />
        
        <meta property="og:site_name" content="[{!$title!}]" />
        <meta property="og:url" content="[{!$url!}]" />
        <meta property="og:language" content="[{!$this->myLanguage()!}]" />
        
        [{?(!empty($facebook_type) && !empty($facebook_title)):}]
            <meta property="og:type" content="[{!$facebook_type!}]" />
            <meta property="og:title" content="[{!$facebook_title!}]" />
            [{?(!empty($facebook_description)):}]
                <meta property="og:description" content="[{!$facebook_description!}]" />
            [?]
            [{?(!empty($facebook_image)):}]
                <meta property="og:image" content="[{!$base_data.$facebook_image!}]" />
            [?]
        [??]
            <meta property="og:title" content="[{!$label!}]" />
        [?]
        
        [{?(!empty($twitter_type) && !empty($twitter_title) && !empty($this->configWeb['twitter'])):}]
            <meta name="twitter:card" content="[{!$twitter_type!}]">
            <meta name="twitter:title" content="[{!$twitter_title!}]">
            <meta name="twitter:site" content="[{!$this->configWeb['twitter']!}]">
            [{?(!empty($twitter_description)):}]
            <meta name="twitter:description" content="[{!$twitter_description!}]">
            [?]
            [{?(!empty($twitter_image)):}]
                <meta name="twitter:image:src" content="[{!$base_data.$twitter_image!}]">
            [?]
            [{?(!empty($facebook_player)):}]
                <meta name="twitter:player" content="[{!$facebook_player!}]">
            [?]
        [?]
        
        [{!$rssLinks!}]

        <link href="[{!URL!}]skin/lib/bootstrap/css/bootstrap.[{!$bootstrap_version!}].min.css" rel="stylesheet" type="text/css" />
        <link href="[{!URL!}]skin/lib/magnificpopup/dist/magnific-popup.css" rel="stylesheet" type="text/css" />
        <link href="[{!URL!}]themes/[{!$this->theme!}]/css/doorgets.css" rel="stylesheet" type="text/css" />
        <link href="[{!URL!}]themes/[{!$this->theme!}]/css/simple-sidebar.css" rel="stylesheet" type="text/css" />
        <link href="[{!URL.'skin/css/font-awesome/css/font-awesome.min.css'!}]" rel="stylesheet" type="text/css" />
        <link href="[{!URL.'skin/lib/bootstrap-rating/bootstrap-rating.css'!}]" rel="stylesheet" type="text/css" />
        <link href="[{!URL!}]skin/lib/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="[{!URL!}]skin/lib/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" > 

	    [{?($this->isRtlLanguage):}]
            <link href="[{!URL!}]themes/[{!$this->theme!}]/css/doorgets.rtl.css" rel="stylesheet" type="text/css" />
        [?]

        <script type="text/javascript">
            var BASE_URL = "[{!URL!}]"; 
            var SPIN_URL = "[{!URL!}]skin/img/spinner.gif";
            var LG_CURRENT = "[{!$this->myLanguage!}]";
            var MODULE_URI = "[{!$this->getModule()!}]";
            var CONTENT_URI = "[{!$this->uri!}]";
        </script>
    </head>
    <body data-spy="scroll" data-target=".navbar">
    
    
