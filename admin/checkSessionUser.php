<?php 
if(session_status() == PHP_SESSION_NONE) {

    session_start();
}

if((!isset($_SESSION['admin_ID']) && empty($_SESSION['admin_ID']))) {
    
    header("Location: login.php");
}

?>