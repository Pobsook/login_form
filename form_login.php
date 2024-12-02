<?php 
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php require("alert.php") ?>
    <h1>เข้าสู่ระบบ</h1>
    <form action="login_pro.php" method="POST">
        <div>
            <input type="email" placeholder="email" name="email_account">
        </div>
        <div>
            <input type="password" placeholder="password" name="password_account">
        </div>
        <div>
            <button type="submit">เข้าสู่ระบบ</button>
            <button><a href="form_register.php">สมัครสมาชิก</a></button>
        </div>
    </form>
</body>
</html>