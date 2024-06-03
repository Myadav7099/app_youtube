<?php

include_once(__DIR__.'/connection.php');
function logout()
{
    session_start();

    session_destroy();
    redirect('http://localhost/core_php/app_youtube/home.php');

}

function redirect($url = false){

    if($url)
    {
        header("location:".$url); 
        exit; 
    }
    return false;
}
function getCategory()
{
    global $connection;
    $sql = "SELECT * FROM `categories`";
    $res = mysqli_query($connection,$sql);
    $list =[];
    while($row = mysqli_fetch_assoc($res)){

    $list[] = $row;

    }
    return $list;
}
function getChannel()
{
    global $connection;
    $sql = "SELECT * FROM `channel`";
    $res = mysqli_query($connection,$sql);
    $list =[];
    while($row = mysqli_fetch_assoc($res)){

    $data[] = $row;

    }
    return $data;
} 
function getPlaylist()
{
    global $connection;
    $sql = "SELECT * FROM `Playlist`";
    $res = mysqli_query($connection,$sql);
    $result =[];
    while($row = mysqli_fetch_assoc($res)){

    $result[] = $row;

    }
    return $result;
}

function getPlaylistVideos($playlist_id =  null)
{
    global $connection;
    if($playlist_id)
    {
        $sql = "SELECT channel.channel_name ,video.id as video_id,video.video,video.description FROM `channel`
        INNER JOIN `video`
        ON channel.id = video.channel_id   WHERE playlist_id = $playlist_id "; 
        $res = mysqli_query($connection,$sql);
        $result =[];
        while($row = mysqli_fetch_assoc($res)){

        $result[] = $row;

        }
        return $result;
    }
    return false;
    
   
}
 function getVideoComment()
 {
    global $connection;
    
     
    $query = "SELECT  comments.comment as msg,comments.created_date,users.image as user_img,users.first_name as user_name FROM comments 
    INNER JOIN users ON users.id = comments.author_id";
    $res = mysqli_query($connection,$query);
    $result =[];
        while($row = mysqli_fetch_assoc($res)){

        $result[] = $row;

        }
        return $result;
     
 }
function getVideos($category_id= null,$video_id =  null)
{
    global $connection;
    $query = '';
    if(!$category_id){
        $query =  "SELECT video.description as video_description,video.playlist_id,video.id as video_id,video.video_name,channel.channel_name,channel.image as channel_image
        FROM `channel`
        INNER JOIN `video`
        ON channel.id = video.channel_id";
        

        if($video_id){
            $query = $query." WHERE video.id=".$video_id;
        }
        $res = mysqli_query($connection,$query);
        $result =[];
            while($row = mysqli_fetch_assoc($res)){

            $result[] = $row;

            }
            return $result;

    } else{
        $query = "SELECT video.description as video_description,video.playlist_id,video.video_name,video.id as video_id,channel.channel_name,channel.image as channel_image
        FROM `channel`
        INNER JOIN `video`
        ON channel.id = video.channel_id where category = '".$category_id."'";
        if($video_id){
            $query = $query." WHERE video.id=".$video_id;
        }
        $res = mysqli_query($connection,$query);
        $result =[];
        while($row = mysqli_fetch_assoc($res)){

        $result[] = $row;

        }
        return $result;
    }

}
function dateFormat($date=false)
{
   return date('d F Y',strtotime($date));
}

function getTotalVideoLikes($video_id)
{
    global $connection;
    $sql = "SELECT * FROM `video_like` where (`video_id`= $video_id)";


    $res = mysqli_query($connection,$sql);
    return mysqli_num_rows($res);
   

}
function getTotalVideoDisLikes($video_id)
{
    global $connection;
    $sql = "SELECT * FROM `video_like` where (`video_id`= $video_id)";


    $res = mysqli_query($connection,$sql);
    return mysqli_num_rows($res);
   

}

function isVideoLiked($video_id,$author_id)
{
    global $connection;
    
    $sql ="SELECT * FROM `video_like` where `video_id`= $video_id AND `author_id` = $author_id";

    $res = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($res);
    if ($count>0)
    { 
            
        return true;
            
    } 
  
    return false;
}
function  isVideoDisLiked($video_id,$author_id)
{

    global $connection;
    $sql ="SELECT * FROM `video_like` where `video_id`= $video_id AND `author_id` = $author_id";
    $res = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($res);
    if ($count>0)
    {
            
        return true;
            
    } 
    
    return false;



}
function addVideoLike($video_id,$author_id)
{
    global $connection;
   
    $query = "INSERT into video_like (`video_id`,`author_id`) values($video_id,$author_id)";  
    $res = mysqli_query($connection,$query);

    if($res){
        return true;
    }
    return false;

}
function addVideoDisLiked($video_id,$author_id)
{
    global $connection;
   
    $query = "INSERT into video_dislike (`video_id`,`author_id`) values($video_id,$author_id)"; 
    $res = mysqli_query($connection,$query);

    if($res){
        return true;
    }
    return false;

}
function getUserLikedVideos($author_id)
{
    global $connection;
    $query = "SELECT video.description, video_like.video_id,video_like.author_id,video.video,channel.channel_name,channel.image,playlist.playlist_name as name
    FROM  `video_like`
    INNER JOIN video ON video.id = video_like.video_id 
     INNER JOIN channel ON  channel.id = video.channel_id
     INNER JOIN playlist ON  playlist.id = video.playlist_id
  WHERE video_like.author_id ";
    $res = mysqli_query($connection,$query);
    $result =[];
    while($row = mysqli_fetch_assoc($res)){

    $result[] = $row;

    }
    return $result;

}
function isUserLoggedIn(){

    if(isset($_SESSION['loggedInId']))
    {
        return true;
    }
    else{
        return false;
    }
}



?>