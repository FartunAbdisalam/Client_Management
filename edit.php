<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Client</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php 
  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {
    $id = $_GET['id'];
  include 'config.php';
  $record = mysqli_query($connection, "SELECT * FROM `clients` WHERE id = $id");
  $data = mysqli_fetch_array($record);
  }
  ?>

  <div class="container m-5">
    <h2 class="text-center mb-5">Update Client</h2>

    <form action="edit.php" method="POST">
      
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="<?php echo $data['name']; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $data['email']; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="<?php echo $data['phone']; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo $data['address']; ?>">
        </div>
      </div>


      <div class="row mb-3">

      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

      <div class="offset-sm-3 col-sm-3 d-grid">
        <button name="submit" class="btn btn-primary">Update</button>
        </div>

        <div class="col-sm-3 d-grid">
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>

      </div>
    </form>
  </div>

  <!-- Update Code -->
   <?php
    if(isset($_POST['submit']))
   {
     $id= $_POST['id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
      $address = $_POST['address'];
     
      include 'config.php';
      mysqli_query($connection, "UPDATE `clients` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE id = $id");

   header("Location:index.php");
  }
   ?>
  
</body>
</html>