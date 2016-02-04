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

class AbstractQuery 
{
	
	protected
		$_findBy 				= array(),
		$_findRangeBy			= array(),
		$_findGreaterThanBy 	= array(),
		$_findLessThanBy		= array(),
		$_findOneBy				= array(),
		$_findByLike			= array(),
		$_filterBy 				= array(),
		$_filterRangeBy 		= array(),
		$_filterGreaterThanBy 	= array(),
		$_filterLessThanBy 		= array(),
		$_filterLikeBy			= array(),

		$_table					= null,
		$_joinTable 			= null,
		$_sqlJoinTable			= '',
		$_joinFields 			= '',

		$_joinFilters 			= array(),
		$_joinFiltersSql 		= '',

		$_limit					= ' LIMIT 5000 ',
		$_page					= 1,
		$_filtersCount 			= 0,
		$_filtersQueryFields	= array(),
		$_orderBy				= '',

		$find 					= false,
		$filter                 = array(),

		$_countTotal 			= 0,
		$_paginate              = array(),

		$_joinMaps 				= array(),
		$_joinValidations 		= array(),

		$lastInsertId
	;

	private 
		$_filtersQuery
	;

	public 
		$_result				= null
	;

	public function __construct(&$doorGets) {

		$this->doorGets = $doorGets;

	}

	public function _getPkName() {
		return $this->_pk;
	}

	public function _getTableName() {
		return $this->_table;
	}
	
	protected function getFindProperties() {
		return array(
			'_findBy',
			'_findRangeBy',
			'_findGreaterThanBy',
			'_findLessThanBy',
			'_findOneBy',
			'_findByLike'
		);
	}

	protected function getFilterProperties() {
		return array(
			'_filterBy',
			'_filterRangeBy',
			'_filterGreaterThanBy',
			'_filterLessThanBy',
			'_filterLikeBy'	
		);
	}

	public function _load() {

		$findProperties = $this->getFindProperties();
		foreach ($findProperties as $property) {
			if (!empty($this->$property)) {
				$this->find = $property;
			}
		}

		$filterProperties = $this->getFilterProperties();
		foreach ($filterProperties as $property) {
			if (!empty($this->$property) && !in_array($property, $this->filter)) {
				$this->filter[] = $property;
			}
		}

		$this->select();
	}

	public function select() {

		$map 	 = $this->_getMap();

		$finds 	 = $this->find;
		$filters = $this->filter;

		$hasQuery = false;
		
		// Gestion des finds
		if (!empty($finds)) {
            
			$classNameEntity = $this->_className.'Entity';
			foreach ($this->$finds as $key => $value) {

				if (array_key_exists($key, $map)) {
					
					$this->_result = new $classNameEntity($this->doorGets->dbQS($value,$this->_table,$map[$key]),$this->doorGets,$this->_joinMaps);
				} 

			}

		// Gestion des filters
		}elseif (!empty($filters)) {

			foreach ($filters as $filter) {

				foreach ($this->$filter as $key => $value) {

					if (array_key_exists($key, $map)) {	

						// Condition filter
						if (is_array($value) && array_key_exists('name', $value) && array_key_exists('condition', $value))  {
							
							if (!is_array($value['name'])) {
								
								$sqlToSend = $this->_table.".".$map[$key] ." = '".$value['name']."' ".$value['condition']." ";
								if (!in_array($sqlToSend,$this->_filtersQueryFields)) {
									$this->_filtersQueryFields[] =  $sqlToSend;
								}
							
							} else {

								
								foreach ($value['name'] as $finalValue) {
									$sqlToSend = $this->_table.".".$map[$key] ." = '".$finalValue."' ".$value['condition']." ";
									if (!in_array($sqlToSend,$this->_filtersQueryFields)) {
										$this->_filtersQueryFields[] =  $sqlToSend;	
									}
								}							
							}

						// Condition filter range
						} elseif (is_array($value) &&  array_key_exists('from', $value) && (array_key_exists('to', $value) )) {

							$this->_filtersQueryFields[] =  $this->_table.".".$map[$key] ." >= '".$value['from']."' AND ". $this->_table.".".$map[$key] ." <= '".$value['to']."' AND " ;

						} elseif (is_string($value)) {

							$this->_filtersQueryFields[] = $this->_table.".".$map[$key] ." LIKE '".$value."' AND ";
						}
						
						$this->_filtersCount++;
					}
				}
			}
		}
	}

	public function find($pk = null) {

		$query = '';
		$countTotalQuery = '';

		/**
		 * Traitement des counts
		 */
		if ($this->_filtersCount) {

			$_subQuery = '';
			$iSub = 0;
			foreach ($this->_filtersQueryFields as $partQuery) {
				$_subQuery .= $partQuery;
				$iSub++;
			}
			
			$_AND = '';
			if ($iSub > 1) {
				$_AND = ' 1 = 1 AND ';
			}
			
			$_subQuery = substr($_subQuery, 0, -4);
			$res = trim($this->_joinFields.$this->_joinFiltersSql.' '.$_subQuery);
			$endQuery = (empty($res)) ? '' : " WHERE ".$this->_joinFields.$this->_joinFiltersSql.$_AND.$_subQuery;
			$countTotalQuery = "SELECT COUNT(*) as c FROM ".$this->_table.$this->_sqlJoinTable.$endQuery;

		} elseif (is_null($pk)) {
			$res = trim($this->_joinFields.$this->_joinFiltersSql);
			$endQuery = (empty($res)) ? '' : " WHERE ".$this->_joinFields.$this->_joinFiltersSql;
			$countTotalQuery = "SELECT COUNT(*) as c FROM ".$this->_table.$this->_sqlJoinTable.$endQuery;
			
		} elseif (is_string($pk) && is_numeric($pk)) {

			$this->_countTotal = 1;

		} elseif (is_array($pk) && !empty($pk)) {
			
			$pks = '';
			foreach ($pk as  $_pk) {
				
				$pks .= ' '.$this->_pk." = '$_pk' OR ";
			}

			$pks = substr($pks,0, -3);
			$res = trim($this->_joinFields.$this->_joinFiltersSql." $pks ");
			$endQuery = (empty($res)) ? '' : " WHERE  ".$this->_joinFields.$this->_joinFiltersSql." $pks ";
			$countTotalQuery = "SELECT COUNT(*) as c FROM ".$this->_table.$this->_sqlJoinTable.$endQuery;
			
		}

		if (!empty($countTotalQuery)) {

			$resultCountTotal = $this->doorGets->dbQ($countTotalQuery);
			if (!empty($resultCountTotal)) {

				$this->_countTotal = (int) $resultCountTotal[0]['c'];
			}
		}

		/**
		 * Counts ready / Traitement pagination
		 */
		$iniPosition = $finalGroupe = 0;
		if (!empty($this->_paginate)) {

			$groupe 	= $this->_paginate['groupe'];
			$position 	= $this->_paginate['position'];

			$countTotal = $this->_countTotal;

			$pageMax = ceil( $countTotal / $groupe );
			if ($position > $pageMax) {
				$position = $pageMax;
			}

			$iniPosition = $position * $groupe - $groupe;

			$finalGroupe = $iniPosition+$groupe;
	        if ( $finalGroupe >  $countTotal) {

	            $finalGroupe = $countTotal;
	        }
		}

		if ($iniPosition < 0) {
			$iniPosition = 0;
		}
		if (!empty($groupe)) {
			$this->_limit = " LIMIT $iniPosition,$groupe";
		}
		

		/**
		 * Traitement des queries
		 */

		if ($this->_filtersCount) {

			$_subQuery = '';
			foreach ($this->_filtersQueryFields as $partQuery) {
				$_subQuery .= $partQuery;
			}
			
			$_subQuery = substr($_subQuery, 0, -4);
			
			$_AND = '';
			if ($iSub > 1) {
				$_AND = ' 1 = 1  AND ';
			}

			$res = trim($this->_joinFields.$this->_joinFiltersSql." ".$_subQuery);
			$endQuery = (empty($res))  ? '' : " WHERE ".$this->_joinFields.$this->_joinFiltersSql.$_AND.$_subQuery;

			$query = $this->_filtersQuery = "SELECT * FROM ".$this->_table.$this->_sqlJoinTable.$endQuery.' '.$this->_orderBy.$this->_limit;
		
		} elseif (is_null($pk)) {
			
			$_joinFiledsSql = (empty($this->_joinFields)) ? '' : " WHERE ".$this->_joinFields." ";
			$query = "SELECT * FROM ".$this->_table.$this->_sqlJoinTable." ".$_joinFiledsSql.$this->_joinFiltersSql.$this->_orderBy.$this->_limit;
		
		} elseif (is_string($pk) && is_numeric($pk)) {

			$this->findPK($pk);

		} elseif (is_array($pk) && !empty($pk)) {
			
			$pks = '';
			foreach ($pk as  $_pk) {
				
				$pks .= ' '.$this->_pk." = '$_pk' OR ";
			}

			$pks = substr($pks,0, -3);

			$res = trim($this->_joinFields.$this->_joinFiltersSql." $pks ");
			$endQuery = (empty($res))  ? '' : " WHERE ".$this->_joinFields.$this->_joinFiltersSql." $pks ";

			$query = "SELECT * FROM ".$this->_table.$this->_sqlJoinTable." WHERE ".$this->_orderBy.$this->_limit;
			
		}

		if (!empty($query)) {

			$result = $this->doorGets->dbQ($query);

			$classNameEntity = $this->_className.'Entity';
			$classTraductionEntity = $this->_className.'TraductionEntity';

			foreach ($result as $key => $value) {

				$result[$key] = new $classNameEntity($value,$this->doorGets,$this->_joinMaps);
			}

			$this->_result = $result;
		}

		return $this;
	}

	public function _getEntities($type = 'object') {

		switch ($type) {
			case 'array':

				if (is_array($this->_result)) {

					$data = array();
                    foreach ($this->_result as $Entity) {
                        
                        $data[] = $Entity->getData();
                    }
                    $this->_result = $data;
				}
				break;
		}

		return $this->_result;

	}

	public function _getEntity($type = 'object') {

		
		if (empty($this->_result) || empty($this->_result)) {
			return null;
		}

		if (is_object($this->_result)) {
		
			return $this->_result;	
		
		} elseif (is_array($this->_result) && !empty($this->_result)) {
			
			foreach ($this->_result as $Entity) {
				return $Entity;
			}

		}

	}

	public function count() {
		
		$count = 0;
		if (is_array($this->_result)) {

			$count = count($this->_result);
		}

		return $count; 
	}

	public function countTotal() {

			return $this->_countTotal; 
	}

	public function limit($number) {

		if (is_numeric($number)) {
			$this->_limit = ' LIMIT '.$number;
		}

		return $this;
	}


	public function paginate($position,$groupe) {


		if (is_numeric($position)  && is_numeric($groupe)) {
			
			$this->_paginate = array(
				'position' 	=> $position,
				'groupe'	=> $groupe	
			);

		}

		return $this;
	}

	public function isAndOr($condition) {

		$_condition = '';
		if (in_array(trim(strtolower($condition)), array('and','or'))) {
			$_condition = strtoupper($condition);
		}

		return $_condition;
	}

	public function loadDirection($fieldName,$direction) {

		$direction = strtolower($direction);
		if (in_array($direction, array('desc','asc'))) {
			$this->_orderBy =  ' ORDER BY '.$this->_table.'.'.$fieldName.' '.strtoupper($direction);
		}
	}

	public function loadFilterBy($key,$name,$condition) {

		$this->_filterBy[$key]['name'] =  $name;
		$this->_filterBy[$key]['condition'] = $condition;
	}

	public function join($entityName, $fields = array(), $filters = array()) {

		$entityQueryName = $entityName.'Query';
		$entityQuery  	 = new $entityQueryName($this->doorGets);

		$entityEntityName = $entityName.'Entity';
		$entityEntity     = new $entityEntityName(null,$this->doorGets);

		$map = $entityQuery->_getMap();

		$this->_joinMaps 		= $map;
		
		// if (!empty($fields)) {
		// 	$this->_joinFields[$entityName] 	= $fields;
		// }

		if (!empty($filters)) {

			$this->_joinFilters 	= $filters;
		}
		
		foreach ($map as $methodName => $fieldName) {

			$fieldMethodName = 'getValidation'.$methodName;
			$this->_joinValidations[$entityName][$methodName] =  $entityEntity->$fieldMethodName();

		}

		$this->_joinTable = $entityQuery->_table;
		$this->_sqlJoinTable = ', '.$entityQuery->_table.' ';

		if (is_array($fields) && !empty($fields)) {
			foreach ($fields as $keyTable => $keyJointTable) {
				$this->_joinFields = $this->_table.'.'.$keyTable.' = '.$this->_joinTable.'.'.$keyJointTable;
				break;
			}
		}

		if (!empty($filters)) {

			$this->_joinFiltersSql = ' AND ';

			foreach ($filters as $key => $value) {

				$this->_joinFiltersSql .= $this->_joinTable.".$key = '$value' AND ";
			}

			$this->_joinFiltersSql  = substr($this->_joinFiltersSql,0, -4);
		}
	}

	public function _getMap() {

        return array();
    }
}
