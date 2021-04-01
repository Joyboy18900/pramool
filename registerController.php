<?php 

require_once "include/connectDB.php";


if(isset($_GET["registerUser"])) {

    $user_RealName = $_POST['user_RealName'];
    $user_Name = $_POST['user_Name'];
    $user_Password = $_POST['user_Password'];
    $user_Address = $_POST['user_Address'];
    $user_Postal = $_POST['user_Postal'];
    $user_Email = $_POST['user_Email'];
    $user_Phone = $_POST['user_Phone'];

    registerUser($conn, $user_RealName, $user_Name, $user_Password, $user_Address, $user_Postal, $user_Email, $user_Phone);
}

function registerUser($conn, $user_RealName, $user_Name, $user_Password, $user_Address, $user_Postal, $user_Email, $user_Phone) { 

    $sql_user = "INSERT INTO `users`(`user_ID`, `user_Name`, `user_RealName`, `user_Password`, `user_Address`, `user_Postal`, `user_Email`, `user_Phone`) 
    VALUES (NULL, '{$user_Name}', '{$user_RealName}', '{$user_Password}', '{$user_Address}', '{$user_Postal}', '{$user_Email}', '{$user_Phone}')";

    if ($conn->query($sql_user) === TRUE) {
        
        echo ("<script language='JavaScript'>
            window.alert('สมัครสมาชิกสำเร็จ');
            window.location.href='login.php';
            </script>");
    } else {

        if($conn->errno == 1062) {

            echo ("<script language='JavaScript'>
            window.alert('อีเมล์หรือเบอร์โทรศัพท์มีแล้วในระบบ !');
            window.location.href='register.php';
            </script>");
        }
        
        echo ("<script language='JavaScript'>
            window.alert('สมัครสมาชิกไม่สำเร็จ');
            window.location.href='register.php';
            </script>");
    }
}
?>