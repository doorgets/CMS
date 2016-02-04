<?php

$_doorGets = null;

if (isset($doorGets)) {
    $_doorGets = $doorGets;
} elseif(isset($this)) {
    $_doorGets = $this->doorGets;
}

if ($_doorGets) {

    $liste['page']               = $listeModules['page']              = $_doorGets->__('Page Statique');
    $liste['multipage']          = $listeModules['multipage']         = $_doorGets->__('Multi-Pages Statiques');
    //$liste['shop']               = $listeModules['shop']              = $_doorGets->__("Boutique");
    $liste['blog']               = $listeModules['blog']              = $_doorGets->__("Blog");
    $liste['news']               = $listeModules['news']              = $_doorGets->__("Fil d'actualités");
    $liste['sharedlinks']        = $listeModules['sharedlinks']       = $_doorGets->__("Partage de liens");
    $liste['onepage']            = $listeModules['onepage']           = $_doorGets->__("Onepage");
    $liste['video']              = $listeModules['video']             = $_doorGets->__('Galerie vidéos');
    $liste['image']              = $listeModules['image']             = $_doorGets->__("Galerie d'images");
    $liste['faq']                = $listeModules['faq']               = $_doorGets->__('FAQ');
    $liste['partner']            = $listeModules['partner']           = $_doorGets->__('Partenaires');
    $liste['inbox']              = $listeModules['inbox']             = $_doorGets->__('Formulaire de contact');
    $liste['link']               = $listeModules['link']              = $_doorGets->__('Lien de redirection');

    $listeWidgets['block']             = $_doorGets->__('Bloc Statique');
    $listeWidgets['survey']            = $_doorGets->__('Sondage');
    $listeWidgets['carousel']          = $_doorGets->__('Carousel');
    $listeWidgets['genform']           = $_doorGets->__('Formulaire');

    $listeInfos = array(
        'page' => array(
            'description' => $_doorGets->__('Créer une page simple'),
            'image' => BASE_IMG.'mod_page.png',
        ),
        'multipage' => array(
            'description' => $_doorGets->__('Créer plusieurs pages simple'),
            'image' => BASE_IMG.'mod_multipage.png',
        ),
        'shop' => array(
            'description' => $_doorGets->__("Créer une boutique en ligne"),
            'image' => BASE_IMG.'mod_shop.png',
        ),
        'blog' => array(
            'description' => $_doorGets->__("Créer un blog"),
            'image' => BASE_IMG.'mod_blog.png',
        ),
        'news' => array(
            'description' => $_doorGets->__("Créer un fil d'actualités"),
            'image' => BASE_IMG.'mod_news.png',
        ), 
        'sharedlinks' => array(
            'description' => $_doorGets->__("Partage de liens"),
            'image' => BASE_IMG.'mod_sharedlinks.png',
        ),
        'onepage' => array(
            'description' => $_doorGets->__("Onepage"),
            'image' => BASE_IMG.'mod_onepage.png',
        ),
        'inbox' => array(
            'description' => $_doorGets->__('Un formulaire pour prendre contact avec vous'),
            'image' => BASE_IMG.'mod_inbox.png',
        ),
        'link' => array(
            'description' => $_doorGets->__('Lien de redirection à ajouter au menu'),
            'image' => BASE_IMG.'mod_link.png',
        ),
        'video' => array(
            'description' => $_doorGets->__('Créer une galerie vidéos youtube'),
            'image' => BASE_IMG.'mod_video.png',
        ),
        'image' => array(
            'description' => $_doorGets->__("Créer votre galerie d'images"),
            'image' => BASE_IMG.'mod_image.png',
        ),
        'faq' => array(
            'description' => $_doorGets->__('Liste de questions fréquentes'),
            'image' => BASE_IMG.'mod_faq.png',
        ),
        'partner' => array(
            'description' => $_doorGets->__('Afficher la liste de vos partenaires'),
            'image' => BASE_IMG.'mod_partner.png',
        ),
        
        'genform' => array(
            'description' => $_doorGets->__('Formulaire'),
            'image' => BASE_IMG.'mod_genform.png',
        ),
        'carousel' => array(
            'description' => $_doorGets->__('Carousel'),
            'image' => BASE_IMG.'mod_carousel.png',
        ),
        'survey' => array(
            'description' => $_doorGets->__('Sondage'),
            'image' => BASE_IMG.'mod_survey.png',
        ),
        'block' => array(
            'description' => $_doorGets->__('Créer des blocs statiques'),
            'image' => BASE_IMG.'mod_block.png',
        ),
    );

    if (SAAS_ENV && isset($editMode) && !$editMode) {
        if (!SAAS_MODULES_PAGE) {
            unset($listeModules['page']);unset($liste['page']);
        }

        if (!SAAS_MODULES_MULTIPAGE) {
            unset($listeModules['multipage']);unset($liste['multipage']);
        }

        if (!SAAS_MODULES_ONEPAGE) {
            unset($listeModules['onepage']);unset($liste['onepage']);
        }

        if (!SAAS_MODULES_SHOP) {
            unset($listeModules['shop']);unset($liste['shop']);
        }

        if (!SAAS_MODULES_BLOG) {
            unset($listeModules['blog']);unset($liste['blog']);
        }

        if (!SAAS_MODULES_NEWS) {
            unset($listeModules['news']);unset($liste['news']);
        }
        if (!SAAS_MODULES_IMAGE) {

            unset($listeModules['image']);unset($liste['image']);
        }

        if (!SAAS_MODULES_SHAREDLINKS) {
            unset($listeModules['sharedlinks']);unset($liste['sharedlinks']);
        }

        if (!SAAS_MODULES_VIDEO) {
            unset($listeModules['video']);unset($liste['video']);
        }

        if (!SAAS_MODULES_FAQ) {
            unset($listeModules['faq']);unset($liste['faq']);
        }

        if (!SAAS_MODULES_PARTNER) {
            unset($listeModules['partner']);unset($liste['partner']);
        }

        if (!SAAS_MODULES_CONTACT) {
            unset($listeModules['inbox']);unset($liste['inbox']);
        }

        if (!SAAS_MODULES_LINK) {
            unset($listeModules['link']);unset($liste['link']);
        }

        if (!SAAS_WIDGET_BLOCK) {
            unset($listeWidgets['block']);unset($liste['block']);
        }

        if (!SAAS_WIDGET_SURVEY) {
            unset($listeWidgets['survey']);unset($liste['survey']);
        }

        if (!SAAS_WIDGET_CAROUSEL) {
            unset($listeWidgets['carousel']);unset($liste['carousel']);
        }

        if (!SAAS_WIDGET_FORM) {
            unset($listeWidgets['genform']);unset($liste['genform']);
        }
    }
    

}
