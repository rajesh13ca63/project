<?php
require 'header.php';
?>
<?php
	session_start();
	//require('dbinfo.php');
	
	$db=mysqli_connect("localhost","rajesh","Mindfire","demo");
	//mysql_select_db("demo");

	if(!$db)
	{
		die("no db connection");
	}

	if($_POST['submit']=='Login')
	{

		$username=$_POST['username'];
		$password=$_POST['password'];

		/*$query="SELECT * FROM registration WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db,$query);
		if($result && $rows=mysqli_fetch_assoc($result))
		{
			$_SESSION["username"]=$username;
			 header("Location: home.php");
		}
		else echo "error";*/
		if($username=="rajesh" and $password=="gupta")
		{
			$_SESSION['username']=$username;
			$_SESSION['aut']=true;
			header("location:home.php");
		}
		else
		 echo "Invalid username/password";
	}

if($_POST["submit"]=="SignUp") 
{
	header("location:project.php");
}

?>

<div class="container">
<div class="jumbotron">
<div class="row">
<div class="col-sm-7">
<img src="photo.jpg" align="left" height="230" width="250" border="3">
</div>
<div class="col-sm-5" >
<div class="jumbotron" style="background-color: pink ">
<form role="form" name="f" method="post" action="">
<div class="form-group">
<label><h4>Profile Login </h4></label>
<label>Username<input type="text" name="username" value="" class="form-control"></label>
<label>Password<input type="password" name="password" value="" class="form-control"></label>

<div class="setcol">
    <button type="submit" class="btn btn-default" name="submit" value="Login">Login</button>
    &nbsp&nbsp<button type="submit" class="btn btn-default" name="submit" value="SignUp">SignUp</button>
</div>
<a href="forget.php" target="">Forggoten your password?
</div>
</form>
</div>





