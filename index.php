<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Managment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container m-5">
  <h1 class="text-center">List Of Clients</h1>
  <a href="create.php" class="btn btn-primary my-4">New Client</a>
  <table class="table table-striped table-bordered align-middle text-white text-center table-hover py-3">
    <thead class="table-dark text-white">
      <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Date Created</th>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'config.php';
      
      $sql ="SELECT * FROM clients";
      $result = $connection->query($sql);

      if(!$result)
      {
        die("invalid query:".$connection->error);
      }

      while($row = $result->fetch_assoc())
      {
        echo"
        <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[address]</td>
        <td>$row[created_at]</td>
        <td><a href='edit.php?id=$row[id]' class='btn btn-success'>Edit</a></td>
        
       <td><a href='delete.php? id=$row[id]' class='btn btn-danger'>Delete</a></td>
      </tr>
        ";
      }
      ?>
      
    </tbody>
  </table>
  </div>
  
</body>
</html>