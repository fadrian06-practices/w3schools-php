<html>
	<body>
		<form method="post">
			Name: <input name="fname">
			<input type="submit">
		</form>
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// collect value of input field
				$name = $_POST['fname'];
				
				if (empty($name)) {
					echo "Name is empty";
				} else {
					echo $name;
				}
			}
		?>
	</body>
</html>