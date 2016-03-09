<?php
// Controller class

class Controller {

	public function check_auth() {
		$is_auth = Session::getAuth();
		if($is_auth) {
			return true;
		}
		else {
			Redirect::to('login/index');
		}
	}


}