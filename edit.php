<?php
require 'header.php';
require 'dbinfo.php';
require 'validation.php';
?>
<?php
session_start();
if(!isset($_SESSION['username']))
   header("location:login1.php");
 //udating  databases
$username=$_SESSION['username'];
$query="SELECT * from registration where username='$username'";
$resource=mysqli_query($conn,$query);
$profile=mysqli_fetch_assoc($resource); 

if($_POST["submit"])
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

//upadating the database by user                                                                                                       
  $sql="UPDATE registration
  SET username='$username',
  password='$password',
  repassword='$repassword',
  firstname='$firstname',
  midname='$midname',
  lastname='$lastname',
  sex='$sex',
  marital='$marital',
  dob='$dob',
  street='$street',
  city='$city',
  state='$state',
  zip='$zip',
  phone='$phone',
  email='$email',
  offstreet='$offstreet',
  offcity='$offcity',
  offstate='$offstate',
  offzip='$offzip',
  offphone='$offphone',
  offemail='$offemail',
  image='$image',
  website='$website'  where username='$username'";
 
  if (mysqli_query($conn, $sql)) 
  {
    echo "Record updated successfully";
  } 
else 
{
    echo "Error updating record: " . mysqli_error($conn);
}
 
}

?>
<!--HTML code for  upadating form-->
<div class="container">
    <form name="f" method="post" action="edit.php" >
    <h1 class="well" align="center">Registration Form</h1>
    <div class="col-lg-12 well">
    <div class="row">
         <div class="col-sm-12">
            <div class="row">
            <!--HTML Code for UserId and Password-->
              <div class="col-sm-4 form-group">
                <label>1.User Name</label>
                <input type="text" name="username" value="<?php echo $profile['username'] ?>" class="form-control">
              </div>
              <div class="col-sm-4 form-group">
                <label>2.Password</label>
                <input type="password" name="password" value="<?php echo $profile['password'] ?>" class="form-control"></p></br>
              </div>                         
                                          
                <div class="col-sm-4 form-group">
                <label>3.Retype Password</label>
                <input type="password" name="repassword" value="<?php echo $profile['repassword'] ?>"  class="form-control">
              </div>
            </div>
          </div>
     <!--HTML Code for Personal Information-->
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4 form-group">
                <label>4.First Name</label>
                <input type="text" name="firstname" value="<?php echo $profile['firstname'] ?>"  class="form-control">
              </div>
              <div class="col-sm-4 form-group">
                <label>5.Middle Name</label>
                <input type="text" name="midname" value="<?php echo $profile['midname'] ?>"  class="form-control"></p></br>
              </div>                         
                                           
              <div class="col-sm-4 form-group">
                <label>6.Last Name</label>
                <input type="text" name="lastname" value="<?php echo $profile['lastname'] ?>"  class="form-control">
              </div>
              </div>
          </div>

<div class="col-sm-12">
    <div class="row">
       <div class="col-sm-4 form-group">
        <label>7.Gender</label>                           
        <div class="radio">
        <label><input type="radio" name="sex" value="<?php echo $profile['sex'] ?>" >Male</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="sex" value="<?php echo $profile['sex'] ?>">Female</label>
        </div>
      </div>
      <div class="col-sm-4 form-group">
         <label>8.Marital Status</label>                           
         <div class="radio">
         <label><input type="radio" name="marital" value="<?php echo $profile['marital'] ?>">Maried</label>
         </div>
         <div class="radio">
         <label><input type="radio" name="marital" value="<?php echo $profile['marital'] ?>">Unmaried</label>
         </div>
      </div>
      <div class="col-sm-4 form-group">
         <label>9.Date of Birth</label>
         <input type="date" name="dob" value="<?php echo $profile['dob'] ?>" >
      </div>
   </div>
</div>                                
          <div class="col-sm-12">   
            <div class="row">
               <div class="col-sm-6 form-group">
               <!--HTML Code for Residence Address -->
                <h3><label>Residence Address</label></h4><br>
                <label>Street</label>
                <input type="text" name="street" value="<?php echo $profile['street'] ?>"  class="form-control">
                  
                <label>City</label>
                <input type="text" name="city" value="<?php echo $profile['city'] ?>" class="form-control">
                            
                <label>State</label>
                <input type="text" name="state" value="<?php echo $profile['state'] ?>" class="form-control">
                
                <label>Zip Code</label>
                <input type="text" name="zip" value="<?php echo $profile['zip'] ?>"  class="form-control">
                                
                <label>Phone Number</label>
                <input type="text" name="phone" value="<?php echo $profile['phone'] ?>" class="form-control">
            
                <label>Email Address</label>
                <input type="text" name="email" value="<?php echo $profile['email'] ?>"  class="form-control">
                </div>    
                <div class="col-sm-6 form-group">
                <!--HTML Code for Office Address-->
                <h3><label>Office Address</label></h3><br>
                <label>Street</label>
                <input type="text" name="offstreet" value="<?php echo $profile['offstreet'] ?>"  class="form-control">
                  
                <label>City</label>
                <input type="text" name="offcity" value="<?php echo $profile['offcity'] ?>"  class="form-control">
                            
                <label>State</label>
                <input type="text" name="offstate" value="<?php echo $profile['offstate'] ?>"  class="form-control">
                
                <label>Zip Code</label>
                <input type="text" name="offzip" value="<?php echo $profile['offzip'] ?>"  class="form-control">

                <label>Phone Number</label>
                <input type="text" name="offphone" value="<?php echo $profile['offphone'] ?>"  class="form-control">
            
                <label>Email Address</label>
                <input type="text" name="offemail" value="<?php echo $profile['offemail'] ?>"  class="form-control">
              </div>    
            </div>

            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Upload Image</label>
                <input type="file" name="image" value="<?php echo $profile['image'] ?>"  class="form-control">
              </div>
              <div class="col-sm-6 form-group">             
                  <label>Website</label>
                  <input type="text" name="website" value="<?php echo $profile['website'] ?>"  class="form-control">
              </div>
            </div>
  <div>
  <button type="submit" class="btn btn-default" name="submit" value="save">Save</button>       
  </div>
  </div>
  </form>
  </div>
  
<?php
//require 'footer.php';
?>