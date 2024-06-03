<?php
session_start();

include('./dbConnection.php');
$url = "http://localhost/core_php/app_youtube/category.php";
$required_fields = ['category_title'];
$errors = [];
foreach($required_fields as $key => $value)
{
    if(!isset($_REQUEST[$value]) || empty($_REQUEST[$value])){
        $error[$value] = $value.' is required!';
    }
}
if(count($errors) == 0){

    $category_title  = $_POST['category_title'];
   
    $query = "INSERT INTO categories(`category_title`) VALUES ('$category_title')";
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