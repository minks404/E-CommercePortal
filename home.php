<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
        <title>Home</title>
        <?php
            session_start();

            include("database.php");
            include("navBar.php");

            
            if( isset( $_SESSION["sid"]) ) {

                echo "<h2>Welcome, ".$_SESSION["sname"]."!</h2>";
            }
            else {
                echo "<h2>Welcome, Guest!</h2>";
            }
        ?>
    </head>
    <body>
	
	<table width="100%" cellpadding="0px" cellspacing="0px">
                                    <tr>
                                        <td style="width:100%; line-height:30px; background-color:#F6F6F6; padding:10px 10px 10px 10px; border-top:Solid 1px #DFDFDF;" colspan="3">
                                            <table width="100%" cellpadding="0px" cellspacing="0px">

                                                <tr>
                                                    <td style="width:100%; background-color:White; border:Solid 1px #DFDFDF; text-align:justify; padding:10px; line-height:30px;">
                                                        This E-Commerce portal is developed as the Laboratory Work of a course titled 'E-Business Systems' by Mayank Makhija of 
														Master of Computer Applications of Bharati Vidyapeeth's 
                                                        Institute of Computer Applications and Management (Affiliated to Guru Govind Singh Indraprasth University, New Delhi).
                                                        This portal simulates the working of online selling and purchasing of various items.
                                                        <br /><br style="height:15px; line-height:15px;" />
                                                        The following techologies are used to develop this applications:<br />
                                                        &nbsp;&nbsp; &raquo; PHP<br />                              
                                                        &nbsp;&nbsp; &raquo; HTML + CSS + JS<br />                               
                                                        &nbsp;&nbsp; &raquo; My-SQL and Apache Server<br />
                                                    </td>
                                                </tr>
                                            </table> 
                                        </td>           
                                    </tr>
                                    
                                    <tr>
                                        <td style="width:100%; background-color:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; font-weight: normal; padding-top:0px;" colspan="3">
                                            <table width="100%" cellpadding="0px" cellspacing="0px">
                                                <tr>                                                    
                                                    <td style="width:100%; padding:20px; background-color:White; line-height:25px;">
                                                        <table width="100%" cellpadding="0px" cellspacing="0px">
                                                            <tr>
                                                                <td style="width:60%; padding-right:40px; vertical-align:top;">
                                                                    
                                                                </td>
                                                                <td style="width:15%; vertical-align:top; padding-right:20px;">
                                                                   
                                                                </td>
                                                                <td style="width:25%; vertical-align:top;">
                                                                    
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </table>
                                        </td>
                                    </tr>
                                </table>

        

    </body>
	

</html>
</html>