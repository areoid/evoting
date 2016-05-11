<?php
// View Class

class View {
	protected $view;
	protected $rootView = 'apps/views/';

	public $pageTitle = 'ioioioo';

	public function __construct($value = null) {
		$this->view = $value;
	}


	public static function run($status = false, $view = null, $data = null) {
		$instance = new static($view);
		return $instance->render($status, $data);
	}

	public function render($status = false, $_data) {
		$view_file_path = $this->rootView . $this->view . '.php';

		if(!file_exists($view_file_path)) {
			die ("Error ");
		}

		if(!$status == true) {
			ob_start();	
		}
		require_once $view_file_path;
		
		if(!$status == true) {
			return ob_get_clean();
		}	
		//ob_end_flush();
		/*else {
			ob_start();
			include $view_file_path;
			$myvar = ob_get_contents();
			ob_end_clean();
		}*/
		
	}

}