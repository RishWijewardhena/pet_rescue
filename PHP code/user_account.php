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
    <h2 style="margin-bottom: 20px;">Hi 	
	<?php
	session_start();
	$user = $_SESSION['user'];
	$name = $user['name'];
// Display the user name
	echo $name;
	?></h2>
	
<?php
// user data
echo "user data"."<br />";
include("db.php");

$user = $_SESSION['user'];
$id = $user['user_id'];

$sql = "SELECT * FROM users WHERE user_id = '$id'";

$result = mysqli_query($conn, $sql);
$table_result = mysqli_fetch_assoc($result);
echo print_r($table_result, true)."<br /><br />";

//pet data
echo "pet data"."<br />";
$sql = "SELECT * FROM pets WHERE user_id = '$id'";

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["pet_name"] . ", " . $row["pet_breed"] . "<br />";
    }
}
?>

    <section class="login-section">
        <div class="container">
                <button style="width: 20%;" onclick="window.location.href='../HTML Code/pet_register.html'">Add new pet</button><br /><br />

                <button style="width: 20%;" onclick="window.location.href='../HTML Codes/pet_registrer.html'">Remove pet</button>
        </div>
    </section>

    <br><br>

    <footer>
        <p>© 2023 Dhanushka Wijekon</p>
    </footer>

</body>
</html>
