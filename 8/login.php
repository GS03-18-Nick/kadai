<?php

session_start();
//USE THIS awesomeness and $_SESSION["varName"] = "something"
//to set variables that can be accessed from anywhere on the PAGE!

//get userlogin and password
$login = stripslashes($_POST["login"]); 

$pass = stripslashes($_POST["password"]); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kadai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  $_SESSION['message'] = 'Error connecting to database, please try again';
  header('Location: index.php');
} 

$sql = "SELECT * FROM kadai WHERE email='$login' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['name'] = $row['firstname']." ".$row['lastname'];
    $_SESSION['current_user'] = $row['ID'];
    header('Location: survey.php');
    }
} else {
  $_SESSION['message'] = 'Login failed, please use valid Email and Password';
  header('Location: index.php');
}

$conn->close();
?>