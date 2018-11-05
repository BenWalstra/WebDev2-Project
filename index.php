<?php
	require("scripts.php");
	require("connect.php");
	session_start();
	$user = "";
	if (isset($_SESSION['user'])) {
		
		$user = $_SESSION['user'];
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
		<h1>Winnipeg Games</h1>
		<p>Where gamers live</p>
		<ul class="nav nav-tabs" role="tablist">
			<li><a href="index.php">Home</a></li>
			<li><a href="platforms.php">Platforms</a></li>
			<li><a href="#">UserPage</a></li>
			<?php if ($user['Admin'] ==="y") :?>
				<li><a href="#">Admin Tools</a></li>
			<?php endif	?>
		</ul>	
	</div>

</body>
</html>