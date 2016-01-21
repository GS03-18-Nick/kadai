<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="js/MODALONLYbootstrap.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/MODALONLYbootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <section>
      <?php if( isset( $_POST['mydata'] ) ) {
        echo 'its real!';
      } else {
    echo ' '; 
} ?>
    <div class="container">
      <?php       
      //Connect to mySQL
      $dsn = "mysql:dbname=kadai;host=localhost;charset=utf8";
      $user = "root";
      $password = '';
      
      try {
        $conn = new PDO($dsn, $user, $password);
      } catch (PDOException $e) {
        echo 'Error'.$e;
      }
      
      //SQL command
      $sql = 'SHOW COLUMNS FROM kadai';
      $stmt = $conn->prepare($sql);
      
      //Get table headers
      if ($result = $stmt->execute()) {
        echo '<table><thead><tr>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo '<th>'.$row['Field'].'</th>';
        }
        echo '<th>変更</th>';
        echo '</tr></thead>';
      } else {
        echo "error";
      }
      
      //get table information
      $sql = "SELECT * FROM kadai";
      $stmt = $conn->prepare($sql);
      
      if ($result = $stmt->execute()) {
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
          foreach( $row as $a ) {
          echo "<tr>
                <td data-table-id='ID'>{$a->ID}</td>
                <td data-table-id='firstname'>{$a->firstname}</td>
                <td data-table-id='lastname'>{$a->lastname}</td>
                <td data-table-id='email'>{$a->email}</td>
                <td data-table-id='password'>{$a->password}</td>
                <td data-table-id='fish'>{$a->fish}</td>
                <td data-table-id='pet'>{$a->pet}</td>
                <td data-table-id='hometown'>{$a->hometown}</td>
                <td data-table-id='starwars'>{$a->starwars}</td>
                <td data-table-id='datenow'>{$a->datenow}</td>
                <td data-table-id='change'>
                  <a href='#' id='{$a->ID}'>変更</a></td>
                </tr>";
        }
      
      } else {
        echo 'error';
      }
      
      
      $conn = null;
  ?>
    </div>
    <script src="js/henko.js"></script>
</body>

</html>