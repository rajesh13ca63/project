<?php
require 'header.php';
require 'dbinfo.php';
?>
<div class="container">
    <form name="f" method="post" action="home.php">
    <h1 class="well" align="center">Home Profile Page</h1>
    <div class="col-lg-12 well">
	    <div class="row">         
	        <div class="col-sm-3">        		
              <button type="submit" name="submit" class="btn btn-primary" value="ShowProfile">ShowProfile</button>
	        </div>		
	        <div class="col-sm-3">        	
               <button type="submit" name="submit" class="btn btn-primary" value="Edit Profile">Edit Profile</button>
	        </div>	
	        <div class="col-sm-3">
	           <button type="submit" name="submit" class="btn btn-primary" value="changepassword">Change Password</button>
	        </div>		
	        <div class="col-sm-3">        	
               <button type="submit" name="submit" class="btn btn-primary" value="Logout">Logout</button>
	        </div>	 		
	    </div>
	</div>
    </form>
</div>
<?php
session_start();
if(!isset($_SESSION['username']))
   header("location:login1.php");
//redirect to the one page to another page
if(isset($_SESSION['username']))
{
if($_POST["submit"]=="changepassword")
{
	header("location:changepassword.php");
}
//Edit the profile
if($_POST["submit"]=="Edit Profile")
{
	header("location:edit.php");
}
//logout from the home page
if($_POST["submit"]=="Logout")
{
	header("location:logout.php");
}
//showing the all record from database
if($_POST["submit"]=="ShowProfile")
 {
    header ("location:detail.php");

	/*$username=$_SESSION['username'];
 	$query="SELECT * from registration where username='$username'";
	$resource=mysqli_query($query);
	$row=mysqli_fetch_assoc($resource);
   //$count=mysqli_num_rows($resource);
   //showing the personal information
   echo "<h3>";
    echo "<b>username:</b>".$row[0]."<br/>";
    echo "<b>Name:</b>".$row[3]."<br/>";
	echo "<b>Gender:</b>".$row[6]."<br/>";
	echo "<b>Marital:<b>".$row[7]."<br/>";
	echo "DOB:".$row[8];
	echo "<br>";
	echo "Street:".$row[9]."<br/>";
	echo "City:" .$row[10]."<br/>";
	echo "State:".$row[11]."<br/>";
	echo "Zip Code:".$row[12]."<br/>";
	echo "Phone:".$row[13]."<br/>";
	echo "Email:".$row[14]."<br/>";
	echo "OffStreet:".$row[15]."<br>";
	echo "OffCity:".$row[16]."<br/>";
	echo "OffState:".$row[17]."<br/>";
	echo "OffZip:".$row[18]."<br/>";
	echo "OffPhone:".$row[19]."<br/>";
	echo "OffEmail:".$row[20]."<br/>";
	echo "Company:".$row[21]."<br/>";
	echo "Website:".$row[22]."<br/>";
    echo "</h3>"  ;*/
   }
}
?>
<?php
//require 'footer.php';
?>
