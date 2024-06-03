<?php
session_start();
include_once('./dbConnection.php');

$required_fields = ['video_name','description','video','category','tags'];
$errors = [];
$url = "http://localhost/core_php/app_youtube/video.php";
foreach($required_fields as $key => $value)
{
    if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){
        $error[$value] = $value.' is required!';
    }
}
if(count($errors) == 0){

    $video_name  = $_POST['video_name'];
    $tags  = serialize($_POST['tags']);
    $category_id  = $_POST['category'];
    $description  = $_POST['description'];
    $channel_id  = $_POST['channel_id'];
    $playlist_id  = $_POST['playlist_id'];
    $video =  $_FILES['video']['name'];
    $tmp_name = $_FILES['video']['tmp_name'];
    $extension = array(".png",".jpg",".jpeg");
    $destination = '../assets/uploads/';
    $data = pathinfo($video);
    $extension = $data['extension'];
    $video_name = time().".".$extension;
    $destination = $destination.$video_name;
    $move = move_uploaded_file($tmp_name,$destination);
    $author_id =  $_SESSION['loggedInId'];

    
    $query = "INSERT INTO video(`video_name`,`description`,`channel_id`,`tags`,`playlist_id`,`video`,`category`,`author_id`) VALUES ('$video_name','$description',$channel_id,'$tags',$playlist_id,'$video_name',$category_id,$author_id)";
    $res = mysqli_query($connection,$query);
    if($res){
        $_SESSION['success'] = "Successfully!";
    }else{
        $_SESSION['error'] = "something went wrong.please try again!";
    }

} else{

    $_SESSION['error'] = $errors;
}
header("location:".$url);
exit;
?>