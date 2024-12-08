<?php
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

	$arr = json_decode($jsonobj, true);

	echo $arr["Peter"], PHP_EOL;
	echo $arr["Ben"], PHP_EOL;
	echo $arr["Joe"], PHP_EOL;
?>