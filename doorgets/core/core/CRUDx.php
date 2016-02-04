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


class CRUDx {
    
    private $dbDSN;
    private $dbLogin;
    private $dbPassword;
    private $dbQuery = "";
    public $dbpdo = null;
    
    public function __construct($host,$dbName,$login,$password) {
	
    	$this->dbDSN 		=   "mysql:host=".$host.";dbname=".$dbName;
    	$this->dbLogin 		=   $login;
    	$this->dbPassword 	=   $password;
    	
    	try
    	{
    	    
    	    $this->dbpdo = new PDO($this->dbDSN,$this->dbLogin,$this->dbPassword);
    	}
    	catch(PDOException $e)
    	{
    	    
    	    exit();
    	}
    	$this->dbpdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    	$this->dbpdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    	$this->dbpdo->beginTransaction();
	
	
    }
    
    public function __destruct() {
	
    	if (!empty($this->dbQuery)) {
    	    $this->dbpdo->query($this->dbQuery);
    	}
    	if (!empty($this->dbpdo)) {
    	    $this->dbpdo->commit();
    	}
    	$this->dbpdo = null;
	
    }
    
    public function dbQuery($q) {
	
	   $this->dbQuery .= $q;
    }
    
    public function dbQL($query) {
	   
        $this->dbpdo->query($query);	
        return $query;
    
    }
    
    public function dbQI($data,$table) {
        
        $d = "INSERT INTO ".$table." (";
        foreach($data as $k=>$v) {
            $d .= $k.',';
        }
        $d = substr($d,0,-1);
        $d .= ") VALUES ("; 
        foreach($data as $k=>$v) {
	    
	    $d .= '\''.$v.'\',';
	   
        }
        $d = substr($d,0,-1);
        $d .= ")";
        
        $this->dbpdo->query($d);
        
        $id = $this->dbpdo->lastInsertId();
        
        return $id;
    }
    
    public function dbQU($id,$data,$table,$fieldId="id",$other=' LIMIT 1 ',$equ="=") {
        
        $d = "UPDATE ".$table." SET ";
        foreach($data as $k=>$v) {
            $d .= $k." = '".$v."', ";
        }
        $d = substr($d,0,-2);
        $d .= " WHERE ".$fieldId." ".$equ." '$id' $other ;";
	
        $this->dbQuery($d);
	
    }

    public function dbQD($id,$table,$field="id",$signe="=",$limit=' LIMIT 1 ') {
    
        $d = "DELETE FROM ".$table." WHERE ".$field." ".$signe." '".$id."' $limit ";
        $this->dbpdo->query($d);    
    }
}