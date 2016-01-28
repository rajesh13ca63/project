
<?php
//echo "databse deletion in ";
if($_POST["submit"]=="Delete")
{
mysql_connect("localhost","rajesh","Mindfire");
	mysql_select_db("demo");
	$s="DELETE  from registration where id=".$_POST['id'];
	if(!mysql_query($s))
	    echo mysql_reeor();
	else
		header("location:home.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text=/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
   <form name="f" method="post" action="delete.php">
   <div class="jumbotron">
   <div class="row">
   <div calss="col-sm-4">
   <label>Enter ID</label>
   <input type="text" name="id">   		
   <input type="submit" name="submit" value="Delete">
	</div>		
	</form>
</div>
	</body>
	</html>
