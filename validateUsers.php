<html>
    <head>
        <title>Userlist</title>
            <?php
                include("checkAdmin.php");
                include("database.php");
                include("navBar.php");

                $query="SELECT * from users WHERE validation = '0'";
                $response = mysqli_query( $con, $query);

            ?>

            <script src="js/jquery.js" ></script>

            <script type="text/javascript" >

                function validate( user_ID ) {

                    $.ajax({
                        url : "validate.php",
                        type : "post",
                        data : {"user_ID" : user_ID},

                        success:function(response){

                            if(response) {
                                $("#l1").append(response);
                            }
                            else {
                                $("#validate_" + user_ID).hide();
                            }
			                
                        }
                    });
                }

            </script>
    </head>

    <body>
        <center><h1><label >Validate User Profiles</label></h1>
				<h5><label id="l1"></label></h5>
        </br>
        
            <table border="1" id="data_table">
                <tr>
                    <th>user_ID</td>
                    <th>name</th>
                    <th>email</th>
                    <th>company_name</th>
                    <th>contact_no</th>
                    <th>dealing_type</th>
                    <th>product_category</th>
                    <th>scale</th>
                    <th>reg_certificate</th>
                    <th>validation</th>
                    <th>action</th>
                </tr>
                    <?php
                        while( $result= mysqli_fetch_assoc($response) ) {
                            $user_ID = $result["user_ID"];
                    ?>
                <tr>
                    <td><?php echo $user_ID; ?></td>
                    <td><?php echo $result["name"]; ?></td>
                    <td><?php echo $result["email"]; ?></td>
                    <td><?php echo $result["company_name"]; ?></td>
                    <td><?php echo $result["contact_no"]; ?></td>
                    <td><?php echo $result["dealing_type"]; ?></td>
                    <td><?php echo $result["product_category"]; ?></td>
                    <td><?php echo $result["scale"]; ?></td>
                    <td><a href="upload/<?php echo $result['registration_certificate']; ?>" >View</a></td>
                    <td><input type="button" value="Validate" onclick="validate( <?php echo $user_ID; ?> )" 
                            id="validate_<?php echo $user_ID; ?>"/></td>
                    <td><a href="editProfileAdmin.php?id=<?php echo $user_ID ?>" >Edit</a>
                        <a href="deleteProfileAdmin.php?id=<?php echo $user_ID ?>" >Delete</a>
                    </td>
                </tr>
                    <?php } ?>
            </table>
			
		</center>
    </body>
</html>