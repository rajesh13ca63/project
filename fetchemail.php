<?php
require 'dbinfo.php';
$query1="SELECT email from registration";
$query2="SELECT username from registration";
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
// fetching data
$getemail=array();
 while($row1=mysqli_fetch_assoc($result1))
{
	$getemail=$row1;
}
$getusername=array();
 while($row2=mysqli_fetch_assoc($result2))
{
	$getusername=$row2;
}
mysqli_free_result($result);
?>