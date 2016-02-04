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

class Payment {
    public 
        $user,
        $doorGets,
        $langue
    ;
    
    private 
        $form,
        $params,
        $subscription,
        $billinAddress,
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
        $methodBilling
    ;

    protected 
        $order
    ;

    public
        $shipping
    ;
    
    /*
    *   subscription_proccess
    *   payment_proccess
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
    *   cash_waiting
    *   cash_success
    */
    protected 
        $status = 'subscription_proccess'
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


        $this->order['id'] = (
            array_key_exists('orderId', $_SESSION)
            && !empty($_SESSION['orderId']) )
        ?$_SESSION['orderId']:'';
        $this->subscription = new PaymentOrder($user);
        
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
            'subscription' => $this->subscription,
            'navigation' => $navigation,
            'module' => $module,
            'theme' => $theme,
            'activeModules' => $activeModules,
            'toLangue' => $toLangue
        );
        
        $exclude = array('error','success');
        
        $out  = $this->getView('payment/payment_header');
        $out .= $this->getView('payment/payment_navigation',$params);
        $out .= $this->getView('payment/payment_navbar',$params);
        $out .= $this->getStepView();
        return $out .= $this->getView('payment/payment_footer');
        
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
            $nextStepUrl = URL.'payment/?'.$nextStep.'&lg='.$this->langue;

            // Récupération de la devise
            $currencyCode = (!array_key_exists($this->doorGets->configWeb['currency'],Constant::$currency)) ? 'eur': $this->doorGets->configWeb['currency'];
            $currencyIcon = Constant::$currencyIcon[$currencyCode];
            
            $subscription = $this->subscription->data;

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
                    'country' => $this->user['country'],
                    'region' => $this->user['region']
                );
                $address = array(
                    'billing' => $default
                );
            } 

            $listingCartParams = array(
                'subscription'=> $subscription,
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

                            $paypalService = new PaypalPaymentService($this->doorGets,$this->subscription);
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
                    // @todo: Send mail to user 
                    
                } else {
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
            $fileName = 'payment/step/payment_'.$this->step;
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
        
        // Address
        $formAddress = &$this->doorGets->Form['address'];
        if (!empty($formAddress->i)) {
            // echo '<pre>';
            // echo $this->doorGets->varDumpArray($formAddress->i);
            // exit();
            
            
            $ignore = array('billingCompany','billingPhone','billingRegion');
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

                $this->order['billing_lastname']  = $formAddress->i['billingLastname'];
                $this->order['billing_firstname'] = $formAddress->i['billingFirstname'];
                $this->order['billing_company']   = $formAddress->i['billingCompany'];
                $this->order['billing_address']   = $formAddress->i['billingAddress'];
                $this->order['billing_zipcode']   = $formAddress->i['billingZipcode'];
                $this->order['billing_city']      = $formAddress->i['billingCity'];
                $this->order['billing_country']   = $formAddress->i['billingCountry'];
                $this->order['billing_phone']     = $formAddress->i['billingPhone'];
                $this->order['billing_region']    = $formAddress->i['billingRegion'];

                $this->methodBilling = $formAddress->i['methodBilling'];
                
                $this->order['type']  = Constant::$orderType['payment'];
                $this->order['status'] = $this->status;
                $this->order['langue'] = $this->langue;
                $this->order['amount'] = $this->subscription->data['amount_total'];
                $this->order['amount_real'] = $this->subscription->data['amount_total'];
                $this->order['amount_billing'] = $this->subscription->data['amount_total'];
                $this->order['amount_profit'] = $this->subscription->data['amount_total'];
                $this->order['amount_vat'] = $this->subscription->data['amount_total'];
                $this->order['amount_with_shipping'] = $this->subscription->data['amount_total'];
                $this->order['count'] = $this->subscription->data['tranche'];
                $this->order['currency'] = $this->subscription->data['currency'];
                $this->order['method_billing'] =  $this->methodBilling;
                $this->order['date_creation'] =  $time;
                $this->order['date_creation_human'] =  $timeHuman;
                $this->order['date_modification'] =  $time;
                $this->order['date_modification_human'] =  $timeHuman;
                $this->order['products'] = base64_encode(serialize($this->subscription));
                
                $orderEntity = new OrderEntity($this->order,$this->doorGets);
                $orderEntity->save(false);
                
                $this->saveUserAddress();
                
                $_SESSION['orderId'] = $this->order['id'] = $orderEntity->getId();

                $paymentUrl = './?payment&lg='.$this->langue;
                if ($this->methodBilling === 'paypal') {
                    $paypalService = new PaypalPaymentService($this->doorGets,$this->subscription);
                    $paymentUrl = $paypalService->getUrl();
                    
                }
                
                header('Location:'.$paymentUrl); exit();
                
            }
        }

    }

    public function saveUserAddress() {

        $data = array(
            'company'       => $this->order['billing_company'],
            'last_name'     => $this->order['billing_lastname'],
            'first_name'    => $this->order['billing_firstname'],
            'tel_fix'       => $this->order['billing_phone'],
            'adresse'       => $this->order['billing_address'],
            'city'          => $this->order['billing_city'],
            'zipcode'       => $this->order['billing_zipcode'],
            'country'       => $this->order['billing_country'],
            'region'        => $this->order['billing_region']
        );

        $this->doorGets->dbQU($this->user['id'],$data,'_users_info','id_user');
        
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