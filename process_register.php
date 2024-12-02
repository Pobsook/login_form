<?php 
session_start();
require("connect.php");

if(isset($_POST['username_account'], $_POST['email_account'], $_POST['password1_account'], $_POST['password2_account'])){
    if(empty($_POST['username_account']) || empty($_POST['email_account']) || empty($_POST['password1_account']) || empty($_POST['password2_account'])){
        $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('Location: form_register.php');
        exit();
    }else{
        $username_account = htmlspecialchars($_POST['username_account']);
        $email_account = htmlspecialchars($_POST['email_account']);
        $password1_account = htmlspecialchars($_POST['password1_account']);
        $password2_account = htmlspecialchars($_POST['password2_account']);
        
        if($password1_account == $password2_account){
            $check_email = $connect -> prepare("SELECT email_account FROM account WHERE email_account = ?");
            $check_email -> bind_param('s', $email_account);
            $check_email -> execute();
            $query_check_email = $check_email -> get_result();
            
            if($query_check_email -> num_rows > 0){
                $_SESSION['result'] = 'อีเมล์นี้ถูกใช้งานแล้ว';
                header('Location: form_register.php');
                exit();
            }else{
                $password_account = password_hash($password1_account, PASSWORD_ARGON2ID);
                $insert = $connect->prepare("INSERT INTO account(username_account, email_account, password_account, role_account, image_account) VALUES (?, ?, ?, '', '')");
                $insert->bind_param('sss', $username_account, $email_account, $password_account);
                
                if($insert -> execute()){
                    $_SESSION['result'] = 'การสมัครสมาชิกสำเร็จ';
                    header('Location: form_login.php');
                    exit();
                }else{
                    $_SESSION['result'] = 'ไม่สามารถบันทึกข้อมูลได้';
                    header('Location: form_register.php');
                    exit();
                }
            }
        }else{
            $_SESSION['result'] = 'รหัสผ่านไม่ตรงกัน';
            header('Location: form_register.php');
            exit();
        }
    }
}else{
    $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
    header('Location: form_register.php');
    exit();
}
?>

