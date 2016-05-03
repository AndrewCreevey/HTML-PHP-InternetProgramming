<!-- Andrew Creevey, 12236284, Assignment 2 -->
<!-- This file is the first file you should load when using my site.
---- It creates the tables in the database and also loads the question table
---- and then displays a link that will take the user to the home page.  
--->

<html>
	<head>
		<title>Setting up database</title>
	</head>
	<body>
		<h3>Setting up...</h3>

<?php
	require_once 'functions.php';

	//create all the tables in the database
	createTable('members', 'user VARCHAR(16), pass VARCHAR(11), score INT(16) , INDEX(user(6))');
	createTable('profiles', 'user VARCHAR(16), text VARCHAR(4096),INDEX(user(6))');
	createTable('questions', 'qNum VARCHAR(16), question VARCHAR(4096), a VARCHAR(4096), 
			b VARCHAR(4096), c VARCHAR(4096), answer VARCHAR(16), INDEX(question(20))');
	//load the questions into the table
	require_once 'loadquestions.php';
?>
		<br>...done.
		<br><br> Click <a href='index.php'>here</a> to continue to the site
	</body>
</html>