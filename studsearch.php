<?php
echo 'Welcome!<br>';
echo 'Please enter student\'s ID to get started<br>';

/*check to see 
if ID to database to check if student
exists
*/
if(isset($_POST['ID'])){
$user = $_POST['ID'];
/*Check to to see if there is a row
that has the matching ID or if 
the student exists
*/
if(!empty($user)){
		//save command we will sent to query
		$query = "SELECT  `student_id` FROM  `students` WHERE  `student_id` =  '$user'";
			//run query save the number of rows
		if($query_run = mysql_query($query)){
			$query_num_rows = mysql_num_rows($query_run); 
			/*since each student has unique usernames 
			then 0 means user name and password did not match
			*/
			if($query_num_rows == 0){
			echo 'Invalid ID';
			}
			/*one means there was a match
			*/
			else if($query_num_rows == 1){
			//get the ID number of the student
			$user_id = mysql_result($query_run,0,'student_id');
			//echo $user_id;
			/*re-directstudent to the student page
			so he can have his functionalities 
			but save his ID number to keep him logged in
			*/
			$_SESSION['user_id'] = $user_id;
			header('Location: advisor.php');
				}
		}
	}
	//person just hit enter without any information
	else{echo 'Insert student ID';}
}
?>
<form action="<?php echo $current_file; ?>" method ="POST">
Student ID: <input type="text" name="ID"><br>
<input type= "submit" value="Search">
</form>