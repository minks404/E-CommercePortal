<?php
                
				use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\Exception;
			
				require 'vendor/autoload.php';

				$mail = new PHPMailer(true);
			
				include("checkAdmin.php");
                include("database.php");

                $user_ID = $_POST["user_ID"];

                $action = "failure";

                $update_query="UPDATE users SET validation = '1' WHERE user_ID = '$user_ID'";
                $response = mysqli_query($con, $update_query);
				
				if(!$response){
                    
                    echo "<center><h1> User ID ".$user_ID." Validation Not Successfull!</h1></center>";
                    echo "<center><h3>".mysqli_error( $con )."</h3></center>";
                }
				
				$query2="SELECT * FROM users WHERE user_ID = '$user_ID'";
				$response = mysqli_query($con, $query2);
                $result= mysqli_fetch_assoc($response);
				$user_email = $result["email"];
				
				$subject = "Online Product Trading - User Validation Successfull!";
		        $message = "You have requested for update password.";
				
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
				$mail->addAddress($user_email, 'User');
				
				$mail->isHTML(true);								
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AltBody = $message;
				$mail->send();
				echo "Mail has been sent successfully!";
				echo " <h1> User Successfully Validated!.</h1>";
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

                

?>