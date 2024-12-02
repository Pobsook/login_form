<?php 
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php require("alert.php") ?>
    <h1>สร้างบัญชีของคุณ</h1>
    <form action="process_register.php" method="POST">
        <div>
            <input type="text" placeholder="username" name="username_account">
        </div>
        <div>
            <input type="email" placeholder="Email" name="email_account">
        </div>
        <div>
            <input type="password" placeholder="password1" name="password1_account">
        </div>
        <div>
            <input type="password" placeholder="password2" name="password2_account">
        </div>
        <div>
            <button type="submit">สมัครสมาชิก</button>
            <button><a href="form_login.php">กลับไปหน้า login</a></button>
        </div>
    </form>
</body>
</html>