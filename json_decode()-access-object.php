<?php
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

	$obj = json_decode($jsonobj);

	echo $obj->Peter, PHP_EOL;
	echo $obj->Ben, PHP_EOL;
	echo $obj->Joe, PHP_EOL;
?>