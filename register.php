<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Register form</h2>
  <form action="http://localhost/core_php/app_youtube/server/register_server.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name " name="first_name">
    </div>
    <div class="mb-3 mt-3">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last name " name="last_name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="mb-3 mt-3">
      <label for="password">Password:</label>
      <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password">
    </div>
    <div class="mb-3 mt-3">
      <label for="postal_code">Postal Code:</label>
      <input type="text" class="form-control" id="postal_code" placeholder="Enter Postal Code " name="postal_code">
    </div>
    <div class="mb-3 mt-3">
      <label for="image">Image:</label>
      <input type="file"  class="form-control" name="image" id="image" placeholder="Enter Image">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address " name="address">
    </div>
    <div class="mb-3">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
