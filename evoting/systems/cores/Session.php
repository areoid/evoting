<?php
session_start();
// class Session

class Session {
	private $authentication;

	public function set($name, $level, $id) {
		$_SESSION['username'] = $name;
		$_SESSION['level'] = $level;
		$_SESSION['id'] = $id;
	}

	public function jump() {
		if(!empty($_SESSION['username'])) {
			if($_SESSION['level'] == "Administrator") {
				Redirect::to('admin/home/index');
			}
			elseif($_SESSION['level'] == "Crew") {
				Redirect::to('registration/home/index');
			}
		}
	}

	public function delete() {
		session_destroy();
		Redirect::to('home/index');
	}

	public function getAuth() {
		if(!empty($_SESSION['level'])) {
			$this->authentication = true;
		} 
		else {
			$this->authentication = false;
		}
		
		return $this->authentication;
	}

	public function show($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		else {
			echo "no session";
		}
	}
}