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
        $title
        $description
        $article
        $date_creation
 */

?>
<!-- doorGets:start:modules/inbox/inbox_form -->
[{!$this->Website->getHtmlBadgeHeader()!}]
<div class="doorGets-contact-content doorGets-module-[{!$Website->getModule()!}]">

    <div class="jumbotron">
        <h2>[{!$Website->__('Formulaire de contact')!}] </h2>
        <p>[{!$Website->__('Veuillez remplir le formulaire suivant afin de me contacter');}]</p>
    </div>
    [{?($Website->form['contact_inbox']->isSended):}]
        <div class="alert alert-success">
            [{!$Website->__("Votre message a été envoyé")!}], [{!$Website->__("nous prendrons contact avec vous rapidement")!}], [{!$Website->__("merci")!}].
        </div>
        [{ $_POST = array(); }]
    [?]
    [{!$Website->form['contact_inbox']->open('post','','')!}]
        [{!$Website->form['contact_inbox']->input('','secureFormulaire','hidden',$_SESSION['idForm'])!}]
        <div class="input-group">
            [{!$Website->form['contact_inbox']->input('<span class="color-red">*</span> '.$Website->__('Nom / Entreprise').'<br />','name','text',$_name,'form-control')!}]
        </div>
        <div class="input-group">
            [{!$Website->form['contact_inbox']->input($Website->__('Téléphone').'<br />','phone','text',$_phone,'form-control')!}]
        </div>
        <div class="input-group">
            [{!$Website->form['contact_inbox']->input('<span class="color-red">*</span> '.$Website->__('E-mail pour vous répondre').'<br />','email','text',$_email,'form-control')!}]
        </div>
        <div class="input-group">
            [{!$Website->form['contact_inbox']->input('<span class="color-red">*</span> '.$Website->__('Sujet').'<br />','subject','text','','form-control')!}]
        </div>
        <div class="input-group">
            [{!$Website->form['contact_inbox']->textarea('<span class="color-red">*</span> '.$Website->__('Message').'<br />','message','','form-control')!}]
        </div>
        [{?(empty($_email)):}]
        <div class="input-group text-center" >
            <label>[{!$Website->__("Etes-vous un humain, ou spammeur")!}] ? <span class="color-red">*</span></label>
            [{!$Website->form['contact_inbox']->input('','codechallenge','hidden',$Website->_genRandomKey(50))!}]
            [{!$Website->form['contact_inbox']->captcha()!}]
        </div>
        [?]
        <div class="input-group text-center">
            [{!$Website->form['contact_inbox']->submit($Website->__('Envoyer le message'),'','btn btn-success')!}]
            <div class="pull-center"><span class="color-red">*</span> [{!$Website->__('Champ obligatoire')!}]</div>
        </div>
        
    [{!$Website->form['contact_inbox']->close()!}]
    
</div>
<!-- doorGets:end:modules/inbox/inbox_form -->