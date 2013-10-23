<?php
require 'connect.php';
require 'sessiondata.php';
require 'grades.php';

//after student inserts data for the course they want to add
if(isset($_POST['course']) && isset($_POST['title']) && isset($_POST['credits']) 
	&& isset($_POST['grade']) && isset($_POST['sem_taken'])){
$table_name = getname();
//assign all courses a reference
$course = $_POST['course'];
$title= $_POST['title'];
$credits = $_POST['credits'];
$grade = $_POST['grade'];
$sem_taken = $_POST['sem_taken'];
//Check to see the courses aren't empty
if(!empty($course) && !empty($title) && !empty($credits)
	&& !empty($grade) && !empty($sem_taken)){
	//new query
	$query = "INSERT INTO `$table_name` Values  ('','".mysql_real_escape_string($course)."','".mysql_real_escape_string($title)."','".mysql_real_escape_string($credits)."','".mysql_real_escape_string($grade)."','".mysql_real_escape_string($sem_taken)."')";
	//run query
	if($query_run = mysql_query($query)){
	//success and go back to student.php page
	echo 'Success';
	set($table_name, $credits, $grade);
	header('Location: student.php');
	}
	else{echo 'Failed';}
	}
	else{
		echo 'Insert classes to add';
	}
}

?>

<form action="add.php" method ="POST">
Course:<br> <input type="text" name="course"><br>
Title:<br> <input type="text" name="title"><br>
Credit Hours:<br> <input type="text" name="credits"><br>
Grade:<br> <input type="text" name="grade"><br>
Semester Taken:<br> <input type="text" name="sem_taken"><br>
<input type= "submit" value="Add"><br>
<?php echo '<a href="student.php">Main</a>'; ?>
</form>