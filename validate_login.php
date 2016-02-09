<?php
session_start();
require 'dbinfo.php';

$response  = array();
$user_name = $_POST['username'];
$pass_word = $_POST['password'];

// query for  ....
$query  = "SELECT * FROM registration 
			WHERE username = '$user_name' 
			AND password = '$pass_word'";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

// checking if login is correct or not
if ($result && $row) {
    if ($row['activate'] == 1) {
        $response['login']    = "correct";
        $_SESSION['username'] = $row['username'];
    } else if ($row['activate'] == 0) {
        $response['active'] = "Account is not activated";
    }
} else {
    $response['invalid'] = "Invalid Username/password";
}

echo json_encode($response);
?>