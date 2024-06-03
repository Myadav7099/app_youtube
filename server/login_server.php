<?php
session_start();
include('./dbConnection.php');
$baseUrl = "http://localhost/core_php/app_youtube/youtube/index.php";

$required_fields = ['email','password'];
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
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email == 'admin@admin.com' && $password == 'admin#123')
    {
        $_SESSION['is_admin'] = true;
        header("location:".$baseUrl); 
        exit; 
    }

    $query = "SELECT * FROM users WHERE (`email` = '$email' AND `password` = '$password')";
    $res = mysqli_query($connection,$query);
    
    $count = mysqli_num_rows($res);
    

    if ($count > 0)
    {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['loggedInId'] = $row['id'];
            
        $_SESSION['success'] = 'Successfully Login';
       
        header("location:http://localhost/core_php/app_youtube/home.php");
          exit; 
      

    } else{
        $_SESSION['error'] = 'Invalid email and password!';
        
        header("location:http://localhost/core_php/app_youtube/login.php");
        exit; 
    }
    
}

else
{
    $_SESSION['error'] = $error;
    
    
}


?>
