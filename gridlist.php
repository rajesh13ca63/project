<?php 
require 'dbinfo.php';
$page = $_POST['page']; 
$limit = $_POST['rows']; 
$sidx = $_POST['sidx']; 
$sord = $_POST['sord']; 


   if (!$sidx) $sidx =1; 

    
			$query = "SELECT COUNT(*) AS count FROM registration";
			$result = mysqli_query($conn, $query); 
			$row = mysqli_fetch_assoc($result); 

			$count = $row['count'];  
			if ( $count > 0 && $limit > 0) { 
			    $total_pages = ceil($count/$limit); 
			} else { 
			    $total_pages = 0; 
			} 
			if ($page > $total_pages) $page = $total_pages;
			$start = $limit * $page - $limit;
			if ($start <0) $start = 0; 

			$sql = "SELECT * FROM registration LIMIT $start , $limit";
			$result = mysqli_query($conn,$sql );

			$i=0;
			while ($row = mysqli_fetch_assoc($result)) {
				$responce->rows[$i]['id'] = $row['id'];
				$responce->rows[$i]['cell'] = array($row['username'], $row['firstname']
											,$row['lastname']
											,$row['sex'], $row['dob']
											,$row['marital']
											,$row['street'], $row['city']
											,$row['state'], $row['phone']
											,$row['email']
											);
				$i++;
			}

    

   			
			echo json_encode($responce);


//end of php code
