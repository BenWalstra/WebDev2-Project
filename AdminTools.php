<?php
	require("scripts.php");
	require("connect.php");
	session_start();
	$user = "";
	if (isset($_SESSION['user'])) {
		
		$user = $_SESSION['user'];
		if ($user['Admin'] === 'n') {
			header('location: index.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Tools</title>
</head>
<body>
	<div class="container">
		<?php include('nav.php')?>
		<ul class="nav nav-pills nav-stacked" role="tablist">
			<li><a href="#">Add Platform</a></li>
			<li><a href="#">Add Game</a></li>
			<li><a href="#">Edit Users</a></li>
		</ul>	
	</div>
</body>
</html>