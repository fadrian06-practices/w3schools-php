<?php
	$str = "Apples and bananas.";
	$pattern = "/ba(na){2}/i";
	echo preg_match($pattern, $str); // Outputs 1
?>