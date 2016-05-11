<?php
/*
* NotfoundController.php
* Controller page Notfound
*/

class NotfoundController extends Controller {
	public function index() {
		return View::run('404');
	}
}