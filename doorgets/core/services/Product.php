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


class Product {

    public $doorGets            = null;

    public $id                  = 0;
    public $uri                 = '';
    public $langue              = '';
    public $moduleUri           = '';

    public $config              = array();

    public $vat                 = 0.2;
    public $currencyCode        = 'usd';
    public $currency            = '$';
    public $currencyBefore      = '';
    public $currencyAfter       = '';

    public function __construct($key = null,$moduleUri = null, &$doorGets = null) {

        if (is_null($doorGets)) { return null; }
        $this->doorGets = $doorGets;
        $this->langue = $doorGets->myLanguage;
        $this->moduleUri = $moduleUri;
        $this->config = $this->doorGets->configWeb;

        // Init currency 
        $this->currencyCode = $doorGets->configWeb['currency'];

        // Check if key is id
        if (is_numeric($key)) {
            $this->id = $key;
            $this->initProductById();
        // Check if key is uri
        } elseif (is_string($key)) {
            $this->uri = $key;
            $this->initProductByUri();
        }
    }

    public function initProductById(){

        $realUri = $this->doorGets->getRealUri($this->moduleUri);
        $uriModule = '_m_'.$realUri;
        $uriModuleTraduction = $uriModule.'_traduction';

        $isContent = $this->doorGets->dbQS($this->id,$uriModule);
        if (!empty($isContent)) {
            $traductionId = $this->doorGets->getIdContentTraduction($isContent);
            $isContentTraduction = $this->doorGets->dbQS($traductionId,$uriModuleTraduction);

            if (!empty($isContentTraduction)) {
                $isContent = array_merge($isContent,$isContentTraduction);
                $isContent = $this->formatData($isContent);
                vdump($isContent);
            }
        }
    }

    public function initProductByUri(){

        $realUri = $this->doorGets->getRealUri($this->moduleUri);
        $uriModule = '_m_'.$realUri;
        $uriModuleTraduction = $uriModule.'_traduction';

        $isContentTraduction = $this->doorGets->dbQS($this->uri,$uriModuleTraduction,'uri');
        if (!empty($isContentTraduction)) {
            $isContent = $this->doorGets->dbQS($isContentTraduction['id_content'],$uriModule);

            if (!empty($isContent)) {
                $isContent = array_merge($isContent,$isContentTraduction);
                $isContent = $this->formatData($isContent);
                vdump($isContent);
            }
        }
    }

    public function formatData($data) {
        if (!is_array($data) || empty($data)) { return array(); }
        $keyToCheck = array('price');
        foreach ($data as $key => $value) {
            if (!in_array($key,$keyToCheck)) { continue; }
            switch ($key) {
                case 'price':
                    $data[$key] = $this->setCurrency($value * (1 + $this->vat));
                    break;
            }
        }
        return $data;
    }

    
}