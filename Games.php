<?php
    require("scripts.php");
    require('connect.php');
    session_start();
    if (isset($_GET['id'])) {
    	$id = $_GET['id'];
    }
    
    //Select all the games with the passed in value
    $query = "SELECT games.Name FROM games, platforms WHERE games.PlatformID ='$id'  AND games.PlatformID = platforms.PlatformID ORDER BY games.Name DESC";
    $statement = $db->prepare($query);
    if ($statement->execute() ) {
    	
    }
    else{
    	echo "error";
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Platforms</title>
</head>
<body>
	<div class="container">
		<?php include('nav.php')?>	
		<ul class="nav nav-pills nav-stacked" role="tablist">
		<?php if ($statement->rowCount() != 0) : ?>
			<?php while($row = $statement->fetch()):?>
				<li><a href="#"><?=$row['Name']?></a></li>
			<?php endwhile ?>
		<?php endif ?>
		</ul>
	</div>
</body>
</html>