<?php
/*
* LoginController.php
* Class Controller untuk login Admin
*/

class LoginController {
	public function auth() {
		$is_auth = Session::getAuth();
		if($is_auth) {
			Session::jump();
		}
	}

	public function index() {
		$this->auth();
		View::run(true, 'login');
	}

	public function process($params = null) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$login = DB::getInstance()->query("SELECT * FROM evo_users WHERE username = '$username' AND password = md5($password)");
		
		/*
		* Check username and password, is true
		* set session and than redirect it
		*/
		if($login->count()) {
			
			foreach ($login->results() as $res) {
				Session::set($res->username, $res->level, $res->id);
			}

			echo "true";
			
		}
		else {
			echo "false";
		}
	}

	public function logout() {
		Session::delete();
	}
}