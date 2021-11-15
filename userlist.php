<html>
    <head>
        <title>Userlist</title>
            <?php
                include("checkAdmin.php");
                include("database.php");
                include("navBar.php");

                $query="SELECT * from users limit 2";
                $response = mysqli_query($con, $query);

                $query2 = "SELECT count(*) as total from users";
                $response2 = mysqli_query( $con, $query2);
                $data = mysqli_fetch_assoc( $response2);
                $no_of_records = $data["total"];
                $per_page=2;
            ?>

            <script src="js/jquery.js" ></script>

            <script type="text/javascript" >
                var page = 1;
                var per_page = 2;
                var total_records = '<?php echo $no_of_records;?>'

                function load_more() {
	                $.ajax({
		                url : "loadUserlist.php",
		                type : "post",
		                data : {"page" : page, "per_page" : per_page},

		                success:function(response){
			
			                page++;

			                if((page * per_page) >= parseInt(total_records)) {
				                $("#load_more").hide();
			                }
			
			                if(response) {
				                $("#data_table").append(response);
			                }
		                }
	                });
                }

            </script>
    </head>

    <body>
        <center><h1><label>Userlist of Online Product Bidding</label></h1></center>
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
                    <td><?php echo $result["validation"]; ?></td>
                    <td><a href="editProfileAdmin.php?id=<?php echo $user_ID ?>" >Edit</a>
                        <a href="deleteProfileAdmin.php?id=<?php echo $user_ID ?>" >Delete</a>
                    </td>
                </tr>
                    <?php } ?>
            </table>

            </br>
            <center><input type="button" value="Load More" onclick="load_more()" id="load_more"/></center>
			
			</br>
			</br>
			</br>
			</br>
        
    </body>
</html>