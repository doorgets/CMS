<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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


class HTMLPurifierService {


    public static function purify($html = '') {

        require_once BASE.'doorgets/lib/htmlpurifier/HTMLPurifier.auto.php';
        include BASE.'config/htmlpurifier.php';

        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF-8');
        $config->set('Attr.EnableID', true);
        $config->set('HTML.SafeIframe', true);
        $config->set('URI.SafeIframeRegexp','%^https://(www.youtube.com/embed/|player.vimeo.com/video/|www.google.com)%');
        $config->set('Attr.AllowedFrameTargets', '_blank, _self, _target, _parent');
        $config->set('Attr.EnableID', true);
        $config->set('AutoFormat.Linkify', true);
        $def = $config->getHTMLDefinition(true);

        foreach ($balises as $balise) {
            foreach ($attributes as $attribute) {
                $def->addAttribute($balise, $attribute, 'CDATA');
            }
        }

        $purifier = new HTMLPurifier($config);
        return $purifier->purify($html);
    }
}