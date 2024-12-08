<?php
	namespace Html;
	include "Html.php";

	$table          = new Table();
	$table->title   = "My table";
	$table->numRows = 5;

	$row           = new Row();
	$row->numCells = 3;
?>

<html>
	<body>
		<?php $table->message();?>
		<?php $row->message();?>
	</body>
</html>