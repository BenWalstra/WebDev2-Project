 <?php
    /*
      Group 5
      30SEP18
      Assignment 4 BLOG
      Creates a connection to the db phpmyadmin using our login credentials
    */
     define('DB_DSN','mysql:host=localhost;dbname=winnipeggames;charset=utf8');
     define('DB_USER','serveruser');
     define('DB_PASS','gorgonzola7!');     
     
     try {
         $db = new PDO(DB_DSN, DB_USER, DB_PASS);
     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die(); 
     }
 ?>