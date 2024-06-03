<?php
session_start();
error_reporting(E_ALL);
$server = 'localhost';
$user  = 'root';
$password  = '';
$database  = 'app_youtube';
$connection = mysqli_connect($server,$user,$password,$database);

?>