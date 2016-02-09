<?php
    require 'header.php';
    require 'dbinfo.php';
    
    if ($_POST['submit']) {
        $admin_name = $_POST['admin_name'];
        $password = $_POST['password'];

        $query = "SELECT admin_name, password 
                  FROM  amdmin ";
                  
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_assoc($result); 
        
        if ($row && $result) {
            header("location:grid.php");
        } else $error = "Invalid Username / Password !please try again";

    }

?>
<!--HTML Code for Loginpage-->
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" >
            <div class="jumbotron" style="background-color: pink ">
                <form role="form" name="f" method="post" action="">
                    <div class="form-group">
                        <label>
                            <h4>Admin Login </h4>
                        </label>
                        <span class="error"><div><?php if($error) echo $error ?></div></span>
                        <label>Username<input type="text" name="admin_name" id="admin_name" value="" class="form-control"></label>
                        <label>Password<input type="password" name="password" id="password" value="" class="form-control"></label>
                        <div  class="col-sm-4 "></div>
                            <button type="submit" class="btn btn-default" name="submit" id="submit" value="Login">Login</button>
                    </div>
                        <a href="forget.php" target="">Forggoten your password?</a>
                 </form>
            </div>
        </div>
    </div>
</div>
<?php
    require 'footer.php';
?>