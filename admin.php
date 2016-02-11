<?php
    // echo 'in admin'; exit;
	// session_start(); exit;
    require 'adminheader.php';

?>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="#">Mindfire Solutions</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                       <a href="roles.php">Roles</a>
                    </li>
                    <li>
                        <a href="privilegepage.php">Privilege</a>
                    </li>
                    
                    <li>
                        <a href="alluser.php">Users</a>

                    </li>
                     <li>
                        <a href="grid.php">Grids</a>

                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    
                </ul>
                
            </div>
            
        </div>
       
    </nav>



