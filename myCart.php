<html>
    <head>
        <title>My Cart</title>

        <?php

            include("checkLogin.php");
            include("database.php");
            include("navBar.php");

            $_SESSION["product_1"] = "";
            $_SESSION["product_2"] = "";
            $_SESSION["product_3"] = "";
            $_SESSION["product_4"] = "";
            $_SESSION["product_5"] = "";

            function fetchItems() {
                if( isset($_SESSION["product_1"]) ) {

                }
                if( isset($_SESSION["product_2"]) );
                if( isset($_SESSION["product_3"]) );
                if( isset($_SESSION["product_4"]) );
                if( isset($_SESSION["product_5"]) );

            }
             

        ?>
    </head>

    <body>
        
        <center><h1><label>My Cart</label></h1><center>
        <form>  
            <center><table border="1">
                <tr>
                    <th><label>Serial No.</label></th>
                    <th><label>Item Name</label></th>
                    <th><label>Quantity</label></th>
                    <th><label>Total Price</label></th>
                </tr>

                <?php 
                   // while( tr);

                ?>
            </center></table>
        </form>
    </body>

</html>