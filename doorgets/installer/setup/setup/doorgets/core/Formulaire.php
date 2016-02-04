<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
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


class Formulaire{
    
    public $name;
    public $i = array();
    public $e = array();
    public $info = array();
    public $isSended;
    
    public function __construct($name) {
        $this->isSended = false;
        $this->name = $name;
        $this->view($name);
    }
    
    public function open($method="post",$action="",$enctype = 'enctype="multipart/form-data"') {
        
        $name = $this->name;
        if (empty($action)) { $action = $_SERVER['REQUEST_URI']; }
        return '<form '.$enctype.' id="'.$name.'" name="'.$name.'" method="'.$method.'" action="'.$action.'">';
    }
    
    public function close() {
        
        return '</form>';
    
    }
    
    public function submit($value,$style="",$class="") {
        
        $name = $this->name.'_submit';
        return '<input type="submit" id="'.$name.'" name="'.$name.'" value="'.$value.'" style="'.$style.'" class="'.$class.'" >';
    }
    
    public function input($label,$name,$type="text",$value="",$class="") {
        
        $input = '';
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if (isset($_POST[$name])) {
            $value = $_POST[$name];
            if (!empty($this->e[$name])) {
                
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style="border:solid 2px #ff0000;"';
                $value = $valueTemp;
            }
        }

        if ($type !== 'hidden' && !empty($label)) {
            $input .= "\r\n\t\t<label $styleLabel >$label</label>";
        }
        
        $input .= '<input autocomplete="off" maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.$value.'" class="'.$class.'" '.$style.' >';
        return $input;
        
    }
    
    public function inputt($label,$name,$type="text",$value="",$class="") {
        
        $input = '';
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        if (isset($_POST[$name])) {
            $value = $_POST[$name];
            if (!empty($this->e[$name])) {
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style="border:solid 2px #ff0000;"';
                $value = $valueTemp;
            }
        }
        
        $input .= '<input autocomplete="off" maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" value="'.$value.'" class="'.$class.'" '.$style.' >';
        return $input;
        
    }
    
    public function inputtr($label,$name,$type="text",$value="",$class="") {
        
        $input = '';
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        if (isset($_POST[$name])) {
            $value = $_POST[$name];
            if (!empty($this->e[$name])) {
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style="border:solid 2px #ff0000;"';
                $value = $valueTemp;
            }
        }
        
        $input .= '<input maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" required value="'.$value.'" class="'.$class.'" '.$style.' >';
        return $input;
        
    }
    
    public function file($label,$name) {
        
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        if (isset($_FILES[$name])) {
            
            if (!empty($this->e[$name])) {
                
                $styleLabel = ' style="color:#ff0000;" ';
                $style= ' style="border: solid 2px #ff0000;" ';
                
            }
        }
        
        $input = "<label $styleLabel >$label</label>";
        $input .= '<input type="file" id="'.$name.'" name="'.$name.'"  '.$style.' >';
        
        return $input;
        
    }
    
    public function textarea($label,$name,$value="",$class="",$style='') {
        
        $rest = substr($name, -8);
        $restHtml = substr($name, -5); 
        if (( $rest === '_tinymce' || $restHtml === '_html' ) && !empty($this->i)) {
            
            $value = $value ;
            
        }
        

        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if (isset($_POST[$name])) {
            $value = $_POST[$name];
            if (!empty($this->e[$name])) {
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style=" border:solid 2px #ff0000; "';
                $value = $valueTemp;
            }
        }
        
        
        $textarea = '';
        if (!empty($label)) {
            $textarea = '<label '.$styleLabel.' >'.$label.'</label>';
        }
        $textarea .= '<textarea id="'.$name.'" name="'.$name.'" class="'.$class.'" '.$style.' >'.$value.'</textarea>';
        
        
        return $textarea;
    }
    
    public function select($label,$name,$option = array(),$value="") {
        
        
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        $obli = '';
        
        $formName = $this->name;
        
        if (isset($_POST[$name])) {
            $value = trim(htmlentities($_POST[$name],ENT_QUOTES));
            if (!empty($this->e[$name])) {
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style="border:solid 2px #ff0000;"';
                $value = $valueTemp;
            }
        }
        
        
        $select = "<label $styleLabel >$label</label>";
        
        $select .= "\n\r";
        $select .= '<select name="'.$name.'" id="'.$name.'" '.$style.' >';
        $select .= "\n\r";
        
        if (is_array($option) && !empty($option))
        {
            foreach($option as $k=>$v) {
                
                
                $select .="\t".'<option ';
                
                if (!empty($value)) {
                    
                    if (strtolower($value) === strtolower($k)) { 
                        $select .=" selected=\"selected\" "; 
                    }
                }
                $select .=" value=\"$k\" >$v</option>";
               
            }
        }
        $select .='</select>';
        
        
        return $select;
        
    }
    
    
    public function checkbox($label,$name,$value,$checked="") {
        
        $name = $this->name.'_'.$name;
        
        if (
           !empty($checked) || isset($_POST[$name])
       ) { $checked = ' checked="checked" ';}
        
        $style = '';
        $styleLabel = '';
        $obli = '';
        $formName = $this->name;
        
        
        if (!empty($this->e[$name])) {
            $styleLabel = 'style="color:#ff0000;"';
            $style = 'style="border:solid 1px #ff0000;padding:2px;text-align:left;"';
        }
        
        $checkbox = '<label '.$styleLabel.' for="'.$name.'" >';
        $checkbox .= '<input type="checkbox" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$checked.' ><span class="in-check"></span>';
        $checkbox .= ''.$label.'</label>';
        return $checkbox;
        
    }
    
    public function radio($label,$name,$value,$checked="") {
        
        $name = $this->name.'_'.$name;
        
        if (
           (isset($_POST[$name]) && $_POST[$name] === $value)
           || (!empty($checked) && $checked === $value)
       ) {
            $checked = ' checked="checked" ';
        }
        
        $style = '';
        $styleLabel = '';
        $obli = '';
        $formName = $this->name;
        
        
        if (!empty($this->e[$name])) {
            $styleLabel = 'style="color:#ff0000;"';
            $style = 'style="border:solid 1px #ff0000;padding:2px;text-align:left;"';
        }
        
        
        $checkbox = '<input type="radio" name="'.$name.'"  id="'.$name.'_'.$value.'"  value="'.$value.'" '.$checked.' >';
        $checkbox .= '<label '.$styleLabel.' for="'.$name.'_'.$value.'" >'.$label.'</label>';
        return $checkbox;
        
    }
    
    public function view($nameForm) {
        
        $name = $nameForm;
        $isView = null;
        if (!empty($_POST)) {
            
            // $_POST checking
            foreach($_POST as $k=>$v) {
                
                $_POST[$k] = filter_input(INPUT_POST, $k, FILTER_SANITIZE_STRING) ;
                
            }
            
            // onclic submit form
            if (isset($_POST[$nameForm.'_submit'])) {
                
                unset($_POST[$nameForm.'_submit']);
                
                foreach($_POST as $k=>$v) {
                    
                    
                    $k = str_replace($nameForm.'_','',$k);
                    $this->i[$k] = $v;
                    
                }
            }
        }
    }
    

}
