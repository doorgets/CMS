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


class AbstractEntity 
{
    public $doorGets;

    public $joinMaps;

    public function __construct($data = null, &$doorGets = null, $joinMaps = array()) {
        
        $this->doorGets = new CrudQuery();
        
        $this->_joinMaps = $joinMaps;

        if (!is_null($data) && is_array($data)) {
        
            $this->setData($data);
        
        } elseif (!is_null($data)) {
            
            $parentClassQuery = $this->_getClassQuery();

            $Entity = $parentClassQuery->findByPk($data);
            
            $data = $Entity->_getEntity()->getData();
               
            $this->setData($data);
        }
        
    }

    protected function _getClassName() {

        return str_replace('Entity','',get_class($this));   

    }

    protected function _getClassQuery() {

        $className = $this->_getClassName().'Query';
        $classNameQuery = new $className($this->doorGets);

        return $classNameQuery;

    }
    
    public function setData($data = null, $field = null)
    {
        
        $errors = array();
        $this->clearErrors();

        $map = $this->_getMap();
        $parentClassQuery = $this->_getClassQuery();
        
        if (!empty($data) && is_array($data)) {
            
            foreach ($data as $key => $value) {
                
                $methodName = array_search($key,$map);
                $setMethodName =  'set'.$methodName;
                if (in_array($key,$map)  && method_exists($this,$setMethodName) ) {

                    $validationValue = $this->validate($value,$methodName,$parentClassQuery);

                    if ($validationValue && !is_array($validationValue)) {

                        $this->$setMethodName($value);

                    } elseif (is_array($validationValue) && !empty($validationValue)) {

                        array_push($errors, $validationValue);

                    }
                }
            }
            
        } elseif (!is_null($data) && !is_null($field) && in_array($field,$map)) {
            
            $methodName = array_search($key,$map);
            $setMethodName =  'set'.$methodName;
            if (in_array($key,$map) && method_exists($this,$setMethodName)) {
                
                $validationValue = $this->validate($value,$methodName,$parentClassQuery);

                if ($validationValue && !is_array($validationValue)) {

                    $this->$setMethodName($value);

                } elseif (is_array($validationValue) && !empty($validationValue)) {

                    array_push($errors, $validationValue);

                }
            }
            
        }
        
        if (!empty($errors)) {
            $this->errors = $errors;    
        }

        return $this;
    }

    public function getData($field = null) {
        
        $return = null;
        $errors = array();
        $map = $this->_getMap();
        
        if (is_string($field) && !in_array($field, $map)) {
            return null;
        }

        $parentClassQuery = $this->_getClassQuery();

        // Get calue from field name
        if (!is_null($field) && in_array($field, $map)) {

            $methodName = array_search($field,$map);
            $getMethodName =  'get'.$methodName;
            if (in_array($field,$map) && method_exists($this,$getMethodName)) {
                
                $value = $this->$getMethodName();
                $validationValue = $this->validate($value,$methodName,$parentClassQuery);

                if ($validationValue && !is_array($validationValue)) {

                    return $value;

                } 
            }

            return null;

        // Get all data
        } else {
            
            $return = array();
            foreach($map as $methodName=>$fieldName) {
                
                $getMethodName =  'get'.$methodName;
                if (method_exists($this,$getMethodName)) {
                    
                    $value = $this->$getMethodName();
                    $validationValue = $this->validate($value,$methodName,$parentClassQuery);

                    if ($validationValue && !is_array($validationValue)) {

                        $return[$fieldName] = $value;

                    } elseif (is_array($validationValue) && !empty($validationValue)) {

                        $return[$fieldName] = null;
                    }
                }
                    
            }
            
            return $return; 
        }

    }
    
    public function hasData($field = null) {
        
        $map = $this->_getMap();
        return (!is_null($field) && in_array($field, $map)) ? true : false;

    }


    public function save($htmlentities = true) {

        $parentClassQuery = $this->_getClassQuery();

        $this->validateAllData($parentClassQuery);

        $isValidData = $this->isValid();
        if (!$isValidData) {
            return null;
        }
       
        $data = $this->getData();

        $parentPkName = $parentClassQuery->_getPkName();
        $parentTableName = $parentClassQuery->_getTableName();

        $hasInsert = (empty($data[$parentPkName])) ? true : false ;
        $id = $data[$parentPkName];
        unset($data[$parentPkName]);
        foreach ($data as $key => $value) {
            $data[$key] = ($htmlentities) ? htmlentities($value,ENT_QUOTES): $value;
        }

        if ($hasInsert) {
            $this->setId($parentClassQuery->doorGets->dbQI($data,$parentTableName));
        } else {
            $parentClassQuery->doorGets->dbQU($id,$data,$parentTableName,$parentPkName);
        } 

        return $this;

    }

    public function delete() {

        $data = $this->getData();
        
        $parentClassQuery = $this->_getClassQuery();
        $parentPkName = $parentClassQuery->_getPkName();
        $parentTableName = $parentClassQuery->_getTableName();

        $id = $data[$parentPkName];
        unset($data[$parentPkName]);

        if ($id) {
            $parentClassQuery->doorGets->dbQD($id,$parentTableName,$parentPkName);
        }

        return $this;

    }

    public function validateAllData(&$parentClassQuery) {

        $map = $this->_getMap();
        $errors = array();
        $this->clearErrors();
        
        foreach ($map as $methodName => $realFieldName) {
            
            $getMethodName =  'get'.$methodName;
            if (method_exists($this,$getMethodName)) {
                
                $value = $this->$getMethodName();
                $validationValue = $this->validate($value,$methodName,$parentClassQuery);

                if ($validationValue && !is_array($validationValue)) {

                    $return[$realFieldName] = $value;

                } elseif (is_array($validationValue) && !empty($validationValue)) {

                    array_push($errors, $validationValue);

                }

                if (!empty($errors)) {

                    $this->errors = $errors; 

                }
            }
        }   
    }

    public function validate($incomingValue,$methodName,&$parentClassQuery) {
        
        $errors     =   array();
        $validateMethodeName = 'getValidation'.$methodName;

        $valideMap  = $this->$validateMethodeName();
        
        $fieldName = $methodName;

        $realFieldName = '';
        $map = $parentClassQuery->_getMap();
        if (array_key_exists($fieldName, $map)) {
            $realFieldName = $map[$fieldName];
        }

        $parentTableName = $parentClassQuery->_getTableName();


        foreach ($valideMap as $key => $value) {
            
            switch ($key) {

                case 'type':

                    // int, varchar, text, email, url
                    switch ($value) {
                        
                        case 'email':

                            $isEmail = filter_var($incomingValue, FILTER_VALIDATE_EMAIL);
                            if (empty($isEmail) && !empty($incomingValue) ) {
                                $errors[$fieldName][$key] = true;
                            }
                            break;

                        case 'url':

                            $isUrl = filter_var($incomingValue, FILTER_VALIDATE_URL);
                            if (empty($isUrl) && !empty($incomingValue) ) {

                                $errors[$fieldName][$key] =true;
                            }
                            break;

                        case 'uri':

                            $incomingValue = str_replace('-', '', $incomingValue);
                            $isUri = ctype_alnum($incomingValue);

                            if (empty($isUri) && !empty($incomingValue) ) {

                                $errors[$fieldName][$value] =true;
                            }
                            break;
                    }

                    break;
                
                case 'size':
                    // max size
                    if ($value !== 0 && is_string($incomingValue) && strlen($incomingValue) > $value) {
                        
                        $errors[$fieldName][$key] = true;
                    }

                    break;
                
                case 'unique':
                    // boolean
                    if ($value && !empty($incomingValue)) {

                        $pk = $parentClassQuery->_getPK();
                        $pkValue = $this->getData($pk);

                        $contentExists = $parentClassQuery->doorGets->dbQS($pkValue,$parentTableName,$pk);
                        $contentExistsFromValue = $parentClassQuery->doorGets->dbQS($incomingValue,$parentTableName,$realFieldName);
                       
                        if ( 
                            (
                                !empty($contentExistsFromValue) 
                                && !empty($contentExists) 
                                && $contentExists[$pk] !== $contentExistsFromValue[$pk]
                            ) || (
                                empty($contentExists) && !empty($contentExistsFromValue)
                            )
                        ) {
                        
                           $errors[$fieldName][$key] = true;
                        
                        }
                        
                    }
                    
                    break;
                
                case 'required':
                    // boolean
                    if ($value) {
                        if ($incomingValue === '' || is_null($incomingValue)) {
                            
                            $errors[$fieldName][$key] = true;
                        }
                    }

                    break;
                
            }

        }

        if (!empty($errors)) {
            return $errors;
        }

        return true;

    }

    public function isValid() {
        
        return (property_exists($this,'errors')) ? false : true ;
    }

    public function clearErrors() {

        if (property_exists($this,'errors')) {
            unset($this->errors);
        }
    }

    public function _getMap() {

        return $this->_joinMaps;
    }
    
}
