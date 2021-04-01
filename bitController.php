<?php 

require_once "include/connectDB.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["bitProduct"])) {

    $bitProduct = $_GET['bitProduct'];
    $item_ID = $_GET['item_ID'];
    $item_Name = $_GET['item_Name'];
    $item_Increment_Price = $_GET['item_Increment_Price'];
    $item_Actual_Price = $_GET['item_Actual_Price'];
    $user_ID = $_SESSION["user_ID"];
    $user_Name = $_SESSION['user_Name'];
    $bid_Price = $item_Increment_Price + $item_Actual_Price;

    $sql_item = "SELECT bid_ID, user_ID  
    FROM bid 
    WHERE bid_Date = (
            SELECT MAX(bid_Date) AS max_date
            FROM bid 
        ) AND item_ID = '{$item_ID}' 
    GROUP BY item_ID ";

    $result_item = $conn->query($sql_item);
    $rows_item = $result_item->fetch_assoc();

    if ($rows_item["user_ID"] != $user_ID) {

        $sql_bit = "INSERT INTO `bid`(`bid_ID`, `user_ID`, `item_ID`, `user_Name`, `item_Name`, `bid_Date`, `bid_Price`) 
        VALUES (NULL, '{$user_ID}', '{$item_ID}', '{$user_Name}', '{$item_Name}', NOW(), {$bid_Price})";

        if ($conn->query($sql_bit) === TRUE) {

            $sql_item = "UPDATE `items` SET `user_Name` = '{$user_Name}', `item_Actual_Price` = '{$bid_Price}' 
            WHERE `item_ID` = {$item_ID} ";

            if($conn->query($sql_item) === TRUE) {

                echo ("<script language='JavaScript'>
                    window.location.href='productDetail.php?item_ID={$item_ID}';
                    </script>");
            }
        }
    } else {
        
        echo ("<script language='JavaScript'>
            window.alert('คุณคือคนบิตสูงสุดแล้ว !');
            window.location.href='productDetail.php?item_ID={$item_ID}';
            </script>");
    }
}

function showLastBitByItemId($conn, $item_ID) { 

    $sql_product = "SELECT bid_ID, user_Name, bid_Date, bid_Price
    FROM bid 
    WHERE (
            SELECT MAX(bid_Date) AS max_date
            FROM bid 
        ) AND item_ID = '{$item_ID}'  ";

    $result_product = $conn->query($sql_product);

    $rows = array(); 

    if ($result_product->num_rows > 0) {
        
        foreach ($result_product as $key => $value) {

            array_push($rows, $value);
        }
    } 

    return $rows;
}
?>