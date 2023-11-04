<?php
 	//$conn = mysqli_connect("localhost","root","","demo_db");
	
 	//mysqli_set_charset($conn,"UTF8");
	$conn = new mysqli("localhost","root","","demo_db");
	$conn->set_charset("utf8");
?>