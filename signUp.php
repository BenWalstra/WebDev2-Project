<?php 
  require('connect.php');
  require("scripts.php");

  $date = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <script>
    $(document).ready(function()
    {
      $("#username").keyup(function()
      {
        //store username input in variable
        var uname = $("#username").val().trim();
        //check to make sure somehtign has been input and it is atleast 3 characters long
        if(uname != '' && uname.length >= 3)
        {
          $("#uname_response").show();
          $.ajax({url: 'uname_check.php', type: 'post', data: {uname:uname}, success: function(response)
          {
            if(response > 0)
            {
              $("#uname_response").html("<span class='not-exists'>* Username Already in use.</span>");
            }else
            {
              $("#uname_response").html("<span class='exists'>Available.</span>");
            }
          }
          });
        }else{
          $("#uname_response").hide();
        }
      });
    });
  </script>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>	
  <form method="post" action="server.php">

  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" id="username">
      <div id="uname_response" class="response"></div>
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