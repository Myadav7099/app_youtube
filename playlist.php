<?php
include_once('./function.php');
$data = getChannel();
?>
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
    <li class="breadcrumb-item active" aria-current="page">Playlist</li>
  </ol>
</nav>
<hr/>
  <form action="http://localhost/core_php/app_youtube/server/playlist_server.php" method="Post">
    <div class="mb-3">
      <label for="playlist_name">Playlist Name</label>
      <input type="text" class="form-control" id="playlist_name" placeholder="Enter playlist" name="playlist_name">
    </div>
    <div>
    <label for="channel_id">Channel:</label>
    
     <select name="channel_id" id="channel" class="form-control" >
     <?php foreach($data as $key => $value){?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['channel_name']; ?></option>
      
      <?php } ?>
    </select>
    </div>
    <div class="mb-3 mt-3">
      <label for="description">Description:</label>
  
      <textarea rows="4" cols="50" class="form-control" id="description"  name="description" ></textarea>
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
<?php include './partials/footer.php';?>
</html>
