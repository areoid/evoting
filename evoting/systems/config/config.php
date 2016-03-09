<?php
// Configuration of Database

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'evoting';

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => $hostname,
		'username' => $username,
		'password' => $password,
		'db' => $dbname
	)
);