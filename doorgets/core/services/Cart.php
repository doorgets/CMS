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

class Cart {
    
    public $doorGets;
    
    public $id                  = 0;
    public $status              = 'open';
    public $error               = false;
    public $orderId             = 0;
    public $vat                 = 0.2;

    public $currencyCode        = 'usd';
    public $currency            = '$';
    public $currencyBefore      = '';
    public $currencyAfter       = '';
    public $methodShipping      = 'free';
    public $shippingAmount      = 0;

    private $productKeys = array(
       'uri',
       'id',
       'quantity'
    );
    
    public $products = array();
    public $cartParams = array();
    
    public $promotions = array();
    public $taxes = array();

    public function __construct(&$doorGets) {
        //$_SESSION = array();
        $this->doorGets = $doorGets;
        
        $config = $this->doorGets->configWeb;
        
        $this->promotions = $this->getAllActivePromotions();
        $this->taxes = $this->getAllActiveTaxes();
        $this->vat = $config['store_vat'] / 100;
        // vdump($this->promotions);
        if (!empty($doorGets->user)) {
            $isCart = $doorGets->dbQS($doorGets->user['id'],'_cart','user_id'," AND status = 'open' LIMIT 1");
            if (!empty($isCart)) {
                $this->id = $this->cartParams['id'] = $_SESSION['cart_info']['id'] = (int)$isCart['id'];
                $this->status = $this->cartParams['status'] = $_SESSION['cart_info']['status'] = $isCart['status'];
            }
        } 
        //init $shippingAmount
        if (!array_key_exists('cart',$_SESSION)) {
            $this->products = $_SESSION['cart'] = array();
            if ($config['shipping_free_active'] === '1') {
                $this->shippingAmount = 0;
            }elseif($config['shipping_slow_active'] === '1') {
                $this->shippingAmount = $config['shipping_slow_amount'];
            }elseif($config['shipping_fast_active'] === '1') {
                $this->shippingAmount = $config['shipping_fast_amount'];
            }
        } else {
            $this->products = $_SESSION['cart'];
        }
        if (
            !array_key_exists('cart_info',$_SESSION) 
            || empty($_SESSION['cart_info']) 
            || !array_key_exists('currencyCode',$_SESSION['cart_info'])
        ) {
            $this->cartParams = $_SESSION['cart_info'] = array(
                'id' => $this->id,
                'vat' => $this->vat,
                'orderId' => $this->orderId,
                'currencyAfter' => $this->currencyAfter,
                'currencyBefore' => $this->currencyBefore,
                'shippingAmount' => $this->shippingAmount,
                'methodShipping' => $this->methodShipping,
                'currencyCode' => $this->currencyCode,
                'currency' => $this->currency
            );
            $this->setCurrency(0);
        } else {
            if (is_array($_SESSION['cart_info'])) {
                foreach ($_SESSION['cart_info'] as $key => $value) {
                    if (!empty($value) && $key !== 'vat') {
                        $this->$key = $value;
                    }
                }
            }
            
        }

        if (is_array($_SESSION['cart_info']) && array_key_exists('currencyCode',$_SESSION['cart_info'])) {
            $this->currencyCode = $_SESSION['cart_info']['currencyCode'] = $doorGets->configWeb['currency'];
            $this->setCurrency(0);
            
            
        }

        if (is_array($_SESSION['cart_info'])) {
            $this->cartParams['vat'] = $_SESSION['cart_info']['vat'] = $this->vat;
        }

    }

    public function getProducts($format = false) {
        
        if (!empty($_SESSION['cart'])) {
            $valuePromo = '';
            foreach ($_SESSION['cart'] as $key=>$product) {

                if (!empty($product['uri'])) {

                    $modules = $this->doorGets->getAllActiveModules();
                    
                    if (!array_key_exists($product['uri'], $modules)) { continue; }
                    $id_module = $modules[$product['uri']]['id'];
                    $uriModule = '_m_'.$this->doorGets->getRealUri($product['uri']);
                    $uriModuleTraduction = $uriModule.'_traduction';

                    $isContent = $this->doorGets->dbQS($product['id'],$uriModule);
                    if (!empty($isContent) && $isContent['active'] === '2') {
                        $traductionId = $this->doorGets->getIdContentTraduction($isContent);
                        $isContentTraduction = $this->doorGets->dbQS($traductionId,$uriModuleTraduction);

                        if (!empty($isContentTraduction)) {
                            
                            $isContent = array_merge($isContent,$isContentTraduction);
                            $canBuy = $this->canBuy($isContent);
                            if ($canBuy) {

                                $image = URL.'data/'.$product['uri'].'/'.$isContentTraduction['image'];
                                
                                $vat = $this->vat;
                                if (array_key_exists($isContent['id_taxe'], $this->taxes)) {
                                    $vat = $this->taxes[$isContent['id_taxe']]['percent'] / 100;
                                }

                                $_SESSION['cart'][$key]['image'] = $this->products[$key]['image'] = $image;
                                $_SESSION['cart'][$key]['title'] = $this->products[$key]['title'] = $isContentTraduction['titre']." - ".$isContent['code'];
                                $_SESSION['cart'][$key]['article'] = $this->products[$key]['article'] = $this->doorGets->_truncate(html_entity_decode($isContentTraduction['article_tinymce']));
                                $_SESSION['cart'][$key]['short_description'] = $this->products[$key]['short_description'] = $this->doorGets->_truncate(html_entity_decode($isContentTraduction['short_description_tinymce']));
                                $_SESSION['cart'][$key]['stock'] = $this->products[$key]['stock'] = $isContentTraduction['quantity_stock']; 
                                $_SESSION['cart'][$key]['amount_billing'] = $this->products[$key]['amount_billing'] = $isContentTraduction['buying_price'];   
                                $_SESSION['cart'][$key]['vat'] = $this->products[$key]['vat'] = $vat;   
                                
                                $canPromotion = ($isContentTraduction['promotion_active'] === '1')?false:true;

                                $_SESSION['cart'][$key]['promotion'] = $this->products[$key]['promotion'] = $canPromotion;
                                
                                $price = (float)$isContentTraduction['price'];
                                $priceCurrency = $this->setCurrency($price);
                                $pricettc = $price * ((float)1 + $vat);
                                $pricettcCurrency = $this->setCurrency($pricettc);
                                $total = $price *(float)$this->products[$key]['quantity'];
                                $totalCurrency = $this->setCurrency($total);
                                $totalttc = $pricettc * (float)$this->products[$key]['quantity'];
                                $totalttcCurrency = $this->setCurrency($totalttc);

                                $_SESSION['cart'][$key]['price'] = $this->products[$key]['price'] = ($format) ? $priceCurrency:$price ;
                                $_SESSION['cart'][$key]['pricettc'] = $this->products[$key]['pricettc'] = ($format) ? $pricettcCurrency:$pricettc ;
                                $_SESSION['cart'][$key]['total'] = $this->products[$key]['total'] = ($format) ? $totalCurrency:$total ;
                                $_SESSION['cart'][$key]['totalttc'] = $this->products[$key]['totalttc'] = ($format) ? $totalttcCurrency:$totalttc ;
                                

                                $pricepromo = ($this->products[$key]['promotion'])?$this->getPriceWithPromotion($price,$isContent,$id_module):$price;
                                $pricepromoCurrency = $this->setCurrency($pricepromo);
                                
                                $pricettcpromo = ($this->products[$key]['promotion'])?$this->getPriceWithPromotion($pricettc,$isContent,$id_module):$pricettc;
                                $pricettcpromoCurrency = $this->setCurrency($pricettcpromo);
                                
                                $totalpromo = ($this->products[$key]['promotion'])?$this->getPriceWithPromotion($total,$isContent,$id_module):$total;
                                $totalpromoCurrency = $this->setCurrency($totalpromo);
                                
                                $totalttcpromo = (float)$pricettcpromo * (float)$this->products[$key]['quantity'];
                                $totalttcpromo = ($this->products[$key]['promotion'])?$totalttcpromo:$totalttc;
                                $totalttcpromoCurrency = $this->setCurrency($totalttcpromo);

                                $_SESSION['cart'][$key]['pricepromo'] = $this->products[$key]['pricepromo'] = ($format) ? $pricepromoCurrency:$pricepromo ;
                                $_SESSION['cart'][$key]['pricettcpromo'] = $this->products[$key]['pricettcpromo'] = ($format) ? $pricettcpromoCurrency:$pricettcpromo ;
                                $_SESSION['cart'][$key]['totalpromo'] = $this->products[$key]['totalpromo'] = ($format) ? $totalpromoCurrency:$totalpromo ;
                                $_SESSION['cart'][$key]['totalttcpromo'] = $this->products[$key]['totalttcpromo'] = ($format) ? $totalttcpromoCurrency:$totalttcpromo ;

                                $valuePromo = $this->getPromotionValue($isContent,$id_module);
                                //vdump($isContent);
                                $pricetoshow = ($priceCurrency === $pricepromoCurrency) ? $priceCurrency : $pricepromoCurrency.' small><del>'.$priceCurrency.'</del></small> '.$valuePromo;
                                $pricettctoshow = ($pricettcCurrency === $pricettcpromoCurrency) ? $pricettcCurrency : $pricettcpromoCurrency.' <small><del>'.$pricettcCurrency.'</del></small> '.$valuePromo;
                                $totaltoshow = ($totalCurrency === $totalpromoCurrency) ? $totalCurrency : $totalpromoCurrency.' <small><del>'.$totalCurrency.'</del></small> ';
                                $totalttctoshow = ($totalttcCurrency === $totalttcpromoCurrency) ? $totalttcCurrency : $totalttcpromoCurrency.' <small><del>'.$totalttcCurrency.'</del></small> ';
                                
                                $hasPromo = ($pricettc === $pricettcpromo)?false:true;
                                
                                $_SESSION['cart'][$key]['pricetoshow'] = $this->products[$key]['pricetoshow'] = $pricetoshow ;
                                $_SESSION['cart'][$key]['pricettctoshow'] = $this->products[$key]['pricettctoshow'] = $pricettctoshow ;
                                $_SESSION['cart'][$key]['totaltoshow'] = $this->products[$key]['totaltoshow'] = $totaltoshow ;
                                $_SESSION['cart'][$key]['totalttctoshow'] = $this->products[$key]['totalttctoshow'] = $totalttctoshow ;
                                
                                $_SESSION['cart'][$key]['hasPromo'] = $this->products[$key]['hasPromo'] = $hasPromo ;
                                   
                            } else {
                                // remove key
                                if (array_key_exists($key,$_SESSION['cart'])) {
                                    unset($_SESSION['cart'][$key]);
                                }
                                if (array_key_exists($key,$this->products)) {
                                    unset($this->products[$key]);
                                }
                            }
                        }
                    } 
                }
            }
        }
        return $this->products;
    }

    public function getCount() {
        
        $count = 0;
        $products = $this->getProducts();

        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product)) {
                    $count += $product['quantity'];
                }
            }
        }

        return $count;
    }

    public function getTotalAmount($format = false) {
        
        $amount = 0;
        $products = $this->getProducts();

        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('price',$product)) {
                    $amount += number_format($product['quantity'],2) * number_format($product['price'],2);
                }
            }
        }

        $amountCurrency = $this->setCurrency($amount);
        $returnAmount = ($format) ? $amountCurrency : $amount;
        return $returnAmount;
    }

    public function getTotalAmountVAT($format = false) {
        
        $amount = 0;
        $products = $this->getProducts();

        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('pricettc',$product)) {
                    $amount += $product['quantity'] * $product['pricettc'];
                }
            }
        }

        $amountCurrency = $this->setCurrency($amount);
        $returnAmount = ($format) ? $amountCurrency : $amount;
        return $returnAmount;
    }

    public function getTotalAmountShippingVAT($format = false) {
        
        $amount = 0;
        $products = $this->getProducts();

        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('pricettc',$product)) {
                    $amount += $product['quantity'] * $product['pricettc'];
                }
            }
        }

        $amount = $amount + (float)$this->shippingAmount;
        $amountCurrency = $this->setCurrency($amount);
        $returnAmount = ($format) ? $amountCurrency : $amount;
        return $returnAmount;
    }

    public function getTotalAmountPromo($format = false) {
        
        $amount = 0;
        $amountPromo = 0;
        $products = $this->getProducts();
        $hasPromo = false;
        if (!empty($products)) {
            foreach ($products as $product) {

                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('price',$product)) {
                    $amount += $product['quantity'] * number_format($product['price'],2);
                    if ($product['hasPromo']) {
                        $amountPromo += number_format($product['quantity'],2) * number_format($product['pricepromo'],2);
                        $hasPromo = true;
                    }
                }
            }
        }

        if ($hasPromo) {

            $amountCurrency = $this->setCurrency($amount);
            $amountPromoCurrency = $this->setCurrency($amountPromo);
            $returnAmount = ($format) ? $amountPromoCurrency.' <small><del>'.$amountCurrency.'</del></small>' : $amountPromo;

        } else {
            $amountCurrency = $this->setCurrency($amount);
            $returnAmount = ($format) ? $amountCurrency : $amount;            
        }

        return $returnAmount;
    }

    public function getSubTotalAmountPromoVAT($format = false) {
        
        $amount = $amountPromo = $realAmount = 0;
        $products = $this->getProducts();
        $hasPromo = false;
        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('pricettc',$product)) {
                    $realAmount = $realAmount += $product['quantity'] * $product['pricettc'];
                    if ($product['hasPromo']) {
                        $amount += number_format($product['quantity'],2) * number_format($product['pricettcpromo'],2);
                        $hasPromo = true;
                    } else {
                        $amount += $product['quantity'] * $product['pricettc'];
                    } 
                }
            }
        }

        $realAmount = $realAmount;
        $realAmountCurrency = $this->setCurrency($realAmount);
        $amountPromo = $amount;
        $amountPromoCurrency = $this->setCurrency($amountPromo);
        $returnAmount = ($hasPromo) ? $amountPromoCurrency.' <small><del>'.$realAmountCurrency.'</del></small>' : $realAmountCurrency;

        return $returnAmount;
    }

    public function getTotalAmountPromoVAT($format = false) {
        
        $amount = $amountPromo = $realAmount = 0;
        $products = $this->getProducts();
        $hasPromo = false;
        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('pricettc',$product)) {
                    $realAmount = $realAmount += $product['quantity'] * $product['pricettc'];
                    if ($product['hasPromo']) {
                        $amount += number_format($product['quantity'],2) * number_format($product['pricettcpromo'],2);
                        $hasPromo = true;
                    } else {
                        $amount += $product['quantity'] * $product['pricettc'];
                    } 
                }
            }
        }

        $realAmount = $realAmount;
        $realAmountCurrency = $this->setCurrency($realAmount);
        $amountPromo = $amount;
        $amountPromoCurrency = $this->setCurrency($amountPromo);
        if ($format) {
            $returnAmount = ($hasPromo) ? $amountPromoCurrency.' <small><del>'.$realAmountCurrency.'</del></small>' : $realAmountCurrency;
        } else {
           $returnAmount = $amountPromo;
        }
        
        return $returnAmount;
    }

    public function getTotalAmountPromoShippingVAT($format = false) {
        
        $amount = $amountPromo = $realAmount = 0;
        $products = $this->getProducts();
        $hasPromo = false;
        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('quantity',$product) && array_key_exists('pricettc',$product)) {
                    $realAmount = $realAmount += $product['quantity'] * $product['pricettc'];
                    if ($product['hasPromo']) {
                        $amount += number_format($product['quantity'],2) * number_format($product['pricettcpromo'],2);
                        $hasPromo = true;
                    } else {
                        $amount += $product['quantity'] * $product['pricettc'];
                    } 
                }
            }
        }

        $realAmount = $realAmount + (float)$this->shippingAmount;
        $realAmountCurrency = $this->setCurrency($realAmount);
        $amountPromo = $amount + (float)$this->shippingAmount;
        $amountPromoCurrency = $this->setCurrency($amountPromo);

        if ($format) {
            $returnAmount = ($hasPromo) ? $amountPromoCurrency.' <small><del>'.$realAmountCurrency.'</del></small>' : $realAmountCurrency;
        } else {
           $returnAmount = $amountPromo;
        }
        
        return $returnAmount;
    }

    public function addProduct($product) {

        $this->checkErrors($product);
        
        if (!$this->error) {

            $productKey = $product['uri'].'-'.$product['id'];
            $this->products[$productKey] = $_SESSION['cart'][$productKey] = $product;
             
        }

        return $this->products;

    }

    public function removeProduct($productKey) {
        
        if (array_key_exists($productKey,$_SESSION['cart'])) {
            unset($this->products[$productKey]);
            unset($_SESSION['cart'][$productKey]); 
        }

        return $this->products;
    }

    public function plusProduct($productKey) {
        $newAmount = $newAmountPromo = 0;
        if (array_key_exists($productKey,$_SESSION['cart'])) {
            $this->products[$productKey]['quantity']++;
            $_SESSION['cart'][$productKey]['quantity']++; 
        }
        $newAmount = $this->setCurrency($_SESSION['cart'][$productKey]['quantity'] * $_SESSION['cart'][$productKey]['pricettc']);
        $newAmountPromo = $this->setCurrency($_SESSION['cart'][$productKey]['quantity'] * $_SESSION['cart'][$productKey]['pricettcpromo']);
        
        $out = ($newAmount !== $newAmountPromo)? $newAmountPromo.' <small><del>'.$newAmount.'</del></small>' : $newAmountPromo;
        return $out;
    }

    public function minusProduct($productKey) {
        $newAmount = $newAmountPromo = 0;
        $valuePromo = '';
        if (array_key_exists($productKey,$_SESSION['cart'])) {
            if ($this->products[$productKey]['quantity'] > 1) {
                $this->products[$productKey]['quantity']--;
                $_SESSION['cart'][$productKey]['quantity']--; 
            }
        }
        
        $newAmount = $this->setCurrency($_SESSION['cart'][$productKey]['quantity'] * $_SESSION['cart'][$productKey]['pricettc']);
        $newAmountPromo = $this->setCurrency($_SESSION['cart'][$productKey]['quantity'] * $_SESSION['cart'][$productKey]['pricettcpromo']);
        
        $out = ($newAmount !== $newAmountPromo)? $newAmountPromo.' <small><del>'.$newAmount.'</del></small>' : $newAmountPromo;
        return $out;
    }
    
    public function hasInCart($productKey) {
        $out = 0;
        if (array_key_exists($productKey,$_SESSION['cart'])) {
            $out = (int)$_SESSION['cart'][$productKey]['quantity'];
        }
        return $out;
    }

    private function checkErrors($product) {
        $this->error = false;
        if (!is_array($product) || empty($product)) {
            $this->error = true;
        }
        if (array_key_exists('uri',$product) && array_key_exists('id',$product) && !array_key_exists($product['uri'].'-'.$product['id'], $this->products)) {

            foreach ($this->productKeys as $key) {
                if (!array_key_exists($key,$product)) {
                    $this->error = true;
                }
            }
        }
    }

    public function setCurrency($amount) {

        $amount = (float)$amount;

        $currenyCode = strtolower($this->currencyCode);
        // vdump($currenyCode);
        switch ($currenyCode) {
            case 'eur':
                $this->currency = '€';
                $this->currencyBefore = '';
                $this->currencyAfter = $this->currency;
                break;
            case 'usd':
                $this->currency = '$';
                $this->currencyBefore = $this->currency;
                $this->currencyAfter = '';
                break;
            case 'gbp':
                $this->currency = '£';
                $this->currencyBefore = $this->currency;
                $this->currencyAfter = '';
                break;
            
            default:
                $this->currency = '€';
                $this->currencyBefore = '';
                $this->currencyAfter = $this->currency;
                break;
        }

        return $this->currencyBefore.number_format($amount,2,',',' ').$this->currencyAfter;
    }

    public function getShippingAmount() {
        $shippingAmount = $this->setCurrency($this->shippingAmount);
        return $shippingAmount;
    }

    public function setShippingMethod($method) {
        $methodList = array('free','slow','fast');
        if (in_array($method,$methodList)) {

            $this->methodShipping = $method;
            
            if (array_key_exists('shipping_'.$method.'_amount',$this->doorGets->configWeb) || $method === 'free') {
                
                $shippingAmount = ($method === 'free')?0:$this->doorGets->configWeb['shipping_'.$method.'_amount'];
                $this->shippingAmount = $shippingAmount;
                $this->cartParams['shippingAmount'] = $shippingAmount; 
                $_SESSION['cart_info']['shippingAmount'] = $shippingAmount;

                foreach ($_SESSION['cart_info'] as $key => $value) {
                    if (!empty($value)) {
                        $this->$key = $value;
                    }
                }

                $this->cartParams = $_SESSION['cart_info'] = array(
                    'vat' => $this->vat,
                    'orderId' => $this->orderId,
                    'currencyAfter' => $this->currencyAfter,
                    'currencyBefore' => $this->currencyBefore,
                    'shippingAmount' => $this->shippingAmount,
                    'currencyCode' => $this->currencyCode
                );

                $this->cartParams['methodShipping'] = $method; 
                $_SESSION['cart_info']['methodShipping'] = $method;
            }
          
        }
    }

    public function reset() {
        $this->save();
        $_SESSION['cart'] = array();
        $_SESSION['cart_info'] = array();
        unset($_SESSION['cart_info']);
        unset($_SESSION['cart']);
    }

    public function save() {

        $cartEntity = new CartEntity($this->id,$this->doorGets);

        $cartToSave = array(
            'id'                => $this->id,
            'status'            => $this->status,
            'vat'               => $this->vat,
            'order_id'          => $this->orderId,
            'currency_after'    => $this->currencyAfter,
            'currency_before'   => $this->currencyBefore,
            'shipping_amount'   => $this->shippingAmount,
            'currency_code'     => $this->currencyCode
        );

        if (!empty($this->doorGets->user)) {
            $cartToSave['user_id']      = $this->doorGets->user['id'];
            $cartToSave['user_groupe']  = $this->doorGets->user['groupe'];
            $cartToSave['user_lastname']     = $this->doorGets->user['last_name'];
            $cartToSave['user_firstname']    = $this->doorGets->user['first_name'];
            $cartToSave['user_pseudo']       = $this->doorGets->user['pseudo'];
        }

        $cartToSave['products'] = serialize($this->products);

        $cartToSave['total_amount']       = number_format($this->getTotalAmount(),2,',',' ');
        $cartToSave['total_amount_vat']    = number_format($this->vat * $this->getTotalAmount() + $this->shippingAmount,2,',',' ');
        $cartToSave['shipping_amount']    = $this->shippingAmount;
        $cartToSave['langue']            = $this->doorGets->myLanguage;


        $time = time();
        $timeHuman = ucfirst(strftime("%A %d %B %Y %H:%M",$time));
        if (empty($this->id)) {
            $cartToSave['date_creation']            = $time;
            $cartToSave['date_creation_human']      = $timeHuman;
        }
        $cartToSave['date_modification']            = $time;
        $cartToSave['date_modification_human']      = $timeHuman;
        
        $cartEntity->setData($cartToSave);

        $cartEntity->save();
        
        $this->removeEmptyCart();

        $this->id = $_SESSION['cart_info']['id'] = $cartEntity->getId();


    }

    public function removeEmptyCart() {
        $timeLeft = time() - 3600 * 24;
        $this->doorGets->dbQD('a:0:{}','_cart','products',"=",' AND date_creation < '.$timeLeft);
        $this->doorGets->dbQU('open',array('status'=>'timeout'),'_cart','status',' AND date_creation < '.$timeLeft);
    }

    public function getAllActivePromotions() {

        $out = array();

        $PromotionQuery = new PromotionQuery($this->doorGets);
        $PromotionQuery->filterByActive(1);
        $PromotionQuery->orderByPriority();
        $PromotionQuery->find();
        $Promotions = $PromotionQuery->_getEntities('array');

        $now = time();
        if (!empty($Promotions)) {
            foreach ($Promotions as $promotion) {
                if (    
                    ((!empty($promotion['date_from_time'])  && $now > (int)$promotion['date_from_time'])
                        || empty($promotion['date_from_time']))
                    &&  ( empty($promotion['date_to_time']) || $now < (int)$promotion['date_to_time'] )
                ) {
                    $out[$promotion['id']] = $promotion;
                }
            }            
        }

        return $out;
    }

    public function getAllActiveTaxes() {

        $out = array();

        $TaxesQuery = new TaxesQuery($this->doorGets);
        $TaxesQuery->filterByActive(1);
        $TaxesQuery->find();
        $Taxes = $TaxesQuery->_getEntities('array');

        $now = time();
        if (!empty($Taxes)) {
            foreach ($Taxes as $taxe) {
                $out[$taxe['id']] = $taxe;
            }            
        }

        return $out;
    }

    public function getPriceWithPromotion($price, $product = array(), $id_module = 0) {

        $out = (float)$price;
        if (!is_array($product) || empty($product)) { return $out; }
        ;
        $categories = explode(',',$product['categorie']);
        
        if (!empty($this->promotions)) {

            foreach ($this->promotions as $promotion) {
                
                $categoriesPromo = array();
                $categoriesPromo = @unserialize($promotion['categories']);

                $doAction = false;
                if ( $promotion['active_all'] === "1") {
                    $doAction = true;
                } elseif (array_key_exists($id_module, $categoriesPromo)) {
                    if (!empty($categories)) {
                        foreach ($categories as $id_category) {
                            if (array_key_exists($id_category, $categoriesPromo[$id_module])) {
                                $doAction = true;
                            }
                        }
                    }
                }

                if ($doAction) {
                    if (!empty($promotion['userlimit'])  && $promotion['userlimit'] <= $promotion['usercount'] ) {
                        $doAction = false;

                    }
                }
                
                if ($doAction) {

                    switch ($promotion['reduction_type']) {
                        case 'amount':
                            $out = (float)$price - (float)$promotion['reduction_value'];
                            break;
                        
                        case 'percent':
                            $out = (float)$price - ((float)$price / (float)100 * (float)$promotion['reduction_value']);
                            break;
                    }                    
                }

                break;
            }
        }

        return $out;
    }

    public function getPriceWithPromotionWebsite($product, $id_module = 0) {
        
        $out = null;
        
        if (!is_array($product) || empty($product) || !array_key_exists('id_taxe',$product)) { return $out; }
        $vat = $this->vat;

        if (array_key_exists($product['id_taxe'], $this->taxes)) {
            $vat = $this->taxes[$product['id_taxe']]['percent'] / 100;

        }
        
        $p = (float)$product['price']*((float)1+(float)$vat);
        $price = $this->setCurrency($p);
        $pricePromo = $this->setCurrency($this->getPriceWithPromotion($p,$product,$id_module));
        $valuePromo = $this->getPromotionValue($product,$id_module);

        $out = ($price !== $pricePromo && $product['promotion_active'] == '0') ? $pricePromo.' <small><del>'.$price.'</del></small> '.$valuePromo : $price;

        return $out;
    }
    
    public function getPromotionValue($product = array(), $id_module = 0) {

        $out = (float)0;

        if (!is_array($product) || empty($product)) { return $out; }
        ;
        $categories = explode(',',$product['categorie']);
        
        if (!empty($this->promotions)) {

            foreach ($this->promotions as $promotion) {
                
                $categoriesPromo = array();
                $categoriesPromo = @unserialize($promotion['categories']);

                $doAction = false;
                if ( $promotion['active_all'] === "1") {
                    $doAction = true;
                } elseif (array_key_exists($id_module, $categoriesPromo)) {
                    if (!empty($categories)) {
                        foreach ($categories as $id_category) {
                            if (array_key_exists($id_category, $categoriesPromo[$id_module])) {
                                $doAction = true;
                            }
                        }
                    }
                }

                if ($doAction) {
                    if (!empty($promotion['userlimit'])  && $promotion['userlimit'] <= $promotion['usercount'] ) {
                        $doAction = false;
                    }
                }
                
                if ($doAction) {
                    
                    switch ($promotion['reduction_type']) {
                        case 'amount':
                            $out = $this->setCurrency($promotion['reduction_value']);
                            break;
                        
                        case 'percent':
                            $out = (float)$promotion['reduction_value'].'%';
                            break;
                    }                    
                }
                break;
            }
        }
        return '<span class="product-promo-value">-'.$out.'</span>';
    }
    public function getTotalBillingAmount() {
        
        $billingPrice = 0;
        $products = $this->getProducts();

        if (!empty($products)) {
            foreach ($products as $product) {
                if (is_array($product) && array_key_exists('amount_billing',$product)) {
                    $billingPrice += $product['amount_billing'] * $product['quantity'];
                }
            }
        }

        return $billingPrice;
    }

    public function getTotalProfitAmount() {
        
        $billingPrice = $this->getTotalBillingAmount();
        $sellingPrice = $this->getTotalAmountPromo();

        return $sellingPrice - $billingPrice;
    }

    public function getTotalVATAmount() {
        
        $billingAmount = $this->getTotalBillingAmount();
        $profitAmount = $this->getTotalProfitAmount();
        $amount = $this->getTotalAmountPromoVAT();
        
        return $amount - ($billingAmount + $profitAmount);
    }

    public function canBuy($product) {
        $out = false;
        if (!is_array($product) || !array_key_exists('quantity_limit', $product)) {return $out;}
               
        if(
            ($product['quantity_limit']
            || (!$product['quantity_limit'] && $product['quantity_stock'] > 1)
            || $product['quantity_nostock']
            ) && $product['opt_sale']
        ){
            $out = true;
        }
        return $out;
    }

    public function __desctruct() {
        $this->save();
    }
}