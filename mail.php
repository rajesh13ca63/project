<?php
$add="http://localhost/phpproject/new/login1.php";
$email="rajeshkumargupta001@gmail.com";
$res = mail ( $email, "Test from de lappie..." , $add );
var_export( $res );

?>