<?php
require 'admin.php';

//Inserting data into databse
if ($_POST['submit'] == "save") {
    //$query1 = "INSERT INTO "
    
}

?>
<!--HTML Code for Loginpage-->
<div class="container">
   <h1 class="well" align="center">Adminstration Page</h1>
     <div class="jumbotron">
        <form role="form" name="f" method="post" action="">
            <div class="row">
                <div class="col-sm-6 col-sm form-group">
                    <h4>Administrator</h4>
                </div>
                <div class="col-sm-6 form-group">
                     <input type="checkbox" name="admuser[]" id="admuser" value="1">AddUser
                     <input type="checkbox" name="admuser[]" id="admuser" value="2">EditUser
                     <input type="checkbox" name="admuser[]" id="admuser" value="3">DeleteUser
                     <input type="checkbox" name="admuser[]" id="admuser" value="4">View
                     <input type="checkbox" name="admuser[]" id="admuser" value="5">All
                </div>
                <div class="col-sm-6 form-group">
                     <input type="checkbox" name="admrole[]" id="admrole" value="1">AddRole
                     <input type="checkbox" name="admrole[]" id="admrole" value="2">EditRole
                     <input type="checkbox" name="admrole[]" id="admrole" value="3">DeleteRole
                     <input type="checkbox" name="admrole[]" id="admrole" value="4">View
                     <input type="checkbox" name="admrole[]" id="admrole" value="5">All<br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <h4>Student</h4>
                </div>
                <div class="col-sm-6 form-group">
                     <input type="checkbox" name="student[]" id="student" value="1">AddUser
                     <input type="checkbox" name="student[]" id="student" value="2">EditUser
                     <input type="checkbox" name="student[]" id="student" value="3">DeleteUser
                     <input type="checkbox" name="student[]" id="student" value="4">View
                     <input type="checkbox" name="student[]" id="student" value="5">All
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <h4>Teacher</h4>
                </div>
                <div class="col-sm-6 form-group">
                     <input type="checkbox" name="teacher[]" id="techer" value="1">AddUser
                     <input type="checkbox" name="teacher[]" id="techer" value="2">EditUser
                     <input type="checkbox" name="teacher[]" id="techer" value="3">DeleteUser
                      <input type="checkbox" name="teacher[]" id="teacher" value="4">View
                     <input type="checkbox" name="teacher[]" id="teacher" value="5">All
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <h4>Clerk</h4>
                </div>
                <div class="col-sm-6 form-group">
                     <input type="checkbox" name="clerk[]" id="clerk" value="1">AddUser
                     <input type="checkbox" name="clerk[]" id="clerk" value="2">EditUser
                     <input type="checkbox" name="clerk[]" id="clerk" value="3">DeleteUser
                     <input type="checkbox" name="clerk[]" id="clerk" value="4">View
                     <input type="checkbox" name="clerk[]" id="clerk" value="5">All
                </div>
            </div>  
            <div>       
                <input type="submit" class="btn btn-primary" name="submint" id="submit" value="Save">
            </div>     
        </form>
    </div>
</div>
                
                
                    

                   

                

