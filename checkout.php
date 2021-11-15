<html>
    <head>
        <title>Checkout</title>
		
			<script type="text/javascript" >
			
			function checkout(){
		
	
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
            
			include("checklogin.php");
            include("database.php");
            include("navBar.php"); 
			
				
					for ($i = 1; $i <= 5; $i++) {
						   
						$product_ID = 'product' . $i .'_ID'; 
						$product_quant = 'product' . $i . '_quant'; 
							
						if (isset($_COOKIE[$product_ID])) {
									
							$product_ID = $_COOKIE[$product_ID];
							$order_quant = $_COOKIE[$product_quant];
									
							$query="SELECT * from products WHERE product_ID =".$product_ID;
							$response = mysqli_query($con, $query);
							$result = mysqli_fetch_assoc($response);
									
							$new_product_quant = $result["product_quantity"] - $order_quant;
									
							$update_query="UPDATE products SET product_quantity ='$new_product_quant' WHERE product_ID='$product_ID'";
							$result = mysqli_query($con, $update_query);
							
						}
					}
					
					echo '<script type="text/javascript">checkout();</script>';
				
				?>

			<center>
				<h1>Successfully checked out!</h1>
				</br>
			
			
				<h1>Thank you for using our services :)</h1>
			</center>
            
    </head>
    <body>

        

    </body>

</html>