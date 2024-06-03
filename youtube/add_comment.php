<?php
include_once(__DIR__.'/../function.php');
$url = "http://localhost/core_php/app_youtube/youtube/single_video.php?video_id=2";
$required_fields = ['video_id','msg'];
$error = [];



foreach($required_fields as $key => $value)
{
    if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){
        $error[$value] = $value.' is required!';
    }
}

$len = count($error);
if($len==0)
{  
    
    $msg = $_POST['msg'];
    $video_id = $_POST['video_id'];
    $author_id  =   $_SESSION['loggedInId'];

    $query = "INSERT INTO comments(`video_id`,`comment`,`author_id`)values($video_id,'$msg','$author_id')";
    $res = mysqli_query($connection,$query);
    if($res){
        $_SESSION['success'] = "Add Comment Successfully!";
    }else{
        $_SESSION['error'] = "something went wrong.please try again!";
    }

} else{

    $_SESSION['error'] = $error;
}

header("location:".$url);
exit;

?>
