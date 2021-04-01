<?php 

    // echo "<pre>";
    // print_r($_GET);
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";
    // exit;

require_once "include/connectDB.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["checkLogin"])) {

    $user_Name = $_POST['user_Name'];
    $user_Password = $_POST['user_Password'];

    $sql_member = "SELECT `user_ID`, `user_Name`, `user_RealName`, `user_Address`, `user_Postal`, `user_Email`, `user_Phone`, `user_Date` 
    FROM `users` 
    WHERE `user_Name` = '{$user_Name}' AND `user_Password` = '{$user_Password}' ";

    $result_member = $conn->query($sql_member);

    if ($result_member->num_rows > 0) {

        foreach ($result_member as $key => $value) {
            $_SESSION['user_ID'] = $value['user_ID'];
            $_SESSION['user_Name'] = $value['user_Name'];
            $_SESSION['user_RealName'] = $value['user_RealName'];
            $_SESSION['userRole'] = 0;
        }

        echo ("<script language='JavaScript'>
            window.alert('เข้าสู่ระบบสำเร็จ');
            window.location.href='index.php';
            </script>");
    } else {
        
        echo ("<script language='JavaScript'>
            window.alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง !');
            window.location.href='login.php';
            </script>");
    }
}

?>