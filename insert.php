<?php
       
 // Escape user inputs for security
 $mysql = new mysqli("localhost", "root", "test12345", "magebit");
  
 $email = mysqli_real_escape_string($mysql, $_REQUEST['email']);
 
 if (empty($received_date)) {
  $received_date= 'NULL';
  }
 // Attempt insert query execution
 $sql = "INSERT INTO `users` (email, date) VALUES ('$email', CURRENT_TIMESTAMP)";
 if (mysqli_query($mysql, $sql)) {
   header("Location:subscribed.html");
 } else {
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
 }
 
 // Close connection
 $mysql->close();
?>