<?php
require 'dbinfo.php';
    $username = $_POST['username'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$sex = $_POST['sex'];
	$marital = $_POST['marital'];
	$dob = $_POST['dob'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state =$_POST['state'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];


	if ($_POST['oper'] == 'edit') {			
		$query = "UPDATE registration
		          SET username = '$username',firstname = '$fname', lastname = '$lname',
		          sex = '$sex', marital ='$marital', dob = '$dob',
		          street = '$street', city = '$city', state = '$state',
		          phone = '$phone', email = '$email'
		          WHERE username = '$username'";

	}else if ($_POST['oper'] == 'del') {
		$query = "DELETE * 
		          FROM registration 
		          WHERE username = '$username' ";								
	}								
   
	if (!$result = mysqli_query($conn,$query)) {
		die("database connection failed " . mysqli_error($connection));
	}
?>
