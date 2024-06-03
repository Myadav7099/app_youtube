<?php
session_start();
include_once('./dbConnection.php');
$url = "http://localhost/core_php/app_youtube/playlist.php";
$required_fields = ['playlist_name','description'];
$errors = [];
foreach($required_fields as $key => $value)
{
    if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){
        $error[$value] = $value.' is required!';
    }
}
if(count($errors) == 0){

    $playlist_name  = $_POST['playlist_name'];
    
    $description  = $_POST['description'];
     $channel_id  = $_POST['channel_id'];

    
    $query = "INSERT INTO playlist(`playlist_name`,`description`,`channel_id`) VALUES ('$playlist_name','$description',$channel_id)";
    $res = mysqli_query($connection,$query);
    if($res){
        $_SESSION['success'] = "Successfully!";
    }else{
        $_SESSION['error'] = "something went wrong.please try again!";
    }

} else{

    $_SESSION['error'] = $error;
}
header("location:".$url);
exit;
?>