<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
</head>
<body>
	<form action="Authenticate.php" method="post">
		<fieldset>
			<legend>Please Log In</legend>
			<p>
				<label for="username">User Name</label>
			  	<input name="username" id="username" />
			</p>
			<p>
				<label for="password">Password</label>
				<textarea name="password" id="password"></textarea>
			</p>
			<p>
				<input type="submit" name="command" value="Create" />
			</p>
		</fieldset>
	</form>
</body>
</html>