<?php

    include("database.php");
    include("checkAdmin.php");


    $per_page = $_POST['per_page'];
    $page = $_POST['page'];
    $index = $page*$per_page;

    $query = "SELECT * from users limit $index, $per_page";
    $response = mysql_query($query);

    $html = '';

    if(mysql_num_rows($response) > 0 ){

	    while($result = mysql_fetch_assoc($response)) {
            $user_ID = $result["user_ID"];
            $reg_cert = $result["registration_certificate"];

		    $html.='<tr>
                        <td>'.$user_ID.'</td>
                        <td>'.$result["name"].'</td>
                        <td>'.$result["email"].'</td>
                        <td>'.$result["company_name"].'</td>
                        <td>'.$result["contact_no"].'</td>
                        <td>'.$result["dealing_type"].'</td>
                        <td>'.$result["product_category"].'</td>
                        <td>'.$result["scale"].'</td>
                        <td><a href="upload/'.$reg_cert.'" >View</a></td>
                        <td>'.$result["validation"].'</td>
                        <td><a href="editProfileAdmin.php?id='.$user_ID.'" >Edit</a>
                        <a href="deleteProfileAdmin.php?id='.$user_ID.'" >Delete</a></td>
                    </tr>';
	    }
	
    }

    echo $html;

?>
