<?php
  session_start();
  include("db.php");

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    // echo "User is set: " . $user;
} else {
   echo "User is not set.";
}
$id = $user['user_id'];
// echo $id;



  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
   $id = $user['user_id'];
   $pet_name = $_POST["pet-name"];
   $pet_breed = $_POST["pet-breed"];
   $pet_age = $_POST["pet-age"];
   $description = $_POST["description"];
   $image = $_FILES["pet-image"];
   $target = "../images/".$_FILES["pet-image"]["name"];

  if(isset($image)){
   // echo "good"; 
   } else{
   echo "bad";
   }
  
   if(true)
   { 
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Insert data into pets table 
	$query = "INSERT INTO pets(user_id, pet_name, pet_breed, pet_age, Description, pet_image)
	VALUES ('$id', '$pet_name', '$pet_breed', '$pet_age', '$description', '$target')";
	
	mysqli_query($conn, $query);


// Upload image
	// Move the uploaded image into the folder "images"
	if (move_uploaded_file($_FILES['pet-image']['tmp_name'], $target)) {
        // echo "Image uploaded successfully";
    } else {
         echo "Failed to upload image";
    }


	echo "<script type = 'text/javascript'> alert('Successfully Register')</script>";
   }
   else
   {
	echo "<script type = 'text/javascript'> alert('Please enter some valid information')</script>";
   }  

  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Functional Code/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li id="menu-item"><a href="../HTML Code/index.html">Home</a></li>
                <li id="menu-item"><a href="../HTML Code/search.html">Search Now</a></li>
                <li id="menu-item"><a href="../HTML Code/about.html">About Us</a></li>
                <li id="menu-item"><a href="../HTML Code/contact.html">Contact Us</a></li>
                <a href="../HTML Code/login.html" id="menu-item"><button id="menu-item">Login / Register</button></a>
            </ul>
        </nav>
    </header>
    <br>
    <h2 style="margin-bottom: 20px;">Register your loving once</h2>

    <section class="login-section">
        <div class="container">
            <form id="registration-form" method="POST" enctype="multipart/form-data">    
		<label for="pet-name">Pet Name:</label>
                <input type="text" id="pet-name" name="pet-name" required>
    
                <label for="pet-breed">Pet Breed:</label>
                <input type="text" id="pet-breed" name="pet-breed" required>
    
                <label for="pet-age">Pet Age:</label>
                <input type="number" id="pet-age" name="pet-age" required>

                <label for="description">Description:</label>
                <textarea style="width: 100%;" id="description" name="description" rows="10" required></textarea>

                <label for="pet-image">Upload Pet Image:</label>
                <input type="file" id="pet-image" name="pet-image" accept="image/*" required>

                <button type="submit" style="width: 100%;">Register</button>
            </form>
        </div>
    </section>

    <br><br>

    <footer>
        <p>&copy; 2023 Dhanushka Wijekon</p>
    </footer>

</body>
</html>