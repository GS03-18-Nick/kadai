<?php

session_start();
//USE THIS awesomeness and $_SESSION["varName"] = "something"
//to set variables that can be accessed from anywhere on the PAGE!

//Set login password variables
$login = stripslashes($_POST["login"]); 
$login = mysql_real_escape_string($_POST["login"]);

$password = stripslashes$_POST["password"]); 
$password = mysql_real_escape_string$_POST["password"]);

//1.  DB接続します
$pdo = new PDO('mysql:dbname=kadai;host=localhost','root','');

//2. DB文字コードを指定（固定）
$stmt = $pdo->query('SET NAMES utf8');

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT id, firstname, lastname FROM kadai WHERE email='".$login."' and password='".&password."'");

//４．SQL実行
$flag = $stmt->execute();

//データ表示
$view="";
if($flag == false) {
  $_SESSION['login_msg'] = 'Please enter valid Email and Password';
  header('Location: index.php');
} else {
  
  while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION['fname'] = $data['firstname'];
    $_SESSION['lname'] = $data['lastname'];
  }
  header('Location: survey.php');
}

$pdo = null;
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
