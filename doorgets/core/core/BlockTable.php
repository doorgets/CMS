<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
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


class BlockTable{
    
    public $Table = array();
    public $tableTitle = array();
    public $cLigne = 0;
    public $cColonne = 0;
    public $classCss = '';
    
    public function getHtml() {
        
        return $this->getTableTop().$this->getTableContent();
    }
    
    public function setClassCss($name) {
        $this->classCss .= $name.' ';
    }
    
    public function addTitle($label,$name,$classCss='Oui')
    {
        
        $this->Table[$name]['label'] = $label;
        $this->Table[$name]['content'] = array();
        $this->Table[$name]['cssTitle'] = $classCss;

        $this->tableTitle[$name] = $label;
        $this->cColonne++;
    }
    
    public function addContent($titleName,$content,$classCss="")
    {
        
        if (array_key_exists($titleName,$this->Table))
        {
            $this->Table[$titleName]['content'][] = $content;
            $this->Table[$titleName]['cssContent'][] = $classCss;
        }
        
        $this->cLigne = count($this->Table[$titleName]['content']);
    
    }
    
    public function getTable() {
        
    }
    
    public function getTableTop() {
        
        $out = '<div class="table-responsive"><table class="table table-hover table-striped '.$this->classCss.' ">';
        $i = 0;
        foreach($this->tableTitle as $name=> $label) {
            
            $cssTitle = $this->Table[$name]['cssTitle'];
            if (!empty($cssTitle)) {
                $cssTitle = ' class="'.$cssTitle.'" ';
            }
            
            if ($i === 0) { $out .= "\n\t".'<thead><tr>'."\n";  }
            $out .= "\t\t".'<th  '.$cssTitle.'>'.$label.'</th>'."\n";
            if ($i === ($this->cColonne - 1)) { $out .= "\n\t".'</tr></thead>'."\n"; }
            $i++;
        }
        return $out;
        
        
    }
    
    public function getTableContent() {
        
        $out = '';
        $iTr = 0;
        if ($this->cLigne > 0) {
            
            for($z=0;$z < $this->cLigne;$z++) {
                
                $iTd = 0;
                if (!empty($this->tableTitle)) {
                    
                    foreach($this->tableTitle as $name=> $label) {
                        
                        if (
                            array_key_exists($z, $this->Table[$name]['cssContent']) && 
                            array_key_exists($z, $this->Table[$name]['content'])
                        ) {
                            $cssContentTr = ' class=" tr-pair" ';
                            
                            if ($iTr&1)
                            { $cssContentTr = ' class=" tr-impair" '; }
                            
                            if ($iTr === 0 && $iTd === 0)
                            { $out .= "\t".'<tr '.$cssContentTr.' >'."\n"; }
                            elseif ($iTd === 0)
                            { $out .= "\t".'</tr>'."\n\t".'<tr '.$cssContentTr.' >'."\n"; }

                            $cssContent = $this->Table[$name]['cssContent'][$z];
                            if ($iTr&1)
                            { $cssContent = ' class="'.$cssContent.' td-impair" '; }
                            else{ $cssContent = ' class="'.$cssContent.' td-pair" '; }

                            $content = $this->Table[$name]['content'][$z];
                            $out .= "\t\t".'<td '.$cssContent.' >'.$content.'</td>'."\n";

                            $iTd++;
                        }  
                    }
                    
                    if ($iTr === ($this->cLigne - 1)) { $out .= "\t".'</tr>'."\n".'</table></div>'."\n"; }
                    $iTr++;                
                }
                
            }            
        }

        return $out;
        
        
    }
    
}
