<!-- Andrew Creevey, 12236284, Assignment 2
---- This file is used to check whether or not the user you're trying
---- to make has already been used. Used when signing up.
--->

<?php
	require_once 'functions.php';
	
	if (isset($_POST['user'])) {
		$user = sanitizeString($_POST['user']);
		$result = queryMysql("SELECT * FROM members WHERE user='$user'");

		//this displays to the right of the username box (using span rather than div)
		if ($result->num_rows) {
			echo "<span class='taken'>&nbsp;&#x2718; " . "This username is taken</span>";
		} else {
			echo "<span class='available'>&nbsp;&#x2714; " . "This username is available</span>";
		}
	}	
?>