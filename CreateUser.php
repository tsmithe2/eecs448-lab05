<?php
	$user_name = $POST["username"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "t340s709", "ke3ve4Ni", "t340s709");
	$null = "";
	$erMessage = "An error occured: ";

	if ($mysqli->connect_errno)
	{
		printf("connect failed");
	}
	if ($user_name == $null)
	{
		echo "<p>" . $erMessage . "You must enter a username.</p>";
	}
	else
	{
		$query = "INSERT INTO Users (user_id) VALUES ('" . $user_name . "')";
		if ($mysqli->query($query))
		{
			echo "<p>" . $user_name . " was created and stored.</p>";
		}
		else
		{
			echo "<p>" . $erMessage . $user_name . " has already been created</p>";
		}
	}
	$mysqli->close();
?>
