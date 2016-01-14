<?php

session_start();

  //1. POSTデータ取得（）
$first = $_POST["firstname"];
$last = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["newpass"];

  //2. DB接続します
  $pdo = new PDO('mysql:dbname=kadai;host=localhost','root','');



  //2. DB文字コードを指定(固定)
  $stmt = $pdo->query('SET NAMES utf8');



  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO kadai (id, firstname, lastname, email, password) VALUES(NULL, :a1, :a2, :a3, :a4)");
  $stmt->bindValue(':a1', $first);
  $stmt->bindValue(':a2', $last);
  $stmt->bindValue(':a3', $email);
  $stmt->bindValue(':a4', $password);
  $status = $stmt->execute();


  //４．データ登録処理後
  if($status == false){
    //Errorの場合$status=falseとなり、エラー表示
    $_SESSION['message'] = 'Account creation failed, please try again';
    header("Location: index.php");
    
  } else {
    //５．index.phpへリダイレクト
    $_SESSION['message'] = 'Account created! Please login below';
    header("Location: index.php");
  }
?>
