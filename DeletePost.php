<?php
	$checkbox = $_POST["checkbox"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "t340s709", "ke3ve4Ni", "t340s709");
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	foreach($checkbox as $post_ID)
	{
		$query = "DELETE FROM Posts WHERE post_id = '" . $post_ID  . "'";
		if($mysqli->query($query))
		{
			echo "<p>Post ID: " . $post_ID . " was deleted</p>";
		}
		else
		{
			echo "<p>An error occured. The post could not be deleted.</p>";
		}
	}
	$mysqli->close();
?>
