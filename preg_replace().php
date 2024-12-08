<?php
	$str = "Visit Microsoft!";
	$pattern = "/microsoft/i";
	echo preg_replace($pattern, "W3Schools", $str); // Outputs "Visit W3Schools"
?>