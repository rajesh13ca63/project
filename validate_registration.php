<?php

session_start();
require 'dbinfo.php';

          $nameReg = "/^[A-Za-z]+$/";
          $numberReg = "/^[0-9]+$/";
          $emailReg = "/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/";
          $error = Array();
   
		  $username = $_POST["user_name"];
		  $password = $_POST["pass_word"];
		  $repassword = $_POST["repass_word"];
		  $firstname = $_POST["first_name"];
		  $midname = $_POST["mid_name"];
		  $lastname = $_POST["last_name"];
		  $sex = $_POST["gender"];
		  $marital = $_POST["marital"];
		  $dob = $_POST["dob"];
		  $street = $_POST["street"];
		  $city = $_POST["city"];
		  $state = $_POST["state"];
		  $zip = $_POST["zip"];
		  $phone = $_POST["phone"];
		  $email = $_POST["email"];
		  $offstreet = $_POST["off_street"];
		  $offcity = $_POST["off_city"];
		  $offstate = $_POST["off_state"];
		  $offzip = $_POST["off_zip"];
		  $offphone = $_POST["off_phone"];
		  $offemail = $_POST["off_email"];
		  $image = $_POST["image"];
		  //$website = $_POST["website"];
		
	    //checking the username validation
	      
		    if (empty($username)) {
             $error['username'] = "UserName is required";
            }

		//checking password validation
		   if (empty($password)) {
		     $error['password'] = "* Password is required";
		   }

		   if (empty($repassword)) {
              $error['repassword'] = "* Repassword is required";
            }
   
        //User Name validation
		   if (empty($firstname)) {
		      $error['firstname'] = "* Name is required";
		      } elseif (!preg_match($nameReg,$firstname)) {
		      $error['firstname'] = "Only charatcers allowed in first name ";
		    }
   
         //middle name validation
           if (!preg_match($nameReg, $midname)) {
    		  $error['midname'] = "Only charatcers,are allowed";
  		    }
     
		//last name validation
			if (empty($lastname)) {
			     $error['lastname'] = "* Last Name is required";
			   }elseif (!preg_match($nameReg, $lastname)) {
			    $error['lastname'] = "Only charatcers are allowed in middle name";
		    }
   
        //gender validation
	          if (empty($sex)) {
	             $error['sex'] = "* Gender is required";
	          }

	    //validation of marital status and date of birth
	 		   if (empty($marital)) {
			      $error['marital'] = "* Marital Status is required";
			   }
			       
			  if (empty($dob)) {
			      $error['dob'] = "* DOB is required";
			   }

       //residence address street validation
		  if (empty($street)) {
		     $error['street'] = "*Street  can not be empty";
		   }
		  //  elseif (!preg_match($nameReg, $street)) {
		  //    $error['street'] = "Only charatcers,dot and space allowed in <b>Street</b>";
		  // }
 
       //residence address city validation
		  if (empty($city)) {
		       $error['city'] = "* this field can not be empty";
		    }  elseif (!preg_match($nameReg, $city)) {
		       $error['city'] = "Only charatcers,space is not allowed in <b>City</b>";
		    }

        //residence address state validation
		  if (empty($state)) {
		      $error['state'] = "* this field can not be empty";
		   }elseif (!preg_match($nameReg, $state)) {
		      $error['state'] = "Only charatcers,allowed";
		  }
  
	 	//residence address zipcode validation
		  if (empty($zip)) {
		      $error['zip'] = "* this field can not be empty";
		   }elseif (!preg_match("/^([0-9]{6})*$/", $zip)) { 
		      $error['zip'] = "Only digits(6) allowed in zipcode";
		  }
	    //residence contact no validation   
		  if (empty($phone)) {
		      $error['phone'] = "Phone no cannot be blank";
		  }elseif (!preg_match("/^([0-9]{10})*$/", $phone)) { 
		      $error['phone'] = "Only digits(10) allowed in contact number";
		  }

   		//Office address street validation
		  if (empty($offstreet)) {
		      $error['offstreet'] = "* this field can not be empty";
		   }elseif (!preg_match($nameReg, $offstreet)) {
		      $error['offstreet'] = "Only charatcers,dot and space allowed in <b>Street</b>";
		  }
   
    	//Office address city validation
		  if (empty($offcity)) {
		     $error['offcity'] = "* this field can not be empty";
		   } elseif (!preg_match($nameReg, $offcity)) {
		     $error['offcity'] = "Only charatcers,don't  space allowed in <b>City</b>";
		  }
	
    
        
   		//uploading image file to the server and its validation. 
		if ($imag=="") {
		     $error['image']="Please Select an Image";
		    }
		if ($_FILES['image']['name']) {
		    $imgvar = basename($_FILES['image']['name']);
		    $imagetype = pathinfo($imgvar, PATHINFO_EXTENSION);
		   
	    if($imagetype != "jpg" && $imagetype!="jpeg" && $imagetype!="png" && $imagetype!="gif") {
		      $error['image'] = "Invalid <b>image</b> type";
		}else {
		     move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/phpproject/new/$imgvar");
		    }
	    }
	       
  //if no any errors are found 
   if (empty($error)) {

        //data iserting into the database
 		$link=md5(uniqid(rand(),true));
                                                                                      
		$query="INSERT INTO registration (";
		$query.="username, password, repassword,";
		$query.="firstname, midname, lastname,";
		$query.="sex, marital, dob,";
		$query.="street, city, state, zip, phone, email,";
		$query.="offstreet, offcity, offstate, offzip, offphone, offemail,";
		$query.="image, website,link";

		$query.=") values (";
		$query.=" '$username', '$password', '$repassword', ";
		$query.=" '$firstname','$midname', '$lastname', ";
		$query.=" '$sex', '$marital', '$dob', ";
		$query.=" '$street', '$city', '$state', '$zip', '$phone', '$email', ";
	    $query.=" '$offstreet', '$offcity', '$offstate', '$offzip', '$offphone', '$offemail', ";
		$query.=" '$imgvar', '$website','$link' ";
		$query.=")";

       echo $query;
       exit;
    //sending the mail for account activation
	    $email=$_POST['email'];
	    $message="http://localhost/phpproject/new/activate.php?email=$email&reg_link=$link";
	    $res = mail ( $email, "activation link",$message);
        $result=mysqli_query($conn,$query);
	// checks for query error
		if(!$result) {
		   die("Database query failed");
		}else {
		  //echo "Successfully inserted data";
		if($res) {
		  $_SESSION['message'] = "Registration successfull! Please go to account and login";
		  header("location:PDF_activate_item(pdfdoc, id).php");
		  }
		}

     }//end of empty error
	      echo json_encode($error);  
    
?>
    