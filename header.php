<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file displays the header and menu bar on each page
--->

<?php
	session_start();

	echo "<!DOCTYPE html>\n<html><head>";

	require_once 'functions.php';

	$userstr = ' (Guest)';

	//this checks if the user is logged in, if so, display their name in the header
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		$loggedin = TRUE;
		$userstr = " $user!";
	} else $loggedin = FALSE;

	//this displays the green bar you can see above the menu bar
	echo "<title>$appname$userstr</title><link rel='stylesheet' " .
		 "href='styles.css' type='text/css'>" .
		 "</head><body><center><canvas id='logo' width='624' " .
		 "height='96'>$appname</canvas></center>" .
		 "<div class='appname'>Welcome to $appname $userstr</div>" .
		 "<script src='javascript.js'></script>";

	//if the user is logged in, then display full menu
	if ($loggedin) {
		echo "<ul class='menu'>" .
			 "<li><a href='members.php?view=$user'>Home</a></li>" .
			 "<li><a href='members.php'>Members</a></li>" .
			 "<li><a href='quiz.php'>Quiz</a></li>" .
			 "<li><a href='profile.php'>Edit Profile</a></li>" .
			 "<li><a href='unsubscribe.php'>Unsubscribe</a></li>" .
			 "<li><a href='logout.php'>Log out</a></li></ul><br>";
	} else {
		//else display the default menu
		echo ("<ul class='menu'>" .
			  "<li><a href='quiz-nli.php'>Home</a></li>" .
			  "<li><a href='signup.php'>Sign up</a></li>" .
			  "<li><a href='login.php'>Log in</a></li></ul><br>");
	}
?>