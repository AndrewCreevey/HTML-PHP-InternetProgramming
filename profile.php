<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file loads and shows the users profile. It also enables them to 
---- enter text and save that as a description about themselves.
---- The description can be up to 4096 characters long.
--->


<?php
	require_once 'header.php';

	if (!$loggedin) {
		echo "<span class='info'>&#8658; You must be logged in to view this page.</span><br><br>";
		die();
	}

	echo "<div class='main'><h3>Your Profile</h3>";

	//this code gets the information you have entered in the textbox
	$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
	if (isset($_POST['text'])) {
		$text = sanitizeString($_POST['text']);
		$text = preg_replace('/\s\s+/', ' ', $text);

		//either updates or enters information into the database
		if ($result->num_rows) {
			queryMysql("UPDATE profiles SET text='$text' where user='$user'");
		} else queryMysql("INSERT INTO profiles VALUES('$user', '$text')");
	} else {
		if ($result->num_rows) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$text = stripslashes($row['text']);
		} else $text = "";
	}

	$text = stripslashes(preg_replace('/\s\s+/', ' ', $text));
	
	//show the users profile
	showProfile($user);
	
	echo <<<_END
		<form method='post' action='profile.php' enctype='multipart/form-data'>
		<h3>Enter or edit your details</h3>
		<textarea name='text' cols='50' rows='3'>$text</textarea><br>
_END;
?>
		<input type='submit' value='Save Profile'>
		</form></div><br>
	</body>
</html>