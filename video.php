<?php
include_once('./function.php');
$data  =  getPlaylist();
$list  =  getCategory();
$res  =   getChannel();
$success_msg = false;
$error_msg = false;


if (isset($_SESSION['success']))
{
    $success_msg = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error']))
{
    $error_msg = $_SESSION['error'];
    unset($_SESSION['error']);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Video Form</title>
  <?php include './partials/head.php';?>
</head>
<body>
<?php include './partials/header.php';?>
<div class="container mt-3 jumbotron">
<?php if($success_msg) { ?>

<h3><?php echo $success_msg ?> </h3>


<?php } ?>

  
<?php if($error_msg){  ?>

<?php  if(is_array($error_msg)){ ?>

    <?php foreach($error_msg as $key=>$val) { ?>

      <h3><?php echo $val ?></h3>

    <?php } ?>

  <?php } 
  else{ ?>

  <h3><?php echo $error_msg ?> </h3>

<?php } ?>
<?php }?>   
 

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Video</li>
  </ol>
</nav>
<hr/>
  <form action="http://localhost/core_php/app_youtube/server/video_server.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="video_name">Video Name:</label>
      <input type="text" class="form-control" id="video_name" placeholder="Enter Video Name " name="video_name">
    </div>
    <div>
    <label for="playlist_id">Playlist:</label>
    <select name="playlist_id" id="playlist" class="form-control">
    <?php foreach($data as $key => $value){?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['playlist_name']; ?></option>
   
      
      <?php } ?>
     </select>
   
    </div>
    <div>
    <label for="category">Category:</label>
    
     <select name="category" id="category" class="form-control" >
     <?php foreach($list as $key => $value){?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['category_title']; ?></option>
      
      <?php } ?>
    </select>
    </div>
    <div>
    <label for="channel">Channel:</label>
    
     <select name="channel_id" id="channel" class="form-control" >
     <?php foreach($res as $key => $value){?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['channel_name']; ?></option>
      
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
      <label for="video">Video:</label>
      <input type="file"  class="form-control" name="video" id="video" placeholder="Enter Video">
    </div>
    <div class="mb-3 mt-3">
      <label for="description">Description:</label>
  
      <textarea rows="4" cols="50" class="form-control" id="description"  name="description" ></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
<?php include './partials/footer.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="./assets/js/script.js"></script>  
</body>

</html>
