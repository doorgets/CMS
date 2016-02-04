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

class Checkout {

    public 
        $user,
        $doorGets,
        $langue
    ;
    
    private 
        $form,
        $params,
        $products,
        $billinAddress,
        $shippingAddress,
        $authorizedStep = array()
    ;

    private 
        $hasPaypal,
        $hasStripe,
        $hasTransfer,
        $hasCheck,
        $hasCash
    ;

    private 
        $cart,
        $methodBilling,
        $methodShipping
    ;

    protected 
        $order
    ;

    public
        $shipping
    ;
    
    /*
    *   cart_proccess
    *   checkout_proccess
    *   card_success
    *   card_canceled
    *   card_denied
    *   card_fraud
    *   transfer_waiting
    *   transfer_suspended
    *   transfer_success
    *   transfer_fraud
    *   check_waiting
    *   check_suspended
    *   check_success
    *   check_fraud
    *   cash_success
    *   product_return
    */
    protected 
        $status = 'cart_proccess'
    ;

    protected 
        $currency = 'eur'
    ;

    protected 
        $shippingAmount = 0
    ;

    protected $step = 'index';
    
    public function __construct(&$user) {

        $lg =  $defaultLg = 'en';
        if (array_key_exists('lg', $_GET)) {
            $lg = filter_input(INPUT_GET,'lg',FILTER_SANITIZE_STRING);
        }

        $doorGets = new Langue($lg);
        $doorGets->user = $user;
        $this->doorGets = $doorGets;
        if (!array_key_exists($lg,$doorGets->allLanguagesWebsite)) {
            $doorGets = new Langue($doorGets->configWeb['langue_front']);
            $doorGets->user = $user;
            $this->doorGets = $doorGets;
        }

        $this->langue = $this->doorGets->myLanguage;

        $this->user = $user;
        $this->authorizedStep = array(
            'index','payment','success','cancel','bis'
        );

        // Initialisation des méthodes de paiement
        $this->hasPaypal    = ($doorGets->configWeb['paypal_active'] === '1')?true:false;
        $this->hasStripe    = ($doorGets->configWeb['stripe_active'] === '1')?true:false;
        $this->hasTransfer  = ($doorGets->configWeb['transfer_active'] === '1')?true:false;
        $this->hasCheck     = ($doorGets->configWeb['check_active'] === '1')?true:false;
        $this->hasCash      = ($doorGets->configWeb['cash_active'] === '1')?true:false;

        // Initialisation des méthodes de paiement
        $this->shipping['free'] = array();
        $this->shipping['slow'] = array();
        $this->shipping['fast'] = array();

        $this->shipping['free']['active'] = ($doorGets->configWeb['shipping_free_active'] === '1')?true:false;
        $this->shipping['free']['info'] = $doorGets->configWeb['shipping_free_info'];

        $this->shipping['slow']['active'] = ($doorGets->configWeb['shipping_slow_active'] === '1')?true:false;
        $this->shipping['slow']['amount'] = $doorGets->configWeb['shipping_slow_amount'];
        $this->shipping['slow']['info'] = $doorGets->configWeb['shipping_slow_info'];

        $this->shipping['fast']['active'] = ($doorGets->configWeb['shipping_fast_active'] === '1')?true:false;
        $this->shipping['fast']['amount'] = $doorGets->configWeb['shipping_fast_amount'];
        $this->shipping['fast']['info'] = $doorGets->configWeb['shipping_fast_info'];

        // Chargement du panier
        $this->cart = new Cart($this->doorGets,$this->langue);
        $this->currency = $this->cart->currencyCode;
        $this->products = $this->cart->getProducts(true);

        if ($this->cart->status !== 'open') {
            $this->cart->reset();
        }

        $this->order['id'] = (
            array_key_exists('cart_info', $_SESSION)
            && is_array($_SESSION['cart_info']) 
            && array_key_exists('orderId', $_SESSION['cart_info']) 
            && !empty($_SESSION['cart_info']['orderId']) )
        ?$_SESSION['cart_info']['orderId']:'';


        $this->initOrder();

        if (!empty($this->user)) {
            $this->order['user_id'] = $this->user['id'];
            $this->order['user_groupe'] = $this->user['groupe'];
            $this->order['user_pseudo'] = $this->user['pseudo'];
            $this->order['user_lastname'] = $this->user['last_name'];
            $this->order['user_firstname'] = $this->user['first_name'];            
        }

        $this->initForms();

        $this->initParams();

        $this->requestForms();

        $this->initCurrentStep();

        $this->cart->save();
    }

    public function getStep() {
        return $step;
    }

    public function getHtmlContent() {

        $user = $this->user;

        $myLanguage           = $this->doorGets->configWeb['langue_front'];
        $module               = $this->doorGets->configWeb['module_homepage'];
        $theme                = $this->doorGets->configWeb['theme'];
        $navigation           = $this->doorGets->getRubriques('_rubrique');
        $activeModules        = $this->doorGets->getAllActiveModules();

        $i = 1;
        $cNav = count($navigation);
        $Pseudo = '';
        if (!empty($user)) { 
            $Pseudo = ucfirst($user['pseudo']);
        }
        
        
        $cLan = count($this->doorGets->allLanguagesWebsite);
        $toLangue = ''; 
        if ($cLan > 1 && !empty($user)) {  
            $toLangue = $user['langue'].'/'; 
        } elseif($cLan > 1 ) {
            $toLangue = $this->langue.'/';
        }

        $loginUrl = URL_USER.$toLangue.'?controller=authentification';
        $registerUrl = URL_USER.$toLangue.'?controller=authentification&action=register';
        
        $groupes    = $this->doorGets->loadGroupesSubscriber();

        $params = array(
            'user' => $this->user,
            'products' => $this->products,
            'navigation' => $navigation,
            'module' => $module,
            'theme' => $theme,
            'activeModules' => $activeModules,
            'toLangue' => $toLangue
        );
        
        $exclude = array('error','success');
        
        $out  = $this->getView('checkout/checkout_header');
        $out .= $this->getView('checkout/checkout_navigation',$params);
        $out .= $this->getView('checkout/checkout_navbar',$params);
        $out .= $this->getStepView();
        return $out .= $this->getView('checkout/checkout_footer');
        
    }

    public function getStepView() {
        $out = '';
        $key = 0;
        $hasUser = (!empty($this->user))? true:false;

        if (in_array($this->step,$this->authorizedStep)) {
            
            // Récupération du controller en fonction de la step
            $this->controllerStep($this->step);

            // Récupération de la clé
            $key = array_search($this->step, $this->authorizedStep);
            $key++;
            
            // Gestion du dépassement
            $countMax = count($this->authorizedStep) - 1;
            if ($key >= $countMax) {
                $key = $countMax;
            }

            // Prochaine étape
            $nextStep = $this->authorizedStep[$key];
            $nextStepUrl = URL.'checkout/?'.$nextStep.'&lg='.$this->langue;

            // Récupération de la devise
            $currencyCode = (!array_key_exists($this->doorGets->configWeb['currency'],Constant::$currency)) ? 'eur': $this->doorGets->configWeb['currency'];
            $currencyIcon = Constant::$currencyIcon[$currencyCode];
            
            $Products = $this->products;

            // Init
            $total = 0;
            $shippingCost = 20;
            
            $countries = $this->doorGets->getArrayForms('country');

            $default = array(
                'company' => '',
                'lastname' => '',
                'firstname'=>'',
                'phone' => '',
                'address' => '',
                'city' => '',
                'zipcode' => '',
                'country' => ''
            );

            $address = array(
                'shipping' => $default,
                'billing' => $default
            );

            if ($hasUser) {

                $phone = (!empty($this->user['tel_mobil'])) ? $this->user['tel_mobil']: $this->user['tel_fix'];
                $default = array(
                    'company' => $this->user['company'],
                    'lastname' => $this->user['last_name'],
                    'firstname'=> $this->user['first_name'],
                    'phone' => $phone,
                    'address' => $this->user['adresse'],
                    'city' => $this->user['city'],
                    'zipcode' => $this->user['zipcode'],
                    'country' => $this->user['country']
                );
                $address = array(
                    'shipping' => $default,
                    'billing' => $default
                );
            } 

            $listingCartParams = array(
                'Products'=> $Products,
                'total' => $total,
                'currencyIcon' => $currencyIcon
            );

            $formParams = array(
                'form' => $this->doorGets->Form,
                'countries' => $countries,
                'address' => $address
            );
            
            if ($this->step === 'success' || $this->step === 'cancel') {
                if (!empty($this->order['id']) && is_numeric($this->order['id'])) {

                    $orderEntity = new OrderEntity($this->order['id'],$this->doorGets);
                    if ($this->order['method_billing'] === 'paypal') {
                        
                        $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);
                        $payerId = filter_input(INPUT_GET, 'PayerID', FILTER_SANITIZE_STRING);

                        if (!empty($token) && !empty($payerId)) {
                            $paramsGet = array(
                                'TOKEN' => $token
                            );

                            $paypalService = new PaypalService($this->doorGets,$this->cart);
                            $response = $paypalService->request('GetExpressCheckoutDetails',$paramsGet);

                            if (empty($response) || $response['ACK'] !== 'Success') {
                                header('Location:./?cancel&lg='.$this->langue); exit();
                            } 
                            if ($response['CHECKOUTSTATUS'] === 'PaymentActionCompleted') {
                                header('Location:./?bis&lg='.$this->langue); exit();
                            } 

                            $paramsGet = array(
                                'TOKEN' => $token,
                                'PAYERID' => $payerId
                            );

                            $response = $paypalService->request('DoExpressCheckoutPayment',$paramsGet);
                            if (empty($response) || $response['ACK'] !== 'Success') {
                                header('Location:./?cancel&lg='.$this->langue); exit();
                            }  
                            $responseToSave = array();

                            foreach ($response as $key => $value) {
                                $key = strtolower($key);
                                $responseToSave[$key] = $value;
                            }

                            $paypalEntity = new PaypalEntity($responseToSave,$this->doorGets);
                            
                            $time = time();
                            $timeHuman = ucfirst(strftime("%A %d %B %Y %H:%M",$time));
                            $paypalEntity->setDateCreation($time);
                            $paypalEntity->setDateModification($time);
                            $paypalEntity->setDateCreationHuman($timeHuman);
                            $paypalEntity->setDateModificationHuman($timeHuman);

                            $paypalEntity->setUserId($this->user['id']);
                            $paypalEntity->setUserGroupe($this->user['groupe']);
                            $paypalEntity->setUserPseudo($this->user['pseudo']);
                            $paypalEntity->save();

                            $orderEntity->setTransactionId($response['PAYMENTINFO_0_TRANSACTIONID']);

                        } else {
                            
                            if ($this->step !== 'cancel') {
                                header('Location:./?cancel&lg='.$this->langue); exit();
                            }
                        }
                    }

                    $orderEntity->setStatus('payment_'.$this->step);
                    $orderEntity->save(false);
                    $this->cart->status = $this->step;
                    // @todo: Send mail to user 
                    
                    $this->cart->reset();
                } else {
                    $this->cart->reset();
                    header('Location:./?lg='.$this->langue); exit();
                }
            }

            if ($this->step === 'payment') {

                $orderEntity = new OrderEntity($this->order['id'],$this->doorGets);
                $order =  $orderEntity->getData();

                $billingMethod = $order['method_billing'];
                
                switch ($billingMethod) {

                    case 'transfer':
                    case 'check':
                    case 'cash':

                        $orderEntity->setStatus('waiting_'.$billingMethod);
                        $orderEntity->save(false);
                        
                        $this->cart->reset();

                        break;
                    case 'stripe':

                        $postFinish = false;
                        $success = true;
                        $amount = $order['amount'] + $order['shipping_amount'];
                        $log = '';
                        $currency = $order['currency'];
                        $orderId = $order['id'];

                        $isUser = $this->doorGets->dbQS($this->user['id'],'_user_stripe','id_user');

                        StripeService::init($this->doorGets);

                        if (array_key_exists('stripeToken',$_POST)) {
                            
                            $token  = $_POST['stripeToken'];

                            $isUser = $this->doorGets->dbQS($this->user['id'],'_user_stripe','id_user');
                            if (empty($isUser)) {

                                try {
                                    $customer = \Stripe\Customer::create(array(
                                      'email' => $this->user['login'],
                                      'card'  => $token
                                    ));

                                    $dataCharge = array(
                                        'customer' => $customer->id,
                                        'amount'   => $amount * 100,
                                        'currency' => $currency,
                                        "metadata" => array("order_id" => $orderId)
                                    );

                                    $dataUser = array(
                                        'id_stripe'         => $customer->id,
                                        'id_user'           => $this->user['id'],
                                        'date_creation'     => time(),
                                        'date_modification' => time()
                                    );
                                    
                                    $this->doorGets->dbQI($dataUser,'_user_stripe');
                                }
                                catch(Stripe_CardError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                } catch (Stripe_InvalidRequestError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Invalid parameters were supplied to Stripe's API
                                } catch (Stripe_AuthenticationError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Authentication with Stripe's API failed
                                  // (maybe you changed API keys recently)
                                } catch (Stripe_ApiConnectionError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Network communication with Stripe failed
                                } catch (Stripe_Error $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Display a very generic error to the user, and maybe send
                                  // yourself an email
                                } catch (Exception $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Something else happened, completely unrelated to Stripe
                                }

                            } else {

                                $dataCharge = array(
                                    "amount"   => $amount * 100, 
                                    "currency" => $currency,
                                    "customer" => $isUser['id_stripe'],
                                    "metadata" => array("order_id" => $orderId)
                                );
                            }

                            if ($success) {

                                try {
                                    $charge = \Stripe\Charge::create($dataCharge);

                                    $dataChargeToSave = array(
                                      
                                        "id_user"     => $this->user['id'],
                                        "id_stripe"   => $dataCharge['customer'],
                                        "id_charge"   => $charge->id,
                                        "id_order"    => $orderId,
                                        "status"      => $charge->status, 
                                        "amount"      => $charge->amount, 
                                        "currency"    => $charge->currency,
                                        "data"        => base64_encode(serialize($charge)),
                                        'date_creation'     => time(),
                                        'date_modification' => time()
                                    );
                                }
                                catch(Stripe_CardError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                } catch (Stripe_InvalidRequestError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Invalid parameters were supplied to Stripe's API
                                } catch (Stripe_AuthenticationError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Authentication with Stripe's API failed
                                  // (maybe you changed API keys recently)
                                } catch (Stripe_ApiConnectionError $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Network communication with Stripe failed
                                } catch (Stripe_Error $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Display a very generic error to the user, and maybe send
                                  // yourself an email
                                } catch (Exception $e) {
                                    $success = false;
                                    $log .= $e->getMessage()."\n";
                                  // Something else happened, completely unrelated to Stripe
                                }
                                
                                if ($success) {
                                    $idNewCharge = $this->doorGets->dbQI($dataChargeToSave,'_user_stripe_charge');
                                    $orderEntity->setStatus('card_success');
                                    $orderEntity->setTransactionId($charge->id);
                                    $orderEntity->save(false);
                                    $postFinish = true;  

                                    $paymentUrl = './?success&lg='.$this->langue;
                                    header('Location:'.$paymentUrl); exit();    
                                } 
                            } 
                        }

                        if (!$success) {
                            $log .= $orderEntity->getErrorLog();
                            $orderEntity->setStatus('card_denied');
                            $orderEntity->setErrorLog($log);
                            $orderEntity->save(false);
                            
                            $paymentUrl = './?cancel&lg='.$this->langue;
                            header('Location:'.$paymentUrl); exit();   
                        }
                    break;

                    default:
                        header('Location:./?cancel&lg='.$this->langue); exit();
                        break;
                }
            }

            // Récupération de la view
            $fileName = 'checkout/step/checkout_'.$this->step;
            $tpl = Template::getView($fileName,$formParams);
            ob_start(); if (is_file($tpl)) { include $tpl; } $out .= ob_get_clean();
        }
        return $out;
    }

    public function getView($name,&$params = array(),$debug = false) {
        
        if ($debug) {
            echo '<pre>';
            var_dump($params);
        }

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        $tpl = Template::getView($name);
        ob_start(); if (is_file($tpl)) { include $tpl; } $out = ob_get_clean();

        return $out;
    }

    

    public function initCurrentStep() {
        $params = $this->initParams();
        foreach ($this->authorizedStep as $step) {
            if (is_array($params) && array_key_exists('GET', $params) && array_key_exists($step, $params['GET'])) {
                $this->step = $step;
            }
        }
    }
    
    public function initParams() {
        
        if (!empty($_GET)) {
            foreach($_GET as $k=>$v) {
                $this->params['GET'][$k] = filter_input(INPUT_GET,$k,FILTER_SANITIZE_STRING);
            }
        }
        
        if (!empty($_POST)) {
            foreach($_POST as $k=>$v) {
                $this->params['POST'][$k] = filter_input(INPUT_POST,$k,FILTER_SANITIZE_STRING);
            }
        }
        
        return $this->params; 
    }

    public function controllerStep($step) {
        return true;
    }

    public function initForms() {
        
        $this->doorGets->Form['login']      = new Formulaire('login');
        $this->doorGets->Form['codepromo']  = new Formulaire('codepromo');
        $this->doorGets->Form['register']   = new Formulaire('register');
        $this->doorGets->Form['address']    = new Formulaire('address');

        $this->Form = &$this->doorGets->Form;
    }

    public function requestForms() {
        
        // Login
        $formLogin = &$this->doorGets->Form['login'];
        if (!empty($formLogin->i)) {

            $array = array(
                'login' => $formLogin->i['loginEmail'],
                'password' => $formLogin->i['loginPassword'],
            );

            $hasConnected = false;
            // vérification champ vide
            foreach($formLogin->i as $k=>$v) {
                if (empty($v)) {
                    $formLogin->e['login_'.$k] = 'ok';
                }
            }
            
            // verification de la taille du password
            if (strlen($formLogin->i['loginPassword']) < 4) {
                $formLogin->e['login_loginPassword'] = 'ok';
            }
            
            if (!empty($formLogin->e)) {

                $this->doorGets->fireWallIp();

            }else{
                
                $LogineExist = $this->doorGets->dbQS($formLogin->i['loginEmail'],'_users','login');

                if (
                    !empty($LogineExist)
                ) {
                    
                    $hasPassword = $this->doorGets->_decryptMe(
                        $formLogin->i['loginPassword'],
                        $LogineExist['salt'],
                        $LogineExist['password']
                    );

                    if($hasPassword) {
                        
                        $isUserInfos = $this->doorGets->dbQS($LogineExist['id'],'_users_info','id_user');
                        if (
                           !empty($isUserInfos) 
                           && ( $isUserInfos['active'] == '2' OR $isUserInfos['active'] == '5') 
                        ) {
                            
                            $this->doorGets->clearFireWallIp();

                            $_token = md5(uniqid(mt_rand(), true));

                            $_SESSION['doorgets_user']['id']        = $isUserInfos['id_user'];
                            $_SESSION['doorgets_user']['groupe']    = $isUserInfos['network'];
                            $_SESSION['doorgets_user']['login']     = $LogineExist['login'];
                            $_SESSION['doorgets_user']['password']  = $LogineExist['password'];
                            $_SESSION['doorgets_user']['langue']    = $isUserInfos['langue'];
                            $_SESSION['doorgets_user']['token']     = $_token;
                            
                            $this->doorGets->dbQU($LogineExist['id'],array('token'=>$_token),'_users');
                            FlashInfo::set($this->doorGets->__("Connexion réussie"));
                            
                            if ($isUserInfos['active'] == '5') {
                                
                                $this->doorGets->dbQU($LogineExist['id'],array('active' => '2'),'_users_info');
                                FlashInfo::set($this->doorGets->__("Connexion réussie").', '.$this->doorGets->__("Votre compte est maintenant ouvert"));
                                
                            }

                            header('Location:'.$_SERVER['REQUEST_URI']);
                            $hasConnected = true;
                            
                        }else{

                            $this->doorGets->fireWallIp();

                        }
                    }
                    
                }else{

                    $this->doorGets->fireWallIp();

                }
                
                if (!$hasConnected) {
                    $formLogin->e['login_loginEmail'] = 'ok';
                    $formLogin->e['login_loginPassword'] = 'ok';
                }
            }
        }

        // Register
        $formRegister = &$this->doorGets->Form['register'];
        if (!empty($formRegister->i)) {

            $groupes = $this->doorGets->loadGroupesSubscriber();
            $countGroupes = count($groupes);

            $idGroupe = null;
            $hasVerification = true;
            $errorMsg = '';
            if (empty($idActiveGroupe) && $countGroupes === 1) {
                foreach ($groupes as $key => $value) {
                    $idGroupe = $groupes[$key]['id'];
                    $hasVerfication = $groupes[$key]['verification'];
                }
            }elseif (array_key_exists($idActiveGroupe, $groupes)) {
                $idGroupe = $groupes[$idActiveGroupe]['id'];
                $hasVerfication = $groupes[$idActiveGroupe]['verification'];
            }

            $array = array(
                'registerLastname'  => $formRegister->i['registerLastname'],
                'registerFirstname' => $formRegister->i['registerFirstname'],
                'registerEmail'     => $formRegister->i['registerEmail'],
                'registerType'      => $formRegister->i['registerType'],
                'registerPassword'  => $formRegister->i['registerPassword'],
                'registerCompany'   => $formRegister->i['registerCompany'],
                'registerAddress'   => $formRegister->i['registerAddress'],
                'registerZipcode'   => $formRegister->i['registerZipcode'],
                'registerCity'      => $formRegister->i['registerCity'],
                'registerCountry'   => $formRegister->i['registerCountry'],
                'registerPhone'     => $formRegister->i['registerPhone'],
            );

            // vérification champ vide
            foreach($formRegister->i as $k=>$v) {
                if (empty($v) && $k !== 'registerCompany') {
                    $formRegister->e['register_'.$k] = 'Vide !';
                }
            }
            
            // verification adresse email
            if (empty($formRegister->e['register_registerEmail'])) {
                
                // verification du format mail
                $email = filter_var($formRegister->i['registerEmail'], FILTER_VALIDATE_EMAIL);
                if (empty($email)) {
                    $formRegister->e['register_registerEmail'] = 'Format email invalid';
                }
                
                // verification de l'existance de l'adresse email
                if (empty($formRegister->e['register_registerEmail'])) {
                
                    $isEmail = $this->doorGets->dbQS($formRegister->i['registerEmail'],'_users_info','email');
                    $isEmailLogin = $this->doorGets->dbQS($formRegister->i['registerEmail'],'_users','login');
                    
                    if (!empty($isEmail) || !empty($isEmailLogin)) {
                        $formRegister->e['register_registerEmail'] = 'Email deja ulisise';
                    }
                }
            }
            
            // création du pseudo
            $pseudo = 'dg'.uniqid();
            
            $hasMember = $formRegister->e['register_registerPassword'] && $formRegister->i['registerType'] === 'new-member';
            // verification du mot de passe
            if (array_key_exists('register_registerPassword',$formRegister->e) && empty($hasMember) ) {
                
                if (strlen($formRegister->i['registerPassword']) < 8) {
                    
                    $formRegister->e['register_registerPassword'] = 'Mot de passe trop court';
                    
                }
            }

            
            if (empty($formRegister->e) && $countGroupes > 0) {
                
                if ($idGroupe) {

                    $avatar = $this->doorGets->copyGravatar($formRegister->i['registerEmail']);
                    
                    $crypto = $this->doorGets->_cryptMe($formRegister->i['registerPassword']);

                    $dataLogin['login']         = $formRegister->i['registerEmail'];
                    $dataLogin['password']      = $crypto['password'];
                    $dataLogin['salt']          = $crypto['salt'];
                    
                    $dataInfo['langue']         = $this->doorGets->myLanguage;
                    $dataInfo['network']        = $idGroupe;
                    $dataInfo['active']         = ($hasVerfication) ? '3' : '2'; // moderation mode
                    
                    $dataInfo['pseudo']         = $pseudo;
                    $dataInfo['company']        = $formRegister->i['registerCompany'];
                    $dataInfo['email']          = $formRegister->i['registerEmail'];
                    $dataInfo['last_name']      = $formRegister->i['registerLastname'];
                    $dataInfo['first_name']     = $formRegister->i['registerFirstname'];
                    $dataInfo['tel_mobil']      = $formRegister->i['registerPhone'];
                    
                    $dataInfo['notification_newsletter']     = (array_key_exists('registerNewsletter',$formRegister->i))?1:0;
                            
                    $dataInfo['country']        = $formRegister->i['registerCountry'];
                    $dataInfo['city']           = $formRegister->i['registerCity'];
                    $dataInfo['zipcode']        = $formRegister->i['registerZipcode'];
                    $dataInfo['adresse']        = $formRegister->i['registerAddress'];

                    $dataInfo['date_creation']  = time();
                    
                    $dataInfo['avatar']         = $avatar;
                    
                    $dataInfo['id_user']        = $this->doorGets->dbQI($dataLogin,'_users');
                    $this->doorGets->dbQI($dataInfo,'_users_info');
                    
                    // create activation code
                    if ($hasVerfication) {
                        
                        $dataCode['type']           = 'subscribe';
                        $dataCode['id_user']        = $dataInfo['id_user'];
                        $dataCode['code']           = $this->doorGets->_genRandomKey(45);
                        $dataCode['date_creation']  = time();
                        
                        $this->doorGets->dbQI($dataCode,'_users_activation');
                        
                        $this->doorGets->createFolderUser($dataInfo['pseudo'],$dataInfo['id_user']);

                        $lgUser = ''; if (count($this->doorGets->allLanguagesWebsite) > 1) { $lgUser = $this->doorGets->myLanguage.'/'; }
                        $urlToSend = URL_USER.$lgUser.'?controller=authentification&action=activation&code='.$dataCode['code'];
                        
                        // send mail with code confirmation
                        new SendMailAuth($dataInfo['email'],'subscribe',$urlToSend,$this->doorGets);
                    
                    } else {
                    
                        // Connect user
                        $_token = md5(uniqid(mt_rand(), true));

                        $_SESSION['doorgets_user']['id']        = $dataInfo['id_user'];
                        $_SESSION['doorgets_user']['groupe']    = $dataInfo['network'];
                        $_SESSION['doorgets_user']['login']     = $dataLogin['login'];
                        $_SESSION['doorgets_user']['password']  = $dataLogin['password'];
                        $_SESSION['doorgets_user']['langue']    = $dataInfo['langue'];
                        $_SESSION['doorgets_user']['token']     = $_token;
                        
                        $this->doorGets->createFolderUser($dataInfo['pseudo'],$dataInfo['id_user']);

                        $this->doorGets->dbQU($dataInfo['id_user'],array('token'=>$_token),'_users');
                        FlashInfo::set($this->doorGets->__("Connexion réussie"));
                        header('Location:'.$_SERVER['REQUEST_URI']); exit();
                    }

                    $formRegister->isSended = true;
                        
                }   
            }

            
        }


        $formCodepromo = &$this->doorGets->Form['codepromo'];
        if (!empty($formCodepromo->i)) {
            echo '<pre>';
            echo $this->doorGets->varDumpArray($formCodepromo->i);
            exit();
        }
        
        // Address
        $formAddress = &$this->doorGets->Form['address'];
        if (!empty($formAddress->i)) {
            $this->cart->setShippingMethod($formAddress->i['methodShipping']);
            // echo '<pre>';
            // echo $this->doorGets->varDumpArray($formAddress->i);
            // exit();
            
            
            $ignore = array('shippingCompany','billingCompany','shippingPhone','billingPhone','message');
            //$_SESSION = array();
            // vdump($_SESSION);
            // exit();
            // vérification champ vide
            foreach($formAddress->i as $k=>$v) {
                if (empty($v) && !in_array($k, $ignore)) {
                    $formAddress->e['address_'.$k] = 'ok';
                }
            }

            if (empty($formAddress->e)) {

                $time = time();
                $timeHuman = ucfirst(strftime("%A %d %B %Y %H:%M",$time));
                
                $this->order['reference']  = 'DG'.$this->user['id'].uniqid();

                $this->order['shipping_lastname']  = $formAddress->i['shippingLastname'];
                $this->order['shipping_firstname'] = $formAddress->i['shippingFirstname'];
                $this->order['shipping_company']   = $formAddress->i['shippingCompany'];
                $this->order['shipping_address']   = $formAddress->i['shippingAddress'];
                $this->order['shipping_zipcode']   = $formAddress->i['shippingZipcode'];
                $this->order['shipping_city']      = $formAddress->i['shippingCity'];
                $this->order['shipping_country']   = $formAddress->i['shippingCountry'];
                $this->order['shipping_phone']     = $formAddress->i['shippingPhone'];

                $this->order['billing_lastname']  = $formAddress->i['billingLastname'];
                $this->order['billing_firstname'] = $formAddress->i['billingFirstname'];
                $this->order['billing_company']   = $formAddress->i['billingCompany'];
                $this->order['billing_address']   = $formAddress->i['billingAddress'];
                $this->order['billing_zipcode']   = $formAddress->i['billingZipcode'];
                $this->order['billing_city']      = $formAddress->i['billingCity'];
                $this->order['billing_country']   = $formAddress->i['billingCountry'];
                $this->order['billing_phone']     = $formAddress->i['billingPhone'];

                $this->methodBilling = $formAddress->i['methodBilling'];
                $this->methodShipping = $formAddress->i['methodShipping'];
                
                $this->order['type']  = Constant::$orderType['checkout'];
                $this->order['status'] = $this->status;
                $this->order['langue'] = $this->langue;
                $this->order['vat'] = 20;
                $this->order['amount'] = $this->cart->getTotalAmountPromoVAT();
                $this->order['amount_real'] = $this->cart->getTotalAmountVAT();
                $this->order['amount_billing'] = $this->cart->getTotalBillingAmount();
                $this->order['amount_profit'] = $this->cart->getTotalProfitAmount();
                $this->order['amount_vat'] = $this->cart->getTotalVATAmount();
                $this->order['amount_with_shipping'] = $this->cart->getTotalAmountPromoShippingVAT();
                $this->order['count'] = $this->cart->getCount();
                $this->order['currency'] = $this->currency;
                $this->order['shipping_amount'] = $this->cart->shippingAmount;
                $this->order['method_billing'] =  $this->methodBilling;
                $this->order['method_shipping'] =  $this->methodShipping;
                $this->order['date_creation'] =  $time;
                $this->order['date_creation_human'] =  $timeHuman;
                $this->order['date_modification'] =  $time;
                $this->order['date_modification_human'] =  $timeHuman;
                $this->order['products'] = base64_encode(serialize($this->products));
                
                $this->order['message']     = $formAddress->i['message'];
                
                $orderEntity = new OrderEntity($this->order,$this->doorGets);
                $orderEntity->save(false);
                
                $_SESSION['cart_info']['orderId'] = $this->order['id'] = $orderEntity->getId();

                $paymentUrl = './?payment&lg='.$this->langue;
                if ($this->methodBilling === 'paypal') {
                    $paypalService = new PaypalService($this->doorGets,$this->cart);
                    $paymentUrl = $paypalService->getUrl();
                }
                
                header('Location:'.$paymentUrl); exit();
                
            }
        }

    }


    public function initOrder() {
        if (!empty($this->order['id']) && is_numeric($this->order['id'])) {
            $orderEntity = new OrderEntity($this->order['id'],$this->doorGets);
            $orderData = $orderEntity->getData();
            if (is_array($orderData)) {
                $this->order = array_merge($this->order,$orderData);
            }
        }
    }

}