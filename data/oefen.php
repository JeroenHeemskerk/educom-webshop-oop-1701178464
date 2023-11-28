<?php

  $servername = "localhost";
  $username = "webshop_rogier";
  $password = "webshoprogier";
  $DBName = "rogiers_webshop";

  $conn = mysqli_connect($servername, $username, $password, $DBName);
  
  mysqli_query($conn, 'INSERT INTO users (email, name, password) VALUES ("abc", "def", "ghi")');
  mysqli_query($conn, 'INSERT INTO users (email, name, password) VALUES ("jkl", "mno", "pqr")');
  
  
  $emails = mysqli_query($conn, 'SELECT email FROM users');
  echo mysqli_fetch_assoc($emails)['email'];
 
  mysqli_close($conn);


?>