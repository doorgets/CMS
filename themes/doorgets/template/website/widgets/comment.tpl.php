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
        $form
        
 */
 
?>
<!-- doorGets:start:widgets/comment -->
[{?(!empty($this->configWeb['m_comment'])):}]
    <div class="doorGets-comment doorGets-comment-[{!$this->type!}]">
        
        [{?(!empty($this->configWeb['m_comment'])):}]
            
            [{?(!empty($form->i) && empty($form->e)):}]
                [{?($hasUser):}]
                    <div class="alert alert-success">
                        [{!$this->__("Votre commentaire est en ligne")!}]. [{!$this->__("Merci")!}]
                    </div>
                    [{ $_POST = array(); }]
                [??]
                    <div class="alert alert-success">
                        [{!$this->__("Votre commentaire est en cours de modération")!}]. [{!$this->__("Merci")!}]
                    </div>
                    [{ $_POST = array(); }]
                [?]
            [?]
            [{!$form->open('post','','')!}]
            [{!$form->input('','secureFormulaire','hidden',$_SESSION['idForm'])!}]
            <div class="row">
                <div class="col-md-2 text-center">
                    [{!$form->input('','stars','hidden','','form-control rating')!}]
                    <br />
                    <span class="int-stars">0</span> 
                    <span class="int-stars-one" >[{!$this->__("étoile")!}]</span>
                    <span class="int-stars-more" style="display:none;">[{!$this->__("étoiles")!}]</span>
                </div>
                [{?($hasUser):}]
                <div class="col-md-10">
                    <p><img class="avatar-comment" src="[{!URL.'data/users/'.$this->_User['avatar']!}]"</p>
                    [{!$this->_User['pseudo']!}]
                </div>
                [??]
                <div class="col-md-5">
                    [{!$form->inputt($this->__('Prénom').', '.$this->__('Nom'),'name','text','','form-control')!}]
                </div>
                <div class="col-md-5">
                    [{!$form->inputt('email@domaine.com','email','text','','form-control')!}]
                </div>
                [?]
            </div>

            <div class="row">
                <div class="col-md-12">
                    [{!$form->textarea('','comment','','form-control','',$this->__('Votre commentaire').'...')!}]
                </div>
            </div>
            [{?(!$hasUser):}]
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group text-center" >
                        <label>[{!$this->__("Etes-vous un humain, ou spammeur")!}] ? <span class="color-red">*</span></label>
                        [{!$form->input('','codechallenge','hidden',$this->_genRandomKey(50))!}]
                        [{!$form->captcha()!}]
                    </div>
                </div>
            </div>
            [?]
            <div class="row">
                <div class="col-md-12 text-center btn-form-comment">
                    [{!$form->submit($this->__("Envoyer"),'','btn btn-info btn-lg')!}]
                </div>
            </div>
            [{!$form->close()!}]
            
        [?]
    </div>
[?]
<!-- doorGets:end:widgets/comment -->
