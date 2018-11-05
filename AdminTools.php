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
<html>
<head>
	<title>Admin Tools</title>
</head>
<body>
	<p>muahahahaha</p>
</body>
</html>