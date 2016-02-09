<?php
session_start();
require("header.html");
require("dbinfo.php");
?>
<div class="container">
<div class="jumbotron">
<?php
	if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
			$_SESSION['message']="";
		} 

	if (isset($_GET['email']))	{	
//feching the activation link from database 
	$query="SELECT link FROM registration where email='{$_GET["email"]}'";
	$result=mysqli_query($conn,$query);
	$getcode=mysqli_fetch_assoc($result);
	//echo $getcode['link'];
//if reg_link is active then 
	if($getcode['link']==$_GET['reg_link'])
	{
		$query="UPDATE registration SET ";
		$query.="activate=1 ";
		$query.=" WHERE email='{$_GET['email']}' ";
		$result=mysqli_query($conn,$query);

		if (!$result) {
			die("Database query failed");
		}else {
			header("location:login1.php");
		}
	echo "account activated ";
	} 
	else {
		 echo "Please activate  your account loing your email";
		}			
//close connection 
	mysqli_free_result($result);

 }
?>
</div>
</div>
<?php include("footer.php");?>