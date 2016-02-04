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


class Constant {

    public static $infinite = '&#8734;';
    
    public static $websiteId = 1;

    public static $modules = array(
        'moduleshop',
        'moduleblog',
        'moduleonepage',
        'modulenews',
        'modulesharedlinks',
        'modulevideo', 
        'moduleimage',
        'modulepartner',
        'modulefaq',
        'modulepage',
        'modulemultipage' 
    );

    public static $_modules = array(
        'shop',
        'blog',
        'onepage',
        'inbox',
        'news',
        'link',
        'sharedlinks',
        'video', 
        'image',
        'partner',
        'faq',
        'page',
        'multipage' 
    );

    public static $widgets = array(
        'block',
        'carousel',
        'genform',
        'survey'
    );

    public static $modulesWithGallery = array(
        'shop',
        'blog',
        'news',
        'video', 
        'image',
        'sharedlinks'
    );

    public static $modulesWithUserBadge = array(
        'shop',
        'blog',
        'news',
        'video', 
        'image',
        'sharedlinks'
    );

    public static $modulesCanAdd = array(
        'multipage',
        'faq',
        'partner',
        'shop',
        'blog',
        'news',
        'video', 
        'image',
        'sharedlinks'
    );

    public static $singleTable = array(
        'multipage',
        'faq',
        'partner',
        'shop',
        'blog',
        'news',
        'video', 
        'image',
        'sharedlinks'
    );

    public static $modulesCanComment = array(
        'multipage',
        'shop',
        'blog',
        'news',
        'video', 
        'image',
        'sharedlinks'
    );

    public static $modulesCanShow = array(
        'shop',
        'blog',
        'onepage',
        'news',
        'sharedlinks',
        'video', 
        'image',
        'partner',
        'faq',
        'page',
        'multipage' 
    );

    public static $modulesToExport = array(
        'blog',
        'news',
        'onepage',
        'multipage',
        'video',
        'faq',
        'image',
        'partner',
        'genform',
        'translator',
        'sharedlinks',
        'shop'
    );

    public static $contributions = array(
        'blog',
        'news',
        'video',
        'image',
        'partner',
        'sharedlinks',
        'shop'
    );

    public static $currency = array(
        'eur' => 'Euro', 
        'usd' => 'United States Dollar',
        'gbp' => 'British Pound'
    );

    public static $currencyIcon = array(
        'eur' => '€', 
        'usd' => '$',
        'gbp' => '£'
    );

    public static $orderStatus = array(
        'payment_success' => '<i class="fa fa-check-circle fa-lg green-c"></i>', 
        'payment_cancel' => '<i class="fa fa-minus-circle fa-lg red"></i>',
        'cart_proccess' => '<i class="fa fa-shopping-basket fa-lg"></i>',
        'waiting_transfer' => '<i class="fa fa-hourglass-start fa-lg orange-c"></i>',
        'waiting_check' => '<i class="fa fa-hourglass-start fa-lg orange-c"></i>',
        'waiting_cash' => '<i class="fa fa-hourglass-start fa-lg orange-c"></i>',
        'subscription_proccess' => '<i class="fa fa-coffee fa-lg"></i>',
    );

    public static $userStatus = array(
        '1' => '<i class="fa fa-user red"></i>', 
        '2' => '<i class="fa fa-user green-c"></i>',
        '3' => '<i class="fa fa-user orange-c"></i> <i class="fa fa-hourglass-half orange-c"></i>',
        '4' => '<i class="fa fa fa-user red-c"></i> <i class="fa fa-times-circle red-c"></i>',
        '5' => '<i class="fa fa-user red"></i> <i class="fa fa-trash red"></i>'
    );

    public static $rtlLanguage = array(
        'ar',
        'iw' 
    );

    public static $extensions = array(
        "application/msword" => "doc",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "doc",
        "image/png" => "png",
        "image/jpeg" => "jpg",
        "image/gif" => "gif",
        "application/zip" => "zip",
        "application/x-zip-compressed" => "zip",
        "application/pdf" => "pdf",
        "application/x-shockwave-flash" => "swf"
    );

    public static $extensionsImage = array(
        "image/png" => "png",
        "image/jpeg" => "jpg"
    );

    public static $orderType = array(
        "checkout" => 'shop',
        "payment" => 'subscription'
    );

    public static $surveyResponse = array(
        'a','b','c','d','e','f','g','h','i'
    );

    public static $bootstrapThemes = array(
        'bootstrap' =>'Bootstrap',
        'cerulean'  =>'Cerulean',
        'cosmo'     =>'Cosmo',
        'cyborg'    =>'Cyborg',
        'darkly'    =>'Darkly',
        'flatly'    =>'Flatly',
        'journal'   =>'Journal',
        'lumen'     =>'Lumen',
        'paper'     =>'Paper',
        'readable'  =>'Readable',
        'sandstone' =>'Sandstone',
        'simplex'   =>'Simplex',
        'slate'     =>'Slate',
        'spacelab'  =>'Spacelab',
        'superhero' =>'Superhero',
        'united'    =>'United',
        'yeti'      =>'Yeti'
    );
}