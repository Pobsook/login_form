<?php 
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
</head>
<body>
    <?php require("alert.php") ?>
    <a href="form_login.php">กลับหน้า Login</a>
</body>
</html>