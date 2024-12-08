<?php
	$cars = array("Volvo", "BMW", "Toyota");
	rsort($cars);
	
	echo json_encode($cars);
?>