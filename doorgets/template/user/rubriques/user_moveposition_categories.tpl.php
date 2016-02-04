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
<div [{?(!empty($class)):}] class="[{!$class!}]" [?]>
    [{?($type==='up'):}]
    
        [{!$this->Form['_position_up']->open()!}]
        
        [{!$this->Form['_position_up']->input('','id','hidden',$id)!}]
        [{!$this->Form['_position_up']->input('','position','hidden',$pos)!}]
        [{!$this->Form['_position_up']->input('','type','hidden',$type)!}]
        [{!$this->Form['_position_up']->input('','id_parent','hidden',$id_parent)!}]
    
        [{!$this->Form['_position_up']->submit('',"","bt-move-up")!}]
        [{!$this->Form['_position_up']->close()!}]
        
    [??]
    
        [{!$this->Form['_position_down']->open()!}]
        
        [{!$this->Form['_position_down']->input('','id','hidden',$id)!}]
        [{!$this->Form['_position_down']->input('','position','hidden',$pos)!}]
        [{!$this->Form['_position_down']->input('','type','hidden',$type)!}]
        [{!$this->Form['_position_down']->input('','id_parent','hidden',$id_parent)!}]
        
        [{!$this->Form['_position_down']->submit('',"","bt-move-down")!}]
        [{!$this->Form['_position_down']->close()!}]
        
    [?]
</div>
