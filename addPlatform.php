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

	if (isset($_POST['newplatform'])) {
		$name = filter_input(INPUT_POST, 'platname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$mfr = filter_input(INPUT_POST, 'mfr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		$query = "SELECT * FROM platforms WHERE Name='$name'";
   		$statement = $db->prepare($query);
    	$statement->execute(); 
		$user = $statement->fetch();
		if ($statement->rowCount()==0) {
			$query = "INSERT INTO platforms (MFR,Name) VALUES (:mfr,:name)";
			$statement = $db->prepare($query);
        	$statement->bindValue(':mfr',$mfr);
        	$statement->bindValue(':name',$name);

        	if ($statement->execute()) {
	 	    header('Location: index.php');   
	  		}
	    	exit;
		}
		else
		{
			echo "Platform already exists";
			header('Location: addPlatform.php');   
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
  				<input type="text" name="platname">
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn" name="newplatform">Add</button>
  			</div>
		</form>
	</div>
</body>
</html>