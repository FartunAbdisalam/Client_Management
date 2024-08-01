<?php
include 'config.php';

$id= $_GET["id"];

mysqli_query($connection, "DELETE FROM `clients` WHERE id=$id");

header("location:index.php");
  
?>