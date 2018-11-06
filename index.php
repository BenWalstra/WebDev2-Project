<?php
	require("scripts.php");
	require("connect.php");
	session_start();
	$user = "";
	$msg="";
	if (isset($_SESSION['user'])) {
		
		$user = $_SESSION['user'];
	}
	if (isset($_SESSION['success'])) {
		$msg = $_SESSION['success'];
		$_SESSION['success'] = ""; 
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		unset($_SESSION['success']);
		header('location: index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Winnipeg Games</title>
</head>
<body>

	<div class="container">
		<?php include('signout.php')?>
		<h1>Winnipeg Games</h1>
		<p>Where gamers live</p>
		<p><?=$msg?></p>
		<?php include('nav.php')?>	
	</div>

</body>
</html>