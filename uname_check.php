<?php
	include("connect.php");

	$uname = $_POST['uname'];

	$query = "SELECT * FROM users WHERE ScreenName='$uname'";
   	$statement = $db->prepare($query);
    $statement->execute(); 
    $count = $statement->rowCount();
	echo $count;
?>