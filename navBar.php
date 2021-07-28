<?php
?>
<head>  
    <img src="images/logo.png"/>
    <link rel="stylesheet" type="text/css" href="css/navCSS.css">
</head>

<?php 
  if(session_id() == '') {
    session_start();
  }
  
  if( !isset( $_SESSION["sname"] ) ) { ?>

    <div class="topnav">
      <a href="home.php">Home</a>
      <a href="register.php">Register</a>
      <a href="login.php">Login</a>
    </div>  <?php
  }
  elseif( $_SESSION["sname"] != "admin") {  ?>
    <div class="topnav">
      <a href="home.php">Home</a>
      <a href="myCart.php">My Cart</a>
      <a href="showProfileUser.php">My Profile</a>
      <a href="changePassword.php">Change Password</a>
      <a href="logout.php">Logout</a>
      <a href="editProfileUser.php">Edit Profile</a>
      <a href="deleteProfileUser.php">Delete Account</a>
    </div>  <?php
  }
  else {  ?>
    <div class="topnav">
      <a href="home.php">Home</a>
      <a href="myCart.php">My Cart</a>
      <a href="validateUsers.php">Validate Users</a>
      <a href="showProfileUser.php">My Profile</a>
      <a href="changePassword.php">Change Password</a>
      <a href="logout.php">Logout</a>
      <a href="userlist.php">Userlist</a>
      <a href="editProfileUser.php">Edit Profile</a>
      <a href="deleteProfileUser.php">Delete Account</a>
    </div>  <?php

  }

?>




