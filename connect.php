<?php
$conn_err ='Could not connect.';
$mysql_host ='mysql1.worldplanethosting.com';
$mysql_user ='dreyes1_admin';
$mysql_pasword ='utep!123';
$mysql_db ='dreyes1_school';

//Connection to the mysql server
if(!mysql_connect($mysql_host, $mysql_user, $mysql_pasword) || !mysql_select_db($mysql_db)){
	echo die($conn_err);
	}
	
?>