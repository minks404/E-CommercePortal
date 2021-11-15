<html>
    <head>
	
		<title>Logout</title>
		
		<script type="text/javascript" >
		
			function goHome() {
				window.location.href = "./index.php";
			}
		
		</script>
	
		<?php
			
			include("navBar.php");
			include("checkLogin.php");
    
			session_unset();
			session_destroy();

			echo '<script type="text/javascript">goHome();</script>';
		?>
        
	</head>
</html>
		
		
		
