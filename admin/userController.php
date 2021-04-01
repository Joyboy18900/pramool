<?php 

require_once "include/connectDB.php";


if(isset($_GET["addUser"])) {

    $user_RealName = $_POST['user_RealName'];
    $user_Name = $_POST['user_Name'];
    $user_Password = $_POST['user_Password'];
    $user_Address = $_POST['user_Address'];
    $user_Postal = $_POST['user_Postal'];
    $user_Email = $_POST['user_Email'];
    $user_Phone = $_POST['user_Phone'];

    addUser($conn, $user_RealName, $user_Name, $user_Password, $user_Address, $user_Postal, $user_Email, $user_Phone);
}

if(isset($_GET["editUser"])) {
    
    $user_ID = $_POST["user_ID"];
    $user_RealName = $_POST['user_RealName'];
    $user_Name = $_POST['user_Name'];
    $user_Address = $_POST['user_Address'];
    $user_Postal = $_POST['user_Postal'];
    $user_Email = $_POST['user_Email'];
    $user_Phone = $_POST['user_Phone'];

    editUser($conn, $user_ID, $user_RealName, $user_Name, $user_Address, $user_Postal, $user_Email, $user_Phone);
}

if(isset($_GET["deleteUser"])) {

    $user_ID = $_GET["user_ID"];

    deleteUser($conn, $user_ID);
}

function showUsers($conn) { 

    $sql_user = "SELECT `user_ID`, `user_Name`, `user_RealName`, `user_Password`, 
    `user_Address`, `user_Postal`, `user_Email`, `user_Phone`, `user_Date` 
    FROM `users`";

    $result_user = $conn->query($sql_user);

    $rows = array(); 

    if ($result_user->num_rows > 0) {
        
        foreach ($result_user as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows;
}

function showUserById($conn, $user_ID) { 

    $sql_user = "SELECT `user_ID`, `user_Name`, `user_RealName`, `user_Password`, 
    `user_Address`, `user_Postal`, `user_Email`, `user_Phone`, `user_Date` 
    FROM `users`
    WHERE  `user_ID` = {$user_ID} ";

    $result_user = $conn->query($sql_user);

    $rows = array(); 

    if ($result_user->num_rows > 0) {
        
        foreach ($result_user as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows[0];
}

function addUser($conn, $user_RealName, $user_Name, $user_Password, $user_Address, $user_Postal, $user_Email, $user_Phone) { 

    $sql_user = "INSERT INTO `users`(`user_ID`, `user_Name`, `user_RealName`, `user_Password`, `user_Address`, `user_Postal`, `user_Email`, `user_Phone`) 
    VALUES (NULL, '{$user_Name}', '{$user_RealName}', '{$user_Password}', '{$user_Address}', '{$user_Postal}', '{$user_Email}', '{$user_Phone}')";

    if ($conn->query($sql_user) === TRUE) {
        
        echo ("<script language='JavaScript'>
            window.alert('เพิ่มข้อมูลสำเร็จ');
            window.location.href='User.php';
            </script>");
    } else {

        if($conn->errno == 1062) {

            echo ("<script language='JavaScript'>
            window.alert('อีเมล์หรือเบอร์โทรศัพท์มีแล้วในระบบ !');
            window.location.href='addUser.php';
            </script>");
        }
        
        echo ("<script language='JavaScript'>
            window.alert('เพิ่มข้อมูลไม่สำเร็จ');
            window.location.href='addUser.php';
            </script>");
    }
}

function editUser($conn, $user_ID, $user_RealName, $user_Name, $user_Address, $user_Postal, $user_Email, $user_Phone) { 

    $sql_user = "UPDATE `users` SET `user_Name` = '{$user_Name}',`user_RealName` = '{$user_RealName}',
    `user_Address` = '{$user_Address}',`user_Postal` = '{$user_Postal}',`user_Email` = '{$user_Email}', `user_Phone` = '{$user_Phone}' 
    WHERE `user_ID` = '{$user_ID}' ";

    if ($conn->query($sql_user) === TRUE) {
        
        echo ("<script language='JavaScript'>
            window.alert('แก้ไขข้อมูลสำเร็จ');
            window.location.href='editUser.php?user_ID={$user_ID}';
            </script>");
    } else {
        echo ("<script language='JavaScript'>
            window.alert('แก้ไขข้อมูลไม่สำเร็จ');
            window.location.href='editUser.php?user_ID={$user_ID}';
            </script>");
    }
}

function deleteUser($conn, $user_ID) { 

    $sql_user = "DELETE FROM `users` 
    WHERE `user_ID` = '{$user_ID}' ";

    if ($conn->query($sql_user) === TRUE) {
        
        echo ("<script language='JavaScript'>
            window.alert('ลบข้อมูลสำเร็จ');
            window.location.href='User.php';
            </script>");
    } else {
        echo ("<script language='JavaScript'>
            window.alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='User.php';
            </script>");
    }
}

?>