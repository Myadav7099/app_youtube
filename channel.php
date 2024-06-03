<?php
include_once('./function.php');
$list  =  getCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Form</title>
  <?php include './partials/head.php';?>
</head>
<body>
<?php include './partials/header.php';?>
<div class="container mt-3">
<div class="container mt-3 mb-3 jumbotron">
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Channel</li>
  </ol>
</nav>
<hr/>
  <form action="http://localhost/core_php/app_youtube/server/channel_server.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="channel_name">Channel Name:</label>
      <input type="text" class="form-control" id="channel_name" placeholder="Enter Channel Name " name="channel_name">
    </div>
    <div>
    <label for="age_group">Age Group:</label>
    <select name="age_group" id="age_group" class="form-control">
      <option value="1">Adult</option>
      <option value="2">Child</option>
     </select>
   
    </div>
    <div>
    <label for="category">Category:</label>
    
     <select name="category[]" id="category" class="form-control" multiple>
     <?php foreach($list as $key => $value){?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['category_title']; ?></option>
      
      <?php } ?>
    </select>
    </div>
   
    <div class="dynamic-field"> </div>
      <div class="tags-input form-group"> <nr/>
          <label for="text">Enter Tags</label>
          <ul id="tags"></ul> 
          <input type="text" class="form-control"  id="input-tag" placeholder="Add a tag" /> 
          
      </div>
   
    <div class="mb-3 mt-3">
      <label for="image">Image:</label>
      <input type="file"  class="form-control" name="image" id="image" placeholder="Enter Image">
    </div>
    <div class="mb-3 mt-3">
      <label for="description">Description:</label>
  
      <textarea rows="4" cols="50" class="form-control" id="description"  name="description" >Enter text here...</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
<?php include './partials/footer.php';?>
</html>
