<?php 
  require('connect.php');
  require("scripts.php");

  $date = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="server.php">
  	<?php include('errors.php'); ?>

  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>

  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>

  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>

    <div class="input-group">
      <label>First Name</label>
      <input type="text" name="fName">
    </div>

    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lName">
    </div>

    <div class="input-group">
      <label>Birth Date</label>
      <input type="date" name="birthdate" min="1800-01-01" max="<?= $date ?>">
    </div>

    <div class="input-group">
      <label>About</label>
      <input type="text" name="about">
    </div>

    <div class="input-group">
      <label>Profile Pic</label>
      <input type="file" name="profilePic">
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>