<?php
/*
*	Conf Controller
*/

class ConfigController extends Controller {
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

	public function menu() {
		return View::run(false, 'admin/menu');
	}

	public function content() {
		$config = DB::getInstance()->get('evo_settings', array());

		return View::run(false, 'admin/config', array('config' => $config));
	}

	public function index() {
		$title = 'Configuration';
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $this->content() ));
	}

	public function view_config() {
		header('Content-Type: application/json');
		$view = DB::getInstance()->get('evo_settings', array());

		foreach ($view->results() as $res) {
			$value[]	= $res->value;
		}

		echo json_encode($value);
	}

	public function edit() {
		$evo_name = mysql_real_escape_string($_POST['evo_name']);
		$evo_card_name = mysql_real_escape_string($_POST['evo_card_name']);

		/*$a = DB::getInstance()->update('evo_settings', 'key', 'evoting_name', array(
				'value' => $evo_name
			));
		$b = DB::getInstance()->update('evo_settings', 'key', 'card_name', array(
				'value' => $evo_card_name
			));*/
		$a = DB::getInstance()->query("UPDATE evo_settings SET `value` = '".$evo_name."' WHERE `key` = 'evoting_name' ");
		$b = DB::getInstance()->query("UPDATE evo_settings SET `value` = '".$evo_card_name."' WHERE `key` = 'card_name' ");

		if($a AND $b){
			echo "true";
		}
		else {
			echo "false";
		}
	}
}