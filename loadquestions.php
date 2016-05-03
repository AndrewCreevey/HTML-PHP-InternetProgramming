<!-- Andrew Creevey, 12236284, Assignment 2 
---- This file is used to load all the questions into the table.
--->

<?php

	$conn = new mysqli('localhost','a2user','a2339','db339');
	$matrix[] = array();
	
	//question 1
	$matrix[1] = array('1','What does PHP stand for?','Personal Hypertext Processor',
	'PHP: Hypertext PreProcessor','Private Home Page','b');
	$string = "'" . implode("','", $matrix[1]) . "'";
	$conn->query("INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 2
	$matrix[2] = array('2','What does CSS stand for?','Creative Style Sheets',
	'Computer Style Sheets','Cascading Style Sheets','c');
	$string = "'" . implode("','", $matrix[2]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");

	//question 3
	$matrix[3] = array('3','How do you write "Hello World" in PHP?','"Hello World";',
	'echo "Hello World";','Document.Write("Hello World");','b');
	$string = "'" . implode("','", $matrix[3]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 4
	$matrix[4] = array('4','All variables in PHP start with which symbol?','!',
	'&','$','c');
	$string = "'" . implode("','", $matrix[4]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question ,a, b, c, answer) VALUES ($string)");
	
	//question 5
	$matrix[5] = array('5','What is the correct way to concanenate a PHP statement?',';',
	'.',',','b');
	$string = "'" . implode("','", $matrix[5]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 6
	$matrix[6] = array('6','How do you get information from a form that is submitted using the "get" method?',
	'Request.Form;','$_GET[];','Request.QueryString;','b');
	$string = "'" . implode("','", $matrix[6]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 7
	$matrix[7] = array('7','What is the correct way to create a function in PHP?','function myFunction()',
	'new_function myFunction()','create myFunction()','a');
	$string = "'" . implode("','", $matrix[7]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 8
	$matrix[8] = array('8','What is the correct way to add 1 to the $count variable?','count++;',
	'$count++;','$count =+1;','b');
	$string = "'" . implode("','", $matrix[8]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 9
	$matrix[9] = array('9','Which one of these variables has an illegal name?','$myVar',
	'$my-Var','$my_Var','b');
	$string = "'" . implode("','", $matrix[9]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 10
	$matrix[10] = array('10','How do you create an array in PHP?','$cars = array["Volvo", "BMW", "Toyota"];',
	'$cars = "Volvo", "BMW", "Toyota";','$cars = array("Volvo", "BMW", "Toyota");','c');
	$string = "'" . implode("','", $matrix[10]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 11
	$matrix[11] = array('11','Which operator is used to compare two values?','!=',
	'=','==','c');
	$string = "'" . implode("','", $matrix[11]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 12
	$matrix[12] = array('12','What does SQL stand for?','Strong Question Language',
	'Structured Question Language','Structured Query Language','c');
	$string = "'" . implode("','", $matrix[12]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 13
	$matrix[13] = array('13','Which SQL statement is used to insert new data in a database?','INSERT INTO',
	'INSERT NEW','ADD NEW','a');
	$string = "'" . implode("','", $matrix[13]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 14
	$matrix[14] = array('14','Which SQL statement is used to update data in a database?','SAVE',
	'UPDATE','SAVE AS','b');
	$string = "'" . implode("','", $matrix[14]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 15
	$matrix[15] = array('15','Which SQL statement is used to delete data from a database?','COLLAPSE',
	'DELETE','REMOVE','b');
	$string = "'" . implode("','", $matrix[15]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 16
	$matrix[16] = array('16','With SQL, how do you select a column named "FirstName" from a table named "Persons"? ',
	'SELECT FirstName FROM Persons','EXTRACT FirstName FROM Persons','SELECT Persons.FirstName','a');
	$string = "'" . implode("','", $matrix[16]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 17
	$matrix[17] = array('17','With SQL, how do you select all the columns from a table named "Persons"?',
	'SELECT * FROM Persons','SELECT Persons','SELECT *.Persons','a');
	$string = "'" . implode("','", $matrix[17]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 
	$matrix[18] = array('18','With SQL, how do you select all the records from a table named "Persons" where 
	the "FirstName" is "Peter" and the "LastName" is "Jackson"?',
	'SELECT FirstName="Peter", LastName="Jackson" FROM Persons',
	'SELECT * FROM Persons WHERE FirstName="Peter" AND LastName="Jackson"',
	'SELECT * FROM Persons WHERE FirstName<>"Peter" AND LastName<>"Jackson"','b');
	$string = "'" . implode("','", $matrix[18]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 
	$matrix[19] = array('19','Which SQL statement is used to return only different values?',
	'SELECT UNIQUE','SELECT DIFFERENT','SELECT DISTINCT','c');
	$string = "'" . implode("','", $matrix[19]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	//question 
	$matrix[20] = array('20','With SQL, how can you insert a new record into the "Persons" table?',
	'INSERT ("Jimmy", "Jackson") INTO Persons',
	'INSERT INTO Persons VALUES ("Jimmy", "Jackson")',
	'INSERT VALUES ("Jimmy", "Jackson") INTO Persons	','b');
	$string = "'" . implode("','", $matrix[20]) . "'";
	$conn->query(" INSERT INTO questions (qNum, question, a, b, c, answer) VALUES ($string)");
	
	$conn->close();
?>