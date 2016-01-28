<?php
session_start();
session_unset();
session_destroy();
echo "Logout Successfully";
header("location:login1.php");
?>