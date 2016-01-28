<?php
require 'header.php';
require('dbinfo.php');
?>
<?php
	session_start();
	$error="";
	if(!$conn)
	{
		die("no db connection");
	}
	if($_POST['submit']=='Login')
	{
        $username=$_POST['username'];
		$password=$_POST['password'];
		$query2="SELECT * FROM registration WHERE username='$username' AND password='$password'";
		$result=mysqli_query($conn,$query2);
		$row=mysqli_fetch_assoc($result);
		if($result && $row)
		{
			if($password!=$row["password"])
				{
					echo "<center> Wrong password</center><br/>";
					$username=$_POST['username'];
				}
			$_SESSION["username"]=$username;
			   header("Location: home.php");
		}
		else 
			$error="Invalid Username/Password";
	}
if($_POST["submit"]=="SignUp") 
{
	header("location:registration.php");
}
?>
<div class="container">
<div class="row">
  <div class="col-sm-4"></div>
   <div class="col-sm-4" >
      <div class="jumbotron" style="background-color: pink ">
        <form role="form" name="f" method="post" action="">
           <div class="form-group">
              <label><h4>Profile Login </h4></label>
              <label><?php if(!empty($error)) echo $error;?></label>
              <label>Username<input type="text" name="username" value="" class="form-control"></label>
              <label>Password<input type="password" name="password" value="" class="form-control"></label>
            <div class="setcol">
               <button type="submit" class="btn btn-default" name="submit" value="Login">Login</button>
               &nbsp&nbsp<button type="submit" class="btn btn-default" name="submit" value="SignUp">SignUp</button>
            </div>
            <a href="forget.php" target="">Forggoten your password?</a>
           </div>
        </form>
      </div>
<div class="col-sm-4">
</div>
</div>
</div>
</div>
<?php
require 'footer.php';
?>

