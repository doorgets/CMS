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

$sMaxI = ini_get('post_max_size');
$sMax = str_replace('M','',$sMaxI);
$sMax = (int)$sMax; $sMax = $sMax * 1024000;

$tF_ = '';
$tF = $doorGets->Action();
if (!empty($tF)) { $tF_ = '- '.ucfirst($tF); }

$tN_ = '';
$tN = $doorGets->ControllerNameNow();
if (!empty($tN)) { $tN_ = 'doorGets - '.ucfirst($tN); }


$action = $doorGets->Action();
$version = $doorGets->_newVersion();

?><!doctype html>
<html lang="[{$doorGets->myLanguage()}]">
    <head>
	<title>[{!$tN_!}] [{!$tF_!}]</title>

	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<META NAME="robots" CONTENT="noindex,nofollow,noarchive">
    
    
    <link href="[{!URL.'skin/lib/bootstrap/css/bootstrap.min.css'!}]" rel="stylesheet" type="text/css" />
    <link href="[{!URL.'skin/lib/jquery/jquery-ui.min.css'!}]" rel="stylesheet" type="text/css" />
    <link href="[{!URL.'skin/css/font-awesome/css/font-awesome.min.css'!}]" rel="stylesheet" type="text/css" />
    <link href="[{!URL.'skin/lib/timepicker/jquery.timepicker.css'!}]" rel="stylesheet" type="text/css" />
    
    <link href="[{!URL.'skin/css/bigadmin.m.css'!}]" rel="stylesheet" type="text/css" />
    
    [{?($doorGets->isRtlLanguage):}]
        <link href="[{!URL.'skin/css/sidebar.rtl.css'!}]" rel="stylesheet" type="text/css" />
        <link href="[{!URL.'skin/css/doorgets.rtl.css'!}]" rel="stylesheet" type="text/css" />
    [??]
        <link href="[{!URL.'skin/css/sidebar.css'!}]" rel="stylesheet" type="text/css" />
    [?]

    <script  src="[{!URL.'skin/lib/jquery/external/jquery/jquery.js'!}]" type="text/javascript" ></script>
    <script  src="[{!URL.'skin/lib/jquery/jquery-ui.min.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/lib/bootstrap/js/bootstrap.min.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/lib/bootstrap/js/typeahead.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/lib/tinymce/tinymce.min.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/lib/ckeditor/ckeditor.js'!}]" type="text/javascript"></script>
    <script  src="[{!URL.'skin/lib/timepicker/jquery.timepicker.min.js'!}]" type="text/javascript"></script>
    <script  src="//maps.google.com/maps/api/js?language=[{$doorGets->myLanguage()}]" type="text/javascript" ></script>
    <script  src="[{!URL.'skin/lib/gmap3/gmap3.min.js'!}]" type="text/javascript"></script>
    

    <script  src="[{!URL.'skin/js/bigadmin.js'!}]" type="text/javascript"></script>
    
	<script type="text/javascript">
        var BASE_URL = "[{!URL!}]"; 
        var SPIN_URL = "[{!URL!}]skin/img/spinner.gif";
        var CURRENT_CONTROLLER = "[{!$doorGets->Uri!}]"; 
        var CURRENT_URI = "[{!$doorGets->ControllerNameNow()!}]"; 
        var CURRENT_ACTION = "[{!$doorGets->Action!}]";

        function initTinymce(livepreview) {
            [{?(empty($doorGets->user['editor_html'])):}]
                tinymce.init({
                    selector: ".tinymce",
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks  fullscreen",
                        "insertdatetime media table contextmenu paste "
                    ],
                    menubar: false,
                    image_advtab: true,
                    force_br_newlines: false,
                    force_p_newlines: false,
                    forced_root_block: '',
                    toolbar_items_size: 'small',
                    content_css : "[{!BASE!}]themes/[{!$doorGets->configWeb['theme']!}]/css/doorgets.css,[{!BASE!}]skin/lib/bootstrap/css/bootstrap.min.css",
                    setup: function (ed) {
                        ed.on("keyup click mouseup", function(){
                            $('.'+livepreview).html(tinymce.activeEditor.getContent());
                        });
                    }
                });
            [?]
            [{?($doorGets->user['editor_html'] === 'editor_tinymce'):}]
                tinymce.init({
                    selector: ".tinymce",
                    cleanup_on_startup: false,
                    trim_span_elements: false,
                    verify_html: false,
                    cleanup: false,
                    plugins: [
                        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "table template contextmenu directionality emoticons textcolor paste textcolor"
                    ],
                    toolbar1: "classe | bold italic underline strikethrough | styleselect formatselect fontselect fontsizeselect | forecolor backcolor | code | preview | fullscreen",
                    toolbar2: "undo redo | table | cut copy paste | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent blockquote | link unlink | anchor image media",
                    toolbar3: "template | block carousel forms survey  | mediaurl | lastcreation lastmodification bestcontents | addresses terms termssale privacy",
                    toolbar4: "buttondefault | buttonprimary | buttonsuccess | buttonerror | buttoninfo | alertsuccess | alertinfo | alerterror | alertwarning ",
                    relative_urls: true,
                    convert_urls: false,
                    menubar: false,
                    force_br_newlines: false,
                    force_p_newlines: false,
                    forced_root_block: '',
                    valid_elements: '*[*]',
                    toolbar_items_size: 'small',
                    file_browser_callback: RoxyFileBrowser,
                    content_css : "[{!BASE!}]themes/[{!$doorGets->configWeb['theme']!}]/css/doorgets.css,[{!BASE!}]skin/lib/bootstrap/css/bootstrap.min.css",
                    image_advtab: true,
                    setup : function(ed) {

                        ed.on("keyup click mouseup", function(){
                            $('.'+livepreview).html(tinymce.activeEditor.getContent());
                        });

                        ed.on('keydown', function(event) {
                        if (event.keyCode == 9) { // tab pressed
                            ed.execCommand('mceInsertContent', false, '&emsp;&emsp;'); // inserts tab
                            event.preventDefault();
                            return false;
                        }
                        if (event.keyCode == 32) {
                            if (event.shiftKey) {
                                ed.execCommand('mceInsertContent', false, '&hairsp;'); // inserts small space
                                event.preventDefault();
                                return false;
                            }
                        }
                      });
                        // Add a custom button
                        ed.addButton('block', {
                        title : 'Block',
                        text : 'Block',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Bloc statique", "Enter the uri of block", "Enter the uri of block");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlBlock/'+uri+'!}&#125; ');
                            }
                        }
                        });
                        // Add a custom button
                        ed.addButton('survey', {
                        title : 'Survey',
                        text : 'Survey',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Survey/Sondage", "Enter the uri of survey", "Enter the uri of survey");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlSurvey/'+uri+'!}&#125; ');
                            }
                        }
                        });
                        ed.addButton('carousel', {
                        title : 'Carousel',
                        text : 'Carousel',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Carousel", "Enter the uri of Carousel", "Enter the uri of Carousel");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlCarousel/'+uri+'!}&#125; ');
                            }
                        }
                        });
                        ed.addButton('forms', {
                        title : 'Forms',
                        text : 'Forms',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Form", "Enter the uri of form", "Enter the uri of form");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlForm/'+uri+'!}&#125; ');
                            }
                        }
                        });
                        ed.addButton('mediaurl', {
                        title : 'MediaUrl',
                        text : 'Media Url',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Path media", "Enter the uri of media", "Enter the uri of media");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getMediaUrl/'+uri+'!}&#125; ');
                            }
                        }
                        });
                        ed.addButton('lastcreation', {
                        title : 'Last By Creation',
                        text : 'Last By Creation',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Last content", "Enter the uri of module", "Enter the uri of module");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getLastModuleContents/'+uri+'/3!}&#125; ');
                            }
                        }
                        });
                        ed.addButton('lastmodification', {
                        title : 'Last By Modification',
                        text : 'Last By Modification',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Last content", "Enter the uri of module", "Enter the uri of module");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getLastModuleContentsByModification/'+uri+'/3!}&#125; ');
                            }
                        }
                        });
                        ed.addButton('bestcontents', {
                        title : 'Best Contents',
                        text : 'Best Contents',
                        icon: false,
                        onclick : function() {
                            
                            var uri = prompt("Last content", "Enter the uri of module", "Enter the uri of module");
                            if (uri != null && uri != 'undefined') {
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getBestModuleContents/'+uri+'/3!}&#125; ');
                            }
                        }
                        });
                        // Add a custom button
                        ed.addButton('addresses', {
                        title : 'Addresses',
                        text : 'Addresses',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlAddresses!}&#125;  ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('terms', {
                        title : 'Terms',
                        text : 'Terms',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlTerms!}&#125;  ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('termssale', {
                        title : 'Terms sale',
                        text : 'Terms sale',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlTermsSale!}&#125; ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('privacy', {
                        title : 'Privacy',
                        text : 'Privacy',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' &#123;{!getHtmlPrivacy!}&#125; ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('buttondefault', {
                        title : 'Button',
                        text : 'Button',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <a href="#" class="btn btn-default btn-lg">Mybutton</a> ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('buttonsuccess', {
                        title : 'Button Success',
                        text : 'Button Success',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <a href="#" class="btn btn-success btn-lg">Mybutton</a> ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('buttonerror', {
                        title : 'Button Danger',
                        text : 'Button Danger',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <a href="#" class="btn btn-danger btn-lg">Mybutton</a> ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('buttonprimary', {
                        title : 'Button Primary',
                        text : 'Button Primary',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <a href="#" class="btn btn-primary btn-lg">Mybutton</a> ');
                            
                        }
                        });

                        // Add a custom button
                        ed.addButton('buttoninfo', {
                        title : 'Button Info',
                        text : 'Button Info',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <a href="#" class="btn btn-info btn-lg">Mybutton</a> ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('alertwarning', {
                        title : 'Alert warning',
                        text : 'Alert warning',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <div class="alert alert-warning">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</div> #next');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('alertsuccess', {
                        title : 'Alert success',
                        text : 'Alert success',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <div class="alert alert-success">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</div> #next ');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('alertinfo', {
                        title : 'Alert info',
                        text : 'Alert info',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <div class="alert alert-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</div> #next');
                            
                        }
                        });
                        // Add a custom button
                        ed.addButton('alerterror', {
                        title : 'Alert danger',
                        text : 'Alert danger',
                        icon: false,
                        onclick : function() {
                            
                            ed.focus();
                            ed.selection.setContent(' <div class="alert alert-danger">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</div> #next');
                            
                        }
                        });
                    },
                    templates: [
                        {title: '1 colonne', url: '[{!BASE!}]skin/template/1col.html'},
                        {title: '2 colonnes', url: '[{!BASE!}]skin/template/2col.html'},
                        {title: '2 colonnes left', url: '[{!BASE!}]skin/template/2coll.html'},
                        {title: '2 colonnes right', url: '[{!BASE!}]skin/template/2colr.html'},
                        {title: '3 colonnes', url: '[{!BASE!}]skin/template/3col.html'},
                        {title: '4 colonnes', url: '[{!BASE!}]skin/template/4col.html'},
                        {title: '3 colonnes Marketing', url: '[{!BASE!}]skin/template/3colmarketing.html'},
                        {title: 'Carousel', url: '[{!BASE!}]skin/template/carousel.html'},
                        {title: 'Jumbotron', url: '[{!BASE!}]skin/template/jumbotron.html'},
                        {title: 'Featurette', url: '[{!BASE!}]skin/template/featurette.html'},
                        {title: 'Header', url: '[{!BASE!}]skin/template/header.html'},
                        {title: 'Bloc', url: '[{!BASE!}]skin/template/bloc.html'}
                    ]});
                [?]
        
                
            }

            initTinymce("live-preview");
            window.onload=Init;

            function Init()
            {
                var myFile = document.getElementById("media_add_fichier");
                if (myFile != null) {
                    //binds to onchange event of the input field
                    myFile.addEventListener('change', function() {
                        if ((this.files[0].size) > [{!$sMax!}]) {
                            myFile.value = ""; alert("2M  max");
                        }
                    });         
                }
            }
    </script>
    </head>
    <body>
    <div class="jsLoader">
        <div id="preloader"></div>

