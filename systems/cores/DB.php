<?php
// class DB

class DB {

	private static $_instance = null;
	private $_pdo, 			
			$_query, 				
			$_error = false, 			
			$_results, 				
			$_count = 0;			
	
	public static function getInstance () {
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	private function __construct () {	
		try {
			$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').'; 
									dbname='.Config::get('mysql/db').'', 
									''.Config::get('mysql/username').'', 
									''.Config::get('mysql/password').'');
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function query($sql, $params = array()) {
		$this->_error = false;  
		
		if ($this->_query = $this->_pdo->prepare($sql)) {  
			$x = 1;

			if (count($params)) {  
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if ($this->_query->execute()) {   
				$this->_results = $this->_query->fetchALL(PDO::FETCH_OBJ);  // Store results as object //
				$this->_count = $this->_query->rowCount();  // Store count of query //
			} else {
				$this->_error = true;
			}
		} 
		return $this; 
	}
		
						
	public function action ($action, $table, $where = array()) {
	
		if (count($where) === 3) { 
			$operators  = 	array('=', '>', '<', '=>', '=<'); 	
			$field 		=	$where[0];  // 'username' ///
			$operator 	=	$where[1];		
			$value 		=	$where[2];

			if (in_array($operator, $operators)) {  
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?"; // ? is binded value //
				
				if (!$this->query($sql, array($value))->error()) {  
					return $this; // return current object //
				}
			}
		}
		else {
			$sql = "{$action} FROM {$table}";
			//die($sql);
			if(!$this->query($sql)->error()) {
				return $this;
			}
		}
		return false;
	}	

	public function insert($table, $fields = array()) {
		if(count($fields)) {
			$keys = array_keys($fields);
			$values = '';
			$x = 1;

			foreach ($fields as $field) {
				$values .= "?";
				if($x < count($fields)) {
					$values .= ", ";
				}
				$x++;
			}
			
			//die($tmp);
			$sql = "INSERT INTO `{$table}` (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
			
			//$sql = "INSERT INTO `{$table}` (`".implode('`, `', $keys)."`) VALUES (".str_repeat ( "?, " , count($keys)-1 )."?)";
			//echo $sql;
			if(!$this->query($sql, $fields)->error()) {
				return true;
				echo 'sukses';
			}
			else {
				echo 'failed';
			}
		}
		return false;
	}

	public function update($table, $ref_field, $id, $fields) {
		$set = '';
		$x = 1;

		foreach ($fields as $name => $value) {
			$set .= "$name = ?";
			if($x < count($fields)) {
				$set .= ", ";
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE {$ref_field} = {$id}";

		if(!$this->query($sql, $fields)->error()){
			return true;
		}

		return false;
	}

	public function delete($table, $where) {
		return $this->action('DELETE ', $table, $where);
	}

	public function get ($table, $where) {
		return $this->action('SELECT *', $table, $where);
	}

	public function results () {
		return $this->_results;
	}
	
	public function error () {
		return $this->_error;	
	}	

	// Count Method //
	public function count () {
		return $this->_count;
	}

}


