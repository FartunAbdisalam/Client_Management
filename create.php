<?php
include 'config.php';

$name="";
$email="";
$phone="";
$address="";
$errorMessage="";
$successMessage = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];

  // check any empty fields
  do {
    if(empty($name) || empty($email) || empty($phone) || empty($address))
    {
      $errorMessage = "All fields are required";
      break;
    }

    // add new client into database
    $sql="INSERT INTO clients(name, email, phone, address)".
    "VALUES ('$name','$email','$phone','$address')";
    $result = $connection->query($sql);

    if(!$result)
    {
      $errorMessage = "Error inserting the data into the database". $connection->error;
      break;
    }

$name="";
$email="";
$phone="";
$address="";

$successMessage = "Client successfully added";

header("Location:index.php");
exit;

  } while(false);

}

?>

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
  <div class="container m-5">
    <h2 class="text-center mb-5">Add New Client</h2>

    <?php
    if(!empty($errorMessage))
    {
      echo"
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>$errorMessage</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
      </button>
      </div>
      ";
    }
    ?>

    <form method="POST">

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="<?php echo $name; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="<?php echo $phone; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo $address; ?>">
        </div>
      </div>

      <?php
    if(!empty($successMessage))
    {
      echo"
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>$successMessage</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
      </button>
      </div>
      ";
    }
    ?>


      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <div class="col-sm-3 d-grid">
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </div>

    </form>
  </div>
  
</body>
</html>