<?php if (!defined(DOORGETS)) { header('Location:../'); exit(); }

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 31, August 2015
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
                <div class="alert alert-success">
                    [{!$this->__("Votre commentaire est en cours de modération")!}]. [{!$this->__("Merci")!}]
                </div>
                [{ $_POST = array(); }]
                
            [?]
            
            [{!$form->open('post','','')!}]
            [{!$form->input('','secureFormulaire','hidden',$_SESSION['idForm'])!}]
            <div class="row">
                <div class="col-md-6">
                    [{!$form->inputt($this->__('Prénom').', '.$this->__('Nom'),'name','text','','form-control')!}]
                </div>
                <div class="col-md-6">
                    [{!$form->inputt('email@domaine.com','email','text','','form-control')!}]
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    [{!$form->textarea($this->__('Commentaire').'<br />','comment','','form-control')!}]
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    [{!$form->submit($this->__("Envoyer"),'','btn btn-info')!}]
                </div>
            </div>
            [{!$form->close()!}]
            
        [?]
    </div>
[?]
<!-- doorGets:end:widgets/comment -->
