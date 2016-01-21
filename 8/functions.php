<?php

function connect () {
  global $pdo;
  $pdo = new PDO('mysql:dbname=kadai;host=localhost;charset=utf8', 'root', ''); 
}

function saveChanges ( $change ) {
  global $pdo;
  
  $sql = "INSERT INTO kadai (ID, firstname, lastname, email, password, fish, pet, hometown, starwars) VALUES (:id, :firstname, :lastname, :email, :password, :fish, :pet, :hometown, :starwars)";
  
  $stmt = $pdo->prepare($sql);
  
  if ( $stmt->execute( $change ) ) {
    echo 'success';
  }
}

?>