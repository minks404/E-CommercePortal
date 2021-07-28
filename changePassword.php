<html>
    <head>
        <title>Change Password</title>

        <script src="js/changePasswordValidation.js"></script>

        <?php
            include("checkLogin.php");
            include("navBar.php");
            include("database.php");

            if( isset($_POST["submit"])) {
    
                $email = $_SESSION["email"];
                $user_ID = $_SESSION["sid"];

                $query = "SELECT password from users where email ='$email'";

                $response = mysql_query( $query );

                $result = mysql_fetch_assoc($response);
            
                if( $_POST["o_password"] != $result["password"] ) {

                    echo "<center><h1><label>Your Current Password is Incorrect, Please Try Again!</label></h1></center>";
                    exit();
                }

                $n_password = $_POST["n_password"];

                $update_query = "UPDATE users SET password = '$n_password' WHERE user_ID = '$user_ID' ";

                $response = mysql_query( $update_query);

                if( !$response ) {
                    echo "<center><h1><label>Unknown Error! Please try again later!</label></h1></center>";
                    echo mysql_error();
                }
                else {
                    echo "<center><h1><label>Password Changed Successfully!</label></h1></center>";
                }
            }
        ?>
    </head>

    <body>
        <center><h1><label>Change Password</label><h1></center>
        </br>
        <form onsubmit="return checkValues()" method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <td><label>Old Password</label></td>
                    <td><input type="password" name="o_password" id="o_password" class="text_field"/></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="n_password" id="n_password" class="text_field"/></td>
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                    <td><input type="password" name="c_password" id="c_password" class="text_field"/></td>
                </tr>
                <tr>
                    <td colspan="2" ><center><input type="submit" name="submit" /></center></td>
            </table>
        </form>

    </body>
</html>