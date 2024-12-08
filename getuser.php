<!DOCTYPE html>
<html>

	<head>
		<style>
			table {
				width: 100%;
				border-collapse: collapse;
			}

			table,
			td,
			th {
				border: 1px solid black;
				padding: 5px;
			}

			th {
				text-align: left;
			}
		</style>
	</head>

	<body>

		<?php
			$q = intval($_GET['q']);
			$con = new MySQLi('localhost', 'root', 'root');

			if ($con->connect_errno) {
				die("Could not connect: $con->connect_error");
			}
			
			$con->select_db('ajax_demo');
			$sql    = "SELECT * FROM user WHERE id=$q";
			$result = $con->query($sql);

			echo "<table>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Age</th>
					<th>Hometown</th>
					<th>Job</th>
				</tr>
			";

			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Age'] . "</td>";
				echo "<td>" . $row['Hometown'] . "</td>";
				echo "<td>" . $row['Job'] . "</td>";
				echo "</tr>";
			}
		
			echo "</table>";
			$con->close();
		?>
	</body>

</html>