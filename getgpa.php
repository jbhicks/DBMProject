<?php
require 'connect.php';
require 'advisorlog.php';
	//gets the GPA for student advisor is advising
	$stud_id = $_SESSION['user_id'];
	$query = "SELECT  `gpa` FROM  `students` WHERE  `student_id` =  '$stud_id'";
	//echo $query;
	if($query_run = mysql_query($query)){
	if($query_result = mysql_result($query_run, 0, 'gpa')){
	echo 'Student\'s GPA is: ' .$query_result. '<br>';
	echo '<a href="advisor.php">Main</a><br>';
		}
	}




?>