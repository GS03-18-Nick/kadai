<?php
  //1. POSTデータ取得（）
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];
$comment = $_POST["comment"];

  //2. DB接続します
  $pdo = new PDO('mysql:dbname=kadai;host=localhost','root','');



  //2. DB文字コードを指定(固定)
  $stmt = $pdo->query('SET NAMES utf8');



  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO kadai (id, name, email, age, comment, datenow) VALUES(NULL, :a1, :a2, :a3, :a4, sysdate())");
  $stmt->bindValue(':a1', $name);
  $stmt->bindValue(':a2', $email);
  $stmt->bindValue(':a3', $age);
  $stmt->bindValue(':a4', $comment);
  $status = $stmt->execute();


  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;
  }else{
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;


  }
?>
