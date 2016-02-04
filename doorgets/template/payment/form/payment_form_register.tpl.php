<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
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


?>[{!$form['register']->open('post','','','form-login-payment');}]
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                [{!$form['register']->input($this->doorGets->__('Nom').' <span class="cp-obli">*</span>','registerLastname');}]
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                [{!$form['register']->input($this->doorGets->__('Prénom').' <span class="cp-obli">*</span>','registerFirstname');}]
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 colRegisterEmail">
            <div class="form-group">
                [{!$form['register']->input($this->doorGets->__('Adresse e-mail').' <span class="cp-obli">*</span>','registerEmail');}]
            </div>
        </div>
         <div class="col-md-6 colRegisterPassword">
            <div class="form-group">
                [{!$form['register']->input('','registerType','hidden','new-member');}]
                [{!$form['register']->input($this->doorGets->__('Mot de passe').' <span class="cp-obli">*</span>','registerPassword','password');}]
            </div>
        </div>
    </div>
    <div class="form-group">
        [{!$form['register']->input($this->doorGets->__('Société'),'registerCompany');}]
    </div>
    <div class="form-group">
        [{!$form['register']->input($this->doorGets->__('Adresse').' <span class="cp-obli">*</span>','registerAddress');}]
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                [{!$form['register']->input($this->doorGets->__('Code postal').' <span class="cp-obli">*</span>','registerZipcode');}]
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                [{!$form['register']->input($this->doorGets->__('Ville').' <span class="cp-obli">*</span>','registerCity');}]
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                [{!$form['register']->select($this->doorGets->__('Pays').' <span class="cp-obli">*</span>','registerCountry',$countries,'FR');}]
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                [{!$form['register']->input($this->doorGets->__('Téléphone').' <span class="cp-obli">*</span>','registerPhone');}]
            </div>
        </div>
    </div>
    [{?(!empty($this->doorGets->configWeb['terms_tinymce']) || !empty($this->doorGets->configWeb['cgu_tinymce']) || !empty($this->doorGets->configWeb['privacy_tinymce'])):}]
    <div class="separateur-tb"></div>
    <div class="text-left"> 
    <h4>[{!$this->doorGets->__("Si vous continuez, vous acceptez")!}] :</h4>   
        [{?(!empty($this->doorGets->configWeb['cgu_tinymce'])):}]
            <span class="show-click-cgu" data-toggle="modal" data-target="#cguModal"><i class="fa fa-check green-c"></i> [{!$this->doorGets->__("Conditions générales d'utilisation")!}]</span>
            <div id="cguModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">[{!$this->doorGets->__("Conditions générales d'utilisation")!}]</h4>
                  </div>
                  <div class="modal-body">
                    [{!$this->doorGets->configWeb['cgu_tinymce']!}]
                  </div>
                </div>

              </div>
            </div>
        [?]
        [{?(!empty($this->doorGets->configWeb['terms_tinymce'])):}]
            <span class="show-click-terms" data-toggle="modal" data-target="#termsModal"><i class="fa fa-check green-c"></i> [{!$this->doorGets->__("Conditions générales de vente")!}]</span>
            <div id="termsModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">[{!$this->doorGets->__("Conditions générales de vente")!}]</h4>
                  </div>
                  <div class="modal-body">
                    [{!$this->doorGets->configWeb['terms_tinymce']!}]
                  </div>
                </div>

              </div>
            </div>
        [?]
        [{?(!empty($this->doorGets->configWeb['privacy_tinymce'])):}]
            <span class="show-click-privacy" data-toggle="modal" data-target="#privacyModal"><i class="fa fa-check green-c"></i> [{!$this->doorGets->__("Politique de confidentialité")!}]</span>
            <div id="privacyModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">[{!$this->doorGets->__("Politique de confidentialité")!}]</h4>
                  </div>
                  <div class="modal-body">
                    [{!$this->doorGets->configWeb['privacy_tinymce']!}]
                  </div>
                </div>

              </div>
            </div>
        [?]
        <div class="separateur-tb"></div>
    </div>
    [?]
    <div class="checkbox">
        [{!$form['register']->checkbox($this->doorGets->__("S'inscrire à la newsletter"),'registerNewsletter','1','checked');}]
    </div>
    <div class="separateur-tb"></div>
    <div >
        [{!$form['register']->submit($this->doorGets->__("S'enregistrer"),'','btn btn-info');}]
    </div>
[{!$form['register']->close()!}]