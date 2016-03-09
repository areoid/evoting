<?php
/*
*	Card Controller
*/

class CardsController extends Controller {
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

	public function menu(){
		return View::run(false, 'admin/menu');
	}

	public function content() {
		$cards = DB::getInstance()->get('evo_voters', array());

		return View::run(false, 'admin/allcards', array('cards' => $cards));
	}

	public function all() {
		$title = 'All Evo Cards';
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $this->content() ));
	}
}