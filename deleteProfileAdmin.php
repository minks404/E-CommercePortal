<html>
    <head>
        <title>Delete Profile Admin</title>
    </head>

    <?php
        include("checkAdmin.php");
        include( "database.php");
        include("navBar.php");
        
        if(isset( $_POST["submit"]) ) {

            if( !isset( $_POST["agree"]) ) 
                echo "<center><h1>Please click on 'I Understand' to delete this account.</center></br>";

            else {

                $user_ID = $_GET['id'];

                $query = "SELECT registration_certificate from users where user_ID = '$user_ID'";

                $response = mysql_query($query);

                $result = mysql_fetch_assoc($response);

                $registration_certificate = "upload/".$result["registration_certificate"];

                unlink( $registration_certificate ); //delete registration_certificate.pdf

                $query = "DELETE from users where user_ID = '$user_ID'";

                $result = mysql_query($query);

                if( $result)
                echo "<center><h1>Delete Successfull!</h1></center>";

                else {
                echo "<center><h1>Delete not Successfull</h1></center>";
                    echo "<center><h3>".mysql_error()."</h3></center>";
                }
            }
        }
    
    ?>

    <body>
        <form method="post">
            <center><h1><label>Are you sure?</label></h1></center>
            <center><font size=5><label>Once you delete, this account will be permenently deleted from the records 
                and you will not be able to recover it back.</br></br></br>
                    <input type="checkbox" id="agree" name="agree" /><label for="agree">I Understand</label></br></br></font>

                    <input type="submit" name="submit" value="Delete" onclick="" />
        </form>
    </body>
	


</html>