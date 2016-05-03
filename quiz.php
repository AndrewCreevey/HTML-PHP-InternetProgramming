<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file is used to display and enable the user to take the quiz
---- Upon hitting submit, the results are calculated and displayed at the bottom 
---- of the page. It gives detailed feedback regarding how many questions they
---- got correct and what their best score is.
---- Part 3 (a) Helpful feedback is displayed (See lines 53-60)
---- Part 3 (b) The quiz will consist of 7 questions which are randomly selected from the table
   - Also, I use DISTINCT to ensure that there will be no duplicate questions (all different)
---- Part 3 (c) The users max score is stored in the database. (max score of numerous attempts) 
--->

<?php 
	require_once 'header.php';
	
	if (!$loggedin) {
		echo "<span class='info'>&#8658; You must be logged in to view this page.</span><br><br>";
		die();
	}
	
	echo "<div class='header' align='center'>PHP Quiz</div>";

	//while using "RAND() LIMIT 0,5" would be ineffecient for a large program
	//for an array of 20 variables it is very suitable and effecient
	$result = queryMysql ("SELECT DISTINCT * from questions ORDER BY RAND() LIMIT 0,7;");
	//this will make $num equal to the length of the array
	$num    = $result->num_rows;
?>
	
<form action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="post"><ol><?php
	for ($j = 0 ; $j < $num ; ++$j) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		//print out users name
		echo "<li><b>" . $row['question'] . "</b></br></li>";
		?><input type='radio' name="<?php echo $row['qNum'];?>" value='a' /><?php
		echo "<ans> " . $row['a'] . "</ans></br>";
		?><input type='radio' name="<?php echo $row['qNum'];?>" value='b' /><?php
		echo "<ans> " . $row['b'] . "</ans></br>";
		?><input type='radio' name="<?php echo $row['qNum'];?>" value='c' /><?php
		echo "<ans> " . $row['c'] . "</ans></br></br>";
	} 
	?><input type="submit" name="formSubmit" Value="Submit" />
	</ol></form>
	
<?php
	echo "<div class='header' align='k center'>Results</div><br>";
	
	$score = 0;
	
	//get the score for each 
	for ($i = 1; $i < 21; ++$i) {		
		$result = queryMysql("SELECT * FROM questions WHERE qNum='$i'");
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		if (isset ($_POST[$i]) && $_POST[$i] != $row['answer']) { 
			//$score+= 1; 
			echo "<span class='error'>&nbsp;Q$i \"". $row['question'].
				"\" was incorrect, the correct answer is: '".$row['answer']."'</span><br>"; 
		} else if (isset ($_POST[$i]) && $_POST[$i] == $row['answer']) {
			$score+=1;
			echo "<span class='correct'>&nbsp;Q$i was correct<br></span>";
		}
	}

	//create new connection
	$conn = new mysqli('localhost','a2user','a2339','db339');	
	$check = $conn->query("SELECT score FROM members WHERE user='$user'");
	$sql = ("UPDATE members SET score='$score' WHERE user='$user'");
	
	//put the old score into dbscore
	$rows = $check->fetch_assoc();
	$dbscore = $rows['score'];
	
	//if they beat their best score, store it in the database
	//this is also a requirement for part 3 (c)
	if ($score > $dbscore) {
		$conn->query($sql);
	}	

	//depending on how the user scored, display a comment regarding this.
	echo "<br>&nbsp;";
	if ($score == 0 || $score == 1) echo "Oh no, you got $score/$num correct. You should study some more before trying again";
	if ($score == 2 || $score == 1) echo "Keep trying! You got $score/$num correct. Study harder!";
	if ($score == 4 || $score == 5) echo "Almost there! You got $score/$num correct.";
	if ($score > 5) echo "<br>&nbsp;Great work! You got $score/$num correct.";
	
	//display best score
	if (!$dbscore==0) {
		if ($score < $dbscore) {
			echo "<p>&nbsp;Your best score is $dbscore.</p><br>";
		} else {
			echo "<p>&nbsp;Your best score is $score.</p><br>";
		}
	}
	$conn->close();
	
?>