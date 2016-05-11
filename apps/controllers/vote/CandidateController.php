<?php

// untuk melihat candidat

class CandidateController {

	public function index() {
		//$admin = DB::getInstance()->get('admin', array('username', '=', 'rikka'));
		View::run('apps/views/vote/index', $admin);
	}
}