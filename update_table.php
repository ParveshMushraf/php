<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function updateData($conn, $id, $name, $email) {
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    updateData($conn, $id, $name, $email);
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
</head>
<body>
    <h1>Update Data</h1>
    <form method="POST" action="">
        ID: <input type="text" name="id"><br>
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
