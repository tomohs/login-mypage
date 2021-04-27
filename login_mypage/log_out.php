<?php
mb_internal_encoding("utf8");

session_start();
session_destroy();

header("Location:http://localhost/login_mypage/login.php");

?>