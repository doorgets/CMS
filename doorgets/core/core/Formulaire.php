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


class Formulaire{
    
    public $name;
    public $i = array();
    public $e = array();
    public $info = array();
    public $isSended;
    public $_token;

    public function __construct($name) {

        
        $this->isSended = false;
        $this->name = $name;
        $this->_token = $this->genToken();
        $this->view($name);

    }
    

    public function open($method="post",$action="",$enctype = 'enctype="multipart/form-data"',$class='',$withToken = true) {
        
        $name = $this->name;

        if (empty($action)) { $action = $_SERVER['REQUEST_URI']; }
        $out = '<form '.$enctype.' id="'.$name.'" name="'.$name.'" method="'.$method.'" class="'.$class.'" action="'.$action.'" role="form">';
        if ($withToken) {
            $out .= '<input type="hidden" name="'.$name.'_token" value="'.$this->_token.'">';
        }

        return $out;

    }
    
    public function close() {
        
        return '</form>';
    
    }
    
    public function captcha() {
        
        $style = '';
        $styleLabel = '';
        if (array_key_exists('result_captcha',$this->e)) {
            $styleLabel = 'style="color:#ff0000;"';
            $style = 'style="border:solid 2px #ff0000;"';
        }
        
        $out = '<input id="captcha_num1" class="sum" type="text" name="captcha_num1" value="'.rand(1,4).'" readonly="readonly" /> +';
        $out .= '<input id="captcha_num2" class="sum" type="text" name="captcha_num2" value="'.rand(5,9).'" readonly="readonly" /> =';
        $out .= '<input id="captcha_result" class="captcha" '.$style.' type="text" name="captcha_result" maxlength="2" />';
        
        return $out;
    }
    
    public function submit($value,$style="",$class="") {
        
        
        if (empty($class))
        {
            $class = "btn btn-primary btn-lg";
        }
        
        $name = $this->name.'_submit';
        return '<input type="submit" id="'.$name.'" name="'.$name.'" value="'.$value.'" style="'.$style.'" class=" '.$class.'" >';
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
            $input .= "<label for=\"$name\" $styleLabel >$label</label>";
        }
        $value = Convertag::in($value);
        if ($type === 'hidden') {
            $input .= '<input maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'"   value="'.$value.'" class=" '.$class.'" '.$style.' >';
        }else{
            $input .= '<div class="input-group " ><input autocomplete="off" maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'"   value="'.$value.'" class="form-control '.$class.'" '.$style.' ></div>';
           
        }
        return $input;
        
    }

    public function inputTags($label,$name,$value="",$class="") {
        
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

        $input .= "<label for=\"$name\" $styleLabel >$label</label>";
        
        $valArray = explode( ',', $value);
        foreach ($valArray as $key => $tag) {
            $tag = trim($tag);
            if (empty($tag)) {
                unset($valArray[$key]);
            } else {
                $valArray[$key] = $tag;
            }
        }
        $cVal = count($valArray);
        $input .= '<div id="input-tags-'.$name.'" class="input-tags-block">';
        if ($cVal > 0) {
            foreach ($valArray as $tag) {
                $input .= '<span class="input-tags-field">'.$tag.' <i class="fa fa-remove red-c remove-tag-btn "></i></span>';
            }
        }
        $input .= '</div>';
        $input .= '<div class="input-group " ><input autocomplete="off" maxlength="70" size="50" type="text" id="'.$name.'-tags"  value="" class="form-control input-add-tags '.$class.'" '.$style.' ></div>';
        $input .= '<div class="input-group " ><input autocomplete="off" maxlength="70" size="50" type="hidden" id="'.$name.'" name="'.$name.'"   value="'.$value.'" class="form-control '.$class.'" '.$style.' ></div>';
        return $input;
        
    }

    public function inputTooltip($label,$name,$type="text",$value="",$class="",$tooltip="",$position="left") {

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
        $value = Convertag::in($value);
        if ($type === 'hidden') {
            $input .= '<input maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'"   value="'.$value.'" class=" '.$class.'" '.$style.' >';
        }else{

            $msgTooltip = (empty($tooltip)) ? '': ' title="'.$tooltip.'" ';

            $input .= '<div class="input-group " ><input data-toggle="tooltip" data-placement="'.$position.'" '.$msgTooltip.' autocomplete="off" maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'"   value="'.$value.'" class="form-control '.$class.'" '.$style.' ></div>';
           
        }
        return $input;
    }

    public function inputAddon($label,$name,$type="text",$value="",$class="") {
        
        return $this->input($label,$name,$type,$value,$class);
        
        // $input = '';
        // $valueTemp = $value;
        // $name = $this->name.'_'.$name;
        // $style = '';
        // $styleLabel = '';
        
        // if (isset($_POST[$name])) {
        //     $value = $_POST[$name];
        //     if (!empty($this->e[$name])) {
                
        //         $styleLabel = 'style="color:#ff0000;"';
        //         $style = 'style="border:solid 2px #ff0000;"';
        //         $value = $valueTemp;
        //     }
        // }

        // $value = Convertag::in($value);
        // $input = '<div class="input-group ">';
        // if ($type != 'hidden') {
        //     $input .= '<div class="input-group-addon">'.$label.'</div>';
        // }
        
        // $input .= '<input maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'"   value="'.$value.'" class="form-control '.$class.'" '.$style.' >';
        // $input .= '</div>';
          
        // return $input;
        
    }
    
    public function input_crypt($label,$name,$value="",$class="") {
        
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

        if (!empty($label)) {
            $input .= "\r\n\t\t<label $styleLabel >$label</label>";
        }

        $value = Convertag::in($value);
           
        $input .= '<div class="input-group ">';
        $input .= '<input maxlength="220" type="text" id="'.$name.'_crypt" name="'.$name.'_crypt"   value="'.$value.'" class="form-control input-crypt '.$class.'" '.$style.' >';
        $input .= '<input maxlength="220" type="hidden" id="'.$name.'" name="'.$name.'" >';
        $input .= '</div>';

        return $input;
        
    }
    
    public function inputt($label,$name,$type="text",$value="",$class="") {
        
        $input = '';
        $valueTemp = $value;
        if (!empty($this->name)) {
            $name = $this->name.'_'.$name;
        }
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
        
        $value = Convertag::in($value);
        $input .= '<input maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" required="required" value="'.$value.'" class="'.$class.'" '.$style.' >';
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
        
        $value = Convertag::in($value);
        $input .= '<input maxlength="220" type="'.$type.'" id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" required value="'.$value.'" class="'.$class.'" '.$style.' >';
        return $input;
        
    }
    
    public function file($label,$name,$class="") {
        
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if (!empty($this->e[$name])) {
            
            $styleLabel = ' style="color:#ff0000;" ';
            $style= ' style="border: solid 2px #ff0000;" ';
            
        }
        $input = (!empty($label)) ? "<label $styleLabel >$label</label>" : '';

        $input .= '<input type="file" id="'.$name.'" name="'.$name.'"  '.$style.' class="'.$class.'" >';
        
        
        return $input;
        
    }

    public function fileAjax($label,$name,$value="") {
        
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if (!empty($this->e[$name])) {
            
            $styleLabel = ' style="color:#ff0000;" ';
            $style= ' style="border: solid 2px #ff0000;" ';
            
        }
        $input = '<div class="upload-recepetion-'.$name.'" style="display:block;margin-bottom:20px;width:180px;" ></div>';
        $input .= (!empty($label)) ? '<label id="label-upload-recepetion-'.$name.'"' ." $styleLabel >$label</label>" : '';
        $input .= '<span id="span-upload-recepetion-'.$name.'"></span>';
        $input .= '<input type="file" id="'.$name.'" name="'.$name.'"  '.$style.' >';
        $input .= '<input type="hidden" id="'.$name.'" name="'.$name.'" class="'.$name.'" '.$style.' value="'.$value.'" >';
        
        
        return $input;
        
    }

    public function fileDownloadAjax($label,$name,$value="") {
        
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if (!empty($this->e[$name])) {
            
            $styleLabel = ' style="color:#ff0000;" ';
            $style= ' style="border: solid 2px #ff0000;" ';
            
        }
        $input = '<div class="upload-recepetion-'.$name.'" style="display:block;margin-bottom:20px;width:100%;" ></div>';
        $input .= (!empty($label)) ? '<label id="label-upload-recepetion-'.$name.'"' ." $styleLabel >$label</label>" : '';
        $input .= '<span id="span-upload-recepetion-'.$name.'"></span>';
        $input .= '<input type="file" id="'.$name.'" name="'.$name.'"  '.$style.' >';
        $input .= '<input type="hidden" id="'.$name.'" name="'.$name.'" class="'.$name.'" '.$style.' value="'.$value.'" >';
        
        
        return $input;
        
    }
    
    public function multiFileAjax($label,$name,$class="",$value="") {
        
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if (!empty($this->e[$name])) {
            
            $styleLabel = ' style="color:#ff0000;" ';
            $style= ' style="border: solid 2px #ff0000;" ';
            
        }

        $input = '<div class="upload-recepetion-'.$name.' row"  ></div>';
        $input .= '<div class="separateur-tb"></div>';
        $input .= '<div class="alert alert-success">';
        $input .= (!empty($label)) ? '<label id="label-upload-recepetion-'.$name.'"' ." $styleLabel >$label</label>" : '';

        $input .= '<span id="span-upload-recepetion-'.$name.' " ></span>';
        $input .= '<input type="file" id="'.$name.'" name="'.$name.'"  '.$style.' class="'.$class.' multi-file-ajax" >';
        $input .= '<input type="hidden" id="'.$name.'" name="'.$name.'"  value="'.$value.'" >';
        $input .= '</div >';
        
        return $input;
        
    }

    public function textarea($label,$name,$value="",$class="",$style='',$placeholder = '') {
        
        $rest = substr($name, -8);
        $restHtml = substr($name, -5); 
        if (( $rest === '_tinymce' || $restHtml === '_html' ) && !empty($this->i)) {
            
            $value = $value ;
            
        }
        if ($rest !== '_tinymce' && $restHtml !== '_html' && $restHtml !== '_nofi') {
            $value = Convertag::in($value);
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
        $placeholder = (!empty($placeholder))?' placeholder="'.$placeholder.'" ':'';
        $textarea .= '<textarea id="'.$name.'" name="'.$name.'" '.$placeholder.' class="input-control '.$class.'" '.$style.' >'.$value.'</textarea>';
        
        
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
        $select = '';
        if (!empty($label)) {
            $select .= "<label $styleLabel >$label</label>";
        }
        $select .= "";
        $select .= '<select class="form-control select2-select"  name="'.$name.'" id="'.$name.'" '.$style.' >';
        $select .= "";
        
        if (is_array($option) && !empty($option))
        {
            foreach($option as $k=>$v) {
                
                
                $select .="\t".'<option ';
                
                if (true) {
                    
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
    
    public function date($label='',$name='',$date = 0,$lg='fr') {
        
        $out = '';
        
        if (empty($date) || !is_numeric($date)) { $date = time(); }
        
        $jour   = date("j",$date);
        $mois   = date("n",$date);
        $annee  = date("Y",$date);
        $heure  = date("H",$date);
        $minute  = date("i",$date);
        
        $iJour = array();
        for($i=1;$i<=31;$i++) {
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iJour[$i] = $z.$i;
            
        }
        
        $iMois = array();
        for($i=1;$i<=12;$i++) { 
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iMois[$i] = $z.$i;
            
        }
        $years = date("Y",time());
        $yearsTo = $years + 10;
        $iAnnee = array();
        for($i=$years;$i<=$yearsTo;$i++) {
            
            $iAnnee[$i] = $i;
            
        }
        
        $iHeure = array();
        for($i=0;$i<=23;$i++) { 
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iHeure[$i] = $z.$i;
            
        }
        
        $iMinute = array();
        for($i=0;$i<=59;$i++) { 
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iMinute[$i] = $z.$i;
            
        }
        
        $out .= '<label>'.$label.'</label>';
        if ($lg == 'fr') {
            
            $out .= $this->select('Jour :'.'',$name.'_jour',$iJour,$jour);
            $out .= $this->select('Mois :'.'',$name.'_mois',$iMois,$mois);
            $out .= $this->select('Année :'.'',$name.'_annee',$iAnnee,$annee);
            $out .= $this->select('<br />Heure :'.'',$name.'_heure',$iHeure,$heure);
            $out .= $this->select('Minute :'.'',$name.'_minute',$iMinute,$minute);
            
        }else{
            
            $out .= $this->select('DD :'.'',$name.'_mois',$iMois,$mois);
            $out .= $this->select('MM :'.'',$name.'_jour',$iJour,$jour);
            $out .= $this->select('YYYY :'.'',$name.'_annee',$iAnnee,$annee);
            $out .= $this->select('<br />HH :'.'',$name.'_heure',$iHeure,$heure);
            $out .= $this->select('MM :'.'',$name.'_minute',$iMinute,$minute);
            
        }
        
        
        return $out;
        
    }
    
    public function birthday($label='',$name='',$date = 0,$lg='fr') {
        
        $out = '';
        $isStart = false;
        if (empty($date) || !is_numeric($date)) {
            $date = time() - ( 60 * 60 * 24 * 365 * 100); $isStart = true;
        }
        
        $langue = new Langue($lg);
        
        if ($isStart) {
            $jour   = 0;
            $mois   = 0;
            $annee  = 0;            
        }else{
            $jour   = date("j",$date);
            $mois   = date("n",$date);
            $annee  = date("Y",$date);            
        }

        $iJour = array('--');
        for($i=1;$i<=31;$i++) {
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iJour[$i] = $z.$i;
            
        }
        
        $iMois = array('--');
        for($i=1;$i<=12;$i++) { 
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iMois[$i] = $z.$i;
            
        }
        $years = date("Y",time());
        $yearsTo = $years - 90;
        
        $iAnnee = array('--');
        for($i=$years;$i>=$yearsTo;$i--) {
            
            $iAnnee[$i] = $i;
            
        }
        
        $iHeure = array();
        for($i=0;$i<=23;$i++) { 
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iHeure[$i] = $z.$i;
            
        }
        
        $iMinute = array();
        for($i=0;$i<=59;$i++) { 
            
            $z = '';
            if ($i<10) { $z='0'; }
            $iMinute[$i] = $z.$i;
            
        }
        
        $out .= '<label>'.$label.'</label><br />';
        if ($lg == 'fr') {
            
            $out .= $this->select(' '.$langue->l('Jour').' : ',$name.'_jour',$iJour,$jour);
            $out .= $this->select(' '.$langue->l('Mois').' : '.'',$name.'_mois',$iMois,$mois);
            $out .= $this->select(' '.$langue->l('Année').' : '.'',$name.'_annee',$iAnnee,$annee);
            
        }else{
            
            $out .= $this->select(' '.$langue->l('Mois').' : '.'',$name.'_mois',$iMois,$mois);
            $out .= $this->select(' '.$langue->l('Jour').' : '.'',$name.'_jour',$iJour,$jour);
            $out .= $this->select(' '.$langue->l('Année').' : '.'',$name.'_annee',$iAnnee,$annee);
            
        }
        
        return $out;
        
    } 
    
    public function checkbox($label,$name,$value,$checked="",$class="") {
        
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
        
        $checkbox = '<label '.$styleLabel.' for="'.$name.'" class=" checkbox '.$class.'">';
        $checkbox .= '<input type="checkbox" name="'.$name.'" id="'.$name.'" value="'.$value.'"  '.$checked.' ><span class="in-check"></span>';
        $checkbox .= ''.$label.'</label>';
        return $checkbox;
        
    }
    
    public function radio($label,$name,$value,$checked="",$class="") {
        
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
        
        $radioBox = '<label '.$styleLabel.' for="'.$name.'_'.$value.'"  class="'.$class.'" >';
        $radioBox .= '<input type="radio" name="'.$name.'" id="'.$name.'_'.$value.'" value="'.$value.'" '.$checked.' >';
        $radioBox .= ' '.$label.'</label>';
        return $radioBox;
        
    }
    
    
    
    public function view($nameForm) {
        
        $name = $nameForm;
        $isView = null;
        if (!empty($_POST)) {
            // captcha verification
            if (
                array_key_exists('captcha_num1',$_POST)
                && array_key_exists('captcha_num2',$_POST)
                && array_key_exists('captcha_result',$_POST)
           ) {
                if ((int)$_POST['captcha_num1'] + (int)$_POST['captcha_num2'] !== (int)$_POST['captcha_result']) {
                    $this->e['result_captcha'] = 'ok';
                }
                
            }
            
            // test token validation
            if (!$this->isToken()) { 
              $this->e[$this->name.'_token'] = 'ok'; 
            }else{
              unset($_POST[$this->name.'_token']);
            }
          

            // $_POST checking
            foreach($_POST as $k=>$v) {
                
                $rest = substr($k, -8);
                $restHtml = substr($k, -5);
                if ($rest !== '_tinymce' && $restHtml !== '_html' && $restHtml !== '_nofi') {
                    if (!is_array($v)) {
                        $_POST[$k] = filter_input(INPUT_POST, $k, FILTER_SANITIZE_STRING) ;
                    }
                }
            }
            
            $HTMLPurifierService = new HTMLPurifierService();
            
            // onclic submit form
            if (isset($_POST[$nameForm.'_submit'])) {
                
                unset($_POST[$nameForm.'_submit']);
                
                foreach($_POST as $k=>$v) {
                    $_k = $k;
                    $rest = substr($k, -8);
                    $restHtml = substr($k, -5);
                    $k = str_replace($nameForm.'_','',$k);
                    
                    if ($restHtml !== '_nofi') {
                        
                        if ($rest === '_tinymce' || $restHtml === '_html') {
                            
                            if (!empty($this->i) && empty($this->e)) {
                                
                                
                                $_POST[$_k] = stripcslashes($_POST[$_k]);
                                $replace = array(
                                    '</textarea','&lt;/textarea','%3c/textarea','&#60;/textarea',
                                    '<body','&lt;body','%3c/body','&#60;/body',
                                );
                                $replaceNext = array(
                                    'scr=""'
                                );
                                $v = str_replace($replace,'',$_POST[$_k]);
                                $v = str_replace('scr=""','scr=',$_POST[$_k]);
                                $v = str_replace('scr=""','scr=',$_POST[$_k]);
                                
                                $this->i[$k] = htmlentities($HTMLPurifierService->purify($v),ENT_QUOTES);
                            }
                            
                        }else{
                            
                            $this->i[$k] = Convertag::get($v);
                            
                        }          

                    } else {
                        $_POST[$_k] = stripcslashes($_POST[$_k]);
                    }
                }
            }
            
            // reset captcha
            if (
                array_key_exists('captcha_num1',$_POST)
                && array_key_exists('captcha_num2',$_POST)
                && array_key_exists('captcha_result',$_POST)
                && empty($this->e['result_captcha'])
           ) {
                
                unset($_POST['captcha_num1']);
                unset($_POST['captcha_num2']);
                unset($_POST['captcha_result']);
                
            }
        }
    }
    
    public function genToken() {
        
        if (
            array_key_exists('doorGetsForms', $_SESSION) 
            && array_key_exists($this->name, $_SESSION['doorGetsForms']) 
            && array_key_exists($this->name.'_token', $_SESSION['doorGetsForms'][$this->name]) 
            && empty($this->e) 
       ) {
            return $_SESSION['doorGetsForms'][$this->name][$this->name.'_token'];
        }

        /* return $_SESSION['doorGetsForms'][$this->name.'_token'] = uniqid(rand(), true); */
        
        $token = uniqid(rand(), true);

        if (
            array_key_exists('doorGetsForms', $_SESSION)
            && array_key_exists($this->name, $_SESSION['doorGetsForms']) 
       ) {
            unset($_SESSION['doorGetsForms'][$this->name]);
        }
        
        $_SESSION['doorGetsForms'][$this->name][$this->name.'_token'] = $token;

        return $_SESSION['doorGetsForms'][$this->name][$this->name.'_token'];

    }

    public function isToken() {

        if (
            array_key_exists('doorGetsForms', $_SESSION)
            && array_key_exists($this->name, $_SESSION['doorGetsForms']) 
            && array_key_exists($this->name.'_token', $_SESSION['doorGetsForms'][$this->name])
            && array_key_exists($this->name.'_token',$_POST)
       ) {

            if ($_SESSION['doorGetsForms'][$this->name][$this->name.'_token'] == $_POST[$this->name.'_token']) {
              
                if (!empty($this->e)) {

                    unset($_SESSION['doorGetsForms'][$this->name]);
                    unset($_POST[$this->name.'_token']);

                }

                return true;
            }
        }

        return false;
    }

}
