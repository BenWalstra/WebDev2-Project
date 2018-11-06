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
	//gets all of the platforms from the platform db
	$query = "SELECT Name, PlatformID FROM platforms ";
   	$statement = $db->prepare($query);
    $statement->execute(); 

    //if a post has occured
	if (isset($_POST['newplatform'])) {
		//filter / sanatize inputs
		$name = filter_input(INPUT_POST, 'gamename', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$mfr = filter_input(INPUT_POST, 'mfr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		
		$query = "SELECT * FROM games WHERE Name='$name'";
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
  				<label>Developer</label>
  				<input type="text" name="mfr" >
  			</div>
  			<div class="input-group">
  				<label>Game Name</label>
  				<input type="text" name="gamename">
  			</div>
  			<div class="input-group">
  				<label>Genre</label>
  				<input type="text" name="genre" >
  			</div>
  			<div class="input-group">
  				<label>Rating</label>
  				<input type="text" name="rating" >
  			</div>
  			<div class="input-group">
  				<label>Release Date</label>
  				<input type="date" name="releasedate" >
  			</div>
  			<div class="input-group">
  				<label>Platoform</label>
  				<select name="platform">
  					<!--Insert foeach to get platforms here -->
  					<?php while($platform = $statement->fetch()) : ?>
  						<option value="<?=$platform['PlatformID']?>"><?=$platform['Name']?></option>
  					<?php endwhile ?>
  				</select>
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn" name="newgame">Add</button>
  			</div>
		</form>
	</div>
</body>
</html>