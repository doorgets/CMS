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


class CartView extends doorGetsAjaxView{
    
    public $genform = array();
    public $vat = 1.2;
    public $shippingAmount = 0;

    public function __construct(&$doorgets) {
        
        parent::__construct($doorgets); 
    }

    public function getResponse() {
        
        $this->doorGets->checkAjaxMode();
        
        $response = array(
            'code' => 404,
            'data' => array()
        );

        $arrayAction = array(
            'index'     => 'Home',
            'add'       => 'add',
            'plus'    => 'plus',
            'minus'    => 'minus',
            'remove'    => 'remove',
            'shippingMethod' => 'shippingMethod'
        );
        
        $out = '';
        
        $params = $this->doorGets->Params();
        $modules = $this->doorGets->getAllActiveModules();
        $lgActuel = $this->doorGets->getLangueTradution();

        $lg = 'en';
        if (array_key_exists('lg', $params['GET']) && array_key_exists($params['GET']['lg'],$this->doorGets->allLanguages)) {
            $lg = $this->doorGets->myLanguage = $params['GET']['lg'];
        }

        if (array_key_exists($this->Action,$arrayAction))
        {
        	switch($this->Action) {
            
	            case 'index':
	                break;

	            case 'add':

                    if (true) {
                        
                        $uri = (array_key_exists('uri',$params['GET']) && !empty($params['GET']['uri'])) ? $params['GET']['uri'] : '';
                        $quantity = (array_key_exists('qty',$params['GET'])&& !empty($params['GET']['qty'])) ? (int) $params['GET']['qty'] : 1;
                        $id = (array_key_exists('id',$params['GET'])&& !empty($params['GET']['id'])) ? $params['GET']['id'] : '';
                        if(empty($quantity)) {
                            $quantity = 1;
                        }
                        if (!empty($uri) && !empty($id) && array_key_exists($uri, $modules)) {
                            $sqlUri = $this->doorGets->getRealUri($uri);
                            
                            $table = '_m_'.$sqlUri;
                            $tableTraduction = $table.'_traduction';

                            $isContent = $this->doorGets->dbQS($id,$table);
                            if (!empty($isContent)) {

                                $idTraduction = $this->doorGets->getIdContentTraduction($isContent);

                                if (!is_null($idTraduction)) {
                                    $isContentTraduction = $this->doorGets->dbQS($idTraduction,$tableTraduction);
                                    if (!empty($isContentTraduction)) {

                                        $product = array(
                                            'uri' => $uri,
                                            'id' => $id,
                                            'quantity' => $quantity
                                        );

                                        $Cart = new Cart($this->doorGets);
                                        $Cart->addProduct($product);
                                        $Cart->save();

                                        $products = $Cart->getProducts();
                                        $productName = $products[$uri.'-'.$id]['title'];
                                        $response = array(
                                            'code' => 200,
                                            'data' => array (
                                                'message'           => $productName.' '.$this->doorGets->__("est dans votre panier").'.',
                                                'products'          => $Cart->getProducts(),
                                                'count'             => $Cart->getCount(), 
                                                'totalAmount'       => number_format($Cart->getTotalAmount(),2,',',' '),
                                                'totalAmountVat'    => number_format($this->vat * $Cart->getTotalAmount() + $Cart->shippingAmount,2,',',' '),
                                                'subtotalAmountVat'    => $Cart->getSubTotalAmountPromoVAT(true),
                                                'totalAmountPromo'       => number_format($Cart->getTotalAmountPromo(),2,',',' '),
                                                'totalAmountPromoVat'    => number_format($this->vat * $Cart->getTotalAmountPromo() + $Cart->shippingAmount,2,',',' '),
                                                'shippingAmount'    => $Cart->getShippingAmount(),
                                                'langue'            => $lg,
                                                'uri'               => $uri
                                            )
                                        );
                                    }

                                }
                            }

                            
                        }
                    }
                    break;

                case 'minus':

                    if (array_key_exists('uri', $params['GET'])) {
                        $uri = $params['GET']['uri'];

                        $Cart = new Cart($this->doorGets);
                        $newAmount = $Cart->minusProduct($uri);
                        $Cart->save();

                        $response = array(
                            'code' => 200,
                            'data' => array (
                                'message'           => $this->doorGets->__("Le quantité du produit a été mise à jour").'.',
                                'products'          => $Cart->getProducts(true),
                                'count'             => $Cart->getCount(), 
                                'totalAmount'       => $Cart->getTotalAmount(true),
                                'totalAmountVat'    => $Cart->getTotalAmountVAT(true),
                                'subtotalAmountVat'    => $Cart->getSubTotalAmountPromoVAT(true),
                                'totalAmountPromo'       => $Cart->getTotalAmountPromo(true),
                                'totalAmountPromoVat'    => $Cart->getTotalAmountPromoShippingVAT(true),
                                'shippingAmount'    => $Cart->getShippingAmount(),
                                'langue'            => $lg,
                                'newAmount'         => $newAmount,
                                'uri'               => $uri
                            )
                        );
                    }
                    break;

                case 'plus':

                    if (array_key_exists('uri', $params['GET'])) {
                        $uri = $params['GET']['uri'];

                        $Cart = new Cart($this->doorGets);
                        $newAmount = $Cart->plusProduct($uri);
                        $Cart->save();

                        $response = array(
                            'code' => 200,
                            'data' => array (
                                'message'           => $this->doorGets->__("Le quantité du produit a été mise à jour").'.',
                                'products'          => $Cart->getProducts(true),
                                'count'             => $Cart->getCount(), 
                                'totalAmount'       => $Cart->getTotalAmount(true),
                                'totalAmountVat'    => $Cart->getTotalAmountVAT(true),
                                'subtotalAmountVat'    => $Cart->getSubTotalAmountPromoVAT(true),
                                'totalAmountPromo'       => $Cart->getTotalAmountPromo(true),
                                'totalAmountPromoVat'    => $Cart->getTotalAmountPromoShippingVAT(true),
                                'shippingAmount'    => $Cart->getShippingAmount(),
                                'langue'            => $lg,
                                'newAmount'         => $newAmount,
                                'uri'               => $uri
                            )
                        );
                    }
                    break;

                case 'remove':

                    if (array_key_exists('uri', $params['GET'])) {
                        $uri = $params['GET']['uri'];

                        $Cart = new Cart($this->doorGets);
                        $Cart->removeProduct($uri);
                        $Cart->save();

                        $response = array(
                            'code' => 200,
                            'data' => array (
                                'message'           => $this->doorGets->__("Le produit a été supprimé de votre panier").'.',
                                'products'          => $Cart->getProducts(true),
                                'count'             => $Cart->getCount(), 
                                'totalAmount'       => $Cart->getTotalAmount(true),
                                'totalAmountVat'    => $Cart->getTotalAmountVAT(true),
                                'subtotalAmountVat'    => $Cart->getSubTotalAmountPromoVAT(true),
                                'totalAmountPromo'       => $Cart->getTotalAmountPromo(true),
                                'totalAmountPromoVat'    => $Cart->getTotalAmountPromoShippingVAT(true),
                                'shippingAmount'    => $Cart->getShippingAmount(),
                                'langue'            => $lg,
                                'uri'               => $uri
                            )
                        );
                    }
                    break;

                case 'shippingMethod':

                    if (array_key_exists('key', $params['GET']) ) {
                        $key = $params['GET']['key'];

                        $Cart = new Cart($this->doorGets);
                        $Cart->setShippingMethod($key);
                        $Cart->save();
                        
                        $response = array(
                            'code' => 200,
                            'data' => array (
                                'message'           => $this->doorGets->__("Le prix de la livraison est à jour").'.',
                                'products'          => $Cart->getProducts(true),
                                'count'             => $Cart->getCount(), 
                                'totalAmount'       => $Cart->getTotalAmount(true),
                                'totalAmountVat'    => $Cart->getTotalAmountVAT(true),
                                'subtotalAmountVat'    => $Cart->getSubTotalAmountPromoVAT(true),
                                'totalAmountPromo'       => $Cart->getTotalAmountPromo(true),
                                'totalAmountPromoVat'    => $Cart->getTotalAmountPromoShippingVAT(true),
                                'shippingAmount'    => $Cart->getShippingAmount(),
                                'langue'            => $lg
                            )
                        );
                    }
                    break;

	        }
        }

        return json_encode($response, JSON_FORCE_OBJECT);
    }

    private function initHtmlForm($uri_form = '',$Module= array(),$data = array()) {

        $errors = array();
        $params = $this->doorGets->Params();
        $form = $params['POST'];

        foreach($data as $k=>$v) {
                    
            $value = '';
            $nameKey = $uri_form.'_'.$k;
            // test des champs obligatoires
            
            if (
                $v['obligatoire'] === 'yes'
                && ( !array_key_exists($nameKey,$form) || empty($form[$nameKey]) )
                && $v['type'] !== 'file'
            ) {
                
                $errors[$nameKey] = 'empty';
            }
            
            // test des filtres
            if ($v['type'] === 'text') {
                
                $value = $form[$nameKey];
                
                switch($v['filtre']) {
                    
                    case 'email':
                        
                        $isEmail = filter_var($value,FILTER_VALIDATE_EMAIL);
                        if (empty($isEmail)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'url':
                        
                        $isURL = filter_var($value,FILTER_VALIDATE_URL);
                        if (empty($isURL)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'alpha':
                        
                        $isAlpha = ctype_alpha($value);
                        if (empty($isAlpha)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'num':
                        
                        $isNum = ctype_digit($value);
                        if (empty($isNum)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                    
                    case 'alphanum':
                        
                        $isAlphaNum = ctype_alnum($value);
                        if (empty($isAlphaNum)) {
                            $errors[$nameKey] = 'ok';
                        }
                        
                        break;
                }
                
            }
            
            if ($v['type'] === 'file' && $v['obligatoire'] === 'yes') {
                
                
                if ( isset($_FILES[$nameKey]) &&  $_FILES[$nameKey]['error'] != 0) {
                
                    $errors[$nameKey] = 'ok';
                    
                }
                
                if ( isset($_FILES[$nameKey]) && empty($this->Controller->form->e)) {
                    
                    if (!array_key_exists($_FILES[$nameKey]["type"],$typeFile) ) {
                        
                        $errors[$nameKey] = 'ok';
                        
                    }else{
                        
                        $extension = $typeExtension[$_FILES[$nameKey]["type"]];
                        
                        if ($v['file-type'][$extension] !== 1) {
                            
                            $errors[$nameKey] = 'ok';
                            
                        }
                        
                    }
                    
                    if ($_FILES[$nameKey]["size"] > $sizeMax) {
                        
                        $errors[$nameKey] = 'ok';
                        
                    }
                }
            }
        }
        
        if (empty($errors)) {
            
            foreach($data as $k=>$v) {
                
                if ($v['type'] === 'file' && $_FILES[$nameKey]['error'] != 4) {
                    
                    $ttff = $_FILES[$nameKey]["type"];
                    $sSize = $_FILES[$nameKey]['size'];
                    $ttf = $typeExtension[$ttff];
                    
                    $uni = time().'-'.uniqid($ttf);
                    
                    $nameFileImage = $uni.'-doorgets.'.$ttf;
                    
                    $uploaddir = $typeFile[$ttff];
                    $uploadfile = BASE.$uploaddir.$nameFileImage;
                    
                    if (move_uploaded_file($_FILES[$nameKey]['tmp_name'], $uploadfile)) {
                        $form[$k] = $nameFileImage;
                    }
                    
                }
                
            }
        }

        if (empty($errors) )
        {
            $dOut = array();

            foreach($form as $key=>$val) {
                $key = str_replace($uri_form.'_','',$key);
                if (array_key_exists($key,$data)) {
                    $key = str_replace('-','_',$key);
                    $dOut[$key] = $val;
                }
                
            }

            if (!empty($dOut)) {

                $dOut['date_creation']  = time();
                $dOut['adresse_ip']     = $_SERVER['REMOTE_ADDR'];
                $dOut['codechallenge']  = $form[$uri_form.'_codechallenge'];
                
                var_dump('1');
                $isChallenge = $this->doorGets->dbQS($form[$uri_form.'_codechallenge'],'_m_'.$uri_form,'codechallenge');
                if (empty($isChallenge)) {
                    
                    var_dump('2');
                    $idNewForm = $this->doorGets->dbQI($dOut,'_m_'.$uri_form);
                    //$this->genform[$uri_form]->isSended = true;
                    
                    // Mail Sender Notification
                    $moduleInfo = $this->doorGets->dbQS($uri_form,'_modules','uri');
                    if (!empty($moduleInfo) && !empty($moduleInfo['notification_mail'])) {
                        var_dump('3');
                        $_email = $this->doorGets->configWeb['email'];
                        $_lg    = $this->doorGets->configWeb['langue'];
                        $_sujet = '['.$uri_form.'] '.$this->doorGets->__("Vous avez un nouveau message").' - '.$idNewForm;
                        
                        new SendMailAlert($_email,$_sujet,'',$this->doorGets);
                        
                    }
                    
                }else{
                    var_dump('0');
                    $_POST = array();
                }
            }
            
        }

        return $errors;
    }
}
