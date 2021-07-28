<html>
    <head><title>Forgot Password</title>
        <script src="js/loginFormValidation.js"></script>
        <?php
            include("database.php");
            include("navBar.php");
            
            if( isset($_POST["submit"])) {

                $random_num = rand(1000000000,9999999999);

                $email = $_POST["email"];
                $query="SELECT  user_ID from users where email = '$email'";

                $response=mysql_query($query);

                $num_rows = mysql_num_rows($response);

                if( $num_rows == 0 ) {
                    echo "<center><h1><label>Invalid Email!</label></h1></center>";
                    exit();
                }

                // Always set content-type when sending HTML email
		        $headers = "MIME-Version: 1.0" . "\r\n";
		        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		        // More headers
		        $headers .= 'From: <manoj.max4@gmail.com>' . "\r\n";
                //$headers .= 'Cc: myboss@example.com' . "\r\n";
            
		        $link = "<a href='http://localhost/OnlineProductBidding/updatePassword.php?verification_code=".$random_num."'>Click Here</a>";


		        $subject = "Change password request";
		        $message = "You have requested for update password.";
		        $message.= "Please click on the link below to update your password";
		        $message.= $link;
                mail($email,$subject,$message,$headers);
                

                $update_query="UPDATE users SET verification_code = '$random_num' WHERE email = '$email'";
                $result = mysql_query($update_query);

                if( !$result ) {
                    echo "Please try again!";
                    exit();
                }
                else echo "Email sent to your email address.";

                echo "<a href='updatePassword.php?verification_code=".$random_num."'>Click here</a>.";

                
            }
        ?>

        <center><h1><label>Forgot Password</label></h1></center>
        </br>

    </head>

    <body>
        <form onsubmit="return checkValues()" method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <td> <label>Email</label></td>
                    <td> <input type="email" name="email" class="text_field" /></td>
                </tr>
                <tr>
                    <td colspan = 2><center><input type="submit" name="submit" /></center></td>
                </tr>
            </table>
        </form>
    </body>
</html>