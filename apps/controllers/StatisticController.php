<?php
/*
*	Statistic Class
*	File name : StatisticController.php
*/

class StatisticController {
	public function index() {
		View::run(true, 'statistic');
	}
}