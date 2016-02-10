<?php
session_start();
require 'header.php';
require 'dbinfo.php';
if($_SESSION['username'])
{
	$username=$_SESSION['username'];
	$query="SELECT * FROM registration WHERE username='$username' ";
	$result=mysqli_query($conn, $query);
	if ($result && $rows = mysqli_fetch_assoc($result)) {
		$username = trim($rows['username']);
		$firstname = trim($rows["firstname"]);
		$lastname = trim($rows["lastname"]);
		$midname = trim($rows["midname"]);
		$phone = trim($rows["phone"]);
		$sex = trim($rows["sex"]);
		$marital = trim($rows["marital"]);
		$dob = trim($rows["dob"]);
		$street = trim($rows["street"]);
		$city = trim($rows["city"]);
		$state = trim($rows["state"]);
		$zip = trim($rows["zip"]);
		$email = trim($rows['email']);

		$offstreet = trim($rows["offstreet"]);
		$offcity = trim($rows["offcity"]);
		$offstate = trim($rows["offstate"]);
		$offzip = trim($rows["offzip"]);
		$offphone = trim($rows["offphone"]);
		$offemail = trim($rows["offemail"]);

        //$comment = addslashes(trim($rows["comment"]));
		$image = trim($rows['image']);			     
	}else {
		echo "Error: " . $query . "<br>" . mysqli_error($connection);
	}

}else {
	header("Location: login1.php");
}

?>
<div class="container">
  <h2 class="well"  align="center"> Personal Information &nbsp &nbsp &nbsp<a href="home.php">Home</a></h2>
      <div class="col-lg-12 well">
              	<div class="row">
					<div class="col-sm-3 form-group">
						<label>First Name:</label>
						<label><?php echo $firstname; ?></label><br/>
						<label>Marital Status:</label>
						<label><?php echo $marital; ?></label>
					</div>
					<div class="col-sm-3 form-group">
						<label>Last Name:</label>
						<label><?php echo $lastname; ?></label><br/>
						<label>Gender:</label>
						<label><?php echo $sex; ?></label>
					</div>
					<div class="col-sm-3 form-group">
						<label>Username:</label>
						<label><?php echo $username; ?></label><br/>
						<label>DOB:</label>
						<label><?php echo $dob; ?></label>
					</div>
					<div class="col-sm-3">
							<img id="blah" src="<?php echo $image; ?>" alt="your image" width="100%"/>-
					</div>
				</div>

			<div class="row">
			        <div class="col-sm-6 form-group">
				        <h3>Residential Address</h3>
				        <div>
				    	<label>Street:</label>
						<label><?php echo $street; ?></label>
					    </div>
					    <div>
					    <label>City  :</label>
						<label><?php echo $city; ?></label>
					    </div>
					    <div>
						<label>State :</label>
						<label><?php echo $state; ?></label>
				        </div>
				        <div>
						<label>Zip   :</label>
						<label><?php echo $zip; ?></label>
					    </div>
					    <div>
					    <label>Phone no   :</label>
						<label><?php echo $phone; ?></label>
					    </div>
					    <div>
						<label>Email ID   :</label>
						<label><?php echo $email; ?></label>
						</div>
					</div>
  				    <div class="col-sm-6 form-group">
					    <h3>Office Address</h3>
					    <div>
						<label>Street:</label>
						<label><?php echo $offstreet; ?></label>
					    </div>
					    <div>
						<label>City  :</label>
						<label><?php echo $offcity; ?></label>
					    </div>
					    <div>
						<label>State :</label>
						<label><?php echo $offstate; ?></label>
					    </div>
					    <div>
						<label>Zip   :</label>
						<label><?php echo $offzip; ?></label>
					    </div>
					    <div>
						<label>Phone no   :</label>
						<label><?php echo $offphone; ?></label>
					    </div>
					    <div>
						<label>Email Id   :</label>
						<label><?php echo $offemail; ?></label>
						</div>
					</div>
				</div><!-- end of the address -->
		
				<div class="row">
				</div>
	</div>
	</div>
</div>
<?php
require 'footer.php';
?>