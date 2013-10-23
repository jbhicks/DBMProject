
<?php

require	'sessiondata.php';
require 'connect.php';

/*Checks to see if there is an existing session data
already in existence for that student if there is 
then student can add, remove, print or log out.
If not then page is re-routed to have student be able 
to log in
*/
if(loggedin()){

	if(validated()){
	echo 'You\'re degree plan has not been validated please contact your advisor<br>';
	echo '<a href="logout.php">Logout</a>';
	}
	else{
	$user_name = getname();
	echo 'Welcome, '.$user_name.' please select a command<br>';
	echo '<a href="add.php">Add Course</a><br>';
	echo '<a href="remove.php">Remove Courses</a><br>';
	echo '<a href="print.php"> Print Courses</a><br>';
	echo '<a href="logout.php">Logout</a><br>';
	
	}
}
else{
include 'studentlogin.php';}

?>
