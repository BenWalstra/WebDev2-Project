<?php
?>
<span>
	<?php if ($user==="") :?>
		<a href="login.php">Login</a> OR <a href="singup.php">Sign Up</a>
	<?php else : ?>
		<a href="#"><?=$user['ScreenName']?></a> <a href="index.php?logout=1">Log Out</a>
	<?php endif ?>
</span>