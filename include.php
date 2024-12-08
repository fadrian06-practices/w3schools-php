<html>
	<head>
		<base href="https://w3schools.com" target="_blank">
	</head>
	<body>
		<div class="menu">
			<?php include 'menu.html' ?>
		</div>
		
		<h1>Welcome to my home page!</h1>
		<?php
			include 'vars.php';
			include 'noFileExist.php'; // warning
			require 'noFileExist.php'; // fatal error
			echo "I have a $color $car.";
		?>
		<p>Some text.</p>
		<p>Some more text.</p>
		<?php include 'footer.php' ?>
	</body>
</html>