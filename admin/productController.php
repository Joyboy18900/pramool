<?php 

if(session_status() == PHP_SESSION_NONE) {

    session_start();
}
require_once "include/connectDB.php";


if(isset($_GET["getProductById"])) {

    $item_ID = $_POST["item_ID"];

    $result = showProductById($conn, $item_ID);

    echo json_encode($result);
}

if(isset($_GET["addProduct"])) {

    $item_Name = $_POST['item_Name'];
    $item_Description = $_POST['item_Description'];
    $item_Close_Date = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +20 minutes"));
    $item_Increment_Price = $_POST['item_Increment_Price'];
    $item_Path = uploadFileProduct($_FILES["item_Path"]);
    $users_ID = ($_SESSION['userRole'] == 1) ? $_SESSION['admin_ID'] : $_SESSION['user_ID'];
    $item_Role = $_SESSION['userRole'];

    addProduct($conn, $item_Name, $item_Description, $item_Close_Date, $item_Increment_Price, $item_Path, $users_ID, $item_Role);
}

if(isset($_GET["editProduct"])) {
    
    $item_ID = $_POST['item_ID'];
    $item_Name = $_POST['item_Name'];
    $item_Description = $_POST['item_Description'];
    $item_Close_Date = $_POST['item_Close_Date'];
    $item_Increment_Price = $_POST['item_Increment_Price'];
    $item_Path = ($_FILES['item_Path']['size'] >= 0 && $_FILES['item_Path']['error'] == 0) ? uploadFileProduct($_FILES["item_Path"]) : "";
    $users_ID = $_SESSION['admin_ID'];

    editProduct($conn, $item_ID, $item_Name, $item_Description, $item_Close_Date, $item_Increment_Price, $item_Path, $users_ID);
}

if(isset($_GET["deleteProduct"])) {

    $item_ID = $_GET["item_ID"];

    deleteProduct($conn, $item_ID);
}

function showProduct($conn) { 

    $sql_product = "SELECT `item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, 
    `item_Increment_Price`, `item_Actual_Price`, `item_Status`, `item_Role`, `item_Comments`, 
    `item_Path`, `users_ID`, `user_Name` 
    FROM `items`";

    $result_product = $conn->query($sql_product);

    $rows = array(); 

    if ($result_product->num_rows > 0) {
        
        foreach ($result_product as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows;
}

function showProductSaleByUsers($conn) { 

    $sql_product = "SELECT `item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, 
    `item_Increment_Price`, `item_Actual_Price`, `item_Status`, `item_Role`, `item_Comments`, 
    `item_Path`, `users_ID`, `user_Name` 
    FROM `items`
    WHERE item_Role = 0";

    $result_product = $conn->query($sql_product);

    $rows = array(); 

    if ($result_product->num_rows > 0) {
        
        foreach ($result_product as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows;
}

function showProductUsersByUsersID($conn, $users_ID) { 

    $sql_product = "SELECT `item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, 
    `item_Increment_Price`, `item_Actual_Price`, `item_Status`, `item_Role`, `item_Comments`, 
    `item_Path`, `users_ID`, `user_Name` 
    FROM `items`
    WHERE item_Role = 0 AND users_ID = {$users_ID} ";

    $result_product = $conn->query($sql_product);

    $rows = array(); 

    if ($result_product->num_rows > 0) {
        
        foreach ($result_product as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows;
}

function showProductByStatusNotApprove($conn, $users_ID) { 

    $sql_product = "SELECT `item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, 
    `item_Increment_Price`, `item_Actual_Price`, `item_Status`, `item_Role`, `item_Comments`, 
    `item_Path`, `users_ID`, `user_Name` 
    FROM `items`
    WHERE item_Status = 0 AND users_ID != {$users_ID} AND item_Role = 0";

    $result_product = $conn->query($sql_product);

    $rows = array(); 

    if ($result_product->num_rows > 0) {
        
        foreach ($result_product as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows;
}

function showProductById($conn, $item_ID) { 

    $sql_product = "SELECT `item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, 
    `item_Increment_Price`, `item_Actual_Price`, `item_Status`, `item_Role`, `item_Comments`, 
    `item_Path`, items.users_ID, items.user_Name, users.user_Name as OwnUser_Name
    FROM `items`
    LEFT JOIN users ON items.users_ID = users.user_ID 
    WHERE  `item_ID` = {$item_ID} ";

    $result_product = $conn->query($sql_product);

    $rows = array(); 

    if ($result_product->num_rows > 0) {
        
        foreach ($result_product as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows[0];
}

function addProduct($conn, $item_Name, $item_Description, $item_Close_Date, $item_Increment_Price, $item_Path, $users_ID, $item_Role) { 

    $sql_product = "INSERT INTO `items`(`item_ID`, `item_Name`, `item_Description`, `item_Close_Date`, `item_Increment_Price`, item_Role, item_Path, users_ID) 
    VALUES (NULL, '{$item_Name}', '{$item_Description}','{$item_Close_Date}', {$item_Increment_Price}, {$item_Role}, '{$item_Path}', '{$users_ID}')";

    if ($conn->query($sql_product) === TRUE) {

        if($_SESSION['userRole'] == 0) {
            echo ("<script language='JavaScript'>
            window.alert('เพิ่มข้อมูลสำเร็จ');
            window.location.href='../userProduct.php';
            </script>");
        }
        if($_SESSION['userRole'] == 1) {
            echo ("<script language='JavaScript'>
            window.alert('เพิ่มข้อมูลสำเร็จ');
            window.location.href='Product.php';
            </script>");
        }
    } else {
        if($_SESSION['userRole'] == 0) {
            echo ("<script language='JavaScript'>
                window.alert('เพิ่มข้อมูลไม่สำเร็จ');
                window.location.href='../userProductAdd.php';
                </script>");
        }
        if($_SESSION['userRole'] == 1) {
            echo ("<script language='JavaScript'>
                window.alert('เพิ่มข้อมูลไม่สำเร็จ');
                window.location.href='addProduct.php';
                </script>");
        }
    }
}

function editProduct($conn, $item_ID, $item_Name, $item_Description, $item_Close_Date, $item_Increment_Price, $item_Path = NULL, $users_ID) { 

    $sql_product = "UPDATE `items` SET `item_Name`= '{$item_Name}',`item_Description`= '{$item_Description}', 
    `item_Close_Date`= '{$item_Close_Date}', `item_Increment_Price`= '{$item_Increment_Price}',`item_Path`= '{$item_Path}',
    `users_ID`= '{$users_ID}'  
    WHERE `item_ID`= '{$item_ID}' ";

    if($item_Path == NULL || $item_Path == "") {
        $sql_product = "UPDATE `items` SET `item_Name`= '{$item_Name}',`item_Description`= '{$item_Description}', 
        `item_Close_Date`= '{$item_Close_Date}', `item_Increment_Price`= '{$item_Increment_Price}', `users_ID`= '{$users_ID}'  
        WHERE `item_ID`= '{$item_ID}' ";
    }

    if ($conn->query($sql_product) === TRUE) {
        
        echo ("<script language='JavaScript'>
            window.alert('แก้ไขข้อมูลสำเร็จ');
            window.location.href='editProduct.php?item_ID={$item_ID}';
            </script>");
    } else {
        echo ("<script language='JavaScript'>
            window.alert('แก้ไขข้อมูลไม่สำเร็จ');
            window.location.href='editProduct.php?item_ID={$item_ID}';
            </script>");
    }
}

function deleteProduct($conn, $item_ID) { 

    $sql_product = "DELETE FROM `items` 
    WHERE `item_ID` = '{$item_ID}' ";

    if ($conn->query($sql_product) === TRUE) {
        
        echo ("<script language='JavaScript'>
            window.alert('ลบข้อมูลสำเร็จ');
            window.location.href='Product.php';
            </script>");
    } else {
        echo ("<script language='JavaScript'>
            window.alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='Product.php';
            </script>");
    }
}

function uploadFileProduct($item_Path) { 

    $temp = explode(".", $item_Path["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    
    if(move_uploaded_file($item_Path["tmp_name"], "assets/img/imageProduct/". $newfilename)){

        return $newfilename;
    }else{

        return NULL;
    }
}

?>