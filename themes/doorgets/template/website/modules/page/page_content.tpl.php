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
        
?>
<!-- doorGets:start:modules/page/page_content -->
<div class="doorGets-page-content doorGets-module-[{!$Website->getModule()!}]">
    
    [{?( ( !empty($Website->isUser) && !$this->modulePrivilege['public_module'])  || $this->modulePrivilege['public_module'] ):}]
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
        <div>
            [{!$article!}]
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
<!-- doorGets:end:modules/page/page_content -->
