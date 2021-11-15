<html>
    <head>
        <title>Delete Profile</title>
    </head>

    <?php
        include("checkLogin.php");
        include( "database.php");
        include("navBar.php");


        if(isset( $_POST["submit"]) ) {

            if( !isset( $_POST["agree"]) ) 
                echo "<center><h1>Please click on 'I Understand' to delete your account.</center></br>";

            else {
                $user_ID = $_SESSION['sid'];

                $query = "SELECT registration_certificate from users where user_ID = '$user_ID'";

                $response = mysqli_query($con $query);

                $result = mysqli_fetch_assoc($response);

                $registration_certificate = "upload/".$result["registration_certificate"];

                unlink( $registration_certificate ); //delete registration_certificate.pdf

                $query = "DELETE from users where user_ID = '$user_ID'";

                $result = mysqli_query($con, $query);

                session_unset();
                session_destroy();

                if( $result)
                    echo "<center><h1>Delete Successfull!</h1></center>";

                else {
                    echo "<center><h1>Delete not Successfull</h1></center>";
                echo "<center><h3>".mysqli_error($con)."</h3></center>";
                }
            }
        }
    ?>

    <body>
        <form method="post">
            <center><h1><label>Are you sure?</label></h1></center>
            <center><font size=5><label>Once you delete, your account will be permenently deleted from our records 
                and you will not be able to recover it back.</br></br></br>
                    <input type="checkbox" id="agree" name="agree" /><label for="agree">I Understand</label></br></br></font>

                    <input type="submit" name="submit" value="Delete" onclick="" />
        </form>
    </body>
</html>