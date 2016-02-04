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
        $isContent['id_content'] => $id_content
        $isContent['categorie'] => $categorie
        $isContent['titre' => $titre   
        $isContent['description'] => $description
        $isContent['uri'] => $uri
        $isContent['date_creation'] => $date_creation
        $isContent['article'] => $article

 */
 
?>
<!-- doorGets:start:modules/image/image_content -->
<div class="doorGets-image-content doorGets-module-[{!$Website->getModule()!}]">
    <div class="row">
        <div class="col-md-12">
            [{?($this->userPrivilege['add']):}]
            <div class="btn-group pull-right btn-add-content">
                <a href="[{!$urlAdd!}]" class="btn btn-success btn-large">
                    <b class="glyphicon glyphicon-plus"></b> 
                    <span>[{!$Website->__('Ajouter une image')!}]</span>
                </a>
            </div>
            [?]
            <ol class="breadcrumb">
                
                <li><a href="[{!$Website->getBaseUrl()!}]?[{!$Website->getModule()!}]">[{!$labelModule!}]</a></li>
                <li class="active">[{!$isContent['title']!}]</li>
            </ol>
            [{?(
                ( !$this->modulePrivilege['public_module'] && $this->userPrivilege['show'] )
                || $this->modulePrivilege['public_module']
            ):}]
            <div class="doorGets-listing-contents left">
                [{?(!empty($isContent)):}]
                    [{?($this->userPrivilege['edit'] || $this->userPrivilege['delete'] || $this->userPrivilege['modo'] ):}]
                    <div class="btn-group navbar-right pull-right">
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
                                <li><a href="[{!$urlDelete!}]" class="navbut"><b class="glyphicon glyphicon-remove"></b> <span>[{!$Website->__('Supprimer')!}]</span></a></li>                            
                            [?]
                        </ul>
                    </div>
                    [?]
                    <h2>
                        [{!$isContent['title']!}]
                        [{?($comments):}]
                        <br />
                        <small>[{!$isContent['stars']!}]/5 - <input type="hidden" class="rating green" data-fractions="1" disabled="disabled" value="[{!$isContent['stars']!}]"/> - [{!$isContent['stars_count']!}] 
                        [{?($isContent['stars_count'] > 1):}][{!$Website->__('votes')!}][??][{!$Website->__('vote')!}][?]
                        </small><br />
                        [?]
                    </h2>
                    <div class="infos-content-title">
                        <i class="fa fa-calendar-plus-o"></i> [{!$isContent['date_creation']!}] 
                        [{?($isContent['date_creation'] !== $isContent['date_modification']):}] <i class="fa fa-calendar-check-o"></i> [{!$isContent['date_modification']!}][?]
                        [{?(!empty($linksToCategories)):}]<span class="pull-right"> <i class="fa fa-tags"></i> [{!$linksToCategories!}]</span>[?]
                    </div>
                    <p class="img-content">
                        [{?(!empty($nexContent)):}]<a href="[{!$nexContent['url']!}]">[?]
                            <img  src="[{!URL!}]data/[{!$Website->getModule()!}]/[{!$isContent['image']!}]"  />
                        [{?(!empty($nexContent)):}]</a>[?]
                    </p>
                    <p>
                        [{!$isContent['article']!}]
                    </p>
                    [{?(!empty($isContent['image_gallery'])):}]
                    <div class="magnificpopup-parent-container">
                        <h3>
                        [{?(count($isContent['image_gallery']) > 1):}]
                            [{!$Website->__('Image associées')!}]
                        [??]
                            [{!$Website->__('Image associée')!}]
                        [?]
                        </h3>
                        <div id="owl-[{!$Website->getModule()!}]" class="owl-carousel">
                            [{/($isContent['image_gallery'] as $pathFile):}]
                                <div class="item">
                                     <a href="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]"><img src="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]" alt="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]" title="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]"></a>
                                </div>
                            [/]
                        </div>
                        <script type="text/javascript">
                        window.addEventListener('load',function(){
                            
                            $("#owl-[{!$Website->getModule()!}]").owlCarousel({
                                slideSpeed : 300,
                                paginationSpeed : 400,
                                paginationSpeed : 1000,
                                goToFirstSpeed : 2000,
                                items : 5,
                                itemsDesktop : [1199,3],
                                itemsDesktopSmall : [979,3],
                                autoPlay: 3000,
                                stopOnHover : true,
                                navigation:true,
                                navigationText: [
                                  '<i class="fa fa-chevron-left"></i>',
                                  '<i class="fa fa-chevron-right"></i>'
                                ] 
                            });
                        })
                        </script>
                    </div>
                    [?]
                    [{?($moduleInfo[$Module]['all']['author_badge'] && $isContent['author_badge']):}]
                        [{!$Website->getHtmlBadge($isContent['id_user'])!}]
                    [?]
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
                                [{?(!empty($prevContent)):}]<a href="[{!$prevContent['url']!}]">&larr; [{!$prevContent['label']!}]</a>[?]
                            </li>
                            <li class="next">
                                [{?(!empty($nexContent)):}]<a href="[{!$nexContent['url']!}]">[{!$nexContent['label']!}] &rarr;</a>[?]
                            </li>
                        </ul>
                    </div>
                    <div class="container"> 
                        [{!$this->Website->getSimilarModuleTags(9);!}]
                    </div>
                [?]
            </div>
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
</div>
<!-- doorGets:end:modules/image/image_content -->
