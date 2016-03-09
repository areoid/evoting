<?php
// class Config

class Config {
	public static function get($path){
		if($path){
			$config = $GLOBALS['config'];
			$path = explode('/', $path);

			foreach ($path as $bit) {
				// checking a value of config
				if(isset($config[$bit])){
					$config = $config[$bit];
				}
			}

			return $config;
		}

		return false;
	}
}