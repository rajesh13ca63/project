<?php
require 'header.php';
require 'dbinfo.php';
?>
<?php
session_start();
if(!isset($_SESSION['username']))
   header("location:login1.php");
//connection establishment here
if(isset($_SESSION['username']))
{
$username = $_SESSION['username'];
if($_POST['submit'])
{
  $oldpassword=$_POST["oldpassword"];
  $newpassword=$_POST["newpassword"];
  $sql = "SELECT password from registration where username='$username' "; 
  $query = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($query);
  $oldpassworddb=$row['password'];
  if ($oldpassword == $oldpassworddb) {
    if (strlen($newpassword)>25||strlen($newpassword)<6) {
		 echo "Password must be betwwen 6 & 25";
		}else {
		$query = "UPDATE registration 
					SET password = '$newpassword', repassword='$newpassword' 
					WHERE username ='$username'";
		$res=mysqli_query($conn,$query);
		if($res)
		{
		 $error="successfull password changed";
		  header("location:home.php");
		}			
		}
		}
	else
		$error="oldpassword is not match";
	} 
 } 
  
?>
<!--html code here-->
<div class="container">
<div class="row">
     <aside class="col-sm-4" ></aside>
     <div class="col-sm-4">
       <div class="jumbotron" style="background-color: pink ">
 		<form  name="f" method="post" action="changepassword.php">
		  <div class="form-group">
		    <h2>Change Your Password</h2>
		    <label> <?php if($error) echo $error ?> </label>
		    <label>Old Password<input type="text" name="oldpassword" value="" class="form-control"></label>
		    <label>New Password<input type="password" name="newpassword" value="" class="form-control"></label>
		    <button type="submit" class="btn btn-default" name="submit" value="changpassword">Change</button>
 	      </div>  
 	    </form>
       </div>
      </div>
     </div>
</div>
<?php
require 'footer.php';
?>