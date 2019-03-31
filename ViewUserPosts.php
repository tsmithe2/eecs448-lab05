<?php
	$select = $_POST["select"];
	echo "<h3>" . "Viewing posts made by: " . $select . "</h3>";

	$mysqli = new mysqli("mysql.eecs.ku.edu", "t340s709", "ke3ve4Ni", "t340s709");
	if ($mysqli->connect_errno)
	{
		printf("Connect faied: %s\n", $mysqli->connect_error);
		exit();
	}
	$query = "SELECT content FROM Posts WHERE author_id = '" . $select  . "'";
	if ($result = $mysqli->query($query))
	{
		echo "<table border = 1>";
		while ($row = $result->fetch_assoc())
		{
			echo "<tr><td>" . $row["content"]  . "</td></tr>";
		}
		echo "</table>";
		$result->free();
	}
	$mysqli->close();
?>
