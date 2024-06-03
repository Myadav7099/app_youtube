<?php
session_start();
include('./dbConnection.php');

$required_fields = ['first_name','last_name','email','password','postal_code','address','phone'];
$error = [];

$url = "http://localhost/core_php/app_youtube/register.php";

foreach($required_fields as $key => $value)
{
    if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){
        $error[$value] = $value.' is required!';
    }
}

if(count($error) == 0){

    $first_name   = $_POST['first_name'];
    $last_name   = $_POST['first_name'];
    $email  = $_POST['email'];
    $password  = $_POST['password'];
    $phone   = $_POST['phone'];
    $postal_code   = $_POST['postal_code'];
    $address   = $_POST['address'];
    

    $image =  $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $extension = array(".png",".jpg",".jpeg");
    $destination = './uploads/';
    $data = pathinfo($image);
    $extension = $data['extension'];
    $img_name = time().".".$extension;
    $destination = $destination.$img_name;
    $move = move_uploaded_file($tmp_name,$destination);
    $query = "INSERT INTO users(`first_name`,`last_name`,`email`,`password`,`phone`,`postal_code`,`address`,`image`) VALUES ('$first_name','$last_name','$email','$password','$phone','$postal_code','$address','$img_name')";
    $res = mysqli_query($connection,$query);
    if($res){
        $_SESSION['success'] = "Registered Successfully!";
    }else{
        $_SESSION['error'] = "something went wrong.please try again!";
    }

} else{

    $_SESSION['error'] = $error;
}
header("location:".$url);
exit; 
?>