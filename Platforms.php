<?php
    require("scripts.php");
    require('connect.php');
    session_start();
    $query = "SELECT * FROM Platforms ORDER BY Name DESC";
    $statement = $db->prepare($query);
    $statement->execute(); 
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
				<li><a href="Games.php?id=<?=$row['PlatformID']?>"><?=$row['Name']?></a></li>
			<?php endwhile ?>
		<?php endif ?>
		</ul>
	</div>
</body>
</html>