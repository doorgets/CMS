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

class CrudQuery extends doorgetsFunctions{
    
    private $dbDSN;
    private $dbLogin;
    private $dbPassword;
    private $dbQuery = "";
    private $DBCache = null; 
    protected $dbpdo = null;

    public function __construct() {
        $this->dbpdo = ConnexionQuery::getInstance()->getConnexion();
    }
    
    public function __destruct() {

        
    }
    
    public function dbQuery($q) {
    
        $this->dbQuery .= $q;

    }
    
    public function dbQL($query) {
        $this->dbpdo->query($query); 
        return $query;
    
    }
    
    
    public function dbQ($query) {
        //echo $query.'<br />';
        $array_selection = array();
        $verif_req = $this->dbpdo->query($query);  
        $imax = $verif_req->columnCount();
        $ivalmax = count($verif_req);
        $y = 0;
        while ($verif_reqs = $verif_req->fetch(PDO::FETCH_ASSOC)) {
                
            for($i =0; $i < $imax; $i++) {
                    
                $meta = $verif_req->getColumnMeta($i);
                $name = $meta['name'];
                $array_selection[$y][$name]= $verif_reqs[$name];
                    
            }
            $y++;
        }
        return $array_selection;
    }
    
    
    public function dbQA($table,$limit = 'LIMIT 0,250') {
    
        $array_selection = array();
        $query="SELECT * FROM ".$table." ".$limit;
        //echo $query.'<br />';
        
        $verif_req = $this->dbpdo->query($query);   
        $imax = $verif_req->columnCount();
        $ivalmax = count($verif_req);
        $y = 0;
        while ($verif_reqs = $verif_req->fetch(PDO::FETCH_ASSOC)) {
                
            for($i =0; $i < $imax; $i++) {
                    
                $meta = $verif_req->getColumnMeta($i);
                $name = $meta['name'];
                $array_selection[$y][$name]= $verif_reqs[$name];
                
            }
            $y++;
        }
        return $array_selection;
            
    }
    
    
    public function dbQS($id,$table,$field="id",$limit = 'LIMIT 1') {
        
        $array_selection = array();
        $noCacheTables = array('_users','_users_groupes','_dg_firewall','_users_info');
        $fieldToCache = array('id','uri');
        
        $query="SELECT id FROM ".$table." WHERE ".$field." = '".$id."' ".$limit;
        $verif_req = $this->dbpdo->query($query);   

        $imax = $verif_req->columnCount();;
        while ($verif_reqs = $verif_req->fetch(PDO::FETCH_ASSOC)) {
            for($i =0; $i < $imax; $i++) {
                $meta = $verif_req->getColumnMeta($i);
                $name = $meta['name'];
                $array_selection[$name]= $verif_reqs[$name];
            }
        }

        if (empty($array_selection)) {
            return $array_selection;
        }

        $query="SELECT * FROM ".$table." WHERE id = '".$array_selection['id']."' ".$limit;
        //echo $query.'<br />';
        $verif_req = $this->dbpdo->query($query);   

        $imax = $verif_req->columnCount();;
        while ($verif_reqs = $verif_req->fetch(PDO::FETCH_ASSOC)) {
            for($i =0; $i < $imax; $i++) {
                $meta = $verif_req->getColumnMeta($i);
                $name = $meta['name'];
                $array_selection[$name]= $verif_reqs[$name];
            }
        }
        return $array_selection;

    }
    
    public function dbQI($data,$table) {
        
        $q = $this->dbVQI($data,$table);
        //echo $q.'<br />';
        $this->dbpdo->query($q);
        $id = $this->dbpdo->lastInsertId();
        
        return $id;
    }
    
    // Virtual Query Insert 
    public function dbVQI($data,$table) {
        
        $keys = ''; $values = '';
    
        foreach($data as $k=>$v) { $keys .= "`".$k.'`,'; $values .= '"'.$v.'",'; }

        $keys = substr($keys,0,-1);
        $values = substr($values,0,-1);
        
        $query = "INSERT INTO `".$table."` (".$keys.") VALUES (".$values.");";
        return $query;
    
    }
    
    
    public function dbQU($id,$data,$table,$fieldId="id",$other=' LIMIT 1 ',$equ="=") {
        
        $d = "UPDATE `".$table."` SET ";
        foreach($data as $k=>$v) { $d .= $k." = '$v', "; }
        $d = substr($d,0,-2);
        $d .= " WHERE ".$fieldId." ".$equ." '$id' $other ;";
        //echo $d.' ----- <br />'.' ----- <br />';
        $this->dbpdo->query($d);

    }
    
    public function dbQD($id,$table,$field="id",$signe="=",$limit=' LIMIT 1 ') {
    
        $d = "DELETE FROM ".$table." WHERE ".$field." ".$signe." '".$id."' $limit ";
        //echo $d;
        $this->dbpdo->query($d);
    }
}
