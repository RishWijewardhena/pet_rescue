<?php
session_start();
include("db.php");

// Get username and password from POST request
$email = $_POST['email'];
$password = $_POST['pass'];

// Sanitize inputs
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Create SQL query
$sql = "SELECT * FROM admins WHERE email = '$email'";

// Execute query and get result
$result = mysqli_query($conn, $sql);
// $result returns true or false


if(mysqli_num_rows($result) > 0){
// echo "good";
// admin login
// Create SQL query
$sql = "SELECT * FROM admins WHERE email = '$email'";

// Execute query and get result
$result = mysqli_query($conn, $sql);
// print_r($result);

// store result
$user = mysqli_fetch_assoc($result);
print_r($user);
//echo $user['admin_id'];

if ($password == $user['password']){
   	// echo 'Login successful';
	// store user id
	$_SESSION['user'] = $user;
        // print_r($user);
	// header("Location: petregister.html?user=$user");
	header("Location: admin_account.php?user=$user");
	    
        } else {
            echo 'Invalid credentials';
        }




} else{
// echo "bad";
// User login
// Create SQL query
$sql = "SELECT * FROM users WHERE email = '$email'";

// Execute query and get result
$result = mysqli_query($conn, $sql);
// print_r($result);

// store result
$user = mysqli_fetch_assoc($result);
//print_r($user);
//echo $user['user_id'];

if ($password == $user['password']){
   	// echo 'Login successful';
	// store user id
	$_SESSION['user'] = $user;
        // print_r($user);
	header("Location: petregister.html?user=$user");
	header("Location: user_account.php?user=$user");
	    
        } else {
            echo 'Invalid credentials';
        }
}

// print_r($user['user_id']);
?>
