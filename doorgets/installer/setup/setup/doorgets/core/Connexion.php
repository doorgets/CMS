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

class Connexion{

    private $db = null;
    private static $instance = null;

    public static function getInstance($host,$dbName,$login,$password) {  
        if(is_null(self::$instance)) {
            self::$instance = new Connexion($host,$dbName,$login,$password);
        }
        return self::$instance;
    }

    private function __construct($host,$dbName,$login,$password){

        $conn = NULL;

        try{
            $conn = new PDO(
                "mysql:host=".$host.";dbname=".$dbName, 
                $login, 
                $password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
        } catch(PDOException $e){
            echo $e->getMessage(); exit();
        }    

        $this->db = $conn;
    }
    
    public function getConnexion(){
        return $this->db;
    }

    public static function reset() {
        self::$instance = NULL;
    }
}