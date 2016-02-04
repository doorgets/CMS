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


 /*
  * Variables :
  * 
        
        $titre
        $formulaire
 */
        $labelModuleGroup  = $this->getActiveModules();

        $urlAfterAction     = urlencode(PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $urlEdition         = URL_USER.$this->_lgUrl.'?controller=modules&action=editgenform&id='.$Module['all']['id'].'&lg='.$this->getLangueTradution().'&back='.$urlAfterAction;

?>
<!-- doorGets:start:widgets/form -->
<div class="container ">
    <div class="row genform-div genform-div-[{!$uri_module!}] genform-content" >
        
        [{?($form->isSended):}]
        <div class="col-md-12 ">  
            <div class="alert alert-success">
                [{!$this->__("Votre message a été envoyé")!}], [{!$this->__("nous prendrons contact avec vous rapidement")!}], [{!$this->__("merci")!}].
            </div>
            [{ $_POST = array(); }]
        </div>
        [?]
        [{!$form->open('post')!}]
            
            [{?($this->isUser && in_array($Module['id'],$this->_User['liste_widget'])):}]
            <div class="col-md-12 ">
                <div class="btn-group btn-front-edit-[{!$uri_module!}] pull-right z-max-index">
                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                        <b  class="glyphicon glyphicon-cog"></b> [{!$this->__('Action')!}]
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="[{!$urlEdition!}]" class="navbut"><b class="glyphicon glyphicon-pencil"></b> [{!$this->__('Modifier le formulaire')!}]</a></li>
                    </ul>
                </div>
            </div>
            [?]
            [{!$form->input('','codechallenge','hidden',$this->_genRandomKey(50))!}]
            [{!$this->_formToHtml($formulaire,$form)!}]
            [{?($Module['all']['recaptcha']):}]
                <div class="col-md-12">
                    <div class="input-group" >
                        <label>[{!$this->__("Etes-vous un humain, ou spammeur")!}] ? <span class="color-red">*</span></label>
                        [{!$form->captcha()!}]
                    </div>
                </div>
            [?]
            <div class="col-md-12 text-center btn-form-send">
                [{!$form->submit($this->__("Envoyer"),'','btn btn-info')!}]
                <br />
                <span class="color-red">*</span> [{!$this->__('Champ obligatoire')!}]
            </div>
        [{!$form->close()!}]
    </div>
</div>
<script type="text/javascript">
</script>
<!-- doorGets:end:widgets/form -->
