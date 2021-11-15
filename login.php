<html>
    <head>
        <title>User Login</title>
        <script src="js/loginFormValidation.js"></script>
		
		<script type="text/javascript" >
		
			function goHome() {
				window.location.href = "./index.php";
			}
		
		</script>
		
        <?php   
            include("database.php");
            include("navBar.php");

            if( isset( $_POST["submit"])) {

                $email = $_POST["email"];
                $password = $_POST["password"];

                $query = "SELECT user_ID, name, password, company_name, validation from users where email = '$email'";
                $response = mysqli_query($query);

                $num_rows = mysqli_num_rows( $response );

                if( $num_rows == 0 ) {

                    echo "<center><h1>Login Unsuccessfull!<h1></center>";
                    echo "<center><h3>Invalid Email!";
                    exit();
                } 

                $result = mysqli_fetch_assoc( $response );

                if(  $password != $result["password"]) {
                    echo "<center><h1>Login Unsuccessfull!<h1></center>";
                    echo "<center><h3>Incorrect Password!</h3></center>!";
                    exit();
                }

                if( $result["validation"] == "0") {
                    echo "<center><h1>Login Unsuccessfull!<h1></center>";
                    echo "<center><h3>You have not been validated yet, wait for atleast 2hrs after registration, then if
                    this error persists contact admin at admin@onlineproductbidding.com. </h3></center>!";
                    echo "<center><h3>Sorry for the inconvenience but we follow proper protocols in order to ensure authenticity and
                        reliability of the users who join us.<h3></center>";
                    exit();
                }
                
                $_SESSION["sid"] = $result["user_ID"];
                $_SESSION["sname"] = $result["name"];
                $_SESSION["email"] = $email;
                $_SESSION["company_name"] = $result["company_name"];

                if( isset( $_POST["remember_me"]) ) {
                    setcookie("email", $email, time() + 3600);
                    setcookie("password", $password, time() + 3600);
                }
				
				echo '<script type="text/javascript">goHome();</script>';
				

            }
        ?>
        <center><h1><label>User Login</label></h1></center>
        </br>
    </head>
    <body>
        <form onsubmit= "return checkValues()" method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="email" id="email"  class="text_Field" value="<?php  echo (isset( $_COOKIE["email"])) ? $_COOKIE["email"] : ""; ?>" /></td>
                </tr>
                <tr>  
                    <td><label>Password</label></td>
                    <td><input type="password" name="password" id="password"  class="text_Field" value="<?php echo (isset( $_COOKIE["password"])) ? $_COOKIE["password"] : ""; ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" ><center><input type="submit" name="submit" id="submit" /></center></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="remember_me" id="remember_me" /><label for="remember_me">Remember me</label></td>
                    <td><a href="forgotPassword.php"><center><label >Forgot Password</label></center></a></td>
                </tr>
            </table>
        </form>
    </body>
</html>