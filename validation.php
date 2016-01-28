<?php
//declaring an empty array and store all the errors 
  $error=Array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //validation of user name and password
   if (empty($_POST["username"]))
    {
     $error['username'] = "* UserName is required";
    } 
    else 
    {
     $username = test_input($_POST["username"]);
   }
   if (empty($_POST["password"])) {
     $error['password']= "* Password is required";
   } 
   else 
   {
     $password = test_input($_POST["password"]);
   }
  if (empty($_POST["repassword"])) {
     $error['repassword'] = "* Repassword is required";
   } 
   else 
   {
     $repassword = test_input($_POST["repassword"]);
   }
  //first name validation
   if (empty($_POST["firstname"])) {
     $firstname_Err = "* Name is required";
   } 
   elseif(!preg_match("/^[a-zA-Z]*$/",$_POST['firstname']))
   {
    $firstname_Err="Only charatcers allowed in <b>first name</b>";
   }
   else 
   {
     $firstname = test_input($_POST["firstname"]);
   }
//middle name validation
  if(!preg_match("/^[a-zA-Z .]*$/", $_POST['midname']))
  {
    $error['midname']="Only charatcers,dot and space allowed in <b>middle name</b>";
  }
//last name validation
 if (empty($_POST["lastname"])) {
     $lastnaem_Err = "* Last Name is required";
   } 
  elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['lastname']))
  {
    $error['lastname']="Only charatcers,dot and space allowed in <b>middle name</b>";
  }
  else
   {
     $lastname= test_input($_POST["lastname"]);
   }
 //gender validation
  if (empty($_POST["sex"])) {
     $error['sex'] = "* Gender is required";
   } 
   else 
   {
     $sex = test_input($_POST["sex"]);
   }
  //validation of marital status and date of birth
   if (empty($_POST["marital"])) {
     $error['marital']= "* Marital Status is required";
   } 
   else 
   {
     $marital = test_input($_POST["marital"]);
   }

  if (empty($_POST["dob"])) {
     $error['dob'] = "* DOB is required";
   } 
   else 
   {
     $dob = test_input($_POST["dob"]);
   }
//residence address street validation
  if (empty($_POST["street"])) {
     $error['street'] = "* this field can not be empty";
   } 
   elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['street']))
  {
    $error['street']="Only charatcers,dot and space allowed in <b>Street</b>";
  }
  else 
   {
     $street = test_input($_POST["street"]);
   }
//residence address city validation
  if (empty($_POST["city"])) {
     $error['city'] = "* this field can not be empty";
   } 
   elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['city']))
  {
    $error['city']="Only charatcers,don't  space allowed in <b>City</b>";
  }
  else 
   {
     $city = test_input($_POST["city"]);
   }   
//residence address state validation
  if (empty($_POST["state"])) {
     $error['state'] = "* this field can not be empty";
   } 
   elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['state']))
  {
    $error['state']="Only charatcers,don't  space allowed in <b>State</b>";
  }
  else 
   {
     $state = test_input($_POST["state"]);
   } 	
//residence address zipcode validation
  if (empty($_POST["zip"])) {
         $error['zip'] = "* this field can not be empty";
   } 
 elseif(!preg_match("/^([0-9]{6})*$/", $_POST['zip']))
  { 
    $error['zip']="Only digits(6) allowed in <b>pincode(permanent)</b>";
  }
//residence contact no validation   
  if(empty($_POST["phone"]))
  {
    $error['phone']="In permanent Address: <b>Contact Number</b> cannot be blank";
  }
  else if(!preg_match("/^([0-9]{10})*$/", $_POST["phone"]))
  { 
    $error['phone']="Only digits(10) allowed in <b>contact number(permanent)</b>";
  }
//Office address street validation
  if (empty($_POST["street"])) {
     $error['offstreet'] = "* this field can not be empty";
   } 
   elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['offstreet']))
  {
    $error['offstreet']="Only charatcers,dot and space allowed in <b>Street</b>";
  }
  else 
   {
     $offstreet = test_input($_POST["street"]);
   }
//Office address city validation
  if (empty($_POST["offcity"])) {
     $error['offcity'] = "* this field can not be empty";
   } 
   elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['offcity']))
  {
    $error['offcity']="Only charatcers,don't  space allowed in <b>City</b>";
  }
  else 
   {
     $offcity = test_input($_POST["city"]);
   }   
//Office address state validation
  if (empty($_POST["offstate"])) {
     $error['offstate'] = "* this field can not be empty";
   } 
   elseif(!preg_match("/^[a-zA-Z .]*$/", $_POST['offstate']))
  {
    $error['offstate']="Only charatcers,don't  space allowed in <b>State</b>";
  }
  else 
   {
     $state = test_input($_POST["offstate"]);
   }  
//Office address zipcode validation
  if (empty($_POST["offzip"])) {
         $error['offzip'] = "* this field can not be empty";
   } 
 elseif(!preg_match("/^([0-9]{6})*$/", $_POST['offzip']))
  { 
    $error['offzip']="Only digits(6) allowed in <b>pincode(permanent)</b>";
  }
//Office contact no validation   
  if(!empty($_POST["offphone"]))
  {
    $error['offphone']="In permanent Address: <b>Contact Number</b> cannot be blank";
  }
  elseif(!preg_match("/^([0-9]{10})*$/", $_POST['offphone']))
  { 
    $error['offphone']="Only digits(10) allowed in <b>contact number(permanent)</b>";
  }
//uploading image file to the server and its validation. 
  if ($_FILES['image']['name']) 
  {
    $imgvar = basename($_FILES['image']['name']);
    $imagetype = pathinfo($img_var, PATHINFO_EXTENSION);
    if($imagetype!="jpg" && $imagetype!="jpeg" && $imagetype!="png" && $imagetype!="gif")
    {
      $error['image']="Invalid <b>image</b> type";
    }
    else  
    {
      move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/phpproject/new/img/$imgvar");
    }
  }
function test_input($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
//if  error not found go to insert_data file and insert the data
if(empty($error))
  {
   //generating a random number
  $activate=md5(uniqid(rand(),true));
  //using post method get all the form input values
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
  $image=$_POST["image"];
  $website=$_POST["website"];

 //inserting the data into the database
                                                                                                    
$query="INSERT into registration(username,password,repassword,firstname,midname,lastname,sex,marital,dob,street,city,state,zip,phone,email,offstreet,offcity,offstate,offzip,offphone,offemail,image,website) 
values('$username','$password','$repassword','$firstname','$midname','$lastname','$sex','$marital','$dob','$street','$city','$state','$zip','$phone','$email','$offstreet','$offcity','$offstate','$offzip','$offphone','$offemail','$image','$website')";
//sending the query
$result=mysqli_query($conn,$query);
// checks for query error
if(!$result)
{
  die("Database query failed");
}
else
{
  echo "Successfully inserted data <br/>";
}
}
}
?>