<!-- Andrew Creevey, 12236284, Assignment 2
---- this file logs the user out
--->

<?php
	require_once 'header.php';
	
	//if user logs out, destroy the session and inform then they have logged out
	if (isset($_SESSION['user'])) {
		destroySession();
		echo "<div class='main'>You have been logged out. Please " .
			 "<a href='index.php'>click here</a> to refresh the screen.";
	} else echo "<div class='main'><br>"."You cannot log out because you are not logged in";
?>
		<br><br></div>
	</body>
</html>