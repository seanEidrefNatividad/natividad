

<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "album";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create connection
// $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";


// $servername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "album";

// // Create connection
// $conn = new mysqli($servername, $dbUsername, $dbPassword);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>
