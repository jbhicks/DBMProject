
<?php

require 'sessiondata.php';
require 'connect.php';
//remove all courses failed destroy the session data and return to the main menu
removefail();
session_destroy();
header('Location: project.php');
//remove all courses failed from the database
function removefail(){
$file_name=getname();
	//new query
	$query = "DELETE FROM `$file_name` WHERE `Grade`='F'";
	//run query
	if($query_run = mysql_query($query)){
	//success and go back to student.php page
	echo 'Success';
	}

}
?>