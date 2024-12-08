<?php
	echo "<pre>";
	var_export($_SERVER);
	echo "</pre>";

	echo $_SERVER['PHP_SELF'], "<br>";
	echo $_SERVER['SERVER_NAME'], "<br>";
	echo $_SERVER['HTTP_HOST'], "<br>";
	echo $_SERVER['HTTP_REFERER'], "<br>";
	echo $_SERVER['HTTP_USER_AGENT'], "<br>";
	echo $_SERVER['SCRIPT_NAME'], "<br>";
?>