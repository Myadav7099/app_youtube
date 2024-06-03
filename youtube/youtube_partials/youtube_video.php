<?php
include_once(__DIR__.'/../../function.php');
$category_id = false;
if(isset($_GET['category_id']))
{
  $category_id = $_GET['category_id'];
 
}

  

$data =  getVideos($category_id);



 
$baseUrl = "http://localhost/core_php/app_youtube/";
$videoDirectoryUrl = $baseUrl.'assets/uploads/';
$imageDirectoryUrl = $baseUrl.'assets/images/';
?>
<div class="videos">
    <section class="video-section">
     
      <?php foreach($data as $key => $value){ ?>
      <article class="video-container">
     
        <a href="http://localhost/core_php/app_youtube/youtube/single_video.php?video_id=<?php echo $value['video_id']; ?>" class="thumbnail" data-duration="12:24">
        
          <video width="690" height="300" controls muted>
                        <source src="<?php echo $videoDirectoryUrl.$value['video_name']; ?>" type="video/mp4">
                        <source src="<?php echo $videoDirectoryUrl.$value['video_name']; ?>" type="video/ogg">
                       
                        Error Loading video...
                    </video>
          
                  
        </a>
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
        </div>
      
        
      </article>
      <?php } ?>
    
    </section>
   <?php if(isUserLoggedIn()){   
      $author_id = $_SESSION['loggedInId'];
      $liked  =  getUserLikedVideos($author_id); ?>

    <section class="video-section">
      <h2 class="video-section-title">
        Liked Videos
        <button class="video-section-title-close">&times;</button>
      </h2>
     
      <?php foreach($liked as $key => $value){  ?>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
        <video width="690" height="300" controls muted>
                        <source src="<?php echo $videoDirectoryUrl.$value['video']; ?>" type="video/mp4">
                        <source src="<?php echo $videoDirectoryUrl.$value['video']; ?>" type="video/ogg">
                       
                        Error Loading video...
                    </video>
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="<?php echo $imageDirectoryUrl.$value['image']; ?>" />
          </a>
          <div class="video-details">
          <a href="#" class="video-title"><?php echo $value['description']; ?></a>
            
            <a href="#" class="video-channel-name"><?php echo $value['channel_name']; ?> - <?php echo $value['name']; ?></a>
            <a href="#" class="video-playlist-name"></a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <?php } ?>
      <!-- <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
    </section>
    <?php } ?>
   
  </div>