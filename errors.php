<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  	<a href="SignUp.php">Sign Up</a>
  	<a href="login.php">Log In</a>
  </div>
<?php  endif ?>