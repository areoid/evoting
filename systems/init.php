<?php
// init

require_once 'systems/config/config.php';

spl_autoload_register(function($class){
	require_once 'systems/cores/'. $class . '.php';
});