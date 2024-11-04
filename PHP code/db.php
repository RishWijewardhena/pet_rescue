<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petrescue";
$tablenames = array("admins", "users", "pets");

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if database exists
if (!mysqli_select_db($conn, $dbname)) {
    // If database does not exist, create it
    $sql = "CREATE DATABASE petrescue";
    if (mysqli_query($conn, $sql)) {
        // echo "Database created successfully<br>";
    } else {
        // echo "<br>Error creating database: " . mysqli_error($conn);
    }
} else {
    // echo "Database already exists<br>";

    // Check if tables exist
    foreach($tablenames as $tablename) {
        $sql = "SHOW TABLES LIKE '$tablename'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // echo "<br>Table '$tablename' already exists";
        } else {
            // If table does not exist, create it
            switch($tablename) {
                case 'admins':
                    $sql = "CREATE TABLE admins (
			admin_id INT(10) NOT NULL AUTO_INCREMENT ,
                        username VARCHAR(30) NOT NULL,
                        email VARCHAR(50) NOT NULL,
                        password VARCHAR(50),
			PRIMARY KEY (admin_id)
                    )";
                    break;
                case 'users':
                    $sql = "CREATE TABLE users (
			user_id INT(10) NOT NULL AUTO_INCREMENT ,
                        name VARCHAR(30) NOT NULL,
                        email VARCHAR(50),
                        password VARCHAR(50),
                        owner_contact VARCHAR(15),
			PRIMARY KEY (user_id)
                    )";
                    break;
                case 'pets':
                    $sql = "CREATE TABLE pets (
			user_id INT(30) NOT NULL,
			pet_id INT(10) NOT NULL AUTO_INCREMENT ,
                        pet_name VARCHAR(30) NOT NULL,
			pet_breed VARCHAR(30),
			pet_age INT(30),
                        Description TEXT,
			pet_image text NOT NULL,
			PRIMARY KEY (pet_id),
			FOREIGN KEY (user_id) REFERENCES users(user_id)
                    )";
                    break;
            }

            if (mysqli_query($conn, $sql)) {
                 // echo "Table '$tablename' created successfully<br>";
            } else {
                 echo "<br>Error creating table '$tablename': " . mysqli_error($conn);
            }
        }
    }
}


?>
