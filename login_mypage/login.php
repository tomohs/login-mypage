<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>

    <body>
        <header>
            <div class="headerpic">
                <a href="login.php"><img src="4eachblog_logo.jpg"></a>
            </div>
        </header>
        <main>
        <div class="wrapper">
            <form action="mypage.php" method="post">
                <p>メールアドレス</p>
                <input type="text" name="mail" size=30 value="<?php if(isset($_COOKIE['mail'])){ echo $_COOKIE['mail'];} ?>">
                <p>パスワード</p>
                <input type="password" name="password" size=30 value="<?php     if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
                <p><label><input type="checkbox" name="check" value="check" <?php if(isset($_COOKIE['check'])){ echo "checked='checked'";}?>>
                    ログイン状態を保持する</label></p>
                <p class="loginbutton"><input type="submit" class="submit" value="ログイン"></p>
            </form>
        </div>
        </main>
        <footer>
            © 2018 interNous.inc. All rights reserved
        </footer>
        
    </body>
</html>