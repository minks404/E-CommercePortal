<?php 

    session_start();
    $name = $_SESSION['sname'];

    if($name != "admin") header("location: invalidAccess.php");
?>