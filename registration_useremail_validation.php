<?php
session_start();
require 'dbinfo.php';

          $responce = Array();
    	  $username = $_POST['username'];
		  $email = $_POST['email'];
		  $query1 = "SELECT userename 
		             FROM registration " ;
          $query2 = "SELECT email 
                     FROM registration " ;
		 
	      $result1 = mysqli_query($conn, $query1);
	      $result2 = mysqli_query($conn, $query2);
	      
	      $row1 = mysqli_fetch_assoc($result1);
	      $row2 = mysqli_fetch_assoc($result2);

   //checking  username and email id is already exist or not in database
      	   
	    if ($username == $row1['username']) {
             $responce['status'] = 1; 
        
        }else if ($email == $row2['email'])  {
        	$responce['status'] = 1;

        } 
     
	    echo json_encode($responce);  
	    
    
?>
    