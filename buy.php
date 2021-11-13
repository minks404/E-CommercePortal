<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
        <title>Buy Product</title>
		
        <?php

			include("checkLogin.php");
            include("database.php");
            include("navBar.php");
				
			$query="SELECT * from products";
            $response = mysql_query($query);

		?>
			
			<script src="js/jquery.js" ></script>

            <script type="text/javascript" >
	
				var user_ID = '<?php echo $_SESSION["sid"];?>'
				
				function addToCart(product_ID, product_quantity) {
					
					var order_quant = document.getElementById(product_ID).value;
					if( order_quant > product_quantity ) {
						alert("Error: Ordered quantity unavailable!");
					}
					else{
					
						var order = getCookie("product1_ID");
						
						if (order == "") {
							document.cookie = "product1_quant="+order_quant;
							document.cookie = "product1_ID="+product_ID;
							alert("Your order was added to cart successfully!");
						}
						else {
							
							var order = getCookie("product2_ID");
							if (order == "") {
								document.cookie = "product2_quant="+order_quant;
								document.cookie = "product2_ID="+product_ID;
								alert("Your order was added to cart successfully!");
							}
							else {
								
								var order = getCookie("product3_ID");
								if (order == "") {
									document.cookie = "product3_quant="+order_quant;
									document.cookie = "product3_ID="+product_ID;
									alert("Your order was added to cart successfully!");
								}
								else {
									
									var order = getCookie("product4_ID");
									if (order == "") {
										document.cookie = "product4_quant="+order_quant;
										document.cookie = "product4_ID="+product_ID;
										alert("Your order was added to cart successfully!");
									}
									else {
										
										var order = getCookie("product5_ID");
										if (order == "") {
											document.cookie = "product5_quant="+order_quant;
											document.cookie = "product5_ID="+product_ID;
											alert("Your order was added to cart successfully!");
										}
										else {
											alert("Your cart is already full");
										}
									}
								}
							}
						}
					}
				}
				function getCookie(cname) {
					let name = cname + "=";
					let ca = document.cookie.split(';');
					for(let i = 0; i < ca.length; i++) {
						let c = ca[i];
						while (c.charAt(0) == ' ') {
							c = c.substring(1);
						}
						if (c.indexOf(name) == 0) {
							return c.substring(name.length, c.length);
						}
					}
					return "";
				}
										
				

            </script>
        
    </head>
 <body>
        <center><h1><label>Product List</label></h1></center>
        </br>
			
            <table border="1" id="data_table" class="center" >
                <tr>
					<th>product_category</th>
                    <th>product_name</td>
					<th>product_image</td>
					<th>seller_name</td>
                    <th>available_quantity</th>
                    <th>unit_price</th>
					<th>order_quantity</th>
					<th>order</th>
					
                </tr>
                    <?php
                        while( $result= mysql_fetch_assoc($response) ) {
                            $product_ID = $result["product_ID"];		
                    ?>
                <tr>
                    <td><?php echo $result["product_category"]; ?></td>
                    <td><?php echo $result["product_name"]; ?></td>
					<td><?php echo "<img src='product/".$result['product_image']."' height='130' width='150'> "; ?> </td>
                    <td><?php echo $result["seller_name"]; ?></td>
					<td><?php echo $result["product_quantity"]; ?></td>
					<td><?php echo $result["product_price"]; ?></td>
					<td  >
						<input type="text" name="order_quantity" id = <?php echo $product_ID?> class="text_field" /> </td>
                    </td>
					
					<td>
						<button type="button" name="btn_order" onclick="addToCart(<?php echo $product_ID?>, <?php echo $result["product_quantity"]; ?>)"> 
							Add to Cart</button>
					</td>
					
                </tr>
                
                    <?php } ?>
            </table>
			

        
    </body>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>

	
</html>