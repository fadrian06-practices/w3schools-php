<?php
	echo "<table style='border: solid 1px black;'>";
	echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

	class TableRows extends RecursiveIteratorIterator {
		function __construct($it) {
			parent::__construct($it, self::LEAVES_ONLY);
		}

		function current(): mixed {
			return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
		}

		function beginChildren(): void {
			echo "<tr>";
		}

		function endChildren(): void {
			echo "</tr>" . "\n";
		}
	}

	$servername = "localhost";
	$username   = "root";
	$password   = "root";
	$dbname     = "myDBPDO";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
			echo $v;
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;
	echo "</table>";
?>