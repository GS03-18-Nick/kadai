<?php

session_start();
//USE THIS awesomeness and $_SESSION["varName"] = "something"
//to set variables that can be accessed from anywhere on the PAGE!

//get userlogin and password
$login = $_POST["login"]; 
$pass = $_POST["password"]; 

$dsn = 'mysql:dbname=kadai;host=localhost;charset=utf8';
$user = 'root';
$password = '';


// Create connection
try {
    $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    $_SESSION['message'] = 'Connection failed: ' . $e->getMessage();
    header('Location: index.php');
}

$sql = "SELECT * FROM kadai WHERE email=:a1 AND password=:a2";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':a1', $login);
$stmt->bindValue(':a2', $pass);

if ($result = $stmt->execute()) {
    
  // output data of each row
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['ID'] != null) {
      $_SESSION['name'] = $row['firstname']." ".$row['lastname'];
      $_SESSION['current_user'] = $row['ID'];
      header('Location: survey.php');
    } else {
      $_SESSION['message'] = 'Enter valid username and password';
      header('Location: index.php');
    }
} else {
  $_SESSION['message'] = 'SQL Error';
  header('Location: index.php');
}

$conn = null;
?>