<html>
    <head>
        <title>User Registration Form </title>
   
		
    </head>

    <?php
        include("database.php");
        include("navBar.php");
        

        if( isset($_POST["submit"])) {
            
            $name=$_POST["name"];
            $f_name=$_POST["f_name"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $company_name = $_POST["company_name"];
            $company_address = $_POST["company_address"];
            $contact_no = $_POST["contact_no"];
            $dealing_type = $_POST["dealing_type"];
            $product_category = implode(",",$_POST["product_category"]);
            $scale = $_POST["scale"];
            $date_time=date('Y-m-d H:i:s');

            
            if( (isset( $_FILES ) ) && ( $_FILES['registration_certificate']['name'] != '') ){

                //print_r($_FILES);
    
                $filename = $_FILES['registration_certificate']['name'];
                $filename_arr = explode(".", $filename);
                $ext = end($filename_arr);
                if( $ext != "pdf") {
                    echo  "<center><h1>Registration not Successful</h1></center>";
                    echo "Error: Only pdf file format allowed for Registration Certificate!";
                    die();
                }
                $registration_certificate =time().".".$ext;
                move_uploaded_file( $_FILES['registration_certificate']['tmp_name'], "upload/$registration_certificate");
    
                //die();

                $query="insert into users(`name`, `email`, `password`, `f_name`, `company_name`, `company_address`, `contact_no`, `dealing_type`, `product_category`, `scale`, `date_time`, `registration_certificate`) 
                values( '$name', '$email', '$password', '$f_name', '$company_name', '$company_address', '$contact_no', '$dealing_type', '$product_category', '$scale', '$date_time', '$registration_certificate')";


                $result = mysqli_query($con, $query);

                if($result) {
		            echo "<center><h1>Registration Successfull!</h1></center>";
					echo "<center><h3>You must wait for atleast 2hrs after registration so that we can validate you to use our portal.";
					 
	            }
		
                else {
		                echo  "<center><h1>Registration not Successful</h1></center>";
		                echo "<center><h3>".mysqli_error($con)."</h3></center>";
	            }
            }

        }
    ?>
    <body>
        <h1><center>User Registration Form</center></h1>
        <form onsubmit="return checkValues()" method="post" enctype="multipart/form-data">
            <table border = "1" align="center" >
                <tr>
                    <td> <label>Name</label></td>
                    <td> <input type="text" name="name" class="text_field" /> </td>
                </tr>
                <tr>
                    <td> <label>Father's Name</label> </td>
                    <td> <input type="text" name="f_name" class="text_field" /> </td>
                </tr>
                <tr>
                    <td> <label>Email</label></td>
                    <td> <input type="email" name="email" class="text_field" /> </td>
                </tr>
                <tr>
                    <td> <label>Password</label></td>
                    <td><input type ="password" name ="password" class="text_field" id="password" /></td>
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                    <td><input type="password" name="c_password" class="text_field" id="c_password" /></td>
                </tr>
                <tr>
                    <td><label>Company Name</label></td>
                    <td><input type="text" name="company_name" class="text_field" /> </td>
                </tr>
                <tr>
                    <td><label>Company Address</label></td>
                    <td><textarea name = "company_address" class="text_field" ></textarea>
                </tr>
                <tr>
                    <td><label>Company Contact Number</label></td>
                    <td><input type="text" name="contact_no" class="text_field" /> </td>
                </tr>
                <tr>
                    <td><label>Dealing Type</label></td>
                    <td><input type="radio" name="dealing_type" value="Buyer" class="radio" id="Buyer" />
                        <label for="Buyer">Buyer</label>
              
                        <input type="radio" name="dealing_type" value="Seller" class="radio" id="Seller"/>
                        <label for="Seller">Seller</label>
    
                        <input type="radio" name="dealing_type" value="Both" class="radio" id="Both"/>
                        <label for="Both">Both</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Product Categories</label></td>
                    <td><input type="checkbox" name="product_category[]" value="Electronics" class="checkbox" id="Electronics"/>
                        <label for="Electronics" >Electronics</label>

                        <input type="checkbox" name="product_category[]" value="Clothing" class="checkbox" id="Clothing"/>
                        <label for="Clothing" >Clothing</label>

                        <input type="checkbox" name="product_category[]" value="Groceries" class="checkbox" id="Groceries"/>
                        <label for="Groceries" >Groceries</label>

                        <input type="checkbox" name="product_category[]" value="Appliances" class="checkbox" id="Appliances"/>
                        <label for="Appliances" >Appliances</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Comapany Scale</label</td>
                    <td><select name="scale" id="scale" >
                            <option value = "-1">---SELECT---</option>
                            <option value = "1">Small Scale</option>
                            <option value = "2">Medium Scale</option>
                            <option value = "3">Large Scale</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Company Registration Certificate</label></td>
                    <td><input type = "file" name="registration_certificate" id="pdf" accept="application/pdf" /> </td>
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

