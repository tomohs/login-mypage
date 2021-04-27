<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_POST["from_mypage"])){
    header("Location:login_error.php");
}

?>

<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>会員情報</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
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
            <form action="mypage_update.php" method="post">
                <div class="picture"><img src="<?php echo $_SESSION['picture']; ?>"></div>
                <div class="kaiin">
                    <p>氏名：<input type="text" class="text" name="name" value="<?php echo $_SESSION['name']; ?>"></p>
                    <p>メール：<input type="text" class="text" name="mail" value="<?php echo $_SESSION['mail']; ?>"></p>
                    <p>パスワード：<input type="text" class="text" name="password" value="<?php echo $_SESSION['password']; ?>"><p>
                </div>
                <div class="comments">
                    <textarea class="text" name="comments" cols=50 rows=7><?php echo $_SESSION['comments']; ?></textarea>
                </div>
                <input class="upload" type="submit" value="この内容に変更する">
                <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage_hensyu">
            </form>
            
        </div>
        </main>
        <footer>
            © 2018 interNous.inc. All rights reserved
        </footer>
    </body>
</html>