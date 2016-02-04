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
<!-- doorGets:start:widgets/newsletter -->
[{?(!empty($this->configWeb['m_newsletter']) ):}]
    <div class="doorGets-newsletter">
        [{?(!empty($this->configWeb['m_newsletter'])):}]
            [{?(!empty($form->i) && empty($form->e)):}]
                <div class="alert alert-success">
                    [{!$this->__("Votre adresse email a été ajoutée avec succès")!}].
                </div>
            [??]
                [{!$form->open('post','','',' ')!}]
                <div class="input-group">
                        [{!$form->inputt($this->__('Nom de famille').', '.$this->__('Prénom'),'nom','text','','form-control')!}]
                        [{!$form->inputt('email@domaine.com','email','text','','form-control')!}]
                        [{!$form->submit($this->__("S'inscrire à la newsletter"),'','btn btn-lg btn-primary')!}] 
                </div>
                [{!$form->close()!}]
            [?]
        [?]
    </div>
[?]
<!-- doorGets:end:widgets/newsletter -->
