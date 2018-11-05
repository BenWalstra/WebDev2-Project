<?php
	require('connect.php');
	$username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
/*
	$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	if ($_POST && !empty($username) && !empty($password)) {
		$query = "SELECT UserID, ScreenName, password FROM Users WHERE ScreenName = $username ";
    	$statement = $db->prepare($query);
    	$statement->execute(); 
	}*/



    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $db->prepare("SELECT UserID, ScreenName, password 
        FROM Users WHERE email = ? ")) {
        $stmt->bind_param('s', $username);  // Bind username to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
                // Check if the password in the database matches
                if (password_verify($password, $db_password)) {
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/","",$username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);

                    echo "Password is right";

            	} else {
            		echo "Password is wrong";
            	}
        } 

}
 ?>