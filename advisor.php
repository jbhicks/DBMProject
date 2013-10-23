
<?php

require	'advisorlog.php';
require 'connect.php';

//checks to see if there is a session data 
// if there is then advisor can validate,
//get the gpa of the student print out the courses
// or log out, if not then will re-route so advisor can insert student's ID
if(loggedin()){
	$stud = getname();
	echo 'Welcome,<br> Student is: '.$stud.'<br> please select a command<br>';
	echo '<a href="validate.php">Validate student\'s degree</a><br>';
	echo '<a href="getgpa.php">Get student\'s GPA</a><br>';
	echo '<a href="advisprint.php"> Print Courses</a><br>';
	echo '<a href="logout.php">Logout</a><br>';
	
	}
else{
include 'studsearch.php';}


?>