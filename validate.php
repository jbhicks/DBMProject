<?php
require 'connect.php';
require 'advisorlog.php';

if(isset($_POST['validate'])){
$username = getname();
//assign a value to validate
$valid = $_POST['validate'];

//Check to see the validate isnt empty
if(!empty($valid)){
	//new query
	$query = "UPDATE `students` SET `validated`='$valid' WHERE `username` = '$username'";
	//run query
	if($query_run = mysql_query($query)){
	//success and go back to advisor.php page
	echo 'Success';
	header('Location: advisor.php');
	}
	else{echo 'Failed ';}
	}
	else{
		echo 'Insert yes or no';
	}
}

?>


<form action="validate.php" method ="POST">
Validate student's degree? <br>
Validate: <br> <input type="text" name="validate"><br>
<input type= "submit" value="Validate"><br>
<?php echo '<a href="advisor.php">Main</a>'; ?>
</form>
