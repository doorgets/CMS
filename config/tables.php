<?php

$table = array();

$table['_dg_firewall']['count'] = 0;
$table['_dg_firewall']['type'] = '_mod';
$table['_dg_firewall']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_firewall`;
    
    CREATE TABLE IF NOT EXISTS `_dg_firewall` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `adresse_ip` varchar(255) DEFAULT NULL,
        `level` int(11) DEFAULT '1',
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_block']['count'] = 0;
$table['_dg_block']['type'] = '_mod';
$table['_dg_block']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_block`;
    
    CREATE TABLE IF NOT EXISTS `_dg_block` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `uri` varchar(255) DEFAULT NULL,
        `groupe_traduction` text,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        `id_user` int(11) DEFAULT NULL,
        `id_groupe` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_block_traduction']['count'] = 0;
$table['_dg_block_traduction']['type'] = '_mod';
$table['_dg_block_traduction']['sql_create_table'] = " 
    
    DROP TABLE IF EXISTS `_dg_block_traduction`;
    CREATE TABLE IF NOT EXISTS `_dg_block_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_block` int(11) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `titre` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        `article_tinymce` text,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";
    
$table['_dg_carousel']['count'] = 0;
$table['_dg_carousel']['type'] = '_mod';
$table['_dg_carousel']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_carousel`;
    
    CREATE TABLE IF NOT EXISTS `_dg_carousel` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `uri` varchar(255) DEFAULT NULL,
        `groupe_traduction` text,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        `id_user` int(11) DEFAULT NULL,
        `id_groupe` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_carousel_traduction']['count'] = 0;
$table['_dg_carousel_traduction']['type'] = '_mod';
$table['_dg_carousel_traduction']['sql_create_table'] = " 
    
    DROP TABLE IF EXISTS `_dg_carousel_traduction`;
    CREATE TABLE IF NOT EXISTS `_dg_carousel_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_carousel` int(11) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `titre` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        `article_tinymce` text,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_inbox']['count'] = 0;
$table['_dg_inbox']['type'] = '_mod';
$table['_dg_inbox']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_inbox`;
    CREATE TABLE IF NOT EXISTS `_dg_inbox` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `uri_module` varchar(255) DEFAULT NULL,
        `sujet` varchar(255) NOT NULL,
        `nom` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `message` text,
        `telephone` varchar(255) DEFAULT NULL,
        `lu` int(11) NOT NULL DEFAULT '0',
        `archive` int(11) NOT NULL DEFAULT '0',
        `date_creation` int(11) NOT NULL DEFAULT '0',
        `date_archive` int(11) NOT NULL DEFAULT '0',
        `date_lu` int(11) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";


$table['_dg_links']['count'] = 0;
$table['_dg_links']['type'] = '_mod';
$table['_dg_links']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_links`;
    CREATE TABLE IF NOT EXISTS `_dg_links` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `langue` varchar(255) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `label` varchar(255) DEFAULT NULL,
        `link` varchar(255) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_newsletter']['count'] = 0;
$table['_dg_newsletter']['type'] = '_mod';
$table['_dg_newsletter']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_newsletter`;
    CREATE TABLE IF NOT EXISTS `_dg_newsletter` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) NOT NULL DEFAULT '0',
        `id_groupe` int(11) NOT NULL DEFAULT '0',
        `nom` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `description` text,
        `newsletter` int(11) DEFAULT '1',
        `client_ip` varchar(255) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_newsletter_emailling_campagne']['count'] = 0;
$table['_dg_newsletter_emailling_campagne']['type'] = '_mod';
$table['_dg_newsletter_emailling_campagne']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_newsletter_emailling_campagne`;
    CREATE TABLE IF NOT EXISTS `_dg_newsletter_emailling_campagne` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_user_groupe` int(11) DEFAULT NULL,
        `id_groupe` int(11) NOT NULL,
        `id_models` int(11) NOT NULL,
        `statut` varchar(255) NOT NULL,
        `titre` text NOT NULL,
        `description` text NOT NULL,
        `message` text,
        `date_creation` int(11) DEFAULT '0',
        `date_modification` int(11) DEFAULT '0',
        `date_validation` int(11) DEFAULT '0',
        `date_envoi` int(11) DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_newsletter_emailling_groupe']['count'] = 0;
$table['_dg_newsletter_emailling_groupe']['type'] = '_mod';
$table['_dg_newsletter_emailling_groupe']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_newsletter_emailling_groupe`;
    CREATE TABLE IF NOT EXISTS `_dg_newsletter_emailling_groupe` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `titre` varchar(255) DEFAULT NULL,
        `description` text NOT NULL,
        `date_creation` int(11) NOT NULL,
        `date_modification` int(11) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_newsletter_emailling_models']['count'] = 0;
$table['_dg_newsletter_emailling_models']['type'] = '_mod';
$table['_dg_newsletter_emailling_models']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_newsletter_emailling_models`;
    CREATE TABLE IF NOT EXISTS `_dg_newsletter_emailling_models` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `titre` varchar(255) DEFAULT NULL,
        `description` text,
        `langue` varchar(255) DEFAULT NULL,
        `format` varchar(255) DEFAULT NULL,
        `sujet` varchar(255) DEFAULT NULL,
        `article_tinymce` text,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_page']['count'] = 0;
$table['_dg_page']['type'] = '_mod';
$table['_dg_page']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_page`;
    CREATE TABLE IF NOT EXISTS `_dg_page` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT '0',
        `id_groupe` int(11) DEFAULT '0',
        `uri` varchar(255) DEFAULT NULL,
        `active` int(11) NOT NULL DEFAULT '0',
        `comments` int(11) NOT NULL DEFAULT '0',
        `partage` int(11) NOT NULL DEFAULT '1',
        `facebook` int(11) DEFAULT '0',
        `id_facebook` varchar(255) DEFAULT NULL,
        `disqus` int(11) DEFAULT '0',
        `id_disqus` varchar(255) DEFAULT NULL,
        `mailsender` int(11) DEFAULT '0',
        `sendto` varchar(255) DEFAULT NULL,
        `in_rss` int(11) NOT NULL DEFAULT '0',
        `ordre` int(11) NOT NULL DEFAULT '0',
        `groupe_traduction` text,
        `date_creation` int(11) DEFAULT NULL,
        `id_modo` int(111) DEFAULT NULL,
        `val_modo` int(11) DEFAULT '0',
        `date_modo` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";
    
$table['_dg_page_traduction']['count'] = 0;
$table['_dg_page_traduction']['type'] = '_mod';
$table['_dg_page_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_page_traduction`;
    CREATE TABLE IF NOT EXISTS `_dg_page_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_content` int(11) NOT NULL DEFAULT '0',
        `langue` varchar(255) DEFAULT NULL,
        `titre` varchar(255) DEFAULT NULL,
        `description` text,
        `article_tinymce` text,
        `uri` varchar(255) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `meta_titre` varchar(255) DEFAULT NULL,
        `meta_description` varchar(255) DEFAULT NULL,
        `meta_keys` varchar(255) DEFAULT NULL,
        `meta_facebook_type` varchar(255) DEFAULT NULL,
        `meta_facebook_titre` varchar(255) DEFAULT NULL,
        `meta_facebook_description` varchar(255) DEFAULT NULL,
        `meta_facebook_image` varchar(255) DEFAULT NULL,
        `meta_twitter_type` varchar(255) DEFAULT NULL,
        `meta_twitter_titre` varchar(255) DEFAULT NULL,
        `meta_twitter_description` varchar(255) DEFAULT NULL,
        `meta_twitter_image` varchar(255) DEFAULT NULL,
        `meta_twitter_player` varchar(255) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_page_version']['count'] = 0;
$table['_dg_page_version']['type'] = '_mod';
$table['_dg_page_version']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_page_version`;
    CREATE TABLE IF NOT EXISTS `_dg_page_version` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `active` int(11) DEFAULT '0',
        `id_content` int(11) NOT NULL DEFAULT '0',
        `pseudo` varchar(255) DEFAULT NULL,
        `id_user` int(11) DEFAULT '0',
        `id_groupe` int(11) DEFAULT '0',
        `langue` varchar(255) DEFAULT NULL,
        `titre` varchar(255) DEFAULT NULL,
        `description` text,
        `article_tinymce` text,
        `uri` varchar(255) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `meta_titre` varchar(255) DEFAULT NULL,
        `meta_description` varchar(255) DEFAULT NULL,
        `meta_keys` varchar(255) DEFAULT NULL,
        `meta_facebook_type` varchar(255) DEFAULT NULL,
        `meta_facebook_titre` varchar(255) DEFAULT NULL,
        `meta_facebook_description` varchar(255) DEFAULT NULL,
        `meta_facebook_image` varchar(255) DEFAULT NULL,
        `meta_twitter_type` varchar(255) DEFAULT NULL,
        `meta_twitter_titre` varchar(255) DEFAULT NULL,
        `meta_twitter_description` varchar(255) DEFAULT NULL,
        `meta_twitter_image` varchar(255) DEFAULT NULL,
        `meta_twitter_player` varchar(255) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_files']['count'] = 0;
$table['_dg_files']['type'] = '_mod';
$table['_dg_files']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_files`;
    CREATE TABLE IF NOT EXISTS `_dg_files` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT '0',
        `id_groupe` int(11) DEFAULT '0',
        `uri` varchar(255) DEFAULT NULL,
        `type` varchar(255) NOT NULL,
        `groupe_traduction` text,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_files_traduction']['count'] = 0;
$table['_dg_files_traduction']['type'] = '_mod';
$table['_dg_files_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_files_traduction`;
    CREATE TABLE IF NOT EXISTS `_dg_files_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_file` int(11) DEFAULT '0',
        `langue` varchar(11) DEFAULT '0',
        `title` varchar(255) DEFAULT NULL,
        `path` varchar(255) DEFAULT NULL,
        `size` varchar(255) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_translator']['count'] = 0;
$table['_dg_translator']['type'] = '_mod';
$table['_dg_translator']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_translator`;
    CREATE TABLE IF NOT EXISTS `_dg_translator` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT '0',
        `id_groupe` int(11) DEFAULT '0',
        `sentence`  text,
        `groupe_traduction` text,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_translator_traduction']['count'] = 0;
$table['_dg_translator_traduction']['type'] = '_mod';
$table['_dg_translator_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_translator_traduction`;
    CREATE TABLE IF NOT EXISTS `_dg_translator_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_translator` int(11) DEFAULT '0',
        `langue` varchar(11) DEFAULT '0',
        `translated_sentence` text,
        `is_translated` int(11) DEFAULT '0',
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_translator_version']['count'] = 0;
$table['_dg_translator_version']['type'] = '_mod';
$table['_dg_translator_version']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_translator_version`;
    CREATE TABLE IF NOT EXISTS `_dg_translator_version` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_content` int(11) NOT NULL DEFAULT '0',
        `pseudo` varchar(255) DEFAULT NULL,
        `id_user` int(11) DEFAULT '0',
        `id_groupe` int(11) DEFAULT '0',
        `langue` varchar(255) DEFAULT NULL,
        `translated_sentence` text,
        `is_translated` int(11) DEFAULT '0',
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; ";

$table['_dg_email_notification']['count'] = 0;
$table['_dg_email_notification']['type'] = '_mod';
$table['_dg_email_notification']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_email_notification`;
    CREATE TABLE `_dg_email_notification` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` int(11) DEFAULT '0',
      `id_groupe` int(11) DEFAULT '0',
      `uri` varchar(255) DEFAULT NULL,
      `groupe_traduction` text,
      `date_creation` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8; ";

$table['_dg_email_notification_traduction']['count'] = 0;
$table['_dg_email_notification_traduction']['type'] = '_mod';
$table['_dg_email_notification_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_email_notification_traduction`;
    CREATE TABLE `_dg_email_notification_traduction` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_content` int(11) DEFAULT '0',
      `title` varchar(255) DEFAULT NULL,
      `langue` varchar(11) DEFAULT NULL,
      `type` varchar(11) DEFAULT NULL,
      `subject` varchar(255) DEFAULT NULL,
      `message_tinymce` text,
      `date_modification` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8; ";

$table['_dg_email_notification_version']['count'] = 0;
$table['_dg_email_notification_version']['type'] = '_mod';
$table['_dg_email_notification_version']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_email_notification_version`;
    CREATE TABLE `_dg_email_notification_version` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_content` int(11) NOT NULL DEFAULT '0',
      `title` varchar(255) DEFAULT NULL,
      `pseudo` varchar(255) DEFAULT NULL,
      `id_user` int(11) DEFAULT '0',
      `id_groupe` int(11) DEFAULT '0',
      `langue` varchar(255) DEFAULT NULL,
      `type` varchar(11) DEFAULT NULL,
      `subject` varchar(255) DEFAULT NULL,
      `message_tinymce` text,
      `date_creation` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8; ";

$table['_categories']['count'] = 0;
$table['_categories']['type'] = '_mod';
$table['_categories']['sql_create_table'] = " DROP TABLE IF EXISTS `_categories`;
    CREATE TABLE IF NOT EXISTS `_categories` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_parent` int(11) NOT NULL DEFAULT '0',
        `uri_module` varchar(255) DEFAULT NULL,
        `groupe_traduction` text,
        `ordre` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_categories_traduction']['count'] = 0;
$table['_categories_traduction']['type'] = '_mod';
$table['_categories_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_categories_traduction`;
    CREATE TABLE IF NOT EXISTS `_categories_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_cat` int(11) NOT NULL DEFAULT '0',
        `langue` varchar(10) NOT NULL DEFAULT 'fr',
        `nom` varchar(255) DEFAULT NULL,
        `titre` varchar(255) DEFAULT NULL,
        `description` text,
        `uri` varchar(255) DEFAULT NULL,
        `meta_titre` varchar(255) DEFAULT NULL,
        `meta_description` varchar(255) DEFAULT NULL,
        `meta_keys` varchar(255) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_dg_comments']['count'] = 0;
$table['_dg_comments']['type'] = '_mod';
$table['_dg_comments']['sql_create_table'] = " DROP TABLE IF EXISTS `_dg_comments`;   
    CREATE TABLE IF NOT EXISTS `_dg_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT '0',
        `id_groupe` int(11) DEFAULT '0',
        `uri_module` varchar(255) DEFAULT NULL,
        `uri_content` varchar(255) DEFAULT NULL,
        `nom` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `url` varchar(255) DEFAULT NULL,
        `comment` text,
        `lu` int(11) NOT NULL DEFAULT '0',
        `archive` int(11) NOT NULL DEFAULT '0',
        `date_creation` int(11) DEFAULT NULL,
        `validation` int(11) DEFAULT '0',
        `date_validation` int(11) DEFAULT '0',
        `date_archive` int(11) NOT NULL DEFAULT '0',
        `adress_ip` varchar(255) DEFAULT NULL,
        `langue` varchar(255) DEFAULT 'en',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_moderation']['count'] = 0;
$table['_moderation']['type'] = '_mod';
$table['_moderation']['sql_create_table'] = "DROP TABLE IF EXISTS `_moderation`;
    CREATE TABLE IF NOT EXISTS `_moderation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `pseudo` varchar(255) DEFAULT NULL,
        `id_groupe` int(11) DEFAULT NULL,
        `id_content` int(11) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `type_module` varchar(255) DEFAULT NULL,
        `action` varchar(255) DEFAULT NULL,
        `langue` varchar(10) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_modules']['count'] = 0;
$table['_modules']['type'] = '_mod';
$table['_modules']['sql_create_table'] = " DROP TABLE IF EXISTS `_modules`; 
    CREATE TABLE IF NOT EXISTS `_modules` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `type` varchar(255) DEFAULT NULL,
        `uri` varchar(255) DEFAULT NULL,
        `active` int(11) DEFAULT '1',
        `author_badge` int(11) DEFAULT '0',
        `is_first` int(11) DEFAULT '0',
        `plugins` text,
        `groupe_traduction` text,
        `bynum` int(11) DEFAULT '10',
        `avoiraussi` int(11) NOT NULL DEFAULT '3',
        `image` varchar(255) DEFAULT NULL,
        `template_index` varchar(255) DEFAULT NULL,
        `template_content` varchar(255) DEFAULT NULL,
        `notification_mail` int(11) NOT NULL DEFAULT '1',
        `uri_notification_moderator` varchar(255) DEFAULT NULL,
        `uri_notification_user_success` varchar(255) DEFAULT NULL,
        `uri_notification_user_error` varchar(255) DEFAULT NULL,
        `extras` text,
        `redirection` varchar(255) DEFAULT NULL,
        `recaptcha` int(11) NOT NULL DEFAULT '0',
        `with_password` int(11) NOT NULL DEFAULT '0',
        `password` varchar(255) DEFAULT NULL,
        `public_module` int(11) NOT NULL DEFAULT '0',
        `public_comment` int(11) NOT NULL DEFAULT '0',
        `public_add` int(11) NOT NULL DEFAULT '0',
        `date_creation` int(11) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_modules_traduction']['count'] = 0;
$table['_modules_traduction']['type'] = '_mod';
$table['_modules_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_modules_traduction`;
    CREATE TABLE IF NOT EXISTS `_modules_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_module` int(11) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `nom` varchar(255) DEFAULT NULL,
        `titre` varchar(255) DEFAULT NULL,
        `description` text,
        `send_mail_to` varchar(255) DEFAULT NULL,
        `top_tinymce` text,
        `bottom_tinymce` text,
        `extras` text,
        `send_mail_user` varchar(255) DEFAULT NULL,
        `send_mail_name` varchar(255) DEFAULT NULL,
        `send_mail_email` varchar(255) DEFAULT NULL,
        `send_mail_sujet` varchar(255) DEFAULT NULL,
        `send_mail_message` text,
        `meta_titre` varchar(255) DEFAULT NULL,
        `meta_description` varchar(255) DEFAULT NULL,
        `meta_keys` varchar(255) DEFAULT NULL,
        `meta_facebook_type` varchar(255) DEFAULT NULL,
        `meta_facebook_titre` varchar(255) DEFAULT NULL,
        `meta_facebook_description` varchar(255) DEFAULT NULL,
        `meta_facebook_image` varchar(255) DEFAULT NULL,
        `meta_twitter_type` varchar(255) DEFAULT NULL,
        `meta_twitter_titre` varchar(255) DEFAULT NULL,
        `meta_twitter_description` varchar(255) DEFAULT NULL,
        `meta_twitter_image` varchar(255) DEFAULT NULL,
        `meta_twitter_player` varchar(255) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_rubrique']['count'] = 0;
$table['_rubrique']['type'] = '_mod';
$table['_rubrique']['sql_create_table'] = " DROP TABLE IF EXISTS `_rubrique`;
    CREATE TABLE IF NOT EXISTS `_rubrique` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(220) DEFAULT NULL,
        `ordre` int(11) DEFAULT NULL,
        `idModule` int(11) NOT NULL DEFAULT '0',
        `idParent` int(11) DEFAULT '0',
        `showinmenu` int(11) DEFAULT '1',
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_rubrique_users']['count'] = 0;
$table['_rubrique_users']['type'] = '_mod';
$table['_rubrique_users']['sql_create_table'] = " DROP TABLE IF EXISTS `_rubrique_users`;
    CREATE TABLE IF NOT EXISTS `_rubrique_users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(220) DEFAULT NULL,
        `ordre` int(11) DEFAULT NULL,
        `idModule` int(11) NOT NULL DEFAULT '0',
        `idParent` int(11) DEFAULT '0',
        `showinmenu` int(11) DEFAULT '1',
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";
    

$table['_users']['count'] = 0;
$table['_users']['type'] = '_mod';
$table['_users']['sql_create_table'] = " DROP TABLE IF EXISTS `_users`;
    CREATE TABLE IF NOT EXISTS `_users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `login` varchar(255) DEFAULT NULL,
        `password` varchar(255) DEFAULT NULL,
        `token` varchar(255) DEFAULT NULL,
        `salt` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_activation']['count'] = 0;
$table['_users_activation']['type'] = '_mod';
$table['_users_activation']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_activation`;
    CREATE TABLE IF NOT EXISTS `_users_activation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `type` varchar(255) NOT NULL,
        `id_user` int(11) DEFAULT NULL,
        `code` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_followers']['count'] = 0;
$table['_users_followers']['type'] = '_mod';
$table['_users_followers']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_followers`;
    CREATE TABLE IF NOT EXISTS `_users_followers` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_user_follow` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_track']['count'] = 0;
$table['_users_track']['type'] = '_mod';
$table['_users_track']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_track`;
    CREATE TABLE IF NOT EXISTS `_users_track` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_session` varchar(255) DEFAULT NULL,
        `id_user` int(11) NOT NULL,
        `id_groupe` int(11) NOT NULL,
        `title` varchar(255) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `uri_module` varchar(255) NOT NULL,
        `id_content` text NOT NULL,
        `action` varchar(255) NOT NULL,
        `ip_user` varchar(255) NOT NULL,
        `url_page` varchar(255) DEFAULT NULL,
        `url_referer` varchar(255) DEFAULT NULL,
        `date` int(11) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_notification']['count'] = 0;
$table['_users_notification']['type'] = '_mod';
$table['_users_notification']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_notification`;
    CREATE TABLE IF NOT EXISTS `_users_notification` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_groupe` int(11) NOT NULL,
        `id_session` varchar(255) DEFAULT NULL,
        `ip_session` varchar(255) DEFAULT NULL,
        `url_page` varchar(255) DEFAULT NULL,
        `url_referer` varchar(255) DEFAULT NULL,
        `date` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_groupes']['count'] = 0;
$table['_users_groupes']['type'] = '_mod';
$table['_users_groupes']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_groupes`;
    CREATE TABLE IF NOT EXISTS `_users_groupes` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `uri` varchar(255) DEFAULT NULL,
        `liste_widget` text,
        `liste_module` text,
        `liste_module_limit` text,
        `liste_module_list` text,
        `liste_module_show` text,
        `liste_module_add` text,
        `liste_module_edit` text,
        `liste_module_delete` text,
        `liste_module_admin` text,
        `liste_module_modo` text,
        `liste_module_interne` text,
        `liste_module_interne_modo` text,
        `liste_enfant` text,
        `liste_enfant_modo` text,
        `liste_parent` text,
        `can_subscribe` int(11) DEFAULT '1',
        `editor_ckeditor` int(1) DEFAULT '0',
        `editor_tinymce` int(1) DEFAULT '0',
        `groupe_traduction` text,
        `attributes` text,
        `saas_options` text,
        `payment` int(11) DEFAULT '0',
        `payment_amount_month` int(11) DEFAULT NULL,
        `payment_group_expired` int(11) DEFAULT NULL,
        `payment_tranche` int(11) DEFAULT NULL,
        `payment_group_upgrade` int(11) DEFAULT NULL,
        `date_creation` int(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_groupes_attributes_values']['count'] = 0;
$table['_users_groupes_attributes_values']['type'] = '_mod';
$table['_users_groupes_attributes_values']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_groupes_attributes_values`;
    CREATE TABLE IF NOT EXISTS `_users_groupes_attributes_values` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) NOT NULL,
        `id_attribute` int(11) NOT NULL,
        `value` text NOT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_groupes_traduction']['count'] = 0;
$table['_users_groupes_traduction']['type'] = '_mod';
$table['_users_groupes_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_groupes_traduction`;
    CREATE TABLE IF NOT EXISTS `_users_groupes_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_groupe` int(11) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `title` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_access_token']['count'] = 0;
$table['_users_access_token']['type'] = '_mod';
$table['_users_access_token']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_access_token`;
    CREATE TABLE IF NOT EXISTS `_users_access_token` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `token` varchar(255) DEFAULT NULL,
        `is_valid` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_inbox']['count'] = 0;
$table['_users_inbox']['type'] = '_mod';
$table['_users_inbox']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_inbox`;
    CREATE TABLE IF NOT EXISTS `_users_inbox` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_user_sent` int(11) DEFAULT NULL,
        `pseudo_user` varchar(255) DEFAULT NULL,
        `pseudo_user_sent` varchar(255) DEFAULT NULL,
        `user_delete` int(1) DEFAULT '0',
        `user_sent_delete` int(1) DEFAULT '0',
        `name` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `phone` varchar(255) DEFAULT NULL,
        `subject` varchar(255) DEFAULT NULL,
        `message` text,
        `readed` int(1) DEFAULT '0',
        `date_readed` int(11) DEFAULT NULL,
        `date_deleted` int(11) DEFAULT NULL,
        `date_sent_deleted` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_info']['count'] = 0;
$table['_users_info']['type'] = '_mod';
$table['_users_info']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_info`;
    CREATE TABLE IF NOT EXISTS `_users_info` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `profile_type` int(11) DEFAULT '1',
        `active` int(11) DEFAULT '0',
        `id_user` int(11) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `network` int(11) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `pseudo` varchar(255) DEFAULT NULL,
        `last_name` varchar(255) DEFAULT NULL,
        `first_name` varchar(255) DEFAULT NULL,
        `country` varchar(255) DEFAULT NULL,
        `city` varchar(255) DEFAULT NULL,
        `zipcode` varchar(255) DEFAULT NULL,
        `adresse` varchar(255) DEFAULT NULL,
        `tel_fix` varchar(255) DEFAULT NULL,
        `tel_mobil` varchar(255) DEFAULT NULL,
        `tel_fax` varchar(255) DEFAULT NULL,
        `id_facebook` varchar(255) DEFAULT NULL,
        `id_twitter` varchar(255) DEFAULT NULL,
        `id_google` varchar(255) DEFAULT NULL,
        `id_linkedin` varchar(255) DEFAULT NULL,
        `id_pinterest` varchar(255) DEFAULT NULL,
        `id_myspace` varchar(255) DEFAULT NULL,
        `id_youtube` varchar(255) DEFAULT NULL,
        `notification_mail` int(1) DEFAULT '1',
        `notification_newsletter` int(1) DEFAULT '1',
        `birthday` varchar(255) DEFAULT NULL,
        `gender` varchar(255) DEFAULT NULL,
        `avatar` varchar(255) DEFAULT NULL,
        `description` text,
        `website` varchar(255) DEFAULT NULL,
        `horaire` varchar(255) DEFAULT NULL,
        `editor_html` varchar(50) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_user_facebook']['count'] = 0;
$table['_user_facebook']['type'] = '_mod';
$table['_user_facebook']['sql_create_table'] = " DROP TABLE IF EXISTS `_user_facebook`;
    CREATE TABLE IF NOT EXISTS `_user_facebook` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_facebook` varchar(255) DEFAULT NULL,
        `name` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `first_name` varchar(255) DEFAULT NULL,
        `middle_name` varchar(255) DEFAULT NULL,
        `last_name` varchar(255) DEFAULT NULL,
        `gender` varchar(255) DEFAULT NULL,
        `link` varchar(255) DEFAULT NULL,
        `birthday` varchar(255) DEFAULT NULL,
        `location` varchar(255) DEFAULT NULL,
        `timezone` varchar(255) DEFAULT NULL,
        `access_token` varchar(255) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_user_google']['count'] = 0;
$table['_user_google']['type'] = '_mod';
$table['_user_google']['sql_create_table'] = " DROP TABLE IF EXISTS `_user_google`;
    CREATE TABLE IF NOT EXISTS `_user_google` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_google` varchar(255) DEFAULT NULL,
        `email` varchar(255) DEFAULT NULL,
        `verified_email` varchar(255) DEFAULT NULL,
        `name` varchar(255) DEFAULT NULL,
        `given_name` varchar(255) DEFAULT NULL,
        `family_name` varchar(255) DEFAULT NULL,
        `link` varchar(255) DEFAULT NULL,
        `picture` varchar(255) DEFAULT NULL,
        `gender` varchar(255) DEFAULT NULL,
        `locale` varchar(255) DEFAULT NULL,
        `access_token` varchar(255) DEFAULT NULL,
        `refresh_token` varchar(255) DEFAULT NULL,
        `user_data` text,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_user_stripe']['count'] = 0;
$table['_user_stripe']['type'] = '_mod';
$table['_user_stripe']['sql_create_table'] = " DROP TABLE IF EXISTS `_user_stripe`;
    CREATE TABLE IF NOT EXISTS `_user_stripe` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_stripe` varchar(255) DEFAULT NULL,
        `id_user` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0; ";

$table['_user_stripe_order_items']['count'] = 0;
$table['_user_stripe_order_items']['type'] = '_mod';
$table['_user_stripe_order_items']['sql_create_table'] = " DROP TABLE IF EXISTS `_user_stripe_order_items`;
    CREATE TABLE IF NOT EXISTS `_user_stripe_order_items` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_order` int(11) DEFAULT NULL,
        `type_order` int(11) DEFAULT NULL,
        `uri_module` varchar(255) DEFAULT NULL,
        `id_content` int(11) DEFAULT NULL,
        `real_amount` int(11) DEFAULT NULL,
        `title` int(11) DEFAULT NULL,
        `total_amount` int(11) DEFAULT NULL,
        `quantity` int(11) DEFAULT NULL,
        `discount` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0; ";

$table['_user_stripe_order']['count'] = 0;
$table['_user_stripe_order']['type'] = '_mod';
$table['_user_stripe_order']['sql_create_table'] = " DROP TABLE IF EXISTS `_user_stripe_order`;
    CREATE TABLE IF NOT EXISTS `_user_stripe_order` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `vat` int(11) DEFAULT NULL,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0; ";

$table['_user_stripe_charge']['count'] = 0;
$table['_user_stripe_charge']['type'] = '_mod';
$table['_user_stripe_charge']['sql_create_table'] = " DROP TABLE IF EXISTS `_user_stripe_charge`;
    CREATE TABLE IF NOT EXISTS `_user_stripe_charge` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_user` int(11) DEFAULT NULL,
        `id_stripe` varchar(255) DEFAULT NULL,
        `id_charge` varchar(255) DEFAULT NULL,
        `id_order` varchar(255) DEFAULT NULL,
        `status` varchar(255) DEFAULT NULL,
        `amount` int(11) DEFAULT NULL,
        `currency` varchar(255) DEFAULT NULL,
        `data` text,
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0; ";

$table['_website']['count'] = 0;
$table['_website']['type'] = '_mod';
$table['_website']['sql_create_table'] = "  DROP TABLE IF EXISTS `_website`;
    CREATE TABLE IF NOT EXISTS `_website` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `statut` int(11) DEFAULT '1',
        `statut_version` int(11) DEFAULT '0',
        `statut_ip` varchar(255) DEFAULT NULL,
        `version_doorgets` varchar(255) DEFAULT NULL,
        `title` varchar(220) NOT NULL,
        `slogan` varchar(180) DEFAULT NULL,
        `copyright` varchar(100) NOT NULL,
        `year` varchar(10) NOT NULL,
        `description` varchar(220) NOT NULL,
        `keywords` varchar(220) NOT NULL,
        `email` varchar(80) DEFAULT NULL,
        `pays` varchar(180) DEFAULT NULL,
        `ville` varchar(180) DEFAULT NULL,
        `adresse` varchar(220) DEFAULT NULL,
        `codepostal` varchar(25) DEFAULT NULL,
        `tel_fix` varchar(30) DEFAULT NULL,
        `tel_mobil` varchar(30) DEFAULT NULL,
        `tel_fax` varchar(30) DEFAULT NULL,
        `facebook` varchar(120) DEFAULT NULL,
        `twitter` varchar(120) DEFAULT NULL,
        `pinterest` varchar(255) DEFAULT NULL,
        `myspace` varchar(255) DEFAULT NULL,
        `linkedin` varchar(255) DEFAULT NULL,
        `youtube` varchar(120) DEFAULT NULL,
        `google` varchar(250) DEFAULT NULL,
        `analytics` varchar(50) DEFAULT NULL,
        `langue` varchar(255) DEFAULT 'fr',
        `langue_front` varchar(255) DEFAULT 'fr',
        `langue_groupe` text,
        `horaire` varchar(255) DEFAULT 'Europe/Paris',
        `mentions` int(11) DEFAULT '1',
        `cgu` int(11) DEFAULT '1',
        `m_newsletter` int(1) DEFAULT '1',
        `m_comment` int(11) DEFAULT '1',
        `m_comment_facebook` int(11) DEFAULT '0',
        `m_comment_disqus` int(11) DEFAULT '0',
        `m_sharethis` int(11) DEFAULT '1',
        `m_sitemap` int(11) DEFAULT '1',
        `m_rss` int(11) DEFAULT '1',
        `id_facebook` varchar(255) DEFAULT NULL,
        `id_disqus` varchar(255) DEFAULT NULL,
        `theme` varchar(255) NOT NULL DEFAULT 'doorgets',
        `module_homepage` varchar(255) DEFAULT NULL,
        `oauth_google_id` varchar(255) DEFAULT NULL,
        `oauth_google_secret` varchar(255) DEFAULT NULL,
        `oauth_google_active` int(11) DEFAULT '0',
        `oauth_facebook_id` varchar(255) DEFAULT NULL,
        `oauth_facebook_secret` varchar(255) DEFAULT NULL,
        `oauth_facebook_active` int(11) DEFAULT '0',
        `smtp_mandrill_active` int(11) DEFAULT '0',
        `smtp_mandrill_host` varchar(255) DEFAULT NULL,
        `smtp_mandrill_port` varchar(255) DEFAULT NULL,
        `smtp_mandrill_username` varchar(255) DEFAULT NULL,
        `smtp_mandrill_password` varchar(255) DEFAULT NULL,
        `stripe_active` int(11) DEFAULT NULL,
        `stripe_secret_key` varchar(255) DEFAULT NULL,
        `stripe_publishable_key` varchar(255) DEFAULT NULL,
        `currency` varchar(255) DEFAULT 'eur',
        `date_creation` int(11) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_website_traduction']['count'] = 0;
$table['_website_traduction']['type'] = '_mod';
$table['_website_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_website_traduction`;
    CREATE TABLE IF NOT EXISTS `_website_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `langue` varchar(255) DEFAULT NULL,
        `statut_tinymce` text,
        `title` varchar(255) DEFAULT NULL,
        `slogan` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        `copyright` varchar(255) DEFAULT NULL,
        `year` varchar(255) DEFAULT NULL,
        `keywords` varchar(255) DEFAULT NULL,
        `date_modification` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_groupes_attributes']['count'] = 0;
$table['_users_groupes_attributes']['type'] = '_mod';
$table['_users_groupes_attributes']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_groupes_attributes`;
    CREATE TABLE IF NOT EXISTS `_users_groupes_attributes` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `active` int(11) DEFAULT '0',
        `required` int(11) DEFAULT '2',
        `groupe_traduction` text,
        `uri` varchar(255) DEFAULT NULL,
        `type` varchar(255) DEFAULT NULL,
        `params` text,
        `date_creation` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";

$table['_users_groupes_attributes_traduction']['count'] = 0;
$table['_users_groupes_attributes_traduction']['type'] = '_mod';
$table['_users_groupes_attributes_traduction']['sql_create_table'] = " DROP TABLE IF EXISTS `_users_groupes_attributes_traduction`;
    CREATE TABLE IF NOT EXISTS `_users_groupes_attributes_traduction` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_attribute` int(11) DEFAULT NULL,
        `langue` varchar(255) DEFAULT NULL,
        `title` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ; ";