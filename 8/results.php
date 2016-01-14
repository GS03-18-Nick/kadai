
<?php 
  session_start(); 
  $current_user = $_SESSION['current_user'];
  
  //Store survey answers
  $fish = $_POST['fish'];
  $pet = $_POST['pet'];
  $hometown = $_POST['hometown'];
  $starwars = $_POST['starwars'];
  
  //Connect to mySQL
  $server = 'localhost';
  $username = 'root';
  $password = ""; 
  $db = 'kadai';
  $conn = new mysqli($server, $username, $password, $db);

//UPDATE command
  $sql = "UPDATE kadai SET fish='$fish', pet='$pet', hometown='$hometown', starwars='$starwars' WHERE id=$current_user";
  
  $result = $conn->query($sql);
  
  
  
  if ($result === true) {
    $_SESSION['success'] = "Survey Successful!";
    header('Location: survey.php');
  } else {
    $_SESSION['fail'] = 'Form error, try again'.$conn->error;
    header('Location: survey.php');
  }
  
$conn->close();//this may be a BIG mistake HERE
  ?>