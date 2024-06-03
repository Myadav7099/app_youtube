<?php
session_start();
include('./dbConnection.php');

$url = "http://localhost/core_php/app_youtube/channel.php";
$required_fields = ['channel_name','age_group','description','tags'];
$errors = [];
foreach($required_fields as $key => $value)
{
    if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){
        $error[$value] = $value.' is required!';
    }
}
if(count($errors) == 0){

    $channel_name  = $_POST['channel_name'];
    $age_group   = $_POST['age_group'];
    $description  = $_POST['description'];
    $tags   = serialize($_POST['tags']);
    $author_id =  $_SESSION['loggedInId'];
  

    $image =  $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $extension = array(".png",".jpg",".jpeg");
    $destination = '../assets/images/';
    $data = pathinfo($image);
    $extension = $data['extension'];
    $image_name = time().".".$extension;
    $destination = $destination.$image_name;

   
    $move = move_uploaded_file($tmp_name,$destination);

    $query = "INSERT INTO channel(`channel_name`,`age_group`,`description`,`tags`,`image`,`author_id`) VALUES ('$channel_name','$age_group','$description','$tags', '$image_name',$author_id)";
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