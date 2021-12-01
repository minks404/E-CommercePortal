<html>
    <head>
	
		<title>Logout</title>
		
		<script type="text/javascript" >
		
			function goHome() {
				window.location.href = "./index.php";
			}
				
			function clearCookies(){
		
	
				delete_cookie("product1_ID");
				delete_cookie("product1_quant");
				
				delete_cookie("product2_ID");
				delete_cookie("product2_quant");
				
				delete_cookie("product3_ID");
				delete_cookie("product3_quant");
				
				delete_cookie("product4_ID");
				delete_cookie("product4_quant");
				
				delete_cookie("product5_ID");
				delete_cookie("product5_quant");
				
	
				//window.location.href = "./checkout.php";
			}
			
			var delete_cookie = function(name) {
				document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			};
		
		</script>
	
		<?php
			
			include("navBar.php");
			
			if(!isset($_SESSION["sid"])) header("location: login.php");
    
			session_unset();
			session_destroy();
			
			echo '<script type="text/javascript">clearCookies();</script>';

			echo '<script type="text/javascript">goHome();</script>';
		?>
        
	</head>
</html>
		
		
		
