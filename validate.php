<?php
                include("checkAdmin.php");
                include("database.php");

                $user_ID = $_POST["user_ID"];

                $action = "failure";

                $update_query="UPDATE users SET validation = '1' WHERE user_ID = '$user_ID'";
                $response = mysql_query($update_query);

                if(!$response){
                    
                    echo "<center><h1> User ID ".$user_ID." Validation Not Successfull!</h1></center>";
                    echo "<center><h3>".mysql_error()."</h3></center>";
                }

?>