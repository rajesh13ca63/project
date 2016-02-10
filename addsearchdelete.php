<?php
require 'dbinfo.php';
   	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$sex = $_POST['sex'];
	$marital = $_POST['marital'];
	$dob = $_POST['dob'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state =$_POST['state'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$id = $_POST['id'];

	$page = $_POST['page']; 
	$limit = $_POST['rows']; 
	$sidx = $_POST['sidx']; 
	$sord = $_POST['sord']; 
	$search_field = $_POST['searchField'];
	$search_string = $_POST['searchString'];
	if(!$sidx) $sidx =1; 


  

	   // if (!$sidx) $sidx =1; 
		if ($_POST['oper'] == 'edit') {			
			$query = "UPDATE registration
			          SET firstname = '$fname', lastname = '$lname',
			          sex = '$sex', marital = '$marital', dob = '$dob',
			          street = '$street', city = '$city', state = '$state',
			          phone = '$phone', email = '$email'
			          WHERE id = $id";

		}else if ($_POST['oper'] == 'del') {
			$query = "DELETE 
			          FROM registration 
			          WHERE id = $id ";								
		}
		    
	
    //searching
    if ($_POST['oper'] == 'search') {

		$query = "SELECT COUNT(*) AS count FROM registration";
		$result = mysqli_query($conn, $query); 
		$row = mysqli_fetch_assoc($result); 
		$count = $row['count']; 
		if( $count > 0 ) { 
		    $total_pages = ceil($count/$limit); 
		} else { 
		    $total_pages = 0; 
		} 

		if ($page > $total_pages) 
			$page=$total_pages;

		$start = $limit*$page - $limit;
		if($start <0) $start = 0; 

		if($search_string && $search_field) {
			$sql = "SELECT * FROM registration WHERE $search_field = '$search_string' ORDER BY $sidx $sord LIMIT $start , $limit";
			$resultt = mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($resultt);
			//$responce['valuesss']=$rowss['id'];
			if(!$row['id']) {
				$responce['notfound']= "True";
			}
		}
		else {
			$sql = "SELECT * FROM registration ORDER BY $sidx $sord LIMIT $start , $limit"; 
		}
		$result = mysqli_query($conn,$sql );
		$i=0;
		while($row = mysqli_fetch_assoc($result)) {
			if($row['dob'] == '0000-00-00') {
					$row['dob'] = null;
				}
			$responce->rows[$i]['id']=$row['id'];
			$responce->rows[$i]['cell']=array($row['firstname']
											,$row['lastname']
											,$row['sex']
											,$row['marital']
											,$row['dob']
											,$row['street']
											,$row['city']
											,$row['state']
		                                    ,$row['phone']
		                                    ,$row['email_id']
											);
			$i++;
		}

    }


		echo json_encode($responce);

				   
	    $result = mysqli_query($conn,$query);
	    
		if (!$result) {
			die("database connection failed " . mysqli_error($conn));
		}
?>


		    

