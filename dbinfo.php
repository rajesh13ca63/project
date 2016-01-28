<?php
$db_username = "rajesh";
$db_password = "Mindfire";
$db_database = "demo";
$conn=mysqli_connect("localhost",$db_username,$db_password,$db_database);
//checking database connection here
if(mysqli_connect_errno())
{
	die("Database connection failed : ".mysqli_connect_error()."and error nnumber".mysqli_connect_errno());
}
?>