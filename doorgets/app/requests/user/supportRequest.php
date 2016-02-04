<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/?contact
    
/*******************************************************************************
    -= One life for One code =-
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


class SupportRequest extends doorGetsUserRequest{
    
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
    }

    public function doAction() {
        
        $table = '_support';
        $lgActuel = $this->doorGets->getLangueTradution();
        $User = $this->doorGets->user;

        $out = '';
        
        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {

            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$table);
            if (!empty($isContent)) {
                $this->isContent = $isContent;
                $pofile = $this->doorGets->getProfileLight($isContent['id_user']);
            }
            
            

        }
        
        $noObligatoire = array();

        switch($this->Action) {
            
            case 'add':
        
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $paramsAttibute = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_add_'.$k] = 'ok';
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {

                        $ticketSuppport = new SupportEntity($this->doorGets->Form->i,$this->doorGets);
                        $nlMessage = nl2br($ticketSuppport->getMessage());
                        $ticketSuppport->setMessage($nlMessage);
                        $ticketSuppport->setIdUser($User['id']);
                        $ticketSuppport->setIdGroupe($User['groupe']);
                        $ticketSuppport->setReference('dg-'.$User['id'].'-'.time());
                        $ticketSuppport->setPseudo($User['pseudo']);
                        $ticketSuppport->setReadedUser(2);
                        $ticketSuppport->setReadedSupport(1);
                        $ticketSuppport->setDateCreation(time());
                        $ticketSuppport->setLangue($lgActuel);
                        $ticketSuppport->setStatus(1);
                        $ticketSuppport->save(false);

                        FlashInfo::set($this->doorGets->__("Le ticket est en cours de traitement"));
                        header('Location:./?controller=support'); exit();
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }
                
                break;
            
            case 'ticket':
                
                if (!empty($isContent)) {
                    // Readed user
                    if ($isContent['id_user'] == $User['id'] && !ACTIVE_DEMO) {
                        $this->doorGets->dbQU($isContent['id'],array('readed_user' => 2),$table);
                    }
                    // Readed support
                    if (in_array('support',$this->doorGets->user['liste_module_interne']) && !ACTIVE_DEMO) {
                        $this->doorGets->dbQU($isContent['id'],array('readed_support' => 2),$table);
                    }
                }
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $paramsAttibute = array();

                    foreach($this->doorGets->Form->i as $k=>$v) {
                        if (empty($v) && !in_array($k, $noObligatoire)) {
                            $this->doorGets->Form->e[$this->doorGets->controllerNameNow().'_ticket_'.$k] = 'ok';
                        }
                    }

                    if (empty($this->doorGets->Form->e)) {
                        
                        $isSupportAgent = ($isContent['id_user'] !== $User['id'] && in_array('support',$this->doorGets->user['liste_module_interne']) ) ? 1 : 0;

                        $ticketSuppportMessages = new SupportMessagesEntity($this->doorGets->Form->i,$this->doorGets);
                        $nlMessage = nl2br($ticketSuppportMessages->getMessage());
                        $ticketSuppportMessages->setMessage($nlMessage);
                        $ticketSuppportMessages->setIdSupport($isContent['id']);
                        $ticketSuppportMessages->setIdUser($User['id']);
                        $ticketSuppportMessages->setIdGroupe($User['groupe']);
                        $ticketSuppportMessages->setIsSupportAgent($isSupportAgent);
                        $ticketSuppportMessages->setDateCreation(time());
                        $ticketSuppportMessages->save(false);

                        $countMessage = (int) $isContent['count_messages'] + 1;
                        $ticketSuppport = new SupportEntity($isContent['id'],$this->doorGets);
                        $ticketSuppport->setCountMessages($countMessage);

                        if ($isSupportAgent) {

                            $ticketSuppport->setReadedSupport(2);
                            $ticketSuppport->setReadedUser(1);

                            if (!empty($pofile)) {

                                $lgUser = ''; if (count($this->doorGets->allLanguagesWebsite) > 1) { $lgUser = $this->doorGets->myLanguage.'/'; }
                                $urlToSend = URL_USER.$lgUser.'?controller=support&action=ticket&id='.$isContent['id'];

                                if ($pofile['notification_mail'] === '1') {
                                    // send mail to user
                                    $isSended = new SendMailAuth($pofile['email'],'support',$urlToSend,$this->doorGets);
                                }
                            }

                        } else {

                            $ticketSuppport->setReadedSupport(1);
                            $ticketSuppport->setReadedUser(2);


                        }
                        
                        $ticketSuppport->save(false);
                        FlashInfo::set($this->doorGets->__("Votre réponse a été prise en compte"));
                        header('Location:./?controller=support&action=ticket&id='.$isContent['id']); exit();
                    }

                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                }

                break;
            
            case 'close':

                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();

                    $ticketSuppport = new SupportEntity($isContent['id'],$this->doorGets);
                    $ticketSuppport->setStatus('2');
                    $ticketSuppport->setDateClose(time());
                    $ticketSuppport->save(false);

                    if (empty($this->doorGets->Form->e)) {
                        
                        FlashInfo::set($this->doorGets->__("Le ticket a été corréctement fermé"));
                        header('Location:./?controller=support&action=ticket&id='.$isContent['id']); exit();
                    }
                }
                
                break;

            case 'delete':
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        FlashInfo::set($this->doorGets->__("Le ticket a été corréctement supprimer"));
                        header('Location:./?controller=support'); exit();
                    }
                }
                
                break;
            
           
        }
    }
}
