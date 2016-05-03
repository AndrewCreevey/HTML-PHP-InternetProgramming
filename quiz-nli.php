<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file is displayed when the user clicks on the home button and they are not logged in
---- A box is displayed saying they need to be logged in to take part in the quiz
---- All input is disabled. Furthermore, 7/20 questions are randomly displayed.
--->

<?php
	//quiz nli = quiz (not logged in)
	require_once 'header.php';
	
	if (!$loggedin) {
		echo "<span class='info'>&#8658; You must be logged in to take this quiz.</span><br><br>";
	}
	
	echo "<div class='header' align='center'>PHP Quiz</div>";
	
	//while using "RAND() LIMIT 0,5" would be ineffecient for a large program
	//for an array of 20 variables it is very suitable and effecient
	$result = queryMysql ("SELECT DISTINCT * from questions ORDER BY RAND() LIMIT 0,7;");
	//this will make $num equal to the length of the array
	$num    = $result->num_rows;
?>
	
<form>
	<ol>
	<?php
		for ($j = 0 ; $j < $num ; ++$j) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			//print out users name
			echo "<li><b>" . $row['question'] . "</b></br></li>";
			?><input type='radio' name="radio" disabled><?php
			echo "<ans> " . $row['a'] . "</ans></br>";
			?><input type='radio' name="radio" disabled><?php
			echo "<ans> " . $row['b'] . "</ans></br>";
			?><input type='radio' name="radio" disabled><?php
			echo "<ans> " . $row['c'] . "</ans></br></br>";
		} 
	?>
	<input type="submit" name="Submit" disabled>
	</ol>
</form>