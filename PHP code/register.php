<?php
  session_start();
  include("db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
   $name = $_POST["name"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $c_password = $_POST["password-confirm"];
   $owner_contact = $_POST["owner-contact"];
  
   if(!empty($email) && !empty($password) && !is_numeric($email))
   { 
// Insert data into users table 
	$query = "INSERT INTO users(name, email, password, owner_contact)
	VALUES ('$name', '$email', '$password', '$owner_contact')";
	
	mysqli_query($conn, $query);


	echo "<script type = 'text/javascript'> alert('Successfully Register')</script>";
	header("Location: ../HTML Code/login.html");
   }
   else
   {
	echo "<script type = 'text/javascript'> alert('Please enter some valid information')</script>";
   }  

  }

?>

