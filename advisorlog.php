<?php

// used for the header upon log out
ob_start();
//keeping track of users using system
session_start();
//keep track of the current file using this
$current_file = $_SERVER['SCRIPT_NAME'];

//Checks to see if there is a student that is logged in to the system
function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	return true;
	}
	else{
		return false;
		}
}
//gets the name of the student the advisor searched for
function getname(){
	$stud_id = $_SESSION['user_id'];
	$query = "SELECT  `username` FROM  `students` WHERE  `student_id` =  '$stud_id'";	
	//echo $query;
	if($query_run = mysql_query($query)){
	if($query_result = mysql_result($query_run, 0, 'username')){
	//echo $query_result;
	return $query_result;
		}
	}
}

?>