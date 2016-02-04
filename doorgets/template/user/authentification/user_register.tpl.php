<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 5.1 - 11 November, 2013
    doorGets it's free PHP Open Source CMS PHP & MySQL
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


$pseudoInfo = $this->doorGets->__("Le nom d'utilisateur doit contenir au moins 4 caractères et être composé uniquement de lettres en minuscule et de chiffres").'.';
$pwdInfo = $this->doorGets->__('8 caractères minimum').".  ";
$pwdInfo .= $this->doorGets->__("Nous vous conseillons de choisir un mot de passe fort et unique, à base de lettres, de chiffres et de caractères spéciaux").'.';

?>
<div class="text-center">
    <a href="[{!BASE!}]" class="logo-auth" title="[{!$this->doorGets->__('Accéder au site')!}]"><img src="[{!BASE!}]skin/img/logo_auth.png"></a>
</div>
<div class="doorGets-box-login">
    [{?(count($this->doorGets->allLanguagesWebsite) > 1):}]
    <div  class="btn-group pull-right btn-langue-change">
        <a  class="btn btn-default dropdown-toggle no-loader" data-toggle="dropdown" href="#">
            [{!$this->doorGets->allLanguagesWebsite[$this->doorGets->myLanguage]!}] 
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" role="menu">
            [{/($this->doorGets->allLanguagesWebsite as $key=>$label):}]
                <li [{?($this->doorGets->myLanguage === $key):}]class="active"[?] >
                    <a class="navbut" href="[{!URL_USER.$key.'/?controller=authentification&action=register'}]">
                        <img src="[{!BASE_IMG!}]drap_[{!$key!}].png">
                        [{!$label!}]
                    </a>
                </li>
            [/]
        </ul>
    </div>
    [?]
    <h3 class="doorGets-title">[{!$this->doorGets->__("S'inscrire")!}]</h3>
    <div>
        [{?($fireWallIp['level'] < 6):}]
            [{?($isOauthGoogle || $isOauthFacebook):}]
            [{?($isOauthGoogle):}]
            <div>
                [{!$this->doorGets->Form['google']->open('post','','')!}]
                    <label>[{!$this->doorGets->__('E-mail')!}] : </label> [{!$UserGoogleData['email']!}]
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip($this->doorGets->__('Prénom'),'firstname')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip($this->doorGets->__('Nom'),'lastname')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                     <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['google']->select('<b class="glyphicon glyphicon-globe"></b> '.$this->doorGets->__('Votre fuseau horaire'),'horaire',$this->doorGets->getArrayForms('times_zone'),'Europe/Paris')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['google']->inputTooltip('<b class="glyphicon glyphicon-user"></b> '.$this->doorGets->__('Pseudo'),'login','text','','',$pseudoInfo)!}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($this->doorGets->configWeb['terms_tinymce']) || !empty($this->doorGets->configWeb['cgu_tinymce']) || !empty($this->doorGets->configWeb['privacy_tinymce'])):}]
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
                    <div class="checkbox text-center">
                        [{!$this->doorGets->Form['google']->checkbox($this->doorGets->__("S'inscrire à la newsletter"),'registerNewsletter','1','checked');}]
                    </div>
                    <div class="text-center">
                        [{!$this->doorGets->Form['google']->submit($this->doorGets->__("Confirmer mon inscription"),'','btn btn-lg btn-success')!}]
                    </div>
                [{!$this->doorGets->Form['google']->close()!}]
            </div>  
            [?]
            [{?($isOauthFacebook):}]
            <div>
                [{!$this->doorGets->Form['facebook']->open('post','','')!}]
                    <label>[{!$this->doorGets->__('E-mail')!}] : </label> [{!$UserFacebookData['email']!}]
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip($this->doorGets->__('Prénom'),'firstname')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip($this->doorGets->__('Nom'),'lastname')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                     <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['facebook']->select('<b class="glyphicon glyphicon-globe"></b> '.$this->doorGets->__('Votre fuseau horaire'),'horaire',$this->doorGets->getArrayForms('times_zone'),'Europe/Paris')!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['facebook']->inputTooltip('<b class="glyphicon glyphicon-user"></b> '.$this->doorGets->__('Pseudo'),'login','text','','',$pseudoInfo)!}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($this->doorGets->configWeb['terms_tinymce']) || !empty($this->doorGets->configWeb['cgu_tinymce']) || !empty($this->doorGets->configWeb['privacy_tinymce'])):}]
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
                    <div class="checkbox text-center">
                        [{!$this->doorGets->Form['facebook']->checkbox($this->doorGets->__("S'inscrire à la newsletter"),'registerNewsletter','1','checked');}]
                    </div>
                    <div class="text-center">
                        [{!$this->doorGets->Form['facebook']->submit($this->doorGets->__("Confirmer mon inscription"),'','btn btn-lg btn-success')!}]
                    </div>
                [{!$this->doorGets->Form['facebook']->close()!}]
            </div>  
            [?]
            [??]

            [{?($this->doorGets->configWeb['oauth_google_active']):}]
            <a href="[{!BASE!}]/oauth2/google/login/" class="google-sigin"><i class="fa fa-google"></i> Google</a> 
            <div class="separateur-tb"></div>
            [?]

            [{?($this->doorGets->configWeb['oauth_facebook_active']):}]
            <a href="[{!BASE!}]/oauth2/facebook/login/" class="facebook-sigin"><i class="fa fa-facebook"></i> Facebook</a> 
            <div class="separateur-tb"></div>
            [?]

            <div>
                [{?($this->doorGets->Form['doorgets']->isSended):}]
                    <h2 class="text-center">[{!$this->doorGets->__("Merci pour votre inscription")!}] !</h2>
                    <div class="alert alert-success">
                        [{!$this->doorGets->__("S'il vous plaît cliquer sur le lien de confirmation dans l'e-mail pour compléter votre inscription et activer votre compte")!}].
                    </div>
                    <div class="separateur-tb"></div>
                [??]
                    [{!$this->doorGets->Form['doorgets']->open('post','','')!}]
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip($this->doorGets->__('Prénom'),'firstname')!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip($this->doorGets->__('Nom'),'lastname')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                    [{!$this->doorGets->Form['doorgets']->inputTooltip('<b class="glyphicon glyphicon-user"></b> '.$this->doorGets->__('Pseudo'),'login','text','','',$pseudoInfo)!}]
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['doorgets']->input('<b class="glyphicon glyphicon-envelope"></b> '.$this->doorGets->__('Adresse électronique'),'email')!}]
                    <div class="separateur-tb"></div>
                    <div class="row">
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->inputTooltip('<b class="glyphicon glyphicon-lock"></b> '.$this->doorGets->__('Mot de passe'),'password','password','','',$pwdInfo)!}]
                            <div class="separateur-tb"></div>
                        </div>
                        <div class="col-md-6">
                            [{!$this->doorGets->Form['doorgets']->input('<b class="glyphicon glyphicon-lock"></b> '.$this->doorGets->__('Confirmez votre mot de passe'),'re-password','password')!}]
                            <div class="separateur-tb"></div>
                        </div>
                    </div>
                    <div class="separateur-tb"></div>
                    [{!$this->doorGets->Form['doorgets']->select('<b class="glyphicon glyphicon-globe"></b> '.$this->doorGets->__('Votre fuseau horaire'),'horaire',$this->doorGets->getArrayForms('times_zone'),'Europe/Paris')!}]
                    <div class="separateur-tb"></div>
                    <label >[{!$this->doorGets->__("Êtes-vous un humain, ou spammeur ?")!}] </label> 
                    [{!$this->doorGets->Form['doorgets']->captcha()!}]
                    <div class="separateur-tb"></div>
                    [{?(!empty($this->doorGets->configWeb['terms_tinymce']) || !empty($this->doorGets->configWeb['cgu_tinymce']) || !empty($this->doorGets->configWeb['privacy_tinymce'])):}]
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
                    <div class="checkbox text-center">
                        [{!$this->doorGets->Form['doorgets']->checkbox($this->doorGets->__("S'inscrire à la newsletter"),'registerNewsletter','1','checked');}]
                    </div>
                    <div class="text-center">
                        [{!$this->doorGets->Form['doorgets']->submit($this->doorGets->__("S'inscrire"),'','btn btn-lg btn-success')!}]
                    </div>
                    [{!$this->doorGets->Form['doorgets']->close()!}]
                [?]
            </div>
            [?]
        [??]
            <div class="alert alert-danger text-center" role="alert">
                <b class="glyphicon glyphicon-warning-sign"></b>
                [{!$this->doorGets->__('Suite à de nombreuses tentatives de connexion sans succès vous devez patienter')!}] 
                <b>[{!$fireWallIp['time_stop']!}]</b>
                [{?($fireWallIp['time_stop'] > 1 ):}] [{!$this->doorGets->__('minutes')!}] [??] [{!$this->doorGets->__('minutes')!}] [?] !
            </div>
            <div class="alert alert-info text-center" role="alert">
                [{!$this->doorGets->__('Adresse IP')!}] : [{!$fireWallIp['adresse_ip']!}]
            </div>
        [?]

    
    </div>
</div>
<div class="text-center ">
    
    <br />
    <a href="?controller=authentification" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-user"></b> [{!$this->doorGets->__("Se connecter")!}]</a>
    [{?($countGroupes > 0):}]
    <br />
        [{?($countGroupes > 1):}]
            [{/($groupes as $id => $groupe):}]
                [{?($isActiveGroupe !== $groupe['uri']):}]
                    <a href="?controller=authentification&action=register&groupe=[{!$groupe['uri']!}]" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-star"></b> [{!$this->doorGets->__("S'inscrire en tant que")!}] [{!$groupe['title']!}]</a>
                    <br />
                [?]
            [/]
        [?]
    [?]
    <br />
    <a href="[{!URL!}][{?(count($this->doorGets->allLanguagesWebsite > 1)):}][{!'t/'.$this->doorGets->myLanguage.'/'!}][?]" class="btn btn-lg btn-link "><b class="glyphicon glyphicon-home"></b> [{!$this->doorGets->__('Accéder au site')!}]</a>
</div>
