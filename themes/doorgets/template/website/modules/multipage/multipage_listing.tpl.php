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
  *
        $isContent['id_content']    => $id_content
        $isContent['categorie']     => $categorie
        $isContent['titre']         => $titre   
        $isContent['description']   => $description
        $isContent['uri']           => $uri
        $isContent['date_creation'] => $date_creation
        $isContent['article']       => $article
        $isContent['comments']      => $comments
        $isContent['sharethis']     => $sharethis
        $isContent['disqus']        => $disqus
        $isContent['facebook']      => $facebook

 */
    
     
?>
<!-- doorGets:start:modules/multipage/multipage_listing -->
<div class="doorGets-multipage-listing doorGets-module-[{!$Website->getModule()!}]">
    <div class="doorGets-multipage-contents ">
    [{?(
        ( !$this->modulePrivilege['public_module'] && $this->userPrivilege['show'] )
        || $this->modulePrivilege['public_module']
    ):}]
        [{?(!empty($isContent)):}]
            <div>
                [{?( $this->userPrivilege['edit'] || $this->userPrivilege['delete'] || $this->userPrivilege['modo']):}]
                <div class="btn-group btn-front-edit-[{!$allModules[$Website->getModule()]['all']['uri']!}] navbar-right pull-right z-max-index" >
                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                        <b  class="glyphicon glyphicon-cog"></b> [{!$Website->__('Action')!}]
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        [{?( $this->userPrivilege['edit'] || $this->userPrivilege['modo'] ):}]
                            <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$Website->__('Modifier')!}]</a></li>
                        [?]
                        [{?( $this->userPrivilege['delete'] || $this->userPrivilege['modo'] ):}]
                            <li class="divider"></li>
                            <li><a href="[{!$urlDelete!}]" class="navbut"><b class="glyphicon glyphicon-remove"></b> [{!$Website->__('Supprimer')!}]</a></li>
                        [?] 
                    </ul>
                </div>
                [?]
                [{?($this->userPrivilege['add']):}]
                <div class="pull-right">&nbsp;</div>
                <div class="btn-group pull-right">
                    <a href="[{!$urlAdd!}]" class="btn btn-success btn-large">
                        <b class="glyphicon glyphicon-plus"></b> 
                        <span>[{!$Website->__('Créer une page')!}]</span>
                    </a>
                </div>
                [?]
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
            
            <div class="content-next-previous">
                <ul class="pager">
                    <li class="previous">
                        [{?(!empty($nexContent)):}]<a href="[{!$nexContent['url']!}]">&larr; [{!$nexContent['label']!}]</a>[?]
                    </li>
                    <li class="next">
                        [{?(!empty($prevContent)):}]<a href="[{!$prevContent['url']!}]">[{!$prevContent['label']!}] &rarr;</a>[?]
                    </li>
                </ul>
            </div>
            
        [??]
        <p class="wall text-center">
            <a href="[{!$urlAdd!}]" class="btn btn-success btn-large">
                <b class="glyphicon glyphicon-plus"></b> 
                <span>[{!$Website->__('Créer une page')!}]</span>
            </a>
        </p>
        [?]
    [{???(empty($Website->isUser)):}]
        <div class="alert alert-danger">
            [{!$Website->__('Vous devez vous connecter pour afficher ce contenu')!}] : <a href="[{!$this->loginUrl!}]&back=[{!urlencode($Website->getCurrentUrl())!}]">Se connecter</a> ou <a href="[{!$this->registerUrl!}]&back=[{!urlencode($Website->getCurrentUrl())!}]">S'inscrire</a>
        </div>
    [??]
        <div class="alert alert-danger">
            [{!$Website->__('Vous ne pouvez pas voir ce contenu')!}]
        </div>
    [?]
    </div>
</div>
<!-- doorGets:end:modules/multipage/multipage_listing -->