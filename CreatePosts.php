<?php
	$user_name = $_POST["username"];
	$post = $_POST["post"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "t340s709", "ke3ve4Ni", "t340s709");
	$userExists = false;
	$query = "SELECT user_id FROM Users WHERE user_id = '" . $user_name . "'";
	$erMessage = "An error occured: ";
	$null = "";

	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	if ($result = $mysqli->query($query))
	{
		if ($row = $result->fetch_assoc())
		{
			$userExists = true;
		}
		else
		{
			echo "<p>" . $erMessage . $user_name . " does not exist.</p>";
		}
		$result->free();
	}

	if ($userExists == true)
	{
		if ($post == $null)
		{
			echo "<p>" . $erMessage . "post must not be blank.</p>";
		}
		else
		{
			$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "','" . $user_name . "')";
			if ($result = $mysqli->query($query))
			{
				echo "<p>Post has been created.</p>";
				$result->free();
			}
			else
			{
				echo "<p>" . $erMessage . " Post was not created.</p>";
			}
		}
	}
$mysqli->close();
?>
