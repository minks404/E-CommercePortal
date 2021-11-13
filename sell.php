<html>
    <head>
        <title>Product Registration Form </title>
        <script src="js/regFormValidation.js"></script>
    </head>

    <?php
		include("checkLogin.php");
        include("database.php");
        include("navBar.php");
		
        

        if( isset($_POST["submit"])) {
            
            $product_name=$_POST["product_name"];

			$seller_ID = $_SESSION["sid"];
			$seller_name = $_SESSION["sname"];
			
            $product_category = $_POST["product_category"];
            $product_quantity = $_POST["product_quantity"];
            $product_price=$_POST["product_price"];
			
            
            if( (isset( $_FILES ) ) && ( $_FILES['product_image']['name'] != '') ){

                //print_r($_FILES);
    
                $filename = $_FILES['product_image']['name'];
                $filename_arr = explode(".", $filename);
                $ext = end($filename_arr);
                if( $ext != "jpg") {
                    echo  "<center><h1>Registration not Successful</h1></center>";
                    echo "Error: Only jpg file format allowed for product image!";
                    die();
                }
                $product_image =time().".".$ext;
                move_uploaded_file( $_FILES['product_image']['tmp_name'], "product/$product_image");
    
                //die();

                $query="insert into products( `product_name`, `product_image`, `seller_ID`, `seller_name`, `product_category`, `product_quantity`, `product_price` ) 
                values( '$product_name', '$product_image', '$seller_ID', '$seller_name', '$product_category', '$product_quantity', '$product_price')";


                $result = mysql_query($query);

                if($result) {
		            echo "<center><h1>Product Registration Successfull!</h1></center>";
	            }
		
                else {
		                echo  "<center><h1> Product Registration not Successful</h1></center>";
		                echo "<center><h3>".mysql_error()."</h3></center>";
	            }
            }

        }
    ?>
    <body>
        <h1><center>Product Registration Form</center></h1>
        <form onsubmit="return checkValues()" method="post" enctype="multipart/form-data">
            <table border = "1" align="center" >
                <tr>
                    <td> <label>Product Name</label></td>
                    <td> <input type="text" name="product_name" class="text_field" /> </td>
                </tr>
				<tr>
                    <td><label>Product Image</label></td>
                    <td><input type = "file" name="product_image" id="jpg" accept="image/*" /> </td>
                </tr>
				<tr>
                    <td><label>Product Category</label></td>
                    <td><input type="radio" name="product_category" value="Electronics" class="radio" id="Electronics"/>
                        <label for="Electronics" >Electronics</label>

                        <input type="radio" name="product_category" value="Clothing" class="radio" id="Clothing"/>
                        <label for="Clothing" >Clothing</label>

                        <input type="radio" name="product_category" value="Groceries" class="radio" id="Groceries"/>
                        <label for="Groceries" >Groceries</label>

                        <input type="radio" name="product_category" value="Appliances"class="radio" id="Appliances"/>
                        <label for="Appliances" >Appliances</label>
                    </td>
                </tr>
                <tr>
                    <td> <label>Total Units</label> </td>
                    <td> <input type="text" name="product_quantity" class="text_field" /> </td>
                </tr>
				<tr>
                    <td> <label>Unit Price ₹ </label> </td>
                    <td> <input type="text" name="product_price" class="text_field" /> </td>
                </tr>
                
                <tr>
                    <td colspan = '2' align = 'center'> <input type="submit" name="submit" /> </td>
                </tr>

            </table>
        </form>
        </br>
        <h4><center>Note: All fields are compulsary.</center></h4>
    </body>
</html>

