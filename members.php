<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file displays the users name and score in the members.php page.
---- also shows their profile when they click the home button ('view')
--->

<?php
	require_once 'header.php';
	
	if (!$loggedin) {
		echo "<span class='info'>&#8658; You must be logged in to view this page.</span><br><br>";
		die();
	}

	echo "<div class='main'>";
	
	//this page is loaded when you click on the home button
	if (isset($_GET['view'])) {
		$view = sanitizeString($_GET['view']);
		if ($view == $user) $name = "My";
		else                $name = "$view's";
		echo "<h3>$name Profile</h3>";
		showProfile($view);
		
		//show score button, links to list of all members and their scores
		echo "<a class='button' href='members.php'>View $name Score</a><br><br>";
		
		die("</div></body></html>");
	}
	
	//the following is loaded when you click on the members button
	$result = queryMysql("SELECT user FROM members ORDER BY user");
	$score  = queryMysql("SELECT score FROM members ORDER BY user");
	$num    = $result->num_rows;

	echo "<h3>All Members</h3><ul>";
	
	for ($j = 0 ; $j < $num ; ++$j) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		//print out users name
		echo "<li> User: <a href='members.php?view=" . $row['user'] . "'>" . $row['user'] . "</a>";

		//print out users score
		$row = $score->fetch_array(MYSQLI_ASSOC);
		echo "&nbsp;&nbsp;&nbsp; Score: " . $row['score'];
	}
?>
		</ul></div>
	</body>
</html>