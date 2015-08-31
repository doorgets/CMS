<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 20, February 2014
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


?>          
        <script  src="[{!URL.'skin/lib/bootstrap/js/bootstrap.min.js'!}]" type="text/javascript"></script>
        
        
        <!-- <script  src="[{!URL.'skin/lib/angularjs/angular.min.js'!}]" type="text/javascript"></script> -->
        <!-- <script  src="[{!URL.'skin/js/app.js'!}]" type="text/javascript"></script> -->

        <script  src="[{!URL.'skin/js/bigadmin.js'!}]" type="text/javascript"></script>
        <script  src="[{!URL.'skin/lib/tinymce/tinymce.min.js'!}]" type="text/javascript"></script>
        <script  src="[{!URL.'skin/lib/ckeditor/ckeditor.js'!}]" type="text/javascript"></script>
    
        <script type="text/javascript">
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
                forced_root_block : false,
                toolbar_items_size: 'small',
                content_css : "[{!BASE!}]themes/[{!$doorGets->configWeb['theme']!}]/css/doorgets.css,[{!BASE!}]skin/lib/bootstrap/css/bootstrap.min.css",
                
                setup : function(ed) {
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
                    {title: 'Jumbotron', url: '[{!BASE!}]skin/template/jumbotron.html'},
                    {title: 'Carousel', url: '[{!BASE!}]skin/template/carousel.html'},
                    {title: 'Featurette', url: '[{!BASE!}]skin/template/featurette.html'},
                    {title: 'Header', url: '[{!BASE!}]skin/template/header.html'},
                    {title: 'Bloc', url: '[{!BASE!}]skin/template/bloc.html'}
                ]
            });
        [?]
        [{?($doorGets->user['editor_html'] === 'editor_tinymce'):}]
            tinymce.init({
            selector: ".tinymce",
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table template contextmenu directionality emoticons textcolor paste textcolor"
            ],
            toolbar1: "classe | bold italic underline strikethrough | styleselect formatselect fontselect fontsizeselect | forecolor backcolor | code | preview | fullscreen",
            toolbar2: "undo redo | table | cut copy paste | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent blockquote | link unlink | anchor image media |  block mediaurl forms | template",
            toolbar3: "buttondefault | buttonprimary | buttonsuccess | buttonerror | buttoninfo | alertsuccess | alertinfo | alerterror | alertwarning ",
            relative_urls: true,
            convert_urls: false,
            menubar: false,
            forced_root_block : false,
            toolbar_items_size: 'small',
            valid_elements : "*[*]",
            content_css : "[{!BASE!}]themes/[{!$doorGets->configWeb['theme']!}]/css/doorgets.css,[{!BASE!}]skin/lib/bootstrap/css/bootstrap.min.css",
            image_advtab: true,
            setup : function(ed) {
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
                {title: 'Jumbotron', url: '[{!BASE!}]skin/template/jumbotron.html'},
                {title: 'Featurette', url: '[{!BASE!}]skin/template/featurette.html'},
                {title: 'Carousel', url: '[{!BASE!}]skin/template/carousel.html'},
                {title: 'Header', url: '[{!BASE!}]skin/template/header.html'},
                {title: 'Bloc', url: '[{!BASE!}]skin/template/bloc.html'}
            ]
            });
        [?]
    
        [{?($doorGets->user['editor_html'] !== 'editor_ckeditor'):}]       
            $('.ckeditor').removeClass('ckeditor');
        [?]

        window.onload=Init;

        function Init()
        {
            var myFile = document.getElementById("media_add_fichier");
            if (myFile != null) {
                //binds to onchange event of the input field
                myFile.addEventListener('change', function() {
                
                    if ((this.files[0].size) > [{!$sMax!}]) {
                        myFile.value = "";
                        alert("2M  max");
                    }
                
                });         
            }
        }
        
    </script>
    </div>
    </body>
    
</html>
