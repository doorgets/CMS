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

    
    $listeCategories = $this->doorGets->categorieSimple_;
    unset($listeCategories[0]);
    $listeCategoriesContent = $this->doorGets->_toArray($isContent['categorie']);
    
    unset($aActivation[0]);
    $urlLangueTraduction = '';
    $cLanguageWebsite = count($this->doorGets->allLanguagesWebsite);
    if ($cLanguageWebsite > 1) { $urlLangueTraduction = 't/'.$lgActuel.'/'; }


    $description = $this->doorGets->_cleanPHP($isContent['article_tinymce']);
    $shortDescription = $this->doorGets->_cleanPHP($isContent['short_description_tinymce']);
    
    $ruri = $this->doorGets->Uri;

    $cVersion = $this->getCountVersion();
    $versions = $this->getAllVersion();

    $url = "?controller=module".$moduleInfos['type']."&uri=".$moduleInfos['uri']."&action=edit&id=".$isContent['id_content']."&lg=".$lgActuel;
    $aAuthorBadge = Constant::$modulesWithUserBadge;
    $moduleType = "module".$moduleInfos['type'];
    $i = 1;

    $QtyFinal = ($hasUnlimited) ? Constant::$infinite: $isContent['quantity_stock'];
    $vatStore = (!empty($this->doorGets->configWeb['store_vat']))?$this->doorGets->configWeb['store_vat']:0;

    $aTaxes = array(
        0 => 'Taxe par défaut - '.$vatStore.'%'
    );
    if (!empty($this->cart->taxes)) {
        foreach ($this->cart->taxes as $taxe) {
            $aTaxes[$taxe['id']] = $taxe['title'].' - '.$taxe['percent'].'%';
        }
    }
    
    $hasDematerialized = ($isContent['product_type'] === 'dematerialized')?true:false;

    $currencyCode = $this->doorGets->configWeb['currency'];
    $currencyIcon = Constant::$currencyIcon[$currencyCode]
?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        
        <legend>
            [{!$htmlEditTop!}]
        </legend>

        <ul class="pager">
            <li class="previous [{?(empty($urlPrevious)):}]disabled[?]"><a href="[{!$urlPrevious!}]">&larr; [{!$this->doorGets->__('Précèdent')!}]</a></li>
            <li class="center">[[{!$isContent['product_type']!}]]</li>
            <li class="next [{?(empty($urlNext)):}]disabled[?]"><a href="[{!$urlNext!}]">[{!$this->doorGets->__('Suivant')!}] &rarr;</a></li>
        </ul>
        
        [{!$this->doorGets->Form->open('post','');}]
        <div >
            <ul class="nav nav-tabs">
                <li class="active" role="presentation" ><a data-toggle="tab" href="#tabs-1">[{!$this->doorGets->__('Information')!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-2">[{!$this->doorGets->__("Galery d'image")!}]</a></li>
                <li role="presentation" ><a data-toggle="tab" href="#tabs-3">[{!$this->doorGets->__("META")!}]</a></li>
                [{?($is_modo):}]
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-4">[{!$this->doorGets->__('Commentaire')!}]</a></li>
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-5">[{!$this->doorGets->__('Paramètres')!}]</a></li>
                    <li role="presentation" ><a data-toggle="tab" href="#tabs-6">[{!$this->doorGets->__('Version')!}]</a></li>
                [?]
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tabs-1">
                    <div class="row">
                        [{?($is_modo):}]
                            <div class="col-md-12">
                                [{!$this->doorGets->Form->select($this->doorGets->__('Statut'),'active',$aActivation,$isContent['active']);}]
                            <div class="separateur-tb"></div>
                            </div>
                        [?] 
                        <div class="col-md-[{?($is_modo):}]6[??]12[?]">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Titre').' <span class="cp-obli">*</span>','titre','text',$isContent['titre']);}]
                        </div>
                        [{?($is_modo):}]
                        <div class="col-md-6">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Url simplifiée").' <span class="cp-obli">*</span> <small style="font-weight:100; ">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','text',$isContent['uri']);}]
                        </div> 
                        [??]
                            [{!$this->doorGets->Form->input($this->doorGets->__("Url simplifiée").' <span class="cp-obli">*</span> <small style="font-weight:100;">('.$this->doorGets->__("Caractères alpha numérique seulement").')</small><br />','uri','hidden',$isContent['uri']);}]  
                        [?]
                    </div> 
                    [{?($isContent['active'] === '2'):}]
                        <div class="separateur-tb"></div>
                        <div class="alert alert-success"><a target="blank" href="[{!URL.$urlLangueTraduction.'?'.$moduleInfos['uri'].'='.$isContent['uri']!}]">[{!URL.$urlLangueTraduction.'?'.$moduleInfos['uri'].'='!}]<span>[{!$isContent['uri']!}]</span> <b class="glyphicon glyphicon-share-alt"></b></a></div>
                    
                    [?]
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Image de couverture')!}]</h4>
                    <div class="separateur-tb"></div>
                    [{?(!empty($isContent['image'])):}]
                        <div class="separateur-tb"></div>
                        <img src="[{!URL.'data/'.$this->doorGets->Uri.'/'.$isContent['image']!}]" class="edit-image-[{!$ruri!}] img-responsive edit-image-back" />
                    [?]
                    [{!$this->doorGets->Form->fileAjax('','image',$isContent['image']);}]
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Identification du produit')!}]</h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Référence').' <span class="cp-obli">*</span>','code','text',$isContent['code'],'');}] 
                        </div>
                        [{?(!$hasDematerialized):}]
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Code-barres').' EAN-13/JAN','code_ean','text',$isContent['code_ean'],'');}] 
                        </div>
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__('Code-barres').' UPC','code_upc','text',$isContent['code_upc'],'');}] 
                        </div>
                        [?]
                    </div>
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Taxe')!}]</h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form->select($this->doorGets->__("Choisir une régle"),'id_taxe',$aTaxes,$isContent['id_taxe'],'');}] 
                        </div>
                    </div>
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Prix')!}]</h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        [{?(!$hasDematerialized):}]
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Prix d'achat").' '.$currencyIcon.' ','buying_price','text',$isContent['buying_price'],'is-float-input');}] 
                        </div>
                        [??]
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Gratuit'),'id_free',1,$isActiveIsFree)!}]
                        </div>
                        [?]
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->input($this->doorGets->__("Prix de vente").' '.$currencyIcon.' HT','price','text',$isContent['price'],'is-float-input');}] 
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                    [{?(!$hasDematerialized):}]
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Quantités')!}] <span class="red">[{!$QtyFinal!}]</span></h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-2">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Quantité illimité'),'quantity_limit',1,$isActiveQuantityLimit,'is-digit-input')!}]
                        </div>

                        <div class="col-md-3 quantity-limit-false" [{?($hasUnlimited):}]style="display: none;"[?] >
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Accepter les commandes en cas de rupture de stock'),'quantity_nostock',1,$isActiveQuantityNostock)!}]
                        </div>
                        <div class="col-md-3 quantity-limit-false" [{?($hasUnlimited):}]style="display: none;"[?]>
                            [{!$this->doorGets->Form->select('','quantity_action',$aStock,$isContent['active']);}]
                            [{!$this->doorGets->Form->input('','quantity_action_value','text',0,'','is-digit-input');}] 
                        </div>
                    </div>
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Options')!}]</h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Disponible à la vente'),'opt_sale',1,$isActiveOptSale)!}]
                        </div>
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Afficher le prix'),'opt_show_price',1,$isActiveOptShowPrice)!}]
                        </div>
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Exclusivité web'),'opt_only_web',1,$isActiveOptOnlyWeb)!}]
                        </div>
                    </div>
                    <div class="separateur-tb-ptop"></div>
                    [?]
                    <h4 class="green">[{!$this->doorGets->__('Promotion')!}]</h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-3">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ne pas autoriser la promotion'),'promotion_active',1,$isActivePromotion)!}]
                        </div>
                        <!-- <div class="col-md-3">
                            [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ne pas autoriser les codes de promotions'),'promotion_code_active',1,$isActivePromotionCode)!}]
                        </div> -->
                    </div>
                    [{?($hasDematerialized):}]
                        <div class="separateur-tb-ptop"></div>
                        <h4 class="green">[{!$this->doorGets->__('Fichier')!}] <small><i class="fa fa-archive"></i> .zip</small></h4>
                        <div class="separateur-tb"></div>
                        <div class="row">
                            <div class="col-md-12">
                            [{?(!empty($isContent['id_file'])):}]
                                <div style="border: solid 1px #ccc;padding:5px 8px;border-radius:0px;" class="edit-file-[{!$ruri!}]">
                                    <i class="fa fa-check fa-lg green-c"></i> 
                                    <a href="[{!URL.'data/_download/'.$this->doorGets->Uri.'/'.$isContent['file']['path']}]" >
                                        [{!URL.'data/_download/'.$this->doorGets->Uri.'/'.$isContent['file']['path']}]
                                    </a>
                                    <i class="fa fa-times fa-lg pull-right remove-file-ajax red-c"></i>
                                </div>
                                
                            [?]
                            [{!$this->doorGets->Form->fileDownloadAjax($this->doorGets->__('Votre fichier').'<span id="span-upload-recepetion-moduleshop_edit_file_archive"></span>','file_archive',$isContent['id_file']);}]
                            <div class="separateur-tb"></div>
                            <script type="text/javascript">
                                isUploadedDownloadInput('moduleshop_edit_file_archive');
                            </script>
                            </div>
                        </div>
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form->input($this->doorGets->__("Lien").' ','external_link','text',$isContent['external_link']);}]
                        
                        <div class="separateur-tb"></div>
                    [?]
                    <div class="separateur-tb-ptop"></div>
                    <h4 class="green">[{!$this->doorGets->__('Informations')!}]</h4>
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Résumé').' <span class="cp-obli">*</span>','short_description_tinymce',$shortDescription,'tinymce ckeditor')!}]
                                    <div class="separateur-tb"></div>
                                </div>
                                <div class="col-md-12">
                                    [{!$this->doorGets->Form->textarea($this->doorGets->__('Description').' <span class="cp-obli">*</span>','article_tinymce',$description,'tinymce ckeditor')!}]
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="list-group">
                                <div class="list-group-item"><b class="glyphicon glyphicon-align-justify"></b> [{!$this->doorGets->__('Catégories')!}]</div>
                                [{?(!empty($listeCategories)):}]
                                    [{/($listeCategories as $uri=>$value):}]
                                        [{$valCheck = '';}]
                                        [{?(in_array($value['id'],$listeCategoriesContent)):}]
                                            [{$valCheck = 'checked';}]
                                        [?]
                                        <div class="list-group-item cat-index-level-[{!$value['level']!}]">
                                            [{!$this->doorGets->Form->checkbox($value['name'],'categories_'.$value['id'],'1',$valCheck,'cat-edit-level-'.$value['level'])!}]
                                        </div>
                                    [/]
                                [?]
                            </div>
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->inputTags($this->doorGets->__('Tags'),'tags',$isContent['tags']);}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-2">
                [{?(in_array($moduleInfos['type'],$aAuthorBadge)):}]
                    <ul id="sortable-gallery-image">
                        [{?(!empty($image_gallery)):}]
                            [{/($image_gallery as $path):}]
                            <li class="ui-state-default col-md-3 container-ajax-file-[{!$moduleType!}]_edit_image_gallery_[{!$i!}]" >
                                
                                <b class="glyphicon glyphicon-remove red pull-right " onclick="removeImageContainer('container-ajax-file-[{!$moduleType!}]_edit_image_gallery_[{!$i!}]','[{!$moduleType!}]_edit_image_gallery','[{!$path!}]')" ></b>
                                <img style="width:100%;" src="[{!URL.'data/'.$moduleInfos['uri'].'/'.$path!}]" />
                                
                            </li>
                            [{ $i++; }]
                            [/]
                        [?]
                    </ul>
                    [{!$this->doorGets->Form->multiFileAjax($this->doorGets->__('Ajouter une image'),'image_gallery','',$this->doorGets->_toArrayInv($image_gallery,';'))!}]
                [?]
                </div>
                <div class="tab-pane fade" id="tabs-3">
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Titre'),'meta_titre','text',$isContent['meta_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta Description'),'meta_description','text',$isContent['meta_description']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Meta mots clés'),'meta_keys','text',$isContent['meta_keys']);}]
                    <div class="separateur-tb"></div>  
                    <hr />
                    <h4 class="violet">Facebook META</h4>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_facebook_type',$this->doorGets->getArrayForms('facebook_type'),$isContent['meta_facebook_type']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_facebook_titre','text',$isContent['meta_facebook_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_facebook_description','text',$isContent['meta_facebook_description']);}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($isContent['meta_facebook_image'])):}]
                        <img src="[{!URL.'data/'.$ruri.'/'.$isContent['meta_facebook_image']!}]" class="edit-image-facebook-[{!$ruri!}] img-responsive edit-image-back" />
                    [?]
                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_facebook_image',$isContent['meta_facebook_image']);}]
                    <div class="separateur-tb"></div>
                    <hr />
                    <h4 class="violet">Twitter META</h4>
                    <div class="separateur-tb"></div
                    [{!$this->doorGets->Form->select($this->doorGets->__('Type'),'meta_twitter_type',$this->doorGets->getArrayForms('twitter_type'),$isContent['meta_twitter_type']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Titre'),'meta_twitter_titre','text',$isContent['meta_twitter_titre']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input($this->doorGets->__('Description'),'meta_twitter_description','text',$isContent['meta_twitter_description']);}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($isContent['meta_twitter_image'])):}]
                        <img src="[{!URL.'data/'.$ruri.'/'.$isContent['meta_twitter_image']!}]" class="edit-image-twitter-[{!$ruri!}] img-responsive edit-image-back" />
                    [?]
                    [{!$this->doorGets->Form->fileAjax($this->doorGets->__('Image'),'meta_twitter_image',$isContent['meta_twitter_image']);}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->input('Player iframe URL (https)','meta_twitter_player','text',$isContent['meta_twitter_player']);}]
                    <div class="separateur-tb"></div>
                </div>
            [{?($is_modo):}]
                <div class="tab-pane fade" id="tabs-4">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires doorGets'),'comments',1,$isActiveComments)!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires').' Disqus ','disqus','1',$isActiveDisqus)!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser les commentaires').' Facebook ','facebook','1',$isActiveFacebook)!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-5">
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Autoriser le partage').' ShareThis','partage',1,$isActivePartage)!}]
                    <div class="separateur-tb"></div>
                    [{?(in_array($moduleInfos['type'],$aAuthorBadge)):}]
                        [{!$this->doorGets->Form->checkbox($this->doorGets->__("Afficher de badge de l'auteur"),'author_badge',1,$isAuthorBadge)!}]
                    [?]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form->checkbox($this->doorGets->__('Ajouter au flux RSS').'','in_rss',1,$isActiveRss)!}]
                    <div class="separateur-tb"></div>
                </div>
                <div class="tab-pane fade" id="tabs-6">
                    <h4>
                        [{!$this->doorGets->__('Nombre de version')!}] : [{!$cVersion!}]
                    </h4>
                    [{?($cVersion > 0):}]
                    <table class="table text-center">
                        <tr>
                            <th>[{!$this->doorGets->__('Id')!}]</th>
                            <th>[{!$this->doorGets->__('Pseudo utilisateur')!}]</th>
                            <th>[{!$this->doorGets->__('Id utilisateur')!}]</th>
                            <th>[{!$this->doorGets->__('Id groupe')!}]</th>
                            <th>[{!$this->doorGets->__('Statut')!}]</th>
                            <th>[{!$this->doorGets->__('Date')!}]</th>
                            <th></th>
                        </tr>
                        [{/($versions as $version):}]
                            [{
                                $ImageStatut = 'fa-ban red';
                                if ($version['active'] == '2') {
                                    $ImageStatut = 'fa-eye green-c';
                                } elseif ($version['active'] == '3') {
                                    $ImageStatut = 'fa-hourglass-start orange-c';
                                } elseif ($version['active'] == '4') {
                                    $ImageStatut = 'fa-pencil gris-c';
                                }

                                $urlStatut = '<i class="fa '.$ImageStatut.' fa-lg" ></i>';
                            }]
                            <tr>
                                <td>[{!$version['id']!}]</td>
                                <td>[{!$version['pseudo']!}]</td>
                                <td>[{!$version['id_user']!}]</td>
                                <td>[{!$version['id_groupe']!}]</td>
                                <td>[{!$urlStatut!}]</td>
                                <td>[{!GetDate::in($version['date_creation'])!}]</td>
                                <td "><a href="[{!$url.'&version='.$version['id']!}]" title="[{!$this->doorGets->__('Charger')!}]"><b class="glyphicon glyphicon-transfer "></b></a></td>
                            </tr>
                        [/]
                    </table>
                    [?]
                </div>
            [?]
            </div>
        </div>
        [{?($user_can_edit):}]
        <div class="separateur-tb"></div>
        <div class="text-center">
            [{!$this->doorGets->Form->submit($this->doorGets->__('Sauvegarder'));}]
        </div>
        [??]
            [{!$htmlCanotEdit!}]
        [?]

        [{!$this->doorGets->Form->close();}]

        <script type="text/javascript">
            
            $('#moduleshop_edit_quantity_limit').click(function(event) {
                var val = $(this).is(':checked');
                if (val) {  $('.quantity-limit-false').hide();  } 
                else {  $('.quantity-limit-false').show();  }
            });
            $("#module[{!$moduleInfos['type']!}]_edit_titre").keyup(function() {
            
                var str = $(this).val();
                $("#module[{!$moduleInfos['type']!}]_edit_meta_titre").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_facebook_titre").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_twitter_titre").val(str);
                
            });
            $("#module[{!$moduleInfos['type']!}]_edit_meta_description").keyup(function() {
            
                var str = $(this).val();
                var lendesc =  str.length;
                if (lendesc >= 250) {
                    str = str.substr(0,250);
                }
                $("#module[{!$moduleInfos['type']!}]_edit_meta_facebook_description").val(str);
                $("#module[{!$moduleInfos['type']!}]_edit_meta_twitter_description").val(str);
            });

            isUploadedInput("moduleshop_edit_image");
            isUploadedMultiInput("moduleshop_edit_image_gallery");
            isUploadedFacebookInput("moduleshop_edit_meta_facebook_image");
            isUploadedTwitterInput("moduleshop_edit_meta_twitter_image");
        </script>
    </div>
</div>
