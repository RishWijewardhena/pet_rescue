<?php
session_start(); // Start a session

// Include your database connection file that sets up the $conn variable
include_once 'db.php';

// Fetch data from the database
$sql = "SELECT dog_name, age FROM dogs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an array to store the dog data
    $dogData = array();

    while ($row = $result->fetch_assoc()) {
        // Store the data in the session array
        $dogData[] = $row;
    }
} else {
    echo "No data found in the database.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adoption.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        if (isset($dogData)) {
            foreach ($dogData as $row) {
                echo '<div class="card">';
                echo '<div class="image">';
                echo '<img src="45 Best Large Dog Breeds for People Who Have a Lot of Love to Give.jpeg" alt="Dog Image">';
                echo '</div>';
                echo '<div class="caption">';
                echo '<p class="dog_name"><b>' . $row['dog_name'] . '</b></p>';
                echo '<p class="age"><b>' . $row['age'] . '</b></p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No data available for display.";
        }
        ?>
    </main>
</body>
</html>

        
   
