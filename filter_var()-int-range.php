<?php
	$int = 122;
	$min = 1;
	$max = 200;

	$options = [
		"options" => [
			"min_range" => $min,
			"max_range" => $max
		]
	];

	if (filter_var($int, FILTER_VALIDATE_INT, $options) === false) {
		echo ("Variable value is not within the legal range");
	} else {
		echo ("Variable value is within the legal range");
	}

?>