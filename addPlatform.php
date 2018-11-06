<?php
	require("scripts.php");
	require("connect.php");
	session_start();
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		if ($user["Admin"] != 'y') {
			header('location: index.php');
		}
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>AddPlatform</title>
</head>
<body>
	<div class="container">
		<?php include('signout.php')?>
		<?php include('nav.php')?>
		<form method="post">
			<div class="input-group">
  				<label>Manufacturer</label>
  				<input type="text" name="mfr" >
  			</div>
  			<div class="input-group">
  				<label>Platform Name</label>
  				<input type="text" name="platform">
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn" name="newplatform">Add</button>
  			</div>
		</form>
	</div>
</body>
</html>