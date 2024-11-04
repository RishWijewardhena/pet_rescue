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
    <h2 style="margin-bottom: 20px;">Hello	
	<?php
	session_start();
	$user = $_SESSION['user'];
	$name = $user['username'];
// Display the user name
	echo $name;
	?> whats are you going to do today?</h2>


<?php
// user data
echo "user data"."<br />";
include("db.php");

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["name"] . ", " . $row["email"] . "<br />";
    }
}

echo "<br />";
//pet data
echo "pet data"."<br />";
$sql = "SELECT * FROM pets";

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["pet_name"] . ", " . $row["pet_breed"] . "<br />";
    }
}
?>

<br><br>

    <footer>
        <p>© 2023 Dhanushka Wijekon</p>
    </footer>

</body>
</html>
