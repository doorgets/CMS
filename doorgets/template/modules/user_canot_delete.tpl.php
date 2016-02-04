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

?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger text-center">
			[{!$this->doorGets->__("Vous n'avez pas le droit de supprimer ce contenu")!}]. 
		</div>
		<div class="text-center">
            [{?(isset($moduleInfos)):}]
			<a class="btn btn-default" href="?controller=module[{!$moduleInfos['type']!}]&uri=[{!$this->doorGets->Uri!}]"><i class="fa fa-undo fa-lg green-c"></i> [{!$this->doorGets->__("Retour")!}]</a>
		    [?]
        </div>		
	</div>
</div>
