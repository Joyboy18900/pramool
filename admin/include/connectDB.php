<?php
date_default_timezone_set("Asia/Bangkok");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pramool";

$conn = new mysqli($servername, $username, $password, $dbname);

$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("การเชื่อมต่อไม่สำเร็จ: " . $conn->connect_error);
}

UpdatCloseStatusProduct($conn);

function UpdatCloseStatusProduct($conn) {
     
    $dateTimeNow = new DateTime();

    $sql_item = "SELECT item_ID, item_Close_Date 
    FROM `items` 
    WHERE  item_Status = 0";

    $result_item = $conn->query($sql_item);

    if ($result_item->num_rows > 0) {

        foreach ($result_item as $key => $value) {

            $item_Close_Date = new DateTime($value["item_Close_Date"]);
            $interval = $item_Close_Date->diff($dateTimeNow);
            $minutes = $interval->format('%i');

            if($dateTimeNow > $item_Close_Date) {
                $sql_item = "UPDATE `items` SET `item_Status`= 1 
                WHERE item_ID = {$value['item_ID']} ";

                $conn->query($sql_item);
            }
            
        }
    }
}

?>