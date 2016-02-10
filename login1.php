<?php
    require 'header.html';
    require 'dbinfo.php';
    //require 'validate_login.php';
    	
       if($_POST["submit"] == "SignUp") {
    	  header("location:registration.php");
        }
?>
<!--HTML Code for Loginpage-->
<div class="container">
    <div class="row">
        <div class="col-sm-12 well" id="errorDiv">
            <?php
                if ($_SESSION['message']) {
                	echo $_SESSION['message'];
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" >
            <div class="jumbotron" style="background-color: pink ">
                <form role="form" name="f" method="post" action="">
                    <div class="form-group">
                        <label>
                            <h4>Profile Login </h4>
                        </label>
                        <div id="dis1"></div>
                        <h5>
                            <div id="dis"></div>
                        </h5>
                        <label>Username<input type="text" name="username" id="username" value="" class="form-control"></label>
                        <label>Password<input type="password" name="password" id="password" value="" class="form-control"></label>
                        <div class="setcol">
                            <button type="button" class="btn btn-default" name="submit" id="submit" value="Login">Login</button>
                            &nbsp&nbsp<button type="submit" class="btn btn-default" name="submit" id="submit1" value="SignUp">SignUp</button>

                        </div>
                        <a href="forget.php" target="">Forggoten your password?</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</div>
<?php
    require 'footer.php';
?>