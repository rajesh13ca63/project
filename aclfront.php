<?php
require 'header.php';
?>
<!--HTML Code for Loginpage-->
<div class="container">
   <h1 class="well" align="center">Adminstration Page</h1>
     <div class="jumbotron">
        <form role="form" name="f" method="post" action="">
            <div class="row">
                <div class="col-sm-6 col-sm form-group">
                     <h3>Role Description </h3><br>
                    <div>    
                        <h4>Admin</h4> 
                         <input type="checkbox" name="adduser" id="adduser">AddUser
                         <input type="checkbox" name="adduser" id="edituser">EditUser
                         <input type="checkbox" name="adduser" id="deleteuser">DeleteUser
                    </div>
                    <div>
                        <input type="checkbox" name="adduser" id="addRoles">Add Role
                        <input type="checkbox" name="adduser" id="edituser">Edit Role
                        <input type="checkbox" name="adduser" id="deleteuser">Delete Role 
                    </div>  
                    <div>
                        <input type="submit" name="submint" id="submint" value="Save">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm form-group">
                     <h3>Users </h3><br>
                    <div>     
                         <input type="checkbox" name="adduser" id="adduser">AddUser
                         <input type="checkbox" name="adduser" id="edituser">EditUser
                         <input type="checkbox" name="adduser" id="deleteuser">DeleteUser
                    </div>
                    <div>
                        <input type="submit" name="submint" id="submint" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
                
                
                    

                   

                

                       