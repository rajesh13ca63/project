<?php
 session_start();
 error_reporting(E_ALL);
//ini_set('display_errors', 1);
  require 'dbinfo.php';
  //declaring an empty array and store all the errors 
             
    if ($_POST['submit']) {
             $error= Array();
            
            //validation of user name and password
            if (empty($_POST['username'])) {
             $error['username'] = "* UserName is required";
            }

             //checking password validation
             if (empty($_POST['password'])) {
               $error['password']= "* Password is required";
             }
          
            //repassword condition checking here
            if (empty($_POST['repassword'])) {
               $error['repassword'] = "* Repassword is required";
             }

          //first name validation
            if (empty($_POST['firstname'])) {
             $error['firstname'] = "* Name is required";
            } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST['firstname'])) {
            $error['firstname'] = "Only charatcers allowed in <b>first name</b>";
            }
   
           //middle name validation
            if (!preg_match("/^[a-zA-Z .]*$/", $_POST['midname'])) {
              $error['midname'] = "Only charatcers,dot and space allowed in <b>middle name</b>";
            }

           //last name validation
           if (empty($_POST['lastname'])) {
               $error['lastname'] = "* Last Name is required";
            }elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['lastname'])) {
              $error['lastname'] = "Only charatcers,dot and space allowed in <b>middle name</b>";
            }
   
            //gender validation
            if (empty($_POST['sex'])) {
               $error['sex'] = "* Gender is required";
            }
             
            //validation of marital status and date of birth
            if (empty($_POST['marital'])) {
               $error['marital'] = "* Marital Status is required";
            }
         
            if (empty($_POST['dob'])) {
               $error['dob'] = "* DOB is required";
             }

           //residence address street validation
            if (empty($_POST['street'])) {
               $error['street'] = "* this field can not be empty";
            } 
             elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['street'])) {
              $error['street'] = "Only charatcers,dot and space allowed in <b>Street</b>";
            }

           //residence address city validation
            if (empty($_POST['city'])) {
               $error['city'] = "* this field can not be empty";
            } 
             elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['city'])) {
              $error['city'] = "Only charatcers,don't  space allowed in <b>City</b>";
            }

           //residence address state validation
            if (empty($_POST['state'])) {
               $error['state'] = "* this field can not be empty";
             }elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['state'])) {
              $error['state'] = "Only charatcers,don't  space allowed in <b>State</b>";
            }

           //residence address zipcode validation
            if (empty($_POST['zip'])) {
                   $error['zip'] = "* this field can not be empty";
             }elseif (!preg_match("/^([0-9]{6})*$/", $_POST['zip'])) { 
              $error['zip'] = "Only digits(6) allowed in <b>pincode(permanent)</b>";
            }

           //residence contact no validation   
            if (empty($_POST['phone'])) {
              $error['phone'] = "Phone no cannot be blank";
            }elseif (!preg_match("/^([0-9]{10})*$/", $_POST['phone'])) { 
              $error['phone'] = "Only digits(10) allowed in contact number";
            }

           //Office address street validation
            if (empty($_POST['offstreet'])) {
               $error['offstreet'] = "* this field can not be empty";
             }elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['offstreet'])) {
              $error['offstreet'] = "Only charatcers,dot and space allowed in <b>Street</b>";
            }

           //Office address city validation
            if (empty($_POST['offcity'])) {
               $error['offcity'] = "* this field can not be empty";
            } elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['offcity'])) {
              $error['offcity'] = "Only charatcers,don't  space allowed in <b>City</b>";
            }

            //Office address state validation
            if (empty($_POST["offstate"])) {
               $error['offstate'] = "* this field can not be empty";
            }elseif (!preg_match("/^[a-zA-Z .]*$/", $_POST['offstate'])) {
              $error['offstate'] = "Only charatcers,don't  space allowed in <b>State</b>";
            }

           //Office address zipcode validation
            if (empty($_POST['offzip'])) {
                $error['offzip'] = "* this field can not be empty";
            }elseif (!preg_match("/^([0-9]{6})*$/", $_POST['offzip'])) { 
              $error['offzip']="Only digits(6) allowed in <b>pincode(permanent)</b>";
            }

          //uploading image file to the server and its validation. 
            if ($_FILES['image']['name']) {
                $imgvar = basename($_FILES['image']['name']);
                $imagetype = pathinfo($imgvar, PATHINFO_EXTENSION);
             
            if ($imagetype != "jpg" && $imagetype!="jpeg" && $imagetype!="png" && $imagetype!="gif") {
                $error['image'] = "Invalid <b>image</b> type";
            }else {
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/phpproject/new/img/$imgvar");
              }

            }
   
       //if  error not found go to insert_data file and insert the data
        if (empty($error)) {
             //generating a random number
            $link=md5(uniqid(rand(),true));
            //using post method get all the form input values
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $firstname = $_POST["firstname"];
            $midname = $_POST["midname"];
            $lastname = $_POST["lastname"];
            $sex = $_POST["sex"];
            $marital = $_POST["marital"];
            $dob = $_POST["dob"];
            $street = $_POST["street"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $offstreet = $_POST["offstreet"];
            $offcity = $_POST["offcity"];
            $offstate = $_POST["offstate"];
            $offzip = $_POST["offzip"];
            $offphone = $_POST["offphone"];
            $offemail = $_POST["offemail"];
            $website = $_POST["website"];
            
            //inserting the data into the database
                                                                                                     
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               query;
            //sending the mail for activation
            $email = $_POST['email'];
            $message = "http://localhost/phpproject/new/activate.php?email=$email&reg_link=$link";
            $res = mail ( $email, "activation link",$message);
            $result = mysqli_query($conn,$query);
            // checks for query error
            if (!$result) {
                die("Database query failed");
            }else {

                if ($res) {
                $_SESSION['message'] = "Registration successfull! Please go to your account and login";
                  header("location:login1.php");
                }
            }
        }//end of insert

    }//end of submit
?>