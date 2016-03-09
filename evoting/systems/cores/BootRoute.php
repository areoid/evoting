<?php
// BootRoute class

class BootRoute {

	protected $controller = '';
	protected $method = '';
	protected $params = [];
	protected $cName = '';
	protected $userPath = array('vote', 'registration', 'admin');
	protected $user;

	/*
	* Menjalankan controller
	*/
	public function runController($cName, $mName, $pName = []) {

		$cName = new $cName;

		/*
		* Mengechek Method dalam controller
		*/
		if(method_exists($cName, $mName)) {
			call_user_func_array([$cName, $mName], $pName);
		}
		else {
			Redirect::to('Notfound/index');
		}
	}

	/*
	* Method awal yang dijalankan
	*/
	public function run(){
		$url = $this->parseUrl();

		$this->getUserPath($url[0]);

		/* 
		* ------------------------------------------------------------------------------------------------
		* set controller, method, params
		* ------------------------------------------------------------------------------------------------
		*/
		if(isset($this->user)) {
			unset($url[0]);
			$cName = $this->createController($url[1]);
			//die(var_dump($this->userPath));
			/*
			* Mengecek controller
			*/
			if(file_exists('apps/controllers/' . $this->user . '/' . $cName . '.php')) {
				$this->controller = $cName;
				unset($url[1]);
			}
			else {
				Redirect::to($this->user . 'home/index');
			}

			require_once 'apps/controllers/' . $this->user . '/' . $this->controller . '.php';

			$this->method = $url[2];
			unset($url[2]);
			
			$this->params = array_values($url);
	
		} 
		else {
			$cName = $this->createController($url[0]);

			/*
			* Mengecek controller
			*/
			if(file_exists('apps/controllers/' . $cName . '.php')) {
				$this->controller = $cName;
				unset($url[0]);
			}
			else {
				Redirect::to('home/index');
			}

			require_once 'apps/controllers/' . $this->controller . '.php';

			$this->method = $url[1];
			unset($url[1]);
			
			$this->params = array_values($url);
		}

		$this->runController($this->controller, $this->method, $this->params);

	}

	/*
	* Melakukan Routing terhadap URL
	*/
	public function parseUrl(){
		if(isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	public function getUserPath($userPath) {
		if(in_array($userPath, $this->userPath)) {
			$this->user = $userPath;
		}
		return true;
	}

	public function createController($string) {
		$awal = strtoupper(substr($string, 0, 1));

		$temp = '';
		for($i=1; $i<strlen($string); $i++) {
			$temp .= substr($string, $i, 1);
		}

		return $awal . $temp . 'Controller';
	}
} 