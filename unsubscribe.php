<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file removes the user from all tables and logs them out. 
---- Also displays some text informing the user that they have successfully unsubscribed
--->

<?php
	require_once 'header.php';

	if (!$loggedin) die(); //if not logged in, just display header
	
	//delete the user from both member and profile tables
	queryMysql("DELETE FROM members WHERE user='$user'");
	queryMysql("DELETE FROM profiles WHERE user='$user'");
	
	//display information that user has unsubbed
	echo "<div align=center><b>Success!</b><br> $user has unsubscribed<br></div>";
	destroySession();
	echo "<div class='main'>You have been logged out. Please " .
			 "<a href='index.php'>click here</a> to refresh the screen.";
?>
		</div><br>
	</body>
</html>