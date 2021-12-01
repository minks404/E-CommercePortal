<html>
    <head>
        <title>My Cart</title>

        <?php

            include("checkLogin.php");
            include("database.php");
            include("navBar.php");
        ?>
		
		<script type="text/javascript" >
		
			function checkout(){
		
	
				//delete_cookie("product1_ID");
				//delete_cookie("product1_quant");
				
				//delete_cookie("product2_ID");
				//delete_cookie("product2_quant");
				
				//delete_cookie("product3_ID");
				//delete_cookie("product3_quant");
				
				//delete_cookie("product4_ID");
				//delete_cookie("product4_quant");
				
				//delete_cookie("product5_ID");
				//delete_cookie("product5_quant");
				
	
				window.location.href = "./checkout.php";
			}
			
			var delete_cookie = function(name) {
				document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			};
		
		</script>
    </head>

    <body>
        
        <center><h1><label>My Cart</label></h1><center>
        <form>  
            <center><table border="1">
                <tr>
                    <th><label>Product ID</label></th>
                    <th><label>Product Name</label></th>
					<th><label>Seller Name</label></th>
					<th><label>Unit Price</label></th>
                    <th><label>Quantity</label></th>
					<th><label>Total Price</label></th>
                    
                </tr>
				
				<?php
						$total_price = 0;
						$convenience_fee = 0;
						
						$user_ID = $_SESSION['sid'];
						$query = "SELECT * from users WHERE user_ID='$user_ID'";
						$response=mysqli_query($con, $query);
						$result=mysqli_fetch_assoc($response);
						
						$scale = $result["scale"];
					
                       for ($i = 1; $i <= 5; $i++) {
						   
							$product_ID = 'product' . $i .'_ID'; 
							$product_quant = 'product' . $i . '_quant'; 
							
							if (isset($_COOKIE[$product_ID])) {
								
								$product_ID = $_COOKIE[$product_ID];
								$order_quant = $_COOKIE[$product_quant];
								
								$query="SELECT * from products WHERE product_ID =".$product_ID;
								$response = mysqli_query($con, $query);
								$result = mysqli_fetch_assoc($response);
								
								$product_price =  $result["product_price"] *  $order_quant;
								
								$total_price += $product_price;
								
                    ?>
                <tr>
                    <td align = "center"><?php echo $product_ID; ?></td>
                    <td align = "center"><?php echo $result["product_name"]; ?></td>
					<td align = "center"><?php echo $result["seller_name"]; ?></td>   
					<td align = "center"><?php echo $result["product_price"]; ?></td>					
					<td align = "center"><?php echo $order_quant; ?></td>
					<td align = "right"><?php echo $product_price; ?></td>					
                </tr>
                
					   <?php }} if( $scale != 1 ) $convenience_fee = 0.02*($total_price);
									$total_price += $convenience_fee; ?>
					   
				<tr>
                    <td colspan = 5 align = "center">Convinence Fee*</td>
					<td align = "right"><?php echo $convenience_fee?></td>					
                </tr>
					   
				 <tr>
                    <td colspan = 5 align = "center">TOTAL PRICE</td>
					<td align = "right"><?php echo $total_price?></td>
            
                    
                </tr>
            </center></table>
						

            </br>
            <center><input type="button" value="Checkout" onclick="checkout()" /></center>
			</br>
			</br>
			</br>
			<p>*Note: We provide free access to our services for our small-scale business users, but charge a convenience fee of 2% 
				for all other business users.</p>
        </form>
    </body>

	
</html>