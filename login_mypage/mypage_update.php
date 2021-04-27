<?php

mb_internal_encoding("utf8");
session_start();

if(empty($_POST["from_mypage_hensyu"])){
    header("Location:login_error.php");
}

try{
        $pdo= new PDO("mysql:dbname=lesson1;host=localhost;","root","");
    }catch(PDOException $e){
        die("<p>申し訳ありません。現在サーバーが混み合っており一時的にアクセスできません。<br>しばらくしてから再度ログインをしてください。</p>
           <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
           );
    }
    
$stmt= $pdo->prepare("update login_mypage set name= ?,mail =?,password = ?,comments = ? where id= ?");

$stmt->bindvalue(1,$_POST['name']);
$stmt->bindvalue(2,$_POST['mail']);
$stmt->bindvalue(3,$_POST['password']);
$stmt->bindvalue(4,$_POST['comments']);
$stmt->bindvalue(5,$_SESSION['id']);

$stmt->execute();

$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

$stmt->bindvalue(1,$_POST['mail']);
$stmt->bindvalue(2,$_POST['password']);

$stmt ->execute();

$pdo = NULL;

foreach($stmt as $row){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

header("Location:http://localhost/login_mypage/mypage.php");


?>