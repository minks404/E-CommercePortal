<?php
                include("checkAdmin.php");
                include("database.php");

                $user_ID = $_POST["user_ID"];

                $action = "failure";

                $update_query="UPDATE users SET validation = '1' WHERE user_ID = '$user_ID'";
                $response = mysqli_query($ con, $update_query);

                if(!$response){
                    
                    echo "<center><h1> User ID ".$user_ID." Validation Not Successfull!</h1></center>";
                    echo "<center><h3>".mysqli_error( $con )."</h3></center>";
                }

?>