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
  *
        $title
        $description
        $article
        $date_creation
 */

    if(!empty($iarticle)) {
        $iarticle=array_reverse($iarticle);
    } else {
        $iarticle = $article = array();
    }
?>
<!-- doorGets:start:modules/onepage/onepage_content -->
<div id="nav" class="onepage-nav" data-spy="affix">
    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="[{!$Website->getBaseUrl()!}]" class="navbar-brand" title="[{!$Website->configWeb['title']!}]">[{!$Website->configWeb['title']!}]</a>  
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right ">  
                [{/($iarticle as $page):}]
                    [{?($page['showinmenu'] == 'yes'):}]
                    <li><a href="#[{!$page['marqueur']!}]">[{!$page['title']!}]</a></li>
                    [?]
                [/]
                [{!$Website->getHtmlLanguages()!}]
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- doorGets:start:modules/onepage/onepage_content -->
<div class="doorGets-page-content doorGets-module-[{!$Website->getModule()!}]" >
    [{?( ( !empty($Website->isUser) && !$this->modulePrivilege['public_module'])  || $this->modulePrivilege['public_module'] ):}]
        <div >
            [{/($article as $page):}]
            <style type="text/css">
                .box-content-onepage-[{!$page['marqueur']!}]::before{ content: "";display: block;position: absolute;z-index: -1;width: 100%;height: [{!$page['height']!}]px;background-color: [{!$page['backcolor']!}]; opacity: [{!$page['opacity']!}];[{?($cArticles !== 0):}]margin-top: -80px;[?] }
            </style>
            <div class="onepage-[{!$page['marqueur']!}]" id="[{!$page['marqueur']!}]" style="background: url([{!URL.'data/temp/'.$page['backimage']!}]); height: [{!$page['height']!}]px; [{?($backimage_fixe):}]background-attachment: fixed;[?] [{?($cArticles !== 0):}]margin-top: -80px;[?] background-repeat: no-repeat;background-position: 50% 0;-ms-background-size: cover;-o-background-size: cover;-moz-background-size: cover;-webkit-background-size: cover;background-size: cover;[{?($content['menu_position'] === 'top'):}]padding-top: 80px;[?]">
                <div data-offset="150"  class="box-content-onepage-[{!$page['marqueur']!}] ">
                    [{?($cArticles == 0):}]
                    <div>
                        [{?($this->userPrivilege['edit']):}]
                        <div class="btn-group btn-front-edit-[{!$allModules[$Website->getModule()]['all']['uri']!}] navbar-right pull-right z-max-index" >
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                <b  class="glyphicon glyphicon-cog"></b> [{!$Website->__('Action')!}]
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$Website->__('Modifier cette page')!}]</a></li>
                            </ul>
                        </div>
                        [?]
                    </div>
                    [?]
                    [{!html_entity_decode($page['page'])!}]
                </div>
            </div>
            [{$cArticles++;}]
            [/]
        </div>
        [{?($sharethis):}]
        <div class="box-sharethis">
            [{!$Website->getHtmlShareThis();}]
        </div>
        [?]
        
        [{?($comments):}]
        <div class="box-comment-listing">
            [{!$Website->getHtmlModuleComments()!}]
        </div>
        <div class="box-comments">
            [{!$Website->getHtmlComment();}]
        </div>
        [?]
        
        [{?($facebook):}]
        <div class="box-facebook">
            [{!$Website->getHtmlCommentFacebook();}]
        </div> 
        [?]
       
        [{?($disqus):}]
        <div class="box-disqus">   
            [{!$Website->getHtmlCommentDisqus();}]
        </div>
        [?]
    [??]
        <div class="alert alert-danger">
            [{!$Website->__('Vous devez vous connecter pour afficher ce contenu')!}] : <a href="[{!$this->loginUrl!}]&back=[{!urlencode($Website->getCurrentUrl())!}]">Se connecter</a> ou <a href="[{!$this->registerUrl!}]&back=[{!urlencode($Website->getCurrentUrl())!}]">S'inscrire</a>
        </div>
    [?]
</div>
<!-- doorGets:end:modules/onepage/onepage_content -->

