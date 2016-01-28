<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require 'header.php';
require 'validation.php';
?>
<!--html code for rgistration form-->
 <div class="container">
 <div class="col-sm-12">
    <div class="row">
     <h1 class="well" align="center">Registration Form</h1>
  	 <form name="f" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>1.User Name *</label>
								<input type="text" name="username" value="<?php echo "{$_POST['username']}";?>" placeholder="User Name" class="form-control">
								<span class="error"> <?php echo $error['username'];?></span>
							</div>
							<div class="col-sm-4 form-group">
								<label>2.Password</label>
								<input type="password" name="password" value="<?php echo "{$_POST['password']}";?>" placeholder="Password" class="form-control">
								<span class="error"> <?php echo $error['password'];?></span>
							</div>                         
                                      
                            <div class="col-sm-4 form-group">
                            	<label>3.Retype Password</label>
								<input type="password" name="repassword" value="<?php echo "{$_POST['repassword']}";?>" placeholder="Re-type Password" class="form-control">
								<span class="error"> <?php echo $error['repassword'];?></span>
							</div>
						</div>
					</div>
                    <div class="col-sm-12 form-group">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>4.First Name</label>
								<input type="text" name="firstname" value="<?php echo "{$_POST['firstname']}";?>" placeholder="First Name" class="form-control">
								<span class="error"> <?php echo $firstname_Err;?></span>
							</div>
							<div class="col-sm-4 form-group">
								<label>5.Middle Name</label>
								<input type="text" name="midname" value="<?php echo "{$_POST['midname']}";?>" placeholder="Middle Name" class="form-control">
								<span class="error"> <?php echo $error['midname'];?></span>
							</div>                                       
                            <div class="col-sm-4 form-group">
                            	<label>6.Last Name</label>
								<input type="text" name="lastname" value="<?php echo "{$_POST['lastname']}";?>" placeholder="Last Name" class="form-control">
								<span class="error"> <?php echo $error['lastname'];?></span>
							</div>
					    </div>
					</div>
<div class="col-sm-12 form-group">
    <div class="row">
       <div class="col-sm-4 form-group">
          <label>7.Gender</label>                           
          <div class="radio">
          <label><input type="radio" name="sex" value="male" <?php if($_POST['sex']=="male") {echo "checked";}?> >Male</label>
          <span class="error"> <?php echo $error['sex'];?></span>
        </div>
        <div class="radio">
            <label><input type="radio" name="sex" value="female" <?php if($_POST['sex']=="female") {echo "checked";}?>>Female</label>
        </div>
       </div>
    <div class="col-sm-4 form-group">
            <label>8.Marital Status</label>                           
            <div class="radio">
            <label><input type="radio" name="marital" value="maried" <?php if($_POST['marital']=="maried") {echo "checked";}?>>Maried</label>
         </div>
         <div class="radio">
            <label><input type="radio" name="marital" value="unmaried" <?php if($_POST['marital']=="unmaried") {echo "checked";}?>>Unmaried</label>
            <span class="error"> <?php echo $error['marital'];?></span>
         </div>
      </div>
      <div class="col-sm-4 form-group">
         <label>9.Date of Birth</label>
         <input type="date" name="dob" value=""><br>
         <span class="error"> <?php echo $error['dob'];?></span>
      </div>
   </div>
</div>              <!--Residence Address in Html form-->                  
					<div class="col-sm-12">		
						<div class="row">
						   <div class="col-sm-6 form-group">
							    <h3><label>Residence Address</label></h3><br>
							    <label>Street</label>
			                    <input type="text" name="street" value="<?php echo "{$_POST['street']}";?>" placeholder="Enter Street Address" class="form-control">
						   		
								<label>City</label><span class="error"> <?php echo $error['street'];?></span>
								<input type="text" name="city" value="<?php echo "{$_POST['city']}";?>" placeholder="Enter City Name Here.." class="form-control">
								<span class="error"> <?php echo $error['city'];?></span>						
								<label>State</label>
								<input type="text" name="state" value="<?php echo "{$_POST['state']}";?>" placeholder="Enter State Name Here.." class="form-control">
								<span class="error"> <?php echo $error['state'];?></span>
								<label>Zip Code</label>
								<input type="text" name="zip" value="<?php echo "{$_POST['zip']}";?>" placeholder="Enter Zip Code Here.." class="form-control">
                                <span class="error"> <?php echo $error['zip'];?></span>
                                <label>Phone Number</label>
						        <input type="text" name="phone" value="<?php echo "{$_POST['hpone']}";?>" placeholder="Enter Phone Number Here.." class="form-control">
						        <span class="error"> <?php echo $error['phone'];?></span>
						        <label>Email Address</label>
						        <input type="text" name="email" value="<?php echo "{$_POST['email']}";?>" placeholder="Enter Email Address Here.." class="form-control">
						        <span class="error"> <?php echo $error['email'];?></span>
						</div>		
						<!--Office Addres in html form-->
						    <div class="col-sm-6 form-group">
							    <h3><label>Office Address</label></h3><br>
							    <label>Street</label>
			                    <input type="text" name="offstreet" value="<?php echo "{$_POST['offstreet']}";?>" placeholder="Enter Street Address" class="form-control">
						   		<span class="error"> <?php echo $error['offstreet'];?></span>
								<label>City</label>
								<input type="text" name="offcity" value="<?php echo "{$_POST['offcity']}";?>" placeholder="Enter City Name Here.." class="form-control">
								<span class="error"> <?php echo $error['offcity'];?></span>						
								<label>State</label>
								<input type="text" name="offstate" value="<?php echo "{$_POST['offstate']}";?>" placeholder="Enter State Name Here.." class="form-control">
								<span class="error"> <?php echo $error['offstate'];?></span>
								<label>Zip Code</label>
								<input type="text" name="offzip" value="<?php echo "{$_POST['offzip']}";?>" placeholder="Enter Zip Code Here.." class="form-control">
                                <span class="error"> <?php echo $error['offzip'];?></span>
								<label>Phone Number</label>
						        <input type="text" name="offphone" value="<?php echo "{$_POST['offphone']}";?>" placeholder="Enter Phone Number Here.." class="form-control">
						        <span class="error"> <?php echo $error['offphone'];?></span>
						        <label>Email Address</label>
						        <input type="text" name="offemail" value="<?php echo "{$_POST['offemail']}";?>" placeholder="Enter Email Address Here.." class="form-control">
						        <span class="error"> <?php echo $error['offemail'];?></span>
							</div>		
						</div>

						<div class="row">
							<div class="col-sm-3 form-group">
								<label>UploadImage</label>
								<input type="file" name="image" value="" placeholder="Enter Company Name Here.." class="form-control">
							</div>
							<div class="col-sm-3 form-group"></div>
				     		<div class="col-sm-6 form-group">							
								<label>Website</label>
						        <input type="text" name="website" value="<?php echo "{$_POST['website']}";?>" placeholder="Enter Website Name Here.." class="form-control">
					        </div>
					    </div>
<div >
<button type="submit" class="btn btn-default" name="submit" value="save">Submit</button>
</div>
</div>
</div>
</form>
</div>
<?php
require 'footer.php';
?>
