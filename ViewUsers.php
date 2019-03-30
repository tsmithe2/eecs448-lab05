<!doctype html>
<html lang = "en">
<head>
	<meta charset = "utf-8">
	<title>ViewUsers.php</title>
</head>
<body>
<h3>View Users</h3>
<table border = "3">
<tr>
<td>Username</td>
<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "t340s709", "ke3ve4Ni", "t340s709");
	if ($mysqli->connect_errno)
	{
		printf("Connect failed %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT * FROM Users";
	if ($result = $mysqli->query($query))
	{
		while ($row = $result->fetch_assoc())
		{
			echo "<tr><td>" . $row["user_id"]  . "</td></tr>";
		}
		$result->free();
	}
	$mysqli->close();
?>
</tr>
</table>
</body>
</html>
