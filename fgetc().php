<?php
	$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
	// Outputs one character until end-of-file
	while (!feof($myfile)) {
		echo fgetc($myfile);
	}
	
	fclose($myfile);
?>