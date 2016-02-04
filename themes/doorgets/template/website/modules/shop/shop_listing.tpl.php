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
        $contents[$i]['uri']            => $uri
        $contents[$i]['title']          => $title
        $contents[$i]['description']    => $description
        $contents[$i]['article']        => $article
        $contents[$i]['categories']     => $categories
        $contents[$i]['order']          => $order
        $contents[$i]['date']           => $date

 */

    $currencyCode = (!array_key_exists($Website->configWeb['currency'],Constant::$currency)) ? 'eur': $Website->configWeb['currency'];
    $currencyIcon = Constant::$currencyIcon[$currencyCode];
?>
<!-- doorGets:start:modules/shop/shop_listing -->
<div class="doorGets-shop-listing doorGets-module-[{!$Website->getModule()!}]">
    <div class="row">
        [{?($Website->hasCategories):}]<div class="col-md-9">[??]<div class="col-md-12">[?]
            [{?($this->userPrivilege['add']):}]
            <div class="btn-group pull-right btn-add-content">
                <a href="[{!$urlAdd!}]" class="btn btn-success btn-large">
                    <b class="glyphicon glyphicon-plus"></b> 
                    <span>[{!$Website->__('Créer un produit')!}]</span>
                </a>
            </div>
            [?]
            [{?(!$Website->hasCategories):}]
                <span class="pull-right">[{!$Website->getHtmlModuleSearch($q)!}]</span>
            [?]
            <ol class="breadcrumb">
                <li><a href="[{!$Website->getBaseUrl()!}]?[{!$Website->getModule()!}]">[{!$labelModule!}]</a></li>
                [{?(!empty($parentCategories)):}]
                    [{/($parentCategories as $Categorie):}]
                        <li [{?($Categorie['position'] === 1):}]class="active"[?]>
                            [{?($Categorie['position'] !== 1):}]<a href="[{!$Website->getBaseUrl()!}]?doorgets=[{!$Categorie['uri']!}]">[?]
                            [{!$Categorie['nom']!}]
                            [{?($Categorie['position'] !== 1):}]</a>[?]
                        </li>
                    [/]
                [?]
            </ol>
            <div class="doorGets-listing-contents-title">
                [{!$ini!}] [{!$Website->__('à')!}] [{!$finalPer!}] [{!$Website->__('sur')!}] <b>[{!$totalContents!}] [{?($totalContents > 1):}] [{!$Website->__('produits')!}] [??]  [{!$Website->__('produit')!}][?]</b>
                [{?(!empty($q)):}]
                    [{!$Website->__('pour la recherche')!}] : <b>[{!$q!}]</b>
                [{???(empty($categoryLabel)):}]
                    [{!$Website->__('dans toutes les catégories')!}]
                [??]
                    [{!$Website->__('dans la catégorie')!}] [{!$categoryLabel!}]
                [?]
            </div>
            [{?(
                ( !$this->modulePrivilege['public_module'] && $this->userPrivilege['show'] )
                || $this->modulePrivilege['public_module']
            ):}]
                [{?(!empty($contents)):}]
                    <div class="row">
                    [{/($contents as $content):}]
                        <div class="col-md-4 content-listing-shop">    
                            <div class=" top-listing-shop">
                                <a href="[{!$Website->getBaseUrl()!}]?[{!$Website->getModule()!}]=[{!$content['uri']!}]">
                                    <img src="[{!URL!}]data/[{!$Website->getModule()!}]/[{!$content['image']!}]" class="img-thumbnail img-responsive hover-t img-shop-listing" />
                                </a>
                            </div>
                            <div class="row bottom-listing-shop">
                                <div class="col-md-12 text-center">
                                    <div class="bottom-listing-shop-title">[{!$content['title']!}]</div>
                                    [{?($content['opt_show_price']):}]
                                    <div class="bottom-listing-shop-price">[{!$content['price']!}]</div>
                                    [?]
                                </div>
                            </div>
                        </div>
                    [/]
                    </div>
                [?]
                [{?(empty($contents)):}]
                <div class="info-not-found">
                    [{!$Website->__('Aucun produit trouvée')!}] [{?(!empty($q)):}][{!$Website->__('pour votre recherche')!}][?].
                </div>
                [?]
                [{?(!empty($getPagination)):}]
                    <br /><br />
                    [{!$getPagination!}]
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
        [{?($Website->hasCategories):}]
            <div class="col-md-3">
                [{!$Website->getHtmlModuleSearch($q)!}]
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <a href="[{!BASE_URL.'?'.$Website->getModule()!}]"><h3 class="panel-title">[{!$Website->__('Catégories')!}]</h3></a>
                    </div>
                    <div class="panel-body">
                      [{!$Website->getHtmlModuleCategories()!}]
                    </div>
                </div>
            </div>
        [?]
    </div>
</div>
<!-- doorGets:end:modules/shop/shop_listing -->
