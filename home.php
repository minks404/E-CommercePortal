<html>
    <head>
        <title>Home</title>
        <?php
            session_start();

            include("database.php");
            include("navBar.php");

            
            if( isset( $_SESSION["sid"]) ) {

                echo "<h2>Welcome, ".$_SESSION["sname"]."!</h2>";
            }
            else {
                echo "<h2>Welcome, Guest!</h2>";
            }
        ?>
    </head>
    <body>

        

    </body>
</html>