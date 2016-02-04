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
 $currencyCode = (!array_key_exists($Website->configWeb['currency'],Constant::$currency)) ? 'eur': $Website->configWeb['currency'];
 $currencyIcon = Constant::$currencyIcon[$currencyCode];
 $keyToSend = $Website->getModule().'-'.$isContent['id_content'];
 $countCartProduction = $cart->hasInCart($keyToSend);
 
?>
<!-- doorGets:start:modules/shop/shop_content -->
<div class="doorGets-shop-content doorGets-module-[{!$Website->getModule()!}]">
    <div class="row">
        <div class="col-md-12">
            [{?($this->userPrivilege['add']):}]
            <div class="btn-group pull-right btn-add-content">
                <a href="[{!$urlAdd!}]" class="btn btn-success btn-large">
                    <b class="glyphicon glyphicon-plus"></b> 
                    <span>[{!$Website->__('Créer un produit')!}]</span>
                </a>
            </div>
            [?]
            <ol class="breadcrumb">
                <li><a href="[{!$Website->getBaseUrl()!}]?[{!$Website->getModule()!}]">[{!$labelModule!}]</a></li>
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
                    <div class="row">
                        <div class="col-md-8">
                            <h2>
                                [{!$isContent['title']!}] 
                                <br /><small>[{!$isContent['code']!}]
                                [{?(!empty($linksToCategories)):}]<span class="pull-right" > <i class="fa fa-tags"></i> [{!$linksToCategories!}]</span>[?]</small>
                            
                            </h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="img-shop-content" ><img src="[{!URL!}]data/[{!$Website->getModule()!}]/[{!$isContent['image']!}]" class="img-responsive  img-shop-content" /></div>
                                </div>
                            </div>
                            <div class="row shop-list-image">
                                <div class="col-md-12">
                                    [{?(!empty($isContent['image_gallery'])):}] 
                                    <div class="magnificpopup-parent-container">
                                        [{?(!empty($isContent['image_gallery'])):}]
                                            [{/($isContent['image_gallery'] as $pathFile):}]
                                                <a href="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]"><img src="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]" alt="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]" title="[{!URL.'data/'.$Website->getModule().'/'.$pathFile!}]"></a>
                                            [/]
                                        [?]
                                    </div>
                                    [?]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                [{?($isContent['opt_show_price']):}]
                                <div class="col-md-12 text-center"><div class="price-content"><span class="price-item">[{!$isContent['price']!}]</div></div>
                                <div class="col-md-12 text-right">
                                    <small>incl. VAT</small>
                                </div>
                                [?]
                                [{?($isContent['opt_only_web']):}]
                                    <div class="col-md-12">
                                        <i class="fa fa-globe"></i> [{!$Website->__("Exclusivité web")!}]
                                    </div>
                                [?]
                                
                                <div class="col-md-12 padding-20">
                                    [{!$isContent['description']!}]
                                </div>
                                [{?(!$isContent['quantity_limit'] && $isContent['quantity_stock'] < 1):}]
                                    <div class="col-md-12 red">
                                        <i class="fa fa-exclamation-triangle"></i> [{!$Website->__("Rupture de stock")!}]
                                    </div>
                                [?]
                                [{?(
                                    ($isContent['quantity_limit']
                                    || (!$isContent['quantity_limit'] && $isContent['quantity_stock'] > 1)
                                    || $isContent['quantity_nostock']
                                    ) && $isContent['opt_sale']
                                ):}]    
                                    <div class="col-md-12 ">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="text-center">[{!$Website->__("Quantité")!}]</th>
                                            </tr>
                                            <tr class="tr-[{!$keyToSend!}]">
                                                <td class="text-center">
                                                    <i class="btn fa fa-minus click-cart-minus"></i>
                                                    <input class="input-qty-checkout qty-shop-content input-qty-checkout-[{!$isContent['id_content']!}]"  value="[{!$countCartProduction!}]"> 
                                                    <i class="btn fa fa-plus click-cart-plus"></i>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12 text-center"><a href="[{!URL.'ajax/?controller=cart&action=add&uri='.$Website->getModule().'&id='.$isContent['id_content'].'&lg='.$Website->myLanguage!}]" class="btn btn-success btn-block btn-lg addCart"><i class="fa fa-shopping-basket"></i> [{!$Website->__('Ajouter au panier')!}]</a></div>
                                [?]
                                <div class="col-md-12 text-center"><a href="[{!URL.'ajax/?controller=cart&action=add&uri='.$Website->getModule().'&id='.$isContent['id_content'].'&lg='.$Website->myLanguage!}]" class="btn btn-default btn-block btn-lg addCart"><b class="glyphicon glyphicon-heart"></b> [{!$Website->__('Ajouter à ma WISHLIST')!}]</a></div>
                                <div class="col-md-12 ">
                                    [{?($sharethis):}]
                                    <div class="box-sharethis">
                                        [{!$Website->getHtmlShareThis();}]
                                    </div>
                                    [?]
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab-bottom tab-content">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a data-toggle="tab" href="#decription-product">[{!$Website->__('Description')!}]</a></li>
                            [{?($comments || $facebook || $disqus):}]
                            <li role="presentation" ><a data-toggle="tab" href="#comments-product">[{!$Website->__('Avis')!}]</a></li>
                            [?]
                        </ul>
                        <div class="tab-pane fade in active" id="decription-product">
                            [{!$isContent['article']!}]
                        </div>
                        [{?($comments || $facebook || $disqus):}]
                        <div class="tab-pane" id="comments-product">
                            [{?($comments):}]
                            <br />
                            <small>[{!$isContent['stars']!}]/5 - <input type="hidden" class="rating green" data-fractions="1" disabled="disabled" value="[{!$isContent['stars']!}]"/> - [{!$isContent['stars_count']!}] 
                            [{?($isContent['stars_count'] > 1):}][{!$Website->__('votes')!}][??][{!$Website->__('vote')!}][?]
                            </small><br />
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
                        </div>
                        [?]
                    </div>
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
<!-- doorGets:end:modules/shop/shop_content -->
