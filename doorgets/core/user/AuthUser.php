<?php

/*******************************************************************************
/*******************************************************************************
    doorgets 5.0 #!#!#
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
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



class AuthUser extends Langue{
    
    private $isConnected = array();
    
    public $doorGets;

    public function __construct($resetToken = true,$verifPayment = true) {
        
        parent::__construct('fr');

        if (
            isset($_SESSION['doorgets_user']) 
            && isset($_SESSION['doorgets_user']['login'])
            && isset($_SESSION['doorgets_user']['token']) 
        ) {
            
            extract($_SESSION['doorgets_user']);

            $userExist = $this->dbQS($login,'_users','login');
            
            if (!empty($userExist) && $token === $userExist['token']) {
                
                $userExistInfo = $this->dbQS($userExist['id'],'_users_info','id_user');
                
                if (!empty($userExistInfo)) {

                    parent::__construct($userExistInfo['langue']);
                        
                    $userExistInfoGroupe = $this->dbQS($userExistInfo['network'],'_users_groupes');

                    if (!empty($userExistInfoGroupe)) {
                       
                        // Load all data about user
                        $this->isConnected['profile_type']                  =  $userExistInfo['profile_type'];
                        
                        $this->isConnected['id']                            =  $userExist['id'];
                        $this->isConnected['groupe']                        =  $userExistInfo['network'];
                        $this->isConnected['login']                         =  $userExist['login'];

                        $this->isConnected['timezone']                      =  $userExistInfo['horaire'];
                        
                        $this->isConnected['pseudo']                        =  $userExistInfo['pseudo'];
                        $this->isConnected['langue']                        =  $userExistInfo['langue'];
                        $this->isConnected['last_name']                     =  $userExistInfo['last_name'];
                        $this->isConnected['first_name']                    =  $userExistInfo['first_name'];
                        $this->isConnected['description']                   =  $userExistInfo['description'];
                        
                        $this->isConnected['website']                       =  $userExistInfo['website'];
                        $this->isConnected['id_facebook']                   =  $userExistInfo['id_facebook'];
                        $this->isConnected['id_twitter']                    =  $userExistInfo['id_twitter'];
                        $this->isConnected['id_youtube']                    =  $userExistInfo['id_youtube'];
                        $this->isConnected['id_google']                     =  $userExistInfo['id_google'];
                        $this->isConnected['id_pinterest']                  =  $userExistInfo['id_pinterest'];
                        $this->isConnected['id_linkedin']                   =  $userExistInfo['id_linkedin'];
                        $this->isConnected['id_myspace']                    =  $userExistInfo['id_myspace'];
                        
                        $this->isConnected['company']                       =  $userExistInfo['company'];

                        $this->isConnected['country']                       =  $userExistInfo['country'];
                        $this->isConnected['city']                          =  $userExistInfo['city'];
                        $this->isConnected['zipcode']                       =  $userExistInfo['zipcode'];
                        $this->isConnected['adresse']                       =  $userExistInfo['adresse'];
                        $this->isConnected['tel_fix']                       =  $userExistInfo['tel_fix'];
                        $this->isConnected['tel_mobil']                     =  $userExistInfo['tel_mobil'];
                        $this->isConnected['tel_fax']                       =  $userExistInfo['tel_fax'];
                        $this->isConnected['region']                        =  $userExistInfo['region'];
                        
                        $this->isConnected['avatar']                        =  $userExistInfo['avatar'];
                        
                        $this->isConnected['gender']                        =  $userExistInfo['gender'];
                        $this->isConnected['birthday']                      =  $userExistInfo['birthday'];
                        
                        $this->isConnected['notification_mail']             =  $userExistInfo['notification_mail'];
                        $this->isConnected['notification_newsletter']       =  $userExistInfo['notification_newsletter'];
                        
                        $this->isConnected['liste_widget']                  =  $this->_toArray($userExistInfoGroupe['liste_widget']);
                        $this->isConnected['liste_module']                  =  $this->_toArray($userExistInfoGroupe['liste_module']);
                        $this->isConnected['liste_module_interne']          =  $this->_toArray($userExistInfoGroupe['liste_module_interne']);
                        $this->isConnected['liste_enfant']                  =  $this->_toArray($userExistInfoGroupe['liste_enfant']);
                        
                        $this->isConnected['liste_module_limit']            =  $this->_toArrayKeys($userExistInfoGroupe['liste_module_limit']);
                        
                        $this->isConnected['liste_module_list']             =  $this->_toArray($userExistInfoGroupe['liste_module_list']);
                        $this->isConnected['liste_module_show']             =  $this->_toArray($userExistInfoGroupe['liste_module_show']);
                        $this->isConnected['liste_module_add']              =  $this->_toArray($userExistInfoGroupe['liste_module_add']);
                        $this->isConnected['liste_module_edit']             =  $this->_toArray($userExistInfoGroupe['liste_module_edit']);
                        $this->isConnected['liste_module_delete']           =  $this->_toArray($userExistInfoGroupe['liste_module_delete']);
                        $this->isConnected['liste_module_admin']            =  $this->_toArray($userExistInfoGroupe['liste_module_admin']);

                        $this->isConnected['liste_module_modo']             =  $this->_toArray($userExistInfoGroupe['liste_module_modo']);
                        $this->isConnected['liste_module_interne_modo']     =  $this->_toArray($userExistInfoGroupe['liste_module_interne_modo']);
                        $this->isConnected['liste_enfant_modo']             =  $this->_toArray($userExistInfoGroupe['liste_enfant_modo']);
                        
                        $this->isConnected['liste_enfant']                  =  $this->_toArray($userExistInfoGroupe['liste_enfant']);
                        
                        $this->isConnected['attributes']                    =  unserialize(base64_decode($userExistInfoGroupe['attributes']));

                        
                        $this->isConnected['editor_group']                  = array('-- '.$this->__('Aucun').' --');
                        
                        $this->isConnected['editor_html']                   = $userExistInfo['editor_html'];
                        $this->isConnected['fileman']                       = $userExistInfoGroupe['fileman'];

                        // $this->isConnected['payment']                       = ($userExistInfoGroupe['payment'] == '1')?true:false;
                        // $this->isConnected['payment_currency']              = $userExistInfoGroupe['payment_currency'];
                        // $this->isConnected['payment_amount_month']          = $userExistInfoGroupe['payment_amount_month'];
                        // $this->isConnected['payment_group_expired']         = $userExistInfoGroupe['payment_group_expired'];
                        // $this->isConnected['payment_tranche']               = $userExistInfoGroupe['payment_tranche'];
                        // $this->isConnected['payment_group_upgrade']         = $userExistInfoGroupe['payment_group_upgrade'];

                        if (!empty($userExistInfoGroupe['editor_ckeditor'])) {
                            $this->isConnected['editor_group']['editor_ckeditor']   = 'editor_ckeditor';
                        }

                        if (!empty($userExistInfoGroupe['editor_tinymce'])) {
                            $this->isConnected['editor_group']['editor_tinymce']    = 'editor_tinymce';
                        }

                        
                        
                        if (array_key_exists('langue_temp',$_SESSION['doorgets_user'])) {
                            $this->isConnected['langue']    =  $_SESSION['doorgets_user']['langue_temp'];
                        }

                        if (empty($userExistInfoGroupe['saas_options'])) {
                            $this->isConnected['saas_options'] = array(
                                'saas_add' => false,
                                'saas_delete' => false,
                                'saas_limit' => 0,
                                'saas_date_end' => 0,
                            );
                        } else {
                            $this->isConnected['saas_options'] = unserialize(base64_decode($userExistInfoGroupe['saas_options']));
                        }
                        
                        $sesssionId = session_id();
                        $surveryData = array(
                            'pseudo' => $this->isConnected['pseudo'],
                            'id_user' => $this->isConnected['id'],
                            'id_groupe' => $this->isConnected['groupe']
                        );

                        $this->dbQU($sesssionId,$surveryData,'_dg_survey_response','id_session','');

                        // echo '<pre>';
                        // var_dump($this->isConnected['liste_module_interne']);
                        // exit;
                        // reset token
                        // if ($resetToken) {
                        //     $_token = $_SESSION['doorgets_user']['token'] = md5(uniqid(mt_rand(), true));
                        //     $this->dbQU($userExist['id'],array('token'=>$_token),'_users');
                        // }
                        
                    }
                }
            }
        }
        
        return null;
    }
    
    public function isConnected() {
        
        return $this->isConnected;
    }
}
