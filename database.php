<?php
	$con = mysqli_connect("remotemysql.com", "JZppAHRCcw", "lf7fvVj7mX", "JZppAHRCcw");
	
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
	
?>