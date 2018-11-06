<?php
	$user = "";
	if (isset($_SESSION['user'])) {
		
		$user = $_SESSION['user'];
	}
?>
	<nav>
		<ul class="nav nav-pills" role="tablist">
			<li><a href="index.php">Home</a></li>
			<li><a href="platforms.php">Platforms</a></li>
			<li><a href="#">UserPage</a></li>
			<?php if ($user != "") : ?>
				<?php if ($user['Admin'] ==="y") :?>
					<li><a href="AdminTools.php">Admin Tools</a></li>
				<?php endif	?>
			<?php endif ?>
		</ul>
	</nav>	