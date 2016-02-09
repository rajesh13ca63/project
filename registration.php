<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require 'header.html';
require 'validation.php';
?>
<!--html code for rgistration form  -->
 <div class="container">
     <h1 class="well" align="center">Registration Form</h1>
     <div class="col-sm-12 well"> 
          <div class="row">
		       <div class="col-sm-12" id="errorDiv"></div>
		    </div>
        <form id="register"  method="post" action="" enctype="multipart/form-data"> <!--  onsubmit="return validateForm()">-->
   						<div class="row">
							<div class="col-sm-4 form-group">
								<label>1.User Name </label>
								<input type="text" name="username" id="username" value="<?php echo "{$_POST['username']}";?>" placeholder="User Name" class="form-control">
								<span class="error"> <span><div id="user"></div> </span> <?php echo $error['username'];?></span>
								<div id="user_exist"></div>
							</div>
							<div class="col-sm-4 form-group">
								<label>2.Password</label>
								<input type="password" name="password" id="password" value="<?php echo "{$_POST['password']}";?>" placeholder="Password" class="form-control">
								<span class="error"><span><div id="pass"></div></span> <?php echo $error['password'];?></span>
							</div>                         
                                      
                            <div class="col-sm-4 form-group">
                            	<label>3.Retype Password</label>
								<input type="password" name="repassword" id="repassword" value="<?php echo "{$_POST['repassword']}";?>" placeholder="Re-type Password" class="form-control">
								<span class="error"><span><div id="repass"></div></span> <?php echo $error['repassword'];?></span>
							</div>
						</div>
					
                    	<div class="row">
							<div class="col-sm-4 form-group">
								<label>4.First Name</label>
								<input type="text" name="firstname" id="firstname" value="<?php echo "{$_POST['firstname']}";?>" placeholder="First Name" class="form-control">
								<span class="error"><span><div id="fname"></div></span> <?php echo $error['firstname'];?></span>
							</div>
							<div class="col-sm-4 form-group">
								<label>5.Middle Name</label>
								<input type="text" name="midname" id="midname" value="<?php echo "{$_POST['midname']}";?>" placeholder="Middle Name" class="form-control">
								<span class="error"><div id="mname"></div> <?php echo $error['midname'];?></span>
							</div>                                       
                            <div class="col-sm-4 form-group">
                            	<label>6.Last Name</label>
								<input type="text" name="lastname" id="lastname" value="<?php echo "{$_POST['lastname']}";?>" placeholder="Last Name" class="form-control">
								<span class="error"><span><div id="lname"></div></span> <?php echo $error['lastname'];?></span>
							</div>
					    </div>
				
   <div class="row">
       <div class="col-sm-4 form-group">
          <label>7.Gender</label>                           
          <div class="radio"> <span><div id="sex"></div></span>
            <label><input type="radio" name="sex" id="sex" value="male" <?php if($_POST['sex']=="male") {echo "checked";}?> >Male</label>
            <span class="error">  <?php echo $error['sex'];?></span>
          </div>
          <div class="radio">
            <label><input type="radio" name="sex" id="sex" value="female" <?php if($_POST['sex']=="female") {echo "checked";}?>>Female</label>
          </div>
       </div>
       <div class="col-sm-4 form-group">
            <label>8.Marital Status</label><div id="mar"></div>                            
            <div class="radio">
               <label><input type="radio" name="marital" id="marital" value="maried" <?php if($_POST['marital']=="maried") {echo "checked";}?>>Maried</label>
            </div>
            <div class="radio"> 
               <label><input type="radio" name="marital" id="marital" value="unmaried" <?php if($_POST['marital']=="unmaried") {echo "checked";}?>>Unmaried</label>
               <span class="error"> <?php echo $error['marital'];?></span>
           </div>
           
       </div>
       <div class="col-sm-4 form-group">
         <label>9.Date of Birth</label>
         <input type="date" name="dob" id="dob" value=""><br>
         <span class="error"> <div id="db"></div> <?php echo $error['dob'];?></span>
      </div>
   </div>
            <!--Residence Address in Html form-->                  
						<div class="row">
						    <div class="col-sm-6 form-group">
							    <h3><label>Residence Address</label></h3><br>
							    <label>Street</label> 
							    <span class="error"><span><div id="st"></div></span> <?php echo $error['street'];?></span>
			                    <input type="text" name="street" id="street" value="<?php echo "{$_POST['street']}";?>" placeholder="Enter Street Address" class="form-control">
						   		
								<label>City</label> 
								<span class="error"> <div id="cty"></div> <?php echo $error['city'];?></span>	
								<input type="text" name="city" id="city" value="<?php echo "{$_POST['city']}";?>" placeholder="Enter City Name Here.." class="form-control">
													
								<label>State</label> <div id="stat"></div>
								<span class="error"> <?php echo $error['state'];?></span>
								<input type="text" name="state" id="state" value="<?php echo "{$_POST['state']}";?>" placeholder="Enter State Name Here.." class="form-control">
								
								<label>Zip Code</label><div id="zp"></div>
								<span class="error"> <?php echo $error['zip'];?></span>
								<input type="text" name="zip" id="zip" value="<?php echo "{$_POST['zip']}";?>" placeholder="Enter Zip Code Here.." class="form-control">
                                
                                <label>Phone Number</label><div id="ph"></div>
                                <span class="error"> <?php echo $error['phone'];?></span>
						        <input type="text" id="phone" name="phone" value="<?php echo "{$_POST['phone']}";?>" placeholder="Enter Phone Number Here.." class="form-control">
						        
						        <label>Email Address</label><div id="email_exist"></div> <div id="eamil_format"></div>
						        <span class="error"> <?php echo $error['email'];?></span>
						        <input type="text" id="email" name="email" value="<?php echo "{$_POST['email']}";?>" placeholder="Enter Email Address Here.." class="form-control">
						    </div>		
						<!--Office Addres in html form-->
						    <div class="col-sm-6 form-group">
							    <h3><label>Office Address</label></h3><br>
							    <label>Street</label><div id="st1"></div>
							    <span class="error"> <?php echo $error['offstreet'];?></span>
			                    <input type="text" name="offstreet" id="offstreet" value="<?php echo "{$_POST['offstreet']}";?>" placeholder="Enter Street Address" class="form-control">
						   		
								<label>City</label><div id="cty1"></div>
								<span class="error"> <?php echo $error['offcity'];?></span>
								<input type="text" name="offcity" id="offcity" value="<?php echo "{$_POST['offcity']}";?>" placeholder="Enter City Name Here.." class="form-control">
														
								<label>State</label><div id="stat1"></div>
								<span class="error"> <?php echo $error['offstate'];?></span>
								<input type="text" name="offstate" id="offstate" value="<?php echo "{$_POST['offstate']}";?>" placeholder="Enter State Name Here.." class="form-control">
								
								<label>Zip Code</label><div id="zp1"></div>
								<span class="error"> <?php echo $error['offzip'];?></span>
								<input type="text" name="offzip" id="offzip" value="<?php echo "{$_POST['offzip']}";?>" placeholder="Enter Zip Code Here.." class="form-control">
                                
								<label>Phone Number</label><div id="ph1"></div>
								<span class="error"> <?php echo $error['offphone'];?></span>
						        <input type="text" name="offphone" id="offphone" value="<?php echo "{$_POST['offphone']}";?>" placeholder="Enter Phone Number Here.." class="form-control">
						        
						        <label>Email Address</label><div id="eml1"></div>
						        <span class="error"> <?php echo $error['offemail'];?></span>
						        <input type="text" name="offemail" id="offemail" value="<?php echo "{$_POST['offemail']}";?>" placeholder="Enter Email Address Here.." class="form-control">
						    </div>		
						</div>
					<!--HTML Code for IMAGE And WebSite-->
						<div class="row">
							<div class="col-sm-3 form-group">
								<label>UploadImage</label><div id="im"></div>
								<input type="file" name="image" id="fileChooser"  class="form-control" >
							</div>
							<div class="col-sm-3 form-group"></div>
				     		<div class="col-sm-6 form-group">							
								<label>Website</label>
						        <input type="text" name="website" id="website" value="<?php echo "{$_POST['website']}";?>" placeholder="Enter Website Name Here.." class="form-control">
					        </div>
					    </div>
<div >
     <input type="submit" class="btn btn-primary" name="submit" value="submit" id="submit" >
</div>
</form>
</div>
</div>
<?php
require 'footer.php';
?>
