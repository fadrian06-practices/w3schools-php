<!DOCTYPE html>
<html>
	<head>
		<style>
			.error {color: red}
		</style>
	</head>
	<body>
		<?php
			// define variables and set to empty values
			$nameErr = $emailErr = $genderErr = $websiteErr = "";
			$name    = $email    = $gender    = $comment    = $website    = "";

			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				} else {
					$name = test_input($_POST["name"]);
					
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z-']*$/", $name)) {
						$nameErr = "Only letters and white space allowed";
					}
				}
				
				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				} else {
					$email   = test_input($_POST["email"]);
					
					// check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$emailErr = "Invalid email format";
					}
				}
				
				if (empty($_POST["website"])) {
					$website = "";
				} else {
					$website = test_input($_POST["website"]);
					
					// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
					$pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
					if (!preg_match($pattern, $website)) {
						$websiteErr = "Invalid URL";
					}
				}
				
				if (empty($_POST["comment"])) {
					$comment = "";
				} else {
					$comment = test_input($_POST["comment"]);
				}
				
				if (empty($_POST["gender"])) {
					$genderErr = "Gender is required";
				} else {
					$gender  = test_input($_POST["gender"]);
				}
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);

				return $data;
			}

		?>

		<h2>PHP Form Validation Example</h2>
		<p><span class="error">* required field</span></p>
		<form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
			Name:
			<input name="name" value="<?=$name?>">
			<span class="error">* <?=$nameErr?></span>
			<br><br>
			E-mail:
			<input type="email" name="email" value="<?=$email?>" required>
			<span class="error">* <?=$emailErr?></span>
			<br><br>
			Website:
			<input type="url" name="website" value="<?=$website?>" required>
			<span class="error"><?=$websiteErr?></span>
			<br><br>
			Comment: <textarea name="comment"><?=$comment?></textarea>
			<br><br>
			Gender:
			<input type="radio" name="gender" value="female" <?=$gender == "female" ? "checked" : ""?>>Female
			<input type="radio" name="gender" value="male" <?=$gender == "male" ? "checked" : ""?>>Male
			<input type="radio" name="gender" value="other" <?=$gender == "other" ? "checked" : ""?>>Other
			<span class="error">* <?=$genderErr?></span>
			<br><br>
			<input type="submit">
		</form>

		<h2>Your Input</h2>
		<?php
			echo $name, "<br>";
			echo $email, "<br>";
			echo $website, "<br>";
			echo $comment, "<br>";
			echo $gender;
		?>
	</body>
</html>