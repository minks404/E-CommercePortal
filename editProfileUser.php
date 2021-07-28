<html>
    <head>
        <title>Edit Profile</title>
        <script src="js/updateProfileAdminFormValidation.js"></script>
    </head>

    <?php
        include("checkLogin.php");
        include("navBar.php");
        include("database.php");
        

        $user_ID = $_SESSION['sid'];
        $query = "SELECT * from users WHERE user_ID='$user_ID'";
        $response=mysql_query($query);
        $result=mysql_fetch_assoc($response);

        $name=$result["name"];
        $f_name=$result["f_name"];
        $email=$result["email"];
        $company_name = $result["company_name"];
        $company_address = $result["company_address"];
        $contact_no = $result["contact_no"];
        $dealing_type = $result["dealing_type"];
        $product_category = explode(",", $result["product_category"]);
        $scale = $result["scale"];

        $registration_certificate = $result["registration_certificate"];

        if( isset($_POST["submit"])) {
            
            $name=$_POST["name"];
            $f_name=$_POST["f_name"];
            $email=$_POST["email"];
            $company_name = $_POST["company_name"];
            $company_address = $_POST["company_address"];
            $contact_no = $_POST["contact_no"];
            $dealing_type = $_POST["dealing_type"];
            $product_category = implode(",", $_POST["product_category"]);
            $scale = $_POST["scale"];
            
            
            if( (isset( $_FILES ) ) && ( $_FILES['registration_certificate']['name'] != '')  ){

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

                $update_query="UPDATE users SET name='$name', email = '$email', f_name = '$f_name', 
                company_name = '$company_name', company_address = '$company_address', contact_no =  '$contact_no', 
                dealing_type = '$dealing_type', product_category = '$product_category', scale = '$scale',
                registration_certificate =  '$registration_certificate' WHERE user_ID = '$user_ID'";
            }
            else {

                $update_query="UPDATE users SET name='$name', email = '$email', f_name = '$f_name', 
                company_name = '$company_name', company_address = '$company_address', contact_no =  '$contact_no', 
                dealing_type = '$dealing_type', product_category = '$product_category', scale = '$scale' WHERE user_ID = '$user_ID'";
            }

            $result = mysql_query($update_query);

            $product_category = explode(",", $product_category);
            //after updation checkboxes need data back in array form, otherwise they show error in edit form of success page..converted back in array from string

            if($result) {
		        echo "<center><h1>Edit Profile Successfull!</h1></center>";
	        }
		
            else {
		        echo  "<center><h1>Edit Profile Not Successful!</h1></center>";
		        echo "<center><h3>".mysql_error()."</h3></center>";
	        } 

        }
    ?>
    <body>
        <h1><center>Edit Profile Form</center></h1>
        <form onsubmit="return checkValues()" method="post" enctype="multipart/form-data">
            <table border = "1" align="center" >
                <tr>
                    <td> <label>Name</label></td>
                    <td> <input type="text" name="name" class="text_field" value="<?php echo $name; ?>" /> </td>
                </tr>
                <tr>
                    <td> <label>Father's Name</label> </td>
                    <td> <input type="text" name="f_name" class="text_field" value="<?php echo $f_name; ?>" /> </td>
                </tr>
                <tr>
                    <td> <label>Email</label></td>
                    <td> <input type="email" name="email" class="text_field" value="<?php echo $email; ?>" /> </td>
                </tr>
                <tr>
                    <td><label>Company Name</label></td>
                    <td><input type="text" name="company_name" class="text_field" value="<?php echo $company_name; ?>" /> </td>
                </tr>
                <tr>
                    <td><label>Company Address</label></td>
                    <td><textarea name = "company_address" class="text_field" ><?php echo $company_address; ?></textarea>
                </tr>
                <tr>
                    <td><label>Company Contact Number</label></td>
                    <td><input type="text" name="contact_no" class="text_field" value="<?php echo $contact_no; ?>" /> </td>
                </tr>
                <tr>
                    <td><label>Dealing Type</label></td>
                    <td><input type="radio" name="dealing_type" value="Buyer" class="radio"
                        <?php if( $dealing_type == "Buyer") echo "checked = checked"; ?> />
                        <label>Buyer</label>
              
                        <input type="radio" name="dealing_type" value="Seller" class="radio"
                        <?php if( $dealing_type == "Seller") echo "checked = checked"; ?> />
                        <label>Seller</label>
    
                        <input type="radio" name="dealing_type" value="Both" class="radio"
                        <?php if( $dealing_type == "Both") echo "checked = checked"; ?> />
                        <label>Both</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Product Categories</label></td>
                    <td><input type="checkbox" name="product_category[]" value="Electronics" class="checkbox"
                        <?php if(in_array('Electronics', $product_category)) echo 'checked';?> />
                        <label>Electronics</label>

                        <input type="checkbox" name="product_category[]" value="Clothing" class="checkbox" 
                        <?php if(in_array('Clothing', $product_category)) echo 'checked';?> />
                        <label>Clothing</label>

                        <input type="checkbox" name="product_category[]" value="Groceries" class="checkbox" 
                        <?php if(in_array('Groceries', $product_category)) echo 'checked';?> />
                        <label>Groceries</label>

                        <input type="checkbox" name="product_category[]" value="Appliances" class="checkbox"
                        <?php if(in_array('Appliances', $product_category)) echo 'checked';?>  />
                        <label>Appliances</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Comapany Scale</label</td>
                    <td><select name="scale" id="scale" >
                            <option value = "-1">---SELECT---</option>
                            <option value = "1" <?php if( $scale == "1") echo "selected"; ?> >Small Scale</option>
                            <option value = "2"  <?php if( $scale == "2") echo "selected"; ?> >Medium Scale</option>
                            <option value = "3"  <?php if( $scale == "3") echo "selected"; ?> >Large Scale</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Company Registration Certificate</label></td>
                    <td><label><a href = "upload/<?php echo $registration_certificate; ?>">View Existing</a></label>
                        <input type = "file" name="registration_certificate" id="pdf" accept="application/pdf" /> </td>
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

