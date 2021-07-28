<html>
    <head>
        <title>Update Password</title>
        <script src="js/updatePasswordValidation.js"></script>
        <?php

            include("database.php");
            include("navBar.php");

            $verification_code = $_GET["verification_code"];

            $query = "SELECT user_ID, email from users where verification_code ='$verification_code'";

            $response = mysql_query( $query );
            $num_rows = mysql_num_rows($response);

            if( $num_rows == 0) {
                echo "<center><h1><label>Verification Code has expired, please try again!</label></h1></center>";
                exit();
            }

            $result = mysql_fetch_assoc($response);
            
            if( isset($_POST["submit"])) {

                $password = $_POST["password"];

                $update_query = "UPDATE users SET password = '$password', verification_code = '' WHERE verification_code = '$verification_code' ";

                $response = mysql_query( $update_query);

                if( !$response ) {
                    echo "<center><h1><label>Unknown Error! Please try again later!</label></h1></center>";
                    echo mysql_error();
                }
                else {
                    echo "<center><h1><label>Password Updated Successfully!</label></h1></center>";
                }
            }
        ?>
    </head>

    <body>
        <center><h1><label>Update Password</label></h1></center>
        </br>
        <form onsubmit="return checkValues()" method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="password" id="password" class="text_field"/></td>
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