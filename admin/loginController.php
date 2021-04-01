<?php 

require_once "include/connectDB.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["checkLogin"])) {

    $admin_Name = $_POST['admin_Name'];
    $admin_Password = $_POST['admin_Password'];

    $sql_member = "SELECT `admin_ID`, `admin_Name` 
    FROM `admin` 
    WHERE `admin_Name` = '{$admin_Name}' AND `admin_Password` = '{$admin_Password}' ";

    $result_member = $conn->query($sql_member);

    if ($result_member->num_rows > 0) {

        foreach ($result_member as $key => $value) {
            $_SESSION['admin_ID'] = $value['admin_ID'];
            $_SESSION['admin_Name'] = $value['admin_Name'];
            $_SESSION['userRole'] = 1;
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