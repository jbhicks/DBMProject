<?php
require 'connect.php';


function set($table_name, $credits, $grade){
	//get previous credits earned and attempted 
	$attempt = getCredAttempt($table_name);
	$earned = getCredEarned($table_name);
	//update credits earned and attempted
	updateCredAtempt($attempt,$credits,$table_name);
	updateCredEarned($earned, $grade,$credits,$table_name);
	//get updated credits earned and attempted 
	$attempt = getCredAttempt($table_name);
	$earned = getCredEarned($table_name);
	//do the math to get new GPA
	$new_gpa = $earned/$attempt;
	
	//Store the GPA into the database
	setGPA($new_gpa, $table_name);

}
//updates the credits the student has attempted
function updateCredAtempt($attempt,$credits, $username){
	//update credits attempted before storing back to database
	$attempt= $attempt+$credits;
	echo $attempt;
	//set cred attempted to new attempt
	setCredAttempted($attempt,$username);

}
//updates the credits the student has earned based on the grade the student received
function updateCredEarned($earned,$grade,$credits, $username){
	//Depending on grade the credits earned is calculated
	if($grade == 'A' || $grade == 'a'){
		$temp = $credits * 4;
		$earned = $earned+$temp;
	}
	elseif($grade == 'B' || $grade == 'b'){
		$temp = $credits * 3;
		$earned = $earned+$temp;	
	}	
	elseif($grade == 'C' || $grade == 'c'){
		$temp = $credits * 2;
		$earned = $earned+$temp;
	}
	elseif($grade == 'D' || $grade == 'D'){
		$temp = $credits * 1;
		$earned = $earned+$temp;
	}
	elseif($grade == 'F' || $grade == 'F'){
		$temp = $credits * 0;
		$earned = $earned+$temp;
	}
	
	setCredEarned($earned, $username);
}

//sets the credits earned to the database
function setCredEarned($earned, $username){
	//new query
	$query = "UPDATE `students` SET `cred earned`='$earned' WHERE `username` = '$username'";
	//run query
	if($query_run = mysql_query($query)){
	//success and go back to advisor.php page
	echo 'Success';
	echo '<br>'.$earned. '';
	}
}
//sets the credits attempted to the database
function setCredAttempted($attempt,$username){

	//new query
	$query = "UPDATE `students` SET `cred attempted`='$attempt' WHERE `username` = '$username'";
	//run query
	if($query_run = mysql_query($query)){
	//success used for debugging
	echo '<br>Success';
	}
}
//sets the new gpa to the database
function setGPA($new_gpa, $username){

	//new query
	$query = "UPDATE `students` SET `gpa`='$new_gpa' WHERE `username` = '$username'";
	//run query
	if($query_run = mysql_query($query)){
	//success
	echo 'Success';
	}
}
//used to get the credits earned from the database
function getCredEarned($username){
	$query = "SELECT `cred earned` FROM  `students` WHERE  `username` =  '$username'";
	//echo $query;
	if($query_run = mysql_query($query)){
		$cred_earned = mysql_result($query_run, 0, 'cred earned');
		return $cred_earned;
		
	}	
}
//used to get the credits attempted from the database
function getCredAttempt($username){
	$query = "SELECT  `cred attempted` FROM  `students` WHERE  `username` =  '$username'";
	//echo $query;
	if($query_run = mysql_query($query)){
		$cred_attempt = mysql_result($query_run, 0, 'cred attempted');
		return $cred_attempt;
	}
}


?>