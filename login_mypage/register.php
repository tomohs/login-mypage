<!DOCTYPE HTML>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>会員登録</title>
        <link rel="stylesheet" type="text/css" href="register.css">
    </head>

    <body>
        <header>
            <div class="headerpic">
                <a href="login.php"><img src="4eachblog_logo.jpg"></a>
            </div>
        </header>
        <main>
            <div class="wrapper">
                <h2>会員登録</h2>
            <form method="post" action="register_confirm.php" enctype="multipart/form-data" class="register">
                <p><span>必須</span>氏名</p>
                <input type="text" size=35px name="name" required>
                <p><span>必須</span>メールアドレス</p>
                <input type="text" size=35px name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]*\.[a-z]{2,3}$" required>
                <p><span>必須</span>パスワード</p>
                <input type="password" size=35px name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                <p><span>必須</span>パスワード確認</p>
                <input type="password" size=35px name="confirm_password" pattern="^[a-zA-Z0-9]{6,}$" id="confirm" oninput="ConfirmPassword(this)" required>
                <p>プロフィール写真</p>
                <input type="hidden" name="max_file_size" value="1000000" />
                <input type="file" size="40" name="picture">
                <p>コメント</p>
                <textarea cols=35 rows=7 name="comments"></textarea>
                <input type="submit" class="submit" value="登録する">
                
            </form>
            </div>
        </main>
        <footer>
            © 2018 interNous.inc. All rights reserved
        </footer>
        <script>
            function ConfirmPassword(confirm){
                var input1 = password.value;
                var input2 = confirm.value;
                if(input1 != input2){
                    confirm.setCustomValidity("パスワードが一致しません。");
                }else{
                    confirm.setCustomValidity("");
                }
            }
        </script>
    </body>
</html>