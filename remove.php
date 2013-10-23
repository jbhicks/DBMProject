<?php
require 'connect.php';
require 'sessiondata.php';

if(isset($_POST['course'])){
$table_name = getname();
//assign all courses a reference
$course = $_POST['course'];

//Check to see the courses aren't empty
if(!empty($course)){
	//new query
	$query = "DELETE FROM `$table_name` WHERE `Course`= '$course'";
	//run query
	if($query_run = mysql_query($query)){
	//success and go back to student.php page
	echo 'Success';
	header('Location: student.php');
	}
	else{echo 'Failed Class does not exist';}
	}
	else{
		echo 'Insert classes to remove';
	}
}


?>

<form action="remove.php" method ="POST">
Insert course you want to remove<br>
Course: <br> <input type="text" name="course"><br>
<input type= "submit" value="Remove"><br>
<?php echo '<a href="student.php">Main</a>'; ?>
</form>