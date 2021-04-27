<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){
    try{
        $pdo= new PDO("mysql:dbname=lesson1;host=localhost;","root","");
    }catch(PDOException $e){
        die("<p>申し訳ありません。現在サーバーが混み合っており一時的にアクセスできません。<br>しばらくしてから再度ログインをしてください。</p>
           <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
           );
    }
    



$stmt = $pdo-> prepare("select * from login_mypage where mail= ? && password = ?");
            
$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);
            
$stmt->execute();
$pdo = NULL;

foreach($stmt as $row){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

if(empty($_SESSION["id"])){
    header("Location:login_error.php");
}

if(!empty($_POST['check'])){
    $_SESSION['check']=$_POST['check'];
}
}

if(!empty($_SESSION['id'])&& !empty($_SESSION['check'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('check',$_SESSION['check'],time()+60*60*24*7);
}else if(empty($_SESSION['check'])){
    setcookie('mail',time()-1);
    setcookie('name',time()-1);
    setcookie('check',time()-1);
}

?>

<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>会員情報</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>

    <body>
        <header>
            
                <img src="4eachblog_logo.jpg">
            
            <p><a href="log_out.php" >ログアウト</a></p>
        </header>
        <main>
        <div class="wrapper">
            <h3>会員情報</h3>
            <p>こんにちは！ <?php echo $_SESSION['name']; ?>　さん</p>
            <div class="picture"><img src="<?php echo $_SESSION['picture']; ?>"></div>
            <div class="kaiin">
                <p>氏名： <?php echo $_SESSION['name']; ?></p>
                <p>メール：<?php echo $_SESSION['mail']; ?> </p>
                <p>パスワード：<?php echo $_SESSION['password']; ?><p>
            </div>
            <div class="comments"><?php echo $_SESSION['comments']; ?></div>
            <form action="mypage_hensyu.php" method="post" class="form_center">
                <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
                <input class="upload" type="submit" value="編集する">
            </form>
            
        </div>
        </main>
        <footer>
            © 2018 interNous.inc. All rights reserved
        </footer>
    </body>
</html>