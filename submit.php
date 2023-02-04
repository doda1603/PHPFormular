<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $vorname = $_POST['vorname'];
  $nachname = $_POST['nachname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("INSERT INTO users (vorname, nachname, email, password) VALUES (:vorname, :nachname, :email, :password)");
  $stmt->bindParam(':vorname', $vorname);
  $stmt->bindParam(':nachname', $nachname);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  
  $stmt->execute();
  
  echo "Data inserted successfully";
} catch(PDOException $e) {
  echo "Data insertion failed: " . $e->getMessage();
}


?>