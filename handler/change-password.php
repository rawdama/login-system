<?php 
session_start();
require_once('../inc/db.php');


if(isset($_POST['submit']))
{
    $old_password = filter_var($_POST['old_password'], FILTER_SANITIZE_STRING);
    $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);

    //check if email exsit or not 
    $sql = "SELECT * FROM users WHERE email=? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_email']]);
    $data = $stmt->fetchObject();
    if($data)
    {
        $check = password_verify($old_password,$data->password);
        if($check)
        {
            if($new_password ===$confirm_password)
            {
                $new_password = password_hash($new_password ,PASSWORD_DEFAULT );
                //update password in database
                $sql = "UPDATE users SET password=? WHERE email=? ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$new_password, $_SESSION['user_email']]);
                
                header("Location:../show-data.php");
                die();
            }

            else{
                $_SESSION['error']='passwords not the same';
            }
        

        }
        else{
            $_SESSION['error']='password not correct';
        }
    
}

}
header("Location:../change-password.php");