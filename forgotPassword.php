<html>
    <head><title>Forgot Password</title>
        <script src="js/loginFormValidation.js"></script>
		
		<?php 
			
		
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
			
			require 'vendor/autoload.php';

			$mail = new PHPMailer(true);
			
            include("database.php");
            include("navBar.php");
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
		

		</br>

		
		<?php
            
            if( isset($_POST["submit"])) {

                $random_num = rand(1000000000,9999999999);

                $email = $_POST["email"];
                $query="SELECT  user_ID from users where email = '$email'";

                $response=mysqli_query($con, $query);

                $num_rows = mysqli_num_rows($response);

                if( $num_rows == 0 ) {
                    echo "<center><h1><label>Invalid Email!</label></h1></center>";
                    exit();
                }
      
		        $link = "<a href='https://online-product-trading.herokuapp.com/updatePassword.php?verification_code=".$random_num."'>Click Here</a>";
		        $subject = "Change password request";
		        $message = "You have requested for update password.";
		        $message.= "Please click on the link below to update your password ";
		        $message.= $link;
                

			try {
				
				$mail->SMTPDebug = 2;									
				$mail->isSMTP();											
				$mail->Host	 = 'smtp.gmail.com';					
				$mail->SMTPAuth = true;							
				$mail->Username = 'd3v.minks@gmail.com';				
				$mail->Password = '9899910158';						
				$mail->SMTPSecure = 'tls';							
				$mail->Port	 = 587;

				$mail->setFrom('d3v.minks@gmail.com', 'Online Product Trading - Forgot Password');		
				$mail->addAddress($email, 'User');
				
				$mail->isHTML(true);								
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AltBody = $message;
				$mail->send();
				echo "Mail has been sent successfully!";
				echo " <h1> Email sent to your email address.</h1>";
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

                $update_query="UPDATE users SET verification_code = '$random_num' WHERE email = '$email'";
                $result = mysqli_query($con, $update_query);

                if( !$result ) {
                    echo "Please try again!";
                    exit();
                }
                
                
 
            }
        ?>
		
		</br>
		</br>
		</br>
		</br>
    </body>
</html>