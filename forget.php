<?php
require 'header.php';
require 'dbinfo.php';
require 'fetchemail.php';
?>
<?php
session_start();
$email=$_POST['email'];
$username=$_POST['username'];
$query="SELECT email from registration where username='$username' and email='$email'";

if(isset($_POST['submit']))
{
  $mess;
  foreach ($getemail as $key => $value) 
  {
    if($value == $_POST['email'])
    {
      $email=$_POST['email'];
      $password=md5(uniqid(rand(1,1000),true));;
      $changepassword="UPDATE user SET password='{$password}' WHERE email='{$email}'";
      $result=mysqli_query($conn,$changepassword);
//sending the password to user email      
      $res = mail ( $email, "activation link","Your new Password is {$password}");
    } 
    else
    {
      $mess= "Email ID not in database";
    }
  }
if(empty($mess))
{
$mess="<center>Password has been sent, please check your inbox </center>"; 
}
}
?>
<!--HTML code here-->
<div class="container">
    <div class="row">
        <aside class="col-sm-4" ></aside>
        <div class="col-sm-4 form-group">
        
      <div class="jumbotron" style="background-color:pink ">
        <form role="form" name="f" method="post" action="">
        <div class="form-group">
           <h2>Find your account</h2>
           <lable><?php echo $mess ?></lable>
           <label>Username<input type="text" name="username" value="" class="form-control"></label>
           <label>Emai ID<input type="text" name="email" value="" class="form-control"></label>
           <button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
        </div>  
      </div>
        </form>
     </div>
     </div>
     </div>
     </div>

<?php
require 'footer.php';
?>
