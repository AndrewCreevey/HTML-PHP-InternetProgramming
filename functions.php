<!-- Andrew Creevey, 12236284, Assignment 2
---- This file contains functions that can be used anywhere in the program
---- provided you call 'functions.php' at the top of the file.
--->

<?php
	$dbhost = 'localhost'; // designated database
	$dbname = 'db339';     // names as per the 
	$dbuser = 'a2user';    // brief
	$dbpass = 'a2339';     // 
	$appname = "Quiz Time"; // 
	
	//create a new connection
	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($connection->connect_error) die($connection->connect_error);
	
	//function used to create a table in the database
	function createTable($name, $query) {
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
		echo "Table '$name' created or already exists.<br>";
	}
	
	//this is used to query SQL
	function queryMysql($query) {
		global $connection;
		$result = $connection->query($query);
		if (!$result) die($connection->error);
		return $result;
	}
	
	//logs the user out and destroys the session
	function destroySession(){
		$_SESSION=array();
		if (session_id() != "" || isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-2592000, '/');
		}
		session_destroy();
	}
	
	//gets rid of anything to do with sql injection
	function sanitizeString($var) {
		global $connection;
		$var = htmlentities($var);
		$var = strip_tags($var);
		$var = stripslashes($var);
		return $connection->real_escape_string($var);
	}
	
	//displays the users profile, predominantly used in member/profile function
	function showProfile($user) {
		$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
		if ($result->num_rows) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
		}
	}
	
	//displays the users score
	function getScore($user){
		$score  = queryMysql("SELECT score FROM members WHERE user='$user'");
		$row = $score->fetch_array(MYSQLI_ASSOC);
		return $user . " <span>$user's score is: $row[score] </span>";
	}
?>