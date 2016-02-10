<?php
require 'dbinfo.php';
require 'admin.php';

?>
<!--HTML Code for Loginpage-->
<div class="container">
   <h1 class="well" align="center">Role Privileges</h1>
     <div class="jumbotron">
        <form role="form" name="f" method="post" action="privilage.php">
            <div class="row">
                <div class="col-sm-3 offset-3 from-group">
	                <h3>Role </h3><br>
	            </div>
	        </div>
	        <div class="row">
		        <div class="col-sm-3 col-sm form-group">                                 
		            <div>
		                <h4>Select Role</h4>
		            </div>
	            </div>

	                <?php
               
	                $sql = "SELECT role_id, role_name 
	                        FROM roles";
	                $result = mysqli_query($conn, $sql);
	                echo "<select name='role_name' id='rolename' >";
	                while ($row = mysqli_fetch_assoc($result)) {
	                    echo "<option value='" . $row['role_id'] ."'>" . $row['role_name'] ."</option>";
	                }

	                echo "</select>"
	                ?>
	        </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
                 </div> 
            </div>
         </form>
    </div>
</div>