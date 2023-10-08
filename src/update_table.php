<?php
$servername = "mydbdemo.cw9pil612fzl.ap-south-1.rds.amazonaws.com";
$username = "mydbdemo";
$password = "mydbdemo";
$dbname = "mydbdemo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (firstname, lastname, email)
VALUES ('Ranjit', 'Swain', 'ranjit@ranjitswain.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>