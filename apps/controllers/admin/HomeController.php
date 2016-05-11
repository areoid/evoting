<?php
/*
* HomeController.php
* Controller ini sebagai default halaman admin
*/

class HomeController extends Controller {
	
	public function __construct() {
		parent::check_auth();
		if(Session::show('level') == "Administrator") {
			return true;
		}
		else {
			if(Session::show('level') == "Crew") {
				Redirect::to('registration/home/index');	
			} 
			else {
				Redirect::to('home/index');
			}
		}
	}

	public function index() {
		$title = 'Dashboard';
		$content = View::run(false, 'admin/home');
		$menu = View::run(false, 'admin/menu');
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $menu, 'content' => $content));
	}

	public function logout() {
		Session::delete();
	}
}