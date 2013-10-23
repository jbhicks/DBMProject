<?php

require 'connect.php';
require 'advisorlog.php';
//get the name of the student
$studname = getname();
//select it from the query
$query = "SELECT * FROM `$studname` ORDER BY 'ID'";
//run the query and print out to the screen
if($query_data = mysql_query($query)){
	
	while($info = mysql_fetch_array($query_data)) 
 { 
	echo "<b>Course:</b> ".$info['Course'] . " "; 
	echo "<b>Title:</b> ".$info['Title'] . " "; 
	echo "<b>Credit Hours:</b>".$info['Credit Hours'] . "  "; 
	echo "<b>Grade:</b> ".$info['Grade'] . " "; 
	echo "<b>Semester Taken:</b> ".$info['Semester Taken'] . "<br> "; 
 }
		
}
	else{echo 'Query Failed.';}

	echo '<a href="advisor.php">Main</a><br>';
?>