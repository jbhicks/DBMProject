
<?php
echo 'Welcome!<br>';
echo 'Please log in to get started<br>';

/*check to see 
if username and password have been
set before submiting to database to check if
both are correct
*/
if(isset($_POST['username']) && isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
/*Check to to see if there is a row
that has the matching password and username combination
if there is that is the student we are looking for
*/
if(!empty($username) && !empty($password)){
		//save command we will sent to query
		$query = "SELECT  `student_id` FROM  `students` WHERE  `username` =  '$username' AND  `password` =  '$password'";
			//run query save the number of rows
		if($query_run = mysql_query($query)){
			$query_num_rows = mysql_num_rows($query_run); 
			/*since each student has unique usernames 
			then 0 means user name and password did not match
			*/
			if($query_num_rows == 0){
			echo 'Invalid username/password combination';
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
			header('Location: student.php');
				}
		}
	}
	//person just hit enter without any information
	else{echo 'Insert username and password';}
}
?>
<form action="<?php echo $current_file; ?>" method ="POST">
Username: <input type="text" name="username" required><br>
Password: <input type="password" name="password" required><br>
<input type= "submit" value="Log in">
</form>
