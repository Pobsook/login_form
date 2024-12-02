<?php 
session_start();
require("connect.php");

if(isset($_POST["email_account"]) && isset($_POST["password_account"])){
    if(empty($_POST["email_account"]) ||  empty($_POST["password_account"])){
        $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('Location: form_login.php');
        exit();
    }else{
        $email_account = htmlspecialchars($_POST["email_account"]);
        $password_account = htmlspecialchars($_POST["password_account"]);
        $callback_rows = $connect -> prepare("SELECT * FROM account WHERE email_account = ? ");
        $callback_rows -> bind_param('s', $email_account);
        $callback_rows -> execute();
        $callback_rows_result = $callback_rows -> get_result();
        if($callback_rows_result -> num_rows > 0){
            $row = $callback_rows_result -> fetch_assoc();
            $callback_email_account = $row['email_account'];
            $callback_password_account = $row['password_account'];
            $callback_login_count_account = $row['login_count_account'];
            $callback_lock_account = $row['lock_account'];
            $callback_ban_account = $row['ban_account'];
            $callback_role_account = $row['role_account'];
            $callback_ban_count = $row['ban_count'];
            $lock_duration = 30 * pow(2, $callback_ban_count);
            $time = (time()+21628) - strtotime($callback_ban_account);
            $timeban = ((strtotime($callback_ban_account)+$lock_duration) - (time()+21628));
            if($callback_lock_account >= 1 && $time < $lock_duration){
                $_SESSION['result'] = "บัญชีนี้ถูกระงับการใช้งานชั่วคราว เหลือเวลา $timeban วินาที";
                header('Location: form_login.php');
                exit();
            }elseif(password_verify($password_account, $callback_password_account)){
                $update_success_login = $connect -> prepare("UPDATE account SET login_count_account = 0, lock_account = 0, ban_account = NULL, ban_count = 0 WHERE email_account = ? ");
                $update_success_login -> bind_param('s', $email_account);
                $update_success_login -> execute();
                $_SESSION['result'] = 'เข้าสู่ระบบสำเร็จ';
                $_SESSION['user_id'] = "$email_account";
                if($callback_role_account == 'Admin'){
                    header('Location: admin.php');
                    exit();
                }else{
                    header('Location: dashboard.php');
                    exit();
                }
            }else{
                $new_login_count_account = $callback_login_count_account + 1;
                if($new_login_count_account == 3){
                    $new_ban_count = $callback_ban_count + 1;
                    $update_fail_login = $connect -> prepare("UPDATE account SET login_count_account = 0, lock_account = 1, ban_account = NOW(), ban_count = ? WHERE email_account = ? ");
                    $update_fail_login -> bind_param('is', $new_ban_count, $email_account);
                    $update_fail_login -> execute();
                    $_SESSION['result'] = "คุณใส่ password ไม่ถูก3ครั้ง ถูกระงับการใช้งานชั่วคราว $lock_duration วินาที";
                    header('Location: form_login.php');
                    exit();
                }else{
                    $update_fail_login = $connect -> prepare("UPDATE account SET login_count_account = ? WHERE email_account = ? ");
                    $update_fail_login -> bind_param('is', $new_login_count_account, $email_account);
                    $update_fail_login -> execute();
                    $_SESSION['result'] = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
                    header('Location: form_login.php');
                    exit();
                }
            }
        }else{
            $_SESSION['result'] = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
            header('Location: form_login.php');
            exit();
        }
    }
}else{
    $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
    header('Location: form_login.php');
    exit();
}