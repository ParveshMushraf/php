<?php
$servername = "mydbdemo.cw9pil612fzl.ap-south-1.rds.amazonaws.com";
$username = "mydbdemo";
$password = "mydbdemo";
$dbname = "mydbdemo";

try {
  $db = new PDO("mysql:host=$servevrname;dbname=$database", $user, $password);
  echo "<h2>USER LIST</h2><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
    echo "<li>" . $row[firstname] . " " . $row[lastname] .  " | " . $row[email] ."</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>