<?php

include_once(__DIR__.'/../function.php');
$author_id = false;
if(isset($_SESSION['loggedInId']))
{
  $author_id  =   $_SESSION['loggedInId'];
 
}

$video_id = false;

if(isset($_GET['video_id']))
{
  $video_id = $_GET['video_id'];
 
}
$video_comments =  getVideoComment($video_id);

$baseUrl = "http://localhost/core_php/app_youtube/";
$videoDirectoryUrl = $baseUrl.'assets/uploads/';
$imageDirectoryUrl = $baseUrl.'assets/images/';

$video_detail =  getVideos(false,$video_id);
$playlist_id = false;
if(is_array($video_detail)){

    $playlist_id = $video_detail[0]['playlist_id'];
}
$PlaylistVideos    =  getPlaylistVideos($playlist_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <!-- linkes for youtube -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/youtube.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script>let base_url = "http://localhost/core_php/app_youtube/";</script>
 
  <title>Document</title>


</head>

<body>
  <header class="header">
    <a href="#">
      <img src="assets/youtube/logo.png" alt="YouTube Logo" class="youtube-logo" />
    </a>
    <form class="search-bar">
      <input class="search-input" type="search" placeholder="Search" aria-label="Search" />
      <button type="submit" class="search-btn">
        <img src="assets/youtube/magnify.svg" />
      </button>
    </form>
    <div class="menu-icons">
      <a href="#">
        <img src="assets/youtube/video-plus.svg" alt="Upload Video" />
      </a>
      
      <a href="#">
        <img src="assets/youtube/bell.svg" alt="Notifications" />
      </a>
      <a href="http://localhost/core_php/app_youtube/home.php">
        <img src="../assets/youtube/logout.png" width="20" height="20" alt="logout" />
      </a>
      <a href="#">
        <img class="menu-channel-icon" src="http:///unsplash.it/36/36?gravity=center" alt="Your Channel" />
      </a>
    </div>
  </header>

  <div class="container mt-2">


    <div class="row">
      <div class=" col-md-8">
        <!-- actual video -->
        <?php foreach($video_detail as $key => $value){ ?> 
          <video width="690" height="300" controls muted>
                        <source src="<?php echo $videoDirectoryUrl.$value['video_name']; ?>" type="video/mp4">
                        <source src="<?php echo $videoDirectoryUrl.$value['video_name']; ?>" type="video/ogg">
        </video>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="<?php echo $imageDirectoryUrl.$value['channel_image']; ?>" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title"><?php echo $value['video_description']; ?></a>
            
            <a href="#" class="video-channel-name"><?php echo $value['channel_name']; ?></a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
          <div class="attribute-details" style="float:right">
            <span><Button class="btn btn-primary button-like" data-video-id="<?php echo $value['video_id']; ?>">Like <span class="badge badge-like"><?php echo getTotalVideoLikes($value['video_id']);?></span></Button><Button class="btn btn-default btn-danger ml-2 button-dislike" data-video-id="<?php echo $value['video_id']; ?>">Dislike<span class="badge badge-dislike"><?php echo getTotalVideoDisLikes($value['video_id']);?></span></Button></span>
          </div>
        </div>
      
        
    
      <?php } ?>
        </div>

      <div class="col-md-4 playlist-container ">
      <?php foreach($PlaylistVideos as $key => $value){  ?> 
        <?php
                   $class = '';
                   if ($value['video_id'] == $video_id) {
                       $class = 'playlist-video-active';
                    }
                  ?>  
        <div class="playlist-video-container my-2 <?php echo $class; ?>">
       
                  
      
          <div class="playlist-video">
          <a href="http://localhost/core_php/app_youtube/youtube/single_video.php?video_id=<?php echo $value['video_id']; ?>" class="thumbnail" data-duration="12:24">
          <video width="200" height="100" controls muted>
                        <source src="<?php echo $videoDirectoryUrl.$value['video']; ?>" type="video/mp4">
                        <source src="<?php echo $videoDirectoryUrl.$value['video']; ?>" type="video/ogg">
        </video>
        </a> 
          </div >
          <div class="playlist-video-attributes">
            <!-- playlist video data -->
            <h2 class="video-title text-center"><?php echo $value['description']; ?></h2>
            <h4 class="video-channel-name text-center"><?php echo $value['channel_name']; ?></h4>
            <div class="video-metadata text-center" >
              <span>12K views</span>•<span>1 week ago</span>
            </div>
          </div>
       
       
        </div>
      
        
        <?php } ?> 
       
      </div>



     
    </div>
   
  </div>
<hr/>
  <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 pb-4">
                <h5>Total Comments: <?php echo  count($video_comments) ?> </h5>
              
                <div class="comment mt-4  text-justify" style="clear:both !important;" >
                <?php foreach($video_comments as $key => $value){  ?> 
                  <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:20px">
                    <img style="float:left" src="<?php echo $imageDirectoryUrl.$value['user_img']; ?>" alt="" class="rounded-circle" width="40" height="40">
                    <span style="float:left;margin-top:3px;margin-left:3px"><?php echo $value['user_name']; ?></span>
                    <span style="float:right"><?php echo dateFormat($value['created_date']); ?></span>
                    <br/>
                   
                    <br>
                    <blockquote><?php echo $value['msg']; ?></blockquote>
                </div>
                <hr/>
                    <?php } ?>
                  
                </div>
                
                
            </div>
            <?php if($author_id) {  ?>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form id="algin-form" action="http://localhost/core_php/app_youtube/youtube/add_comment.php" method="POST">
                
                  <div class="form-group">
                  <h4>Leave a comment</h4>
                  <label for="message">Message</label>
                  <textarea name="msg" id=""msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                  </div>
                  <input type="hidden" id="custId" name="video_id" value="<?php echo $video_id; ?>">
                 
                  <div class="form-group">
                      <p class="text-secondary">If you have a <a href="#" class="alert-link">account on this website</a> your address will be used to display your profile picture.</p>
                  </div>
                 
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                    
                </form>
            </div>
            <?php   }  ?>
        </div>
    </div>
</section>
 
<script src="../assets/js/script.js"></script> 
<script src =" ../assets/js/jquery.js"></script> 
</body>

</html>