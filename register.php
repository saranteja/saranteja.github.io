<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "cart";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "INSERT INTO Users (id,password)
VALUES ('$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
header('Location:http://localhost/fcart/login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
