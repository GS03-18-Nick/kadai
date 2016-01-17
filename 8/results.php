<?php 
  session_start(); 
  $current_user = $_SESSION['current_user'];
  
  //Store survey answers
  $fish = $_POST['fish'];
  $pet = $_POST['pet'];
  $hometown = $_POST['hometown'];
  $starwars = $_POST['starwars'];

  //Connect to mySQL
  $dsn = 'mysql:dbname=kadai;host=localhost;charset=utf8';
  $user = 'root';
  $password = ''; 

  try {
    $conn = new PDO($dsn, $user, $password);
  } catch (PDOException $error) {
    $_SESSION['message'] = 'Connection error ' . $error;
  }

//UPDATE command
  $sql = "UPDATE kadai SET fish=:a1, pet=:a2, hometown=:a3, starwars=:a4, datenow=sysdate() WHERE id=$current_user";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':a1', $fish);
  $stmt->bindValue(':a2', $pet);
  $stmt->bindValue(':a3', $hometown);
  $stmt->bindValue(':a4', $starwars);

  
  if ($result = $stmt->execute()) {
    $_SESSION['success'] = "Survey Successful!";
    header('Location: survey.php');
  } else {
    $_SESSION['fail'] = 'Form error, try again'.$conn->error;
    header('Location: survey.php');
  }
  
$conn = null;//this may be a BIG mistake HERE
  ?>