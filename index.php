<!-- Andrew Creevey, 12236284, Assignment 2 
---- first page you see on the site, doesnt really do much other
---- than instruct the user about what to do next (sign up or login)
--->

<?php
	require_once 'header.php';
	
	echo "<span class='main'>Welcome to $appname, ";
	
	//tells user they are logged in (if they are)
	if ($loggedin) echo "$user, you are logged in.<br>";
	else
		//if not, instructs them to sign up or log in
		echo "please <a href='signup.php'>sign up</a> 
			and/or <a href='login.php'>log in</a> to join in.<br>";
?>
		</span><br><br>
	</body>
</html>