<?php
    include("checkLogin.php");
    include("navBar.php");
    
    session_unset();
    session_destroy();

    echo "<center><h1><label>You have been logged out Successfully!</label></h1></center>";
?>