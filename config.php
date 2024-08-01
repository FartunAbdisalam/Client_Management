<?php 

// stabelish connection with DataBase
$connection = mysqli_connect("localhost", "root","","client_management");

// check connection
if($connection -> connect_error) {
  die("connection failed: " . $connection -> connect_error);
}

?>