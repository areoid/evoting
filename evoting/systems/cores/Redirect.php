<?php
// class redirect

class Redirect {
	public static function to($location = null) {
		if($location) {
			header('Location: ' . self::base_url() . $location);
			exit();
		}
	}

	public function base_url() {
		$currentPath = $_SERVER['PHP_SELF'];
		$pathInfo = pathinfo($currentPath);
		$hostName = $_SERVER['HTTP_HOST'];
		$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";

		return $protocol.$hostName.$pathInfo['dirname']."/";
	}
}
