<?php
	require("connect.php");
	//require("images.php");
	session_start();


	// initializing variables
	$username = "";
	$fName    = "";
	$lName    = "";
	$birthDate    = "";
	$Admin    = "n";
	$profilePic    = "";
	$email    = "";
	$about 	  = "";
	$errors = array(); 

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
	  // receive all input values from the form
	  $username = $_POST['username'];
	  $email = $_POST['email'];
	  $password_1 = $_POST['password_1'];
	  $password_2 = $_POST['password_2'];
	  $fName = $_POST['fName'];
	  $lName = $_POST['lName'];
	  $birthDate = $_POST['birthdate'];
	  $about = $_POST['about'];



	  if (empty($username)) { array_push($errors, "Username is required"); }
	  if (empty($email)) { array_push($errors, "Email is required"); }
	  if (empty($password_1)) { array_push($errors, "Password is required"); }
	  if (empty($lName)) { array_push($errors, "Last Name is required"); }
	  if (empty($fName)) { array_push($errors, "First Name is required"); }
	  if (empty($birthDate)) { array_push($errors, "Birthdate is required"); }
	  if (empty($about)) { array_push($errors, "About is required"); }
	  if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match");}

	  // first check the database to make sure 
	  // a user does not already exist with the same username and/or email
	  $query = "SELECT * FROM users WHERE ScreenName='$username' OR email='$email' LIMIT 1";
    $statement = $db->prepare($query);
    $statement->execute(); 
	$user = $statement->fetch();

	  if ($user) { // if user exists
	    if ($user['ScreenName'] === $username) {
	      array_push($errors, "Username already exists");
	    }

	    if ($user['email'] === $email) {
	      array_push($errors, "email already exists");
	    }
	  }

	  // Finally, register user if there are no errors in the form
	  if (count($errors) == 0) {
	  	$password = md5($password_1);//encrypt the password before saving in the database

	  	$query2 = "INSERT INTO users (ScreenName, email, password, FName, LName, Birthdate, Admin, About) 
	  			  VALUES (:username, :email, :password, :fName, :lName, :birthDate, :Admin, :about)";

		$statement2 = $db->prepare($query2);
        $statement2->bindValue(':username',$username);
        $statement2->bindValue(':email',$email);
        $statement2->bindValue(':password',$password);
        $statement2->bindValue(':fName',$fName);
        $statement2->bindValue(':lName',$lName);
        $statement2->bindValue(':birthDate',$birthDate);
        $statement2->bindValue(':Admin',$Admin);
        $statement2->bindValue(':about',$about);

        if ($statement2->execute()) {
        	$_SESSION['username'] = $username;
	  		$_SESSION['success'] = "You are now logged in";
	  		echo $_SESSION['success'];
        }
        


	  	}else{
	  		echo "error";
	  	}
	}
?>