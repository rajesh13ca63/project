<?php
require 'dbinfo.php';
//echo "databse insertion in ";
if($_POST["submit"]=="save")
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$repassword=$_POST["repassword"];
	$firstname=$_POST["firstname"];
	$midname=$_POST["midname"];
	$lastname=$_POST["lastname"];
	$sex=$_POST["sex"];
	$marital=$_POST["marital"];
	$dob=$_POST["dob"];
	$street=$_POST["street"];
	$city=$_POST["city"];
	$state=$_POST["state"];
	$zip=$_POST["zip"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];

	$offstreet=$_POST["offstreet"];
	$offcity=$_POST["offcity"];
	$offstate=$_POST["offstate"];
	$offzip=$_POST["offzip"];
	$offphone=$_POST["offphone"];
	$offemail=$_POST["offemail"];

	$company=$_POST["company"];
	$website=$_POST["website"];
	
    //inserting the data into the database
																																																					
	$s="INSERT into registration(username,password,repassword,firstname,midname,lastname,sex,marital,dob,street,city,state,zip,phone,email,offstreet,offcity,offstate,offzip,offphone,offemail,website) 
	values('$username','$password','$repassword','$firstname','$midname','$lastname','$sex','$marital','$dob','$street','$city','$state','$zip','$phone','$email','$offstreet','$offcity','$offstate','$offzip','$offphone','$offemail','$website')";
	
	if(mysql_query($s))
	{
		
		header("location:home.php");
	}
	else
	{
		echo mysql_error();
	}
}

?>