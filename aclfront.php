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
                     <h3><label>Roles</label></h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="role">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-primary" name="add" id="add" value="add"> 
                        </div>
                    </div>
                    <div>    
                        <h4>Admin</h4> 
                         <input type="checkbox" name="adduser" id="adduser">AddUser
                         <input type="checkbox" name="edituser" id="edituser">EditUser
                         <input type="checkbox" name="deleteuser" id="deleteuser">DeleteUser
                         <input type="checkbox" name="all" id="all">All
                    </div>
                    <div>
                        <input type="checkbox" name="adduser" id="addRoles">Add Role
                        <input type="checkbox" name="adduser" id="edituser">Edit Role
                        <input type="checkbox" name="adduser" id="deleteuser">Delete Role 
                        <input type="checkbox" name="all" id="all">All
                    </div>  
                    <div>
                        <input type="submit" name="submit" id="submit" value="Save">
                    </div>
                </div>
                <div class="row">
                    <div clas="col-sm-6 offset-4">
                        <a href="aclfront.php" ></a> View Roles<br>
                        <a href="aclfront.php" ></a> Edit Roles<br>
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
                        <input type="submit" name="submint" id="submit" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
                
                
                    

                   

                

                       