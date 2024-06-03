<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <?php include './partials/head.php';?>
</head>
<body>
<?php include './partials/header.php';?>
<div class="container mt-3 mb-3 jumbotron">
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category</li>
  </ol>
</nav>
<hr/>
 
  <form action="http://localhost/core_php/app_youtube/server/category_server.php" method="POST" >
    
    <div class="mb-3">
      <label for="category_title">Category Title</label>
      <input type="text" class="form-control" id="category_title" placeholder="Enter Category_Title" name="category_title">
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
<?php include './partials/footer.php';?>
</html>
