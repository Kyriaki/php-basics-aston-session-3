<?php
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DB', 'formation-php-ajax');

	function connect()
	{
		$db = mysqli_connect(HOST, USER, PASSWORD, DB);
		return $db;
	}
?>