<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
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

?>
<div class="doorGets-rubrique-center">
    <div class="doorGets-rubrique-center-title page-header">

    </div>
    <div class="doorGets-rubrique-center-content">
        <legend>
            <b class="glyphicon glyphicon-envelope"></b> [{!$this->doorGets->__('Sécurité')!}] 
        </legend>
        <div class="width-listing">
            [{!$htmlAccountRubrique!}]
            <div class="content-user-sercurity">
                <h3>[{!$this->doorGets->__('Modifier votre adresse e-mail')!}]</h3>
                <div class="separateur-tb"></div>
                [{?(empty($isCodeActive)):}]
                
                    [{!$this->doorGets->Form['email']->open('post','','')!}]
                        [{!$this->doorGets->Form['email']->input($this->doorGets->__('Votre mot de passe'),'passwd_now','password','','input-user')!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form['email']->input($this->doorGets->__('Votre nouvelle adresse e-mail'),'email_new','text','','input-user')!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form['email']->input($this->doorGets->__('Retaper votre nouvelle adresse e-mail'),'email_new_bis','text','','input-user')!}]
                        <div class="separateur-tb"></div>
                        <div class="text-center">
                            [{!$this->doorGets->Form['email']->submit($this->doorGets->__('Recevoir le code de vérification'))!}]
                        </div>
                        
                    [{!$this->doorGets->Form['email']->close();}]
                    
                [??]
                
                    <h3>[{!$this->doorGets->__('Veuillez saisir votre code reçu par mail')!}] ([{!$isCodeActive['email']!}])</h3>
                    [{!$this->doorGets->Form['email_confirmation']->open('post','','')!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form['email_confirmation']->input('','code')!}]
                        <div class="separateur-tb"></div>
                        
                        <div class="text-center">
                            [{!$this->doorGets->Form['email_confirmation']->submit($this->doorGets->__('Valider ma nouvelle adresse e-mail'))!}]
                        </div>
                    [{!$this->doorGets->Form['email_confirmation']->close();}]
                    
                    [{!$this->doorGets->Form['email_confirmation_delete']->open('post','','')!}]
                        <div class="separateur-tb"></div>
                        [{!$this->doorGets->Form['email_confirmation_delete']->input('','hidden','hidden','hidden')!}]
                        <div class="separateur-tb"></div>
                        <div class="text-center">
                            [{!$this->doorGets->Form['email_confirmation_delete']->submit($this->doorGets->__('Supprimer la demande'),'','btn-danger btn-lg')!}]
                        </div>
                    [{!$this->doorGets->Form['email_confirmation_delete']->close();}]
                    
                [?]
            </div>

        </div>
    </div>
</div>